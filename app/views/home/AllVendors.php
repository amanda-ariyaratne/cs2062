<?= $this->setSiteTitle('All vendors-TailorMate') ?>

<?= $this->start('head'); ?>
<style type="text/css">
  .dropdown-content {
  display: none;
  z-index: 1;
}
  .dropdown:hover .dropdown-content {display: block;}
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
      
      
      
      <div class="vendor-banner">
        <div class="wpb_wrapper">
    
          
          
          
          
          
          

          
            <img src="//cdn.shopify.com/s/files/1/0102/1155/7435/files/vendor_list_banner_1170x.png?v=1539342252" alt="Banner" />
          
          <div class="wrap-text">
            <span class="heading">Open your shop here</span>
            <p class="caption">Sell new unique products across 5500 categories.</p>
            <a class="btn btn-1" href="<?=PROOT?>account/register">BECOME A TAILOR</a>               
          </div>
            
          
       
          <style type="text/css">
              .wrap-text .heading,
              .wrap-text .caption {
                color: #ffffff;
              }
              .wpb_wrapper:after {
                border-color: #ffffff;
              }
            </style>
          
        </div>
      </div>
      
      
      
      <div class="vendor-stores">     
        
        <!-- start general products -->

    <?php 

      $i=1;
      foreach ($params[0] as $param){


        echo '
        
        <div class="row">
          
          <div class="vendor-image col-md-lg-2 col-md-2 d-none d-md-block">
            <div class="vendor-image-inner">
              
              
                <div class="vendor-icon">
                  <img src="'.PROOT.'assets/images/custom_requests/'.$param->logo_image.'" alt="Vendor Icon" />
                </div>
              
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
          </div>
          
          <div class="vendor-description col-md-lg-4 col-md-4 col-sm-12 col-12">
            <div class="vendor-description-inner">  
              <h4>'.$param->name.'</h4>
              
              <span class="rating-container 5-star"> 
                
                    <i class="demo-icon icon-star"></i>
                    <i class="demo-icon icon-star"></i>
                    <i class="demo-icon icon-star"></i>
                    <i class="demo-icon icon-star"></i>
                    <i class="demo-icon icon-star"></i>
                                
              </span>
              
              <span class="vendor-address">
                <i class="demo-icon icon-location"></i>'
                .$param->address_line_1.','
                .$param->address_line_2.','
                .$param->address_line_3.'

              </span>

              
                <div class="short-vendor-description">
                  <h4>About "'.$param->name.'"</h4>
                  <div class="description">'.$param->about_page.'</div>
                </div>              

              <a class="btn btn-1" href="#add path to the pariticular vendors page">Visit Store</a>               
            </div>
          </div>
          
          <div class="vendor-products col-md-lg-4 col-md-6 col-sm-12 col-12">
            <div class="vendor-products-inner">
                
                  <div class="product-img" data-number="1">
                    <img src="'.PROOT.'assets/images/custom_requests/'.$param->sample_image_1.'" alt="Black Fashion Example"/>                    
                  </div>
                
                  <div class="product-img" data-number="2">
                    <img src="'.PROOT.'assets/images/custom_requests/'.$param->sample_image_2.'" alt="Donkix Product Sample" />                    
                  </div>

                  <div class="product-img" data-number="3">
                    <img src="'.PROOT.'assets/images/custom_requests/'.$param->sample_image_3.'" alt="Freshkix Product Sample" />                    
                  </div>'
                  ;  

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
 
          <script>
            var x;
                var id="change-class-id-"+x;

                document.getElementById(id).addEventListener("mouseover", 
                  function(){
                    document.getElementById(id).className = "socials-container hover dropdown";
                  }
                );

                document.getElementById(id).addEventListener("mouseout", 
                  function(){
                    document.getElementById(id).className = "socials-container dropdown";
                  }
                );   
            
            </script>
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
