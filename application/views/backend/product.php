<?php $this->load->view('backend/elements/header'); ?>
<!-- Page content -->
<div id="page-content">
   <div class="row">
      <div class="col-sm-12 fixed-height">
         <div class="row">
            <div class="col-sm-10 col-lg-10">
               <h3 class="remove-margin"> <i class="fa fa-tags fa-fw"></i> Product</h3>
            </div>
            <div class="col-sm-2 col-lg-2 align-right">
               <a href="<?php echo base_url().'add_product' ?>"><button type="button" class="btn btn-sm btn-success">Add Product</button></a>
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
                     <th class="text-center">Image</th>
                     <th>Title</th>
                     <th>Description</th>
                     <th class="text-center">Status</th>
                     <th class="text-center">Action</th>
                  </tr>
               </thead>
               <tbody>
                  <?php if ($results->num_rows() > 0) { 
                     foreach ($results->result() as $row){ ?>
                  <tr>
                     <td class="text-center">
                        <?php 
                           if(!empty($row->images)){ 
                           	$string = $row->images;
                           	if($string){
                           	$json_o = (array) json_decode($string);
                           	}else{
                           	$json_o = '';
                           	}
                           	if($json_o){?>
                        <img src="<?php echo base_url().$json_o[0]; ?>" alt="" class="img-listing">
                        <?php }else{ ?>
                        <img src="<?php echo base_url().IMAGES_PRODUCTS_DIR;?>default.png" alt="" class="img-listing">
                        <?php } ?>
                        <?php } ?>
                     </td>
                     <td> <a href="<?php echo base_url().'edit_product/'.$row->id; ?>"> <?php echo $row->title; ?> </a></td>
                     <td><?php if($row->description){ echo substr($row->description, 0, 50).'...';}else{ echo '&nbsp;' ;} ?></td>
                     <td class="text-center">
                        <a href="<?php echo base_url().'change_product_status/'.$row->id.'/'.$row->status; ?>" class="no_underline">
                        <span class="label label-success"><?php if($row->status == 1){ echo 'Active'; } ?></span>
                        <span class="label label-primary"><?php if($row->status == 0){ echo 'Inactive'; } ?></span>
                        </a>
                     </td>
                     <td class="text-center">
                        <div class="btn-group">
                           <a href="<?php echo base_url().'edit_product/'.$row->id; ?>" data-toggle="tooltip" title="Edit" class="btn btn-xs btn-default"><i class="fa fa-pencil"></i></a>
                           <a href="javascript:void(0);" onclick="deleteItem(<?php echo $row->id; ?>,'delete_product/');" data-toggle="tooltip" title="Delete" class="btn btn-xs btn-danger"><i class="fa fa-times"></i></a>
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
   <!-- END Mini Top Stats Row -->
</div>
<!-- END Page Content -->
<?php $this->load->view('backend/elements/footer'); ?>