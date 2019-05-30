<?= $this->setSiteTitle(($params[0][0]->vendorName).'-TailorMate' )?>

<?= $this->start('head'); ?>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>

<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script> 

<?= $this->end(); ?>

<?= $this->start('body'); ?>

<div id="body-content" class="layout-boxed" style="background: #fff !important;">
  <div id="main-content"> 
    <div class="main-content">
      <div id="shopify-section-collection-template" class="shopify-section">



        <div class="wrap-breadcrumb bw-color">
          <div id="breadcrumb" class="breadcrumb-holder container">

            <div class="row">

               <?php 
                      echo '
                        <div class="col-lg-8 d-none d-lg-block">
                          <div class="page-title">'.
                             end($params).'
                          </div>
                        </div>
                      ';
                 ?> 

                               
      
                <div class="col-lg-4 col-md-12 col-sm-12 col-12">
                  <ul class="breadcrumb">

                    <li itemscope itemtype="http://data-vocabulary.org/Breadcrumb">
                      <a itemprop="url" href="#home">
                        Home
                      </a>
                    </li>

                    <li class="active">
                      <?= end($params)?>
                      
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
                <span class="text" style="color: #ffffff;">Wooden kitchen tools</span>
                <a class="btn btn-1" href="/collections/birthday-gifts">shop now</a>
              </div>
          </div>
        </div>


        <?php include (ROOT.DS.'app'.DS.'views'.DS.'home'.DS.'Categories.php');?>

</div>

      <div class="col-lg-9 col-md-12">
        <div class="row">
          <div class="col-lg-9 col-md-12">

            <div class="wrap-cata-title">
              <h2>
                <?= $params[0][0]->vendorName;?>  
              </h2>
            </div>
          </div>
          <?php if (currentUser()->role == 2) {
            echo '<div class="col-lg-3 col-md-12">
              <div class="pull-right">
                <a href="'.PROOT.'Home/addProduct"><button class="btn btn-1">Add Product</button></a>
              </div>
            </div>';
          }
          ?>

          <div class="col-lg-3 col-md-12 row" style="float:right; padding-right: 0px; padding-left: 8%;">
            
            <div class="col-lg-4 col-md-12 col-sm-12 col-12 icon-style">

                          
            </div>


            <div class="col-lg-4 col-md-12 col-sm-12 col-12 icon-style">
              
              <div></div>
              <div><br></div>
            </div> 

            <div class="col-lg-4 col-md-12 col-sm-12 col-12 icon-style notification">
              
                  
            </div>
          </div>

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

        <div class="featured-img lazyload">
          <a href="'.PROOT.'VendorController/VendorProductView/'.$product->id.'"> 
            <img class="featured-image front lazyload" src="'.PROOT.'assets/images/products/'.$product->images[0].'">            
            
        <span class="product-label">';
    
      if($product->permission==1){
         echo '<span class="label-sale">
          <span class="sale-text">Approved</span>  
          </span>';
      }
      else{
         echo '<span class="label-sale" style="background-color: #bc4a54">
          <span class="sale-text" >Not Approved</span>  
          </span>';
      }

      if($product->active==1){
          echo '<span class="label-sale">
          <span class="sale-text" >Active</span>  
          </span>';
      }
      else{
          echo '<span class="label-sale" style="background-color: #bc4a54">
          <span class="sale-text" >Not Active</span>  
          </span>';
      }
    
        echo '</span>
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
            <a href="'.PROOT.'VendorController/VendorProductView/'.$product->id.'">
             '.$product->name.'
            </a>
          </h5>
          
            <div class="product-review">
              <span class="shopify-product-reviews-badge" data-id="1588807401531"></span>
            </div>
          
        </div>
        
    <div class="price-cart-wrapper">

      <div class="product-price">  
          
        <span class="price-sale"><span class=money>$'.$product->price.'</span></span>   
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

      </div>
    </div>

  
  </div>
</div>
<script>
function openForm() {
  document.getElementById("myForm").style.display = "block";
}

function closeForm() {
  document.getElementById("myForm").style.display = "none";
}
</script>



<?= $this->end(); ?>
