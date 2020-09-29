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

// Get current sales
$query = 'SELECT * FROM sales';

$result = $db->query($query);
$sales = $result->fetch_object();

$revenueJustJava = $sales;
$revenueCafeAuLaitSingle = $sales->x;
$revenueCafeAuLaitDouble = $sales->x;
$revenueIcedCappuccinoSingle = $sales->x;
$revenueIcedCappuccinoDouble = $sales->x;

$totalRevenue = 1;

$qtyJustJava = $sales;
$qtyCafeAuLaitSingle = $sales->x;
$qtyCafeAuLaitDouble = $sales->x;
$qtyIcedCappuccinoSingle = $sales->x;
$qtyIcedCappuccinoDouble = $sales->x;

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

				<?php if ($reportType === 'dollarSales') {
					// can use <? php if (): ? >

					/**
					 * -------------------------------------------
					 * | ITEM                             | $$$$ |
					 * |------------------------------------------
					 * | Just Java (Endless Cup)          | $amt |
					 * |------------------------------------------
					 * | Cafe au Lait (single shot)       | $amt |
					 * |------------------------------------------
					 * | Cafe au Lait (double shot)       | $amt |
					 * |------------------------------------------
					 * | Iced Cappuccino (single shot)    | $amt |
					 * |------------------------------------------
					 * | Iced Cappuccino (double shot)    | $amt |
					 * |------------------------------------------
					 * | TOTAL                            | $AMT |
					 * |------------------------------------------
					 */
				?>
					<h1>Total dollar sales by products</h1>

					<table class="report" id="report--dollar-sales">
						<thead>
							<tr>
								<th>Product</th>
								<th>Revenue</th>
							</tr>
						</thead>

						<tbody>
							<tr>
								<td>Just Java (Endless Cup)</td>
								<td><?= $revenueJustJava ?></td>
							</tr>
							<tr>
								<td>Cafe au Lait (single shot)</td>
								<td><?= $revenueCafeAuLaitSingle ?></td>
							</tr>
							<tr>
								<td>Cafe au Lait (double shot)</td>
								<td><?= $revenueCafeAuLaitDouble ?></td>
							</tr>
							<tr>
								<td>Iced Cappuccino (single shot)</td>
								<td><?= $revenueIcedCappuccinoSingle ?></td>
							</tr>
							<tr>
								<td>Iced Cappuccino (double shot)</td>
								<td><?= $revenueIcedCappuccinoDouble ?></td>
							</tr>
						</tbody>

						<tfoot>
							<tr>
								<td>TOTAL SALES</td>
								<td><?= $totalRevenue ?></td>
							</tr>
						</tfoot>
					</table>
				<?php } ?>

				<?php if ($reportType === 'salesQty') {
					/**
					 * -------------------------------------------
					 * | ITEM                           |  Qty   |
					 * |------------------------------------------
					 * | Just Java (Endless Cup)        |  $qty  |
					 * |------------------------------------------
					 * | Cafe au Lait (single shot)     |  $qty  |
					 * |------------------------------------------
					 * | Cafe au Lait (double shot)     |  $qty  |
					 * |------------------------------------------
					 * | Iced Cappuccino (single shot)  |  $qty  |
					 * |------------------------------------------
					 * | Iced Cappuccino (double shot)  |  $qty  |
					 * |------------------------------------------
					 * | TOP SELLING                    |  ITEM  |
					 * |------------------------------------------
					 */
				?>
					<table class="report" id="report--sales-qty">
						<thead>
							<tr>
								<th>Product</th>
								<th>Qty</th>
							</tr>
						</thead>

						<tbody>
							<tr>
								<td>Just Java (Endless Cup)</td>
								<td><?= $qtyJustJava ?></td>
							</tr>
							<tr>
								<td>Cafe au Lait (single shot)</td>
								<td><?= $qtyCafeAuLaitSingle ?></td>
							</tr>
							<tr>
								<td>Cafe au Lait (double shot)</td>
								<td><?= $qtyCafeAuLaitDouble ?></td>
							</tr>
							<tr>
								<td>Iced Cappuccino (single shot)</td>
								<td><?= $qtyIcedCappuccinoSingle ?></td>
							</tr>
							<tr>
								<td>Iced Cappuccino (double shot)</td>
								<td><?= $qtyIcedCappuccinoDouble ?></td>
							</tr>
						</tbody>

						<tfoot>
							<tr>
								<td>BEST SELLER</td>
								<td><?= $bestSeller ?></td>
							</tr>
						</tfoot>
					</table>
				<?php } ?>

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
