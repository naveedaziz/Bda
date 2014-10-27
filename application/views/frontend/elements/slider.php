<!-- Header Carousel -->
<header id="myCarousel" class="carousel slide carousel-home">
   <!-- Indicators -->
   <ol class="carousel-indicators">
      <?php if ($banners->num_rows() > 0) {
         $index = 0; 
         foreach ($banners->result() as $banner){ 
         if(!isset($banner->images)){ 
         	$string = $banner->images;
         	if($string){
         	$json_o = (array) json_decode($string);
         	}else{
         	$json_o = '';
         	}
         	if($json_o){?>
      <li data-target="#myCarousel" data-slide-to="<?php echo $index;?>" <?php if($index == 0){?> class="active"<?php } ?>></li>
      <?php $index++; }?>
      <?php } ?>
      <?php } ?>
      <?php }  ?> 
   </ol>
   <!-- Wrapper for slides -->
   <div class="carousel-inner">
    <?php if ($banners->num_rows() > 0) { 
         $index = 0; 
         foreach ($banners->result() as $banner){ 
         if(!empty($banner->images)){ 
         	$string = $banner->images;
         	if($string){
         	$json_o = (array) json_decode($string);
         	}else{
         	$json_o = '';
         	}
         	if($json_o){?>
      <div <?php if($index == 0){?> class="item active"<?php }else{ ?> class="item" <?php } ?>>
         <div class="fill" style="background-image:url('<?php echo base_url().$json_o[0]; ?>');"></div>
         <div class="carousel-caption">
         <div class="container">
            <?php echo $banner->title;?>
            <p><?php echo $banner->description;?></p>
            <a href="<?php echo base_url(); ?>pages/contact" class="contact-slider"><button class="btn btn-contact-slider">Contact</button></a>
         </div>
        </div>
      </div>
      <?php $index++;} ?>
      <?php } ?>
      <?php } } ?>
   </div>
   <!-- Controls -->
   <a class="left carousel-control" href="#myCarousel" data-slide="prev">
   <span class="icon-prev"></span>
   </a>
   <a class="right carousel-control" href="#myCarousel" data-slide="next">
   <span class="icon-next"></span>
   </a>
</header>