<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
    <title>Заявка в Программу инновационного развития РусГидро</title>
    <style type="text/css">
        body {
            font-family: Tahoma, Arial, Helvetica, sans-serif;
            font-size: 12px;
            margin: 0;
            padding: 0px;
            background: transparent;
        }
		td { vertical-align: top }
        label {
            margin: 0;
        }

        p {
            margin: 0 0 15px 0;
        }

        .tbl-form td {
            padding: 0 0 10px 0;
        }

        .tbl-form td .inp, .tbl-form textarea {
            border: 1px solid #d0d0d0;
            width: 100%;
            font-family: Tahoma, Arial, Helvetica, sans-serif;
            font-size: 12px;
            padding: 3px;
        }

        .tbl-form textarea {
            width: 99%;
            height: 100px;
            resize: none;
        }

        .add-line {
            margin-top: 7px;
        }

        .tbl-form td td textarea {
            width: 94%;
        }

        .tbl-form .tbl-f-head {
            margin-bottom: 2px;
        }

        .tbl-form .tbl-f-error {
            color: red;
            font-size: 11px;
        }

        h3 {
            margin: 15px 0 0 0;
            font-size: 17px;
        }

        .tbl-form {
            padding: 22px;
            border: 3px solid #fff;
            background-color: #eae9e9;
        }

        a {
            color: #003E73;
            text-decoration: underline;
        }

        a:active {
            color: #002E53;
            text-decoration: none;
        }

        a:hover {
            text-decoration: none;
        }

        .schedule-table {
            height: 415px;
            overflow: auto;
        }

        .invest-table {
            height: 135px;
            overflow: auto;
        }

        .helper {
            display: inline-block;
            position: relative;
        }

        .helper-icon {
            background: #fff;
            border-radius: 50%;
            width: 16px;
            height: 16px;
            line-height: 16px;
            text-align: center;
            font-size: 14px;
            font-weight: 700;
            cursor: pointer;
        }

        .helper-icon:hover {
            box-shadow: 0 1px 5px rgba(0, 0, 0, 0.3);
        }

        .helper-box {
            display: none;
            position: absolute;
            width: 564px;
            margin: 10px 0;
            padding: 5px;
            background: #fff;
            box-shadow: 0 1px 5px rgba(0, 0, 0, 0.3);
            z-index: 2;
        }
		input.error, textarea.error { border-color: red !important }
    </style>
	
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
	<script type="text/javascript" src="jquery.validate.min.js"></script>
	<script>
		$(function(){
			var validator_contacts = $("#zform").validate({
				rules: { 									
					GENERAL1: { required: true },
					GENERAL3: { required: true },
					GENERAL6: { required: true }
				}, 
				messages: { 			
					GENERAL1: { required: '' },
					GENERAL3: { required: '' },
					GENERAL6: { required: '' },					
				}
			});	
		})
	</script>
</head>
<body>
<?php

function makeUtfString($subject)
{
    return '=?utf-8?B?' . base64_encode($subject) . '?=';
}

$fields = array(
    'Общая информация',
    'GENERAL1' => 'Наименование проекта',
    'GENERAL2' => 'Производимая продукция',
    'GENERAL3' => 'Регион размещения на территории РФ',
    'GENERAL4' => 'Крупный населенный пункт близкий к проекту  (или Подстанция)',
    'GENERAL5' => 'Сроки реализации',
    'GENERAL6' => 'Контакты представителя',

    'Поставка электроэнергии и мощности',
    'ENERGY1' => 'Расчетное потребление электрической энергии МВт. час/год',
    'ENERGY2' => 'Максимальная потребляемая мощность, МВт',
    'ENERGY3' => 'Расчетная потребляемая мощность ,МВт',
    'ENERGY4' => 'Предварительный график присоединяемой нагрузки МВт/год',
    'ENERGY5' => 'Наличие собственной генерации',

    'Поставка тепловой энергии (при необходимости)',
    'SUPPLY1' => 'Срок подключения объекта',
    'SUPPLY2' => 'Максимальная часовая и среднечасовая нагрузка объекта Гкал/ч',
    'SUPPLY3' => 'По видам теплоносителей:',
    'SUPPLY4' => 'горячая вода Гкал/ч;',
    'SUPPLY5' => 'пар Гкал/ч;',
    'SUPPLY6' => 'По видам теплопотребления:',
    'SUPPLY7' => 'на отопление Гкал/ч;',
    'SUPPLY8' => 'на вентиляцию Гкал/ч;',
    'SUPPLY9' => 'на ГВС Гкал/ч;',
    'SUPPLY10' => 'Схема присоединения теплопотребляющих установок:',
    'SUPPLY11' => 'Расчетный расход теплоносителя (в том числе с водоразбором из сети), м3/час:',
    'FILE' => 'Файл для загрузки',
);

$fieldTypes = array(
    'GENERAL2' => 'text',
    'ENERGY3' => 'text',
    "GENERAL6" => 'text',
    'SUPPLY10' => 'text',
    'SUPPLY2' => 'helper',
    'SUPPLY3' => 'helper',
    'SUPPLY6' => 'helper',
);
$fieldRules = array(
    "GENERAL1" => 'required',
    "GENERAL3" => 'required',
    "GENERAL6" => 'required',
);
$fieldStyles = array(
    "SUPPLY4" => 'inline',
    "SUPPLY5" => 'inline',
    "SUPPLY7" => 'inline',
    "SUPPLY8" => 'inline',
    "SUPPLY9" => 'inline',
);
$mime_types = array(

    'txt' => 'text/plain',
    'htm' => 'text/html',
    'html' => 'text/html',
    'xml' => 'application/xml',

    // images
    'png' => 'image/png',
    'jpe' => 'image/jpeg',
    'jpeg' => 'image/jpeg',
    'jpg' => 'image/jpeg',

    // archives
    'zip' => 'application/zip',
    'rar' => 'application/x-rar-compressed',

    // adobe
    'pdf' => 'application/pdf',

    // ms office
    'docx'=> 'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
    'xlsx'=> 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
    'pptx'=> 'application/vnd.openxmlformats-officedocument.presentationml.presentation',
    'doc' => 'application/msword',
    'rtf' => 'application/rtf',
    'xls' => 'application/vnd.ms-excel',
    'ppt' => 'application/vnd.ms-powerpoint',

    // open office
    'odt' => 'application/vnd.oasis.opendocument.text',
    'ods' => 'application/vnd.oasis.opendocument.spreadsheet',
);
$formDone = false;
$fieldValues = array();
$error = array();
?>
<? if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    if (isset($_FILES)) {
        $fileDir = dirname(__FILE__).'/file/';

        $arFilesSend = array();
        foreach($_FILES as $key => $file) {
            if (!$file["error"]) {
                if ( $file["size"] >= 5242880){
                    $error["FILE"][] = 'загружаемый файл больше 5Мб';
                } else {
                    if ($mime_types[end(explode(".", $file['name']))] && $file["type"] == $mime_types[end(explode(".", $file['name']))]){
                        $uploadfile = $fileDir . md5(basename($file['name']) . time()) . "." . end(explode(".", $file['name']));
                        if (!move_uploaded_file($file['tmp_name'], $uploadfile)) {
                            $error["FILE"][] = 'ошибка загрузки файла';
                        } else {
                            $arFilesSend[$key]["path"] = $uploadfile;
                            $arFilesSend[$key]["ext"] = end(explode(".", $file['name']));
                            $arFile[$key] = "http://rushydro.ru/innovation/file/".md5(basename($file['name'])).".". end(explode(".", $file['name']));
                        }
                    } else {
                        $error["FILE"][] = 'неверный тип загружаемого файла';
                    }
                }
            }
        }
        if (!empty ($error))
            $error["FILE"] = implode(' ',$error["FILE"]);
    }
    $formDone = true;
    if (!empty($error))
        $formDone = false;
    $fileName = dirname(__FILE__) . '/electricity.id';
    $id = (file_exists($fileName) ? intval(file_get_contents($fileName)) : 0) + 1;
    file_put_contents($fileName, $id);
    $mail = '<html><head><title>Заявка #' . $id . '</title><meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head><body><p>Заявка <b>#' . $id . '</b> подана <b>' . date('d.m.Y H:i:s') . '</b>.</p><table cellpadding=\'5\' cellspacing=\'0\' border=\'1\'>';
    ob_start();
    foreach ($fields as $fieldName => $fieldTitle) {
        //if ($fieldName == "FILE")continue;
        if ($fieldRules[$fieldName] == "required" && strlen($_REQUEST[$fieldName]) < 1) {
            $error[$fieldName] = "Поле обязательно для заполнения";
            $formDone = false;
        }
        if (isset($_REQUEST[$fieldName]) && strlen($_REQUEST[$fieldName]) > 0) {
            $fieldValues[$fieldName] = $_REQUEST[$fieldName];

            ?>
            <tr>
            <td><?
                echo $fieldTitle;
                ?></td>
            <td ><?
            echo htmlspecialchars($_REQUEST[$fieldName]);
            ?></td></tr><?
        }
    }
    
    if ($formDone) {
        $mail .= ob_get_clean() . '</table></body></html>';
        $un = strtoupper(uniqid(time()));
        $head = "From: www-data@rushydro.ru\n";
        $head .= "Mime-Version: 1.0\n";
        $head .= "Content-Type:multipart/mixed;";
        $head .= "boundary=\"----------" . $un . "\"\n\n";
        $zag = "------------" . $un . "\nContent-Type:text/html;\n";
        $zag .= "Content-Transfer-Encoding: 8bit\n\n$mail\n\n";
        $zag .= "------------" . $un . "\n";
        $zag .= "Content-Type: application/octet-stream;";
        $zag .= "name=\"_innovation_form_" . $id . ".html\"\n";
        $zag .= "Content-Transfer-Encoding:base64\n";
        $zag .= "Content-Disposition:attachment;";
        $zag .= "filename=\"innovation_form_" . $id . ".html\"\n\n";
        $zag .= chunk_split(base64_encode($mail)) . "\n";
        $file = null;
        $i = 0;

        foreach ($arFilesSend as $key => $f){
            $fp = fopen($f["path"],"rb");
            $file = fread($fp, filesize($f["path"]));
            fclose($fp);
            $zag      .= "------------".$un."\n";
            $zag      .= "Content-Type: application/octet-stream;";
            $zag      .= "name=file-".$i."\n";
            $zag      .= "Content-Transfer-Encoding:base64\n";
            $zag      .= "Content-Disposition:attachment;";
            $zag  	  .= "filename=file-".$i.".".$f["ext"]."\n\n";
            $zag      .= chunk_split(base64_encode($file))."\n";
            $i++;
        }
        //KavelinDV@rushydro.ru,svl@rushydro.ru
        mail('KavelinDV@rushydro.ru,svl@rushydro.ru', makeUtfString('Электроснабжение крупных потребителей'), $zag, $head);
        //fedor@softmajor.ru
        //mail('fedor@softmajor.ru', makeUtfString('Электроснабжение крупных потребителей'), $zag, $head);
    }

} ?>
<?php if ($formDone) { ?>	
	<script>		
		$(window.top.document).find('body,html').scrollTop(0);
	</script>
    <p>
        <b>Ваша заявка <span style="font-size:16px">#<?php echo $id; ?></span> отправлена</b>
    </p>
<?php } else { ?>
    <div class="tbl-form">		
        <form method="POST" action="/tools/innovation/electricity.php#form-send" enctype="multipart/form-data" id="zform">
            <!--<table width="100%" cellspacing="0" cellpadding="0">
                <?php foreach ($fields as $fieldName => $fieldTitle) { ?>

                <tr>

                    <?php if (is_numeric($fieldName)) { ?>
                        <td>
                            <h3>
                                <?= $fieldTitle; ?>
                            </h3>
                        </td>
                    <?php } else { ?>

                    <td id="<?= $fieldName . '_scope'; ?>">
                        <div class="tbl-f-head">
                            <? if ($fieldTypes[$fieldName] != 'helper') { ?>
                                <label for="<?= $fieldName; ?>">
                                    <?= $fieldTitle; ?>
                                    <? if ($fieldRules[$fieldName] == "required"): ?>
                                        <span style="color: red;">* <?= $error[$fieldName] ?></span>
                                    <? endif; ?>
                                </label>
                            <? } ?>
                        </div>
                        <?php
                        switch (isset($fieldTypes[$fieldName]) ? $fieldTypes[$fieldName] : null) {
                            case 'text':
                                echo '<textarea name="' . $fieldName . '" id="' . $fieldName . '">' . $fieldValues[$fieldName] . '</textarea>';
                                break;
                            case 'helper':
                                echo '<p><b>' . $fieldTitle . '</b></p>';
                                break;
                            default:
                                echo '<input name="' . $fieldName . '" id="' . $fieldName . '" class="inp ' . implode(' ', $rules) . '" type="text" value="' . $fieldValues[$fieldName] . '" />';
                                break;
                        } ?>
                        <? } ?>
                    </td>
                    <?php } ?>
                </tr>
            </table>
            <br/>
            <input type="submit" value="Отправить заявку" id="form-submit"/>
			-->
			<table width="100%" cellspacing="0" cellpadding="0"><tr>
					<td>
						<h3>Общая информация</h3>
					</td>
                </tr>
				<tr>
					<td id="GENERAL1_scope" colspan="2">
							<div class="tbl-f-head">
								<label for="GENERAL1">Наименование проекта<span style="color: red;">* </span></label>
							</div>
							<input name="GENERAL1" id="GENERAL1" class="inp " value="<?=$_REQUEST["GENERAL1"]?>" type="text">
					</td>						
                </tr>
				<tr>                   
                    <td id="GENERAL2_scope" colspan="2">
                        <div class="tbl-f-head">
							<label for="GENERAL2">Производимая продукция</label>
                        </div>
                        <textarea name="GENERAL2" id="GENERAL2"><?=$_REQUEST["GENERAL2"]?></textarea>
					</td>                    
                </tr>
				<tr>
                    <td id="GENERAL3_scope" colspan="2">
                        <div class="tbl-f-head">
							<label for="GENERAL3">Регион размещения на территории РФ<span style="color: red;">* </span></label>
                        </div>
                        <input name="GENERAL3" id="GENERAL3" class="inp " value="<?=$_REQUEST["GENERAL3"]?>" type="text">
					</td>                    
                </tr>
				<tr>
                    <td id="GENERAL4_scope" colspan="2">
                        <div class="tbl-f-head">
                            <label for="GENERAL4">Крупный населенный пункт близкий к проекту  (или Подстанция)</label>
                        </div>
                        <input name="GENERAL4" id="GENERAL4" class="inp " value="<?=$_REQUEST["GENERAL4"]?>" type="text">
					</td>                    
                </tr>
				<tr>
                    <td id="GENERAL5_scope" colspan="2">
                        <div class="tbl-f-head">
							<label for="GENERAL5">Сроки реализации</label>
                        </div>
                        <input name="GENERAL5" id="GENERAL5" class="inp " value="<?=$_REQUEST["GENERAL5"]?>" type="text">
					</td>                    
                </tr>
				<tr>                    
                    <td id="GENERAL6_scope" colspan="2">
                        <div class="tbl-f-head">
                            <label for="GENERAL6">Контакты представителя<span style="color: red;">*</span></label>
                        </div>
                        <textarea name="GENERAL6" id="GENERAL6"><?=$_REQUEST["GENERAL6"]?></textarea>
					</td>                    
                </tr>
				<tr> 
					<td colspan="2">
                        <h3>Поставка электроэнергии и мощности</h3>
                    </td>
                </tr>
				<tr>
                    <td id="ENERGY1_scope" colspan="2">
                        <div class="tbl-f-head">
                            <label for="ENERGY1">Расчетное потребление электрической энергии МВт. час/год</label>
                        </div>
                        <input name="ENERGY1" id="ENERGY1" class="inp " value="<?=$_REQUEST["ENERGY1"]?>" type="text">
					</td>                    
                </tr>
				<tr>
                    <td id="ENERGY2_scope" colspan="2">
                        <div class="tbl-f-head">
                            <label for="ENERGY2">Максимальная потребляемая мощность, МВт</label>
                        </div>
                        <input name="ENERGY2" id="ENERGY2" class="inp " value="<?=$_REQUEST["ENERGY2"]?>" type="text">
					</td>                    
                </tr>
				<tr>
                    <td id="ENERGY3_scope" colspan="2">
                        <div class="tbl-f-head">
							<label for="ENERGY3">Расчетная потребляемая мощность ,МВт</label>
                        </div>
                        <textarea name="ENERGY3" id="ENERGY3"><?=$_REQUEST["ENERGY3"]?></textarea>
					</td>                    
                </tr>
				<tr>                   
                    <td id="ENERGY4_scope" colspan="2">
                        <div class="tbl-f-head">
                            <label for="ENERGY4">Предварительный график присоединяемой нагрузки МВт/год</label>
                        </div>
                        <input name="ENERGY4" id="ENERGY4" class="inp " value="<?=$_REQUEST["ENERGY4"]?>" type="text">
					</td>                    
                </tr>
				<tr>
                    <td id="ENERGY5_scope" colspan="2">
                        <div class="tbl-f-head">
                            <label for="ENERGY5">Наличие собственной генерации</label>
						</div>
                        <input name="ENERGY5" id="ENERGY5" class="inp " value="<?=$_REQUEST["ENERGY5"]?>" type="text">
					</td>                    
                </tr>
				<tr>
					<td colspan="2">
                        <h3>Поставка тепловой энергии (при необходимости)</h3>
                    </td>
                </tr>
				<tr>                   
                    <td id="SUPPLY1_scope" colspan="2">
                        <div class="tbl-f-head">
                            <label for="SUPPLY1">Срок подключения объекта</label>
                        </div>
                        <input name="SUPPLY1" id="SUPPLY1" class="inp " value="<?=$_REQUEST["SUPPLY1"]?>" type="text">
					</td>                    
                </tr>
				<tr>                    
                    <td id="SUPPLY2_scope" colspan="2">
                        <div class="tbl-f-head"></div>
                        <p><b>Максимальная часовая и среднечасовая нагрузка объекта Гкал/ч</b></p>                                            
					</td>                    
                </tr>
				<tr>
					<td style="width: 50%"><div style="padding: 0 15px 0 0">
						<table width="100%" cellspacing="0" cellpadding="0">
							
							<tr>		
								<td id="SUPPLY3_scope" colspan="2">
									<div class="tbl-f-head"></div>
									<p><b>По видам теплоносителей:</b></p>                                            
								</td>                    
							</tr>
							<tr>
								<td id="SUPPLY4_scope" colspan="2">
									<div class="tbl-f-head">
										<label for="SUPPLY4">горячая вода Гкал/ч;</label>
									</div>
									<input name="SUPPLY4" id="SUPPLY4" class="inp " value="<?=$_REQUEST["SUPPLY4"]?>" type="text">
								</td>                    
							</tr>
							<tr>
								<td id="SUPPLY5_scope" colspan="2">
									<div class="tbl-f-head">
										<label for="SUPPLY5">пар Гкал/ч;</label>
									</div>
									<input name="SUPPLY5" id="SUPPLY5" class="inp " value="<?=$_REQUEST["SUPPLY5"]?>" type="text">
								</td>                    
							</tr>
							
						</table>
					</div></td>
					<td><div style="padding: 0 0 0 15px">
						<table width="100%" cellspacing="0" cellpadding="0">
							<tr>                   
								<td id="SUPPLY6_scope" colspan="2">
									<div class="tbl-f-head"></div>
									<p><b>По видам теплопотребления:</b></p>                                            
								</td>                    
							</tr>
							<tr>
								<td id="SUPPLY7_scope" colspan="2">
									<div class="tbl-f-head">
										<label for="SUPPLY7">на отопление Гкал/ч;</label>
									</div>
									<input name="SUPPLY7" id="SUPPLY7" class="inp " value="<?=$_REQUEST["SUPPLY7"]?>" type="text">
								</td>                    
							</tr>
							<tr>                     
								<td id="SUPPLY8_scope" colspan="2">
									<div class="tbl-f-head">
										<label for="SUPPLY8">на вентиляцию Гкал/ч;</label>
									</div>
									<input name="SUPPLY8" id="SUPPLY8" class="inp " value="<?=$_REQUEST["SUPPLY8"]?>" type="text">
								</td>                    
							</tr>
							<tr>                    
								<td id="SUPPLY9_scope" colspan="2">
									<div class="tbl-f-head">
										<label for="SUPPLY9">на ГВС Гкал/ч;</label>
									</div>
									<input name="SUPPLY9" id="SUPPLY9" class="inp " value="<?=$_REQUEST["SUPPLY9"]?>" type="text">
								</td>                    
							</tr>
						</table>
					</div></td>
				</tr>	
				
				
				<tr>
                    <td id="SUPPLY10_scope" colspan="2">
                        <div class="tbl-f-head">
                            <label for="SUPPLY10">Схема присоединения теплопотребляющих установок:</label>
                            <input name="FILE"  type="file" />
                        </div>
                        <textarea name="SUPPLY10" id="SUPPLY10"><?=$_REQUEST["SUPPLY10"]?></textarea>
					</td>                    
                </tr>
				<tr>                    
                    <td id="SUPPLY11_scope" colspan="2">
                        <div class="tbl-f-head">
							<label for="SUPPLY11">Расчетный расход теплоносителя (в том числе с водоразбором из сети), м3/час:</label>
                        </div>
                        <input name="SUPPLY11" id="SUPPLY11" class="inp " value="<?=$_REQUEST["SUPPLY11"]?>" type="text">
					</td>
                </tr>
            </table>
			<br/>
            <input type="submit" value="Отправить заявку" id="form-submit" />
			<div class="tbl-f-error">
                <?foreach ($error as $key=>$val){
                    ?><p><i><?=$fields[$key]?>: </i><?=$val;?></p><?
                }?>
            </div>
        </form>		
    </div>
<? } ?>
</body>
</html>