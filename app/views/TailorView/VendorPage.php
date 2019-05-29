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
                      echo
                        '<div class="col-lg-8 d-none d-lg-block">
                          <div class="page-title">'.
                             end($params).'
                          </div>
                        </div>';
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

              
                <a href="">
                  <img class="lazyload" src = "//cdn.shopify.com/s/files/1/0102/1155/7435/files/sb_banner_270x.jpg?v=1539569056" alt="" /> 
                </a>
            
              
              
              <div class="block-text">
                <span class="text" style="color: #ffffff;">Wooden kitchen tools</span>
                <a class="btn btn-1" href="<?=PROOT?>home/ProductList/1">GET MORE</a>
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
              <a href="<?=PROOT?>home/addProduct"><button type="button" class="btn btn-1">Add Product</button></a>

          </div>

          <div class="col-lg-3 col-md-12 row" style="float:right;padding-right: 0px;padding-left: 160px;margin-left: 0px;margin-right: 0px;left: 25px;right: auto;width: 122px;">

            <?php 
                if (currentUser()->role==2){
                    echo '
                    <a href="<?=PROOT?>home/addProduct"><i class="fas fa-plus" title="add new product" style="color: #000; opacity: 0.5; font-size: 25px;"></i></a>
                    ';
                }
             ?>
            

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
    // dnd();
      if($product->status=="1"){

          $pr_status = "Deactivate";
      }
      if($product->status=="0"){
          $pr_status = "Activate";
      }

      $approved = $product->approve_status;

echo '
<div class="product-grid-item mode-view-item">
                      

  <div class="product-wrapper effect-overlay ">

    <div class="product-head">
      <div class="product-image">';

    if($approved==0){
        echo '<button style="margin-left: 140px" class="btn btn-1" type="button" disabled >'.$pr_status.'</button> ';
    }
    else {
        echo '<button style="margin-left: 140px" class="btn btn-1" type="button" id="' . $product->id . '" onclick="active(id)">' . $pr_status . '</button> ';
    }
      echo ' 
        <div class="featured-img lazyload">
          <a href="'.PROOT.'home/productView/'.$params[0][0]->id.'"> 
            <img class="featured-image front lazyload" src="'.PROOT.'assets/images/products/'.$params[0][0]->images[0].'">            
            
        <span class="product-label">';

        if (currentUser()->role!='3'){
          if ($params[0][0]->availability==1){
             echo '   
            <a href="" style="">
              <span class="label-sale">
                <span class="sale-text">Available</span>  
              </span>
            </a> ';

          }

          else{
            echo '
            <span class="label-sale">
              <span class="sale-text">Not Available</span>  
            </span> ';
            
          } 
        } 

          echo '  
    
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

<<<<<<< HEAD:app/views/TailorView/VendorPage.php
    <div class="product-content" style="padding:5px;">
      <div class="pc-inner">
=======
    <div style="padding: 20px 1px 5px 20px" class="product-content">
      <div  class="pc-inner">
>>>>>>> ba9e67bb6cf1b9916e2e8bdc2c0d938d57e761fa:app/views/home/VendorPage.php
        
        <div class="product-group-vendor-name" style="padding-right: 0px;"> 
          <h5 class="product-name">
<<<<<<< HEAD:app/views/TailorView/VendorPage.php
            <a href="/products/black-fashion-zapda-shoes">
             '.$params[0][0]->name.'
=======
            <a href="'.PROOT.'home/productView/'.$params[0][0]->id.'"> 
             '.$product->name.'
>>>>>>> ba9e67bb6cf1b9916e2e8bdc2c0d938d57e761fa:app/views/home/VendorPage.php
            </a>
                    <span class="price-sale"><span style="margin-left: 20px" class=money>'.$product->price.'</span></span>
                    <br><br>
                    <a style="color: #dc3545" href="'.PROOT.'home/editProduct/'.$product->id.'">edit</a>
                    <a style="color: #dc3545;margin-left: 40px" href="'.PROOT.'home/removeProduct/'.$product->id.'">remove</a>


          </h5>
<<<<<<< HEAD:app/views/TailorView/VendorPage.php
          <div class="price-cart-wrapper pull-right">  
            <div> 
              <span class="price-sale"><span class=money> $'.$params[0][0]->price.'</span></span>   
=======
          
          
            <div class="product-review">
              <span class="shopify-product-reviews-badge" data-id="1588807401531"></span>
>>>>>>> ba9e67bb6cf1b9916e2e8bdc2c0d938d57e761fa:app/views/home/VendorPage.php
            </div>
        </div>
<<<<<<< HEAD:app/views/TailorView/VendorPage.php



        </div>
=======
        
    

      
      
      
      <div>
      
        
>>>>>>> ba9e67bb6cf1b9916e2e8bdc2c0d938d57e761fa:app/views/home/VendorPage.php

        
          
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
    function active(id) {
        if(document.getElementById(id).innerHTML==="Activate"){
            var arry1 = [id,"1"];
            var data1 = JSON.stringify( arry1 );
                $.ajax({
                    url:"<?=PROOT?>Home/changeActiveStatus",
                    type: "POST",
                    data:{'new': data1},
            success: function(){
                        alert("Successfully Activated");
                // var array_new=JSON.parse(data);
            }
        });
            document.getElementById(id).innerHTML = "Deactivate";

        }
        else {
            var arry2 = [id,"0"];
            var data2 = JSON.stringify( arry2 );
            $.ajax({
                url:"<?=PROOT?>Home/changeActiveStatus",
                type: "POST",
                data:{'new' : data2},
                success: function(){
                    alert("Successfully Deactivated");
                    // var array_new=JSON.parse(data);
                }
            });
            document.getElementById(id).innerHTML = "Activate";
        }
    }

function openForm() {
  document.getElementById("myForm").style.display = "block";
}

function closeForm() {
  document.getElementById("myForm").style.display = "none";
}
</script>



<?= $this->end(); ?>
