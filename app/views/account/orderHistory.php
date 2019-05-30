<?= $this->setSiteTitle('Account') ?>

<?= $this->start('head'); ?>

  <style type="text/css">
    .alert-success {
      border-radius: 0;
      border-color: #c1939e;
      color: #c1939e;
      background-color: #f3ebed;
    }

    .order-id{
      position: relative;
      display: block;
      padding: 5px 10px;
      background-color: white;
      margin: 20px;
      border:1px solid rgba(0,0,0,.125);
      transition: all 0.35s ease 0s;
      outline: none;
      color: black;
      cursor: pointer;
      background-color: #c1939e;
    }
    .order-id:hover{
      color: white;
      background-color: #7f4956;
    }
    .order_details{
      display: inline-block;
    }
    .order-detail-item{
      padding :0 10px;
      margin: 0px;
    }
    .order-icon{
      padding: 0 10px;
    }
    .order-detail-item-block{
      padding: 20px 0px;
    }
    .order-list{
      display:block; 
      border:solid; 
      border-width:1px; 
      width:200px; 
      display:inline-block; 
      margin:5px;

    }
    .order-list:hover{
      color: #7f4956;
      box-shadow: 0 10px 15px #c1939e;
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
          <div class="page-account">
            <div class="row">
              
              <div class="col-lg-3 col-md-4 col-sm-12">
                <div class="account-details">
                  <h2>Account Details</h2>

                  <div class="info">
                    <div class="author"><i class="demo-icon icon-electro-user-icon"></i><?php if (isset($user)) {
                      echo $user->first_name . ' ' . $user->last_name;
                    } ?></div>
                    <div class="email"><i class="demo-icon icon-mail"></i><?php if (isset($user)) {
                      echo $user->email;
                    } ?></div> 
                    
                  </div>

                  <a href="<?=PROOT?>register/myAccount" class="btn btn-1">View More... </a>
                </div>
              </div>
            
              <div id="col-main" class="col-lg-9 col-md-8 col-sm-12">
                <div id="customer_orders">
                  <center>
                    <i class="demo-icon icon-handy-cart" style="font-size: 70px; padding: 0px 20px 0 0;"></i>
                    <h2>ORDER HISTORY</h2>
                  </center>
                  
                  <?php 
                    if(sizeof($params['orders'])==0){
                      echo'
                        <div class="alert alert-success">
                          <button type="button" class="close" title="Close" data-dismiss="alert">×</button>
                          <p>You haven&#39;t placed any orders yet.</p>
                        </div>
                      ';
                    }
                  ?>
                    
                  <div class="list-group">
                    <form  method="post" action="<?=PROOT?>OrderController/orderStatus">
        <?php
          foreach($params['orders'] as $order){
            echo '
            <div class="order-list" style="">
              <span class="order_details">
                <div  class="order-detail-item-block">
                  <p class="order-detail-item"><i class="far fa-calendar-alt order-icon"></i>'.$order['created_at'].'</p>
                  <p class="order-detail-item"><i class="fab fa-paypal order-icon"></i>$'.$order['total_amount'].'</p>
                  ';
                  if ($order['delivered'] == false) {
                    echo'<p class="order-detail-item" style="color:#d8d500;"><i class="fa fa-spinner fa-spin order-icon"></i>Pending</p>';
                  }
                  else{
                    echo'<p class="order-detail-item" style="color:#0bea30;"><i class="fas fa-check-double order-icon"></i>Closed</p>';
                  }

                  echo'

                </div>
              </span>
  
              <center>
                <input type="hidden" name="order_id" value='.$order['order_id'].'>
                <input class="order-id" type="submit" name="order_id" value="View more">
              </center>
            </div>';
          }
        ?>
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

<?= $this->end(); ?>