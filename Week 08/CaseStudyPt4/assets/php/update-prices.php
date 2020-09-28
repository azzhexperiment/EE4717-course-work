<?php

/**
 * Allows admin to update prices of drinks from the dashboard.
 *
 * Program assumes users are trusted. Input validation is not performed.
 *
 * @author Zhu Zihao <zhuz0010@e.ntu.edu.sg>
 * @version 1.0
 */

// echo '<pre>', var_dump($_POST), '</pre>';

$newJustJava       = $_POST['just_java'];
$newCafeAuLait     = $_POST['cafe_au_lait'];
$newIcedCappuccino = $_POST['iced_cappuccino'];

$db = new mysqli('localhost', 'f37ee', 'f37ee', 'f37ee');

// Check connection
if ($db->connect_errno) {
	echo 'Error: Could not connect to database. Please try again later.';
	exit();
}

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
		$updateCafeAuLaitDouble     = 'UPDATE prices
			SET cafe_au_lait_double    = ' . $cafe_au_lait_double . '
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

$db->close();

echo '<script>window.close()</script>';
