<?= $this->setSiteTitle(end($params).'-TailorMate' )?>

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
                  <img class="lazyload" src = "//cdn.shopify.com/s/files/1/0102/1155/7435/files/sb_banner_270x.jpg?v=1539569056" alt="" /> 
                </a>
            
              
              
              <div class="block-text">
                <span class="text" style="color: #ffffff;">Wooden kitchen tools</span>
                
              </div>
          </div>
        </div>


        <?php include (ROOT.DS.'app'.DS.'views'.DS.'home'.DS.'Categories.php');?>

</div>
      <div class="col-lg-9 col-md-12">
        <div class="row">
          <div class="col-lg-9 col-md-12">

            <div class="wrap-cata-title">
              <h2 style="font-family: 'Open Sans',sans-serif; font-weight: 400;">
                <?= end($params)?> 
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
        

<div id="col-main">
          
  <div class="cata-product cp-grid">
      
   
<?php 
// dnd($params[0]);
foreach($params[0]as $value){

  $pid=$value->id;

    echo '<div class="product-grid-item mode-view-item product-list-style" >                   

        <div class="product-wrapper effect-overlay " style="height: 252px;width: 258px;border-width:0px;">

          <div class="product-head">
            <div class="product-image">

            <a href="'.PROOT.'CustomRequestController/requestedProductViewCustomer/'.$value->id.'"> 
                  

              <img style="height:250px;width:260px;" class="featured-image front lazyload" src="'.PROOT.'assets/images/custom_requests/'.$value->images[0]->path.'"/>

              <span class="product-label">
            
              
                <span class="label-sale">';
                  if ($value->status==0){
                    echo '
                      <span class="sale-text">NO RESPONSE</span> 
                      ';
                  }
                  else{

                    echo'
                      <span class="sale-text">RESPONDED</span> 
                      ';
                  }


                echo' 
                </span>   
            
              </ >
                </a>
            </div>
          </div>

          <div class="product-content" style="padding:7px;">
            <div class="pc-inner">
            
            <div class="product-name" style="text-align:center;">'. $value->pr_name. '
            </div>

            <div class="product-name" style="text-align:center;">'. $value->due_date. '
            </div>

            <div class="price-cart-wrapper" style="text-align:center;">
              <span class="price-sale"><span class=money> $'.$value->min_price.' - $'.$value->max_price.'</span></span> 
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
