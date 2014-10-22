<!-- Header Carousel -->

<header id="myCarousel" class="carousel slide">
   <!-- Indicators -->
   <ol class="carousel-indicators">
   <?php if ($banners->num_rows() > 0) {
	   $index = 0; 
         foreach ($banners->result() as $banner){ ?>
        <?php 
            if(!empty($banner->images)){ 
            	$string = $banner->images;
            	if($string){
            	$json_o = (array) json_decode($string);
            	}else{
            	$json_o = '';
            	}
            	if($json_o){?>
         			 <li data-target="#myCarousel" data-slide-to="<?=$index;?>" <? if($index == 0){?> class="active"<? } ?>></li>
         <?php $index++; }
        	 
		 ?>
         <?php } ?>
         <? } 
} 
?> 
      
   </ol>
   <!-- Wrapper for slides -->
   <div class="carousel-inner">
   <div class="carousel-caption-home">
    With branded <br/>
	food & beverage solutions
    <p>We’ll enable you to innovate & delight your customers<br /> Call Now &nbsp;<span class="contactNo-slider"> 0800 111 111</span><p>
     <a href="<?php echo base_url(); ?>frontend/aboutus" class="contact-slider"><button class="btn btn-contact-slider">Contact</button></a>
    </div>
    <?php if ($banners->num_rows() > 0) { 
	$index = 0; 
         foreach ($banners->result() as $banner){ ?>
        <?php 
            if(!empty($banner->images)){ 
            	$string = $banner->images;
            	if($string){
            	$json_o = (array) json_decode($string);
            	}else{
            	$json_o = '';
            	}
            	if($json_o){?>
          <div  <? if($index == 0){?> class="item active"<? }else{ ?> class="item" <? } ?>>
                <div class="fill" style="background-image:url('<?php echo base_url().$json_o[0]; ?>');"></div>
                
            </div>
         <?php $index++;} ?>
         <?php } ?>
         <? } 
} 
?>
        </div>
   <!--<div class="carousel-inner">
    <div class="carousel-caption-home">
    With branded <br/>
	food & beverage solutions
    </div>
      <div class="item active">
      	<img src="<?php echo base_url().ASSETS_FRONTEND_IMAGE_DIR;?>home-banner.jpg" class="img-responsive"  alt="banner"/>
      </div>
      <div class="item">
      	<img src="<?php echo base_url().ASSETS_FRONTEND_IMAGE_DIR;?>home-banner.jpg" class="img-responsive"  alt="banner"/>
      </div>
      <div class="item">
      	<img src="<?php echo base_url().ASSETS_FRONTEND_IMAGE_DIR;?>home-banner.jpg" class="img-responsive"  alt="banner"/>
      </div>
   </div>-->
   <!-- Controls -->
   <a class="left carousel-control" href="#myCarousel" data-slide="prev">
   <span class="icon-prev"></span>
   </a>
   <a class="right carousel-control" href="#myCarousel" data-slide="next">
   <span class="icon-next"></span>
   </a>
</header>
