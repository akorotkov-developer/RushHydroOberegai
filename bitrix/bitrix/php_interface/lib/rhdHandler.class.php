<?php

class RhdHandler
{
    protected static $initializedByData = false;

    protected static $params = null;

    protected static $queryParams = null;

    protected static $type = null;

    protected static $mainSite = null;
    protected static $englishSite = null;
    protected static $hydrology = null;
    protected static $site = null;
    protected static $settings = null;

    protected static $sections = null;
    protected static $topSection = null;
    protected static $secondSection = null;
    protected static $lastSection = null;

    protected static $currentPath = '';

    protected static $element = null;

    protected static $menu = array();

    protected static $purchasesIBlock = null;

    public static $ogDesc = null;
    public static $ogImage = null;

    /**
     * @param $params
     */
    public static function init(array &$params)
    {
        self::$params = $params;

        if (isset($params['type'])) {
            self::$type = $params['type'];
        }

        if (!empty($_SERVER['HTTP_HOST'])) {
            $hostParts = explode('.', $_SERVER['HTTP_HOST']);

            if (count($hostParts) > (count(explode('.', BASE_DOMAIN)) + 1)) {
                $params['site'] = $hostParts[1];
            } else {
                $params['site'] = 'www';
            }
        }

        if (isset($params['site'])) {
            self::loadSite($params['site']);
            self::loadSettings();
            self::loadMenu();
        }

        if (isset($params['path'])) {
            self::loadSections($params['path']);
            self::createChain();
        }

        if (isset($params['element'])) {
            self::loadElement($params['element']);
        }

        self::auth();
    }

    protected static function isPasswordNeeded()
    {
        foreach (self::$sections as $section) {
            if ($section['UF_NEED_PASSWORD']) {
                return true;
            }
        }

        if (self::$element && self::$element['PROPERTY_NEED_PASSWORD_VALUE']) {
            return true;
        }

        return false;
    }

    protected static function auth()
    {
        $passwords = array(
          'RusHydro' => 'CMD2019'
        );

        if (!self::isPasswordNeeded()) {
            return;
        }

        $user = $_SERVER['PHP_AUTH_USER'];
        $pass = $_SERVER['PHP_AUTH_PW'];

        if (!isset($passwords[$user]) || $passwords[$user] !== $pass) {
            header('WWW-Authenticate: Basic realm="RusHydro"');
            header('HTTP/1.0 401 Unauthorized');
            die();
        }
    }

    public static function getFilialIds()
    {
        return array(
            73, // Бурейская ГЭС
            55, // Волжская ГЭС
            56, // Воткинская ГЭС
            66, // Дагестанский филиал
            57, // Жигулевская ГЭС
            77, // Загорская ГАЭС
            69, // Кабардино-Балкарский филиал
            58, // Камская ГЭС
            70, // Карачаево-Черкесский филиал
            59, // Каскад Верхневолжских ГЭС
            64, // Каскад Кубанских ГЭС
            107, // Корпоративный университет гидроэнергетики
            60, // Нижегородская ГЭС
            63, // Новосибирская ГЭС
            61, // Саратовская ГЭС
            74, // Саяно-Шушенский филиал
            65, // Северо-Осетинский филиал
            62, // Чебоксарская ГЭС
        );
    }

    public static function getDZOIds()
    {
        return array(
            78, // Загорская ГАЭС-2
            71, // Зейская ГЭС
            53, // ОАО "РусГидро"
            54, // ОАО УК ГидроОГК
            67, // ОАО Сулакский Гидрокаскад
            68, // Ирганайская ГЭС
            72, // ОАО Нижне-Зейская ГЭС
            75, // Мы с вами, Саяны!
            76, // ОАО Южно-Якутский ГЭК
            79, // ОАО ОП Верхне-Мутновская ГеоЭС
            80, // Ленинградская ГАЭС
            81, // Зарамагские ГЭС
            82, // ОАО "Прометей"
            83, // ОАО Усть-Среднеканская ГЭС
            84, // ОАО "Усть-СреднеканГЭСстрой"
            85, // ОАО "Электроремонт-ВКК"
            86, // ОАО "Гидроремонт-ВКК"
            87, // ОАО "Турборемонт-ВКК"
            88, // ОАО "НИИЭС"
            89, // ОАО "РЭМИК"
            90, // ВНИИГ им. Б.Е.Веденеева
            91, // Геотерм
            92, // ОАО "Паужетская ГеоЭС"
            93, // ОАО "ЭСКО ЕЭС"
            94, // ОАО "Ленгидропроект"
            95, // ОАО "Колымаэнерго"
            96, // ОАО "Мособлгидропроект"
            97, // ОАО "Инженерный центр возобновляемой энергетики"
            98, // ОАО "Карачаево-Черкесская гидрогенерирующая компания"
            99, // ОАО "Гидроинвест"
            100, // ОАО "Нижне-Бурейская ГЭС"
            101, // ОАО "Нижне-Курейская ГЭС"
            102, // ОАО "Транспортная компания РусГидро"
            103, // ОАО "Саяно-Шушенский Гидроэнергоремонт"
            104, // ОАО "ЦСО Саяно-Шушенской ГЭС имени П.С.Непорожнего"
            105, // ОАО "ЭСК РусГидро"
            106, // ОАО "Дальневосточная ВЭС"
            108, // ЗАО "ГидроИнжиниринг Сибирь"
            110, // ОАО «Малые ГЭС Алтая»
            111, // RusHydro
            121, // ООО «ЭнергоКонсалтингСервис»
            124, // ООО «Верхнебалкарская малая ГЭС»
            125, // ОАО «Малые ГЭС Кабардино-Балкарской Республики»
            128, // ОАО "Институт  Гидропроект"
            126, // ОАО "Гидроремонт-ВКК" - Вопросы и ответы
			135, //ООО «РУСГИДРО ИТ СЕРВИС»
        );
    }

    public static function getMainSiteCode()
    {
        return 'www';
    }

    public static function getEnglishSiteCode()
    {
        return 'eng';
    }

    public static function getPurchasesSiteCode()
    {
        return 'purchases';
    }

    public static function getFilialNewsCode()
    {
        return 'holding-news';
    }

    public static function getRightNewsCode()
    {
        return 'hotnews';
    }

    public static function isSpecialFilial()
    {
        return in_array(self::getTopSectionCode(), array('nkges', 'hydroservice', 'itservice'));
    }

    public static function getType()
    {
        return self::$type;
    }

    public static function getSectionDepth()
    {
        return count(self::$sections);
    }

    public static function initFromData($iblock, $section = null, $element = null)
    {
        self::$initializedByData = true;

        self::loadSiteByData($iblock);

        if ($section) {
            self::loadSectionsByData($section);
        }

        if ($element) {
            self::loadElementByData($element);
        }
    }

    public static function getCurrentPath($withoutElement = false)
    {
        return self::getSiteRoot().self::$currentPath.((self::$element && !$withoutElement) ? self::$element['ID'].'.html' : '');
    }

    public static function getJustPath()
    {
        return self::$currentPath;
    }

    public static function getIBlockId()
    {
        return self::$site['ID'];
    }

    public static function getSectionId()
    {
        $section = self::getLastSection();

        return $section ? $section['ID'] : null;
    }

    public static function getParentSectionId()
    {
        $section = self::getLastSection();

        return $section ? $section['IBLOCK_SECTION_ID'] : null;
    }

    public static function getSectionLink()
    {
        $section = self::getLastSection();

        return $section && $section['UF_SECTION_LINK'] ? $section['UF_SECTION_LINK'] : null;
    }

    public static function getSiteRoot($noTrailingSlash = false, $skipSubfolders = false)
    {
        //return '/'.self::$site['CODE'].($noTrailingSlash ? '' : '/');
        return RhdPath::createUrl(self::$site['CODE'], null, null, $noTrailingSlash, $skipSubfolders);
    }

    public static function isFilial()
    {
        return !in_array(self::getSiteCode(), array(self::getMainSiteCode(), self::getEnglishSiteCode()));
    }

    public static function isDZO()
    {
        $iblock = self::getSite();

        return self::isFilial() && $iblock && ($iblock['SORT'] < 500);
    }

    public static function isEnglish()
    {
        return in_array(self::getSiteCode(), array(self::getEnglishSiteCode(), 'international-eng'));
    }

    public static function isAtRoot()
    {
        return count(self::$sections) === 0;
    }

    public static function isAtNews()
    {
        return (
            self::getLastSectionCode() === 'news'
            || self::isFilialNews()
            || self::isIrNews()
        );
    }
    public static function isPurchases()
    {
        return self::$topSection['CODE'] === self::getPurchasesSiteCode();
    }

    public static function isFilialNews()
    {
        return self::$lastSection['CODE'] === self::getFilialNewsCode();
    }

    public static function isBogesNews()
    {
        return (RhdHandler::getJustPath() === 'press/boges/news/');
    }

    public static function isFotoBank()
    {
        return self::getParentSectionId() == 9462;// strpos(self::getJustPath(),'fotobank') !== false;
    }

    public static function isIrNews()
    {
        return
            (self::getLastSectionCode() === 'IR_news')
            && (self::isEnglish() || self::isMainSite());
    }

    public static function isOrgVlNews()
    {
        return
            (self::getLastSectionCode() === 'vzaimodeystvie-s-organami-vlasti');
    }

		public static function isEastNews()
		{
			return (self::getLastSectionId() == 8490);
		}

		public static function isEcoNews()
    {
        return (self::getLastSectionCode() === 'ekonovosti');
    }

		public static function isPavodokNews()
    {
        return (RhdHandler::getJustPath() === 'press/polovode/news/');
    }

    public static function getFilialNewsPath()
    {
        return 'press/'.self::getFilialNewsCode().'/';
    }

    public static function getFilialNewsSectionId()
    {
        $path = RhdPath::resolvePath(self::getMainSite(), self::getFilialNewsPath());
        $lastSection = array_pop($path);

        return $lastSection['ID'];
    }

    public static function getSiteFooter()
    {
        return self::$site['DESCRIPTION'];
    }

    public static function getPurchasesIBlock()
    {
        if (self::$purchasesIBlock === null) {
            self::$purchasesIBlock =
                CIBlock::GetList(array(), array('CODE' => self::getPurchasesSiteCode()))->GetNext();
        }

        return self::$purchasesIBlock;
    }

    public static function getPurchasesIBlockId()
    {
        $iblock = self::getPurchasesIBlock();

        return $iblock['ID'];
    }

    public static function getElement()
    {
        return self::$element;
    }

    public static function getElementId()
    {
        $element = self::getElement();

        return $element ? $element['ID'] : null;
    }

    public static function isMainSite()
    {
        return !self::isFilial();
    }

    public static function isNiies()
    {
        return self::getSiteCode() === 'niies';
    }

    public static function isZagaes2()
    {
        return self::getSiteCode() === 'zagaes2';
    }

    public static function getSiteName()
    {
        return self::$site['NAME'];
    }

    public static function getSiteCode()
    {
        return self::$site['CODE'];
    }

    public static function getSite()
    {
        return self::$site;
    }

    public static function getSettings($code = '')
    {
        if ($code) return self::$settings[$code];
        else return self::$settings;
    }

    public static function getMainSite()
    {
        if (self::$mainSite === null) {
            self::$mainSite = CIBlock::GetList(array(), array('CODE' => self::getMainSiteCode()))->GetNext();
        }

        return self::$mainSite;
    }

    public static function getEnglishSite()
    {
        if (self::$englishSite === null) {
            self::$englishSite = CIBlock::GetList(array(), array('CODE' => self::getEnglishSiteCode()))->GetNext();
        }

        return self::$englishSite;
    }

    public static function getMainSiteId()
    {
        $mainSite = self::getMainSite();

        return $mainSite['ID'];
    }

    public static function getEnglishSiteId()
    {
        $englishSite = self::getEnglishSite();

        return $englishSite['ID'];
    }

    public static function getOppositeSiteId()
    {
        if (self::isFilial()) return 'none';
        return self::isEnglish() ? self::getMainSiteId() : self::getEnglishSiteId();
    }

    public static function getHydrologyIBlock()
    {
        if (self::$hydrology === null) {
            self::$hydrology = CIBlock::GetList(array(), array('=CODE' => 'hydrology'))->GetNext();
        }

        return self::$hydrology;
    }

    public static function getHydrologyIBlockId()
    {
        $hydrology = self::getHydrologyIBlock();

        return $hydrology['ID'];
    }

    public static function getTopSection()
    {
        return self::$topSection;
    }

    public static function getTopSectionName()
    {
        return self::$topSection['NAME'];
    }

    public static function getTopSectionCode()
    {
        return self::$topSection['CODE'];
    }

    public static function getSecondSectionCode()
    {
        return self::$secondSection['CODE'];
    }

    public static function getLastSection()
    {
        return self::$lastSection;
    }

    public static function getLastSectionId()
    {
        return self::$lastSection['ID'];
    }

    public static function getLastSectionName()
    {
        return self::$lastSection['NAME'];
    }

    public static function getLastSectionCode()
    {
        return self::$lastSection['CODE'];
    }

    public static function getSections()
    {
        return self::$sections;
    }

    public static function getMenu()
    {
        return self::$menu;
    }

    /**
     * @param mixed $site идентификатор инфоблока или массив данных
     */
    protected static function loadSiteByData($site)
    {
        if (!is_array($site)) {
            $site =
                CIBlock::GetByID($site)->
                    GetNext();

            if (!$site)
                throw new RhdNotFoundException('site with id '.$site.' not found');
        }

        self::$site = $site;
    }

    protected static function loadSite($code)
    {
        $cacheKey = 'site_'.$code;

        if (
            !($site = RhdMemcache::get($cacheKey))
        ) {
            $params =
                array(
                    'ACTIVE' => 'Y',
                    'CODE' => $code,
                );
            $obj = new CIBlock;
            $site =
                $obj->
                    GetList(
                        array(),
                        $params
                    )->
                    GetNext();

            if (!$site)
                throw new RhdNotFoundException('site '.$code.' not found');

            RhdMemcache::set($cacheKey, $site);
        }

        self::$site = $site;
    }

    protected static function loadSettings()
    {
        $cacheKey = 'settings_'.self::$site['CODE'];

        if (
            !($settings = RhdMemcache::get($cacheKey))
        ) {
            $params =
                array(
                    'ACTIVE' => 'Y',
                    'CODE' => self::$site['CODE'],
                    'IBLOCK_ID' => 143,
                );

            $settings =
                CIBlockSection::GetList(
                    array(),
                    $params,
                    false,
                    array('UF_*')
                )->
                GetNext();


            if (!$settings || (!$settings['UF_FACEBOOK'] && !$settings['UF_VKONTAKTE'] && !$settings['UF_INSTAGRAM'])) {
                $params =
                    array(
                        'ACTIVE' => 'Y',
                        'CODE' => self::getMainSiteCode(),
                        'IBLOCK_ID' => 143,
                    );

                $mainSettings =
                    CIBlockSection::GetList(
                        array(),
                        $params,
                        false,
                        array('UF_*')
                    )->
                    GetNext();

                if ($mainSettings) {
                    if (!$settings) {
                        $settings = $mainSettings;
                    } else {
                        if (!$settings['UF_FACEBOOK'] && !$settings['UF_VKONTAKTE'] && !$settings['UF_INSTAGRAM']) {
                            $settings['UF_FACEBOOK'] = $mainSettings['UF_FACEBOOK'];
                            $settings['UF_VKONTAKTE'] = $mainSettings['UF_VKONTAKTE'];
                            $settings['UF_INSTAGRAM'] = $mainSettings['UF_INSTAGRAM'];
                        }
                    }
                }
            }


            RhdMemcache::set($cacheKey, $settings);
        }

        self::$settings = $settings;
    }

    protected static function processSections()
    {
        $sectionsStack = array_values(self::$sections);
        self::$topSection = array_shift($sectionsStack);
        self::$secondSection = array_shift($sectionsStack);
        self::$lastSection = array_pop(array_values(self::$sections));
        self::$currentPath = implode('/', array_keys(self::$sections)).'/';
    }

    /**
     * @param mixed $section идентификатор секции или массив данных
     */
    protected static function loadSectionsByData($section)
    {
        $sections = array();

        if (is_array($section)) {
            $sections[$section['CODE']] = $section;
            $sectionId = empty($section['IBLOCK_SECTION_ID']) ? null : $section['IBLOCK_SECTION_ID'];
        } else {
            $sectionId = $section;
        }

        self::$sections = array_merge(RhdPath::build($sectionId), $sections);
        self::processSections();
    }

    protected static function getSection($code, $parent = null)
    {
        $params =
            array(
                'ACTIVE' => 'Y',
                'CODE' => $code,
                'IBLOCK_ID' => self::$site['ID'],
                'SECTION_ID' => $parent ? $parent['ID'] : null,
            );

        $section =
            CIBlockSection::GetList(
                array(),
                $params,
                false,
                array('UF_*')
            )->
            GetNext();

        if (!$section)
            throw new RhdNotFoundException('section '.$code.' not found');

        return $section;
    }

    protected static function loadSections($path)
    {
        self::$sections = RhdPath::resolvePath(self::$site, $path);
        //echo '<!--'; var_dump(self::$sections); echo '-->';
        self::processSections();
    }

    protected static function loadElement($elementId)
    {
        $cacheKey = 'oldcms_element_id_'.$elementId;

        if (($newElementId = RhdMemcache::get($cacheKey))) {
            if ($newElementId > 0)
                $elementId = $newElementId;

            $filter =
                array(
                    'ID' => $elementId
                );
        } else {
            $filter =
                array(
                    //array(
                        //'LOGIC' => 'OR',
                        'ID' => $elementId,
                        //'=PROPERTY_OLDCMS_ID' => $elementId
                    //),
                    //'IBLOCK_ID' => RhdHandler::getIBlockId(),
                );
        }

        $element =
            CIBlockElement::GetList(
                array(),
                $filter,
                false,
                array('nTopCount' => 1),
                array(
                    '*',
                    'PROPERTY_OLDCMS_ID',
                    'PROPERTY_FILES_VALUE',
                    'PROPERTY_SHOW_DATE',
                    'PROPERTY_NEED_DISCLAIMER',
                    'PROPERTY_SHOW_DISCLAIMER',
                    'PROPERTY_DISCLAIMER',
                    'PROPERTY_DISCLAIMER_TEXT',
                    'PROPERTY_NO_DIRECT_ACCESS',
                    'PROPERTY_NEED_PASSWORD',
                    'PROPERTY_EXCLUDE_FROM_SEARCH',
                )
            )->
            GetNext();

        $ob = CIBlockElement::GetProperty($element['IBLOCK_ID'], $element['ID'], array("sort" => "asc"), Array("CODE"=>"FILE"));
        while ($el = $ob->GetNext())
        {
            if($el['VALUE']) {
                $element['PICTURE'][] = $el['VALUE'];
            }
        }

        if (!$element || ($element['PROPERTY_NO_DIRECT_ACCESS_VALUE'] && !self::$initializedByData))
            throw new RhdNotFoundException('element '.$element.' not found');

        if ($element['PROPERTY_OLDCMS_ID_VALUE'] === (string) $elementId) {
            RhdMemcache::set($cacheKey, $element['ID'], 0);
        } elseif (!$newElementId) {
            RhdMemcache::set($cacheKey, -1);
        }

        self::$element = $element;
    }

    /**
     * @param mixed $element идентификатор элемента или массив данных
     */
    protected static function loadElementByData($element)
    {
        if (!is_array($element)) {
            self::loadElement($element);
        } else {
            self::$element = $element;
        }
    }

    protected static function loadMenu()
    {
        $cacheKey = 'menu___'.self::$site['CODE'];

        if (
            !($menu = RhdMemcache::get($cacheKey))
        ) {
            $maxLevel = 3;

            $byParent = array();
            $byId = array();

            $obj = new CIBlockSection;
            $parent = array();
            for ($i = 0; $i < $maxLevel; $i++) {
                $params =
                    array(
                        'IBLOCK_ID' => self::$site['ID'],
                        'UF_PUBLISHED' => true,
                    );

                if ($parent) {
                    $params['@SECTION_ID'] = implode(',', $parent);
                }

                $rs =
                    $obj->GetList(
                        array('SORT' => 'desc', 'created' => 'asc'),
                        $params
                    );

                $parent = array();
                while ($section = $rs->GetNext()) {
                    $parent[] = $section['ID'];

                    $parentId =
                        isset($section['IBLOCK_SECTION_ID'])
                            ? $section['IBLOCK_SECTION_ID']
                            : 0;

                    $sectionId =
                        $section['ID'];

                    if (!isset($byParent[$parentId])) {
                        $byParent[$parentId] = array();
                    }

                    $byParent[$parentId][] = $sectionId;

                    $byId[$sectionId] = array('code' => $section['CODE'], 'name' => $section['NAME'], 'children' => array());
                };

            }

            foreach ($byParent as $parentId => $children) {
                foreach ($children as $childId) {
                    $byId[$parentId]['children'][$byId[$childId]['code']] =& $byId[$childId];
                }
            }

            $menuCount = count(array_unique($byParent[0]));
            if (self::$site['CODE'] == 'geotherm') {
                $menuCountPos = $menuCount;
            } else {
                $menuCountPos = $menuCount - 1;
            }
            $menuI = 1;
            $menu = array();
            $zakupkiItem = false;
            foreach ($byParent[0] as $menuId) {
                $menu[$byId[$menuId]['code']] =& $byId[$menuId];
                if ($byId[$menuId]['code'] == 'zakupki') $zakupkiItem = true;
                if ($menuI == $menuCountPos && !self::isEnglish()) {
                    $menu[self::getPurchasesSiteCode()] = array('isUrl' => true, 'code' => 'http://zakupki.rushydro.ru/', 'name' => self::isEnglish() ? 'Purchases' : 'Закупки', 'children' => array(), 'blank' => true);
                }
                $menuI++;
            }

            if ($zakupkiItem) {
                unset($menu[self::getPurchasesSiteCode()]);
                $menu['zakupki']['children'][self::getPurchasesSiteCode()] = array('code' => 'http://zakupki.rushydro.ru/', 'name' => '<a class="sub_link" href="http://zakupki.rushydro.ru/" target="_blank">' . (self::isEnglish() ? 'Purchases' : 'Закупки ПАО РусГидро') . '</a>', 'children' => array());
            }

            if (!self::isEnglish()) {
                /* ссылка на блог скрыта 06.03.2018
                if (!self::isNiies())
                    $menu['blog'] = array('isUrl' => true, 'code' => 'http://blog.rushydro.ru/', 'name' => self::isEnglish() ? 'Blog' : 'Блог', 'children' => array());
                */
            }
            RhdMemcache::set($cacheKey, $menu);
        }

        self::$menu = $menu;
    }

    protected static function loadParams()
    {
        $params = self::$params['params'];
        if (mb_substr($params, 0, 1) === '?') {
            $params = mb_substr($params, 1);
        }

        parse_str($params, self::$queryParams);
        var_dump($params);
    }

    protected static function createChain()
    {
        global $APPLICATION;
        $path = self::getSiteRoot();
        foreach (self::$sections as $code => $data) {
            $path .= $code.'/';
            $APPLICATION->AddChainItem($data['NAME'], $path);
        }
    }

}
