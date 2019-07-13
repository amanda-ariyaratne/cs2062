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
          <div class="page-title">Register as a Customer</div>
        </div>
      
      
      <div class="col-lg-6 col-md-12 col-sm-12 col-12">
        <ul class="breadcrumb">
          <li itemscope itemtype="http://data-vocabulary.org/Breadcrumb">
            <a itemprop="url" href="<?=PROOT?>">
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

      <div class="col-sm-6 col-xs-12">
        <div class="form-wrapper">

          <div id="customer-login" class="content">
            <!--<h2 class="heading">Register</h2>-->

            <form method="post" action="<?=PROOT?>account/register" id="registerform" name="registerform" onsubmit="return validateRegistration();">
              <input type="hidden" name="role" id="role" value="" />
          <div id="register-form">

            <div class="row control-wrapper">
              <div class="row"><span id="error_first_name" style="color: red; padding-left: 180px; font-size: 12px; margin-top: 20px;"></span></div>
              <label class="col-md-3" for="first-name">First Name<span class="req">*</span></label>
              <input class="col-md-8" type="text" name="first_name" id="first_name" autofocus autocomplete="on" value="<?php if(isset($_SESSION['first_name']))
    echo $_SESSION['first_name']; $_SESSION['first_name'] = '';?>" />
              <label class="col-md-1" id="first_name_error"></label>
            </div>

            <div class="row control-wrapper">
              <div class="row"><span id="error_last_name" style="color: red; padding-left: 180px; font-size: 12px; margin-top: 20px;"></span></div>
              <label class="col-md-3" for="last-name">Last Name<span class="req">*</span></label>
              <input type="text" name="last_name" id="last_name" value="<?php if(isset($_SESSION['last_name']))
    echo $_SESSION['last_name']; $_SESSION['last_name'] = '';?>"/>
              <label class="col-md-1" id="first_name_error"></label>
            </div>

            <div class="row control-wrapper">
              <div class="row"><span id="error_email" style="color: red; padding-left: 180px; font-size: 12px; margin-top: 20px;">
                <?php if (isset($_SESSION['error_email'])) {
                  echo $_SESSION['error_email'];
                  $_SESSION['error_email'] = '';
                }  ?>
              </span></div>
              <label class="col-md-3" for="email">Email address<span class="req">*</span></label>
              <input type="text" name="email" id="email"  value="<?php if(isset($_SESSION['email']))
    echo $_SESSION['email'];$_SESSION['email']='';?>"/>
              <label class="col-md-1" id="first_name_error"></label>
            </div>

            <div class="row control-wrapper">
              <div class="row"><span id="error_password" style="color: red; padding-left: 180px; font-size: 12px; margin-top: 20px;"></span></div>
              <label class="col-md-3" for="password">Password<span class="req">*</span></label>
              <input type="password" name="password" id="password" class="password" onselectstart="return false" onpaste="return false;" onCopy="return false" onCut="return false" onDrag="return false" onDrop="return false" autocomplete=off/>
              <label class="col-md-1" id="first_name_error"></label>
            </div>

            <div class="row control-wrapper">
              <div class="row"><span id="error_confirm_password" style="color: red; padding-left: 180px; font-size: 12px; margin-top: 20px;"></span></div>
              <label class="col-md-3" for="password">Confirm Password<span class="req">*</span></label>
              <input type="password" name="confirm_password" id="confirm_password" class="password" onselectstart="return false" onpaste="return false;" onCopy="return false" onCut="return false" onDrag="return false" onDrop="return false" autocomplete=off/>
              <label class="col-md-1" id="first_name_error"></label>
            </div>

            <div class="row control-wrapper last">
              <button class="btn btn-1" name="register" type="submit">Register</button>
            </div>

          </div>
          </form>

          </div>

          <div id="recover-password" style="display: none;">

            <h2 class="heading">Reset Password</h2>
            <p class="note">We will send you an email to reset your password.</p>

            <form method="post" action="/account/recover" accept-charset="UTF-8"><input type="hidden" name="form_type" value="recover_customer_password" /><input type="hidden" name="utf8" value="✓" />

            

            

            <div class="control-wrapper">
              <label for="email">Email address<span class="req">*</span></label>
              <input type="email" value="" name="email" id="recover-email" />
            </div>

            <div class="control-wrapper">
              <button class="btn btn-1" type="submit">Reset Password</button>
              <a class="cancel btn btn-2" href="javascript:;" onclick="hideRecoverPasswordForm();">Cancel</a>
            </div>

            </form>
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
      $('#role').val(localStorage.getItem('role'));
    });

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
