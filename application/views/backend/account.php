<?php $this->load->view('backend/elements/header'); ?>
<!-- Page content -->
<div id="page-content">
   <div class="row">
      <div class="col-sm-12 fixed-height">
         <div class="row">
            <div class="col-sm-12">
               <h3 class="remove-margin"> <i class="fa fa-users fa-fw"></i> Account Setting</h3>
            </div>
         </div>
         <hr />
      </div>
   </div>
   <!-- Mini Top Stats Row -->
   <div class="row">
      <div class="col-sm-3">
         <!-- <hr class="space">-->
         <h4>Members</h4>
         <p>You can give other people access of your admin.</p>
         <a href="#modal-add-member" data-toggle="modal" class="btn btn-success" data-placement="bottom"> Add Member </a>
      </div>
      <div class="col-sm-9">
         <!-- Widget -->
         <?php if ( $this->session->flashdata('error_message') ) { ?>
         <div class="alert alert-danger alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="fa fa-times-circle"></i> Error! </h4>
            <?php echo $this->session->flashdata('error_message'); ?>  
         </div>
         <?php } ?>
         <div class="table-responsive">
            <table class="table notification table-vcenter table-condensed">
               <thead>
                  <tr>
                     <th>User Name</th>
                     <th>Email</th>
                     <th class="text-center">City</th>
                     <th class="text-center">Admin Access</th>
                     <th class="text-center">Action</th>
                  </tr>
               </thead>
               <tbody>
                  <?php if ($results->num_rows() > 0) { 
                     foreach ($results->result() as $row){ ?>
                  <tr>
                     <td><a href="<?php echo base_url().'admin/edit_account/'.$row->id; ?>"> <?php echo $row->first_name.' '.$row->last_name; ?> </a></td>
                     <td><?php if($row->email){ echo $row->email; } ?></td>
                     <td class="text-center"> <?php if($row->city){ echo $row->city; } ?> </td>
                     <td class="text-center"> <?php if($row->super_access == 1){ echo 'Account owner'; }else{ ?> Moderator <?php } ?></td>
                     <td class="text-center">
                        <!-- <a href="<?php //echo base_url().'admin/delete_account/'.$row->id; ?>"><i class='fa fa-trash-o fa-fw icon-listing'></i></a>-->
                        <div class="btn-group">
                           <a href="<?php echo base_url().'admin/edit_account/'.$row->id; ?>" data-toggle="tooltip" title="Edit" class="btn btn-xs btn-default"><i class="fa fa-pencil"></i></a>
                           <?php if(!$row->super_access == 1){ ?>
                           <a href="javascript:void(0);" onclick="deleteItem(<?php echo $row->id; ?>,'delete_account/');" data-toggle="tooltip" title="Delete" class="btn btn-xs btn-danger"><i class="fa fa-times"></i></a>
                           <?php } ?>
                        </div>
                     </td>
                  </tr>
                  <?php } ?>
                  <?php } else { ?>
                  <tr>
                     <td class="text-center" colspan="5" >
                        <?php echo 'No Record Found!'; ?>
                     </td>
                  </tr>
                  <?php } ?>
               </tbody>
            </table>
         </div>
         <!-- END Widget -->
      </div>
   </div>
   <div class="row">
      <div class="col-sm-12 col-lg-12 margin-bottom">
         <hr />
         <div class="row">
            <div class="col-sm-3">
               <h4>Change Account Owner</h4>
               <p>You can transfer ownership of admin to another user. If you do this they will have complete control of the admin. Your account will turn into a regular staff account.</p>
            </div>
            <div class="col-sm-9">
               <form action="<?php echo base_url();?>admin/update_account_owner" method="post">
                  <div class="row">
                     <div class="col-sm-3">
                        <b>Select account owner</b>
                        <select class="form-control" name="access_owner" id="brand">
                           <?php if ($results->num_rows() > 0) { 
                              foreach ($results->result() as $row){ ?>
                           <option value="<?php echo $row->id; ?>" <?php if($row->super_access == 1){?> selected="selected" <?php } ?> ><?php echo $row->first_name.' '.$row->last_name; ?></option>
                           <?php }}?>
                        </select>
                     </div>
                     <div class="col-sm-3">
                        <br/>
                        <button class="btn btn-success" type="submit"> Make this user the account owner </button>
                     </div>
                  </div>
               </form>
            </div>
         </div>
         <hr />
         <div class="row">
            <div class="col-sm-3">
               <h4>Site Settings</h4>
            </div>
            <div class="col-sm-9">
               <form action="<?php echo base_url();?>admin/update_site_settings" method="post">
                  <div class="row">
                     <div class="col-sm-3">
                        <b>Site Meta Title</b>
                        <input value="<?php echo $siteSettings->seo_title?>" class="form-control" name="seo_title" id="seo_title">
                     </div>
                     <div class="col-sm-3">
                        <b>Site Meta Description</b>
                        <input value="<?php echo $siteSettings->seo_description?>" class="form-control" name="seo_description" id="seo_description">
                     </div>
                      <div class="col-sm-3">
                        <input <?php if($siteSettings->site_off =='true'){?>checked="checked"<?php } ?> value="true"  name="site_off" id="site_off" type="checkbox"> <b>Site Off Switch</b>
                        
                     </div>
                     <div class="col-sm-3">
                        <br/>
                        <button class="btn btn-success" type="submit"> Save </button>
                     </div>
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>
   <!---popup add notification--->             
   <div id="modal-add-member" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog">
         <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header text-center">
               <h2 class="modal-title"><i class="fa fa-pencil"></i> Add New Member</h2>
            </div>
            <!-- END Modal Header -->
            <!-- Modal Body -->
            <div class="modal-body">
               <form id="form-validation" action="<?php echo base_url();?>admin/insert_account" method="post" class="form-horizontal form-bordered" >
                  <fieldset>
                     <legend>Subscriber Information</legend>
                     <div class="form-group">
                        <label class="col-md-4 control-label" for="user-settings-password">First Name</label>
                        <div class="col-md-8">
                           <input type="text" id="first_name" name="first_name" class="form-control" autocomplete="off">
                        </div>
                     </div>
                     <div class="form-group">
                        <label class="col-md-4 control-label" for="user-settings-repassword">Last Name</label>
                        <div class="col-md-8">
                           <input type="text" id="last_name" name="last_name" class="form-control" autocomplete="off">
                        </div>
                     </div>
                     <div class="form-group">
                        <label class="col-md-4 control-label" for="user-settings-repassword">Email</label>
                        <div class="col-md-8">
                           <input type="email" id="email" name="val_email" class="form-control" autocomplete="off">
                        </div>
                     </div>
                     <div class="form-group">
                        <label class="col-md-4 control-label" for="user-settings-repassword">City</label>
                        <div class="col-md-8">
                           <select class="form-control" name="city" id="city">
                              <option value="">Please select city</option>
                              <option value="Lahore">Lahore</option>
                              <option value="Karachi">Karachi</option>
                              <option value="Islamabad">Islamabad</option>
                           </select>
                        </div>
                     </div>
                     <div class="form-group">
                        <label class="col-md-4 control-label" for="user-settings-repassword">Password</label>
                        <div class="col-md-8">
                           <input  placeholder="Password must contain at least 6 characters, including UPPER/lowercase and numbers" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" type="password" id="val_password" name="val_password" class="form-control" autocomplete="off">
                        </div>
                     </div>
                     <!--<div class="form-group">
                        <label class="col-md-4 control-label" for="user-settings-repassword">Status</label>
                        <div class="col-md-8">
                         <label class="switch switch-success" data-toggle="tooltip" title="Access enable/disable">
                           <input type="checkbox" id="status" name="status">
                           <span></span>
                          </label>
                        </div>
                        </div>-->
                  </fieldset>
                  <div class="form-group form-actions">
                     <div class="col-xs-12 text-right">
                        <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-sm btn-success" name="submit">Save</button>
                     </div>
                  </div>
               </form>
            </div>
            <!-- END Modal Body -->
         </div>
      </div>
   </div>
   <!-- END Mini Top Stats Row -->
</div>
<!-- END Page Content -->
<?php $this->load->view('backend/elements/footer'); ?>
