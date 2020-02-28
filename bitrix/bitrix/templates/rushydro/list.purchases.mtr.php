
<?php $APPLICATION->IncludeFile(
	$APPLICATION->GetTemplatePath('purchases.filter.php'),
	compact('cat1', 'cat1List', 'cat2', 'cat2List', 'isArchive'),
	Array("MODE"=>"html")
);?>
<div class="zak_mtr">
	<a href="<?=RhdHandler::getCurrentPath().'?cat1='.$cat1.'&cat2='.$cat2.($isArchive ? '' : '&archive=1')?>" class="purchases_arch"><?=$isArchive ? 'текущие продажи' : 'архив продаж'?></a>
	<h1><?=$isArchive ? 'Архив продаж' : 'Текущие продажи'?></h1>
	<table cellspacing="0" cellpadding="0" width="100" class="coolTable" style="line-height:1.2em;">
		<tr class="tbl_h">
			<td>Дата публикации</td>
			<td>Уведомление о продаже</td>
			<td>Тип продажи</td>
			<td>Организация</td>
			<td>Дата и время подачи предложений</td>
			<td>Итоги процедуры</td>
			<td>Комментарии</td>
		</tr>
		<?php foreach ($items as $item) { ?>
			<tr>
				<td><?=($item['PROPERTY_SHOW_DATE_VALUE']) ? mb_substr($item['DATE_CREATE'], 0, 11) : ''?></td>
				<td><a href="<?=CFile::GetPath($item['PROPERTY_MTR_TITLE_FILE_VALUE'])?>"><?=$item['NAME']?></a></td>
				<td><?=$item['PROPERTY_PURCHASE_CATEGORY_MTR_1_VALUE']?></td>
				<td><?=$item['PROPERTY_PURCHASE_CATEGORY_MTR_2_VALUE']?></td>
				<td><?=$item['PREVIEW_TEXT']?></td>
				<td><?=$item['PROPERTY_MTR_ITOGI_FILE_VALUE'] ? '<a href="'.CFile::GetPath($item['PROPERTY_MTR_ITOGI_FILE_VALUE']).'">Результаты</a>' : ''?></td>
				<td><?=$item['PROPERTY_MTR_COMMENTS_FILE_VALUE'] ? '<a href="'.CFile::GetPath($item['PROPERTY_MTR_COMMENTS_FILE_VALUE']).'">Комментарии</a>' : ''?></td>
			</tr>
		<?php } ?>	
	</table>
</div>