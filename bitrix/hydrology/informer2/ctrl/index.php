<?php 
define('JSON_FILE', dirname(__FILE__).'/../data.json');

require_once dirname(__FILE__).'/excelReader.class.php';
require_once dirname(__FILE__).'/hydrologyExcelParser.class.php';
require_once dirname(__FILE__).'/../config.inc.php';


$fields = array(
	/*array('Нормальный подпорный уровень', 'НПУ'),
	array('Форсированный подпорный уровень', 'ФПУ'),*/
	array('Уровень верхнего бьефа', 'УВБ'),
	array('Свободная ёмкость', 'СЕ'),
	array('Приток воды к створу', 'Приток'),
	array('Средний суточный расход воды', 'Расход'),
	array('Расход холостых сбросов воды', 'Хол. сбросы'),
);

$stations = Station::getListOfStations();

/*
Old Version
*/
//$values = json_decode(file_get_contents(JSON_FILE), true);

/*
function insertParams($date, $station, $params) {
	global $values, $allowedStations;

	if (!in_array($station, $allowedStations)) return;
	if (!isset($values[$date])) $values[$date] = array();
	$resort = !isset($values[$date][$station]);
	$values[$date][$station] = array();

	foreach ($params as $index => $param) {
		//if ($index === 1) $values[$date][$station][] = null;
		$values[$date][$station][] = floatval($param);
	}

	if ($resort) {
		uksort($values[$date], function($station1, $station2) {
			return strcmp($station1, $station2);
		});
	}
}
*/
function parseText($txt) {
	$fields = array(
		'uvb' => 3,
        'polemk' => 8,
        'pritok' => 10,
        'rashod' => 12,
        'sbros' => 14,

        /*'uvb' => 3,
        'pritok' => 6,
        'rashod' => 8,
        'sbros' => 10,*/
	);

	$strings = array();

	$txt = preg_replace('~[ \t]+~im', ' ', $txt);
	$txt = str_replace(',', '.', $txt);
	$txt = preg_replace('~[\*\r]~', '', $txt);

	$strings = explode("\n", $txt);
	$result = array();
	foreach ($strings as $string) {
		$string = preg_replace('~[\r\n]~', '', trim($string));
		if (!$string) break;
		$exp = explode(' ', $string);
		$name = '';
		foreach ($exp as $key => $value) {
			if (is_numeric($value)) break;
			$name .= ' '.$value;
		}
		$name = trim($name);
		$exp = array_merge(array($name), array_slice($exp, $key));
		/*foreach ($exp as $key => $value) {
			if($key == 0) continue;
			if(!is_numeric($value)) {
				$exp = null;
				break;
			} 
		}*/

		if(count($exp) == 15) array_splice($exp, 5, 0, '0');

		if($exp) {
			foreach ($fields as $field => $index) {
				$result[$exp[0]][$field] = is_numeric($exp[$index]) ? (float)$exp[$index] : null;
			}
		}
	}
	
	return $result;
}

if (isset($_POST['act'])) {
	switch ($_POST['act']) {
		case 'upload': //выпилить
			$date = $_POST['date'];
			if (isset($_FILES['file'])) {
				$reader = new HydrologyExcelReader($_FILES['file']['tmp_name']);
				$data = $reader->read();

				foreach ($data as $station => $record) {
					$i=0;
					$params=array();
					foreach (Data::$fields as $fields){
						if(isset($record[$i])){$params[$field['index']]=$record[$i];}
						$i++;
					}
					//$stationCur=Model::factory('Station')->where('name',$station)->findOne();
					//insertParams($date, $stationCur->id, $params);//array_values($record));
					Data::saveData($date,$station,$params);
				}
			}
			break;

		case 'add':
			if (
				!empty($_POST['date']) 
				&& isset($_POST['station'])
				&& isset($_POST['params']) 
				&& is_array($_POST['params']) 
				&& count($_POST['params']) === count($fields)
			) {
				$date = strip_tags($_POST['date']);
				$station = $_POST['station'];
				$params = $_POST['params'];
				Data::saveData($date,$station,$params,false);
			}
			else {
				var_dump(
					!empty($_POST['date']) ,
					isset($_POST['station']),
					in_array($_POST['station'], $allowedStations),
					isset($_POST['params']) ,
					is_array($_POST['params']) ,
					count($_POST['params']) === count($fields)
				);
			}
			break;

		case 'addText':
			if (
				!empty($_POST['date'])
				&& !empty($_POST['text'])
			) {
				$date = strip_tags($_POST['date']);
				$data = parseText($_POST['text']);
				$params = array();
				//var_dump($data);
				foreach ($data as $station => $record) {
					Data::saveData($date,$station,$record,$_POST['auto_add']);
				}
			} else {
				var_dump($_POST);
			}
			break;

		case 'del':
			if (
				isset($_POST['date']) 
				&& isset($_POST['station'])
			) {
				Data::deleteData($_POST['date'],$_POST['station']);
			}
			break;
		
		case 'allDateDelete':
			var_dump($_POST);
			if(isset($_POST['date'])){
				Data::deleteByDateAll($_POST['date']);
			}
			break;

	}


	//file_put_contents(JSON_FILE, json_encode($values));
}

//$values = array_reverse($values);
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Hydrology Informer Admin</title>

		<link rel="stylesheet" type="text/css" href="http://code.jquery.com/ui/1.10.2/themes/smoothness/jquery-ui.css" />
		<link rel="stylesheet" type="text/css" href="./css/bootstrap.min.css" />
		<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
		<script src="http://code.jquery.com/ui/1.10.2/jquery-ui.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/jquery.dataTables.min.js"></script>
		<script src="js/bootstrap.pagination.js"></script>
		<script src="js/bootstrap.pagination.js"></script>
	</head>
	<body>
		<div class="container container-fluid">
			<div class="page-header">
				<h1>Hydrology Informer Admin</h1>
			</div>

			<div class="row">
				<div class="span6">
					<!--<form class="form-horizontal form-upload" method="POST" enctype="multipart/form-data">
						<input type="hidden" name="act" value="upload" />
						<fieldset>
							<div class="control-group">
								<label class="control-label" for="date">Дата</label>
								<div class="controls">
									<input type="text" name="date" class="datepicker" />
								</div>
							</div>

							<div class="control-group">
								<label class="control-label" for="date">Файл Excel</label>
								<div class="controls">
									<input type="file" name="file" />
								</div>
							</div>

							<div class="form-actions">
								<button type="submit" class="btn btn-primary">Загрузить</button>
							</div>
						</fieldset>
					</form>-->

					<form class="form-horizontal form-add" method="POST">
						<input type="hidden" name="act" value="add" />
						<fieldset>
							<div class="page-header">
								<h4>Ручное заполнение</h4>
							</div>
							<div class="control-group">
								<label class="control-label" for="date">Дата</label>
								<div class="controls">
									<input type="text" name="date" class="datepicker" />
								</div>
							</div>

							<div class="control-group">
								<label class="control-label" for="station">
									Станция
								</label>
								<div class="controls">
									<select name="station">
										<?php foreach ($stations as $station): ?>
											<option value="<?php echo $station->id; ?>"><?php echo $station->name; ?></option>
										<?php endforeach; ?>
									</select>
								</div>
							</div>

							<?php foreach (Data::$fields as $index => $title): ?>
								<div class="control-group">
									<label class="control-label" for="params[<?php echo $title['index']; ?>]">
										<?php echo $title['name']; ?>
									</label>
									<div class="controls">
										<input type="text" name="params[<?php echo $title['index']; ?>]"/>
									</div>
								</div>
							<?php endforeach; ?>

							<div class="form-actions">
								<button type="submit" class="btn btn-primary">Добавить</button>
							</div>
						</fieldset>
					</form>

					<form class="form-horizontal form-add" method="POST">
						<input type="hidden" name="act" value="addText" />
						<div class="page-header">
							<h4>Копипаста из Excel</h4>
						</div>	
						<fieldset>
							<div class="control-group">
								<label class="control-label" for="date">Дата</label>
								<div class="controls">
									<input type="text" name="date" class="datepicker" />
								</div>
							</div>

							<div class="control-group">
								<label class="control-label" for="station">
									Копипаста
								</label>
								<div class="controls">
									<textarea name="text"></textarea>
								</div>
							</div>

							<div class="control-group">
								<label class="control-label" >
									Автоматическое добавление неизвестных станций
								</label>
								<div class="controls">
									<input type="radio" name="auto_add" value="1">Включено
									<input type="radio" name="auto_add" value="0" checked>Выключено
								</div>
							</div>

							<div class="form-actions">
								<button type="submit" class="btn btn-primary">Добавить</button>
							</div>
						</fieldset>
					</form>
				</div>
				<div class="span6">
					<?php $values=Model::factory('Data')
                            ->table_alias('t1')
                            ->select('t1.*')
                            ->select('t2.name')
                            ->innerJoin('station',array('t1.id_station','=','t2.id'),'t2')
                            ->orderByDesc('date')
                            //->offset(10)
                            ->limit(600)
                            ->findMany();
                    ?>   
				<table class="table table-bordered table-striped table-condensed" id="result_table">
						<thead>
							<tr>
								<th>Станция</th>
								<?php foreach (Data::$fields as $field): ?>
									<th><?php echo isset($field['abr']) ? $field['abr'] : $field['name']; ?></th>
								<?php endforeach; ?>
								<th>&nbsp;</th>
							</tr>
						</thead>
						<tbody class="items">
							<?php $curDate='';
								  foreach($values as $value):
									if($value->date<>$curDate):
										$curDate=$value->date;
										?>
									<tr class="info">
										<td class="date" colspan="<?php //echo count(Data::$fields) + 2;* ?>"><?php echo $value->date; ?> <a href="#" data-date="<?php echo $value->date; ?>" class="icon-remove act-del-all-date"></a></td><td><td><td><td><td><td>
									</tr>
								<?php endif; ?>
									<tr>
										<td class="name"><?php echo $value->name; ?></td>
										<?php foreach (Data::$fields as $field):?>
											<td <?php echo isset($value->{$field['index']}) ? 'class="'.$value->field['index'].'">'.$value->{$field['index']} : '>&dash;'; ?></td>
										<?php endforeach; ?>
										<td><a href="#" data-date="<?php echo $value->date; ?>" data-station="<?php echo $value->id_station; ?>" class="icon-remove act-del"></a></td>
									</tr>
							<?php endforeach; ?>
						</tbody>
					</table>
					<p>Здесь выводятся не все данные, имеющиеся в системе, а только последние ~300 записей.</p>
				</div>
			</div>
		</div>
		<script type="text/javascript">
$(function() {
	var $formAdd = $('.form-add'),
	$items = $('.items'),

	updateItems = function(html) {
		$items.html($(html).find('.items').html());	init_dT();
	};
	var oTable = $('#result_table').dataTable( {
			 			"bStateSave": true,
			            "bRetrieve": true,
			            "bPaginate": true,
			            "sPaginationType": "bootstrap",
			            "iDisplayLength" : 50,
			            "aaSorting":[],
			            "oLanguage": {
			            	"sLengthMenu": "Вывод _MENU_  записей на страницу",
			            	"sZeroRecords": "Ничего не найдено, извините",
			            	"sInfo": "Отображаются c _START_ по _END_ из _TOTAL_ записей",
			            	"sInfoEmpty": "Отображаются c 0 по 0 их 0 записей",
			            	"sInfoFiltered": "(Отфильтровано из _MAX_ записей)",
			            	"sSearch":"Поиск",
			            	"sNext":"Следующий",
			            	"sPrevious":"Предыдущий",
			        	}

			        } );
	$formAdd.submit(function(e) {
		e.preventDefault();
		
		$.ajax({
			type: 'POST',
			dataType: 'html',
			data: $(this).serializeArray()
		})
		.done(function(){window.location.reload()});//updateItems)
		/*.done(function() {
			$formAdd.find('input[type="text"]').val('');
			$formAdd.find('textarea').val('');
		});*/
	});

	$items.on('click', '.act-del', function(e) {
		e.preventDefault();

		var $this = $(this);
		if ($this.data('clicked')) return;
		oTable.fnDeleteRow(oTable.fnGetPosition(this.parentNode)[0],function(){
			$this.data('clicked', true);
			$.ajax({
				type: 'POST',
				dataType: 'html',
				data: {act: 'del', date: $this.data('date'), station: $this.data('station')}
			})
			.done();//updateItems);
		});
				
	});

	$items.on('click', '.act-del-all-date', function(e) {
		e.preventDefault();

		var $this = $(this);
		if ($this.data('clicked')) return;

		$this.data('clicked', true);
		$.ajax({
			type: 'POST',
			dataType: 'html',
			data: {act: 'allDateDelete', date: $this.data('date')}
		})
		.done(location.reload());//updateItems);
	});

	$('.datepicker').datepicker({
		dateFormat: 'dd.mm.yy'
	});
	$('.datepicker').datepicker("setDate",formatDate());
});

function init_dT(){
        $('#result_table').dataTable({"bRetrieve":true,});
}
function formatDate(date) {
	if(!date){date = new Date;}
	var dd = date.getDate()
	if ( dd < 10 ) dd = "0" + dd;
	var mm = date.getMonth()+1
	if ( mm < 10 ) mm = "0" + mm;
	var yy = date.getFullYear() % 100;
	if ( yy < 10 ) yy = "0" + yy;
	return dd+"."+mm+"."+yy;
}
		</script>
	</body>
</html>
