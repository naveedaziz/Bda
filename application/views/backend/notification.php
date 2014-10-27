<?php $this->load->view('backend/elements/header'); ?>
<!-- Page content -->
<div id="page-content">
   <div class="row">
      <div class="col-sm-12 fixed-height margin-bottom">
         <div class="row">
            <div class="col-sm-12">
               <h3 class="remove-margin"> <i class="fa fa-info-circle fa-fw"></i> Notifications</h3>
            </div>
         </div>
         <hr />
      </div>
   </div>
   <!-- Mini Top Stats Row -->
   <div class="row">
      <div class="col-sm-3">
         <h4 class="remove-margin">Query notifications</h4>
         <hr class="space">
         <p>When a new query is placed, you can notify other email addresses of incoming queries.</p>
         <a href="#modal-user-notification" data-toggle="modal" class="btn btn-success" data-placement="bottom"> Add an query notification </a>
      </div>
      <div class="col-sm-9">
         <h4 class="remove-margin">Notification</h4>
         <hr />
         <!-- Widget -->
         <?php if ( $this->session->flashdata('error_message_notification') ) { ?>
         <div class="alert alert-danger alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="fa fa-times-circle"></i> Error! </h4>
            <?php echo $this->session->flashdata('error_message_notification'); ?>  
         </div>
         <?php } ?>
         <div class="table-responsive">
            <table class="table notification table-vcenter table-condensed">
               <thead>
                  <tr>
                     <th>User Name</th>
                     <th>Email</th>
                     <th class="text-center">Status</th>
                     <th class="text-center">Action</th>
                  </tr>
               </thead>
               <tbody>
                  <?php if ($results->num_rows() > 0) { 
                     foreach ($results->result() as $row){ ?>
                  <tr>
                     <td> <a href="<?php echo base_url().'admin/edit_notification/'.$row->id; ?>"> <?php echo $row->first_name.' '.$row->last_name; ?> </a></td>
                     <td><b>Send email to </b><?php if($row->email){ echo $row->email; } ?></td>
                     <td class="text-center">
                        <a href="<?php echo base_url().'admin/change_notification_status/'.$row->id.'/'.$row->status; ?>" class="no_underline">
                        <span class="label label-success"><?php if($row->status == 1){ echo 'Enable'; } ?></span> 
                        <span class="label label-primary"><?php if($row->status == 0){ echo 'Disable'; } ?></span>
                        </a>
                     </td>
                     <td class="text-center">
                        <div class="btn-group">
                           <a href="<?php echo base_url().'admin/edit_notification/'.$row->id; ?>" data-toggle="tooltip" title="Edit" class="btn btn-xs btn-default"><i class="fa fa-pencil"></i></a>
                           <a href="javascript:void(0);" onclick="deleteItem(<?php echo $row->id; ?>,'delete_notification/');" data-toggle="tooltip" title="Delete" class="btn btn-xs btn-danger"><i class="fa fa-times"></i></a>
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
         <!---popup add notification--->             
         <div id="modal-user-notification" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
               <div class="modal-content">
                  <!-- Modal Header -->
                  <div class="modal-header text-center">
                     <h3 class="modal-title"><i class="fa fa-pencil"></i> Add Query Notification</h3>
                  </div>
                  <!-- END Modal Header -->
                  <!-- Modal Body -->
                  <div class="modal-body">
                     <form id="form-validation" action="<?php echo base_url();?>admin/insert_notification" method="post" class="form-horizontal form-bordered" >
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
                              <label class="col-md-4 control-label" for="user-settings-repassword">Status</label>
                              <div class="col-md-8">
                                 <label class="switch switch-success" data-toggle="tooltip" title="notification status enable/disable">
                                 <input type="checkbox" id="status" name="status">
                                 <span></span>
                                 </label>
                              </div>
                           </div>
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
      </div>
   </div>
   <!-- END Mini Top Stats Row -->
</div>
<!-- END Page Content -->
<?php $this->load->view('backend/elements/footer'); ?>
