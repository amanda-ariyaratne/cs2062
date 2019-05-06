<?= $this->setSiteTitle('Add Product'); ?>

<?= $this->start('head'); ?>
		<link rel='stylesheet' id='pt-grid-css'  href='<?=PROOT?>assets/css/pt-grid.css' type='text/css' media='all' />
        <link rel='stylesheet' href='<?=PROOT?>assets/css/AddProduct.css' type='text/css' />
        <link rel='stylesheet'  href='<?=PROOT?>assets/css/woo-styles.css' type='text/css' media='all' />
        <link rel='stylesheet'  href='<?=PROOT?>assets/css/style-1.css' type='text/css' media='all' />
        <link rel='stylesheet'  href='<?=PROOT?>assets/css/grid.css' type='text/css' media='all' />
        <link rel='stylesheet' id='editor-buttons-css'  href='http://handy.themes.zone/wp-includes/css/editor.min.css?ver=4.9.4' type='text/css' media='all' />

<?= $this->end(); ?>

<?= $this->start('body'); ?>

<div id="body-content" class="layout-boxed">
    <div id="main-content">
        <div class="main-content">

            <div class="breadcrumbs-wrapper col-md-12 col-sm-12 col-xs-12">
        <!-- Breadcrumbs-wrapper -->
    <div class="container">

                    <div class="row">

                        <div class="col-lg-6 d-none d-lg-block">
                            <div class="page-title">Add Product</div>
                        </div>


                        <div class="col-lg-6 col-md-12 col-sm-12 col-12">
                            <ul class="breadcrumb">
                                <li itemscope itemtype="http://data-vocabulary.org/Breadcrumb">
                                    <a itemprop="url" href="/">
                                        <span itemprop="title" class="d-none">
                                            Handy Store
                                        </span>Home
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
                                        </div>

                                        <div id="wp-pv_shop_description-editor-container" class="wp-editor-container"><div id="qt_pv_shop_description_toolbar" class="quicktags-toolbar"></div>
                                        <textarea class="wp-editor-area" style="height: 200px" autocomplete="off" cols="40" name="Product Description" id="pv_shop_description"></textarea>

                                        </div>
                                </div>
                                    <br/>

                                    <!-- Add image -->
                                <form action="" method="post" enctype="multipart/form-data">
                                    <label for="_wcv_store_phone" class="">Select image</label>
                                    <span class="require">*</span>
                                    <div>
                                    <input type="file" name="fileUpload[]" id="productImage" multiple >
                                    </div>
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

                    <!-- select category  -->
                    <div class="control-group">
                        <label for="_wcv_store_country">Select Category</label>
                        <span class="require">*</span>
                        <div class="control select">
                            <select id="productCategory" type="number" name="category" class="box " style="" >
                                <?php 
                                foreach ($params[0] as $cate) {
                                    echo '<option value="' .$cate->id . '">' . $cate->name . '</option>';
                                } ?>
                            </select>
                        </div>
                    </div>
                    <small id="error-msg-category"></small>
                    <br>

                                <!-- Product Material -->
                                <div class="control-group">
                                    <label for="_wcv_store_phone" class="">Product Material</label>
                                    <div class="control">
                                        <input type="text" class="box" style="" name="material" id="productMaterial" value="" placeholder=""  />
                                    </div>
                                </div>
                                <br>

                                <!-- select colors -->

                                <div class="control-group">
                                    <label>Select Availabe colors</label>
                                    <span class="require">*</span>
                                    
                                    <div id="colorsAdd">
                                        <input type="color" name="color[]">
                                    </div>
                                    <small id="warning" style="font-color:red; font-size:12px;"> </small>
                                    <br>
                                    
                                    <button  onclick="addMoreColorNow()">+</button>                               
                                    
                                </div>
                                <br><br>

                                <!-- select Measurements -->

                                <div class=""><label class="">Select Availabe Measurements</label><br>

                                        <input type="checkbox" name="measurement1" value="measurement1"> measurement1<br>
                                        <input type="checkbox" name="measurement2" value="measurement2"> measurement2<br>
                                        <input type="checkbox" name="measurement3" value="measurement3"> measurement3<br><br>
                                </div>

                                <br>

                                <div class="control-wrapper last">
                                        <button class="btn btn-1" type="submit" name="submit">Submit Product</button>
                                </div>
                             </form>
                                <script type="text/javascript">

                                    var count=1;
                                    function addMoreColorNow(){
                                       
                                        if (count<=10){
                                            var innerdoc=document.getElementById("colorsAdd").innerHTML;
                                            document.getElementById("colorsAdd").innerHTML=innerdoc+
                                            '<input type="color" name="color[]">';
                                            count++;
                                            return true;
                                        }
                                        else{
                                            document.getElementById("warning").innerHTML='Add only 10 colors';
                                            return false;
                                        }
                                        
                                    }

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


                                        var msg = "fill requirerd fields";
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
                                            var msg = "";
                                            return true;
                                        }
                                    }


                                </script>

                    </div>
                </div>
            </div>
            </main>
            <div id="sidebar-pages" class="widget-area col-xs-12 col-sm-4 col-md-3 col-md-pull-9 col-sm-pull-8 sidebar" role="complementary">
            <?php include 'Categories.php'?>                    
            </div>
        </div>
    </div>
</div>
<br>

<?= $this->end(); ?>