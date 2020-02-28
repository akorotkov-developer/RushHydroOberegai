<?define('USE_SALT', true);require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Участники");?> 
<script type="text/javascript">
	voteUrl = '/like.php';
</script>
 <a href="./rating/" class="btn-rating" style="top:-51px;" >рейтинг голосования</a> <?$APPLICATION->IncludeComponent(
	"bitrix:catalog.section.list",
	".default",
	Array(
		"IBLOCK_TYPE" => "teams",
		"IBLOCK_ID" => "42",
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
);?> 
<br />
 <br />
<a href="/ges/teams/8/" class="link-back" style="padding-left:14px;" >Участники VIII Всероссийских соревнований оперативного персонала гидроэлектростанций</a> 
<br /><br />
 <a href="/ges/teams/games_7/" class="link-back" style="padding-left:14px;" >Участники VII Всероссийских соревнований оперативного персонала гидроэлектростанций</a> 
<br />
 
<br />
 <a href="/ges/teams/6_games/" class="link-back" style="padding-left:14px;" >Участники VI Всероссийских соревнований оперативного персонала гидроэлектростанций</a> 
<br />
 
<br />
 <a href="/ges/teams/5_games/" class="link-back" style="padding-left:14px;" >Участники V Всероссийских соревнований оперативного персонала гидроэлектростанций</a>  <?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>