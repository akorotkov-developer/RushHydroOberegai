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

if ($control->template == "smi" && $control->oper != 'view' ) {
	$smi_wrappers = array ( 'smi' => array ('module'=> 'smi', 'html'=>'inner.html'));	
}

else {
	$smi_wrappers = array ( 'smi' => array ('module'=> 'smi', 'html'=>'inner_news.html'));	
}

$wrappers = array_merge($wrappers, $smi_wrappers);
?>

