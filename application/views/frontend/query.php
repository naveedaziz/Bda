<?php $this->load->view('frontend/elements/header'); ?>
<div class="ful-col">
   <nav>
      <div class="container">
         <div class="row clearfix">
            <ol class="breadcrumb">
               <div class="breadcrums"><span class="small-text"><a href="<?php echo base_url();?>">Home</a></span> </div>
               <div class="space">/</div>
               <div class="breadcrums"><span class="small-text-active">Enquiry</span></div>
            </ol>
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
               <li <?php if(!isset($product_id)) { ?>class="active" <?php } ?>><a href="#product" data-toggle="tab"  onclick="$('#activeState').val(1);$('.brandSelect').removeClass('fade')">Product</a></li>
               <li <?php if(isset($product_id)) { ?>class="active" <?php } ?>><a href="#vending" data-toggle="tab" onclick="$('#activeState').val(2);$('.brandSelect').addClass('fade')">Vending Machine</a></li>
            </ul>
         </div>
         <form id="form-validation" action="<?php echo base_url();?>submitQuery" method="post" class="form-horizontal form-bordered">
            <input type="hidden" value="<?php if(isset($product_id)){ echo $product_id; }?>" name="product_id" />
            <div class="row">
               <div class="col-lg-8 centered-text">
                  <div class="col-lg-12">
                     <div class="form-group col-md-6">
                        <div>
                           <input type="text" id="firstname" name="firstname" class="form-control" placeholder="First Name*" autocomplete="off">
                        </div>
                     </div>
                      <div class="form-group  col-md-6 margin-left20">
                        <div >
                           <input type="text" id="lastname" name="lastname" class="form-control" placeholder="Last Name*" autocomplete="off" >
                        </div>
                     </div>
                     <div class="form-group  col-md-6">
                        <div>
                           <input type="text" id="company" name="company" class="form-control" placeholder="Company*" autocomplete="off" >
                        </div>
                     </div>
                      <div class="form-group  col-md-6 margin-left20">
                        <div>
                           <input type="text" id="val_email" name="email" class="form-control" placeholder="Email*" autocomplete="off">
                        </div>
                     </div>
                     <div class="form-group  col-md-6">
                        <div>
                           <select class="form-control" name="city" id="city">
                              <option value="">City</option>
                              <option value="lahore">Lahore</option>
                              <option value="Karachi">Karachi</option>
                              <option value="Islamabad">Islamabad</option>
                           </select>
                        </div>
                     </div>
                      <div class="form-group  col-md-6 margin-left20">
                        <div>
                           <input type="text" id="contact" name="contact" class="form-control" placeholder="Contact*" autocomplete="off">
                        </div>
                     </div>
                      <div class="form-group  col-md-6">
                        <div>
                           <textarea  maxlength="999" name="address" class="form-control no-resize" placeholder="Address" cols="100" rows="10"  aria-invalid="false"></textarea>
                        </div>
                     </div>
                      <div class="form-group  col-md-6 margin-left20">
                        <div>
                           <textarea  maxlength="999" name="description"  class="form-control no-resize" placeholder="Comments" cols="100" rows="10" aria-invalid="false"></textarea>
                        </div>
                     </div>
                     <div class="form-group  col-md-6">
                        <div>
                           <div class="tab-pane fade <?php if(!isset($product_id)) { ?> active in <?php } ?>" id="product">
                              <select class="form-control" name="category_name" id="category_name">
                                 <option value="">Choose Your Business</option>
                                 <?php if ($categories->num_rows() > 0) { 
                                    foreach ($categories->result() as $category){ ?>
                                 <option value="<?php echo $category->title;?>"><?php echo $category->title;?></option>
                                 <?php } ?>
                                 <?php }?>
                              </select>
                           </div>
                           <div class="tab-pane fade <?php if(isset($product_id)) { ?> active in <?php } ?>" id="vending">
                              <select class="form-control" name="category_name_vending" id="category_name_vending">
                                 <option value="">Choose Your Vending Machine</option>
                                 <option value="Hot Vending Machine" >Hot Vending Machine</option>
                                 <option value="Cold Vending Machine" >Cold Vending Machine</option>
                              </select>
                           </div>
                        </div>
                     </div>
                     
                     <input type="hidden" value="1" id="activeState" name="active_state" />
                     <div class="form-group  col-md-6  margin-left20 <?php if(isset($product_id)) { ?>fade<?php } ?>">
                        <div class="tab-pane brandSelect">
                           <select class="form-control" name="brand_name" id="brand_name">
                              <option value="">Brand</option>
                              <?php if ($brands->num_rows() > 0) { 
                                 foreach ($brands->result() as $brand){ ?>
                              <option value="<?php echo $brand->title;?>"><?php echo $brand->title;?></option>
                              <?php } ?>
                              <?php } ?>
                           </select>
                        </div>
                     </div>
                     <div class="clearfix"></div>
                     <div class="form-group  col-md-12">
                           <label class="col-md-6 control-label text_left col-md-space-bottom">Verification Code</label>
                           <input type="text" id="txtCaptcha" disabled="disabled" class="form-control" />
                           <span id="captcha-error">Enter valid Verification code.</span>
                        </div>
                    <div class="form-grou  col-md-6p">
                       <input type="text" name="captch" id="captch" placeholder="Please enter above verification code*" class="form-control" autocomplete="off" /> 
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
