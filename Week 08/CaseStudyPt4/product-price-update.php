<?php

/**
 * Allows admin to update prices of drinks from the dashboard.
 *
 * Program assumes users are trusted. Input validation is not performed.
 *
 * @author Zhu Zihao <zhuz0010@e.ntu.edu.sg>
 * @version 1.0
 */

$db = new mysqli('localhost', 'f37ee', 'f37ee', 'f37ee');

// Check connection
if ($db->connect_errno) {
	echo 'Error: Could not connect to database. Please try again later.';
	exit();
}

// Update prices
if (isset($_POST)) {
	$newJustJava       = $_POST['just_java'];
	$newCafeAuLait     = $_POST['cafe_au_lait'];
	$newIcedCappuccino = $_POST['iced_cappuccino'];

	// Check if Just Java is selected for price change and perform update.
	if (isset($newJustJava)) {
		$just_java_endless = floatval($_POST['just_java_price']);
		$updateJustJavaEndless = 'UPDATE prices
		SET just_java_endless = ' . $just_java_endless . '
		WHERE id = 1';

		$db->query($updateJustJavaEndless);
	}

	// Check if Cafe au Lait is selected for price change and perform update.
	if (isset($newCafeAuLait)) {
		if ($newCafeAuLait === 'cafe_au_lait_single') {
			$cafe_au_lait_single = floatval($_POST['cafe_au_lait_price']);
			$updateCafeAuLaitSingle = 'UPDATE prices
			SET cafe_au_lait_single = ' . $cafe_au_lait_single . '
			WHERE id = 1';

			$db->query($updateCafeAuLaitSingle);
		} elseif ($newCafeAuLait === 'cafe_au_lait_double') {
			$cafe_au_lait_double = floatval($_POST['cafe_au_lait_price']);
			$updateCafeAuLaitDouble = 'UPDATE prices
			SET cafe_au_lait_double = ' . $cafe_au_lait_double . '
			WHERE id = 1';

			$db->query($updateCafeAuLaitDouble);
		}
	}

	// Check if Ice Cappuccino is selected for price change and perform update.
	if (isset($newIcedCappuccino)) {
		if ($newIcedCappuccino === 'iced_cappuccino_single') {
			$iced_cappuccino_single = floatval($_POST['iced_cappuccino_price']);
			$updateIcedCappuccinoSingle = 'UPDATE prices
			SET iced_cappuccino_single = ' . $iced_cappuccino_single . '
			WHERE id = 1';

			$db->query($updateIcedCappuccinoSingle);
		} elseif ($newIcedCappuccino === 'iced_cappuccino_double') {
			$iced_cappuccino_double = floatval($_POST['iced_cappuccino_price']);
			$updateIcedCappuccinoDouble = 'UPDATE prices
			SET iced_cappuccino_double = ' . $iced_cappuccino_double . '
			WHERE id = 1';

			$db->query($updateIcedCappuccinoDouble);
		}
	}
}

// Get current prices
$getCurrentPrices = 'SELECT * FROM prices';
$prices = $db->query($getCurrentPrices)->fetch_object();

?>

<!doctype html>
<html lang="en">

<head>
	<title>JavaJam Coffee House</title>
	<meta charset="utf-8">

	<!-- Styles -->
	<link rel="stylesheet" href="assets/css/style.css">

	<!-- Scripts -->
	<script defer src="assets/js/update-prices.js"></script>
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
						<li><a href="menu.php">Menu</a></li>
						<li><a href="music.html">Music</a></li>
						<li><a href="jobs.html">Jobs</a></li>
						<li>&nbsp;</li>
						<li>&nbsp;</li>
						<li><u>Admin Pages</u></li>
						<li><a href="product-price-update.php" id="current">Product Price Update</a></li>
						<li><a href="daily-sales-report.php">Daily Sales Report</a></li>
					</ul>
				</nav>
			</div>

			<!-- Content -->
			<div class="content" id="content-index">
				<h1>Click to update product prices</h1>

				<form id="update-prices" action="<?= htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
					<table class="menu">
						<tbody>
							<tr class="menu-item">
								<td class="drink">Just Java</td>
								<td class="description">
									<div>
										Regular house blend, decaffeinated coffee, or flavor of the day.
									</div>
									<div>
										<label for="endless-just-java">
											<input type="radio" name="just_java" id="endless-just-java" value="just_java_endless">
											Endless Cup $<?= $prices->just_java_endless ?>
										</label>
									</div>
								</td>
								<td class="price">
									New price:
									<input type="text" name="just_java_price">
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
											<input type="radio" name="cafe_au_lait" id="single-cafe-au-lait" value="cafe_au_lait_single">
											Single $<?= $prices->cafe_au_lait_single ?>
										</label>
										<label for="double-cafe-au-lait">
											<input type="radio" name="cafe_au_lait" id="double-cafe-au-lait" value="cafe_au_lait_double">
											Double $<?= $prices->cafe_au_lait_double ?>
										</label>
									</div>
								</td>
								<td class="price">
									New price:
									<input type="text" name="cafe_au_lait_price">
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
											<input type="radio" name="iced_cappuccino" id="single-iced-cappuccino" value="iced_cappuccino_single">
											Single $<?= $prices->iced_cappuccino_single ?>
										</label>
										<label for="double-iced-cappuccino">
											<input type="radio" name="iced_cappuccino" id="double-iced-cappuccino" value="iced_cappuccino_double">
											Double $<?= $prices->iced_cappuccino_double ?>
										</label>
									</div>
								</td>
								<td class="price">
									New price:
									<input type="text" name="iced_cappuccino_price">
								</td>
							</tr>
						</tbody>

						<tfoot>
							<tr>
								<td class="total" colspan="3">
									<input type="submit" value="Update Price" id="submit-btn">
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
