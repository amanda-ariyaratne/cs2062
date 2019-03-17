<!doctype html>
<!--[if IE 8]><html lang="en" class="ie8 js"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--><html lang="en" class="js"> <!--<![endif]-->

<head>
  <link rel="shortcut icon" href="<?=PROOT?>assets/images/logo.jpg" type="image/png" />
  
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
  <link type="text/css" rel="stylesheet" charset="UTF-8" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

  <?= $this->content('head'); ?>
  
</head>

<body class="templateCustomersLogin category-mode-false cata-grid-3 lazy-loading-img">
  
  <div class="boxed-wrapper">
    
    <div class="new-loading"></div>     
      <div class="cart-sb">
        <form action="/cart" method="post">    
          <div class="cart-sb-title">
            <span class="c-title">Your Cart</span>
            <span class="c-close"><i class="demo-icon icon-close" aria-hidden="true"></i></span>
          </div>
          
          <div id="cart-info" class="shipping-true">
            <div id="cart-content" class="cart-content">
              <div class="cart-loading"></div>
            </div>
          </div>
        </form>
      </div>

    <div id="page-body" class="breadcrumb-color">      
      <div id="shopify-section-header" class="shopify-section">
        <header class="header-content" data-stick="true" data-stickymobile="false">

  <div class="header-container layout-boxed bg-image">

    
      <div class="top-bar-textbox d-none d-lg-block">
        <div class="textbox-container">

          <div class="container">

            
              <ul class="top-bar-list">
                
                  <li><span>30 days</span> free return</li>
                
                  <li><span>Free</span> delivery</li>

                  <li><span>Best</span> Islandwide delivery</li>
                
              </ul>
            

            
              <div id="google_translate_element"></div>
             
          </div>

        </div>
      </div>
    

    <div class="top-bar d-none d-lg-block">
      <div class="container">
          <div class="row">

            
              <div class="top-bar-left col-lg-6">
                <ul class="list-inline">

                    <li class="customer-account lazyload waiting">
                        <a href="<?=PROOT?>register/login" title="Account">
<<<<<<< HEAD
                          
                        <i class="demo-icon icon-user"></i>
                          Login
=======
                        <i class="demo-icon icon-user"></i>Login
>>>>>>> 815a885c25b8084b528cce00068a074ca9e4c64f
                        </a>
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
            


            <div class="top-bar-right col-lg-6">
              <ul class="list-inline">

                
                  <li class="customer-register lazyload waiting">
                    
                    <a href="/account/register" title="Register">
                      
                      <i class="demo-icon icon-pencil-2"></i>

                      Register
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

            <div class="header-logo col-lg-3 col-md-12">
              
              
              <a href="#" title="Handy Store" class="logo-site lazyload waiting">
                <img class=" lazyloaded" data-srcset="images/handylogo_225x.png 1x, image/handylogo_450x.png 2x" alt="Handy Store" style="max-width: 225px;" srcset="images/handylogo_225x.png 1x, images/handylogo_450x.png 2x">
              </a>
            </div>

            <div class="header-right col-lg-9 col-md-12">
              <div class="col-md-1">
              </div>
              <div class="col-md-6">
                <div class="searchbox">

                  <form id="search" class="navbar-form search" action="/search" method="get">
                    <input type="hidden" name="type" value="product" />
                    <input id="bc-product-search" type="text" name="q" class="form-control"  placeholder="Search" autocomplete="off" />

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

               <div class="col-md-4">
                <div class="header-phone-widget d-none d-lg-block">
                  
                  
                    <div class="phone-icon lazyload waiting" style="position: relative; top: -25px;">
                      <i class="demo-icon icon-phone"></i>                    
                    </div>
                  
                  
                    <div class="text">
                      <span class="text-1">Call us</span>
                      <span class="text-2">(+94) 123 456 789</span>
                    </div>
                  

                </div>
              </div>
              
                <div class="col-md-1">
              <div class="header-icons d-none d-lg-block">
                <ul class="list-inline"> 

                     
                  <li class="top-cart-holder">
                    <div class="cart-target">   

                      
                      <a href="javascript:void(0)" class="basket cart-toggle lazyload waiting" title="cart">
                        
                        <i class="demo-icon icon-handy-cart"></i>

                        

                        <span class="number"><span class="n-item">0</span></span>
                      </a>

                      

                    </div>
                  </li>            
                  

                </ul>
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

                  <li>
                    <a href="<?=PROOT?>home/ProductList/1" class="dropdown-link">
                    <span>All Products</span>
                    </a>
                  </li>
                  
              
                  <li class="dropdown">
                      <a href="0" class="dropdown-link">
                      <span>Men</span>
                      </a>
                      <span class="expand"></span>

                      <ul class="dropdown-menu">

                          <li><a tabindex="-1" href="2"><span>T-Shirts</span></a></li>

                          <li><a tabindex="-1" href="1"><span>Shirts</span></a></li>

                          <li><a tabindex="-1" href="3"><span>Sweate Shirts & Hoodies</span></a></li>

                          <li><a tabindex="-1" href="4"><span>Tank Tops</span></a></li>

                          <li><a tabindex="-1" href="#"><span>Trousers</span></a></li>
                         
                          <li><a tabindex="-1" href="#"><span>Sarongs</span></a></li>

                      </ul>
                  </li>

                  <li class="dropdown">
                  <a href="#" class="dropdown-link">
                  <span>Women</span>
                  </a>
                  <span class="expand"></span>

                  <ul class="dropdown-menu">

                          <li><a tabindex="-1" href="#"><span>T-shirts and Tops</span></a></li>                          

                          <li><a tabindex="-1" href="#"><span>Tank Tops</span></a></li>
                         
                          <li><a tabindex="-1" href="#"><span>Sweater and Hoodies</span></a></li>

                          <li><a tabindex="-1" href="#"><span>Dresses</span></a></li>

                          <li><a tabindex="-1" href="#"><span>Mini-Skirts</span></a></li>

                          <li><a tabindex="-1" href="#"><span>Leggings</span></a></li>

                          <li><a tabindex="-1" href="#"><span>Scraves</span></a></li>

                      </ul>
                  </li>

                  <li class="dropdown">
                  <a href="#" class="dropdown-link">
                  <span>Kids</span>
                  </a>
                  <span class="expand"></span>

                  <ul class="dropdown-menu">

                          <li><a tabindex="-1" href="#"><span>Kids T-shirtd</span></a></li>

                          <li><a tabindex="-1" href="#"><span>Baby T-shirts</span></a></li>

                          <li><a tabindex="-1" href="#"><span>Baby one piece</span></a></li>

                          <li><a tabindex="-1" href="#"><span>Baby dresses</span></a></li>
                          
                          <li><a tabindex="-1" href="#"><span>Baby skirts</span></a></li>

                          <li><a tabindex="-1" href="#"><span>Baby leggings</span></a></li>

                          <li><a tabindex="-1" href="#"><span>Baby trousers</span></a></li>

                      </ul>
                  </li>

                  <li class="dropdown">
                  <a href="#" class="dropdown-link">
                  <span>Sarees</span>
                  </a>
                  <span class="expand"></span>


                  <ul class="dropdown-menu">

                          <li><a tabindex="-1" href="#"><span>Kandian Saree</span></a></li>

                          <li><a tabindex="-1" href="#"><span>Indian Saree</span></a></li>

                          <li><a tabindex="-1" href="#"><span>Western Saree</span></a></li>

                          <li><a tabindex="-1" href="#"><span>Bathik Saree</span></a></li>
                          
                          <li><a tabindex="-1" href="#"><span>Cotton Saree</span></a></li>

                          <li><a tabindex="-1" href="#"><span>Wedding Saree</span></a></li>

                          <li><a tabindex="-1" href="#"><span>Silk Saree</span></a></li>

                          <li><a tabindex="-1" href="#"><span>Saree Jackets</span></a></li>
                          
                      </ul>
                  </li>

                  <li class="dropdown">
                  <a href="#" class="dropdown-link">
                  <span>Home Decor</span>
                  </a>
                  <span class="expand"></span>


                  <ul class="dropdown-menu">

                          <li><a tabindex="-1" href="#"><span>Pillows and Cushions</span></a></li>

                          <li><a tabindex="-1" href="#"><span>Duvel Covers</span></a></li>

                          <li><a tabindex="-1" href="#"><span>Wall Taperstries</span></a></li>

                          <li><a tabindex="-1" href="#"><span>Curtains</span></a></li>
                          
                      </ul>
                  </li>


                  
                  <li class="dropdown">
                  <a href="#" class="dropdown-link">
                  <span>Uniforms</span>
                  </a>
                  <span class="expand"></span>

                  <ul class="dropdown-menu" >

                        <li class="dropdown dropdown-submenu">
                          <a href="#" class="dropdown-link">
                            <span>Girl's</span>    
                          </a>    
                          <span class="expand"></span>    
                          <ul class="dropdown-menu">

                                <li><a tabindex="-1" href="#"><span>Sirimavo B. Vidyalaya</span></a></li>

                                <li><a tabindex="-1" href="#"><span>SPM</span></a></li>

                                <li><a tabindex="-1" href="#"><span>Musaeus College</span></a></li>
                          </ul>
                        </li>


                         <li class="dropdown dropdown-submenu">
                          <a href="/collections/birthday-gifts" class="dropdown-link">
                            <span>Boy's</span>    
                          </a>    
                          <span class="expand"></span>    
                          <ul class="dropdown-menu">

                                <li><a tabindex="-1" href="#"><span>St.Peter's College</span></a></li>

                                <li><a tabindex="-1" href="#"><span>Common</span></a></li>

                                <li><a tabindex="-1" href="#"><span>Lyceum I. School</span></a></li>

                                <li><a tabindex="-1" href="#"><span>Royal Institute</span></a></li>
                          </ul>
                        </li>

                          
                      </ul>
                  </li>


                  <li class="dropdown">
                  <a href="#" class="dropdown-link">
                  <span>Bags</span>
                  </a>
                  <span class="expand"></span>

                  <ul class="dropdown-menu">

                          <li><a tabindex="-1" href="#"><span>Tote Bags</span></a></li>

                          <li><a tabindex="-1" href="#"><span>Studio Pouches</span></a></li>

                          <li><a tabindex="-1" href="#"><span>Drowstring Bags</span></a></li>

                          <li><a tabindex="-1" href="#"><span>Laptop Sleeves</span></a></li>
                          
                      </ul>
                  </li>


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
        <span class="bar"></span>
        <span class="bar"></span>
        <span class="bar"></span>
      </div>
    </li>
    
    
    <li class="m-customer-account">
      <a href="/account" title="Account" class="lazyload waiting">
        
          <i class="demo-icon icon-user"></i>
        
        
      </a>
    </li>
    
  </ul>
</div>
</div>
  
</header>

</div>

<?= $this->content('body'); ?>

<div id="shopify-section-bottom" class="shopify-section">



</div>

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

                        <h6>Who We Are</h6>
                        
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

                        
                        <h6>Quick Links</h6>

                        <ul class="f-list">
                          
                          <li><a href="/account/login"><span>Login</span></a></li>
                          
                          <li><a href="/account/register"><span>Register</span></a></li>
                          
                          <li><a href="/pages/about-us"><span>About Us</span></a></li>
                          
                          <li><a href="/pages/contact-us"><span>Contact us</span></a></li>
                          
                          <li><a href="/pages/shipping-returns"><span>Shipping and Refund</span></a></li>
                          
                        </ul>

                      </div>
                    </div>      
                    
              
                  

              

                
                  
                  
              
                  <div class="col-lg-3 col-md-6 col-sm-12 col-12">
                      <div class="footer-block footer-information">

                        
                        
                        <h6>Information</h6>

                        
                        

                         
                        
                        
                        
                        
                        
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

                        
                        <h6>Subscribe to our Newsletter</h6>

                        <div class="content">

                          
                          <div class="subscibe-content">
                            
                            <p>Subscribe to our newsletters. Be in touch with latest news, special offers, etc.</p>
                            

                            <form action="//bitcode.us10.list-manage.com/subscribe/post?u=55ec8b9611a3d9c0ad6f3fc62&amp;id=1cbb85b057" method="post" class="form-inline form-subscribe" name="mc-embedded-subscribe-form" target="_blank" rel="noopener">
                              <input class="form-control" type="email" required placeholder="Email" name="EMAIL" id="email-input" />
                              <button type="submit" title="Subscibe" class="btn btn-subscribe">Subscibe</button>
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
    
<!--       <div id="scroll-to-top" title="Back To Top">
        <a href="javascript:;"><i class="fa fa-angle-up"></i></a>
      </div> -->


  <div id="mailchimp-popup" class="leaves" style="display:none;" class="" data-expires="1" data-style="leaves">    
    
    
      <div class="underlay"></div>
      <div class="wrap-modal intent-exit-btn">
        <a href="javascript:void(0);"><i class="demo-icon icon-close"></i></a>
        <div class="modal-body">
          <div class="mailchimp-popup-content">
            
            <h3 class="title">Join Our Newsletter</h3>
            

            
            <div class="mailchimp-caption-1">Subscribe to the Handy newsletter to receive timely updates from your favorite products.</div>
            

            <form id="mc-form" action="//bitcode.us10.list-manage.com/subscribe/post?u=55ec8b9611a3d9c0ad6f3fc62&amp;id=1cbb85b057" method="post" name="mc-embedded-subscribe-form" target="_blank" rel="noopener">
              <input id="mc-email" class="input-block-level" type="email" name="EMAIL" placeholder="Your email..." required />
              <button class="btn btn-1" type="submit">Subscribe</button>
            </form>
          </div>   

          
            <div class="mailchimp-popup-img lazyload">
              <img  class="lazyload" data-src="//cdn.shopify.com/s/files/1/0102/1155/7435/t/10/assets/mailchip_popup_bg.jpg?14659776434252394535" alt="" />
            </div>
          
        </div>        
      </div>
    

  </div>

    <div id="quick-shop-popup" class="modal fade" role="dialog" aria-hidden="true" tabindex="-1">
  <div class="modal-dialog fadeIn animated">
    <div class="modal-content">

      <div class="modal-header">
        <span class="close" title="Close" data-dismiss="modal" aria-hidden="true"></span>
      </div>

      <div class="modal-body">

          <div class="product-image">
            <div id="qs-product-image" class="product-image-inner"></div>
          </div>

          <div class="product-info">
            
            <h2 id="qs-product-title">Sample Product</h2>
            
            <div id="qs-rating"></div>
            <div id="qs-product-price" class="detail-price"></div>

            <div id="qs-action-wrapper">

              <form action="/cart/add" method="post" class="variants" id="qs-product-action" enctype="multipart/form-data">

                <div id="qs-product-variants" class="variants-wrapper"></div>
                
                <div id="qs-description"></div>
                
                <div class="quantity-product qs-quantity-product">                 
                  <div class="quantity qs-quantity"></div>
                </div>

                <div class="qs-product-button">
                  <div class="qs-action">
                    <button id="qs-add-cart" class="btn btn-1 add-to-cart" type="submit" name="add">Add to cart</button>
                  </div>
                </div>

              </form>

            </div>
            
            <div class="share-links social-sharing" id="qs-social-share">
              
              

              <ul class="list-inline">
                <li>
                  <a onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=380,width=660');return false;" href="https://twitter.com/share?url=_bc_product_uri_" class="social twitter" title="Share this post on Twitter">
                    <i class="fa fa-twitter"></i>
                    <span>Twitter</span>
                  </a>
                </li>

                <li>
                  <a onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=380,width=660');return false;" href="http://www.facebook.com/sharer.php?u=_bc_product_uri_" class="social facebook" title="Share this post on Facebook">
                    <i class="fa fa-facebook"></i>
                    <span>Facebook</span>
                  </a>
                </li>

                <li>
                  <a onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=380,width=660');return false;" href="https://plus.google.com/share?url=_bc_product_uri_" class="social google-plus" title="Share this post on Google Plus">
                    <i class="fa fa-google-plus"></i>
                    <span>Google+</span>
                  </a>
                </li>
              </ul>
              
            </div> 

          </div>

      </div>

    </div>
  </div>
</div>
    
      <!-- <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/3.0.3/cookieconsent.min.css" />
    -->
</body>
</html>
