<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
IncludeTemplateLangFile(__FILE__);
?>
                        </div>
                    </td>
                    <td style="vertical-align:top">
                        <?$APPLICATION->IncludeFile(
                            $APPLICATION->GetTemplatePath('right.php'),
                            Array('importantText' => $GLOBALS['importantText'], 'siteNews' => $GLOBALS['siteNews']),
                            Array("MODE"=>"html")
                        );?>
                        <?php if (!RhdHandler::isEnglish()) { ?>
                            <!--<a href="<?=RhdPath::createUrl(RhdHandler::getMainSiteCode(), 'subscribe')?>" class="subscribe_btn">подписка на новости</a>-->
                        <?}?>
                    </td>
                </tr>
            </table>
        </div>
        <?php require_once __DIR__.'/footer_common.php'; ?>
