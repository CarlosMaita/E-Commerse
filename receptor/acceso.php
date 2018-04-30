<?php
require_once ('../Common/mercadopago.php');

$mp = new MP('677284083290958', 'qKu7qUKA72vSpmnQfScH7WNCovUvRznx');

$access_token = $mp->get_access_token();

print_r ($access_token);


/*
http://www.rouxa.com.ve/receptor/?type=payment&data.id=3677563854
*/
?>


