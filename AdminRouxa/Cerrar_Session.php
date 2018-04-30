<?php
    session_start();
    if (isset($_SESSION)){
        session_destroy();
    }
    
    include('index.php');
?>