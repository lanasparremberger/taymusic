<?php
session_start();
include 'conecta.php';
    if(isset($_SESSION['user'])){
        if(isset($_GET['id_user'])){
            $sql="INSERT INTO seguidores (id_seguiu, id_seguindo)
            VALUES ($_SESSION[id_user], $_GET[id_user])";
            if (mysqli_query($conexao, $sql)) {
                header("Location: listar_outro_user.php?id_user=$_GET[id_user]");
                exit;
        }
        }
    }







?>