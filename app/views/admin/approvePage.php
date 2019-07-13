
<?= $this->setSiteTitle('Approve Product Page') ?>


<?= $this->start('head'); ?>

<link href="<?=PROOT?>assets/css/productView.css" rel="stylesheet" type="text/css" media="all" />
<script src="<?=PROOT?>assets/js/productView.js"></script>
<!-- <link rel='stylesheet' id='fontawesome-css' href='https://use.fontawesome.com/releases/v5.0.1/css/all.css?ver=4.9.1' type='text/css' media='all' />
 --><!-- <script type="text/javascript" src="<?=PROOT?>assets/js/productView.js"></script>
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


<?php 

  $product = $params['product'];
  $images = $params['images'];
  $vendor = $params['product']->vendor;
?>

<!-- <body class="templateProduct category-mode-false cata-grid-3 lazy-loading-img"> -->

  <div class="boxed-wrapper" id="changing-image">
    
    <div class="new-loading"></div>
    
    
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
                              <span itemprop="title" class="d-none">Tailor Mate</span>Home
                            </a>
                          </li>

                          <li itemscope itemtype="http://data-vocabulary.org/Breadcrumb" class="d-none">
                            <a href="" itemprop="url">
                              <span itemprop="title"><?=$product->main_category_name?></span>
                            </a>
                          </li>    
                          
                          <li>
                            <a href="" title=""><?=$product->main_category_name?></a>
                          </li>

                          <li itemscope itemtype="http://data-vocabulary.org/Breadcrumb" class="d-none">
                            <a href="/products/donkix-product-sample" itemprop="url">
                              <span itemprop="title"><?=$product->sub_category_name?></span>
                            </a>
                          </li>

                          <li>
                            <a href="" title=""><?=$product->sub_category_name?></a>
                          </li>

                        </ul>
                      </div>
                    </div>

                  </div>
                </div>

                <div itemscope itemtype="http://schema.org/Product">
                <meta itemprop="url" content="https://arena-handy.myshopify.com/products/donkix-product-sample" />
                <meta itemprop="image" content="//cdn.shopify.com/s/files/1/0102/1155/7435/products/6_a58db3c3-fa0c-4882-a718-b543511467ce_grande.jpg?v=1537342931">
                <span itemprop="name" class="hide">'<?=$product->name?>'</span>

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
                                        foreach($images as $image){
                                          echo '
                                          <li>
                                            <div class="slider-main-image">
                                              <div class="slider-for-03">
                                                <div class="slick-item slick-zoom">
                                                    <div class="ar-quicklook-overlay" data-shopify-3d-variant-id="14880170180667" style="display: none;"></div>

                                                    <img class="image-zoom " src="'.PROOT.'assets/images/products/'.$image.'" alt="'.$product->name.'" style="width:400px;display:block;margin-left: auto;margin-right: auto;">

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
                                        $image_path = $images[0];
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

                                    <h1 itemprop="name" content="'.$product->name.'" class="page-heading">'.$product->name.'</h1>

                                    ';
                                    ?>
                                    
                                    <span>
                                      <button id="approve-btn" type="submit" class="btn btn-1" style="float: right; font-size: 20px; padding: 10px; margin: 5px;">Approve</button> 
                                    </span>
                                    <span>
                                      <button id="Reject-btn" type="submit" class="btn btn-1" style="float: right; font-size: 20px; padding: 10px; margin: 5px;">Reject</button> 
                                    </span>

                                    <div class="product-price">
                                      <div class="detail-price" itemprop="price" content="0.0">
                                        
                                        <?php echo '
                                          <span class="price-sale"><span class=money>$ '.$product->price.'</span></span>
                                        ';?>

                                      </div>
                                    </div>   
                                  
                                    <?php echo '
                                      
                                      <div class="short-description">
                                        <ul>
                                          '.$product->description.'
                                        </ul>
                                      </div>
                                      
                                    ';?>

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
                                                      <input value="'.$color.'" style="display:none;"/>
                                                      <label for="swatch-1-'.$color.'" style="background-color: '.$color.' ; "></label>
                                                    
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
                                          <div class="header" style="float: none; font-weight: 600;">Size</div>
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
                                    </div> 

                                    <?php echo '
                                      
                                      <div class="short-description">
                                        <h3 style="font-weight:400;">Vendor details</h3>
                                        <ul>
                                          <li> ID : '.$vendor->id.'</li>
                                          <li> Name : '.$vendor->first_name.' '.$vendor->last_name.'</li>
                                          <li> Email : '.$vendor->email.'</li>
                                        </ul>
                                      </div>
                                      
                                    ';?>

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
  <!-- <script type="text/javascript">
    $(document).ready(function(){
      $('#approve-btn').click(function(){
          $.ajax({
            url:"<?=PROOT?>/Admin/ApprovePage",
            method:"POST",
            data:{'status':'1', 'pr_id': <?=$params['id']?>},
          });
      });
    });
  </script> -->
  




<?= $this->end(); ?>