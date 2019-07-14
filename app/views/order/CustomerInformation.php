<?= $this->setSiteTitle('Customer Information') ?>

<?= $this->start('head'); ?>
  <link href="<?=PROOT?>assets/css/order.css" rel="stylesheet" type="text/css" media="all" />
  <link href="<?=PROOT?>assets/css/bc.style.scss.css" rel="stylesheet" type="text/css" media="all" />

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
  <body>
        <a href="#main-header" class="skip-to-content">
  Skip to content
</a>




    <div class="banner" data-header>
      <div class="wrap" style="">
          
<a class="logo logo--center" href="">
    
</a>
<h1 class="visually-hidden">
  Customer information
</h1>


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
<!--       <span class="order-summary-toggle__text order-summary-toggle__text--show">
        <span>Show order summary</span>
        <svg width="11" height="6" xmlns="http://www.w3.org/2000/svg" class="order-summary-toggle__dropdown" fill="#000"><path d="M.504 1.813l4.358 3.845.496.438.496-.438 4.642-4.096L9.504.438 4.862 4.534h.992L1.496.69.504 1.812z" /></svg>
      </span> -->
<!--       <span class="order-summary-toggle__text order-summary-toggle__text--hide">
        <span>Hide order summary</span>
        <svg width="11" height="7" xmlns="http://www.w3.org/2000/svg" class="order-summary-toggle__dropdown" fill="#000"><path d="M6.138.876L5.642.438l-.496.438L.504 4.972l.992 1.124L6.138 2l-.496.436 3.862 3.408.992-1.122L6.138.876z" /></svg>
      </span> -->
      <span class="order-summary-toggle__total-recap total-recap" data-order-summary-section="toggle-total-recap">
        <span class="total-recap__final-price" data-checkout-payment-due-target="1300">$<?=$params[1]['total']?></span>
      </span>
    </span>
  </span>
</button>




    <div class="content" data-content>
      <div class="wrap">
        <div class="main" role="main">
          <div class="main__header">
              
<a class="logo logo--center" href="">
    <img alt=" Online Store" class="logo__image logo__image--small" src="" />
</a>
<h1 class="visually-hidden">
  Customer information
</h1>


                  <ul class="breadcrumbb breadcrumbb--center" >
      <li class="breadcrumbb__item breadcrumbb__item--completed">
        <a class="breadcrumbb__link" data-trekkie-id="breadcrumbb_cart_link" style="font-size: 15px"  href="<?=PROOT?>cartController/cart">Cart</a>
        <svg class="icon-svg icon-svg--color-adaptive-light icon-svg--size-10 breadcrumbb__chevron-icon" aria-hidden="true" focusable="false"> <use xlink:href="#chevron-right" /> </svg>
      </li>

      <li class="breadcrumbb__item breadcrumbb__item--current" style="font-size: 15px">
        <span class="breadcrumbb__text" aria-current="step">Customer information</span>
          <svg class="icon-svg icon-svg--color-adaptive-light icon-svg--size-10 breadcrumbb__chevron-icon" aria-hidden="true" focusable="false"> <use xlink:href="#chevron-right" /> </svg>
      </li>
<!--       <li class="breadcrumbb__item breadcrumbb__item--blank" style="font-size: 10px">
        <span class="breadcrumbb__text">Shipping method</span>
          <svg class="icon-svg icon-svg--color-adaptive-light icon-svg--size-10 breadcrumbb__chevron-icon" aria-hidden="true" focusable="false"> <use xlink:href="#chevron-right" /> </svg>
      </li> -->
      <li class="breadcrumbb__item breadcrumbb__item--blank" style="font-size: 15px">
        <span class="breadcrumbb__text">Payment method</span>
      </li>
  </ul>



                <div data-alternative-payments>
      <div class="dynamic-checkout">
        
        
      </div>

    <div class="alternative-payment-separator" data-alternative-payment-separator>
      <span class="alternative-payment-separator__content">
        
      </span>
    </div>
</div>



          </div>
          <div class="main__content">
            





















  


<div class="step" data-step="contact_information">
  <form  method="post" action="<?=PROOT?>OrderController/addCustomerInfo">
    <input name="utf8" type="hidden" value="&#x2713;" />
    <input type="hidden" name="_method" value="patch" />
    <input type="hidden" name="authenticity_token" value="" />

  <input type="hidden" name="previous_step" id="previous_step" value="contact_information" />
  <input type="hidden" name="step" value="shipping_method" />

  <div class="step__sections">
      
    <div class="section section--contact-information">
      <div class="section__header">
        <div class="layout-flex layout-flex--tight-vertical layout-flex--loose-horizontal layout-flex--wrap">
          <h2 class="section__title layout-flex__item layout-flex__item--stretch" id="main-header" tabindex="-1">
            Contact information
          </h2>
        </div>
      </div>

      <div class="section__content" data-section="customer-information" data-shopify-pay-validate-on-load="false">

        <div role="row" class="review-block" style="border:solid;border-width: 1px; border-color: #d9d9d9; padding: 10px;" >
          <div class="review-block__inner">
            <div role="gridcell" class="review-block__label" style="padding: 12px;">
              Email
            </div>
            <div role="gridcell" class="review-block__content">
              <input style="padding-left:10px; " placeholder="Email"  aria-required="true" class="field__input" size="30" type="email" name="email" id="checkout_email" value=<?=$params[0]->email?> />
            </div>
          </div>
        </div>


        <div class="fieldset-description" data-buyer-accepts-marketing>
          <div class="section__content">
            <div class="checkbox-wrapper">
<!--               <div class="checkbox__input" style="display: inline;">
                <input name="checkout[buyer_accepts_marketing]" type="hidden" value="0" /><input class="input-checkbox" data-backup="buyer_accepts_marketing" data-trekkie-id="buyer_accepts_marketing_field" type="checkbox" value="1" checked="checked" name="checkout[buyer_accepts_marketing]" id="checkout_buyer_accepts_marketing" />
              </div> -->
              <label class="checkbox__label" for="checkout_buyer_accepts_marketing" >
                By providing this information, you are opting to receive emails from Tayilor mate with news, special offers, promotions and messages tailored to your interests, and you agree to our privacy policy and terms of use (which are located at the bottom of this page). *International customers will receive an email to confirm your subscription to above mailing list
              </label>
            </div>
          </div>
        </div>
      </div> 
    </div> 


  <div class="section section--shipping-address" data-shipping-address
                                                    data-update-order-summary>

    <div class="section__header">
      <h2 class="section__title">
          Shipping address
      </h2>
    </div>

    
      <div class="section__content">
        <div class="fieldset" >
          <div class="bg-danger" ><?=$this->displayErrors ?></div>


          <div class="field--half field field--required" style="width: 50%;">
            <label class="field__label" for="">First name</label>
            <div class="field__input-wrapper">
              <input placeholder="First name"  class="field__input" aria-required="true" size="30" type="text" name="first_name" id="checkout_shipping_address_first_name" />
            </div>
          </div>

          <div class="field--half field field--required" style="width: 50%;">
            <label class="field__label" for="">Last name</label>
            <div class="field__input-wrapper">
              <input placeholder="Last name"  class="field__input" aria-required="true" size="30" type="text" name="last_name" id="checkout_shipping_address_last_name" />
            </div>
          </div>

          <div class="field--half field field--required" >
            <label class="field__label" for="">Address</label>
            <div class="field__input-wrapper">
              <input placeholder="Address"  class="field__input" aria-required="true" type="text" name="address" id="checkout_shipping_address" />
            </div>
          </div>

          <div class="field--half field field--optional" >
            <label class="field__label" for="checkout_shipping_address_address2">Apartment, suite, etc. (optional)</label>
            <div class="field__input-wrapper">
              <input placeholder="Apartment, suite, etc. (optional)"  class="field__input"   type="text" name="address2" id="checkout_shipping_address_last_name" />
            </div>
          </div>

          <div  class="field field--required">
            <label class="field__label" for="">City</label>
            <div class="field__input-wrapper">
              <input placeholder="City" class="field__input" aria-required="true" size="30" type="text" name="city" id="checkout_shipping_address_city" />
            </div>
          </div>

          <div class="field--third field field--required" >
            <label class="field__label" for="">District</label>
            <div class="field__input-wrapper">
              <input placeholder="District" class="field__input" aria-required="true" type="text" name="province" id="checkout_shipping_address_province" />
            </div>
          </div>

          <div class="field--third field field--required" style="width: 50%;">
            <label class="field__label" for="">Postal code</label>
            <div class="field__input-wrapper">
              <input placeholder="Postal code"  class="field__input" aria-required="true" size="30" type="text" name="zip" id="checkout_shipping_address_zip" />
            </div>
          </div>

          <div class="field field--required" style="width: 50%;">
            <label class="field__label" for="">Phone</label>
            <div class="field__input-wrapper">
              <input placeholder="Phone" class="field__input field__input--numeric" aria-required="true" size="30" type="tel" name="phone" id="checkout_shipping_address_phone" />
            </div>
          </div>

        </div> 
      </div>
        <div class="step__footer">
<!--             <input type="hidden" name="checkout[total_price]" id="checkout_total_price" value="4157" />
            <input type="hidden" name="complete" value="1" /> -->

            <div class="shown-if-js--l">
              <input type="submit" class="button button-primary btn-primary" value="Continue to payment method" style="background-color: #c1939e; cursor: pointer; border-color: black; border-radius: 4px; border:2px solid #c1939e;padding: 10px; float:right;">
            </div>
            <input type='hidden' name='payment_summary' value="<?php echo htmlentities(serialize($params[1])); ?>" />
          <?php echo'<input type="hidden" name="user_id" value="'.$params['user_id'].'">';?> 
        </div>

    </form>


          <a class="step__footer__previous-link" data-trekkie-id="previous_step_link" href="<?=PROOT?>cartController/cart">
            <svg focusable="false" aria-hidden="true" class="icon-svg icon-svg--color-accent icon-svg--size-10 previous-link__icon" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 10 10">
              <path d="M8 1L7 0 3 4 2 5l1 1 4 4 1-1-4-4"/>
            </svg>
            <span class="step__footer__previous-link-content">Return to cart</span>
          </a>

    </div>
  </div>
</div>




          

          </div>
          <div class="main__footer">
            <div class="Container"> <a href="<?=PROOT?>home/termsOfUse" target="_blank"style="color:#0000FF;">Terms of Use</a>
            | <a href="<?=PROOT?>home/termsOfUse" target="_blank" style="color:#0000FF;">Privacy Policy</a> | <a href="<?=PROOT?>home/termsOfUse" target="_blank" style="color:#0000FF;">Returns/Exchange Policy</a>       
          </div>
          </div>
        </div>



   
        <div class="sidebar" role="complementary">
          <div class="sidebar__header">
            <a class="logo logo--center" href="https://store...com">
                <img alt="Tailor Mate Online Store" class="logo__image logo__image--small" src="" />
            </a>
            <h1 class="visually-hidden">
              Customer information
            </h1>
          </div>
          <div class="sidebar__content">
            <div id="order-summary" class="order-summary order-summary--is-collapsed" data-order-summary>
              <h2 class="visually-hidden-if-js">Order summary</h2>

              <div class="order-summary__sections">

                <div class="order-summary__section order-summary__section--total-lines" data-order-summary-section="payment-lines">
                  <table class="total-line-table">
                    <caption class="visually-hidden">Cost summary</caption>
                    <style type="text/css">
                      tbody{
                        display: table-row-group;
                        vertical-align: middle;
                        border-color: inherit;
                      }
                      table{
                        border-collapse: collapse;
                        border-spacing: 0;
                      }
                      tr{
                        display: table-row;
                        vertical-align: inherit;
                        border-color: inherit;
                      }
                      table thead th{
                        color: white;
                        background-color: white;
                        border-color: white;
                      }
                    </style>
                    <thead>
                      <tr>
                        <th scope="col"><span class="visually-hidden" >Description</span></th>
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
                                <span class="order-summary__emphasis" >$ 
                                  '.$item['item_total'].'
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
                          <span class="payment-due__price" data-checkout-payment-due-target="1300">
                            <?=$params[1]['total']?>
                          </span>
                        </td>
                      </tr>
                    </tfoot>
                  </table>

                  <div class="visually-hidden" aria-live="polite" aria-atomic="true" role="status">
                    Updated total price:
                    <span data-checkout-payment-due-target="1300">
                    </span>
                  </div>

                </div>
              </div>
            </div>


  <div id="partial-icon-symbols" class="icon-symbols" data-tg-refresh="partial-icon-symbols" data-tg-refresh-always="true"><svg xmlns="http://www.w3.org/2000/svg"><symbol id="caret-down"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 10 10"><path d="M0 3h10L5 8"/></svg></symbol>
<symbol id="powered-by-google"></symbol>
<symbol id="close"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16"><path d="M15.1 2.3L13.7.9 8 6.6 2.3.9.9 2.3 6.6 8 .9 13.7l1.4 1.4L8 9.4l5.7 5.7 1.4-1.4L9.4 8"/></svg></symbol>
<symbol id="spinner-button"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M20 10c0 5.523-4.477 10-10 10S0 15.523 0 10 4.477 0 10 0v2c-4.418 0-8 3.582-8 8s3.582 8 8 8 8-3.582 8-8h2z"/></svg></symbol>
<symbol id="chevron-right"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 10 10"><path d="M2 1l1-1 4 4 1 1-1 1-4 4-1-1 4-4"/></svg></symbol>
<symbol id="down-arrow"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 12 12"><path d="M10.817 7.624l-4.375 4.2c-.245.235-.64.235-.884 0l-4.375-4.2c-.244-.234-.244-.614 0-.848.245-.235.64-.235.884 0L5.375 9.95V.6c0-.332.28-.6.625-.6s.625.268.625.6v9.35l3.308-3.174c.122-.117.282-.176.442-.176.16 0 .32.06.442.176.244.234.244.614 0 .848"/></svg></symbol>
<symbol id="arrow"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16"><path d="M16 8.1l-8.1 8.1-1.1-1.1L13 8.9H0V7.3h13L6.8 1.1 7.9 0 16 8.1z"/></svg></symbol>
<symbol id="spinner-small"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32"><path d="M32 16c0 8.837-7.163 16-16 16S0 24.837 0 16 7.163 0 16 0v2C8.268 2 2 8.268 2 16s6.268 14 14 14 14-6.268 14-14h2z"/></svg></symbol></svg></div>


          </div>
        </div>
      </div>
    </div>





<?= $this->end(); ?>

