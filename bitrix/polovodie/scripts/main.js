$(document).ready(function(){

    $('body').on('click', '#ajax_news .page-list a', function(e){
        e.preventDefault();
        showNews($(this).attr('href'), 'ajax_news');
    });
    

	/** banners main **/
	curBan = 0;
	nextBan = 1;
	countEl = $("#banners .slide").length;
	if (countEl > 1)
		bannersInt = setInterval(changeBanners, 5000);
	
	$("#banners .slide").not('.act').fadeOut(0);
	
	function changeBanners(){
		$("#banners .slide").eq(curBan).fadeOut(600).removeClass("act");
		$("#banners .slide").eq(nextBan).fadeIn(600).addClass("act");
		$("#b_nav a").eq(curBan).removeClass("act").css("top","0");
		$("#b_nav a").eq(nextBan).addClass("act").animate({top: "-3px"},200, function(){$(this).animate({top: "0"},100);});
		curBan = nextBan;
		if (nextBan+1 == countEl)
			nextBan = 0;
		else
			nextBan++;
	}

	$("#b_nav a").click(function(){
		if (!$(this).hasClass("act")){
			elIndx = parseInt($(this).text()) - 1;
			$("#b_nav a.act").removeClass("act").css("top","0");
			$(this).addClass("act").animate({top: "-3px"},200, function(){$(this).animate({top: "0"},100);});
			$("#banners .slide.act").fadeOut(600).removeClass("act");
			$("#banners .slide").eq(elIndx).fadeIn(600).addClass("act");
			curBan = elIndx;
			if (elIndx+1 == countEl)
				nextBan = 0;
			else
				nextBan = elIndx+1;
		}
		return false;
	});

	$("#banners").hover(
		function(){
			clearInterval(bannersInt);
		},
		function(){
			if (countEl > 1)
				bannersInt = setInterval(changeBanners, 5000);
		}
	);

	$("#banners_eng_btns a").hover(
		function() {
			$(this).stop().animate({height: 73}, 300);
			$(this).find("i").stop(true, true).fadeIn(300);
		},
		function() {
			$(this).stop().animate({height: 60}, 300);
			$(this).find("i").stop(true, true).fadeOut(300);
		}
	);
	/** banners main **/
    
    

});

function showNews(url, div)
{
    $.ajax({
        url: url,
        data: '',
        success: function (res) {
            $('#' + div).html(res);
            $("a[rel^='prettyPhoto']").prettyPhoto({ social_tools: false, deeplinking: false });
            $('#share').socialLikes();
        },
        dataType: "html",
        type: "GET"
    });
}
    