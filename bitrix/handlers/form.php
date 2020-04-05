<?php
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");

$APPLICATION->IncludeFile(
	$APPLICATION->GetTemplatePath('form.php'),
	array(),
	Array("MODE"=>"html")
);

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");