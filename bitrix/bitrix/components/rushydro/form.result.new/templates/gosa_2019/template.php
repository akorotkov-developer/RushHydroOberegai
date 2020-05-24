<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
//IncludeTemplateLangFile(__FILE__, 'en');
?>

<?if ($arResult["FORM_NOTE"]){?>
    <div class="b-popup" style="left: 0;" id="popup2019">
        <div class="b-popup-content">
            <?php if (RhdHandler::isEnglish()): ?>
                Your application has been accepted. The answer will be prepared and sent within 20 calendar days.
            <?php else: ?>
                Ваше обращение принято. Ответ будет подготовлен и отправлен в течение 24 часов.
            <? endif; ?>
            <a class="close_popup btn_sbmt" href="<?=$arParams['SUCCESS_URL']?>">ok</a>
        </div>
    </div>
<script type="text/javascript">
$(document).ready(function(){
$('form[name="<?=$arResult['WEB_FORM_NAME']?>"]')[0].reset();
	$("#popup2019").show();
    });
</script>
<?php if (RhdHandler::isEnglish()): ?>

<?php else: ?>

<?php endif; ?>
<?}?>
<script type="text/javascript">
$(document).ready(function(){
$('form[name="<?=$arResult['WEB_FORM_NAME']?>"] input[name="form_radio_GOSA_2017_3"').change(function(){
if( !$('#43').is(':checked')){
$('input[name="form_text_45"]').closest('td').siblings().html('ПОЧТОВЫЙ АДРЕС С ИНДЕКСОМ');
}else{
$('input[name="form_text_45"]').closest('td').siblings().html('ВАШ E-MAIL');
}
});
    });
</script>
<?if (TRUE)//$arResult["isFormNote"] != "Y")
{
?>
<?=$arResult["FORM_HEADER"]?>
<?
/***********************************************************************************
						form questions
***********************************************************************************/
?>
<table class="form_feedback" width="98%">
	<?
	$errorText = RhdHandler::isEnglish() ? "<span class='ff_error'>Field is required</span>" : "<span class='ff_error'>Поле обязательно для заполнения</span>";

	foreach ($arResult["QUESTIONS"] as $FIELD_SID => $arQuestion)
	{
		if ($arQuestion['STRUCTURE'][0]['FIELD_TYPE'] != 'hidden') {
	?>
		<tr>
             <? if ($arQuestion["STRUCTURE"][0]["FIELD_TYPE"]=='checkbox'){?>
                 <td colspan=2 ><?
                        if ($arResult["isFormNote"] != "Y" && !empty($arResult["FORM_ERRORS"][$FIELD_SID])) {
                            echo $errorText;
                        }
                ?><div class="radios_wrap"><?=$arQuestion["HTML_CODE"]?></div>
                 </td>
            <? } else { ?>
			<td class="ff_head<?if ($arQuestion["STRUCTURE"][0]["FIELD_TYPE"] == "textarea" || $arQuestion["STRUCTURE"][0]["FIELD_TYPE"] == "file"){?> field_txtarea<?}?>">
				<?if (is_array($arResult["FORM_ERRORS"]) && array_key_exists($FIELD_SID, $arResult['FORM_ERRORS'])):?>
				<span class="error-fld" title="<?=$arResult["FORM_ERRORS"][$FIELD_SID]?>"></span>
				<?endif;?>
				<?=$arQuestion["CAPTION"]?><?if ($arQuestion["REQUIRED"] == "Y"):?><?=$arResult["REQUIRED_SIGN"];?><?endif;?>
			</td>
			<td>
				<?php switch ($arQuestion["STRUCTURE"][0]["FIELD_TYPE"]) {
					case 'textarea':
						if ($arResult["isFormNote"] != "Y" && !empty($arResult["FORM_ERRORS"][$FIELD_SID])) {
							echo $errorText;
						}
						?><div class="txtarea"><?=$arQuestion["HTML_CODE"]?></div><?php
						break;

					case 'file':
						if ($arResult["isFormNote"] != "Y" && !empty($arResult["FORM_ERRORS"][$FIELD_SID])) {
							echo "<span class='ff_error'>".$arResult["FORM_ERRORS"][$FIELD_SID]."</span>";
						}
						?>
						<div class="inp-file-wrap">
							<div class="inp-file in-bl"><?=GetMessage("FORM_SELECT_FILE_BUTTON")?><?=$arQuestion["HTML_CODE"]?></div><div class="inp-file-txt in-bl"></div>
						</div>
						<?php if (trim($arQuestion["STRUCTURE"][0]['MESSAGE'])): ?>
							<div class="ff_note"><?php echo $arQuestion["STRUCTURE"][0]['MESSAGE']; ?></div>
						<?php endif; ?><?php
						break;
                    case 'radio':
                        if ($arResult["isFormNote"] != "Y" && !empty($arResult["FORM_ERRORS"][$FIELD_SID])) {
                            echo $errorText;
                        }
                        ?><div class="radios_wrap"><?=$arQuestion["HTML_CODE"]?></div><?php
                        break;
                    default:
						if ($arResult["isFormNote"] != "Y" && !empty($arResult["FORM_ERRORS"][$FIELD_SID])) {
							echo $errorText;
						}
						?><div class="inp"><?=$arQuestion["HTML_CODE"]?></div><?php
						break;
				} ?>
			</td>
            <? } ?>
		</tr>
	<?
		} else {
			if ($FIELD_SID == "IP") {
		?>
			<tr style="visibility:hidden">
				<td colspan="2" style="padding:0;">
					<input type="hidden" value="<?=htmlspecialchars($_SERVER['HTTP_X_FORWARDED_FOR'] ?: $_SERVER['REMOTE_ADDR']);?>" name="form_hidden_<?=$arQuestion['STRUCTURE'][0]['ID']?>" />
				</td>
			</tr>
			<?
			}
		}
	} //endwhile
	?>
<?
if($arResult["isUseCaptcha"] == "Y")
{
?>
		<tr>
			<td colspan="2" class="ff_head" style="padding-top:10px;"><?=GetMessage("FORM_CAPTCHA_TABLE_TITLE")?><?//=$arResult["REQUIRED_SIGN"];?></b></td>
		</tr>
		<tr>
			<td nowrap><?=GetMessage("FORM_CAPTCHA_FIELD_TITLE")?></td>
			<td>
				<input type="hidden" id="captcha_sid" name="captcha_sid" value="<?=htmlspecialchars($arResult["CAPTCHACode"]);?>" />
<div id="captcha_container" class="captcha_container_gosa_2017">
				<img src="/bitrix/tools/captcha.php?captcha_sid=<?=htmlspecialchars($arResult["CAPTCHACode"]);?>" width="180" height="40" /></div>
				<div class="inp" style="float:left; width:150px; margin-top:10px; margin-bottom: 10px;"><span class="ff_error"><?echo $arResult["FORM_ERRORS"][0]?></span><i></i><i class="lft"></i><input type="text" name="captcha_word" size="30" maxlength="50" value="" class="inputtext" /></div>
				<div class="btn_sbmt"><i></i><span><?=GetMessage("FORM_ADD");?></span><input <?=(intval($arResult["F_RIGHT"]) < 10 ? "disabled=\"disabled\"" : "");?> type="submit" name="web_form_submit" value="<?=strlen(trim($arResult["arForm"]["BUTTON"])) <= 0 ? GetMessage("FORM_ADD") : $arResult["arForm"]["BUTTON"];?>" /></div>
			<a href="#" style="padding-top: 7px; display: inline-block;" onclick="getnewcaptcha();return false;">Обновить код</a>
</td>
		</tr>
<?
} else { ?>
		<tr>
			<td nowrap>&nbsp;</td>
			<td>
				<div class="btn_sbmt"><i></i><span><?=GetMessage("FORM_ADD");?></span><input <?=(intval($arResult["F_RIGHT"]) < 10 ? "disabled=\"disabled\"" : "");?> type="submit" name="web_form_submit" value="<?=strlen(trim($arResult["arForm"]["BUTTON"])) <= 0 ? GetMessage("FORM_ADD") : $arResult["arForm"]["BUTTON"];?>" /></div>
			</td>
		</tr>
<?php }
?>
</table>
<?=$arResult["FORM_FOOTER"]?>
<?
} //endif (isFormNote)
?>
<script type="application/javascript">
function setcaptcha(data){
   $('#captcha_sid').attr('value',data);
   $('#captcha_container').empty();
   $('#captcha_container').append('<img src="/bitrix/tools/captcha.php?captcha_sid='+data+'" width="180" height="40" alt="CAPTCHA">');
}

function getnewcaptcha()
{
   var file = '/bitrix/ajax.getcaptcha.php';
   $.get (file,{},function(data) { setcaptcha(data); });
}
</script>
