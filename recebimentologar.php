<?php
if (isset($_POST['Entrar'])) {
    session_start();
    include 'conecta.php';
    $sql = "SELECT id_user, user_user, senha_user, imagem_user FROM usuarios WHERE user_user = '$_POST[user_user]'";
    $retorno = mysqli_query($conexao, $sql);
    if (mysqli_num_rows($retorno) > 0) {
        while ($dado = mysqli_fetch_assoc($retorno)) {
            if (password_verify(trim($_POST['senha_user']), trim($dado['senha_user']))) {
                $_SESSION['id_user'] = $dado['id_user'];
                $_SESSION['imagem_user']= $dado['imagem_user'];
                $_SESSION['user'] = $_POST['user_user'];
                header("Location: index.php");
                exit;
            } else {
                $_SESSION['erro'] = "Senha incorreta.";
                header("Location: logar.php");
                exit;
            }
        }
    } else {
        $_SESSION['erro'] = "Usuário não encontrado.";
        header("Location: logar.php");
        exit;
    }
}