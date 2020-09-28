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
						<li><a href="product-price-update.php" id="current">Product Price Update</a></li>
						<li><a href="daily-sales-report.php">Daily Sales Report</a></li>
					</ul>
				</nav>
			</div>

			<!-- Content -->
			<div class="content" id="content-index">
				<h1>Click to generate daily sales report:</h1>

				<form id="generate-report" action="report.php" method="GET" target="_blank">
					<div>
						<label for="dollar-sales">
							<input type="radio" name="reportType" id="dollar-sales" value="dollarSales" onclick="submit()">
							Total dollar sales by products
						</label>
					</div>
					<div>
						<label for="sales-qty">
							<input type="radio" name="reportType" id="sales-qty" value="salesQty" onclick="submit()">
							Sales quantities by product categories
						</label>
					</div>
				</form>

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
