<?= $this->setSiteTitle('Product Request') ?>

<?= $this->start('head'); ?>
	<link rel='stylesheet' id='pt-grid-css'  href='<?=PROOT?>assets/css/pt-grid.css' type='text/css' media='all' />
	<link rel='stylesheet'  href='<?=PROOT?>assets/css/woo-styles.css' type='text/css' media='all' />
	<link rel='stylesheet'  href='<?=PROOT?>assets/css/style-1.css' type='text/css' media='all' />
	<link rel='stylesheet'  href='<?=PROOT?>assets/css/grid.css' type='text/css' media='all' />
	<link rel='stylesheet' id='editor-buttons-css'  href='http://handy.themes.zone/wp-includes/css/editor.min.css?ver=4.9.4' type='text/css' media='all' />


<?= $this->end(); ?>

<?= $this->start('body'); ?>

<div class="site-wrapper">

<div class="site-main container">
	<!-- Content wrapper -->
	<div class="row">
	<div class="breadcrumbs-wrapper col-md-12 col-sm-12 col-xs-12">
		<!-- Breadcrumbs-wrapper -->
	<div class="container">
		<div class="row">
			<div class="col-md-4 col-sm-6 col-xs-12">
						<div class="page-title">
	Pro Dashboard		</div>
					</div>
				<div class="col-md-8 col-sm-6 col-xs-12">
					<p id="breadcrumbs" class="breadcrumbs"><span xmlns:v="http://rdf.data-vocabulary.org/#"><span typeof="v:Breadcrumb"><a href="http://handy.themes.zone/" rel="v:url" property="v:title">Home</a> / <span class="breadcrumb_last">Pro Dashboard</span></span></span></p>						</div>
	</div></div></div><!-- end of Breadcrumbs -->
			
	<main class="site-content col-xs-12 col-md-9 col-sm-8 col-md-push-3 col-sm-push-4" itemscope="itemscope" itemprop="mainContentOfPage">

	<!-- Main content -->
			
	<div class="page-content entry-content">

	<!-- Page content -->
		
		
	<div class="wcvendors-pro-dashboard-wrapper"> 
		
	<div class="wcv-grid">


		<form method="post" enctype="multipart/form-data" action="<?=PROOT?>home/ProductRequest" onsubmit="return validateData();">
			<?php 
				if(isset($_SESSION['alert']))
					{echo $_SESSION['alert']; $_SESSION['alert'] = '';
				}
			?>
			
			<h3>Design Request Area</h3>			

			<br />

			<div class="wcv-tabs top" data-prevent-url-change="true">

				<!-- Design request Settings Form -->

				<div class="tabs-content" id="store">

					<!-- Design Name -->

					<div class="control-group" >
						<label>Design Name 							
							<small style="font-color: red !important;">*Required</small>
						</label>

						<div class="control" >
							<input type="text" class="form-control" name="design-name" id="design-name"  placeholder="design name" data-rules="required"/> 

						</div>

						<small id="error-msg-name"></small>

					</div>
					<br />
					
					<!-- Design Description -->

					<label>Design Description</label>

					<div id="wp-pv_shop_description-wrap" class="wp-core-ui wp-editor-wrap tmce-active">
						
					<div id="wp-pv_shop_description-editor-container" class="wp-editor-container">
						<div id="qt_pv_shop_description_toolbar" class="quicktags-toolbar"></div>

						<textarea  style="height: 200px" autocomplete="off" cols="40" name="design-Description" id="design-description"></textarea>				    
					</div>
					</div>
					<small id="error-msg-description"></small>
					<br/>


					<!-- Add an image -->


					<div class="control-group">
						<label>Image</label>	<br>
						<input type='file' id="design-image" name="fileUpload[]" multiple="true" style="border:none; background-color: none;" />	
						<small">Add 1-3 images</small>			
					</div>
					<small id="error-msg-images"></small>
					<br/>


					<!-- Add a color -->


					<div class="control-group">
						<label>Color</label>	<br>
						<input type="color" id="design-color" name="color-picker" style="border:none; background-color: none;" />

						 <br>

					</div>
					<small id="error-msg-color"></small>
					<br/>

					<!-- Add location -->

					<div class="control-group row">
						<div class="col-md-6">
							<label >Postal Code</label>	
						<input type='text'  style="width: 32%;" id="postal-code" class="form-control" name="postal-code"  />		
						</div>
							
					</div>
					<small id="error-msg-location"></small>
					<br/>

					<!-- Add due Date -->
					
					<div class="control-group">
						<label>Due date</label>
						<small style="font-color:#000000;">before</small>	
						<input type='date' id="due-date" name="due-date" style="width: 15%; padding-left: : 10px;" class="form-control" />				
					</div>
					<small id="error-msg-date"></small>
					                    
				</div>

					<br />
					<br>

				<div class="control-wrapper last">
	                <button class="btn btn-1"  type="submit">Submit Product</button>
	            </div>
		</form>
	</div>

		
		
	</div><!-- end of Page content -->

	</main><!-- end of Main content -->
	
	<script type="text/javascript">

		var count=1;
		function addMore(){

			var sid=("design-color-more-"+count);
			var addMoreV=document.getElementById(sid);
			addMoreV.style.display="inline-block";
			count++;
		}

		function validateData(){

			document.getElementById("error-msg-name").innerHTML="";
			document.getElementById("error-msg-description").innerHTML="";
			document.getElementById("error-msg-images").innerHTML="";
			document.getElementById("error-msg-location").innerHTML="";
			document.getElementById("error-msg-date").innerHTML="";

			var date=document.getElementById("due-date").value;
			var postalCode=document.getElementById("postal-code").value;
			var name=document.getElementById("design-name").value;
			var description=document.getElementById("design-description").value;
			var images=document.getElementById("design-image").files;
			var color=document.getElementById("design-color");
			var error;

			//window.alert(color);
		

			if (name==""){
				error=document.getElementById("error-msg-name");
				error.innerHTML="<small style=\"font-color:red; font-size:12px;\">Name is required!</small>";
				return false;
			}

			else if (images.length<0 || images.length>3){
				error=document.getElementById("error-msg-images");
				error.innerHTML="<small style=\"font-color:red; font-size:12px;\">Add valid number of images!</small>";
				return false;
			}

			else if (postalCode==""){
				error=document.getElementById("error-msg-location");
				error.innerHTML="<small style=\"font-color:red; font-size:12px;\">Invalid postalCode!</small>";
				return false;
			}

			else if (date==""){
				error=document.getElementById("error-msg-date");
				error.innerHTML="<small style=\"font-color:red; font-size:12px;\">Date is required!</small>";
				return false;
			} 

			else{
				return true;				
			}
		}	


	</script>
	
	    
			
	<div id="sidebar-pages" class="widget-area col-xs-12 col-sm-4 col-md-3 col-md-pull-9 col-sm-pull-8 sidebar" role="complementary">
			<?php include 'Categories.php'?>					
	</div>
				
			

</div>
</div><!-- end of Content wrapper -->

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script type="text/javascript">
	// Display an info toast with no title
	toastr.info('Are you the 6 fingered man?')

</script>

<?= $this->end(); ?>