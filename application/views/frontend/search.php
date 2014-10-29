<?php  $this->load->view('frontend/elements/header'); ?>
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
   <div class="row">
      <div class="col-lg-12">
         <h2>SEARCH RESULT FOR : <?php if(isset($search_string)){ echo $search_string; }?></h2>
         <?php if ($search_data->num_rows() > 0) {  ?>
         <div class="result_count">About <?php echo $search_data->num_rows; ?> results found </div>
         <?php foreach ($search_data->result() as $product){  ?>
         <div class="results">
            <a class="p-title" <?php if($product->seo_url == 'hot-vending' || $product->seo_url == 'cold-vending'){?>href="<?php echo base_url().'vending_product/'.$product->seo_url; ?>" <?php }else{ ?>href="<?php echo base_url().'product/'.$product->seo_url; ?>" <?php }?>>
               <h3><?php echo $product->title;?></h3>
            </a>
            <p><?php echo $product->description;?></p>
            <div class="read_more-col col-md-12 no-float"><a href="<?php echo base_url().'product/'.$product->seo_url; ?>" class="read_more">Read More</a></div>
         </div>
         <?php } ?>
         <?php } else { ?>
         <p class="col-margin"> <?php echo 'No Record Found!'; ?> </p>
         <?php } ?>
         <div class="clearfix"></div>
         <div class="col-md-8 new_search_col">
            <h3>NEED A NEW SEARCH?</h3>
            <p>If you didn't find what you were looking for, try a new search!</p>
            <form action="search" method="post">
               <input required="required" type="text" class="form-control search-box" id="search" name="search_string" value="">
               <button class="btn btn-search btn-search-new" type="submit"><i class="fa fa-search search-icon"></i></button>
            </form>
         </div>
      </div>
   </div>
</div>
<!-- /.container -->
<?php $this->load->view('frontend/elements/footer'); ?>
