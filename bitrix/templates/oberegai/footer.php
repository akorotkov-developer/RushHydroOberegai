<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
IncludeTemplateLangFile(__FILE__);
?> 
<?$dir = $APPLICATION->GetCurDir();?>
			</div>
		</div>
		<i class="grad-btm"></i>
		<?if ($dir == "/" && ERROR_404 != "Y"){?>
			
			<script type="text/javascript">
				var swfVersionStr = "10.2.153";
				var xiSwfUrlStr = "";
				var flashvars = {};
				var params = {};
				params.quality = "high";
				params.bgcolor = "#ffffff";
				params.play = "true";
				params.loop = "true";
				params.wmode = "transparent";
				params.scale = "showall";
				params.menu = "true";
				params.devicefont = "false";
				params.salign = "";
				params.allowscriptaccess = "always";
				var attributes = {};
				attributes.id = "animationChild";
				attributes.name = "animation";
				attributes.align = "middle";
				swfobject.embedSWF(
					"<?=SITE_TEMPLATE_PATH?>/flash/chidrens.swf", "heroes",
					"100%", "100%",
					swfVersionStr, xiSwfUrlStr,
					flashvars, params, attributes);
				var attributes = {};
				attributes.id = "animationTrash";
				attributes.name = "animationTrashN";
				attributes.align = "middle";
				swfobject.embedSWF(
					"<?=SITE_TEMPLATE_PATH?>/flash/trash.swf", "trash",
					"100%", "100%",
					swfVersionStr, xiSwfUrlStr,
					flashvars, params, attributes);
			</script>
			<div class="trash"><div id="trash"></div></div>
		<?}?>
		<div class="b-weather">		 
		<?php
			function weather2icon($weather) {
				$weather = strtolower($weather);
				$icons = array(
					'clear' => 'clear',
					'snow' => 'snow',
					'rain' => 'rain',
					'cloud' => 'cloud',
					'overcast' => 'cloud',
				);

				foreach ($icons as $word => $icon) {
					if (strpos($weather, $word) !== false) return $icon;
				}
			}

			function isNight(DateTime $dt)
			{
				return (int) $dt->format('G') >= 22 || ((int) $dt->format('G') < 7 && (int) $dt->format('i') <= 59);
			}

			$w = new Wunderground(WUNDERGROUND_KEY);
			$cities = array(
				'Москва' 		=> array('zmw:00000.1.WUUBW', 'Europe/Moscow'),				// + 4
				'Пермь' 		=> array('Russia/Perm\'', 'Asia/Yekaterinburg'),		// + 6
				'Красноярск'	=> array('zmw:00000.1.WUNKL', 'Asia/Krasnoyarsk'),		// + 8
				'Благовещенск' 	=> array('zmw:00000.1.31512', 'Asia/Yakutsk'),		// + 10
			);


			$weather = array();
			$nights = array();
			$dt = new DateTime;
			$i = 0;
			foreach ($cities as $name => $data) {
				list($location, $timezone) = $data;
				$c = $w->conditionsSimplified($location);
				$weather[$name] = array(
					'temp' => $c['temp'] > 0 ? '+'.$c['temp'] : $c['temp'],
					'icon' => weather2icon($c['weather']),
				);
				$localDT = clone $dt;

				$localDT->setTimezone(new DateTimeZone($timezone));
				$nights[$name] = isNight($localDT);
				$i++;
					
				echo '<div class="b-weather_item" data-id="'.$i.'" data-hours="'.$localDT->format('H').'" data-minutes="'.$localDT->format('i').'" data-seconds="'.$localDT->format('s').'"><div class="b-weather_time"><canvas id="b-weather_clock-'.$i.'" height="150" width="150"></canvas></div><div class="b-weather_city">'.$name.'</div><div class="b-weather_'.$weather[$name]['icon'].' '.($nights[$name] ? 'night' : '').'">'.$weather[$name]['temp'].' &#176;C</div></div>';
			}
			

		?>
		</div>
	</div>
	<!--LiveInternet counter-->
	<script type="text/javascript"><!--
	new Image().src = "//counter.yadro.ru/hit?r"+
	escape(document.referrer)+((typeof(screen)=="undefined")?"":
	";s"+screen.width+"*"+screen.height+"*"+(screen.colorDepth?
	screen.colorDepth:screen.pixelDepth))+";u"+escape(document.URL)+
	";"+Math.random();//--></script>
	<!--/LiveInternet-->
	<div id="footer-wrap">
		<div id="footer">
			<div class="footer-icons">
				<div class="logo"></div>
				<a title="Поделиться ВКонтакте" onclick="window.open('http://vkontakte.ru/share.php?url='+encodeURIComponent(location.href),'vkontakte','width=600,height=600');return false;" rel="nofollow" href="http://vkontakte.ru/" class="vk"></a><!--
			 --><a title="Поделиться в Facebook" rel="nofollow" href="http://www.facebook.com/" onclick="window.open('http://www.facebook.com/sharer.php?u='+encodeURIComponent(location.href),'facebook','width=600,height=600');return false;" class="fb"></a><!--
			 --><a title="Опубликовать в Twitter" onclick="window.open('http://twitter.com/home?status='+encodeURIComponent(document.title)+': '+encodeURIComponent(location.href),'twitter','width=600,height=600');return false;" rel="nofollow" href="http://twitter.com/" class="tw"></a><!--
			 --><a title="Поделиться В Моем Мире" onclick="window.open('http://connect.mail.ru/share?share_url='+encodeURIComponent(location.href),'mail','width=600,height=600');return false;" rel="nofollow" href="http://connect.mail.ru/" class="mr"></a><!--
			 --><a href="http://www.liveinternet.ru/click" target="_blank"><img src="//counter.yadro.ru/logo?45.1" title="LiveInternet" alt="" border="0" width="38" height="38" style="margin: 0;"/></a>
			</div>
			&copy; ПАО «РусГидро» 2006-2020<br/>
			Москва, ул. Малая Дмитровка, д.7 <br/>
			117393, Москва, ул. Архитектора Власова, д.51
		</div>
	</div>
<!-- Yandex.Metrika counter -->
<script type="text/javascript" >
(function (d, w, c) {
(w[c] = w[c] || []).push(function() {
try {
w.yaCounter39233995 = new Ya.Metrika({
id:39233995,
clickmap:true,
trackLinks:true,
accurateTrackBounce:true,
webvisor:true
});
} catch(e) { }
});
var n = d.getElementsByTagName("script")[0],
s = d.createElement("script"),
f = function () { n.parentNode.insertBefore(s, n); };
s.type = "text/javascript";
s.async = true;
s.src = "https://mc.yandex.ru/metrika/watch.js";
if (w.opera == "[object Opera]") {
d.addEventListener("DOMContentLoaded", f, false);
} else { f(); }
})(document, window, "yandex_metrika_callbacks");
</script>
<noscript><div><img src="https://mc.yandex.ru/watch/39233995" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->
</body>
</html>