<?php

/**
 * Get user input for an order and insert into database for sales entry.
 *
 * @todo Perform get_magic_quotes_gpc() check
 * @todo Escape any user sql injection commands
 */

$just_java_qty      = intval($_POST['just_java_qty']);
$just_java_price    = floatval($_POST['just_java_price']);
$just_java_subtotal = $just_java_qty * $just_java_price;

$cafe_au_lait_qty      = intval($_POST['cafe_au_lait_qty']);
$cafe_au_lait_price    = floatval($_POST['cafe_au_lait_price']);
$cafe_au_lait_subtotal = $cafe_au_lait_qty * $cafe_au_lait_price;

$iced_cappuccino_qty      = intval($_POST['iced_cappuccino_qty']);
$iced_cappuccino_price    = floatval($_POST['iced_cappuccino_price']);
$iced_cappuccino_subtotal = $iced_cappuccino_qty * $iced_cappuccino_price;

$total = $just_java_subtotal + $cafe_au_lait_subtotal + $iced_cappuccino_subtotal;

$db = new mysqli('localhost', 'f37ee', 'f37ee', 'f37ee');

// Check connection
if ($db->connect_errno) {
	echo 'Error: Could not connect to database. Please try again later.';
	exit();
}

// Insert new sales info
$query = 'INSERT INTO sales
	VALUES (DEFAULT,
		"' . $just_java_qty            . '",
		"' . $just_java_price          . '",
		"' . $just_java_subtotal       . '",
		"' . $cafe_au_lait_qty         . '",
		"' . $cafe_au_lait_price       . '",
		"' . $cafe_au_lait_subtotal    . '",
		"' . $iced_cappuccino_qty      . '",
		"' . $iced_cappuccino_price    . '",
		"' . $iced_cappuccino_subtotal . '",
		"' . $total                    . '"
)';

$db->query($query);

$db->close();

echo '<script>window.close()</script>';
