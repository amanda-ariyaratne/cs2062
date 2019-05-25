<?= $this->setSiteTitle('Create Newsletter') ?>

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
                <div class="page-title">Create Newsletter</div>
              </div>
              <div class="col-lg-6 col-mid-12 col-sm-12 col-12">
                <ul class="breadcrumb">
                  <li itemscope itemtype="">
                    <a itemprop="url" href="/">
                      <span itemprop="title" class="d-none">Tailor Mate</span>Home
                    </a>
                  </li>
                  <li class="active">Newsletter</li>
                </ul>
              </div>
            </div>        
          </div>
        </div>

        <div class="page-content">

          <div class="contact-form-wrapper">

            <div class="contact-form">
              <form method="post" action="<?=PROOT?>admin/sendNewsletter" class="contact-form" onsubmit="return validateNewsletterCreation();">

              <div id="contact-form">
                <div class="row">
                  <span id="error_subject" style="padding-left: 20px; color: red;"></span>
                  <div class="form-group col-lg-12 col-md-12">
                    <input type="text" id="subject" class="form-control" placeholder="Your Subject" value="" name="subject" />
                  </div>
                </div>
                <div class="row">
                  <span id="error_content" style="padding-left: 20px; color: red;"></span>
                  <div class="form-group col-lg-12 col-md-12">
                    <textarea id="content" class="form-control" placeholder="Your Content" cols="40" rows="7" name="content"></textarea>
                  </div>
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
  function validateNewsletterCreation(){

      document.getElementById('error_subject').innerHTML = "";
      document.getElementById('error_content').innerHTML = "";
                                    
      var subject = document.getElementById("subject").value;
      var content = document.getElementById("content").value;
      var el;

      if (subject == "")
      {
          el = document.getElementById('error_subject');
          el.innerHTML = "Subject field is required!";
          return false;
      }
      else if (content == "")
      {
          el = document.getElementById('error_content');
          el.innerHTML = "Content is required!";
          return false;
      }
      else
      {
          return true;
      }

  }
</script>

<?= $this->end(); ?>