<?php $this->load->view('backend/elements/header_resources'); ?>
<div id="login-container" class="animation-fadeIn">
   <?php if ( $this->session->flashdata('error_message') ) { ?>
   <div class="alert alert-success">
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
      <form name="login" method="post" class="form-horizontal form-bordered form-control-borderless" action="<?php echo base_url();?>admin/reset-password/<?php echo $key;?>">
         <?php if(!isset($_REQUEST['success'])) { ?>
         <div class="form-group">
            <div class="col-xs-12">
               <div class="input-group">
                  <span class="input-group-addon"><i class="gi gi-asterisk"></i></span>
                  <input type="password" id="val_password" name="val_password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,20}" required="required" class="form-control input-lg" placeholder="Password" data-rule-required="true" value="" required="required" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}">
               </div>
               <p class="note">Password must be between 8 and 20 characters and must contain a combination of uppercase, lowercase, and numeric digits.</p>
             </div>
         </div>
         <div class="form-group">
            <div class="col-xs-12">
               <div class="input-group">
                  <span class="input-group-addon"><i class="gi gi-asterisk"></i></span>
                  <input type="password" id="val_confirm_password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,20}" required="required" name="val_confirm_password" class="form-control input-lg" placeholder="Confirm Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required="required" data-rule-required="true" value="" >
               </div>
            </div>
         </div>
         <div class="form-group form-actions">
            <div class="col-xs-12 text-center">
               <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-angle-right"></i> Reset Password </button>
            </div>
         </div>
         <?php }else{ ?>
         <div class="alert alert-danger alert-dismissable"> 
            Password update successfull. Please proceed to login screen.
         </div>
         <?php } ?>
         <div class="form-group">
            <div class="col-xs-12 text-center">
               <a href="../login" id="link-reminder-login"><small>Back to Login</small></a> 
            </div>
         </div>
      </form>
      <!-- END Login Form -->
   </div>
   <!-- END Login Block -->
</div>
<?php $this->load->view('backend/elements/footer_resources');?>
