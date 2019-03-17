<?= $this->setSiteTitle('Add Product'); ?>

<?= $this->start('head'); ?>
		<link rel='stylesheet' id='pt-grid-css'  href='<?=PROOT?>assets/css/pt-grid.css' type='text/css' media='all' />
        <link rel='stylesheet' href='<?=PROOT?>assets/css/AddProduct.css' type='text/css' />
        
<?= $this->end(); ?>

<?= $this->start('body'); ?>

<div id="body-content" class="layout-boxed">
    <div id="main-content">
        <div class="main-content">

            <div class="wrap-breadcrumb bw-color">
                <div id="breadcrumb" class="breadcrumb-holder container">

                    <div class="row">

                        <div class="col-lg-6 d-none d-lg-block">
                            <div class="page-title">Add Product</div>
                        </div>


                        <div class="col-lg-6 col-md-12 col-sm-12 col-12">
                            <ul class="breadcrumb">
                                <li itemscope itemtype="http://data-vocabulary.org/Breadcrumb">
                                    <a itemprop="url" href="/">
                                        <span itemprop="title" class="d-none">Handy Store</span>Home
                                    </a>
                                </li>


                                <li class="active">Add Product</li>


                            </ul>
                        </div>
                    </div>

                </div>
            </div>


            <main class="site-content col-xs-12 col-md-9 col-sm-8 col-md-push-3 col-sm-push-4" itemscope="itemscope" itemprop="mainContentOfPage"><!-- Main content -->

			
			<div class="page-content entry-content"><!-- Page content -->
		
		
			<div class="wcvendors-pro-dashboard-wrapper"> 
		
			<div class="wcv-grid">

                <form name="add-product-form" method="post" id="wcv-store-settings" action="" class="wcv-form wcv-formvalidator" enctype="multipart/form-data"> 

            <h2 class="heading">Product Details</h2>

			<!-- <input type="hidden" id="_wcv-save_store_settings" name="Product Details" value="92d9c35492" /><input type="hidden" name="Product Details" value="/dashboard/?terms=1" /></label><input type="hidden" class="" style="" name="Product Details" id="_wcv_vendor_application_id" value="5181" placeholder=""  /> 
			<h3>Product Details</h3> -->

			<div class="wcv-signupnotice"> 
			</div>

			<br />





                            <div class="wcv-tabs top" data-prevent-url-change="true">

                                <div class="tabs-content" id="store">
                                    
                                    <!-- Store Name -->
                                    <div class="control-group">
                                        <label for="_wcv_store_name" class="">Product Name 
                                        <span class="require">*</span>

                                    </label><div class="control"><input type="text" class="" style="" name="_wcv_store_name" id="_wcv_store_name" value="" placeholder="Your Product Name" data-rules="required" data-error="This field is required." /></div><!--< p class="tip">Your shop name is public and must be unique.</p> -->
                                    </div>
                                    <br>

                                    <!-- Store Description -->
                                    <label>Product Description</label>
                                    <div id="wp-pv_shop_description-wrap" class="wp-core-ui wp-editor-wrap tmce-active"><link rel='stylesheet' id='editor-buttons-css'  href='handy.themes.zone/wp-includes/css/editor.min.css?ver=4.9.4' type='text/css' media='all' />
                                        <div id="wp-pv_shop_description-editor-tools" class="wp-editor-tools hide-if-no-js"><div class="wp-editor-tabs"><button type="button" id="pv_shop_description-tmce" class="btn btn-1" data-wp-editor-id="pv_shop_description">Visual</button>
                                                <button type="button" id="pv_shop_description-html" class="btn btn-1" data-wp-editor-id="pv_shop_description">Text</button>

                                            </div>
                                        </div>
                                        <div id="wp-pv_shop_description-editor-container" class="wp-editor-container"><div id="qt_pv_shop_description_toolbar" class="quicktags-toolbar"></div>
                                        <textarea class="wp-editor-area" style="height: 200px" autocomplete="off" cols="40" name="Product Description" id="pv_shop_description"></textarea>
                                        </div>
                                    </div>
                                    <br/>

                                    <!-- Add image -->
                                     <br/>


                                    
                                    <!-- Product Price -->
                                    <div class="control-group">
                                        <label for="_wcv_store_phone" class="">Product Price</label>
                                        <div class="control">
                                            <input type="number" class="box" style="" name="price" id="_wcv_store_phone" value="" placeholder="require value"  />
                                        </div>
                                    </div>
                                    <br>

                                    <!-- Product Material -->
                                    <div class="control-group">
                                        <label for="_wcv_store_phone" class="">Product Material</label>
                                        <div class="control">
                                            <input type="text" class="box" style="" name="material" id="_wcv_store_phone" value="" placeholder=""  />
                                        </div>
                                    </div>
                                    <br>

                                    <!-- select category  -->
                                    <div class="control-group">
                                        <label for="_wcv_store_country">Select Category</label>
                                        <div class="control select">
                                            <select id="_wcv_store_country" type="number" name="category" class="select2 country_to_state country_select " style="" >
                                                <?php foreach ($params[0] as $cat) {
                                                    echo '<option value="' .$cat->id . '">' . $cat->name . '</option>'; 
                                                } ?> 
                                            </select>
                                        </div>
                                    </div>
                                    <br>



                                    <!-- select sizes -->
                                    <div class=""><label class="">Select Availabe Sizes</label><br>

                                    <form class="select_sizes" action="#" method="post">
                                        <input type="checkbox" name="xs" value="XS"><label>XS</label><br>
                                        <input type="checkbox" name="s" value="S"><label>S</label><br>
                                        <input type="checkbox" name="m" value="M"><label>M</label><br>
                                        <input type="checkbox" name="l" value="L"><label>L</label><br>
                                        <input type="checkbox" name="xl" value="XL"><label>XL</label><br>

                                    </form>
                                    </div>
                                    <br>



                                    <div class="control-wrapper last">
                                        <button class="btn btn-1" type="submit">Submit Product</button>
                                    </div>

                        </form>
                    </div>
                </div>
            </div>
            </main>
        
        </div>
    </div>
</div>
<br>

<?= $this->end(); ?>