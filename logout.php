<?php


    require_once 'functions.php';
    destroySession();
    if(!$_SESSION['point']) header ("Location: authoriz.php");
    


?>