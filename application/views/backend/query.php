<?php $this->load->view('backend/elements/header'); ?>
<!-- Page content -->
<div id="page-content">
   <div class="row">
      <div class="col-sm-12 fixed-height">
         <div class="row">
            <div class="col-sm-10 col-lg-10">
               <h3 class="remove-margin"> <i class="fa fa-envelope-o fa-fw sidebar-nav-icon"></i> Queries </h3>
            </div>
            <div class="col-sm-2 col-lg-2 align-right">
               <a href="<?php echo base_url().'admin/exportUsers' ?>"><button type="button" class="btn btn-sm btn-success">Export Queries</button></a>
            </div>
         </div>
         <hr />
      </div>
   </div>
   <!-- Mini Top Stats Row -->
   <div class="row">
      <div class="col-sm-12">
         <!-- Widget -->
         <div class="table-responsive">
            <table id="example-datatable" class="table table-vcenter table-condensed table-bordered">
               <thead>
                  <tr>
                     <th class="text-center">#</th>
                     <th class="text-center">ID</th>
                     <th>Date</th>
                     <th>City</th>
                     <th>Customer Name</th>
                     <th>Contact Number</th>
                  </tr>
               </thead>
               <tbody>
                  <?php if ($results->num_rows() > 0) { 
                     $i = 0;
                     foreach ($results->result() as $row){ 
                     $i++;
                     if ($row->created_at > 0) 
                     { 
                     $created_date = date('F j, Y, g:i a',strtotime($row->created_at)); 
                     } else { 
                     $created_date = 'N/A';
                     }?>
                  <tr>
                     <td class="text-center"> <?php echo $i; ?> </td>
                     <td class="text-center"> <a href="<?php echo base_url().'admin/query_detail/'.$row->id; ?>"><?php echo $row->id; ?></a> </td>
                     <td> <?php echo $created_date; ?> </td>
                     <td> <?php echo $row->city; ?> </td>
                     <td> <a href="<?php echo base_url().'admin/query_detail/'.$row->id; ?>"> <?php echo $row->first_name.' '.$row->last_name; ?> </a> </td>
                     <td> <?php echo $row->phone; ?> </td>
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
   <!-- END Mini Top Stats Row -->
</div>
<!-- END Datatables Content -->
</div>
<!-- END Page Content -->
</div>
<!-- END Page Content -->
<?php $this->load->view('backend/elements/footer'); ?>