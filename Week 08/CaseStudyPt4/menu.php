<?php

/**
 * Get user input for an order and insert into database for sales entry.
 *
 * @todo Perform get_magic_quotes_gpc() check
 * @todo Escape any user sql injection commands
 *
 * @author Zhu Zihao <zhuz0010@e.ntu.edu.sg>
 * @version 1.3.1
 */

$db = new mysqli('localhost', 'f37ee', 'f37ee', 'f37ee');

// Check connection
if ($db->connect_errno) {
	echo 'Error: Could not connect to database. Please try again later.';
	exit();
}

// Get the latest prices
$getPrices = 'SELECT * FROM prices';
$prices = $db->query($getPrices)->fetch_object();

// Capture order
if (isset($_POST)) {
	$justJava       = $_POST['just_java'];
	$cafeAuLait     = $_POST['cafe_au_lait'];
	$icedCappuccino = $_POST['iced_cappuccino'];

	// Get user input qty. Default to 0 if no option selected.
	if (isset($justJava)) {
		$just_java_qty = intval($_POST['just_java_qty']);
	} else {
		$just_java_qty = 0;
	}

	// Get user input qty. Default to 0 if no option selected.
	if (isset($cafeAuLait)) {
		if ($cafeAuLait === 'cafe_au_lait_single') {
			$cafe_au_lait_single_qty = intval($_POST['cafe_au_lait_qty']);
		} elseif ($cafeAuLait === 'cafe_au_lait_double') {
			$cafe_au_lait_double_qty = intval($_POST['cafe_au_lait_qty']);
		}
	} else {
		$cafe_au_lait_single_qty = 0;
		$cafe_au_lait_double_qty = 0;
	}

	// Get user input qty. Default to 0 if no option selected.
	if (isset($icedCappuccino)) {
		if ($icedCappuccino === 'iced_cappuccino_single') {
			$iced_cappuccino_single_qty = intval($_POST['iced_cappuccino_qty']);
		} elseif ($icedCappuccino === 'iced_cappuccino_double') {
			$iced_cappuccino_double_qty = intval($_POST['iced_cappuccino_qty']);
		}
	} else {
		$iced_cappuccino_single_qty = 0;
		$iced_cappuccino_double_qty = 0;
	}

	$just_java_price    = $prices->just_java_endless;
	$just_java_subtotal = $just_java_qty * $just_java_price;

	$cafe_au_lait_single_price    = $prices->cafe_au_lait_single;
	$cafe_au_lait_single_subtotal = $cafe_au_lait_single_qty * $cafe_au_lait_single_price;

	$cafe_au_lait_double_price    = $prices->cafe_au_lait_double;
	$cafe_au_lait_double_subtotal = $cafe_au_lait_double_qty * $cafe_au_lait_double_price;

	$iced_cappuccino_single_price    = $prices->iced_cappuccino_single;
	$iced_cappuccino_single_subtotal = $iced_cappuccino_single_qty * $iced_cappuccino_single_price;

	$iced_cappuccino_double_price    = $prices->iced_cappuccino_double;
	$iced_cappuccino_double_subtotal = $iced_cappuccino_double_qty * $iced_cappuccino_double_price;

	$total = $just_java_subtotal +
		$cafe_au_lait_single_subtotal +
		$cafe_au_lait_double_subtotal +
		$iced_cappuccino_single_subtotal +
		$iced_cappuccino_double_subtotal;

	// Insert new sales info
	$insertNewSalesEntry = 'INSERT INTO sales
	VALUES (DEFAULT,
		"' . $just_java_qty                   . '",
		"' . $just_java_price                 . '",
		"' . $just_java_subtotal              . '",
		"' . $cafe_au_lait_single_qty         . '",
		"' . $cafe_au_lait_single_price       . '",
		"' . $cafe_au_lait_single_subtotal    . '",
		"' . $cafe_au_lait_double_qty         . '",
		"' . $cafe_au_lait_double_price       . '",
		"' . $cafe_au_lait_double_subtotal    . '",
		"' . $iced_cappuccino_single_qty      . '",
		"' . $iced_cappuccino_single_price    . '",
		"' . $iced_cappuccino_single_subtotal . '",
		"' . $iced_cappuccino_double_qty      . '",
		"' . $iced_cappuccino_double_price    . '",
		"' . $iced_cappuccino_double_subtotal . '",
		"' . $total                           . '"
	)';

	$db->query($insertNewSalesEntry);
}

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
						<li>&nbsp;</li>
						<li>&nbsp;</li>
						<li><u>Admin Pages</u></li>
						<li><a href="product-price-update.php">Product Price Update</a></li>
						<li><a href="daily-sales-report.php">Daily Sales Report</a></li>
					</ul>
				</nav>
			</div>

			<!-- Content -->
			<div class="content" id="content-index">
				<h1>Coffee at JavaJam</h1>

				<form id="order-form" action="<?= htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
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
											<input type="radio" name="just_java" id="endless-just-java" value="just_java_endless" data-price="<?= $prices->just_java_endless ?>">
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
											<input type="radio" name="cafe_au_lait" id="single-cafe-au-lait" value="cafe_au_lait_single" data-price="<?= $prices->cafe_au_lait_single ?>">
											Single $<?= $prices->cafe_au_lait_single ?>
										</label>
										<label for="double-cafe-au-lait">
											<input type="radio" name="cafe_au_lait" id="double-cafe-au-lait" value="cafe_au_lait_double" data-price="<?= $prices->cafe_au_lait_double ?>">
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
											<input type="radio" name="iced_cappuccino" id="single-iced-cappuccino" value="iced_cappuccino_single" data-price="<?= $prices->iced_cappuccino_single ?>">
											Single $<?= $prices->iced_cappuccino_single ?>
										</label>
										<label for="double-iced-cappuccino">
											<input type="radio" name="iced_cappuccino" id="double-iced-cappuccino" value="iced_cappuccino_double" data-price="<?= $prices->iced_cappuccino_double ?>">
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
									<input type="submit" value="Place order" id="submit-btn">
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
