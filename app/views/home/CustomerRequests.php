<?= $this->setSiteTitle('Customer Designs') ?>

<?= $this->start('head'); ?>

 <!-- <link href="<?=PROOT?>assets/css/jquery.plugin.css" rel="stylesheet" type="text/css" media="all" /> -->
 <link href="<?=PROOT?>assets/css/arenafont.css" rel="stylesheet" type="text/css" media="all" />
 <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/3.0.3/cookieconsent.min.css" />
 
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
                  <img class="lazyload" src = "<?=PROOT?>assets/images/products/front2.jpg" alt="" /> 
                </a>
              <div class="block-text">
                <span class="text" style="color: #fff;">Let clothes color your life!</span>
                <a class="btn btn-1" href="<?=PROOT?>Home/ProductList">shop now</a>
              </div>
          </div>
        </div>
  
        <?php include 'Categories.php';?>

    </div>

    

<div class="col-lg-9 col-md-12">
        
  <div class="wrap-cata-title">
    <h2>Customer Requests</h2>
  </div>

<div class="cata-toolbar">
  <div class="group-toolbar">
      
  <div class="pagination-showing">
    <div class="showing">
            <!-- <?php 
            // echo 'Showing '.count($params[0]).' Items';
             ?> -->

          <?php                       
            $pageNo=$params[1];
            $noOfPages = ceil(($params[2]/6));           
            echo 'Showing  '. $pageNo.' - of  '.$noOfPages.'  Items';
          ?>
             
            
    </div>
  </div>
  </div>
</div>


<div id="col-main">

  <div class="cata-product cp-grid">

   

    <!-- product view -->
<?php 
    foreach ($params[0] as $field){
      //dnd($field);

      echo '
  <div class="product-grid-item mode-view-item">
          

    <div class="product-wrapper effect-overlay ">

      <div class="product-head">
        <div class="product-image">
      
          <div class="featured-img">
            <a href="/collections/personal/products/georgeous-white-dresses"> 
                <img class="featured-image front lazyload" src="'.PROOT.'assets/images/custom_requests/'.$field->images[0].'" alt="Georgeous White Dresses" />       
              <span class="product-label"></span>
        </a>
      </div>
         
      <div class="wrapper-countdown">
      <div class="countdown_1588809236539"></div>
      </div>

    </div>
  </div>

  <div class="product-content">
    <div class="pc-inner">
      
      <div class="product-group-vendor-name"> 
        <h5 class="product-name">
          <a href="/collections/personal/products/georgeous-white-dresses">'.$field->pr_name.'</a>
        </h5>

        <div class="product-des-list-" style="list-style-position: outside;">
          <ul>    
            
            <li>
              <span>Color: </span>
              <span class="a-list-item">'.$field->color.'</span>
            </li>
            <li>
              <span>Loaction: </span>
              <span class="a-list-item">'.$field->location.'</span>
            </li>
            <li>
              <span>Due date: </span>
              <span class="a-list-item">'.$field->due_date.'</span>
            </li>
            </ul>
                        
              <span class="a-list-item">'.$field->description.'</span>
            

          
        </div>   

        <div class="product-review">
          <span class="shopify-product-reviews-badge" data-id="1588809236539">            
          </span>
        </div>
        
      </div>
      
     <div class="price-cart-wrapper">
    <div class="product-price">   
        <span class="price">
          <br>
          <span class=money>$100.00</span>
        </span>
    </div>

        <div class="get-order">                
          <form action="/cart/add" method="post" enctype="multipart/form-data">
              <a href="javascript:void(0)" class="btn-add-cart add-to-cart" title="Add to cart"><span class="demo-icon icon-basket"></span></a>
              <select class="d-none" name="id">                
                  <option value="14880188334139">Default Title</option>
                
              </select>
          </form>
        </div>


    </div>
</div>

</div>

</div>


</div>
      ';
    }
 ?>


    <!-- end product view -->

</div>

</div>


</div>



<div class="pagination-holder">
  <ul class="pagination">

    <li>
      <a class="prev disabled" href="javascript:;">
        <i class="icon-demo icon-angle-left"></i>
      </a>
    </li>

    <?php
      $pageNo=$params[1];
      $noOfPages = ceil(($params[2]/6));      

      if ($pageNo-1>0){
        $previousPage=$pageNo-1;
        echo
        '<li>
          <a href="'.$previousPage.'" title="Next" class="next">
            <i class="icon-demo icon-angle-left"></i>
          </a>
        </li>';
      }

      $start=$pageNo-2;
      $end=$pageNo+2;

      if ($noOfPages<=5){
        $start=1;
        $end=$noOfPages;
      }
      
      else{

        if ($pageNo==1 || $pageNo==2){        
          $start=1;
            $end=$noOfPages;
        }

        else if($pageNo+1==$noOfPages) {
          $start=$pageNo-3;
          $end=$noOfPages;
        }

        else if ($pageNo==$noOfPages){
          $start=$noOfPages-4;
          $end=$noOfPages;
        }

      }

      for($i=$start; $i<=$end; $i++) {
        echo '<li><a href="'.$i.'">'.$i.'</a></li>';
      }
        
      if ($pageNo+1<=$noOfPages){
        $nextPage=$pageNo+1;
        echo
        '<li>
          <a href="'.$nextPage.'" title="Next" class="next">
            <i class="icon-demo icon-angle-right"></i>
          </a>
        </li>';
      }

    ?>

  </ul>
</div>


</div>
</div>
  
</div>

      </div>
    </div>

  
  </div>
</div>
<?= $this->end(); ?>