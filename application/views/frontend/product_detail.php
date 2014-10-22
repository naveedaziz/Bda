<?php $this->load->view('frontend/elements/header'); ?>
<div class="ful-col">
    <nav>
       <div class="container">
        <div class="row clearfix">
           <div class="col-md-12 column">
            <div class="row">
            <div class="col-md-6">
           <ol class="breadcrumb">
           <div class="breadcrums"><span class="small-text"><a href="<?php echo base_url();?>">Home</a></span> </div>
           <div class="space">/</div>
           <div class="breadcrums"><span class="small-text"><a href="<?php echo base_url().'frontend/allProducts/'.$this->session->userdata('category_id'); ?>"><?php echo $this->session->userdata('category'); ?></a></span> </div>	
           <div class="space">/</div>
           <div class="breadcrums">
           <span class="small-text-active">
           <?php if ($product) { echo $product->title; } ?>
           </span></div>
           </ol>
            </div>
           </div> <!-- /.row -->  
           </div> <!-- / .col-md-12 column -->
       </div> <!-- / .row clearfix -->
       </div> <!--- / .container -->
    </nav> <!-- / .nav -->
</div>
<!-- Page Content -->
<div class="container">
   <!----- Brand Carousel ------>
      <div class="row">
           <?php if(!empty($product)) { ?> 
            <div class="col-md-12">
            	<div class="col-md-7">
               <h2> <?php echo $product->title; ?></h2>
               <p class="floating"><?php echo $product->description; ?></p>
               <div class="col-md-7 col-space-top-l no-padding">
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
                  <div class="col-md-5">
                  <header id="myCarousel" class="carousel slide myCarouselProduct">
                   <!-- Indicators -->
                      <ol class="carousel-indicators">
                        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                        <li data-target="#myCarousel" data-slide-to="1"></li>
                        <li data-target="#myCarousel" data-slide-to="2"></li>
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
                    
                     <div class="col-md-1 col-right">
                      <a href="<?php echo base_url().'frontend/query/'.$product->id; ?>"><button class="btn btn-enquiry">ENQUIRY</button></a>
                     </div>
                  </div>
                  
                     
             </div>
            <?php }
               else { ?>
            <p> <?php echo 'No Record Found!'; ?> </p>
            <?php } ?>
         </div>
</div>
<!-- /.container -->
<?php $this->load->view('frontend/elements/footer'); ?>