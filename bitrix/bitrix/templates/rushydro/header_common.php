<!--[if lte IE 7]><html class="ie-old" id="nojs"><![endif]-->
<!--[if IE 8]><html class="ie-8" id="nojs"><![endif]-->
<!--[if gt IE 8]><!--><html id="nojs"><!--<![endif]-->
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <title><?$APPLICATION->ShowTitle()?></title>
    <script type="text/javascript">document.documentElement.id = "js"</script>

    <?$APPLICATION->ShowHead()?>
    <meta property="og:image" content="[OG_IMG]" />
    <meta property="og:description" content="[OG_DESC]" />
    <meta name="description" content="[OG_DESC]" />

	<?if(RhdHandler::isFilial()){?>
		<!--<link rel="stylesheet" type="text/css" href="<?=SITE_TEMPLATE_PATH?>/css/common.css" />-->
	<?}?>

	<?if(!RhdHandler::isFilial()){?>
		<link rel="stylesheet" type="text/css" href="<?=SITE_TEMPLATE_PATH?>/css/style.css?23" />
	<?}?>

    <link rel="shortcut icon" href="/favicon.ico" type="image/vnd.microsoft.icon" />
    <link rel="stylesheet" type="text/css" href="<?=SITE_TEMPLATE_PATH?>/prettyPhoto.css?3" />

    <!--[if IE 7]>
        <link media="all" type="text/css" rel="stylesheet" href="<?=SITE_TEMPLATE_PATH?>/ie7.css?1" />
    <![endif]-->
    <!--[if lte IE 8]>
        <link media="all" type="text/css" rel="stylesheet" href="<?=SITE_TEMPLATE_PATH?>/ie8.css?2" />
    <![endif]-->

    <meta name="cmsmagazine" content="023fede1cd00d7f15a0ae19646d80a72" />

    <link rel="alternate" type="application/rss+xml" href="<?=RhdPath::createUrl(RhdHandler::getMainSiteCode(), 'rss/press/news')?>" title="Новости РусГидро">
    <link rel="alternate" type="application/rss+xml" href="<?=RhdPath::createUrl(RhdHandler::getMainSiteCode(), 'rss/press/holding-news')?>" title="Новости филиалов и ДЗО">

    <script type="text/javascript" src="<?=SITE_TEMPLATE_PATH?>/js/jquery.js?1"></script>
    <script type="text/javascript" src="<?=SITE_TEMPLATE_PATH?>/js/jquery.mousewheel.js?1"></script>
    <script type="text/javascript" src="<?=SITE_TEMPLATE_PATH?>/js/scrollPane.js?1"></script>
    <script type="text/javascript" src="<?=SITE_TEMPLATE_PATH?>/js/jCarousel.js?1"></script>
    <script type="text/javascript" src="<?=SITE_TEMPLATE_PATH?>/js/scroll_archive.js?1"></script>
    <script type="text/javascript" src="<?=SITE_TEMPLATE_PATH?>/js/draggable.js?1"></script>
    <script type="text/javascript" src="<?=SITE_TEMPLATE_PATH?>/js/jquery.prettyPhoto.js?2"></script>
    <script type="text/javascript" src="<?=SITE_TEMPLATE_PATH?>/js/swfobject.js?1"></script>
    <script type="text/javascript" src="<?=SITE_TEMPLATE_PATH?>/js/uppod_api.js?2"></script>
    <script type="text/javascript" src="<?=SITE_TEMPLATE_PATH?>/js/social-likes.min.js?2"></script>
    <script type="text/javascript" src="<?=SITE_TEMPLATE_PATH?>/js/jquery.bxslider.min.js"></script>
    <script type="text/javascript" src="<?=SITE_TEMPLATE_PATH?>/js/rushydro.js?12"></script>
    <script type="text/javascript" src="<?=SITE_TEMPLATE_PATH?>/js/disclaimer.js?1"></script>
    <script type="text/javascript">
        var disclaimers = <?php echo json_encode($disclaimers[RhdHandler::isEnglish() ? 'en' : 'ru']); ?>;
    </script>
    <?php if (IS_MOBILE):
        $versionClient = 'mobile-version';
    else:
        $versionClient = 'desctop-version';
    endif; ?>

    <? $grayClass = ''; ?>
    <?if(time() < mktime(0, 0, 0, 03, 29, 2018) && !RhdHandler::isFilial()):?>
        <? $grayClass = ' graystyle '; ?>
        <script type='text/javascript' src='<?=SITE_TEMPLATE_PATH?>/js/grayscale.js'></script>
        <script type='text/javascript' src="<?=SITE_TEMPLATE_PATH?>/js/graystyle.js"></script>
    <?endif?>
</head>
