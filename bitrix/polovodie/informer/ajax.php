<?php
//if ((!empty($_SERVER['HTTP_X_REQUESTED_WITH'])) && (strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest')) {
    require_once dirname(__FILE__).'/config.inc.php';
    if (!headers_sent()) {
        header('Content-Type: application/json; charset=utf-8');
    }
    if ($_GET['type']=='searchByDate') {
            if ((isset($_GET['date']))) {
                $date=$_GET['date'];
                echo json_encode(Data::selectByDate($date));
            }
    } elseif ($_GET['type']=='allDates') {
        echo json_encode(Data::selectAllDates());
    }
    exit;
//}
