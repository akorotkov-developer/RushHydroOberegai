$(function(){
    $('.close').click(function () {
        $(this).parents('.modalDialog').fadeOut();
    })

    $('.sendVode').click(function () {
        var  id = $('#openModal').attr("data-id");
        var captchaCode = $('#openModal input[name="captchaCode"]').val();
        var captchaId = $('#openModal input[name="captchaId"]').val();


        $.ajax({
            type: 'POST',
            url: "/fotokonkursy_oberegai/like.php",
            data: {
                id: id,
                c: document.cookie,
                captchaCode: captchaCode,
                captchaId:captchaId
            },
            success: (function (data) {
                $('#openModal>div').html("<p>"+data+"</p>");

                setTimeout(function () {
                    location.reload();
                },2000)
            })
        })
    })

    $(".h-search .inp").focus(function(){
        if ($(this).val() == "Поиск")
            $(this).val("").css("color","#000");
    });

    $(".h-search .inp").blur(function(){
        if ($.trim($(this).val()) == "")
            $(this).val("Поиск").css("color","#666");
    });

    $("#map-region .map-dot").hover(
        function() {
            $(this).find(".map-dot-popup").stop(true, true).fadeIn(300);
            $(this).css("z-index","2");
        },
        function() {
            $(this).find(".map-dot-popup").hide();
            $(this).css("z-index","1");
        }
    );

    /** banners main **/
    curBan = 0;
    nextBan = 1;
    countEl = $("#banner-main img").length;
    if (countEl > 1)
        bannersInt = setInterval(changeBanners, 5000);

    function changeBanners(){
        $("#banner-main img").eq(curBan).fadeOut(600).removeClass("act");
        $("#banner-main img").eq(nextBan).fadeIn(600).addClass("act");
        $("#b_nav div").eq(curBan).removeClass("act");
        $("#b_nav div").eq(nextBan).addClass("act");
        curBan = nextBan;
        if (nextBan+1 == countEl)
            nextBan = 0;
        else
            nextBan++;
    }

    $("#b_nav div").click(function(){
        if (!$(this).hasClass("act")){
            elIndx = $(this).index();
            $("#b_nav div.act").removeClass("act");
            $(this).addClass("act");
            $("#banner-main img.act").fadeOut(600).removeClass("act");
            $("#banner-main img").eq(elIndx).fadeIn(600).addClass("act");
            curBan = elIndx;
            if (elIndx+1 == countEl)
                nextBan = 0;
            else
                nextBan = elIndx+1;
        }
        return false;
    });

    $("#banner-main").hover(
        function(){
            clearInterval(bannersInt);
        },
        function(){
            if (countEl > 1)
                bannersInt = setInterval(changeBanners, 5000);
        }
    );
    /** banners main **/

    getMovie = function(name) {
        var M$ =  navigator.appName.indexOf("Microsoft")!=-1;
        return (M$ ? window : document)[name];
    }

    $("#onAnimation").click(function() {
        getMovie("animationChild").startAnimJS();
        getMovie("animationTrash").startAnimTrashJS();
        $(this).addClass("act");
        $("#offAnimation").removeClass("act");
        $("body, html").animate({scrollTop: $(document).height()-$(window).height()}, 300);
        $(".trash").css("z-index","3");
    });

    $("#offAnimation").click(function() {
        offAnimation();
    });

    /** likes **/
    var $likes = {}, $counts = {}, likeIds = [], loader = '<img src="/bitrix/templates/oberegai/i/ajax-loader.gif" />',
        urlPart = document.URL.indexOf('exhibition') != -1 ? '/exhibition' : '/fotokonkursy_oberegai'
    voteUrl = urlPart + '/like.php',

        getCountElement = function(like) {
            return like.find('.like-count');
        };

    $( "#dialog1, #dialog2" ).dialog({
        modal: true, autoOpen: false,
        show: { effect: "blind", duration: 1000 },
        hide: { effect: "explode", duration: 1000 },
        buttons: { Ok: function() { $( this ).dialog( "close" ); }}
    });

    $('.ajax-like:not([data-deactive])')
        .each(function() {
            var $this = $(this),
                id = $this.data('id'),
                $count = getCountElement($this);

            $likes[id] 	= $this;
            $counts[id] = $count;

            likeIds.push(id);

            $count.html(loader);
        })
        .on("click", function(event) {
            event.preventDefault();

            var $this = $(this),
                id = $this.data('id'),
                $count = $counts[id];

            if ($this.hasClass('btn-no-like')) return;

            if ($this.data('clicked') || $this.data('closed')) return;

            $this.data('clicked', true);

            var counter;

            if($('[data-id="'+id+'"]').length > 1){
                $counter = $('[data-id="'+id+'"]').find('.like-count');
            } else {
                $counter = $counts[id];
            }

            $counter.html(loader);

            $('#openModal').show();
            $('#openModal').css('pointer-events','auto');
            $('#openModal').attr('data-id',id);




        });


    if (likeIds.length) {
        $.ajax({
            type: 'POST',
            url: voteUrl,
            dataType: 'json',
            data: {ids: likeIds}
        })
            .done(function(data) {
                for (var id in data.count) {
                    if (!$likes[id]) continue;
                    var el;
                    if($('[data-id="'+id+'"]').length > 1){
                        el = $('[data-id="'+id+'"]');
                    } else {
                        el = $likes[id];
                    }
                    el.find('.like-count').html(data.count[id])
                }
            });
    }
    /** likes **/

    $(".b-weather_item").each(function() {
        clock($(this).data("id"),$(this).data("seconds"),$(this).data("minutes"),$(this).data("hours"));
    });

    /** Share **/
    if(typeof(Share) != 'undefined')
        $(document).on('click', '.social_share', function(){
            Share.go(this);
        });

    $('.item_btn_share-wrap').click(function() {
        $(this).find('.item_btn_share-btns').show();
    });
    $('.item_btn_share-wrap').mouseleave(function() {
        $(this).find('.item_btn_share-btns').hide();
    });
});

var offAnimation = function() {
    getMovie("animationChild").stopAnimJS();
    getMovie("animationTrash").stopAnimTrashJS();
    $("#offAnimation").addClass("act");
    $("#onAnimation").removeClass("act");
    $(".trash").css("z-index","1");
}