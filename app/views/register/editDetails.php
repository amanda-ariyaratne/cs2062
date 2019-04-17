<?= $this->setSiteTitle('Edit Account') ?>

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
    
    <h2>Your Info</h2>

    <div class="row">
      <div class="new-address col-12">
<!--         <button id="new-address" class="btn btn-1" onclick="Shopify.CustomerAddress.toggleNewForm(); return false;">Edit Your Info</button> -->
        <!-- <a href="/account">Return to Account Detail</a> -->
      </div>

      <div id="col-main" class="col-12">

        <div id="add_address" class="customer_address edit_address">
          <form method="post" action="" id="userDetailsForm" onsubmit="return validateDetails();">

          <div class="customer_address_table">
            <!-- <div class="control-wrapper">
              <h4>Add New Address</h4>
            </div> -->
            <div class="control-wrapper">
              <div class="row"><span id="error_first_name" style="color: red; padding-left: 180px; font-size: 12px; margin-top: 20px;"></span></div>
              <label>First Name</label>
              <input type="text" id="first_name" class="col-md-6 col-sm-12" name="first_name" placeholder="First Name" value="<?php if(isset($user)){echo $user->first_name;}?>" />
              <label></label>
              
            </div>

            <div class="control-wrapper">
              <div class="row"><span id="error_last_name" style="color: red; padding-left: 180px; font-size: 12px; margin-top: 20px;"></span></div>
              <label>Last Name</label>
              <input type="text" id="last_name" class="col-md-6 col-sm-12" name="last_name" placeholder="Last Name" value="<?php if(isset($user)){echo $user->last_name;}?>" />
            </div>

            <div class="control-wrapper">
              <div class="row"><span id="error_dateOfBirth" style="color: red; padding-left: 180px; font-size: 12px; margin-top: 20px;"></span></div>
              <label>Date of Birth</label>
              <input type="date" id="dateOfBirth" class="col-md-6 col-sm-12" name="dateOfBirth" placeholder="Date of Birth"  value="<?php if(isset($user)){echo $user->dateOfBirth;}?>" />
            </div>

            <div class="control-wrapper">
              <div class="row"><span id="error_apartmentNo" style="color: red; padding-left: 180px; font-size: 12px; margin-top: 20px;"></span></div>
              <label>Address</label>
              <input type="text" id="apartmentNo" class="col-md-6 col-sm-12" name="apartmentNo" placeholder="Apartment No" value="<?php if(isset($user)){echo $user->apartmentNo;}?>" />
            </div>

            <div class="control-wrapper">
              <div class="row"><span id="error_streetName1" style="color: red; padding-left: 180px; font-size: 12px; margin-top: 20px;"></span></div>
              <label>&nbsp</label>
              <input type="text" id="streetName1" class="col-md-6 col-sm-12" name="streetName1" placeholder="Street Name 1" value="<?php if(isset($user)){echo $user->streetName1;}?>" />
            </div>
            <div class="control-wrapper">
              <div class="row"><span id="error_streetName2" style="color: red; padding-left: 180px; font-size: 12px; margin-top: 20px;"></span></div>
              <label>&nbsp</label>
              <input type="text" id="streetName2" class="col-md-6 col-sm-12" name="streetName2" placeholder="Street Name 2" value="<?php if(isset($user)){echo $user->streetName2;}?>" />
            </div>
            <div class="control-wrapper">
              <div class="row"><span id="error_city" style="color: red; padding-left: 180px; font-size: 12px; margin-top: 20px;"></span></div>
              <label>&nbsp</label>
              <input type="text" id="city" class="col-md-6 col-sm-12" name="city" placeholder="City" value="<?php if(isset($user)){echo $user->city;}?>" />
            </div>            
            <div class="control-wrapper">
              <div class="row"><span id="error_postalCode" style="color: red; padding-left: 180px; font-size: 12px; margin-top: 20px;"></span></div>
              <label>Postal Code</label>
              <input type="text" id="postalCode" class="col-md-6 col-sm-12" name="postalCode" placeholder="Postal Code" value="<?php if(isset($user)){echo $user->postalCode;}?>" />
            </div>
            <div class="control-wrapper">
              <div class="row"><span id="error_mobileNo" style="color: red; padding-left: 180px; font-size: 12px; margin-top: 20px;"></span></div>
              <label>Mobile Number</label>
              <input type="text" id="mobileNo" class="col-md-6 col-sm-12" name="mobileNo" placeholder="Mobile No eg. 77 xxx xxxx" value="<?php if(isset($user)){echo $user->mobileNo;}?>" />
            </div>
            <div class="control-wrapper">
              <div class="row"><span id="error_landLine" style="color: red; padding-left: 180px; font-size: 12px; margin-top: 20px;"></span></div>
              <label>Land Line</label>
              <input type="text" id="landLine" class="col-md-6 col-sm-12" name="landLine" placeholder="Land Line eg. 11 xxx xxxx" value="<?php if(isset($user)){echo $user->landLine;}?>" />
            </div>  

          <div class="control-wrapper">
            <button class="btn btn-1" type="submit">Save</button>
            <!-- <a href="#" onclick="Shopify.CustomerAddress.toggleNewForm(); return false;" class="btn btn-2">Cancel</a> -->
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

<script type="text/javascript">
  
function validateDetails(){

    document.getElementById('error_first_name').innerHTML = "";
    document.getElementById('error_last_name').innerHTML = "";
    document.getElementById('error_postalCode').innerHTML = "";
    document.getElementById('error_mobileNo').innerHTML = "";
    document.getElementById('error_mobileNo').innerHTML = "";
    
    var first_name = document.getElementById("first_name").value;
    var last_name = document.getElementById("last_name").value;
    var postalCode = document.getElementById("postalCode").value;
    var mobileNo = document.getElementById("mobileNo").value;
    var landLine = document.getElementById("landLine").value;
    var el;

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
    else if (Math.floor(postalCode) != postalCode)
    {
        el = document.getElementById('error_postalCode');
        el.innerHTML = "Postal Code is not valid!";
        return false;
    }
    else if (mobileNo.toString().length != 9)
    {
        el = document.getElementById('error_mobileNo');
        el.innerHTML = "Mobile No is not valid!";
        return false;
    }
    else if (landLine.toString().length != 9)
    {
        el = document.getElementById('error_mobileNo');
        el.innerHTML = "Mobile No is not valid!";
        return false;
    }
    else
    {
        return true;
    }
}

</script>
      
<?= $this->end(); ?>