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

$allowedStations = array(
	'Саяно-Шушенское',
	'Камское',
	'Воткинское',
	'Угличское',
	'Рыбинское',
	'Нижегородское',
	'Чебоксарское',
	'Жигулевское',
	'Саратовское',
	'Волжское',
	'Новосибирское',
	'Богучанское',
	'Зейское',
	'Бурейское',
	'Колымское',
	'Усть-Среднеканское',
);
$titles=ORM::for_table('Stations')->findMany();

/*
Old Version
*/
$values = json_decode(file_get_contents(JSON_FILE), true);

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
	$txt = preg_replace('~[\*]~', '', $txt);
	preg_match_all('~.+\n~', $txt, $strings);
	$result = array();

	foreach ($strings[0] as $string) {
		$string = preg_replace('~[\r\n]~', '', trim($string));
		$exp = explode(' ', $string);

		foreach ($exp as $key => $value) {
			if($key == 0) continue;
			if(!is_numeric($value)) {
				$exp = null;
				break;
			} 
		}

		if(count($exp) == 15) array_splice($exp, 5, 0, '0');

		if($exp) {
			foreach ($fields as $field => $index) {
				$result[$exp[0]][$field] = (float)$exp[$index];
			}
		}
	}
	return $result;
}

if (isset($_POST['act'])) {
	switch ($_POST['act']) {
		case 'upload':
			$date = $_POST['date'];
			if (isset($_FILES['file'])) {
				$reader = new HydrologyExcelReader($_FILES['file']['tmp_name']);
				$data = $reader->read();

				foreach ($data as $station => $record) {
					insertParams($date, $station, array_values($record));
				}
			}
			break;

		case 'add':
			if (
				!empty($_POST['date']) 
				&& isset($_POST['station'])
				&& in_array($_POST['station'], $allowedStations)
				&& isset($_POST['params']) 
				&& is_array($_POST['params']) 
				&& count($_POST['params']) === count($fields)
			) {
				$date = strip_tags($_POST['date']);
				$station = $_POST['station'];
				$params = $_POST['params'];
				insertParams($date, $station, $params);
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

				foreach ($data as $station => $record) {
					insertParams($date, $station, array_values($record));
				}
			}
			break;

		case 'del':
			if (
				isset($_POST['date']) 
				&& isset($_POST['station'])
			) {
				unset($values[$_POST['date']][$_POST['station']]);
				if (empty($values[$_POST['date']])) {
					unset($values[$_POST['date']]);
				}
			}
			break;

	}

	file_put_contents(JSON_FILE, json_encode($values));
}

$values = array_reverse($values);
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Hydrology Informer Admin</title>

		<link rel="stylesheet" type="text/css" href="http://code.jquery.com/ui/1.10.2/themes/smoothness/jquery-ui.css" />
		<link rel="stylesheet" type="text/css" href="./css/bootstrap.min.css" />
		<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
		<script src="http://code.jquery.com/ui/1.10.2/jquery-ui.js"></script>
	</head>
	<body>
		<div class="container container-fluid">
			<div class="page-header">
				<h1>Hydrology Informer Admin</h1>
			</div>

			<div class="row">
				<div class="span6">
					<form class="form-horizontal form-upload" method="POST" enctype="multipart/form-data">
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
					</form>

					<form class="form-horizontal form-add" method="POST">
						<input type="hidden" name="act" value="add" />
						<fieldset>
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
										<?php foreach ($allowedStations as $station): ?>
											<option value="<?php echo htmlspecialchars($station); ?>"><?php echo $station; ?></option>
										<?php endforeach; ?>
									</select>
								</div>
							</div>

							<?php foreach ($fields as $index => $title): ?>
								<div class="control-group">
									<label class="control-label" for="params[<?php echo $index; ?>]">
										<?php echo $title[0]; ?>
									</label>
									<div class="controls">
										<input type="text" name="params[<?php echo $index; ?>]" />
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

							<div class="form-actions">
								<button type="submit" class="btn btn-primary">Добавить</button>
							</div>
						</fieldset>
					</form>
				</div>
				<div class="span6">
					<table class="table table-bordered table-striped table-condensed">
						<thead>
							<tr>
								<th>Станция</th>
								<?php foreach ($fields as $field): ?>
									<th><?php echo isset($field[1]) ? $field[1] : $field[0]; ?></th>
								<?php endforeach; ?>
								<th>&nbsp;</th>
							</tr>
						</thead>
						<pre><?php print_r($values);?></pre>
						<tbody class="items">
							<?php foreach ($values as $date => $stations):?>
								<?php if ($stations): ?>
									<tr>
										<td colspan="<?php echo count($fields) + 2; ?>"><?php echo $date; ?></td>
									</tr>
								<?php endif; ?>
								<?php foreach ($stations as $station => $params): ?>
									<tr>
										<td><?php echo $station; ?></td>
										<?php foreach ($fields as $index => $field):?>
											<td><?php echo isset($params[$index]) ? $params[$index] : '&dash;'; ?></td>
										<?php endforeach; ?>
										<td><a href="#" data-date="<?php echo $date; ?>" data-station="<?php echo $station; ?>" class="icon-remove act-del"></a></td>
									</tr>
								<?php endforeach; ?>
							<?php endforeach; ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
<?php print_r($names=ORM::for_table('Stations')->where('id',1)->find_many()); ?>
		<script type="text/javascript">
$(function() {
	var $formAdd = $('.form-add'),
	$items = $('.items'),

	updateItems = function(html) {
		$items.html($(html).find('.items').html());
	};

	$formAdd.submit(function(e) {
		e.preventDefault();
		
		$.ajax({
			type: 'POST',
			dataType: 'html',
			data: $(this).serializeArray()
		})
		.done(updateItems)
		.done(function() {
			$formAdd.find('input[type="text"]').val('');
			$formAdd.find('textarea').val('');
		});
	});

	$items.on('click', '.act-del', function(e) {
		e.preventDefault();

		var $this = $(this);
		if ($this.data('clicked')) return;

		$this.data('clicked', true);
		$.ajax({
			type: 'POST',
			dataType: 'html',
			data: {act: 'del', date: $this.data('date'), station: $this.data('station')}
		})
		.done(updateItems);
	});

	$('.datepicker').datepicker({
		dateFormat: 'dd.mm.yy'
	});
});
		</script>
	</body>
</html>