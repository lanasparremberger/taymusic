<?php
include 'conecta.php';
session_start();
if (isset($_GET['id'])) {
    $sql = "SELECT imagem_musica FROM musicas where id_musica = $_GET[id]";
    $imagem = mysqli_fetch_assoc(mysqli_query($conexao, $sql));
    mysqli_query($conexao, 
"DELETE FROM like_comentarios 
  WHERE id_comentario IN (
    SELECT id_comentario FROM comentarios WHERE id_musica = '{$_GET['id']}')");
    mysqli_query($conexao, "DELETE FROM like_musicas WHERE id_musica = '$_GET[id]'");
    mysqli_query($conexao, "DELETE FROM comentarios WHERE id_musica = '$_GET[id]'");
    mysqli_query($conexao, "DELETE FROM favoritos WHERE id_musica = '$_GET[id]'");
    $sql = "DELETE FROM musicas WHERE id_musica='$_GET[id]'";
    if (mysqli_query($conexao, $sql)) {
        echo "Música apagada com sucesso";
        unlink($imagem['imagem_musica']);

    } else {
        echo "Erro ao apagar os dados do produto!";

    }
} else {
    echo "Erro! não foi passado o id do produto a ser apagado";
}
