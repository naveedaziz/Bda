<!-- Main Sidebar -->
<div id="sidebar">
   <!-- Wrapper for scrolling functionality -->
   <div class="sidebar-scroll">
      <!-- Sidebar Content -->
      <div class="sidebar-content">
         <!-- Brand -->
         <a href="<?php echo base_url();?>admin/query" class="sidebar-brand">
         <strong>Nestle Professionals</strong> 
         </a>
         <!-- END Brand -->
         <!-- Sidebar Navigation -->
         <ul class="sidebar-nav">
            <?php $page_name = $this->session->userdata('page');
               $limited_access = $this->session->userdata('limited_access');
               ?>
            <!--<li>
               <a href="index.html" class=" active"><i class="fa fa-angle-left sidebar-nav-indicator"></i><i class="gi gi-stopwatch sidebar-nav-icon"></i>Dashboard</a>
               </li>-->
            <li>
               <a <?php if($page_name == 'query'){?> class="active" <?php } ?> <?php if($limited_access){ if (!in_array('query', $limited_access)) {?> class="disabled" <?php } } ?> href="<?php echo base_url();?>admin/query"><i class="fa fa-angle-left sidebar-nav-indicator"></i><i class="fa fa-envelope-o fa-fw sidebar-nav-icon"></i>Query</a>
            </li>
            <li>
               <a <?php if($page_name == 'categories'){?> class="active" <?php } ?> href="<?php echo base_url();?>admin/categories" <?php if($limited_access){ if (!in_array('category', $limited_access)) {?> class="disabled"  <?php } } ?> ><i class="fa fa-angle-left sidebar-nav-indicator"></i><i class="fa fa-cubes fa-fw sidebar-nav-icon"></i>Categories</a>
            </li>
            <li>
               <a <?php if($page_name == 'brands'){?> class="active" <?php } ?> href="<?php echo base_url();?>admin/brands" <?php if($limited_access){ if (!in_array('brands', $limited_access)) {?> class="disabled"  <?php } } ?> ><i class="fa fa-angle-left sidebar-nav-indicator"></i><i class="fa fa-cube fa-fw sidebar-nav-icon"></i>Brands</a>
            </li>
            <li>
               <a <?php if($page_name == 'products'){?> class="active" <?php } ?> href="<?php echo base_url();?>admin/products"  <?php if($limited_access){ if (!in_array('product', $limited_access)) {?> class="disabled" <?php } } ?> ><i class="fa fa-angle-left sidebar-nav-indicator"></i><i class="fa fa-tags fa-fw sidebar-nav-icon"></i>Products</a>
            </li>
            <li class="sidebar-header">
               <span class="sidebar-header-options clearfix"><a href="javascript:void(0)" data-toggle="tooltip" title="Quick Settings"><i class="gi gi-settings"></i></a></span>
               <span class="sidebar-header-title">Settings</span>
            </li>
            <li>
               <a <?php if($page_name == 'pages'){?> class="active" <?php } ?> href="<?php echo base_url();?>admin/pages" <?php if($limited_access){ if (!in_array('page', $limited_access)) {?> class="disabled" <?php } } ?> ><i class="fa fa-angle-left sidebar-nav-indicator"></i><i class="fa fa-files-o fa-fw sidebar-nav-icon"></i>Page</a>
            </li>
            <li>
               <a <?php if($page_name == 'banners'){?> class="active" <?php } ?> href="<?php echo base_url();?>admin/banners" <?php if($limited_access){ if (!in_array('banners', $limited_access)) {?> class="disabled" <?php } } ?> ><i class="fa fa-angle-left sidebar-nav-indicator"></i><i class="fa fa-files-o fa-fw sidebar-nav-icon"></i>Banners</a>
            </li>
            <!--<li>
               <a href="#"><i class="fa fa-angle-left sidebar-nav-indicator"></i><i class="fa fa-link fa-fw sidebar-nav-icon"></i>Navigations</a>
               </li>-->
            <li>
               <a <?php if($page_name == 'notifications'){?> class="active" <?php } ?> href="<?php echo base_url();?>admin/notifications"  <?php if($limited_access){ if (!in_array('notification', $limited_access)) {?> class="disabled" <?php } } ?> ><i class="fa fa-angle-left sidebar-nav-indicator"></i><i class="fa fa-info-circle fa-fw sidebar-nav-icon"></i>Notifications</a>
            </li>
            <!--<li>
               <a href="#"><i class="fa fa-angle-left sidebar-nav-indicator"></i><i class="fa fa-cogs fa-fw sidebar-nav-icon"></i>Theme Setting</a>
               </li>-->
            <li>
               <a <?php if($page_name == 'account_setting'){?> class="active" <?php } ?>  <?php if($limited_access){ if (!in_array('accounts', $limited_access)) {?> class="diabled" <?php } } ?> href="<?php echo base_url();?>admin/account_setting"><i class="fa fa-angle-left sidebar-nav-indicator"></i><i class="fa fa-users fa-fw sidebar-nav-icon"></i>Account Setting</a>
            </li>
         </ul>
         <!-- END Sidebar Navigation -->
      </div>
      <!-- END Sidebar Content -->
   </div>
   <!-- END Wrapper for scrolling functionality -->
</div>
<!-- END Main Sidebar -->
