<?php $this->load->view('backend/elements/header'); ?>
<!-- Page content -->
<div id="page-content">
   <form id="form-validation" action="<?php echo base_url();?>update_account" method="post" class="form-horizontal" enctype="multipart/form-data">
      <input type="hidden" value="<?php echo $row->id; ?>" name="id" />
      <div class="row">
         <div class="col-sm-12 margin-bottom">
            <div class="row">
               <div class="col-sm-9">
                  <h3 class="remove-margin"> <i class="fa fa-users fa-fw"></i> Edit Query Notification</h3>
               </div>
               <div class="col-sm-3 align-right">
                  <div class="col-xs-12 remove-padding">
                     <button type="button" class="btn btn-sm btn-primary" onclick="window.history.back()">Cancel</button>
                     <input type="submit" name="submit" value="Save" class="btn btn-sm btn-success" />
                  </div>
               </div>
            </div>
            <hr>
         </div>
      </div>
      <!-- Mini main contant Row -->
      <div class="row">
         <div class="col-sm-12">
            <div class="row">
               <div class="col-sm-3">
                  <h5 class="remove-margin"><b>Account information</b></h5>
                  <p>All information relevant to the account.</p>
               </div>
               <div class="col-sm-9">
                  <div class="form-group">
                     <div class="col-xs-6">
                        <b>First Name</b>
                        <input type="text" id="first_name" name="first_name" class="form-control" value="<?php echo $row->first_name; ?>" autocomplete="off">
                     </div>
                     <div class="col-xs-6">
                        <b> Last Name</b>
                        <input type="text" id="last_name" name="last_name" class="form-control" value="<?php echo $row->last_name; ?>" autocomplete="off">
                     </div>
                  </div>
                  <div class="form-group">
                     <div class="col-xs-6">
                        <b>Email</b>
                        <input disabled="disabled" type="email" id="email" name="val_email" class="form-control"  value="<?php echo $row->email; ?>" autocomplete="off">
                     </div>
                     <div class="col-xs-6">
                        <b> City</b>
                        <select class="form-control" name="city" id="city">
                           <option value="">Please select city</option>
                           <option value="Lahore" <?php if($row->city == 'Lahore'){?> selected="selected" <?php } ?> >Lahore</option>
                           <option value="Karachi" <?php if($row->city == 'Karachi'){?> selected="selected" <?php } ?> >Karachi</option>
                           <option value="Islamabad" <?php if($row->city == 'Islamabad'){?> selected="selected" <?php } ?> >Islamabad</option>
                        </select>
                     </div>
                  </div>
                  <hr />
                  <b>Invite/Send Password</b> 
                  <div class="form-group">
                     <div class="col-xs-8">
                        <br/>
                        <button class="btn btn-success" type="button">Send Password</button>
                     </div>
                  </div>
               </div>
            </div>
            <hr />
            <div class="row">
               <div class="col-sm-12">
                  <div class="row">
                     <div class="col-sm-3">
                        <h5 class="remove-margin"><b>Admin Access</b></h5>
                        <p>Select the sections that <?php echo $this->session->userdata('first_name').' '.$this->session->userdata('last_name');?> should have access to.</p>
                     </div>
                     <div class="col-sm-9">
                        <div class="form-group">
                           <div class="col-xs-2">
                              <label class="switch switch-success" data-toggle="tooltip" title="Limited Access">
                              <input type="checkbox" id="access_limited" name="access_limited" <?php if($row->access_limited == 1){?> checked="checked" value="1" <?php } ?> >
                              <span></span>
                              </label>
                           </div>
                        </div>
                        <div class="form-group">
                           <div class="col-xs-9">
                              <div id="limited_access_block">
                                 <?php 
                                    if($row->access_list){
                                     $access_list_string = $row->access_list;
                                     $json_o = (array) json_decode($access_list_string);
                                    ?>
                                 <label for="example-inline-checkbox1" class="checkbox-inline">
                                 <input type="checkbox" value="query" name="access_list[]" <?php if (in_array('query', $json_o)) {?> checked="checked" <?php } ?> id="example-inline-checkbox1"> Query
                                 </label>
                                 <label for="example-inline-checkbox1" class="checkbox-inline">
                                 <input type="checkbox" value="category" name="access_list[]" <?php if (in_array('category', $json_o)) {?> checked="checked" <?php } ?> id="example-inline-checkbox1"> Category
                                 </label>
                                 <label for="example-inline-checkbox1" class="checkbox-inline">
                                 <input type="checkbox" value="brands" name="access_list[]" <?php if (in_array('brands', $json_o)) {?> checked="checked" <?php } ?> id="example-inline-checkbox1"> Brands
                                 </label>
                                 <label for="example-inline-checkbox1" class="checkbox-inline">
                                 <input type="checkbox" value="product" name="access_list[]" <?php if (in_array('product', $json_o)) {?> checked="checked" <?php } ?> id="example-inline-checkbox1"> Product
                                 </label>
                                 <label for="example-inline-checkbox1" class="checkbox-inline">
                                 <input type="checkbox" value="page" name="access_list[]" <?php if (in_array('page', $json_o)) {?> checked="checked" <?php } ?> id="example-inline-checkbox1"> Page
                                 </label>
                                 <label for="example-inline-checkbox1" class="checkbox-inline">
                                 <input type="checkbox" value="banners" name="access_list[]" <?php if (in_array('banners', $json_o)) {?> checked="checked" <?php } ?> id="example-inline-checkbox1"> Banners
                                 </label>
                                 <label for="example-inline-checkbox1" class="checkbox-inline">
                                 <input type="checkbox" value="notification" name="access_list[]" <?php if (in_array('notification', $json_o)) {?> checked="checked" <?php } ?> id="example-inline-checkbox1"> Notification
                                 </label>
                                 <label for="example-inline-checkbox1" class="checkbox-inline">
                                 <input type="checkbox" value="accounts" name="access_list[]" <?php if (in_array('accounts', $json_o)) {?> checked="checked" <?php } ?> id="example-inline-checkbox1"> Account Setting
                                 </label>
                                 <?php }else{ ?>
                                 <label for="example-inline-checkbox1" class="checkbox-inline">
                                 <input type="checkbox" value="query" name="access_list[]" id="example-inline-checkbox1"> Query
                                 </label>
                                 <label for="example-inline-checkbox1" class="checkbox-inline">
                                 <input type="checkbox" value="category" name="access_list[]" id="example-inline-checkbox1"> Category
                                 </label>
                                 <label for="example-inline-checkbox1" class="checkbox-inline">
                                 <input type="checkbox" value="brands" name="access_list[]" id="example-inline-checkbox1"> Brands
                                 </label>
                                 <label for="example-inline-checkbox1" class="checkbox-inline">
                                 <input type="checkbox" value="product" name="access_list[]" id="example-inline-checkbox1"> Product
                                 </label>
                                 <label for="example-inline-checkbox1" class="checkbox-inline">
                                 <input type="checkbox" value="page" name="access_list[]" id="example-inline-checkbox1"> Page
                                 </label>
                                 <label for="example-inline-checkbox1" class="checkbox-inline">
                                 <input type="checkbox" value="banners" name="access_list[]" id="example-inline-checkbox1"> Banners
                                 </label>
                                 <label for="example-inline-checkbox1" class="checkbox-inline">
                                 <input type="checkbox" value="notification" name="access_list[]" id="example-inline-checkbox1"> Notification
                                 </label>
                                 <label for="example-inline-checkbox1" class="checkbox-inline">
                                 <input type="checkbox" value="accounts" name="access_list[]" id="example-inline-checkbox1"> Account Setting
                                 </label>
                                 <?php } ?>
                              </div>
                           </div>
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