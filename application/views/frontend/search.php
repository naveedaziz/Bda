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
                        <div class="breadcrums"><span class="small-text-active">Search</span></div>
                     </ol>
                  </div>
               </div>
               <!-- /.row -->  
            </div>
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
   <!-- Categories Section -->
   <div class="row">
      <div class="span12">
         <div id="myTabContent" class="tab-content">
            <div class="tab-pane fade active in" id="service-one">
               <div class="row">
                  <div class="col-lg-12">
                     <?php if ($search_data->num_rows() > 0) { ?>
                     <?php foreach ($search_data->result() as $product){ ?>
                     <div class="col-md-3 col-margin">
                        <?php if(!empty($product->images)){ 
                           $string = $product->images;
                           if($string){
                           $json_o = (array) json_decode($string);
                           }else{
                           $json_o = '';
                           }
                           if($json_o){?>
                        <a href="<?php echo base_url().'product_detail/'.$product->id; ?>">
                        <img class="images-section img-responsive" src="<?php echo base_url().$json_o[0]; ?>" alt="">
                        </a>
                        <?php }else{ ?>
                        <a href="<?php echo base_url().'product_detail/'.$product->id; ?>">
                        <img class="product-images-section img-responsive" src="<?php echo base_url().ASSETS_FRONTEND_IMAGE_DIR;?>ldefault.png" alt="">
                        </a>
                        <?php } ?>
                        <h4 class="title"><a href="<?php echo base_url().'product_detail/'.$product->id; ?>"><?php echo $product->title;?></a></h4>
                        <?php } ?>
                     </div>
                     <?php } ?>
                  </div>
               </div>
               <div class="row text-center">
                  <div class="col-lg-12">
                  </div>
               </div>
               <?php } else { ?>
               <p class="col-margin"> <?php echo 'No Record Found!'; ?> </p>
               <?php } ?>
            </div>
         </div>
      </div>
   </div>
</div>
<!----  brand products----->
<!-- /.container -->
<?php $this->load->view('frontend/elements/footer'); ?>