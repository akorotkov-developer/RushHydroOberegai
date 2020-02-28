<div class="main_new news_list"> 	 
  <div class="m_news"> 		
  <?php foreach ($items as $item) 
  
  { ?> 			 
    <div class="item no_date">				
	<?php if ($item['PROPERTY_SHOW_DATE_VALUE']) 
	{ ?>
    <span><?=preg_replace('/(\d+)\.(\d+)\.(\d+).*$/i', '\\1.\\2<br/>\\3', $item['DATE_ACTIVE_FROM'])?></span><?php } ?> 				
    <a href="<?=$item['URL']?>" ><?=parseTitle($item['~NAME'])?></a> 			
    </div>
   		<?php } ?> 	
        
    </div>
 </div>
 <?=$pagination?>