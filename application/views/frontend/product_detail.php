<?php $this->load->view('frontend/elements/header'); ?>
<div class="ful-col">
   <nav>
      <div class="container">
         <div class="row clearfix">
            <ol class="breadcrumb">
                        <div class="breadcrums"><span class="small-text"><a href="<?php echo base_url();?>">Home</a></span> </div>
                        <div class="space">/</div>
                        <div class="breadcrums"><span class="small-text"><a href="<?php echo base_url().'category/'.$this->session->userdata('category_seo_url'); ?>"><?php echo $this->session->userdata('category'); ?></a></span> </div>
                       <?php if($this->session->userdata('category')){?> <div class="space">/</div> <?php } ?>
                        <div class="breadcrums">
                           <span class="small-text-active">
                           <?php if ($product) { echo $product->title; } ?>
                           </span>
                        </div>
                     </ol>
              <!-- / .col-md-12 column -->
         </div>
         <!-- / .row clearfix -->
      </div>
      <!--- / .container -->
   </nav>
   <!-- / .nav -->
</div>
<!-- Page Content -->
<div class="container">
   <!----- Brand Carousel ------>
   <div class="row">
      <?php if(!empty($product)) { ?> 
         <div class="col-md-6">
            <h2><?php echo $product->title; ?></h2>
            <p class="floating"><?php echo $product->description; ?></p>
            <div class="col-space-top-l no-padding">
               <?php 
                  if(!empty($product->images)){ 
                  
                  	$string = $product->images;
                  	if($string){
                  	$images_array = (array) json_decode($string);
                  	}else{
                  	$images_array = '';
                  	}
                  	if($images_array){
                  foreach($images_array as $key =>$value){ ?>
               <img class="images-section thumbs-product-detail img-responsive" src="<?php echo base_url().$images_array[$key]; ?>" alt="<?php echo $product->title; ?>" />
               <?php } ?>
               <?php }else{ ?>
               <img class="product-images-section img-responsive thumbs-product-detail img-responsive" src="<?php echo base_url().ASSETS_FRONTEND_IMAGE_DIR;?>default.jpg" alt="">
               <?php } } ?> 
            </div>
         </div>
         <?php 
            if(!empty($product->banner_images)){ 
            	$string = $product->banner_images;
            	if($string){
            	$images_array = (array) json_decode($string);
            	}else{
            	$images_array = '';
            	}
            	if($images_array){ ?>
         <div class="col-md-6">
            <header id="myCarousel" class="carousel slide myCarouselProduct">
               <!-- Indicators -->
               <ol class="carousel-indicators">
                  <?php if($images_array){
                     $index = 0;
                                          foreach($images_array as $key =>$value){ ?>
                  <li data-target="#myCarousel" data-slide-to="<?php echo $index;?>" <?php if($index == 0){?> class="active"<?php } ?>></li>
                  <?php $index++; } ?>
                  <?php } ?>
               </ol>
               <!-- Wrapper for slides -->
               <div class="carousel-inner" id="category-carousel-inner" >
                  <?php  if($images_array){
                     foreach($images_array as $key =>$value){ ?>
                  <div class="item">
                     <div class="fill" style="background-image:url('<?php echo base_url().$images_array[$key]; ?>');"></div>
                  </div>
                  <?php } ?>
                  <?php } ?>
               </div>
            </header>

            <?php } } ?>
            <div class="col-right">
               <a href="<?php echo base_url().'enquiry/'.$product->id; ?>"><button class="btn btn-enquiry">ENQUIRY</button></a>
            </div>
         </div>
      <?php }
         else { ?>
      <p class="no-record-found"> <?php echo 'No Record Found!'; ?> </p>
      <?php } ?>
   </div>
</div>
<!-- /.container -->
<?php $this->load->view('frontend/elements/footer'); ?>