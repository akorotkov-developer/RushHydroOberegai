
<div class="b_filials"> 	 
  <div class="item act"><span>ФИЛИАЛЫ</span></div>
 	 
  <div class="item item_brd"><span>ДОЧЕРНИЕ ОБЩЕСТВА</span></div>
 	 
  <div class="clear"></div>
 				 	 
<script type="text/javascript">
		$(document).ready(function(){
			$('.fil_links a[name="'+curFil+'"]').addClass("fil_act");
			var parent = $('.fil_links a[name="'+curFil+'"]').parent().index();
			if (parent == 1){
				$("div.b_filials .item.act").removeClass("act");
				$("div.b_filials .item").eq(parent).addClass("act");
				$("#fil_filials").css("display","none");
				$("#fil_dzo").css("display","block");
				$("#fil_arr").css("background-position","135px 0");
			}
			$('.fil_scroll').jScrollPane({
					showArrows:true, 
					speed: 113, 
					animateScroll: true
				});
			var api = $('.fil_scroll').data('jsp');
			if ($('.fil_links a[name="'+curFil+'"]').length > 0)
				setTimeout(function(){api.scrollToY($('.fil_links a[name="'+curFil+'"]').position().top);}, 700);
				
			$(".jspPane").mousewheel(function(event){event.preventDefault();});	
		});
		var curFil = '<img id="bxid_390200" src="/bitrix/images/fileman/htmledit2/php.gif" border="0"  />';
	</script>
 	 
  <div id="fil_arr"></div>
 	 
  <div class="fil_wrap"> 		<i></i><i class="r"></i><i class="l b_l"></i><i class="r b_r"></i> 		 
    <div class="fil_scroll"> 			<?$APPLICATION->IncludeFile(
				$APPLICATION->GetTemplatePath('filial.list.php'),
				array(),
				Array("MODE"=>"html")
			);?> 		</div>
   	</div>
 </div>
