<?php

$just_java_price        = floatval($_POST['just_java_price']);
$cafe_au_lait_price     = floatval($_POST['cafe_au_lait_price']);
$iced_cappuccino_price  = floatval($_POST['iced_cappuccino_price']);


// echo '<pre>', var_dump($_POST), '</pre>';
// echo '<pre>', var_dump($total), '</pre>';

// echo 'Just Java (qty, price, subtotal)';
// echo '<pre>', var_dump($just_java_qty),            '</pre>';
// echo '<pre>', var_dump($just_java_price),          '</pre>';
// echo '<pre>', var_dump($just_java_subtotal),       '</pre>';
// echo 'Cafe au Lait (qty, price, subtotal)';
// echo '<pre>', var_dump($cafe_au_lait_qty),         '</pre>';
// echo '<pre>', var_dump($cafe_au_lait_price),       '</pre>';
// echo '<pre>', var_dump($cafe_au_lait_subtotal),    '</pre>';
// echo 'Iced Cappuccino (qty, price, subtotal)';
// echo '<pre>', var_dump($iced_cappuccino_qty),      '</pre>';
// echo '<pre>', var_dump($iced_cappuccino_price),    '</pre>';
// echo '<pre>', var_dump($iced_cappuccino_subtotal), '</pre>';

$db = new mysqli('localhost', 'f37ee', 'f37ee', 'f37ee');

// Check connection
if ($db->connect_errno) {
	echo 'Error: Could not connect to database. Please try again later.';
	exit();
}

// Insert new sales info
$query = 'INSERT INTO sales VALUES (DEFAULT,
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

echo '
	<script>
		alert("Order placed!")
		window.close()
	</script>
';
