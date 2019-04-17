<?= $this->setSiteTitle('Contact us') ?>

<?= $this->start('head'); ?>

<?= $this->end(); ?>

<?= $this->start('body'); ?>

<div class="layout-boxed" id="body-content">
  <div id="main-content">
    <div class="main-content">
      <div class="shopify-section" id="shopify-section-page-content-template">
        


        <div class="wrap-breadcrumb bw-color">
          <div id="breadcrumb" class="breadcrumb-holder container">
            <div class="row">
              <div class="col-lg-6 d-none d-lg-block">
                <div class="page-title">CONTACT US</div>
              </div>
              <div class="col-lg-6 col-mid-12 col-sm-12 col-12">
                <ul class="breadcrumb">
                  <li itemscope itemtype="">
                    <a itemprop="url" href="/">
                      <span itemprop="title" class="d-none">Tailor Mate</span>Home
                    </a>
                  </li>
                  <li class="active">Contact us</li>
                </ul>
              </div>
            </div>        
          </div>
        </div>

        <div class="page-content">

          <div class="contact-form-wrapper">

            <div class="title-wrapper">
              <h2>Leave A Message</h2>
              <p>If you have questions about anything Tailor Mate - from where is your order, to exchanging your fresh threads, all the way to uploading an image as an artist, head on over to our Help Centre. This is where you'll find all the answers you need, you’ll even be able to speak to one of our friendly support heroes!</p>
            </div>

            <div class="contact-form">
              <form method="post" action="/contact#contact_form" id="contact_form" accept-charset="UTF-8" class="contact-form"><input type="hidden" name="form_type" value="contact" /><input type="hidden" name="utf8" value="✓" />


              <div id="contact-form">
                <div class="row">
                  <div class="form-group col-lg-12 col-md-12">
                    <input type="text" id="name" class="form-control" placeholder="Your Name" value="" name="contact[name]" />
                  </div>

                  <div class="form-group col-lg-12 col-md-12">
                    <input required type="email" id="email" class="form-control" placeholder="Your Email" value="" name="contact[email]" />
                  </div>
                </div>
                
                <div class="form-group">
                  <input type="text" id="phone" class="form-control" placeholder="Phone Number" value="" name="contact[phone]" />
                </div>

                <div class="form-group">
                  <textarea required id="message" class="form-control" placeholder="Message" cols="40" rows="7" name="contact[body]"></textarea>
                </div>

                <div class="form-actions">
                  <button type="submit" class="btn btn-1">Send message</button>
                </div>
              </div>

              </form>
            </div>
          </div>
          
        </div>

      </div>
    </div>
  </div>
</div>


<?= $this->end(); ?>