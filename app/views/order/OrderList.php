<?= $this->setSiteTitle('All Orders') ?>

<?= $this->start('head'); ?>
<?= $this->end(); ?>


<?= $this->start('body'); ?>
  <style type="text/css">
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

  <div class="container" style="padding-bottom: 20px;">
    <center>
      <i class="demo-icon icon-handy-cart" style="font-size: 70px; padding: 0px 20px 0 0;"></i>
      <h2>ALL ORDERS</h2>
    </center>
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

<?= $this->end(); ?>