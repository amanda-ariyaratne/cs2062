<?= $this->setSiteTitle('Add Product') ?>

<?= $this->start('head'); ?>
    <link rel='stylesheet' id='pt-grid-css'  href='<?=PROOT?>assets/css/pt-grid.css' type='text/css' media='all' />
    <!--    xmlns="http://www.w3.org/1999/html" xmlns="http://www.w3.org/1999/html"/>-->
    <link rel='stylesheet' href='<?=PROOT?>assets/css/AddProduct.css' type='text/css' />
    <!--    <link rel='stylesheet'  href='--><?//=PROOT?><!--assets/css/woo-styles.css' type='text/css' media='all' />-->
    <!--    <link rel='stylesheet'  href='--><?//=PROOT?><!--assets/css/grid.css' type='text/css' media='all' />-->

<?= $this->end(); ?>

<?= $this->start('body'); ?>

    <div id="body-content" class="layout-boxed">
        <div id="main-content">
            <div class="main-content">

                <div class="wrap-breadcrumb bw-color">
                    <div id="breadcrumb" class="breadcrumb-holder container">

                        <div class="row">

                            <div class="col-lg-6 d-none d-lg-block">
                                <div class="page-title" style="color: #6a6a6a">Add Product</div>
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


                <div class="col-md-1"></div>

                <main class="site-content col-xs-12 col-md-8 col-sm-8 col-md-push-3 col-sm-push-4" itemscope="itemscope" itemprop="mainContentOfPage"><!-- Main content -->


                    <div class="page-content entry-content"><!-- Page content -->


                        <div class="wcvendors-pro-dashboard-wrapper">

                            <div class="wcv-grid">


                                <form name="add-product-form" method="post" id="wcv-store-settings" action="" onsubmit="return validateData();" class="wcv-form wcv-formvalidator" enctype="multipart/form-data">


                                    <h2 class="heading" style="font-family: Roboto,sans-serif; margin: 3px">Product Details</h2>

                                    <div class="wcv-signupnotice">
                                    </div>

                                    <br />


                                    <div class="wcv-tabs top" data-prevent-url-change="true">

                                        <div class="tabs-content" id="store">

                                            <!-- Product Name -->
                                            <div class="control-group">
                                                <label class="col-md-3" style="font-family: sans-serif">Product Name<span class="require">*</span></label>


                                                </label><div class="control"><input type="text" class="col-md-4s" style="width: 400px" name="Product_Name" id="productName" value="" placeholder="Your Product Name" data-rules="required" data-error="This field is required." /></div>
                                            </div>

                                            <small id="error-msg-name"></small>
                                            <br>

                                            <!-- Product Description -->
                                            <label class="col-md-3" style="font-family: sans-serif">Product Description</label>
                                            <div id="wp-pv_shop_description-wrap" class="wp-core-ui wp-editor-wrap tmce-active"><link rel='stylesheet' id='editor-buttons-css'  href='handy.themes.zone/wp-includes/css/editor.min.css?ver=4.9.4' type='text/css' media='all' />
                                            </div>

                                            <div id="wp-pv_shop_description-editor-container" class="col-md-4s"  ><div id="qt_pv_shop_description_toolbar" class="quicktags-toolbar"></div>
                                                <textarea class="wp-editor-area" style="height: 180px; width: 400px" aulete="off" cols="40" name="Product Description" id="pv_shop_description"></textarea>

                                            </div>
                                        </div>
                                        <br/>

                                        <!-- Add image -->
                                        <form action="" method="post" enctype="multipart/form-data">
                                            <label class="col-md-3" style="font-family: sans-serif">Select image<span class="require">*</span><br><small>Add 10 images only</small></label>
                                            <br>
                                            <div class="col-md-4s">
                                                <input type="file" style="line-height: normal" name="fileUpload[]" id="productImage" multiple >
                                            </div>
                                            <small id="error-msg-image"></small>
                                            <br/>
                                            <br/>

                                            <!-- Product Price -->
                                            <div class="control-group">
                                                <label class="col-md-3" style="font-family: sans-serif">Product Price<span class="require">*</span></label>
                                                <div class="control">
                                                    <input type="number" class="col-md-4s" style="padding-left: 7px;width: 400px" name="product_price" id="productPrice" value="" placeholder="require value"  />
                                                </div>
                                            </div>
                                            <small id="error-msg-price"></small>
                                            <br>


                                            <!-- select category  -->
                                            <div class="control-group">
                                                <label class="col-md-3" id="lab" style="font-family: sans-serif">Select Category<span class="require">*</span></label>
                                                <div class="control select">
                                                    <select id="productCategory" type="number" name="category" class="col-md-4s" style="width: 400px" onchange="getMeasurements()">
                                                        <option></option>
                                                        <?php $main_id = 0;
                                                        $i = 0;
                                                        foreach ($params[0] as $cat) {
                                                            if($cat->main_id != $main_id){
                                                                echo '<optgroup label=' .$params[2][$i]->name.'>';
                                                                $main_id = $i+1;
                                                                $i +=1;
                                                            }
                                                            echo '<option value="' .$cat->id . '">' . $cat->name . '</option>';

                                                        } ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <small id="error-msg-category"></small>
                                            <br>

                                            <!-- select Measurements -->
                                            <div class="" id="big" style="display: none">

                                                <?php
                                                $arry = $params[1];
                                                $mes = [];
                                                ?>

                                                <label class="col-md-3" style="font-family: sans-serif">Measurements</label>
                                                <label>Basic measurements required</label>

                                                <div class="col-md-4s" style="color: #6c757d;margin-left: 250px" id="measurements" name="mesname">
                                                    <a></a>
                                                </div>

                                                <div id="addmes" class="input_fields_wrap">
                                                    <div class="col-md-3">
                                                        <label style="font-family: sans-serif">Add More Measurements</label>

                                                    </div>
                                                    <div style="margin-left: 250px"><input style="width: 400px" type="text" name="newMesurements[]"><button class="add_field_button" style="background-color: #f1f1f1;border-radius: 5px" >+</button></div><br>
                                                </div>
                                                <script>
                                                    $(document).ready(function() {
                                                        var max_fields      = 10; //maximum input boxes allowed
                                                        var wrapper   		= $(".input_fields_wrap"); //Fields wrapper
                                                        var add_button      = $(".add_field_button"); //Add button ID

                                                        var x = 1; //initlal text box count
                                                        $(add_button).click(function(e){ //on add input button click
                                                            e.preventDefault();
                                                            if(x < max_fields){ //max input box allowed
                                                                x++; //text box increment
                                                                $(wrapper).append('<div style="margin-left: 250px"><input style="width: 400px" type="text" name="newMesurements[]"/><a href="#" class="remove_field">Remove</a><br><br> </div> '); //add input box
                                                            }
                                                        });

                                                        $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
                                                            e.preventDefault(); $(this).parent('div').remove(); x--;
                                                        })
                                                    });
                                                </script>
                                                <br>
                                            </div>


                                            <!-- Product Material -->
                                            <div class="control-group">
                                                <label class="col-md-3" style="font-family: sans-serif">Product Material</label>
                                                <div class="control">
                                                    <input type="text" class="col-md-4s" style="width: 400px" name="material" id="productMaterial" value="" placeholder=""  />
                                                </div>
                                            </div>
                                            <br>

                                            <!-- select colors -->

                                            <div id="moreColors" class="input_fields_wrap_color">
                                                <div>
                                                    <label style="font-family: sans-serif;margin-left: 15px">Add Colors</label>
                                                    <button class="add_field_button_color" style="background-color: #f1f1f1;border-radius: 5px" >+</button>
                                                </div>
                                                <br>
                                                <div style="display: inline-block"><input type="color" id="color1" value="null" name="colors[]"/><a href="#" class="remove_field"><button style="border-radius: 10px">-</button> </a> </div>
<!--                                                <div style="margin-left: 250px"><input style="display: inline-block" type="color" name="colors[]"></div>-->
                                            </div>
                                            <script>
                                                $(document).ready(function() {
                                                    var max_fields      = 10; //maximum input boxes allowed
                                                    var wrapper   		= $(".input_fields_wrap_color"); //Fields wrapper
                                                    var add_button      = $(".add_field_button_color"); //Add button ID

                                                    var x = 1; //initlal text box count
                                                    $(add_button).click(function(e){//on add input button click
                                                        e.preventDefault();
                                                        if(x < max_fields){ //max input  allowed
                                                            x++;
                                                            $(wrapper).append('<div style="display: inline-block"><input type="color" id="colors[]" name="colors[]"/><a href="#" class="remove_field"><button style="border-radius: 10px">-</button> </a> </div> ');
                                                        }
                                                    });

                                                    $(wrapper).on("click",".remove_field", function(e){
                                                        e.preventDefault(); $(this).parent('div').remove(); x--;
                                                    })
                                                });
                                            </script>
                                            <small id="error-msg-color"></small>
                                            <br>
                                    </div>
                                            <br>

                                            <input style="display: none" id="mes" name="mes"/>


                                            <script type="text/javascript">
                                                function getMeasurements() {
                                                    var cat_id = Number(document.getElementById("productCategory").value);
                                                    document.getElementById("measurements").innerHTML = "";

                                                    var array = <?php echo json_encode($arry); ?>;

                                                    var k = document.getElementById("big");
                                                    if(k.style.display==="block") {
                                                        k.style.display = "none";
                                                    }


                                                    var m = [];
                                                    var i;
                                                    var T = 0;
                                                    for (i = 0; i < array.length; i++) {
                                                        if (Number(array[i].category_id) === cat_id) {

                                                            if(T===0){
                                                                var x = document.getElementById("big");
                                                                if(x.style.display==="none"){
                                                                    x.style.display = "block";
                                                                }
                                                                T = 1;
                                                            }

                                                            var mname = array[i].name;

                                                            document.getElementById("measurements").innerHTML += mname+'<br>';
                                                            m.push(mname);

                                                        }

                                                    }
                                                    document.getElementById("mes").value = m;
                                                }

                                                var i = 0;
                                                var mesurements = ["mes1"];
                                                function getFields() {
                                                    document.getElementById(mesurements[i]).style.display = "block";
                                                }


                                                function validateData(){

                                                    document.getElementById("error-msg-name").innerHTML="";
                                                    document.getElementById("error-msg-image").innerHTML="";
                                                    document.getElementById("error-msg-price").innerHTML="";
                                                    document.getElementById("error-msg-category").innerHTML="";
                                                    document.getElementById("error-msg-color").innerHTML="";


                                                    var name=document.getElementById("productName").value;
                                                    var price=document.getElementById("productPrice").value;
                                                    var category=document.getElementById("productCategory").value;
                                                    var image=document.getElementById("productImage").files;
                                                    var color=document.getElementById("color1").value;
                                                    // alert();
                                                    var error;


                                                    var msg = "fill requirerd fields";
                                                    if (name===""){
                                                        error=document.getElementById("error-msg-name");
                                                        error.innerHTML="<small style=\"font-color:red; font-size:12px;\">Name is required!</small>";
                                                        return false;
                                                    }

                                                    else if (image.length===0){
                                                        error=document.getElementById("error-msg-image");
                                                        error.innerHTML="<small style=\"font-color:red; font-size:12px;\">Add an image!</small>";
                                                        return false;
                                                    }

                                                    else if (image.length>10){
                                                        error=document.getElementById("error-msg-image");
                                                        error.innerHTML="<small style=\"font-color:red; font-size:12px;\">Maximum 10 images!</small>";
                                                        return false;
                                                    }

                                                    else if (price===""){
                                                        error=document.getElementById("error-msg-price");
                                                        error.innerHTML="<small style=\"font-color:red; font-size:12px;\">Price is required!</small>";
                                                        return false;
                                                    }

                                                    else if (category===""){
                                                        error=document.getElementById("error-msg-category");
                                                        error.innerHTML="<small style=\"font-color:red; font-size:12px;\">Category is required!</small>";
                                                        return false;
                                                    }

                                                    else if(color==="#000000"){
                                                        error=document.getElementById("error-msg-color");
                                                        error.innerHTML="<small style=\"font-color:red; font-size:12px;\">Color is required!</small>";
                                                        return false;
                                                    }

                                                    else{
                                                        var msg = "";
                                                        return true;
                                                    }
                                                }

                                            </script>


                                            <div class="control-wrapper last">
                                                <button class="btn btn-1" type="submit" name="submit">Submit Product</button>
                                            </div>

                                        </form>
                                    </div>





                            </div>
                        </div>
                </main>
                <!--                <div id="sidebar-pages" class="widget-area col-xs-12 col-sm-4 col-md-3 col-md-pull-9 col-sm-pull-8 sidebar" role="complementary">-->
                <!--                    style="right: 65%"-->
                <!--                    --><?php //include ('Categories.php');?>
                <!--                </div>-->

            </div>
        </div>
    </div>
    <br>

<?= $this->end(); ?>