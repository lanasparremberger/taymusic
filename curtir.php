<?php
session_start();
if (isset($_SESSION['user'])) {
    $dados = json_decode(file_get_contents('php://input'), true);
    if (isset($dados['id_musica'])) {
        include 'conecta.php';
        $sql = "INSERT INTO like_musicas (id_user, id_musica) VALUES 
        ($_SESSION[id_user], $dados[id_musica])";
        if (mysqli_query($conexao, $sql) > 0) {
        }
    }else {
        echo "O ID da musica não foi enviado";
        exit;
    }
}else {
    echo "Você precisa estar logado para curtir";
    exit;
}
?>