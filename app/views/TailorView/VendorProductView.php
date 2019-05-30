
<?= $this->setSiteTitle($params[0]->name) ?>


<?= $this->start('head'); ?>

<link href="<?=PROOT?>assets/css/productView.css" rel="stylesheet" type="text/css" media="all" />
<script src="<?=PROOT?>assets/js/productView.js"></script>
<!-- <link rel='stylesheet' id='fontawesome-css' href='https://use.fontawesome.com/releases/v5.0.1/css/all.css?ver=4.9.1' type='text/css' media='all' />
 --><!-- <script type="text/javascript" src="<?=PROOT?>assets/js/productView.js"></script>
 --><!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
 --><!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
 -->    <style id="shopify-dynamic-checkout">
</style>

<style>
    .bg-danger{
        background-color:#e8a0a7!important;
    }
    .bg-danger ul li {
        list-style-type: square !important;
        padding: 1px;
    }
</style>

<?= $this->end(); ?>






<?= $this->start('body'); ?>



<div class="boxed-wrapper" id="changing-image">

    <div class="new-loading"></div>
    <div class="cart-sb">

    </div>

    <div id="page-body" class="breadcrumb-color">

        <div id="shopify-section-header" class="shopify-section">
            <header class="header-content" data-stick="true" data-stickymobile="false">

                <!--  Begin Menu Mobile -->


                <div id="body-content" class="layout-boxed"  style=" background-image:url(<?=PROOT?>assets/images/body-10.jpg); ">
                    <div id="main-content">
                        <div class="main-content">
                            <div id="shopify-section-product-template" class="shopify-section">

                                <div class="wrap-breadcrumb bw-color">
                                    <div id="breadcrumb" class="breadcrumb-holder container">

                                        <div class="row">


                                            <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                                                <ul class="breadcrumb">

                                                    <li itemscope itemtype="http://data-vocabulary.org/Breadcrumb">
                                                        <a itemprop="url" href="/">
                                                            <span itemprop="title" class="d-none">Handy Store</span>Home
                                                        </a>
                                                    </li>


                                                    <li itemscope itemtype="http://data-vocabulary.org/Breadcrumb" class="d-none">
                                                        <a href="" itemprop="url">
                                                            <span itemprop="title"><?=$params[0]->main_category_name?></span>
                                                        </a>
                                                    </li>

                                                    <li>
                                                        <a href="" title=""><?=$params[0]->main_category_name?></a>
                                                    </li>

                                                    <li itemscope itemtype="http://data-vocabulary.org/Breadcrumb" class="d-none">
                                                        <a href="/products/donkix-product-sample" itemprop="url">
                                                            <span itemprop="title"><?=$params[0]->sub_category_name?></span>
                                                        </a>
                                                    </li>

                                                    <li>
                                                        <a href="" title=""><?=$params[0]->sub_category_name?></a>
                                                    </li>


                                                </ul>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <div itemscope itemtype="http://schema.org/Product">
                                    <meta itemprop="url" content="https://arena-handy.myshopify.com/products/donkix-product-sample" />
                                    <meta itemprop="image" content="//cdn.shopify.com/s/files/1/0102/1155/7435/products/6_a58db3c3-fa0c-4882-a718-b543511467ce_grande.jpg?v=1537342931">
                                    <span itemprop="name" class="hide">'<?=$params[0]->name?>'</span>








                                    <div class="container">
                                        <div class="row">





                                            <div class="col-lg-9 col-md-12" style="width: 1100px">





                                                <div id="col-main" class="page-product layout-normal" style="width: 1200px">

                                                    <div class="product">

                                                        <div class="product-content-wrapper">
                                                            <div class="row">

                                                                <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                                                    <div id="product-image" class="product-image ">
                                                                        <div class="product-image-inner ">
                                                                            <ul style="height: 600px; overflow: scroll; list-style: none;">

                         <?php
                        foreach($params[1] as $image){
                            echo '
                              <li>
                                <div class="slider-main-image">
                                  <div class="slider-for-03">
                                    <div class="slick-item slick-zoom">
                                        <div class="ar-quicklook-overlay" data-shopify-3d-variant-id="14880170180667" style="display: none;"></div>

                                        <img class="image-zoom " src="'.PROOT.'assets/images/'.$image.'" alt="'.$params[0]->name.'" style="width:400px;display:block;margin-left: auto;margin-right: auto;">

                                    </div>
                                    <div class="slick-item slick-zoom">
                                        <div class="ar-quicklook-overlay" data-shopify-3d-variant-id="14880170180667" style="display: none;"></div>
                                    </div> 
                                  </div>
                                  <div class="slick-btn-03">
                                    <span class="btn-prev"><i class="demo-icon icon-left-1"></i></span>
                                    <span class="btn-next"><i class="demo-icon icon-right-1"></i></span>
                                  </div> 
                                </div>                               
                              </li>
                              <br></br>
                             
                             ';
                              }
                               $image_path = $params[1][0];
                              ?>

                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="col-lg-6 col-md-6 col-sm-6 col-12" style="position: relative; right: 1px;">
                                                                    <div itemprop="offers" itemscope itemtype="http://schema.org/Offer">

                                                                        <div id="product-info" class="product-info">
                                                                            <div class="product-info-inner">







                                                                                <?php
                                                                                echo '
                       <div class="headname" style="display: inline-block" >
                        <h1 itemprop="name" content="'.$params[0]->name.'" class="page-heading">'.$params[0]->name.'</h1>
                        </div>

                        ';
                                                                                ?>

                                <?php
                                if($params[0]->status=="1"){

                                    $pr_status = "Deactivate";
                                    $colr = "#be3b42";
                                }
                                if($params[0]->status=="0"){
                                    $pr_status = "Activate";
                                    $colr = "#478fdd";
                                }

                                $approved = $params[0]->permission;


                                                                                    if($approved==0){
                                                                                    echo '<span class="headname" style="display: inline-block"><button  class="btn btn-1" type="button" style="margin-bottom: 20px;margin-left: 100px; background-color: '.$colr.'" disabled>'.$pr_status.'</button></span><br>
                                                                                            <p>Product still not approved</p> ';
                                                                                    }
                                                                                    else {
                                                                                    echo '<span class="headname" style="display: inline-block"><button  class="btn btn-1" type="button" id="activate_id" style="margin-bottom: 20px;margin-left: 100px;background-color: '.$colr.'" >' . $pr_status . '</button></span>';
                                                                                    }
                                                                                    $pr_id = $params[0]->id;
                                                                                    ?>


                                                                                <script>

                                                                                    var activateButton = document.getElementById("activate_id");
                                                                                    activateButton.onclick = function() {





                                                                                        var id = "<?php echo $pr_id?>";
                                                                                        if(activateButton.innerHTML==="Activate"){
                                                                                            var arry1 = [id,"1"];
                                                                                            var data1 = JSON.stringify( arry1 );
                                                                                            $.ajax({
                                                                                                url:"<?=PROOT?>Home/changeActiveStatus",
                                                                                                type: "POST",
                                                                                                data:{'new': data1},
                                                                                                success: function(){
                                                                                                    // alert("Successfully Activated");
                                                                                                    // var array_new=JSON.parse(data);
                                                                                                }
                                                                                            });
                                                                                            activateButton.innerHTML = "Deactivate";
                                                                                            activateButton.style.backgroundColor = "#be3b42";

                                                                                        }
                                                                                        else {
                                                                                            var arry2 = [id,"0"];
                                                                                            var data2 = JSON.stringify( arry2 );
                                                                                            $.ajax({
                                                                                                url:"<?=PROOT?>Home/changeActiveStatus",
                                                                                                type: "POST",
                                                                                                data:{'new' : data2},
                                                                                                success: function(){
                                                                                                    // alert("Successfully Deactivated");
                                                                                                    // var array_new=JSON.parse(data);
                                                                                                }
                                                                                            });
                                                                                            activateButton.innerHTML = "Activate";
                                                                                            activateButton.style.backgroundColor = "#478fdd"
                                                                                        }
                                                                                    }
                                                                                    </script>




                                                                                <div id="purchase-1588808155195" class="product-price">
                                                                                    <div class="detail-price" itemprop="price" content="0.0">

                                                                                        <?php echo '
                              <span class="price-sale"><span class=money>$ '.$params[0]->price.'</span></span>
                              
                            ';?>
                                                                                        <!--                             <del class="price-compare"> <span class=money>$ '.$params[0]->price.'</span></del>
                                                                                         -->                          </div>
                                                                                </div>


                                                                                <link itemprop="availability" href="http://schema.org/InStock" />


                                                                                <?php echo '
                          
                            <div class="short-description"><ul>
                              '.$params[0]->description.'
                            </ul></div>
                          
                        ';?>


                                                                                <div class="btns-wrapper">

                                                                                </div>


                                                                                <meta itemprop="priceCurrency" content="USD" />

                                                                                <div class="group-cw clearfix">










                                                                                        <div id="product-action"  class="options">

                                                                                            <style>
                                                                                                label[for="product-select-option-1"] { display: none; }
                                                                                                #product-select-option-1 { display: none; }
                                                                                                #product-select-option-1 + .custom-style-select-box { display: none !important; }
                                                                                            </style>



                                                                                            <div class="swatch color clearfix" data-option-index="1">
                                                                                                <div class="header">Color</div>

                                                                                                <?php
                                                                                                foreach($params['colors'] as $key=>$color){
                                                                                                    echo '

                                        <div data-value="'.$color.'" class="swatch-element">
                                          
                                            <div class="tooltip" style="">'.$color.'</div>
                                            <input id="swatch-1-'.$color.'" type="radio" name="color" value="'.$color.'" style="display:none; cursor:pointer;"/>
                                            <label for="swatch-1-'.$color.'" style="background-color: '.$color.' ; cursor:pointer; "></label>
                                          
                                        </div>
                                      ';
                                                                                                }
                                                                                                ?>

                                                                                            </div>

                                                                                            <style>
                                                                                                label[for="product-select-option-0"] { display: none; }
                                                                                                #product-select-option-0 { display: none; }
                                                                                                #product-select-option-0 + .custom-style-select-box { display: none !important; }
                                                                                            </style>



                                                                                            <div class="measurements-main" data-option-index="0">
                                                                                                <div class="header" style="float: none;">Size</div>

                                                                                                <?php
                                                                                                foreach($params['measurements'] as $key=>$measurement){
                                                                                                    echo '

                                        <div class="spr-form-for-measurements" style="padding-bottom:10px;" >
                                          <label class="spr-m-form-label" for="" style="padding-left:40px;">'.$measurement.'</label>
                                          
                                        </div>
                                      ';
                                                                                                }
                                                                                                ?>

                                                                                            </div>
                                                                                        </div>

                                                                                        <div class="bg-danger" ><?=$this->displayErrors ?></div>

                                                                                        <div class="qty-add-cart">

                                                                                            <div class="edit_remove" style="display: inline-block;">
                                                                                                <?php
                                                                                                if($approved==0){
                                                                                                    echo '<a href="'.PROOT.'Home/editProduct/'.$params[0]->id.'" ><button " type="button"  class="btn btn-1" disabled>Edit</button></a>';
                                                                                                }
                                                                                                else {
                                                                                                    echo '<a href="'.PROOT.'Home/editProduct/'.$params[0]->id.'" ><button " type="button"  class="btn btn-1" >Edit</button></a>';
                                                                                                }
                                                                                                ?>

                                                                                            </div>

                                                                                            <div class="edit_remove" style="display: inline-block;">
                                                                                                <?php
                                                                                                if($approved==0) {
                                                                                                    echo '<button id="deleteBtn" style="margin-left: 20px" class="btn btn-1" disabled>Remove</button>';
                                                                                                }
                                                                                                else{
                                                                                                    echo '<button id="deleteBtn" style="margin-left: 20px" class="btn btn-1" >Remove</button>';

                                                                                                }

                                                                                                ?>

                                                                                                <!-- The Modal -->
                                                                                                <div id="deleteModal" class="modal">

                                                                                                    <!-- Modal content -->
                                                                                                    <div class="modal-content" style="width: 20%">
                                                                                                        <div class="modal-header">
                                                                                                            <h4 style="float: left;">DELETE PRODUCT</h4>
                                                                                                            <span class="close_x" data-dismiss="modal" style="float: right;cursor: pointer;font-size:20px;">&times;</span>
                                                                                                        </div>


                                                                                                        <form method="post" action="<?=PROOT?>Home/removeProduct/<?php echo $params[0]->id?>">
                                                                                                            <div class="modal-body">
                                                                                                                <div class="yes-no-selector">
                                                                                                                    <label class="spr-form-label" style="font-weight: 600">Do you want to delete this product ?</label>
                                                                                                                    <div class="spr-form-input">
                                                                                                                        <input type="submit" class="button button-primary btn-primary delete_modal" value="YES" style="display:inline-block; background-color: white; outline: none; cursor: pointer; border-color: black; border-radius: 4px; border:1px solid black; color:black; margin-left:50px; padding:5px 10px;">
                                                                                                                        <input type="" class="close_d button button-primary btn-primary delete_modal" data-dismiss="modal" value="NO" style="display:inline-block; background-color: white; outline: none; cursor: pointer; border-color: black; border-radius: 4px; border:1px solid black; color:black; margin-left:30px; padding:5px 10px; width:42px;">


                                                                                                                    </div>
                                                                                                                </div>

                                                                                                            </div>
<!--                                                                                                            <div class="modal-footer">-->
<!--                                                                                                                --><?php //echo'<input type="hidden" name="product_id" value='.$params[0]->id.'>';?>
                                              </div>


                                                                                                    </div>

                                                                                                </div>

                                                                                                <script>
                                                                                                    // Get the modal
                                                                                                    var modal_d = document.getElementById('deleteModal');

                                                                                                    // Get the button that opens the modal
                                                                                                    var btn_d = document.getElementById("deleteBtn");

                                                                                                    // Get the <span> element that closes the modal
                                                                                                    var span_x = document.getElementsByClassName("close_x")[0];
                                                                                                    var span_d = document.getElementsByClassName("close_d")[0];

                                                                                                    // When the user clicks the button, open the modal
                                                                                                    btn_d.onclick = function() {
                                                                                                        modal_d.style.display = "block";
                                                                                                    }

                                                                                                    // When the user clicks on <span> (x), close the modal
                                                                                                    span_x.onclick = function() {
                                                                                                        modal_d.style.display = "none";
                                                                                                    }
                                                                                                    span_d.onclick = function() {
                                                                                                        modal_d.style.display = "none";
                                                                                                    }

                                                                                                    // When the user clicks anywhere outside of the modal, close it
                                                                                                    window.onclick = function(event) {
                                                                                                        if (event.target == modal) {
                                                                                                            modal_d.style.display = "none";
                                                                                                        }
                                                                                                    }
                                                                                                </script>

                                                                                            </div>

                                                                                        </div>

                                                                                    </form>



                                                                                </div>

                                                                            </div>

                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-meta-sharing">
                                            <div class="row">

                                                <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                                    <ul class="product-sku-collection">


                                                        <li class="product-code" style="display:none;">
                                                            <span>SKU:</span>
                                                            <span id="sku"></span>
                                                        </li>



                                                    </ul>
                                                </div>


                                                <div class="col-lg-6 col-md-6 col-sm-6 col-12">

                                                </div>
                                            </div>



                                        </div>

                                    </div>

                                </div>
                        </div>
                    </div>
                </div>











<?= $this->end(); ?>