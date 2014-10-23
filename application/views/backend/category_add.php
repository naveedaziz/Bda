<?php $this->load->view('backend/elements/header'); ?>
<!-- Page content -->
<div id="page-content">
   <form id="form-validation" action="<?php echo base_url();?>insert_category" method="post" class="form-horizontal" enctype="multipart/form-data">
      <input type="hidden" value="category" name="type" />
      <div class="row">
         <div class="col-sm-12 col-lg-12 margin-bottom">
            <div class="row">
               <div class="col-sm-9">
                  <h3 class="remove-margin"> <i class="fa fa-cubes fa-fw"></i> Add Category</h3>
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
                        <input type="text" id="title" name="title" class="form-control" placeholder="Title" autocomplete="off">
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
                        <output id="result" />
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
                                 <textarea id="description" name="description" rows="10" class="form-control textarea-editor"></textarea>
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
                        <input type="text" id="seo_title" name="seo_title" class="form-control" placeholder="Page title" autocomplete="off">
                     </div>
                  </div>
                  <div class="form-group">
                     <div class="col-xs-12">
                        <input type="text" id="seo_description" name="seo_description" class="form-control" placeholder="Meta description" autocomplete="off">
                     </div>
                  </div>
                  <div class="form-group">
                     <div class="col-xs-12">
                        <input type="text" id="seo_url" name="seo_url" class="form-control" placeholder="URL & Handle" autocomplete="off">
                     </div>
                  </div>
                  <div class="form-group">
                     <div class="col-xs-12">
                        <input type="text" id="seo_tags" name="seo_tags" class="form-control" placeholder="Meta tags" autocomplete="off">
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
                        <input type="checkbox" id="status" name="status" >
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