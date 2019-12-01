<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");

CModule::IncludeModule('iblock');
	$count = null;
		
	if (
		isset($_POST['id'])
		&& is_numeric($_POST['id'])
	) {
		$count = 0;

		$id = intval($_POST['id']);

		$cookie = isset($_COOKIE[SALT_COOKIE]) ? $_COOKIE[SALT_COOKIE] : null;
		if ($cookie === null && isset($_POST['c'])) {
			preg_match('/'.SALT_COOKIE.'=([\d\-]+);/', $_POST['c'], $m);
			$cookie = $m ? $m[1] : null;
		}

		$correctCookie = get_like_salt($_SERVER['HTTP_X_REAL_IP']);

		$photo =
			CIBlockElement::GetList(
				array(),
				array('IBLOCK_ID' => 18, 'ID' => $id)
			)->GetNextElement();

		if (!$photo) die();

		$likeValue = $photo->GetProperty('LIKES');
		$count = intval($likeValue['VALUE']);
		if(isBlackOut()){
			$sessionKey = 'fotokonkurs_id_'.$photo->fields['IBLOCK_SECTION_ID'];
			if (
				!empty($_SERVER['HTTP_REFERER'])
				&& isset($_POST['c'])
				&& ($cookie === $correctCookie)
				&& !isset($_COOKIE[$sessionKey])
			) {
				$count++;
				$section = new CIBlockElement;
				$section->Update($id, array('LIKES' => $count));
				 CIBlockElement::SetPropertyValues($id, 18, $count, 'LIKES');
				//$_COOKIE[$sessionKey] = $photo['ID'];
				setcookie($sessionKey, 1, time() + 60*60*24*365*5);
			}
		}
	}
	elseif (isset($_POST['ids']) && is_array($_POST['ids'])) {
		$count = array();
		$rsPhotos = CIBlockElement::GetList(array(), array('IBLOCK_ID' => 18, 'ID' => $_POST['ids']));
		while ($photo = $rsPhotos->GetNextElement()) {
			$prop = $photo->GetProperties();
			$count[$photo->fields['ID']] = intval($prop['LIKES']['VALUE']);
		}
		unset($rsPhotos);
	}

echo json_encode(compact('count'));