<?php $this->load->view('backend/elements/header_resources'); ?>
<div id="login-container" class="animation-fadeIn">
   <!-- Login Title -->
   <div class="login-title text-center">
      <h1><strong>Password Update</strong></h1>
   </div>
   <!-- END Login Title -->
   <!-- Login Block -->
   <div class="block push-bit">
      <!-- Login Form -->
      <form id="profile-setting" action="<?php echo base_url();?>admin/resetPassword" method="post" class="form-horizontal form-bordered">
         <input type="hidden" value="<?php echo $this->session->userdata('admin_id');?>" name="admin_id" />
         <fieldset>
            <legend>Vital Info</legend>
            <div class="form-group">
               <label class="col-md-4 control-label">Email</label>
               <div class="col-md-8">
                  <p class="form-control-static"><?php echo $this->session->userdata('admin_email');?></p>
               </div>
            </div>
            <div class="form-group">
               <label class="col-md-4 control-label" for="user-settings-email">First Name</label>
               <div class="col-md-8">
                  <input type="text" id="first_name" name="val_first_name" class="form-control" autocomplete="off" value="<?php echo $this->session->userdata('first_name');?>">
               </div>
            </div>
            <div class="form-group">
               <label class="col-md-4 control-label" for="user-settings-email">Last Name</label>
               <div class="col-md-8">
                  <input type="text" id="last_name" name="val_last_name" class="form-control" autocomplete="off" required="required" value="<?php echo $this->session->userdata('last_name');?>">
               </div>
            </div>
         </fieldset>
         <fieldset>
            <legend>Password Update</legend>
            <div class="form-group">
               <label class="col-md-4 control-label" for="val_password">Password <span class="text-danger">*</span></label>
               <div class="col-md-8">
                  <div class="input-group">
                     <input type="password" id="val_password" name="val_password" class="form-control" placeholder="Choose a password..">
                     <span class="input-group-addon"><i class="gi gi-asterisk"></i></span>
                  </div>
               </div>
            </div>
            <div class="form-group">
               <label class="col-md-4 control-label" for="val_confirm_password">Confirm Password <span class="text-danger">*</span></label>
               <div class="col-md-8">
                  <div class="input-group">
                     <input type="password" id="val_confirm_password" name="val_confirm_password" class="form-control" placeholder="..and confirm it!">
                     <span class="input-group-addon"><i class="gi gi-asterisk"></i></span>
                  </div>
               </div>
            </div>
         </fieldset>
         <div class="form-group form-actions">
            <div class="col-xs-12 text-right">
               <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">Close</button>
               <button type="submit" class="btn btn-sm btn-success">Save Changes</button>
            </div>
         </div>
      </form>
      <!-- END Login Form -->
   </div>
   <!-- END Login Block -->
</div>
<?php $this->load->view('backend/elements/footer_resources');?>
