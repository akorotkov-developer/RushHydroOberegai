<!DOCTYPE html>
<!--[if lt IE 7]><html class="lt-ie9 lt-ie8 lt-ie7 ie-6 ie" xmlns:og="http://ogp.me/ns#" id="nojs"><![endif]-->
<!--[if IE 7]><html class="lt-ie9 lt-ie8 ie-7 ie" xmlns:og="http://ogp.me/ns#" id="nojs"> <![endif]-->
<!--[if IE 8]><html class="lt-ie9 ie-8 ie" xmlns:og="http://ogp.me/ns#" id="nojs"><![endif]-->
<!--[if IE 9]><html class="ie-9 ie" xmlns:og="http://ogp.me/ns#" id="nojs"><![endif]-->
<!--[if gt IE 9]><!--><html xmlns:og="http://ogp.me/ns#" id="nojs"><!--<![endif]-->
<head>
	<title>География РусГидро</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<link rel="stylesheet" href="/geography/map.css?3">
</head>
<?$arText = array(
	"RU"=>'Для просмотра объектов по отдельным категориям выберите необходимый критерий',
	"EN"=>'Choose required settings to view objects by certain categories'
)?>
<body>
	<div class="w-imap-wrap">
		<div class="w-imap-line-top"></div>
		<div class="w-imap">
			<div class="w-imap-points">
			</div>

			<div class="w-imap-tooltip"></div>
		</div>
		<div class="w-imap-line-bottom">
			<div class="w-imap-filter">
				<p class="w-imap-filter-title">Фильтрация объектов на карте:</p>
				<p class="categories_p" style="font-size: 10px;margin: -7px 0 10px 18px;text-align: left;"><?if ($_SERVER['HTTP_HOST'] == 'www.eng.rushydro.ru'){ echo $arText["RU"];} else { echo $arText["RU"]; }?></p>
				<div class="w-imap-filter-group for_power">
					<a href="javascript:void(0)" class="w-imap-filter-item index_1 active"><i></i>100</a>
					<a href="javascript:void(0)" class="w-imap-filter-item index_2 active"><i></i>750</a>
					<a href="javascript:void(0)" class="w-imap-filter-item index_3 active"><i></i>1 500</a>
					<a href="javascript:void(0)" class="w-imap-filter-item index_4 active"><i></i>3 000</a>
					<a href="javascript:void(0)" class="w-imap-filter-item index_5 active"><i></i>6 000</a>
				</div>
				<div class="w-imap-filter-group for_type">
				</div>
			</div>
		</div>
		<div class="w-imap-legend">
			<div class="w-imap-legend_cont"></div>
		</div>
	</div>
	<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
	<script src="/geography/mootools-lightcore-1.4.5.js"></script>
	<script src="/geography/imap.rushydro.js?14"></script>
	<script>initImap1(".w-imap-wrap", <?if ($_SERVER['HTTP_HOST'] == 'www.eng.rushydro.ru'){ echo '"en"';} else { echo '"ru"'; }?>);</script>
</body>
</html>