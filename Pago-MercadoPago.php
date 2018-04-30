<?php
require_once ('mercadopago.php');

$mp = new MP('3476299045574111', 'XN3fvJMUfwxlLKP6QnqUfY9HFu8a60ej');

$preference_data = array(
	"items" => array(
		array(
			"title" => "Multicolor kite",
			"quantity" => 1,
			"currency_id" => "VEF", // Available currencies at: https://api.mercadopago.com/currencies
			"unit_price" => 10.00
		)
	)
);

$preference = $mp->create_preference($preference_data);
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Pay</title>
	</head>
	<body>
		<a href="<?php echo $preference['response']['init_point']; ?>">Pay</a>
	</body>
</html>