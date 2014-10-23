<!-- Footer -->
<footer>
   <div id="footer">
      <div class="container">
         <div class="row clearfix">
            <div class="col-md-12 column">
               <div class="row">
                  <div class="col-md-2">
                     <span class="copy-right">Nestlé © 2014</span>
                  </div>
                  <div class="col-md-10">
                     <ul class="nav-footer">
                        <li <?php if($this->session->userdata('page') == 'about-us'){?> class="active" <?php } ?>>
                           <a href="<?php echo base_url(); ?>pages/about-us">About</a>  
                        </li>
                        <li <?php if($this->session->userdata('page') == 'contact'){?> class="active" <?php } ?>>
                           <a href="<?php echo base_url(); ?>pages/contact">Contact</a>
                        </li>
                        <li <?php if($this->session->userdata('page') == 'terms-and-conditions'){?> class="active" <?php } ?>>
                           <a href="<?php echo base_url(); ?>pages/terms-and-conditions"> Terms & Conditions</a> 
                        </li>
                        <li <?php if($this->session->userdata('page') == 'privacy'){?> class="active" <?php } ?>>
                           <a href="<?php echo base_url(); ?>pages/privacy">Privacy</a>
                        </li>
                        <li <?php if($this->session->userdata('page') == 'credit-reporting-policy'){?> class="active" <?php } ?>>
                           <a href="<?php echo base_url(); ?>pages/credit-reporting-policy">Credit Reporting Policy</a>
                        </li>
                        <li <?php if($this->session->userdata('page') == 'sitemap'){?> class="active" <?php } ?>>
                           <a href="<?php echo base_url(); ?>pages/sitemap">Sitemap</a>
                        </li>
                     </ul>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</footer>
<!-- /.container -->
<?php $this->load->view('frontend/elements/footer_resources'); ?>
</body>
</html>