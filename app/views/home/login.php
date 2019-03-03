<?= $this->setSiteTitle('Login') ?>

<?= $this->start('head'); ?>

<?= $this->end(); ?>



<?= $this->start('content'); ?>

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
            <h2 class="heading">Login</h2>

            <form method="post" action="/account/login" id="customer_login" accept-charset="UTF-8"><input type="hidden" name="form_type" value="customer_login" /><input type="hidden" name="utf8" value="✓" />

            

            <div class="control-wrapper">
              <label for="customer_email">Email address<span class="req">*</span></label>
              <input type="email" required name="customer[email]" id="customer_email" />
            </div>

            
            <div class="control-wrapper">
              <label for="customer_password">Password<span class="req">*</span></label>
              <input type="password" required name="customer[password]" id="customer_password" class="password" />
            </div>
            

            <div class="control-wrapper last">
              <div class="action">
                <a class="forgot-pass" href="javascript:;" onclick="showRecoverPasswordForm()">Lost your password?</a>
                <a class="return-store" href="https://arena-handy.myshopify.com">Return to Store</a>
              </div>
              <button class="btn btn-1" type="submit">Login</button>
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

      <div class="col-sm-6 col-xs-12 login-or">
        <div class="form-wrapper">

          <h2 class="heading">Register</h2>

          <form method="post" action="/account" id="create_customer" accept-charset="UTF-8"><input type="hidden" name="form_type" value="create_customer" /><input type="hidden" name="utf8" value="✓" />

          

          <div id="register-form">

            <div class="control-wrapper">
              <label for="first-name">First Name</label>
              <input type="text" name="customer[first_name]" id="first-name"  autocapitalize="words" autofocus />
            </div>

            <div class="control-wrapper">
              <label for="last-name">Last Name</label>
              <input type="text" name="customer[last_name]" id="last-name"  autocapitalize="words" autofocus />
            </div>

            <div class="control-wrapper">
              <label for="email">Email address<span class="req">*</span></label>
              <input type="email" value="" name="customer[email]" id="email"  />
            </div>

            <div class="control-wrapper">
              <label for="password">Password<span class="req">*</span></label>
              <input type="password" value="" name="customer[password]" id="password" class="password" />
            </div>

            <div class="control-wrapper last">
              <button class="btn btn-1" type="submit">Register</button>
            </div>

          </div>
          </form>

        </div>
      </div>

    </div>

  </div>
</div>
<?= $this->end(); ?>
