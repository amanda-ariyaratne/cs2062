<?= $this->setSiteTitle('All Orders') ?>

<?= $this->start('head'); ?>
<?= $this->end(); ?>


<?= $this->start('body'); ?>
  <style type="text/css">
    input{
      position: relative;
      display: block;
      padding: 20px 570px;
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
            echo '
              <input type="submit" name="order_id" value='.$order->id.'>
            ';}
        ?>
      </form>
      
    </div>
  </div>

<?= $this->end(); ?>