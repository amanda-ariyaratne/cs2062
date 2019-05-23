<?= $this->setSiteTitle('Add Product') ?>

<?= $this->start('head'); ?>
    <link rel='stylesheet' id='pt-grid-css' href='<?=PROOT?>assets/css/pt-grid.css' type='text/css' media='all'
          xmlns="http://www.w3.org/1999/html" xmlns="http://www.w3.org/1999/html"/>
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



                <div class="col-md-2"></div>

            <main class="site-content col-xs-12 col-md-7 col-sm-8 col-md-push-3 col-sm-push-4" itemscope="itemscope" itemprop="mainContentOfPage"><!-- Main content -->


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
                                    <label style="font-family: sans-serif">Product Description</label>
                                    <div id="wp-pv_shop_description-wrap" class="wp-core-ui wp-editor-wrap tmce-active"><link rel='stylesheet' id='editor-buttons-css'  href='handy.themes.zone/wp-includes/css/editor.min.css?ver=4.9.4' type='text/css' media='all' />
                                        </div>

                                        <div id="wp-pv_shop_description-editor-container" class="wp-editor-container" ><div id="qt_pv_shop_description_toolbar" class="quicktags-toolbar"></div>
                                        <textarea class="wp-editor-area" style="height: 180px; width: 400px" aulete="off" cols="40" name="Product Description" id="pv_shop_description"></textarea>

                                        </div>
                                </div>
                                    <br/>

                                    <!-- Add image -->
                                <form action="" method="post" enctype="multipart/form-data">
                                    <label style="font-family: sans-serif">Select image</label>
                                    <span class="require">*</span>
                                    <div>
                                    <input type="file" style="line-height: normal" name="fileUpload[]" id="productImage" multiple >
                                    </div>
                                    <small id="error-msg-image"></small>
                                    <br/>



<!--                                    <table class="variations" cellspacing="0">-->
<!--                                        <tbody>-->
<!--                                        <tr>-->
<!--                                            <td class="label"><label style="font-family: sans-serif">Product Price</label><span class="require">*</span></td>-->
<!--                                            <td class="value">-->
<!--                                                <div class="control">-->
<!--                                                    <input type="number" class="box" style="padding-left: 7px;width: 100px" name="product_price" id="productPrice" value="" placeholder="require value"  />-->
<!--                                                </div>-->
<!--                                                <small id="error-msg-price"></small></td>-->
<!--                                        </tr>-->
<!--                                        </tbody>-->
<!---->
<!--                                    </table>-->






                                    <!-- Product Price -->
                                    <div class="control-group">
                                        <label style="font-family: sans-serif">Product Price</label>
                                        <span class="require">*</span>
                                        <div class="control">
                                            <input type="number" class="box" style="padding-left: 7px" name="product_price" id="productPrice" value="" placeholder="require value"  />
                                        </div>
                                    </div>
                                    <small id="error-msg-price"></small>
                                    <br>


                                    <!-- select category  -->
                                    <div class="control-group">
                                        <label id="lab" style="font-family: sans-serif">Select Category</label>
                                        <span class="require">*</span>
                                        <div class="control select">
                                            <select id="productCategory" type="number" name="category" class="box " style="" onchange="getMeasurements()">
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

                                    <label style="font-family: sans-serif">Required Measurements</label>

                                    <div style="color: #6c757d" id="measurements" name="mesname">
                                        <a></a>

                                    </div>
                                    <label style="font-family: sans-serif">Add more Measurements</label>
                                    <small>optional</small> <button class="btn btn-1" onclick="getFields()">+</button>
                                    <div class="control"><input type="text" class="box" style="" id="moreMes" name="moreMes" value="" placeholder="eg: A,B"/></div>
                                    <br>
                                </div>


                                <!-- Product Material -->
                                <div class="control-group">
                                    <label style="font-family: sans-serif">Product Material</label>
                                    <div class="control">
                                        <input type="text" class="box" style="" name="material" id="productMaterial" value="" placeholder=""  />
                                    </div>
                                </div>
                                <br>

                                <!-- select colors -->

                                <div class="control-group">
                                    <label style="font-family: sans-serif">Select Available Colors</label>
                                    <span class="require">*</span>
                                    
                                    <div id="colorsAdd">
                                        <input type="color" name="color[0]" id="color1" style="border-radius: 5px">
                                        <input type="color" name="color[1]" id="color2" style="border-radius: 5px;display: none">
                                        <input type="color" name="color[2]" id="color3" style="border-radius: 5px;display: none">
                                        <input type="color" name="color[3]" id="color4" style="border-radius: 5px;display: none">
                                        <input type="color" name="color[4]" id="color5" style="border-radius: 5px;display: none">
                                        <input type="color" name="color[5]" id="color6" style="border-radius: 5px;display: none">
                                        <input type="color" name="color[6]" id="color7" style="border-radius: 5px;display: none">
                                        <input type="color" name="color[7]" id="color8" style="border-radius: 5px;display: none">
                                        <input type="color" name="color[8]" id="color9" style="border-radius: 5px;display: none">
                                        <input type="color" name="color[9]" id="color10" style="border-radius: 5px;display: none">

                                    </div>
                                    <small id="warning" style="font-color:red; font-size:12px;"> </small>
                                    <br>
                                    <button class="btn btn-1" style="background-color: #d3d3d3; color: #000000; border: #d3d3d3;" onclick="addMoreColorNow()">+</button>
                                    <input type="number" id="colorCount" name="colorCount" style="display: none">
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

                                                        // if(document.getElementById("reqMes").checked===true) {
                                                        //     alert(mname);
                                                        // }
                                                        //     m.push(mname);
                                                        // var s = JSON.stringify(m);
                                                        // document.getElementById("lab").innerHTML = s;
                                                        // }
                                                    }

                                                }
                                                document.getElementById("mes").value = m;
                                            }

                                            function getFields() {
                                                '<input type="text" class="box"  >'
                                            }


                                    </script>

                                    <script type="text/javascript">

                                        var count=1;
                                        var colors = ["color2","color3","color4","color5","color6","color7","color8","color9","color10"];
                                        function addMoreColorNow(){

                                            if (count<=10){
                                                document.getElementById(colors[count-1]).style.display = "block";
                                                count++;
                                                document.getElementById("colorCount").value = count;
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


                                    <div class="control-wrapper last">
                                        <button class="btn btn-1" type="submit" name="submit">Submit Product</button>
                                    </div>

                        </form>
                    </div>





                </div>
            </div>
            </main>
                <div id="sidebar-pages" style="right: 65%" class="widget-area col-xs-12 col-sm-4 col-md-3 col-md-pull-9 col-sm-pull-8 sidebar" role="complementary">
                    <?php include ('Categories.php');?>
                </div>

        </div>
    </div>
</div>
<br>

<?= $this->end(); ?>