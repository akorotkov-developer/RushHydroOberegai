<?php 
//global $table;
//$table = '<table style="display:none">';

$counter = 1;
function renderSection($sections, $byParent, $sectionId = 0, $path = '') {

global $table;
	if ($sectionId) {
		$path .= '/'.$sections[$sectionId]['CODE'];
	}
	
	if (empty($byParent[$sectionId])) $addClass = "no_sect"; else $addClass = "";
	if ($sectionId) {
        //$table .= '<tr><td>' . $sections[$sectionId]['NAME'] . '</td><td>' . RhdPath::createUrl(RhdHandler::getSiteCode(), $path) . '</td><td>' . $sections[$sectionId]['TIMESTAMP_X'] . '</td></tr>';
		echo '<div class="sitemap '.$addClass.'"><i></i><div>'.(strpos($sections[$sectionId]['NAME'], 'href') !== false ? html_entity_decode($sections[$sectionId]['NAME']) : '<a href="'.RhdPath::createUrl(RhdHandler::getSiteCode(), $path).'">'.$sections[$sectionId]['NAME'].'</a>').'</div>';
    }
	
	if (!empty($byParent[$sectionId])) {
		foreach ($byParent[$sectionId] as $subSectionId => $subSection) {
			renderSection($sections, $byParent, $subSectionId, $path);
		}
	}
	echo '</div>';
}
?>
<h1 class="header_doc"><?=RhdHandler::isEnglish() ? 'Site map' : 'Карта сайта'?></h1>
<div class="clear"></div>
<?php renderSection($sections, $byParent); ?>
<?php// $table .= '</table>';
//echo $table; ?>