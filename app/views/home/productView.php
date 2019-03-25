
<?= $this->setSiteTitle($params[0]->name) ?>


<?= $this->start('head'); ?>


<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> -->
	<style id="shopify-dynamic-checkout">.shopify-payment-button__button--hidden {
	  visibility: hidden;
	}

	.shopify-payment-button__button {
	  border-radius: 4px;
	  border: none;
	  box-shadow: 0 0 0 0 transparent;
	  color: white;
	  cursor: pointer;
	  display: block;
	  font-size: 1em;
	  font-weight: 500;
	  line-height: 1;
	  text-align: center;
	  width: 100%;
	  transition: background 0.2s ease-in-out;
	}

	.shopify-payment-button__button[disabled] {
	  opacity: 0.6;
	  cursor: default;
	}

	.shopify-payment-button__button--unbranded {
	  background-color: #1990c6;
	  padding: 1em 2em;
	}

	.shopify-payment-button__button--unbranded:hover:not([disabled]) {
	  background-color: #136f99;
	}

	.shopify-payment-button__more-options {
	  background: transparent;
	  border: 0 none;
	  cursor: pointer;
	  display: block;
	  font-size: 1em;
	  margin-top: 1em;
	  text-align: center;
	  width: 100%;
	}

	.shopify-payment-button__more-options:hover:not([disabled]) {
	  text-decoration: underline;
	}

	.shopify-payment-button__more-options[disabled] {
	  opacity: 0.6;
	  cursor: default;
	}

	.shopify-payment-button__button--branded {
	  display: flex;
	  flex-direction: column;
	  min-height: 44px;
	  position: relative;
	  z-index: 1;
	}

	.shopify-payment-button__button--branded .shopify-cleanslate {
	  flex: 1 !important;
	  display: flex !important;
	  flex-direction: column !important;
	}


	.far.fa-star{color:#f7d2da}
	.far.fa-star::before{color:#f7d2da;}

  .owl-item{
    display: inline-block;
  }













.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 0px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
  position: relative;
  background-color: #fefefe;
  margin: auto;
  padding: 0;
  border: 1px solid #888;
  width: 15%;
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
  -webkit-animation-name: animatetop;
  -webkit-animation-duration: 0.4s;
  animation-name: animatetop;
  animation-duration: 0.4s
}

/* Add Animation */
@-webkit-keyframes animatetop {
  from {top:-300px; opacity:0} 
  to {top:0; opacity:1}
}

@keyframes animatetop {
  from {top:-300px; opacity:0}
  to {top:0; opacity:1}
}

/* The Close Button */
.close {
  color: white;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
}

.modal-header {
  padding: 2px 16px;
  background-color: #c1939e;
  color: white;
}

.modal-body {padding: 2px 16px;}

.modal-footer {
  padding: 2px 16px;
  background-color: #fff;
  color: white;
}





.slide-container{
  width: 400px;
  height: 400px;
  margin-left: auto;
  margin-right: auto;
  overflow: hidden;
  text-align: center;
}

.image-container{
  width: 2400px;
  height: 600px;
  position: relative;
  transition:left 2s;
  -webkit-transition: left 2s;
  -moz-transition: left 2s;
  -o-transition: left 2s;
}

.slider-image{
  float:left;
  margin: 0px;
  padding:0px;
}


	</style>


<!--   <style type="text/css">

    .boxed-wrapper{
      position: absolute;
      left: 0;
      top: 0;
      width: 100%;
      animation: animateee 16s ease-in-out infinite;
    }

    @keyframes animateee{
      0%,100%{
        background-image: url(<?=PROOT?>assets/images/back-1.jpg);
      }
      20%{
        background-image: url(<?=PROOT?>assets/images/back-2.jpg);
      }
      40%{
        background-image: url(<?=PROOT?>assets/images/back-3.jpg);
      }
      60%{
        background-image: url(<?=PROOT?>assets/images/back-4.jpg);
      }
      80%{
        background-image: url(<?=PROOT?>assets/images/back-5.jpg);
      }
    }
  </style> -->

<?= $this->end(); ?>






<?= $this->start('body'); ?>


<!-- <body class="templateProduct category-mode-false cata-grid-3 lazy-loading-img"> -->

  <div class="boxed-wrapper" id="changing-image">
    
    <div class="new-loading"></div>
    <div class="cart-sb">
      <form action="/cart" method="post">
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
      </form>
    </div>
    
    <div id="page-body" class="breadcrumb-color">
      
      <div id="shopify-section-header" class="shopify-section">
        <header class="header-content" data-stick="true" data-stickymobile="false">
  
  

<!--  Begin Menu Mobile -->

      
      
        <div id="body-content" class="layout-boxed">
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
      
        

        
        
        <div class="col-lg-9 col-md-12">





          <div id="col-main" class="page-product layout-normal">

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
                                        <img class="image-zoom " src="'.PROOT.'assets/images/'.$image->image_path.'" alt="'.$params[0]->name.'">
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
                          ?>         

                      </div>
                    </div>
                  </div>

                  <div class="col-lg-6 col-md-6 col-sm-6 col-12">
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
                                <i class="spr-icon spr-icon-star-empty" style="color: #f7d2da"></i>
                                <i class="spr-icon spr-icon-star-empty" style="color: #f7d2da"></i>
                                <i class="spr-icon spr-icon-star-empty" style="color: #f7d2da"></i>
                                <i class="spr-icon spr-icon-star-empty" style="color: #f7d2da"></i>
                                <i class="spr-icon spr-icon-star-empty" style="color: #f7d2da"></i>
                               <!--  <i class="far fa-star"></i>
                                <i class="far fa-star"></i>
                                <i class="far fa-star"></i>
                                <i class="far fa-star"></i> -->
                              </span>
                            </span>
                            <div class="shopify-product-reviews-badge" data-id="1588808155195"></div>
                            <a href="#tab_review">Add Your Review</a>
                          </div>
                        
                        
                        <div id="purchase-1588808155195" class="product-price">
                          <div class="detail-price" itemprop="price" content="0.0">
                            
                            <?php echo '
                              <span class="price-sale"><span class=money>Rs. '.$params[0]->sale_price.'</span></span>
                              <del class="price-compare"> <span class=money>Rs. '.$params[0]->price.'</span></del>
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
                            
                            <form method="post" action="/cart/add" id="product_form_1588808155195" accept-charset="UTF-8" class="product-form product-action variants" enctype="multipart/form-data">
                              <input type="hidden" name="form_type" value="product" />
                              <input type="hidden" name="utf8" value="✓" />

                              <div id="product-action-1588808155195"  class="options">

                                 
                                
                                

                                

                                <div class="variants-wrapper show-swatches-color show-swatches-size clearfix"> 
                                  <select id="product-select-1588808155195" name="id" style="display:none;">
                                    

                                      
                                        <option  selected="selected"  value="14880170180667">M / Red / 1 Year</option>

                                      

                                    

                                      
                                        <option  value="14880170213435">L / Red / 2 Years</option>

                                      

                                    
                                  </select>
                                </div>


                          
                              <style>
                                label[for="product-select-option-1"] { display: none; }
                                #product-select-option-1 { display: none; }
                                #product-select-option-1 + .custom-style-select-box { display: none !important; }
                              </style>
                          

                        <div class="swatch color clearfix" data-option-index="1">
                          <div class="header">Color</div>
                          

                              <div data-value="Red" class="swatch-element color red available">
                                
                                  <div class="tooltip">Blue</div>
                                  <input id="swatch-1-red" type="radio" name="option-1" value="Red" />
                                  <label for="swatch-1-red" style="background-image: url(<?=PROOT?>assets/images/product-shirt-1.png)"></label>
                                
                              </div>
                            
                            </div>

                      

                          
                          <style>
                            label[for="product-select-option-0"] { display: none; }
                            #product-select-option-0 { display: none; }
                            #product-select-option-0 + .custom-style-select-box { display: none !important; }
                          </style>
                          

                      
                        <div class="swatch size clearfix" data-option-index="0">
                          <div class="header">Size</div>

                              <div data-value="XS" class="swatch-element xs available">
                                <input id="swatch-0-xs" type="radio" name="option-0" value="XS" />
                                <label for="swatch-0-s">
                                    XS
                                    <!-- <img class="crossed-out" src="//cdn.shopify.com/s/files/1/0102/1155/7435/t/10/assets/soldout.png?11279787887484496450" alt="" /> -->
                                  </label>
                              </div>   
                          
                              <div data-value="S" class="swatch-element s available">
                                <input id="swatch-0-s" type="radio" name="option-0" value="S" />
                                <label for="swatch-0-s">
                                    S
                                    <!-- <img class="crossed-out" src="//cdn.shopify.com/s/files/1/0102/1155/7435/t/10/assets/soldout.png?11279787887484496450" alt="" /> -->
                                  </label>
                              </div>    
                       
                              
                              <div data-value="M" class="swatch-element m available">
                                <input id="swatch-0-m" type="radio" name="option-0" value="M" />
                                <label for="swatch-0-m">
                                    M
                                    <!-- <img class="crossed-out" src="//cdn.shopify.com/s/files/1/0102/1155/7435/t/10/assets/soldout.png?11279787887484496450" alt="" /> -->
                                  </label>
                              </div>
                            
                          
                            
                      <!--         <script>
                                jQuery('.swatch[data-option-index="0"] .m').removeClass('soldout').addClass('available').find(':radio').removeAttr('disabled');
                              </script> -->
                            
                          
                              <div data-value="L" class="swatch-element l available">
                                <input id="swatch-0-l" type="radio" name="option-0" value="L" />
                                <label for="swatch-0-l">
                                    L

                                  </label>
                              </div>
                            

                            
                              <div data-value="XL" class="swatch-element xl available">
                                <input id="swatch-0-xl" type="radio" name="option-0" value="XL" />
                                <label for="swatch-0-xl">
                                    XL
                    <!--                 <img class="crossed-out" src="//cdn.shopify.com/s/files/1/0102/1155/7435/t/10/assets/soldout.png?11279787887484496450" alt="" />
                     -->              </label>
                              </div>   
                          
                        </div>

                      


                                                      

                                                    
                                                  

                                                </div>

                                                <div class="qty-add-cart">
                                                  <div class="quantity-product">
                                                    <div class="quantity">
                                                      <input type="number" id="quantity" class="item-quantity" name="quantity" value="1" />
                                                      <span class="qty-inner qty-wrapper">

                                                        <span class="qty-up" title="Increase" data-src="#quantity">
                                                          <i class="demo-icon icon-plus"></i>
                                                        </span>

                                                        <span class="qty-down" title="Decrease" data-src="#quantity">
                                                          <i class="demo-icon icon-minus"></i>
                                                        </span>

                                                      </span>
                                                    </div>
                                                  </div>

                                                  <div class="action-button">
                                                    <button id="add-to-cart" class="add-to-cart btn btn-1" type="button">Add to cart</button> 
                                                  </div>
                                                  
                                                  
                                                    <div class="pre-order hide">
                                                      <a href="#pre-order-popup" class="btn-pre-order btn btn-1">Pre-order</a>
                                                    </div>
                                                  
                                                    <div class="pre-order-success hide">Successful pre-order.Thanks for contacting us!</div> 
                                                  
                                                  
                                                  
                                                    <div data-shopify="payment-button" class="shopify-payment-button"><button class="shopify-payment-button__button shopify-payment-button__button--unbranded shopify-payment-button__button--hidden" disabled="disabled" aria-hidden="true"> </button><button class="shopify-payment-button__more-options shopify-payment-button__button--hidden" disabled="disabled" aria-hidden="true"> </button></div>
                                                  
                                                  
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
                                              <form method="post" action="/contact#contact_form" id="contact_form" accept-charset="UTF-8" class="contact-form"><input type="hidden" name="form_type" value="contact" /><input type="hidden" name="utf8" value="✓" />

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
              <div class="product-meta-sharing">
                  <div class="row">
                    
                    <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                      <ul class="product-sku-collection">

                        
                          <li class="product-vendor">
                            <span>Sold By:</span>
                            <a href="/collections/vendors?q=Armani" title="Armani"><?=$params[0]->vendor_id?></a>
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
                      </style>

                      <?php
                        foreach($params[2] as $review){
                          echo '<li>
                              <div class="spr-review">
                                <div class="spr-review-header" style="position:relative;">
                                  <span style="font-size: 15px; color: black; font-weight:600;"><i class="demo-icon icon-user inline-user-date"></i>
                                    '.$review->user_fname.'
                                  </span>
                                  <span style="font-size: 15px; color: black; font-weight:400; padding-right:10px; position:absolute; top:0; right:20px;"><i class="inline-user-date"></i>
                                    '.$review->created_at.'
                                  </span>
                                </div>

                                <div class="spr-review-content">
                                  <h6 style="padding-left: 30px;">'.$review->content.'</h6>
                                </div>

                                <div>
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
                <h3>More Products by Armani</h3>
              </div>
              <div class="related-items"></div>
            
              <div class="related-items owl-carousel owl-theme owl-loaded">
              <div class="owl-stage-outer">


                <div class="container">

                  

                  <div class="owl-stage" style="width: 1200px; transform: translate3d(0px,0px,0px); transition: all 0s ease 0s;">





                    <div class="owl-item active" style="width: 270px; margin-right: 30px;">
                      <div class="product-grid-item">
                        <div class="product-wrapper effect-overlay">

                          <div class="product-head">
                            <div class="product-image">

                              <div class="featured-img">
                                <a href="/">
                                  <img class="featured-image front" src="<?=PROOT?>assets/images/product-1.png" alt="tshirt 1"></img>
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
                                  <a href="/">tshirt 1</a>
                                </h5>
                              </div>

                              <div class="price-cart-wrapper">
                                <div class="product-price">
                                  <span class="price-compare">
                                    <span class="money" data-currency-lkr="Rs. 950" data-currency="LKR">rs. 950</span>
                                  </span>
                                  <span class="price-sale">
                                    <span class="money" data-currency-lkr="Rs. 850" data-currency="LKR">Rs. 850</span>
                                  </span>
                                </div>

                                <div class="product-add-cart">
                                  <form action="/cart/add" method="post" enctype="multipart/form-data">
                                    <a href="/" class="btn-add-cart add-to-cart" title="Add to cart">
                                      <span class="demo-icon icon-basket"></span>
                                    </a>

                                    <select class="d-none" name="id">
                                      <option value="14880160612411"> Default Title</option>
                                    </select>
                                  </form>
                                </div>
                              </div>

                            </div>
                          </div>
                        </div>
                      </div>
                    </div>




                    <div class="owl-item active" style="width: 270px; margin-right: 30px;">
                      <div class="product-grid-item">
                        <div class="product-wrapper effect-overlay">

                          <div class="product-head">
                            <div class="product-image">

                              <div class="featured-img">
                                <a href="/">
                                  <img class="featured-image front" src="<?=PROOT?>assets/images/product-2.png" alt="tshirt 2"></img>
                                </a>
                              </div>

                              <div class="product-button">
                                <div data-target="#quick-shop-popup" class="quick_shop" data-handle="tshirt-2" data-toggle="modal" title="Quick View">
                                  <i class="demo-icon icon-search"></i>
                                  " quick view"
                                </div>
                                <div class="product-wishlist">
                                  <a href="/" class="add-to-wishlist add-product-wishlist" data-handle-product="tshirt-2" title="add to wishlist">
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
                                  <a href="/">tshirt 2</a>
                                </h5>
                              </div>

                              <div class="price-cart-wrapper">
                                <div class="product-price">
                                  <span class="price-compare">
                                    <span class="money" data-currency-lkr="Rs. 950" data-currency="LKR">rs. 950</span>
                                  </span>
                                  <span class="price-sale">
                                    <span class="money" data-currency-lkr="Rs. 850" data-currency="LKR">Rs. 850</span>
                                  </span>
                                </div>

                                <div class="product-add-cart">
                                  <form action="/cart/add" method="post" enctype="multipart/form-data">
                                    <a href="/" class="btn-add-cart add-to-cart" title="Add to cart">
                                      <span class="demo-icon icon-basket"></span>
                                    </a>

                                    <select class="d-none" name="id">
                                      <option value="14880160612411"> Default Title</option>
                                    </select>
                                  </form>
                                </div>
                              </div>

                            </div>
                          </div>
                        </div>
                      </div>
                    </div>





                    <div class="owl-item active" style="width: 270px; margin-right: 30px;">
                      <div class="product-grid-item">
                        <div class="product-wrapper effect-overlay">

                          <div class="product-head">
                            <div class="product-image">

                              <div class="featured-img">
                                <a href="/">
                                  <img class="featured-image front" src="<?=PROOT?>assets/images/product-3.png" alt="tshirt 3"></img>
                                </a>
                              </div>

                              <div class="product-button">
                                <div data-target="#quick-shop-popup" class="quick_shop" data-handle="tshirt-3" data-toggle="modal" title="Quick View">
                                  <i class="demo-icon icon-search"></i>
                                  " quick view"
                                </div>
                                <div class="product-wishlist">
                                  <a href="/" class="add-to-wishlist add-product-wishlist" data-handle-product="tshirt-3" title="add to wishlist">
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
                                  <a href="/">tshirt 3</a>
                                </h5>
                              </div>

                              <div class="price-cart-wrapper">
                                <div class="product-price">
                                  <span class="price-compare">
                                    <span class="money" data-currency-lkr="Rs. 950" data-currency="LKR">rs. 950</span>
                                  </span>
                                  <span class="price-sale">
                                    <span class="money" data-currency-lkr="Rs. 850" data-currency="LKR">Rs. 850</span>
                                  </span>
                                </div>

                                <div class="product-add-cart">
                                  <form action="/cart/add" method="post" enctype="multipart/form-data">
                                    <a href="/" class="btn-add-cart add-to-cart" title="Add to cart">
                                      <span class="demo-icon icon-basket"></span>
                                    </a>

                                    <select class="d-none" name="id">
                                      <option value="14880160612411"> Default Title</option>
                                    </select>
                                  </form>
                                </div>
                              </div>

                            </div>
                          </div>
                        </div>
                      </div>
                    </div>





                    <div class="owl-item active" style="width: 270px; margin-right: 30px;">
                      <div class="product-grid-item">
                        <div class="product-wrapper effect-overlay">

                          <div class="product-head">
                            <div class="product-image">

                              <div class="featured-img">
                                <a href="/">
                                  <img class="featured-image front" src="<?=PROOT?>assets/images/product-4.png" alt="tshirt 4"></img>
                                </a>
                              </div>

                              <div class="product-button">
                                <div data-target="#quick-shop-popup" class="quick_shop" data-handle="tshirt-4" data-toggle="modal" title="Quick View">
                                  <i class="demo-icon icon-search"></i>
                                  " quick view"
                                </div>
                                <div class="product-wishlist">
                                  <a href="/" class="add-to-wishlist add-product-wishlist" data-handle-product="tshirt-4" title="add to wishlist">
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
                                  <a href="/">tshirt 4</a>
                                </h5>
                              </div>

                              <div class="price-cart-wrapper">
                                <div class="product-price">
                                  <span class="price-compare">
                                    <span class="money" data-currency-lkr="Rs. 950" data-currency="LKR">rs. 950</span>
                                  </span>
                                  <span class="price-sale">
                                    <span class="money" data-currency-lkr="Rs. 850" data-currency="LKR">Rs. 850</span>
                                  </span>
                                </div>

                                <div class="product-add-cart">
                                  <form action="/cart/add" method="post" enctype="multipart/form-data">
                                    <a href="/" class="btn-add-cart add-to-cart" title="Add to cart">
                                      <span class="demo-icon icon-basket"></span>
                                    </a>

                                    <select class="d-none" name="id">
                                      <option value="14880160612411"> Default Title</option>
                                    </select>
                                  </form>
                                </div>
                              </div>

                            </div>
                          </div>
                        </div>
                      </div>
                    </div>




                    <div class="owl-item active" style="width: 270px; margin-right: 30px;">
                      <div class="product-grid-item">
                        <div class="product-wrapper effect-overlay">

                          <div class="product-head">
                            <div class="product-image">

                              <div class="featured-img">
                                <a href="/">
                                  <img class="featured-image front" src="<?=PROOT?>assets/images/product-5.png" alt="tshirt 5"></img>
                                </a>
                              </div>

                              <div class="product-button">
                                <div data-target="#quick-shop-popup" class="quick_shop" data-handle="tshirt-5" data-toggle="modal" title="Quick View">
                                  <i class="demo-icon icon-search"></i>
                                  " quick view"
                                </div>
                                <div class="product-wishlist">
                                  <a href="/" class="add-to-wishlist add-product-wishlist" data-handle-product="tshirt-5" title="add to wishlist">
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
                                  <a href="/">tshirt 5</a>
                                </h5>
                              </div>

                              <div class="price-cart-wrapper">
                                <div class="product-price">
                                  <span class="price-compare">
                                    <span class="money" data-currency-lkr="Rs. 950" data-currency="LKR">rs. 950</span>
                                  </span>
                                  <span class="price-sale">
                                    <span class="money" data-currency-lkr="Rs. 850" data-currency="LKR">Rs. 850</span>
                                  </span>
                                </div>

                                <div class="product-add-cart">
                                  <form action="/cart/add" method="post" enctype="multipart/form-data">
                                    <a href="/" class="btn-add-cart add-to-cart" title="Add to cart">
                                      <span class="demo-icon icon-basket"></span>
                                    </a>

                                    <select class="d-none" name="id">
                                      <option value="14880160612411"> Default Title</option>
                                    </select>
                                  </form>
                                </div>
                              </div>

                            </div>
                          </div>
                        </div>
                      </div>
                    </div>








                    <div class="owl-item active" style="width: 270px; margin-right: 30px;">
                      <div class="product-grid-item">
                        <div class="product-wrapper effect-overlay">

                          <div class="product-head">
                            <div class="product-image">

                              <div class="featured-img">
                                <a href="/">
                                  <img class="featured-image front" src="<?=PROOT?>assets/images/product-6.png" alt="tshirt 6"></img>
                                </a>
                              </div>

                              <div class="product-button">
                                <div data-target="#quick-shop-popup" class="quick_shop" data-handle="tshirt-6" data-toggle="modal" title="Quick View">
                                  <i class="demo-icon icon-search"></i>
                                  " quick view"
                                </div>
                                <div class="product-wishlist">
                                  <a href="/" class="add-to-wishlist add-product-wishlist" data-handle-product="tshirt-6" title="add to wishlist">
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
                                  <a href="/">tshirt 6</a>
                                </h5>
                              </div>

                              <div class="price-cart-wrapper">
                                <div class="product-price">
                                  <span class="price-compare">
                                    <span class="money" data-currency-lkr="Rs. 950" data-currency="LKR">rs. 950</span>
                                  </span>
                                  <span class="price-sale">
                                    <span class="money" data-currency-lkr="Rs. 850" data-currency="LKR">Rs. 850</span>
                                  </span>
                                </div>

                                <div class="product-add-cart">
                                  <form action="/cart/add" method="post" enctype="multipart/form-data">
                                    <a href="/" class="btn-add-cart add-to-cart" title="Add to cart">
                                      <span class="demo-icon icon-basket"></span>
                                    </a>

                                    <select class="d-none" name="id">
                                      <option value="14880160612411"> Default Title</option>
                                    </select>
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
            </div>



          </div> 

        </div>

      </div>

      </div>
    </div>
                </div>

              </div>
  
?>



<?= $this->end(); ?>