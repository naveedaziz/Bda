<?php $this->load->view('backend/elements/header'); ?>
<!-- Product content -->
<div id="page-content">
   <form id="form-validation" action="<?php echo base_url();?>insert_product" method="post" class="form-horizontal" enctype="multipart/form-data">
      <div class="row">
         <div class="col-sm-12 col-lg-12 margin-bottom">
            <div class="row">
               <div class="col-sm-9">
                  <h3 class="remove-margin"> <i class="fa fa-tags fa-fw"></i> Add Product</h3>
               </div>
               <div class="col-sm-3 align-right">
                  <div class="col-xs-12 remove-padding">
                     <button type="button" class="btn btn-sm btn-primary" onclick="window.history.back()">Cancel</button>
                     <input onclick="return validateVarients()" type="submit" name="submit" value="Save" class="btn btn-sm btn-success" />
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
                  <h5 class="remove-margin"><b>Products Detail </b></h5>
                  <p>Write a name and description and upload image for this page.</p>
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
                  <h5 class="remove-margin"><b>Choose Banner Image</b></h5>
                  <p class="remove-margin">Image size would be max 1MB.</p>
                  <?php if ( $this->session->flashdata('file_size_error_banner') ) { ?>
                  <p class="error_file"><?php echo $this->session->flashdata('file_size_error_banner'); ?>  </p>
                  <?php } ?>
               </div>
               <div class="col-sm-9">
                  <div class="form-group">
                     <div class="col-xs-12">
                        <input id="filesBanner" type="file" name="myfileBanner[]" accept="image/*" multiple="multiple" />
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
            <div class="row">
               <div class="col-sm-3">
                  <h5 class="remove-margin"><b>&nbsp;</b></h5>
               </div>
               <div class="col-sm-9">
                  <div class="form-group">
                     <div class="col-xs-12 remove-padding" >
                        <div class="col-md-6">
                           <b>Type</b>
                           <select class="form-control" name="product_type" id="city">
                              <option value="">Please select product type</option>
                              <option value="food">Food</option>
                              <option value="beverages">Beverages</option>
                           </select>
                        </div>
                        <div class="col-md-6">
                           <b>Brand</b> 
                           <select class="form-control" name="product_brand" id="brand">
                              <option value="">Please select brand</option>
                              <?php if ($results->num_rows() > 0) { 
							 		foreach ($results->result() as $row){ ?>
                              <option value="<?php echo $row->id; ?>"><?php echo $row->title; ?></option>
                              <?php }}?>
                           </select>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <hr />
            <div class="row">
               <div class="col-sm-3">
                  <h5 class="remove-margin"><b>Variants</b></h5>
                  <p>Manage varients, and configure the options for selling this product.</p>
               </div>
               <div class="col-sm-9">
                  <div class="form-group">
                     <div class="col-xs-12">
                        <div class="row">
                           <div class="col-md-1">
                              <label class="switch switch-primary" data-toggle="tooltip" title="Product has multiple options.">
                              <input type="checkbox" id="varients" name="isMultileVarients">
                              <span></span>
                              </label>
                           </div>
                           <div class="col-md-9">
                              <p class="varientsIsCheckNotes">This product has multiple options e.g. Multiple sizes and/or flavour.</p>
                           </div>
                        </div>
                        <div id="multiple-options-container" class="subcontainer">
                           <p class="note_imp"> <b>Note:</b> Please add varient values seprated by coma.</p>
                           <table class="table-vcenter table-condensed" id="multi_option">
                              <thead>
                                 <tr>
                                    <th>Option Name</th>
                                    <th>Option Value</th>
                                 </tr>
                              </thead>
                              <tbody>
                                 <tr>
                                    <p id="error_variets_1"> Please add varient values against this option to proceed.</p>
                                    <th> 
                                       <input type="text" placeholder="e.g. Size" class="form-control" id="varient_title_1" name="varient_title_1" autocomplete="off">
                                    </th>
                                    <th> 
                                       <input type="text" value="" class="input-tags" name="varient_value_1" id="example-tags1" style="display: none;">
                                    </th>
                                 </tr>
                                 <tr>
                                    <th> 
                                       <input type="text" placeholder="Option Title" class="form-control" id="varient_title_2" name="varient_title_2" autocomplete="off">
                                    </th>
                                    <th> 
                                       <input type="text" value="" class="input-tags" name="varient_value_2" id="example-tags2" style="display: none;">
                                    </th>
                                 </tr>
                                 <tr>
                                    <th> 
                                       <input type="text" placeholder="Option Title" class="form-control" id="varient_title_3" name="varient_title_3" autocomplete="off">
                                    </th>
                                    <th> 
                                       <input type="text" value="" class="input-tags" name="varient_value_3" id="example-tags3" style="display: none;">
                                    </th>
                                 </tr>
                              </tbody>
                           </table>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <hr />
            <div class="row">
               <div class="col-sm-3">
                  <h5 class="remove-margin"><b>Category</b></h5>
                  <p>Categories can be used to group products together.</p>
               </div>
               <div class="col-sm-9">
                  <div class="form-group">
                     <div class="col-xs-6">
                        <select multiple="" size="5" class="form-control" name="categories[]" id="categories">
                           <?php if ($records->num_rows() > 0) { 
                              foreach ($records->result() as $row){ ?>
                           <option value="<?php echo $row->id; ?>"><?php echo $row->title; ?></option>
                           <?php }}?>
                        </select>
                        <hr class="space">
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
                        <input type="text" id="seo_title" name="seo_title" class="form-control" placeholder="Product title" autocomplete="off">
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
                  <p>Control if this page can be viewed on frontend.</p>
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
<!-- END Product Content -->
<?php $this->load->view('backend/elements/footer'); ?>