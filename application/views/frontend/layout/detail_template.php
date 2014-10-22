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
           <div class="breadcrums"><span class="small-text-active">About Us</span></div>
           </ol>
            </div>
           </div> <!-- /.row -->  
           </div> <!-- / .col-md-12 column -->
       </div> <!-- / .row clearfix -->
       </div> <!--- / .container -->
    </nav> <!-- / .nav -->
</div>
<!-- Page Content -->
<div class="container">
    <div class="row">
       <div class="col-md-12">
             <div class="row">
            	<div class="col-md-7">
               <h2> About US</h2>
               <p class="floating">
               We at Nestlé Professional are dedicated to providing convenient, cost-effective and reliable food and beverage solutions for out-of-home establishments. Whether it is a café, restaurant, office, airport, university, or hospital, backed with efficient services and quality products Nestlé Professional is keen to deliver on the expectations of our valued customers. We continuously strive to understand your specific needs and are eager to develop tailor-made solutions for your respective businesses.
               </p><p>
               When you affiliate with us, you work with strong heritage and expertise and a partner that has the privilege of being the No.1 food & beverage solutions provider in the world. 
               </p>
              </div>
              <div class="col-md-5 col-space-top">
              <img src="<?php echo base_url().ASSETS_FRONTEND_IMAGE_DIR;?>aboutus_img.jpg" alt="About US" />
              </div>
              </div>
             </div>
    </div>
</div>

<?php //echo (isset($data))?$data:''; ?>
<?php $this->load->view('frontend/elements/footer'); ?>
