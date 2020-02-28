<div class="nav">
<?php 
if ($bcSections = RhdHandler::getSections()) {
	$bcPath = ''; 
	$i = 0;
	
	$bcSections = 
		array_merge(
			array(
				RhdHandler::getSiteRoot(true) => RhdHandler::getSite()
			),
			$bcSections
		);
	
	foreach ($bcSections as $bcCode => $bcData) {
		$i++;
		if ($i === count($bcSections) && RhdHandler::getType() !== 'detail') {
			break;
		}

		$bcCode = is_numeric($bcCode) ? $bcData['CODE'] : $bcCode;

		$bcPath .= $bcCode.'/';
		if ($i === 1 && RhdHandler::getSectionDepth() > 1) continue;
		
		if (strpos($bcData['NAME'], 'href')) {
			echo html_entity_decode($bcData['NAME']);
		}
		else {
			echo '<a href="'.$bcPath.'">'.$bcData['NAME'].'</a>';
		}
		/*if ($i !== count($bcSections)) {
			echo '&nbsp;&rarr;&nbsp;';
		}*/
	} 
}
?>
	<span></span><div class="clear"></div>
</div>