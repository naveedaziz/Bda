<?php $this->load->view('frontend/elements/header_slider'); ?>
<!-- Page Content -->
<div class="container">
   <div class="row">
      <div class="col-lg-12">
         <h3>
            Choose your business
         </h3>
      </div>
      <?php if ($categories->num_rows() > 0) { 
         foreach ($categories->result() as $category){ ?>
      <div class="col-md-4 margin-bottom-30">
         <?php 
            if(!empty($category->images)){ 
            	$string = $category->images;
            	if($string){
            	$json_o = (array) json_decode($string);
            	}else{
            	$json_o = '';
            	}
            	if($json_o){?>
         <a href="<?php echo base_url().'category/'.$category->seo_url; ?>">
         <img class="images-section img-responsive" src="<?php echo base_url().$json_o[0]; ?>" alt="<?php echo $category->title; ?>">
         </a>
         <?php }else{ ?>
         <a href="<?php echo base_url().'category/'.$category->seo_url; ?>">
         <img class="category_default img-responsive" src="<?php echo base_url().ASSETS_FRONTEND_IMAGE_DIR;?>default.jpg" alt="">
         </a>
         <?php } ?>
         <?php } ?>
         <h4 class="title"> <a href="<?php echo base_url().'category/'.$category->seo_url; ?>" class=""><?php echo $category->title; ?></a></h4>
      </div>
      <?php } ?>
      <?php } else { ?>
      <p> <?php echo 'No Record Found!'; ?> </p>
      <?php } ?>
   </div>
   <!-- /.row -->  
</div>
<!-- /.container -->
<?php $this->load->view('frontend/elements/footer'); ?>
