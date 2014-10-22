<?php $this->load->view('frontend/elements/header'); ?>
<!-- Page Content -->
<div class="container">
   <!-- Categories Section -->
   <div class="row">
      <div class="row">
         <div class="col-lg-12">
            <h1 class="page-header">Nestle
               <small>Brands</small>
            </h1>
            <ol class="breadcrumb">
               <li><a href="<?php echo base_url(); ?>">Home</a>
               </li>
               <li class="active">Brands</li>
            </ol>
         </div>
      </div>
      <!-- /.row -->
      <!----- Brand Carousel ------>
      <div class="row">
         <div class="span12">
            <?php if(!empty($brand)) { ?> 
            <div class="col-md-10 img-portfolio">
               <h4><?php echo $brand->title; ?></h4>
               <br />
               <?php 
                  if(!empty($brand->images)){ 
                  	$string = $brand->images;
                  	if($string){
                  	$json_o = (array) json_decode($string);
                  	}else{
                  	$json_o = '';
                  	}
                  	if($json_o){?>
               <img class="images-brands-section img-responsive img-hover" src="<?php echo base_url().$json_o[0]; ?>" alt="">
               <?php }else{ ?>
               <img class="brands-no-image img-responsive img-hover" src="<?php echo base_url().ASSETS_FRONTEND_IMAGE_DIR;?>ldefault.png" alt="">
               <?php } ?>
               <?php } ?>
               <p><?php echo $brand->description; ?></p>
            </div>
            <?php }
               else { ?>
            <p> <?php echo 'No Record Found!'; ?> </p>
            <?php } ?>
            <hr />
         </div>
      </div>
   </div>
   <!-- /.row -->  
</div>
<!-- /.container -->
<?php $this->load->view('frontend/elements/footer'); ?>