<!DOCTYPE html>
<html lang="ru">
<head>

<meta http-equiv="Content-type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="IE=edge" />

<title>Изменения уровней водохранилищ ГЭС РусГидро</title>

<link href="styles/style.css?201804191859" rel="stylesheet" type="text/css">

<script src="scripts/jquery-v1.12.js" type="text/javascript"></script>
<script src="assets/jquery-ui/jquery-ui.min-v1.12.js" type="text/javascript"></script>

<script src="assets/fancybox/jquery.fancybox.js" type="text/javascript"></script>
<link href="assets/fancybox/jquery.fancybox.css" rel="stylesheet" type="text/css">

<script src="assets/validate/jquery.validate.min.js" type="text/javascript"></script>
<script src="assets/maskedinput/jquery.maskedinput.min.js" type="text/javascript"></script>

<script src="assets/fancybox/jquery.fancybox.js" type="text/javascript"></script>
<link href="assets/fancybox/jquery.fancybox.css" rel="stylesheet" type="text/css">

<link href="assets/owlslider/owl.carousel.css" rel="stylesheet" type="text/css">
<script src="assets/owlslider/owl.carousel.js" type="text/javascript"></script>

<script src="assets/datepicker/datepicker-ru.js"></script>
<link href="assets/jquery-ui/jquery-ui.css" rel="stylesheet" type="text/css">

<script src="scripts/scripts.js" type="text/javascript"></script>


</head>

<body>

<div class="container">

	<div class="head">

		<div class="head-title">Изменения уровней водохранилищ ГЭС РусГидро</div>
		<div class="head-date"><b>Выберите дату</b><input type="text" id="popupDatepicker" value="<?=date("d.m.Y", strtotime($date));?>" /></div>

		<script>

			$(function(){

				$('.popup-trigger').mouseenter(function(){
					ptop = $(this).position(); ptop = ptop.top+18;
					$('.popup-info').removeClass('active');
					$(this).next('.popup-info').css('top',ptop).addClass('active');
				})

				$('.popup-wrapper').mouseleave(function(){
					$('.popup-info').removeClass('active');
				})

				date = new Date("<?=$dateMax?>");

				function makeCalDate(date) {
					var d_events = date.getDate().toString();
					var m_events = 1 + date.getMonth();
					var y_events = date.getFullYear().toString();
					if(d_events.length < 2) { d_events = "0" + d_events; }
					m_events = m_events.toString();
					if(m_events.length < 2) { m_events = "0" + m_events; }
					var Date_events = d_events +"."+ m_events +"."+ y_events;
					return Date_events;
				}

				dateMax = makeCalDate(date);

				$('#popupDatepicker').datepicker({
					dateFormat: 'dd.mm.yy',
					changeMonth: true,
					changeYear: true,
					maxDate: dateMax,
					minDate: '13.04.2013',
					yearRange: "2013:",
					onSelect: function(dateText,inst) {
						selDay = inst.selectedDay; if(selDay<10) selDay = '0'+selDay;
						selMonth = inst.selectedMonth+1; if(selMonth<10) selMonth = '0'+selMonth;
						document.location.href = '?date=' + inst.selectedYear + '-' + selMonth + '-' +  selDay;
					}

				});
			})

		</script>

	</div>

	<div class="info">

		<div class="info-title">Условные обозначения</div>

		<div class="legend">
			<p><span class="l-red"></span><b>ФПУ</b> – форсированный подпорный уровень, максимальная технически возможная отметка наполнения водохранилища, м</p>
			<p><span class="l-green"></span><b>НПУ</b> - нормальный подпорный уровень, отметка полного наполнения водохранилища в обычных условиях, м</p>
			<p><span class="l-black"></span><b>УМО</b> – уровень мертвого объема, отметка предельной сработки водохранилища, м</p>
		</div>

		<p><b>Уровень</b> - текущая отметка уровня воды в водохранилище на 8:00 (МСК), м</p>
		<p><b>Свободная ёмкость</b> – свободный объем водохранилища, разница между текущим уровнем и НПУ, км<sup>3</sup></p>
		<p><b>Приток</b> – количество воды, поступившей в водохранилище за предыдущие сутки, м<sup>3</sup>/с (среднесуточное значение)</p>
		<p><b>Общий расход</b> – общее количество воды, пропускаемой через гидроузел (турбины и водосбросы) за предыдущие сутки, м<sup>3</sup>/сек (среднесуточное значение)</p>
		<p><b>Расход через водосбросы</b> - количество воды, сбрасываемой через водосбросы мимо турбин за предыдущие сутки, м<sup>3</sup>/с (среднесуточное значение)</p>

	</div>


	<div class="informer">

		<div class="data-block" style="margin-right: 60px">
			<img src="styles/img/informer/zeya.png" alt="" />
			<div class="informer-block zeya">
				<?=printItem(41);?>
			</div>
		</div>

		<div class="data-block" style="margin-right: 60px">
			<img src="styles/img/informer/bureya.png" alt="" />
			<div class="informer-block bureya">
				<?=printItem(40);?>
			</div>
		</div>

		<div class="data-block">
			<img src="styles/img/informer/kolyma.png" alt="" />
			<div class="informer-block kolyma">
				<?=printItem(42);?>
			</div>
			<div class="informer-block ust-sr">
				<?=printItem(43, $prev = 42);?>
			</div>
		</div>

		<div class="data-block">
			<img src="styles/img/informer/volga.png" alt="" />
			<div style="position: relative;z-index: 2;width: 892px;height: 31px;background-color: #ffffff;"></div>
			<div class="informer-block uglich">
				<?=printItem(37);?>
			</div>
			<div class="informer-block rybinsk">
				<?=printItem(34, $prev = 37);?>
			</div>
			<div class="informer-block nijegorod">
				<?=printItem(33, $prev = 34);?>
			</div>

			<div class="informer-block cheboksar">
				<?=printItem(38, $prev = 33);?>
			</div>

			<div class="informer-block jigul">
				<?=printItem(31, $prev = 38);?>
			</div>

			<div class="informer-block saratov">
				<?=printItem(35, $prev = 31);?>
			</div>

			<div class="informer-block voljsk">
				<?=printItem(29, $prev = 35);?>
			</div>

		</div>

		<div class="data-block" style="margin-right: 60px">
			<img src="styles/img/informer/kama.png" alt="" />
			<div class="informer-block kama">
				<?=printItem(32);?>
			</div>
			<div class="informer-block votinsk">
				<?=printItem(30, $prev = 32);?>
			</div>
		</div>

		<div class="data-block" style="margin-bottom: 120px">
			<img src="styles/img/informer/yenisei.png" alt="" />
			<div class="informer-block sayano">
				<?=printItem(36);?>
			</div>
			<div class="informer-comment"><b>*</b> водохранилище Майнской ГЭС сглаживает неравномерность ежесуточных сбросов СШГЭС, когда Саяно-Шушенская ГЭС ведет глубокое регулирование нагрузки в энергосистеме</div>
		</div>

		<div class="data-block" style="margin-right: 60px">
			<img src="styles/img/informer/angara.png" alt="" />
			<div class="informer-block irkutsk">
				<?=printItem(46);?>
			</div>
			<div class="informer-block bratsk">
				<?=printItem(45);?>
			</div>
			<div class="informer-block ust-ilim">
				<?=printItem(44, $prev = 45);?>
			</div>
			<div class="informer-block boguch">
				<?=printItem(28, $prev = 44);?>
			</div>
		</div>

		<div class="data-block">
			<img src="styles/img/informer/ob.png" alt="" />
			<div class="informer-block novosib">
				<?=printItem(39);?>
			</div>
		</div>

		<div class="data-block" style="margin-right: 20px">
			<img src="styles/img/informer/coissu.png" alt="" />
			<div class="informer-block irganai">
				<?=printItem(49);?>
			</div>
		</div>

		<div class="data-block" style="margin-right: 20px">
			<img src="styles/img/informer/sulak.png" alt="" />
			<div class="informer-block chirkeysk">
				<?=printItem(48);?>
			</div>
		</div>

        <div class="data-block">
            <img src="styles/img/informer/vilyuj.png" alt="" />
            <div class="informer-block vilyuj">
				<?=printItem(52);?>
            </div>
        </div>

	</div>

	<div class="footer-info">

		<div class="footer-info_block">
			<div class="cnt">*</div>
			<p>Данные предоставляются по будням с 11.09.2013.</p>
			<p>Данные по Иркутской, Братской и Усть-Илимской ГЭС предоставлены ПАО «Иркутскэнерго».</p>
			<p>Данные о гидрологической обстановке и состоянии водного режима работы ГЭС филиалов и ДЗО ПАО «РусГидро»<br>приводятся по состоянию на 08.00 утра и публикуются до 14:00 (по МСК).</p>
			<p>Данные по приточности и расходам приводятся в среднем по состоянию за прошедшие сутки.</p>
		</div>
		<div class="footer-info_block">
			<div class="cnt">**</div>
			<p>Данные предоставляются с 19.03.2018.</p>
		</div>
        <div class="footer-info_block">
			<div class="cnt">***</div>
			<p>Данные предоставляются с 08.10.2018.</p>
		</div>

	</div>

</div>

<!-- Yandex.Metrika counter -->
<script type="text/javascript">
	(function (d, w, c) {
		(w[c] = w[c] || []).push(function() {
			try {
				w.yaCounter38342385 = new Ya.Metrika({
					id:38342385,
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
<noscript><div><img src="https://mc.yandex.ru/watch/38342385" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->

</body>
</html>