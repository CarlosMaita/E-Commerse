<?php
  include_once '../Common/conexion.php';
require_once "../Common/mercadopago.php";

$mp = new MP('677284083290958', 'qKu7qUKA72vSpmnQfScH7WNCovUvRznx');

if (!isset($_GET["data_id"], $_GET["type"]) || !ctype_digit($_GET["data_id"])) {
    http_response_code(400);
    return;
}


$topic = $_GET["type"];
$merchant_order_info = null;

switch ($topic) {
    case 'payment':
        $payment_info = $mp->get("/v1/payments/".$_GET["data_id"]);
        $merchant_order_info = $mp->get("/merchant_orders/".$payment_info["response"]["order"]["id"]);
        break;
    case 'merchant_order':
        $merchant_order_info = $mp->get("/merchant_orders/".$_GET["data_id"]);
        break;
    default:
        $merchant_order_info = null;
}

if($merchant_order_info == null) {
    echo "Error obtaining the merchant_order";
    die();
}

if ($merchant_order_info["status"] == 200) {
    
   // If the payment's transaction amount is equal (or bigger) than the merchant_order's amount you can release your items 
	$paid_amount = 0;
    
    $id_mp= $merchant_order_info["response"]["external_reference"];
    $id_mp=md5($id_mp);

	foreach ($merchant_order_info["response"]["payments"] as  $payment) {
		if ($payment['status'] == 'approved'){
			$paid_amount += $payment['transaction_amount'];
		}	
	}
	if($paid_amount >= $merchant_order_info["response"]["total_amount"]){
		if(count($merchant_order_info["response"]["shipments"]) > 0) { // The merchant_order has shipments
			if($merchant_order_info["response"]["shipments"][0]["status"] == "ready_to_ship"){
				print_r("Totally paid. Print the label and release your item.");
			}
		} else { // The merchant_order don't has any shipments
			print_r("Totally paid. Release your item.");
            
            
             $sql0="UPDATE `PEDIDOS` SET `ESTATUS`='3' WHERE  `IDPEDIDO`='$id_mp'";
                    
                        if ($conn->query($sql0) === TRUE) {

                        } else {
                        echo "Error: " . $sql0 . "<br>" . $conn->error;
                        }
                    
            
		}
	} else {
		print_r("Not paid yet. Do not release your item.");
       
        $sql0="UPDATE `PEDIDOS` SET `ESTATUS`='2' WHERE  `IDPEDIDO`='$id_mp'";
                    
                        if ($conn->query($sql0) === TRUE) {

                        } else {
                        echo "Error: " . $sql0 . "<br>" . $conn->error;
                        }
        
        
	}
 
}

?>


Comando funcional
header("HTTP/1.1 200 OK");