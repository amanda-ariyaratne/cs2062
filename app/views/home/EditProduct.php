<?= $this->setSiteTitle('') ?>

<?= $this->start('head'); ?>
    <link rel='stylesheet' id='pt-grid-css'  href='<?=PROOT?>assets/css/pt-grid.css' type='text/css' media='all' />
    <link rel='stylesheet' href='<?=PROOT?>assets/css/AddProduct.css' type='text/css' />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.0.1/css/fileinput.min.css" media="all" rel="stylesheet" type="text/css" />
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet">

    <!--    <link rel='stylesheet'  href='--><?//=PROOT?><!--assets/css/woo-styles.css' type='text/css' media='all' />-->
    <!--    <link rel='stylesheet'  href='--><?//=PROOT?><!--assets/css/grid.css' type='text/css' media='all' />-->

<?= $this->end(); ?>

<?= $this->start('body'); ?>

<?php

$images = $params[5]['img_url_array'];
$images_config = $params[5]['img_config_array'];

?>

    <div id="body-content" class="layout-boxed">
        <div id="main-content">
            <div class="main-content">

                <div class="wrap-breadcrumb bw-color">
                    <div id="breadcrumb" class="breadcrumb-holder container">

                        <div class="row">

                            <div class="col-lg-6 d-none d-lg-block">
                                <div class="page-title" style="color: #6a6a6a">Edit</div>
                            </div>


                            <div class="col-lg-6 col-md-12 col-sm-12 col-12">
                                <ul class="breadcrumb">
                                    <li itemscope itemtype="http://data-vocabulary.org/Breadcrumb">
                                        <a itemprop="url" href="/">
                                            <span itemprop="title" class="d-none">Handy Store</span>Home
                                        </a>
                                    </li>
                                    <li class="active">Edit</li>
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


                                <form name="edit-product-form" method="post" id="edit-product-form" action="<?=PROOT?>home/editProduct/<?=$params[3]["id"]?>" onsubmit="return validateData();" class="wcv-form wcv-formvalidator" enctype="multipart/form-data">


                                    <h2 class="heading" style="font-family: Roboto,sans-serif; margin: 3px">Product Details</h2>

                                    <div class="wcv-signupnotice">
                                    </div>

                                    <br />


                                    <div class="wcv-tabs top" data-prevent-url-change="true">

                                        <div class="tabs-content" id="store">

                                            <!-- Product Name -->
                                            <div class="control-group">
                                                <label class="col-md-3" style="font-family: sans-serif">Product Name<span class="require">*</span></label>


                                                </label><div class="control"><input type="text" class="col-md-4s" style="width: 400px" name="Product_Name" id="productName" value="<?php echo $params[3]["name"];?>" placeholder="Your Product Name" data-rules="required" data-error="This field is required." /></div>
                                            </div>

                                            <small id="error-msg-name"></small>
                                            <br>

                                            <!-- Product Description -->
                                            <label class="col-md-3" style="font-family: sans-serif">Product Description</label>
                                            <div id="wp-pv_shop_description-wrap" class="wp-core-ui wp-editor-wrap tmce-active"><link rel='stylesheet' id='editor-buttons-css'  href='handy.themes.zone/wp-includes/css/editor.min.css?ver=4.9.4' type='text/css' media='all' />
                                            </div>

                                            <div id="wp-pv_shop_description-editor-container" class="col-md-4s"  ><div id="qt_pv_shop_description_toolbar" class="quicktags-toolbar"></div>
                                                <textarea class="wp-editor-area" style="height: 180px; width:400px" aulete="off" cols="40" name="Product Description" id="pv_shop_description"><?php echo $params[3]["description"]; ?></textarea>

                                            </div>
                                        </div>
                                        <br/>

                                        <!-- Add image -->
                                        <div class="control-group">
                                            <label class="col-md-3" style="font-family: sans-serif">Image<br><small>Add 1-6 images<span class="require">*</span></small></label>

                                            <br><br><br>
                                            <div class="col-md-4s" style="width: 80%;margin-left: 15px">
                                                <input  type='file' id="productImage" name="fileUpload[]" multiple="true" style="margin-left: 250px ;border:none" />
                                            </div>
                                            <small id="error-msg-image"></small>
                                        </div>
                                        <br><br>

                                            <!-- Product Price -->
                                            <div class="control-group">
                                                <label class="col-md-3" style="font-family: sans-serif">Product Price<span class="require">*</span></label>
                                                <div class="control">
                                                    <input type="number" class="col-md-4s" style="padding-left: 7px;width: 400px" name="product_price" id="productPrice" value="<?php echo $params[3]["price"]; ?>" placeholder="require value"  />
                                                </div>
                                            </div>
                                            <small id="error-msg-price"></small>
                                            <br>


                                            <!-- select category  -->
                                            <div class="control-group">
                                                <label class="col-md-3" id="lab" style="font-family: sans-serif">Select Category<span class="require">*</span></label>
                                                <div class="control select">
                                                    <select id="productCategory" type="number" name="category" class="col-md-4s" style="width: 400px" onchange="">
                                                        <?php
                                                        echo '<option value="'.$params[0][$params[3]["sub_category_id"]-1]->id.'">'.$params[0][$params[3]["sub_category_id"]-1]->name.'</option>';
                                                         $main_id = 0;
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
                                            <div class="" id="big">


                                                <label style="font-family: sans-serif;margin-left: 15px">Measurements<button class="add_field_button" style="background-color: #f1f1f1;border-radius: 5px" >+</button></label>

                                                <div class="old_mes" >
                                                    <?php if(count($params)!=null) {
                                                        foreach ($params[1] as $mes) {
                                                            echo '<div style="margin-left: 250px"><input style="width: 400px" name="newMeasurements[]" type="text" value="' . $mes . '" ><a href="#" class="remove_field"><button style="border-radius: 10px">-</button> </a></div>';
                                                        }
                                                    }?>

                                                </div>
                                                <div id="addmes" class="input_fields_wrap">
                                                    <div class="col-md-3">
<!--                                                        <label style="font-family: sans-serif">Add More Measurements<button class="add_field_button" style="background-color: #f1f1f1;border-radius: 5px" >+</button></label>-->



                                                    </div>
                                                </div>
                                                <script>
                                                    $(document).ready(function() {
                                                        var max_fields      = 10; //maximum input boxes allowed
                                                        var wrapper   	= $(".input_fields_wrap"); //Fields wrapper
                                                        var add_button      = $(".add_field_button"); //Add button ID
                                                        var wrapper2       = $(".old_mes");

                                                        var x = 1; //initlal text box count
                                                        $(add_button).click(function(e){ //on add input button click
                                                            e.preventDefault();
                                                            if(x < max_fields){ //max input box allowed
                                                                x++; //text box increment
                                                                $(wrapper).append('<div style="margin-left: 250px"><input style="width: 400px" type="text" name="newMeasurements[]"/><a href="#" class="remove_field"><button style="border-radius: 10px">-</button> </a><br> </div> '); //add input box
                                                            }
                                                        });

                                                        $(wrapper2).on("click",".remove_field", function(e){ //user click on remove text
                                                            e.preventDefault(); $(this).parent('div').remove(); x--;
                                                        })
                                                        $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
                                                            e.preventDefault(); $(this).parent('div').remove(); x--;
                                                        })
                                                    });
                                                </script>
                                                <br>
                                            </div>


                                            <!-- Product Material -->
                                            <br>
                                            <div class="control-group">
                                                <label class="col-md-3" style="font-family: sans-serif">Product Material<span class="require">*</span></label>
                                                <div class="control">
                                                    <input type="text" class="col-md-4s" style="width: 400px" name="material" id="productMaterial" value="<?php echo $params[3]["material"]; ?>" placeholder=""  />
                                                </div>
                                            </div>
                                            <small id="error-msg-material"></small>
                                            <br>

<!--                                             select colors-->
                                            <div id="moreColors" class="input_fields_wrap_color">
                                            <div class="control-group">
                                                <label  style="font-family: sans-serif;margin-left: 15px">Colors<button class="add_field_button_color" style="background-color: #f1f1f1;border-radius: 5px" >+</button></label>
                                                <br><br>
                                                <div class="control" style="display: inline-block">
                                                    <?php foreach ($params[4] as $color){
                                                        echo '<div style="display: inline-block"><input  name="colors[]" type="color" value='.$color.' ><a href="#" class="remove_field"><button style="border-radius: 10px">-</button> </a></div>';
                                                    }
                                                    ?>
                                                </div>
                                            </div>

                                            </div>
                                            <script>
                                                $(document).ready(function() {
                                                    var max_fields      = 5; //maximum input boxes allowed
                                                    var wrapper   		= $(".input_fields_wrap_color"); //Fields wrapper
                                                    var add_button      = $(".add_field_button_color"); //Add button ID

                                                    var x = 0; //initlal text box count
                                                    $(add_button).click(function(e){//on add input button click
                                                        e.preventDefault();
                                                        if(x < max_fields){ //max input box allowed
                                                            x++; //text box increment
                                                            $(wrapper).append('<div style="display: inline-block"><input type="color" name="colors[]"/><a href="#" class="remove_field"><button style="border-radius: 10px">-</button> </a> </div> '); //add input box
                                                        }
                                                    });

                                                    $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
                                                        e.preventDefault(); $(this).parent('div').remove(); x--;
                                                    })
                                                });
                                            </script>
                                            <br>


                                            <br>

                                            <input style="display: none" id="mes" name="mes"/>


                                            <script type="text/javascript">

                                                function validateData(){

                                                    document.getElementById("error-msg-name").innerHTML="";
                                                    // document.getElementById("error-msg-image").innerHTML="";
                                                    document.getElementById("error-msg-price").innerHTML="";
                                                    document.getElementById("error-msg-category").innerHTML="";
                                                    document.getElementById("error-msg-material").innerHTML="";


                                                    var name=document.getElementById("productName").value;
                                                    var price=document.getElementById("productPrice").value;
                                                    var category=document.getElementById("productCategory").value;
                                                    var material=document.getElementById("productMaterial").value;

                                                    // var image=document.getElementById("productImage").files;
                                                    var error;

                                                    var msg = "fill requirerd fields";
                                                    if (name===""){
                                                        error=document.getElementById("error-msg-name");
                                                        error.innerHTML="<small style=\"font-color:red; font-size:12px;\">Name is required!</small>";
                                                        return false;
                                                    }

                                                    // else if (image.length==0){
                                                    //     error=document.getElementById("error-msg-image");
                                                    //     error.innerHTML="<small style=\"font-color:red; font-size:12px;\">Add an image!</small>";
                                                    //     return false;
                                                    // }

                                                    else if (price===""){
                                                        error=document.getElementById("error-msg-price");
                                                        error.innerHTML="<small style=\"font-color:red; font-size:12px;\">Price is required!</small>";
                                                        return false;
                                                    }
                                                    else if (price<=0){
                                                        error=document.getElementById("error-msg-price");
                                                        error.innerHTML="<small style=\"font-color:red; font-size:12px;\">invalid price!</small>";
                                                        return false;
                                                    }

                                                    else if (category===""){
                                                        error=document.getElementById("error-msg-category");
                                                        error.innerHTML="<small style=\"font-color:red; font-size:12px;\">Category is required!</small>";
                                                        return false;
                                                    }

                                                    if (material===""){
                                                        error=document.getElementById("error-msg-material");
                                                        error.innerHTML="<small style=\"font-color:red; font-size:12px;\">Material is required!</small>";
                                                        return false;
                                                    }

                                                    else{
                                                        var msg = "";
                                                        return true;
                                                    }
                                                }

                                                $(document).ready(function(){

                                                    jQuery("#productImage").fileinput({
                                                        overwriteInitial: false,
                                                        dropZoneEnabled: true,
                                                        dropZoneTitle: '<span style="font-size:16px;"><b>Drop files here or click to upload.</b></span>',
                                                        dropZoneClickTitle: '<br><span style="font-size:14px;">(Maximum file size is 30MB and 6 files are allowed</span>)',
                                                        uploadUrl: "<?=PROOT?>home/editProduct",
                                                        uploadAsync : true,
                                                        showUpload: false,
                                                        showBrowse: false,
                                                        showPreview: true,
                                                        purifyHtml: true,
                                                        showCaption: false,
                                                        showUploadedThumbs: true,
                                                        browseOnZoneClick: true,
                                                        minFileCount: 1,
                                                        maxFileCount: 6,
                                                        allowedFileTypes: ['image'],
                                                        allowedFileExtensions: ["jpg", "gif", "png", "jpeg", "jfif"],
                                                        maxFileSize: 30000,
                                                        initialPreview: <?php echo json_encode(array_slice($images, 0, 10 ) ); ?>,
                                                        initialPreviewConfig: <?php echo json_encode(array_slice($images_config, 0, 10)) ?>,
                                                        elErrorContainer : false,
                                                        fileActionSettings: {
                                                            showUpload: false,
                                                            showZoom: false
                                                        },
                                                        uploadExtraData: function(event, files) {
                                                            tinymce.triggerSave();

                                                            var poData = new FormData(document.getElementById('edit-product-form'));

                                                            var test = {};
                                                            for (var pair of poData.entries()) {

                                                                test[pair[0]] = pair[1]
                                                            }
                                                            console.log(test);
                                                            return test;
                                                        }

                                                    }).on('filebatchuploadsuccess', function(event, data, previewId, index) {
                                                        $("#submitForm").prop('disabled', true);
                                                        toastr.success("Your Ad was successfully submitted");
                                                        location.reload();
                                                    }).on('filebatchuploaderror', function(event, data, msg) {
                                                        alert(msg);
                                                        $("#submitFormBtn").prop("disabled", false)
                                                        $("#saveFormBtn").prop('disabled', false);
                                                        $(".submit-btn-loader").css('display', 'none');

                                                        if(data.jqXHR.responseJSON.hasOwnProperty("errors")){
                                                            var errors = data.jqXHR.responseJSON.errors

                                                            $.each(errors, function(index, value){

                                                                toastr.error(value);
                                                            });

                                                        }else{
                                                            toastr.error("!! Opps, Something went wrong. Please try again.");

                                                        }
                                                    }).on('filesorted', function(e, params) {
                                                        console.log('File sorted params', params);
                                                    });

                                                    $('#file_upload').on('filedeleted', function(event, key, jqXHR, data) {
                                                        console.log("Successfully deleted!");
                                                    });

                                                });


                                            </script>

                                        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.0.1/js/plugins/piexif.min.js" type="text/javascript"></script>
                                        <!-- sortable.min.js is only needed if you wish to sort / rearrange files in initial preview.
                                            This must be loaded before fileinput.min.js -->
                                        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.0.1/js/plugins/sortable.min.js" type="text/javascript"></script>
                                        <!-- purify.min.js is only needed if you wish to purify HTML content in your preview for
                                            HTML files. This must be loaded before fileinput.min.js -->
                                        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.0.1/js/plugins/purify.min.js" type="text/javascript"></script>
                                        <!-- popper.min.js below is needed if you use bootstrap 4.x (for popover and tooltips). You can also use the bootstrap js
                                           3.3.x versions without popper.min.js. -->
                                        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
                                        <!-- bootstrap.min.js below is needed if you wish to zoom and preview file content in a detail modal
                                            dialog. bootstrap 4.x is supported. You can also use the bootstrap js 3.3.x versions. -->
                                        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
                                        <!-- the main fileinput plugin file -->
                                        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.0.1/js/fileinput.min.js"></script>
<!--                                            --><?php
//                                            dnd($params[3]["id"]);
//                                            ?>

                                            <div class="control-wrapper last">
                                                <button class="btn btn-1" type="submit" name="submit" id="submitForm">Update Details</button>
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