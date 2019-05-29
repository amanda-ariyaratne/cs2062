<?= $this->setSiteTitle('Register') ?>

<?= $this->start('head'); ?>

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
              <span itemprop="title" class="d-none">Handy Store</span>Home
            </a>
          </li>

          

            <li class="active">Account</li>

          
        </ul>
      </div>
    </div>

  </div>
</div>

<div class="container">
  <div id="col-main" class="page-login">

    <div class="row">

      <div class="col-xs-12">
        <div class="form-wrapper">

          <div id="customer-login" class="content">
            <h2 class="heading" style="text-align: center">Register</h2>



          </div>

          <div style="border: 1px solid #c1939e">
              <div class="row" style="margin: 100px 500px;">
                <div class="col-xs-12">
                  <button class="btn btn-1" id="customer-register">I want to register as a <span style="font-size: 20px;">customer</span></button>
                </div>
              </div>
              <div class="row" style="margin: 100px 500px;">
                <div class="col-xs-12">
                  <button class="btn btn-1" id="tailor-register">I want to register as a <span style="font-size: 20px;">tailor</span></button>
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
    $('#customer-register').on('click', function(){
      localStorage.setItem('role', '3');
      window.location.href = "<?=PROOT?>account/customerRegister1";
    });
    $('#tailor-register').on('click', function(){
      localStorage.setItem('role', '2');
      window.location.href = "<?=PROOT?>account/tailorRegister1";
    });
  });

</script>

<?= $this->end(); ?>
