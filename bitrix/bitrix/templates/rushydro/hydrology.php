<?php
//error_reporting(E_ALL);
if (preg_match("/^(\d\d\d\d)(\d\d)(\d\d)/", getenv("QUERY_STRING"), $m)) {
    $currentDate = getenv("QUERY_STRING");
    $cur_year = $m[1];
    $cur_month = $m[2];
    $cur_day = $m[3];
} else {
    $currentDate = null;
    $cur_month = strftime("%m");
    $cur_year = strftime("%Y");
    $cur_day = strftime("%d");
    $mode = "current";
}

$monthnames1 = array("", "январь", "февраль", "март", "апрель", "май", "июнь", "июль", "август", "сентябрь", "октябрь", "ноябрь", "декабрь");
$monthnames2 = array("", "января", "февраля", "марта", "апреля", "мая", "июня", "июля", "августа", "сентября", "октября", "ноября", "декабря");
$font_dir = __DIR__."/../../../images/ssh_informer/misc";
$img_dir = __DIR__."/../../../images/ssh_informer/misc";
$out_dir = __DIR__."/../../../images/ssh_informer";
$http_dir = RhdHandler::getSiteRoot()."/images/ssh_informer";
global $img;

$prognoz = array();
$all_days = array();
$data = array();
$yesterday = array();
$yesterday2 = array();
$today = array();
//print "<pre>";

//print '<h1>'.$r['month'].".".$r['year']."</h1>\n";

foreach ($hydrologyItems as $item) {
    preg_replace(
        '/(\d+)\.(\d+)\.(\d+)/e',
        '($dayNumber = (int) "\\1") && ($monthNumber = (int) "\\2") && ($yearNumber = (int) "\\3")',
        $item['DATE_ACTIVE_FROM']
    );

    $day = array();
    $day['day'] =  $dayNumber;
    $day['month'] = $monthNumber;
    $day['year'] = $yearNumber;
    $day['bvu1'] = (int) trim($item['PROPERTY_BVU1_VALUE']);
    $day['bvu2'] = (int) trim($item['PROPERTY_BVU2_VALUE']);
    $day['pritokvb'] = (int) trim($item['PROPERTY_PRITOKVB_VALUE']);
    $day['levelvb'] = (float) str_replace(",",".", trim($item['PROPERTY_LEVELVB_VALUE']));
    $day['levelnb'] = (float) str_replace(",",".", trim($item['PROPERTY_LEVELNB_VALUE']));
    $day['rashod'] = (float) str_replace(",",".", trim($item['PROPERTY_RASHOD_VALUE']));
    $day['rashodga'] = (float) str_replace(",",".", trim($item['PROPERTY_RASHODGA_VALUE']));
    $day['rashodev'] = (float) str_replace(",",".", trim($item['PROPERTY_RASHODEV_VALUE']));
    $day['rashodbv'] = (float) str_replace(",",".", trim($item['PROPERTY_RASHODBV_VALUE']));

    if ($last_bvu && !($day['bvu1'] && $day['bvu2'])) {
    //	list($day['bvu1'], $day['bvu2']) = $last_bvu;
    }

    if ($day['levelvb'] && $day['levelnb'] && ($day['rashod'] || $day['rashodga'] || $day['rashodev'] || $day['rashodbv'])) {
        if ($day['month'] == $cur_month && $day['year'] == $cur_year && $day['day'] == $cur_day) {
            $today = $day;
        }

        if (!$today) {
            $yesterday2 = $yesterday;
            $yesterday = $day;
        }

        $all_days[sprintf("%04d%02d%02d", $day['year'], $day['month'], $d)] = sprintf("%02d %s %04d г.", $day['day'], $monthnames2[$day['month']], $day['year']);

        $dayList[sprintf("%04d%02d%02d", $day['year'], $day['month'], $day['day'])] = sprintf("%02d %s %04d г.", $day['day'], $monthnames2[$day['month']], $day['year']);

    }

    if ($day['bvu1'] && $day['bvu2']) {
        $last_bvu = array($day['bvu1'], $day['bvu2']);
    }
}

$dayList = array_reverse($dayList, true);

if (!$today) {
    if ($mode=="current") {
        $today = $yesterday;
        $yesterday = $yesterday2;
        $cur_day = $today['day'];
        $cur_month = $today['month'];
        $cur_year = $today['year'];
    }
}

function ttfprint($text, $x, $y, $color, $font_size, $font="dincyrbold")
{
    global $img;
    //$text = iconv("koi8-r","utf-8", $text);
    $coords = imagettfbbox($font_size, 0, $font, $text);
    imagettftext($img, $font_size, 0, $x, $y, $color, $font, $text);
    //print "<pre>"; print_r($coords); die();
    return $coords[2];
}

function triangle($x, $y, $color, $mode)
{
    global $img;
    if ($mode=="up") {
        imagefilledpolygon($img, array($x,$y, $x+8,$y, $x+4,$y-8), 3, $color);
    } elseif ($mode=="down") {
        imagefilledpolygon($img, array($x,$y-8, $x+8,$y-8, $x+4,$y), 3, $color);
    }

}

//function t($text) {
//	return iconv("koi8-r","utf-8", $text);
//}

$have_image = false;
if ($mode=="current") {
    $filename = "$out_dir/current.jpg";
    $http_filename = "$http_dir/current.jpg";
    if (is_file($filename) && strftime("%Y%m%d%H%M", filemtime($filename))==strftime("%Y%m%d%H%M")) {
        $have_image = true;
    }
} else {
    $filename = "$out_dir/".sprintf("%04d%02d%02d.jpg", $cur_year, $cur_month, $cur_day);
    $http_filename = "$http_dir/".sprintf("%04d%02d%02d.jpg", $cur_year, $cur_month, $cur_day);
    if (is_file($filename)) {
        $have_image = true;
    }
}
$have_image = false;

if (!$have_image) {
    putenv('GDFONTPATH=' . realpath($font_dir));
    $font = "dincyrbold";

    $img = imagecreatefromjpeg("$img_dir/informer_new.jpg");

    $yellow = imagecolorallocate($img, 250,194,77);
    $white  = imagecolorallocate($img, 255,255,255);
    $grey   = imagecolorallocate($img, 227,227,227);
    $blue   = imagecolorallocate($img, 160,163,205);

    //imagefilledrectangle($img, 0,242, 303,479, imagecolorallocate($img, 82,98,76));

    $start_x = 9;
    $y = 268;

    $x = $start_x;
    if ((int) $cur_year>2010 || ((int) $cur_year==2010 && ((int) $cur_month>7 || ((int) $cur_month==7 && (int) $cur_day>4))) ) {
        ttfprint((int) $cur_day." ".$monthnames2[(int) $cur_month]." ".(int) $cur_year." г. (00:00 МСК)", $x, $y, $yellow, 12);
    } elseif ((int) $cur_year>2010 || ((int) $cur_year==2010 && ((int) $cur_month>6 || ((int) $cur_month==6 && (int) $cur_day>9))) ) {
        ttfprint((int) $cur_day." ".$monthnames2[(int) $cur_month]." ".(int) $cur_year." г. (08:00 МСК)", $x, $y, $yellow, 12);
    } else {
        ttfprint((int) $cur_day." ".$monthnames2[(int) $cur_month]." ".(int) $cur_year." г.", $x, $y, $yellow, 12);
    }

    /*if ($prognoz['pritok1'] && $prognoz['pritok2']) {
        $y = 500;
        $x = 596;
        $x += ttfprint($monthnames1[(int) $cur_month]." ".(int) $cur_year." г.: ", $x, $y, $grey, 10);
        $x += ttfprint($prognoz['pritok1']." - ", $x, $y, $white, 10);
        imagesetpixel($img, $x-6, $y-2, $grey);
        imagesetpixel($img, $x-5, $y-2, $grey);
        imagesetpixel($img, $x-6, $y-7, $grey);
        imagesetpixel($img, $x-5, $y-7, $grey);
        imagefilledrectangle($img, $x-8, $y-5, $x-3,$y-4, $grey);
        $x += ttfprint($prognoz['pritok2']." м /с", $x, $y, $white, 10);
        ttfprint("3", $x-13, $y-4, $white, 7);
    } else {
        imagefilledrectangle($img, 471,484, 627,506, imagecolorallocate($img, 84,99,77));
    }*/

    // --------------------------------
    $y = 268;
    $x = $start_x;
    $y += 46;
    //$x += ttfprint("Приточность в верхний бьеф:", $x, $y, $grey, 10);

    $x += ttfprint($today['pritokvb']." м /c", $x, $y, $white, 13);
    ttfprint("3", $x-18, $y-4, $white, 9);

    if ($yesterday['pritokvb']) {
        $diff = (int) $today['pritokvb'] - (int) $yesterday['pritokvb'];
        if ($diff > 0) {
            ttfprint(" (   +$diff)", $x, $y, $yellow, 13);
            triangle($x+9, $y-2, $blue, "up");
        } elseif ($diff < 0) {
            ttfprint(" (   $diff)", $x, $y, $yellow, 13);
            triangle($x+9, $y-2, $blue, "down");
        }
    }
    // --------------------------------
    $x = $start_x;
    $y += 48;
    //$x += ttfprint("Уровень верхнего бьефа:", $x, $y, $grey, 10);

    $x += ttfprint(sprintf("%.02f",$today['levelvb'])." м", $x, $y, $white, 13);

    if ($yesterday['levelvb']) {
        $diff = sprintf("%.02f", $today['levelvb'] - $yesterday['levelvb']);
        if ($diff !== "0,00" && $diff[0]!=="-") {
            ttfprint(" (   +$diff)", $x, $y, $yellow, 13);
            triangle($x+9, $y-2, $blue, "up");
        } elseif ($diff[0] === "-") {
            ttfprint(" (   $diff)", $x, $y, $yellow, 13);
            triangle($x+9, $y-2, $blue, "down");
        }
    }

    // --------------------------------
    $y += 30;
    if ($today['bvu1'] && $today['bvu2']) {
        $x = $start_x+1;
        $x += ttfprint($today['bvu1'].' - '.$today['bvu2']." м /c", $x, $y, $white, 13);
        ttfprint("3", $x-16, $y-4, $white, 8);
    } else {
        //imagefilledrectangle($img, 7,321, 266,354, imagecolorallocate($img, 83,99,77));
    }

    // --------------------------------
    $x = $start_x;
    $y += 21;
    $x += 115;
    if ($today['rashod']) {
        $x += 5;
        $x += ttfprint($today['rashod']." м /c", $x, $y, $white, 13);
        ttfprint("3", $x-18, $y-4, $white, 9);
        if ($yesterday['rashod']) {
            $diff = (int) $today['rashod'] - (int) $yesterday['rashod'];
            if ($diff > 0) {
                ttfprint(" (   +$diff)", $x, $y, $yellow, 13);
                triangle($x+9, $y-2, $blue, "up");
            } elseif ($diff < 0) {
                ttfprint(" (   $diff)", $x, $y, $yellow, 13);
                triangle($x+9, $y-2, $blue, "down");
            }
        }
    }
    $y+=1;
        // --- ГА
        if ($today['rashodga']) {
            $x = $start_x+20;
            $y += 15;
            $label = imagecreatefrompng("$img_dir/label_rashodga.png");
            imagecopy($img, $label, $x,$y-10, 0,0, 210,14);
            //$x += 124;
            $y += 18;
            $x += ttfprint($today['rashodga']." м /c", $x, $y, $white, 12);
            ttfprint("3", $x-15, $y-4, $white, 7);
        }

        // --- ЭВ
        if ($today['rashodev']) {
            $x = $start_x+20;
            $y += 15;
            $label = imagecreatefrompng("$img_dir/label_rashodev.png");
            imagecopy($img, $label, $x,$y-10, 0,0, 210,14);
            //$x += 208;
            $y += 18;
            $x += ttfprint($today['rashodev']." м /c", $x, $y, $white, 12);
            ttfprint("3", $x-15, $y-4, $white, 7);
        }

        // --- ЭВ
        if ($today['rashodbv']) {
            $x = $start_x+20;
            $y += 15;
            $label = imagecreatefrompng("$img_dir/label_rashodbv.png");
            imagecopy($img, $label, $x,$y-10, 0,0, 210,14);
            //$x += 160;
            $y += 18;
            $x += ttfprint($today['rashodbv']." м /c", $x, $y, $white, 12);
            ttfprint("3", $x-15, $y-4, $white, 7);
        }

    // --------------------------------
    $x = $start_x;
    $y += 33;
    $label = imagecreatefrompng("$img_dir/label_levelnb.png");
    imagecopy($img, $label, $x,$y-12, 0,0, 150,16);
    //$x += 153;
    $y += 20;
    $x += ttfprint(sprintf("%.02f",$today['levelnb'])." м", $x, $y, $white, 13);
    if ($yesterday['levelvb']) {
        $diff = sprintf("%.02f", $today['levelnb'] - $yesterday['levelnb']);
        if ($diff !== "0,00" && $diff[0]!=="-") {
            ttfprint(" (   +$diff)", $x, $y, $yellow, 13);
            triangle($x+9, $y-2, $blue, "up");
        } elseif ($diff[0]==='-') {
            ttfprint(" (   $diff)", $x, $y, $yellow, 13);
            triangle($x+9, $y-2, $blue, "down");
        }
    }

    //header("Content-type: image/jpg");
    imagejpeg($img, $filename, 100);
}

?>

    <a href="<?=RhdHandler::getSiteRoot()?>images/ssh_informer/<?=($mode === 'current' ? 'current' : $currentDate)?>.jpg" rel="prettyPhoto[gallery]"><img width="620" id="hydrologyImg" src="<?=RhdHandler::getSiteRoot()?>images/ssh_informer/<?=($mode === 'current' ? 'current' : $currentDate)?>.jpg" /></a><br/>
    <div style="position:relative; width:290px; left:365px;top:-63px; color:#fff; font-weight:bold;">
        Выберите дату:
        <select onChange="location.href='<?=RhdHandler::getCurrentPath()?>?'+this[this.selectedIndex].value;">
            <?php $dayIndex = 0; foreach ($dayList as $date => $textDate) { $dayIndex++; ?>
              <option value="<?=$date?>"<?=($currentDate && $currentDate == $date) || (!$currentDate && $dayIndex === 1) ? ' selected' : ''?>><?=$textDate?></option>
            <?php } ?>
        </select>
    </div>

    <div style="margin:0px;" class="form_feedback">
        <br/><p><b>Код для вставки в блог:</b></p><br/>
        <div class="txtarea" style="margin:0px;">
            <i></i><i class="rht"></i>
            <textarea onFocus="this.select();" onClick="this.select();" style="width:100%; height:50px;" wrap="virtual">&lt;a href=&quot;<?=RhdHandler::getSiteRoot()?>hpp/hydrology/&quot; target=&quot;_blank&quot;&gt;&lt;img src=&quot;<?=RhdHandler::getSiteRoot()?>images/ssh_informer/current.jpg&quot; width=&quot;800&quot; border=&quot;0&quot; /&gt;&lt;/a&gt;</textarea>
            <div class="clear"></div>
            <i class="btm"></i>
            <i class="rht_btm rht"></i>
        </div>
    </div>
