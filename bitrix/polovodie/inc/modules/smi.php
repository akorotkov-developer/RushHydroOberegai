<?

class smi extends metamodule
{
    function __construct()
    {
        parent::__construct();

        //обязательно указываем наши шаблоны папок
        $this->cTemplates = array(
            'smi',

        );
        //здесь настраиваем базовый шаблон для каждого шаблона папки, используемого модулем
        $this->moduleWrappers = array(
            'smi' => 'inner.html',

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


        if ($control->oper == 'view') {
            return $this->showOne($control->bid);
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
        $_cn = sprintf("%s_%s_%s", get_class($this), 'list', cache_key());
        $html = get_cache($_cn);
        if (!is_null($html)) return $html;

        //достаем настройки
        $page = All::c_data_all($control->cid, $control->template);

        $list = new Listing('smi', 'blocks', $control->cid);//достаем блоки

        $list->limit = 10;
        $list->page = $control->page;//для постранички
        $list->sortfield = 'date DESC, id';//сортируем по дате
        $list->sortby = 'DESC';
        $list->tmp_url = $list->all->get_url($control->cid); //для постранички
        $list->no_text_view = 1; //не обрабатывать HTML-содержимое

        $list->get_list();
        $list->get_item();
        $page->item = $list->item;

        $page->navigation = $list->navigation;
        $page->url_prev = $list->url_prev;
        $page->url_next = $list->url_next;

        $page->page_name = $control->name;

        $html = $this->sprintt($page, $this->_tplDir() . "list.html");

        //сохраняем кэш
        set_cache($_cn, $html);
        return $html;

    }


    function showOne($bid)
    {
        global $control;
        global $config;
        global $sql;

        //попытка загрузить из кэша
        $_cn = sprintf("%s_%s_%s", get_class($this), 'one', cache_key());
        $html = get_cache($_cn);
        if (!is_null($html)) return $html;

        if ($bid) {
            $block = $control->all->b_data_all($bid, 'smi');
            $control->name = $block->title;
            $block->backurl = $control->all->get_url($control->cid);
            if (intval($control->page))
                $block->backurl .= '_p' . $control->page;

        }

        $html = $this->sprintt($block, $this->_tplDir() . "one.html");

        //сохраняем кэш
        set_cache($_cn, $html);

        return $html;
    }

    function mainblock($arParams = NULL)
    {
        global $control;
        global $config;
        global $sql;

        if (!in_array($control->template, array('river', 'index'))) return '';

        //попытка загрузить из кэша
        $_cn = sprintf("%s_%s", get_class($this), 'mainblock');
        $html = get_cache($_cn);
        if (!is_null($html)) return $html;


        $CID = 401;
        $page = All::c_data_all($CID, 'smi');
        $page->page_name = All::get_name($CID);
        $page->site_dir = $config['site_dir'];

        $critery = "";
        if ((int)$control->bid && $control->btemplate == 'river') {
            $critery = sprintf(" river = %d AND ", (int)$control->bid);
        }

        $list = new Listing('smi', 'blocks', $CID, $critery);
        $list->no_text_view = 1;
        $list->limit = 6;
        $list->sortfield = 'date DESC, id';
        $list->sortby = 'desc';
        $list->tmp_url = $control->all->get_url($CID);
        $list->get_list();
        $list->get_item();
        $page->item = $list->item;
        $page->page_url = $list->tmp_url;


        // видео
        $videoCID = 402;
        $videoCritery = "";
        if ((int)$control->bid && $control->btemplate == 'river') {
            $videoCritery = sprintf(" river = %d AND ", (int)$control->bid);
        }
        $vlist = new Listing('video', 'blocks', $videoCID, $videoCritery);
        $vlist->no_text_view = 1;
        $vlist->limit = 1;
        $vlist->sortfield = 'date DESC, id';
        $vlist->sortby = 'desc';
        $vlist->get_list();
        $vlist->get_item();
        $page->video = $vlist->item;

        if ($page->video) {
            foreach ($page->video as $video) {
                if (is_file($config['DOCUMENT_ROOT'] . 'files/' . $video->file)) {
                    $video->file_ext = pathinfo($config['DOCUMENT_ROOT'] . 'files/' . $video->file, PATHINFO_EXTENSION);
                }
            }
        }

        $page->show = false;
        if (count($page->item) || count($page->video)) {
            $page->show = true;
        }

		//var_dump($page);



        $html = $this->sprintt($page, $this->_tplDir() . "mainblock.html");

        //сохраняем кэш
        set_cache($_cn, $html);

        return $html;
    }

// <#AUTOMETHODS#>

}

?>