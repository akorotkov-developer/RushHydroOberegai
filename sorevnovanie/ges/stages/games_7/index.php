<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Турнирные таблицы VII Всероссийских соревнований оперативного персонала гидроэлектростанций");?> 
<h3>Финал</h3>
 
<div class="tbl-stages-head"> 
  <table style="width: 100%;"> 	 	 
    <tbody> 		 
      <tr> 			<td style="width: 321px; text-align: left; border-image: none 100% / 1 / 0 stretch; background-image: none;">Название команды</td> 			<td style="width: 72px; border-image: none 100% / 1 / 0 stretch;"><a href="http://sorevnovanie.rushydro.ru/upload/iblock/fc1/polojenenie-1-etap16.pdf" target="_blank" title="Подэтап 1 &amp;laquo;Знание НТД&amp;raquo;" >Этап 1</a></td> 			<td style="width: 70px; border-image: none 100% / 1 / 0 stretch;"><a href="http://sorevnovanie.rushydro.ru/upload/iblock/Pologenie_2.pdf" target="_blank" title="Производство оперативных переключений" >Этап 2</a></td> 			<td style="width: 78px; border-image: none 100% / 1 / 0 stretch;"><a href="http://sorevnovanie.rushydro.ru/upload/iblock/Pologenie_3.pdf" target="_blank" title="Противоаварийная тренировка" >Этап 3</a></td> 			<td style="width: 72px; border-image: none 100% / 1 / 0 stretch;"><a href="http://sorevnovanie.rushydro.ru/upload/iblock/fc1/polojenenie-4-etap16.pdf" target="_blank" title="Оказание первой доврачебной помощи" >Этап 4</a></td> 			<td style="width: 74px; border-image: none 100% / 1 / 0 stretch;"><a href="http://sorevnovanie.rushydro.ru/upload/iblock/fc1/polojenie-etap-5.pdf" target="_blank" title="Ликвидация возгорания с применением средств пожаротушения" >Этап 5</a></td> 			 			<td style="width: 58px; text-align: center; border-image: none 100% / 1 / 0 stretch;">Штраф</td> 			<td style="width: 48px; text-align: center; border-image: none 100% / 1 / 0 stretch;">Итого</td> 			<td style="width: 61px; text-align: center; border-image: none 100% / 1 / 0 stretch;">Место</td> 		</tr>
     		 
      <tr> 		</tr>
     	</tbody>
   </table>
 <i></i> <i class="arr-rght"></i> </div>
 <?$APPLICATION->IncludeComponent(
	"bitrix:news.list",
	"final",
	Array(
		"DISPLAY_DATE" => "Y",
		"DISPLAY_NAME" => "Y",
		"DISPLAY_PICTURE" => "Y",
		"DISPLAY_PREVIEW_TEXT" => "Y",
		"AJAX_MODE" => "N",
		"IBLOCK_TYPE" => "teams",
		"IBLOCK_ID" => "20",
		"NEWS_COUNT" => "",
		"SORT_BY1" => "SORT",
		"SORT_ORDER1" => "ASC",
		"FILTER_NAME" => "",
		"FIELD_CODE" => array(),
		"PROPERTY_CODE" => array("STAGE_1","STAGE_2","STAGE_3","STAGE_4","STAGE_5","STAGE_6","BONUS_POINTS","RANG","COMISSION","STAGE_1_1","STAGE_1_2","STAGE_1_2","STAGE_ERRORS"),
		"CHECK_DATES" => "Y",
		"DETAIL_URL" => "",
		"PREVIEW_TRUNCATE_LEN" => "",
		"ACTIVE_DATE_FORMAT" => "d.m.Y",
		"SET_TITLE" => "N",
		"SET_STATUS_404" => "N",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
		"ADD_SECTIONS_CHAIN" => "N",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"PARENT_SECTION" => "26",
		"PARENT_SECTION_CODE" => "",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "36000000",
		"CACHE_NOTES" => "",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "N",
		"DISPLAY_TOP_PAGER" => "N",
		"DISPLAY_BOTTOM_PAGER" => "Y",
		"PAGER_TITLE" => "Новости",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => "",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "Y",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_ADDITIONAL" => ""
	)
);?>  
<div><font size="1"><span style="line-height: 10px;"> 
      <br />
     </span></font></div>
 
<h3>Победители в номинации &quot;Лучший по профессии&quot;</h3>
 
<div> 
  <table style="width: 100%;" align="center" cellspacing="1" cellpadding="1" border="1"> 
    <tbody> 
      <tr><td style="text-align: center;">Начальник смены станции</td><td style="text-align: center;">Семенов Денис Николаевич</td><td style="text-align: center;">Филиал ПАО &laquo;РусГидро&raquo; - «Новосибирская ГЭС»</td></tr>
     
      <tr><td style="text-align: center;">Начальник смены машзала</td><td style="text-align: center;">Мухин Никита Борисович</td><td style="text-align: center;">Филиал ПАО «РусГидро» - «Новосибирская ГЭС»</td></tr>
     
      <tr><td style="text-align: center;">Машинист гидротурбинного 
          <br />
         оборудования</td><td style="text-align: center;">Иванов Петр Александрович</td><td style="text-align: center;">ПАО «Богучанская ГЭС»</td></tr>
     
      <tr><td style="text-align: center;">Дежурный электромонтер</td><td style="text-align: center;">Чернов Вадим Вадимович</td><td style="text-align: center;">Филиал ПАО «РусГидро» - «Воткинская ГЭС»</td></tr>
     </tbody>
   </table>
 </div>
 
<div> 
  <br />
 
  <h3>Регион Запад</h3>
 
  <div class="tbl-stages-head"> 
    <table> <colgroup> <col width="295"></col> <col width="69"></col> <col width="68"></col> <col width="68"></col> <col width="69"></col> <col width="68"></col> <col width="69"></col> <col width="65"></col> <col width="71"></col> <col width="67"></col> </colgroup> 
      <tbody> 
        <tr> <td style="text-align: left; border-image: none 100% / 1 / 0 stretch; background-image: none;">Название команды</td> <td style="border-image: none 100% / 1 / 0 stretch;"><a href="/ges/about/stages/stage-first/" title="Проверка знаний нормативно-технических документов (НТД)" >Этап 1</a></td> <td style="border-image: none 100% / 1 / 0 stretch;"><a href="/ges/about/stages/stage-second/" title="Производство оперативных переключений" >Этап 2</a></td> <td style="border-image: none 100% / 1 / 0 stretch;"><a href="/ges/about/stages/stage-third/" title="Противоаварийная тренировка" >Этап 3</a></td> <td style="border-image: none 100% / 1 / 0 stretch;"><a href="/ges/about/stages/stage-fourth/" title="Оказание первой доврачебной помощи пострадавшим на производстве" >Этап 4</a></td> <td style="border-image: none 100% / 1 / 0 stretch;"><a href="/ges/about/stages/stage-fifth/" title="Ликвидация возгорания с применением первичных средств пожаротушения" >Этап 5</a></td> <td style="border-image: none 100% / 1 / 0 stretch;"><a href="/ges/about/stages/stage-six/" title="Проверка умения выявлять отступления от НТД с использованием ПЭВМ и специализированного программного обеспечения" >Этап 6</a></td> <td style="border-image: none 100% / 1 / 0 stretch;">Мандатная комиссия</td> <td style="border-image: none 100% / 1 / 0 stretch;">Итого</td> <td style="border-image: none 100% / 1 / 0 stretch;">Место</td> </tr>
       </tbody>
     </table>
   <i></i> <i class="arr-rght"></i> </div>
 <?$APPLICATION->IncludeComponent("bitrix:news.list", "stages", array(
	"IBLOCK_TYPE" => "teams",
	"IBLOCK_ID" => "20",
	"NEWS_COUNT" => "",
	"SORT_BY1" => "NAME",
	"SORT_ORDER1" => "ASC",
	"SORT_BY2" => "SORT",
	"SORT_ORDER2" => "ASC",
	"FILTER_NAME" => "",
	"FIELD_CODE" => array(
		0 => "",
		1 => "",
	),
	"PROPERTY_CODE" => array(
		0 => "STAGE_1",
		1 => "STAGE_2",
		2 => "STAGE_3",
		3 => "STAGE_4",
		4 => "STAGE_5",
		5 => "STAGE_6",
		6 => "COMISSION",
		7 => "BONUS_POINTS",
		8 => "RANG",
		9 => "",
	),
	"CHECK_DATES" => "Y",
	"DETAIL_URL" => "",
	"AJAX_MODE" => "N",
	"AJAX_OPTION_JUMP" => "N",
	"AJAX_OPTION_STYLE" => "Y",
	"AJAX_OPTION_HISTORY" => "N",
	"CACHE_TYPE" => "A",
	"CACHE_TIME" => "36000000",
	"CACHE_FILTER" => "N",
	"CACHE_GROUPS" => "N",
	"PREVIEW_TRUNCATE_LEN" => "",
	"ACTIVE_DATE_FORMAT" => "d.m.Y",
	"SET_TITLE" => "N",
	"SET_STATUS_404" => "N",
	"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
	"ADD_SECTIONS_CHAIN" => "N",
	"HIDE_LINK_WHEN_NO_DETAIL" => "N",
	"PARENT_SECTION" => "23",
	"PARENT_SECTION_CODE" => "",
	"DISPLAY_TOP_PAGER" => "N",
	"DISPLAY_BOTTOM_PAGER" => "Y",
	"PAGER_TITLE" => "Новости",
	"PAGER_SHOW_ALWAYS" => "N",
	"PAGER_TEMPLATE" => "",
	"PAGER_DESC_NUMBERING" => "N",
	"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
	"PAGER_SHOW_ALL" => "Y",
	"DISPLAY_DATE" => "Y",
	"DISPLAY_NAME" => "Y",
	"DISPLAY_PICTURE" => "Y",
	"DISPLAY_PREVIEW_TEXT" => "Y",
	"AJAX_OPTION_ADDITIONAL" => ""
	),
	false
);?> 
  <br />
 
  <br />
 
  <h3>Регион Восток</h3>
 
  <div class="tbl-stages-head"> 
    <table> <colgroup> <col width="295"></col> <col width="69"></col> <col width="68"></col> <col width="68"></col> <col width="69"></col> <col width="68"></col> <col width="69"></col> <col width="65"></col> <col width="71"></col> <col width="67"></col> </colgroup> 
      <tbody> 
        <tr> <td style="text-align: left; border-image: none 100% / 1 / 0 stretch; background-image: none;">Название команды</td> <td style="border-image: none 100% / 1 / 0 stretch;"><a href="/ges/about/stages/stage-first/" title="Проверка знаний нормативно-технических документов (НТД)" >Этап 1</a></td> <td style="border-image: none 100% / 1 / 0 stretch;"><a href="/ges/about/stages/stage-second/" title="Производство оперативных переключений" >Этап 2</a></td> <td style="border-image: none 100% / 1 / 0 stretch;"><a href="/ges/about/stages/stage-third/" title="Противоаварийная тренировка" >Этап 3</a></td> <td style="border-image: none 100% / 1 / 0 stretch;"><a href="/ges/about/stages/stage-fourth/" title="Оказание первой доврачебной помощи пострадавшим на производстве" >Этап 4</a></td> <td style="border-image: none 100% / 1 / 0 stretch;"><a href="/ges/about/stages/stage-fifth/" title="Ликвидация возгорания с применением первичных средств пожаротушения" >Этап 5</a></td> <td style="border-image: none 100% / 1 / 0 stretch;"><a href="/ges/about/stages/stage-six/" title="Проверка умения выявлять отступления от НТД с использованием ПЭВМ и специализированного программного обеспечения" >Этап 6</a></td> <td style="border-image: none 100% / 1 / 0 stretch;">Мандатная комиссия</td> <td style="border-image: none 100% / 1 / 0 stretch;">Итого</td> <td style="border-image: none 100% / 1 / 0 stretch;">Место</td> </tr>
       </tbody>
     </table>
   <i></i> <i class="arr-rght"></i> </div>
 <?$APPLICATION->IncludeComponent(
	"bitrix:news.list",
	"stages",
	Array(
		"DISPLAY_DATE" => "Y",
		"DISPLAY_NAME" => "Y",
		"DISPLAY_PICTURE" => "Y",
		"DISPLAY_PREVIEW_TEXT" => "Y",
		"AJAX_MODE" => "N",
		"IBLOCK_TYPE" => "teams",
		"IBLOCK_ID" => "20",
		"NEWS_COUNT" => "",
		"SORT_BY1" => "NAME",
		"SORT_ORDER1" => "ASC",
		"SORT_BY2" => "SORT",
		"SORT_ORDER2" => "ASC",
		"FILTER_NAME" => "",
		"FIELD_CODE" => array(),
		"PROPERTY_CODE" => array("STAGE_1","STAGE_2","STAGE_3","STAGE_4","STAGE_5","STAGE_6","BONUS_POINTS","RANG","COMISSION"),
		"CHECK_DATES" => "Y",
		"DETAIL_URL" => "",
		"PREVIEW_TRUNCATE_LEN" => "",
		"ACTIVE_DATE_FORMAT" => "d.m.Y",
		"SET_TITLE" => "N",
		"SET_STATUS_404" => "N",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
		"ADD_SECTIONS_CHAIN" => "N",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"PARENT_SECTION" => "24",
		"PARENT_SECTION_CODE" => "",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "36000000",
		"CACHE_NOTES" => "",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "N",
		"DISPLAY_TOP_PAGER" => "N",
		"DISPLAY_BOTTOM_PAGER" => "Y",
		"PAGER_TITLE" => "Новости",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => "",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "Y",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_ADDITIONAL" => ""
	)
);?> 
 </div>
 <?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>