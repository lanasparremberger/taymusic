<?php
session_start();
include 'conecta.php';
if (isset($_POST['Cadastrar'])) {
    $nome_user = $_POST["nome_user"];
    $nascimento_user = $_POST["nascimento_user"];
    $user_user = $_POST["user_user"];
    $email_user = $_POST["email_user"];
    $senha_user = $_POST["senha_user"];  
    $validos = array("jpg", "gif", "png", "jpeg", "webp", "jfif", "jpe", "tiff");
    $ext = strtolower(pathinfo($_FILES['imagem_user']['name'], PATHINFO_EXTENSION));
    if (in_array($ext, $validos)) {
        $imagem_user = $_FILES['imagem_user'];
        $path = $_FILES['imagem_user']['name'];
        $extensao = pathinfo($path, PATHINFO_EXTENSION);
        $novo_nome = md5(time()) . ".$extensao";
        $diretorio = "upload/foto_perfil/" . $novo_nome;
        if (move_uploaded_file($_FILES['imagem_user']['tmp_name'], $diretorio)) {
            $senha_user = password_hash($_POST["senha_user"], PASSWORD_DEFAULT);
            $sql = "SELECT user_user, email_user FROM usuarios WHERE user_user = '$user_user' AND email_user='$email_user'";
            $retorno = mysqli_query($conexao, $sql);
            // Atribui cada registro do banco (linha) como um array associativo a $dado
            if (mysqli_num_rows($retorno) > 0) {
                $_SESSION['erro'] = "Já tem um usuario com este user ou com este email";
                header("Location: formcad.php");
            } else {
                $sql = "INSERT INTO usuarios (nome_user, nascimento_user, user_user, email_user, senha_user, imagem_user)
               VALUES ('$nome_user', '$nascimento_user', '$user_user', '$email_user', '$senha_user', '$diretorio');";

                if (mysqli_query($conexao, $sql)) {
                } else {
                    $_SESSION['erro'] = "Problema ao acessar o banco";
                    header("Location: formcad.php");
                }

                mysqli_close($conexao);
                header("Location: logar.php");
            }
        } else {
            $_SESSION['erro'] = "Problema ao enviar imagem, tente de novo";
            header("Location: formcad.php");
        }
    } else {
        $_SESSION['erro'] = "Imagem não suportada";
        header("Location: formcad.php");
    }
}
