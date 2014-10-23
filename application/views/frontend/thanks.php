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
                        <div class="breadcrums"><span class="small-text-active">Thanks</span></div>
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
      <!-- /.row -->
      <div class="span12">
         <div class="col-md-10">
            <p class="success-msg">Your enquiry has been submited successfully.</p>
            <p> Team Nestle professionals will contact you shortly. </p>
         </div>
      </div>
   </div>
   <!-- /.row -->  
</div>
<!-- /.container -->
<?php $this->load->view('frontend/elements/footer'); ?>