				<?=$current;?>
				<div class="data">
					<div class="fpu" style="bottom:110px;"><span><?=$fpu;?></span></div>
					<div class="npu" style="bottom:<?=$npuPoint;?>px;"><span <? if($id == 38 OR $id == 35) { echo "class=top"; }?>><?=$npu;?></span></div>
					<div class="umo" style="bottom:60px;"><span><?=$umo;?></span></div>
					<div class="level" style="height:<?=$height;?>px;"></div>
				</div>
				<div class="popup-wrapper">
					<div class="popup-trigger">&nbsp;</div>
					<div class="popup-info">			
						<div class="legend">
							<p><span class="l-red"></span>ФПУ &mdash; <b><?=$fpu;?> м</b></p>
							<p><span class="l-green"></span>НПУ &mdash; <b><?=$npu;?> м</b></p>
							<p><span class="l-black"></span>УМО &mdash; <b><?=$umo;?> м</b></p>
							<p>Уровень — <b><?=$uvbBal;?></b> <?=printChange($id, 'uvb');?></p>
							<p>Свободная ёмкость — <b><?=$polemk;?></b> <?=printChange($id, 'polemk');?></p>
							<p>Приток — <b><?=$pritok;?></b> <?=printChange($id, 'pritok');?></p>
							<p>Общий расход — <b><?=$rashod;?></b> <?=printChange($id, 'rashod');?></p>
							<p>Расход через водосбросы — <b><?=$sbros;?></b>  <?=printChange($id, 'sbros');?></p> 
						</div>
					</div>
				</div>