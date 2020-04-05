<?php

require $_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/prolog_before.php';
require_once dirname(__FILE__).'/bitrix/php_interface/lib/letter.php';

$fields = array(
    'appeal' => 'Appeal', 
    'firstName' => 'First name', 
    'lastName' => 'Last name', 
    'email' => 'E-mail', 
    'company' => 'Company', 
    'phone' => 'Phone',     
   // 'fax' => 'Fax', 
    'celluar' => 'Cellular', 
    'contactPerson' => 'Contact person',
    'contactEmail' => 'Contact email',
    'contactPhone' => 'Contact phone',
    null,
    'allergies' => 'Please list any special dietary requirements or food allergies in the box provided', 
    null,
    'arrivingFrom' => 'Arriving from', 
    'arrivalDate' => 'Arrival date', 
    'arrivalFlightNumber' => 'Arrival flight number / airline', 
    'arrivalTime' => 'Arrival time', 
    'departingTo' => 'Departing to', 
    'departureDate' => 'Departure date', 
    'departureFlightNumber' => 'Departure flight number / airline', 
    'departureTime' => 'Departure time', 
    null,
    'guests' => 'Guests',
);

$body = '';
$eventHeader = false;
$guestEventHeader = false;
$hasFields = false;
foreach ($fields as $field => $title) {
    if ($title === null) {
        $body .= "\n";
        continue;
    }

    if (empty($_POST[$field])) continue;

    $hasFields = true;

    /*if (strpos($field, 'guestEvent') !== false) {
        if (!$eventHeader) {
            $body .= "Guest events:\n";
            $eventHeader = true;
        }
    }
    elseif (strpos($field, 'event') !== false) {
        if (!$guestEventHeader) {
            $body .= "Events:\n";
            $guestEventHeader = true;
        }
    }*/

    $body .= (strpos(strtolower($field), 'event') !== false ? "\t" : '').$title.': ';
    if (!is_array($_POST[$field])) {
        $body .= htmlspecialchars($_POST[$field])."\n";
    }
    elseif ($field === 'guests') {
        $body .= "\n";
        foreach (array_values($_POST[$field]) as $index => $guest) {
            if (array_diff(array('firstName', 'lastName'), array_keys($guest))) continue;

            $body .= "\t".($index + 1).'. '.htmlspecialchars($guest['firstName']).' '.htmlspecialchars($guest['lastName'])."\n";
        }
    }
    elseif ($field === 'rooms') {
        $body .= "\n";
        foreach (array_values($_POST[$field]) as $index => $room) {
            if (array_diff(array('firstName', 'lastName', 'checkIn', 'checkOut', 'type', 'category'), array_keys($room))) continue;

            $body .= 
                "\t".($index + 1).'. '.htmlspecialchars($room['firstName']).' '.htmlspecialchars($room['lastName']).', '
                .htmlspecialchars($room['checkIn']).' - '.htmlspecialchars($room['checkOut']).', '
                .htmlspecialchars($room['type']).', '.htmlspecialchars($room['category'])."\n";
        }
    }
    //$body .= '</td></tr>';
}
//$body .= '</table>';

/*letter::create()->
    from('no_reply@sysntec.ru')->
    to('herr.offizier@gmail.com')->
    to('svl@gidroogk.ru')->
    subject('GSEP Registration')->
    text($body)->
    send();*/

if (!$hasFields) {
    echo 'No fields passed.';
    exit;
}

if (CModule::IncludeModule('form')) {
    $resultId = CFormResult::Add(
        3,
        array(
            'form_textarea_11' => $body,
        ),
        'N'
    );
    /*global $strError;
    var_dump($resultId, $strError);*/
}

$emails = array('svl@gidroogk.ru', 'KhovanskyAO@gidroogk.ru', 'IvanovaIY@gidroogk.ru');
//$emails = array('rannev@sysntec.ru');
foreach ($emails as $email) {
    mail($email, 'GSEP Registration Moscow', $body, 'From: no_reply@sysntec.ru');
}