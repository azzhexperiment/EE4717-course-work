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

$justJava       = $_POST['just_java'];
$cafeAuLait     = $_POST['cafe_au_lait'];
$icedCappuccino = $_POST['iced_cappuccino'];

$db = new mysqli('localhost', 'f37ee', 'f37ee', 'f37ee');

// Check connection
if ($db->connect_errno) {
	echo 'Error: Could not connect to database. Please try again later.';
	exit();
}

$getPrices = 'SELECT * FROM prices';
$prices = $db->query($getPrices)->fetch_object();

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

$db->close();

echo '<script>window.close()</script>';
