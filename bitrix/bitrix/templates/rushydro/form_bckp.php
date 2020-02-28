<?
if (RhdHandler::isEnglish()) {
	$APPLICATION->SetTitle("Trust line");
}else{
	$APPLICATION->SetTitle("Линия доверия");
}
?>
<script type="text/javascript">
$(document).ready(function(){
	$("#show_rules").click(function(){
		$("#rules_feedback").css("display","block");
		$("#form_feedback").css("display","none");
		return false;
	});
	$("#hide_rules, #send_plus").click(function(){
		$("#rules_feedback").css("display","none");
		$("#form_feedback").css("display","block");
		return false;
	});
});
</script>
<div id="form_feedback" style="margin-bottom:40px;">

	<?php if (RhdHandler::isEnglish()) { ?>
		<h1>Trust line</h1>
	<?php } else {?>
		<h1>Линия доверия</h1>
	<?php } ?>
	
	<?php if (RhdHandler::isEnglish()) { ?>
		<h3>Auto answer telephone <span style="color:#E66A25;">+7 (495) 710 54 63</span></h3>
		<p style="text-align:justify;">To ensure continuous feedback for the Company’s employees and counterparties directly with the Company’s management regarding prevention and counteraction of illegal actions, RusHydro has established a 24/7 Trust Line that includes various special communication channels.</p>
		<br/>
                <p style="text-align:justify;">The Company’s Trust Line is operated by the Company’s Internal Control and Risk Management Unit, responsible for processing calls in strict confidence as per RusHydro internal documents.</p>
	<?php } else { ?>
		<h3>Телефон автоответчика <span style="color:#E66A25;">+7 (495) 710 54 63</span></h3>
		<p style="text-align:justify;"><strong>ПАО «РусГидро» продолжает работу по противодействию мошенничеству и коррупции</strong></p>
		<br/>
		<p style="text-align:justify;">ПАО «РусГидро» продолжает работу по совершенствованию деятельности «Линии доверия» Общества. Основная цель системы, внедренной еще в 2011 году, – налаживание обратной связи с сотрудниками РусГидро, дочерних и зависимых обществ, а также с контрагентами в целях противодействия коррупции и мошенническим схемам в работе Общества. Отныне такие сведения могут направляться не только Директору по внутреннему контролю и управлению рисками, но и Директору Департамента по связям с общественностью.</p>
		<br/>
		<p style="text-align:justify;">Заявитель, в случае надлежащего оформления и отправки своего обращения, вправе рассчитывать на официальный ответ в установленные нормативными документами Общества сроки. При этом заявление может быть направлено в том числе анонимно, но в таком случае решение о рассмотрении подобного обращения по существу принимает Директор по внутреннему контролю и управления рисками. 
		</p>
		<br>
		<p style="text-align:justify;">При выявлении экономического, социального и репутационного эффекта для ПАО «РусГидро» от поступившего на «Линию доверия» обращения, в том числе в случае предотвращения ущерба, может быть принято решение о поощрении заявителей, за исключением анонимных. Решение о поощрении заявителей, его форме и размере принимается Правлением Общества по представлению Директора по внутреннему контролю и управлению рисками с учетом величины и значимости полученного Обществом эффекта. 
		</p><br/>
		<p style="text-align:justify;">Вместе с тем, введен <a href="/upload/limiting-criteria-for-the-consideration-of-communications.pdf">ряд критериев, позволяющих не рассматривать поступившие обращения если они не отвечают установленным требованиям</a>. Не подлежат рассмотрению массовые рассылки или рекламные сообщения (спам), если невозможно однозначно идентифицировать изложенные данные/сообщения/информацию, а также если они не относятся к целям функционирования «Линии доверия». Не подлежат рассмотрению обращения, содержащие нечитаемые символы, «пустые» формы обратной связи (отсутствие прикрепленных файлов/отсутствие доступа к прикрепленным файлам).
		</p><br/>
		<p style="text-align:justify;">Не рассматриваются заявления, касающиеся кадрового трудоустройства, получения справочной информации, конфиденциальных сведений либо сведений, являющихся коммерческой тайной. Без ответа также останутся вопросы, которые невозможно оценить на предмет корректности/адекватности/существенности/релевантности, а также те, в которых отсутствуют все существенные аспекты и необходимые сведения.
		</p><br/>
		<p style="text-align:justify;">Несущественные/незначительные для Общества сведения, содержащиеся в обращениях заявителей, установленные на основании профессиональных суждений, основанных на собранных аудиторских доказательствах, выявленных причинно-следственных связях и/или установленных виновных лицах, оценке ущерба и/или установленных последствий действий/бездействий, в том числе работников РусГидро, рассматриваться не будут. Не входят в компетенцию «Линии доверия» и заявления, не относящиеся к сфере деятельности и компетенции РусГидро. 
		</p><br/>
		<p style="text-align:justify;">Введение новых правил стало продолжением политики РусГидро, направленной на повышение прозрачности деятельности Общества, противодействие коррупционным и мошенническим схемам. 
		</p><br/>
		<p style="text-align:justify;">В качестве дополнительного коммуникационного канала обмена информацией по «Линии доверия» в офисах ПАО «РусГидро», расположенных по адресам установлены почтовые ящики, посредством которых также возможно направить информацию. Выемка сообщений осуществляется еженедельно. 
		</p><br/>
		<p style="text-align:justify;">В качестве дополнительного коммуникационного канала обмена информацией по «Линии доверия» в офисах ПАО «РусГидро», расположенных по адресам установлены почтовые ящики, посредством которых также возможно направить информацию. Выемка сообщений осуществляется еженедельно. 
		</p>
		<br/>  
		<p><a href="/press/material/nds/">О возврате НДС доступно</a></p>
		<br/>
		<p><a href="/press/material/80661.html">Антикоррупционные плакаты ПАО «РусГидро»</a></p>
		<br/>
		<p><a href="/press/material/26715.html">Организация закупочной деятельности ПАО «РусГидро»</a></p>
		<br/>
		<p><a href="/press/material/26716.html">О понятии «аффилированные лица»</a></p>
		<br/>
		<p><a href="/sustainable_development/riski/klient-affilirovannykh-lits/">Клиент аффилированных лиц</a></p>
		<br/>
		<p><a href="/upload/limiting-criteria-for-the-consideration-of-communications.pdf">Ограничивающие критерии рассмотрения сообщений</a></p>
		<br/>
	<?}?>
	
	<?php if (RhdHandler::isEnglish()) { ?>
		<div class="note" style="font-size: 100%;">
			<p>Please note that this address is only intended for letters pertaining to RusHydro activities.<br/>Letters with offers of services, employment or other messages not immediately falling within the scope of the Company’s activities will not be considered or forwarded to other RusHydro units.</p>
			<p>Read <a href="#rules" id="show_rules">the Public Reception Operation Rules</a></p>
			<p><span style="color:#000">*</span> – mandatory fields</p>
		</div>
	<?php } else {?>
		<div class="note" style="font-size: 100%;">
			<p>Обращаем ваше внимание, что данный адрес предназначен исключительно для отправки писем, имеющих отношение к вопросам деятельности РусГидро.<br/>Письма с предложениями услуг, о приеме на работу и прочие послания, не касающиеся напрямую проблематики работы Компании, рассматриваться и пересылаться в другие подразделения ПАО «РусГидро» не будут.</p>
			<p><a href="#rules" id="show_rules">Ознакомьтесь с правилами работы "Линии доверия" и Регламентом о порядке приема, рассмотрения и подготовки ответов на обращения, поступившие на «Линию доверия» ПАО «РусГидро».</a></p>
			<p><span style="color:#000">*</span> – отмечены поля обязательные для заполнения</p>
		</div>
	<?php } ?>
	<?$APPLICATION->IncludeComponent("rushydro:form.result.new", ".default", array(
		"WEB_FORM_ID" => RhdHandler::isEnglish() ? 4 : 1,
		"IGNORE_CUSTOM_TEMPLATE" => "N",
		"USE_EXTENDED_ERRORS" => "Y",
		"SEF_MODE" => "N",
		"SEF_FOLDER" => "/",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "3600",
		"LIST_URL" => RhdPath::createUrl(RhdHandler::getMainSiteCode(), 'form'),
		"EDIT_URL" => RhdPath::createUrl(RhdHandler::getMainSiteCode(), 'form'),
		"SUCCESS_URL" => RhdPath::createUrl(RhdHandler::isEnglish() ? RhdHandler::getEnglishSiteCode() : RhdHandler::getMainSiteCode(), 'form'),
		"CHAIN_ITEM_TEXT" => "",
		"CHAIN_ITEM_LINK" => "",
		"VARIABLE_ALIASES" => array(
			"WEB_FORM_ID" => "WEB_FORM_ID",
			"RESULT_ID" => "RESULT_ID",
		)
		),
		false
	);?>
</div>
<?php if (RhdHandler::isEnglish()) { ?>
<div id="rules_feedback" style="text-align:justify">
	<a name="rules" href=""></a>
	<div class="rules_arr"><span>&larr;</span>&nbsp;&nbsp;<a href="#" id="hide_rules">Back</a></div>

	<h1>RusHydro Public Reception Operation Rules</h1>
	<br/>
	<br/>
	<div class="orange_head">1. MAIN PROVISIONS</div>

	<p>1.1. The Trust Line is established within the scope of the Program of Measures for Identifying and Preventing Fraud and Unlawful Actions of the Company’s Employees and Counterparties.</p>

	<p>1.2. The Trust Line operating rules (hereinafter the “Rules”) are intended to regulate acceptance, handling, taking of appropriate measures (as may be necessary) with respect to, and preparing responses to calls from Callers.</p>

	<p>1.3. Director for Internal Control and Risk Management guarantees the confidentiality of information contained in calls.</p>

	<p>1.4. Callers have the right to receive responses to their calls within the time limits established by the Company’s local regulatory documents (regulations), provided the calls are properly prepared and sent as per these Rules, save for anonymous calls.</p>

	<p>1.5. Calls prepared and sent in violation of these Rules or provided anonymously are handled at the discretion of the Director for Internal Control and Risk Management.</p>

	<p>1.6. If the issue addressed in a call cannot be substantively responded to without disclosing state secrets or the Company’s commercial secrets, the Caller sending such call may be informed that the issue in question cannot be responded as the indicated information may not be disclosed.</p>
	<br/>
	<br/>

	<div class="orange_head">2. ACCEPTANCE AND HANDLING OF CALLS</div>

	<p>2.1. Calls are accepted both using a special feedback form on the Company’s website andcorporate portal Trust Line, by e-mail, auto answerphone, as well as immediately by the Director for Internal Control and Risk Management in the course of a personal meeting.</p>

	<p>Calls may be sent in any form convenient to the Caller, however to speed up their processing and handling, it is recommended that calls include the following information:<br/>
– A brief description of the call subject matter (information, facts, circumstances, possible reasons, full name and title of involved persons, consequences, including potential (estimated) material damage for the Company, recommendations, etc.).<br/>
– The Company’s scope of activities in which the violation was committed (procurement, HR management, etc.).<br/>
– The name of the Company’s unit in which the violation was committed.<br/>
– The period of time during which the violation took/is taking or might take place, and frequency (repeatedly, once).<br/>
– Full name and details to contact the caller to specify the information contained in the call and to send the response after the call is processed (at the discretion of the Caller).</p>

	<p>2.3. Calls may be sent by e-mail to: ld@rushydro.ru (from any mail box from an external Internet segment).</p>

	<p>2.4. Calls may be sent using a special feedback form at the Company’s website/corporate portal, for which please log on to the special Trust Line page on the Company’s corporate portal at http://my.rushydro.ru/helpful/pubrec/default.aspx or at the Company’s website at http://www.rushydro.ru/, follow the Trust Line link and fill in the special feedback form.</p>

	<p>2.5. Calls may be made by auto answerphone. Please call +7(495) 710-5463 (round-the-clock), wait for the signal and leave a voice message.</p>

	<p>2.6. Calls may also be made at a personal meeting with the Director for Internal Control and Risk Management (hereinafter the “meeting”).</p>
	<p>2.6.1. An application for the meeting may be sent via the communication channels indicated in clauses 3.3, 3.4 and 3.5 hereof or through the personal assistant by 7 (495) 225-3232 ext. 16-51.</p>
	<p>2.6.2. The application shall include the subject matter of the call, contact details and preferable time and place of the meeting.</p>

	<p>2.7. The procedure for handling and preparing responses to Trust Company’s local regulatory document (regulation).</p>
	<br/>
	<br/>
	<div class="orange_head">3. PUBLIC RECEPTION USE RESTRICTION</div>

	<p>3.1. It is prohibited to use the Trust Line to:<br/>
	– Distribute deliberately misleading information that discredits the honor and dignity of the Company’s employees or their family members.<br/>
	– Abuse or threaten life, health or property of the Company’s employees or their family members.<br/>
	– Support unfair competition.<br/>
	– Pursue hooligan motives.<br/>
	– Pursue any other illegal goals or goals contravening public order or morals.<br/>
	– Distribute any advertising information or send information not directly relating to the Company’s activity.</p>
	<br/>
	<br/>
	<br/>
	<div class="btn_sbmt" style="left:50%; margin-left:-30px;"><i></i><a href="#" id="send_plus">send</a></div>
	<br/>
	<br/>
</div>
<?php } else { ?>
<div id="rules_feedback" style="text-align:justify">
	<a name="rules" href=""></a>
	<div class="rules_arr"><span>&larr;</span>&nbsp;&nbsp;<a href="#" id="hide_rules">Вернуться назад</a></div>

	<h1>Правила работы «Линии доверия»<br/> ПАО «РусГидро»</h1>
	<br/>
	<br/>
	<table cellspacing="0" cellpadding="0" border="0" class="mceItemTable" style="line-height: 1.3em;"> 
    	<tr>
    		<td>
    			<img src="http://www.rushydro.ru/pic/icon_xls.gif" alt="icon"></td>
    		<td style="padding-left: 10px;">
    			<a target="_blank" href="http://www.rushydro.ru/upload/iblock/0cc/Reglament-Linii-doveriya-2016.xls">Регламент о порядке приема, рассмотрения и подготовки ответов на обращения, поступившие на «Линию доверия» ПАО «РусГидро»</a>
    		</td>
    	</tr>
 	</table>
	<br/>
	<br/>
	 
	<p align="left" class="orange_head"><b>1. </b><b>Термины и определения</b></p>
	 
	<p>1.1. &laquo;Линия доверия&raquo; - специализированные коммуникационные каналы обратной связи с работниками ПАО &laquo;РусГидро&raquo; (далее &ndash; Общество) и представителями контрагентов Общества с целью получения от них обращений по вопросам противодействия мошенничеству/коррупции, пресечению противоправных действий, совершенствованию деятельности Общества.</p>
	 
	<p>1.2. Обращение &ndash; отзыв о деятельности Общества, поступивший от Заявителя директору по внутреннему контролю и управлению рисками &ndash; Главному аудитору Общества по &laquo;Линии доверия&raquo;.</p>
	 
	<p>1.3. Заявитель &ndash; физическое лицо, состоящее в трудовых отношениях с Обществом, а также представитель юридического лица, физическое лицо или иной субъект гражданских правоотношений, с которым Общество намерено вступить или находится в гражданско-правовых отношениях.</p>

	<p>
	  <br />
	</p>
	 
	<p> </p>
	 
	<p align="left" class="orange_head"><b>2. </b><b>Основные положения</b></p>
	 
	<p>2.1. &laquo;Линия доверия&raquo; открыта в рамках деятельности по противодействию коррупции, выявлению и предотвращению случаев мошенничества и противоправных действий в Обществе.</p>
	 
	<p>2.2. Правила работы &laquo;Линии доверия&raquo; Общества (далее &ndash; Правила) предназначены для организации приема, рассмотрения, принятия соответствующих мер (при необходимости) и подготовки ответов на обращения Заявителей, в том числе по вопросам:</p>
	 
	<p>2.2.1. получения/дачи взятки работником Общества;</p>
	 
	<p>2.2.2. злоупотребления работником Общества полномочиями;</p>
	 
	<p>2.2.3. незаконного использования работником Общества должностного положения вопреки законным интересам Общества в целях получения выгоды;</p>
	 
	<p>2.2.4. склонения работника Общества к совершению коррупционных правонарушений;</p>
	 
	<p>2.2.5. возникновения/возможного возникновения у работников Общества конфликта интересов<a title="" name="_ftnref1" href="#_ftn1">[1]</a>.</p>
	 
	<p>2.3. Директор по внутреннему контролю и управлению рисками &ndash; Главный аудитор Общества гарантирует Заявителю конфиденциальность сведений, содержащихся в обращении.</p>
	 
	<p>2.4. Заявитель имеет право на получение ответа на свое обращение в установленные локальными нормативными документами (актами) Общества сроки при условии надлежащей его подготовки и отправки в соответствии с требованиями пункта 3.2 настоящих Правил.</p>
	 
	<p>2.5. Обращение на &laquo;Линию доверия&raquo; может быть направлено анонимно.</p>
	 
	<p>2.6. Обращения, подготовленные и направленные в нарушение требований настоящих Правил, а так же поступившие анонимно, рассматриваются по усмотрению директора по внутреннему контроля и управлению рисками &ndash; Главного аудитора Общества с учетом ограничивающих критериев, установленных пунктом 4.2 настоящих Правил.</p>
	 
	<p>2.7. В случае если ответ по существу поставленного в обращении вопроса не может быть дан без разглашения сведений, составляющих государственную тайну или коммерческую тайну Общества, Заявителю, направившему обращение, может быть сообщено о невозможности дать ответ по существу поставленного в нем вопроса в связи с недопустимостью разглашения указанных сведений.</p>

	<p>
	  <br />
	</p>
	 
	<p> </p>
	 
	<p align="left" class="orange_head"><b>3. </b><b>Прием и рассмотрение обращений</b></p>
	 
	<p>3.1. Обращения принимаются через следующие каналы связи:</p>
	 
	<p>3.1.1. Электронная почта (адрес: <a href="mailto:ld@rushydro.ru">ld@rushydro.ru</a>);</p>
	 
	<p>3.1.2. Специальная форма &laquo;обратной связи&raquo; на сайте Общества/корпоративном портале Общества (специализированная страница &laquo;Линия доверия&raquo; на корпоративном портале Общества по адресу <a href="https://my.rushydro.ru/helpful/pubrec/default.aspx">https://my.rushydro.ru/helpful/pubrec/default.aspx</a> или на сайте Общества по адресу <a href="http://www.rushydro.ru/">http://www.rushydro.ru/</a>, далее перейти по ссылке &laquo;Линия доверия&raquo; и заполнить поля специальной формы &laquo;обратной связи&raquo;);</p>
	 
	<p>3.1.3. Телефонный автоответчик (необходимо позвонить по телефону +7(495) 710-5463 (круглосуточно), дождаться сигнала о начале записи и оставить устное обращение);</p>
	 
	<p>3.1.4. Личная встреча с директором по внутреннему контролю и управлению рисками - Главным аудитором (далее &ndash; встреча):</p>
	 
	<p>3.1.4.1. Заявка на встречу может быть направлена посредством каналов связи, указанных в подпунктах 3.1.1., 3.1.2., 3.1.3. настоящих Правил или через личного помощника по телефону + 7 (495) 225-3232 доб. 16-51.</p>
	 
	<p>3.1.4.2. В заявке необходимо сообщить тему обращения, контакты для обратной связи и предпочтительные время и место<a title="" name="_ftnref2" href="#_ftn2">[2]</a> проведения встречи.</p>
	 
	<p>3.2. Обращение может быть направлено в любой удобной для Заявителя форме, но с целью ускорения его обработки и рассмотрения рекомендуется указать в нем следующие сведения:</p>
	 
	<ul>
	  <li>Краткое описание сути обращения (сведения, факты, обстоятельства, возможные причины, Ф.И.О. и наименование должности причастных лиц, последствия, в том числе возможный (оценочно) материальный ущерб Обществу, рекомендации и т.п.).</li>

	  <li> Область деятельности Общества, в которой произошло нарушение, (закупки, управление персоналом и т.п.).</li>

	  <li> Наименование подразделения Общества, в котором произошло нарушение.</li>

	  <li> Временной период, в котором произошло/происходит или возможно произойдет нарушение, периодичность (постоянно, разово).</li>

	  <li> Ф.И.О. и координаты для обратной связи с заявителем для уточнения сведений содержащихся в обращении и направления ответа по результатам рассмотрения обращения (на усмотрение Заявителя).</li>
	</ul>
	 
	<p>3.3. Порядок рассмотрения обращений, поступивших по &laquo;Линии доверия&raquo;, и подготовки ответов на них определяется Регламентом о порядке приема, рассмотрения и подготовки ответов на обращения, поступившие на &laquo;Линию доверия&raquo; Общества.</p>
	 
	<p>3.4. В случае наличия положительного экономического, социального и репутационного эффекта для Общества, в том числе предотвращения ущерба, в результате рассмотрения обращений, поступивших на &laquo;Линию доверия&raquo;, может быть принято решение о поощрении заявителей, за исключением случаев, когда обращение направлено анонимно. </p>
	 
	<p>3.5. Решение о поощрении заявителей, его форме и размере принимается Правлением Общества по представлению директора по внутреннему контролю и управлению рисками - Главного аудитора Общества с учетом величины и значимости достигнутого для Общества эффекта.</p>

	<p>
	  <br />
	</p>
	 
	<p> </p>
	 
	<p align="left" class="orange_head"><b>4. </b><b>Ограничение на использование &laquo;Линия доверия&raquo;</b></p>
	 
	<p>4.1. Запрещается использовать &laquo;Линию доверия&raquo; для следующих целей:</p>
	 
	<ul>
	  <li>Распространения заведомо ложных, порочащих честь и достоинство работника Общества сведений, а также членов его семьи.</li>

	  <li> Оскорбления, выражения угрозы жизни, здоровью и имуществу работника Общества, а также членов его семьи.</li>

	  <li> Недобросовестной конкуренции.</li>

	  <li> Преследования хулиганских побуждений.</li>

	  <li> Преследования иных противоправных целей или целей противоречащих основам правопорядка и нравственности.</li>

	  <li>Распространения информации, рекламного характера, направления сведений, не относящихся непосредственно к деятельности Общества. </li>
	</ul>

	<p>4.2. Ограничивающими критериями рассмотрения обращений, поступивших на &laquo;Линию доверия&raquo;, являются:</p>
	 
	<p>4.2.1. Массовая рассылка обращений заявителями пользователям по электронной почте (спам), а также рассылка сообщений рекламного характера. </p>
	 
	<p>4.2.2. Невозможность однозначной идентификации содержащихся в сообщениях заявителей данных/сведений/информации, а также несоответствие содержащейся в сообщениях информации целям функционирования &laquo;Линии доверия&raquo;, определенным пунктом 1.1. настоящих Правил.</p>
	 
	<p>4.2.3. Содержание в обращениях заявителей нечитаемых символов, &laquo;пустые&raquo; формы обратной связи (отсутствие прикрепленных файлов/отсутствие доступа к прикрепленным файлам).</p>
	 
	<p>4.2.4. Содержание в обращениях заявителей вопросов, касающихся кадрового трудоустройства, получения справочной информации, конфиденциальных сведений/сведений, являющихся &laquo;коммерческой тайной&raquo;.</p>
	 
	<p>4.2.5. Содержание в обращениях заявителей вопросов, не подлежащих возможности их оценки на предмет корректности/адекватности/существенности/релевантности, а также отсутствие в содержании обращений всех существенных аспектов и необходимых сведений.</p>
	 
	<p>4.2.6. Несущественность/незначительность для Общества сведений, содержащихся в обращениях заявителей, установленная на основании профессиональных суждений, основанных на собранных аудиторских доказательствах, выявленных причинно-следственных связях и/или установленных виновных лицах, оценке ущерба и/или установленных последствий действий/бездействий, в том числе работников Общества и его дочерних обществ, указанных в обращениях заявителей. </p>
	 
	<p>4.2.7. Содержание в обращениях заявителей сведений, не относящихся к сфере деятельности и компетенции Общества.</p>

	<p>
	  <br />
	</p>
	 
	<p> </p>
	 
	<p align="left" class="orange_head"><b>5. </b><b>Заключительные положения</b></p>
	 
	<p>5.1. Настоящие Правила утверждаются организационно-распорядительным документом Общества и являются локальным нормативных документом (актом) Общества, обязательным для исполнения всеми работниками Общества.</p>
	 
	<p>5.2. Настоящие Правила подлежат обязательной публикации в разделе &laquo;Линия доверия&raquo; на корпоративном портале Общества по адресу <a href="https://my.rushydro.ru/helpful/pubrec/default.aspx">https://my.rushydro.ru/helpful/pubrec/default.aspx</a> и на сайте Общества по адресу <a href="http://www.rushydro.ru/">http://www.rushydro.ru/</a>.</p>
	 
	<p>5.3. Ответственным за поддержание в актуальном состоянии информации, содержащейся в настоящих Правилах, является директор по внутреннему контролю и управлению рисками &ndash; Главный аудитор Общества.</p>
	 
	<p>5.4. Вопросы по выполнению настоящих Правил или связанных с работой &laquo;Линии доверия&raquo; могут направляться по адресу электронной почты: <a href="mailto:ld@rushydro.ru">ld@rushydro.ru</a>. </p>
	 
	<div>
	  <br clear="all" />
	 <hr align="left" width="33%" size="1" /> 
	  <div id="ftn1"> 
	    <p><a title="" name="_ftn1" href="#_ftnref1">[1]</a> Подробнее деятельность Общества по урегулированию конфликта интересов описана в Политике управления конфликтом интересов ПАО &laquo;РусГидро&raquo; и Положении о порядке предотвращения и урегулирования конфликта интересов в ПАО &laquo;РусГидро&raquo;.</p>
	   </div>
	 
	  <div id="ftn2"> 
	    <p><a title="" name="_ftn2" href="#_ftnref2">[2]</a> Вне административного офиса Общества в Москве.</p>
	   </div>
	 </div>
	 
	<br/>
	<br/>
	<br/>
	<div class="btn_sbmt" style="left:50%; margin-left:-30px;"><i></i><a href="#" id="send_plus">отправить сообщение</a></div>
	<br/>
	<br/>
</div>
<?php } ?>
