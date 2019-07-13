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

		.nav-area li{
			display: inline-block;
			width: 120px;
			margin: 0 10px;
			position: relative;
			-webkit-transform: skewy(-3deg);
  			-webkit-backface-visibility: hidden;
  			-webkit-transition: 200ms all;
		}
		.nav-area li a{
			text-transform: uppercase;
		  	font-family: 'Squada One', cursive;
		  	font-weight: 800;
		  	display: block;
		  	background: #FFF;
		  	padding: 2px 10px;
		  	color: #333;
		  	font-size: 17px;
		  	text-align: center;
		  	text-decoration: none;
		 	position: relative;
		  	z-index: 1;
		  	text-shadow: 
		        1px 1px 0px #FFF, 
		        2px 2px 0px #999,
		        3px 3px 0px #FFF;
		    background-image: -webkit-linear-gradient(top, transparent 0%, rgba(0,0,0,.05) 100%);
		    -webkit-transition: 1s all;
		    background-image: -webkit-linear-gradient(left top, 
		        transparent 0%, transparent 25%, 
		        rgba(0,0,0,.15) 25%, rgba(0,0,0,.15) 50%, 
		        transparent 50%, transparent 75%, 
		        rgba(0,0,0,.15) 75%);
		  	background-size: 4px 4px;
		    box-shadow: 
		        0 0 0 1px rgba(0,0,0,.4) inset, 
		        0 0 20px -5px rgba(0,0,0,.4),
		        0 0 0px 3px #FFF inset;
		}
		.nav-area li:hover{
			width: 160px;
    		margin: 0 -5px;
		}
		.nav-area li a:hover{
			color: #633546;
		}
		.nav-area li:after,
		.nav-area li:before {
		  content: '';
		  position: absolute;
		  width: 50px;
		  height: 100%;
		  background: #BBB;
		  -webkit-transform: skewY(8deg);
		  x-index: -3;
		    border-radius: 4px;
		}
		.nav-area li:after {
		    background-image: -webkit-linear-gradient(left, transparent 0%, rgba(0,0,0,.4) 100%);
		  right: 0;
		  top: -4px; 
		}
		.nav-area li:before {
		  left: 0;
		  bottom: -4px;
		    background-image: -webkit-linear-gradient(right, transparent 0%, rgba(0,0,0,.4) 100%);
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
			  font-family: 'Open Sans', sans-serif;
			  color: #633546;
			  text-decoration: none;
			  text-transform: uppercase;
			  font-size: 50px;
			  font-weight: 800;
			  letter-spacing: -3px;
			  line-height: 1;
			  text-shadow: #EDEDED 3px 2px 0;
			  position: relative;
		}
		.welcome-text h1:after{
			  background-image: -webkit-linear-gradient(left top, transparent 0%, transparent 25%, #555 25%, #555 50%, transparent 50%, transparent 75%, #555 75%);
			  background-size: 4px 4px;
			  -webkit-background-clip: text;
			  -webkit-text-fill-color: transparent;
			  z-index: -5;
			  display: block;
			  text-shadow: none;
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
			<ul class="nav-area" style="width: 730px; height: 42px;">
				<li><a href="<?=PROOT?>home/ProductList/1">Products</a></li>
				<li><a href="<?=PROOT?>home/AboutUs">About</a></li>
				<li><a href="<?=PROOT?>home/ContactUs">Contact</a></li>
				<li><a href="<?=PROOT?>account/login">Login</a></li>
				<li><a href="<?=PROOT?>account/register">Register</a></li>
			</ul>
		</div>


		<div class="welcome-text">
			<h1>you can find your own Tailor</h1>
<!-- 			<a href="<?=PROOT?>home/ContactUs">Contact Us</a>
 -->		</div>
	</header>

</body>
</html>