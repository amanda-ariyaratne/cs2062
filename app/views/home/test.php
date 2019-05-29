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

          <div class="row" style="margin: 100px 500px;">
            <div class="col-xs-12">
              <button class="btn btn-1">I want to register as a <span style="font-size: 20px;">seller</span></button>
            </div>
          </div>
          <div class="row" style="margin: 100px 500px;">
            <div class="col-xs-12">
              <button class="btn btn-1">I want to register as a <span style="font-size: 20px;">buyer</span></button>
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
  
function validateRegistration(){
    
    document.getElementById('error_first_name').innerHTML = "";
    document.getElementById('error_last_name').innerHTML = "";
    document.getElementById('error_email').innerHTML = "";
    document.getElementById('error_confirm_password').innerHTML = "";
    document.getElementById('error_password').innerHTML = "";
    
    var first_name = document.getElementById("first_name").value;
    var last_name = document.getElementById("last_name").value;
    var email = document.getElementById("email").value;
    var password = document.getElementById("password").value;
    var confirm_password = document.getElementById("confirm_password").value;
    var el;
    var email_regex = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/

    if (first_name == "")
    {
        el = document.getElementById('error_first_name');
        el.innerHTML = "First name field is required!";
        return false;
    }
    else if (last_name == "")
    {
        el = document.getElementById('error_last_name');
        el.innerHTML = "Last name field is required!";
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
    else if (password == "")
    {
        el = document.getElementById('error_password');
        el.innerHTML = "<div style='color: red;'>Password field is required!</div>";
        return false;
    }
    else if (password.length < 8)
    {
        el = document.getElementById('error_password');
        el.innerHTML = "<div style='color: red;'>Password must be minimum 8 charachters!</div>";
        return false;
    }
    else if (confirm_password == "")
    {
        el = document.getElementById('error_confirm_password');
        el.innerHTML = "<div style='color: red;'>Password confirmation is required!</div>";
        return false;
    }
    else if (password != confirm_password)
    {
        el = document.getElementById('error_password');
        el.innerHTML = "<div style='color: red;'>Password and Password Confirm don't match!</div>";
        return false;
    }
    else
    {
        return true;
    }
}

</script>

<?= $this->end(); ?>
