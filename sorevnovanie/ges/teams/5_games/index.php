<?define('USE_SALT', true);require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Участники V Всероссийских соревнований оперативного персонала гидроэлектростанций");?> 
<script type="text/javascript">
	voteUrl = '/like.php';
</script>
 <a href="/ges/teams/5_games/rating/" class="btn-rating" style="top:-4px;" >рейтинг голосования</a> 
<p>По итогам зрительского голосования во время прохождения региональных этапов соревнований победу одержала команда</p>
 
<br />
 
<p><strong>Филиала ПАО &laquo;РусГидро&raquo; - «Воткинская ГЭС». Поздравляем!</strong></p>
 
<div class="gallery" style="padding-top: 15px;"> 	 
  <div class="item first"> 		<a title="Филиал ОАО «РусГидро» -  «Воткинская ГЭС»" href="/teams/5_games/votkinskaya-ges/" > 			<img src="/upload/iblock/ea4/sxicqlizqreq.jpg"  /> 		</a> 	</div>
 	 
  <div class="clear"></div>
 </div>
 
<br />
 <?$APPLICATION->IncludeComponent(
	"bitrix:catalog.section.list",
	".default",
	Array(
		"IBLOCK_TYPE" => "teams",
		"IBLOCK_ID" => "3",
		"SECTION_ID" => $_REQUEST["SECTION_ID"],
		"SECTION_CODE" => "",
		"COUNT_ELEMENTS" => "Y",
		"TOP_DEPTH" => "2",
		"SECTION_FIELDS" => array(0=>"",1=>"",),
		"SECTION_USER_FIELDS" => array(0=>"",1=>"",),
		"SECTION_URL" => "",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "36000000",
		"CACHE_GROUPS" => "N",
		"ADD_SECTIONS_CHAIN" => "N"
	)
);?><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>