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
           <div class="breadcrums"><span class="small-text-active"><?=$page->title ?></span></div>
           </ol>
            </div>
           </div> <!-- /.row -->  
           </div> <!-- / .col-md-12 column -->
       </div> <!-- / .row clearfix -->
       </div> <!--- / .container -->
    </nav> <!-- / .nav -->
</div>
<!-- Page Content -->
<?  if(!empty($page->images)){ 
            	$string = $page->images;
            	if($string){
            	$json_o = (array) json_decode($string);
            	}else{
            	$json_o = '';
            	}
          } ?>
<div class="container">
    <div class="row">
       <div class="col-md-12">
             <div class="row">
            	<div <? if($json_o){?> class="col-md-7" <? }else{ ?> class="col-md-12" <? } ?>>
               <h2><?=$page->title ?></h2>
               <p class="floating">
             		  <?=$page->description ?>
               </p>
              </div>
              <div class="col-md-5 col-space-top">
             
          <? if($json_o){?>
                 <img class="images-section img-responsive" src="<?php echo base_url().$json_o[0]; ?>" alt="About US" />
                 <?php } ?>
             
              </div>
              </div>
             </div>
    </div>
</div>

<?php //echo (isset($data))?$data:''; ?>
<?php $this->load->view('frontend/elements/footer'); ?>
