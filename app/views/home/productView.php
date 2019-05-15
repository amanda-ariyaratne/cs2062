
<?= $this->setSiteTitle($params[0]->name) ?>


<?= $this->start('head'); ?>

<link href="<?=PROOT?>assets/css/productView.css" rel="stylesheet" type="text/css" media="all" />
<script src="<?=PROOT?>assets/js/productView.js"></script>
<!-- <script type="text/javascript" src="<?=PROOT?>assets/js/productView.js"></script>
 --><!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
 --><!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
 -->	<style id="shopify-dynamic-checkout">
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


<!-- <body class="templateProduct category-mode-false cata-grid-3 lazy-loading-img"> -->

  <div class="boxed-wrapper" id="changing-image">
    
    <div class="new-loading"></div>
    <div class="cart-sb">
<!--       <form action="/cart" method="post">
        <div class="cart-sb-title">
          <span class="c-title">Your Cart</span>
          <span class="c-close">
            <i class="demo-icon icon-close" aria-hidden="true"></i>
          </span>
        </div>
    
        <div id="cart-info" class="shipping-true">
          <div id="cart-content" class="cart-content">
            <div class="cart-loading"></div>
          </div>
        </div>
      </form> -->
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
                            echo '<input type="hidden" name="image" value='.$params[1][0].'>';
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

                        <h1 itemprop="name" content="'.$params[0]->name.'" class="page-heading">'.$params[0]->name.'</h1>

                        ';
                        ?>
                          <div class="rating-links">
                            <span class="apr-badge" id="spr_badge_1588808155195" data-rating="0.0">
                              <span class="spr-starrating spr-badge-starrating">
                                <!-- <i class="spr-icon spr-icon-star-empty" style="color: #f7d2da"></i>
                                <i class="spr-icon spr-icon-star-empty" style="color: #f7d2da"></i>
                                <i class="spr-icon spr-icon-star-empty" style="color: #f7d2da"></i>
                                <i class="spr-icon spr-icon-star-empty" style="color: #f7d2da"></i>
                                <i class="spr-icon spr-icon-star-empty" style="color: #f7d2da"></i> -->
                                <?php
                                  for ($i=0;$i<$params[0]->starRating;$i++) {
                                    echo '
                                      <span class="fa fa-star checked" style="display:inline-block; color:gold;"></span>
                                    ';
                                  }
                                ?>
                              </span>
                            </span>
                            <div class="shopify-product-reviews-badge" data-id="1588808155195"></div>
                            <a href="#tab_review">Add Your Review</a>
                          </div>
                        
                        
                        <div id="purchase-1588808155195" class="product-price">
                          <div class="detail-price" itemprop="price" content="0.0">
                            
                            <?php echo '
                              <span class="price-sale"><span class=money>$ '.$params[0]->sale_price.'</span></span>
                              <del class="price-compare"> <span class=money>$ '.$params[0]->price.'</span></del>
                            ';?>

                          </div>
                        </div>   
                        
                        
                          <link itemprop="availability" href="http://schema.org/InStock" />
                        
                          
                          <?php echo '
                          
                            <div class="short-description"><ul>
                              '.$params[0]->description.'
                            </ul></div>
                          
                        ';?>

                        
                          <div class="btns-wrapper">
                            
                              <!-- <a href="javascript:void(0)" class="add-to-compare add-product-compare" data-handle-product="donkix-product-sample" title="Compare">Compare</a> -->
                            

                            	
                              <a href="javascript:void(0)" class="add-to-wishlist add-product-wishlist" data-handle-product="donkix-product-sample" title="Add to wishlist">Add to wishlist</a>
                          </div>
                        

                        <meta itemprop="priceCurrency" content="USD" /> 

                          <div class="group-cw clearfix">
                            



















                            <form method="post" action="<?=PROOT?>CartController/addToCart" id="product_form"  class="product-form product-action variants" >
<!--                               <input type="hidden" name="form_type" value="product" />
                              <input type="hidden" name="utf8" value="✓" /> -->

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
                                          <input placeholder=" # of inches"  class="spr-form-input spr-form-input-text"  style="position:absolute; right:250px; height:25px; width:100px; padding:5px 10px;" type="text" name="measuremnt'.$key.'" aria-required="true" />
                                          
                                        </div>
                                      ';
                                    }
                                  ?> 
                                
                              </div>
                            </div>

                            <div class="bg-danger" ><?=$this->displayErrors ?></div>

                            <div class="qty-add-cart">
                              <div class="quantity-product">
                                <div class="quantity">
                                  <script type="text/javascript">
                                    function incrementValue(){
                                      var value = parseInt(document.getElementById('quantity').value, 10);
                                      value = isNaN(value) ? 0 : value;
                                      value++;
                                      document.getElementById('quantity').value = value;
                                    }
                                    function decreaseValue() {
                                      var value = parseInt(document.getElementById('quantity').value, 10);
                                      value = isNaN(value) ? 0 : value;
                                      value < 2 ? value = 2 : '';
                                      value--;
                                      document.getElementById('quantity').value = value;
                                    }
                                  </script>
                                  <input type="number" id="quantity" class="item-quantity" name="quantity" value="1" />
                                  <span class="qty-inner qty-wrapper">

                                    <span class="qty-up" title="Increase" data-src="#quantity" onclick="incrementValue()">
                                      <i class="demo-icon icon-plus"></i>
                                    </span>

                                    <span class="qty-down" title="Decrease" data-src="#quantity" onclick="decreaseValue()">
                                      <i class="demo-icon icon-minus"></i>
                                    </span>

                                  </span>
                                </div>
                              </div>

                              <div class="action-button">
                                <button id="add-to-cart" type="submit" value="Submit" class="add-to-cart btn btn-1" >Add to cart</button> 
                              </div>


                              <input type='hidden' name='measurements' value="<?php echo htmlentities(serialize($params['measurements'])); ?>" />
                              <?php echo'<input type="hidden" name="product_id" value='.$params[0]->id.'>';?>
                                <?php echo'<input type="hidden" name="price" value='.$params[0]->sale_price.'>';?>
                                <?php echo'<input type="hidden" name="name" value='.$params[0]->name.'>';?>







                                <!--                           <div class="pre-order hide">
                                                            <a href="#pre-order-popup" class="btn-pre-order btn btn-1">Pre-order</a>
                                                          </div>

                                                          <div class="pre-order-success hide">Successful pre-order.Thanks for contacting us!</div>



                                                          <div data-shopify="payment-button" class="shopify-payment-button">
                                                            <button class="shopify-payment-button__button shopify-payment-button__button--unbranded shopify-payment-button__button--hidden" disabled="disabled" aria-hidden="true"> </button>
                                                            <button class="shopify-payment-button__more-options shopify-payment-button__button--hidden" disabled="disabled" aria-hidden="true"> </button>
                                                          </div> -->
                              
                              
                            </div>
                          
                          </form>  
                                         




























                                 </div>             


                                      <div class="people-in-cart">
                                          <div class="img-user">
                                            <img src="<?=PROOT?>assets/images/icon-cart.png" alt="Image" />
                                          </div>
                                          <div class="people-block-text"></div>
                                      </div>
                                            

                                              
                                              
                    <!--                             <ul class="shipping-time" data-deliverytime="2" data-deadline="16">
                                                  
                                                  <li class="delivery-time"></li>
                                                  
                                                  <li class="deadline">
                                                    <span class="text">Order within</span>
                                                    <div class="countdown_deadline"></div>
                                                  </li>  
                                                  
                                                </ul> -->
                                              
                                   
                                            </div>

                                          
                                          
                                          	
                                            <div id="pre-order-popup" style="display: none;">
<!--                                               <form method="post" action="/contact#contact_form" id="contact_form" accept-charset="UTF-8" class="contact-form"><input type="hidden" name="form_type" value="contact" /><input type="hidden" name="utf8" value="✓" />

                                              <span class="alert-pre-order"></span>

                                              <div id="pre-order-form">

                                                <div class="form-group">
                                                  <label for="name">Your Name</label>
                                                  <input type="text" id="name" class="form-control" value="" name="contact[name]">
                                                </div>

                                                <div class="form-group">
                                                  <label for="name">Your Email</label>
                                                  <input required="" type="email" id="email" class="form-control" value="" name="contact[email]">
                                                </div>

                                                <div class="form-group">
                                                  <label for="name">Phone Number</label>
                                                  <input type="text" id="phone" class="form-control" value="" name="contact[phone]">
                                                </div>

                                                <div class="form-group">
                                                  <label for="name">Product Name</label>
                                                  <input id="product_name" class="form-control" value="Men's Baseball ¾ T-Shirt" name="contact[product_name]" />
                                                </div>

                                                <div class="form-group">
                                                  <label for="name">Message</label>
                                                  <textarea required="" id="message" class="form-control" name="contact[body]"></textarea>
                                                </div>

                                                <div class="form-actions">
                                                  <button type="submit" class="btn btn-1">Pre-order</button>
                                                </div>
                                              </div>

                                              </form> -->
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

                        
                          <li class="product-vendor">
                            <span>Sold By:</span>
                            <a href="/collections/vendors?q=Armani" title="Armani"><?=$params[0]->vendor->first_name?></a>
                          </li>
                        

                        
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

          
            




            <div class="product-simple-tab" style="width: 1200px;height: 450px;">
              <div role="tabpanel">
                <ul class="nav nav-tabs" role="tablist">
                  <li class="nav-item" id="tab_review">
                    <a class="nav-link" href="#tab-review" aria-controls="tab-review" role="tab" data-toggle="tab" style="font-size: 25px;">Reviews</a>
                  </li>
                </ul>

                <div class="tab-content" style="height: 300px;">
                  <div class="FixedHeightContainer" style="height: 100px ">
                    <ul style="height: 300px; overflow: scroll;list-style: none;">
                      <style type="text/css">
                        .inline-user-date{
                          display: inline-block;
                        }
                        .spr-review-content h6{
                          font-size: 15px;
                          margin: 0px;
                        }
                      </style>

                      <?php
                        foreach($params[2] as $review){
                          echo '<li>
                              <div class="spr-review">
                                <div class="spr-review-header" style="position:relative;">
                                  <span style="font-size: 15px; color: black; font-weight:600;padding-right;500px;"><i class="demo-icon icon-user inline-user-date"></i>
                                    '.$review->user_fname.'
                                  </span>
                                  <span style="font-size: 15px; color: black; font-weight:400; padding-right:10px; position:absolute; top:0; right:20px;"><i class="inline-user-date"></i>
                                    '.$review->created_at.'
                                  </span>
                                </div>

                                <div class="spr-review-content">
                                  <h6 style="padding-left: 30px;">'.$review->content.'</h6>
                                </div>

                                <div style="padding-left: 30px;">
                                  ';for ($i=0;$i<$review->rate;$i++) {
                                    echo '
                                      <span class="fa fa-star checked" style="display:inline-block; color:gold;"></span>
                                    ';
                                  }
                                  echo'
                                </div>

                                <div style="padding-left: 30px;">
                                  <div ';
                                    if ($review->yes_no == "Yes") {
                                      echo '<p style="border-radius:50px; text-align:center; color:white; width:50px; height:20px; background-color:#55fc69; padding:4px; font-size:8px">recieved</i></p>';
                                    } else {
                                      echo '<p style="border-radius:50px; text-align:center; color:white; width:50px; height:20px; background-color:#f42c2c; padding:3px 0px; font-size:8px">not recieved</p>';
                                    }
                                    echo '
                                    <br></br>
                                  </div>
                                </div>
                              </div>
                            </li>
                            <br></br>
                          ';
                        }
                      ?>
                    </ul>

                  </div>
                </div>
                <div class="tab-footer" style="padding: 20px">
                  <button id="myBtn" style="background-color: #c1939e; color: #fff; border:1px solid #c1939e; padding: 5px 25px; cursor: pointer; outline: none; border-radius: 4px;">Add a Review</button>

                  <!-- The Modal -->
                  <div id="myModal" class="modal">

                    <!-- Modal content -->
                    <div class="modal-content" style="width: 20%">
                      <div class="modal-header">
                        <h4 style="float: left;">Write a review</h4>
                        <span class="close" data-dismiss="modal" style="float: right;">&times;</span>
                        
                      </div>


                      <form method="post" action="<?=PROOT?>ReviewAndRate/addReview">
                        <div class="modal-body">    
<!--                           <div class="spr-form-contact-name">
                            <label class="spr-form-label">Username</label>
                            <input type="text" name="username" class="spr-form-input spr-form-input-text" value placeholder="Enter your username">
                          </div>  -->   

                          <div class="spr-form-review-body">
                            <label class="spr-form-label" style="font-weight: 600">Body of Review</label>
                            <div class="spr-form-input">
                              <textarea name="body" rows="7" style="width: 95%" class="spr-form-input spr-form-input-textarea" placeholder="Write your comments here"></textarea>
                            </div>
                          </div>

                          <div class="spr-form-review-ratings">
                            <style type="text/css">
                              .rating{
/*                                transform:rotate(180deg);
*/                                display: flex;
                              }
                              .rating input{
                                display: none;
                              }
                              .rating label{
                                display: block;
                                cursor: pointer;
                                width: 50px;
                                /*background:#ccc;*/
                              }
                              .rating label::before{
                                content: '\f005';
                                font-family: fontAwesome;
                                position: relative;
                                display: block;
                                color: #f7d2da;
                              }
                              .rating label::after{
                                content: '\f005';
                                font-family: fontAwesome;
                                position: absolute;
                                display: block;
                                color: #7f4956;
                                top: 260px;
                                opacity: 0;
                                transition: .5s;
                                text-shadow: 0 2px 5px rgba(0,0,0,.5);
                              }
                              .rating label:hover:after,
                              .rating label:hover ~ label:after,
                              .rating input:checked ~ label:after{
                                opacity: 1;
                              }
                            </style>
                            <label class="spr-form-label" for="review[rating]">Rating</label>
                            <div class="rating">
                              <input type="radio" name="star" id="star1" value="5"><label for="star1"></label>
                              <input type="radio" name="star" id="star2" value="4"><label for="star2"></label>
                              <input type="radio" name="star" id="star3" value="3"><label for="star3"></label>
                              <input type="radio" name="star" id="star4" value="2"><label for="star4"></label>
                              <input type="radio" name="star" id="star5" value="1"><label for="star5"></label>
                            </div>
                          </div>

                          <div class="yes-no-selector">
                            <label class="spr-form-label" style="font-weight: 600">Did the product recived before deadline?</label>
                            <div class="spr-form-input">
                              <input type="radio" name="yes-no" checked value="Yes">Yes</input>
                              <input type="radio" name="yes-no" value="No">No</input>
                            </div>
                          </div>

                        </div>
                        <div class="modal-footer">
                          <input type="submit" class="button button-primary btn-primary" value="Submit" style="background-color: #c1939e; outline: none; cursor: pointer; border-color: #c1939e; border-radius: 4px; border:1px solid #c1939e;">
                          <?php echo'<input type="hidden" name="product_id" value='.$params[0]->id.'>';?> 
                        </div>
                      </form>


                    </div>

                  </div>

                  <script>
                  // Get the modal
                  var modal = document.getElementById('myModal');

                  // Get the button that opens the modal
                  var btn = document.getElementById("myBtn");

                  // Get the <span> element that closes the modal
                  var span = document.getElementsByClassName("close")[0];

                  // When the user clicks the button, open the modal 
                  btn.onclick = function() {
                    modal.style.display = "block";
                  }

                  // When the user clicks on <span> (x), close the modal
                  span.onclick = function() {
                    modal.style.display = "none";
                  }

                  // When the user clicks anywhere outside of the modal, close it
                  window.onclick = function(event) {
                    if (event.target == modal) {
                      modal.style.display = "none";
                    }
                  }
                  </script>
                </div>

                

              </div>
            </div>







          
            <div class="related-product">
              <div class="title-wrapper" style="width: 1200px;">
                <h3>More Products by <?=$params[0]->vendor->first_name?></h3>
              </div>
              <div class="related-items"></div>
            
              <div class="related-items owl-carousel owl-theme owl-loaded">
              <div class="owl-stage-outer">


                <div class="container">

                  

                  <div class="owl-stage" style="width: 1200px; transform: translate3d(0px,0px,0px); transition: all 0s ease 0s;">



                    <?php
                      foreach ($params[3] as $product) {
                        echo'
                          <div class="owl-item active" style="width: 270px; margin-right: 30px;">
                            <div class="product-grid-item">
                              <div class="product-wrapper effect-overlay">

                                <div class="product-head">
                                  <div class="product-image">

                                    <div class="featured-img">
                                      <a href="/">
                                        <img class="featured-image front" style="height:200px;" src="'.PROOT.'assets/images/'.$product['path'].'" alt="'.$product['name'].'"></img>
                                      </a>
                                    </div>

                                    <div class="product-button">
                                      <div data-target="#quick-shop-popup" class="quick_shop" data-handle="tshirt-1" data-toggle="modal" title="Quick View">
                                        <i class="demo-icon icon-search"></i>
                                        " quick view"
                                      </div>
                                      <div class="product-wishlist">
                                        <a href="/" class="add-to-wishlist add-product-wishlist" data-handle-product="tshirt-1" title="add to wishlist">
                                          <i class="demo-icon icon-heart"></i>
                                          " Add to wishlist"
                                        </a>
                                      </div>
                                    </div>

                                    <div class="wrapper-countdown">
                                      <div class="countdown_1588807401531"></div>
                                    </div>
                                  </div>
                                </div>
                                
                                <div class="product-content">
                                  <div class="pc-inner">

                                    <div class="product-group-vendor-name">
                                      <h5 class="product-name">
                                        <a href="/">'.$product['name'].'</a>
                                      </h5>
                                    </div>

                                    <div class="price-cart-wrapper">
                                      <div class="product-price">
                                        <span class="price-compare">
                                          <span class="money" data-currency-lkr="$ '.$product['price'].'" data-currency="LKR">$ '.$product['price'].'</span>
                                        </span>
                                        <span class="price-sale">
                                          <span class="money" data-currency-lkr="$ '.$product['sale_price'].'" data-currency="LKR">$ '.$product['sale_price'].'</span>
                                        </span>
                                      </div>

                                      <div class="product-add-cart">
<!--                                         <form action="/cart/add" method="post" enctype="multipart/form-data">
                                          <a href="/" class="btn-add-cart add-to-cart" title="Add to cart">
                                            <span class="demo-icon icon-basket"></span>
                                          </a>

                                          <select class="d-none" name="id">
                                            <option value="14880160612411"> Default Title</option>
                                          </select>
                                        </form> -->
                                      </div>
                                    </div>

                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        ';
                      }
                    ?>


                    
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

              </div>
  




<?= $this->end(); ?>