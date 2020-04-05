<?
$arUrlRewrite = array(
	array(
		"CONDITION" => "#^/corporate/general-meeting/forum-dlya-aktsionerov/*(\\?(.*)|)\$#",
		"RULE" => "\$2",
		"PATH" => "/handlers/forum-dlya-aktsionerov.php",
		"SORT" => "100",
	),
	array(
		"CONDITION" => "#^/corporate/general-meeting/forthcoming/subscribe/*(\\?(.*)|)\$#",
		"RULE" => "\$2",
		"PATH" => "/handlers/forthcoming-subscribe-edit.php",
		"SORT" => "200",
	),
	array(
		"CONDITION" => "#^/m/content/([^\\?]+)/([^\\.]+)\\.html(\\?(.*)|)\$#",
		"RULE" => "\$4&type=detail&path=\$1&element=\$2",
		"PATH" => "/handlers/mobile/content.php",
		"SORT" => "300",
	),
	array(
		"CONDITION" => "#^/m/structure_test/*([^\\?]+)/*(\\?(.*)|)\$#",
		"RULE" => "\$3&type=list&path=\$1",
		"PATH" => "/handlers/mobile/structure_test.php",
		"SORT" => "400",
	),
	array(
		"CONDITION" => "#^/subscribe/subscr_edit\\.php(\\?(.*)|)\$#",
		"RULE" => "\$2",
		"PATH" => "/handlers/subscribe-edit.php",
		"SORT" => "500",
	),
	array(
		"CONDITION" => "#^/m/attachments/*([^\\?]+)/*(\\?(.*)|)\$#",
		"RULE" => "\$3&type=list&path=\$1",
		"PATH" => "/handlers/mobile/attachments.php",
		"SORT" => "600",
	),
	array(
		"CONDITION" => "#^/([^\\?]+)/([^\\.]+)\\.html(\\?(.*)|)\$#",
		"RULE" => "\$4&type=detail&path=\$1&element=\$2",
		"PATH" => "/handlers/detail.php",
		"SORT" => "700",
	),
	array(
		"CONDITION" => "#^/m/structure/*([^\\?]+)/*(\\?(.*)|)\$#",
		"RULE" => "\$3&type=list&path=\$1",
		"PATH" => "/handlers/mobile/structure.php",
		"SORT" => "800",
	),
	array(
		"CONDITION" => "#^/purchases/*([^\\?]+)/*(\\?(.*)|)\$#",
		"RULE" => "\$3&type=list&path=purchases/\$1",
		"PATH" => "/handlers/list.purchases.php",
		"SORT" => "900",
	),
	array(
		"CONDITION" => "#^/m/content/*([^\\?]+)/*(\\?(.*)|)\$#",
		"RULE" => "\$3&type=list&path=\$1",
		"PATH" => "/handlers/mobile/content.php",
		"SORT" => "1000",
	),
	array(
		"CONDITION" => "#^/m/gallery/*([^\\?]+)/*(\\?(.*)|)\$#",
		"RULE" => "\$3&type=list&path=\$1",
		"PATH" => "/handlers/mobile/gallery.php",
		"SORT" => "1100",
	),
	array(
		"CONDITION" => "#^/m/images/*([^\\/]*)/*(\\?(.*)|)\$#",
		"RULE" => "\$3&type=list&ids=\$1",
		"PATH" => "/handlers/mobile/images.php",
		"SORT" => "1200",
	),
	array(
		"CONDITION" => "#^/m/folder/*([^\\?]+)/*(\\?(.*)|)\$#",
		"RULE" => "\$3&type=list&path=\$1",
		"PATH" => "/handlers/mobile/folder.php",
		"SORT" => "1300",
	),
	array(
		"CONDITION" => "#^/m/search/*([^\\/]*)/*(\\?(.*)|)\$#",
		"RULE" => "\$3&type=list&q=\$1",
		"PATH" => "/handlers/mobile/search.php",
		"SORT" => "1400",
	),
	array(
		"CONDITION" => "#^/downloadrarstatic/*(\\?(.*)|)\$#",
		"RULE" => "\$2",
		"PATH" => "/handlers/download-rar-static.php",
		"SORT" => "1500",
	),
	array(
		"CONDITION" => "#^/m/tags/*([^\\/]*)/*(\\?(.*)|)\$#",
		"RULE" => "\$3&type=list&tag=\$1",
		"PATH" => "/handlers/mobile/tags.php",
		"SORT" => "1600",
	),
	array(
		"CONDITION" => "#^/rss/*([^\\?]+)/*(\\?(.*)|)\$#",
		"RULE" => "\$3&type=rss&path=\$1",
		"PATH" => "/handlers/rss.php",
		"SORT" => "1700",
	),
	array(
		"CONDITION" => "#^/purchases/mtr/*(\\?(.*)|)\$#",
		"RULE" => "\$2&type=list&path=purchases/mtr",
		"PATH" => "/handlers/list.purchases.mtr.php",
		"SORT" => "1800",
	),
	array(
		"CONDITION" => "#^/doc-archive/*(\\?(.*)|)\$#",
		"RULE" => "\$2",
		"PATH" => "/handlers/doc-archive.php",
		"SORT" => "1900",
	),
	array(
		"CONDITION" => "#^/purchases/*(\\?(.*)|)\$#",
		"RULE" => "\$1&type=list&path=purchases",
		"PATH" => "/handlers/list.purchases.php",
		"SORT" => "2000",
	),
	array(
		"CONDITION" => "#^/subscribe/*(\\?(.*)|)\$#",
		"RULE" => "\$2",
		"PATH" => "/handlers/subscribe.php",
		"SORT" => "2100",
	),
	array(
		"CONDITION" => "#^/sitemap/*(\\?(.*)|)\$#",
		"RULE" => "\$2&type=list",
		"PATH" => "/handlers/sitemap.php",
		"SORT" => "2200",
	),
	array(
		"CONDITION" => "#^/search/*(\\?(.*)|)\$#",
		"RULE" => "\$2&type=search",
		"PATH" => "/handlers/search.php",
		"SORT" => "2300",
	),
	array(
		"CONDITION" => "#^/form/*(\\?(.*)|)\$#",
		"RULE" => "\$2&type=form",
		"PATH" => "/handlers/form.php",
		"SORT" => "2400",
	),
	array(
		"CONDITION" => "#^/tags/*(\\?(.*)|)\$#",
		"RULE" => "\$2&type=tags",
		"PATH" => "/handlers/tags.php",
		"SORT" => "2500",
	),
	array(
		"CONDITION" => "#^/([^\\?]+)/*(\\?(.*)|)\$#",
		"RULE" => "\$3&type=list&path=\$1",
		"PATH" => "/handlers/list.php",
		"SORT" => "2600",
	),
);
?>