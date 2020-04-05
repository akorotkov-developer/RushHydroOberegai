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
    'comManagement' => 'Management Committee Meeting',
    'comProject' => 'Project Committee Meeting',
    'comPolicy' => 'Policy Committee Meeting',
    null,
    'event1' => '24/03 Sightseeing tour of Irkutsk',
    'event2' => '24/03 Visit to a Russian family',
    'event3' => '24/03 Tour of a Siberian Zaimka (Lodge), a troika ride',
    'event4' => '24/03 Visit to the Krestovozdvizhensky church bell tower',
    'event5' => '24/03 Dinner at the Restaurant. Jointly for Participants and Guests',
    'event6' => '25/03 Visit to the Znamensky cathedral, the Trubetsky museum',
    'event7' => '25/03 Lunch',
    'event8' => '25/03 Visit to the Irkutsk Regional Historic Memorial Museum  "Volkonsky house"',
    'event9' => '25/03 Dinner at the  Restaurant. Jointly for Participants and Guests',
    'event10' => '26/03 Day tour of Baikal for all participants and guests ( including dinner)',
    'event11' => '27/03 Visit to the administrative and cultural center of Buryat okrug (district), Ust-Ordynsky',
    'event12' => '27/03 Dinner at the  Restaurant. Jointly for Participants and Guests',
    'event13' => '28/03 Lunch. Jointly for Participants and Guests',
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
    'guestEvent1' => '24/03 Sightseeing tour of Irkutsk',
    'guestEvent2' => '24/03 Visit to a Russian family',
    'guestEvent3' => '24/03 Tour of a Siberian Zaimka (Lodge), a troika ride',
    'guestEvent4' => '24/03 Visit to the Krestovozdvizhensky church bell tower',
    'guestEvent5' => '24/03 Dinner at the Restaurant. Jointly for Participants and Guests',
    'guestEvent6' => '25/03 Visit to the Znamensky cathedral, the Trubetsky museum',
    'guestEvent7' => '25/03 Lunch',
    'guestEvent8' => '25/03 Visit to the Irkutsk Regional Historic Memorial Museum  "Volkonsky house"',
    'guestEvent9' => '25/03 Dinner at the  Restaurant. Jointly for Participants and Guests',
    'guestEvent10' => '26/03 Day tour of Baikal for all participants and guests ( including dinner)',
    'guestEvent11' => '27/03 Visit to the administrative and cultural center of Buryat okrug (district), Ust-Ordynsky',
    'guestEvent12' => '27/03 Dinner at the  Restaurant. Jointly for Participants and Guests',
    'guestEvent13' => '28/03 Lunch. Jointly for Participants and Guests',
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

    if (strpos($field, 'guestEvent') !== false) {
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
    }

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
//$emails = array('korotin@sysntec.ru');
foreach ($emails as $email) {
    mail($email, 'GSEP Registration Irkutsk', $body, 'From: no_reply@sysntec.ru');
}