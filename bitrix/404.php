<?
include_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/urlrewrite.php');

/*$ip = isset($_SERVER['HTTP_X_REAL_IP']) ? $_SERVER['HTTP_X_REAL_IP'] : $_SERVER['REMOTE_ADDR'];
Letter::create()->
	from('error@rushydro.ru')->
	to('korotin@sysntec.ru')->
	subject('[NOT FOUND] '.$ip.' - '.$_SERVER['REQUEST_URI'])->
	html(
		'<b>Time:</b> '.date('d.m.Y H:i:s').'<br/>'
		.'<b>IP:</b> '.$ip.'<br/>'
		.'<b>User Agent:</b> '.$_SERVER['HTTP_USER_AGENT'].'<br/>'
		.'<b>Referer:</b> '.(isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '[no referer]').'<br/>'
	)->
	send();
*/
CHTTP::SetStatus("404 Not Found");
@define("ERROR_404","Y");


$APPLICATION->SetTitle("Страница не найдена");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title><?$APPLICATION->ShowTitle()?></title>
	<style type="text/css">
		@font-face {
			font-family: 'CorpidOT';
			src: url('fonts/CorpidOT.eot');
			src: local('?'), url('fonts/CorpidOT.woff') format('woff'), url('fonts/CorpidOT.ttf') format('truetype');
		}


		body{font-size:75%; font-family:Tahoma; margin:0px; padding:0px; color:#000; background-color:#fff; line-height:1;}
		body, html{height:100%;}

		#wrap{padding:0 15px 0 10px; width:970px; overflow:hidden; margin:0 auto; position:relative; height:100%; min-height:440px;}
		#wrap .logo{position:absolute; left:15px; top:45px;}
		h1{color:#E66A25; margin:0 0 20px; font-size:5.1em; font-family:Arial; font-weight:normal; margin-left:-6px;}
		a{color:#00a0ff; outline:none;}
		a:hover{text-decoration:none;}

		.inf404{padding-left:125px; position:relative; top:36%;}
		.txtTr{font-family:Trebuchet MS; font-size:23px; margin-bottom:30px; line-height:1.15em; margin-left:-2px;}

		#search{position:relative; float:left; top:13px;}
		#search .sbmt{position:absolute; right:0px; top:0px;}
		#search i{position:absolute; display:block; height:23px; width:10px; left:-10px; top: 0; background:url(/bitrix/templates/rushydro/i/search_lft.gif) no-repeat;}
		#search .inp{margin-right:34px; border-top:1px solid #e5e5e5; border-bottom:1px solid #e5e5e5; background:#fff url(/bitrix/templates/rushydro/i/search_bg.gif) top left repeat-x; height: 21px;}
		#search .inp input{border:0; padding:2px 0 0 2px; font-size:1.1em; background:transparent; color:#808080; width:230px; font-family: Tahoma;}

		p{margin:0 0 33px; font-size:1.2em;}
		img{border:0px;}
	</style>
	<!--[if lte IE 6]>
		<style type="text/css">
			#search{width:1%;}
		</style>
	<![endif]-->
	<!--[if lte IE 7]>
		<style>
			#search .inp{margin-left:18px;}
			#search .inp input{padding-top:1px;}
		</style>
	<![endif]-->
</head>
<body>
	<div id="wrap">
		<div class="logo"><a href="<?=str_replace("..", ".", RhdHandler::getSiteRoot())?>"><img src="/bitrix/templates/rushydro/i/289x89.png" /></a></div>
		<div class="inf404">
			<h1>Ошибка 404</h1>
			<div class="txtTr">
			Неправильно набран адрес, <br/>
			или такой страницы не существует.
			</div>
			<p>Вернитесь на <a href="<?=str_replace("..", ".",RhdHandler::getSiteRoot())?>">главную</a> или воспользуйтесь <a href="<?=str_replace("..", ".", RhdPath::createUrl(RhdHandler::getSiteCode(), 'sitemap'))?>">картой сайта</a>.</p>
			<div id="search">
				<form action="/www/search/">
					<div class="inp"><i></i>
					<?if (RhdHandler::getSiteCode() == "eng"){?>
						<input type="text" value="search" name="q" onfocus="this.style.color = '#000' ;if (this.value == 'search') this.value = ''" onblur="this.style.color = '#808080' ;if (this.value == '') this.value = 'search'" />
					<?}else{?>
						<input type="text" value="поиск по сайту" name="q" onfocus="this.style.color = '#000' ;if (this.value == 'поиск по сайту') this.value = ''" onblur="this.style.color = '#808080' ;if (this.value == '') this.value = 'поиск по сайту'" />
					<?}?>
					</div>
					<input type="image" src="/bitrix/templates/rushydro/i/ic_search.png?1" class="sbmt">
				</form>
			</div>
		</div>
	</div>
</body>
</html>
