<?php
require_once dirname(__FILE__).'/config.inc.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Изменения уровней водохранилищ ГЭС РусГидро</title>

        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/underscore.js/1.4.4/underscore-min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/knockout/2.2.0/knockout-min.js"></script>
        <script src="./js/knockout-deferred-updates.js"></script>
        <link rel="stylesheet" href="st.css?5">
    </head>
    <body>
        <div id="wrap">
            <h1>Изменения уровней водохранилищ ГЭС РусГидро</h1>
            <div class="date-select">
                Выберите дату <select data-bind="options: dates, value: currentDate, disable: dataLoading" class="datepicker"></select>
            </div>

            <div class="graphic" style="float:right;">
                <div class="graphic-bg_4"></div>

                <div data-bind="foreach: stationsByBlock(4)">
                    <div class="water-lvl" data-bind='style: vm.forStationWaterStyle($data)'></div>
                </div>

                <div data-bind="foreach: stationsByBlock(4)">
                    <div class="pic" data-bind="style: vm.forStationDefault($data, 'positionPic')"></div>
                </div>

                <div data-bind="foreach: stationsByBlock(4)">
                    <div class="popup" data-bind="style: vm.forStationDefault($data, 'positionArea')">
                        <div class="area-cl" data-bind="style: vm.forStationDefault($data, 'positionAreaCl')"><span data-bind='html: vm.forStation($data, "uvb"), attr: { "class": vm.forStationDiffClass($data, "uvb") }, style: vm.forStationDefault($data, "positionUVB")'></span></div>
                        <div class="popup-info_wrap" data-bind="style: vm.forStationDefault($data, 'positionBottom')">
                            <div class="popup-info">
                                <p><span class="level-note" style="background-position:0 -18px;"></span>ФПУ &mdash; <strong data-bind="html: vm.forStationDefault($data, 'valueFPU')+' м'"></strong></p>
                                <p><span class="level-note"></span>НПУ &mdash; <strong data-bind="html: vm.forStationDefault($data, 'valueNPU')+' м'"></strong></p>
                                <p><span class="level-note" style="background-position:0 -35px;"></span>УМО &mdash; <strong data-bind="html: vm.forStationDefault($data, 'valueUMO')+' м'"></strong></p>

                                <p>
                                    Уровень &mdash;
                                    <span data-bind="visible: vm.forStation($data, 'uvb') !== null">
                                        <strong data-bind="html: vm.forStation($data, 'uvb')+' м'"></strong>
                                        <span data-bind='html: vm.forStationDiffFormatted($data, "uvb"), attr: { "class": vm.forStationDiffClass($data, "uvb") }'></span>
                                    </span>
                                    <span data-bind="visible: vm.forStation($data, 'uvb') === null">
                                        <strong>нет данных</strong>
                                    </span>
                                </p>
                                <p>
                                    Свободная ёмкость &mdash;
                                    <span data-bind="visible: vm.forStation($data, 'polemk') !== null">
                                        <strong data-bind="html: vm.forStation($data, 'polemk')+' млн. м<sup>3</sup>'"></strong>
                                        <span data-bind='html: vm.forStationDiffFormatted($data, "polemk"), attr: { "class": vm.forStationDiffClass($data, "polemk") }'></span>
                                    </span>
                                    <span data-bind="visible: vm.forStation($data, 'polemk') === null">
                                        <strong>нет данных</strong>
                                    </span>
                                </p>
                                <p>
                                    Приток &mdash;
                                    <span data-bind="visible: vm.forStation($data, 'pritok') !== null">
                                        <strong data-bind="html: vm.forStation($data, 'pritok')+' м<sup>3</sup>/c'"></strong>
                                        <span data-bind='html: vm.forStationDiffFormatted($data, "pritok"), attr: { "class": vm.forStationDiffClass($data, "pritok") }'></span>
                                    </span>
                                    <span data-bind="visible: vm.forStation($data, 'pritok') === null">
                                        <strong>нет данных</strong>
                                    </span>
                                </p>
                                <p>
                                    Общий расход &mdash;
                                    <span data-bind="visible: vm.forStation($data, 'rashod') !== null">
                                        <strong data-bind="html: vm.forStation($data, 'rashod')+' м<sup>3</sup>/c'"></strong>
                                        <span data-bind='html: vm.forStationDiffFormatted($data, "rashod"), attr: { "class": vm.forStationDiffClass($data, "rashod") }'></span>
                                    </span>
                                    <span data-bind="visible: vm.forStation($data, 'rashod') === null">
                                        <strong>нет данных</strong>
                                    </span>
                                </p>
                                <p>
                                    Холостой сброс &mdash;
                                    <span data-bind="visible: vm.forStation($data, 'sbros') !== null">
                                        <strong data-bind="html: vm.forStation($data, 'sbros')+' м<sup>3</sup>/c'"></strong>
                                        <span data-bind='html: vm.forStationDiffFormatted($data, "sbros"), attr: { "class": vm.forStationDiffClass($data, "sbros") }'></span>
                                    </span>
                                    <span data-bind="visible: vm.forStation($data, 'sbros') === null">
                                        <strong>нет данных</strong>
                                    </span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="graphic" style="margin-right:-50px; width: 610px;">
                <div class="graphic-bg_3"></div>

                <div data-bind="foreach: stationsByBlock(3)">
                    <div class="water-lvl" data-bind='style: vm.forStationWaterStyle($data)'></div>
                </div>

                <div data-bind="foreach: stationsByBlock(3)">
                    <div class="pic" data-bind="style: vm.forStationDefault($data, 'positionPic')"></div>
                </div>

                <div data-bind="foreach: stationsByBlock(3)">
                    <div class="popup" data-bind="style: vm.forStationDefault($data, 'positionArea')">
                        <div class="area-cl" data-bind="style: vm.forStationDefault($data, 'positionAreaCl')"><span data-bind='html: vm.forStation($data, "uvb"), attr: { "class": vm.forStationDiffClass($data, "uvb") }, style: vm.forStationDefault($data, "positionUVB")'></span></div>
                        <div class="popup-info_wrap" data-bind="style: vm.forStationDefault($data, 'positionBottom')">
                            <div class="popup-info">
                                <p><span class="level-note" style="background-position:0 -18px;"></span>ФПУ &mdash; <strong data-bind="html: vm.forStationDefault($data, 'valueFPU')+' м'"></strong></p>
                                <p><span class="level-note"></span>НПУ &mdash; <strong data-bind="html: vm.forStationDefault($data, 'valueNPU')+' м'"></strong></p>
                                <p><span class="level-note" style="background-position:0 -35px;"></span>УМО &mdash; <strong data-bind="html: vm.forStationDefault($data, 'valueUMO')+' м'"></strong></p>
                                <p>
                                    Уровень &mdash;
                                    <span data-bind="visible: vm.forStation($data, 'uvb') !== null">
                                        <strong data-bind="html: vm.forStation($data, 'uvb')+' м'"></strong>
                                        <span data-bind='html: vm.forStationDiffFormatted($data, "uvb"), attr: { "class": vm.forStationDiffClass($data, "uvb") }'></span>
                                    </span>
                                    <span data-bind="visible: vm.forStation($data, 'uvb') === null">
                                        <strong>нет данных</strong>
                                    </span>
                                </p>
                                <p>
                                    Свободная ёмкость &mdash;
                                    <span data-bind="visible: vm.forStation($data, 'polemk') !== null">
                                        <strong data-bind="html: vm.forStation($data, 'polemk')+' млн. м<sup>3</sup>'"></strong>
                                        <span data-bind='html: vm.forStationDiffFormatted($data, "polemk"), attr: { "class": vm.forStationDiffClass($data, "polemk") }'></span>
                                    </span>
                                    <span data-bind="visible: vm.forStation($data, 'polemk') === null">
                                        <strong>нет данных</strong>
                                    </span>
                                </p>
                                <p>
                                    Приток &mdash;
                                    <span data-bind="visible: vm.forStation($data, 'pritok') !== null">
                                        <strong data-bind="html: vm.forStation($data, 'pritok')+' м<sup>3</sup>/c'"></strong>
                                        <span data-bind='html: vm.forStationDiffFormatted($data, "pritok"), attr: { "class": vm.forStationDiffClass($data, "pritok") }'></span>
                                    </span>
                                    <span data-bind="visible: vm.forStation($data, 'pritok') === null">
                                        <strong>нет данных</strong>
                                    </span>
                                </p>
                                <p>
                                    Общий расход &mdash;
                                    <span data-bind="visible: vm.forStation($data, 'rashod') !== null">
                                        <strong data-bind="html: vm.forStation($data, 'rashod')+' м<sup>3</sup>/c'"></strong>
                                        <span data-bind='html: vm.forStationDiffFormatted($data, "rashod"), attr: { "class": vm.forStationDiffClass($data, "rashod") }'></span>
                                    </span>
                                    <span data-bind="visible: vm.forStation($data, 'rashod') === null">
                                        <strong>нет данных</strong>
                                    </span>
                                </p>
                                <p>
                                    Холостой сброс &mdash;
                                    <span data-bind="visible: vm.forStation($data, 'sbros') !== null">
                                        <strong data-bind="html: vm.forStation($data, 'sbros')+' м<sup>3</sup>/c'"></strong>
                                        <span data-bind='html: vm.forStationDiffFormatted($data, "sbros"), attr: { "class": vm.forStationDiffClass($data, "sbros") }'></span>
                                    </span>
                                    <span data-bind="visible: vm.forStation($data, 'sbros') === null">
                                        <strong>нет данных</strong>
                                    </span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="graphic">
                <div class="graphic-bg"></div>

                <div data-bind="foreach: stationsByBlock(1)">
                    <div class="water-lvl" data-bind='style: vm.forStationWaterStyle($data)'></div>
                </div>
                <div data-bind="foreach: stationsByBlock(1)">
                    <div class="pic" data-bind="style: vm.forStationDefault($data, 'positionPic')"></div>
                </div>
                <div class="pic" style="left:745px; top:511px"></div>
                <div data-bind="foreach: stationsByBlock(1)">
                    <div class="popup" data-bind="style: vm.forStationDefault($data, 'positionArea')">
                        <div class="area-cl" data-bind="style: vm.forStationDefault($data, 'positionAreaCl')"><span data-bind='html: vm.forStation($data, "uvb"), attr: { "class": vm.forStationDiffClass($data, "uvb") }'></span></div>
                        <div class="popup-info_wrap" data-bind="style: vm.forStationDefault($data, 'positionBottom')">
                            <div class="popup-info">
                                <p><span class="level-note" style="background-position:0 -18px;"></span>ФПУ &mdash; <strong data-bind="html: vm.forStationDefault($data, 'valueFPU')+' м'"></strong></p>
                                <p><span class="level-note"></span>НПУ &mdash; <strong data-bind="html: vm.forStationDefault($data, 'valueNPU')+' м'"></strong></p>
                                <p><span class="level-note" style="background-position:0 -35px;"></span>УМО &mdash; <strong data-bind="html: vm.forStationDefault($data, 'valueUMO')+' м'"></strong></p>
                                <p>
                                    Уровень &mdash;
                                    <span data-bind="visible: vm.forStation($data, 'uvb') !== null">
                                        <strong data-bind="html: vm.forStation($data, 'uvb')+' м'"></strong>
                                        <span data-bind='html: vm.forStationDiffFormatted($data, "uvb"), attr: { "class": vm.forStationDiffClass($data, "uvb") }'></span>
                                    </span>
                                    <span data-bind="visible: vm.forStation($data, 'uvb') === null">
                                        <strong>нет данных</strong>
                                    </span>
                                </p>
                                <p>
                                    Свободная ёмкость &mdash;
                                    <span data-bind="visible: vm.forStation($data, 'polemk') !== null">
                                        <strong data-bind="html: vm.forStation($data, 'polemk')+' млн. м<sup>3</sup>'"></strong>
                                        <span data-bind='html: vm.forStationDiffFormatted($data, "polemk"), attr: { "class": vm.forStationDiffClass($data, "polemk") }'></span>
                                    </span>
                                    <span data-bind="visible: vm.forStation($data, 'polemk') === null">
                                        <strong>нет данных</strong>
                                    </span>
                                </p>
                                <p>
                                    Приток &mdash;
                                    <span data-bind="visible: vm.forStation($data, 'pritok') !== null">
                                        <strong data-bind="html: vm.forStation($data, 'pritok')+' м<sup>3</sup>/c'"></strong>
                                        <span data-bind='html: vm.forStationDiffFormatted($data, "pritok"), attr: { "class": vm.forStationDiffClass($data, "pritok") }'></span>
                                    </span>
                                    <span data-bind="visible: vm.forStation($data, 'pritok') === null">
                                        <strong>нет данных</strong>
                                    </span>
                                </p>
                                <p>
                                    Общий расход &mdash;
                                    <span data-bind="visible: vm.forStation($data, 'rashod') !== null">
                                        <strong data-bind="html: vm.forStation($data, 'rashod')+' м<sup>3</sup>/c'"></strong>
                                        <span data-bind='html: vm.forStationDiffFormatted($data, "rashod"), attr: { "class": vm.forStationDiffClass($data, "rashod") }'></span>
                                    </span>
                                    <span data-bind="visible: vm.forStation($data, 'rashod') === null">
                                        <strong>нет данных</strong>
                                    </span>
                                </p>
                                <p>
                                    Холостой сброс &mdash;
                                    <span data-bind="visible: vm.forStation($data, 'sbros') !== null">
                                        <strong data-bind="html: vm.forStation($data, 'sbros')+' м<sup>3</sup>/c'"></strong>
                                        <span data-bind='html: vm.forStationDiffFormatted($data, "sbros"), attr: { "class": vm.forStationDiffClass($data, "sbros") }'></span>
                                    </span>
                                    <span data-bind="visible: vm.forStation($data, 'sbros') === null">
                                        <strong>нет данных</strong>
                                    </span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="sshges-note">
                    <span>*</span> водохранилище Майнской ГЭС сглаживает неравномерность ежесуточных сбросов СШГЭС, когда Саяно-Шушенская ГЭС ведет глубокое регулирование нагрузки в энергосистеме
                </div>
            </div>
            <br/>

            <div class="graphic">
                <div class="graphic-bg_2" style="height:391px; margin-bottom: -40px"></div>
                

                <div data-bind="foreach: stationsByBlock(2)">
                    <div class="water-lvl" data-bind='style: vm.forStationWaterStyle($data)'></div>
                </div>

                <div data-bind="foreach: stationsByBlock(2)">
                    <div class="pic" data-bind="style: vm.forStationDefault($data, 'positionPic')"></div>
                </div>

                <div data-bind="foreach: stationsByBlock(2)">
                    <div class="popup" data-bind="style: vm.forStationDefault($data, 'positionArea')">
                        <div class="area-cl" data-bind="style: vm.forStationDefault($data, 'positionAreaCl')"><span data-bind='html: vm.forStation($data, "uvb"), attr: { "class": vm.forStationDiffClass($data, "uvb") }, style: vm.forStationDefault($data, "positionUVB")'></span></div>
                        <div class="popup-info_wrap" data-bind="style: vm.forStationDefault($data, 'positionBottom')">
                            <div class="popup-info">
                                <p><span class="level-note" style="background-position:0 -18px;"></span>ФПУ &mdash; <strong data-bind="html: vm.forStationDefault($data, 'valueFPU')+' м'"></strong></p>
                                <p><span class="level-note"></span>НПУ &mdash; <strong data-bind="html: vm.forStationDefault($data, 'valueNPU')+' м'"></strong></p>
                                <p><span class="level-note" style="background-position:0 -35px;"></span>УМО &mdash; <strong data-bind="html: vm.forStationDefault($data, 'valueUMO')+' м'"></strong></p>
                                <p>
                                    Уровень &mdash;
                                    <span data-bind="visible: vm.forStation($data, 'uvb') !== null">
                                        <strong data-bind="html: vm.forStation($data, 'uvb')+' м'"></strong>
                                        <span data-bind='html: vm.forStationDiffFormatted($data, "uvb"), attr: { "class": vm.forStationDiffClass($data, "uvb") }'></span>
                                    </span>
                                    <span data-bind="visible: vm.forStation($data, 'uvb') === null">
                                        <strong>нет данных</strong>
                                    </span>
                                </p>
                                <p>
                                    Свободная ёмкость &mdash;
                                    <span data-bind="visible: vm.forStation($data, 'polemk') !== null">
                                        <strong data-bind="html: vm.forStation($data, 'polemk')+' млн. м<sup>3</sup>'"></strong>
                                        <span data-bind='html: vm.forStationDiffFormatted($data, "polemk"), attr: { "class": vm.forStationDiffClass($data, "polemk") }'></span>
                                    </span>
                                    <span data-bind="visible: vm.forStation($data, 'polemk') === null">
                                        <strong>нет данных</strong>
                                    </span>
                                </p>
                                <p>
                                    Приток &mdash;
                                    <span data-bind="visible: vm.forStation($data, 'pritok') !== null">
                                        <strong data-bind="html: vm.forStation($data, 'pritok')+' м<sup>3</sup>/c'"></strong>
                                        <span data-bind='html: vm.forStationDiffFormatted($data, "pritok"), attr: { "class": vm.forStationDiffClass($data, "pritok") }'></span>
                                    </span>
                                    <span data-bind="visible: vm.forStation($data, 'pritok') === null">
                                        <strong>нет данных</strong>
                                    </span>
                                </p>
                                <p>
                                    Общий расход &mdash;
                                    <span data-bind="visible: vm.forStation($data, 'rashod') !== null">
                                        <strong data-bind="html: vm.forStation($data, 'rashod')+' м<sup>3</sup>/c'"></strong>
                                        <span data-bind='html: vm.forStationDiffFormatted($data, "rashod"), attr: { "class": vm.forStationDiffClass($data, "rashod") }'></span>
                                    </span>
                                    <span data-bind="visible: vm.forStation($data, 'rashod') === null">
                                        <strong>нет данных</strong>
                                    </span>
                                </p>
                                <p>
                                    Холостой сброс &mdash;
                                    <span data-bind="visible: vm.forStation($data, 'sbros') !== null">
                                        <strong data-bind="html: vm.forStation($data, 'sbros')+' м<sup>3</sup>/c'"></strong>
                                        <span data-bind='html: vm.forStationDiffFormatted($data, "sbros"), attr: { "class": vm.forStationDiffClass($data, "sbros") }'></span>
                                    </span>
                                    <span data-bind="visible: vm.forStation($data, 'sbros') === null">
                                        <strong>нет данных</strong>
                                    </span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div style="clear: both;"></div>
            
            <div class="graphic" style="float: left;">
                <div class="graphic-bg_8"></div>
                <div data-bind="foreach: stationsByBlock(8)">
                    <div class="water-lvl" data-bind='style: vm.forStationWaterStyle($data)'></div>
                </div>
                <div data-bind="foreach: stationsByBlock(8)">
                    <div class="pic" data-bind="style: vm.forStationDefault($data, 'positionPic')"></div>
                </div>
                <div data-bind="foreach: stationsByBlock(8)">
                    <div class="popup" data-bind="style: vm.forStationDefault($data, 'positionArea')">
                        <div class="area-cl" data-bind="style: vm.forStationDefault($data, 'positionAreaCl')"><span data-bind='html: vm.forStation($data, "uvb"), attr: { "class": vm.forStationDiffClass($data, "uvb") }, style: vm.forStationDefault($data, "positionUVB")'></span></div>
                        <div class="popup-info_wrap" data-bind="style: vm.forStationDefault($data, 'positionBottom')">
                            <div class="popup-info">
                                <p><span class="level-note" style="background-position:0 -18px;"></span>ФПУ &mdash; <strong data-bind="html: vm.forStationDefault($data, 'valueFPU')+' м'"></strong></p>
                                <p><span class="level-note"></span>НПУ &mdash; <strong data-bind="html: vm.forStationDefault($data, 'valueNPU')+' м'"></strong></p>
                                <p><span class="level-note" style="background-position:0 -35px;"></span>УМО &mdash; <strong data-bind="html: vm.forStationDefault($data, 'valueUMO')+' м'"></strong></p>
                                <p>
                                    Уровень &mdash;
                                    <span data-bind="visible: vm.forStation($data, 'uvb') !== null">
                                        <strong data-bind="html: vm.forStation($data, 'uvb')+' м'"></strong>
                                        <span data-bind='html: vm.forStationDiffFormatted($data, "uvb"), attr: { "class": vm.forStationDiffClass($data, "uvb") }'></span>
                                    </span>
                                    <span data-bind="visible: vm.forStation($data, 'uvb') === null">
                                        <strong>нет данных</strong>
                                    </span>
                                </p>
                                <p>
                                    Свободная ёмкость &mdash;
                                    <span data-bind="visible: vm.forStation($data, 'polemk') !== null">
                                        <strong data-bind="html: vm.forStation($data, 'polemk')+' млн. м<sup>3</sup>'"></strong>
                                        <span data-bind='html: vm.forStationDiffFormatted($data, "polemk"), attr: { "class": vm.forStationDiffClass($data, "polemk") }'></span>
                                    </span>
                                    <span data-bind="visible: vm.forStation($data, 'polemk') === null">
                                        <strong>нет данных</strong>
                                    </span>
                                </p>
                                <p>
                                    Приток &mdash;
                                    <span data-bind="visible: vm.forStation($data, 'pritok') !== null">
                                        <strong data-bind="html: vm.forStation($data, 'pritok')+' м<sup>3</sup>/c'"></strong>
                                        <span data-bind='html: vm.forStationDiffFormatted($data, "pritok"), attr: { "class": vm.forStationDiffClass($data, "pritok") }'></span>
                                    </span>
                                    <span data-bind="visible: vm.forStation($data, 'pritok') === null">
                                        <strong>нет данных</strong>
                                    </span>
                                </p>
                                <p>
                                    Общий расход &mdash;
                                    <span data-bind="visible: vm.forStation($data, 'rashod') !== null">
                                        <strong data-bind="html: vm.forStation($data, 'rashod')+' м<sup>3</sup>/c'"></strong>
                                        <span data-bind='html: vm.forStationDiffFormatted($data, "rashod"), attr: { "class": vm.forStationDiffClass($data, "rashod") }'></span>
                                    </span>
                                    <span data-bind="visible: vm.forStation($data, 'rashod') === null">
                                        <strong>нет данных</strong>
                                    </span>
                                </p>
                                <p>
                                    Холостой сброс &mdash;
                                    <span data-bind="visible: vm.forStation($data, 'sbros') !== null">
                                        <strong data-bind="html: vm.forStation($data, 'sbros')+' м<sup>3</sup>/c'"></strong>
                                        <span data-bind='html: vm.forStationDiffFormatted($data, "sbros"), attr: { "class": vm.forStationDiffClass($data, "sbros") }'></span>
                                    </span>
                                    <span data-bind="visible: vm.forStation($data, 'sbros') === null">
                                        <strong>нет данных</strong>
                                    </span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="graphic" style="float: left;">
                <div class="graphic-bg_9"></div>
                <div data-bind="foreach: stationsByBlock(9)">
                    <div class="water-lvl" data-bind='style: vm.forStationWaterStyle($data)'></div>
                </div>
                <div data-bind="foreach: stationsByBlock(9)">
                    <div class="pic" data-bind="style: vm.forStationDefault($data, 'positionPic')"></div>
                </div>
                <div data-bind="foreach: stationsByBlock(9)">
                    <div class="popup" data-bind="style: vm.forStationDefault($data, 'positionArea')">
                        <div class="area-cl" data-bind="style: vm.forStationDefault($data, 'positionAreaCl')"><span data-bind='html: vm.forStation($data, "uvb"), attr: { "class": vm.forStationDiffClass($data, "uvb") }, style: vm.forStationDefault($data, "positionUVB")'></span></div>
                        <div class="popup-info_wrap" data-bind="style: vm.forStationDefault($data, 'positionBottom')">
                            <div class="popup-info">
                                <p><span class="level-note" style="background-position:0 -18px;"></span>ФПУ &mdash; <strong data-bind="html: vm.forStationDefault($data, 'valueFPU')+' м'"></strong></p>
                                <p><span class="level-note"></span>НПУ &mdash; <strong data-bind="html: vm.forStationDefault($data, 'valueNPU')+' м'"></strong></p>
                                <p><span class="level-note" style="background-position:0 -35px;"></span>УМО &mdash; <strong data-bind="html: vm.forStationDefault($data, 'valueUMO')+' м'"></strong></p>
                                <p>
                                    Уровень &mdash;
                                    <span data-bind="visible: vm.forStation($data, 'uvb') !== null">
                                        <strong data-bind="html: vm.forStation($data, 'uvb')+' м'"></strong>
                                        <span data-bind='html: vm.forStationDiffFormatted($data, "uvb"), attr: { "class": vm.forStationDiffClass($data, "uvb") }'></span>
                                    </span>
                                    <span data-bind="visible: vm.forStation($data, 'uvb') === null">
                                        <strong>нет данных</strong>
                                    </span>
                                </p>
                                <p>
                                    Свободная ёмкость &mdash;
                                    <span data-bind="visible: vm.forStation($data, 'polemk') !== null">
                                        <strong data-bind="html: vm.forStation($data, 'polemk')+' млн. м<sup>3</sup>'"></strong>
                                        <span data-bind='html: vm.forStationDiffFormatted($data, "polemk"), attr: { "class": vm.forStationDiffClass($data, "polemk") }'></span>
                                    </span>
                                    <span data-bind="visible: vm.forStation($data, 'polemk') === null">
                                        <strong>нет данных</strong>
                                    </span>
                                </p>
                                <p>
                                    Приток &mdash;
                                    <span data-bind="visible: vm.forStation($data, 'pritok') !== null">
                                        <strong data-bind="html: vm.forStation($data, 'pritok')+' м<sup>3</sup>/c'"></strong>
                                        <span data-bind='html: vm.forStationDiffFormatted($data, "pritok"), attr: { "class": vm.forStationDiffClass($data, "pritok") }'></span>
                                    </span>
                                    <span data-bind="visible: vm.forStation($data, 'pritok') === null">
                                        <strong>нет данных</strong>
                                    </span>
                                </p>
                                <p>
                                    Общий расход &mdash;
                                    <span data-bind="visible: vm.forStation($data, 'rashod') !== null">
                                        <strong data-bind="html: vm.forStation($data, 'rashod')+' м<sup>3</sup>/c'"></strong>
                                        <span data-bind='html: vm.forStationDiffFormatted($data, "rashod"), attr: { "class": vm.forStationDiffClass($data, "rashod") }'></span>
                                    </span>
                                    <span data-bind="visible: vm.forStation($data, 'rashod') === null">
                                        <strong>нет данных</strong>
                                    </span>
                                </p>
                                <p>
                                    Холостой сброс &mdash;
                                    <span data-bind="visible: vm.forStation($data, 'sbros') !== null">
                                        <strong data-bind="html: vm.forStation($data, 'sbros')+' м<sup>3</sup>/c'"></strong>
                                        <span data-bind='html: vm.forStationDiffFormatted($data, "sbros"), attr: { "class": vm.forStationDiffClass($data, "sbros") }'></span>
                                    </span>
                                    <span data-bind="visible: vm.forStation($data, 'sbros') === null">
                                        <strong>нет данных</strong>
                                    </span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
			<div style="clear: both;"></div>
			
			<div class="footer-note">				
				<div class="footer-note_item">
					<span>*</span>Данные предоставляются по будням с 11.09.2013.<br> 
					Данные по Иркутской, Братской и Усть-Илимской ГЭС предоставлены ОАО «Иркутскэнерго». <br> 
					Данные о гидрологической обстановке и состоянии водного режима работы ГЭС филиалов и ДЗО ПАО «РусГидро» приводятся по состоянию на 08.00 утра и публикуются до 14:00 (по МСК). <br> 
					Данные по приточности и расходам приводятся в среднем по состоянию за прошедшие сутки. 
				</div>
				<div class="footer-note_item">
					<span>**</span>Данные предоставляются с 19.03.2018.
				</div>
			</div>			
            
            

            <div id="note">
				<!--
                <div id="legend">
                    <h2>Условные обозначения</h2>
                    <p><span class="level-note" style="background-position:0 -18px;"></span><strong>ФПУ</strong> - Форсированный подпорный уровень, предельная отметка наполнения водохранилища при прохождении половодий редкой повторяемости, м</p>
                    <p><span class="level-note"></span><strong>НПУ</strong> - Нормальный подпорный уровень, отметка заполненного водохранилища, м</p>
                    <p><span class="level-note" style="background-position:0 -35px;"></span><strong>УМО</strong> - Уровень мёртвого объёма, отметка предельной сработки водохранилища в зимний период, м</p>
                    <p><strong>Уровень</strong> - Текущая отметка уровня воды в водохранилище с учетом сгонно-нагонных явлений на 8:00 (МСК), м</p>
                    <p><strong>Свободная ёмкость</strong> - Объем между текущим уровнем и НПУ, м<sup>3</sup> </p>
                    <p><strong>Приток</strong> - Количество воды, поступившей в водохранилище за предыдущие сутки, м<sup>3</sup>/с </p>
                    <p><strong>Общий расход</strong> - Количество воды, пропускаемой через гидроузел (турбины и водосбросы) за предыдущие сутки,  м<sup>3</sup>/сек (среднесуточное значение)</p>
                    <p><strong>Холостой сброс</strong> - Количество воды, сбрасываемой через водосбросы мимо турбин за предыдущие сутки, за исключением воды, затраченной на шлюзование, м<sup>3</sup>/с (среднесуточное значение) </p>
                </div>
				-->
				<div id="legend">
                    <h2>Условные обозначения</h2>
                    <p><span class="level-note" style="background-position:0 -18px;"></span><strong>ФПУ</strong> - Подпорный уровень выше нормального, допускаемый в верхнем бьефе в особых условиях эксплуатации 
					гидротехнических сооружений при сбросе паводков малой обеспеченности.</p>
                    <p><span class="level-note"></span><strong>НПУ</strong> - Нормальный подпорный уровень - Наивысший подпорный уровень, который может поддерживаться в нормальных условиях эксплуатации.</p>
                    <p><span class="level-note" style="background-position:0 -35px;"></span><strong>УМО</strong> - Наинизший уровень воды в водохранилище, допустимый по условиям нормальной эксплуатации гидроузла.</p>
                    <p><strong>Уровень</strong> - Текущая отметка уровня воды в водохранилище с учетом сгонно-нагонных явлений на 8:00 (МСК), м</p>
                    <p><strong>Свободная ёмкость</strong> - Объем между текущим уровнем и НПУ, м<sup>3</sup> </p>
                    <p><strong>Приток</strong> - Количество воды, поступившей в водохранилище за предыдущие сутки, м<sup>3</sup>/с </p>
                    <p><strong>Общий расход</strong> - Количество воды, пропускаемой через гидроузел (турбины и водосбросы) за предыдущие сутки,  м<sup>3</sup>/сек (среднесуточное значение)</p>
                    <p><strong>Холостой сброс</strong> - Количество воды, сбрасываемой через водосбросы мимо турбин за предыдущие сутки, за исключением воды, затраченной на шлюзование, м<sup>3</sup>/с (среднесуточное значение) </p>
                </div>
                <!--<div id="code">
                    <i></i>
                    <h3>Код для вставки в блог</h3>
                    <span>Кликните по серой области и нажмите на Ctrl+C, чтобы скопировать выделенный текст</span>
                    <textarea data-bind="value: linkForCurrentDate"></textarea>
                </div>-->
            </div>
            <!--p style="padding-left:20px; padding-top:12px;"><i>Данные по уровню водохранилищ ГЭС РусГидро приводятся на 08:00 часов</i></p-->
        </div>

        <script type="text/javascript">
            "use strict";

            $(function () {
                var roundFields = ['polemk', 'pritok', 'sbros'],

                extractUrlParams = function (url) {
                    var pairs = null, pair = null, result = {}, i;
                    if (!url.indexOf('?')) return result;

                    url = url.substr(url.indexOf('?') + 1);
                    pairs = url.split('&');
                    for (i = 0; i < pairs.length; i++) {
                        pair = pairs[i].split('=');
                        if (pair.length === 2) {
                            result[decodeURIComponent(pair[0])] = decodeURIComponent(pair[1]);
                        }
                    }

                    return result;
                };

                function RecordViewModel(date, station, params)
                {
                    var fields = ['uvb', 'polemk', 'pritok', 'rashod', 'sbros'], i, fullData = true;
                    for (i = 0; i < fields.length; i++) {
                        this[fields[i]] = ko.observable(i < params.length ? params[i] : null);
                        if (i >= params.length) fullData = false;
                    }

                    this.date = ko.observable(date);
                    this.station = ko.observable(station);
                    this.hasFullData = ko.observable(fullData);
                }

                function ViewModel()
                {
                    var self = this,
                    currentDate = ko.observable(null),

                    byDate = ko.observable({}),
                    byStation = ko.observable({}),

                    findPrevDate = function (date) {
                        var currentDateIndex = _.indexOf(self.dates(), date);

                        return currentDateIndex < self.dates().length ? self.dates()[currentDateIndex + 1] : null;
                    };

                    this.dataLoading = ko.observable(false);

                    this.defaults = ko.observable({});
                    this.dates = ko.observableArray();
                    this.currentDate = ko.computed({
                        read: function () {
                            return self.dates().length ? (currentDate() === null ? self.dates()[0] : currentDate()) : null;
                        },

                        write: function (v) {
                            if (_.indexOf(self.dates(), v) < 0 || self.dataLoading()) return;

                            var i,
                            dates = [],
                            promises = [],
                            prevDate = findPrevDate(v);

                            dates.push(v);
                            if (prevDate) dates.push(prevDate);

                            self.dataLoading(true);

                            _.each(dates, function (date) {
                                promises.push(byDate()[date] ? null : $.ajax({
                                    type:'GET',
                                    url:'ajax.php?type=searchByDate&date='+date,
                                    dataType:'json'
                                }));
                            });

                            $.when.apply(this, promises).done(function () {
                                _.each(arguments, function (data, index) {
                                    if (data !== null) self.insertDay(dates[index], data.length ? data[0] : data);
                                });

                                currentDate(v);
                                self.dataLoading(false);
                            })
                            .fail(function (o,e) {
                                alert('Ajax failed: ' + e + '.');
                            });
                        }
                    });

                    this.stations = ko.computed(function () {
                        return _.keys(self.defaults());
                    });

                    this.stationsByBlock = function (block) {
                        return _.filter(self.stations(), function (s) {
                            return self.defaults()[s] ? (self.defaults()[s].block === block) : false;
                        });
                    };

                    this.fields = ko.observableArray(['uvb', 'polemk', 'pritok', 'rashod', 'sbros']);

                    this.insertDay = function (date, data) {
                        var d = byDate(), s = byStation(), station = null, record = null;

                        if (!d[date]) d[date] = {};
                        for (station in data) {
                            record = new RecordViewModel(date, station, data[station]);

                            d[date][station] = record;

                            if (!s[station]) s[station] = {};
                            s[station][date] = record;
                        }

                        byDate(d);
                        byStation(s);

                        return self;
                    };

                    this.currentData = ko.computed(function () {
                        return self.currentDate() ? byDate()[self.currentDate()] : null;
                    });

                    this.formatNumber = function (n, field) {
                        if (field && _.indexOf(roundFields, field) >= 0) {
                            return n !== null ? Math.round(n) : null;
                        } else {
                            return n !== null ? parseFloat(n).toFixed(2).replace('.00', '') : null;
                        }
                    };

                    this.forStation = function (station, field) {
                        var data = self.currentData() ? self.currentData()[station] : null;
                        if (!data) return null;
                        return self.formatNumber(data[field](), field);
                    };

                    this.forStationPrev = function (station, field) {
                        var days = byStation()[station], prevDate = null;
                        if (!days) return null;

                        prevDate = findPrevDate(self.currentDate());
                        if (!prevDate || !days[prevDate]) return null;
                        return self.formatNumber(days[prevDate][field](), field);
                    };

                    this.forStationDiff = function (station, field) {
                        var current = self.forStation(station, field), prev = self.forStationPrev(station, field);
                        if (current === null || prev === null) return null;
                        return current - prev;
                    };

                    this.forStationDiffFormatted = function (station, field) {
                        var diff = self.forStationDiff(station, field);
                        if (diff === null || diff === 0) return '';
                        return self.formatNumber(Math.abs(diff), field);
                    };

                    this.forStationDiffClass = function (station, field) {
                        var diff = self.forStationDiff(station, field);
                        if (diff === null || diff === 0) return '';
                        return diff > 0 ? 'up' : 'down';
                    }

                    this.forStationDefault = function (station, field) {
                        var d = self.defaults();

                        return d[station] && d[station][field] ? d[station][field] : null;
                    };

                    this.forStationWaterStyle = function (station) {

                        if (_.isNull(self.forStation(station, 'uvb'))) {
                            var waterln = self.forStationDefault(station, 'pixelNPU')+'px';
                        } else {
                            var waterln = (self.forStationDefault(station, 'pixelNPU') * (self.forStation(station, 'uvb') - self.forStationDefault(station, 'metrDown')) / (self.forStationDefault(station, 'valueFPU') - self.forStationDefault(station, 'metrDown'))) + 'px'
                        }

                        return _.extend(self.forStationDefault(station, 'positionW'), {
                            height: waterln
                        });
                    };

                    this.hasFullData = function (station) {
                        return self.forStation(station, 'hasFullData');
                    };

                    /*this.linkForCurrentDate = ko.computed(function () {
                        return '<iframe src="http://www.rushydro.ru/hydrology/informer/' + (self.currentDate() ? '?date=' + self.currentDate() : '') + '" height="1230" width="1000" frameborder="no"></iframe>';
                    });*/
                }

                window.vm = new ViewModel();

                vm.defaults({
                    'Волжское': {
                        block: 1,
                        positionW: {left:'763px', bottom:'390px', width:'140px', height:'45px'},
                        positionPic: {left:'763px', top:'239px'},
                        positionArea: {left:'833px', top:'216px', width:'105px'},
                        valueNPU: 15,
                        valueFPU: 16.3,
                        valueUMO: 12,
                        pixelNPU: 47,
                        metrDown: -10,
                        positionBottom: {left:'auto', right:'-36px'}
                    },

                    'Воткинское': {
                        block: 1,
                        positionW: {left:'190px', bottom:'139px', width:'109px', height:'60px'},
                        positionPic: {left:'190px', top:'475px'},
                        positionArea: {left:'320px', top:'461px', width:'115px'},
                        valueNPU: 89,
                        valueFPU: 90,
                        valueUMO: 84,
                        pixelNPU: 64,
                        metrDown: 58,
                        positionBottom: ''
                    },

                    'Куйбышевское': {
                        block: 1,
                        positionW: {left:'500px', bottom:'445px', width:'140px', height:'45px'},
                        positionPic: {left:'500px', top:'174px'},
                        positionArea: {left:'674px', top:'152px', width:'123px'},
                        valueNPU: 53,
                        valueFPU: 55.3,
                        valueUMO: 45.5,
                        pixelNPU: 58,
                        metrDown: 21
                    },

                    'Камское': {
                        block: 1,
                        positionW: {left:'47px', bottom:'188px', width:'134px', height:'50px'},
                        positionPic: {left:'47px', top:'535px', width:'0px'},
                        positionArea: {left:'202px', top:'424px', width:'95px'},
                        valueNPU: 108.5,
                        valueFPU: 110.2,
                        valueUMO: 100,
                        pixelNPU: 54,
                        metrDown: 83,
                        positionBottom: ''
                    },

                    'Горьковское': {
                        block: 1,
                        positionW: {left:'255px', bottom:'495px', width:'136px', height:'45px'},
                        positionPic: {left:'255px', top:'133px'},
                        positionArea: {left:'427px', top:'99px', width:'155px'},
                        valueNPU: 84,
                        valueFPU: 85.5,
                        valueUMO: 81,
                        pixelNPU: 60,
                        metrDown: 51
                    },

                    'Рыбинское': {
                        block: 1,
                        positionW: {left:'220px', bottom:'521px', width:'26px', height:'45px', backgroundPosition: '-20px 0'},
                        positionPic: {left:'220px', top:'119px'},
                        positionArea: {left:'264px', top:'87px', width:'111px'},
                        valueNPU: 101.81,
                        valueFPU: 103.81,
                        valueUMO: 96.91,
                        pixelNPU: 65,
                        metrDown: 68
                    },

                    'Саратовское': {
                        block: 1,
                        positionW: {left:'649px', bottom:'418px', width:'105px', height:'45px'},
                        positionPic: {left:'649px', top:'212px'},
                        positionArea: {left:'792px', top:'175px', width:'120px'},
                        valueNPU: 28,
                        valueFPU: 31.4,
                        valueUMO: 27,
                        pixelNPU: 46,
                        metrDown: 7,
                        positionBottom: {left:'auto', right:'-60px'}
                    },

                    'Саяно-Шушенское': {
                        block: 1,
                        positionW: {left:'603px', bottom:'137px', width:'133px', height:'65px'},
                        positionPic: {left:'603px', top:'535px', width:'0px'},
                        positionArea: {left:'757px', top:'463px', width:'158px'},
                        valueNPU: 539,
                        valueFPU: 540,
                        valueUMO: 500,
                        pixelNPU: 66,
                        metrDown: 315,
                        positionBottom: {left:'auto', right:'-36px'}
                    },

                    'Угличское': {
                        block: 1,
                        positionW: {left:'185px', bottom:'541px', width:'26px', height: '45px', backgroundPosition:'-20px 0'},
                        positionPic: {left:'185px', top:'105px'},
                        positionArea: {left:'257px', top:'45px', width:'101px'},
                        valueNPU: 113,
                        valueFPU: 113.4,
                        valueUMO: 109,
                        pixelNPU: 60,
                        metrDown: 79
                    },

                    'Чебоксарское': {
                        block: 1,
                        positionW: {left:'400px', bottom:'481px', width:'91px', height:'45px'},
                        positionPic: {left:'400px', top:'159px'},
                        positionArea: {left:'522px', top:'119px', width:'126px'},
                        valueNPU: 63.3,
                        valueFPU: 69.5,
                        valueUMO: 62.5,
                        pixelNPU: 49,
                        metrDown: 42
                    },

                    'Новосибирское': {
                        block: 2,
                        positionW: {left:'622px', bottom:'190px', width:'156px', height:'45px'},
                        positionPic: {display:'none'},
                        positionArea: {left:'725px', top:'94px', width:'136px'},
                        valueNPU: 113.5,
                        valueFPU: 115.7,
                        valueUMO: 108.5,
                        pixelNPU: 67,
                        metrDown: 91,
                        positionUVB: {left:'78px'},
                        positionBottom: {left:'auto', right:'-60px'}
                    },

                    'Богучанское': {
                        block: 2,
                        positionW: {left:'321px', bottom:'158px', width:'114px', height:'45px'},
                        positionPic: {left:'328px', top:'163px'},
                        positionArea: {left:'405px', top:'156px', width:'120px'},
                        valueNPU: 208,
                        valueFPU: 209.5,
                        valueUMO: 207,
                        pixelNPU: 36,
                        metrDown: 139,
                        positionUVB: {left:'57px'}
                    },

                    'Усть-Илимское (БС)': {
                        block: 2,
                        positionW: {left:'233px', bottom:'194px', width:'85px', height:'45px'},
                        positionPic: {left:'233px', top:'113px'},
                        positionArea: {left:'337px', top:'114px', width:'120px'},
                        valueNPU: 296,
                        valueFPU: 296.6,
                        valueUMO: 294.5,
                        pixelNPU: 46,
                        metrDown: 205,
                        positionUVB: {left:'17px'}
                    },

                    'Братское (ТО)': {
                        block: 2,
                        positionW: {left:'128px', bottom:'227px', width:'95px', height:'45px'},
                        positionPic: {left:'130px', top:'73px'},
                        positionArea: {left:'242px', top:'60px', width:'100px'},
                        valueNPU: 402.08,
                        valueFPU: 402.5,
                        valueUMO: 392.08,
                        pixelNPU: 69,
                        metrDown: 275,
                        positionUVB: {left:'17px'}
                    },

                    'Оз. Байкал (ТО)': {
                        block: 2,
                        positionW: {left:'54px', bottom:'284px', width:'66px', height:'45px'},
                        positionPic: {display:'none'},
                        positionArea: {left:'129px', top:'35px', width:'110px'},
                        valueNPU: 457,
                        valueFPU: 458.2,
                        valueUMO: 455.54,
                        pixelNPU: 40,
                        metrDown: 385,
                        positionUVB: {left:'17px'}
                    },

                    'Зейское': {
                        block: 3,
                        positionW: {left:'57px', bottom:'103px', width:'178px', height:'45px'},
                        positionPic: {left:'321px', top:'163px', width: '0px'},
                        positionArea: {left:'183px', top:'74px', width:'118px'},
                        valueNPU: 315,
                        valueFPU: 322.1,
                        valueUMO: 299,
                        pixelNPU: 74,
                        metrDown: 230,
                        positionUVB: {left:'71px'},
                        positionBottom: {bottom: 'auto', top: '0'}
                    },

                    'Бурейское': {
                        block: 3,
                        positionW: {left:'369px', bottom:'99px', width:'167px', height:'45px'},
                        positionPic: {left:'223px', top:'163px', width: '0px'},
                        positionArea: {left:'484px', top:'90px', width:'120px'},
                        valueNPU: 256,
                        valueFPU: 263.4,
                        valueUMO: 236,
                        pixelNPU: 60,
                        metrDown: 120,
                        positionUVB: {left:'76px'},
                        positionBottom: {bottom: 'auto', top: '0'}
                    },

                    'Колымское': {
                        block: 4,
                        positionW: {left:'57px', bottom:'128px', width:'88px', height:'45px'},
                        positionPic: {left:'321px', top:'163px', width: '0px'},
                        positionArea: {left:'101px', top:'53px', width:'118px'},
                        valueNPU: 451.5,
                        valueFPU: 457.6,
                        valueUMO: 432,
                        pixelNPU: 67,
                        metrDown: 240,
                        positionUVB: {left:'71px'},
                        positionBottom: {bottom: 'auto', top: '0', left: "-45px"}
                    },

                    'Усть-Среднеканское': {
                        block: 4,
                        positionW: {left:'200px', bottom:'109px', width:'36px', height:'45px'},
                        positionPic: {left:'321px', top:'163px', width: '0px'},
                        positionArea: {left:'206px', top:'96px', width:'120px'},
                        valueNPU: 256.5,
                        valueFPU: 257.6,
                        valueUMO: 255.2,
                        pixelNPU: 30,
                        metrDown: 175,
                        positionUVB: {left:'76px'},
                        positionBottom: {bottom: 'auto', top: '0', left: "auto", right: "-20px"}
                    },

                    'Ирганайское': {
                        block: 8,
                        positionW: {left:'59px', bottom:'99px', width:'177px', height:'45px'},
                        positionPic: {left:'223px', top:'163px', width: '0px'},
                        positionArea: {left:'184px', top:'70px', width:'130px'},
                        valueNPU: 547,
                        valueFPU: 548.7,
                        valueUMO: 520,
                        pixelNPU: 75,
                        metrDown: 240,
                        positionUVB: {left:'76px'},
                        positionBottom: {bottom: 'auto', top: '0'}
                    },

                    'Чиркейское': {
                        block: 9,
                        positionW: {left:'59px', bottom:'99px', width:'167px', height:'45px'},
                        positionPic: {left:'223px', top:'163px', width: '0px'},
                        positionArea: {left:'174px', top:'60px', width:'130px'},
                        valueNPU: 355,
                        valueFPU: 357.3,
                        valueUMO: 315,
                        pixelNPU: 88,
                        metrDown: 260,
                        positionUVB: {left:'76px'},
                        positionBottom: {bottom: 'auto', top: '0'}
                    }

                });

                ko.applyBindings(vm);

                vm.dataLoading(true);
                $.ajax({
                    type: 'GET',
                    url: 'ajax.php?type=allDates',//'data.json?rnd='+Math.random(),//
                    dataType: 'json'
                })
                .done(function (data) {
                    var params = extractUrlParams(location.href), date;

                    vm.dataLoading(false);
                    ko.tasks.processImmediate(function () {
                        vm.dates(data);
                        vm.currentDate(params['date'] || data[0]);
                    });
                })
                .fail(function (o, e) {
                    alert('Ajax failed: ' + e + '.');
                });

                $('.graphic').on('mouseenter', '.popup', function () {
                        $(this).css({zIndex: "5"});
                        $(this).find('.popup-info_wrap').stop(true,true).fadeIn(300);
                    }
                );

                $('.graphic').on('mouseleave', '.popup', function () {
                        $(this).find('.popup-info_wrap').hide();
                        $(this).css({zIndex: "4"});
                    }
                );
                $("#code").click(function () {$("#code textarea").select();});
            });
        </script>
        <!-- Yandex.Metrika counter -->
        <script type="text/javascript">
            (function (d, w, c) {
                (w[c] = w[c] || []).push(function() {
                    try {
                        w.yaCounter38342385 = new Ya.Metrika({
                            id:38342385,
                            clickmap:true,
                            trackLinks:true,
                            accurateTrackBounce:true,
                            webvisor:true
                        });
                    } catch(e) { }
                });
        
                var n = d.getElementsByTagName("script")[0],
                    s = d.createElement("script"),
                    f = function () { n.parentNode.insertBefore(s, n); };
                s.type = "text/javascript";
                s.async = true;
                s.src = "https://mc.yandex.ru/metrika/watch.js";
        
                if (w.opera == "[object Opera]") {
                    d.addEventListener("DOMContentLoaded", f, false);
                } else { f(); }
            })(document, window, "yandex_metrika_callbacks");
        </script>
        <noscript><div><img src="https://mc.yandex.ru/watch/38342385" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
        <!-- /Yandex.Metrika counter -->                        
</body>
</html>
