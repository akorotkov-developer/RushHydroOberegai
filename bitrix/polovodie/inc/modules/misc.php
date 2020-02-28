<?

/*
###############################################################################
#  (c)SOFTMAJOR 2011-2011
###############################################################################
#  ЗДЕСЬ РАЗМЕСТИТЬ КОНТАКТНЫЕ ДАННЫЕ АВТОРА МОДУЛЯ
################################################################################
   ЗДЕСЬ РАЗМЕСТИТЬ КРАТКОЕ ОПИСАНИЕ ЕГО НАЗНАЧЕНИЯ И Т.П.
*/

class misc extends metamodule
{
    function __construct()
    {
        parent::__construct();

        //обязательно указываем наши шаблоны папок
        $this->cTemplates = array(/* раскомментируй это при необходимости
        'misc',
*/
        );
        //здесь настраиваем базовый шаблон для каждого шаблона папки, используемого модулем
        $this->moduleWrappers = array(/* раскомментируй это при необходимости
        'misc' => 'inner.html',
*/
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

        return "Контент модуля <b>misc</b>";

        //раскомментировать при доработке
        //return $this->sprintt($page, $this->_tplDir().'content.html');
    }


    //вернуть содержимое поля Главной страницы
    function showvar($arParams = NULL)
    {
        global $control;
        global $config;
        global $sql;

        //попытка загрузить из кэша
        $_cn = sprintf("%s_%s_%s", get_class($this), 'showvar' . md5(serialize($arParams)), cache_key());
        $html = get_cache($_cn);
        if (!is_null($html)) return $html;

        if (!isset($control->indexPage)) {
            $control->indexPage = clone(All::c_data_all(1, 'index'));
        }
        $page = new stdClass();

        $page->html = $control->indexPage->{$arParams['var']};

//        $html = $this->sprintt($page, $this->_tplDir()."showvar.html");
        $html = $page->html;

        //сохраняем кэш
        set_cache($_cn, $html);

        return $html;
    }


    //формирование заголовка страницы
    function head($arParams = NULL)
    {
        global $control;
        global $config;
        global $sql;

        //попытка загрузить из кэша
        $_cn = sprintf("%s_%s_%s", get_class($this), 'head', cache_key());
        $html = get_cache($_cn);
        if (!is_null($html)) return $html;

        $page = new stdClass();
        $sitename = $control->all->c_data(1, 'index', 'sitename');
        if ($control->cid != 1) {
            $page->title = $control->name . ($sitename ? ' - ' . $sitename : '');
            $page->inner = 1;
        } else {
            $page->title = $sitename;
            $page->index = 1;
        }

        if (isset($control->title))
            $page->title = $control->title;

        if (!isset($control->currentPage)) {
            $control->currentPage = clone(All:: c_data_all($control->cid, $control->template));
        }

        $cat = clone($control->currentPage);

        if (isset($cat->meta)) {
            $arr_data = explode('|---|', $cat->meta);
            if ($arr_data[0] != '') {
                $page->title = $arr_data[0];
            }
            $page->keywords = $arr_data[1];
            $page->description = $arr_data[2];
        }

        $page->tpl_prefix = '';
        if ($control->newtpl) $page->tpl_prefix = '_new';

        //контроль версий основных CSS и JS файлов
        $cfiles = array('styles/base.css', 'styles/main.css', 'styles/modal.css', 'styles/social.css', 'informer/st.css');
        $jfiles = array('scripts/script.js', 'scripts/modal.js', 'scripts/main.js');

        $files = array();
        if ($cfiles) {
            foreach ($cfiles as $cfile) {
                if ($control->newtpl) $cfile = str_replace('styles/', 'styles' . $page->tpl_prefix . '/', $cfile);
                $files[] = $config['DOCUMENT_ROOT'] . $cfile;
            }
        }
        if ($jfiles) {
            foreach ($jfiles as $jfile) {
                if ($control->newtpl) $jfile = str_replace('scripts/', 'scripts' . $page->tpl_prefix . '/', $jfile);
                $files[] = $config['DOCUMENT_ROOT'] . $jfile;
            }
        }

        $version = 0;
        //если хотя-бы один из файлов моложе 7 суток,дописываем префикс версии
        foreach ($files as $file) {
            if (is_file($file) && filemtime($file) > time() - 86400 * 7) {
                if (filemtime($file) > $version)
                    $version = filemtime($file);
            }
        }

        if ($version > 0)
            $page->version = $version;


        $page->template = $control->template;
        $page->site_dir = $config['site_dir'];
        
        $html = $this->sprintt($page, $this->_tplDir() . "head.html");

        //сохраняем кэш
        set_cache($_cn, $html);

        return $html;
    }


    function path($arParams = NULL)
    {
        global $control;
        global $config;
        global $sql;
        
        if ($control->template == 'river') return '';

        //попытка загрузить из кэша
        $_cn = sprintf("%s_%s_%s", get_class($this), 'path', cache_key());
        $html = get_cache($_cn);
        if (!is_null($html)) return $html;

        $page = new stdClass();
        $page->item = $control->all->get_parents();
        $page->oper = $control->oper;
        $page->site_dir = $config['site_dir'];
        
        if ($control->template == 'news' && $_GET['id']) {
            $page->oper = 'view';
        }

        $html = $this->sprintt($page, $this->_tplDir() . "path.html");

        //сохраняем кэш
        set_cache($_cn, $html);

        return $html;
    }


    function name($arParams = NULL)
    {
        global $control;
        global $config;
        global $sql;

        if ($control->template == 'news' and $control->oper !== 'view') return;

        //попытка загрузить из кэша
        $_cn = sprintf("%s_%s_%s", get_class($this), 'name', cache_key());
        $html = get_cache($_cn);
        if (!is_null($html)) return $html;

        $page = new stdClass();
        $page->name = $control->name;

        $html = $this->sprintt($page, $this->_tplDir() . "name.html");

        //сохраняем кэш
        set_cache($_cn, $html);

        return $html;
    }


    function online($arParams = NULL)
    {
        global $control;
        global $config;
        global $sql;

        //попытка загрузить из кэша
        $_cn = sprintf("%s_%s_%s", get_class($this), 'online', cache_key());
        $html = get_cache($_cn);
        if (!is_null($html)) return $html;


        if (!isset($control->indexPage)) {
            $control->indexPage = clone(All:: c_data_all(1, 'index'));
        }
        $page = clone($control->indexPage);

        if (intval($page->online_check))
            $page->online_show = 1;


        $html = $this->sprintt($page, $this->_tplDir() . "online.html");

        //сохраняем кэш
        set_cache($_cn, $html);

        return $html;
    }
    

    function header($arParams = NULL)
    {
        global $control;
        global $config;
        global $sql;

        //попытка загрузить из кэша
        $_cn = sprintf("%s_%s_%s", get_class($this), 'header', cache_key());
        $html = get_cache($_cn);
        if (!is_null($html)) return $html;


        if (!isset($control->indexPage)) {
            $control->indexPage = clone(All:: c_data_all(1, 'index'));
        }
        $page = clone($control->indexPage);
        $page->site_dir = $config['site_dir'];

        
        $html = $this->sprintt($page, $this->_tplDir() . "header.html");

        //сохраняем кэш
        set_cache($_cn, $html);

        return $html;
    }
    

    function footer($arParams = NULL)
    {
        global $control;
        global $config;
        global $sql;

        //попытка загрузить из кэша
        $_cn = sprintf("%s_%s_%s", get_class($this), 'footer', cache_key());
        $html = get_cache($_cn);
        if (!is_null($html)) return $html;


        if (!isset($control->indexPage)) {
            $control->indexPage = clone(All:: c_data_all(1, 'index'));
        }
        $page = clone($control->indexPage);
        $page->site_dir = $config['site_dir'];

        
        $html = $this->sprintt($page, $this->_tplDir() . "footer.html");

        //сохраняем кэш
        set_cache($_cn, $html);

        return $html;
    }
    

    function slider($arParams = NULL)
    {
        global $control;
        global $config;
        global $sql;

        //попытка загрузить из кэша
        $_cn = sprintf("%s_%s_%s", get_class($this), 'slider', cache_key());
        $html = get_cache($_cn);
        if (!is_null($html)) return $html;


        if (!isset($control->indexPage)) {
            $control->indexPage = clone(All:: c_data_all(1, 'index'));
        }
        $page = clone($control->indexPage);
        $page->site_dir = $config['site_dir'];
        
        
        $list = new Listing('slider', 'blocks', 'all');
        $list->get_list();
        $list->get_item();
        $page->item = $list->item;

        
        $html = $this->sprintt($page, $this->_tplDir() . "slider.html");

        //сохраняем кэш
        set_cache($_cn, $html);

        return $html;
    }

// <#AUTOMETHODS#>


}

?>