<?php 
session_start();
if(isset($_SESSION['user'])){
    if(isset($_GET['id_comentario'])){
        include 'conecta.php';
        mysqli_query($conexao,"DELETE FROM like_comentarios WHERE id_comentario=$_GET[id_comentario]");
        $sql="DELETE FROM comentarios WHERE id_comentario=$_GET[id_comentario] AND id_user=$_SESSION[id_user]";
         if (mysqli_query($conexao, $sql)) {
            header("Location: listar_comentarios.php?id_musica={$_GET['id_musica']}");
        }
    }
}

//arruma esta porra

?>