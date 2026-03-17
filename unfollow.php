<?php
session_start();
include 'conecta.php';
    if(isset($_SESSION['user'])){
        if(isset($_GET['id_user'])){
            $sql="DELETE FROM seguidores WHERE id_seguiu=$_SESSION[id_user] AND id_seguindo=$_GET[id_user]";
            if (mysqli_query($conexao, $sql)) {
                header("Location: listar_outro_user.php?id_user=$_GET[id_user]");
                exit;
        }
        }else{
            $_SESSION['erro']="Faltou enviar o id do user";
            header("Location: mscprint.php");
            exit;
        }
    }else{
        $_SESSION['erro']="Você precisa estar logado";
            header("Location: logar.php");
            exit;
    }
?>