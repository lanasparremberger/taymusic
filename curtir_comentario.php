<?php
session_start();
if (isset($_SESSION['user'])) {
    if(isset($_GET["id_comentario"])) {
        include 'conecta.php';
        $sql = "INSERT INTO like_comentarios (id_user, id_comentario) VALUES 
        ($_SESSION[id_user], $_GET[id_comentario])";
        if (mysqli_query($conexao, $sql) > 0) {
            header("Location: listar_comentarios.php?id_musica={$_GET['id_musica']}");
            exit();
        }
    } else{
        $_SESSION['erro'] = "O ID do comentario não foi enviado";
        header("Location: listar_comentarios.php?id_musica={$_GET['id_musica']}");
        exit();
    }
}else {
    var_dump($_SESSION['id_user']);
    $_SESSION['erro'] = "Você precisa estar logado para curtir";
    header("Location: logar.php");
    exit();
}
?>