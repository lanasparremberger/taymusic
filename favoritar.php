<?php
session_start();
if (isset($_SESSION['user'])) {
    if (isset($_GET["id_musica"])) {
        include 'conecta.php';
        $sql = "INSERT INTO favoritos (id_user, id_musica) VALUES 
        ($_SESSION[id_user], $_GET[id_musica])";
        if (mysqli_query($conexao, $sql) > 0) {
            header("Location: mscprint.php");
        }
    }else {
        $_SESSION['erro'] = "O ID da musica não foi enviado";
        header("Location: mscprint.php");
        exit();
    }
}else {
    $_SESSION['erro'] = "Você precisa estar logado para curtir";
    header("Location: logar.php");
    exit();
}
?>