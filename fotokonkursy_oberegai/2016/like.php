<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");

if (!function_exists("getRealIP")){
	function getRealIP()
	{

		if( $_SERVER['HTTP_X_FORWARDED_FOR'] != '' )
		{
			$client_ip =
				( !empty($_SERVER['REMOTE_ADDR']) ) ?
					$_SERVER['REMOTE_ADDR']
					:
					( ( !empty($_ENV['REMOTE_ADDR']) ) ?
						$_ENV['REMOTE_ADDR']
						:
						"unknown" );
			$entries = split('[, ]', $_SERVER['HTTP_X_FORWARDED_FOR']);

			reset($entries);
			while (list(, $entry) = each($entries))
			{
				$entry = trim($entry);
				if ( preg_match("/^([0-9]+\.[0-9]+\.[0-9]+\.[0-9]+)/", $entry, $ip_list) )
				{
					$private_ip = array(
						'/^0\./',
						'/^127\.0\.0\.1/',
						'/^192\.168\..*/',
						'/^172\.((1[6-9])|(2[0-9])|(3[0-1]))\..*/',
						'/^10\..*/');

					$found_ip = preg_replace($private_ip, $client_ip, $ip_list[1]);

					if ($client_ip != $found_ip)
					{
						$client_ip = $found_ip;
						break;
					}
				}
			}
		}
		else
		{
			$client_ip =
				( !empty($_SERVER['REMOTE_ADDR']) ) ?
					$_SERVER['REMOTE_ADDR']
					:
					( ( !empty($_ENV['REMOTE_ADDR']) ) ?
						$_ENV['REMOTE_ADDR']
						:
						"unknown" );
		}

		return $client_ip;

	}
}
if (!function_exists("getIpInfo")){
	function getIpInfo(){
		$proxy_headers = array(
			'HTTP_VIA',
			'HTTP_X_FORWARDED_FOR',
			'HTTP_FORWARDED_FOR',
			'HTTP_X_FORWARDED',
			'HTTP_FORWARDED',
			'HTTP_CLIENT_IP',
			'HTTP_FORWARDED_FOR_IP',
			'VIA',
			'X_FORWARDED_FOR',
			'FORWARDED_FOR',
			'X_FORWARDED',
			'FORWARDED',
			'CLIENT_IP',
			'FORWARDED_FOR_IP',
			'HTTP_PROXY_CONNECTION'
		);
		$ports = array(8080, 80, 81, 1080, 6588, 8000, 3128, 553, 554, 4480);
		$arInfo = array();

		$arInfo["REAL_IP"] = getRealIP();

		if (isset ($_SERVER['REMOTE_ADDR']))
			$arInfo['REMOTE_ADDR'] = $_SERVER['REMOTE_ADDR'];
		else
			$arInfo['REMOTE_ADDR'] = "";

		if (isset ($_SERVER['HTTP_X_REAL_IP']))
			$arInfo['HTTP_X_REAL_IP'] = $_SERVER['HTTP_X_REAL_IP'];
		else
			$arInfo['HTTP_X_REAL_IP'] = "";

		if (isset ($_SERVER['HTTP_X_FORWARDED_FOR']))
			$arInfo['HTTP_X_FORWARDED_FOR'] = $_SERVER['HTTP_X_FORWARDED_FOR'];
		else
			$arInfo['HTTP_X_FORWARDED_FOR'] = "";

		if (isset ($_SERVER['HTTP_USER_AGENT']))
			$arInfo['HTTP_USER_AGENT'] = $_SERVER['HTTP_USER_AGENT'];
		else
			$arInfo['HTTP_USER_AGENT'] = "";

		if (isset ($_SERVER['REMOTE_HOST']))
			$arInfo['REMOTE_HOST'] = $_SERVER['REMOTE_HOST'];
		else
			$arInfo['REMOTE_HOST'] = "";

		$arInfo['PROXY'] = '';
		foreach($proxy_headers as $x){
			if (isset($_SERVER[$x])){
				$arInfo['PROXY'] = 'Обнаружен прокси по заголовкам! - '.$_SERVER[$x];
			}
		}

		$arInfo['PROXY_PORT'] = '';
		foreach($ports as $port){
			if (@fsockopen($_SERVER['REMOTE_ADDR'], $port, $errno, $errstr, 30)) {
				$arInfo['PROXY_PORT'] = 'Обнаружен прокси по порту! - '.$_SERVER['REMOTE_ADDR'].':'.$port;
			}
		}

		$arInfo['HTTP_REFERER'] = $_SERVER['HTTP_REFERER'];

		return $arInfo;
	}
}

if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && !empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest'){
if (!CModule::IncludeModule('iblock')) Die("2016 like.php");
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

		//$correctCookie = get_like_salt($_SERVER['HTTP_X_REAL_IP']);
		//$correctCookie = get_like_salt(getRealIP());

		$photo =
			CIBlockElement::GetList(
				array(),
				array('IBLOCK_ID' => 18, 'ID' => $id)
			)->GetNextElement();



		if (!$photo) die();

		$likeValue = $photo->GetProperty('LIKES');
		$count = intval($likeValue['VALUE']);
		$pID = $photo->fields['IBLOCK_SECTION_ID'];




		if(isBlackOut()){
			$sessionKey = 'fotokonkurs_id_'.$photo->fields['IBLOCK_SECTION_ID'];

			//Вводим проверку по IP + USER AGENT
			$arUserInfo = getIpInfo();
			$arSelect = Array("ID");
			$arFilter = Array(
				"IBLOCK_ID" => 21,
				"ACTIVE_DATE" => "Y",
				"ACTIVE" => "Y",
				"PROPERTY_IB_S_ID" => $photo->fields['IBLOCK_SECTION_ID'],
				"PROPERTY_REAL_IP" => $arUserInfo["REAL_IP"],
				"PROPERTY_HTTP_USER_AGENT" => $arUserInfo["HTTP_USER_AGENT"]
			);
			$arID = array();

			$res = CIBlockElement::GetList(array(), $arFilter, false, false, $arSelect);
			if ( $ob = $res->Fetch() )
			{
				$arID[] = $ob;
			}
			if (count($arID) > 0 || isset($_COOKIE[$sessionKey])) {
				echo json_encode(array("notice"=>"true", "count" => $count)); exit;
			}

			if (
				!empty($_SERVER['HTTP_REFERER'])
				&& isset($_POST['c'])
				/*&& ($cookie === $correctCookie)*/
				&& !isset($_COOKIE[$sessionKey])
			) {

				$count++;
				$section = new CIBlockElement;
				$section->Update($id, array('LIKES' => $count));
				 CIBlockElement::SetPropertyValues($id, 18, $count, 'LIKES');
				//$_COOKIE[$sessionKey] = $photo['ID'];
				setcookie($sessionKey, 1, time() + 60*60*24*365*5);

				$voteInfo = new CIBlockElement;
				$PROP = getIpInfo();
				$PROP["IB_S_ID"] = $photo->fields['IBLOCK_SECTION_ID'];
				$arInsert = Array(
					"NAME" => 'vote - '.$id,
					"IBLOCK_SECTION_ID" => false,          // элемент лежит в корне раздела
					"IBLOCK_ID"      => 21,
					"PROPERTY_VALUES"=> $PROP,
					"ACTIVE"         => "Y",            // активен
				);
				$voteInfo->Add($arInsert);
				echo json_encode(array("notice"=>"false", "count" => $count)); exit;
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
		echo json_encode(compact('count')); die();
	}



} else{
	die("upss...");
}