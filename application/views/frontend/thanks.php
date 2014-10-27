<?php $this->load->view('frontend/elements/header'); ?>
<div class="ful-col">
   <nav>
      <div class="container">
         <div class="row clearfix">
              <ol class="breadcrumb">
                        <div class="breadcrums"><span class="small-text"><a href="<?php echo base_url();?>">Home</a></span> </div>
                        <div class="space">/</div>
                        <div class="breadcrums"><span class="small-text-active">Thanks</span></div>
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
   <!-- Categories Section -->
   <div class="row">
      <!-- /.row -->
      <div class="span12 thanks-page">
            <p class="success-msg">Your enquiry has been submited successfully.</p>
            <p> Team Nestle professionals will contact you shortly. </p>
              <a href="<?php echo base_url(); ?>">Go Back To Home</a>
      </div>
   </div>
   <!-- /.row -->  
</div>
<!-- /.container -->
<?php $this->load->view('frontend/elements/footer'); ?>