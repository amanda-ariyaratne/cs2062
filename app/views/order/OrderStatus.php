<?= $this->setSiteTitle('Order Status') ?>

<?= $this->start('head'); ?>
  <link href="<?=PROOT?>assets/css/order.css" rel="stylesheet" type="text/css" media="all" />
  <link href="<?=PROOT?>assets/css/bc.style.scss.css" rel="stylesheet" type="text/css" media="all" />
<?= $this->end(); ?>

<?= $this->start('body'); ?>

  <style>
  .max_char {
  	color: red;
    	padding: 2px;
  }  
  p{
    margin: 0px;
  }
  h3{
    margin: 7px 0 15px 0;
    font-size: 17px;
    font-weight: bold;
  }
  </style>

  <div class="content" data-content>
    <div class="wrap">

      <div class="main" role="main">
        <div class="main__content">
          <div class="step" data-step="thank-you">
            <div class="thank-you__additional-content">
            </div>
            <div class="section" style="padding-top: 0;">
              <div class="section__content">
                <div class="content-box">
                  <?php
                    if ($params['order_status']['state_delivered'] == '0') {
                      echo '
                        <div class="content-box__row">
                          <h2 class="os-step__title" style="font-size:23px; ">Your shipment is on the way</h2>
                          <p class="os-step__description">
                            Your shipment is on the way....
                            These schedules are based on delivery times to capital cities - please allow extra time for delivery to regional & remote areas. 
                          </p>
                        </div>
                      ';
                    } else {
                      echo '                  
                      <div class="content-box__row">
                        <h2 class="os-step__title" style="font-size:23px; ">Your shipment has been delivered</h2>
                        <p class="os-step__description">
                          Your shipment has been delivered to the address you provided. If you haven`t received it, or if you have any other problems, please 
                          <a href="<?=PROOT?>home/ContactUs">contact us</a>.
                        </p>
                      </div>
                  ';
                    }
                  ?>
            




                </div>

                <div class="content-box" data-order-updates="true">
                  <div class="content-box__row">
                    <h2 class="os-step__title" style="font-size:23px; ">Order updates</h2>
                    <div class="">
                      <i class="demo-icon icon-handy-cart" style="font-size: 15px; padding: 0px 5px 0 0;"></i>
                      <span style="padding-right: 50px;">Total : </span>
                      <span>$ 550.17</span>
                    </div>
                    <div class="">
                      <i class="far fa-calendar-check" style="font-size: 15px; padding: 0px 5px 0 0;"></i>
                      <span style="padding-right: 15px;">Order date : </span>
                      <span>25-04-2019</span>
                    </div>
                  </div>
                </div>

                <div class="content-box">
                  <div class="content-box__row content-box__row--no-border">
                    <h2 style="font-size:23px; ">Customer information</h2>
                  </div>
                  <div class="content-box__row">
                    <div class="section__content">
                      <div class="section__content__column section__content__column--half">
                      	<h3>Shipping address</h3>
                      	<p class="visually-hidden">Log in to view all customer information.</p>
                      	<div class=""><p>43b</p></div>
                  		  <div class=""><p>wattegedara road</p></div>
                  		  <div class=""><p>maharagama</p></div>
                      </div>
                      <div class="section__content__column section__content__column--half">
                        <h3>Shipping method</h3>
                        <div class=""><p>on foot</p></div>
                      </div>
                    </div>
                  </div>
                </div>

              </div>
            </div>
          </div>
          <div class="step__footer">
            <a href="<?=PROOT?>home/productlist/1" data-trekkie-id="continue_shopping_button" class="step__footer__continue-btn btn" style="background-color: #c1939e; cursor: pointer; border-color: black; border-radius: 4px; border:2px solid #c1939e;padding: 10px; float:right;">
              <span class="btn__content">Continue shopping</span>
              <svg class="icon-svg icon-svg--size-18 btn__spinner icon-svg--spinner-button" aria-hidden="true" focusable="false"> <use xlink:href="#spinner-button" /> </svg>
            </a>
            <p class="step__footer__info">
              <svg aria-hidden="true" focusable="false" class="icon-svg icon-svg--color-adaptive-lighter icon-svg--size-18 icon-svg--inline-before"> <use xlink:href="#question-circle" /> </svg>
              <span>
                Need help? <a data-tekkie-id="contact_us_link" href="<?=PROOT?>home/ContactUs">Contact us</a>
              </span>
            </p>
          </div>
        </div>

        <div class="main__footer" style="padding-top: 50px;">
          <div class="Container"> <a href="https://store.TailorMate.com/pages/terms-of-use" target="_blank"style="color:#0000FF;">Terms of Use</a>
          | <a href=https://store.TailorMate.com/pages/privacy-policy target="_blank" style="color:#0000FF;">Privacy Policy</a> | <a href=https://store.TailorMate.com/pages/returns-exchange-policy target="_blank" style="color:#0000FF;">Returns/Exchange Policy</a>       
        </div>
        </div>
      </div>








        <div class="sidebar" role="complementary">
	        <div class="sidebar__header">
	            <a class="logo logo--center" href="https://store...com">
	              <img alt="Tailor Mate Online Store" class="logo__image logo__image--small" src="" />
	            </a>
	            <h1 class="visually-hidden">
	              Order Status
	            </h1>
	        </div>

        	<style type="text/css">
        		.order-icons{
        			padding: 30px;
              color: #d1d1d1;
        		}
        		.order-icons span{
        			font-size: 20px;
        		}
        		.fas{
        			font-size: 30px;
        			position: absolute;
        			right: 10px;
              color: #d1d1d1;
        		}
        	</style>

         	<div class="sidebar__content">
            <div id="order-summary" class="order-summary order-summary--is-collapsed" data-order-summary>
				  	  <div class="order-summary__sections">
				    	  <div class="order-summary__section order-summary__section--total-lines" data-order-summary-section="payment-lines">
				    		  <h2 id="paymentsummery" style=" width: 380px ;padding: 20px 120px; background-color: #c1939e; border-style: solid; border-width: 5px; border-color: white;font-size: 1.2857em;line-height: 1.3em;font-family:-apple-system, BlinkMacSystemFont, Segoe UI, Roboto, Helvetica, Arial, sans-serif, Apple Color Emoji, Segoe UI Emoji, Segoe UI Symbol,sans-serif;background-image: linear-gradient(#c1939e,#f7d2da);">ORDER STATUS</h2>

						    	<div class="order-icons" id="state_confirmed">
                    <?php
                      if ($params['order_status']['state_confirmed'] == '0') {
                        echo '<span>Confirmed</span>
                              <i class="fas fa-check-circle"></i>';
                      } else {
                        echo '<span style="color: #7f4956">Confirmed</span>
                              <i class="fas fa-check-circle" style="color: #7f4956"></i> ';
                      }
                    ?>
						    	</div>

                  <div class="order-icons" id="state_manufacturing">
                    <?php
                      if ($params['order_status']['state_manufacturing'] == '0') {
                        echo '<span>Manufacturing</span>
                              <i class="fas fa-history"></i>';
                      } else {
                        echo '<span style="color: #7f4956">Manufacturing</span>
                              <i class="fas fa-history" style="color: #7f4956"></i> ';
                      }
                    ?>
                  </div>

                  <div class="order-icons" id="state_delivering">
                    <?php
                      if ($params['order_status']['state_delivering'] == '0') {
                        echo '<span>On it`s way</span>
                              <i class="fas fa-truck"></i>';
                      } else {
                        echo '<span style="color: #7f4956">On it`s way</span>
                              <i class="fas fa-truck" style="color: #7f4956"></i> ';
                      }
                    ?>
                  </div>

                  <div class="order-icons" id="state_delivered">
                    <?php
                      if ($params['order_status']['state_delivered'] == '0') {
                        echo '<span>Delivered</span>
                              <i class="fas fa-home"></i>';
                      } else {
                        echo '<span style="color: #7f4956">Delivered</span>
                              <i class="fas fa-home" style="color: #7f4956"></i> ';
                      }
                    ?>
                  </div>

				    	  </div>
					    </div>
				    </div>
			    </div>


    			<div id="partial-icon-symbols" class="icon-symbols" data-tg-refresh="partial-icon-symbols" data-tg-refresh-always="true">
    				<svg xmlns="http://www.w3.org/2000/svg">
    					<symbol id="down-arrow">
    						<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 12 12">
    							<path d="M10.817 7.624l-4.375 4.2c-.245.235-.64.235-.884 0l-4.375-4.2c-.244-.234-.244-.614 0-.848.245-.235.64-.235.884 0L5.375 9.95V.6c0-.332.28-.6.625-.6s.625.268.625.6v9.35l3.308-3.174c.122-.117.282-.176.442-.176.16 0 .32.06.442.176.244.234.244.614 0 .848"/>
    						</svg>
    					</symbol>
    					
    					<symbol id="spinner-button">
    						<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
    							<path d="M20 10c0 5.523-4.477 10-10 10S0 15.523 0 10 4.477 0 10 0v2c-4.418 0-8 3.582-8 8s3.582 8 8 8 8-3.582 8-8h2z"/>
    						</svg>
    					</symbol>
    					
    					<symbol id="question-circle">
    						<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 18 18">
    							<path d="M9 18c4.97 0 9-4.03 9-9s-4.03-9-9-9-9 4.03-9 9 4.03 9 9 9zM5.85 7.162h1.546c.053-.803.6-1.317 1.45-1.317.828 0 1.38.494 1.38 1.18 0 .65-.275 1-1.092 1.493-.908.534-1.29 1.126-1.23 2.114l.006.448h1.527v-.376c0-.65.244-.987 1.106-1.494.896-.534 1.396-1.238 1.396-2.246 0-1.455-1.207-2.495-3.01-2.495-1.955 0-3.03 1.13-3.08 2.69zm2.896 7.058c.672 0 1.093-.414 1.093-1.046 0-.64-.423-1.054-1.095-1.054-.66 0-1.093.415-1.093 1.054 0 .632.434 1.046 1.093 1.046z" fill-rule="evenodd"/>
    						</svg>
    					</symbol>
    					
    					<symbol id="close">
    						<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16">
    							<path d="M15.1 2.3L13.7.9 8 6.6 2.3.9.9 2.3 6.6 8 .9 13.7l1.4 1.4L8 9.4l5.7 5.7 1.4-1.4L9.4 8"/>
    						</svg>
    					</symbol>
    					
    					<symbol id="spinner-small">
    						<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32">
    							<path d="M32 16c0 8.837-7.163 16-16 16S0 24.837 0 16 7.163 0 16 0v2C8.268 2 2 8.268 2 16s6.268 14 14 14 14-6.268 14-14h2z"/>
    						</svg>
    					</symbol>
    				</svg>
    			</div>
      </div>

    </div>
  </div>

<?= $this->end(); ?>