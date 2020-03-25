<?php

//error_reporting(E_ALL);
//ini_set('display_errors',1);
//ini_set('display_startup_errors', 1);
//ini_set('mysql.trace_mode', true);
//error_reporting(E_ALL); ini_set('display_errors',1);
include 'data.php';

$date = date("Y-m-d");

// Проверка корректности даты
if (isset($_GET['date'])) {
    $testDate = preg_replace('/[^0-9-]/', '', $_GET['date']);
    $arr = explode('-', $testDate);
    if (count($arr) == 3) {
        if (checkdate($arr[1], $arr[2], $arr[0])) {
            if (strtotime('2013-04-13') <= strtotime($testDate) && strtotime($testDate) <= strtotime('now')) {
                $date = $testDate;
            }
        }
    }
}

require_once dirname(__FILE__).'/config.inc.php';
$link = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

$query   = "SELECT MAX(date) as date FROM data";
$sql     = mysqli_query($link, $query);
if ( mysqli_num_rows($sql) == 1 ) {
    $row     = mysqli_fetch_assoc($sql);
    $dateMax = $row['date'];
    if ($date>$dateMax) $date=$dateMax;
}
$query   = "SELECT MAX(date) as date FROM data where `date`<='".$date."'";
$sql     = mysqli_query($link, $query);
if ( mysqli_num_rows($sql) == 1 ) {
    $row     = mysqli_fetch_assoc($sql);
    $dateMax4Date = $row['date'];
}

// вычисляем пару максимальных дат

$query="select d.* from data d 
where (d.`date`='".$dateMax4Date."' or d.`date`=DATE_SUB('".$dateMax4Date."', INTERVAL 1 DAY))
order by d.id_station, d.`date`";
$sqli = mysqli_query($link, $query);

// Создаем массив с данными
while ($row = mysqli_fetch_assoc($sqli)) {

    $id = (int)$row['id_station'];

    if($dateMax4Date==$row['date']){
        $arrDate='last';
        $data[$id]['lastdate']=$row['date'];
    } else {
        $arrDate='prev';
    }
    $data[$id][$arrDate]['uvb'] = (float)$row['uvb'];
    $data[$id][$arrDate]['polemk'] = (float)$row['polemk'];
    $data[$id][$arrDate]['pritok'] = (float)$row['pritok'];
    $data[$id][$arrDate]['rashod'] = (float)$row['rashod'];
    $data[$id][$arrDate]['sbros'] = (float)$row['sbros'];

    // Расчитываем координату для уровня воды
    if(isset($data[$id][$arrDate])) {
        if(isset($data[$id]['fpu']) && ($divider=$data[$id]['fpu'] - $data[$id]['umo'])>0)
            $data[$id][$arrDate]['uvbPoint'] = (int)round(($data[$id][$arrDate]['uvb'] - $data[$id]['umo']) * 50 / $divider, 0) + 60;
            //$data[$id][$arrDate]['uvbPoint'] = (int)round(($data[$id][$arrDate]['uvb'] - $data[$id]['umo']) * 50 / $divider, 0) + 60;
        else
            $data[$id][$arrDate]['uvbPoint']=60;
    }
}

//echo '<!--xxx--'.__FILE__.' '.var_export( $dateMax, true).var_export( $data, true).'-->';

//Получить высоту Водохранилища
function getHeightReservoir($id) {
    global $data;
    // Координата текущего уровня
    if(isset($data[$id]['last'])) {
        $height = $data[$id]['last']['uvbPoint'];
        //Костыль для Усть-Улимской ГЭС
        if ($id == "44") {
            $height -= 10;
        }
    } elseif(isset($data[$id]['prev'])) {
        $height = $data[$id]['prev']['uvbPoint'];
    } else {
        // Если нет данных за два дня, то приравниваем к метке НПУ
        $height = $data[$id]['npuPoint'];
    }

    return $height;
}

function printItem($id, $prevID = 0) {
	global $data;
	global $date, $dateMax, $dateMax4Date;
	global $dateY;

	$fpu = $data[$id]['fpu'];
	$npu = $data[$id]['npu'];
	$umo = $data[$id]['umo'];

	$npuPoint = $id == 43 ? '108' : $data[$id]['npuPoint'];

	// Текущий уровень
	if(isset($data[$id]['last']) && isset($data[$id]['prev']) && $date==$data[$id]['lastdate']) {
		$t = $data[$id]['last']['uvb'];
		$y = $data[$id]['prev']['uvb'];

		if($t > $y) {
			$current = '<span class="current up">' . $t . '</span>';
		} elseif($t < $y) {
			$current = '<span class="current down">' . $t . '</span>';
		} else {
			$current = '<span class="current">' . $t . '</span>';
		}
	} else {
		$current = '<span class="current">н/д</span>';
	}


	// Координата текущего уровня
	if(isset($data[$id]['last'])) {
		$height = $data[$id]['last']['uvbPoint'];
	} elseif(isset($data[$id]['prev'])) {
		$height = $data[$id]['prev']['uvbPoint'];
	} else {
		// Если нет данных за два дня, то приравниваем к метке НПУ
		$height = $data[$id]['npuPoint'];
	}

    echo "<pre>";
    var_dump($height);
    echo "</pre>";
	//Вычисляем разницу между текущей ГЭС и предыдущей
	if ($prevID > 0) {
        $prevHeight = getHeightReservoir($prevID);
            $difference = $prevHeight - $height;
        if ($difference < 10) {
            $height -= 10;
        }
    }

	if ($id == 44) {
	    echo "<pre>";
	    var_dump("testtest");
	    echo "</pre>";
	    echo "<pre>";
	    var_dump($prevHeight);
	    echo "</pre>";
	    echo "<pre>";
	    var_dump($height);
	    echo "</pre>";
	    echo "<pre>";
	    var_dump($difference);
	    echo "</pre>";
    }

    foreach(array(
                'uvbBal'=>[' м','uvb'],// Текущий уровень в балуне
                'polemk'=>[' млн.м<sup>3</sup>','polemk'],// Свободная емкость
                'pritok'=>[' м<sup>3</sup>/c','pritok'],// Приток
                'rashod'=>[' м<sup>3</sup>/c','rashod'],// Расход
                'sbros'=>['  м<sup>3</sup>/c','sbros'],// Сброс
            ) as $k=>$v) {
        if (isset($data[$id]['last']) && $dateMax4Date==$data[$id]['lastdate']) {
            $$k = $data[$id]['last'][$v[1]] . $v[0];
        } else {
            $$k = 'нет данных';
        }
    }

	$html = include 'templates/item.php';
	return $html;
}

function printChange($id, $var) {
	global $data;
	$change = '';

	if(isset($data[$id]['last']) && isset($data[$id]['prev'])) {
		$t = $data[$id]['last'][$var];
		$y = $data[$id]['prev'][$var];

		if($t > $y) {
			$c = round(($t - $y), 2);
			$change = '<span class="up">' . $c . '</span>';
		} elseif($t < $y) {
			$c = round(($y - $t), 2);
			$change = '<span class="down">' . $c . '</span>';
		}
	}

	return $change;
}

include 'templates/list.php';

?>