<?php
session_start();
include 'conecta.php';

if (!isset($_SESSION['user'])) {
    $_SESSION['erro'] = "Você precisa estar logado para editar as músicas.";
    header("Location: logar.php");
    exit;
}

if (isset($_POST['Salvar'])) {
    if( isset( $_SESSION['id_musica'])){
    $sql = "SELECT imagem_musica FROM musicas where id_user = '{$_SESSION['id_user']}'
    AND id_musica=  $_SESSION[id_musica]
    ";
    $imagem = mysqli_fetch_assoc(mysqli_query($conexao, $sql));

    $nome = mysqli_real_escape_string($conexao, trim($_POST['musica_favorita']));
    $num = mysqli_real_escape_string($conexao, trim($_POST['numero_musica']));
    $album = mysqli_real_escape_string($conexao, trim($_POST['album_musica']));
    $genero = mysqli_real_escape_string($conexao, trim($_POST['genero_musica']));
    $descricao= mysqli_real_escape_string($conexao, trim($_POST['descricao_musica']));

    if (strcmp($_FILES['imagem_musica']['name'], "")!=0) {
        $validos = array("jpg", "gif", "png", "jpeg", "webp", "jfif", "jpe", "tiff");
        $ext = strtolower(pathinfo($_FILES['imagem_musica']['name'], PATHINFO_EXTENSION));
        if (!in_array($ext,$validos)){
            $_SESSION['erro']="Tipo de arquivo da foto incopativel";
            header("Location: editar_musica.php?id=$_SESSION[id_musica]");
            exit();
        }
        $arquivo = $_FILES['imagem_musica'];
        $extensao =strtolower(pathinfo($arquivo['name'], PATHINFO_EXTENSION));
        $novo_nome = md5(time()) . '.' . $extensao;
        $diretorio = "upload/foto_musica/" . $novo_nome;
        $sql = "UPDATE musicas SET imagem_musica='$diretorio' 
        WHERE id_user='{$_SESSION['id_user']}' AND id_musica = $_SESSION[id_musica]";
        if (mysqli_query($conexao, $sql)) {
            move_uploaded_file($arquivo['tmp_name'], $diretorio);
            $_SESSION['imagem_musica']=$diretorio;
            unlink($imagem['imagem_musica']);
        }
    }

    $sql = "UPDATE musicas SET nome_musica='$nome',numero_musica=$num, id_album=$album, id_genero=$genero, descricao_musica='$descricao'
        WHERE id_user='{$_SESSION['id_user']}' AND id_musica = $_SESSION[id_musica]";

    if (mysqli_query($conexao, $sql)) {
        $_SESSION['sucesso'] = "Os dados do perfil foram editados com sucesso!";
        header("Location:  perfil.php");
        exit();
    } else {
        $_SESSION['erro'] = "Erro ao editar os dados do perfil!";
        header("Location:  perfil.php");
        exit();
    }
}
}
