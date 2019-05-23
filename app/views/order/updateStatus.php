<?= $this->setSiteTitle('Update Status') ?>

<?= $this->start('head'); ?>

  <style type="text/css">
    .button{
      background-color: #c1939e; 
      cursor: pointer; 
      border-color: black; 
      border-radius: 4px; border:2px solid #c1939e;
      padding: 10px;
    }
  </style>
<?= $this->end(); ?>

<?= $this->start('body'); ?>
<div class="container">
  <form  method="post" action="<?=PROOT?>OrderController/inputStatus">
    <button type="submit" class="button" name="status" value="1">Confirm</button>
    <button type="submit" class="button" name="status" value="2">Manufacturing</button>
    <button type="submit" class="button" name="status" value="3">Delivering</button>
    <button type="submit" class="button" name="status" value="4">Delivered</button>    
  </form>
</div>

<?= $this->end(); ?>