<?php

    require_once $_SERVER['DOCUMENT_ROOT'] . '/hydrology/informer/config.inc.php';
    
    $cacheKey = 'hydrology_informer_' . date('Ymd');

    if (!($cached = RhdMemcache::get($cacheKey))) {

        /*
            Используемые обозначения:
            ФПУ (fpu) - Форсированный Подпорный Уровень, предельная отметка max (черная линия в виджете)
            НПУ (npu) - Нормальный Подпорный Уровень (красная линия в виджете)
            УМО (umo) - Уровень Мёртвого Объёма, предельная отметка min (зеленая линия в виджете)
            УВБ (uvb) - Уровень Верхнего Бьефа, уровень воды в водохранилище (вершины синей линии)
        */

        //	Подготоваливаем массив с данными по водохранилищам. 28, 29 и т.д. - id водохранилищ в БД
        $data = array('28' => array('param' => array('name' => 'Богучанская ГЭС',
                                                     'fpu' => '209.5',
                                                     'npu' => '208',
                                                     'umo' => '207'),
                                     ),
                      '29' => array('param' => array('name' => 'Волжская ГЭС',
                                                     'fpu' => '16.3',
                                                     'npu' => '15',
                                                     'umo' => '12'),
                                     ),
                      '30' => array('param' => array('name' => 'Воткинская ГЭС',
                                                     'fpu' => '90',
                                                     'npu' => '89',
                                                     'umo' => '84'),
                                     ),
                      '31' => array('param' => array('name' => 'Жигулевская ГЭС',
                                                     'fpu' => '55.3',
                                                     'npu' => '53',
                                                     'umo' => '45.5'),
                                     ),
                      '32' => array('param' => array('name' => 'Камская ГЭС',
                                                     'fpu' => '110.2',
                                                     'npu' => '108.5',
                                                     'umo' => '100'),
                                     ),
                      '33' => array('param' => array('name' => 'Нижегородская ГЭС',
                                                     'fpu' => '85.5',
                                                     'npu' => '84',
                                                     'umo' => '81'),
                                     ),
                      '34' => array('param' => array('name' => 'Рыбинская ГЭС',
                                                     'fpu' => '103.81',
                                                     'npu' => '101.81',
                                                     'umo' => '96.91'),
                                     ),
                      '35' => array('param' => array('name' => 'Саратовская ГЭС',
                                                     'fpu' => '31.4',
                                                     'npu' => '28',
                                                     'umo' => '27'),
                                     ),
                      '36' => array('param' => array('name' => 'Саяно-Шушенская ГЭС',
                                                     'fpu' => '540', 
                                                     'npu' => '539',
                                                     'umo' => '500'),
                                     ),
                      '37' => array('param' => array('name' => 'Угличская ГЭС',
                                                     'fpu' => '113.4',
                                                     'npu' => '113',
                                                     'umo' => '109'),
                                     ),
                      '38' => array('param' => array('name' => 'Чебоксарская ГЭС',
                                                     'fpu' => '69.5',
                                                     'npu' => '63.3',
                                                     'umo' => '62.5'),
                                     ),
                      '39' => array('param' => array('name' => 'Новосибирская ГЭС',
                                                     'fpu' => '115.7', 
                                                     'npu' => '113.5',
                                                     'umo' => '108.5'),
                                     ),
                      '40' => array('param' => array('name' => 'Бурейская ГЭС',
                                                     'fpu' => '263.4',
                                                     'npu' => '256',
                                                     'umo' => '236'),
                                     ),
                      '41' => array('param' => array('name' => 'Зейская ГЭС',
                                                     'fpu' => '322.1',
                                                     'npu' => '315',
                                                     'umo' => '299'),
                                     ),
                      '42' => array('param' => array('name' => 'Колымская ГЭС',
                                                     'fpu' => '457.6',
                                                     'npu' => '451.5',
                                                     'umo' => '432'),
                                     ),
                      '43' => array('param' => array('name' => 'Усть-Среднеканская ГЭС',
                                                     'fpu' => '274,3',
                                                     'npu' => '274,3',
                                                     'umo' => '245.2',
                                                     /*'npu' => '256.5',
                                                     'umo' => '255.2',*/
                                                    ),
                                     ),
                      '48' => array('param' => array('name' => 'Чиркейская ГЭС',
                                                     'fpu' => '357.3',
                                                     'npu' => '355',
                                                     'umo' => '315'),
                                    ),
                      '49' => array('param' => array('name' => 'Ирганайская ГЭС',
                                                     'fpu' => '548.7',
                                                     'npu' => '547',
                                                     'umo' => '520')
                                    ),
                      '52' => array('param' => array('name' => 'Вилюйская ГЭС',
                                                     'fpu' => '249',
                                                     'npu' => '246',
                                                     'umo' => '234')
                                    )
                       );

        
        $f = 'Y-m-d';
	    $dateLast = date($f);
	    for ( $i = 1; $i <= 31; $i ++ ) {
		    $date    = date('Y-m-d', strtotime($date."-1 days"));
		    $resData = Data::selectDiagram($date, $data);
		    foreach ( $resData as $key => $value ) {
			    if ( count($value['date']) == 6 ) {
				    $dateLast = $date;
				    break 2;
			    }
		    }
	    }
	    $date = $dateLast;

        /*if (date('w') == 1) {
            $date = date($f);
        } else {
            $date = date($f, strtotime('last Monday'));
        }*/
        
        $resData = Data::selectDiagram($date, $data);

        // Проверяем, что по всем водохранилищам есть данные
        $errors = array();
        foreach($resData as $key => $value) {
            if(count($value[date]) < 6) {
                $errors[] = 'Не хватает данных по: ' . $value[param][name];
                }
        }

        if (!empty($errors)) {
            unset($errors);
            $date = date($f, strtotime("$date - 7 days"));
            $resData = Data::selectDiagram($date, $data);
        }

        $data = $resData;

        
        //  Обрабатываем массив
        foreach($data as $key => $value) {
            $fpu = $value[param][fpu];
            $npu = $value[param][npu];
            $umo = $value[param][umo];
            $max = max($value[uvb]);
            $min = min($value[uvb]);

            //  Находим минимальные и максимальные точки на графике и задаем координаты
            //  для линий ФПУ и УМО
            if($fpu >= $max and $umo <= $min) {
                $max = $fpu;
                $min = $umo;
                $range = round(($max - $min), 2);
                $data[$key][coord][fpu] = 12.5;
                $data[$key][coord][umo] = 62.5;
            } elseif($fpu < $max and $umo <= $min) {
                $min = $umo;
                $range = round(($max - $min), 2);
                $data[$key][coord][fpu] = round(($max - $fpu) * 50 / $range, 0) + 12.5;
                $data[$key][coord][umo] = 62.5;
            } elseif($fpu >= $max and $umo > $min) {
                $max = $fpu;
                $range = round(($max - $min), 2);
                $data[$key][coord][fpu] = 12.5;
                $data[$key][coord][umo] = round(($max - $umo) * 50 / $range, 0) + 12.5;
            } elseif($fpu < $max and $umo > $min) {
                $range = round(($max - $min), 2);
                $data[$key][coord][fpu] = round(($max - $fpu) * 50 / $range, 0) + 12.5;
                $data[$key][coord][umo] = round(($max - $umo) * 50 / $range, 0) + 12.5;
            }

            //  Задаем координаты для линии НПУ
            $data[$key][coord][npu] = round(($max - $npu) * 50 / $range, 0) + 12.5;

            //  Задаем смещение подписей у линий НПУ и УМО
            //  НПУ
            if(($data[$key][coord][npu] - $data[$key][coord][fpu]) <= 10) {
                 $data[$key][coord][titleNpu] = ($data[$key][coord][npu] + 9);
            } else {
                $data[$key][coord][titleNpu] = ($data[$key][coord][npu] - 3);
            }
            // УМО
            if(($data[$key][coord][umo] - $data[$key][coord][npu]) <= 10) {
                 $data[$key][coord][titleUmo] = ($data[$key][coord][umo] + 9);
            } else {
                $data[$key][coord][titleUmo] = ($data[$key][coord][umo] - 3);
            }

            $data[$key][coord][titleFpu] = 10;

            //  Задаем координаты для точек графика 
            $i = 0;
            while ($i < 6) {
                $point = round(($max - $data[$key][uvb][$i]) * 50 / $range, 0) + 12.5;
                $data[$key][coord][$i] = $point;
                $i++;
            }
        }
        

        if($errors != NULL) {
//            echo '<pre>';
//            print_r($errors);
//            echo '</pre>';
        } else {
            // Генерируем svg
            foreach($data as $key => $value) {

                $date1 = $data[$key][date][0];
                $date2 = $data[$key][date][1];
                $date3 = $data[$key][date][2];
                $date4 = $data[$key][date][3];
                $date5 = $data[$key][date][4];
                $date6 = $data[$key][date][5];

                $value1 = $data[$key][uvb][0];
                $value2 = $data[$key][uvb][1];
                $value3 = $data[$key][uvb][2];
                $value4 = $data[$key][uvb][3];
                $value5 = $data[$key][uvb][4];
                $value6 = $data[$key][uvb][5];

                $point1 = $data[$key][coord][0];
                $point2 = $data[$key][coord][1];
                $point3 = $data[$key][coord][2];
                $point4 = $data[$key][coord][3];
                $point5 = $data[$key][coord][4];
                $point6 = $data[$key][coord][5];

                $pointFpu = $data[$key][coord][fpu];
                $pointNpu = $data[$key][coord][npu];
                $pointUmo = $data[$key][coord][umo];

                $pointTitleFpu = $data[$key][coord][titleFpu];
                $pointTitleNpu = $data[$key][coord][titleNpu];
                $pointTitleUmo = $data[$key][coord][titleUmo];

                $svg =  '<div id="hydrology_widget_' . $key . '" class="informer-wrapper ' . ($key == 29 ? ' active' : '') . '"><svg xmlns="http://www.w3.org/2000/svg" class="informer_widget" width="297px" height="75px" viewBox="0 0 297 75"><g>' .

                        '<line class="fpu" x1="0" y1="' . $pointFpu . '" x2="297" y2="' . $pointFpu . '" />' .
                        '<text fill="#FF1212" x="0 " y="' . $pointTitleFpu . '">ФПУ ' . $data[$key][param][fpu] . '</text>' .

                        '<line class="npu" x1="0" y1="' . $pointNpu . '" x2="297" y2="' . $pointNpu . '" />' .
                        '<text fill="#17C200" x="0" y="' . $pointTitleNpu . '">НПУ ' . $data[$key][param][npu] . '</text>' .

                        '<line class="umo" x1="0" y1="' . $pointUmo . '" x2="297" y2="' . $pointUmo . '" />' .
                        '<text fill="#4A4A4A" x="0" y="' . $pointTitleUmo . '">УМО ' . $data[$key][param][umo] . '</text>' .

                        '<line x1="79" y1="' . $point1 . '" x2="120" y2="' . $point2 . '" />' .
                        '<line x1="120" y1="' . $point2 . '" x2="161" y2="' . $point3 . '" />' .
                        '<line x1="161" y1="' . $point3 . '" x2="202" y2="' . $point4 . '" />' .
                        '<line x1="202" y1="' . $point4 . '" x2="243" y2="' . $point5 . '" />' .
                        '<line x1="243" y1="' . $point5 . '" x2="284" y2="' . $point6 . '" />' .

                        '<circle cx="79" cy="' . $point1 . '" r="4" title="' . $value1 . '" />' .
                        '<circle cx="120" cy="' . $point2 . '" r="4" title="' . $value2 . '" />' .
                        '<circle cx="161" cy="' . $point3 . '" r="4" title="' . $value3 . '" />' .
                        '<circle cx="202" cy="' . $point4 . '" r="4" title="' . $value4 . '" />' .
                        '<circle cx="243" cy="' . $point5 . '" r="4" title="' . $value5 . '" />' .
                        '<circle cx="284" cy="' . $point6 . '" r="4" />' .

                        '<text x="67" y="75">' . $date1 . '</text>' .
                        '<text x="108" y="75">' . $date2 . '</text>' .
                        '<text x="149" y="75">' . $date3 . '</text>' .
                        '<text x="191" y="75">' . $date4 . '</text>' .
                        '<text x="230" y="75">' . $date5 . '</text>' .
                        '<text x="272" y="75">' . $date6 . '</text>' .
                        '<rect fill="white" fill-opacity="1" x="269" y="' . ($point6 - 14) . '" width="30" height="10"/>' .
                        '<text fill="#223B8E" x="269" y="' . ($point6 - 6)  . '">' . $value6 . '</text>' .

                        '</g></svg></div>' . "\n";

                $informer_code .= $svg;
                
                $informer_select .= '<div class="water-level_popup-item" data-plotid="hydrology_widget_' . $key . '">' . $data[$key]['param']['name'] . '</div>';
            }
        }
        
        RhdMemcache::set($cacheKey, compact('informer_code', 'informer_select'), 3600);
    } else {
        extract($cached);
    }
    
?>


	
	<script>
		$(function(){									
			
			$('.water-level_list-name').on('click',function(){
				$('#waterlevel_popup').slideToggle(200);
			})
			
			$('.water-level_popup-item').on('click',function(){
				plotid = $(this).data('plotid');
				$('#waterlevel_popup').slideUp(200);
				$('.informer-wrapper').removeClass('active');
				$('#'+plotid).addClass('active');
				$('.water-level_list-name').find('span').text($(this).text());
			})
            
		})
		
	</script>
	
	<div class="water-level-wrapper">
	
		<div class="water-level_titles">
			<div class="water-level_title active"><span>Уровни водохранилищ ГЭС</span></div>
			<div class="water-level_title"><a href="/hydrology/informer/">Подробнее</a></div>
		</div>
		
		<div class="water-level_brd">
			<div class="water-level_block">
				<div class="water-level_options">
					<div class="water-level_list">
						<div class="water-level_list-name"><span>Волжская ГЭС</span><i></i></div>
						<div class="water-level_popup"><div class="water-level_abs" id="waterlevel_popup" style="display: none"><div class="water-level_scroll" >
							<?=$informer_select?>
						</div></div></div>
					</div>			
				</div>		
				
				<style type="text/css">
					.fpu {stroke:#FF1212!important; stroke-width:1!important; stroke-dasharray:5 5;}
					.npu {stroke:#17C200!important; stroke-width:1!important; stroke-dasharray:5 5;}
					.umo {stroke:#4A4A4A!important; stroke-width:1!important; stroke-dasharray:5 5;}
					.informer_widget line {stroke:#223B8E; stroke-width:2px}
					.informer_widget circle {fill:#EF7F1A}
					.informer_widget text {font-size:9px; font-family:'Open Sans', sans-serif;}
				</style>
				
				<script>
					$(function(){
						$('.informer-wrapper svg circle').mouseenter(function(){							
							ctl = $(this).attr('title');
							cx = $(this).attr('cx'); cx = cx-10;
							cy = $(this).attr('cy'); cy = cy-15;
							cprt = $(this).parents('.informer-wrapper').first();
							if(ctl) chov = $('<div class="informer-data-popup" style="top:'+cy+'px;left:'+cx+'px">'+ctl+'</div>').appendTo(cprt);
						})
						$('.informer-wrapper svg circle').mouseleave(function(){
							chov.remove();
						})
					})
				</script>
				
				<?=$informer_code?>

			</div>
		</div>
		
		<script src="<?=SITE_TEMPLATE_PATH?>/js/jquery.flot.min.js"></script>
		<script src="<?=SITE_TEMPLATE_PATH?>/js/jquery.flot.time.min.js"></script>
		
	</div>
	
