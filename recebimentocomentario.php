<?php 
session_start();
if(isset($_SESSION["user"])){
    if(isset($_POST["enviar"])){
        include 'conecta.php';
        $sql="INSERT INTO comentarios (conteudo_comentario, id_musica, id_user)
        VALUES ('$_POST[conteudo_comentario]', $_POST[id_musica], $_SESSION[id_user]) ";
        if (mysqli_query($conexao, $sql)) {
                header("Location: listar_comentarios.php?id_musica=". $_POST["id_musica"]);
                exit;
        }
    }
}
?>