<?

class river extends metamodule
{
    function __construct()
    {
        parent::__construct();

        //обязательно указываем наши шаблоны папок
        $this->cTemplates = array(
            'river',

        );
        //здесь настраиваем базовый шаблон для каждого шаблона папки, используемого модулем
        $this->moduleWrappers = array(
            'river' => 'inner.html',

        );

    }

    function __destruct()
    {
    }

    //базовый метод сайт-модуля
    function content($arParams = array())
    {
        global $control;
        global $config;
        global $sql;

        require_once $config["DOCUMENT_ROOT"] . 'informer/config.inc.php';
        require_once $config["DOCUMENT_ROOT"] . 'inc/modules/smi.php';

        return $this->showList($arParams);

    }


    function showList($arParams = array())
    {
        global $control;
        global $config;
        global $sql;

        //попытка загрузить из кэша
        $_cn = sprintf("%s_%s_%s", get_class($this), 'showList', cache_key());
        $html = get_cache($_cn);
        if (!is_null($html)) return $html;

        $arRiver = array(
            1 => array(1,2),
            2 => array(3),
            3 => array(4,5),
            4 => array(6,7),
            5 => array(8,9),
        );

        $list = new Listing('river', 'blocks', 'all');
        $list->get_list();
        $list->get_item();

        $page = new stdClass();
        $page->selected = false;
        $page->item = $list->item;

        $selId = false;
        if (!(int)$control->bid) $selId = $page->item[0]->id;

        if ($page->item) {
            foreach ($page->item as $key => $item) {
                $item->selected = false;
                if ((int)$control->bid == $item->id || $item->id === $selId) {
                    $item->selected = true;
                    if ((int)$control->bid == $item->id) {
                        $page->selected = true;
						$page->selriver = $item->id;
                    }
                }

                if (isset($arRiver[$item->id]) && !empty($arRiver[$item->id])) {
                    foreach ($arRiver[$item->id] as $val) {
                        $ob = new stdClass();
                        $ob->id = $val;
                        $page->item[$key]->item[] = $ob;
                    }
                }

            }

            $gesCritery = " (fb != '' OR vk != '' OR ok != '' OR tw != '' OR instagram != '') AND ";
            if ((int)$control->bid) {
                $gesCritery .= sprintf(" blockparent = %d AND ", (int)$control->bid);
            }
            $geslist = new Listing('ges', 'blocks', 'all', $gesCritery);
            $geslist->sortfield = 'title';
            $geslist->sortby = 'ASC';
            $geslist->get_list();
            $geslist->get_item();
            $page->ges = $geslist->item;
        }


        $page->site_dir = $config['site_dir'];

        $smi = new smi();
        $page->smi = $smi->mainblock();

        require_once $config["DOCUMENT_ROOT"] . 'inc/modules/video.php';
        $video = new video();
        $page->video = $video->mainblock();

        $page->networks = $this->networks();

		//var_dump($page->selriver);
//==================================//


include 'data.php';
$this->data = $data;
$this->date = date("Y-m-d");

// Проверка корректности даты
if (isset($_GET['date'])) {
    $testDate = preg_replace('/[^0-9-]/', '', $_GET['date']);
    $arr = explode('-', $testDate);
    if (count($arr) == 3) {
        if (checkdate($arr[1], $arr[2], $arr[0])) {
            if (strtotime('2013-04-13') <= strtotime($testDate) && strtotime($testDate) <= strtotime('now')) {
                $this->date = $testDate;
            }
        }
    }
}

$link = mysqli_connect($config['dbhost'], 'hydrology_user', 'h12345', isset($config['rushydrology'])?$config['rushydrology']:'hydrology');//rushydrology');

$maxDate='';//$this->date;
$query   = "SELECT MAX(date) as date FROM data";
$sqli     = mysqli_query($link, $query);
if ( mysqli_num_rows($sqli) == 1 ) {
    $row     = mysqli_fetch_assoc($sqli);
    $maxDate = $row['date'];
    if ($this->date >$maxDate) $this->date=$maxDate;
}

$query   = "SELECT MAX(date) as date FROM data where `date`<='".$this->date."'";
$sqli     = mysqli_query($link, $query);
if ( mysqli_num_rows($sqli) == 1 ) {
    $row     = mysqli_fetch_assoc($sqli);
    $this->dateMax4Date=$row['date'];
}

$page->date = date("d.m.Y", strtotime($this->date));


$this->dateY = date('Y-m-d', strtotime($this->date . "-1 days"));

// вычисляем пару максимальных дат

$query="select d.* from data d 
where (d.`date`='".$this->dateMax4Date."' or d.`date`=DATE_SUB('".$this->dateMax4Date."', INTERVAL 1 DAY))
order by d.id_station, d.`date`";

$sqli = mysqli_query($link, $query);

// Создаем массив с данными
while ($row = mysqli_fetch_assoc($sqli)) {

	$id = (int)$row['id_station'];

    if($this->dateMax4Date==$row['date']){
        $arrDate='last';
        $this->data[$id]['lastdate']=$row['date'];
    } else {
        $arrDate='prev';
    }
    $this->data[$id][$arrDate]['uvb'] = (float)$row['uvb'];
	$this->data[$id][$arrDate]['polemk'] = (float)$row['polemk'];
	$this->data[$id][$arrDate]['pritok'] = (float)$row['pritok'];
	$this->data[$id][$arrDate]['rashod'] = (float)$row['rashod'];
	$this->data[$id][$arrDate]['sbros'] = (float)$row['sbros'];

	// Расчитываем координату для уровня воды
	if(isset($this->data[$id][$arrDate])) {
		$this->data[$id][$arrDate]['uvbPoint'] = (int)round(($this->data[$id][$arrDate]['uvb'] - $this->data[$id]['umo']) * 50 / ($this->data[$id]['fpu'] - $this->data[$id]['umo']), 0) + 60;
	}
}

$reg='/(\d\d\d\d)-(\d\d)-(\d\d)/';
if(preg_match($reg, $maxDate)) {
    $page->maxDate = preg_replace($reg,'\3.\2.\1', $maxDate);
}



	if($page->selriver==1) {

		$page->item37 = $this->printItem(37);
		$page->item34 = $this->printItem(34);
		$page->item32 = $this->printItem(32);
		$page->item30 = $this->printItem(30);
		$page->item33 = $this->printItem(33);
		$page->item38 = $this->printItem(38);
		$page->item29 = $this->printItem(29);
		$page->item31 = $this->printItem(31);
		$page->item35 = $this->printItem(35);

	}

	if($page->selriver==2) {
		$page->item39 = $this->printItem(39);
	}

	if($page->selriver==3) {
		$page->item28 = $this->printItem(28);
		$page->item36 = $this->printItem(36);
		$page->item44 = $this->printItem(44);
		$page->item45 = $this->printItem(45);
		$page->item46 = $this->printItem(46);

	}

	if($page->selriver==4) {
		$page->item40 = $this->printItem(40);
		$page->item41 = $this->printItem(41);

	}


	if($page->selriver==5) {
		$page->item48 = $this->printItem(48);
		$page->item49 = $this->printItem(49);
	}

		//$page->item42 = $this->printItem(42);
		//$page->item43 = $this->printItem(43);

		//var_dump($page);
        $html = $this->sprintt($page, $this->_tplDir() . "showList.html");

        //сохраняем кэш
        set_cache($_cn, $html);
        return $html;

    }

    function showListDetail($arParams = array())
    {
        global $control;
        global $config;
        global $sql;

        //попытка загрузить из кэша
        $_cn = sprintf("%s_%s_%s", get_class($this), 'showListDetail', cache_key());
        $html = get_cache($_cn);
        if (!is_null($html)) return $html;


        $list = new Listing('river', 'blocks', 'all');
        $list->get_list();
        $list->get_item();

        $page = new stdClass();
        $page->selected = false;
        $page->item = $list->item;

        if ($page->item) {
            foreach ($page->item as $key => $item) {
                $item->selected = false;
                if ((int)$control->bid == $item->id) {
                    $item->selected = true;
                    $page->selected = true;
                }
            }
        }

        $page->site_dir = $config['site_dir'];

        $html = $this->sprintt($page, $this->_tplDir() . "showListDetail.html");

        //сохраняем кэш
        set_cache($_cn, $html);
        return $html;

    }

    function menu($arParams = NULL)
    {
        global $control;
        global $config;
        global $sql;

        if ($control->template != 'river' && $control->template != 'index') return '';

        //попытка загрузить из кэша
        $_cn = sprintf("%s_%s", get_class($this), 'menu');
        $html = get_cache($_cn);
        if (!is_null($html)) return $html;


        $list = new Listing('river', 'blocks', 'all');
        $list->no_text_view = 1;
        $list->get_list();
        $list->get_item();

        $page = new stdClass();
        $page->selected = false;

        $page->item = $list->item;

        if ($page->item) {
            foreach ($page->item as $key => $item) {
                $item->selected = false;
                if ((int)$control->bid == $item->id) {
                    $item->selected = true;
                    $page->selected = true;
                    if (isset($page->item[$key - 1])) {
                        $page->prevItem = $page->item[$key - 1];
                    }
                    if (isset($page->item[$key + 1])) {
                        $page->nextItem = $page->item[$key + 1];
                    }
                }
            }
        }

        $page->site_dir = $config['site_dir'];

        $page->index = false;
        if ($control->template == 'index') $page->index = true;


        $html = $this->sprintt($page, $this->_tplDir() . "menu.html");

        //сохраняем кэш
        set_cache($_cn, $html);

        return $html;
    }

    function networks($arParams = NULL)
    {
        global $control;
        global $config;
        global $sql;

        //попытка загрузить из кэша
        $_cn = sprintf("%s_%s", get_class($this), 'networks');
        $html = get_cache($_cn);
        if (!is_null($html)) return $html;


        $page = new stdClass();
        $page->site_dir = $config['site_dir'];

        $gesCritery = " (fb != '' OR vk != '' OR ok != '' OR tw != '' OR instagram != '') AND ";

        if ((int)$control->bid && $control->template != 'smi' ) {
            $gesCritery .= sprintf(" blockparent = %d AND ", (int)$control->bid);
        }

        $isMainPage = self::checkCurrentPage("/polovodie/");
        $geslist = new Listing('ges', 'blocks', $isMainPage ? 'main' : 'all' , $gesCritery);
        $geslist->sortfield = 'title';
        $geslist->sortby = 'ASC';
        $geslist->get_list();
        $geslist->get_item();
        $page->ges = $geslist->item;

		//var_dump($page->ges);

        $page->index = false;

		if ($control->template == 'index') {
            $page->index = true;

            ob_start();
            require_once $config["DOCUMENT_ROOT"] . '../bitrix/modules/main/include/prolog_before.php';
            require_once $config["DOCUMENT_ROOT"] . '../bitrix/php_interface/client-init.php';
            include $config["DOCUMENT_ROOT"] . '../bitrix/templates/rushydro/right.informer.php';
            $page->informer = ob_get_contents();
            ob_end_clean();
        }

		if ($control->template == 'news' && $_GET['id'] ) {
			$page->index = true;
			ob_start();
			require_once $config["DOCUMENT_ROOT"] . '../bitrix/modules/main/include/prolog_before.php';
			include $config["DOCUMENT_ROOT"] . '../bitrix/templates/rushydro/right.informer.php';
			$page->informer = ob_get_contents();
            ob_end_clean();

		}

		if ($control->template == 'smi' && $control->oper == 'view' ) {
			$page->index = true;
			ob_start();
			require_once $config["DOCUMENT_ROOT"] . '../bitrix/modules/main/include/prolog_before.php';
			include $config["DOCUMENT_ROOT"] . '../bitrix/templates/rushydro/right.informer.php';
			$page->informer = ob_get_contents();
            ob_end_clean();

		}



        $html = $this->sprintt($page, $this->_tplDir() . "networks.html");

        //сохраняем кэш
        set_cache($_cn, $html);

        return $html;
    }

function printChange($id, $var) {

	$change = '';

	if( isset($this->data[$id]['last']) && isset($this->data[$id]['prev'])) {
		$t = $this->data[$id]['last'][$var];
		$y = $this->data[$id]['prev'][$var];

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

function printItem($id) {

	$fpu = $this->data[$id]['fpu'];
	$npu = $this->data[$id]['npu'];
	$umo = $this->data[$id]['umo'];

	//var_dump($this->data);

	$npuPoint = $this->data[$id]['npuPoint'];

	// Текущий уровень
	if(isset($this->data[$id]['last']) && isset($this->data[$id]['prev']) && $this->date==$this->data[$id]['lastdate']) {
		$t = $this->data[$id]['last']['uvb'];
		$y = $this->data[$id]['prev']['uvb'];

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
	if(isset($this->data[$id]['last'])) {
		$height = $this->data[$id]['last']['uvbPoint'];
	} elseif(isset($this->data[$id]['prev'])) {
		$height = $this->data[$id]['prev']['uvbPoint'];
	} else {
		// Если нет данных за два дня, то приравниваем к метке НПУ
		$height = $this->data[$id]['npuPoint'];
	}

    if(isset($_GET['test']))
	    echo '<!--xxx--'.__FILE__.' '.var_export($this->dateMax4Date, true).var_export( $this->date, true).var_export( $this->data, true).'-->';

    foreach(array(
                'uvbBal'=>[' м','uvb'],// Текущий уровень в балуне
                'polemk'=>[' млн.м<sup>3</sup>','polemk'],// Свободная емкость
                'pritok'=>[' м<sup>3</sup>/c','pritok'],// Приток
                'rashod'=>[' м<sup>3</sup>/c','rashod'],// Расход
                'sbros'=>['  м<sup>3</sup>/c','sbros'],// Сброс
            ) as $k=>$v) {
        if (isset($this->data[$id]['last']) && $this->dateMax4Date==$this->data[$id]['lastdate'] ) {
            $$k = $this->data[$id]['last'][$v[1]] . $v[0]/*.' (' . $this->data[$id]['lastdate'] . ')'*/;
        } else {
            $$k = 'нет данных';
        }
    }

	$c_uvb = $this->printChange($id, 'uvb');
	$c_polemk = $this->printChange($id, 'polemk');
	$c_rashod = $this->printChange($id, 'rashod');
	$c_sbros = $this->printChange($id, 'sbros');

	if($id == 38 or $id == 35) { $addclass = "class=top"; } else $addclass = '';

	$river_one = $current . "		
		<div class='data'>
			<div class='fpu' style='bottom:110px;'><span>".$fpu."</span></div>
			<div class='npu' style='bottom:".$npuPoint."px;'><span ".$addclass." >".$npu."</span></div>
			<div class='umo' style='bottom:60px;'><span>".$umo."</span></div>
			<div class='level' style='height:".$height."px;'></div>
		</div>
		<div class='popup-wrapper'>
			<div class='popup-trigger'>&nbsp;</div>
			<div class='popup-info'>			
				<div class='legend'>
					<p><span class='l-red'></span>ФПУ &mdash; <b>".$fpu." м</b></p>
					<p><span class='l-green'></span>НПУ &mdash; <b>".$npu." м</b></p>
					<p><span class='l-black'></span>УМО &mdash; <b>".$umo." м</b></p>
					<p>Уровень — <b>".$uvbBal."</b>".$c_uvb."</p>
					<p>Свободная ёмкость — <b>".$polemk."</b>".$c_polemk."</p>
					<p>Приток — <b>".$pritok."</b>".$c_polemk."</p>
					<p>Общий расход — <b>".$rashod."</b>".$c_rashod."</p>
					<p>Расход через водосбросы — <b>".$sbros."</b>".$c_sbros."</p> 
				</div>
			</div>
		</div>
	";

	//var_dump($river_one);
	return $river_one;
}


// <#AUTOMETHODS#>

}

?>