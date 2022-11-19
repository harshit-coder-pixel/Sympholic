<?php
    session_start();
    if($_SESSION["user_status"]!="logged_in"){
        function redirect($url){
            ob_start();
            header('Location: '.$url);
            ob_end_flush();
            die();
        }
        redirect("./Dashboard/login.php");
    }
?>


