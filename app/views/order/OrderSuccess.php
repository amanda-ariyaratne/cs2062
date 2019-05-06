<?= $this->setSiteTitle('Thank you! - Tailor Mate Store - Checkout') ?>

<?= $this->start('head'); ?>

<?= $this->end(); ?>

<?= $this->start('body'); ?>
	<style type="text/css">
		.background-of-success{
			background-image: url(<?=PROOT?>assets/images/order-success-background.jpg);
			background-size: 100%;
		}
		.center{
			text-align: center;
			height: 600px;
			position: relative;
			top: 190px;
		}
		.continue-to-home{
			background-color: #c1939e;
			border-color: #c1939e;
			color: black;
		}
		.continue-to-home:hover{
			background-color: #7f4956;
			border-color: #7f4956;
		}
	</style>
	<div class="background-of-success">
		<div class="center">
		  <h1 class="display-3">Thank You!</h1>
		  <p class="lead">
		  	<strong>Please check your email</strong> 
		  	for further details about your order.
		  </p>
		  <hr>
		  <p>
		    Having trouble? 
		    <a href="<?=PROOT?>home/ContactUs">Contact us</a>
		  </p>
		  <p class="lead">
		    <a class="btn btn-primary btn-sm continue-to-home" href="<?=PROOT?>home/frontpage" role="button">Continue to homepage</a>
		  </p>
		</div>	
	</div>

<?= $this->end(); ?>