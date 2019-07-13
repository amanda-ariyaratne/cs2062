
<?= $this->setSiteTitle( $params['pr_name'].'-TailorMate') ?>

<?= $this->start('head'); ?>

<link href="<?=PROOT?>assets/css/productView.css" rel="stylesheet" type="text/css" media="all" />
<link href="<?=PROOT?>assets/css/chat.css" rel="stylesheet" type="text/css" media="all" />

<script src="<?=PROOT?>assets/js/productView.js"></script>
<style id="shopify-dynamic-checkout">
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
                              <span itemprop="title" class="d-none"></span>Home
                            </a>
                          </li>
                          <li class="active">Customer request</li>

            
<!--             <li itemscope itemtype="http://data-vocabulary.org/Breadcrumb" class="d-none">
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
            </li> -->

            
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>

                <div itemscope itemtype="http://schema.org/Product">
                  <span itemprop="name" class="hide">'<?=$params['pr_name']?>'</span>
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
        foreach($params['images'] as $image){
          echo '
          <li>
            <div class="slider-main-image">
              <div class="slider-for-03">
                <div class="slick-item slick-zoom">
                    <div class="ar-quicklook-overlay" data-shopify-3d-variant-id="14880170180667" style="display: none;"></div>

                    <img class="image-zoom " src="'.PROOT.'assets/images/custom_requests/'.$image.'" alt="'.$params['pr_name'].'" style="width:400px;display:block;margin-left: auto;margin-right: auto;">

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
        // $image_path = $params[1][0];
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

                                      <h1 itemprop="name" content="'.$params['pr_name'].'" class="page-heading">'.$params['pr_name'].'</h1>

                                      ';
                                      ?>
              <!--                           <div class="rating-links">
                                          <span class="apr-badge" id="spr_badge_1588808155195" data-rating="0.0">
                                            <span class="spr-starrating spr-badge-starrating">
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
                                        </div> -->
                                      
                                      
                                        <div id="purchase-1588808155195" class="product-price">
                                          <div class="detail-price" itemprop="price" content="0.0">
                                            <span class="price-sale">
                                              <span class="money">price</span>
                                            </span>
                                            <span class="money">
                                              <?= '$'.$params['min_price'].' -  ' ?> 
                                            </span>
                                            <span class="money">
                                              <?=  '$'.$params['max_price']?> 
                                            </span> 
                                          </div>
                                        </div>   
                                        <link itemprop="availability" href="http://schema.org/InStock" />
                                        <?php echo '
                                          <div class="short-description">
                                            <ul>
                                              '.$params['description'].'
                                            </ul>
                                          </div>
                                        ';?>
                                        <div class="group-cw clearfix">

                      <div id="product-action"  class="options">

                        <div class="swatch color clearfix" data-option-index="1">
                          <div class="header">Color</div>
                          <div  class="swatch-element">
                            <?php echo '<label style="background-color: '.$params['color'].' ; cursor:pointer; "></label>';?>
                          </div>
                        </div>
                        <br>

                        <div class="swatch color clearfix" data-option-index="1">
                          <div class="header">Postal Code</div>
                          <div style="padding-top: 6px;"><?=$params['location']?></div>
                        </div>
                        <br>

                        <div class="swatch color clearfix" data-option-index="1">
                          <div class="header">Due Date</div>
                          <div style="padding-top: 6px;"><?=$params['due_date']?></div>
                        </div>
                        <br>

                        <div class="measurements-main" data-option-index="0">
                          <div class="header" style="font-weight: 700;">Measurements</div>
                          <?php
                            foreach($params['measurements'] as $measurement){

                              echo '

                                <div class="spr-form-for-measurements" style="padding-bottom:10px;margin-top: 10px;" >
                                  <label class="spr-m-form-label"  style="padding-left:40px;">'.$measurement->measurement_type.'</label>
                                  <label class="spr-m-form-label" for="" style="padding-left:40px;">'.$measurement->measurement.'</label>
                                  
                                  
                                </div>
                              ';
                            }
                          ?> 
                        </div>
                        

                        <!-- <input placeholder=" # of inches"  class="spr-form-input spr-form-input-text"  style="position:absolute; right:250px; height:25px; width:100px; padding:5px 10px;" type="text" name="measuremnt'.$measurement->id.'" value="'.$measurement->measurement.'"aria-required="true" /> -->

                                          </div>
                                        </div>

        <div class="container-chat">
          <img src="https://img1.jockeyimg.com/assets/managedcontent/departments/home/1907july/1907-superhero-mdept-1280x640.jpg" alt="Avatar" style="width:100%;">
          <p>Hello. How are you today?</p>
          <span class="time-right">11:00</span>
        </div>
        
      <?php 
        // if ($params['responses']){
        //   foreach ($params['responses'] as $response){

        //     echo '
            
        //       <div class="row respond text-align-center">
        //         <div class="col-lg-1">
        //             <img class="tailor-icon" src="'.PROOT.'assets/images/custom_requests/tailor_icon.jpg">
        //         </div>

        //         <div class="col-lg-2 response-pack" style="font-weight:600; font-style:italic;">
        //           '.$response->tailor.'
        //         </div>

        //         <div class="col-lg-8 response-pack">'.$response->response.'</div>

        //         <div class="col-lg-1" style="text-align:center;">
        //             <span>
        //               <i class="fa fa-check" data-id="" style="color:green;" aria-hidden="true"></i>
        //             </span>
        //             <span></span>
        //             <span>
        //               <i class="fa fa-window-close" data-id="" style="color:red;" aria-hidden="true"></i>
        //             </span>                  
        //         </div>

        //       </div>
        //       ';
        //     $count++;
        //   }

        // }
        // else{
        //   echo '<div style="color:red;">You do not have any response!</div>';
        // }
        
       ?>  

       


                      <!-- <div class="swatch color clearfix" data-option-index="1">

                        <div class="row">
                          <div class="header col-lg-3" style="font-weight: 700">Add a Note</div>
                          <div class="header col-lg-9" id ="success-message" style="font-style: italic; color: red; text-align:left;"></div>
                        </div>

                        <div style="margin-left: 0px;margin-top: 15px;">
                          <textarea placeholder="ex: your deal price and due date" id="response" class="col-lg-12" style="padding: 7px;height: 136px;" name="tailor-note"></textarea>
                        </div>                          
                      </div> 
 -->
                      <br/>
                      <div class="qty-add-cart">
                        <div class="action-button">
                          <button id="submit-response" value="Submit" class="btn btn-1 pull-right" >Send response
                          </button> 
                        </div>
                      </div>

                      <?php include(ROOT.DS.'app'.DS.'views'.DS.'home'.DS.'chat.php'); ?>



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


  <script type="text/javascript">
    
    $(document).ready(function(){

      $('#submit-response').on('click', function(){
          
          var response=$('#response').val();
          var product=<?php echo $params['id']; ?>;
          var tailor=<?php echo currentUser()->id; ?>;

          var data=JSON.stringify([product,tailor,response]);
          
          $.ajax({
            url:"<?=PROOT?>CustomRequestController/sendResponse",
            method:"POST",
            data:{'response':data},
            success: function(){
              $("#success-message").html("Response Added!");
              $("#response").val("");
            }
          });

      });
    });
  </script>
  




<?= $this->end(); ?>