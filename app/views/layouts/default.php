<!doctype html>

<html lang="en" class="js"> 

<head>
  <link rel="shortcut icon" href="<?=PROOT?>assets/images/icon-main.jpg" type="image/jpg" />
  
  <meta charset="UTF-8">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=3, user-scalable=0" />
  
  <link rel="canonical" href="https://arena-handy.myshopify.com/account/login" />
  <!-- Title and description -->

  <title>
    <?= $this->siteTitle(); ?>
  </title>

  <link href="<?=PROOT?>assets/css/bootstrap.4x.css" rel="stylesheet" type="text/css" media="all" />
  <link href="<?=PROOT?>assets/css/bc.style.scss.css" rel="stylesheet" type="text/css" media="all" />
  <link href="<?=PROOT?>assets/css/arenafont.css" rel="stylesheet" type="text/css" media="all" />
  <link href="<?=PROOT?>assets/css/bc_wl_cp_style.scss.css" rel="stylesheet" type="text/css" media="all" />
  
  <link href="<?=PROOT?>assets/fontawesome-free-5.8.1-web/css/all.css" rel="stylesheet" type="text/css" media="all" />
  <link href="<?=PROOT?>assets/plugin/jquery.plugin.css" rel="stylesheet" type="text/css" media="all" />
  <!--<link href="<?=PROOT?>assets/css/jquery.min.css" rel="stylesheet" type="text/css" media="all" />-->
  <script type="text/javascript" src="<?=PROOT?>assets/js/jquery-3.4.1.min.js"></script>
  <script type="text/javascript" src="<?=PROOT?>assets/js/bootstrap.min.js"></script>
  <style type="text/css">
    .header-container.bg-imagee{
      background-image:url(<?=PROOT?>assets/images/back-1.jpg);
  }

    .header-container.bg-image{
      animation: animateee 16s ease-in-out infinite;
    }

    .change-bg-unseen{
      background: rgba(230,255,230,0.5);
    }

    .change-bg-seen{
      background: rgba(255,240,255,0.5);
    }

    @keyframes animateee{
      0%,100%{
        background-image: url(<?=PROOT?>assets/images/back-1.jpg);
      }
      20%{
        background-image: url(<?=PROOT?>assets/images/back-2.jpg);
      }
      40%{
        background-image: url(<?=PROOT?>assets/images/back-3.jpg);
      }
      60%{
        background-image: url(<?=PROOT?>assets/images/back-4.jpg);
      }
      80%{
        background-image: url(<?=PROOT?>assets/images/back-5.jpg);
      }
    }

    ::-webkit-scrollbar {
      width: 5px;
    }
    
    .badge-counter{
            
      padding: 2px 4px;
      border-radius: 50%;
      background-color: red;
      color: white;
      font-size: 12px;
      display: inline-block;
      font-weight: 700;
      line-height: 1;
      text-align: center;
      white-space: nowrap;
      vertical-align: baseline;
      font-family: Roboto,sans-serif;
    }
    .noti {  
      text-decoration: none;
      padding: 15px 26px;
      position: relative;
      font-size: 45px;
      display: inline-block;
      color:#c1939e;
    }

    .a {
      color:#c1939e;
    }

    /*.noti .badge {
      position: absolute;
      top: 20px;
      right: 18px;
      padding: 2px 4px;
      border-radius: 50%;
      background-color: red;
      color: white;
      font-size: 12px;
    }*/
        .noti_Container ul {
            border-style: solid;
            border-width: 0px 0px 1px 0px;
            border-color: #F7E4EA;
            display:block;
            list-style:none;
            margin:0;
            padding:12px 10px;
            height: 50px;
            /*border: 0 0 3px 0 ;*/
            /*border:solid 2px rgba(100, 100, 100, .20);*/
            
        }

        .noti_Container ul:hover {
          background-color: #F7E4EA;
        }
        .noti_Container ul li{
            float:left;
            font:13px helvetica;
            font-weight:bold;
        }
        .noti_Container ul li a {
            text-decoration:none;
            color: black;
        }

        .noti_Container ul li a:hover {  
            color:           
            text-decoration:none;
            cursor:pointer;
        }
        
        .noti_Container {
            position:relative;
        }

        #notifications {
            display:none;
            width:430px;
            position:absolute;
            top: 95px;
            left: 374px;
            background:#FFF;
            border:solid 1px rgba(100, 100, 100, .20);
            -webkit-box-shadow:0 3px 8px rgba(0, 0, 0, .20);
            z-index: 50;
        }
        /* AN ARROW LIKE STRUCTURE JUST OVER THE NOTIFICATIONS WINDOW */
        #notifications:before { 
            position: absolute; 
            right:70px;       
            content: '';
            display:block;
            width:0;
            height:0;
            color:transparent;
            border:10px solid #CCC;
            border-color:transparent transparent #FFF;
            margin-top:-20px;
            margin-left:10px;
        }
        
        .HeadingNoti {
            display:block;
            background:#FFF;
            font-weight:bold;
            font-size:15px;    
            padding:8px;
            margin:0;
            border-bottom:solid 1px rgba(100, 100, 100, .30);
            margin-block-start: 1em;
            margin-block-end: 1em;
            margin-inline-start: 0px;
            margin-inline-end: 0px;
        }
        
        .seeAll {
            background:#F6F7F8;
            padding:8px;
            font-size:12px;
            font-weight:bold;
            border-top:solid 1px rgba(100, 100, 100, .30);
            text-align:center;
        }
        .seeAll a {
            color:#3b5998;
        }
        .seeAll a:hover {
            background:#F6F7F8;
            color:#3b5998;
            text-decoration:underline;
        }
        .footer-logo ul li i {
          color: #c1939e;
        }

    input[type="text"], input[type="password"], input[type="search"] {
      padding-left: 7px;
      padding-right: 7px;
      padding-top: 5px;
      padding-bottom: 5px;
    }
    .footer-heading{
      font-size: 18px;
    }

/*    account drop down
*/
    .dropdown-account {
      position: relative;
      display: inline-block;
      cursor: pointer;
    }    
    .dropdown-account i{
      cursor: pointer;
    }
    .dropdown-account-content {
      display: none;
      position: absolute;
      background-color: white;
      min-width: 130px;
      box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
      z-index: 1;
    }
    .dropdown-account-content a {
      color: black;
      padding: 10px 10px;
      text-decoration: none;
      display: block;
    }
    .dropdown-account:hover .dropdown-account-content {
      display: block;
    }
    .dropdown-account-content a:hover{
      color: #c1939e;
    }
    .dropdown-account-content a i{
      padding-right: 5px;
    }
  </style>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <?= $this->content('head'); ?>
  
</head>

<body class="templateCustomersLogin category-mode-false cata-grid-3 lazy-loading-img">
  
  <div class="boxed-wrapper">
    

      <div class="cart-sb">
          <div class="cart-sb-title">
            <span class="c-title">Notification</span>
            <span class="c-close">
              <i class="demo-icon icon-close" aria-hidden="true"></i>
            </span>
          </div>
          
          <div id="cart-info" class="shipping-true" style="height: 550px; max-height: 550px;">
            <div id="cart-content" class="cart-content">

        <div class="items">
          <?php 

          if (count($new)>0 || count($old)>0){  

            $all=array_merge($new,$old);
            $a=0;
            foreach($all as $noti){

                echo '
                <div class="made-for-new"></div>

                <div class="items-inner animated-'.$noti->id.'" >
                  <div class="cart-item-image">
                    <a href=""><img src="'.PROOT.'assets/images/1x_420x.jpg"></a>
                  </div>';     

                  if ($noti->seen==0){
                      echo '
                      <div class="cart-item-info id-num-'.$noti->id.' change-bg-unseen" style="width: 200px;padding-right: 0px;">';
                  }

                  else{
                      echo '
                    <div class="cart-item-info id-num-'.$noti->id.' change-bg-seen" style="width: 200px;padding-right: 0px;">';

                  }
                  

                  echo '
                    <div class="cart-item-title" style="text-align: left-align;position: absolute;top: 50%;left: 66%;margin-right: -50%;transform: translate(-50%, -50%);width: 185px;">

                        '.$noti->message.'
                      
                    </div>      

                  </div>

                </div>  
                ';

            }
            
          }
        
          else {
            echo '
            <div style="text-align: center; position: absolute; top: 50%;left: 50%; margin-right: -50%; transform: translate(-50%, -50%); font-style: italic;">
              You do not have any new notifications yet!
            </div>
            ';
          }
              
          ?>                
                
              </div>
              <!-- <div class="cart-item-quantity">
                      5
                    </div>
                    <div class="cart-item-price">
                      $100
                    </div> 

                  <div data-id="'.$noti->id.'" class="cart-close" title="remove">
                    <i class="demo-icon icon-close product-close" aria-hidden="true"></i>
                  </div>  -->
            </div>
          </div>

          <div class="cart-sb-title" style="position: absolute;bottom: 0px;width: 100%;margin-bottom: 0px;">
            <span class="c-title"><a href="" style="text-decoration: none; color: #fff;">See All</a></span>
          </div>

      </div>

    <div id="page-body" class="breadcrumb-color">      
      <div id="shopify-section-header" class="shopify-section">


<header class="header-content" data-stick="true" data-stickymobile="false">

  <div class="header-container layout-boxed bg-image">

    
      <div class="top-bar-textbox d-none d-lg-block" style="background-color: white; border-bottom: none;">
        <div class="textbox-container">

          <div class="container">

            
              <ul class="top-bar-list" style="">

                  <li><a href="<?=PROOT?>VendorController/AllVendors/1" title="Customer Request" >All Tailors</a></li>

                  <li><a href="<?=PROOT?>home/AboutUs" title="About us" >About us</a></li>

                  <li><a href="<?=PROOT?>home/ContactUs" title="Contact us" >Contact us</a></li>

                  <?php
                    if ($user->role == 1) {
                      echo '<li><a href="'.PROOT.'admin/newProducts" title="New Products"> New Products </a></li>';
                    }
                   ?>
                
              </ul>
            

            
              <div id="google_translate_element"></div>
             
          </div>

        </div>
      </div>
    

    <div class="top-bar d-none d-lg-block">
      <div class="container">
          <div class="row">

            
              <div class="top-bar-left col-lg-3">
                <ul class="list-inline">

                    <li class="customer-account lazyload waiting dropdown">

                        <?php if ($user->first_name!='') {
                        echo '   
                          <div class="dropdown-account" style="color:black;">  
                            <i class="demo-icon icon-user dropbtn" style="font-style: normal;">  '. $user->first_name . '</i>
                            <div class="dropdown-account-content">
                              <a href="'.PROOT.'account/myAccount"><i class="far fa-user-circle"></i> My account</a>
                              <a href="'.PROOT.'account/orderHistory"><i class="fab fa-opencart" style="font-size:10px;"></i> Order history</a>
                            </div>
                          </div>          

 
                        ';
                      } else {
                        echo '<a href="'.PROOT.'account/login" title="Account"><i class="demo-icon icon-user"></i>Login</a>';
                      } ?>


                    </li>


                    <!-- 
                    
                    <li class="wishlist-target">
                      <a href="/pages/wishlist-page" class="num-items-in-wishlist show-wishlist waiting" title="Wishlist">

                        <span class="wishlist-icon">                          
                          <i class="demo-icon icon-heart"></i>                          
                        </span>
                        Wishlist
                      </a>
                    </li>
                  

                    <li class="compare-target">
                      <a href="/pages/compare-page" class="num-items-in-compare show-compare waiting" title="Compare">

                        <span class="compare-icon">                          
                          <i class="demo-icon icon-compare"></i>                          
                        </span>
                        Compare
                      </a>
                    </li> -->
                  

                </ul>
              </div>
            
            <div class="top-bar-left col-lg-3"></div>

            <div class="top-bar-right col-lg-3"></div>

            <div class="top-bar-right col-lg-3">
              <ul class="list-inline">

                
                  <li class="customer-register lazyload waiting">
                    
                    <a href="<?php if (isset($user)) {echo PROOT . 'account/logout';} else {echo PROOT . 'account/register';} ?>" title="Register">
                      
                      <i class="demo-icon icon-pencil-2"></i>

                      <?php if (isset($user)) {
                        echo 'Logout';
                      } else {
                        echo 'Register';
                      } ?>
                    </a>
                    
                  </li>
                
              </ul>
            </div>


          </div>
      </div>
    </div>

    <div class="header-main">
      <div class="container">

        <div class="table-row">
          <div class="row">


            <div class="header-logo col-lg-2 col-md-12">
              
              
              <a href="<?=PROOT?>home" title="Tailor Mate" class="logo-site lazyload waiting">
                <img class=" lazyloaded" data-srcset="<?=PROOT?>assets/images/icon-main.jpg 1x, <?=PROOT?>assets/images/icon-main.jpg 2x" alt="Tailor Mate" style="max-width: 150px; border-radius: 50%;" srcset="<?=PROOT?>assets/images/icon-main.jpg 1x, <?=PROOT?>assets/images/icon-main.jpg 2x">
              </a>
            </div>

            <div class="header-right col-lg-10 col-md-12">
              <div class="col-md-2"></div>
              <div class="col-md-5">
                <div class="searchbox">

                  <form id="search" class="navbar-form search" action="<?=PROOT?>home/search" method="get">
                    <!-- <input type="hidden" name="type" value="product" /> -->
                    <input type="text" name="keywords" class="form-control"  placeholder="Search" autocomplete="off" />
                    <input type="hidden" name="page" value="0">
                    <button type="submit" class="search-icon">
                      <span class="lazyload waiting">

                        
                        <i class="demo-icon icon-search"></i>

                        

                      </span>
                    </button>
                  </form>

                  <div id="result-ajax-search">
                    <ul class="search-results"></ul>
                  </div>

                </div>
              </div>
              <div class="col-md-1">

                <a href="#" class="noti" id="noti_Button" style="color:#c1939e;" title="notification">
                    <span>
                      <i class="fas fa-bell noti-icon-style" style="background: rgba(255,255,255,0.5); color:black; font-size:30px;padding:5px 7px; border-radius:3px; position:absolute; top:0px; "></i>
                    </span>
                    <span class="badge-counter" style="position: absolute; top: 20px; left: 60px;">
                       <?= count($new)?>
                    </span>
                </a>
                
              </div>

              <div class="col-md-1"></div>

              <div class="col-md-1" style="height:36px;">

                  <?php 
                      if ($user->role==3){
                        echo '
                          <a href="'.PROOT.'CartController/cart/0" title="Your cart">
                            <span>
                              <i class="demo-icon icon-handy-cart" style="background: rgba(255,255,255,0.5); color:black; font-size:27px; padding:0 6px; border-radius:3px; position:absolute; top:0px;"></i>
                            </span>
                            <span class="badge-counter cartItemCount" style="position: absolute; top: 20px;right: 18px;">
                              '.$cartItemCount.'
                            </span>
                          </a>

                      ';
                      }

                      elseif ($user->role==2){

                        echo '
                         <a href="'.PROOT.'home/test" title="Sales"> 
                          <i class="fas fa-comments-dollar" style="background: rgba(255,255,255,0.5); color:black; font-size:30px;padding:5px; border-radius:3px;"></i>
                        </a>
                        ';
                      }



                   ?>

                
            </div>
            <div class="col-md-1"></div>
            <div class="col-md-1">
                <div class="header-phone-widget d-none d-lg-block">
                  <?php 
                    if ($user->role==2 || $user->role==3){
                      $sentence='';
                      $LinkPath='';
                      if ($user->role==2){
                        $sentence="Add-our-Designs";
                        $LinkPath="CustomerRequestView/1";

                      }                          
                      elseif ($user->role==3){
                        $sentence="Custom-Requests";
                        $LinkPath="ProductRequest/1";
                      }

                    echo '
                    
                    <div class="phone-icon lazyload waiting" style="position: relative; top: -25px;">
                      <a href="'.PROOT.'CustomRequestController/'.$LinkPath.'">
                      
                      <i class="fas fa-tshirt" style="background: rgba(255,255,255,0.5); color:black; font-size:30px;padding:5px 4px; border-radius:3px; position:absolute; top:7px; right:40px;" title='.$sentence.'></i>
                      </a>
                    </div>                  
                  
                    ';

                    }
                   ?>

                </div>
              </div>
              
            </div>

          </div>
        </div>

      </div>
    </div>

    
      

      <div class="header-navigation nav-boxed d-none d-lg-block">
        <div class="horizontal-menu dropdown-fix">
          <div class="sidemenu-holder">

            <nav class="navbar navbar-expand-lg">
              <div class="collapse navbar-collapse">
                <ul class="menu-list">

                  
                  <?php 
                    foreach($categories as $cat=>$subCat){

                      echo '
                      <li class="dropdown">
                      <a href="" class="dropdown-link">
                      <span>'.$cat.'</span>
                      </a>
                      <span class="expand"></span>

                      <ul class="dropdown-menu">';
                        // dnd($subCat);
                        foreach ($subCat as $sub){
                            
                            echo '<li>
                              <a tabindex="-1" href="'.PROOT.'home/ProductCategory/'.$sub[1].'/1">

                                <span>'.$sub[0].'</span>
                              </a>
                            </li>';

                            
                        }

                      echo '</ul>
                  </li>
                      ';
                      
                    }
                  ?>


                </ul>
              </div>
            </nav>

          </div>
        </div>
      </div>

    

    <div class="mobile-layout-bar d-lg-none">
  <ul class="m-block-icons list-inline">
    
    <li class="navbar navbar-responsive-menu">
      <div class="responsive-menu">
        Menu
        <span class="bar">ddddd</span>
        <span class="bar">jjjjj</span>
        <span class="bar">fffff</span>
      </div>
    </li>
    
    
    <li class="m-customer-account">
      <a href="<?=PROOT?>register/login" title="Account" class="lazyload waiting">
        
          <i class="demo-icon icon-user"></i>
        
      </a>
    </li>
    
  </ul>
</div>
</div>

        <!-- <div class="wrap-breadcrumb bw-color">
          <div id="breadcrumb" class="breadcrumb-holder container">

            <div class="row">
              
                <div class="col-lg-6 d-none d-lg-block">
                  <div class="page-title">Products</div>
                </div>
              
      
                <div class="col-lg-6 col-md-12 col-sm-12 col-12">
                  <ul class="breadcrumb">
                    
                    <li itemscope itemtype="http://data-vocabulary.org/Breadcrumb">
                      <a itemprop="url" href="/">
                        Home
                      </a>
                    </li>

                    <li class="active">Products</li>
                    
                  </ul>
                </div>
              </div>

            </div>
          </div>
 -->
  
</header>


</div>

<?= $this->content('body'); ?>

<div id="shopify-section-bottom" class="shopify-section">

    

<footer id="footer-content">
  <div id="shopify-section-footer" class="shopify-section">


<div class="footer-container layout-boxed">
  
    
      
      <div class="widget-social">
        <div class="container">
          
            <h4>Let’s Connect:</h4>
          

          <ul class="widget-social-icons list-inline">
  
  
  
  
  
    
    
    
    
  
    <li>
      <a target="_blank" rel="noopener" href="https://www.facebook.com/shopify/" title="Facebook">
        
          <i class="demo-icon icon-facebook"></i>
        
      </a>
    </li>
  
  
  
  
  
  
    
    
    
    
  
    <li>
      <a target="_blank" rel="noopener" href="https://www.twitter.com/shopify/" title="Twitter">
        
          <i class="demo-icon icon-twitter"></i>
        
      </a>
    </li>
  
  
  
  
  
  
    
    
    
    
  
    <li>
      <a target="_blank" rel="noopener" href="https://www.instagram.com/shopify/" title="Instagram">
        
          <i class="demo-icon icon-instagram"></i>
        
      </a>
    </li>
  
  
  
  
  
  
    
    
    
    
  
    <li>
      <a target="_blank" rel="noopener" href="https://www.pinterest.com/shopify/" title="Pinterest">
        
          <i class="demo-icon icon-pinterest-circled"></i>
        
      </a>
    </li>
  
  
  
  
  
  
    
    
    
    
  
    <li>
      <a target="_blank" rel="noopener" href="" title="Google">
        
          <i class="demo-icon icon-google"></i>
        
      </a>
    </li>
  
  
  
  
  
  
    
    
    
    
  
    <!-- <li>
      <a target="_blank" rel="noopener" href="" title="Github">
        
          <i class="demo-icon icon-github-circled-alt2"></i>
        
      </a>
    </li>
  
  
  
  
  
  
    
    
    
    
  
    <li>
      <a target="_blank" rel="noopener" href="" title="RSS">
        
          <i class="demo-icon icon-rss"></i>
        
      </a>
    </li>
  
  
  
  
  
  
    
    
    
    
  
    <li>
      <a target="_blank" rel="noopener" href="" title="Flickr">
        
          <i class="demo-icon icon-flickr"></i>
        
      </a>
    </li>
  
  
  
  
  
  
    
    
    
    
  
    <li>
      <a target="_blank" rel="noopener" href="" title="Bitbucket">
        
          <i class="demo-icon icon-bitbucket"></i>
        
      </a>
    </li>
  
  
  
  
  
  
    
    
    
    
  
    <li>
      <a target="_blank" rel="noopener" href="" title="Tumblr">
        
          <i class="demo-icon icon-tumblr"></i>
        
      </a>
    </li>
  
  
  
  
  
  
    
    
    
    
  
    <li>
      <a target="_blank" rel="noopener" href="" title="Dribbble">
        
          <i class="demo-icon icon-dribbble"></i>
        
      </a>
    </li>
  
  
  
  
  
  
    
    
    
    
  
    <li>
      <a target="_blank" rel="noopener" href="" title="Vimeo">
        
          <i class="demo-icon icon-vimeo"></i>
        
      </a>
    </li>
  
  
  
  
  
  
    
    
    
    
  
    <li>
      <a target="_blank" rel="noopener" href="" title="Delicious">
        
          <i class="demo-icon icon-delicious"></i>
        
      </a>
    </li>
  
  
  
  
  
  
    
    
    
    
  
    <li>
      <a target="_blank" rel="noopener" href="" title="Skype">
        
          <i class="demo-icon icon-skype"></i>
        
      </a>
    </li>
  
  
  
  
  
  
    
    
    
    
  
    <li>
      <a target="_blank" rel="noopener" href="" title="Digg">
        
          <i class="demo-icon icon-digg"></i>
        
      </a>
    </li>
  
  
  
  
  
  
    
    
    
    
  
    <li>
      <a target="_blank" rel="noopener" href="" title="Behance">
        
          <i class="demo-icon icon-behance"></i>
        
      </a>
    </li> -->
  
  
</ul>
        </div>
      </div>
    

    
      <div class="footer-widget">
        <div class="footer-inner container">
          <div class="table-row">
            <div class="row">   

              

                
                    
                    
              
                    <div class="col-lg-3 col-md-12 col-sm-12 col-12 d-none d-md-block">
                      <div class="footer-block footer-logo">

                        <h6 class="footer-heading">Who We Are</h6>
                        
                        <ul>
                          
                            
                            
                            <li class="f-logo">
                              <a href="/" title="Handy Store" class="logo-site lazyload waiting">
                                <img  class="lazyload" data-srcset="images/handylogo_225x.png"
                                      
                                     alt="Handy Store"
                                     style="max-width: 225px;" />
                              </a>
                            </li>
                          
                        
                          
                            <li> <!-- class=" lazyload waiting" -->
                              
                                <i class="demo-icon icon-phone"></i>

                              
                              <span>(+800) 123 456 7890</span>
                            </li>
                          
                          
                          
                            <li> <!-- class=" lazyload waiting -->"
                              
                              <i class="demo-icon icon-mail"></i>

                              
                              <span>example@example.com</span>
                            </li>
                          
                          
                          
                            <li><!-- <class=" lazyload waiting"> -->                              
                                <i class="demo-icon icon-location"></i>

                              
                              <span>102580 Santa Monica BLVD Los Angeles</span>
                            </li>
                          
                        </ul>

                      </div>
                    </div>

                  

              

                
                  
                    

                    
                    
                    <div class="col-lg-2 col-md-6 col-sm-12 col-12">
                      <div class="footer-block footer-menu">

                        
                        <h6 class="footer-heading">Quick Links</h6>

                        <ul class="f-list">
                          
                          <li><a href="<?=PROOT?>register/login" ><span>Login</span></a></li>
                          
                          <li><a href="<?=PROOT?>register/register"><span>Register</span></a></li>
                          
                          <li><a href="<?=PROOT?>home/aboutUs"><span>About Us</span></a></li>
                          
                          <li><a href="<?=PROOT?>home/contactUs"><span>Contact us</span></a></li>
                          
                          <li><a href="<?=PROOT?>orderController/orderList"><span>Orders</span></a></li>
                          
                        </ul>

                      </div>
                    </div>      
                    
              
                  

              

                
                  
                  
              
                  <div class="col-lg-3 col-md-6 col-sm-12 col-12">
                      <div class="footer-block footer-information">

                        
                        
                        <h6 class="footer-heading">Information</h6>

                        
                        

                         
                        
                        
                        
                        
                        
                        <div class="fb-content">
                           
                            <i class="demo-icon icon-phone"></i>
                          
                          <a href="">
                            <span class="text-1">Online Consultation</span>
                            <span class="text-2">Call: + 0123 456 789</span>
                          </a>
                        </div>
                        

                        
                        

                         
                        
                        
                        
                        
                        
                        <div class="fb-content">
                           
                            <i class="demo-icon icon-lifebuoy"></i>
                          
                          <a href="">
                            <span class="text-1">Customer Support</span>
                            <span class="text-2">Check our documentation</span>
                          </a>
                        </div>
                        

                        
                        

                         
                        
                        
                        
                        
                        
                        <div class="fb-content">
                           
                            <i class="demo-icon icon-question-circle-o"></i>
                          
                          <a href="">
                            <span class="text-1">F.A.Q.</span>
                            <span class="text-2">Check our F.A.Q.</span>
                          </a>
                        </div>
                        

                        
                        

                         
                        
                        
                        
                        
                        
                        <div class="fb-content">
                           
                            <i class="demo-icon icon-thumbs-up"></i>
                          
                          <a href="">
                            <span class="text-1">Big Community</span>
                            <span class="text-2">We have 245 positive reviews</span>
                          </a>
                        </div>
                        

                        

                      </div>
                    </div>

                  

              

                
                  
                    
                    <div class="col-lg-4 col-md-12 col-sm-12 col-12">
                      <div class="footer-block footer-subscribe">

                        
                        <h6 class="footer-heading">Subscribe to our Newsletter</h6>

                        <div class="content">

                          
                          <div class="subscibe-content">
                            
                            <p>Subscribe to our newsletters. Be in touch with latest news, special offers, etc.</p>
                            

                            <form action="<?=PROOT?>home/subscribeToNewsletter" method="post" class="form-inline form-subscribe" target="_blank" onsubmit="return validateSubscription();" >
                              <input class="form-control" type="email" placeholder="Email" name="subscribe-mail" id="subscribe-mail" />
                              <button type="submit" title="Subscibe" class="btn btn-subscribe">Subscibe</button>
                              <span id="error_subscribe-mail" style="padding-left: 20px; color: white;"></span>  
                            </form>
                            
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
      </footer>


</div>

    </div>
    

<script>
$(document).ready(function () {

    //Notification window
    $('.noti').on('click', function(){
        var newArray=JSON.stringify(<?php echo json_encode($new); ?>);
        var newArrayJs=<?php echo json_encode($new); ?>;
        if (newArray.length>0){
            icon=$(this);
            
            $(".cart-sb").addClass("opened");

            //close the Notification window
            $('.c-close').on('click', function(){

                $(".cart-sb").removeClass("opened");

                icon.children(".badge-counter").html('0'); 
                console.log(newArrayJs);
                for (var i = 0; i < newArrayJs.length; i++) {

                  var cl='.id-num-'+newArrayJs[i].id;
                  console.log(cl);
                  $(cl).removeClass("change-bg-unseen");
                  $(cl).addClass("change-bg-seen");
                }
            });   


            $.ajax({  

                url:"<?=PROOT?>NotificationController/updateSeenNotification",
                method: "POST",
                data:{'new': newArray },
                success: function(data){
                    var array_new=JSON.parse(data);
                }
            }); 
      }


    });                    
      
    setInterval(function(){  //setInterval();
        $.ajax({   
            url:"<?=PROOT?>NotificationController/newNotification",
            method: "POST",
            success: function(data){
              
                if(data.status=='true'){
                    var newNotification=JSON.parse(data);
                    notificationList = newNotification.new; 
                    displayNewNotification(notificationList);
                    $('.badge-counter').html(notificationList.length);
                }
            }
        }); 

    },5000);

    $('#noti_Button').click(function () { 
        $('#notifications').fadeToggle('fast', 'linear');

        $('#noti_Counter').fadeOut('slow');
       
        return false;
        
    });

    $(document).click(function () {
        $('#notifications').hide();
        //$('#noti_Counter').html()='0';
    });

    $('#notifications').click(function () {

        return false; 
    });
});

function displayNewNotification(noti){

    line_1='<div class="cart-item-image"><a href=""><img src="'+<?=PROOT?>+'assets/images/1x_420x.jpg"></a></div>';
    if (noti.seen=='0'){
        line_2='<div class="cart-item-info id-num-'+noti.id+' change-bg-unseen" style="width: 200px;padding-right: 0px;">';
    }

    else{
        line_2='<div class="cart-item-info id-num-'+noti.id+' change-bg-seen" style="width: 200px;padding-right: 0px;">';
    }

    line_3='<div class="cart-item-title" style="text-align: left-align;position: absolute;top: 50%;left: 66%;margin-right: -50%;transform: translate(-50%, -50%);width: 185px;"'+noti.message+'</div></div>';

    var newClass='items-inner animated-'+noti.id;

    $('.made-for-new').addClass(newClass);
    $('.'+newClass).removeClass("made-for-new");
    $('.'+newClass).html(line_1+line_2+line_3);

  }

</script>
<script type="text/javascript">
  
  function validateSubscription(){
                  
      document.getElementById('error_subscribe-mail').innerHTML = "";
                                    
      var email = document.getElementById("subscribe-mail").value;
      var el;

      var email_regex = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/

      if (email == "")
      {
          el = document.getElementById('error_subscribe-mail');
          el.innerHTML = "Email field is required!";
          return false;
      }
      else if (!email_regex.test(email))
      {
          el = document.getElementById('error_subscribe-mail');
          el.innerHTML = "Please enter valid email!";
          return false;
      }
      else
      {
          return true;
      }
  }

</script>
</body>
</html>
