<?= $this->setSiteTitle('Search Product List - TailorMate') ?>

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
              <a href="#" >
                <img class="lazyload" src = "<?=PROOT?>assets/images/products/front2.jpg" alt="" /> 
              </a>

              <div class="block-text">
                <span class="text" style="color: #fff;">Let clothes color your life!</span>
               
              </div>
              
            </div>
          </div>

      <?php include 'Categories.php'?>


    </div>


  <div class="col-lg-9 col-md-12">
        
        <div class="wrap-cata-title">
          <h2>Products</h2>
        </div>

        <div class="cata-toolbar">
  <div class="group-toolbar">
    
    <div class="pagination-showing">
      <div class="showing">
          <?php                       
            $pageNo=$params[1];
            $noOfPages = ceil(($params[2]/6));           
            echo 'Showing  '. $pageNo.' - of  '.$noOfPages.'  Items';
          ?>        
      </div>
    </div>
    
          
      <!-- <div class="filter-icon dropdown"><i class="demo-icon icon-sliders"></i>Filter</div> -->
          
      <div class="grid-list">
        <span class="text">View</span>
        <span class="grid grid-4" title="Small"><i class="demo-icon icon-icon-grid-04"></i></span>
        <span class="grid grid-3 active" title="Medium"><i class="demo-icon icon-electro-grid-view"></i></span>
        <span class="grid grid-2" title="Large"><i class="demo-icon icon-grid-circle"></i></span>
        <span class="grid grid-1" title="Huge"><i class="demo-icon icon-th-list-1"></i></span>
      </div>


  </div>
</div>


        <div id="col-main">
            <div class="cata-product cp-grid">
              <?php 
               
                foreach($params[0]as $value){

                      $pid=$value->id;

                      echo '<div class="product-grid-item mode-view-item">                   

                          <div class="product-wrapper effect-overlay ">
                            <div class="product-head">
                              <div class="product-image">
                                
                                  <a href="'.PROOT.'home/productView/'.$pid.'"> 
                                    <img class="featured-image front lazyload" src="'.PROOT.'assets/images/products/'.$value->images[0].'"/>
                                  </a>
                              </div>
                            </div>

                            <div class="product-content">
                              <div class="pc-inner">          
                                <div class="product-group-vendor-name"> 
                                  <h5 class="product-name"><a href="'.PROOT.'home/productView/'.$value->id.'">'. $value->name.'</a></h5>  

                                  <!-- <div class="product-des-list"><ul>

                                    <li><span class="a-list-item">Party Frock</span></li>
                                    <li><span class="a-list-item">Linen material</span></li>
                                    <li><span class="a-list-item">Colours available</span></li>

                                    </ul>
                                  </div> -->

                                  <div class="product-review">
                                    <span class="shopify-product-reviews-badge" data-id="1588807794747"></span>
                                  </div>
                                  
                                </div>          
                                <div class="price-cart-wrapper">    

                                  <div class="product-price">                          
                                    <span class="sold-out">$'. $value->sale_price.'</span>                          
                                  </div>

                                  <div class="product-add-cart"></div>

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

      if ($noOfPages>1){
        $previousPage=$pageNo-1;

        if ($previousPage>0){
          
          echo
          '<li>
            <a href="<?=PROOT?>home/search?keywords='.$params[4].'&page='.$previousPage.'" title="Next" class="next">
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
          echo '<li><a href="<?=PROOT?>home/search?keywords='.$params[4].'&page='.$i.'">'.$i.'</a></li>';
        }
          
        if ($pageNo+1<=$noOfPages){
          $nextPage=$pageNo+1;
          echo
          '<li>
            <a href="<?=PROOT?>home/search?keywords='.$params[4].'&page='.$nextPage.'" title="Next" class="next">
              <i class="icon-demo icon-angle-right"></i>
            </a>
          </li>';
        }


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

<?= $this->end(); ?>