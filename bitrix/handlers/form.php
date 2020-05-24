<?php
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");

if ($_GET["tst"] == "tst") {
    echo "<pre>";
    var_dump($APPLICATION->GetTemplatePath('form.php'));
    echo "</pre>";
}

$APPLICATION->IncludeFile(
	$APPLICATION->GetTemplatePath('form.php'),
	array(),
	Array("MODE"=>"html")
);

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");