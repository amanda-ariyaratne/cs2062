<?= $this->setSiteTitle('Forgot Password') ?>

<?= $this->start('head'); ?>

<style type="text/css">
  .alert-success {
    border-radius: 0;
    border-color: #c1939e;
    color: #c1939e;
    background-color: #f3ebed;
}
</style>

<?= $this->end(); ?>

<?= $this->start('body'); ?>
      
      
<div id="body-content" class="layout-boxed">
  <div id="main-content"> 
    <div class="main-content">
      <div class="wrap-breadcrumb bw-color">
        <div id="breadcrumb" class="breadcrumb-holder container">
          <div class="row">
            <div class="col-lg-6 d-none d-lg-block">
              <div class="page-title">Account</div>
            </div>
            <div class="col-lg-6 col-md-12 col-sm-12 col-12">
              <ul class="breadcrumb">
                <li itemscope itemtype="http://data-vocabulary.org/Breadcrumb">
                  <a itemprop="url" href="/">
                    <span itemprop="title" class="d-none">Handy Store</span>
                    Home
                  </a>
                </li>
                <li class="active">
                  Account
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="container">
        <div class="page-account">
          <div class="row">
            <div class="col-lg-3 col-md-4 col-sm-12">
              <!-- empty div -->
            </div>
            <div id="col-main" class="col-lg-6 col-md-8 col-sm-12">
              <div id="customer_orders">
                <h3>Recovery Link Sent</h3>
                <div class="alert alert-success">
                  <button type="button" class="close" title="Close" data-dismiss="alert">×</button>
                  <p>We have successfully sent you the password recovery link to the email provided.</p>
                  <p>Please note that it might take a few minutes.</p>
                  <p>If the email still doesn't appear in your inbox, kindly check your spam folder.</p>
                  <p>The link will be only activated for 24 hours.</p>
                </div>
              </div>
            </div>
            <div id="col-main" class="col-lg-3 col-md-8 col-sm-12">
              <!-- empty div -->
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?= $this->end(); ?>