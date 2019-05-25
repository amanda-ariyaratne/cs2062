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
              <form method="post" action="<?=PROOT?>home/sendMessage" id="contact_form" onsubmit="return validateMessage();">

              <div id="contact-form">
                <div class="row">
                  <span id="error_name" style="padding-left: 20px; color: red;"></span>
                  <div class="form-group col-lg-12 col-md-12">
                    <input type="text" id="name" class="form-control" placeholder="Your Name" value="" name="name" />
                  </div>

                  <span id="error_email" style="padding-left: 20px; color: red;"></span>
                  <div class="form-group col-lg-12 col-md-12">
                    <input type="email" id="email" class="form-control" placeholder="Your Email" value="" name="email" />
                  </div>
                </div>
                
                <span id="error_number" style="padding-left: 20px; color: red;"></span>
                <div class="form-group">
                  <input type="text" id="number" class="form-control" placeholder="Phone Number" value="" name="phone" />
                </div>

                <span id="error_message" style="padding-left: 20px; color: red;"></span>
                <div class="form-group">
                  <textarea id="message" class="form-control" placeholder="Message" cols="40" rows="7" name="message"></textarea>
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

<script type="text/javascript">
  function validateMessage(){

      document.getElementById('error_name').innerHTML = "";
      document.getElementById('error_email').innerHTML = "";
      document.getElementById('error_number').innerHTML = "";
      document.getElementById('error_message').innerHTML = "";
                                    
      var name = document.getElementById("name").value;
      var email = document.getElementById("email").value;
      var number = document.getElementById("number").value;
      var message = document.getElementById("message").value;
      var el;

      var email_regex = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
      var number_regex = /^(?:0|94|\+94)?(?:(11|21|23|24|25|26|27|31|32|33|34|35|36|37|38|41|45|47|51|52|54|55|57|63|65|66|67|81|912)(0|2|3|4|5|7|9)|7(0|1|2|5|6|7|8)\d)\d{6}$/;


      if (name == "")
      {
          el = document.getElementById('error_name');
          el.innerHTML = "Name field is required!";
          return false;
      }
      else if (email == "")
      {
          el = document.getElementById('error_email');
          el.innerHTML = "Email field is required!";
          return false;
      }
      else if (!email_regex.test(email))
      {
          el = document.getElementById('error_email');
          el.innerHTML = "Please enter valid email!";
          return false;
      }
      else if (!number_regex.test(number))
      {
          el = document.getElementById('error_number');
          el.innerHTML = "Please enter valid phone number!";
          return false;
      }
      else if (message == "")
      {
          el = document.getElementById('error_message');
          el.innerHTML = "Message is required!";
          return false;
      }
      else
      {
          return true;
      }

  }
</script>


<?= $this->end(); ?>