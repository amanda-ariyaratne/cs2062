<?= $this->setSiteTitle('Account') ?>

<?= $this->start('head'); ?>

  <style type="text/css">
    .alert-success {
      border-radius: 0;
      border-color: #c1939e;
      color: #c1939e;
      background-color: #f3ebed;
    }

    input{
      position: relative;
      display: block;
      padding: 20px 350px;
      background-color: white;
      margin: 20px;
      border:1px solid rgba(0,0,0,.125);
      transition: all 0.35s ease 0s;
      outline: none;
      color: #646565;
      cursor: pointer;
      box-shadow: 1px 10px 15px #f7d2da;
    }
    input:hover{
      color: #7f4956;
      box-shadow: 0 10px 15px #c1939e;
    }
    .order-id{
      display: inline-block;
    }
    .icon-delivered{
      border-style: solid;
      border-color: black;
      border-width: 1px;
      padding: 4px 16px;
      background-image: linear-gradient(#60ffa8,#def7e9);
    }
    .icon-not-delivered{
      border-style: solid;
      border-color: black;
      border-width: 1px;
      padding: 4px 7px;
      background-image: linear-gradient(#e0c935,#f4ecba);
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
            echo 
            '<input class="order-id" type="submit" name="order_id" value='.$order['order_id'].'>';
            if ($order['delivered'] == false) {
              echo'<span class="icon-not-delivered"><i class="fa fa-spinner fa-spin" style="font-size:15px; padding:0 2px;"></i>Pending</span>';
            }
            else{
              echo'<span class="icon-delivered"><i class="fas fa-check-double" style="font-size:15px; padding:0 2px;"></i>Done</span>';
            }
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