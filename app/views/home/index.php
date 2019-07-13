<!DOCTYPE html>
<html>

<head>
	<title>HOME</title>
	<link rel="shortcut icon" href="<?=PROOT?>assets/images/icon-main.jpg" type="image/png" />
    <link rel="stylesheet" type="text/css" href="<?=PROOT?>assets/css/frontpage.css" />

    <style type="text/css">
		header{
		  background: linear-gradient(rgba(0,0,0,0.6),rgba(0,0,0,0.6)), url(<?=PROOT?>assets/images/main_background/1.jpg);
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
		    background-image: url(<?=PROOT?>assets/images/main_background/1.jpg);
		  }
		  20%{
		    background-image: url(<?=PROOT?>assets/images/main_background/2.jpg);
		  }
		  40%{
		    background-image: url(<?=PROOT?>assets/images/main_background/3.jpg);
		  }
		  60%{
		    background-image: url(<?=PROOT?>assets/images/main_background/4.jpg);
		  }
		  80%{
		    background-image: url(<?=PROOT?>assets/images/main_background/6.jpg);
		  }
		}

		.nav-area li a{
			color: #633546;
			font-weight: 700;
		}
		.nav-area li a:hover{
			background:#633546;
			color:#fff;
		}
		.welcome-text a{
			color: #633546;
			border:1px solid #633546;
			background:#ffe3eb;
		}
		.welcome-text a:hover{
			background:#633546;
			color: #fff;
		}
		.welcome-text h1{
			color: #633546;
			text-shadow: 4px 5px #fff;
		}
		.logo h2{
			text-shadow: 3px 2px #f25784;
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
			<ul class="nav-area" style="width: 600px">
				<li><a href="<?=PROOT?>home/ProductList/1">Products</a></li>
				<li><a href="<?=PROOT?>home/AboutUs">About</a></li>
				<li><a href="<?=PROOT?>home/ContactUs">Contact</a></li>
				<li><a href="<?=PROOT?>account/login">Login</a></li>
				<li><a href="<?=PROOT?>account/register">Register</a></li>
			</ul>
		</div>


		<div class="welcome-text">
			<h1>you can find your own Tailor</h1>
			<a href="<?=PROOT?>home/ContactUs">Contact Us</a>
		</div>
	</header>

</body>
</html>