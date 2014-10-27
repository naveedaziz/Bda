<?php $this->load->view('frontend/elements/header'); ?>
<div class="ful-col">
   <nav>
      <div class="container">
         <div class="row clearfix">
            <ol class="breadcrumb">
               <div class="breadcrums"><span class="small-text"><a href="<?php echo base_url();?>">Home</a></span> </div>
               <div class="space">/</div>
               <div class="breadcrums"><span class="small-text-active">Error 404</span></div>
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
   <!-- Categories Section -->
   <div class="row">
      <!-- /.row -->
      <div class="span12">
         <div class="col-md-12 NotFoundPage">
            <h2>
            OPPS, THIS PAGE COULD NOT BE FOUND!</h1>
            <p> Oops! The Page you are looking for could not be found. Try searching for the best match or browse the links below <br />
               Return to  <a href="<?php echo base_url();?>">Home Page</a> 
            </p>
            <h1>404</h1>
            <h3>Search Our Website</h3>
            <p>Can't find what you need? Take a moment and do a search below!</p>
            <div class="col-md-3"></div>
            <div  class="col-md-6">
               <form action="search" method="post">
                  <input required="required" type="text" class="form-control search-box" id="search" name="search_string" value="<?php if(isset($search_string)){ echo $search_string; }?>" >
                  <button class="btn btn-search" type="submit"><i class="fa fa-search search-icon"></i></button>
               </form>
            </div>
            <div class="col-md-3"></div>
         </div>
      </div>
   </div>
   <!-- /.row -->  
</div>
<!-- /.container -->
<?php $this->load->view('frontend/elements/footer'); ?>
