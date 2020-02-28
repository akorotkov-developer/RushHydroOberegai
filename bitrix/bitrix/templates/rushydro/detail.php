<?php global $disclaimers; $langKey = RhdHandler::isEnglish() ? 'en' : 'ru'; if ($element['PROPERTY_NEED_DISCLAIMER_VALUE']): ?>
	<div id="disclaimer1">
		<div align="justify">
			<?php echo $disclaimers[$langKey][$disclaimerType][0]['text']; ?>
			<div style="padding-left:150px;">
				<div class="btn_sbmt"><i></i><span><?php echo $disclaimers[$langKey][$disclaimerType][0]['accept']; ?></span><input type="button" value="<?php echo $disclaimers[$langKey][$disclaimerType][0]['accept']; ?>" onClick="$('#disclaimer1').hide();$('#disclaimer2').show();"></div>
				<div class="btn_sbmt" style="margin-left:20px;"><i></i><span><?php echo $disclaimers[$langKey][$disclaimerType][0]['cancel']; ?></span><input type="button" value="<?php echo $disclaimers[$langKey][$disclaimerType][0]['cancel']; ?>" onClick="window.location='/'"></div>
			</div>
		</div>
		<br/>
		<br/>
	</div>

	<div id="disclaimer2" style="display:none">
			<div align="justify">
				<?php echo $disclaimers[$langKey][$disclaimerType][1]['text']; ?>
				<div style="padding-left:230px;">
					<div class="btn_sbmt"><i></i><span><?php echo $disclaimers[$langKey][$disclaimerType][1]['accept']; ?></span><input type="button" value="<?php echo $disclaimers[$langKey][$disclaimerType][1]['accept']; ?>" onClick="$('#disclaimer2').hide();$('#disclaimer_content').show();  $('body, html').animate({scrollTop: 100}, 300);"></div>
					<div class="btn_sbmt" style="margin-left:20px;"><i></i><span><?php echo $disclaimers[$langKey][$disclaimerType][1]['cancel']; ?></span><input type="button" value="<?php echo $disclaimers[$langKey][$disclaimerType][1]['cancel']; ?>" onClick="window.location='/'"></div>
				</div>
			</div>
		<br/>
		<br/>
	</div>
	<div id="disclaimer_content" style="display:none">
<?php endif; ?>

<div class="news_date">
	<?php if ($element['PROPERTY_SHOW_DATE_VALUE']) { ?><strong><?=substr($element['DATE_ACTIVE_FROM'], 0, 10)?></strong><br/><?php } ?>
	<a href="<?=$APPLICATION->GetCurPageParam("print=y");?>" class="news_print" target="_blank"><?php if (RhdHandler::isEnglish()) { ?>printable version<?}else{?>версия для печати<?}?></a><br/>
	<a href="<?=RhdPath::createUrl(RhdHandler::getSiteCode(), 'rss/'.RhdHandler::getJustPath())?>" class="news_rss"><?php if (RhdHandler::isEnglish()) { ?>RSS<?}else{?>RSS лента<?}?></a>
</div>
<h1 class="header_doc"><?=$element['~NAME']?></h1>
<div class="clear"></div>

<div class="news_cont">
	<?=$element['DETAIL_TEXT']?>

    <div class="social-likes social-likes-detail" data-counters="no">
        <div class="social-likes-item facebook" title="Поделиться ссылкой на Фейсбуке">facebook</div>
        <div class="social-likes-item twitter" title="Поделиться ссылкой в Твиттере">twitter</div>
        <div class="social-likes-item vkontakte" title="Поделиться ссылкой во Вконтакте">вконтакте</div>
        <div class="social-likes-item odnoklassniki" title="Поделиться ссылкой в Одноклассниках">одноклассники</div>
        <div class="social-likes-item plusone" title="Поделиться ссылкой в Гугл-плюсе">google+</div>
        <div class="social-likes-item mailru" title="Поделиться ссылкой в Моём мире">мой мир</div>
    </div>
    <div class="clear"></div>
	<script type="text/javascript">
		jQuery(document).ready(function() {
			jQuery('#gallery ul').jcarousel();
			$("#gallery .jcarousel-next").mousedown(function(){
				if (!$("#gallery .jcarousel-next").hasClass("jcarousel-next-disabled"))
					$(this).addClass("btnClick-next");
			});
			$("#gallery .jcarousel-next").mouseup(function(){$(this).removeClass("btnClick-next")});
			$("#gallery .jcarousel-next").mouseleave(function(){$(this).removeClass("btnClick-next")});

			$("#gallery .jcarousel-prev").mousedown(function(){
				if (!$("#gallery .jcarousel-prev").hasClass("jcarousel-prev-disabled"))
					$(this).addClass("btnClick-prev");
			});
			$("#gallery .jcarousel-prev").mouseup(function(){$(this).removeClass("btnClick-prev")});
			$("#gallery .jcarousel-prev").mouseleave(function(){$(this).removeClass("btnClick-prev")});
		});
	</script>
	<div style="margin-top:25px">
		<?php $APPLICATION->IncludeFile(
			$APPLICATION->GetTemplatePath('gallery.php'),
			compact('gallery'),
			Array("MODE"=>"html")
		);?>
	</div>
	<?if (!empty($element['TAGS'])){?>
		<noindex>
		<div class="tags">
			<span>Тэги:</span>
			<?php
				$tags = explode(',', $element['TAGS']);
				$tags = array_map('trim', $tags);
				$tags = array_unique($tags);
				$tags = array_filter($tags);
				$tags = array_values($tags);
				foreach ($tags as $index => $tag) { if ($index) echo ', '; ?><a href="<?=RhdPath::createUrl(RhdHandler::getSiteCode(), 'tags/?tags='.rawurlencode(trim($tag)), null, true)?>"><?=trim($tag)?></a><?php } ?>
		</div>
		</noindex>
	<?}?>
	<?php if ($element['PROPERTY_SHOW_DISCLAIMER_VALUE']) {?>
		<div class="note"><?=html_entity_decode($element['PROPERTY_DISCLAIMER_TEXT_VALUE']['TEXT'])?></div>
	<?php }?>
	<?php if (RhdHandler::isAtNews()) { ?>
	  <div class="nav_news">
		  <div class="prev_news" id="prev_news">
			  <div class="n_wrap">
				  <?php if ($prevElement) { ?>
					  <?php if ($prevElement['PROPERTY_SHOW_DATE_VALUE']) { ?>
					  	<div class="n_date"><?=substr($prevElement['DATE_ACTIVE_FROM'], 0, 10)?></div>
					  <?php } ?>
					  <?=$prevElement['NAME']?>
				  <?php } ?>
			  </div>
			  <div class="n_arr"></div>
		  </div>
		  <div class="next_news" id="next_news">
			  <div class="n_wrap">
				  <?php if ($nextElement) { ?>
				  	  <?php if ($nextElement['PROPERTY_SHOW_DATE_VALUE']) { ?>
					  	<div class="n_date"><?=substr($nextElement['DATE_ACTIVE_FROM'], 0, 10)?></div>
					  <?php } ?>
					  <?=$nextElement['NAME']?>
				  <?php } ?>
			  </div>
			  <div class="n_arr"></div>
		  </div>
		  <div class="rht"><?php if ($nextElement) { ?><span class="arr">&rarr;</span><a href="<?=RhdPath::createUrl(RhdHandler::getSiteCode(), RhdHandler::getJustPath(), $nextElement);?>" id="next_news_arr"><?=RhdHandler::isEnglish() ? 'next news' : 'следующая новость'?></a><?php } ?></div>
		  <div class="lft"><?php if ($prevElement) { ?><span class="arr">&larr;</span> <a href="<?=RhdPath::createUrl(RhdHandler::getSiteCode(), RhdHandler::getJustPath(), $prevElement);?>" id="prev_news_arr"><?=RhdHandler::isEnglish() ? 'prev news' : 'предыдущая новость'?></a><?php } ?></div>
		  <div class="cnt"><a href="<?=RhdHandler::getCurrentPath(true)?>"><?=RhdHandler::isEnglish() ? 'all news' : 'все новости'?></a></div>
		  <div class="clear"></div>
	  </div>
	<?php } ?>
</div>

<?php if ($element['PROPERTY_NEED_DISCLAIMER_VALUE']): ?>
	</div>
<?php endif; ?>
