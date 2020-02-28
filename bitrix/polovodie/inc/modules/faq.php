<?

class faq extends metamodule
{
    function __construct()
    {
        parent::__construct();

        //обязательно указываем наши шаблоны папок
        $this->cTemplates = array(
            'faq',

        );
        //здесь настраиваем базовый шаблон для каждого шаблона папки, используемого модулем
        $this->moduleWrappers = array(
            'faq' => 'inner.html',

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

        $page = new stdClass();
        $cid = 353;
        
        $list = new Listing('faq', 'blocks', $cid);
        $list->get_list();
        $list->get_item();
        $page->item = $list->item;


        $html = $this->sprintt($page, $this->_tplDir() . "faq.html");
        return $html;
    }
}

?>