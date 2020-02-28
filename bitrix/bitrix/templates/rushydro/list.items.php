<div class="main_new news_list">
<div class="m_news">
<? foreach($items as $item): ?>
<? if($item['PROPERTY_SHOW_DATE_VALUE']): ?>
<div class="item">
<span><?=preg_replace('/(\d+)\.(\d+)\.(\d+).*$/i', '\\1.\\2<br/>\\3', $item['DATE_ACTIVE_FROM'])?></span>
<a href="<?=$item['URL']?>"><?=parseTitle($item['~NAME'])?></a>
</div>
<? else: ?>
<div class="item no_date">
<a href="<?=$item['URL']?>"><?=parseTitle($item['~NAME'])?></a>
</div>
<? endif; ?>
<? endforeach; ?>
</div>
</div>
<?=$pagination?>