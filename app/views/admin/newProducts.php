<?= $this->setSiteTitle('New Products - TailorMate') ?>

<?= $this->start('head'); ?>
<style type="text/css">
  @import url(//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css);
  .dropdown-content {
  display: none;
  z-index: 1;
}
  .dropdown:hover .dropdown-content {display: block;}
.rating { 
  border: none;
  float: left;
}

.rating > input { display: none; } 
.rating > label:before { 
  margin: 5px;
  font-size: 1.25em;
  font-family: FontAwesome;
  display: inline-block;
  content: "\f005";
}

.rating > .half:before { 
  content: "\f089";
  position: absolute;
}

.rating > label { 
  color: #ddd; 
 float: right; 
}
</style>

<?= $this->end(); ?>

<?= $this->start('body'); ?>

<div id="body-content" class="layout-boxed" style="background: #fff !important;">
  <div id="main-content"> 
    <div class="main-content">
      <div id="shopify-section-collection-template" class="shopify-section">



        <div class="wrap-breadcrumb bw-color">
          <div id="breadcrumb" class="breadcrumb-holder container">

            <div class="row">

               
                        <div class="col-lg-8 d-none d-lg-block">
                          <div class="page-title">
                            New Products
                          </div>
                        </div>
                      

                               
      
                <div class="col-lg-4 col-md-12 col-sm-12 col-12">
                  <ul class="breadcrumb">

                    <li itemscope itemtype="http://data-vocabulary.org/Breadcrumb">
                      <a itemprop="url" href="#home">
                        Home
                      </a>
                    </li>

                    <li class="active">
                      New Products
                      
                    </li>
                    
                  </ul>
                </div>
              </div>

            </div>
          </div>



<div class="boxed-wrapper">
  <div id="page-body" class="breadcrumb-color">
 

<div id="body-content" class="layout-boxed">
        <div id="main-content"> 
          <div class="main-content">

<div id="shopify-section-page-vendor-template" class="shopify-section">

<div class="page-contact">
  <div class="container">
    <div id="col-main" class="page-contact-content">
      
      
      <!-- <div class="page-content"><span>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</span></div> -->
      
      
      <div class="vendor-stores">     
        
        <!-- start general products -->

    <?php 
      $products = $params['products'];

      $i=1;
      foreach ($products as $product){
 

        echo '
        
        <div class="row">
          
          <div class="vendor-image col-md-lg-2 col-md-2 d-none d-md-block">
            <div class="vendor-image-inner">
              
              
                <div class="vendor-icon">';
                  if ($product->logo != '') {
                    echo '<img src="'.PROOT.'assets/images/store_logo/'.$product->logo.'" alt="Vendor Icon" />';
                  } else {
                    echo '<img src="'.PROOT.'assets/images/store-default.png" alt="Vendor Icon" />';
                  }
                  
                echo '</div>
              
                <div class="socials-container dropdown" id="change-class-id-'.$i.'" onmouseover=mouseoverShare(this) onmouseout=mouseoutShare(this)>
                 
                  <ul class="dropdown-content social-icons" >
                    <li><a href="https://facebook.com" target="_blank"><i class="demo-icon icon-facebook"></i></a></li>
                    <li><a href="https://instagram.com" target="_blank"><i class="demo-icon icon-instagram"></i></a></li>
                    <li><a href="https://twitter.com" target="_blank"><i class="demo-icon icon-twitter"></i></a></li>
                    <li><a href="https://plus.google.com" target="_blank"><i class="demo-icon icon-google"></i></a></li>
                    <li><a href="https://youtube.com" target="_blank"><i class="demo-icon icon-youtube"></i></a></li>
                    <li><a href="https://linkedin.com" target="_blank"><i class="demo-icon icon-linkedin"></i></a></li>
                  </ul>
                  <i class="demo-icon icon-share-1"></i>
                </div>
              
              
            </div>  
          </div>';
          
          echo
          '<div class="vendor-description col-md-lg-4 col-md-4 col-sm-12 col-12">
            <div class="vendor-description-inner">  
              <h4 style="font-size: 25px;">'.$product->name.'</h4>
              
              <div class=""> 
                    <span class="rating-container 5-star rating">';
                        
                        
                        echo '<label class = "full" for="star5"'; if($product->rating == 5){echo ' style="color: #c1939e"';} echo '></label>';
                        echo '<label class="half" for="star4half"'; if($product->rating > 4.5){echo ' style="color: #c1939e"';} echo '></label>';
                        echo '<label class = "full" for="star4"'; if($product->rating > 4){echo ' style="color: #c1939e"';} echo '></label>';
                        echo '<label class="half" for="star3half"'; if($product->rating > 3.5){echo ' style="color: #c1939e"';} echo '></label>';
                        echo '<label class = "full" for="star3"'; if($product->rating > 3){echo ' style="color: #c1939e"';} echo '></label>';
                        echo '<label class="half" for="star2half"'; if($product->rating > 2.5){echo ' style="color: #c1939e"';} echo '></label>';
                        echo '<label class = "full" for="star2"'; if($product->rating > 2){echo ' style="color: #c1939e"';} echo '></label>';
                        echo '<label class="half" for="star1half"'; if($product->rating > 1.5){echo ' style="color: #c1939e"';} echo '></label>';
                        echo '<label class = "full" for="star1"'; if($product->rating > 1){echo ' style="color: #c1939e"';} echo '></label>';
                        echo '<label class="half" for="starhalf"'; if($product->rating > 0.5){echo ' style="color: #c1939e"';} echo '></label>';
                    

                    echo     
                    '</span>
                    <p style="padding-top: 6px; padding-left: 10px;"> &nbsp; (' . $product->ratingCount . ' ratings)</p>        
              </div>
              <br>
              <div>
                <span class="vendor-address">
                  <i class="demo-icon icon-location"></i>'
                  .$product->streetName.','
                  .$product->city.'

                </span>
              </div>
              
                <div class="short-vendor-description">
                  
                  <div class="description">'.$product->description.'</div>
                </div>              

              <a class="btn btn-1" href="' . PROOT . 'admin/approvePage/' . $product->id .'">View Product</a>               
            </div>
          </div>';
          
          echo 
          '<div class="vendor-products col-md-lg-4 col-md-6 col-sm-12 col-12">
            <div class="vendor-products-inner">';

                  foreach ($product->images as $image) {
                    echo '<div class="product-img">
                    <img src="'.PROOT.'assets/images/products/'.$image->path.'" alt="Black Fashion Example"/>                    
                  </div>';
                  }
                
                    

                  for ($x=4; $x<=6; $x++){
                    $s='sample_image_'.$x;

                    if ($param->$s !=NULL){                     
                      echo '
                      <div class="product-img" data-number='.$x.'>
                        <img src="'.PROOT.'assets/images/custom_requests/'.$param->sample_image_.$x.'" alt="Freshkix Product Sample" />                    
                      </div>

                      ' ;
                    }
                  }

                 echo '       
            </div>
  
          </div>
          
        </div>
            ';  

            $i++;        
          }
         ?>
        <!-- end general product -->

      </div>      
      
    </div>
  </div>
</div>
<script type="text/javascript">           

      function mouseoverShare(element){
        element.className = "socials-container hover dropdown";
      }
      function mouseoutShare(element){
        element.className = "socials-container dropdown";
      }
</script>

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



<?= $this->end(); ?>
