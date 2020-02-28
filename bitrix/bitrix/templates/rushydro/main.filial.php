<div class="cont_wrap">
	<?php if (RhdHandler::getSiteCode() == 'esc'): ?>
		<?$APPLICATION->IncludeFile(
			$APPLICATION->GetTemplatePath('main.banner.esc.php'),
			Array(),
			Array("MODE"=>"html")
		);?>
	<?php endif; ?>
	<div class="bl_main main_new">
		<div class="rht_cont" style="position: relative; float:left">
			<?php if (RhdHandler::getSiteCode() == 'vniig'): ?>
				<a href="/company/95-let-vniig" style="margin: 0 0 45px 5px; display:block;"><img src="/bitrix/templates/rushydro/i/banners/banner-vniig.jpg" alt=""></a>
			<?php endif; ?>
			<script type="text/javascript">
				$(document).ready(function(){
					$('#fil_cont a[name="'+curFil+'"]').addClass("fil_act");
					if ($('#dot_'+curFil).length == 0)
						$("#fil_name").css({display: "none"});
					else{
						$('#dot_'+curFil).addClass('act');
						posElMap = $("#fil_map i.act").position();
						if (posElMap.left >= 160)
							$("#fil_name").addClass("fil_name_rht");
						else
							$("#fil_name").removeClass("fil_name_rht");
						$("#fil_name").css({left: posElMap.left + 5, top: posElMap.top});
					}
				});
				var curFil = '<?=RhdHandler::getSiteCode()?>';
				var curFilName = '<?=RhdHandler::getSiteName()?>';
			</script>
			<div id="fil_map">
				<div id="fil_name"><div class="fil_map_tooltip"><span><?=RhdHandler::getSiteName()?></span><div class="arr"></div></div></div>
				<i id="dot_burges"></i>
				<i id="dot_volges"></i>
				<i id="dot_votges"></i>
				<i id="dot_dagestan"></i>
				<i id="dot_zhiges"></i>
				<i id="dot_zagaes"></i>
				<i id="dot_zges"></i>
				<i id="dot_irgges"></i>
				<i id="dot_kbf"></i>
				<i id="dot_kamges"></i>
				<i id="dot_kchf"></i>
				<i id="dot_kvvges"></i>
				<i id="dot_kkges"></i>
				<i id="dot_nizhges"></i>
				<i id="dot_nges"></i>
				<i id="dot_sarges"></i>
				<i id="dot_sshges"></i>
				<i id="dot_osetia"></i>
				<i id="dot_cheges"></i>
				<i id="dot_vniig"></i>
				<i id="dot_geotherm"></i>
				<i id="dot_zaramag"></i>
				<i id="dot_kolymaenergo"></i>
				<i id="dot_lhp"></i>
				<i id="dot_nzges"></i>
				<i id="dot_pauzhet"></i>
				<i id="dot_usges"></i>
				<i id="dot_esko-ees"></i>
				<i id="dot_yakutia"></i>
				<i id="dot_hydroinvest"></i>
				<i id="dot_fewind"></i>
				<i id="dot_mges-altai"></i>
				<i id="dot_vmgeopp"></i>
				<i id="dot_prometey"></i>
				<i id="dot_remik"></i>
				<i id="dot_ssatc"></i>
				<i id="dot_sshger"></i>
				<i id="dot_sulak"></i>
				<i id="dot_turboremont"></i>
				<i id="dot_usgesstroy"></i>
				<i id="dot_cso-sges"></i>
				<i id="dot_ervkk"></i>
				<i id="dot_korung"></i>
				<i id="dot_itenergy"></i>
				<i id="dot_gvcelektra"></i>
				<i id="dot_gis"></i>
				<i id="dot_hvkk"></i>
				<i id="dot_hydroservice"></i>
				<i id="dot_zagaes2"></i>
				<i id="dot_reec"></i>
				<i id="dot_hydroprojectinst"></i>
				<i id="dot_kamgek"></i>
				<i id="dot_kchggk"></i>
				<i id="dot_krsksbit"></i>
				<i id="dot_lengaes"></i>
				<i id="dot_mek"></i>
				<i id="dot_nbges"></i>
				<i id="dot_hydroproject"></i>
				<i id="dot_nkges"></i>
				<i id="dot_niies"></i>
				<i id="dot_raoesv"></i>
				<i id="dot_resk"></i>
				<i id="dot_mc"></i>
				<i id="dot_chges"></i>
				<i id="dot_chsk"></i>
				<i id="dot_rgits"></i>
				<i id="dot_bashkirenergo"></i>
				<i id="dot_blagoveschensk"></i>
			</div>	
			<?php if (!RhdHandler::isZagaes2()): ?>
				<div class="m_ttl"><span>ДРУГИЕ</span></div>	
				<script type="text/javascript">
					$(function()
					{
						$(".fil_scroll").jScrollPane({showArrows:true, speed: 113});
						$(".jspPane").mousewheel(function(event){event.preventDefault();});
					});
				</script>
				<div id="fil_switch">
					<div class="item"><span>Филиалы</span></div>
					<div class="item r_txt">
					  <p><span>Дочерние общества</span></p>
					  
                      
                      
                      
		        </div>
               
					<div class="clear"></div>
				</div>
                
                 <?php if (RhdHandler::getSiteCode() == 'geotherm'): ?>
				<div><br/><br/></div>
                <div style="margin: 0 0 45px 5px; display:block;"><img src="/bitrix/templates/rushydro/i/banners/geotherm-banner.jpg" alt=""></div>
			<?php endif; ?>
                
				<div id="fil_cont">
					<div id="fil_arr" class="fil_arr_in"></div>
					<div class="fil_wrap fil_map_scroll">
						<i></i><i class="r"></i><i class="l b_l"></i><i class="r b_r"></i>
						<div id="fil_close"><span></span></div>
						<div class="fil_scroll">
							<?$APPLICATION->IncludeFile(
								$APPLICATION->GetTemplatePath('filial.list.php'),
								array(),
								Array("MODE"=>"html")
							);?>
						</div>
					</div>
				</div>
			<?php else: ?>

				<div style="width:100%; margin-top:40px;" class="lft_cont">
					<div class="m_ttl"><span>АКТУАЛЬНО</span></div>
					<div class="m_line"></div>
					<div style="padding:0;" class="m_news m_imporant">
						<a href="/press/news-materials/" class="link_bg link_first">Мультимедиа</a>
						<a href="/press/news-materials/interview/82137.html" class="link_bg">Выездное заседание Правления</a>
						<a href="/pshpp/general/" class="link_bg">Общие сведения </a>
						<a href="/press/infographics/" class="link_bg">Инфографика</a>
					</div>
				</div>

			<?php endif; ?>
			<?/*div  style="margin-bottom:40px;"></div>
			<?$APPLICATION->IncludeFile(
				$APPLICATION->GetTemplatePath('main.sitenews.php'),
				compact('importantText', 'siteNews'),
				Array("MODE"=>"html")
			);*/?>
		</div>
		<div class="lft_cont" style="float:right">
			<?php if (RhdHandler::getSiteCode() !== 'mc'): ?>
				<?$APPLICATION->IncludeFile(
					$APPLICATION->GetTemplatePath('main.news.local.php'),
					compact('localNews', 'newsSiteCode', 'useGlobalNews'),
					Array("MODE"=>"html")
				);?>
			<?php else: ?>
				<?php $APPLICATION->IncludeFile(
					$APPLICATION->GetTemplatePath('mc.news.global.php'),
					Array(),
					Array("MODE"=>"html")
				); ?>
			<?php endif; ?>
		</div>
	</div>
</div>