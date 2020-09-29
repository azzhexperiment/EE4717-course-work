<?php

/**
 * Generated report page based on user selection.
 *
 * 1. Show total dollar sales by products and
 * 2. Show sales quantities by product categories (single and double shots)
 *
 * It should also be possible to report the product category which achieved the
 * highest dollar sales in the latter report.
 *
 * @author Zhu Zihao <zhuz0010@e.ntu.edu.sg>
 * @version 1.0
 */

$reportType = $_GET['reportType'];

// Source, userid, password, database
$db = new mysqli('localhost', 'f37ee', 'f37ee', 'f37ee');

// Check connection
if ($db->connect_errno) {
	echo 'Error: Could not connect to database. Please try again later.';
	exit();
}

// Getter queries for sales data
$get = [
	// Amount
	'revenueJustJava'              => 'SELECT SUM(just_java_subtotal)              AS revenue FROM sales',
	'revenueCafeAuLaitSingle'      => 'SELECT SUM(cafe_au_lait_single_subtotal)    AS revenue FROM sales',
	'revenueCafeAuLaitDouble'      => 'SELECT SUM(cafe_au_lait_double_subtotal)    AS revenue FROM sales',
	'revenueIcedCappuccinoSingle'  => 'SELECT SUM(iced_cappuccino_single_subtotal) AS revenue FROM sales',
	'revenueIcedCappuccinoDouble'  => 'SELECT SUM(iced_cappuccino_double_subtotal) AS revenue FROM sales',

	// Qty
	'totalQtyJustJava'             => 'SELECT SUM(just_java_qty)              AS qty FROM sales',
	'totalQtyCafeAuLaitSingle'     => 'SELECT SUM(cafe_au_lait_single_qty)    AS qty FROM sales',
	'totalQtyCafeAuLaitDouble'     => 'SELECT SUM(cafe_au_lait_double_qty)    AS qty FROM sales',
	'totalQtyIcedCappuccinoSingle' => 'SELECT SUM(iced_cappuccino_single_qty) AS qty FROM sales',
	'totalQtyIcedCappuccinoDouble' => 'SELECT SUM(iced_cappuccino_double_qty) AS qty FROM sales',

	// Total sales
	'totalRevenue'                 => 'SELECT SUM(total) AS total FROM sales',
];

// Get revenue from each product
$revenueJustJava              = $db->query($get['revenueJustJava'])->fetch_object();
$revenueCafeAuLaitSingle      = $db->query($get['revenueCafeAuLaitSingle'])->fetch_object();
$revenueCafeAuLaitDouble      = $db->query($get['revenueCafeAuLaitDouble'])->fetch_object();
$revenueIcedCappuccinoSingle  = $db->query($get['revenueIcedCappuccinoSingle'])->fetch_object();
$revenueIcedCappuccinoDouble  = $db->query($get['revenueIcedCappuccinoDouble'])->fetch_object();
$totalRevenue                 = $db->query($get['totalRevenue'])->fetch_object();

// Get qty sold for each product
$totalQtyJustJava             = $db->query($get['totalQtyJustJava'])->fetch_object();
$totalQtyCafeAuLaitSingle     = $db->query($get['totalQtyCafeAuLaitSingle'])->fetch_object();
$totalQtyCafeAuLaitDouble     = $db->query($get['totalQtyCafeAuLaitDouble'])->fetch_object();
$totalQtyIcedCappuccinoSingle = $db->query($get['totalQtyIcedCappuccinoSingle'])->fetch_object();
$totalQtyIcedCappuccinoDouble = $db->query($get['totalQtyIcedCappuccinoDouble'])->fetch_object();

// Get best seller
$revenues = [
	'Just Java (endless cup)'       => $revenueJustJava->revenue,
	'Cafe au Lait (single shot)'    => $revenueCafeAuLaitSingle->revenue,
	'Cafe au Lait (double shot)'    => $revenueCafeAuLaitDouble->revenue,
	'Iced Cappuccino (single shot)' => $revenueIcedCappuccinoSingle->revenue,
	'Iced Cappuccino (double shot)' => $revenueIcedCappuccinoDouble->revenue,
];

rsort($revenues);

if ($revenues[0] === $revenueJustJava->revenue) {
	$bestSeller = 'Just Java (endless cup)';
} elseif ($revenues[0] === $revenueCafeAuLaitSingle->revenue) {
	$bestSeller = 'Cafe au Lait (single shot)';
} elseif ($revenues[0] === $revenueCafeAuLaitDouble->revenue) {
	$bestSeller = 'Cafe au Lait (double shot)';
} elseif ($revenues[0] === $revenueIcedCappuccinoSingle->revenue) {
	$bestSeller = 'Iced Cappuccino (single shot)';
} elseif ($revenues[0] === $revenueIcedCappuccinoDouble->revenue) {
	$bestSeller = 'Iced Cappuccino (double shot)';
}

?>

<!doctype html>
<html lang="en">

<head>
	<title>JavaJam Coffee House</title>
	<meta charset="utf-8">

	<!-- Styles -->
	<link rel="stylesheet" href="assets/css/style.css">
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
						<li><a href="product-price-update.php">Product Price Update</a></li>
						<li><a href="daily-sales-report.php" id="current">Daily Sales Report</a></li>
					</ul>
				</nav>
			</div>

			<!-- Content -->
			<div class="content" id="content-index">

				<?php if ($reportType === 'dollarSales') : ?>
					<h1>Total dollar sales by products</h1>

					<table class="report" id="report--dollar-sales">
						<thead>
							<tr>
								<th>Product</th>
								<th>Revenue</th>
							</tr>
						</thead>

						<tbody>
							<tr class="menu-item">
								<td>Just Java (endless cup)</td>
								<td>
									$ <span class="total">
										<?= $revenueJustJava->revenue ?>
									</span>
								</td>
							</tr>
							<tr class="menu-item">
								<td>Cafe au Lait (single shot)</td>
								<td>
									$ <span class="total">
										<?= $revenueCafeAuLaitSingle->revenue ?>
									</span>
								</td>
							</tr>
							<tr class="menu-item">
								<td>Cafe au Lait (double shot)</td>
								<td>
									$ <span class="total">
										<?= $revenueCafeAuLaitDouble->revenue ?>
									</span>
								</td>
							</tr>
							<tr class="menu-item">
								<td>Iced Cappuccino (single shot)</td>
								<td>
									$ <span class="total">
										<?= $revenueIcedCappuccinoSingle->revenue ?>
									</span>
								</td>
							</tr>
							<tr class="menu-item">
								<td>Iced Cappuccino (double shot)</td>
								<td>
									$ <span class="total">
										<?= $revenueIcedCappuccinoDouble->revenue ?>
									</span>
								</td>
							</tr>
						</tbody>

						<tfoot>
							<tr>
								<td>TOTAL SALES</td>
								<td>
									$ <span class="total">
										<?= $totalRevenue->total ?>
									</span>
								</td>
							</tr>
						</tfoot>
					</table>
				<?php endif ?>

				<?php if ($reportType === 'salesQty') : ?>
					<table class="report" id="report--sales-qty">
						<thead>
							<tr>
								<th>Product</th>
								<th>Qty Sold</th>
							</tr>
						</thead>

						<tbody>
							<tr class="menu-item">
								<td>Just Java (Endless Cup)</td>
								<td>
									<span class="total"><?= $totalQtyJustJava->qty ?><span>
								</td>
							</tr>
							<tr class="menu-item">
								<td>Cafe au Lait (single shot)</td>
								<td>
									<span class="total"><?= $totalQtyCafeAuLaitSingle->qty ?><span>
								</td>
							</tr>
							<tr class="menu-item">
								<td>Cafe au Lait (double shot)</td>
								<td>
									<span class="total"><?= $totalQtyCafeAuLaitDouble->qty ?><span>
								</td>
							</tr>
							<tr class="menu-item">
								<td>Iced Cappuccino (single shot)</td>
								<td>
									<span class="total"><?= $totalQtyIcedCappuccinoSingle->qty ?><span>
								</td>
							</tr>
							<tr class="menu-item">
								<td>Iced Cappuccino (double shot)</td>
								<td>
									<span class="total"><?= $totalQtyIcedCappuccinoDouble->qty ?><span>
								</td>
							</tr>
						</tbody>

						<tfoot>
							<tr>
								<td>BEST SELLER</td>
								<td><?= $bestSeller ?></td>
							</tr>
						</tfoot>
					</table>
				<?php endif ?>

				<div id="spacer"></div>
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

$db->close();

?>
