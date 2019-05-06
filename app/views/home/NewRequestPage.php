<?= $this->setSiteTitle('NewRequests-TailorMate' )?>

<?= $this->start('head'); ?>

<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script> 

<?= $this->end(); ?>

<?= $this->start('body'); ?>

<div class="boxed-wrapper">
  <div id="page-body" class="breadcrumb-color">
 
      
  <div id="body-content" class="layout-boxed">
    <div id="main-content"> 
      <div class="main-content">

<div id="shopify-section-collection-template" class="shopify-section">

<div class="wrap-breadcrumb bw-color">
  <div id="breadcrumb" class="breadcrumb-holder container">

    <div class="row">
      
        <div class="col-lg-6 d-none d-lg-block">
          <div class="page-title"> 
            New Requests            
          </div>
        </div>
      
      
      <div class="col-lg-6 col-md-12 col-sm-12 col-12">
        <ul class="breadcrumb">
          <li itemscope itemtype="http://data-vocabulary.org/Breadcrumb">
            <a itemprop="url" href="/">              
              Home
            </a>
          </li>

          <li class="active">
            New Requests   
          </li>
          
        </ul>
      </div>
    </div>

  </div>
</div>

<div class="page-cata" data-logic="true">
  <div class="container">
  
    <div class="row">

      
        <div id="sidebar" class="left-column-container col-lg-3  d-none d-lg-block">


        <div class="sb-widget">
          <div class="sb-banner">

              
                <a href="/collections/birthday-gifts">
                  <img class="lazyload" src = "//cdn.shopify.com/s/files/1/0102/1155/7435/files/sb_banner_270x.jpg?v=1539569056" alt="" /> 
                </a>
            
              
              
              <div class="block-text">
                <span class="text" style="color: #ffffff;">Today's New Designs</span>
                <a class="btn btn-1" href="#">Let's supply a quick service</a>
              </div>
          </div>
        </div>


        <?php include 'Categories.php';?>

</div>

      <div class="col-lg-9 col-md-12">
        
        

        <div class="wrap-cata-title">
          <h2>
            New Requests    
          </h2>
        </div>

        <div class="cata-toolbar">
  <div class="group-toolbar">
    
    <div class="pagination-showing">
      <div class="showing">
        <?php

        if ($params[1]<6){
           echo 'Showing all Items';
         }
         elseif ($params[1]>6) {
           echo 'Showing 6 items from'.$params[1];
         }

        ?>
        
      </div>
    </div>

  </div>
</div>


<div id="col-main">
          
  <div class="cata-product cp-grid">
            


<?php 
  foreach ($params[0] as $product){

echo '
<div class="product-grid-item mode-view-item">
                      

  <div class="product-wrapper effect-overlay ">

    <div class="product-head">
      <div class="product-image">

        <div class="featured-img lazyload waiting">
          <a href="/products/black-fashion-zapda-shoes"> 
            <img class="featured-image front lazyload" data-src="path to the image"/>            
            
        <span class="product-label">
    
      
        <span class="label-sale">
          <span class="sale-text">Available</span>  
          </span>   
    
        </span>
          </a>
        </div>
        
        <div class="product-button">

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
            <a href="/products/black-fashion-zapda-shoes">
             '.$product->name.'
            </a>
          </h5>
          
            <div class="product-review">
              <span class="shopify-product-reviews-badge" data-id="1588807401531"></span>
            </div>
          
        </div>
        
    <div class="price-cart-wrapper">

      <div class="product-price">  
          
      	<span class="price-compare"><span class=money>Price</span></span>
        <span class="price-sale"><span class=money>Sale price</span></span>  	
      </div>

      <div class="product-add-cart">
                  
        <form action="/cart/add" method="post" enctype="multipart/form-data">
          <a href="#" class="btn-add-cart" title="check">
            <i class="fa fa-check"></i>
          </a>          
        </form>

      </div>

    </div>
  </div>


</div>
</div>
</div>';

}
?>

     
</div>   
</div>
</div>
</div>
</div>
</div>

<div id="country-target" class="d-none"></div>

</div>
</div>
</div>
</div>
</div>
</div>   

<?= $this->end(); ?>
