<?php
require('conn.php');
ob_start();
session_start();

if(isset($_POST['btn_register'])){
    $username = htmlspecialchars($_POST['username']);
    $pass = htmlspecialchars($_POST['password']);
    $password = md5($pass);

    $selectTbl = $db->prepare('SELECT * FROM tbl_auth WHERE username = ?');
    $selectTbl->execute($username);
    $select = $selectTbl->fetch(PDO::FETCH_ASSOC);
    if($select){
        header('Location: index.php?text=There is such a user.');
        exit;
    }else{
        $insertTbl = $db->prepare('INSERT INTO tbl_auth SET 
        username = ?,
        password = ?');
        $insert = $insertTbl->execute(array($username, $password));
        if( $insert ){
            $_SESSION['login'] = 'true';
            header('Location: index.php?text=You have successfully registered!');
            exit;
        }else{
            header('Location: index.php?text=Err!');
            exit; 
        }
    }
}

if(isset($_POST['btn_login'])){
    $username = htmlspecialchars($_POST['username']);
    $pass = htmlspecialchars($_POST['password']);
    $password = md5($pass);

    $selectTbl = $db->prepare('SELECT * FROM tbl_auth WHERE username=? AND password=?');
    $selectTbl->execute(array($username, $password));
    $select = $selectTbl->rowCount();

    if($select == 1){
        $_SESSION['login'] = 'true';
        header('Location: index.php?text=Login has been made.');
        exit;
    }else{
        header('Location: index.php?text=Err!');
        exit;
    }
}


?>
