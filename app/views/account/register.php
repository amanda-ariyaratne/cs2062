<?= $this->setSiteTitle('Register') ?>

<?= $this->start('head'); ?>

  <style type="text/css">
    .register-image{
      font-size: 300px;
      display: inline-block;
      color:#c1939e;
      padding: 80px 100px;
      background: -webkit-linear-gradient(right, #f7d2da, #7f4956);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
    }
    .register-option-holder{
      width: 1200px;
    }
    .register-option{
      margin: 75px 150px;
      width: 250px;
      display: inline-block;
      position: relative;
      float: right;
    }
    .register-items{
      margin: 50px 0;
    }
    .register-btn{
      font-size: 20px;
      padding: 20px;
      background-color: #6d6d6d;
      
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
            <h2 class="heading" style="text-align: center; font-weight: 300; font-size: 50px;">Register</h2>



          </div>

          <div class="register-option-holder" style="border: 1px solid #c1939e; ">
              <i class="fas fa-users register-image" ></i>
              <div class="row register-option" style="">
                <div class="col-xs-12 register-items">
                  <button class="btn btn-1 register-btn" id="customer-register">I WANT TO REGISTER AS A <span style="font-size: 25px;">customer</span></button>
                </div>
                <div class="col-xs-12 register-items">
                  <button class="btn btn-1 register-btn" id="tailor-register">I WANT TO REGISTER AS A <span style="font-size: 25px;">tailor</span></button>
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
