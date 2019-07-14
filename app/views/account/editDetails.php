<?= $this->setSiteTitle('Edit Account') ?>

<?= $this->start('head'); ?>

<!-- bootstrap 4.x is supported. You can also use the bootstrap css 3.3.x versions -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" crossorigin="anonymous">
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.0.1/css/fileinput.min.css" media="all" rel="stylesheet" type="text/css" />
<!-- if using RTL (Right-To-Left) orientation, load the RTL CSS file after fileinput.css by uncommenting below -->
<!-- link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.0.1/css/fileinput-rtl.min.css" media="all" rel="stylesheet" type="text/css" /-->
<!-- the font awesome icon library if using with `fas` theme (or Bootstrap 4.x). Note that default icons used in the plugin are glyphicons that are bundled only with Bootstrap 3.x. -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" crossorigin="anonymous">

<script src="https://code.jquery.com/jquery-3.3.1.min.js" crossorigin="anonymous"></script>
<!-- piexif.min.js is needed for auto orienting image files OR when restoring exif data in resized images and when you
    wish to resize images before upload. This must be loaded before fileinput.min.js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.0.1/js/plugins/piexif.min.js" type="text/javascript"></script>
<!-- sortable.min.js is only needed if you wish to sort / rearrange files in initial preview. 
    This must be loaded before fileinput.min.js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.0.1/js/plugins/sortable.min.js" type="text/javascript"></script>
<!-- purify.min.js is only needed if you wish to purify HTML content in your preview for 
    HTML files. This must be loaded before fileinput.min.js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.0.1/js/plugins/purify.min.js" type="text/javascript"></script>
<!-- popper.min.js below is needed if you use bootstrap 4.x (for popover and tooltips). You can also use the bootstrap js 
   3.3.x versions without popper.min.js. -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<!-- bootstrap.min.js below is needed if you wish to zoom and preview file content in a detail modal
    dialog. bootstrap 4.x is supported. You can also use the bootstrap js 3.3.x versions. -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<!-- the main fileinput plugin file -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.0.1/js/fileinput.min.js"></script>

<style type="text/css">
  input[type="text"], input[type="date"] {
    color: #212529;
  }
  .kv-avatar .krajee-default.file-preview-frame,.kv-avatar .krajee-default.file-preview-frame:hover {
      margin: 0;
      padding: 0;
      border: none;
      box-shadow: none;
      text-align: center;
  }
  .kv-avatar {
      display: inline-block;
  }
  .kv-avatar .file-input {
      display: table-cell;
      width: 300px;
  }
  .kv-reqd {
      color: red;
      font-family: monospace;
      font-weight: normal;
  }
  .btn-1{
    background:#c1939e;
    color:#fff;
    border:1px solid #c1939e
  }
  .btn-1:hover,.btn-1:focus,
  .btn-1:active{
    background:#714956;
    color:#fff;
    border-color:#714956
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
          <form method="post" action="saveEditMyAccount" id="userDetailsForm" onsubmit="return validateDetails();" enctype="multipart/form-data">

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
              <label>Avatar</label>
              <div class="kv-avatar">
                  <div class="file-loading">
                      <input id="logo" name="logo" type="file" >
                  </div>
              </div>
              <script>
                $(document).ready(function() {
                  $("#logo").fileinput({
                      theme: "fas",
                      overwriteInitial: true,
                      maxFileSize: 1500,
                      showClose: false,
                      showCaption: false,
                      showZoom: false,
                      browseLabel: '',
                      removeLabel: '',
                      overwriteInitial: true,
                      zoomIcon: '<i class="fas fa-search"></i>',
                      previewZoomButtonIcons: {
                        toggleheader: '<i class="fa fa-angle-up"></i>',
                        fullscreen: '<i class="fas fa-expand-arrows-alt"></i>',
                        borderless: '<i class="fas fa-external-link-alt"></i>',
                        close: '<i class="fas fa-times"></i>'
                      },
                      browseIcon: '<i class="fa fa-folder-open"></i>',
                      removeIcon: '<i class="fa fa-trash"></i>',
                      removeTitle: 'Cancel or reset changes',
                      elErrorContainer: '#kv-avatar-errors-1',
                      msgErrorClass: 'alert alert-block alert-danger',
                      defaultPreviewContent: ['<img src="<?php if (isset($user->logo)) {
                        echo PROOT . 'assets/images/ProfilePictures/' . $user->logo ;
                      } else {
                        echo PROOT . 'assets/images/default-customer.png' ;
                      } ?> ">'],
                      initialPreviewAsData : false,
                      initialPreviewConfig: [
                          {previewAsData: false}
                      ],
                      layoutTemplates: {main2: '{preview} {remove} {browse}'},
                      allowedFileExtensions: ["jpg", "png", "gif"]
                  });
                });
              </script>
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
    else if ((mobileNo.toString().length != 9) && (mobileNo.toString().length != 0))
    {
        el = document.getElementById('error_mobileNo');
        el.innerHTML = "Mobile No is not valid!";
        alert("gh");
        return false;
    }
    else if ((landLine.toString().length != 9) && (landLine.toString().length != 0))
    {
        el = document.getElementById('error_landLine');
        el.innerHTML = "Land line No is not valid!";
        return false;
    }
    else
    {
        return true;
    }
}

</script>
      
<?= $this->end(); ?>