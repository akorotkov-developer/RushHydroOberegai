<?php

$day = array(
            '09.03' => '243.21',
            '10.03' => '243.06',
            '11.03' => '242.90',
            '12.03' => '242.75',
            '13.03' => '242.60',
            '14.03' => '242.49',
            '15.03' => '242.34',
);

$week = array(
            '25.01' => '248.54',
            '01.02' => '247.77',
            '08.02' => '246.96',
            '15.02' => '246.13',
            '22.02' => '245.26',
            '18.03' => '243.37',
            '15.03' => '242.34',
);

$mounth = array(
            '01.09' => '254.60',
            '01.10' => '255.57',
            '01.11' => '255.56',
            '01.12' => '253.92',
            '01.01' => '251.14',
            '01.02' => '247.47',
            '01.03' => '244.39',
);

switch ($_GET['range']) {
	case 'day':
		$data = $day;
		break;
	case 'week':
		$data = $week;
		break;
	case 'mounth':
		$data = $mounth;
		break;
	default:
		$data = $day;
}


$dataMin = min($data);
$dataMax = max($data);
$dataRange = round(($dataMax - $dataMin), 2);
//echo $dataMax;
//echo '<br>';
//echo $dataMin;
//echo '<br>';
//echo $dataRange;


$keys = array_keys($data);
$date1 = $keys[0];
$date2 = $keys[1];
$date3 = $keys[2];
$date4 = $keys[3];
$date5 = $keys[4];
$date6 = $keys[5];
$date7 = $keys[6];

$values = array_values($data);
$value1 = $values[0];
$value2 = $values[1];
$value3 = $values[2];
$value4 = $values[3];
$value5 = $values[4];
$value6 = $values[5];
$value7 = $values[6];

$point1 = round(($dataMax - $value1) * 40 / $dataRange, 0) + 15;
$point2 = round(($dataMax - $value2) * 40 / $dataRange, 0) + 15;
$point3 = round(($dataMax - $value3) * 40 / $dataRange, 0) + 15;
$point4 = round(($dataMax - $value4) * 40 / $dataRange, 0) + 15;
$point5 = round(($dataMax - $value5) * 40 / $dataRange, 0) + 15;
$point6 = round(($dataMax - $value6) * 40 / $dataRange, 0) + 15;
$point7 = round(($dataMax - $value7) * 40 / $dataRange, 0) + 15;

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
    <head>
        <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
		<meta name="viewport" content="width=device-width, initial-scale=1">
        <style type="text/css">
            /*body {margin:0;}*/
            #informer_widget line {stroke:#223B8E; stroke-width:2px}
            #informer_widget circle {fill:#EF7F1A}
            #informer_widget text {font-size:9px; font-family:'Open Sans', sans-serif;}
		</style>
    </head>
    <body>
        <svg xmlns="http://www.w3.org/2000/svg" id="informer_widget" width="297px" height="70px" viewBox="0 0 297 70">
            <g>
                <line x1="14" y1="<?=$point1?>" x2="58" y2="<?=$point2?>" />
                <line x1="59" y1="<?=$point2?>" x2="103" y2="<?=$point3?>" />
                <line x1="104" y1="<?=$point3?>" x2="148" y2="<?=$point4?>" />
                <line x1="149" y1="<?=$point4?>" x2="193" y2="<?=$point5?>" />
                <line x1="194" y1="<?=$point5?>" x2="238" y2="<?=$point6?>" />
                <line x1="239" y1="<?=$point6?>" x2="282" y2="<?=$point7?>" />
                
                <circle cx="14" cy="<?=$point1?>" r="5"/>
                <circle cx="59" cy="<?=$point2?>" r="5"/>
                <circle cx="104" cy="<?=$point3?>" r="5"/>
                <circle cx="149" cy="<?=$point4?>" r="5"/>
                <circle cx="194" cy="<?=$point5?>" r="5"/>
                <circle cx="239" cy="<?=$point6?>" r="5"/>
                <circle cx="284" cy="<?=$point7?>" r="5"/>
                
                <text x="0" y="<?=$point1-8?>"><?=$value1?></text>
                <text x="2" y="70"><?=$date1?></text>
                
                <text x="45" y="<?=$point2-8?>"><?=$value2?></text>
                <text x="47" y="70"><?=$date2?></text>
                
                <text x="90" y="<?=$point3-8?>"><?=$value3?></text>
                <text x="92" y="70"><?=$date3?></text>
                
                <text x="135" y="<?=$point4-8?>"><?=$value4?></text>
                <text x="137" y="70"><?=$date4?></text>
        
                <text x="180" y="<?=$point5-8?>"><?=$value5?></text>
                <text x="182" y="70"><?=$date5?></text>
        
                <text x="225" y="<?=$point6-8?>"><?=$value6?></text>
                <text x="227" y="70"><?=$date6?></text>
                
                <text x="269" y="<?=$point7-8?>"><?=$value7?></text>
                <text x="272" y="70"><?=$date7?></text>
            </g>
        </svg>
		<br/><br/>Интервал:&nbsp;&nbsp;
		<a href="widget.php?range=day">День</a>&nbsp;&nbsp;
		<a href="widget.php?range=week">Неделя</a>&nbsp;&nbsp;
		<a href="widget.php?range=mounth">Месяц</a>
    </body>
</html>