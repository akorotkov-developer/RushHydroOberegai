<?php
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Архивация файлов");
?>
<h1>Архивация файлов</h1>
<script type="text/javascript">
	$(function(){
		var countFiles = $("#archive-st-files input[type=checkbox]").length;
		$("#archive-st-select-all").click(function(){
			var countSelectFiles = $("#archive-st-files input[type=checkbox]:checked").length;
			if (countFiles > countSelectFiles)
				$("#archive-st-files input[type=checkbox]").attr("checked", true);
			else 
				$("#archive-st-files input[type=checkbox]").attr("checked", false);
			return false;
		});
		
		$("a.ar-st-f_select").click(function(){
			var countGroupFiles = $("#bl-" + $(this).data("id-item") + " input[type=checkbox]").length;
			var countGroupSelectFiles = $("#bl-" + $(this).data("id-item") + " input[type=checkbox]:checked").length;
			if (countGroupFiles > countGroupSelectFiles)
				$("#bl-" + $(this).data("id-item") + " input[type=checkbox]").attr("checked", true);
			else
				$("#bl-" + $(this).data("id-item") + " input[type=checkbox]").attr("checked", false);
			return false;
		});
	})
</script>
<div id="archive-st-files">
	<div class="item" id="bl-ar-files-1">
		<a href="#" data-id-item="ar-files-1" class="ar-st-f_select">Выбрать все</a>
		<div class="ar-st-f_head">Отчёты</div>
		<div class="ar-st-f_line"></div>
		<div class="ar-st-f_file"><a href="">Кодекс корпоративного управления ОАО «РусГидро»</a><input type="checkbox" /></div>
		<div class="ar-st-f_file"><a href="">Кодекс корпоративного управления ОАО «РусГидро»</a><input type="checkbox" /></div>
		<div class="ar-st-f_file"><a href="">Отчет о соблюдении Кодекса Корпоративного поведения за 2008 г.</a><input type="checkbox" /></div>
		<div class="ar-st-f_file"><a href="">Кодекс корпоративного управления ОАО «РусГидро»</a><input type="checkbox" /></div>
	</div>
	<div class="item" id="bl-ar-files-2">
		<a href="#" data-id-item="ar-files-2" class="ar-st-f_select">Выбрать все</a>
		<div class="ar-st-f_head">Постановления</div>
		<div class="ar-st-f_line"></div>
		<div class="ar-st-f_file"><a href="">Кодекс корпоративного управления ОАО «РусГидро»</a><input type="checkbox" /></div>
		<div class="ar-st-f_file"><a href="">Кодекс корпоративного управления ОАО «РусГидро»</a><input type="checkbox" /></div>
		<div class="ar-st-f_file"><a href="">Отчет о соблюдении Кодекса Корпоративного поведения за 2008 г.</a><input type="checkbox" /></div>
		<div class="ar-st-f_file"><a href="">Кодекс корпоративного управления ОАО «РусГидро»</a><input type="checkbox" /></div>
	</div>
	<div class="item" id="bl-ar-files-3">
		<a href="#" data-id-item="ar-files-3" class="ar-st-f_select">Выбрать все</a>
		<div class="ar-st-f_head">Кодекс</div>
		<div class="ar-st-f_line"></div>
		<div class="ar-st-f_file"><a href="">Кодекс корпоративного управления ОАО «РусГидро»</a><input type="checkbox" /></div>
		<div class="ar-st-f_file"><a href="">Кодекс корпоративного управления ОАО «РусГидро»</a><input type="checkbox" /></div>
		<div class="ar-st-f_file"><a href="">Отчет о соблюдении Кодекса Корпоративного поведения за 2008 г.</a><input type="checkbox" /></div>
		<div class="ar-st-f_file"><a href="">Кодекс корпоративного управления ОАО «РусГидро»</a><input type="checkbox" /></div>
	</div>
</div>
<a href="#" id="archive-st-select-all">Выбрать все</a>
<a href="#" id="archive-st-download">Скачать выбранное</a>
<?php
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");