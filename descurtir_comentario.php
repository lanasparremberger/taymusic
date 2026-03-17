<?php 
session_start();
if(isset($_SESSION['user'])){
    if(isset($_GET['id_comentario'])){
        include 'conecta.php';
        $sql="DELETE FROM like_comentarios WHERE id_user=$_SESSION[id_user] AND id_comentario=$_GET[id_comentario]";
         if (mysqli_query($conexao, $sql)) {
            header("Location: listar_comentarios.php?id_musica={$_GET['id_musica']}");
            exit();
        }
    }else{
        $_SESSION['erro']="Faltou enviar o id do comentario";
            header("Location: mscprint.php");
            exit;
    }
}else{
    $_SESSION['erro']="Você precisa estar logado para curtir um comentario";
            header("Location: mscprint.php");
            exit;
}



?>