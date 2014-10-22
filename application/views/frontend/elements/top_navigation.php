<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-static-top" role="navigation">
   <div class="container">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
         <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
         <span class="sr-only">Toggle navigation</span>
         <span class="icon-bar"></span>
         <span class="icon-bar"></span>
         <span class="icon-bar"></span>
         </button>
         <a class="navbar-brand" href="<?php echo base_url(); ?>">
        <img src="<?php echo base_url().ASSETS_FRONTEND_IMAGE_DIR;?>logo.png" alt="logo" class="img-responsive" />
         </a>
          <!-- <div class="slogan">MAKING MORE POSSIBLE</div>-->
          <img class="slogan img-responsive" src="<?php echo base_url().ASSETS_FRONTEND_IMAGE_DIR;?>slogan.png" alt="MAKING MORE POSSIBLE" />
         </div>

     <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <div class="row remove-margin">
      <div class="search_top">
        <div class="input-group">
         <input type="text" class="form-control search-box" id="search" name="search">
         <button class="btn btn-search" type="button"><i class="fa fa-search search-icon"></i></button>
        </div>
       </div>
       </div>
     <ul class="nav navbar-nav navbar-right">
      		<li class="active">
               <a href="<?php echo base_url(); ?>">Home</a>
            </li>
            <li>
               <a href="<?php echo base_url(); ?>frontend/brands">Vending Solutions</a>
            </li>
            <li>
               <a href="<?php echo base_url(); ?>frontend/aboutus">About Us</a>
            </li>
             <li class="active_enquiry">
               <a href="<?php echo base_url(); ?>frontend/query">Enquiry</a>
            </li>
            
          </ul>
      </div>
      <!-- /.navbar-collapse -->
   </div>
   <!-- /.container -->
</nav>
