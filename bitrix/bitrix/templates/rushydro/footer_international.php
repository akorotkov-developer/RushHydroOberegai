<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
IncludeTemplateLangFile(__FILE__);
?>
                        </div>
                    </td>
                    <td style="vertical-align:top">
                        <?$APPLICATION->IncludeFile(
                            $APPLICATION->GetTemplatePath('right_international.php'),
                            Array('siteNews' => $GLOBALS['siteNews']),
                            Array("MODE"=>"html")
                        );?>
                    </td>
                </tr>
            </table>
        </div>
        <?php require_once __DIR__.'/footer_common.php'; ?>
