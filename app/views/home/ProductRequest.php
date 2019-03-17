<?= $this->setSiteTitle('Product Request') ?>

<?= $this->start('head'); ?>
	<link rel='stylesheet' id='pt-grid-css'  href='<?=PROOT?>assets/css/pt-grid.css' type='text/css' media='all' />
	<link rel='stylesheet'  href='<?=PROOT?>assets/css/woo-styles.css' type='text/css' media='all' />
	<link rel='stylesheet'  href='<?=PROOT?>assets/css/style.css' type='text/css' media='all' />
	<link rel='stylesheet'  href='<?=PROOT?>assets/css/grid.css' type='text/css' media='all' />
	<link rel='stylesheet' id='editor-buttons-css'  href='http://handy.themes.zone/wp-includes/css/editor.min.css?ver=4.9.4' type='text/css' media='all' />
   <!--  <link rel='stylesheet' href='<?=PROOT?>assets/css/AddProduct.css' type='text/css' />
 -->
<?= $this->end(); ?>

<?= $this->start('body'); ?>


<div class="site-wrapper">


<div class="site-main container"><!-- Content wrapper -->
	<div class="row">
	<div class="breadcrumbs-wrapper col-md-12 col-sm-12 col-xs-12"><!-- Breadcrumbs-wrapper -->
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


		<form method="post" enctype="multipart/form-data" action="validatVData()">

			<h3>Design Request Area</h3>
			<div id="error-msg"></div>

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
							<input type="text" class="form-control" name="design_name" id="design-name"  placeholder="design name" data-rules="required"/> 
						</div>

					</div>
					<br />
					
					<!-- Design Description -->

					<label>Design Description</label>

					<div id="wp-pv_shop_description-wrap" class="wp-core-ui wp-editor-wrap tmce-active">
						
					<div id="wp-pv_shop_description-editor-container" class="wp-editor-container">
						<div id="qt_pv_shop_description_toolbar" class="quicktags-toolbar"></div>

						<textarea  style="height: 200px" autocomplete="off" cols="40" name="Design-Description" id="design-description"></textarea>				    
					</div>
					</div>
					<br/>


					<!-- Add an image -->


					<div class="control-group">
						<label>Image</label>	<br>
						<input type='file' id="design-image" name="fileUpload[]" multiple="true" style="border:none; background-color: none;" />				
					</div>
					<br/>

					<!-- Add location -->

					<div class="control-group">
						<label >Postal Code</label>	
						<input type='text' id="postal-code" class="form-control" name="postal code"  />			
					</div>
					<br/>

					<!-- Add due Date -->
					
					<div class="control-group">
						<label>Due date</label>
						<small style="font-color:#000000;">before</small>	
						<input type='date' id="due-date" name="due date" class="form-control" />				
					</div>
					
					                    
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

		function validatVData(){
			var date=documant.getElementById("due-date").value;
			var postalCode=document.getElementById("postal-code").value;
			var name=document.getElementById("design-name");
			var description=document.getElementByID("design-description");
			var images=document.getElementByID("design-description");
			var error;

			if (name==""){
				error=document.getElementByID("error-msg");
				error.innerHTML="<div style="font-color=red;">Name is required!</div>"
				return false;
			}
			else if (date==""){
				error=document.getElementByID("error-msg");
				error.innerHTML="<div style="font-color=red;">Date is required!</div>"
				return false;
			} 

			// else if (image==""){
			// 	error=document.getElementByID("error-msg");
			// 	error.innerHTML="<div style="font-color=red;">image is required!</div>"
			// 	return false;
			// }

			else if (postalCode==""){
				error=document.getElementByID("error-msg");
				error.innerHTML="<div style="font-color=red;">Invalid postalCode!</div>"
				return false;
			}	

			else{
				return true;
			}
			
		}	


	</script>
	
	    
			
		<div id="sidebar-pages" class="widget-area col-xs-12 col-sm-4 col-md-3 col-md-pull-9 col-sm-pull-8 sidebar" role="complementary">
			<div id="pt_recent_post_widget-3" class="widget widget_pt_recent_post_widget"><h3 class="widget-title itemprop="name">Recent Posts</h3><ul class="recent-post-list">			<li class="recent-post-item">

								<div class="thumb-wrapper">
					<a class="recent-posts-img-link" rel="bookmark" href="http://handy.themes.zone/new-post/" title="View details...">
						<img width="80" height="80" src="http://handy.themes.zone/wp-content/uploads/2016/06/beef-steak-80x80.jpg" class="attachment-pt-sidebar-thumbs size-pt-sidebar-thumbs wp-post-image" alt="" srcset="http://handy.themes.zone/wp-content/uploads/2016/06/beef-steak-80x80.jpg 80w, http://handy.themes.zone/wp-content/uploads/2016/06/beef-steak-300x300.jpg 300w, http://handy.themes.zone/wp-content/uploads/2016/06/beef-steak-70x70.jpg 70w, http://handy.themes.zone/wp-content/uploads/2016/06/beef-steak-500x500.jpg 500w, http://handy.themes.zone/wp-content/uploads/2016/06/beef-steak-123x123.jpg 123w, http://handy.themes.zone/wp-content/uploads/2016/06/beef-steak-120x120.jpg 120w, http://handy.themes.zone/wp-content/uploads/2016/06/beef-steak-30x30.jpg 30w, http://handy.themes.zone/wp-content/uploads/2016/06/beef-steak-259x259.jpg 259w, http://handy.themes.zone/wp-content/uploads/2016/06/beef-steak-555x555.jpg 555w" sizes="(max-width: 80px) 92vw, 80px" />					</a>
				</div>
				
				<div class="content-wrapper">
					<h4><a href="http://handy.themes.zone/new-post/" class="nav-button" rel="bookmark" title="View details...">Newest Post</a></h4>

					
						<div class="recent-posts-entry-meta">
													<span class="post-date">July 19th, 2016<span class="post-author"> by <a href="http://handy.themes.zone/author/admin/" title="Posts by Handy" rel="author">Handy</a></span></span>
													<div class="comments-qty"><i class="fa fa-comments-o"></i>
														<a href="http://handy.themes.zone/new-post/#comments" class="comments-link" >6 comments</a>							</div>
												</div>

					
					
									</div>

			</li>
					<li class="recent-post-item">

								<div class="thumb-wrapper">
					<a class="recent-posts-img-link" rel="bookmark" href="http://handy.themes.zone/new-new/" title="View details...">
						<img width="80" height="80" src="http://handy.themes.zone/wp-content/uploads/2016/06/Fashioned-Radio-80x80.jpg" class="attachment-pt-sidebar-thumbs size-pt-sidebar-thumbs wp-post-image" alt="" srcset="http://handy.themes.zone/wp-content/uploads/2016/06/Fashioned-Radio-80x80.jpg 80w, http://handy.themes.zone/wp-content/uploads/2016/06/Fashioned-Radio-300x300.jpg 300w, http://handy.themes.zone/wp-content/uploads/2016/06/Fashioned-Radio-70x70.jpg 70w, http://handy.themes.zone/wp-content/uploads/2016/06/Fashioned-Radio-500x500.jpg 500w, http://handy.themes.zone/wp-content/uploads/2016/06/Fashioned-Radio-123x123.jpg 123w, http://handy.themes.zone/wp-content/uploads/2016/06/Fashioned-Radio-120x120.jpg 120w, http://handy.themes.zone/wp-content/uploads/2016/06/Fashioned-Radio-30x30.jpg 30w, http://handy.themes.zone/wp-content/uploads/2016/06/Fashioned-Radio-259x259.jpg 259w, http://handy.themes.zone/wp-content/uploads/2016/06/Fashioned-Radio-555x555.jpg 555w" sizes="(max-width: 80px) 92vw, 80px" />					</a>
				</div>
				
				<div class="content-wrapper">
					<h4><a href="http://handy.themes.zone/new-new/" class="nav-button" rel="bookmark" title="View details...">New Post</a></h4>

					
						<div class="recent-posts-entry-meta">
													<span class="post-date">June 20th, 2016<span class="post-author"> by <a href="http://handy.themes.zone/author/admin/" title="Posts by Handy" rel="author">Handy</a></span></span>
													<div class="comments-qty"><i class="fa fa-comments-o"></i>
														<a href="http://handy.themes.zone/new-new/#comments" class="comments-link" >3 comments</a>							</div>
												</div>

					
					
									</div>

			</li>
					<li class="recent-post-item">

								<div class="thumb-wrapper">
					<a class="recent-posts-img-link" rel="bookmark" href="http://handy.themes.zone/post-format-standard/" title="View details...">
						<img width="80" height="80" src="http://handy.themes.zone/wp-content/uploads/2016/06/candle2-80x80.jpg" class="attachment-pt-sidebar-thumbs size-pt-sidebar-thumbs wp-post-image" alt="Fusce congue elit a nisi tempus, vel viverra magna dapibus." srcset="http://handy.themes.zone/wp-content/uploads/2016/06/candle2-80x80.jpg 80w, http://handy.themes.zone/wp-content/uploads/2016/06/candle2-300x300.jpg 300w, http://handy.themes.zone/wp-content/uploads/2016/06/candle2-70x70.jpg 70w, http://handy.themes.zone/wp-content/uploads/2016/06/candle2-25x25.jpg 25w, http://handy.themes.zone/wp-content/uploads/2016/06/candle2-500x500.jpg 500w, http://handy.themes.zone/wp-content/uploads/2016/06/candle2-123x123.jpg 123w, http://handy.themes.zone/wp-content/uploads/2016/06/candle2-120x120.jpg 120w, http://handy.themes.zone/wp-content/uploads/2016/06/candle2-30x30.jpg 30w, http://handy.themes.zone/wp-content/uploads/2016/06/candle2-259x259.jpg 259w, http://handy.themes.zone/wp-content/uploads/2016/06/candle2-555x555.jpg 555w" sizes="(max-width: 80px) 92vw, 80px" />					</a>
				</div>
				
				<div class="content-wrapper">
					<h4><a href="http://handy.themes.zone/post-format-standard/" class="nav-button" rel="bookmark" title="View details...">Standard Gallery</a></h4>

					
						<div class="recent-posts-entry-meta">
													<span class="post-date">July 16th, 2015<span class="post-author"> by <a href="http://handy.themes.zone/author/admin/" title="Posts by Handy" rel="author">Handy</a></span></span>
													<div class="comments-qty"><i class="fa fa-comments-o"></i>
														<a href="http://handy.themes.zone/post-format-standard/#comments" class="comments-link" >1 comment</a>							</div>
												</div>

					
					
									</div>

			</li>
		</ul></div>					
	</div>
				
			










		
	

			</div>
		</div><!-- end of Content wrapper -->

<?php include 'Categories.php';?>

<?= $this->end(); ?>