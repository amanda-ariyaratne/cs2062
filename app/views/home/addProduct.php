<?= $this->setSiteTitle('Add Product'); ?>

<?= $this->start('head'); ?>
		<link rel='stylesheet' id='pt-grid-css'  href='<?=PROOT?>assets/css/pt-grid.css' type='text/css' media='all' />
        <link rel='stylesheet' href='<?=PROOT?>assets/css/AddProduct.css' type='text/css' />
        <link rel='stylesheet'  href='<?=PROOT?>assets/css/woo-styles.css' type='text/css' media='all' />
        <link rel='stylesheet'  href='<?=PROOT?>assets/css/style.css' type='text/css' media='all' />
        <link rel='stylesheet'  href='<?=PROOT?>assets/css/grid.css' type='text/css' media='all' />
<!--        <link rel='stylesheet' id='editor-buttons-css'  href='http://handy.themes.zone/wp-includes/css/editor.min.css?ver=4.9.4' type='text/css' media='all' />-->

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

                <form name="add-product-form" method="post" id="wcv-store-settings" action="" onsubmit="return validateData();" class="wcv-form wcv-formvalidator" enctype="multipart/form-data">

            <h2 class="heading">Product Details</h2>

			<!-- <input type="hidden" id="_wcv-save_store_settings" name="Product Details" value="92d9c35492" /><input type="hidden" name="Product Details" value="/dashboard/?terms=1" /></label><input type="hidden" class="" style="" name="Product Details" id="_wcv_vendor_application_id" value="5181" placeholder=""  />
			<h3>Product Details</h3> -->

			<div class="wcv-signupnotice">
			</div>

			<br />





                            <div class="wcv-tabs top" data-prevent-url-change="true">

                                <div class="tabs-content" id="store">
                                    
                                    <!-- Product Name -->
                                    <div class="control-group">
                                        <label for="_wcv_store_name" class="">Product Name 
                                        <span class="require">*</span>

                                    </label><div class="control"><input type="text" class="box" style="" name="Product_Name" id="productName" value="" placeholder="Your Product Name" data-rules="required" data-error="This field is required." /></div><!--< p class="tip">Your shop name is public and must be unique.</p> -->
                                    </div>
                                    <small id="error-msg-name"></small>
                                    <br>

                                    <!-- Product Description -->
                                    <label>Product Description</label>
                                    <div id="wp-pv_shop_description-wrap" class="wp-core-ui wp-editor-wrap tmce-active"><link rel='stylesheet' id='editor-buttons-css'  href='handy.themes.zone/wp-includes/css/editor.min.css?ver=4.9.4' type='text/css' media='all' />

                                        <div id="wp-pv_shop_description-editor-container" class="wp-editor-container"><div id="qt_pv_shop_description_toolbar" class="quicktags-toolbar"></div>
                                            <label for="pv_shop_description"></label><textarea class="wp-editor-area" style="height: 200px" autocomplete="off" cols="40" name="Product Description" id="productDescription"></textarea>
                                        </div>
                                    </div>
                                    <br/>

                                    <!-- Add image -->
                                    <form action="" method="post" enctype="multipart/form-data">
                                        <label for="_wcv_store_phone" class="">Select image</label>
                                        <span class="require">*</span>
                                        <input type="file" name="imagesUpload[]" id="productImage" multiple >
<!--                                        <input type="submit" name="upload" value="UPLOAD">-->
                                    </form>
                                    <small id="error-msg-image"></small>
                                    <br/>
                                     <br/>

                                    <!-- Product Price -->
                                    <div class="control-group">
                                        <label for="_wcv_store_phone" class="">Product Price</label>
                                        <span class="require">*</span>
                                        <div class="control">
                                            <input type="number" class="box" style="" name="product_price" id="productPrice" value="" placeholder="require value"  />
                                        </div>
                                    </div>
                                    <small id="error-msg-price"></small>
                                    <br>

                                    <!-- sale Price -->
                                    <div class="control-group">
                                        <label for="_wcv_store_phone" class="">Sale Price</label>
                                        <div class="control">
                                            <input type="number" class="box" style="" name="sale_price" id="salePrice" value="" placeholder="require value"  />
                                        </div>
                                    </div>
                                    <br>

                                    <!-- Product Material -->
                                    <div class="control-group">
                                        <label for="_wcv_store_phone" class="">Product Material</label>
                                        <div class="control">
                                            <input type="text" class="box" style="" name="material" id="productMaterial" value="" placeholder=""  />
                                        </div>
                                    </div>
                                    <br>

                                    <!-- select category  -->
                                    <div class="control-group">
                                        <label for="_wcv_store_country">Select Category</label>
                                        <span class="require">*</span>
                                        <div class="control select">
                                            <select id="productCategory" type="number" name="category" class="box " style="" >
                                                <?php foreach ($params[0] as $cat) {
                                                    echo '<option value="' .$cat->id . '">' . $cat->name . '</option>';
                                                } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <small id="error-msg-category"></small>
                                    <br>



                                    <!-- select sizes -->
<!--                                    <div class=""><label class="">Select Availabe Sizes</label><br>-->
<!---->
<!--                                    <form class="select_sizes" action="#" method="post">-->
<!--                                        <label>-->
<!--                                            <input type="checkbox" name="xs" value="XS">-->
<!--                                        </label><label>XS</label><br>-->
<!--                                        <label>-->
<!--                                            <input type="checkbox" name="s" value="S">-->
<!--                                        </label><label>S</label><br>-->
<!--                                        <label>-->
<!--                                            <input type="checkbox" name="m" value="M">-->
<!--                                        </label><label>M</label><br>-->
<!--                                        <label>-->
<!--                                            <input type="checkbox" name="l" value="L">-->
<!--                                        </label><label>L</label><br>-->
<!--                                        <label>-->
<!--                                            <input type="checkbox" name="xl" value="XL">-->
<!--                                        </label><label>XL</label><br>-->
<!---->
<!--                                    </form>-->
<!--                                    </div>-->
<!--                                    <br>-->



                                    <div class="control-wrapper last">
                                        <button class="btn btn-1" type="submit" name="submit">Submit Product</button>
                                    </div>

                        </form>
                    </div>

                <script type="text/javascript">
                    function validateData(){

                        document.getElementById("error-msg-name").innerHTML="";
                        document.getElementById("error-msg-image").innerHTML="";
                        document.getElementById("error-msg-price").innerHTML="";
                        document.getElementById("error-msg-category").innerHTML="";

                        var name=document.getElementById("productName").value;
                        var price=document.getElementById("productPrice").value;
                        var category=document.getElementById("productCategory").value;
                        var image=document.getElementById("productImage").files;
                        var error;



                        if (name==""){
                            error=document.getElementById("error-msg-name");
                            error.innerHTML="<small style=\"font-color:red; font-size:12px;\">Name is required!</small>";
                            return false;
                        }

                        else if (image.length==0){
                            error=document.getElementById("error-msg-image");
                            error.innerHTML="<small style=\"font-color:red; font-size:12px;\">Add an image!</small>";
                            return false;
                        }

                        else if (price==""){
                            error=document.getElementById("error-msg-price");
                            error.innerHTML="<small style=\"font-color:red; font-size:12px;\">Price is required!</small>";
                            return false;
                        }

                        else if (category==""){
                            error=document.getElementById("error-msg-category");
                            error.innerHTML="<small style=\"font-color:red; font-size:12px;\">Category is required!</small>";
                            return false;
                        }

                        else{
                            return true;
                        }
                    }

                </script>




                </div>
            </div>
            </main>

        </div>
    </div>
</div>
<br>

<?= $this->end(); ?>