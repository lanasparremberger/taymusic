<?php 
session_start();
if(isset($_SESSION['user'])){
    if(isset($_GET['id_musica'])){
        include 'conecta.php';
        $sql="DELETE FROM like_musicas WHERE id_user=$_SESSION[id_user] AND id_musica=$_GET[id_musica]";
         if (mysqli_query($conexao, $sql)) {
            header("Location: mscprint.php");
        }
    }else{$_SESSION['erro']="Faltou enviar o id da musica";
            header("Location: mscprint.php");
            exit;
    }
}else{
    $_SESSION['erro']="Você precisa estar logado pra descuritir";
            header("Location: mscprint.php");
            exit;
}



?>