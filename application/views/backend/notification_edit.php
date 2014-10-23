<?php $this->load->view('backend/elements/header'); ?>
<!-- Page content -->
<div id="page-content">
   <form id="form-validation" action="<?php echo base_url();?>update_notification" method="post" class="form-horizontal" enctype="multipart/form-data">
      <input type="hidden" value="<?php echo $row->id; ?>" name="id" />
      <div class="row">
         <div class="col-sm-12  fixed-height">
            <div class="row">
               <div class="col-sm-12">
                  <h3 class="remove-margin"> <i class="fa fa-info-circle fa-fw"></i> Edit Query Notification</h3>
               </div>
            </div>
            <hr>
         </div>
      </div>
      <!-- Mini main contant Row -->
      <div class="row">
         <div class="col-sm-12">
            <div class="row">
               <div class="col-sm-8">
                  <div class="modal-body">
                     <div class="block">
                        <div class="block-title text-center">
                           <h4>Subscriber Information</h4>
                        </div>
                        <fieldset>
                           <div class="form-group">
                              <label class="col-md-4 control-label" for="user-settings-password">First Name</label>
                              <div class="col-md-6">
                                 <input type="text" id="first_name" name="first_name" class="form-control" value="<?php echo $row->first_name; ?>" autocomplete="off">
                              </div>
                           </div>
                           <div class="form-group">
                              <label class="col-md-4 control-label" for="user-settings-repassword">Last Name</label>
                              <div class="col-md-6">
                                 <input type="text" id="last_name" name="last_name" class="form-control" value="<?php echo $row->last_name; ?>" autocomplete="off">
                              </div>
                           </div>
                           <div class="form-group">
                              <label class="col-md-4 control-label" for="user-settings-repassword">Email</label>
                              <div class="col-md-6">
                                 <input  disabled="disabled"  type="email" id="email" name="val_email" class="form-control"  value="<?php echo $row->email; ?>" autocomplete="off">
                              </div>
                           </div>
                           <div class="form-group">
                              <label class="col-md-4 control-label" for="user-settings-repassword">Notifications</label>
                              <div class="col-md-6">
                                 <label class="switch switch-success" data-toggle="tooltip" title="notification status enable/disable">
                                 <input type="checkbox" id="status" name="notification_status" <?php if($row->status == 1){?> checked="checked" value="1" <?php } ?> >
                                 <span></span>
                                 </label> 
                              </div>
                           </div>
                           <br />
                           <div class="form-group">
                              <label class="col-md-4 control-label" for="user-settings-repassword"> &nbsp; </label>
                              <div class="col-md-6">
                                 <button type="button" class="btn btn-sm btn-primary" onclick="window.history.back()">Cancel</button>
                                 <button type="submit" class="btn btn-sm btn-success" name="submit">Save</button>
                              </div>
                           </div>
                        </fieldset>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- END main contant Row -->
   </form>
</div>
</div>
<!-- END Page Content -->
<?php $this->load->view('backend/elements/footer'); ?>