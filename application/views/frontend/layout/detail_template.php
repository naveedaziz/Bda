<?php $this->load->view('frontend/elements/header'); ?>
<div class="ful-col">
   <nav>
      <div class="container">
         <div class="row clearfix">
            <ol class="breadcrumb">
                        <div class="breadcrums"><span class="small-text"><a href="<?php echo base_url();?>">Home</a></span> </div>
                        <div class="space">/</div>
                        <div class="breadcrums"><span class="small-text-active"><?php echo $page->title; ?></span></div>
                     </ol>
           </div>
         <!-- / .row clearfix -->
      </div>
      <!--- / .container -->
   </nav>
   <!-- / .nav -->
</div>
<!-- Page Content -->
<?php  if(!empty($page->images)){ 
   $string = $page->images;
   if($string){
   $json_o = (array) json_decode($string);
   }else{
   $json_o = '';
   }
   } ?>
<div class="container">
   <div class="row">
      <div <?php if($json_o){?> class="col-md-7 content_pages" <?php }else{ ?> class="col-md-12 content_pages" <?php } ?>>
               <h2><?php echo $page->title; ?></h2>
               <p class="floating">
                  <?php echo $page->description; ?>
               </p>
            </div>
            <div class="col-md-5 col-space-top">
               <?php if($json_o){?>
               <img class="images-section img-responsive" src="<?php echo base_url().$json_o[0]; ?>" alt="About US" />
               <?php } ?>
            </div>
   </div>
</div>
<?php $this->load->view('frontend/elements/footer'); ?>