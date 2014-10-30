<?php $this->load->view('frontend/elements/header'); ?>
<div class="ful-col">
   <nav>
      <div class="container">
         <div class="row clearfix">
            <ol class="breadcrumb">
               <div class="breadcrums"><span class="small-text"><a href="<?php echo base_url();?>">Home</a></span> </div>
               <div class="space">/</div>
               <div class="breadcrums">
                  <span class="small-text-active">
                  <?php if ($categories->num_rows() > 0) { 
                     foreach ($categories->result() as $category){ 
                     if($category->seo_url === $active_category){
                      echo $category->title;
                     if($this->session->userdata('category') != $category->title) 
                     $this->session->set_userdata('category', $category->title); 
                     $this->session->set_userdata('category_id', $category->id); 
                     $this->session->set_userdata('category_seo_url', $category->seo_url); 
                     } ?>
                  <?php } } ?>
                  </span>
               </div>
            </ol>
         </div>
         <!-- / .row clearfix -->
      </div>
      <!--- / .container -->
   </nav>
   <!-- / .nav -->
</div>
<!-- tabs -->
<div class="container">
   <!-- Categories Section -->
   <div class="row">
      <div class="col-lg-12">
         <ul id="myTab" class="nav nav-tabs nav-justified tabs-categories">
            <?php if ($categories->num_rows() > 0) { 
               foreach ($categories->result() as $category){ ?>
            <li <?php if($category->seo_url === $active_category){?> class="float-left-33 active" <?php }else{ ?>class="float-left-33" <?php } ?>><a href="<?php echo base_url().'category/'.$category->seo_url; ?>"><?php echo $category->title;?></a></li>
            <?php }  ?>
            <?php }?>
         </ul>
      </div>
   </div>
   <!-- /.row -->
</div>
<!-- /.container -->
<div class="ful-col-banner">
   <div class="container" id="category-inner">
      <div class="row clearfix">
         <?php if ($categories->num_rows() > 0) { 
            foreach ($categories->result() as $category){ 
            if($category->seo_url === $active_category){ ?>
         <div class="col-md-6">
            <header id="myCarousel" class="carousel slide myCarouselContent myCarouselList">
               <!-- Indicators -->
               <ol class="carousel-indicators">
                  <?php if($category->images){ 
                     $index = 0;
                                       $string = $category->images;
                                       if($string){
                                       $json_o = (array) json_decode($string);
                                       }else{
                                       $json_o = '';
                                       }
                                       if($json_o){
                                       foreach($json_o as $key =>$value){ ?>
                  <li data-target="#myCarousel" data-slide-to="<?php echo $index;?>" <?php if($index == 0){?> class="active"<?php } ?>></li>
                  <?php $index++; } ?>
                  <?php } ?>
                  <?php } ?>
               </ol>
               <!-- Wrapper for slides -->
               <div class="carousel-inner" id="category-carousel-inner" >
                  <?php if($category->images){ 
                     $string = $category->images;
                     if($string){
                     $json_o = (array) json_decode($string);
                     }else{
                     $json_o = '';
                     }
                     if($json_o){
                     foreach($json_o as $key =>$value){ ?>
                  <div class="item">
                     <div class="fill product-slider-fill" style="background-image:url('<?php echo base_url().$json_o[$key]; ?>');"></div>
                  </div>
                  <?php } ?>
                  <?php }else{ ?>
                  <div class="item">
                     <div class="fill" style="background-image:url('<?php echo base_url().ASSETS_FRONTEND_IMAGE_DIR;?>default.jpg');"></div>
                  </div>
                  <?php } ?>
                  <?php }   ?>
               </div>
            </header>
         </div>
         <div class="col-md-6 column category-slider-col-content">
            <h3><?php echo $category->title; ?></h3>
            <p><?php echo $category->description; ?></p>
         </div>
         <?php } } } ?>
      </div>
      <!-- / .row clearfix -->
   </div>
   <!--- / .container -->
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
                     <div class="col-md-3 col-margin  margin-bottom-30">
                        <div class="thumbnail-products-cat">
                           <div class="caption">
                              <a href="<?php echo base_url().'product/'.$product->seo_url; ?>">
                              <button class="btn btn-learn-more">LEARN MORE</button>
                              </a>
                           </div>
                           <?php if(!empty($product->banner_images)){ 
                              $string = $product->banner_images;
                              if($string){
                              $json_o = (array) json_decode($string);
                              }else{
                              $json_o = '';
                              }
                              if($json_o){?>
                           <a href="<?php echo base_url().'product/'.$product->seo_url; ?>">
                           <img class="images-section img-responsive" src="<?php echo base_url().$json_o[0]; ?>" alt="">
                           </a>
                           <?php }else{ ?>
                           <a href="<?php echo base_url().'product/'.$product->seo_url; ?>">
                           <img class="product-images-section img-responsive" src="<?php echo base_url().ASSETS_FRONTEND_IMAGE_DIR;?>default.jpg" alt="">
                           </a>
                           <?php } ?>
                        </div>
                        <h4 class="title"><a href="<?php echo base_url().'product/'.$product->seo_url; ?>"><?php echo $product->title;?></a></h4>
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
                     <div class="col-md-3 col-margin  margin-bottom-30">
                        <div class="thumbnail-products-cat">
                           <div class="caption">
                              <a href="<?php echo base_url().'product/'.$product->seo_url; ?>">
                              <button class="btn btn-learn-more">LEARN MORE</button>
                              </a>
                           </div>
                           <?php if(!empty($product->banner_images)){ 
                              $string = $product->banner_images;
                              if($string){
                              $json_o = (array) json_decode($string);
                              }else{
                              $json_o = '';
                              }
                              if($json_o){?>
                           <a href="<?php echo base_url().'product/'.$product->seo_url; ?>">
                           <img class="images-section img-responsive" src="<?php echo base_url().$json_o[0]; ?>" alt="">
                           </a>
                           <?php }else{ ?>
                           <a href="<?php echo base_url().'product/'.$product->seo_url; ?>">
                           <img class="product-images-section img-responsive" src="<?php echo base_url().ASSETS_FRONTEND_IMAGE_DIR;?>default.jpg" alt="">
                           </a>
                           <?php } ?>
                        </div>
                        <h4 class="title"><a href="<?php echo base_url().'product/'.$product->id; ?>"><?php echo $product->title;?></a></h4>
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
               <p class="no-record-found"> <?php echo 'No Record Found!'; ?> </p>
               <?php } ?>
            </div>
         </div>
      </div>
   </div>
</div>
<!----  brand products----->
<?php if ($categories->num_rows() > 0) { 
   foreach ($categories->result() as $category){ 
       if($category->seo_url === $active_category){ ?>
<div class="ful-col-product">
   <nav>
      <div class="container">
         <div class="row clearfix">
            <div class="col-md-12 column">
               <div class="row">
                  <div class="col-md-6">
                     <h4 class="msg-bottom">THESE <?php echo $category->title; ?> USING THESE PRODUCTS</h4>
                  </div>
                  <div class="col-md-6">
                     <?php if(!empty($category->hotel_images)){ 
                        $string = $category->hotel_images;
                        if($string){
                        $json_o = (array) json_decode($string);
                        }else{
                        $json_o = '';
                        }
                        if($json_o){
                        foreach($json_o as $key =>$value){ ?>
                     <img class="thumbs-product img-responsive left-float" src="<?php echo base_url().$json_o[$key]; ?>" alt="<?php echo $category->id; ?>" />
                     <?php } ?>
                     <?php } ?>
                     <?php } ?>
                  </div>
               </div>
               <!-- /.row -->  
            </div>
            <!-- / .col-md-12 column -->
         </div>
         <!-- / .row clearfix -->
      </div>
      <!--- / .container --->
   </nav>
   <!-- / .nav -->
</div>
<?php } ?>
<?php } } ?>
<!-- /.container -->
<?php $this->load->view('frontend/elements/footer'); ?>