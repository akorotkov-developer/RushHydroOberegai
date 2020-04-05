<?
$_SERVER['DOCUMENT_ROOT'] = realpath(__DIR__.'/');
require $_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/prolog_before.php';
CModule::IncludeModule("iblock");
$countMatch = 0;
$matchElements = array();
$blockIds = array(185,187);
for ($i = 0; $i < count($blockIds); $i++){
	$rsElements = CIBlockElement::GetList(array(),array(
			'IBLOCK_ID' => $blockIds[$i],
		),
	);
	while ($el = $rsElements->GetNext()) {
		preg_match_all("/<img .* src="images\/stories.*".*>/", $el['DETAIL_TEXT'], $output_array);
		if(count($output_array)){
			$countMatch++;
			$matchElements[];
		}
	}
}

echo 'Совпадающих элементов: '.$countMatch;