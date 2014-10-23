<?php $this->load->view('frontend/elements/header'); ?>
<div class="ful-col">
   <nav>
      <div class="container">
         <div class="row clearfix">
            <div class="col-md-12 column">
               <div class="row">
                  <div class="col-md-6">
                     <ol class="breadcrumb">
                        <div class="breadcrums"><span class="small-text"><a href="<?php echo base_url();?>">Home</a></span> </div>
                        <div class="space">/</div>
                        <div class="breadcrums"><span class="small-text-active">Enquiry</span></div>
                     </ol>
                  </div>
               </div>
               <!-- /.row -->  
            </div>
            <!-- / .col-md-12 column -->
         </div>
         <!-- / .row clearfix -->
      </div>
      <!--- / .container -->
   </nav>
   <!-- / .nav -->
</div>
<!-- Page Content -->
<div class="container">
   <div class="row">
      <!-- /.row -->
      <div class="col-md-12 text-center enquiry">
         <h2>ENQUIRY</h2>
         <p>Please fill in your information to place order. Our sales team will contact you shortly</p>
         <div class="col-lg-8 centered-text">
            <ul id="myTab" class="nav nav-tabs nav-justified tabs-enquiry">
               <li class="active"><a href="#product" data-toggle="tab">Product</a></li>
               <li><a href="#vending" data-toggle="tab">Vending Machine</a></li>
            </ul>
         </div>
         <form id="form-validation" action="<?php echo base_url();?>frontend/submitQuery" method="post" class="form-horizontal form-bordered">
            <input type="hidden" value="<?php if(isset($product_id)){ echo $product_id; }?>" name="product_id" />
            <div class="row">
               <div class="col-lg-8 centered-text">
                  <div class="col-lg-6">
                     <div class="form-group">
                        <div class="col-md-12">
                           <input type="text" id="firstname" name="firstname" class="form-control" placeholder="First Name*" autocomplete="off">
                        </div>
                     </div>
                     <div class="form-group">
                        <div class="col-md-12">
                           <input type="text" id="company" name="company" class="form-control" placeholder="Company*" autocomplete="off" >
                        </div>
                     </div>
                     <div class="form-group">
                        <div class="col-md-12">
                           <select class="form-control" name="city" id="city">
                              <option value="">City</option>
                              <option value="lahore">Lahore</option>
                              <option value="Karachi">Karachi</option>
                              <option value="Islamabad">Islamabad</option>
                           </select>
                        </div>
                     </div>
                  </div>
                  <div class="col-lg-6">
                     <div class="form-group">
                        <div class="col-md-12">
                           <input type="text" id="lastname" name="lastname" class="form-control" placeholder="Last Name*" autocomplete="off" >
                        </div>
                     </div>
                     <div class="form-group">
                        <div class="col-md-12">
                           <input type="text" id="val_email" name="email" class="form-control" placeholder="Email*" autocomplete="off">
                        </div>
                     </div>
                     <div class="form-group">
                        <div class="col-md-12">
                           <input type="text" id="contact" name="contact" class="form-control" placeholder="Contact*" autocomplete="off">
                        </div>
                     </div>
                  </div>
                  <div class="col-md-12">
                     <div class="form-group">
                        <div class="col-md-12">
                           <textarea style="resize:none" maxlength="999" name="address" class="form-control" placeholder="Address" cols="100" rows="4"  aria-invalid="false"></textarea>
                        </div>
                     </div>
                     <div class="form-group">
                        <div class="col-md-12">
                           <textarea style="resize:none" maxlength="999" name="description"  class="form-control" placeholder="Comments" cols="100" rows="10" aria-invalid="false"></textarea>
                        </div>
                     </div>
                  </div>
                  <div class="col-lg-6">
                     <div class="form-group">
                        <div class="col-md-12">
                           <div class="tab-pane fade active in" id="product">
                              <select class="form-control" name="category_name" id="category_name">
                                 <option value="">Choose Your Business</option>
                                 <?php if ($categories->num_rows() > 0) { 
                                    foreach ($categories->result() as $category){ ?>
                                 <option value="<?php echo $category->title;?>"><?php echo $category->title;?></option>
                                 <?php } ?>
                                 <?php }?>
                              </select>
                           </div>
                           <div class="tab-pane fade" id="vending">
                              <select class="form-control" name="category_name" id="category_name">
                                 <option value="">Choose Your Business</option>
                                 <option value="Vending Machine">Vending Machine</option>
                              </select>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-lg-6">
                     <div class="form-group">
                        <div class="col-md-12">
                           <select class="form-control" name="brand_name" id="brand_name">
                              <option value="">Brand</option>
                              <?php if ($brands->num_rows() > 0) { 
                                 foreach ($brands->result() as $brand){ ?>
                              <option value="<?php echo $brand->title;?>"><?php echo $brand->title;?></option>
                              <?php } ?>
                              <?php }?>
                           </select>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-12">
                     <div class="col-md-12">
                        <div class="form-group">
                           <label class="col-md-6 control-label text_left col-md-space-bottom">Verification Code</label>
                           <input type="text" id="txtCaptcha" disabled="disabled" class="form-control" />
                           <span id="captcha-error">Enter valid Verification code.</span>
                        </div>
                     </div>
                     <div class="col-md-12">
                        <div class="form-group">
                           <input type="text" name="captch" id="captch" placeholder="Please enter above verification code*" class="form-control" autocomplete="off" /> 
                        </div>
                     </div>
                     <div class="form-group form-actions">
                        <div class="col-xs-12 text-right">
                           <button type="submit" class="btn btn-enquiry btn-submit-enquiry" onclick="return captchaConfirm()">SUBMIT</button>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </form>
      </div>
   </div>
   <!-- /.row -->  
</div>
<!-- /.container -->
<?php $this->load->view('frontend/elements/footer'); ?>