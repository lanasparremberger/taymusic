<?php
session_start();
include 'conecta.php';

if (!isset($_SESSION['user'])) {
    $_SESSION['erro'] = "Você precisa estar logado para editar o perfil.";
    header("Location: logar.php");
    exit;
}

if (isset($_POST['Salvar'])) {
    $sql = "SELECT imagem_user FROM usuarios where id_user = '{$_SESSION['id_user']}'";
    $imagem = mysqli_fetch_assoc(mysqli_query($conexao, $sql));

    $sql = "SELECT capa_user FROM usuarios where id_user = '{$_SESSION['id_user']}'";
    $capa = mysqli_fetch_assoc(mysqli_query($conexao, $sql));

    $nome = mysqli_real_escape_string($conexao, trim($_POST['nome_user']));
    $bio = mysqli_real_escape_string($conexao, trim($_POST['bio_user']));
    if (isset($_FILES['imagem_user']) && $_FILES['imagem_user']['error'] === 0) {
        $validos = array("jpg", "gif", "png", "jpeg", "webp", "jfif", "jpe", "tiff");
        $ext =
        strtolower(pathinfo($_FILES['imagem_user']['name'], PATHINFO_EXTENSION));
        if (!in_array($ext,$validos)){
            $_SESSION['erro']="Tipo de arquivo da foto incopativel";
            header("Location: editar_perfil.php");
            exit();
        }
        $arquivo = $_FILES['imagem_user'];
        $extensao =strtolower(pathinfo($arquivo['name'], PATHINFO_EXTENSION));
        $novo_nome = md5(time()) . '.' . $extensao;
        $diretorio = "upload/foto_perfil/" . $novo_nome;
        $sql = "UPDATE usuarios SET imagem_user='$diretorio' 
        WHERE id_user='{$_SESSION['id_user']}'";
        if (mysqli_query($conexao, $sql)) {
            move_uploaded_file($arquivo['tmp_name'], $diretorio);
            $_SESSION['imagem_user']=$diretorio;
            unlink($imagem['imagem_user']);
        }
    }
}
if (isset($_FILES['imagem_user']) && $_FILES['imagem_user']['error'] === 0) {
        $validos = array("jpg", "gif", "png", "jpeg", "webp", "jfif", "jpe", "tiff");
        $ext =
        strtolower(pathinfo($_FILES['capa_user']['name'], PATHINFO_EXTENSION));
        if (!in_array($ext,$validos)){
            $_SESSION['erro']="Tipo de arquivo da capa incopativel";
            header("Location: editar_perfil.php");
            exit();
        }
        $arquivo2 = $_FILES['capa_user'];
        $extensao2 = strtolower(pathinfo($arquivo2['name'], PATHINFO_EXTENSION));
        $novo_nome2 = md5(time()) . '.' . $extensao2;
        $diretorio_capa = "upload/capa_perfil/" . $novo_nome2;
        $sql = "UPDATE usuarios SET capa_user='$diretorio_capa' 
        WHERE id_user='{$_SESSION['id_user']}'";
        if (mysqli_query($conexao, $sql)) {
            move_uploaded_file($arquivo2['tmp_name'], $diretorio_capa);
            unlink($capa['capa_user']);
        }
    }
    $sql = "UPDATE usuarios SET nome_user='$nome',bio_user='$bio'
        WHERE id_user='{$_SESSION['id_user']}'";

    if (mysqli_query($conexao, $sql)) {
        $_SESSION['sucesso'] = "Os dados do perfil foram editados com sucesso!";
        header("Location:  perfil.php");
        exit();
    } else {
        $_SESSION['erro'] = "Erro ao editar os dados do perfil!";
        header("Location:  perfil.php");
        exit();
    }
