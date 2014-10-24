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
                        <div class="breadcrums"><span class="small-text-active">Search Results</span></div>
                     </ol>
                  </div>
               </div>
               <!-- /.row -->  
            </div>
            <!-- / .col-md-12 column -->
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
      <div class="col-md-12">
        <h2>SEARCH RESULT FOR : VENDING MACHINE</h2>
        <div class="result_count">About 3 results (0.20 seconds)</div>
            <div class="results">
                <h4 class="msg-bottom">Vending Machine</h4>
                <p>With an aim to stand tall on the expectations of patrons, we are engaged in supplying and trading a broad array of Nescafe Vending Machines.</p>
                <div class="read_more-col col-md-6"><a href="#" class="read_more">Read More</a></div>
            </div>
            <div class="results">
                <h4 class="msg-bottom">Vending Machine</h4>
                <p>With an aim to stand tall on the expectations of patrons, we are engaged in supplying and trading a broad array of Nescafe Vending Machines.</p>
                <div class="read_more-col col-md-6"><a href="#" class="read_more">Read More</a></div>
            </div>
            <div class="results">
                <h4 class="msg-bottom">Vending Machine</h4>
                <p>With an aim to stand tall on the expectations of patrons, we are engaged in supplying and trading a broad array of Nescafe Vending Machines.</p>
                <div class="read_more-col col-md-6"><a href="#" class="read_more">Read More</a></div>
            </div>
        <div class="col-md-8 new_search_col">
        <h3>NEED A NEW SEARCH?</h3>
        <p>If you didn't find what you were looking for, try a new search!</p>
        <div class="col-md-12">
         <form action="search" method="post">
          <input required="required" type="text" class="form-control search-box" id="search" name="search_string" value="">
          <button class="btn btn-search btn-search-new" type="submit"><i class="fa fa-search search-icon"></i></button>
         </form>
        </div>
        </div>
      </div>
   </div>
</div>
<?php $this->load->view('frontend/elements/footer'); ?>