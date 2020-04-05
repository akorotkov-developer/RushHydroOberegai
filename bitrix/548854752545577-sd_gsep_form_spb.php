<?php

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
    'event1' => '29/09 Greeting cocktail in the hotel lobby',
    'event2' => '30/09 Sightseeing walk tour',
    'event3' => '30/09 Lunch at the traditional Russian cuisine restaurant',
    'event4' => '30/09 Sightseeing tour behind the scene of Mariinsky Theater',
    'event5' => '30/09 Dinner at the Sadko Restaurant',
    'event6' => '01/10 Tea hour and painting workshop',
    'event7' => '01/10 Lunch at the traditional Russian cuisine restaurant',
    'event8' => '01/10 Tsarskoye Selo and Catherine Palace',
    'event9' => '01/10 Dinner at the Podvorye restaurant',
    'event10' => '02/10 Visit to the Russian Museum',
    'event11' => '02/10 Lunch at the traditional Russian cuisine restaurant',
    'event12' => '02/10 Visit to the Emperor\'s Porcelain Factory with a master class in porcelain painting',
    'event13' => '02/10 "Musical Hermitage" program',
    'event14' => '03/10 Sightseeing walk tour',
    'event15' => '03/10 Lunch',
    'event16' => '03/10 Boat tour  along the Neva River',
    'event17' => '03/10 Dinner at the Mirror Hall of Yusupov\'s Palace',
    'event18' => '04/10 Peterhof',
    'event19' => '04/10 Lunch in Peterhof',
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
    'guestEvent1' => '29/09 Greeting cocktail in the hotel lobby',
    'guestEvent2' => '30/09 Sightseeing walk tour',
    'guestEvent3' => '30/09 Lunch at the traditional Russian cuisine restaurant',
    'guestEvent4' => '30/09 Sightseeing tour behind the scene of Mariinsky Theater',
    'guestEvent5' => '30/09 Dinner at the Sadko Restaurant',
    'guestEvent6' => '01/10 Tea hour and painting workshop',
    'guestEvent7' => '01/10 Lunch at the traditional Russian cuisine restaurant',
    'guestEvent8' => '01/10 Tsarskoye Selo and Catherine Palace',
    'guestEvent9' => '01/10 Dinner at the Podvorye restaurant',
    'guestEvent10' => '02/10 Visit to the Russian Museum',
    'guestEvent11' => '02/10 Lunch at the traditional Russian cuisine restaurant',
    'guestEvent12' => '02/10 Visit to the Emperor\'s Porcelain Factory with a master class in porcelain painting',
    'guestEvent13' => '02/10 "Musical Hermitage" program',
    'guestEvent14' => '03/10 Sightseeing walk tour',
    'guestEvent15' => '03/10 Lunch',
    'guestEvent16' => '03/10 Boat tour  along the Neva River',
    'guestEvent17' => '03/10 Dinner at the Mirror Hall of Yusupov\'s Palace',
    'guestEvent18' => '04/10 Peterhof',
    'guestEvent19' => '04/10 Lunch in Peterhof',
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
    
if (!$hasFields) exit;

$emails = array('svl@gidroogk.ru', 'KhovanskyAO@gidroogk.ru', 'IvanovaIY@gidroogk.ru');
foreach ($emails as $email) {
    mail($email, 'GSEP Registration', $body, 'From: no_reply@sysntec.ru');
}