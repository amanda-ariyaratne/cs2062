
<?= $this->setSiteTitle( $params['pr_name'].'-TailorMate') ?>

<?= $this->start('head'); ?>

<link href="<?=PROOT?>assets/css/productView.css" rel="stylesheet" type="text/css" media="all" />
<link href="<?=PROOT?>assets/css/toggle.css" rel="stylesheet" type="text/css" media="all" />
<link href="<?=PROOT?>assets/css/chat.css" rel="stylesheet" type="text/css" media="all" />
<link href="<?=PROOT?>assets/css/section.css" rel="stylesheet" type="text/css" media="all" />
<link href="<?=PROOT?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" media="all" />

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


    .text-align-center{
      vertical-align: middle;
    }

    .respond{
      width: 599px;
      height: auto;
      min-height:30px;
      margin: 10px;
      box-shadow: 0 0 5px #c1939e;
      border-radius: 5px;
      padding:5px 0; 
    }

    .response-pack{
      padding:0 0 0 0 !important;     
    }

  /*modal css start*/

    .modal{
      position:fixed;
      top:0;right:0;bottom:0;left:0;
      z-index:1050;
      display:none;
      overflow:hidden;
      -webkit-overflow-scrolling:touch;
      outline:0;
    }

    .modal-open .modal{overflow-x:hidden;overflow-y:auto}

    .modal-dialog{
      position:relative;margin:10px; width: 900px; height:500px; border-radius: 5px;
    }

    .modal-content{
      border-radius:25px !important;
      border: 20px solid #000;
      width: 600px;
      height:600px;  
      position:relative; 
      background-color:#fff; 
      background-clip:padding-box; 
      border:1px solid #999;
      border:1px solid rgba(0,0,0,.2);
      -webkit-box-shadow:0 3px 9px rgba(0,0,0,.5);
      box-shadow:0 3px 9px rgba(0,0,0,.5);
      outline:0
    }

    .modal-header{vertical-align: middle; width:600px;padding:15px;border-bottom:1px solid #e5e5e5}

    .close{float:right;font-size:21px;font-weight:700;line-height:1;color:#000;text-shadow:0 1px 0 #fff;filter:alpha(opacity=20);opacity:.2}

    .modal-header .close{margin-top:-2px}

     button.close{padding:0;cursor:pointer;background:0 0;border:0;-webkit-appearance:none;-moz-appearance:none;appearance:none}

    .modal-title{margin:0;line-height:1.42857143}

    .modal-body{
      position:relative;
      padding:15px; 
      width: 595px;
      height:600px;  
      overflow: scroll;
    }

    .modal-footer{height:120px;  padding:15px;text-align:left;border-top:1px solid #e5e5e5; text-align: left;}

    .modal-footer .btn+.btn{margin-bottom:0;margin-left:5px}

    .modal-footer .btn-group .btn+.btn{margin-left:-1px}

    .modal-footer .btn-block+.btn-block{margin-left:0}


    @media (min-width:768px){
      .modal-dialog{width:600px;margin:30px auto}
      .modal-content{width:600px !important;-webkit-box-shadow:0 5px 15px rgba(0,0,0,.5);box-shadow:0 5px 15px rgba(0,0,0,.5)}
      .modal-sm{width:300px}
    }

    @media (min-width:992px){
      .modal-lg{width:900px;
      }
    }

  /*modal css end*/

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

          <a class="col-lg-1" style="text-align:right;"><i class="fa '.$class.'"  title="Visibility to the TAILORS" style="color: #000; opacity: 0.5; font-size: 30px;cursor: pointer;"></i></a>

          <a href="'.PROOT.'CustomRequestController/ProductRequestEdit/'.$params["id"].'" class="col-lg-1" style="text-align:right;"><i class="fas fa-edit" title="add new product" style="color: #000; opacity: 0.5; font-size: 25px;cursor: pointer;"></i></a>

          <a class="col-lg-1" style="text-align:right;"><i class="fa fa-trash" id="deleteBtn" title="Delete" style="color: #000; opacity: 0.5; font-size: 25px;cursor: pointer;"></i></a>

          


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

          <!-- <link itemprop="availability" href="http://schema.org/InStock" /> -->
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

        <div class="swatch color clearfix" data-option-index="1">
          <div class="header">Postal Code</div>
          <div style="padding-top: 6px;"><?=$params['location']?></div>
        </div>

        <div class="swatch color clearfix" data-option-index="1">
          <div class="header">Due Date</div>
          <div style="padding-top: 6px;"><?=$params['due_date']?></div>
        </div>

        <div data-option-index="0">
          <div class="swatch color clearfix header" style="font-weight: 800;">Measurements</div>
          
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
    
      <div style="font-weight: 700">Tailor-Note</div>    
      <br/>  

<?php 

        /////  First view of Responses /////
        if ($params['responses-new'] || $params['responses-old']){
          foreach ($params['responses-new'] as $response){

            echo '
              
              <div class="row respond text-align-center" data-toggle="modal" data-target="#myModal" style="cursor:pointer;" data-id="'.$response->tailor_id.'">
                <div class="col-lg-1">
                  <img src="'.PROOT.'assets/images/store_logo/'.$response->avatar.'" alt="Avatar" style="width:100%;">
                </div>

                <div class="col-lg-2 response-pack" style="font-weight:600; font-style:italic;">
                  '.$response->tailor.'
                </div>

                <div class="col-lg-8 response-pack">'.$response->response.'</div>

                <div class="col-lg-1" style="text-align:center;">
                    <span>
                      <i class="fa fa-check" data-id="" style="color:green;" aria-hidden="true"></i>
                    </span>
                    <span></span>
                    <span>
                      <i class="fa fa-window-close" data-id="" style="color:red; cursor: pointer;" aria-hidden="true"></i>
                    </span>                  
                </div>

              </div>
              ';
            $count++;
          }

        }
        else{
          echo '<div style="color:red;">You do not have any response!</div>';
        }

        /////  end of First view of Responses /////

        
?> 

  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">

        <div class="modal-header">
          <h4 class="modal-title"  style="text-align: left;"><?=$response->tailor?></h4>
          <i class="fa fa-times close" aria-hidden="true" data-dismiss="modal"></i>
        </div>

        <div class="modal-body">
        </div>


        <div class="modal-footer">
          <span class="media mt-3 shadow-textarea" style="width: 500px;margin-right: 50px;">
            <img class="d-flex rounded-circle avatar z-depth-1-half mr-3" src="https://mdbootstrap.com/img/Photos/Avatars/avatar-8.jpg"
              alt="Generic placeholder image">
            <div class="media-body" style="margin: auto;width: 50%;box-shadow: 5px 5px 5px 5px #c1939e;height: 40px;">

              <div class="form-group basic-textarea rounded-corners">

                <div class="row" style="width: 445px;">

                  <div class="col-lg-11">
                    <textarea class="form-control z-depth-1" id="chatTextArea" rows="3" placeholder="Write your comment..." style="width: 400px;"></textarea>
                  </div>

                  <div class="col-lg-1" style="padding: 8px 0 0 10px ">
                    <i class="fa fa-paper-plane" id="send-trigger" style="font-size: 20px; text-align: right; cursor: pointer;color:#c1939e;" aria-hidden="true"></i>          
                  </div>
                </div>

              </div>
            </div>
          </span>

        </div>

      </div>
    </div>
  </div>
  <!-- chat ends -->



  <!-- chat start -->
  <!-- <div class="chat">
    <div class="chat-area">

       <?php 

       foreach ($params['responses'] as $response){
        echo '

          <div class="container-chat">
            <img src="'.PROOT.'assets/images/store_logo/'.$response->avatar.'" alt="Avatar" style="width:100%;">
            <p>'.$response->response.'</p>
            <span class="time-right">11:00</span>
          </div>

          <div class="container-chat darker">
            <img src="'.PROOT.'assets/images/store_logo/'.$response->avatar.'" alt="Avatar" class="right" style="width:100%;">
            <p>'.$response->response.'</p>
            <span class="time-left">11:01</span>
          </div>

        ';

       }

        ?>       

    </div>

    <span class="media mt-3 shadow-textarea" style="width: 400px; ">
      <img class="d-flex rounded-circle avatar z-depth-1-half mr-3" src="https://mdbootstrap.com/img/Photos/Avatars/avatar-8.jpg"
        alt="Generic placeholder image">
      <div class="media-body" style="margin: auto;width: 50%;box-shadow: 5px 5px 5px 5px #c1939e;height: 40px;">

        <div class="form-group basic-textarea rounded-corners">
          <div class="row">
            <div class="col-lg-10">
              <textarea class="form-control z-depth-1" id="exampleFormControlTextarea345" rows="3" placeholder="Write your comment..."></textarea>
            </div>
            <div class="col-lg-2" style="padding-top: 8px;">
              <i class="fa fa-paper-plane" style="font-size: 20px; text-align: right; cursor: pointer;" aria-hidden="true"></i>          
            </div>
          </div>

        </div>
          

      </div>
    </span>

  </div> -->
  <!-- chat ends -->

  </div>                 

  <div class="qty-add-cart">
    <div class="action-button">

    <div class="row">
      <div class="col-lg-6"><button id="ignore" class="btn btn-1" >IGNORE
      </button> </div>
      <div class="col-lg-6"><button id="accept" class="btn btn-1 pull-right" >ACCEPT
      </button> </div>

    </div>
      
    </div>
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
    var tailor_id='';
      var pr_id=JSON.stringify(<?=$params['id']?>);  
      var customer_id=JSON.stringify(<?= currentUser()->id ?>);

      if (status=='0'){
        $('#ignore').prop('disabled',true);
        $('#accept').prop('disabled',true);
        $('#ignore').css('opacity', '0.5');
        $('#ignore').css('cursor','not-allowed');
        $('#accept').css('opacity', '0.5');
        $('#accept').css('cursor','not-allowed'); 
      }

      $('.respond').click(function(){
        var icon =$(this);         
        var tailor_id=JSON.stringify(icon.data("id"));  

        $.ajax({
            url:"<?=PROOT?>home/getConversation",
            method: "POST",
            data:{'product_id': pr_id,'tailor_id':tailor_id, 'customer_id':customer_id},

            success: function(data){
              var data=JSON.parse(data);
              $('.modal-body').html(doForAll(data));
            }

        });
      });    

      var btn_list=[];

      function doForAll(data){
        var chat="";
        for (var i = data.length - 1; i >= 0; i--) {
          chat=chat+setConversation(data[i]);
        }
        return chat;
      }

      function setConversation(item){
        var avatar=item.avatar;
        var response=item.response;
        var sender=item.sender;
        var time=item.created_at;

        var reciever="<div class='container-chat'><img src='<?=PROOT?>assets/images/store_logo/"+avatar+ "' alt='Avatar' style='width:100%;'><p>"+response+"</p><span class='time-right'>"+time+"</span></div>" ; 

        var sender="<div class='container-chat darker-chat'><img src='<?=PROOT?>assets/images/store_logo/"+avatar+ "' alt='Avatar' class='right' style='width:100%;'><p>"+response+"</p><span class='time-left'>"+time+"</span></div>" ;

        if (item.sender=="t"){
          return reciever;
        }
        else{
          return sender;          
        }
      }

      $('#send-trigger').click(function(){
        var response=$('#chatTextArea').val();
        var time='just now';


        // check this part
        // var avatar=<?=$params['myAvatar']?>;

        var avatar='logo-2019-05-11-06-17-03pm-1.jpg';
        

        console.log(avatar);

        var send="<div class='container-chat darker-chat'><img src='<?=PROOT?>assets/images/store_logo/"+avatar+ "' alt='Avatar' class='right' style='width:100%;'><p>"+response+"</p><span class='time-left'>"+time+"</span></div>" ;

        $('.modal-body').append(send);

        var product_id=JSON.stringify(<?php echo $params['id'];?>);
        var sender='c';
        var tailor=JSON.stringify(tailor_id);

        $.ajax({
          url:"<?=PROOT?>CustomRequestController/sendResponse",
          method:"POST",
          data:{'response':response,'sender':sender, 'product_id':product_id, 'tailor_id':tailor},
          success:function(data){
            console.log('done..');
          }
        });


      });

      $('#ignore').click(function(){
        var icon =$(this);   

        if (btn_list.length==0){ 
          btn_list.push(icon);


          $.ajax({
              url:"<?=PROOT?>CustomRequestController/Approval",
              method: "POST",
              data:{'id': pr_id,'user_id':tailor_id, 'status':'0'},
              success: function(data){

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
      
    });


</script>



<?= $this->end(); ?>