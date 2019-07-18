<?php

require_once('../config.php');
require_once(DBAPI);
/**
 * VALIDAR USUARIO DO SISTEMA
 */

    session_start();
    $database = open_database();

    $login = $_POST['login'];
    $senha = $_POST['senha'];
    $sql = "SELECT * FROM logins WHERE login = '" . $login . "' AND senha = '". $senha . "'";
    $result = $database->query($sql);
    echo $sql;

    if($result->num_rows> 0){
        $_SESSION['login'] = $login;
        $_SESSION['senha'] = $senha;
        if($login=="admin"){
            header('location:../dashboard.php');
        }
        else{
            header('location:../validation/index.php');
        }
    }
    else{
        unset($_SESSION['login']);
        unset($_SESSION['senha']);
        header('location:../index.php');
    }
?>