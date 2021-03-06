<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-static-top" role="navigation">
   <div class="container">
      <a class="navbar-brand" href="<?php echo base_url(); ?>">
      <img src="<?php echo base_url().ASSETS_FRONTEND_IMAGE_DIR;?>logo.png" alt="logo" class="img-responsive" />
      </a>
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
         <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
         <span class="sr-only">Toggle navigation</span>
         <span class="icon-bar"></span>
         <span class="icon-bar"></span>
         <span class="icon-bar"></span>
         </button>
      </div>
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
         <div class="row remove-margin">
            <div class="search_top">
               <div class="input-group">
                  <form action="<?php echo base_url();?>search" method="post">
                     <input required="required" type="text" class="form-control search-box" id="search" name="search_string" value="<?php if(isset($search_string)){ echo $search_string; }?>" >
                     <button class="btn btn-search" type="submit"><i class="fa fa-search search-icon"></i></button>
                  </form>
               </div>
            </div>
         </div>
         <ul class="nav navbar-nav navbar-right">
            <li <?php if($this->session->userdata('page') == 'home' && !isset($search_string)){?> class="active" <?php } ?>>
               <a href="<?php echo base_url(); ?>">Home</a>
            </li>
            <li <?php if($this->session->userdata('page') == 'vending_solution' && !isset($search_string)){?> class="active" <?php } ?>>
               <a href="<?php echo base_url(); ?>vending_solution">Vending Solutions</a>
            </li>
            <li <?php if($this->session->userdata('page') == 'about-us' && !isset($search_string)){?> class="active" <?php } ?>>
               <a href="<?php echo base_url(); ?>pages/about-us">About Us</a>
            </li>
            <li class="active_enquiry">
               <a href="<?php echo base_url(); ?>enquiry">Enquiry</a>
            </li>
         </ul>
      </div>
      <!-- /.navbar-collapse -->
   </div>
   <!-- /.container -->
</nav>