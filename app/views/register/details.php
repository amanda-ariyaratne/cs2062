<?= $this->setSiteTitle('User') ?>

<?= $this->start('head'); ?>

<style type="text/css">
  input[type="text"], input[type="date"] {
    color: #212529;
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
          <div class="page-title">Your Info</div>
        </div>
      
      
      <div class="col-lg-6 col-md-12 col-sm-12 col-12">
        <ul class="breadcrumb">
          <li itemscope itemtype="http://data-vocabulary.org/Breadcrumb">
            <a itemprop="url" href="/">
              <span itemprop="title" class="d-none">Handy Store</span>Home
            </a>
          </li>

          

            <li class="active">Your Info</li>

          
        </ul>
      </div>
    </div>

  </div>
</div>

<div class="container">
  <div class="page-address">
    
    <!-- <h2>Your Info</h2> -->

    <div class="row">
      <div class="new-address col-12">
        <a href="<?=PROOT?>register/editDetails"><button id="new-address" class="btn btn-1" onclick="window.location.href = 'editDetails'"></a>Edit Your Info</button>
        <!-- <a href="/account">Return to Account Detail</a> -->
      </div>

      <div id="col-main" class="col-12">

        <div id="add_address" class="customer_address edit_address">
          <form method="post" action="/account/addresses" id="address_form_new" accept-charset="UTF-8"><input type="hidden" name="form_type" value="customer_address" /><input type="hidden" name="utf8" value="✓" />

          <div class="customer_address_table">
            <!-- <div class="control-wrapper">
              <h4>Add New Address</h4>
            </div> -->
            <div class="control-wrapper">
              <label>First Name</label>
              <input type="text" id="first_name" class="col-md-6 col-sm-12" name="first_name" placeholder="First Name" value="<?php if(isset($user)){echo $user->first_name;}?>" disabled/>
            </div>

            <div class="control-wrapper">
              <label>Last Name</label>
              <input type="text" id="last_name" class="col-md-6 col-sm-12" name="last_name" placeholder="Last Name" value="<?php if(isset($user)){echo $user->last_name;}?>" disabled/>
            </div>

            <div class="control-wrapper">
              <label>Date of Birth</label>
              <input type="text" id="dateOfBirth" class="col-md-6 col-sm-12" name="dateOfBirth" placeholder="Date of Birth"  value="<?php if(isset($user)){echo $user->dateOfBirth;}?>" disabled/>
            </div>

            <div class="control-wrapper">
              <label>Address</label>
              <input type="text" id="apartmentNo" class="col-md-6 col-sm-12" name="apartmentNo" placeholder="Apartment No" value="<?php if(isset($user)){echo $user->apartmentNo;}?>" disabled/>
            </div>

            <div class="control-wrapper">
              <label>&nbsp</label>
              <input type="text" id="streetName1" class="col-md-6 col-sm-12" name="streetName1" placeholder="Street Name 1" value="<?php if(isset($user)){echo $user->streetName1;}?>" disabled/>
            </div>
            <div class="control-wrapper">
              <label>&nbsp</label>
              <input type="text" id="streetName2" class="col-md-6 col-sm-12" name="streetName2" placeholder="Street Name 2" value="<?php if(isset($user)){echo $user->streetName2;}?>" disabled/>
            </div>
            <div class="control-wrapper">
              <label>&nbsp</label>
              <input type="text" id="city" class="col-md-6 col-sm-12" name="city" placeholder="City" value="" disabled/>
            </div>            
            <div class="control-wrapper">
              <label>Postal Code</label>
              <input type="text" id="postalCode" class="col-md-6 col-sm-12" name="postalCode" placeholder="Postal Code" value="<?php if(isset($user)){echo $user->postalCode;}?>" disabled/>
            </div>
            <div class="control-wrapper">
              <label>Mobile Number</label>
              <input type="text" id="mobileNo" class="col-md-6 col-sm-12" name="mobileNo" placeholder="Mobile No eg. 77 xxx xxxx" value="<?php if(isset($user)){echo $user->mobileNo;}?>" disabled/>
            </div>
            <div class="control-wrapper">
              <label>Land Line</label>
              <input type="text" id="landLine" class="col-md-6 col-sm-12" name="landLine" placeholder="Land Line eg. 11 xxx xxxx" value="<?php if(isset($user)){echo $user->landLine;}?>" disabled/>
            </div>            
          </form>
        </div>

        
        

        <div id="address_pagination"></div>  
        

      </div>

    </div>

  </div>
</div>
</div>
        </div>
      </div>
      
<?= $this->end(); ?>