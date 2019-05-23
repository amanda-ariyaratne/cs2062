<?= $this->setSiteTitle('Payment Method') ?>

<?= $this->start('head'); ?>
  <link href="<?=PROOT?>assets/css/order.css" rel="stylesheet" type="text/css" media="all" />
  <link href="<?=PROOT?>assets/css/bc.style.scss.css" rel="stylesheet" type="text/css" media="all" />


<?= $this->end(); ?>

<?= $this->start('body'); ?>
  <body>
    <a href="#main-header" class="skip-to-content">Skip to content</a>
    <div class="banner" data-header>
      <div class="wrap">
        <a class="logo logo--center" href="https://store.tailormate.com"></a>
        <h1 class="visually-hidden">Payment method</h1>
      </div>
    </div>

    <button class="order-summary-toggle order-summary-toggle--show shown-if-js" data-trekkie-id="order_summary_toggle" aria-expanded="false" aria-controls="order-summary" data-drawer-toggle="[data-order-summary]">
      <span class="wrap">
        <span class="order-summary-toggle__inner">
          <span class="order-summary-toggle__icon-wrapper">
            <svg width="20" height="19" xmlns="http://www.w3.org/2000/svg" class="order-summary-toggle__icon">
              <path d="M17.178 13.088H5.453c-.454 0-.91-.364-.91-.818L3.727 1.818H0V0h4.544c.455 0 .91.364.91.818l.09 1.272h13.45c.274 0 .547.09.73.364.18.182.27.454.18.727l-1.817 9.18c-.09.455-.455.728-.91.728zM6.27 11.27h10.09l1.454-7.362H5.634l.637 7.362zm.092 7.715c1.004 0 1.818-.813 1.818-1.817s-.814-1.818-1.818-1.818-1.818.814-1.818 1.818.814 1.817 1.818 1.817zm9.18 0c1.004 0 1.817-.813 1.817-1.817s-.814-1.818-1.818-1.818-1.818.814-1.818 1.818.814 1.817 1.818 1.817z" />
            </svg>
          </span>
          <span class="order-summary-toggle__text order-summary-toggle__text--show">
    <!--         <span>Show order summary</span>
            <svg width="11" height="6" xmlns="http://www.w3.org/2000/svg" class="order-summary-toggle__dropdown" fill="#000"><path d="M.504 1.813l4.358 3.845.496.438.496-.438 4.642-4.096L9.504.438 4.862 4.534h.992L1.496.69.504 1.812z" /></svg>
          </span> -->
    <!--       <span class="order-summary-toggle__text order-summary-toggle__text--hide">
            <span>Hide order summary</span>
            <svg width="11" height="7" xmlns="http://www.w3.org/2000/svg" class="order-summary-toggle__dropdown" fill="#000"><path d="M6.138.876L5.642.438l-.496.438L.504 4.972l.992 1.124L6.138 2l-.496.436 3.862 3.408.992-1.122L6.138.876z" /></svg>
          </span> -->
          <span class="order-summary-toggle__total-recap total-recap" data-order-summary-section="toggle-total-recap">
            <span class="total-recap__final-price" >$ <?=$params[1]['total']?></span>
          </span>
        </span>
      </span>
    </button>

    <div class="content" data-content>
      <div class="wrap">
        <div class="main" role="main">
          <div class="main__header">
            <a class="logo logo--center" href="https://store.tailormate.com">
                <img alt="Tailor Mate Online Store" class="logo__image logo__image--small" src="" />
            </a>
            <h1 class="visually-hidden">Payment method</h1>
            <ul class="breadcrumbb breadcrumbb--center">
              <li class="breadcrumbb__item breadcrumbb__item--completed">
                <a class="breadcrumbb__link" style="font-size: 15px" data-trekkie-id="breadcrumbb_cart_link" href="https://store.tailormate.com/cart">Cart</a>
                <svg class="icon-svg icon-svg--color-adaptive-light icon-svg--size-10 breadcrumbb__chevron-icon" aria-hidden="true" focusable="false"> <use xlink:href="#chevron-right" /> </svg>
              </li>

              <li class="breadcrumbb__item breadcrumbb__item--completed">
                <a class="breadcrumbb__link" style="font-size: 15px" data-trekkie-id="breadcrumbb_contact_information_link" href="<?=PROOT?>OrderController/customerInformation?>">Customer information</a>
                  <svg class="icon-svg icon-svg--color-adaptive-light icon-svg--size-10 breadcrumbb__chevron-icon" aria-hidden="true" focusable="false"> <use xlink:href="#chevron-right" /> </svg>
              </li>
              <li class="breadcrumbb__item breadcrumbb__item--current">
                <span class="breadcrumbb__text" aria-current="step" style="font-size: 15px">Payment method</span>
              </li>
            </ul>

            <div data-alternative-payments></div>
          </div>
          <div class="main__content" style="height: 750px;">
            <div class="step" data-step="payment_method">
              <div class="step__sections">
                <div class="section">

                  <form action="<?=PROOT?>OrderController/completeOrder" method="post" >

                    <div class="content-box">
                      <div role="grid" class="content-box__row content-box__row--tight-spacing-vertical" style="padding: 2px">
                        

                        <div role="row" class="review-block" style=" padding: 10px 0 10px 10px; " >
                          <div class="review-block__inner">
                            <div role="gridcell" class="review-block__label" style="padding: 12px 10px 12px 5px;">
                              Email
                            </div>
                            <div role="gridcell" class="review-block__content">
                              <?php echo'
                                <input style="padding-left:10px; display: inline-block; width:89%;" placeholder="Email"  aria-required="true" class="field__input" size="30" type="email" name="payer_email" id="checkout_email" value="'.$params[0]['email'].'"/>
                              ';?>
                              <a href="<?=PROOT?>OrderController/customerInformation" style="display: inline-block; font-size: 11px; padding-left: 2px;">change</a>
                            </div>
                          </div>
                        </div>


                        <input type="hidden" name="first_name" value="<?php echo $params[0]['f_name']; ?>" />
                        <input type="hidden" name="last_name" value="<?php echo $params[0]['l_name']; ?>" />
                        <input TYPE="hidden" name="night_phone_a" VALUE="<?php echo $params[0]['night_phone_a']; ?>">
                        <input TYPE="hidden" name="night_phone_b" VALUE="<?php echo $params[0]['night_phone_b']; ?>">
                        <input type="hidden" name="address1" value="<?php echo $params[0]['address']; ?>" />
                        <input type="hidden" name="address2" value="<?php echo $params[0]['apartment_suite']; ?>" />
                        <input type="hidden" name="city" value="<?php echo $params[0]['city']; ?>" />
                        <input type="hidden" name="zip" value="<?php echo $params[0]['postal code']; ?>" />
                        <input type="hidden" name="lc" value="en-LK" />
                          



                        <div role="row" class="review-block" style=" padding: 10px 0 10px 10px; margin-top: 0px;" >
                          <div class="review-block__inner">
                            <div role="gridcell" class="review-block__label" style="padding: 12px 10px 12px 5px;">
                              Ship to
                            </div>
                            <div role="gridcell" class="review-block__content">
                              <?php echo'
                                <p style="padding-left:10px; display: inline-block; width:89%;" placeholder="ship to"  aria-required="true" class="field__input" size="30" type="" name="address" id="checkout_address" value="" >'.$params[0]['address'].', '.$params[0]['apartment_suite'].', '.$params[0]['city'].', '.$params[0]['region'].', '.$params[0]['postal code'].'
                              ';?></p>
                              <a href="<?=PROOT?>OrderController/customerInformation?>" style="display: inline-block; font-size: 11px; padding-left: 2px;">change</a>
                            </div>
                          </div>
                        </div>

                      </div>
                    </div>


                    <div class="section section--payment-method" data-payment-method>
                      <div class="section__header">
                        <h2 class="section__title" id="main-header" tabindex="-1">
                          Payment method
                        </h2>
                          <p class="section__text">
                            All transactions are secure and encrypted.
                          </p>
                      </div>

                      <div class="section__content">
                        <div data-payment-subform="required">
                          <fieldset class="content-box">
                            <legend class="visually-hidden">Choose a payment method</legend>
                            <div class="radio-wrapper content-box__row " data-gateway-group="express" data-select-gateway="18522734677">
                              <div class="radio__label payment-method-wrapper ">
                                <label for="checkout_payment_gateway_18522734677" class="radio__label__primary content-box__emphasis" style="padding: 0 35%">
                                  <img alt="PayPal" style="height: 50px; " class="offsite-payment-gateway-logo" src="//cdn.shopify.com/s/assets/checkout/offsite-gateway-logos/paypal@2x-2cabd13111981089fdf7f9faee0ef21550690cd2d380dede9fb7bc8c1253b3c6.png" />
                                  <span class="visually-hidden">
                                    PayPal
                                  </span>
                                </label>
                              </div>
                              <div id="payment_gateway_18522734677_description" class="visually-hidden" aria-live="polite" data-detected="Detected card brand: {brand}"></div>  
                            </div>

                            <div class="radio-wrapper content-box__row content-box__row--secondary" data-subfields-for-gateway="18522734677" id="payment-gateway-subfields-18522734677">
                              <div class="blank-slate">
                                <i class="blank-slate__icon icon icon--offsite"></i>
                                <p>After clicking “Buy Now”, you will be redirected to PayPal to complete your purchase securely.</p>
                              </div>
                            </div>
                          </fieldset>
                        </div>   
                      </div> 
                    </div>





                    <div class="step__footer" data-step-footer>

                      <div class="shown-if-js">
                           <!-- Specify a Buy Now button. --> 
                            <input type="hidden" name="cmd" value="_xclick"> 

                            <!-- Specify details about the item that buyers will purchase. --> 
                            <input type="hidden" name="item_name" value="Ordered Items"> 
                            <input type="hidden" name="item_number" value="1">
                            <input type="hidden" name="amount" value="0.11"> 
                            <input type="hidden" name="currency_code" value="USD"> 

                            <!-- Display the payment button. --> 
                            <input type="image" name="submit" border="0" src="https://www.paypalobjects.com/en_US/i/btn/btn_buynow_LG.gif" alt="PayPal - The safer, easier way to pay online" style="float:right;"> 
                            <img alt="" border="0" width="1" height="1"  src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" > 

                      </div>
                      <a class="step__footer__previous-link" data-trekkie-id="previous_step_link" href="<?=PROOT?>OrderController/CustomerInformation">
                        <svg focusable="false" aria-hidden="true" class="icon-svg icon-svg--color-accent icon-svg--size-10 previous-link__icon" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 10 10" style="color: #646565;">
                          <path d="M8 1L7 0 3 4 2 5l1 1 4 4 1-1-4-4"/>
                        </svg>
                        <span class="step__footer__previous-link-content">Return to costomer information</span>
                      </a>
                    </div>

<!--                     <input type='hidden' name='payment_summary' value="<?php echo htmlentities(serialize($params)); ?>" />
 -->            
                  </form>
                </div>
              </div>
            </div>
          </div>

          <div class="main__footer">
            <div class="Container"> 
              <a href="https://store.tailormate.com/pages/terms-of-use" target="_blank">Terms of Use</a>
              | <a href=https://store.tailormate.com/pages/privacy-policy target="_blank">Privacy Policy</a> 
              | <a href=https://store.tailormate.com/pages/returns-exchange-policy target="_blank">Returns/Exchange Policy</a>       
            </div>
          </div>
        </div>


        <div class="sidebar" role="complementary">
          <div class="sidebar__header">
            <a class="logo logo--center" href="https://store.tailormate.com">
              <img alt="Tailor Mate Online Store" class="logo__image logo__image--small" src="" />
            </a>
            <h1 class="visually-hidden">Payment method</h1>
          </div>
          <div class="sidebar__content">
            <div id="order-summary" class="order-summary order-summary--is-collapsed" data-order-summary>
              <h2 class="visually-hidden-if-js">Order summary</h2>
              <div class="order-summary__sections">
                <div class="order-summary__section order-summary__section--total-lines" data-order-summary-section="payment-lines">
                  <table class="total-line-table">
                    <caption class="visually-hidden">Cost summary</caption>
                    <style type="text/css">
                      table thead th{
                        color: white;
                        background-color: white;
                        border-color: white;
                      }
                    </style>
                    <thead>
                      <tr>
                        <th scope="col"><span class="visually-hidden">Description</span></th>
                        <th scope="col"><span class="visually-hidden">Price</span></th>
                      </tr>
                    </thead>

                    <tbody class="total-line-table__tbody">
                      <h2 id="paymentsummery" style="width: 380px ;padding: 20px 100px; background-color: #c1939e; border-style: solid; border-width: 5px; border-color: white;font-size: 1.2857em;line-height: 1.3em;font-family:-apple-system, BlinkMacSystemFont, Segoe UI, Roboto, Helvetica, Arial, sans-serif, Apple Color Emoji, Segoe UI Emoji, Segoe UI Symbol,sans-serif;background-image: linear-gradient(#c1939e,#f7d2da);">PAYMENT SUMMARY</h2>

                      <?php
                        foreach($params[1][0] as $item){
                          echo '

                            <tr class="total-line total-line--subtotal">
                              <th class="total-line__name" scope="row" style="padding: 12px;">'.$item['name'].'   x'.$item['quantity'].'</th>
                              <td class="total-line__price" style="border-color:white; padding: 12px;">
                                <span class="order-summary__emphasis" data-checkout-subtotal-price-target="1300">
                                  $ '.$item['item_total'].'
                                </span>
                              </td>
                            </tr>

                          ';}
                      ?>
                    </tbody>
                    <tfoot class="total-line-table__footer">
                      <tr class="total-line">
                        <th class="total-line__name payment-due-label" scope="row" style="padding:50px 10px;">
                          <i class="demo-icon icon-handy-cart" style="font-size: 15px; padding: 0px 20px 0 0;"></i>
                          <span class="payment-due-label__total">Total</span>
                        </th>
                        <td class="total-line__price payment-due" style="border-color: white; padding:50px 0px;">
                            <span class="payment-due__currency">USD</span>
                          <span class="payment-due__price" >
                            <?=$params[1]['total']?>
                          </span>
                        </td>
                      </tr>
                    </tfoot>

                  </table>

                </div>
              </div>
            </div>


            <div id="partial-icon-symbols" class="icon-symbols" data-tg-refresh="partial-icon-symbols" data-tg-refresh-always="true">
              <svg xmlns="http://www.w3.org/2000/svg">
                <symbol id="arrow"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16">
                  <path d="M16 8.1l-8.1 8.1-1.1-1.1L13 8.9H0V7.3h13L6.8 1.1 7.9 0 16 8.1z"/>
                </svg>
              </symbol>
              <symbol id="spinner-button">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                  <path d="M20 10c0 5.523-4.477 10-10 10S0 15.523 0 10 4.477 0 10 0v2c-4.418 0-8 3.582-8 8s3.582 8 8 8 8-3.582 8-8h2z"/>
                </svg>
              </symbol>
              <symbol id="error">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                  <path d="M12 24C5.373 24 0 18.627 0 12S5.373 0 12 0s12 5.373 12 12-5.373 12-12 12zm0-2c5.523 0 10-4.477 10-10S17.523 2 12 2 2 6.477 2 12s4.477 10 10 10zm0-16c.552 0 1 .448 1 1v5c0 .552-.448 1-1 1s-1-.448-1-1V7c0-.552.448-1 1-1zm-1.5 10.5c0-.828.666-1.5 1.5-1.5.828 0 1.5.666 1.5 1.5 0 .828-.666 1.5-1.5 1.5-.828 0-1.5-.666-1.5-1.5z"/>
                </svg>
              </symbol>
              <symbol id="lock">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 14 14">
                  <path d="M12 6h-1V4c0-2.2-1.8-4-4-4S3 1.8 3 4v2H2c-.5 0-1 .5-1 1v6c0 .5.5 1 1 1h10c.5 0 1-.5 1-1V7c0-.5-.5-1-1-1zM5 4c0-1.1.9-2 2-2s2 .9 2 2v2H5V4z"/>
                </svg>
              </symbol>
              <symbol id="question">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16">
                  <path d="M8 0C3.6 0 0 3.6 0 8s3.6 8 8 8 8-3.6 8-8-3.6-8-8-8zm.7 13H6.8v-2h1.9v2zm2.6-7.1c0 1.8-1.3 2.6-2.8 2.8l-.1 1.1H7.3L7 7.5l.1-.1c1.8-.1 2.6-.6 2.6-1.6 0-.8-.6-1.3-1.6-1.3-.9 0-1.6.4-2.3 1.1L4.7 4.5c.8-.9 1.9-1.6 3.4-1.6 1.9.1 3.2 1.2 3.2 3z"/>
                </svg>
              </symbol>
              <symbol id="caret-down">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 10 10">
                  <path d="M0 3h10L5 8"/>
                </svg>
              </symbol>
              <symbol id="powered-by-google">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 116 15">
                  <path fill="#737373" d="M4.025 3.572c1.612 0 2.655 1.283 2.655 3.27 0 1.974-1.05 3.27-2.655 3.27-.902 0-1.63-.393-1.974-1.06h-.09v3.057H.95V3.68h.96v1.054h.094c.404-.726 1.16-1.166 2.02-1.166zm-.24 5.63c1.16 0 1.852-.884 1.852-2.36 0-1.477-.692-2.362-1.846-2.362-1.14 0-1.86.91-1.86 2.362 0 1.447.72 2.36 1.858 2.36zm7.072.91c-1.798 0-2.912-1.243-2.912-3.27 0-2.033 1.114-3.27 2.912-3.27 1.8 0 2.913 1.237 2.913 3.27 0 2.027-1.114 3.27-2.913 3.27zm0-.91c1.196 0 1.87-.866 1.87-2.36 0-1.5-.674-2.362-1.87-2.362-1.195 0-1.87.862-1.87 2.362 0 1.494.675 2.36 1.87 2.36zm12.206-5.518H22.05l-1.244 5.05h-.094L19.3 3.684h-.966l-1.412 5.05h-.094l-1.242-5.05h-1.02L16.336 10h1.02l1.406-4.887h.093L20.268 10h1.025l1.77-6.316zm3.632.78c-1.008 0-1.71.737-1.787 1.856h3.48c-.023-1.12-.69-1.857-1.693-1.857zm1.664 3.9h1.004c-.305 1.085-1.277 1.747-2.66 1.747-1.752 0-2.848-1.26-2.848-3.26 0-1.986 1.113-3.275 2.847-3.275 1.705 0 2.742 1.213 2.742 3.176v.387h-4.542v.047c.053 1.248.75 2.04 1.822 2.04.815 0 1.366-.3 1.63-.857zM31.03 10h1.01V6.086c0-.89.696-1.535 1.657-1.535.2 0 .563.04.645.06V3.6c-.13-.018-.34-.03-.504-.03-.838 0-1.565.434-1.752 1.05h-.094v-.938h-.96V10zm6.915-5.537c-1.008 0-1.71.738-1.787 1.857h3.48c-.023-1.12-.69-1.857-1.693-1.857zm1.664 3.902h1.004c-.304 1.084-1.277 1.746-2.66 1.746-1.752 0-2.848-1.26-2.848-3.26 0-1.986 1.113-3.275 2.847-3.275 1.705 0 2.742 1.213 2.742 3.176v.387h-4.542v.047c.053 1.248.75 2.04 1.822 2.04.815 0 1.366-.3 1.63-.857zm5.01 1.746c-1.62 0-2.658-1.28-2.658-3.265 0-1.98 1.05-3.27 2.654-3.27.878 0 1.622.416 1.98 1.108h.087V1.177h1.008V10h-.96V8.992h-.093c-.4.703-1.15 1.12-2.02 1.12zm.23-5.63c-1.15 0-1.845.89-1.845 2.365 0 1.476.69 2.36 1.846 2.36 1.15 0 1.858-.9 1.858-2.36 0-1.447-.715-2.362-1.857-2.362zm7.876-3.114h1.024V4.49c.23-.3.507-.53.827-.69.32-.16.668-.237 1.043-.237.78 0 1.416.27 1.9.806.49.536.73 1.33.73 2.375 0 .992-.24 1.817-.72 2.473-.48.656-1.145.984-1.997.984-.476 0-.88-.114-1.207-.344-.195-.137-.404-.356-.627-.657v.8h-.97V1.364zm4.02 7.225c.284-.453.426-1.05.426-1.793 0-.66-.142-1.207-.425-1.64-.283-.434-.7-.65-1.25-.65-.48 0-.9.177-1.264.532-.36.355-.542.94-.542 1.757 0 .59.076 1.068.224 1.435.277.694.795 1.04 1.553 1.04.57 0 .998-.227 1.28-.68zM63.4 3.727h1.167c-.148.402-.478 1.32-.99 2.754-.383 1.077-.703 1.956-.96 2.635-.61 1.602-1.04 2.578-1.29 2.93-.25.35-.68.527-1.29.527-.147 0-.262-.006-.342-.017-.08-.012-.178-.034-.296-.065v-.96c.182.05.315.08.4.093.08.012.15.018.214.018.195 0 .338-.03.43-.093.092-.065.17-.144.232-.237.02-.033.09-.193.21-.48.122-.29.21-.506.264-.646l-2.32-6.457h1.196l1.68 5.11 1.694-5.11zm10.594 1.556V6.87h3.814c-.117.89-.416 1.54-.87 1.998-.557.555-1.427 1.16-2.944 1.16-2.35 0-4.184-1.882-4.184-4.217 0-2.33 1.835-4.214 4.184-4.214 1.264 0 2.192.497 2.873 1.135l1.122-1.116C77.04.697 75.77 0 73.99 0c-3.218 0-5.923 2.606-5.923 5.805 0 3.2 2.705 5.804 5.923 5.804 1.738 0 3.048-.57 4.073-1.63 1.05-1.044 1.382-2.52 1.382-3.71 0-.365-.028-.707-.087-.99h-5.37zm10.222-1.29c-2.082 0-3.78 1.574-3.78 3.748 0 2.154 1.698 3.747 3.78 3.747S87.998 9.9 87.998 7.74c0-2.174-1.7-3.748-3.782-3.748zm0 6.018c-1.14 0-2.127-.935-2.127-2.27 0-1.348.982-2.27 2.123-2.27 1.142 0 2.128.922 2.128 2.27 0 1.335-.985 2.27-2.127 2.27zm18.54-5.18h-.06c-.37-.438-1.083-.838-1.985-.838-1.88 0-3.52 1.632-3.52 3.748 0 2.102 1.64 3.747 3.52 3.747.906 0 1.62-.4 1.99-.852h.06v.523c0 1.432-.774 2.2-2.013 2.2-1.012 0-1.64-.723-1.9-1.336l-1.44.593c.414.994 1.51 2.213 3.34 2.213 1.94 0 3.58-1.135 3.58-3.902v-6.74h-1.57v.645zm-1.9 5.18c-1.144 0-2.013-.968-2.013-2.27 0-1.323.87-2.27 2.01-2.27 1.13 0 2.012.967 2.012 2.282.006 1.31-.882 2.258-2.01 2.258zM92.65 3.992c-2.084 0-3.783 1.574-3.783 3.748 0 2.154 1.7 3.747 3.782 3.747 2.08 0 3.78-1.587 3.78-3.747 0-2.174-1.7-3.748-3.78-3.748zm0 6.018c-1.143 0-2.13-.935-2.13-2.27 0-1.348.987-2.27 2.13-2.27 1.14 0 2.126.922 2.126 2.27 0 1.335-.986 2.27-2.127 2.27zM105.622.155h1.628v11.332h-1.628m6.655-1.477c-.843 0-1.44-.38-1.83-1.135l5.04-2.07-.168-.426c-.315-.84-1.275-2.39-3.228-2.39-1.94 0-3.554 1.515-3.554 3.75 0 2.1 1.595 3.744 3.736 3.744 1.725 0 2.724-1.05 3.14-1.658l-1.285-.852c-.428.62-1.01 1.032-1.855 1.032zm-.117-4.612c.668 0 1.24.342 1.427.826l-3.405 1.4c0-1.574 1.122-2.226 1.978-2.226z"/>
                </svg>
              </symbol>
              <symbol id="close">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16">
                  <path d="M15.1 2.3L13.7.9 8 6.6 2.3.9.9 2.3 6.6 8 .9 13.7l1.4 1.4L8 9.4l5.7 5.7 1.4-1.4L9.4 8"/>
                </svg>
              </symbol>
              <symbol id="chevron-right">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 10 10">
                  <path d="M2 1l1-1 4 4 1 1-1 1-4 4-1-1 4-4"/>
                </svg>
              </symbol>
              <symbol id="down-arrow">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 12 12">
                  <path d="M10.817 7.624l-4.375 4.2c-.245.235-.64.235-.884 0l-4.375-4.2c-.244-.234-.244-.614 0-.848.245-.235.64-.235.884 0L5.375 9.95V.6c0-.332.28-.6.625-.6s.625.268.625.6v9.35l3.308-3.174c.122-.117.282-.176.442-.176.16 0 .32.06.442.176.244.234.244.614 0 .848"/>
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
  </div>

<?= $this->end(); ?>