<?php
include 'conecta.php';
session_start();
if (isset($_POST['recuperar'])) {
  $token = $_POST['token'];
  $email = $_POST['email'];
  $senha = $_POST['senha'];

  $sql = "SELECT id_user, token, token_expiracao FROM usuarios WHERE email_user = '$email'";
  $retorno = mysqli_query($conexao, $sql);
  $dados = mysqli_fetch_assoc($retorno);
  if (mysqli_num_rows($retorno) == 1) {
    if (strtotime($dados['token_expiracao']) > time() && strcmp($token, $dados['token']) == 0) {
      $novaSenha = password_hash($_POST['senha'], PASSWORD_DEFAULT);
      $sql = "UPDATE usuarios SET senha_user = '$novaSenha', token = NULL, token_expiracao = NULL WHERE id_user = $dados[id_user]";

      $retorno = mysqli_query($conexao, $sql);

      $_SESSION['sucesso'] = "Senha redefinida com sucesso! Agora você já pode fazer login.";
      header("Location:  logar.php");
      exit();
    } else {
      $_SESSION['erro'] = "Token inválido ou expirado";
      header("Location:  token_senha.php");
      exit();
    }
  } else {
    $_SESSION['erro'] = "E-mail não encontrado.";
    header("Location:  token_senha.php");
    exit();
  }
} else {
  header("Location:  token_senha.php");
  exit();
}
