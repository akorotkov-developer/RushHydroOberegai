<?

class news extends metamodule
{
    function __construct()
    {
        parent::__construct();

        //обязательно указываем наши шаблоны папок
        $this->cTemplates = array(
            'news',

        );
        //здесь настраиваем базовый шаблон для каждого шаблона папки, используемого модулем
        $this->moduleWrappers = array(
            'news' => 'inner.html',

        );

    }

    function __destruct()
    {
    }

    //базовый метод сайт-модуля
    function content($arParams = array())
    {
        global $control;
        global $config;
        global $sql;

        if ((int)$_GET['id']) {
            return $this->showOne($arParams);
        } elseif ($arParams['mainblock']) {
            return $this->mainblock($arParams);
        } else {
            return $this->showList($arParams);
        }
            
    }


    function showList($arParams = array())
    {
        global $control;
        global $config;
        global $sql;

        //попытка загрузить из кэша
        $_cn = sprintf("%s_%s_%s", get_class($this), 'showList', cache_key());
        $html = get_cache($_cn);
        if (!is_null($html)) return $html;


        $page = new stdClass();
        

        $html = $this->sprintt($page, $this->_tplDir() . "showList.html");

        //сохраняем кэш
        set_cache($_cn, $html);
        return $html;

    }


    function showOne($arParams = array())
    {
        global $control;
        global $config;
        global $sql;

        //попытка загрузить из кэша
        $_cn = sprintf("%s_%s_%s", get_class($this), 'showOne', cache_key());
        $html = get_cache($_cn);
        if (!is_null($html)) return $html;
        

        $page = new stdClass();
        $page->id = (int)$_GET['id'];
        

        $html = $this->sprintt($page, $this->_tplDir() . "showOne.html");

        //сохраняем кэш
        set_cache($_cn, $html);

        return $html;
    }


    function mainblock($arParams = NULL)
    {
        global $control;
        global $config;
        global $sql;


        //попытка загрузить из кэша
        $_cn = sprintf("%s_%s", get_class($this), 'mainblock');
        $html = get_cache($_cn);
        if (!is_null($html)) return $html;


        $page = new stdClass();


        $html = $this->sprintt($page, $this->_tplDir() . "mainblock.html");

        //сохраняем кэш
        set_cache($_cn, $html);

        return $html;
    }

// <#AUTOMETHODS#>

}

?>