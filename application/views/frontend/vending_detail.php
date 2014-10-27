<?php $this->load->view('frontend/elements/header'); ?>
<?php if(!empty($product) && $product->title == 'Hot Vending'){?>
<div class="ful-col">
   <nav>
      <div class="container">
         <div class="row clearfix">
            <ol class="breadcrumb">
               <div class="breadcrums"><span class="small-text"><a href="<?php echo base_url();?>">Home</a></span> </div>
               <div class="space">/</div>
               <div class="breadcrums"><span class="small-text"><a href="<?php echo base_url().'vending_solution/'; ?>">Vending Solutions</a></span> </div>
               <div class="space">/</div>
               <div class="breadcrums">
                  <span class="small-text-active">
                  Hot Vending Machine
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
<!-- Page Content -->
<div class="container">
   <div class="row">
      <?php if(!empty($product)) { ?> 
      <div class="col-md-12">
         <div class="col-md-7">
            <h2><?php echo $product->title; ?></h2>
            <p class="floating"><?php echo $product->description; ?></p>
         </div>
         <div class="col-md-5 col-space-top-l">
            <div class="hot_vending">
               <img class="img-responsive" src="<?php echo base_url().ASSETS_FRONTEND_IMAGE_DIR;?>vending_machine-bg.jpg" />
            </div>
         </div>
      </div>
      <div class="col-md-12 col-left">
            <a href="<?php echo base_url().'enquiry/'.$product->id; ?>"><button class="btn btn-enquiry">ENQUIRY</button></a>
         </div>
      <?php }
         else { ?>
      <p> <?php echo 'No Record Found!'; ?> </p>
      <?php } ?>
   </div>
</div>
<div class="ful-col-banner hot_vending_bottom"></div>
<!-- /.container -->
<?php }else{ ?>
<div class="ful-col">
   <nav>
      <div class="container">
         <div class="row clearfix">
            <ol class="breadcrumb">
               <div class="breadcrums"><span class="small-text"><a href="<?php echo base_url();?>">Home</a></span> </div>
               <div class="space">/</div>
               <div class="breadcrums"><span class="small-text"><a href="<?php echo base_url().'vending_solution/'; ?>">Vending Solutions</a></span> </div>
               <div class="space">/</div>
               <div class="breadcrums">
                  <span class="small-text-active">
                  Cold Vending Machine
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
<!-- Page Content -->
<div class="container">
   <div class="row">
      <?php if(!empty($product)) { ?> 
      <div class="col-md-12">
         <div class="col-md-6">
            <h2><?php echo $product->title; ?></h2>
            <p class="floating"><?php echo $product->description; ?></p>
         </div>
         <div class="col-md-6 col-space-top-l">
            <div class="cold_vending">
               <img class="img-responsive cold-vending-mc" src="<?php echo base_url().ASSETS_FRONTEND_IMAGE_DIR;?>cold_vending.png" />
            </div>
         </div>
      </div>      
      <?php }
         else { ?>
      <p> <?php echo 'No Record Found!'; ?> </p>
      <?php } ?>
   </div>
</div>
<div class="ful-col-banner cold_vending_bottom"></div>
<!-- /.container -->
<?php } ?>
<?php $this->load->view('frontend/elements/footer'); ?>
