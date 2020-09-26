<?php

$justJava;
$cafeAuLait;
$icedCappuccino;

?>

<!doctype html>
<html lang="en">

<head>
	<title>JavaJam Coffee House</title>
	<meta charset="utf-8">

	<!-- Styles -->
	<link rel="stylesheet" href="assets/css/style.css">

	<!-- Scripts -->
	<script defer src="assets/js/order.js"></script>
</head>

<body>
	<div class="wrapper">

		<!-- Header -->
		<header>
			<img id="banner" src="assets/img/banner.png" alt="JavaJam Coffee House">
		</header>

		<div class="content-wrapper">

			<!-- Navigation -->
			<div class="navbar">
				<nav>
					<ul>
						<li><a href="index.html">Home</a></li>
						<li><a href="menu.html" id="current">Menu</a></li>
						<li><a href="music.html">Music</a></li>
						<li><a href="jobs.html">Jobs</a></li>
					</ul>
				</nav>
			</div>

			<!-- Content -->
			<div class="content" id="content-index">
				<h1>Coffee at JavaJam</h1>

				<form id="order-form">
					<table class="menu">
						<tr class="menu-item">
							<td class="drink">Just Java</td>
							<td class="description">
								<div>
									Regular house blend, decaffeinated coffee,
									or flavor of the day.
								</div>
								<div>
									<input type="radio" name="justJava" id="endless-just-java" value="2.00">
									Endless Cup $2.00
								</div>
							</td>
							<td class="qty">
								<lable for="qty-just-java">Qty:</lable>
								<input class="qty" type="number" min="0" value="0" name="qtyjustJava" id="qty-just-java"></input>
							</td>
							<td class="subtotal">
								$ <span id="sub-just-java">0</span>
							</td>
						</tr>

						<tr class="menu-item">
							<td class="drink">Cafe au Lait</td>
							<td class="description">
								<div>
									House blended coffee infused into a smooth
									steamed milk.
								</div>
								<div>
									<input type="radio" name="cafeAuLait" id="single-cafe-au-lait" value="2.00">
									Single $2.00

									<input type="radio" name="cafeAuLait" id="double-cafe-au-lait" value="3.00">
									Double $3.00
								</div>
							</td>
							<td class="qty">
								<lable for="qty-cafe-au-lait">Qty:</lable>
								<input class="qty" type="number" min="0" value="0" name="qtyCafeAuLait" id="qty-cafe-au-lait"></input>
							</td>
							<td class="subtotal">
								$ <span id="sub-cafe-au-lait">0</span>
							</td>
						</tr>

						<tr class="menu-item">
							<td class="drink">Iced Cappuccino</td>
							<td class="description">
								<div>
									Sweetened espresso blended with icy-cold
									milk and served in a
									chilled glass.
								</div>

								<div>
									<input type="radio" name="icedCappuccino" id="single-iced-cappuccino" value="4.75">
									Single $4.75

									<input type="radio" name="icedCappuccino" id="double-iced-cappuccino" value="5.75">
									Double $5.75
								</div>
							</td>
							<td class="qty">
								<lable for="qty-iced-cappuccino">Qty:</lable>
								<input class="qty" type="number" min="0" value="0" name="qtyIcedCappuccino" id="qty-iced-cappuccino"></input>
							</td>
							<td class="subtotal">
								$ <span id="sub-iced-cappuccino">0</span>
							</td>
						</tr>

						<tfoot>
							<td class="total" colspan="4">
								Total: $ <span id="total-cost">0</span>
							</td>
						</tfoot>
					</table>
				</form>
			</div>

		</div>

		<!-- Footer -->
		<footer>
			<div class="copyright">
				<i>Copyright &copy; 2014 JavaJam Coffee House</i>
			</div>

			<div class="contact">
				<i><a href="mailto:zihao@zhu.com">zihao@zhu.com</a></i>
			</div>
		</footer>

	</div>
</body>

</html>
