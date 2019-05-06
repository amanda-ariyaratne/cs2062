<!DOCTYPE html>
<html>

<head>
	<title>HOME</title>
	<link rel="shortcut icon" href="<?=PROOT?>assets/images/logo.jpg" type="image/png" />
    <link rel="stylesheet" type="text/css" href="<?=PROOT?>assets/css/frontpage.css" />

    <style type="text/css">
		header{
		  background: linear-gradient(rgba(0,0,0,0.6),rgba(0,0,0,0.6)), url(<?=PROOT?>assets/images/back-1.jpg);
		  height: 753px;
		  background-position:center center;
		  position: relative;
		  background-repeat:repeat;
			}

		header{
		  animation: animateee 16s ease-in-out infinite;
		}

		@keyframes animateee{
		  0%,100%{
		    background-image: url(<?=PROOT?>assets/images/back-6.jpg);
		  }
		  20%{
		    background-image: url(<?=PROOT?>assets/images/back-2.jpg);
		  }
		  40%{
		    background-image: url(<?=PROOT?>assets/images/back-3.jpg);
		  }
		  60%{
		    background-image: url(<?=PROOT?>assets/images/back-7.jpg);
		  }
		  80%{
		    background-image: url(<?=PROOT?>assets/images/back-5.jpg);
		  }
		}
    </style>
</head>

<body>
	<header>
		<div class="wrapper">
			<div class="logo">
				<img src="<?=PROOT?>assets/images/icon-main.jpg" style="border-radius: 50%;">
				<h2>TAILOR MATE</h2>
			</div>
			<ul class="nav-area">
				<li><a href="<?=PROOT?>home/ProductList">Home</a></li>
				<li><a href="<?=PROOT?>home/AboutUs">About</a></li>
				<li><a href="<?=PROOT?>home/ContactUs">Contact</a></li>
				<li><a href="<?=PROOT?>register/login">Login</a></li>
				<li><a href="<?=PROOT?>register/register">Register</a></li>
			</ul>
		</div>


		<div class="welcome-text">
			<h1>you can find your own Tailor</h1>
			<a href="<?=PROOT?>home/ContactUs">Contact Us</a>
		</div>
	</header>

</body>
</html>