<?= $this->setSiteTitle('Store Details') ?>

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


<?php if (isset($params['vendor'])) {
  $vendor = $params['vendor'];
  if (isset($params['store'])) {
    $store = $params['store'];
  }
} ?>     
      
<div id="body-content" class="layout-boxed">
  <div id="main-content"> 
    <div class="main-content">
      <div class="wrap-breadcrumb bw-color">
        <div id="breadcrumb" class="breadcrumb-holder container">
          <div class="row">
            <div class="col-lg-6 d-none d-lg-block">
              <div class="page-title">Store Info</div>
            </div>
            <div class="col-lg-6 col-md-12 col-sm-12 col-12">
              <ul class="breadcrumb">
                <li itemscope itemtype="http://data-vocabulary.org/Breadcrumb">
                  <a itemprop="url" href="/">
                    <span itemprop="title" class="d-none">Handy Store</span>Home
                  </a>
                </li>
                <li class="active">Store Info
                </li>
              </ul>
            </div>
          </div>

        </div>
      </div>  
      <div class="container">
        <div class="page-address">

          <div class="row">
            <div class="new-address col-12">
              <a href="<?=PROOT?>account/editStoreDetails">
                <button type="button" id="new-address" class="btn btn-1" onclick="window.location.href = 'editStoreDetails'">Edit Store Info
                </button>
              </a>
            </div>

            <div id="col-main" class="col-12">

              <div id="add_address" class="customer_address edit_address">
                <form method="post" action="" id="address_form_new" accept-charset="UTF-8" enctype="multipart/form-data">
                  <div class="customer_address_table">

                    <div class="control-wrapper">
                      <label>Store Name</label>
                      <input type="text" id="store_name" class="col-md-6 col-sm-12" name="store_name" placeholder="Store Name" value="<?php if(isset($store)){echo $store->name;}?>" disabled/>
                    </div>

                    <div class="control-wrapper">
                      <label>Owner Name</label>
                      <input type="text" id="owner_name" class="col-md-6 col-sm-12" name="owner_name" placeholder="Owner Name" value="<?php if(isset($vendor)){echo $vendor->first_name . ' ' . $vendor->last_name;}?>" disabled/>
                    </div>

                    <div class="control-wrapper">
                      <label>Paypal Email</label>
                      <input type="text" id="paypal_email" class="col-md-6 col-sm-12" name="paypal_email" placeholder="Paypal Email" value="<?php if(isset($store)){echo $store->paypal_email;}?>" disabled/>
                    </div>
                    
                    <div class="control-wrapper">
                      <label>Address</label>
                      <input type="text" id="apartmentNo" class="col-md-6 col-sm-12" name="apartmentNo" placeholder="Apartment No" value="<?php if(isset($store)){echo $store->apartmentNo;}?>" disabled/>
                    </div>

                    <div class="control-wrapper">
                      <label>&nbsp</label>
                      <input type="text" id="streetName1" class="col-md-6 col-sm-12" name="streetName1" placeholder="Street Name 1" value="<?php if(isset($store)){echo $store->streetName1;}?>" disabled/>
                    </div>

                    <div class="control-wrapper">
                      <label>&nbsp</label>
                      <input type="text" id="streetName2" class="col-md-6 col-sm-12" name="streetName2" placeholder="Street Name 2" value="<?php if(isset($store)){echo $store->streetName2;}?>" disabled/>
                    </div>

                    <div class="control-wrapper">
                      <label>&nbsp</label>
                      <input type="text" id="city" class="col-md-6 col-sm-12" name="city" placeholder="City" value="<?php if(isset($store)){echo $store->city;}?>" disabled/>
                    </div> 
      
                    <div class="control-wrapper">
                      <label>Postal Code</label>
                      <input type="text" id="postalCode" class="col-md-6 col-sm-12" name="postalCode" placeholder="Postal Code" value="<?php if(isset($store)){echo $store->postal_code;}?>" disabled/>
                    </div>
   
                    <div class="control-wrapper">
                      <label>Contact Number</label>
                      <input type="text" id="contactNo" class="col-md-6 col-sm-12" name="contactNo" placeholder="Contact No eg. 11 xxx xxxx" value="<?php if(isset($store)){echo $store->contactNumber;}?>" disabled/>
                    </div> 

                    <div class="control-wrapper">
                      <label>Facebook URL</label>
                      <input type="text" id="facebook_url" class="col-md-6 col-sm-12" name="facebook_url" placeholder="Facebook URL" value="<?php if(isset($store)){echo $store->facebook_url;}?>" disabled/>
                    </div>

                    <div class="control-wrapper">
                      <label>Google+ URL</label>
                      <input type="text" id="google_plus_url" class="col-md-6 col-sm-12" name="google_plus_url" placeholder="Google+ URL" value="<?php if(isset($store)){echo $store->google_plus_url;}?>" disabled/>
                    </div>

                    <div class="control-wrapper">
                      <label>Instagram URL</label>
                      <input type="text" id="instagram_url" class="col-md-6 col-sm-12" name="instagram_url" placeholder="Instagram URL" value="<?php if(isset($store)){echo $store->instagram_url;}?>" disabled/>
                    </div>

                    <div class="control-wrapper">
                      <label>Youtube URL</label>
                      <input type="text" id="youtube_url" class="col-md-6 col-sm-12" name="youtube_url" placeholder="Youtube URL" value="<?php if(isset($store)){echo $store->youtube_url;}?>" disabled/>
                    </div>

                    <div class="control-wrapper">
                      <label>LinkedIn URL</label>
                      <input type="text" id="linkedin_url" class="col-md-6 col-sm-12" name="linkedin_url" placeholder="LinkedIn URL" value="<?php if(isset($store)){echo $store->linkedin_url;}?>" disabled/>
                    </div>  

                    <div class="control-wrapper">
                      <label>Logo</label>
                      <div class="kv-avatar">
                          <div class="file-loading">
                              <input id="logo" name="logo" type="file" >
                          </div>
                      </div>
                      <script>
                        $(document).ready(function() {
                          $("#logo").fileinput({
                            overwriteInitial: true,
                            maxFileSize: 1500,
                            showClose: false,
                            showCaption: false,
                            browseLabel: '',
                            removeLabel: '',
                            browseIcon: '<i class="fa fa-folder-open"></i>',
                            removeIcon: '<i class="fa fa-trash-o"></i>',
                            removeTitle: 'Cancel or reset changes',
                            elErrorContainer: '#kv-avatar-errors-1',
                            msgErrorClass: 'alert alert-block alert-danger',
                            defaultPreviewContent: '<img src="<?php if (isset($store->logo)) {
                              echo PROOT . 'assets/images/store_logo/' . $store->logo ;
                            } else {
                              echo PROOT . 'assets/images/defaultPreview.png' ;
                            } ?> ">',
                            layoutTemplates: {main2: '{preview} '},
                            allowedFileExtensions: ["jpg", "png", "gif"]
                          });
                        });
                      </script>
                    </div> 
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