<?
$arUrlRewrite = array(
	array(
		"CONDITION"	=>	"#^/tes/teams/games_7/(.*)/.*#",
		"RULE"	=>	"ELEMENT_CODE=$1",
		"ID"	=>	"",
		"PATH"	=>	"/tes/teams/games_7/detail.php",
	),
	array(
		"CONDITION"	=>	"#^/ges/teams/games_7/(.*)/.*#",
		"RULE"	=>	"ELEMENT_CODE=$1",
		"ID"	=>	"",
		"PATH"	=>	"/ges/teams/games_7/detail.php",
	),
	array(
		"CONDITION"	=>	"#^/ges/teams/6_games/(.*)/.*#",
		"RULE"	=>	"ELEMENT_CODE=$1",
		"ID"	=>	"",
		"PATH"	=>	"/ges/teams/6_games/detail.php",
	),
	array(
		"CONDITION"	=>	"#^/tes/teams/5_games/(.*)/.*#",
		"RULE"	=>	"ELEMENT_CODE=$1",
		"ID"	=>	"",
		"PATH"	=>	"/tes/teams/5_games/detail.php",
	),
	array(
		"CONDITION"	=>	"#^/tes/teams/6_games/(.*)/.*#",
		"RULE"	=>	"ELEMENT_CODE=$1",
		"ID"	=>	"",
		"PATH"	=>	"/tes/teams/6_games/detail.php",
	),
	array(
		"CONDITION"	=>	"#^/ges/teams/5_games/(.*)/.*#",
		"RULE"	=>	"ELEMENT_CODE=$1",
		"ID"	=>	"",
		"PATH"	=>	"/ges/teams/5_games/detail.php",
	),
	array(
		"CONDITION"	=>	"#^/tes/gallery/([\\d]+)?(.*)#",
		"RULE"	=>	"ID=$1",
		"ID"	=>	"",
		"PATH"	=>	"/tes/gallery/detail.php",
	),
	array(
		"CONDITION"	=>	"#^/ges/gallery/([\\d]+)?(.*)#",
		"RULE"	=>	"ID=$1",
		"ID"	=>	"",
		"PATH"	=>	"/ges/gallery/detail.php",
	),
	array(
		"CONDITION"	=>	"#^/tes/news/([\\d]+)?(.*)#",
		"RULE"	=>	"ID=$1",
		"ID"	=>	"",
		"PATH"	=>	"/tes/news/detail.php",
	),
	array(
		"CONDITION"	=>	"#^/ges/news/([\\d]+)?(.*)#",
		"RULE"	=>	"ID=$1",
		"ID"	=>	"",
		"PATH"	=>	"/ges/news/detail.php",
	),
	array(
		"CONDITION"	=>	"#^/ws/teams/archieve/#",
		"RULE"	=>	"",
		"ID"	=>	"bitrix:news",
		"PATH"	=>	"/ws/teams/archieve/index.php",
	),
	array(
		"CONDITION"	=>	"#^/tes/teams/(.*)/.*#",
		"RULE"	=>	"ELEMENT_CODE=$1",
		"ID"	=>	"",
		"PATH"	=>	"/tes/teams/detail.php",
	),
	array(
		"CONDITION"	=>	"#^/ges/teams/(.*)/.*#",
		"RULE"	=>	"ELEMENT_CODE=$1",
		"ID"	=>	"",
		"PATH"	=>	"/ges/teams/detail.php",
	),
	array(
		"CONDITION"	=>	"#^/ws/teams/#",
		"RULE"	=>	"",
		"ID"	=>	"bitrix:news",
		"PATH"	=>	"/ws/teams/index.php",
	),
	array(
		"CONDITION"	=>	"#^/ws/news/#",
		"RULE"	=>	"",
		"ID"	=>	"bitrix:news",
		"PATH"	=>	"/ws/news/index.php",
	),
);

?>