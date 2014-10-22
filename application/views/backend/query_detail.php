<?php $this->load->view('backend/elements/header'); ?>
<!-- Page content -->
<div id="page-content">
   <div class="row">
      <div class="col-sm-12 fixed-height margin-bottom">
         <div class="row">
            <div class="col-sm-9">
               <h3 class="remove-margin"> <i class="fa fa-envelope-o fa-fw sidebar-nav-icon"></i> Query Detail</h3>
            </div>
            <div class="col-sm-3 align-right">
               <div class="col-xs-12 remove-padding">
                  <button type="button" class="btn btn-sm btn-primary" onclick="window.history.back()">Cancel</button>
                  <?php if(!empty($row)){?> <a href="<?php echo base_url().'admin/exportQuery/'.$row->id; ?>"><button type="button" class="btn btn-sm btn-success">Export Query</button></a> <?php } ?>
               </div>
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
            <div class="block">
               <div class="block-title">
                  <h4>Customer Detail </h4>
               </div>
               <table id="query_detail" class="table table-vcenter table-condensed">
                  <tbody>
                     <?php if(!empty($row)){?>
                     <tr>
                        <td class="top-border-none"> <b>ID:</b> </td>
                        <td class="top-border-none">  <?php if($row->id){ echo $row->id; } ?> </td>
                     </tr>
                     <tr>
                        <td> <b>Name:</b> </td>
                        <td>  <?php if($row->first_name){ echo $row->first_name.' '.$row->last_name; } ?> </td>
                     </tr>
                     <tr>
                        <td> <b>Email:</b> </td>
                        <td> <?php if($row->email){ echo $row->email; } ?> </td>
                     </tr>
                     <tr>
                        <td> <b>Phone:</b> </td>
                        <td> <?php if($row->phone){ echo $row->phone; } ?> </td>
                     </tr>
                    <tr>
                        <td> <b>City:</b> </td>
                        <td> <?php if($row->city){ echo $row->city; } ?> </td>
                     </tr>
                     <tr>
                        <td> <b>Address:</b> </td>
                        <td> <?php if($row->address){ echo $row->address; } ?> </td>
                     </tr>
                     <tr>
                        <td> <b>Note:</b> </td>
                        <td> <?php if($row->note){ echo $row->note; } ?> </td>
                     </tr>
                     <tr>
                        <td> <b>Category Name:</b> </td>
                        <td> <?php if($row->category_name){ ?> <a href="<?php //echo base_url().'admin/edit_brand/'.$row->brandID; ?>"> <?php echo $row->category_name; ?></a> <?php } ?> </td>
                     </tr>
                     <?php if(!$row->brandName && $row->brand_name){ ?>
                     <tr>
                        <td> <b>Brand Name:</b> </td>
                        <td> <?php if($row->brand_name){ ?> <a href="<?php //echo base_url().'admin/edit_brand/'.$row->brandID; ?>"> <?php echo $row->brand_name; ?></a> <?php } ?> </td>
                     </tr>
                     <?php }?>
                     <?php if($row->productTitle){ ?>
                     <tr>
                        <td> <b>Product Name:</b> </td>
                        <td> <?php if($row->productTitle){?> <a href="<?php echo base_url().'admin/edit_product/'.$row->product_id; ?>"> <?php echo $row->productTitle; ?></a> <?php } ?> </td>
                     </tr>
                    <?php }?>
                    <?php if($row->brandName && !$row->brand_name){ ?>
                     <tr>
                        <td> <b>Brand Name:</b> </td>
                        <td> <?php if($row->brandName){ ?> <a href="<?php echo base_url().'admin/edit_brand/'.$row->brandID; ?>"> <?php echo $row->brandName; ?></a> <?php } ?> </td>
                     </tr>
                     <?php }?>
                     <?php }else{?> 
                     <tr>
                        <td colspan="2"> <?php echo '<p> No Record Found! </p>'; ?> </td>
                     </tr>
                     <?php }?>
                  </tbody>
               </table>
            </div>
         </div>
         <!-- END Widget -->
      </div>
   </div>
   <!-- END Mini Top Stats Row -->
</div>
<!-- END Page Content -->
<?php $this->load->view('backend/elements/footer'); ?>