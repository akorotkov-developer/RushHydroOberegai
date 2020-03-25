<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?  if (RhdHandler::isFilial()) {?>
    <div id="search" class="new-search new-search-filial">
        <form action="<?=$arResult["FORM_ACTION"]?>">
            <?global $grayClass;?>
            <input type="image" class="sbmt" src="<?=SITE_TEMPLATE_PATH?>/i/ic_search.png?1" />
            <div class="inp"><i></i><input type="text" title="<?=RhdHandler::isEnglish() ? 'search' : 'поиск по сайту'?>" name="q" value="<?=RhdHandler::isEnglish() ? 'search' : 'поиск по сайту'?>" /></div>
        </form>
    </div>
    <?} else {?>
        <div id="search" class="new-search">
            <form action="<?=$arResult["FORM_ACTION"]?>">
                <?global $grayClass;?>
                <input type="image" class="sbmt" src="<?=SITE_TEMPLATE_PATH?>/i/ic_search.png?1" />
                <div class="inp"><i></i><input type="text" title="<?=RhdHandler::isEnglish() ? 'search' : 'поиск по сайту'?>" name="q" value="<?=RhdHandler::isEnglish() ? 'search' : 'поиск по сайту'?>" /></div>
            </form>
        </div>
    <?}?>
