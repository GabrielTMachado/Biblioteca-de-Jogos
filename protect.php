<?php
    if(!isset($_SESSION)){
        session_start();
        }

    if(!isset($_SESSION['logado'])){
        header('Location: index.php');
        $_SESSION['message']= "Você não esta logado";
        exit(0);    
    }
?>