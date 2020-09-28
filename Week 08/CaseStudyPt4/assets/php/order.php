<?php

/**
 * Get user input for an order and insert into database for sales entry.
 *
 * @todo Perform get_magic_quotes_gpc() check
 * @todo Escape any user sql injection commands
 *
 * @author Zhu Zihao <zhuz0010@e.ntu.edu.sg>
 * @version 1.2.0
 */

// Just Java is omitted since relevant fields will default to 0
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

$just_java_qty      = intval($_POST['just_java_qty']);
$just_java_price    = $prices->$just_java_endless;
$just_java_subtotal = $just_java_qty * $just_java_price;

if (isset($cafeAuLait)) {
	if ($cafeAuLait === 'cafe_au_lait_single') {
		$cafe_au_lait_single_qty      = intval($_POST['cafe_au_lait_qty']);
		$cafe_au_lait_single_price    = $prices->$cafe_au_lait_single;
		$cafe_au_lait_single_subtotal = $cafe_au_lait_single_qty * $cafe_au_lait_single_price;
	} elseif ($cafeAuLait === 'cafe_au_lait_double') {
		$cafe_au_lait_double_qty      = intval($_POST['cafe_au_lait_qty']);
		$cafe_au_lait_double_price    = $prices->$cafe_au_lait_double;
		$cafe_au_lait_double_subtotal = $cafe_au_lait_double_qty * $cafe_au_lait_double_price;
	}
}

if (isset($icedCappuccino)) {
	if ($icedCappuccino === 'iced_cappuccino_single') {
		$iced_cappuccino_single_qty      = intval($_POST['iced_cappuccino_qty']);
		$iced_cappuccino_single_price    = $prices->$iced_cappuccino_single;
		$iced_cappuccino_single_subtotal = $iced_cappuccino_single_qty * $iced_cappuccino_single_price;
	} elseif ($icedCappuccino === 'iced_cappuccino_double') {
		$iced_cappuccino_double_qty      = intval($_POST['iced_cappuccino_qty']);
		$iced_cappuccino_double_price    = $prices->$iced_cappuccino_double;
		$iced_cappuccino_double_subtotal = $iced_cappuccino_double_qty * $iced_cappuccino_double_price;
	}
}

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
		"' . $cafe_au_lait_single_qty         . '",
		"' . $cafe_au_lait_single_price       . '",
		"' . $cafe_au_lait_double_price       . '",
		"' . $cafe_au_lait_double_subtotal    . '",
		"' . $cafe_au_lait_double_subtotal    . '",
		"' . $iced_cappuccino_single_qty      . '",
		"' . $iced_cappuccino_single_qty      . '",
		"' . $iced_cappuccino_single_price    . '",
		"' . $iced_cappuccino_double_price    . '",
		"' . $iced_cappuccino_double_subtotal . '",
		"' . $iced_cappuccino_double_subtotal . '",
		"' . $total                           . '"
)';

$db->query($insertNewSalesEntry);

$db->close();

echo '<script>window.close()</script>';
