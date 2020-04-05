<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>gmaps</title>
		<script type="text/javascript">
			var engVersion = <?=isset($_REQUEST["eng"]) ? 1 : 0?>;
		</script>
		<link type="text/css" rel="stylesheet" href="common.css" />
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js"></script>
		<script type="text/javascript" src="https://maps-api-ssl.google.com/maps/api/js?v=3&sensor=false&libraries=geometry<?if (isset($_REQUEST["eng"])){echo '&language=en';}?>"></script>
		<script type="text/javascript" src="js/map.js"></script>
		<script type="text/javascript" src="js/app.js"></script>
	</head>
	<body>
		<script type="text/javascript">
			CLIENT_PATH = '/tracing/';
			$(startApplication);
		</script>

		<div id="map" class="block" style="margin-bottom:20px; float:none;"></div>
		<p><b><?if (isset($_REQUEST["eng"])){?>The Information on Vessel’s location is updated daily.<?}else{?>Информация о местонахождении судна обновляется один раз в сутки.<?}?></b></p>
		<div id="legend"></div>
		
		<h2><?if (isset($_REQUEST["eng"])){?>Legend<?}else{?>Условные обозначения<?}?></h2>
		<div class="markers_trace">
			<p class="markers_1"><?if (isset($_REQUEST["eng"])){?>St. Petersburg - route start<?}else{?>Санкт-Петербург - старт маршрута<?}?></p>
			<p class="markers_2"><?if (isset($_REQUEST["eng"])){?>Dudinka<?}else{?>Дудинка<?}?></p>
			<p class="markers_3"><?if (isset($_REQUEST["eng"])){?>Krasnoyarsk – transshipment to the river vessel<?}else{?>Красноярск - перегрузка на речное судно<?}?></p>
			<p class="markers_4"><?if (isset($_REQUEST["eng"])){?>Maynskaya HPP - transshipment to the land heavy transport<?}else{?>Майнская ГЭС - перегрузка на сухопутный тяжелый транспорт<?}?></p>
			<p class="markers_5"><?if (isset($_REQUEST["eng"])){?>Sayano-Shushenskaya HPP - final destination <?}else{?>СШГЭС - конечная точка маршрута<?}?>
			</p>
		</div>
	</body>
</html>