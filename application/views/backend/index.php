<?php $this->load->view('backend/elements/header_resources'); ?>
<div id="login-container" class="animation-fadeIn">
   <?php if ( $this->session->flashdata('error_message') ) { ?>
   <div class="alert alert-danger alert-dismissable">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
      <h4><i class="fa fa-times-circle"></i> Error! </h4>
      <?php echo $this->session->flashdata('error_message'); ?>  
   </div>
   <?php } ?>
   <!-- Login Title -->
   <div class="login-title text-center">
      <h1><strong>Nestle Professionals</strong></h1>
   </div>
   <!-- END Login Title -->
   <!-- Login Block -->
   <div class="block push-bit">
      <!-- Login Form -->
      <form name="login" method="post" id="form-validation" class="form-horizontal form-bordered form-control-borderless" action="<?php echo base_url();?>login">
         <div class="form-group">
            <div class="col-xs-12">
               <div class="input-group">
                  <span class="input-group-addon"><i class="gi gi-envelope"></i></span>
                  <input type="text" id="val_email" name="val_email" class="form-control input-lg" placeholder="Email" autocomplete="off" value="" data-rule-required="true" data-rule-email="true">
               </div>
            </div>
         </div>
         <div class="form-group">
            <div class="col-xs-12">
               <div class="input-group">
                  <span class="input-group-addon"><i class="gi gi-asterisk"></i></span>
                  <input type="password" id="password" name="password" class="form-control input-lg" placeholder="Password" data-rule-required="true" value="" >
               </div>
            </div>
         </div>
         <div class="form-group form-actions">
            <div class="col-xs-12 text-center">
               <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-angle-right"></i> Login </button>
            </div>
         </div>
         <div class="form-group">
            <div class="col-xs-12 text-center">
               <a href="javascript:void(0)" id="link-reminder-login"><small>Forgot password?</small></a> 
            </div>
         </div>
      </form>
      <!-- END Login Form -->
   </div>
   <!-- END Login Block -->
</div>
<?php $this->load->view('backend/elements/footer_resources');?>