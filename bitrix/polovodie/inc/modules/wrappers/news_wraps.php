<?

/* здесь уже доступен $control->template, $control->oper и остальные параметры URL, 
поэтому при необходимости можно динамически менять враппер для модуля
(например для новостей указать разные базовые шаблон у списка новостей и у конкретной новости) :

    global $control;

    if ($control->template == "news" && $control->oper !== "view")
        враппер 1
    else
        враппер 2

*/

global $control;


if ($control->template == "news" && !$_GET['id']) {
	$news_wrappers = array ( 'news' => array ('module'=> 'news', 'html'=>'inner.html'));	
}

else {
	$news_wrappers = array ( 'news' => array ('module'=> 'news', 'html'=>'inner_news.html'));	
}
$wrappers = array_merge($wrappers, $news_wrappers);
?>