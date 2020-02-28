<div class="b_filials">
	<div class="item act"><span>BRANCHES</span></div>
	<div class="item item_brd"><span>AFFILIATED COMPANIES</span></div>
	<div class="clear"></div>				
	<script type="text/javascript">
		$(function()
		{
			$('.fil_scroll').jScrollPane({showArrows:true, speed: 113});
			$(".jspPane").mousewheel(function(event){event.preventDefault();});
		});
	</script>
	<div id="fil_arr"></div>
	<div class="fil_wrap">
		<i></i><i class="r"></i><i class="l b_l"></i><i class="r b_r"></i>
		<div class="fil_scroll">
			<?$APPLICATION->IncludeFile(
				$APPLICATION->GetTemplatePath('filial.list.eng.php'),
				array(),
				Array("MODE"=>"html")
			);?>
		</div>
	</div>
</div>