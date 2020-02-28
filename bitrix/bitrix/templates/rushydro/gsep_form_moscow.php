<a href="../" ><img src="/upload/medialibrary/e50/gsep-mini.jpg" border="0" align="right" width="200" height="50" style="margin-top:-62px; margin-right:5px;"  /> </a> 
<table data-bind="visible: currentScreenIndex() < 6" width="100%" class="form_gsep_nav">
    <tr>
        <td><div class="first" style="z-index:6;" data-bind="css: { 'act': currentScreenIndex() === 0, 'prev': currentScreenIndex() > 0 }">step 1<i></i></div></td>
        <td><div style="z-index:5;" data-bind="css: { 'act': currentScreenIndex() === 1, 'prev': currentScreenIndex() > 1 }">step 2<i></i></div></td>
        <td><div style="z-index:4;" data-bind="css: { 'act': currentScreenIndex() === 2, 'prev': currentScreenIndex() > 2 }">step 3<i></i></div></td>
        <td><div style="z-index:3;" data-bind="css: { 'act': currentScreenIndex() === 3, 'prev': currentScreenIndex() > 3 }">step 4<i></i></div></td>
        <td><div style="z-index:2;" data-bind="css: { 'act': currentScreenIndex() === 4, 'prev': currentScreenIndex() > 4 }">step 5<i></i></div></td>
        <td><div style="z-index:1;" data-bind="css: { 'act': currentScreenIndex() === 5, 'prev': currentScreenIndex() > 5 }">step 6<i></i></div></td>
    </tr>
</table>
<form id="gsep_form" action="/gsep_form_moscow.php" method="POST">
    <div data-bind="visible: currentScreenIndex() === 0">
        <h2>Attendee Information</h2>
        <br/>
        <p style="margin-right:10px; padding-bottom:15px; border-bottom:1px solid #efefef;"><strong>All fields are mandatory.</strong></p>
        <br>
        <table width="60%" class="form_feedback form_gsep">
            <tr>
                <td class="ff_head" width="130">Form of address:</td>
                <td>
                   <label><input name="appeal" type="radio" value="Mr" data-bind="checked: appeal">Mr</label>
                   <label><input name="appeal" type="radio" value="Mrs" data-bind="checked: appeal">Mrs</label>
                </td>
            </tr>
            <tr>
                <td class="ff_head">First name:</td>
                <td><div class="inp"><i></i><i class="lft"></i><input type="text" data-bind="value: firstName, valueUpdate: 'afterkeydown'" class="inputtext" /></div></td>
            </tr>
            <tr>
                <td class="ff_head">Last name:</td>
                <td><div class="inp"><i></i><i class="lft"></i><input type="text" data-bind="value: lastName, valueUpdate: 'afterkeydown'" class="inputtext" /></div></td>
            </tr>
            <tr>
                <td class="ff_head">E-mail:</td>
                <td><div class="inp"><i></i><i class="lft"></i><input type="text" data-bind="value: email, valueUpdate: 'afterkeydown'" class="inputtext" /></div></td>
            </tr>
            <tr>
                <td class="ff_head">Company:</td>
                <td><div class="inp"><i></i><i class="lft"></i><input type="text" data-bind="value: company, valueUpdate: 'afterkeydown'" class="inputtext" /></div></td>
            </tr>
            <tr>
                <td class="ff_head">Phone:</td>
                <td><div class="inp"><i></i><i class="lft"></i><input type="text" data-bind="value: phone, valueUpdate: 'afterkeydown'" class="inputtext" /></div></td>
            </tr>
            <tr>
                <td class="ff_head">Cellular:</td>
                <td><div class="inp"><i></i><i class="lft"></i><input type="text" data-bind="value: celluar, valueUpdate: 'afterkeydown'" class="inputtext" /></div></td>
            </tr>
            <tr>
                <td class="ff_head">Contact person:</td>
                <td><div class="inp"><i></i><i class="lft"></i><input type="text" data-bind="value: contactPerson, valueUpdate: 'afterkeydown'" class="inputtext" /></div></td>
            </tr>
            <tr>
                <td class="ff_head">Contact phone:</td>
                <td><div class="inp"><i></i><i class="lft"></i><input type="text" data-bind="value: contactPhone, valueUpdate: 'afterkeydown'" class="inputtext" /></div></td>
            </tr>
            <tr>
                <td class="ff_head">Contact email:</td>
                <td><div class="inp"><i></i><i class="lft"></i><input type="text" data-bind="value: contactEmail, valueUpdate: 'afterkeydown'" class="inputtext" /></div></td>
            </tr>
        </table>
    </div>

    <div data-bind="visible: currentScreenIndex() === 1">
        <h2>Agenda</h2>
        <table width="100%" class="form_feedback form_gsep">
            <tr>
                <td class="ff_head" style="padding-bottom:8px; padding-top:10px;" colspan="3">May 25, 2014</td>
            </tr>
            <tr>
                <td width="90"><strong>19:00 – 22:00</strong></td>
                <td>
                    <strong>Sherpa Reception and Dinner</strong>
                </td>
            </tr>

            <tr>
                <td class="ff_head" style="padding-bottom:8px; padding-top:10px;" colspan="3">May 26, 2014</td>
            </tr>
            <tr>
                <td width="90"><strong>09:00 – 12:00</strong></td>
                <td>
                    <strong>Management Committee</strong>
                </td>
            </tr>
            <tr>
                <td width="90"><strong>13:00 – 14:30</strong></td>
                <td>
                    <strong>Lunch</strong>
                </td>
            </tr>
            <tr>
                <td width="90"><strong>14:30 – 15:30</strong></td>
                <td>
                    <strong>Chairmen Cocktail </strong>
                </td>
            </tr>
            <tr>
                <td width="90"><strong>16:00 – 16:20</strong></td>
                <td>
                    <strong>GEI presentation</strong>
                </td>
            </tr>
            <tr>
                <td width="90"><strong>16:20 – 17:40</strong></td>
                <td>
                    <strong>Session 1</strong>
                </td>
            </tr>
            <tr>
                <td width="90"><strong>19:00 – 22:00</strong></td>
                <td>
                    <strong>Chairmen Reception and  Dinner</strong>
                </td> 
            </tr>
            <tr>
                <td class="ff_head" style="padding-bottom:8px; padding-top:10px;" colspan="3">May 27, 2014</td>
            </tr>
            <tr>
                <td width="90"><strong>09:00 – 11:00</strong></td>
                <td>
                    <strong>Board of Directors</strong>
                </td>
            </tr>
            <tr>
                <td width="90"><strong>11:20 – 13:20</strong></td>
                <td>
                    <strong>Plenary Session 2</strong>
                </td>
            </tr>
            <tr>
                <td width="90"><strong>13:30 – 15:00</strong></td>
                <td>
                    <strong>Summit Lunch</strong>
                </td>
            </tr>
            <tr>
                <td width="90"><strong>15:00 – 16:30</strong></td>
                <td>
                    <strong>Session 3</strong>
                </td>
            </tr>
            <tr>
                <td width="90" style="vertical-align:top"><strong>17:00 – 18:15</strong></td>
                <td>
                    <strong>Session 4</strong>
                </td>
            </tr>
            <tr>
                <td width="90" style="vertical-align:top"><strong>18:15 – 18:45</strong></td>
                <td>
                    <strong>Transfer of Chairmanship</strong>
                </td>
            </tr>
            <tr>
                <td width="90"><strong>20:00 – 24:00</strong></td>
                <td>
                    <strong>Reception and Summit Dinner</strong>
                </td>
            </tr>
            <tr>
                <td class="ff_head" style="padding-bottom:8px; padding-top:10px;" colspan="3">May 28, 2014</td>
            </tr>
            <tr>
                <td width="90"><strong>10:00 – 15:00</strong></td>
                <td>
                    <strong>Cultural Program (incl. lunch)</strong>
                </td>
            </tr>
        </table>
    </div>

    <div data-bind="visible: currentScreenIndex() === 2">
        <table width="100%" class="form_feedback form_gsep">
            <tr>
                <td class="ff_head">Please list any special food requirements or allergies below</td>
            </tr>
            <tr>
                <td style="padding-left:8px;"> 
                    <div class="txtarea"><i></i><i class="rht"></i><textarea data-bind="value: allergies" class="inputtextarea"></textarea><div class="clear"></div><i class="btm"></i><i class="rht_btm rht"></i></div>
                </td>
            </tr>
        </table>
    </div>

    <div data-bind="visible: currentScreenIndex() === 3">
        <h2>Flight Information</h2>
        <h3>Arrival</h3>
        <table width="100%" class="form_feedback form_gsep form_gsep_flight_info">
            <tr>
                <td class="ff_head">Arriving from</td>
                <td class="ff_head">Arrival date</td>
                <td class="ff_head">Arrival flight number / airline</td>
                <td class="ff_head">Arrival time</td>
            </tr>
            <tr>
                <td><div class="inp"><i></i><i class="lft"></i><input type="text" data-bind="value: arrivingFrom, valueUpdate: 'afterkeydown'" class="inputtext" /></div></td>
                <td><div class="inp"><i></i><i class="lft"></i><input type="text" data-bind="value: arrivalDate, valueUpdate: 'afterkeydown'" class="inputtext" /></div></td>
                <td><div class="inp"><i></i><i class="lft"></i><input type="text" data-bind="value: arrivalFlightNumber, valueUpdate: 'afterkeydown'" class="inputtext" /></div></td>
                <td><div class="inp"><i></i><i class="lft"></i><input type="text" data-bind="value: arrivalTime, valueUpdate: 'afterkeydown'" class="inputtext" /></div></td>
            </tr>
        </table>
        <br/>
        <h3>Departure</h3>
        <table width="100%" class="form_feedback form_gsep form_gsep_flight_info">
            <tr>
                <td class="ff_head">Departing to</td>
                <td class="ff_head">Departure date</td>
                <td class="ff_head">Departure flight number /airline</td>
                <td class="ff_head">Departure time</td>
            </tr>
            <tr>
                <td><div class="inp"><i></i><i class="lft"></i><input type="text" data-bind="value: departingTo, valueUpdate: 'afterkeydown'" class="inputtext" /></div></td>
                <td><div class="inp"><i></i><i class="lft"></i><input type="text" data-bind="value: departureDate, valueUpdate: 'afterkeydown'" class="inputtext" /></div></td>
                <td><div class="inp"><i></i><i class="lft"></i><input type="text" data-bind="value: departureFlightNumber, valueUpdate: 'afterkeydown'" class="inputtext" /></div></td>
                <td><div class="inp"><i></i><i class="lft"></i><input type="text" data-bind="value: departureTime, valueUpdate: 'afterkeydown'" class="inputtext" /></div></td>
            </tr>
        </table>
    </div>

    <div data-bind="visible: currentScreenIndex() === 4">
        <h2>Accompanied By</h2>
        <br/>
        <div data-bind="foreach: guests">
            <table width="85%" class="form_feedback form_gsep" style="margin-bottom:20px;">
                <tr>
                    <td class="ff_head" width="130">First name:</td>
                    <td width="220"><div class="inp"><i></i><i class="lft"></i><input type="text" data-bind="value: $data.firstName, valueUpdate: 'afterkeydown'" class="inputtext" /></div></td>
                    <td rowspan="2" style="padding-left:8px;"><div class="form_gsep_remove in-bl" data-bind="click: $parent.removeGuest">- Remove</div></td>
                </tr>
                <tr>
                    <td class="ff_head">Last name:</td>
                    <td><div class="inp"><i></i><i class="lft"></i><input type="text" data-bind="value: $data.lastName, valueUpdate: 'afterkeydown'" class="inputtext" /></div></td>
                </tr>
            </table>
        </div>
        <div class="form_gsep_add in-bl" data-bind="click: addGuest">+ add guest</div>
        <br/>
        <br/>
        <table width="100%" class="form_feedback form_gsep" data-bind="visible: guests().length > 0">
            <tr>
                <td class="ff_head" style="padding-bottom:8px; padding-top:10px;" colspan="3">May 25, 2014</td>
            </tr>
            <tr>
                <td width="90"><strong>19:00 – 22:00</strong></td>
                <td>
                    <strong>Sherpa Reception and Dinner</strong>
                </td>
            </tr>

            <tr>
                <td class="ff_head" style="padding-bottom:8px; padding-top:10px;" colspan="3">May 26, 2014</td>
            </tr>
            <tr>
                <td width="90"><strong>09:00 – 12:00</strong></td>
                <td>
                    <strong>Management Committee</strong>
                </td>
            </tr>
            <tr>
                <td width="90"><strong>13:00 – 14:30</strong></td>
                <td>
                    <strong>Lunch</strong>
                </td>
            </tr>
            <tr>
                <td width="90"><strong>14:30 – 15:30</strong></td>
                <td>
                    <strong>Chairmen Cocktail </strong>
                </td>
            </tr>
            <tr>
                <td width="90"><strong>16:00 – 16:20</strong></td>
                <td>
                    <strong>GEI presentation</strong>
                </td>
            </tr>
            <tr>
                <td width="90"><strong>16:20 – 17:40</strong></td>
                <td>
                    <strong>Session 1</strong>
                </td>
            </tr>
            <tr>
                <td width="90"><strong>19:00 – 22:00</strong></td>
                <td>
                    <strong>Chairmen Reception and  Dinner</strong>
                </td> 
            </tr>
            <tr>
                <td class="ff_head" style="padding-bottom:8px; padding-top:10px;" colspan="3">May 27, 2014</td>
            </tr>
            <tr>
                <td width="90"><strong>09:00 – 11:00</strong></td>
                <td>
                    <strong>Board of Directors</strong>
                </td>
            </tr>
            <tr>
                <td width="90"><strong>11:20 – 13:20</strong></td>
                <td>
                    <strong>Plenary Session 2</strong>
                </td>
            </tr>
            <tr>
                <td width="90"><strong>13:30 – 15:00</strong></td>
                <td>
                    <strong>Summit Lunch</strong>
                </td>
            </tr>
            <tr>
                <td width="90"><strong>15:00 – 16:30</strong></td>
                <td>
                    <strong>Session 3</strong>
                </td>
            </tr>
            <tr>
                <td width="90" style="vertical-align:top"><strong>17:00 – 18:15</strong></td>
                <td>
                    <strong>Session 4</strong>
                </td>
            </tr>
            <tr>
                <td width="90" style="vertical-align:top"><strong>18:15 – 18:45</strong></td>
                <td>
                    <strong>Transfer of Chairmanship</strong>
                </td>
            </tr>
            <tr>
                <td width="90"><strong>20:00 – 24:00</strong></td>
                <td>
                    <strong>Reception and Summit Dinner</strong>
                </td>
            </tr>
            <tr>
                <td class="ff_head" style="padding-bottom:8px; padding-top:10px;" colspan="3">May 28, 2014</td>
            </tr>
            <tr>
                <td width="90"><strong>10:00 – 15:00</strong></td>
                <td>
                    <strong>Cultural Program (incl. lunch)</strong>
                </td>
            </tr>
        </table>
    </div>
</form>

<div data-bind="visible: currentScreenIndex() === 5">
    <h2>Attendee Information</h2>
    <br>
    <table width="60%" class="form_feedback form_gsep">
        <tr>
            <td class="ff_head" width="130">Form of address:</td>
            <td data-bind="html: appeal"></td>
        </tr>
        <tr>
            <td class="ff_head">First name:</td>
            <td data-bind="html: firstName"></td>
        </tr>
        <tr>
            <td class="ff_head">Last name:</td>
            <td data-bind="html: lastName"></td>
        </tr>
        <tr>
            <td class="ff_head">E-mail:</td>
            <td data-bind="html: email"></td>
        </tr>
        <tr>
            <td class="ff_head">Company:</td>
            <td data-bind="html: company"></td>
        </tr>
        <tr>
            <td class="ff_head">Phone:</td>
            <td data-bind="html: phone"></td>
        </tr>
        <tr>
            <td class="ff_head">Cellular:</td>
            <td data-bind="html: celluar"></td>
        </tr>
        <tr>
            <td class="ff_head">Contact person:</td>
            <td data-bind="html: contactPerson"></td>
        </tr>
        <tr>
            <td class="ff_head">Contact phone:</td>
            <td data-bind="html: contactPhone"></td>
        </tr>
        <tr>
            <td class="ff_head">Contact email:</td>
            <td data-bind="html: contactEmail"></td>
        </tr>
    </table>

    <div style="padding-top:20px; border-top:1px solid #E5E5E5;">
        <h2>Agenda</h2><br>
        <table width="100%" class="form_feedback form_gsep">
            <tr>
                <td class="ff_head" style="padding-bottom:8px; padding-top:10px;" colspan="3">May 25, 2014</td>
            </tr>
            <tr>
                <td width="90"><strong>19:00 – 22:00</strong></td>
                <td>
                    <strong>Sherpa Reception and Dinner</strong>
                </td>
            </tr>

            <tr>
                <td class="ff_head" style="padding-bottom:8px; padding-top:10px;" colspan="3">May 26, 2014</td>
            </tr>
            <tr>
                <td width="90"><strong>09:00 – 12:00</strong></td>
                <td>
                    <strong>Management Committee</strong>
                </td>
            </tr>
            <tr>
                <td width="90"><strong>13:00 – 14:30</strong></td>
                <td>
                    <strong>Lunch</strong>
                </td>
            </tr>
            <tr>
                <td width="90"><strong>14:30 – 15:30</strong></td>
                <td>
                    <strong>Chairmen Cocktail </strong>
                </td>
            </tr>
            <tr>
                <td width="90"><strong>16:00 – 16:20</strong></td>
                <td>
                    <strong>GEI presentation</strong>
                </td>
            </tr>
            <tr>
                <td width="90"><strong>16:20 – 17:40</strong></td>
                <td>
                    <strong>Session 1</strong>
                </td>
            </tr>
            <tr>
                <td width="90"><strong>19:00 – 22:00</strong></td>
                <td>
                    <strong>Chairmen Reception and  Dinner</strong>
                </td> 
            </tr>
            <tr>
                <td class="ff_head" style="padding-bottom:8px; padding-top:10px;" colspan="3">May 27, 2014</td>
            </tr>
            <tr>
                <td width="90"><strong>09:00 – 11:00</strong></td>
                <td>
                    <strong>Board of Directors</strong>
                </td>
            </tr>
            <tr>
                <td width="90"><strong>11:20 – 13:20</strong></td>
                <td>
                    <strong>Plenary Session 2</strong>
                </td>
            </tr>
            <tr>
                <td width="90"><strong>13:30 – 15:00</strong></td>
                <td>
                    <strong>Summit Lunch</strong>
                </td>
            </tr>
            <tr>
                <td width="90"><strong>15:00 – 16:30</strong></td>
                <td>
                    <strong>Session 3</strong>
                </td>
            </tr>
            <tr>
                <td width="90" style="vertical-align:top"><strong>17:00 – 18:15</strong></td>
                <td>
                    <strong>Session 4</strong>
                </td>
            </tr>
            <tr>
                <td width="90" style="vertical-align:top"><strong>18:15 – 18:45</strong></td>
                <td>
                    <strong>Transfer of Chairmanship</strong>
                </td>
            </tr>
            <tr>
                <td width="90"><strong>20:00 – 24:00</strong></td>
                <td>
                    <strong>Reception and Summit Dinner</strong>
                </td>
            </tr>
            <tr>
                <td class="ff_head" style="padding-bottom:8px; padding-top:10px;" colspan="3">May 28, 2014</td>
            </tr>
            <tr>
                <td width="90"><strong>10:00 – 15:00</strong></td>
                <td>
                    <strong>Cultural Program (incl. lunch)</strong>
                </td>
            </tr>
        </table>
    </div>

    <div style="padding-top:20px; border-top:1px solid #E5E5E5;" data-bind="visible: !!allergies()">
        <table width="100%" class="form_feedback form_gsep">
            <tr>
                <td class="ff_head">Please list any special food requirements or allergies below</td>
            </tr>
            <tr>
                <td data-bind="html: allergies"></td>
            </tr>
    </table>
    </div>

    <div style="padding-top:20px; border-top:1px solid #E5E5E5;">
        <h2>Flight Information</h2>
        <h3>Arrival</h3>
        <br/>
        <table width="100%" class="form_feedback form_gsep">
            <tr>
                <td class="ff_head">Arriving from</td>
                <td class="ff_head">Arrival date</td>
                <td class="ff_head">Arrival flight number / airline</td>
                <td class="ff_head">Arrival time</td>
            </tr>
            <tr>
                <td data-bind="html: arrivingFrom"></td>
                <td data-bind="html: arrivalDate"></td>
                <td data-bind="html: arrivalFlightNumber"></td>
                <td data-bind="html: arrivalTime"></td>
            </tr>
        </table>
        <h3>Departure</h3>
        <br/>
        <table width="100%" class="form_feedback form_gsep">
            <tr>
                <td class="ff_head">Departing to</td>
                <td class="ff_head">Departure date</td>
                <td class="ff_head">Departure flight number / airline</td>
                <td class="ff_head">Departure time</td>
            </tr>
            <tr>
                <td data-bind="html: departingTo"></td>
                <td data-bind="html: departureDate"></td>
                <td data-bind="html: departureFlightNumber"></td>
                <td data-bind="html: departureTime"></td>
            </tr>
        </table>
    </div>

    <div style="padding-top:20px; border-top:1px solid #E5E5E5;" data-bind="visible: guests().length > 0">
        <h2>Accompanied By</h2>
        <br/>
        <div data-bind="foreach: guests">
            <table width="85%" class="form_feedback form_gsep">
                <tr>
                    <td class="ff_head" width="130">First name:</td>
                    <td data-bind="html: $data.firstName"></td>
                </tr>
                <tr>
                    <td class="ff_head">Last name:</td>
                    <td data-bind="html: $data.lastName"></td>
                </tr>
            </table>
        </div>

        <br><h2>Agenda</h2><br>
        <table width="100%" class="form_feedback form_gsep">
            <tr>
                <td class="ff_head" style="padding-bottom:8px; padding-top:10px;" colspan="3">May 25, 2014</td>
            </tr>
            <tr>
                <td width="90"><strong>19:00 – 22:00</strong></td>
                <td>
                    <strong>Sherpa Reception and Dinner</strong>
                </td>
            </tr>

            <tr>
                <td class="ff_head" style="padding-bottom:8px; padding-top:10px;" colspan="3">May 26, 2014</td>
            </tr>
            <tr>
                <td width="90"><strong>09:00 – 12:00</strong></td>
                <td>
                    <strong>Management Committee</strong>
                </td>
            </tr>
            <tr>
                <td width="90"><strong>13:00 – 14:30</strong></td>
                <td>
                    <strong>Lunch</strong>
                </td>
            </tr>
            <tr>
                <td width="90"><strong>14:30 – 15:30</strong></td>
                <td>
                    <strong>Chairmen Cocktail </strong>
                </td>
            </tr>
            <tr>
                <td width="90"><strong>16:00 – 16:20</strong></td>
                <td>
                    <strong>GEI presentation</strong>
                </td>
            </tr>
            <tr>
                <td width="90"><strong>16:20 – 17:40</strong></td>
                <td>
                    <strong>Session 1</strong>
                </td>
            </tr>
            <tr>
                <td width="90"><strong>19:00 – 22:00</strong></td>
                <td>
                    <strong>Chairmen Reception and  Dinner</strong>
                </td> 
            </tr>
            <tr>
                <td class="ff_head" style="padding-bottom:8px; padding-top:10px;" colspan="3">May 27, 2014</td>
            </tr>
            <tr>
                <td width="90"><strong>09:00 – 11:00</strong></td>
                <td>
                    <strong>Board of Directors</strong>
                </td>
            </tr>
            <tr>
                <td width="90"><strong>11:20 – 13:20</strong></td>
                <td>
                    <strong>Plenary Session 2</strong>
                </td>
            </tr>
            <tr>
                <td width="90"><strong>13:30 – 15:00</strong></td>
                <td>
                    <strong>Summit Lunch</strong>
                </td>
            </tr>
            <tr>
                <td width="90"><strong>15:00 – 16:30</strong></td>
                <td>
                    <strong>Session 3</strong>
                </td>
            </tr>
            <tr>
                <td width="90" style="vertical-align:top"><strong>17:00 – 18:15</strong></td>
                <td>
                    <strong>Session 4</strong>
                </td>
            </tr>
            <tr>
                <td width="90" style="vertical-align:top"><strong>18:15 – 18:45</strong></td>
                <td>
                    <strong>Transfer of Chairmanship</strong>
                </td>
            </tr>
            <tr>
                <td width="90"><strong>20:00 – 24:00</strong></td>
                <td>
                    <strong>Reception and Summit Dinner</strong>
                </td>
            </tr>
            <tr>
                <td class="ff_head" style="padding-bottom:8px; padding-top:10px;" colspan="3">May 28, 2014</td>
            </tr>
            <tr>
                <td width="90"><strong>10:00 – 15:00</strong></td>
                <td>
                    <strong>Cultural Program (incl. lunch)</strong>
                </td>
            </tr>
        </table>
    </div>
    <br>
    <strong>Please do not forget to reserve your hotel as prompted by the system at the "Hotel Information & Reservation Process” page.</strong> <br><br>

    We encourage you to book your hotel by means of this form in order to take advantage of our preferential group rate and rooms’ reservation.

    <br><br><br>

</div>

<div data-bind="visible: currentScreenIndex() === 6">
    <div data-bind="visible: sending">Form is sending, please wait<span data-bind="visible: timeout()"> or <a href="#" data-bind="click: sendForm">try again</a></span>...</div>
    <div data-bind="visible: error() && !sending()">An error occured. Please <a href="#" data-bind="click: sendForm">try again</a>.</div>
    <div data-bind="visible: !error() && !sending()">
        <strong>Form is sent. Thank you.</strong>
        <p><br></p><p><br></p>
        <h2>Reservation Process</h2>
        <p><br></p>
        <table class="coolTable">
            <tr>
                <td width="200"><strong>Deluxe SGL / DBL </strong></td>
                <td>10 000 / 11 000 RUB/da</td>
            </tr>
            <tr class="tr_tbl_bg">
                <td><strong>Suite SGL / DBL</strong></td>
                <td>20 000 / 21 000 RUB/da</td>
            </tr>
        </table>
        <p>Moscow </p>
        <p>
          <br />
        </p> 
        <p>Radisson Royal Hotel</p>
        <p> </p>
        <p>2/1 Building 1, Kutuzovsky Prospect Moscow, Russia
          <br />
        </p>
        <p><br></p>
        <p><b>Please complete the form in the attached document below and return it to the hotel by 1, May,2014 to fax + 7 (495) 411 0025 or E-mail: </b><a href="mailto:groups.royal.moscow@radisson-hotels.ru" class="email-noimg">groups.royal.moscow@radisson-hotels.ru</a></p>
        <p><br></p>
        <p> Tel. : + 7 (495) 221 5555 </p>
        <p><br></p>
        <table cellspacing="0" cellpadding="0" border="0" align="justify" class="mceItemTable"> 
          <tbody> 
            <tr> <td style="border-image: none;"><img src="http://www.rushydro.ru/pic/icon_doc.gif" alt="icon"></td> <td style="padding-left: 10px; border-image: none;"> 
          
                <div><a target="_blank" href="http://www.eng.rushydro.ru/upload/iblock/bca/BOOKING-FORM-ENG.doc">Booking form</a></div>
               </td></tr>
           </tbody>
         </table>
    </div>
    <br/>
    <div class="form_gsep_btns"> <a class="btn_sbmt" href=""><i></i><span>« Back</span></a> </div>
</div>

<div data-bind="visible: currentScreenIndex() < 6" class="form_gsep_btns">
    <div class="btn_sbmt btn-dir" data-direction="prev" data-bind="visible: hasPrevScreen()" style="margin-right:20px;"><i></i><span>&laquo; Back</span></div>
    <div class="btn_sbmt btn-dir" data-direction="next" data-bind="css: { 'disabled': !(hasNextScreen() && validate()) }"><i></i><span data-bind="html: currentScreenIndex() < 5 ? 'Forward &raquo;' : 'Send'"></span></div>
</div>

<script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/knockout/knockout-2.2.1.js"></script>
<script type="text/javascript">
$(function() {

    function ViewModel() {
        var self = this,

        jqxhr = null,
        timeout = null,

        form = $('#gsep_form'),

        screenStack = [0],
        screens = [
            // screen 1
            {
                fields: [
                    'appeal', 
                    'firstName', 
                    'lastName', 
                    'email', 
                    'company', 
                    'phone', 
                   // 'fax', 
                    'celluar', 
                    'contactPerson',
                    'contactPhone',
                    'contactEmail'
                ]
            }, 
            // screen 2
            {
                fields: [
                    /*'event1', 
                    'event2', 
                    'event3', 
                    'event4', 
                    'event11', 
                    'event5', 
                    'event6', 
                    'event7', 
                    'event8', 
                    'event9', 
                    'event10', 
                    'event11', 
                    'event12', 
                    'event13'*/
                ]
            },
            // screen 3
            {
                fields: []
            },
            // screen 4
            {
                fields: [
                    /*'arrivingFrom', 
                    'arrivalDate', 
                    'arrivalFlightNumber', 
                    'arrivalTime', 
                    'departingTo', 
                    'departureDate', 
                    'departureFlightNumber', 
                    'departureTime'*/
                ]
            },
            // screen 5
            {
                fields: [
                    /*'guestEvent1', 
                    'guestEvent2', 
                    'guestEvent3', 
                    'guestEvent4', 
                    'guestEvent5', 
                    'guestEvent6', 
                    'guestEvent7', 
                    'guestEvent8', 
                    'guestEvent9', 
                    'guestEvent10', 
                    'guestEvent11', 
                    'guestEvent12', 
                    'guestEvent13'*/
                ],

                preValidateCallback: function() {
                    if (self.guests().length === 0) return true;

                    for (var i = 0; i < self.guests().length; i++) {
                        if (!self.guests()[i].firstName() || !self.guests()[i].lastName()) return false;
                    }
                    return null;
                }
            },
            // screen 6
            {}, 
            // screen 7
            {
                postValidateCallback: function() {
                    return false;
                },
                loadCallback: function() {
                    self.sendForm();
                }
            }
        ],

        serializableFields = [
            'appeal', 'firstName', 'lastName', 'email', 'company', 'phone', /*'fax',*/ 'celluar', 'contactPerson', 'contactEmail', 'contactPhone',
                        
           /* 'event1',  'event2',  'event3',  'event4',  'event5',
            'event6',  'event7',  'event8',  'event9',  'event10',
            'event11', 'event12', 'event13',*/
            
            'allergies', 
            
            'arrivingFrom', 'arrivalDate', 'arrivalFlightNumber', 'arrivalTime', 'departingTo', 'departureDate', 'departureFlightNumber', 'departureTime', 
            
            'guests',

            /*'guestEvent1',  'guestEvent2',  'guestEvent3',  'guestEvent4',  'guestEvent5', 
            'guestEvent6',  'guestEvent7',  'guestEvent8',  'guestEvent9',  'guestEvent10', 
            'guestEvent11', 'guestEvent12', 'guestEvent13',*/

            'rooms'
        ];

        this.currentScreenIndex = ko.observable(0);

        this.appeal = ko.observable();
        this.firstName = ko.observable();
        this.lastName = ko.observable();
        this.email = ko.observable();
        this.company = ko.observable();
        this.phone = ko.observable();
        this.fax = ko.observable();
        this.celluar = ko.observable();
        this.contactPerson = ko.observable();
        this.contactEmail = ko.observable();
        this.contactPhone = ko.observable();

        /*for (var i = 1; i <= 12; i++) {
            this['event'+i] = ko.observable('no answer');
            this['guestEvent'+i] = ko.observable('no answer');
        }*/

        this.allergies = ko.observable();

        this.arrivingFrom = ko.observable();
        this.arrivalDate = ko.observable();
        this.arrivalFlightNumber = ko.observable();
        this.arrivalTime = ko.observable();

        this.departingTo = ko.observable();
        this.departureDate = ko.observable();
        this.departureFlightNumber = ko.observable();
        this.departureTime = ko.observable();

        this.guests = ko.observableArray();
        this.rooms = ko.observableArray();

        this.sending = ko.observable(false);
        this.error = ko.observable(false);

        this.hasPrevScreen = ko.computed(function() {
            return self.currentScreenIndex() > 0;
        });

        this.hasNextScreen = ko.computed(function() {
            return self.currentScreenIndex() < screens.length;
        });

        this.validate = ko.computed(function() {
            if (typeof screens[self.currentScreenIndex()] === 'undefined') return true;

            var fields = screens[self.currentScreenIndex()].fields || [], 
                preCallback = screens[self.currentScreenIndex()].preValidateCallback || null,
                postCallback = screens[self.currentScreenIndex()].postValidateCallback || null,
                i;

            if (preCallback) {
                var r = preCallback();
                if (r === false || r === true) return r;
            }

            for (i = 0; i < fields.length; i++) {
                if (!self[fields[i]]()) return false;
            }

            if (postCallback) return postCallback();

            return true;
        });

        this.next = function() {
            if (self.validate() && self.hasNextScreen()) {
                nextScreenIndex = 
                    (typeof screens[self.currentScreenIndex()].nextScreenCallback === 'function')
                        ? screens[self.currentScreenIndex()].nextScreenCallback()
                        : (self.currentScreenIndex() + 1);

                screenStack.push(nextScreenIndex);
                self.currentScreenIndex(nextScreenIndex);

                if (typeof screens[nextScreenIndex].loadCallback === 'function') {
                    screens[nextScreenIndex].loadCallback();
                }
            }
            $(window).scrollTop(165);
        };

        this.prev = function() {
            if (self.hasPrevScreen()) {
                screenStack.pop();
                self.currentScreenIndex(screenStack[screenStack.length - 1]);
            }
            $(window).scrollTop(165);
        };

        this.addGuest = function() {
            self.guests.push({
                firstName: ko.observable(),
                lastName: ko.observable()
            });
        };

        this.removeGuest = function(guest) {
            self.guests.remove(guest);
        };

        this.addRoom = function() {
            self.rooms.push({
                firstName: ko.observable(),
                lastName: ko.observable(),
                checkIn: ko.observable(),
                checkOut: ko.observable(),
                type: ko.observable(),
                category: ko.observable()
            });
        };

        this.removeRoom = function(room) {
            self.rooms.remove(room);
        };

        this.toObject = function() {
            var object = {}, i;
            for (i = 0; i < serializableFields.length; i++) {
                object[serializableFields[i]] = self[serializableFields[i]]();
            }

            return object;
        };

        this.timeout = ko.observable(false);

        this.sendForm = function() {
            if (timeout) {
                clearTimeout(timeout);
            }

            if (self.sending() && jqxhr) {
                jqxhr.abort();
            }

            timeout = setTimeout(function() {
                self.timeout(true);
            }, 15000);

            self.timeout(false);
            self.sending(true);
            jqxhr = $.ajax({
                type: form.attr('method'),
                url: form.attr('action'),
                dataType: 'html',
                data: self.toObject()
            }).success(function() {
                self.error(false);
            }).error(function() {
                self.error(true);
            }).complete(function() {
                self.sending(false);
            });
        };
    }

    window.vm = new ViewModel();
    ko.applyBindings(vm);

    $('.btn-dir').click(function(e) {
        e.preventDefault();
        vm[$(this).data('direction')]();
    });
});
</script>