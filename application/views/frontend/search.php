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
           <div class="breadcrums">
           <span class="small-text-active">
           <?php if ($categories->num_rows() > 0) { 
                 foreach ($categories->result() as $category){ 
                 if($category->id === $active_category){
                  echo $category->title;
			if($this->session->userdata('category') != $category->title) 
				$this->session->set_userdata('category', $category->title); 
				$this->session->set_userdata('category_id', $category->id); 
			  } ?>
              <?php } } ?>
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
     <!-- Categories Section -->
     <div class="row">
      <div class="span12">
       <div id="myTabContent" class="tab-content">
                <div class="tab-pane fade active in" id="service-one">
                  <div class="row">
      				<div class="col-lg-12">
                <?php if ($products->num_rows() > 0) { ?>
				   <h4 class="heading">BEVERAGES</h4> 
                   <?php foreach ($products->result() as $product){
				    if($product->type == 'beverages'){ ?>
                    <div class="col-md-3 col-margin">
                     <?php if(!empty($product->images)){ 
                                $string = $product->images;
                                if($string){
                                $json_o = (array) json_decode($string);
                                }else{
                                $json_o = '';
                                }
                                if($json_o){?>
                         <a href="<?php echo base_url().'frontend/product_detail/'.$product->id; ?>">
                         <img class="images-section img-responsive" src="<?php echo base_url().$json_o[0]; ?>" alt="">
                         </a>
                         <?php }else{ ?>
                         <a href="<?php echo base_url().'frontend/product_detail/'.$product->id; ?>">
                         <img class="product-images-section img-responsive" src="<?php echo base_url().ASSETS_FRONTEND_IMAGE_DIR;?>ldefault.png" alt="">
                         </a>
                         <?php } ?>
                         <h4 class="title"><a href="<?php echo base_url().'frontend/product_detail/'.$product->id; ?>"><?php echo $product->title;?></a></h4>
                         <?php } ?>
                </div>
                <?php } } ?>
                </div>
               </div>
                 <div class="row">
      		     <div class="col-lg-12">
                <h3 class="heading">Food</h3>
                	<?php foreach ($products->result() as $product){
					if($product->type == 'food'){ ?>
                    <div class="col-md-3 col-margin">
                     <?php if(!empty($product->images)){ 
                                $string = $product->images;
                                if($string){
                                $json_o = (array) json_decode($string);
                                }else{
                                $json_o = '';
                                }
                                if($json_o){?>
                         <a href="<?php echo base_url().'frontend/product_detail/'.$product->id; ?>">
                         <img class="images-section img-responsive" src="<?php echo base_url().$json_o[0]; ?>" alt="">
                         </a>
                         <?php }else{ ?>
                         <a href="<?php echo base_url().'frontend/product_detail/'.$product->id; ?>">
                         <img class="product-images-section img-responsive" src="<?php echo base_url().ASSETS_FRONTEND_IMAGE_DIR;?>ldefault.png" alt="">
                         </a>
                         <?php } ?>
                         <h4 class="title"><a href="<?php echo base_url().'frontend/product_detail/'.$product->id; ?>"><?php echo $product->title;?></a></h4>
                         <?php } ?>
                    </div>
                    <?php  } ?>
                   <?php  } ?>
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
<div class="ful-col-product">
    <nav>
       <div class="container">
        <div class="row clearfix">
           <div class="col-md-12 column">
            <div class="row">
             <div class="col-md-6">
           	  <h4 class="msg-bottom">THESE HOTELS & RESTURANT USING HORECA PRODUCTS</h4>
             </div>
             <div class="col-md-6">
           	  <img class="thumbs-product" src="<?php echo base_url().ASSETS_FRONTEND_IMAGE_DIR;?>products-thumbs.jpg" alt="" />
              <img class="thumbs-product" src="<?php echo base_url().ASSETS_FRONTEND_IMAGE_DIR;?>products-thumbs.jpg" alt="" />
              <img class="thumbs-product" src="<?php echo base_url().ASSETS_FRONTEND_IMAGE_DIR;?>products-thumbs.jpg" alt="" />
              <img class="thumbs-product" src="<?php echo base_url().ASSETS_FRONTEND_IMAGE_DIR;?>products-thumbs.jpg" alt="" />
             </div>
            </div> <!-- /.row -->  
           </div> <!-- / .col-md-12 column -->
       </div> <!-- / .row clearfix -->
       </div> <!--- / .container --->
    </nav> <!-- / .nav -->
</div>
<!-- /.container -->
<?php $this->load->view('frontend/elements/footer'); ?>>>>>>>