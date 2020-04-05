<?php
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Архив файлов");

if ($USER->IsAuthorized()||true) {
	$fa = new FileArchive;

	if ($_POST['ids'] && ($url = $fa->getArchive($_POST['ids']))) {
		LocalRedirect($url);
		exit;
	}

	$sections = array();

	$sections['Бухгалтерская отчетность по МСФО'] 	= $fa->getFiles(4376);
	$sections['Бухгалтерская отчетность по РБСУ'] 	= $fa->getFiles(4383);
	$sections['Годовые отчёты'] 					= $fa->getFiles(4374);
	//$sections['Ежеквартальные отчёты эмитента'] 	= $fa->getFiles(4411);

	$sections['IR презентации'] 					= $fa->getFiles(8196);
	$sections['Презентации результатов'] 			= $fa->getFiles(8197);
	$sections['Ежеквартальные отчеты эмитента'] 	= $fa->getFiles(4411);
	$sections['Информация по итогам общих собраний акционеров Общества'] = $fa->getFiles(4430);
	//$sections['Внутренние документы компании'] = $fa->getFiles(7683);

?>
<h1>Архив файлов</h1>
<script type="text/javascript">
	$(function(){
		var countFiles = $("#archive-st-files input[type=checkbox]").length;
		$("#archive-st-select-all").click(function(){	
			var countSelectFiles = $("#archive-st-files input[type=checkbox]:checked").length;
			if (countFiles > countSelectFiles) {
				$("#archive-st-files input[type=checkbox]").attr("checked", true);
				$("#archive-st-files .ar-st-f_file").addClass("ar-st-f_act");
			}
			else {
				$("#archive-st-files input[type=checkbox]").attr("checked", false);
				$("#archive-st-files .ar-st-f_file").removeClass("ar-st-f_act");
			}
			return false;
		});

		$('#archive-st-download').click(function(e) {
			e.preventDefault();
			$('#archive-form').submit();
		});
			
		$("a.ar-st-f_select").click(function(){
			var countGroupFiles = $("#bl-" + $(this).data("id-item") + " input[type=checkbox]").length;	
			var countGroupSelectFiles = $("#bl-" + $(this).data("id-item") + " input[type=checkbox]:checked").length;
			if (countGroupFiles > countGroupSelectFiles) {
				$("#bl-" + $(this).data("id-item") + " input[type=checkbox]").attr("checked", true);
				$("#bl-" + $(this).data("id-item") + " .ar-st-f_file").addClass("ar-st-f_act");
			}
			else {
				$("#bl-" + $(this).data("id-item") + " input[type=checkbox]").attr("checked", false);
				$("#bl-" + $(this).data("id-item") + " .ar-st-f_file").removeClass("ar-st-f_act");
			}
			return false;
		});
		
		$(".ar-st-f_file").click(function(){
			if (!$(this).hasClass("ar-st-f_act")){
				$(this).addClass("ar-st-f_act");
				$(this).find("input[type=checkbox]").attr("checked", true);
			}
			else
			{
				$(this).removeClass("ar-st-f_act");
				$(this).find("input[type=checkbox]").attr("checked", false);
			}
		});
	})
</script>
<form id="archive-form" method="POST" target="_blank">
<div id="archive-st-files">
	<?php $i = 0; foreach ($sections as $section => $files): $i++; ?>
		<div class="item" id="bl-ar-files-<?=$i?>">
			<a href="#" data-id-item="ar-files-<?=$i?>" class="ar-st-f_select">Выбрать все</a>
			<div class="ar-st-f_head"><?=$section?></div>
			<div class="ar-st-f_line"></div>
			<?php foreach ($files as $file):?>
				<div class="ar-st-f_file ar-st-f_<?=$file['type']?>"><a href="<?=$file['url']?>"><?=$file['name']?></a><input type="checkbox" name="ids[]" value="<?=$file['id']?>" /></div>
			<?php endforeach?>
		</div>
	<?php endforeach?>
</div>
<a href="#" id="archive-st-select-all">Выбрать все</a>
<a href="#" id="archive-st-download">Скачать выбранное</a>
</form>
<?php


}
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");