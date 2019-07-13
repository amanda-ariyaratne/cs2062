<?= $this->setSiteTitle('Password Recovery') ?>

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

      <div class="col-sm-6 col-xs-12">
        <div class="form-wrapper">

          <div id="customer-login" class="content">
            <h3 class="heading">Create new password</h3>

            <form method="post" action="updateNewPW" id="passwordRecoveryform" name="passwordRecoveryform" onsubmit="return validatePWCreation();">

          <div id="register-form">

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
              <button class="btn btn-1" name="register" type="submit">Reset Password</button>
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
</div>
</div>

<script type="text/javascript">
  
function validatePWCreation(){
    
    document.getElementById('error_confirm_password').innerHTML = "";
    document.getElementById('error_password').innerHTML = "";
    
    var password = document.getElementById("password").value;
    var confirm_password = document.getElementById("confirm_password").value;
    var el;

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
