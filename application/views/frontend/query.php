<?php $this->load->view('frontend/elements/header'); ?>
<!-- Page Content -->
<div class="container">
   <!-- Categories Section -->
   <div class="row">
      <div class="row">
         <div class="col-lg-12">
            <h1 class="page-header">Nestle
               <small>Order </small>
            </h1>
            <ol class="breadcrumb">
               <li><a href="<?php echo base_url(); ?>">Home</a>
               </li>
               <li class="active">Order Now</li>
            </ol>
         </div>
      </div>
      <!-- /.row -->
      <!----- Brand Carousel ------>
      <div class="row">
         <div class="span12">
            <p>Fields marked with <span class="esteric">*</span> are obligatory.</p>
            <form id="form-validation" action="<?php echo base_url();?>frontend/submitQuery" method="post" class="form-horizontal form-bordered">
               <input type="hidden" value="<?php echo $this->session->userdata('product_id');?>" name="product_id" />
               <div class="row">
                  <div class="col-lg-6">
                     <div class="form-group">
                        <label class="col-md-4 control-label" for="user-settings-email">First Name</label>
                        <div class="col-md-8">
                           <input type="text" id="firstname" name="firstname" class="form-control" autocomplete="off">
                        </div>
                     </div>
                     <div class="form-group">
                        <label class="col-md-4 control-label">Company</label>
                        <div class="col-md-8">
                           <input type="text" id="company" name="company" class="form-control" autocomplete="off" >
                        </div>
                     </div>
                     <div class="form-group">
                        <label class="col-md-4 control-label" for="user-settings-email">City</label>
                        <div class="col-md-8">
                           <select class="form-control" name="city" id="city">
                              <option value="">Please select city</option>
                              <option value="lahore">Lahore</option>
                              <option value="Karachi">Karachi</option>
                              <option value="Islamabad">Islamabad</option>
                           </select>
                        </div>
                     </div>
                  </div>
                  <div class="col-lg-6">
                     <div class="form-group">
                        <label class="col-md-4 control-label" for="user-settings-email">Last Name</label>
                        <div class="col-md-8">
                           <input type="text" id="lastname" name="lastname" class="form-control" autocomplete="off" >
                        </div>
                     </div>
                     <div class="form-group">
                        <label class="col-md-4 control-label" for="val_confirm_password">Email</label>
                        <div class="col-md-8">
                           <input type="text" id="val_email" name="email" class="form-control" autocomplete="off">
                        </div>
                     </div>
                     <div class="form-group">
                        <label class="col-md-4 control-label">Contact</label>
                        <div class="col-md-8">
                           <input type="text" id="contact" name="contact" class="form-control" autocomplete="off">
                        </div>
                     </div>
                  </div>
                  <div class="col-lg-8">
                     <div class="form-group">
                        <label class="col-md-3 control-label">Address</label>
                        <div class="col-md-8">
                           <textarea style="resize:none" maxlength="999" name="address" class="form-control"  cols="100" rows="4"  aria-invalid="false"></textarea>
                        </div>
                     </div>
                     <div class="form-group">
                        <label class="col-md-3 control-label">Comments</label>
                        <div class="col-md-8">
                           <textarea style="resize:none" maxlength="999" name="description"  class="form-control" cols="180" rows="10" aria-invalid="false"></textarea>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="form-group">
                  <label class="col-md-2 control-label">Verification Code</label>
                  <div class="col-md-4">
                     <input type="text" id="txtCaptcha" disabled="disabled" class="form-control" /> 
                     <p></p>
                     <p> Please enter verification code </p>
                     <input type="text" name="captch" id="captch" class="form-control" autocomplete="off" /> 
                  </div>
                  <span id="captcha-error">Enter valid Verification code.</span>
               </div>
               <div class="form-group form-actions">
                  <div class="col-xs-12 text-right">
                     <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">Close</button>
                     <button type="submit" class="btn btn-sm btn-success" onclick="return captchaConfirm()">Send</button>
                  </div>
               </div>
            </form>
         </div>
      </div>
   </div>
</div>
<!-- /.row -->  
</div>
<!-- /.container -->
<?php $this->load->view('frontend/elements/footer'); ?>