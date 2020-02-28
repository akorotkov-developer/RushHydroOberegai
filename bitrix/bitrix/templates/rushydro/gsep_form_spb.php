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
<form id="gsep_form" action="/gsep_form_spb.php" method="POST">
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
                <td class="ff_head" style="padding-bottom:8px; padding-top:10px;" colspan="3">September 29, 2013</td>
            </tr>
            <tr>
                <td> 
                    <table width="100%">
                        <tr>
                            <td width="90"><strong>19:00 – 22:00</strong></td>
                            <td>
                                <div style="margin-bottom:6px;"><strong>Greeting cocktail in the hotel lobby</strong></div>
                                <div><label><input name="event1" type="radio" value="yes" data-bind="checked: event1"> yes</label><label><input name="event1" type="radio" value="no" data-bind="checked: event1"> no</label></div>
                            </td>
                        </tr>
                    </table>                    
                </td>
            </tr>

            <tr>
                <td class="ff_head" style="padding-bottom:8px; padding-top:10px;" colspan="3">September 30, 2013</td>
            </tr>
            <tr>
                <td> 
                    <table width="100%">
                        <tr>
                            <td width="90"><strong>09:30 – 12:00</strong></td>
                            <td>
                                <div style="margin-bottom:6px;">
                                    <strong>Sightseeing walk tour</strong><br/>
                                    St. Isaac's Cathedral, Palace Square, Church on the Spilled Blood, Blacksmith Market
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
                            <td width="90"><strong>12:30 – 14:00</strong></td>
                            <td>
                                <div style="margin-bottom:6px;">
                                    <strong>Lunch at the traditional Russian cuisine restaurant</strong>
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
                            <td width="90"><strong>14:30 – 18:00</strong></td>
                            <td>
                                <div style="margin-bottom:6px;">
                                    <strong>Sightseeing tour behind the scene of Mariinsky Theater</strong><br/>
                                    A unique opportunity to visit the mysterious backstage of the legendary theater, look at the dressing rooms of great artists, learn more about the history of the Mariinsky Theatre. <br/><strong>Tea hour with a Mariinsky Theatre ballet dancer.</strong> An exciting story of the background and phenomenon of the Russian ballet.
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
                                    <strong>Dinner at the Sadko Restaurant. Jointly for Participants and Guests</strong>
                                </div>
                                <div><label><input name="event5" type="radio" value="yes" data-bind="checked: event5"> yes</label><label><input name="event5" type="radio" value="no" data-bind="checked: event5"> no</label></div>
                            </td>
                        </tr>
                    </table> 
                </td>  
            </tr>
            <tr>
                <td class="ff_head" style="padding-bottom:8px; padding-top:10px;" colspan="3">October 1, 2013</td>
            </tr>
            <tr>
                <td> 
                    <table width="100%">
                        <tr>
                            <td width="90"><strong>09:30 – 12:00</strong></td>
                            <td>
                                <div style="margin-bottom:6px;">
                                    <strong>Tea hour and painting workshop</strong><br/>
                                    Matryoshka painting lesson
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
                            <td width="90"><strong>12:30 – 14:00</strong></td>
                            <td>
                                <div style="margin-bottom:6px;">
                                    <strong>Lunch at the traditional Russian cuisine restaurant</strong>
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
                            <td width="90"><strong>14:30 – 17:30</strong></td>
                            <td>
                                <div style="margin-bottom:6px;">
                                    <strong>Tsarskoye Selo and Catherine Palace</strong>
                                    <br>
                                    Catherine Palace (Great Tsarskoselsky Palace), ex. Imperial Palace; one of the largest palaces in the neighborhood of St. Petersburg. Located in Pushkin (ex. TsarskoyeSelo),  25 kilometers to the South of St. Petersburg. The building was built in 1717 at the order of Empress Catherine the First.<br>
                                    The famous Amber Room has just been fully restored. A visit to the restoration workshop is included in the program. 
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
                            <td width="90"><strong>18:30 – 22:00</strong></td>
                            <td>
                                <div style="margin-bottom:6px;">
                                    <strong>Dinner at the Podvorye restaurant. Jointly for Participants and Guests</strong>
                                </div>
                                <div><label><input name="event9" type="radio" value="yes" data-bind="checked: event9"> yes</label><label><input name="event9" type="radio" value="no" data-bind="checked: event9"> no</label></div>
                            </td>
                        </tr>
                    </table> 
                </td>
            </tr>
            <tr>
                <td class="ff_head" style="padding-bottom:8px; padding-top:10px;" colspan="3">October 2, 2013</td>
            </tr>
            <tr>
                <td> 
                    <table width="100%">
                        <tr>
                            <td width="90"><strong>09:30 – 12:00</strong></td>
                            <td>
                                <div style="margin-bottom:6px;">
                                    <strong>Visit to the Russian Museum</strong>
                                    <br/>
                                    First public museum of Russian fine art in the country, founded in St. Petersburg in 1895.
                                </div>
                                <div><label><input name="event10" type="radio" value="yes" data-bind="checked: event10"> yes</label><label><input name="event10" type="radio" value="no" data-bind="checked: event10"> no</label></div>
                            </td>
                        </tr>
                    </table> 
                </td>
            </tr>
            <tr>
                <td>
                    <table width="100%">
                        <tr>
                            <td width="90"><strong>12:30 – 14:00</strong></td>
                            <td>
                                <div style="margin-bottom:6px;">
                                    <strong>Lunch at the traditional Russian cuisine restaurant</strong>
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
                            <td width="90"><strong>14:30 – 16:30</strong></td>
                            <td>
                                <div style="margin-bottom:6px;">
                                    <strong>Visit to the Emperor's Porcelain Factory with a master class in porcelain painting</strong>
                                    <br/>
                                </div>
                                <div><label><input name="event12" type="radio" value="yes" data-bind="checked: event12"> yes</label><label><input name="event12" type="radio" value="no" data-bind="checked: event12"> no</label></div>
                            </td>
                        </tr>
                    </table> 
                </td>
            </tr>
            <tr>
                <td>
                    <table width="100%">
                        <tr>
                            <td width="90"><strong>18:30 – 22:00</strong></td>
                            <td>
                                <div style="margin-bottom:6px;">
                                    <strong>"Musical Hermitage" program</strong>
                                    <br/>A unique opportunity to see the Hermitage and its gala halls late in the evening when it is closed for visitors. The State Hermitage owns a collection including about three million works of art and global cultural artefacts: painting, graphics, sculpture and applied arts, archaeological finds and numismatic material.<br/>
                                    Dinner at the Bellini Restaurant.  Jointly for Participants and Guests
                                </div>
                                <div><label><input name="event13" type="radio" value="yes" data-bind="checked: event13"> yes</label><label><input name="event13" type="radio" value="no" data-bind="checked: event13"> no</label></div>
                            </td>
                        </tr>
                    </table>  
                </td>
            </tr>
            <tr>
                <td class="ff_head" style="padding-bottom:8px; padding-top:10px;" colspan="3">October 3, 2013</td>
            </tr>
            <tr>
                <td> 
                    <table width="100%">
                        <tr>
                            <td width="90"></td>
                            <td>
                                <div style="margin-bottom:6px;">
                                    <strong>Sightseeing walk tour</strong>
                                    <br/> St. Isaac's Cathedral, Palace Square, Church on the Spilled Blood, Blacksmith Market
                                </div>
                                <div><label><input name="event14" type="radio" value="yes" data-bind="checked: event14"> yes</label><label><input name="event14" type="radio" value="no" data-bind="checked: event14"> no</label></div>
                            </td>
                        </tr>
                    </table> 
                </td>
            </tr>
            <tr>
                <td> 
                    <table width="100%">
                        <tr>
                            <td width="90"><strong>12:30 – 14:00</strong></td>
                            <td>
                                <div style="margin-bottom:6px;">
                                    <strong>Lunch</strong>
                                </div>
                                 <div><label><input name="event15" type="radio" value="yes" data-bind="checked: event15"> yes</label><label><input name="event15" type="radio" value="no" data-bind="checked: event15"> no</label></div>
                            </td>
                        </tr>
                    </table> 
                </td>
            </tr>
            <tr>
                <td> 
                    <table width="100%">
                        <tr>
                            <td width="90"></td>
                            <td>
                                <div style="margin-bottom:6px;">
                                    <strong>Boat tour  along the Neva River</strong><br/>
                                    A trip along the famous channels of the Neva River on a comfortable boat with stops near the Church on the Spilled Blood, St. Nicholas' Cathedral and Mariinsky Theater, ending near the Peter and Paul Fortress.
                                </div>
                                <div><label><input name="event16" type="radio" value="yes" data-bind="checked: event16"> yes</label><label><input name="event16" type="radio" value="no" data-bind="checked: event16"> no</label></div>
                            </td>
                        </tr>
                    </table> 
                </td>
            </tr>
            <tr>
                <td> 
                    <table width="100%">
                        <tr>
                            <td width="90"><strong>18:30 – 22:00</strong></td>
                            <td>
                                <div style="margin-bottom:6px;">
                                    <strong>Dinner at the Mirror Hall of Yusupov's Palace. Jointly for Participants and Guests</strong>
                                </div>
                                <div><label><input name="event17" type="radio" value="yes" data-bind="checked: event17"> yes</label><label><input name="event17" type="radio" value="no" data-bind="checked: event17"> no</label></div>
                            </td>
                        </tr>
                    </table> 
                </td>
            </tr>
            <tr>
                <td class="ff_head" style="padding-bottom:8px; padding-top:10px;" colspan="3">October 4, 2013</td>
            </tr>
            <tr>
                <td> 
                    <table width="100%">
                        <tr>
                            <td width="90"><strong>09:30 – 14:00</strong></td>
                            <td>
                                <div style="margin-bottom:6px;">
                                    <strong>Peterhof</strong><br>
                                   The Peterhof fountains include the famous Samson tearing the lion's jawand a plethora of cascades, gazebos, small palaces and, finally, the magnificent but cozy Great Palace. 
                                </div>
                                <div><label><input name="event18" type="radio" value="yes" data-bind="checked: event18"> yes</label><label><input name="event18" type="radio" value="no" data-bind="checked: event18"> no</label></div>
                            </td>
                        </tr>
                    </table> 
                </td>
            </tr>
            <tr>
                <td> 
                    <table width="100%">
                        <tr>
                            <td width="90"><strong>14:00 – 15:00</strong></td>
                            <td>
                                <div style="margin-bottom:6px;">
                                    <strong>Lunch in Peterhof</strong>
                                </div>
                                <div><label><input name="event19" type="radio" value="yes" data-bind="checked: event19"> yes</label><label><input name="event19" type="radio" value="no" data-bind="checked: event19"> no</label></div>
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
                <td colspan="3"><br/><br/><h2>Cultural Program</h2></td>
            </tr>
            <tr>
                <td class="ff_head" style="padding-bottom:8px; padding-top:10px;" colspan="3">September 29, 2013</td>
            </tr>
            <tr>
                <td> 
                    <table width="100%">
                        <tr>
                            <td width="90"><strong>19:00 – 22:00</strong></td>
                            <td>
                                <div style="margin-bottom:6px;">
                                    <strong>Greeting cocktail in the hotel lobby</strong>
                                </div>
                                <div><label><input name="guestEvent1" type="radio" value="yes" data-bind="checked: guestEvent1"> yes</label><label><input name="guestEvent1" type="radio" value="no" data-bind="checked: guestEvent1"> no</label></div>
                            </td>
                        </tr>
                    </table> 
                </td>
            </tr>

            <tr>
                <td class="ff_head" style="padding-bottom:8px; padding-top:10px;" colspan="3">September 30, 2013</td>
            </tr>
            <tr>
                <td> 
                    <table width="100%">
                        <tr>
                            <td width="90"><strong>09:30 – 12:00</strong></td>
                            <td>
                                <div style="margin-bottom:6px;">
                                    <strong>Sightseeing walk tour</strong><br>
                                    St. Isaac's Cathedral, Palace Square, Church on the Spilled Blood, Blacksmith Market
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
                            <td width="90"><strong>12:30 – 14:00</strong></td>
                            <td>
                                <div style="margin-bottom:6px;">
                                    <strong>Lunch at the traditional Russian cuisine restaurant</strong>
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
                            <td width="90"><strong>14:30 – 18:00</strong></td>
                            <td>
                                <div style="margin-bottom:6px;">
                                    <strong>Sightseeing tour behind the scene of Mariinsky Theater</strong><br>
                                    A unique opportunity to visit the mysterious backstage of the legendary theater, look at the dressing rooms of great artists, learn more about the history of the Mariinsky Theatre.
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
                                    <strong>Dinner at the Sadko Restaurant. Jointly for Participants and Guests</strong>
                                </div>
                                <div><label><input name="guestEvent6" type="radio" value="yes" data-bind="checked: guestEvent6"> yes</label><label><input name="guestEvent6" type="radio" value="no" data-bind="checked: guestEvent6"> no</label></div>
                            </td>
                        </tr>
                    </table> 
                </td>  
            </tr>
            <tr>
                <td class="ff_head" style="padding-bottom:8px; padding-top:10px;" colspan="3">October 1, 2013</td>
            </tr>
            <tr>
                <td> 
                    <table width="100%">
                        <tr>
                            <td width="90"><strong>09:30 – 12:00</strong></td>
                            <td>
                                <div style="margin-bottom:6px;">
                                    <strong>Tea hour and painting workshop</strong><br>
                                    Matryoshka painting lesson
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
                            <td width="90"><strong>12:30 – 14:00</strong></td>
                            <td>
                                <div style="margin-bottom:6px;">
                                    <strong>Lunch at the traditional Russian cuisine restaurant</strong>
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
                            <td width="90"><strong>14:30 – 17:30</strong></td>
                            <td>
                                <div style="margin-bottom:6px;">
                                    <strong>Tsarskoye Selo and Catherine Palace</strong><br>
                                    Catherine Palace (Great Tsarskoselsky Palace), ex. Imperial Palace; one of the largest palaces in the neighborhood of St. Petersburg. Located in Pushkin (ex. TsarskoyeSelo),  25 kilometers to the South of St. Petersburg. The building was built in 1717 at the order of Empress Catherine the First. <br>The famous Amber Room has just been fully restored. A visit to the restoration workshop is included in the program. 
                                </div>
                                <div><label><input name="guestEvent9" type="radio" value="yes" data-bind="checked: guestEvent9"> yes</label><label><input name="guestEvent9" type="radio" value="no" data-bind="checked: guestEvent9"> no</label></div>
                            </td>
                        </tr>
                    </table> 
                </td>
            </tr>
            <tr>
                <td> 
                    <table width="100%">
                        <tr>
                            <td width="90"><strong>18:30 – 22:00</strong></td>
                            <td>
                                <div style="margin-bottom:6px;">
                                    <strong>Joint dinner in the Podvorye Restaurant with the delegates. Jointly for Participants and Guests</strong>
                                </div>
                                <div><label><input name="guestEvent10" type="radio" value="yes" data-bind="checked: guestEvent10"> yes</label><label><input name="guestEvent10" type="radio" value="no" data-bind="checked: guestEvent10"> no</label></div>
                            </td>
                        </tr>
                    </table> 
                </td>
            </tr>
            <tr>
                <td class="ff_head" style="padding-bottom:8px; padding-top:10px;" colspan="3">October 2, 2013</td>
            </tr>
            <tr>
                <td> 
                    <table width="100%">
                        <tr>
                            <td width="90"><strong>09:30 – 12:00</strong></td>
                            <td>
                                <div style="margin-bottom:6px;">
                                    <strong>Visit to the Russian Museum</strong><br>
                                    First public museum of Russian fine art in the country, founded in St. Petersburg in 1895.
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
                            <td width="90"><strong>12:30 – 14:00</strong></td>
                            <td>
                                <div style="margin-bottom:6px;">
                                    <strong>Lunch at the traditional Russian cuisine restaurant</strong>
                                </div>
                                <div><label><input name="guestEvent12" type="radio" value="yes" data-bind="checked: guestEvent12"> yes</label><label><input name="guestEvent12" type="radio" value="no" data-bind="checked: guestEvent12"> no</label></div>
                            </td>
                        </tr>
                    </table> 
                </td>
            </tr>
            <tr>
                <td> 
                    <table width="100%">
                        <tr>
                            <td width="90"><strong>14:30 – 16:30</strong></td>
                            <td>
                                <div style="margin-bottom:6px;">
                                    <strong>Visit to the Emperor's Porcelain Factory with a master class in porcelain painting</strong>
                                    
                                </div>
                                <div><label><input name="guestEvent13" type="radio" value="yes" data-bind="checked: guestEvent13"> yes</label><label><input name="guestEvent13" type="radio" value="no" data-bind="checked: guestEvent13"> no</label></div>
                            </td>
                        </tr>
                    </table> 
                </td>
            </tr>
            <tr>
                <td> 
                    <table width="100%">
                        <tr>
                            <td width="90"><strong>18:30 – 22:00</strong></td>
                            <td>
                                <div style="margin-bottom:6px;">
                                    <strong>"Musical Hermitage" program</strong><br>
                                    A unique opportunity to see the Hermitage and its gala halls late in the evening when it is closed for visitors. The State Hermitage owns a collection including about three million works of art and global cultural artefacts: painting, graphics, sculpture and applied arts, archaeological finds and numismatic material. <br>Joint dinner in the Bellini Restaurant with the delegates. Jointly for Participants and Guests
                                </div>
                                <div><label><input name="guestEvent14" type="radio" value="yes" data-bind="checked: guestEvent14"> yes</label><label><input name="guestEvent14" type="radio" value="no" data-bind="checked: guestEvent14"> no</label></div>
                            </td>
                        </tr>
                    </table> 
                </td>
            </tr>
            <tr>
                <td class="ff_head" style="padding-bottom:8px; padding-top:10px;" colspan="3">October 3, 2013</td>
            </tr>
            <tr>
                <td> 
                    <table width="100%">
                        <tr>
                            <td width="90"></td>
                            <td>
                                <div style="margin-bottom:6px;">
                                    <strong>Sightseeing walk tour</strong><br>
                                    St. Isaac's Cathedral, Palace Square, Church on the Spilled Blood, Blacksmith Market
                                </div>
                                <div><label><input name="guestEvent15" type="radio" value="yes" data-bind="checked: guestEvent15"> yes</label><label><input name="guestEvent15" type="radio" value="no" data-bind="checked: guestEvent15"> no</label></div>
                            </td>
                        </tr>
                    </table> 
                </td>
            </tr>
            <tr>
                <td> 
                    <table width="100%">
                        <tr>
                            <td width="90"><strong>12:30 – 14:00</strong></td>
                            <td>
                                <div style="margin-bottom:6px;">
                                    <strong>Lunch</strong>
                                </div>
                                <div><label><input name="guestEvent16" type="radio" value="yes" data-bind="checked: guestEvent16"> yes</label><label><input name="guestEvent16" type="radio" value="no" data-bind="checked: guestEvent16"> no</label></div>
                            </td>
                        </tr>
                    </table> 
                </td>
            </tr>
            <tr>
                <td> 
                    <table width="100%">
                        <tr>
                            <td width="90"></td>
                            <td>
                                <div style="margin-bottom:6px;">
                                    <strong>Boat tour  along the Neva River</strong><br>
                                    A trip along the famous channels of the Neva River on a comfortable boat with stops near the Church on the Spilled Blood, St. Nicholas' Cathedral and Mariinsky Theater, ending near the Peter and Paul Fortress.
                                </div>
                                <div><label><input name="guestEvent17" type="radio" value="yes" data-bind="checked: guestEvent17"> yes</label><label><input name="guestEvent17" type="radio" value="no" data-bind="checked: guestEvent17"> no</label></div>
                            </td>
                        </tr>
                    </table> 
                </td>
            </tr>
            <tr>
                <td> 
                    <table width="100%">
                        <tr>
                            <td width="90"><strong>18:30 – 22:00</strong></td>
                            <td>
                                <div style="margin-bottom:6px;">
                                    <strong>Joint dinner with the delegates  in the Mirror Hall of Yusupov's Palace. Jointly for Participants and Guests</strong>
                                </div>
                                <div><label><input name="guestEvent18" type="radio" value="yes" data-bind="checked: guestEvent18"> yes</label><label><input name="guestEvent18" type="radio" value="no" data-bind="checked: guestEvent18"> no</label></div>
                            </td>
                        </tr>
                    </table> 
                </td>
            </tr>
            <tr>
                <td class="ff_head" style="padding-bottom:8px; padding-top:10px;" colspan="3">October 4, 2013</td>
            </tr>
            <tr>
                <td> 
                    <table width="100%">
                        <tr>
                            <td width="90"><strong>09:30 – 14:00</strong></td>
                            <td>
                                <div style="margin-bottom:6px;">
                                    <strong>Peterhof</strong><br>
                                   The Peterhof fountains include the famous Samson tearing the lion's jawand a plethora of cascades, gazebos, small palaces and, finally, the magnificent but cozy Great Palace. 
                                </div>
                                <div><label><input name="guestEvent19" type="radio" value="yes" data-bind="checked: guestEvent19"> yes</label><label><input name="guestEvent19" type="radio" value="no" data-bind="checked: guestEvent19"> no</label></div>
                            </td>
                        </tr>
                    </table> 
                </td>
            </tr>
            <tr>
                <td> 
                    <table width="100%">
                        <tr>
                            <td width="90"><strong>14:00 – 15:00</strong></td>
                            <td>
                                <div style="margin-bottom:6px;">
                                    <strong>Lunch in Peterhof</strong>
                                </div>
                                <div><label><input name="guestEvent5" type="radio" value="yes" data-bind="checked: guestEvent5"> yes</label><label><input name="guestEvent5" type="radio" value="no" data-bind="checked: guestEvent5"> no</label></div>
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
                <td class="ff_head" style="padding-bottom:8px; padding-top:10px;" colspan="3">September 29, 2013</td>
            </tr>
            <tr>
                <td> 
                    <table width="100%">
                        <tr>
                            <td width="90"><strong>19:00 – 22:00</strong></td>
                            <td>
                                <div style="margin-bottom:6px;">
                                    <strong>Greeting cocktail in the hotel lobby</strong>
                                </div>
                                <div data-bind="html: event1" class="form_gsep_program-res in-bl"></div>
                            </td>
                        </tr>
                    </table> 
                </td>
            </tr>

            <tr>
                <td class="ff_head" style="padding-bottom:8px; padding-top:10px;" colspan="3">September 30, 2013</td>
            </tr>
            <tr>
                <td> 
                    <table width="100%">
                        <tr>
                            <td width="90"><strong>09:30 – 12:00</strong></td>
                            <td>
                                <div style="margin-bottom:6px;">
                                    <strong>Sightseeing walk tour</strong><br>
                                    St. Isaac's Cathedral, Palace Square, Church on the Spilled Blood, Blacksmith Market
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
                            <td width="90"><strong>12:30 – 14:00</strong></td>
                            <td>
                                <div style="margin-bottom:6px;">
                                    <strong>Lunch at the traditional Russian cuisine restaurant</strong>
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
                            <td width="90"><strong>14:30 – 18:00</strong></td>
                            <td>
                                <div style="margin-bottom:6px;">
                                    <strong>Sightseeing tour behind the scene of Mariinsky Theater</strong><br>
                                    A unique opportunity to visit the mysterious backstage of the legendary theater, look at the dressing rooms of great artists, learn more about the history of the Mariinsky Theatre. <br><strong>Tea hour with a Mariinsky Theatre ballet dancer.</strong> An exciting story of the background and phenomenon of the Russian ballet .
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
                                    <strong>Dinner at the Sadko Restaurant. Jointly for Participants and Guests</strong>
                                </div>
                                <div data-bind="html: event5" class="form_gsep_program-res in-bl"></div>
                            </td>
                        </tr>
                    </table>
                </td>  
            </tr>
            <tr>
                <td class="ff_head" style="padding-bottom:8px; padding-top:10px;" colspan="3">October 1, 2013</td>
            </tr>
            <tr>
                <td> 
                    <table width="100%">
                        <tr>
                            <td width="90"><strong>09:30 – 12:00</strong></td>
                            <td>
                                <div style="margin-bottom:6px;">
                                    <strong>Tea hour and painting workshop</strong><br>
                                    Matryoshka painting lesson
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
                            <td width="90"><strong>12:30 – 14:00</strong></td>
                            <td>
                                <div style="margin-bottom:6px;">
                                    <strong>Lunch at the traditional Russian cuisine restaurant</strong>
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
                            <td width="90"><strong>14:30 – 17:30</strong></td>
                            <td>
                                <div style="margin-bottom:6px;">
                                    <strong>Tsarskoye Selo and Catherine Palace</strong><br>
                                    Catherine Palace (Great Tsarskoselsky Palace), ex. Imperial Palace; one of the largest palaces in the neighborhood of St. Petersburg. Located in Pushkin (ex. TsarskoyeSelo),  25 kilometers to the South of St. Petersburg. The building was built in 1717 at the order of Empress Catherine the First. <br>The famous Amber Room has just been fully restored. A visit to the restoration workshop is included in the program. 
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
                            <td width="90"><strong>18:30 – 22:00</strong></td>
                            <td>
                                <div style="margin-bottom:6px;">
                                    <strong>Dinner at the Podvorye restaurant. Jointly for Participants and Guests</strong>
                                </div>
                                <div data-bind="html: event9" class="form_gsep_program-res in-bl"></div>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td class="ff_head" style="padding-bottom:8px; padding-top:10px;" colspan="3">October 2, 2013</td>
            </tr>
            <tr>
                <td> 
                    <table width="100%">
                        <tr>
                            <td width="90"><strong>09:30 – 12:00</strong></td>
                            <td>
                                <div style="margin-bottom:6px;">
                                    <strong>Visit to the Russian Museum</strong><br>
                                    First public museum of Russian fine art in the country, founded in St. Petersburg in 1895.
                                </div>
                                <div data-bind="html: event10" class="form_gsep_program-res in-bl"></div>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td> 
                    <table width="100%">
                        <tr>
                            <td width="90"><strong>12:30 – 14:00</strong></td>
                            <td>
                                <div style="margin-bottom:6px;">
                                    <strong>Lunch at the traditional Russian cuisine restaurant</strong>
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
                            <td width="90"><strong>14:30 – 16:30</strong></td>
                            <td>
                                <div style="margin-bottom:6px;">
                                    <strong>Visit to the Emperor's Porcelain Factory with a master class in porcelain painting</strong>
                                    
                                </div>
                                <div data-bind="html: event12" class="form_gsep_program-res in-bl"></div>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td> 
                    <table width="100%">
                        <tr>
                            <td width="90"><strong>18:30 – 22:00</strong></td>
                            <td>
                                <div style="margin-bottom:6px;">
                                    <strong>"Musical Hermitage" program</strong><br>
                                    A unique opportunity to see the Hermitage and its gala halls late in the evening when it is closed for visitors. The State Hermitage owns a collection including about three million works of art and global cultural artefacts: painting, graphics, sculpture and applied arts, archaeological finds and numismatic material. <br> Dinner at the Bellini Restaurant. Jointly for Participants and Guests
                                </div>
                                <div data-bind="html: event13" class="form_gsep_program-res in-bl"></div>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td class="ff_head" style="padding-bottom:8px; padding-top:10px;" colspan="3">October 3, 2013</td>
            </tr>
            <tr>
                <td> 
                    <table width="100%">
                        <tr>
                            <td width="90"><strong></strong></td>
                            <td>
                                <div style="margin-bottom:6px;">
                                    <strong>Sightseeing walk tour</strong><br>
                                    St. Isaac's Cathedral, Palace Square, Church on the Spilled Blood, Blacksmith Market
                                </div>
                                <div data-bind="html: event14" class="form_gsep_program-res in-bl"></div>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td> 
                    <table width="100%">
                        <tr>
                            <td width="90"><strong>12:30 – 14:00</strong></td>
                            <td>
                                <div style="margin-bottom:6px;">
                                    <strong>Lunch</strong>
                                </div>
                                <div data-bind="html: event15" class="form_gsep_program-res in-bl"></div>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td> 
                    <table width="100%">
                        <tr>
                            <td width="90"><strong></strong></td>
                            <td>
                                <div style="margin-bottom:6px;">
                                    <strong>Boat tour  along the Neva River</strong><br>
                                    A trip along the famous channels of the Neva River on a comfortable boat with stops near the Church on the Spilled Blood, St. Nicholas' Cathedral and Mariinsky Theater, ending near the Peter and Paul Fortress.
                                </div>
                                <div data-bind="html: event16" class="form_gsep_program-res in-bl"></div>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td> 
                    <table width="100%">
                        <tr>
                            <td width="90"><strong>18:30 – 22:00</strong></td>
                            <td>
                                <div style="margin-bottom:6px;">
                                    <strong>Dinner at the Mirror Hall of Yusupov's Palace. Jointly for Participants and Guests</strong>
                                </div>
                                <div data-bind="html: event17" class="form_gsep_program-res in-bl"></div>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td class="ff_head" style="padding-bottom:8px; padding-top:10px;" colspan="3">October 4, 2013</td>
            </tr>
            <tr>
                <td> 
                    <table width="100%">
                        <tr>
                            <td width="90"><strong>09:30 – 14:00</strong></td>
                            <td>
                                <div style="margin-bottom:6px;">
                                    <strong>Peterhof</strong><br>
                                   The Peterhof fountains include the famous Samson tearing the lion's jawand a plethora of cascades, gazebos, small palaces and, finally, the magnificent but cozy Great Palace. 
                                </div>
                                <div data-bind="html: event18" class="form_gsep_program-res in-bl"></div>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td> 
                    <table width="100%">
                        <tr>
                            <td width="90"><strong>14:00 – 15:00</strong></td>
                            <td>
                                <div style="margin-bottom:6px;">
                                    <strong>Lunch in Peterhof</strong>
                                </div>
                                <div data-bind="html: event19" class="form_gsep_program-res in-bl"></div>
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
                <td class="ff_head" style="padding-bottom:8px; padding-top:10px;" colspan="3">September 29, 2013</td>
            </tr>
            <tr>
                <td> 
                    <table width="100%">
                        <tr>
                            <td width="90"><strong>09:00 – 22:00</strong></td>
                            <td>
                                <div style="margin-bottom:6px;">
                                    <strong>Greeting cocktail in the hotel lobby</strong>
                                </div>
                                <div data-bind="html: guestEvent1" class="form_gsep_program-res in-bl"></div>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>

            <tr>
                <td class="ff_head" style="padding-bottom:8px; padding-top:10px;" colspan="3">September 30, 2013</td>
            </tr>
            <tr>
                <td> 
                    <table width="100%">
                        <tr>
                            <td width="90"><strong>09:30 – 12:00</strong></td>
                            <td>
                                <div style="margin-bottom:6px;">
                                    <strong>Sightseeing walk tour</strong><br>St. Isaac's Cathedral, Palace Square, Church on the Spilled Blood, Blacksmith Market
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
                            <td width="90"><strong>12:30 – 14:00</strong></td>
                            <td>
                                <div style="margin-bottom:6px;">
                                    <strong>Lunch at the traditional Russian cuisine restaurant</strong>
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
                            <td width="90"><strong>14:30 – 18:00</strong></td>
                            <td>
                                <div style="margin-bottom:6px;">
                                    <strong>Sightseeing tour behind the scene of Mariinsky Theater</strong><br>
                                    A unique opportunity to visit the mysterious backstage of the legendary theater, look at the dressing rooms of great artists, learn more about the history of the Mariinsky Theatre. <br><strong>Tea hour with a Mariinsky Theatre ballet dancer </strong> An exciting story of the background and phenomenon of the Russian ballet 
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
                                    <strong>Dinner at the Sadko Restaurant. Jointly for Participants and Guests</strong>
                                </div>
                                <div data-bind="html: guestEvent6" class="form_gsep_program-res in-bl"></div>
                            </td>
                        </tr>
                    </table>
                </td>  
            </tr>
            <tr>
                <td class="ff_head" style="padding-bottom:8px; padding-top:10px;" colspan="3">October 1, 2013</td>
            </tr>
            <tr>
                <td> 
                    <table width="100%">
                        <tr>
                            <td width="90"><strong>09:30 – 12:00</strong></td>
                            <td>
                                <div style="margin-bottom:6px;">
                                    <strong>Tea hour and painting workshop</strong><br>
                                    Matryoshka painting lesson
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
                            <td width="90"><strong>12:30 – 14:00</strong></td>
                            <td>
                                <div style="margin-bottom:6px;">
                                    <strong>Lunch at the traditional Russian cuisine restaurant</strong>
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
                            <td width="90"><strong>14:30 – 17:30</strong></td>
                            <td>
                                <div style="margin-bottom:6px;">
                                    <strong>Tsarskoye Selo and Catherine Palace</strong><br>
                                    Catherine Palace (Great Tsarskoselsky Palace), ex. Imperial Palace; one of the largest palaces in the neighborhood of St. Petersburg. Located in Pushkin (ex. TsarskoyeSelo),  25 kilometers to the South of St. Petersburg. The building was built in 1717 at the order of Empress Catherine the First. <br>The famous Amber Room has just been fully restored. A visit to the restoration workshop is included in the program. 
                                </div>
                                <div data-bind="html: guestEvent9" class="form_gsep_program-res in-bl"></div>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td> 
                    <table width="100%">
                        <tr>
                            <td width="90"><strong>18:30 – 22:00</strong></td>
                            <td>
                                <div style="margin-bottom:6px;">
                                    <strong>Joint dinner in the Podvorye Restaurant with the delegates. Jointly for Participants and Guests</strong>
                                </div>
                                <div data-bind="html: guestEvent10" class="form_gsep_program-res in-bl"></div>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td class="ff_head" style="padding-bottom:8px; padding-top:10px;" colspan="3">October 2, 2013</td>
            </tr>
            <tr>
                <td> 
                    <table width="100%">
                        <tr>
                            <td width="90"><strong>09:30 – 12:00</strong></td>
                            <td>
                                <div style="margin-bottom:6px;">
                                    <strong>Visit to the Russian Museum</strong><br>
                                    First public museum of Russian fine art in the country, founded in St. Petersburg in 1895.
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
                            <td width="90"><strong>12:30 – 14:00</strong></td>
                            <td>
                                <div style="margin-bottom:6px;">
                                    <strong>Lunch at the traditional Russian cuisine restaurant</strong>
                                </div>
                                <div data-bind="html: guestEvent12" class="form_gsep_program-res in-bl"></div>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td> 
                    <table width="100%">
                        <tr>
                            <td width="90"><strong>14:30 – 16:30</strong></td>
                            <td>
                                <div style="margin-bottom:6px;">
                                    <strong>Visit to the Emperor's Porcelain Factory with a master class in porcelain painting</strong>
                                    
                                </div>
                                <div data-bind="html: guestEvent13" class="form_gsep_program-res in-bl"></div>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td> 
                    <table width="100%">
                        <tr>
                            <td width="90"><strong>18:30 – 22:00</strong></td>
                            <td>
                                <div style="margin-bottom:6px;">
                                    <strong>"Musical Hermitage" program</strong><br>
                                    A unique opportunity to see the Hermitage and its gala halls late in the evening when it is closed for visitors. The State Hermitage owns a collection including about three million works of art and global cultural artefacts: painting, graphics, sculpture and applied arts, archaeological finds and numismatic material. <br>
                                    Joint dinner in the Bellini Restaurant with the delegates. Jointly for Participants and Guests 
                                </div>
                                <div data-bind="html: guestEvent14" class="form_gsep_program-res in-bl"></div>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td class="ff_head" style="padding-bottom:8px; padding-top:10px;" colspan="3">October 3, 2013</td>
            </tr>
            <tr>
                <td> 
                    <table width="100%">
                        <tr>
                            <td width="90"><strong></strong></td>
                            <td>
                                <div style="margin-bottom:6px;">
                                    <strong>Sightseeing walk tour</strong><br>
                                    St. Isaac's Cathedral, Palace Square, Church on the Spilled Blood, Blacksmith Market
                                </div>
                                <div data-bind="html: guestEvent15" class="form_gsep_program-res in-bl"></div>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td> 
                    <table width="100%">
                        <tr>
                            <td width="90"><strong>12:30 – 14:00</strong></td>
                            <td>
                                <div style="margin-bottom:6px;">
                                    <strong>Lunch</strong>
                                </div>
                                <div data-bind="html: guestEvent16" class="form_gsep_program-res in-bl"></div>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td> 
                    <table width="100%">
                        <tr>
                            <td width="90"><strong></strong></td>
                            <td>
                                <div style="margin-bottom:6px;">
                                    <strong>Boat tour  along the Neva River</strong><br>
                                    A trip along the famous channels of the Neva River on a comfortable boat with stops near the Church on the Spilled Blood, St. Nicholas' Cathedral and Mariinsky Theater, ending near the Peter and Paul Fortress.
                                </div>
                                <div data-bind="html: guestEvent17" class="form_gsep_program-res in-bl"></div>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td> 
                    <table width="100%">
                        <tr>
                            <td width="90"><strong>18:30 – 22:00</strong></td>
                            <td>
                                <div style="margin-bottom:6px;">
                                    <strong>Joint dinner with the delegates  in the Mirror Hall of Yusupov's Palace. Jointly for Participants and Guests</strong>
                                </div>
                                <div data-bind="html: guestEvent18" class="form_gsep_program-res in-bl"></div>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td class="ff_head" style="padding-bottom:8px; padding-top:10px;" colspan="3">October 4, 2013</td>
            </tr>
            <tr>
                <td> 
                    <table width="100%">
                        <tr>
                            <td width="90"><strong>09:30 – 14:00</strong></td>
                            <td>
                                <div style="margin-bottom:6px;">
                                    <strong>Peterhof</strong><br>
                                   The Peterhof fountains include the famous Samson tearing the lion's jawand a plethora of cascades, gazebos, small palaces and, finally, the magnificent but cozy Great Palace. 
                                </div>
                                <div data-bind="html: guestEvent19" class="form_gsep_program-res in-bl"></div>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td> 
                    <table width="100%">
                        <tr>
                            <td width="90"><strong>14:00 – 15:00</strong></td>
                            <td>
                                <div style="margin-bottom:6px;">
                                    <strong>Lunch in Peterhof</strong>
                                </div>
                                <div data-bind="html: guestEvent5" class="form_gsep_program-res in-bl"></div>
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
    <div data-bind="visible: sending">Form is sending...</div>
    <div data-bind="visible: !sending()">
        <strong>Form is sent. Thank you.</strong>
        <p><br></p><p><br></p>
        <h2>Reservation Process</h2>
        <p><br></p>
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
        <p>St.Petersburg</p>
        <p> </p>
        <p>Hotel W ST. PETERBURG</p>
        <p> </p>
        <p>6, Voznesensky Prospect, 190000, Russia</p>
        <p> 
          <br />
         </p>
        <p> </p>
        <p>Link to <a href="http://www.wstpetersburg.ru/" >www.wstpetersburg.ru</a></p>
        <p><br></p>
        <p><b>Please complete the details below and return this hotel reservation form by 30 August 2013 to: E-mail: </b><img src="/upload/email/0131ab3d4e017045856ebb01d6c11b31.png" style="vertical-align: bottom;"></p>
        <p><br></p>
        <p>Fax: +7 812 315 60 21 / Tel: +7 (812) 610 6161</p>
        <p><br></p>
        <table cellspacing="0" cellpadding="0" border="0" class="mceItemTable"> 
          <tbody> 
            <tr> <td style="border-image: none;"><font size="3" style="font-size: small;"><img src="http://www.rushydro.ru/pic/icon_doc.gif" alt="icon"></font></td> <td style="padding-left: 10px;     border-image: none;"> 
                <div><a target="_blank" href="http://www.eng.rushydro.ru/upload/iblock/6cc/reservation-form.doc">Reservation form</a></div>
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
                    'event13', 
                    'event14', 
                    'event15', 
                    'event16', 
                    'event17', 
                    'event18',
                    'event19'
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
                    'guestEvent13', 
                    'guestEvent14', 
                    'guestEvent15', 
                    'guestEvent16', 
                    'guestEvent17', 
                    'guestEvent18', 
                    'guestEvent19'
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
                    self.sending(true);
                    $.ajax({
                        type: form.attr('method'),
                        url: form.attr('action'),
                        dataType: 'html',
                        data: self.toObject()
                    }).done(function() {
                        self.sending(false);
                    });
                }
            }
        ],

        serializableFields = [
            'appeal', 'firstName', 'lastName', 'email', 'company', 'phone', /*'fax',*/ 'celluar', 'contactPerson', 'contactEmail', 'contactPhone',
            
            'comManagement', 'comProject', 'comPolicy',
            
            'event1',  'event2',  'event3',  'event4',  'event5',
            'event6',  'event7',  'event8',  'event9',  'event10',
            'event11', 'event12', 'event13', 'event14', 'event15', 
            'event16', 'event17', 'event18', 'event19',
            
            'allergies', 
            
            'arrivingFrom', 'arrivalDate', 'arrivalFlightNumber', 'arrivalTime', 'departingTo', 'departureDate', 'departureFlightNumber', 'departureTime', 
            
            'guests',

            'guestEvent1',  'guestEvent2',  'guestEvent3',  'guestEvent4',  'guestEvent5', 
            'guestEvent6',  'guestEvent7',  'guestEvent8',  'guestEvent9',  'guestEvent10', 
            'guestEvent11', 'guestEvent12', 'guestEvent13', 'guestEvent14', 'guestEvent15', 
            'guestEvent16', 'guestEvent17', 'guestEvent18', 'guestEvent19',

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
    }

    window.vm = new ViewModel();
    ko.applyBindings(vm);

    $('.btn-dir').click(function(e) {
        e.preventDefault();
        vm[$(this).data('direction')]();
    });
});
</script>