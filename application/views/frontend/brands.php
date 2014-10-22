<?php $this->load->view('frontend/elements/header_slider'); ?>
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
            <hr />
            <?php if ($brands->num_rows() > 0) { 
               foreach ($brands->result() as $brand){ ?>
            <div class="col-md-3 img-portfolio">
               <?php 
                  if(!empty($brand->images)){ 
                  	$string = $brand->images;
                  	if($string){
                  	$json_o = (array) json_decode($string);
                  	}else{
                  	$json_o = '';
                  	}
                  	if($json_o){?>
               <a href="<?php echo base_url().'frontend/brand_detail/'.$brand->id; ?>">
               <img class="images-brands-section img-responsive img-hover" src="<?php echo base_url().$json_o[0]; ?>" alt="">
               </a>
               <?php }else{ ?>
               <a href="<?php echo base_url().'frontend/brand_detail/'.$brand->id; ?>">
               <img class="brands-no-image img-responsive img-hover" src="<?php echo base_url().ASSETS_FRONTEND_IMAGE_DIR;?>ldefault.png" alt="">
               </a>
               <?php } ?>
               <?php } ?>
               <h4> <a href="<?php echo base_url().'frontend/brand_detail/'.$brand->id; ?>" class="title-link"><?php echo $brand->title; ?></a></h4>
            </div>
            <?php } ?>
            <div class="row text-center">
               <div class="col-lg-12">
                  <?php echo $this->pagination->create_links(); ?> 
               </div>
            </div>
            <?php }
               else { ?>
            <p> <?php echo 'No Record Found!'; ?> </p>
            <?php } ?>
         </div>
      </div>
   </div>
   <!-- /.row -->  
</div>
<!-- /.container -->
<?php $this->load->view('frontend/elements/footer'); ?>