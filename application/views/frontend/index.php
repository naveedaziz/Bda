<?php $this->load->view('frontend/elements/header_slider'); ?>
<!-- Page Content -->
<div class="container">
   <!-- Categories Section -->
   <div class="row">
      <div class="col-lg-12">
         <h3>
            Choose your business
         </h3>
      </div>
      <?php if ($brands->num_rows() > 0) { 
         foreach ($brands->result() as $brand){ ?>
      <div class="col-md-4">
         <?php 
            if(!empty($brand->images)){ 
            	$string = $brand->images;
            	if($string){
            	$json_o = (array) json_decode($string);
            	}else{
            	$json_o = '';
            	}
            	if($json_o){?>
         <a href="<?php echo base_url().'frontend/allProducts/'.$brand->id; ?>">
         <img class="images-section img-responsive" src="<?php echo base_url().$json_o[0]; ?>" alt="<?php echo $brand->title; ?>">
         </a>
         <?php }else{ ?>
         <a href="<?php echo base_url().'frontend/allProducts/'.$brand->id; ?>">
         <img class="no-image img-responsive" src="<?php echo base_url().ASSETS_FRONTEND_IMAGE_DIR;?>default.png" alt="">
         </a>
         <?php } ?>
         <?php } ?>
         <h4> <a href="<?php echo base_url().'frontend/allProducts/'.$brand->id; ?>" class="title-link"><?php echo $brand->title; ?></a></h4>
      </div>
      <?php } ?>
      <div class="row text-center">
         <div class="col-lg-12">
            <?php echo $this->pagination->create_links(); ?> 
         </div>
      </div>
      <?php } else { ?>
      <p> <?php echo 'No Record Found!'; ?> </p>
      <?php } ?>
   </div>
   <!-- /.row -->  
</div>
<!-- /.container -->
<?php $this->load->view('frontend/elements/footer'); ?>