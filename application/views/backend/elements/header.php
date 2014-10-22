<?php $this->load->view('backend/elements/header_resources'); ?>
<body>
   <!-- Page Container -->
   <div id="page-container" class="header-fixed-top sidebar-partial sidebar-visible-lg sidebar-no-animations">
   <?php $this->load->view('backend/elements/side_bar'); ?>
   <!-- Main Container -->
   <div id="main-container">
   <header class="navbar navbar-default navbar-fixed-top">
      <!-- Left Header Navigation -->
      <ul class="nav navbar-nav-custom">
         <!-- Main Sidebar Toggle Button -->
         <li>
            <a href="javascript:void(0)" onClick="App.sidebar('toggle-sidebar');">
            <i class="fa fa-bars fa-fw"></i>
            </a>
         </li>
         <!-- END Main Sidebar Toggle Button -->
      </ul>
      <!-- END Left Header Navigation -->
      <!-- Right Header Navigation -->
      <ul class="nav navbar-nav-custom pull-right">
         <!-- User Dropdown -->
         <li class="dropdown">
            <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown">
            <i class="fa fa-user fa-fw"></i> <span class="cap"><?php echo $this->session->userdata('first_name').' '.$this->session->userdata('last_name');?></span> <i class="fa fa-angle-down"></i>
            </a>
            <ul class="dropdown-menu dropdown-custom dropdown-menu-right">
               <li class="dropdown-header text-center">Account</li>
               <li class="divider"></li>
               <li>
                  <!--<a href="#">
                     <i class="fa fa-user fa-fw pull-right"></i>
                     Profile
                     </a>-->
                  <a href="#modal-user-settings" data-toggle="modal">
                  <i class="fa fa-cog fa-fw pull-right"></i>
                  Reset Password
                  </a>
               </li>
               <li class="divider"></li>
               <li><a href="<?php echo base_url(); ?>admin/logout"><i class="fa fa-ban fa-fw pull-right"></i> Logout</a></li>
            </ul>
         </li>
         <!-- END User Dropdown -->
      </ul>
      <!-- END Right Header Navigation -->
   </header>
   <!-- END Header -->