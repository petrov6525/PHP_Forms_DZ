<?php


if(isset($_GET)){
    if(isset($_GET["checkbox"])){
        echo "Thank you for subscribing!";
    }
    else{
        header("Location: index.php");
        exit;
    }
}