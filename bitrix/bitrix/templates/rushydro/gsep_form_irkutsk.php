<a href="../" ><img src="/upload/medialibrary/e50/gsep-mini.jpg" border="0" align="right" width="200" height="50" style="margin-top:-62px; margin-right:5px;"  /> </a> 
<table data-bind="visible: currentScreenIndex() < 7" width="100%" class="form_gsep_nav">
    <tr>
        <td><div class="first" style="z-index:6;" data-bind="css: { 'act': currentScreenIndex() === 0, 'prev': currentScreenIndex() > 0 }">step 1<i></i></div></td>
        <td><div style="z-index:5;" data-bind="css: { 'act': currentScreenIndex() === 1, 'prev': currentScreenIndex() > 1 }">step 2<i></i></div></td>
        <td><div style="z-index:4;" data-bind="css: { 'act': currentScreenIndex() === 2, 'prev': currentScreenIndex() > 2 }">step 3<i></i></div></td>
        <td><div style="z-index:3;" data-bind="css: { 'act': currentScreenIndex() === 3, 'prev': currentScreenIndex() > 3 }">step 4<i></i></div></td>
        <td><div style="z-index:2;" data-bind="css: { 'act': currentScreenIndex() === 4, 'prev': currentScreenIndex() > 4 }">step 5<i></i></div></td>
        <td><div style="z-index:1;" data-bind="css: { 'act': currentScreenIndex() === 5, 'prev': currentScreenIndex() > 5 }">step 6<i></i></div></td>
        <td><div class="last" data-bind="css: { 'act': currentScreenIndex() === 6, 'prev': currentScreenIndex() > 6 }">step 7</div></td>
        <!--td><div style="z-index:1;" data-bind="css: { 'act': currentScreenIndex() === 6, 'prev': currentScreenIndex() > 6 }">step 7<i></i></div></td>
        <td><div class="last" data-bind="css: { 'act': currentScreenIndex() === 7, 'prev': currentScreenIndex() > 7 }">step 8</div></td-->
    </tr>
</table>
<form id="gsep_form" action="/gsep_form_irkutsk.php" method="POST">
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
        <h2>What committees do you plan to attend?</h2>
        <br/>
        <p style="margin-right:10px; padding-bottom:15px; border-bottom:1px solid #efefef;"><strong>All fields are mandatory.</strong></p>
        <br>
        <table width="50%" class="form_feedback form_gsep">
            <tr>
                <td class="ff_head">Management Committee Meeting</td>
            </tr>
            <tr>
                <td> 
                    <div style="margin-bottom:5px;"><label><input name="comManagement" type="radio" value="Yes" data-bind="checked: comManagement"> Yes</label></div>
                    <label><input name="comManagement" type="radio" value="No" data-bind="checked: comManagement"> No</label>
                </td>
            </tr>
            <tr>
                <td class="ff_head">Project Committee Meeting</td>
            </tr>
            <tr>
                <td> 
                    <div style="margin-bottom:5px;"><label><input name="comProject" type="radio" value="Yes" data-bind="checked: comProject"> Yes</label></div>
                    <label><input name="comProject" type="radio" value="No" data-bind="checked: comProject"> No</label>
                </td>
            </tr>
            <tr>
                <td class="ff_head">Policy Committee Meeting</td>
            </tr>
            <tr>
                <td> 
                    <div style="margin-bottom:5px;"><label><input name="comPolicy" type="radio" value="Yes" data-bind="checked: comPolicy"> Yes</label></div>
                    <label><input name="comPolicy" type="radio" value="No" data-bind="checked: comPolicy"> No</label>
                </td>
            </tr>
        </table>
    </div>

    <div data-bind="visible: currentScreenIndex() === 2">
        <h2>Cultural Program</h2>
        <table width="100%" class="form_feedback form_gsep">
            <tr>
                <td class="ff_head" style="padding-bottom:8px; padding-top:10px;" colspan="3">March 23, 2014</td>
            </tr>
            <tr>
                <td> 
                    Arrival                    
                </td>
            </tr>
            <tr>
                <td> 
                    <table width="100%">
                        <tr>
                            <td width="90"><strong>19:00 – 22:00</strong></td>
                            <td>
                                <div style="margin-bottom:6px;"><strong>Reception.  Jointly for Participants and Guests</strong></div>
                            </td>
                        </tr>
                    </table>                    
                </td>
            </tr>

            <tr>
                <td class="ff_head" style="padding-bottom:8px; padding-top:10px;" colspan="3">March 24, 2014</td>
            </tr>
            <tr>
                <td> 
                    <table width="100%">
                        <tr>
                            <td width="90"><strong>09:30 - 12:00</strong></td>
                            <td>
                                <div style="margin-bottom:6px;">
                                    <strong>Sightseeing tour of Irkutsk</strong><br/>             
                                    the Spasskaya (Saviour's) Church, the oldest church in Irkutsk and Siberia, the 
                                    monument to Tsar Alexander III, who oversaw the construction of 
                                    the Trans-Siberian Railway, and the sightseeing tour of the Angara River 
                                    banks, the only river flowing from the world's deepest lake, Baikal.
                                </div>
                                <div><label><input name="event1" type="radio" value="yes" data-bind="checked: event1"> yes</label><label><input name="event1" type="radio" value="no" data-bind="checked: event1"> no</label></div>
                            </td>
                        </tr>
                    </table>  
                </td>
            </tr>
            <tr>
                <td> 
                    <table width="100%">
                        <tr>
                            <td width="90"><strong>12:30 - 15:00</strong></td>
                            <td>
                                <div style="margin-bottom:6px;">
                                    <strong>Visit to a Russian family</strong><br>
                                    for a lunch and getting to know farming and daily life (A 26 km ride on the Baikal Tract/Route).

                                </div>
                                <div><label><input name="event2" type="radio" value="yes" data-bind="checked: event2"> yes</label><label><input name="event2" type="radio" value="no" data-bind="checked: event2"> no</label></div>
                            </td>
                        </tr>
                    </table> 
                </td>
            </tr>
            <tr>
                <td> 
                    <table width="100%">
                        <tr>
                            <td width="90"><strong>15:00 - 16:00</strong></td>
                            <td>
                                <div style="margin-bottom:6px;">
                                    <strong>Tour of a Siberian Zaimka (Lodge), a troika ride</strong><br/>
                                    Here you will have an opportunity to ride across a frozen bay and along a forest road in a traditional wooden sleigh harnessed to a troika (3 horses).
                                </div>
                                <div><label><input name="event3" type="radio" value="yes" data-bind="checked: event3"> yes</label><label><input name="event3" type="radio" value="no" data-bind="checked: event3"> no</label></div>
                            </td>
                        </tr>
                    </table> 
                </td>
            </tr>
            <tr>
                <td> 
                    <table width="100%">
                        <tr>
                            <td width="90"><strong>17:00 - 18:00</strong></td>
                            <td>
                                <div style="margin-bottom:6px;">
                                    <strong>Visit to the Krestovozdvizhensky church bell tower</strong><br>
                                    Meet with a bell ringer, participate in  evening ringing
                                </div>
                                <div><label><input name="event4" type="radio" value="yes" data-bind="checked: event4"> yes</label><label><input name="event4" type="radio" value="no" data-bind="checked: event4"> no</label></div>
                            </td>
                        </tr>
                    </table> 
                </td>  
            </tr>
            <tr>
                <td> 
                    <table width="100%">
                        <tr>
                            <td width="90"><strong>19:00 – 22:00</strong></td>
                            <td>
                                <div style="margin-bottom:6px;">
                                    <strong>Dinner at the Restaurant. Jointly for Participants and Guests</strong>
                                </div>
                                <div><label><input name="event5" type="radio" value="yes" data-bind="checked: event5"> yes</label><label><input name="event5" type="radio" value="no" data-bind="checked: event5"> no</label></div>
                            </td>
                        </tr>
                    </table> 
                </td>  
            </tr>
            <tr>
                <td class="ff_head" style="padding-bottom:8px; padding-top:10px;" colspan="3">March 25, 2014</td>
            </tr>
            <tr>
                <td> 
                    <table width="100%">
                        <tr>
                            <td width="90"><strong>9:30 - 12:30</strong></td>
                            <td>
                                <div style="margin-bottom:6px;">
                                    <strong>Visit to the Znamensky cathedral, the Trubetsky museum.</strong> <br/>
                                    The Cathedral, in addition to its rich and original iconostasis, is famous for being the   final resting  place of the Decembrists  Mukhanov, Beschasnov, Princess Trubetskaya   and the  "Russian Christopher Columbus" Grigory Shelikhov.
                                </div>
                                <div><label><input name="event6" type="radio" value="yes" data-bind="checked: event6"> yes</label><label><input name="event6" type="radio" value="no" data-bind="checked: event6"> no</label></div>
                            </td>
                        </tr>
                    </table> 
                </td>
            </tr>
            <tr>
                <td> 
                    <table width="100%">
                        <tr>
                            <td width="90"><strong>12:30 - 15:30 </strong></td>
                            <td>
                                <div style="margin-bottom:6px;">
                                    <strong>Lunch</strong><br>
                                    Visit to a culinary studio involving a master class by famous Irkutsk chef in traditional  Siberian cuisine. Lunch of prepared dishes.
                                </div>
                                <div><label><input name="event7" type="radio" value="yes" data-bind="checked: event7"> yes</label><label><input name="event7" type="radio" value="no" data-bind="checked: event7"> no</label></div>
                            </td>
                        </tr>
                    </table> 
                </td>
            </tr>
            <tr>
                <td> 
                    <table width="100%">
                        <tr>
                            <td width="90"><strong>16:00 - 17:30</strong></td>
                            <td>
                                <div style="margin-bottom:6px;">
                                    <strong>Visit to the Irkutsk Regional Historic Memorial Museum  "Volkonsky house".  </strong>
                                    <br>
                                    Musical  program. <br>
                                    The home of the Decembrist Sergey Volkonsky is part of the Irkutsk Regional Historic Memorial Museum.  The home and estate of Sergey Volkonsky is a unique example of Irkutsk culture. The traditions and daily life of the noble Volkonsky family is  presented in the restored historical interiors of the house, which contains the unique personal items of the Decembrists. In the  lifetime of Princess Maria Volkonskaya, the house was the center of the city's cultural   life: it was the venue for balls, theatrical   performances and musical evenings. 
                                </div>
                                <div><label><input name="event8" type="radio" value="yes" data-bind="checked: event8"> yes</label><label><input name="event8" type="radio" value="no" data-bind="checked: event8"> no</label></div>
                            </td>
                        </tr>
                    </table> 
                </td>
            </tr>
            <tr>
                <td> 
                    <table width="100%">
                        <tr>
                            <td width="90"><strong>19:30 - 22:00</strong></td>
                            <td>
                                <div style="margin-bottom:6px;">
                                    <strong>Dinner at the  Restaurant. Jointly for Participants and Guests</strong>
                                </div>
                                <div><label><input name="event9" type="radio" value="yes" data-bind="checked: event9"> yes</label><label><input name="event9" type="radio" value="no" data-bind="checked: event9"> no</label></div>
                            </td>
                        </tr>
                    </table> 
                </td>
            </tr>
            <tr>
                <td class="ff_head" style="padding-bottom:8px; padding-top:10px;" colspan="3">March 26, 2014</td>
            </tr>
            <tr>
                <td> 
                    <table width="100%">
                        <tr>
                            <td width="90"><strong>8:30 - 22:00 </strong></td>
                            <td>
                                <div style="margin-bottom:6px;">
                                    <strong>Day tour of Baikal for all participants and guests ( including dinner)</strong>
                                </div>
                                <div><label><input name="event10" type="radio" value="yes" data-bind="checked: event10"> yes</label><label><input name="event10" type="radio" value="no" data-bind="checked: event10"> no</label></div>
                            </td>
                        </tr>
                    </table> 
                </td>
            </tr>
            <tr>
                <td class="ff_head" style="padding-bottom:8px; padding-top:10px;" colspan="3">March 27, 2014</td>
            </tr>
            <tr>
                <td> 
                    <table width="100%">
                        <tr>
                            <td width="90"><strong>9:30 - 17:30</strong></td>
                            <td>
                                <div style="margin-bottom:6px;">
                                    <strong>Visit to the administrative and cultural center of Buryat okrug (district), Ust-Ordynsky ( located 60 km from Irkutsk)</strong>
                                    <br/>Attendance at morning prayers in a Datsan (Buddhist temple), meeting the lama and talking about the temple background and the history of Buddhism in the Baikal region. <br>
                                    <strong>Visit to the National Museum of Buryatia </strong> founded in 1944 and  narrating the story of the region's history, culture and religion from  ancient times up to this day. The  museum also includes the open-air Buryat Estate complex.
                                </div>
                            </td>
                        </tr>
                    </table> 
                </td>
            </tr>
            <tr>
                <td> 
                    <table width="100%">
                        <tr>
                            <td width="90"><strong>12:30 - 15:30</strong></td>
                            <td>
                                <div style="margin-bottom:6px;">
                                    <strong>Lunch of ethnic Buryat cuisine:</strong> salamat, pozi, noodle soup, green tea with milk, and shangi in a <strong>yurt café</strong>.
                                </div>
                            </td>
                        </tr>
                    </table> 
                </td>
            </tr>
            <tr>
                <td> 
                    <table width="100%">
                        <tr>
                            <td width="90"><strong>16:00 - 17:30</strong></td>
                            <td>
                                <div style="margin-bottom:6px;">
                                    <strong>Return to the hotel in Irkutsk</strong>
                                </div>
                                <div><label><input name="event11" type="radio" value="yes" data-bind="checked: event11"> yes</label><label><input name="event11" type="radio" value="no" data-bind="checked: event11"> no</label></div>
                            </td>
                        </tr>
                    </table> 
                </td>
            </tr>
            <tr>
                <td> 
                    <table width="100%">
                        <tr>
                            <td width="90"><strong>19:30 - 22:00 </strong></td>
                            <td>
                                <div style="margin-bottom:6px;">
                                    <strong>Dinner at the  Restaurant. Jointly for Participants and Guests</strong>
                                </div>
                                <div><label><input name="event12" type="radio" value="yes" data-bind="checked: event12"> yes</label><label><input name="event12" type="radio" value="no" data-bind="checked: event12"> no</label></div>
                            </td>
                        </tr>
                    </table> 
                </td>
            </tr>
            <tr>
                <td class="ff_head" style="padding-bottom:8px; padding-top:10px;" colspan="3">March 28, 2014</td>
            </tr>
            <tr>
                <td> 
                    <table width="100%">
                        <tr>
                            <td width="90"><strong>9:00 - 12:20</strong></td>
                            <td>
                                <div style="margin-bottom:6px;">
                                    <strong>Free time</strong>
                                </div>
                            </td>
                        </tr>
                    </table> 
                </td>
            </tr>
            <tr>
                <td> 
                    <table width="100%">
                        <tr>
                            <td width="90"><strong>12:20</strong></td>
                            <td>
                                <div style="margin-bottom:6px;">
                                    <strong>Lunch. Jointly for Participants and Guests</strong>
                                </div>
                                <div><label><input name="event13" type="radio" value="yes" data-bind="checked: event13"> yes</label><label><input name="event13" type="radio" value="no" data-bind="checked: event13"> no</label></div>
                            </td>
                        </tr>
                    </table> 
                </td>
            </tr>
        </table>
    </div>

    <div data-bind="visible: currentScreenIndex() === 3">
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

    <div data-bind="visible: currentScreenIndex() === 4">
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

    <div data-bind="visible: currentScreenIndex() === 5">
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
                <td class="ff_head" style="padding-bottom:8px; padding-top:10px;" colspan="3">March 23, 2014</td>
            </tr>
            <tr>
                <td> 
                    Arrival                    
                </td>
            </tr>
            <tr>
                <td> 
                    <table width="100%">
                        <tr>
                            <td width="90"><strong>19:00 – 22:00</strong></td>
                            <td>
                                <div style="margin-bottom:6px;"><strong>Reception.  Jointly for Participants and Guests</strong></div>
                            </td>
                        </tr>
                    </table>                    
                </td>
            </tr>

            <tr>
                <td class="ff_head" style="padding-bottom:8px; padding-top:10px;" colspan="3">March 24, 2014</td>
            </tr>
            <tr>
                <td> 
                    <table width="100%">
                        <tr>
                            <td width="90"><strong>09:30 - 12:00</strong></td>
                            <td>
                                <div style="margin-bottom:6px;">
                                    <strong>Sightseeing tour of Irkutsk</strong><br/>             
                                    the Spasskaya (Saviour's) Church, the oldest church in Irkutsk and Siberia, the 
                                    monument to Tsar Alexander III, who oversaw the construction of 
                                    the Trans-Siberian Railway, and the sightseeing tour of the Angara River 
                                    banks, the only river flowing from the world's deepest lake, Baikal.
                                </div>
                                <div><label><input name="guestEvent1" type="radio" value="yes" data-bind="checked: guestEvent1"> yes</label><label><input name="guestEvent1" type="radio" value="no" data-bind="checked: guestEvent1"> no</label></div>
                            </td>
                        </tr>
                    </table>  
                </td>
            </tr>
            <tr>
                <td> 
                    <table width="100%">
                        <tr>
                            <td width="90"><strong>12:30 - 15:00</strong></td>
                            <td>
                                <div style="margin-bottom:6px;">
                                    <strong>Visit to a Russian family</strong><br>
                                    for a lunch and getting to know farming and daily life (A 26 km ride on the Baikal Tract/Route).

                                </div>
                                <div><label><input name="guestEvent2" type="radio" value="yes" data-bind="checked: guestEvent2"> yes</label><label><input name="guestEvent2" type="radio" value="no" data-bind="checked: guestEvent2"> no</label></div>
                            </td>
                        </tr>
                    </table> 
                </td>
            </tr>
            <tr>
                <td> 
                    <table width="100%">
                        <tr>
                            <td width="90"><strong>15:00 - 16:00</strong></td>
                            <td>
                                <div style="margin-bottom:6px;">
                                    <strong>Tour of a Siberian Zaimka (Lodge), a troika ride</strong><br/>
                                    Here you will have an opportunity to ride across a frozen bay and along a forest road in a traditional wooden sleigh harnessed to a troika (3 horses).
                                </div>
                                <div><label><input name="guestEvent3" type="radio" value="yes" data-bind="checked: guestEvent3"> yes</label><label><input name="guestEvent3" type="radio" value="no" data-bind="checked: guestEvent3"> no</label></div>
                            </td>
                        </tr>
                    </table> 
                </td>
            </tr>
            <tr>
                <td> 
                    <table width="100%">
                        <tr>
                            <td width="90"><strong>17:00 - 18:00</strong></td>
                            <td>
                                <div style="margin-bottom:6px;">
                                    <strong>Visit to the Krestovozdvizhensky church bell tower</strong><br>
                                    Meet with a bell ringer, participate in  evening ringing
                                </div>
                                <div><label><input name="guestEvent4" type="radio" value="yes" data-bind="checked: guestEvent4"> yes</label><label><input name="guestEvent4" type="radio" value="no" data-bind="checked: guestEvent4"> no</label></div>
                            </td>
                        </tr>
                    </table> 
                </td>  
            </tr>
            <tr>
                <td> 
                    <table width="100%">
                        <tr>
                            <td width="90"><strong>19:00 – 22:00</strong></td>
                            <td>
                                <div style="margin-bottom:6px;">
                                    <strong>Dinner at the Restaurant. Jointly for Participants and Guests</strong>
                                </div>
                                <div><label><input name="guestEvent5" type="radio" value="yes" data-bind="checked: guestEvent5"> yes</label><label><input name="guestEvent5" type="radio" value="no" data-bind="checked: guestEvent5"> no</label></div>
                            </td>
                        </tr>
                    </table> 
                </td>  
            </tr>
            <tr>
                <td class="ff_head" style="padding-bottom:8px; padding-top:10px;" colspan="3">March 25, 2014</td>
            </tr>
            <tr>
                <td> 
                    <table width="100%">
                        <tr>
                            <td width="90"><strong>9:30 - 12:30</strong></td>
                            <td>
                                <div style="margin-bottom:6px;">
                                    <strong>Visit to the Znamensky cathedral, the Trubetsky museum.</strong> <br/>
                                    The Cathedral, in addition to its rich and original iconostasis, is famous for being the   final resting  place of the Decembrists  Mukhanov, Beschasnov, Princess Trubetskaya   and the  "Russian Christopher Columbus" Grigory Shelikhov.
                                </div>
                                <div><label><input name="guestEvent6" type="radio" value="yes" data-bind="checked: guestEvent6"> yes</label><label><input name="guestEvent6" type="radio" value="no" data-bind="checked: guestEvent6"> no</label></div>
                            </td>
                        </tr>
                    </table> 
                </td>
            </tr>
            <tr>
                <td> 
                    <table width="100%">
                        <tr>
                            <td width="90"><strong>12:30 - 15:30 </strong></td>
                            <td>
                                <div style="margin-bottom:6px;">
                                    <strong>Lunch</strong><br>
                                    Visit to a culinary studio involving a master class by famous Irkutsk chef in traditional  Siberian cuisine. Lunch of prepared dishes.
                                </div>
                                <div><label><input name="guestEvent7" type="radio" value="yes" data-bind="checked: guestEvent7"> yes</label><label><input name="guestEvent7" type="radio" value="no" data-bind="checked: guestEvent7"> no</label></div>
                            </td>
                        </tr>
                    </table> 
                </td>
            </tr>
            <tr>
                <td> 
                    <table width="100%">
                        <tr>
                            <td width="90"><strong>16:00 - 17:30</strong></td>
                            <td>
                                <div style="margin-bottom:6px;">
                                    <strong>Visit to the Irkutsk Regional Historic Memorial Museum  "Volkonsky house".  </strong>
                                    <br>
                                    Musical  program. <br>
                                    The home of the Decembrist Sergey Volkonsky is part of the Irkutsk Regional Historic Memorial Museum.  The home and estate of Sergey Volkonsky is a unique example of Irkutsk culture. The traditions and daily life of the noble Volkonsky family is  presented in the restored historical interiors of the house, which contains the unique personal items of the Decembrists. In the  lifetime of Princess Maria Volkonskaya, the house was the center of the city's cultural   life: it was the venue for balls, theatrical   performances and musical evenings. 
                                </div>
                                <div><label><input name="guestEvent8" type="radio" value="yes" data-bind="checked: guestEvent8"> yes</label><label><input name="guestEvent8" type="radio" value="no" data-bind="checked: guestEvent8"> no</label></div>
                            </td>
                        </tr>
                    </table> 
                </td>
            </tr>
            <tr>
                <td> 
                    <table width="100%">
                        <tr>
                            <td width="90"><strong>19:30 - 22:00</strong></td>
                            <td>
                                <div style="margin-bottom:6px;">
                                    <strong>Dinner at the  Restaurant. Jointly for Participants and Guests</strong>
                                </div>
                                <div><label><input name="guestEvent9" type="radio" value="yes" data-bind="checked: guestEvent9"> yes</label><label><input name="guestEvent9" type="radio" value="no" data-bind="checked: guestEvent9"> no</label></div>
                            </td>
                        </tr>
                    </table> 
                </td>
            </tr>
            <tr>
                <td class="ff_head" style="padding-bottom:8px; padding-top:10px;" colspan="3">March 26, 2014</td>
            </tr>
            <tr>
                <td> 
                    <table width="100%">
                        <tr>
                            <td width="90"><strong>8:30 - 22:00 </strong></td>
                            <td>
                                <div style="margin-bottom:6px;">
                                    <strong>Day tour of Baikal for all participants and guests ( including dinner)</strong>
                                </div>
                                <div><label><input name="guestEvent10" type="radio" value="yes" data-bind="checked: guestEvent10"> yes</label><label><input name="guestEvent10" type="radio" value="no" data-bind="checked: guestEvent10"> no</label></div>
                            </td>
                        </tr>
                    </table> 
                </td>
            </tr>
            <tr>
                <td class="ff_head" style="padding-bottom:8px; padding-top:10px;" colspan="3">March 27, 2014</td>
            </tr>
            <tr>
                <td> 
                    <table width="100%">
                        <tr>
                            <td width="90"><strong>9:30 - 17:30</strong></td>
                            <td>
                                <div style="margin-bottom:6px;">
                                    <strong>Visit to the administrative and cultural center of Buryat okrug (district), Ust-Ordynsky ( located 60 km from Irkutsk)</strong>
                                    <br/>Attendance at morning prayers in a Datsan (Buddhist temple), meeting the lama and talking about the temple background and the history of Buddhism in the Baikal region. <br>
                                    <strong>Visit to the National Museum of Buryatia </strong> founded in 1944 and  narrating the story of the region's history, culture and religion from  ancient times up to this day. The  museum also includes the open-air Buryat Estate complex.
                                </div>
                            </td>
                        </tr>
                    </table> 
                </td>
            </tr>
            <tr>
                <td> 
                    <table width="100%">
                        <tr>
                            <td width="90"><strong>12:30 - 15:30</strong></td>
                            <td>
                                <div style="margin-bottom:6px;">
                                    <strong>Lunch of ethnic Buryat cuisine:</strong> salamat, pozi, noodle soup, green tea with milk, and shangi in a <strong>yurt café</strong>.
                                </div>
                            </td>
                        </tr>
                    </table> 
                </td>
            </tr>
            <tr>
                <td> 
                    <table width="100%">
                        <tr>
                            <td width="90"><strong>16:00 - 17:30</strong></td>
                            <td>
                                <div style="margin-bottom:6px;">
                                    <strong>Return to the hotel in Irkutsk</strong>
                                </div>
                                <div><label><input name="guestEvent11" type="radio" value="yes" data-bind="checked: guestEvent11"> yes</label><label><input name="guestEvent11" type="radio" value="no" data-bind="checked: guestEvent11"> no</label></div>
                            </td>
                        </tr>
                    </table> 
                </td>
            </tr>
            <tr>
                <td> 
                    <table width="100%">
                        <tr>
                            <td width="90"><strong>19:30 - 22:00 </strong></td>
                            <td>
                                <div style="margin-bottom:6px;">
                                    <strong>Dinner at the  Restaurant. Jointly for Participants and Guests</strong>
                                </div>
                                <div><label><input name="guestEvent12" type="radio" value="yes" data-bind="checked: guestEvent12"> yes</label><label><input name="guestEvent12" type="radio" value="no" data-bind="checked: guestEvent12"> no</label></div>
                            </td>
                        </tr>
                    </table> 
                </td>
            </tr>
            <tr>
                <td class="ff_head" style="padding-bottom:8px; padding-top:10px;" colspan="3">March 28, 2014</td>
            </tr>
            <tr>
                <td> 
                    <table width="100%">
                        <tr>
                            <td width="90"><strong>9:00 - 12:20</strong></td>
                            <td>
                                <div style="margin-bottom:6px;">
                                    <strong>Free time</strong>
                                </div>
                            </td>
                        </tr>
                    </table> 
                </td>
            </tr>
            <tr>
                <td> 
                    <table width="100%">
                        <tr>
                            <td width="90"><strong>12:20</strong></td>
                            <td>
                                <div style="margin-bottom:6px;">
                                    <strong>Lunch. Jointly for Participants and Guests</strong>
                                </div>
                                <div><label><input name="guestEvent13" type="radio" value="yes" data-bind="checked: guestEvent13"> yes</label><label><input name="guestEvent13" type="radio" value="no" data-bind="checked: guestEvent13"> no</label></div>
                            </td>
                        </tr>
                    </table> 
                </td>
            </tr>
        </table>
    </div>
</form>

<!--div data-bind="visible: currentScreenIndex() === 6">
        <h2>Reservation Process</h2>
        <br/>
        <table class="coolTable">
            <tr>
                <td width="200"><strong>Wonderful room</strong></td>
                <td>7 000 / 8 200 RUB/day</td>
            </tr>
            <tr class="tr_tbl_bg">
                <td><strong>Spectacular room</strong></td>
                <td>10 300 / 11 500 RUB/day</td>
            </tr>
            <tr>
                <td><strong>Fabulous room</strong></td>
                <td>11 400 / 12 500 RUB/day</td>
            </tr>
        </table>
        <br/>

        <div data-bind="foreach: rooms">
            <table width="100%" class="form_feedback form_gsep form_gsep_flight_reserve" style="margin-bottom:20px;">
                <tr>
                    <td class="ff_head">First name</td>
                    <td class="ff_head">Last name</td>
                    <td class="ff_head">Check-in</td>
                    <td class="ff_head">Check-out</td>
                    <td class="ff_head">Room</td>
                    <td class="ff_head">Category</td>
                </tr>
                <tr>
                    <td><div class="inp"><i></i><i class="lft"></i><input type="text" data-bind="value: $data.firstName, valueUpdate: 'afterkeydown'" class="inputtext" /></div></td>
                    <td><div class="inp"><i></i><i class="lft"></i><input type="text" data-bind="value: $data.lastName, valueUpdate: 'afterkeydown'" class="inputtext" /></div></td>
                    <td><div class="inp"><i></i><i class="lft"></i><input type="text" data-bind="value: $data.checkIn, valueUpdate: 'afterkeydown'" class="inputtext" /></div></td>
                    <td><div class="inp"><i></i><i class="lft"></i><input type="text" data-bind="value: $data.checkOut, valueUpdate: 'afterkeydown'" class="inputtext" /></div></td>
                    <td>
                        <div class="inp"><i></i><i class="lft"></i>
                        <select data-bind="value: $data.type">
                            <option value="Single room">Single room</option>
                            <option value="Double room">Double room</option>
                            <option value="Double room +">Double room +</option>
                        </select>
                        </div>
                    </td>
                    <td>
                        <div class="inp"><i></i><i class="lft"></i>
                        <select data-bind="value: $data.category">
                            <option value="Wonderful room">Wonderful room</option>
                            <option value="Spectacular room">Spectacular room</option>
                            <option value="Fabulous room">Fabulous room</option>
                        </select>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td colspan="6" align="center" style="padding-top:10px;"><div class="form_gsep_remove in-bl" data-bind="click: $parent.removeRoom">- Remove</div></td>
                </tr>
            </table>
        </div>
        <div class="form_gsep_add in-bl" data-bind="click: addRoom">+ add room</div>
        <br/>
        <br/>
    </div>
</form-->

<div data-bind="visible: currentScreenIndex() === 6">
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
            <td class="ff_head">Fax:</td>
            <td data-bind="html: fax"></td>
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
        <h2>What committees do you plan to attend?</h2><br>
        <table width="50%" class="form_feedback form_gsep">
            <tr>
                <td class="ff_head">Management Committee Meeting</td>
                <td data-bind="html: comManagement"></td>
            </tr>
            <tr>
                <td class="ff_head">Project Committee Meeting</td>
                <td data-bind="html: comProject"></td>
            </tr>
            <tr>
                <td class="ff_head">Policy Committee Meeting</td>
                <td data-bind="html: comPolicy"></td>
            </tr>
        </table>
    </div>

    <div style="padding-top:20px; border-top:1px solid #E5E5E5;">
        <h2>Cultural Program</h2><br>
        <table width="100%" class="form_feedback form_gsep">
            <tr>
                <td class="ff_head" style="padding-bottom:8px; padding-top:10px;" colspan="3">March 23, 2014</td>
            </tr>
            <tr>
                <td> 
                    Arrival                    
                </td>
            </tr>
            <tr>
                <td> 
                    <table width="100%">
                        <tr>
                            <td width="90"><strong>19:00 – 22:00</strong></td>
                            <td>
                                <div style="margin-bottom:6px;"><strong>Reception.  Jointly for Participants and Guests</strong></div>
                            </td>
                        </tr>
                    </table>                    
                </td>
            </tr>

            <tr>
                <td class="ff_head" style="padding-bottom:8px; padding-top:10px;" colspan="3">March 24, 2014</td>
            </tr>
            <tr>
                <td> 
                    <table width="100%">
                        <tr>
                            <td width="90"><strong>09:30 - 12:00</strong></td>
                            <td>
                                <div style="margin-bottom:6px;">
                                    <strong>Sightseeing tour of Irkutsk</strong><br/>             
                                    the Spasskaya (Saviour's) Church, the oldest church in Irkutsk and Siberia, the 
                                    monument to Tsar Alexander III, who oversaw the construction of 
                                    the Trans-Siberian Railway, and the sightseeing tour of the Angara River 
                                    banks, the only river flowing from the world's deepest lake, Baikal.
                                </div>
                                <div data-bind="html: event1" class="form_gsep_program-res in-bl"></div>
                            </td>
                        </tr>
                    </table>  
                </td>
            </tr>
            <tr>
                <td> 
                    <table width="100%">
                        <tr>
                            <td width="90"><strong>12:30 - 15:00</strong></td>
                            <td>
                                <div style="margin-bottom:6px;">
                                    <strong>Visit to a Russian family</strong><br>
                                    for a lunch and getting to know farming and daily life (A 26 km ride on the Baikal Tract/Route).

                                </div>
                                <div data-bind="html: event2" class="form_gsep_program-res in-bl"></div>
                            </td>
                        </tr>
                    </table> 
                </td>
            </tr>
            <tr>
                <td> 
                    <table width="100%">
                        <tr>
                            <td width="90"><strong>15:00 - 16:00</strong></td>
                            <td>
                                <div style="margin-bottom:6px;">
                                    <strong>Tour of a Siberian Zaimka (Lodge), a troika ride</strong><br/>
                                    Here you will have an opportunity to ride across a frozen bay and along a forest road in a traditional wooden sleigh harnessed to a troika (3 horses).
                                </div>
                                <div data-bind="html: event3" class="form_gsep_program-res in-bl"></div>
                            </td>
                        </tr>
                    </table> 
                </td>
            </tr>
            <tr>
                <td> 
                    <table width="100%">
                        <tr>
                            <td width="90"><strong>17:00 - 18:00</strong></td>
                            <td>
                                <div style="margin-bottom:6px;">
                                    <strong>Visit to the Krestovozdvizhensky church bell tower</strong><br>
                                    Meet with a bell ringer, participate in  evening ringing
                                </div>
                                <div data-bind="html: event4" class="form_gsep_program-res in-bl"></div>
                            </td>
                        </tr>
                    </table> 
                </td>  
            </tr>
            <tr>
                <td> 
                    <table width="100%">
                        <tr>
                            <td width="90"><strong>19:00 – 22:00</strong></td>
                            <td>
                                <div style="margin-bottom:6px;">
                                    <strong>Dinner at the Restaurant. Jointly for Participants and Guests</strong>
                                </div>
                                <div data-bind="html: event5" class="form_gsep_program-res in-bl"></div>
                            </td>
                        </tr>
                    </table> 
                </td>  
            </tr>
            <tr>
                <td class="ff_head" style="padding-bottom:8px; padding-top:10px;" colspan="3">March 25, 2014</td>
            </tr>
            <tr>
                <td> 
                    <table width="100%">
                        <tr>
                            <td width="90"><strong>9:30 - 12:30</strong></td>
                            <td>
                                <div style="margin-bottom:6px;">
                                    <strong>Visit to the Znamensky cathedral, the Trubetsky museum.</strong> <br/>
                                    The Cathedral, in addition to its rich and original iconostasis, is famous for being the   final resting  place of the Decembrists  Mukhanov, Beschasnov, Princess Trubetskaya   and the  "Russian Christopher Columbus" Grigory Shelikhov.
                                </div>
                                <div data-bind="html: event6" class="form_gsep_program-res in-bl"></div>
                            </td>
                        </tr>
                    </table> 
                </td>
            </tr>
            <tr>
                <td> 
                    <table width="100%">
                        <tr>
                            <td width="90"><strong>12:30 - 15:30 </strong></td>
                            <td>
                                <div style="margin-bottom:6px;">
                                    <strong>Lunch</strong><br>
                                    Visit to a culinary studio involving a master class by famous Irkutsk chef in traditional  Siberian cuisine. Lunch of prepared dishes.
                                </div>
                                <div data-bind="html: event7" class="form_gsep_program-res in-bl"></div>
                            </td>
                        </tr>
                    </table> 
                </td>
            </tr>
            <tr>
                <td> 
                    <table width="100%">
                        <tr>
                            <td width="90"><strong>16:00 - 17:30</strong></td>
                            <td>
                                <div style="margin-bottom:6px;">
                                    <strong>Visit to the Irkutsk Regional Historic Memorial Museum  "Volkonsky house".  </strong>
                                    <br>
                                    Musical  program. <br>
                                    The home of the Decembrist Sergey Volkonsky is part of the Irkutsk Regional Historic Memorial Museum.  The home and estate of Sergey Volkonsky is a unique example of Irkutsk culture. The traditions and daily life of the noble Volkonsky family is  presented in the restored historical interiors of the house, which contains the unique personal items of the Decembrists. In the  lifetime of Princess Maria Volkonskaya, the house was the center of the city's cultural   life: it was the venue for balls, theatrical   performances and musical evenings. 
                                </div>
                                <div data-bind="html: event8" class="form_gsep_program-res in-bl"></div>
                            </td>
                        </tr>
                    </table> 
                </td>
            </tr>
            <tr>
                <td> 
                    <table width="100%">
                        <tr>
                            <td width="90"><strong>19:30 - 22:00</strong></td>
                            <td>
                                <div style="margin-bottom:6px;">
                                    <strong>Dinner at the  Restaurant. Jointly for Participants and Guests</strong>
                                </div>
                                <div data-bind="html: event9" class="form_gsep_program-res in-bl"></div>
                            </td>
                        </tr>
                    </table> 
                </td>
            </tr>
            <tr>
                <td class="ff_head" style="padding-bottom:8px; padding-top:10px;" colspan="3">March 26, 2014</td>
            </tr>
            <tr>
                <td> 
                    <table width="100%">
                        <tr>
                            <td width="90"><strong>8:30 - 22:00 </strong></td>
                            <td>
                                <div style="margin-bottom:6px;">
                                    <strong>Day tour of Baikal for all participants and guests ( including dinner)</strong>
                                </div>
                                <div data-bind="html: event10" class="form_gsep_program-res in-bl"></div>
                            </td>
                        </tr>
                    </table> 
                </td>
            </tr>
            <tr>
                <td class="ff_head" style="padding-bottom:8px; padding-top:10px;" colspan="3">March 27, 2014</td>
            </tr>
            <tr>
                <td> 
                    <table width="100%">
                        <tr>
                            <td width="90"><strong>9:30 - 17:30</strong></td>
                            <td>
                                <div style="margin-bottom:6px;">
                                    <strong>Visit to the administrative and cultural center of Buryat okrug (district), Ust-Ordynsky ( located 60 km from Irkutsk)</strong>
                                    <br/>Attendance at morning prayers in a Datsan (Buddhist temple), meeting the lama and talking about the temple background and the history of Buddhism in the Baikal region. <br>
                                    <strong>Visit to the National Museum of Buryatia </strong> founded in 1944 and  narrating the story of the region's history, culture and religion from  ancient times up to this day. The  museum also includes the open-air Buryat Estate complex.
                                </div>
                            </td>
                        </tr>
                    </table> 
                </td>
            </tr>
            <tr>
                <td> 
                    <table width="100%">
                        <tr>
                            <td width="90"><strong>12:30 - 15:30</strong></td>
                            <td>
                                <div style="margin-bottom:6px;">
                                    <strong>Lunch of ethnic Buryat cuisine:</strong> salamat, pozi, noodle soup, green tea with milk, and shangi in a <strong>yurt café</strong>.
                                </div>
                            </td>
                        </tr>
                    </table> 
                </td>
            </tr>
            <tr>
                <td> 
                    <table width="100%">
                        <tr>
                            <td width="90"><strong>16:00 - 17:30</strong></td>
                            <td>
                                <div style="margin-bottom:6px;">
                                    <strong>Return to the hotel in Irkutsk</strong>
                                </div>
                                <div data-bind="html: event11" class="form_gsep_program-res in-bl"></div>
                            </td>
                        </tr>
                    </table> 
                </td>
            </tr>
            <tr>
                <td> 
                    <table width="100%">
                        <tr>
                            <td width="90"><strong>19:30 - 22:00 </strong></td>
                            <td>
                                <div style="margin-bottom:6px;">
                                    <strong>Dinner at the  Restaurant. Jointly for Participants and Guests</strong>
                                </div>
                                <div data-bind="html: event12" class="form_gsep_program-res in-bl"></div>
                            </td>
                        </tr>
                    </table> 
                </td>
            </tr>
            <tr>
                <td class="ff_head" style="padding-bottom:8px; padding-top:10px;" colspan="3">March 28, 2014</td>
            </tr>
            <tr>
                <td> 
                    <table width="100%">
                        <tr>
                            <td width="90"><strong>9:00 - 12:20</strong></td>
                            <td>
                                <div style="margin-bottom:6px;">
                                    <strong>Free time</strong>
                                </div>
                            </td>
                        </tr>
                    </table> 
                </td>
            </tr>
            <tr>
                <td> 
                    <table width="100%">
                        <tr>
                            <td width="90"><strong>12:20</strong></td>
                            <td>
                                <div style="margin-bottom:6px;">
                                    <strong>Lunch. Jointly for Participants and Guests</strong>
                                </div>
                                <div data-bind="html: event13" class="form_gsep_program-res in-bl"></div>
                            </td>
                        </tr>
                    </table> 
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

        <br><h2>Cultural Program</h2><br>
        <table width="100%" class="form_feedback form_gsep">
            <tr>
                <td class="ff_head" style="padding-bottom:8px; padding-top:10px;" colspan="3">March 23, 2014</td>
            </tr>
            <tr>
                <td> 
                    Arrival                    
                </td>
            </tr>
            <tr>
                <td> 
                    <table width="100%">
                        <tr>
                            <td width="90"><strong>19:00 – 22:00</strong></td>
                            <td>
                                <div style="margin-bottom:6px;"><strong>Reception.  Jointly for Participants and Guests</strong></div>
                            </td>
                        </tr>
                    </table>                    
                </td>
            </tr>

            <tr>
                <td class="ff_head" style="padding-bottom:8px; padding-top:10px;" colspan="3">March 24, 2014</td>
            </tr>
            <tr>
                <td> 
                    <table width="100%">
                        <tr>
                            <td width="90"><strong>09:30 - 12:00</strong></td>
                            <td>
                                <div style="margin-bottom:6px;">
                                    <strong>Sightseeing tour of Irkutsk</strong><br/>             
                                    the Spasskaya (Saviour's) Church, the oldest church in Irkutsk and Siberia, the 
                                    monument to Tsar Alexander III, who oversaw the construction of 
                                    the Trans-Siberian Railway, and the sightseeing tour of the Angara River 
                                    banks, the only river flowing from the world's deepest lake, Baikal.
                                </div>
                                <div data-bind="html: guestEvent1" class="form_gsep_program-res in-bl"></div>
                            </td>
                        </tr>
                    </table>  
                </td>
            </tr>
            <tr>
                <td> 
                    <table width="100%">
                        <tr>
                            <td width="90"><strong>12:30 - 15:00</strong></td>
                            <td>
                                <div style="margin-bottom:6px;">
                                    <strong>Visit to a Russian family</strong><br>
                                    for a lunch and getting to know farming and daily life (A 26 km ride on the Baikal Tract/Route).

                                </div>
                                <div data-bind="html: guestEvent2" class="form_gsep_program-res in-bl"></div>
                            </td>
                        </tr>
                    </table> 
                </td>
            </tr>
            <tr>
                <td> 
                    <table width="100%">
                        <tr>
                            <td width="90"><strong>15:00 - 16:00</strong></td>
                            <td>
                                <div style="margin-bottom:6px;">
                                    <strong>Tour of a Siberian Zaimka (Lodge), a troika ride</strong><br/>
                                    Here you will have an opportunity to ride across a frozen bay and along a forest road in a traditional wooden sleigh harnessed to a troika (3 horses).
                                </div>
                                <div data-bind="html: guestEvent3" class="form_gsep_program-res in-bl"></div>
                            </td>
                        </tr>
                    </table> 
                </td>
            </tr>
            <tr>
                <td> 
                    <table width="100%">
                        <tr>
                            <td width="90"><strong>17:00 - 18:00</strong></td>
                            <td>
                                <div style="margin-bottom:6px;">
                                    <strong>Visit to the Krestovozdvizhensky church bell tower</strong><br>
                                    Meet with a bell ringer, participate in  evening ringing
                                </div>
                                <div data-bind="html: guestEvent4" class="form_gsep_program-res in-bl"></div>
                            </td>
                        </tr>
                    </table> 
                </td>  
            </tr>
            <tr>
                <td> 
                    <table width="100%">
                        <tr>
                            <td width="90"><strong>19:00 – 22:00</strong></td>
                            <td>
                                <div style="margin-bottom:6px;">
                                    <strong>Dinner at the Restaurant. Jointly for Participants and Guests</strong>
                                </div>
                                <div data-bind="html: guestEvent5" class="form_gsep_program-res in-bl"></div>
                            </td>
                        </tr>
                    </table> 
                </td>  
            </tr>
            <tr>
                <td class="ff_head" style="padding-bottom:8px; padding-top:10px;" colspan="3">March 25, 2014</td>
            </tr>
            <tr>
                <td> 
                    <table width="100%">
                        <tr>
                            <td width="90"><strong>9:30 - 12:30</strong></td>
                            <td>
                                <div style="margin-bottom:6px;">
                                    <strong>Visit to the Znamensky cathedral, the Trubetsky museum.</strong> <br/>
                                    The Cathedral, in addition to its rich and original iconostasis, is famous for being the   final resting  place of the Decembrists  Mukhanov, Beschasnov, Princess Trubetskaya   and the  "Russian Christopher Columbus" Grigory Shelikhov.
                                </div>
                                <div data-bind="html: guestEvent6" class="form_gsep_program-res in-bl"></div>
                            </td>
                        </tr>
                    </table> 
                </td>
            </tr>
            <tr>
                <td> 
                    <table width="100%">
                        <tr>
                            <td width="90"><strong>12:30 - 15:30 </strong></td>
                            <td>
                                <div style="margin-bottom:6px;">
                                    <strong>Lunch</strong><br>
                                    Visit to a culinary studio involving a master class by famous Irkutsk chef in traditional  Siberian cuisine. Lunch of prepared dishes.
                                </div>
                                <div data-bind="html: guestEvent7" class="form_gsep_program-res in-bl"></div>
                            </td>
                        </tr>
                    </table> 
                </td>
            </tr>
            <tr>
                <td> 
                    <table width="100%">
                        <tr>
                            <td width="90"><strong>16:00 - 17:30</strong></td>
                            <td>
                                <div style="margin-bottom:6px;">
                                    <strong>Visit to the Irkutsk Regional Historic Memorial Museum  "Volkonsky house".  </strong>
                                    <br>
                                    Musical  program. <br>
                                    The home of the Decembrist Sergey Volkonsky is part of the Irkutsk Regional Historic Memorial Museum.  The home and estate of Sergey Volkonsky is a unique example of Irkutsk culture. The traditions and daily life of the noble Volkonsky family is  presented in the restored historical interiors of the house, which contains the unique personal items of the Decembrists. In the  lifetime of Princess Maria Volkonskaya, the house was the center of the city's cultural   life: it was the venue for balls, theatrical   performances and musical evenings. 
                                </div>
                                <div data-bind="html: guestEvent8" class="form_gsep_program-res in-bl"></div>
                            </td>
                        </tr>
                    </table> 
                </td>
            </tr>
            <tr>
                <td> 
                    <table width="100%">
                        <tr>
                            <td width="90"><strong>19:30 - 22:00</strong></td>
                            <td>
                                <div style="margin-bottom:6px;">
                                    <strong>Dinner at the  Restaurant. Jointly for Participants and Guests</strong>
                                </div>
                                <div data-bind="html: guestEvent9" class="form_gsep_program-res in-bl"></div>
                            </td>
                        </tr>
                    </table> 
                </td>
            </tr>
            <tr>
                <td class="ff_head" style="padding-bottom:8px; padding-top:10px;" colspan="3">March 26, 2014</td>
            </tr>
            <tr>
                <td> 
                    <table width="100%">
                        <tr>
                            <td width="90"><strong>8:30 - 22:00 </strong></td>
                            <td>
                                <div style="margin-bottom:6px;">
                                    <strong>Day tour of Baikal for all participants and guests ( including dinner)</strong>
                                </div>
                                <div data-bind="html: guestEvent10" class="form_gsep_program-res in-bl"></div>
                            </td>
                        </tr>
                    </table> 
                </td>
            </tr>
            <tr>
                <td class="ff_head" style="padding-bottom:8px; padding-top:10px;" colspan="3">March 27, 2014</td>
            </tr>
            <tr>
                <td> 
                    <table width="100%">
                        <tr>
                            <td width="90"><strong>9:30 - 17:30</strong></td>
                            <td>
                                <div style="margin-bottom:6px;">
                                    <strong>Visit to the administrative and cultural center of Buryat okrug (district), Ust-Ordynsky ( located 60 km from Irkutsk)</strong>
                                    <br/>Attendance at morning prayers in a Datsan (Buddhist temple), meeting the lama and talking about the temple background and the history of Buddhism in the Baikal region. <br>
                                    <strong>Visit to the National Museum of Buryatia </strong> founded in 1944 and  narrating the story of the region's history, culture and religion from  ancient times up to this day. The  museum also includes the open-air Buryat Estate complex.
                                </div>
                            </td>
                        </tr>
                    </table> 
                </td>
            </tr>
            <tr>
                <td> 
                    <table width="100%">
                        <tr>
                            <td width="90"><strong>12:30 - 15:30</strong></td>
                            <td>
                                <div style="margin-bottom:6px;">
                                    <strong>Lunch of ethnic Buryat cuisine:</strong> salamat, pozi, noodle soup, green tea with milk, and shangi in a <strong>yurt café</strong>.
                                </div>
                            </td>
                        </tr>
                    </table> 
                </td>
            </tr>
            <tr>
                <td> 
                    <table width="100%">
                        <tr>
                            <td width="90"><strong>16:00 - 17:30</strong></td>
                            <td>
                                <div style="margin-bottom:6px;">
                                    <strong>Return to the hotel in Irkutsk</strong>
                                </div>
                                <div data-bind="html: guestEvent11" class="form_gsep_program-res in-bl"></div>
                            </td>
                        </tr>
                    </table> 
                </td>
            </tr>
            <tr>
                <td> 
                    <table width="100%">
                        <tr>
                            <td width="90"><strong>19:30 - 22:00 </strong></td>
                            <td>
                                <div style="margin-bottom:6px;">
                                    <strong>Dinner at the  Restaurant. Jointly for Participants and Guests</strong>
                                </div>
                                <div data-bind="html: guestEvent12" class="form_gsep_program-res in-bl"></div>
                            </td>
                        </tr>
                    </table> 
                </td>
            </tr>
            <tr>
                <td class="ff_head" style="padding-bottom:8px; padding-top:10px;" colspan="3">March 28, 2014</td>
            </tr>
            <tr>
                <td> 
                    <table width="100%">
                        <tr>
                            <td width="90"><strong>9:00 - 12:20</strong></td>
                            <td>
                                <div style="margin-bottom:6px;">
                                    <strong>Free time</strong>
                                </div>
                            </td>
                        </tr>
                    </table> 
                </td>
            </tr>
            <tr>
                <td> 
                    <table width="100%">
                        <tr>
                            <td width="90"><strong>12:20</strong></td>
                            <td>
                                <div style="margin-bottom:6px;">
                                    <strong>Lunch. Jointly for Participants and Guests</strong>
                                </div>
                                <div data-bind="html: guestEvent13" class="form_gsep_program-res in-bl"></div>
                            </td>
                        </tr>
                    </table> 
                </td>
            </tr>
        </table>
    </div>
    <br/>

    <!--div style="padding-top:20px; border-top:1px solid #E5E5E5;" data-bind="visible: rooms().length > 0">
        <h2>Reservation Process</h2>
        <br/>
        <div data-bind="foreach: rooms">
            <table width="85%" class="form_feedback form_gsep" style="margin-bottom:20px;">
                <tr>
                    <td class="ff_head" width="130">First name:</td>
                    <td data-bind="html: $data.firstName"></td>
                </tr>
                <tr>
                    <td class="ff_head">Last name:</td>
                    <td data-bind="html: $data.lastName"></td>
                </tr>
                <tr>
                    <td class="ff_head">Check-in:</td>
                    <td data-bind="html: $data.checkIn"></td>
                </tr>
                <tr>
                    <td class="ff_head">Check-out:</td>
                    <td data-bind="html: $data.checkOut"></td>
                </tr>
                <tr>
                    <td class="ff_head">Room:</td>
                    <td data-bind="html: $data.type"></td>
                </tr>
                <tr>
                    <td class="ff_head">Category:</td>
                    <td data-bind="html: $data.category"></td>
                </tr>
            </table>
        </div>
    </div>
    <br/-->

</div>

<div data-bind="visible: currentScreenIndex() === 7">
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
                <td>4 500 / 5 500  RUB/day</td>
            </tr>
            <tr class="tr_tbl_bg">
                <td><strong>Suite SGL / DBL</strong></td>
                <td>8 700 / 9 700 RUB/day</td>
            </tr>
        </table>
        <p>Irkutsk </p>
        <p>
          <br />
        </p> 
        <p>Marriott Courtyard Hotel </p>
        <p> Irkutsk City Center </p>
        <p> </p>
        <p>Chkalov Street 15, Irkutsk 
          <br />
        </p>
        <p><br></p>
        <p><b>Please complete the form in the attached document below and return it to the hotel by 10, March,2014 to: E-mail: </b><a href="mailto:reservation.irkutsk@marriott.com" class="email-noimg">reservation.irkutsk@marriott.com</a></p>
        <p><br></p>
        <p> Tel. : +7 3952 481 000 
          <br>
         Fax.: +7 3952 481 600</p>
        <p><br></p>
        <table cellspacing="0" cellpadding="0" border="0" class="mceItemTable"> 
          <tbody> 
            <tr> <td><font size="3" style="font-size: small;"><img src="http://www.rushydro.ru/pic/icon_doc.gif" alt="icon"></font></td> <td style="padding-left: 10px;"> 
                <div><a target="_blank" href="http://www.eng.rushydro.ru/upload/iblock/633/Reservation-form.doc">Reservation form</a></div>
               </td></tr>
           </tbody>
         </table>
    </div>
    <br/>
    <div class="form_gsep_btns"> <a class="btn_sbmt" href=""><i></i><span>« Back</span></a> </div>
</div>

<div data-bind="visible: currentScreenIndex() < 7" class="form_gsep_btns">
    <div class="btn_sbmt btn-dir" data-direction="prev" data-bind="visible: hasPrevScreen()" style="margin-right:20px;"><i></i><span>&laquo; Back</span></div>
    <div class="btn_sbmt btn-dir" data-direction="next" data-bind="css: { 'disabled': !(hasNextScreen() && validate()) }"><i></i><span data-bind="html: currentScreenIndex() < 6 ? 'Forward &raquo;' : 'Send'"></span></div>
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
                    'comManagement',
                    'comProject',
                    'comPolicy'
                ]
            },
            // screen 3
            {
                fields: [
                    'event1', 
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
                    'event13'
                ]
            },
            // screen 4
            {
                fields: []
            },
            // screen 5
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
            // screen 6
            {
                fields: [
                    'guestEvent1', 
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
                    'guestEvent13'
                ],

                preValidateCallback: function() {
                    if (self.guests().length === 0) return true;

                    for (var i = 0; i < self.guests().length; i++) {
                        if (!self.guests()[i].firstName() || !self.guests()[i].lastName()) return false;
                    }
                    return null;
                }
            },
            // screen 7
            /*{
                postValidateCallback: function() {
                    if (!self.rooms().length) return false;
                    for (var i = 0; i < self.rooms().length; i++) {
                        if (
                            !self.rooms()[i].firstName() 
                            || !self.rooms()[i].lastName() 
                            || !self.rooms()[i].checkIn()
                            || !self.rooms()[i].checkOut()
                            || !self.rooms()[i].type()
                            || !self.rooms()[i].category()
                        ) return false;
                    }
                    return true;
                }
            },*/
            // screen 8
            {}, 
            // screen 9
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
            
            'comManagement', 'comProject', 'comPolicy',
            
            'event1',  'event2',  'event3',  'event4',  'event5',
            'event6',  'event7',  'event8',  'event9',  'event10',
            'event11', 'event12', 'event13',
            
            'allergies', 
            
            'arrivingFrom', 'arrivalDate', 'arrivalFlightNumber', 'arrivalTime', 'departingTo', 'departureDate', 'departureFlightNumber', 'departureTime', 
            
            'guests',

            'guestEvent1',  'guestEvent2',  'guestEvent3',  'guestEvent4',  'guestEvent5', 
            'guestEvent6',  'guestEvent7',  'guestEvent8',  'guestEvent9',  'guestEvent10', 
            'guestEvent11', 'guestEvent12', 'guestEvent13',

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

        this.comManagement = ko.observable();
        this.comProject = ko.observable();
        this.comPolicy = ko.observable();

        for (var i = 1; i <= 19; i++) {
            this['event'+i] = ko.observable('no answer');
            this['guestEvent'+i] = ko.observable('no answer');
        }

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
        };

        this.prev = function() {
            if (self.hasPrevScreen()) {
                screenStack.pop();
                self.currentScreenIndex(screenStack[screenStack.length - 1]);
            }
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