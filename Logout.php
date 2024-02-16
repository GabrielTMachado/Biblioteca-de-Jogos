<?php
  if(!isset($_SESSION)){
    session_start();
    }
    if(isset($_SESSION['logado'])){
        unset($_SESSION['logado']);
        $_SESSION['log'] = 'deslogado';
        $_SESSION['message'] = "Logout Realizado";
        header('Location: index.php');
        exit();
    }else{
        $_SESSION['message'] = "Você não está Logado";
        header('Location: index.php');
        exit();
    }


?>