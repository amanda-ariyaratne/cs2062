<?= $this->setSiteTitle('Add Product'); ?>

<?= $this->start('head'); ?>
		<link rel='stylesheet' id='pt-grid-css'  href='<?=PROOT?>assets/css/pt-grid.css' type='text/css' media='all' />
        <link rel='stylesheet' href='<?=PROOT?>assets/css/AddProduct.css' type='text/css' />
        <link rel='stylesheet' href="<?=PROOT?>assets/css/bootstrap.4x.css' />

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
		
			<div class="wcv-grid"><form method="post" id="wcv-store-settings" action="" class="wcv-form wcv-formvalidator"> 

			<input type="hidden" id="_wcv-save_store_settings" name="_wcv-save_store_settings" value="92d9c35492" /><input type="hidden" name="_wp_http_referer" value="/dashboard/?terms=1" /></label><input type="hidden" class="" style="" name="_wcv_vendor_application_id" id="_wcv_vendor_application_id" value="5181" placeholder=""  /> 
			<h3>Product Details</h3>

			<div class="wcv-signupnotice"> 
			</div>

			<br />





                            <div class="wcv-tabs top" data-prevent-url-change="true">

                                <div class="tabs-content" id="store">

                                    <!-- Store Name -->
                                    <div class="control-group"><label for="_wcv_store_name" class="">Product Name 
                                        <span class="require">*</span>

                                    </label><div class="control"><input type="text" class="" style="" name="_wcv_store_name" id="_wcv_store_name" value="" placeholder="Your Product Name" data-rules="required" data-error="This field is required." /></div><!--< p class="tip">Your shop name is public and must be unique.</p> --></div>
                                    <br>

                                    <!-- Store Description -->
                                    <label>Product Description</label><div id="wp-pv_shop_description-wrap" class="wp-core-ui wp-editor-wrap tmce-active"><link rel='stylesheet' id='editor-buttons-css'  href='handy.themes.zone/wp-includes/css/editor.min.css?ver=4.9.4' type='text/css' media='all' />
                                        <div id="wp-pv_shop_description-editor-tools" class="wp-editor-tools hide-if-no-js"><div class="wp-editor-tabs"><button type="button" id="pv_shop_description-tmce" class="btn btn-1" data-wp-editor-id="pv_shop_description">Visual</button>
                                                <button type="button" id="pv_shop_description-html" class="btn btn-1" data-wp-editor-id="pv_shop_description">Text</button>
                                            </div>
                                        </div>
                                        <div id="wp-pv_shop_description-editor-container" class="wp-editor-container"><div id="qt_pv_shop_description_toolbar" class="quicktags-toolbar"></div><textarea class="wp-editor-area" style="height: 200px" autocomplete="off" cols="40" name="pv_shop_description" id="pv_shop_description"></textarea></div>
                                    </div>



                                    <br />

                                    <!-- Add image -->
                                    
 -->
                                     <br/>


                                    <!-- Company URL -->
                                    <!-- <div class="control-group"><label for="_wcv_company_url" class="">Store Website / Blog URL</label><div class="control"><input type="text" class="" style="" name="_wcv_company_url" id="_wcv_company_url" value="" placeholder="https://yourcompany-blogurl.com/here"  /> </div><p class="tip">Your <a href="https://yourcompany-blogurl.com/here">Company / Blog </a> url.</p></div> -->
                                    <!-- Store Phone -->
                                    <div class="control-group">
                                        <label for="_wcv_store_phone" class="">Product Price</label>
                                        <div class="control">
                                            <input type="text" class="" style="" name="_wcv_store_phone" id="_wcv_store_phone" value="" placeholder=""  />
                                        </div><!-- <p class="tip">This is your store contact number</p> -->
                                    </div>
                                    <br>
                                    <!-- Country  -->

                                    <div class="control-group"><label for="_wcv_store_country">Select Category</label>
                                        <div class="control select">
                                            <select id="_wcv_store_country" name="_wcv_store_country" class="select2 country_to_state country_select " style="" >
                                                <option value="AX" >Clothes</option>
                                                <option value="AF" >Home Decor</option>
                                                <option value="AL" >Device Cases</option>
                                                <option value="DZ" >Bags</option>
                                                <option value="AS" >Other</option>
                                                <option value="AD" >Andorra</option>
                                                <option value="AO" >Angola</option>
                                                <option value="AI" >Anguilla</option>
                                                <option value="AQ" >Antarctica</option>
                                                <option value="AG" >Antigua and Barbuda</option>
                                                <option value="AR" >Argentina</option>
                                                <option value="AM" >Armenia</option>
                                                <option value="AW" >Aruba</option>
                                                <option value="AU" >Australia</option>
                                                <option value="AT" >Austria</option>
                                                <option value="AZ" >Azerbaijan</option>
                                                <option value="BS" >Bahamas</option>
                                                <option value="BH" >Bahrain</option>
                                                <option value="BD" >Bangladesh</option>
                                            </select>
                                        </div>
                                    </div>
                                    <br>



                                    <!-- select sizes -->
                                    <div class=""><label class="">Select Availabe Sizes</label></div>

                                    <div class="select_sizes">
                                        <input type="checkbox" name="xs" value="Bike"> xs<br>
                                        <input type="checkbox" name="s" value="Car"> s<br>
                                        <input type="checkbox" name="M" value="Boat" checked> M<br>
                                        <input type="checkbox" name="M" value="Boat" checked> L<br>
                                        <input type="checkbox" name="M" value="Boat" checked> x<br>

                                    </div>
                                    <br>





                                    <!-- Address 1 -->
                                    <div class="control-group"><label for="_wcv_store_address1" class="">Store Address</label><div class="control"><input type="text" class="" style="" name="_wcv_store_address1" id="_wcv_store_address1" value="" placeholder="Street Address"  /> </div></div>
                                    <!-- Address 2 -->
                                    <div class="control-group"><label for="_wcv_store_address2" class="">&nbsp;</label><div class="control"><input type="text" class="" style="" name="_wcv_store_address2" id="_wcv_store_address2" value="" placeholder="Apartment, unit, suite etc. "  /> </div></div>
                                    <!-- Town / City  -->
                                    <div class="control-group"><label for="_wcv_store_city" class="">City / Town</label><div class="control"><input type="text" class="" style="" name="_wcv_store_city" id="_wcv_store_city" value="" placeholder="City / Town"  /> </div></div>
                                    <!-- State / County | Post Code  -->
                                    <div class="wcv-cols-group wcv-horizontal-gutters"><div class="all-50 small-100"><div class="control-group"><label for="_wcv_store_state" class="">State / County</label><div class="control"><input type="text" class="" style="" name="_wcv_store_state" id="_wcv_store_state" value="" placeholder="State / County"  /> </div></div></div><div class="all-50 small-100"><div class="control-group"><label for="_wcv_store_postcode" class="">Postcode / Zip</label><div class="control"><input type="text" class="" style="" name="_wcv_store_postcode" id="_wcv_store_postcode" value="" placeholder="Postcode / Zip"  /> </div></div></div></div>
                                </div>

                                <div class="tabs-content" id="payment">
                                    <!-- Paypal address -->
                                    <div class="control-group"><label for="_wcv_paypal_address" class="">PayPal Address</label><div class="control"><input type="email" class="" style="" name="_wcv_paypal_address" id="_wcv_paypal_address" value="" placeholder="yourpaypaladdress@goeshere.com"  /> </div><p class="tip">Your PayPal address is used to send you your commission.</p></div>		</div>
                                <input type="submit" value="Submit Product" class="btn btn-1" name="store_save_button" id="store_save_button">
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
	
	    
			
									