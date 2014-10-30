<div id="modal-delete" class="modal modal-delete" tabindex="-1" role="dialog" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <form id="delform" action="">
            <input type="hidden" id="delitem" />
            <!-- Modal Header -->
            <div class="modal-header model-fixed-height">
               <h3 class="modal-title"><i class="fa fa-trash-o fa-fw"></i> Delete </h3>
               <a href="javascript:void(0);" onclick="$('.modal-delete').hide();" class="close-modal">×</a>
            </div>
            <!-- END Modal Header -->
            <!-- Modal Body -->
            <div class="del-msg">
               <p class="del-msg remove-padding">Are you sure do you want to delete this?</p>
               <div class="align-right">
                  <button type="button" class="btn btn-sm btn-primary" onclick="$('.modal-delete').hide();">Cancel</button>
                  <button type="submit" class="btn btn-sm btn-success" >Delete</button>
               </div>
            </div>
            <!-- END Modal Body -->
         </form>
      </div>
   </div>
</div>
<!-- User Settings, modal which opens from Settings link (found in top right user menu) and the Cog link (found in sidebar user info) -->
<div id="modal-user-settings" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <!-- Modal Header -->
         <div class="modal-header text-center">
            <h3 class="modal-title"><i class="fa fa-pencil"></i> Reset Password</h3>
         </div>
         <!-- END Modal Header -->
         <!-- Modal Body -->
         <div class="modal-body">
            <form action="<?php echo base_url();?>admin/reset_password" method="post" class="form-horizontal form-bordered">
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
                        <input type="text" id="first_name" name="val_first_name" class="form-control" autocomplete="off" value="<?php echo $this->session->userdata('first_name');?>" required="required">
                     </div>
                  </div>
                  <div class="form-group">
                     <label class="col-md-4 control-label" for="user-settings-email">Last Name</label>
                     <div class="col-md-8">
                        <input type="text" id="last_name" name="val_last_name" class="form-control" autocomplete="off" required="required" value="<?php echo $this->session->userdata('last_name');?>" required="required">
                     </div>
                  </div>
               </fieldset>
               <fieldset>
                  <legend>Password Update</legend>
                  <div class="form-group">
                     <label class="col-md-4 control-label" for="val_password">Password <span class="text-danger">*</span></label>
                     <div class="col-md-8">
                        <div class="input-group">
                           <input type="password" id="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,20}" name="val_password" class="form-control" placeholder="Choose a password.." required="required">
                           <span class="input-group-addon"><i class="gi gi-asterisk"></i></span>
                        </div>
                        <p class="note">Password must be between 8 and 20 characters and must contain a combination of uppercase, lowercase, and numeric digits.</p>
                     </div>
                  </div>
                  <div class="form-group">
                     <label class="col-md-4 control-label" for="val_confirm_password">Confirm Password <span class="text-danger">*</span></label>
                     <div class="col-md-8">
                        <div class="input-group">
                           <input type="password" oninput="check(this)" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" id="val_confirm_password" name="val_confirm_password" class="form-control" placeholder="..and confirm it!" required="required">
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
         </div>
         <!-- END Modal Body -->
      </div>
   </div>
</div>
<!-- END User Settings -->
</div>
<!-- END Page Content -->
<!-- Footer -->
<footer class="clearfix">
   <!-- <div class="pull-right">
      Crafted with <i class="fa fa-heart text-danger"></i> by <a href="http://goo.gl/vNS3I" target="_blank">pixelcave</a>
      </div>
      <div class="pull-left">
      <span id="year-copy"></span> &copy; <a href="http://goo.gl/TDOSuC" target="_blank">ProUI 2.0</a>
      </div>-->
</footer>
<!-- END Footer -->
</div>
<!-- END Main Container -->
</div>
<!-- END Page Container -->
<!-- Scroll to top link, initialized in js/app.js - scrollToTop() -->
<a href="#" id="to-top"><i class="fa fa-angle-double-up"></i></a>
<?php $this->load->view('backend/elements/footer_resources'); ?>
</body>
</html>