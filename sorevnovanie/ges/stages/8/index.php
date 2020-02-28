<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Турнирные таблицы VIII Всероссийских соревнований оперативного персонала гидроэлектростанций");
?> 
<div> 
  <br />
 
  <h3>Финал</h3>
 
  <div class="tbl-stages-head"> 
    <table> <colgroup> <col width="295"></col> <col width="69"></col> <col width="68"></col> <col width="68"></col> <col width="69"></col> <col width="68"></col> <col width="69"></col> <col width="65"></col> <col width="71"></col> <col width="67"></col> </colgroup> 
      <tbody> 
        <tr> <td style="text-align: left; border-image: none 100% / 1 / 0 stretch; background-image: none;">Название команды</td> <td style="border-image: none 100% / 1 / 0 stretch;"><a href="/ges/about/stages/etapy_viii_sorevnovaniy/etapy_finalnykh_sorevnovaniy/stage_first_final/index.php" target="_blank" title="Проверка знаний нормативно-технических документов (НТД)" >Этап 1</a></td> <td style="border-image: none 100% / 1 / 0 stretch;"><a href="/ges/about/stages/etapy_viii_sorevnovaniy/etapy_finalnykh_sorevnovaniy/stage_second_final/index.php" target="_blank" title="Производство оперативных переключений" >Этап 2</a></td> <td style="border-image: none 100% / 1 / 0 stretch;"><a href="/ges/about/stages/etapy_viii_sorevnovaniy/etapy_finalnykh_sorevnovaniy/stage_third_final/index.php" target="_blank" title="Противоаварийная тренировка" >Этап 3</a></td> <td style="border-image: none 100% / 1 / 0 stretch;"><a href="/ges/about/stages/etapy_viii_sorevnovaniy/etapy_finalnykh_sorevnovaniy/stage_forth_final/index.php" target="_blank" title="Оказание первой доврачебной помощи пострадавшим на производстве" >Этап 4</a></td> <td style="border-image: none 100% / 1 / 0 stretch;"><a href="/ges/about/stages/etapy_viii_sorevnovaniy/etapy_finalnykh_sorevnovaniy/stage_fifth_final/index.php" target="_blank" title="Ведение энергетического режима ГЭС" >Этап 5</a></td> <td style="border-image: none 100% / 1 / 0 stretch;"><a href="/ges/about/stages/etapy_viii_sorevnovaniy/etapy_finalnykh_sorevnovaniy/stage_six_final/index.php" target="_blank" title="Проверка готовности персонала к ликвидации возгорания с применением средств пожаротушения" >Этап 6</a></td> <td style="border-image: none 100% / 1 / 0 stretch;">Мандатная комиссия</td> <td style="border-image: none 100% / 1 / 0 stretch;">Итого</td> <td style="border-image: none 100% / 1 / 0 stretch;">Место</td> </tr>
       </tbody>
     </table>
   </div>
 <?$APPLICATION->IncludeComponent(
	"bitrix:news.list",
	"stages",
	Array(
		"IBLOCK_TYPE" => "teams",
		"IBLOCK_ID" => "32",
		"NEWS_COUNT" => "",
		"SORT_BY1" => "SORT",
		"SORT_ORDER1" => "ASC",
		"SORT_BY2" => "SORT",
		"SORT_ORDER2" => "ASC",
		"FILTER_NAME" => "",
		"FIELD_CODE" => array(0=>"",1=>"",),
		"PROPERTY_CODE" => array(0=>"STAGE_1",1=>"STAGE_1_1",2=>"STAGE_1_2",3=>"STAGE_1_3",4=>"STAGE_2",5=>"STAGE_3",6=>"STAGE_4",7=>"STAGE_5",8=>"STAGE_5_1",9=>"STAGE_5_2",10=>"STAGE_6",11=>"COMISSION",12=>"BONUS_POINTS",13=>"RANG",14=>"",),
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
		"PARENT_SECTION" => "42",
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
	)
);?> 
  <div> 
    <br />
   
    <h3>Регион Запад</h3>
   
    <div class="tbl-stages-head"> 
      <table> <colgroup> <col width="295"></col> <col width="69"></col> <col width="68"></col> <col width="68"></col> <col width="69"></col> <col width="68"></col> <col width="69"></col> <col width="65"></col> <col width="71"></col> <col width="67"></col> </colgroup> 
        <tbody> 
          <tr> <td style="text-align: left; border-image: none 100% / 1 / 0 stretch; background-image: none;">Название команды</td> <td style="border-image: none 100% / 1 / 0 stretch;"><a href="/ges/about/stages/etapy_viii_sorevnovaniy/etapy_regionalnykh_sorevnovaniy/stage_first/" title="Проверка знаний нормативно-технических документов (НТД)" >Этап 1</a></td> <td style="border-image: none 100% / 1 / 0 stretch;"><a href="/ges/about/stages/etapy_viii_sorevnovaniy/etapy_regionalnykh_sorevnovaniy/stage_second/" title="Производство оперативных переключений" >Этап 2</a></td> <td style="border-image: none 100% / 1 / 0 stretch;"><a href="/ges/about/stages/etapy_viii_sorevnovaniy/etapy_regionalnykh_sorevnovaniy/stage_third/" title="Противоаварийная тренировка" >Этап 3</a></td> <td style="border-image: none 100% / 1 / 0 stretch;"><a href="/ges/about/stages/etapy_viii_sorevnovaniy/etapy_regionalnykh_sorevnovaniy/stage_fourth/" title="Оказание первой доврачебной помощи пострадавшим на производстве" >Этап 4</a></td> <td style="border-image: none 100% / 1 / 0 stretch;"><a href="/ges/about/stages/etapy_viii_sorevnovaniy/etapy_regionalnykh_sorevnovaniy/stage_fifth/" title="Ведение энергетического режима ГЭС" >Этап 5</a></td> <td style="border-image: none 100% / 1 / 0 stretch;"><a href="/ges/about/stages/etapy_viii_sorevnovaniy/etapy_regionalnykh_sorevnovaniy/stage_six/" title="Проверка готовности персонала к ликвидации возгорания с применением средств пожаротушения" >Этап 6</a></td> <td style="border-image: none 100% / 1 / 0 stretch;">Мандатная комиссия</td> <td style="border-image: none 100% / 1 / 0 stretch;">Итого</td> <td style="border-image: none 100% / 1 / 0 stretch;">Место</td> </tr>
         </tbody>
       </table>
     </div>
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
		"IBLOCK_ID" => "32",
		"NEWS_COUNT" => "",
		"SORT_BY1" => "NAME",
		"SORT_ORDER1" => "ASC",
		"SORT_BY2" => "SORT",
		"SORT_ORDER2" => "ASC",
		"FILTER_NAME" => "",
		"FIELD_CODE" => array(),
		"PROPERTY_CODE" => array("STAGE_1","STAGE_2","STAGE_3","STAGE_4","STAGE_5","STAGE_6","BONUS_POINTS","RANG","COMISSION","STAGE_1_1","STAGE_1_2","STAGE_1_3","STAGE_5_1","STAGE_5_2"),
		"CHECK_DATES" => "Y",
		"DETAIL_URL" => "",
		"PREVIEW_TRUNCATE_LEN" => "",
		"ACTIVE_DATE_FORMAT" => "d.m.Y",
		"SET_TITLE" => "N",
		"SET_STATUS_404" => "N",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
		"ADD_SECTIONS_CHAIN" => "N",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"PARENT_SECTION" => "40",
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
    <br />
   
    <br />
   
    <h3>Регион Восток</h3>
   
    <div class="tbl-stages-head"> 
      <table> <colgroup> <col width="295"></col> <col width="69"></col> <col width="68"></col> <col width="68"></col> <col width="69"></col> <col width="68"></col> <col width="69"></col> <col width="65"></col> <col width="71"></col> <col width="67"></col> </colgroup> 
        <tbody> 
          <tr> <td style="text-align: left; border-image: none 100% / 1 / 0 stretch; background-image: none;">Название команды</td> <td style="border-image: none 100% / 1 / 0 stretch;"><a href="/ges/about/stages/etapy_viii_sorevnovaniy/etapy_regionalnykh_sorevnovaniy/stage_first/" title="Проверка знаний нормативно-технических документов (НТД)" >Этап 1</a></td> <td style="border-image: none 100% / 1 / 0 stretch;"><a href="/ges/about/stages/etapy_viii_sorevnovaniy/etapy_regionalnykh_sorevnovaniy/stage_second/" title="Производство оперативных переключений" >Этап 2</a></td> <td style="border-image: none 100% / 1 / 0 stretch;"><a href="/ges/about/stages/etapy_viii_sorevnovaniy/etapy_regionalnykh_sorevnovaniy/stage_third/" title="Противоаварийная тренировка" >Этап 3</a></td> <td style="border-image: none 100% / 1 / 0 stretch;"><a href="/ges/about/stages/etapy_viii_sorevnovaniy/etapy_regionalnykh_sorevnovaniy/stage_fourth/" title="Оказание первой доврачебной помощи пострадавшим на производстве" >Этап 4</a></td> <td style="border-image: none 100% / 1 / 0 stretch;"><a href="/ges/about/stages/etapy_viii_sorevnovaniy/etapy_regionalnykh_sorevnovaniy/stage_fifth/" title="Ведение энергетического режима ГЭС" >Этап 5</a></td> <td style="border-image: none 100% / 1 / 0 stretch;"><a href="/ges/about/stages/etapy_viii_sorevnovaniy/etapy_regionalnykh_sorevnovaniy/stage_six/" title="Проверка готовности персонала к ликвидации возгорания с применением средств пожаротушения" >Этап 6</a></td> <td style="border-image: none 100% / 1 / 0 stretch;">Мандатная комиссия</td> <td style="border-image: none 100% / 1 / 0 stretch;">Итого</td> <td style="border-image: none 100% / 1 / 0 stretch;">Место</td> </tr>
         </tbody>
       </table>
     </div>
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
		"IBLOCK_ID" => "32",
		"NEWS_COUNT" => "",
		"SORT_BY1" => "NAME",
		"SORT_ORDER1" => "ASC",
		"SORT_BY2" => "SORT",
		"SORT_ORDER2" => "ASC",
		"FILTER_NAME" => "",
		"FIELD_CODE" => array(),
		"PROPERTY_CODE" => array("STAGE_1","STAGE_2","STAGE_3","STAGE_4","STAGE_5","STAGE_6","BONUS_POINTS","RANG","COMISSION","STAGE_1_1","STAGE_1_2","STAGE_1_3","STAGE_5_1","STAGE_5_2"),
		"CHECK_DATES" => "Y",
		"DETAIL_URL" => "",
		"PREVIEW_TRUNCATE_LEN" => "",
		"ACTIVE_DATE_FORMAT" => "d.m.Y",
		"SET_TITLE" => "N",
		"SET_STATUS_404" => "N",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
		"ADD_SECTIONS_CHAIN" => "N",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"PARENT_SECTION" => "41",
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
    <p><b> 
        <br />
       </b></p>
   
    <br />
   </div>
 
  <div> 
    <br />
   </div>
 
  <div> 
    <br />
  </div>
</div>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>