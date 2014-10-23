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
           <div class="breadcrums"><span class="small-text-active">Vending Solutions</span></div>
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
           <?php if(!empty($category)) { ?> 
            <div class="col-md-12">
             <h2><?php echo $category->title; ?></h2>
             <p class="floating"><?php echo $category->description; ?></p>
               
              <?php if ($products->num_rows() > 0) { 
                 foreach ($products->result() as $product){ 
                  if(!empty($product->images)){ 
                  	$string = $product->images;
                  	if($string){
                  	$images_array = (array) json_decode($string);
                  	}else{
                  	$images_array = '';
                  	}
                  	if($images_array){
				     foreach($images_array as $key =>$value){ ?>
                     <div class="col-md-6 col-space-top-l">
                     <a class="no_decoration" href="<?php echo base_url().'vending_product/'.$product->id; ?>">
                      <span class="vending-product-title"><?php echo $product->title; ?></span>
                     </a>
                     <?php if($images_array){?>
                      <img class="thumbs-product-detail img-responsive" src="<?php echo base_url().$images_array[$key]; ?>" alt="<?php echo $product->title; ?>" />
                     <?php }else{ ?>
                     <img class="thumbs-vending-detail img-responsive" src="<?php echo base_url().ASSETS_FRONTEND_IMAGE_DIR;?>default.jpg" alt="default" />
                     <?php } ?>
                      <span class="learn_more">
                       <a href="<?php echo base_url().'vending_product/'.$product->id; ?>">
                        <button class="btn btn-enquiry">LEARN MORE</button>
                       </a>
                      </span>
                    </div>
				<?php } ?>
              <?php } } ?> 
              <?php }  } ?>
             </div>
           </div>
            <?php } else { ?>
            <p> <?php echo 'No Record Found!'; ?> </p>
            <?php } ?>
</div>
<?php $this->load->view('frontend/elements/footer'); ?>