
<?= $this->setSiteTitle( $params['pr_name'].'-TailorMate') ?>

<?= $this->start('head'); ?>

<link href="<?=PROOT?>assets/css/productView.css" rel="stylesheet" type="text/css" media="all" />
<link href="<?=PROOT?>assets/css/toggle.css" rel="stylesheet" type="text/css" media="all" />

<style id="shopify-dynamic-checkout">
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


<!-- <body class="templateProduct category-mode-false cata-grid-3 lazy-loading-img"> -->

  <div class="boxed-wrapper" id="changing-image">
    
    <div class="new-loading"></div>
    <div class="cart-sb">
<!--       <form action="/cart" method="post">
        <div class="cart-sb-title">
          <span class="c-title">Your Cart</span>
          <span class="c-close">
            <i class="demo-icon icon-close" aria-hidden="true"></i>
          </span>
        </div>
    
        <div id="cart-info" class="shipping-true">
          <div id="cart-content" class="cart-content">
            <div class="cart-loading"></div>
          </div>
        </div>
      </form> -->
    </div>
    
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
                              <span itemprop="title" class="d-none"></span>Home
                            </a>
                          </li>
                          <li class="active">Customer request</li>

            
<!--             <li itemscope itemtype="http://data-vocabulary.org/Breadcrumb" class="d-none">
              <a href="" itemprop="url">
                <span itemprop="title"><?=$params[0]->main_category_name?></span>
              </a>
            </li>    
            
            <li>
              <a href="" title=""><?=$params[0]->main_category_name?></a>
            </li>

            <li itemscope itemtype="http://data-vocabulary.org/Breadcrumb" class="d-none">
              <a href="/products/donkix-product-sample" itemprop="url">
                <span itemprop="title"><?=$params[0]->sub_category_name?></span>
              </a>
            </li>

            <li>
              <a href="" title=""><?=$params[0]->sub_category_name?></a>
            </li> -->

            
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>

                <div itemscope itemtype="http://schema.org/Product">
                  <span itemprop="name" class="hide">
                    <?=$params['pr_name']?>                    
                  </span>
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
        foreach($params['images'] as $image){
          echo '
          <li>
            <div class="slider-main-image">
              <div class="slider-for-03">
                <div class="slick-item slick-zoom">
                    <div class="ar-quicklook-overlay" data-shopify-3d-variant-id="14880170180667" style="display: none;"></div>

                    <img class="image-zoom " src="'.PROOT.'assets/images/custom_requests/'.$image.'" alt="'.$params['pr_name'].'" style="width:400px;display:block;margin-left: auto;margin-right: auto;">

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
        // $image_path = $params[1][0];
      ?>         

  </div>
</div>
                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-6 col-12" style="position: relative; right: 1px;">
                                  <div itemprop="offers" itemscope itemtype="http://schema.org/Offer">
                                    <div id="product-info" class="product-info">
                                      <div class="product-info-inner">
                                      <div class="row">
                                        
                                       <?php 
                                       if ($params['active']=='1'){
                                        $class='fa-toggle-on';
                                       }
                                       else{
                                        $class='fa-toggle-off';
                                       }

                                        echo '

                                      <h1 itemprop="name" content="'.$params['pr_name'].'" class="page-heading col-lg-9">'.$params['pr_name'].'</h1>

                                      <a class="col-lg-1" style="text-align:right;"><i class="fa '.$class.'"  title="Visibility to the TAILORS" style="color: #000; opacity: 0.5; font-size: 30px;"></i></a>

                                      <a href="'.PROOT.'CustomRequestController/ProductRequestEdit/'.$params["id"].'" class="col-lg-1" style="text-align:right;"><i class="fas fa-edit" title="add new product" style="color: #000; opacity: 0.5; font-size: 25px;"></i></a>

                                      <a class="col-lg-1" style="text-align:right;"><i class="fa fa-trash" id="deleteBtn" title="Delete" style="color: #000; opacity: 0.5; font-size: 25px;"></i></a>

                                      


                                      ';
                                      ?>

                                      </div>
                                      <!-- <label class="switch col-lg-1" title="make visible to TAILORS" style="text-align:right;">
                                        <input type="checkbox" checked>
                                        <span class="slider round"></span>
                                      </label> -->


                                      <?php include (ROOT.DS.'app'.DS.'models'.DS.'delete_modal.php');?>
                                      
                                      
                                      
                                        <div id="purchase-1588808155195" class="product-price">
                                          <div class="detail-price" itemprop="price" content="0.0">
                                            <span class="price-sale">
                                              <span class="money">price</span>
                                            </span>
                                            <span class="money">
                                              <?= '$'.$params['min_price'].' -  ' ?> 
                                            </span>
                                            <span class="money">
                                              <?=  '$'.$params['max_price']?> 
                                            </span> 
                                          </div>
                                        </div>   
                                        <link itemprop="availability" href="http://schema.org/InStock" />
                                        <?php echo '
                                          <div class="short-description">
                                            <ul>
                                              '.$params['description'].'
                                            </ul>
                                          </div>
                                        ';?>
                                        <div class="group-cw clearfix">

                      <div id="product-action"  class="options">

                        <div class="swatch color clearfix" data-option-index="1">
                          <div class="header">Color</div>
                          <div  class="swatch-element">
                            <?php echo '<label style="background-color: '.$params['color'].' ; cursor:pointer; "></label>';?>
                          </div>
                        </div>
                        <br>

                        <div class="swatch color clearfix" data-option-index="1">
                          <div class="header">Postal Code</div>
                          <div style="padding-top: 6px;"><?=$params['location']?></div>
                        </div>
                        <br>

                        <div class="swatch color clearfix" data-option-index="1">
                          <div class="header">Due Date</div>
                          <div style="padding-top: 6px;"><?=$params['due_date']?></div>
                        </div>
                        <br>

                        <div class="measurements-main" data-option-index="0">
                          <div class="header" style="font-weight: 700;">Measurements</div>
                          <?php
                            foreach($params['measurements'] as $measurement){

                              echo '

                                <div class="spr-form-for-measurements" style="padding-bottom:10px;margin-top: 10px;" >
                                  <label class="spr-m-form-label" for="" style="padding-left:40px;">'.$measurement->measurement_type.'</label>
                                  <label class="spr-m-form-label" for="" style="padding-left:40px;">'.$measurement->measurement.'</label>
                                  
                                  
                                </div>
                              ';
                            }
                          ?> 
                        </div>
                        

                        <!-- <input placeholder=" # of inches"  class="spr-form-input spr-form-input-text"  style="position:absolute; right:250px; height:25px; width:100px; padding:5px 10px;" type="text" name="measuremnt'.$measurement->id.'" value="'.$measurement->measurement.'"aria-required="true" /> -->

                                          </div>
                                        </div>

                    

                        <div class="swatch color clearfix" data-option-index="1">
                          <div class="row">
                            <div class="header col-lg-12" style="font-weight: 700">Tailor-Note</div>
                          </div>
                          <div class="row" style="margin-left: 0px;margin-top: 15px;">
                            <div style="display:block;">
                              <ul style="list-style-type: circle;">
                    <?php 

                      if (is_array($params['response'])){
                        foreach ($params['responses'] as $response){

                          echo '<li
                          >'.$response->response .'</li>';
                          $count++;
                        }
                      }

                      else{
                        echo '<div style="color:red;">You do not have any response! </div>';
                      }
                      
                     ?>

                              </ul>
                            </div>
                      
                            
                          </div>                          
                        </div>

                        <br/>
                    
                      <div class="qty-add-cart">
                        <div class="action-button">
                          <!-- <input type="hidden" name="product-id" value="<?=$params['id']?>"> -->

                        <div class="row">
                          <div class="col-lg-6"><button id="ignore" class="btn btn-1" >IGNORE
                          </button> </div>
                          
                          <div class="col-lg-6"><button id="accept" class="btn btn-1 pull-right" >ACCEPT
                          </button> </div>

                        </div>
                          
                        </div>
                      </div>

                                        
                  <div class="people-in-cart">
                    <div class="img-user">
                      <a href="<?=PROOT?>CartController/cart/0"><img src="<?=PROOT?>assets/images/icon-cart.png" alt="Image"/>
                    </div>
                    <div class="people-block-text"></div>
                  </div>
                </div>
                <div id="pre-order-popup" style="display: none;">
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

<script type="text/javascript">
    

  $(document).ready(function(){
    var status= <?php echo $params['status']; ?>;
    if (status='0'){
      $('#ignore').prop('disabled',true);
      $('#accept').prop('disabled',true);
      $('#ignore').css('opacity', '0.5');
      $('#ignore').css('cursor','not-allowed');
      $('#accept').css('opacity', '0.5');
      $('#accept').css('cursor','not-allowed'); 
    }

    var btn_list=[];
    $('#ignore').click(function(){
      var icon =$(this);   

      var pr_id=JSON.stringify(<?=$params['id']?>);  
      var tailor_id=JSON.stringify(<?=$params['tailor_id']?>);  

      if (btn_list.length==0){ 
        btn_list.push(icon);


        $.ajax({
            url:"<?=PROOT?>CustomRequestController/Approval",
            method: "POST",
            data:{'id': pr_id,'user_id':tailor_id, 'status':'0'},
            success: function(data){
              console.log(data);

              $('#accept').css('opacity', '0.5');
              $('#accept').css('cursor','not-allowed');
              icon.css('opacity', '0.5');
              icon.css('cursor','not-allowed');
            }
        });
      }

    });

    $('#accept').click(function(){
      var icon =$(this);

      var pr_id=JSON.stringify(<?=$params['id']?>);  
      var tailor_id=JSON.stringify(<?=$params['tailor_id']?>); 

      if (btn_list.length==0){ 
        btn_list.push(icon);
        $.ajax({
            url:"<?=PROOT?>CustomRequestController/Approval",
            method:"POST",
            data: {'id': pr_id,'user_id':tailor_id, 'status':'1'},
            success: function(data){

              console.log(data);
              $('#ignore').css('opacity', '0.5');
              $('#ignore').css('cursor','not-allowed');
              $('#accept').css('opacity', '0.5');
              $('#accept').css('cursor','not-allowed');
            }
        });
      }

    });

    $('.fa-toggle-off').click(function(){      
      $.ajax({
        url:"<?=PROOT?>/CustomRequestController/Activation",
        method:"POST",
        data:{'data' : '1', 'product': <?=$params['id']?>}
      });
      $(this).toggleClass('fa-toggle-on');
      $(this).toggleClass('fa-toggle-off');
      
    });

    $('.fa-toggle-on').click(function(){      
      $.ajax({
        url:"<?=PROOT?>/CustomRequestController/Activation",
        method:"POST",
        data:{'data' : '0' , 'product': <?=$params['id']?>}
      });
      $(this).toggleClass('fa-toggle-off');
      $(this).toggleClass('fa-toggle-on');
      

      console.log($(this));
    });
    
    // function approval(state){
    //   var icon =$(this);

    //   var pr_id=JSON.stringify(<?=$params['id']?>);  
    //   var tailor_id=JSON.stringify(<?=$params['tailor_id']?>); 

    //   if (btn_list.length==0){ 
    //     btn_list.push(icon);
    //     $.ajax({
    //         url:"<?=PROOT?>CustomRequestController/Approval",
    //         method:"POST",
    //         data: {'id': pr_id,'user_id':tailor_id, 'status':state},
    //         success: function(data){

    //           console.log(data);
    //           $('#ignore').css('opacity', '0.5');
    //           $('#ignore').css('cursor','not-allowed');
    //           $('#accept').css('opacity', '0.5');
    //           $('#accept').css('cursor','not-allowed');
    //         }
    //     });
    //   }

    // }

  });


</script>



<?= $this->end(); ?>