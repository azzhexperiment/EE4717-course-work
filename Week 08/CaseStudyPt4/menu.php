<?php

// Source, userid, password, database
$db = new mysqli('localhost', 'f37ee', 'f37ee', 'f37ee');

// Check connection
if ($db->connect_errno) {
	echo 'Error: Could not connect to database. Please try again later.';
	exit();
}

// Get the latest prices
$query = 'SELECT * FROM prices';

$result = $db->query($query);
$prices = $result->fetch_object();

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
						<li><a href="menu.php" id="current">Menu</a></li>
						<li><a href="music.html">Music</a></li>
						<li><a href="jobs.html">Jobs</a></li>
					</ul>
				</nav>
			</div>

			<!-- Content -->
			<div class="content" id="content-index">
				<h1>Coffee at JavaJam</h1>

				<form id="order-form" action="order.php" method="POST" target="_blank">
					<table class="menu">
						<thead>
							<tr>
								<td>Drink</td>
								<td>Description</td>
								<td>Qty</td>
								<td>Subtotal</td>
							</tr>
						</thead>

						<tbody>
							<tr class="menu-item">
								<td class="drink">Just Java</td>
								<td class="description">
									<div>
										Regular house blend, decaffeinated coffee, or flavor of the day.
									</div>
									<div>
										<label for="endless-just-java">
											<input type="radio" name="just_java_price" id="endless-just-java" value="<?= $prices->just_java_endless ?>">
											Endless Cup $<?= $prices->just_java_endless ?>
										</label>
									</div>
								</td>
								<td class="qty">
									<lable for="qty-just-java">Qty:</lable>
									<input class="qty" type="number" min="0" value="0" name="just_java_qty" id="qty-just-java">
								</td>
								<td class="subtotal">
									$ <span id="sub-just-java">0.00</span>
								</td>
							</tr>
							<tr class="menu-item">
								<td class="drink">Cafe au Lait</td>
								<td class="description">
									<div>
										House blended coffee infused into a smooth steamed milk.
									</div>
									<div>
										<label for="single-cafe-au-lait">
											<input type="radio" name="cafe_au_lait_price" id="single-cafe-au-lait" value="<?= $prices->cafe_au_lait_single ?>">
											Single $<?= $prices->cafe_au_lait_single ?>
										</label>
										<label for="double-cafe-au-lait">
											<input type="radio" name="cafe_au_lait_price" id="double-cafe-au-lait" value="<?= $prices->cafe_au_lait_double ?>">
											Double $<?= $prices->cafe_au_lait_double ?>
										</label>
									</div>
								</td>
								<td class="qty">
									<lable for="qty-cafe-au-lait">Qty:</lable>
									<input class="qty" type="number" min="0" value="0" name="cafe_au_lait_qty" id="qty-cafe-au-lait">
								</td>
								<td class="subtotal">
									$ <span id="sub-cafe-au-lait">0.00</span>
								</td>
							</tr>
							<tr class="menu-item">
								<td class="drink">Iced Cappuccino</td>
								<td class="description">
									<div>
										Sweetened espresso blended with icy-cold milk and served in a chilled glass.
									</div>
									<div>
										<label for="single-iced-cappuccino">
											<input type="radio" name="iced_cappuccino_price" id="single-iced-cappuccino" value="<?= $prices->iced_cappuccino_single ?>">
											Single $<?= $prices->iced_cappuccino_single ?>
										</label>
										<label for="double-iced-cappuccino">
											<input type="radio" name="iced_cappuccino_price" id="double-iced-cappuccino" value="<?= $prices->iced_cappuccino_double ?>">
											Double $<?= $prices->iced_cappuccino_double ?>
										</label>
									</div>
								</td>
								<td class="qty">
									<lable for="qty-iced-cappuccino">Qty:</lable>
									<input class="qty" type="number" min="0" value="0" name="iced_cappuccino_qty" id="qty-iced-cappuccino">
								</td>
								<td class="subtotal">
									$ <span id="sub-iced-cappuccino">0.00</span>
								</td>
							</tr>
						</tbody>

						<tfoot>
							<tr>
								<td class="total" colspan="4">
									Total: $ <span id="total-cost">0.00</span>
								</td>
							</tr>
							<tr>
								<td class="total" colspan="4">
									<input type="submit" value="Place order">
								</td>
							</tr>
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

<?php

$prices->free();
$db->close();

?>
