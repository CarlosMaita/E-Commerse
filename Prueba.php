<?php

/*
Credenciales

CLIENT_ID: 3476299045574111
CLIENT_SECRET: XN3fvJMUfwxlLKP6QnqUfY9HFu8a60ej

*/

/* Usuario 1


CLIENT_ID: 677284083290958
CLIENT_SECRET: qKu7qUKA72vSpmnQfScH7WNCovUvRznx

{"id":316056023,
"nickname":"TETE2853927",
"password":"qatest2507",
"site_status":"active",
"email":"test_user_13962152@testuser.com"}

*/

/* Usuario 2

{"id":316056125,
"nickname":"TETE4645177",
"password":"qatest7959",
"site_status":"active",
"email":"test_user_23718464@testuser.com"}

*/

// Generated by curl-to-PHP: http://incarnate.github.io/curl-to-php/
// Generated by curl-to-PHP: http://incarnate.github.io/curl-to-php/
$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, "https://api.mercadopago.com/users/test_user?access_token=APP_USR-3476299045574111-042021-d6054b5d0ac0106cab3cfa7591132043-127713092");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, "{\"site_id\":\"MLV\"}");
curl_setopt($ch, CURLOPT_POST, 1);

$headers = array();
$headers[] = "Content-Type: application/json";
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

$result = curl_exec($ch);
if (curl_errno($ch)) {
    echo 'Error:' . curl_error($ch);
}
curl_close ($ch);

?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" href="css/Stile.css">
       <link rel="stylesheet" href="css/fontello.css">
     </head>  
    <body>
       
        <div class="container">
            <?php
                echo $result;
            ?>
                        
        </div>
          
    </body>
<html>


https://api.mercadopago.com/v1/payments/3650013979?access_token=APP_USR-3476299045574111-042021-d6054b5d0ac0106cab3cfa7591132043-127713092 