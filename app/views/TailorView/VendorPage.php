
<?= $this->setSiteTitle(end($params).' - TailorMate' )?>
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

              
                <a href="#">
                  <img class="lazyload" src = "<?=PROOT?>assets/images/vendorpage-img-1.jpg" alt="" /> 
                </a>
            
              
              
              <div class="block-text">
                <span class="text" style="color: #ffffff;">Tailored Products</span>
                
              </div>
          </div>
        </div>


        <?php include (ROOT.DS.'app'.DS.'views'.DS.'home'.DS.'Categories.php');?>

</div>

      <div class="col-lg-9 col-md-12">
        <div class="row" style="height:35px;">
          <div class="col-lg-9 col-md-12">

            <div class="wrap-cata-title">
              <h2 style="font-family: 'Open Sans',sans-serif; font-weight: 400; font-size:30px;">
                My Designs 
              </h2>
            </div>
          </div>

          <div class="col-lg-3">
            <div class="cata-toolbar">
              <div class="group-toolbar">
                
                <div class="pagination-showing">
                  <div class="showing" style="font-weight: 50; font-style: italic;">
                      <?php          
                        $pageNo=$params[1];


                        $noOfPages = ceil(($params[2]/6));           
                        echo 'Showing <b>'. $pageNo.'</b> of  <b>'.$noOfPages.'</b>  pages';
                      ?>        
                  </div>
                </div>
              </div>
            </div>
          </div>         
        </div>

        <?php 
          if (currentUser()->role == 2) {
            echo '
              <div style="padding-left:840px;">

                <a href="'.PROOT.'home/addProduct" title="Add Your Designs Here">
                  <i class="fas fa-plus" style="color:black; font-size:35px; color:gray;" ></i>
                </a>
              </div>
            ';
          }
          ?>

        

<div id="col-main">
          
  <div class="cata-product cp-grid">
         
<?php
  foreach ($params[0] as $value){

      $pid=$value->id;

      echo '<div class="product-grid-item mode-view-item product-list-style" >                   

        <div class="product-wrapper effect-overlay " style="height: 252px;width: 258px;border-width:0px;">

          <div class="product-head">
            <div class="product-image">
            
                <a href="'.PROOT.'VendorController/VendorProductView/'.$pid.'"> 
                  <img style="height:250px;width:260px;" class="featured-image front lazyload" src="'.PROOT.'assets/images/products/'.$value->images[0].'"/>

                 <span class="product-label">';

      if($value->permission==1){
         echo '<span class="label-sale" style="background-color: rgba(129, 207, 220, 0.9);border-radius: 3px">
          <span class="sale-text">Approved</span>  
          </span>';
      }
      else{
         echo '<span class="label-sale" style="background-color: rgba(176, 75, 80, 0.8);border-radius: 3px">
          <span class="sale-text" >Not Approved</span>  
          </span>';
      }

      if($value->active==1){
          echo '<span class="label-sale" style="background-color: rgba(129, 207, 220, 0.9);border-radius: 3px">
          <span class="sale-text">Active</span>  
          </span>';
      }
      else{
          echo '<span class="label-sale" style="background-color: rgba(176, 75, 80, 0.8);border-radius: 3px">
          <span class="sale-text" >Not Active</span>  
          </span>';
      }


                 echo '</span>
                </a>
            </div>
          </div>

          <div class="product-content" style="padding:7px;">
            <div class="pc-inner">
            <div style="text-align:center;">
            ';     

                              for($rate=0; $rate<$value->rates; $rate++) {
                                echo '
                                  <span class="fa fa-star checked"></span>
                                ';
                              }

                              for($rate=0; $rate<5-$value->rates; $rate++) {
                                echo '
                                  <span class="fa fa-star unchecked"></span>
                                ';
                              }                              

                              echo'
                              </div>

                              <div class="product-name" style="text-align:center;>
                                <a href="'.PROOT.'home/productView/'.$value->id.'">'. $value->name.'</a>
                              </div>

                              <div class="price-cart-wrapper" style="text-align:center;">
                                <span class="sold-out">$'. $value->price.'</span> 
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
