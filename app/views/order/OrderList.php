<?= $this->setSiteTitle('All Orders') ?>

<?= $this->start('head'); ?>
<?= $this->end(); ?>


<?= $this->start('body'); ?>
  <style type="text/css">
    input{
      position: relative;
      display: block;
      padding: 20px 500px;
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

  <div class="container">
    <center>
      <i class="demo-icon icon-handy-cart" style="font-size: 70px; padding: 0px 20px 0 0;"></i>
      <h2>ALL ORDERS</h2>
    </center>
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

<?= $this->end(); ?>