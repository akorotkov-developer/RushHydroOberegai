<div style="position:relative; z-index:4;" id="calendar-gsep">
    <?$APPLICATION->IncludeComponent("bitrix:news.list", "calendar", array(
        "IBLOCK_TYPE" => "content",
        "IBLOCK_ID" => RhdHandler::isEnglish() ? 130 : 129,
        "NEWS_COUNT" => "50",
        "SORT_BY1" => "SORT",
        "SORT_ORDER1" => "DESC",
        "SORT_BY2" => "SORT",
        "SORT_ORDER2" => "ASC",
        "FILTER_NAME" => "",
        "FIELD_CODE" => array(
            'NAME',
            'PREVIEW_TEXT',
            'ACTIVE_FROM',
            'ACTIVE_TO',
        ),
        "PROPERTY_CODE" => array(
        ),
        "CHECK_DATES" => "N",
        "DETAIL_URL" => "",
        "AJAX_MODE" => "N",
        "AJAX_OPTION_JUMP" => "N",
        "AJAX_OPTION_STYLE" => "Y",
        "AJAX_OPTION_HISTORY" => "N",
        "CACHE_TYPE" => "A",
        "CACHE_TIME" => "36000000",
        "CACHE_FILTER" => "N",
        "CACHE_GROUPS" => "N",
        "PREVIEW_TRUNCATE_LEN" => "",
        "ACTIVE_DATE_FORMAT" => "j F Y",
        "SET_TITLE" => "N",
        "SET_STATUS_404" => "N",
        "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
        "ADD_SECTIONS_CHAIN" => "N",
        "HIDE_LINK_WHEN_NO_DETAIL" => "N",
        "PARENT_SECTION" => "",
        "PARENT_SECTION_CODE" => "",
        "DISPLAY_TOP_PAGER" => "N",
        "DISPLAY_BOTTOM_PAGER" => "Y",
        "PAGER_TITLE" => "Новости",
        "PAGER_SHOW_ALWAYS" => "N",
        "PAGER_TEMPLATE" => "",
        "PAGER_DESC_NUMBERING" => "N",
        "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
        "PAGER_SHOW_ALL" => "Y",
        "DISPLAY_DATE" => "Y",
        "DISPLAY_NAME" => "Y",
        "DISPLAY_PICTURE" => "Y",
        "DISPLAY_PREVIEW_TEXT" => "Y",
        "AJAX_OPTION_ADDITIONAL" => ""
        ),
        false
    );?>
    <div id="calendar-popup"></div>
</div>

<script type="text/javascript" src="<?=SITE_TEMPLATE_PATH?>/js/jquery-ui-1.10.3.custom.min.js"></script>
<?php if (!RhdHandler::isEnglish()): ?>
    <script type="text/javascript" src="<?=SITE_TEMPLATE_PATH?>/js/jquery.ui.datepicker-ru.js"></script>
<?php endif; ?>
<script type="text/javascript">
$(function() {
    var findEventsForDate = function(date) {
        var events = [], i;
        date = date.getTime() / 1000;
        for (i = 0; i < calendarEvents.length; i++) {
            if ((calendarEvents[i].period[0] <= date) && (calendarEvents[i].period[1] >= date)) {
                events.push(calendarEvents[i]);
            }
        }

        return events;
    };

    var dateBuffer = {};
    $('#datepicker').datepicker({
        firstDay: 1,
        prevText: '&#x3c;',
        nextText: '&#x3e;',
        minDate: new Date(2013, 3, 1),
        maxDate: new Date(2014, 4, 30),
        beforeShowDay: function(date) {
            var events;
            if ((events = findEventsForDate(date)).length > 0) {
                dateBuffer[date.getDate()+'.'+date.getMonth()+'.'+date.getFullYear()] = events;
                return [true];
            }
            else {
                return [false];
            }
        },
        onSelect: function(dateText, inst) {
            var key = inst.selectedDay+'.'+inst.selectedMonth+'.'+inst.selectedYear, i, events, code = '';
            if (typeof dateBuffer[key] === 'undefined') return;

            events = dateBuffer[key];
            for (i = 0; i < events.length; i++) {
                code += '<div class="calendar-popup_cont">'+events[i].description+'</div>';
            }
            $('#datepicker td').each(function(){
                if ($(this).data("month") === inst.selectedMonth && $(this).find("a").text() === inst.selectedDay) {
                    if (!$(this).find("a").hasClass("ui-state-active")) {
                        $('#calendar-popup')
                            .hide()
                            .css({
                                top: $(this).position().top, 
                                left: $(this).position().left
                            })
                            .html("<div class='arr'></div>"+code)
                            .fadeIn(500);
                    }
                }
            });
        }
    });

    $("#calendar-gsep").mouseleave(function() {
        $('#calendar-popup').fadeOut(300);
        $('#datepicker .ui-state-active').removeClass("ui-state-active");
    });
    $("#calendar-gsep").delegate(".ui-datepicker-header", "mouseenter", function() {
        $('#calendar-popup').fadeOut(300);
        $('#datepicker .ui-state-active').removeClass("ui-state-active");
    });
});
</script>  