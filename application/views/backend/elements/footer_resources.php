<!-- Include Jquery library from Google's CDN but if something goes wrong get Jquery from local file (Remove 'http:' if you have SSL) -->
<script src="<?php echo base_url().ASSETS_ADMIN_JS_DIR;?>vendor/jquery.min.js"></script>
<!-- Bootstrap.js, Jquery plugins and Custom JS code -->
<script src="<?php echo base_url().ASSETS_ADMIN_JS_DIR;?>vendor/bootstrap.min.js"></script>
<script src="<?php echo base_url().ASSETS_ADMIN_JS_DIR;?>plugins.js"></script>
<script src="<?php echo base_url().ASSETS_ADMIN_JS_DIR;?>app.js"></script>
<script src="<?php echo base_url().ASSETS_ADMIN_JS_DIR;?>scripts.js"></script>
<!-- Load and execute javascript code used only in this page -->
<script src="<?php echo base_url().ASSETS_ADMIN_JS_DIR;?>pages/tablesDatatables.js"></script>
<script src="<?php echo base_url().ASSETS_ADMIN_JS_DIR;?>pages/formsValidation.js"></script>
<script>$(function(){ FormsValidation.init(); TablesDatatables.init(); });</script>