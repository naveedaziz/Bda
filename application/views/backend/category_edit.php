<?php $this->load->view('backend/elements/header'); ?>
<!-- Page content -->
<div id="page-content">
   <form id="form-validation" action="<?php echo base_url();?>admin/update_category" method="post" class="form-horizontal" enctype="multipart/form-data">
      <div class="row">
         <div class="col-sm-12 col-lg-12 margin-bottom">
            <div class="row">
               <div class="col-sm-9">
                  <h3 class="remove-margin"> <i class="fa fa-cubes fa-fw"></i> Edit Category</h3>
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
            <!-- Widget -->
            <div class="row">
               <div class="col-sm-3">
                  <h5 class="remove-margin"><b>Categories Detail </b></h5>
                  <p>Write a name and description and upload image for this category.</p>
               </div>
               <div class="col-sm-9">
                  <div class="form-group">
                     <div class="col-xs-12">
                        <input type="hidden" value="<?php echo $row->id; ?>" name="id" />
                        <input type="hidden" value="category" name="type" />
                        <input type="text" id="title" name="title" class="form-control" value="<?php if(!empty($row->title)){ echo $row->title; }?>" autocomplete="off">
                     </div>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-sm-3">
                  <h5 class="remove-margin"><b>Choose Image</b></h5>
                  <p class="remove-margin">Image size would be max 1MB.</p>
                  <?php if ( $this->session->flashdata('file_size_error') ) { ?>
                  <p class="error_file"><?php echo $this->session->flashdata('file_size_error'); ?>  </p>
                  <?php } ?>
               </div>
               <div class="col-sm-9">
                  <div class="form-group">
                     <div class="col-xs-12">
                        <input id="files" type="file" name="myfile[]" accept="image/*" multiple="multiple" />
                        <?php if($row->images){
                           $string = $row->images;
                           $json_o = (array) json_decode($string);
                           foreach($json_o as $key =>$value){ ?>
                        <div class="edit-multiple-images">
                           <i onclick="removeItem($(this))" class="fa fa-trash-o fa-fw remove-thumb-edit"></i>
                           <img src="<?php echo base_url().$json_o[$key]; ?>" alt="" class="thumbnail previous-thumbs">
                           <input type="hidden" name="pic_<?php echo $key; ?>" value="<?php echo $json_o[$key]; ?>" />
                        </div>
                        <?php }?>
                        <?php } ?>
                        <output id="result" />
                     </div>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-sm-3">
                  <h5 class="remove-margin"><b>Choose Banner Image</b></h5>
                  <p class="remove-margin">Image size would be max 1MB.</p>
                  <?php if ( $this->session->flashdata('file_size_error_banner') ) { ?>
                  <p class="error_file"><?php echo $this->session->flashdata('file_size_error_banner'); ?>  </p>
                  <?php } ?>
               </div>
               <div class="col-sm-9">
                  <div class="form-group">
                     <div class="col-xs-12">
                        <input id="filesBanner" type="file" name="hotel_images[]" accept="image/*" multiple="multiple" />
                        <?php if($row->hotel_images){ 
                           $string = $row->hotel_images;
                           $json_o = (array) json_decode($string);
                           
                           foreach($json_o as $key =>$value){ ?>
                        <div class="edit-multiple-images">
                           <i onclick="removeItemBanner($(this))" class="fa fa-trash-o fa-fw remove-thumb-edit"></i>
                           <img src="<?php echo base_url().$json_o[$key]; ?>" alt="" class="thumbnail previous-thumbs">
                           <input type="text" name="picbanner_<?php echo $key; ?>" value="<?php echo $json_o[$key]; ?>" />
                        </div>
                        <?php }?>
                        <?php } ?>
                        <output id="result_banner" />
                     </div>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-sm-3">
                  <h5 class="remove-margin"><b>&nbsp;</b></h5>
               </div>
               <div class="col-sm-9">
                  <div class="form-group">
                     <div class="col-xs-12" >
                        <div class="block">
                           <div class="block-title">
                              <h4>Description </h4>
                           </div>
                           <!-- Simple Editor Content -->
                           <div class="form-group">
                              <div class="col-xs-12">
                                 <textarea id="description" name="description" rows="10" class="form-control textarea-editor"><?php echo $row->description;?></textarea>
                              </div>
                           </div>
                           <!-- END Simple Editor Content -->
                        </div>
                        <!---- block ---->
                     </div>
                  </div>
               </div>
            </div>
            <hr />
            <div class="row">
               <div class="col-sm-3">
                  <h5 class="remove-margin"><b>Search Engines</b></h5>
                  <p>Set up the page title, meta description and handle. These help define how this product shows up on search engines.</p>
               </div>
               <div class="col-sm-9">
                  <div class="form-group">
                     <div class="col-xs-12">
                        <input type="text" id="seo_title" name="seo_title" class="form-control" placeholder="Page title" value="<?php echo $row->seo_title; ?>" autocomplete="off">
                     </div>
                  </div>
                  <div class="form-group">
                     <div class="col-xs-12">
                        <input type="text" id="seo_description" name="seo_description" class="form-control" placeholder="Meta description" value="<?php echo $row->seo_description;?>" autocomplete="off">
                     </div>
                  </div>
                  <div class="form-group">
                     <div class="col-xs-12">
                        <input type="text" id="seo_url" name="seo_url" class="form-control" placeholder="URL & Handle" value="<?php echo $row->seo_url;?>" autocomplete="off">
                     </div>
                  </div>
                  <div class="form-group">
                     <div class="col-xs-12">
                        <input type="text" id="seo_tags" name="seo_tags" class="form-control" placeholder="Meta tags" value="<?php echo $row->seo_tags;?>" autocomplete="off">
                     </div>
                  </div>
               </div>
            </div>
            <hr />
            <div class="row">
               <div class="col-sm-3">
                  <h5 class="remove-margin"><b>Visibility</b></h5>
                  <p>Control if this category can be viewed on frontend.</p>
               </div>
               <div class="col-sm-9">
                  <div class="form-group">
                     <div class="col-xs-12">
                        <label class="switch switch-success" data-toggle="tooltip" title="Status enable/disable">
                        <input type="checkbox" id="status" name="status" <?php if($row->status == 1){?> checked="checked" value="1" <?php } ?> >
                        <span></span>
                        </label> 
                        <hr class="space">
                     </div>
                  </div>
               </div>
            </div>
            <hr class="space">
            <!-- END Widget -->
         </div>
      </div>
      <!-- END main contant Row -->
   </form>
</div>
</div>
<!-- END Page Content -->
<?php $this->load->view('backend/elements/footer'); ?>