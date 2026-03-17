<?php
session_start();
require 'vendor/autoload.php'; // PHPMailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use Ramsey\Uuid\Uuid;

include 'conecta.php';

if (isset($_POST['recuperar'])) {

    $email = $_POST['email'];


    $sql = "SELECT id_user from usuarios where email_user = '{$email}'";

    $retorno = mysqli_query($conexao, $sql);
    $dados = mysqli_fetch_assoc($retorno);


    if (mysqli_num_rows($retorno) == 1) {
        //$token = bin2hex(random_bytes(50));
        $token  =  Uuid::uuid4();
        $expira = date("Y-m-d H:i:s", strtotime("+1 hour"));

        $sql = "UPDATE usuarios SET token = '$token', token_expiracao = '$expira' WHERE email_user = '$email'";

        if (mysqli_query($conexao, $sql)) {
            $link = "http://localhost/trab6lanasparremberger/trab6/token_senha.php";
            try {
                $mail = new PHPMailer(true);
                $mail->isSMTP();
                $mail->CharSet = 'UTF-8';
                $mail->Host       = 'smtp.gmail.com';
                $mail->SMTPAuth   = true;
                $mail->Username   = 'lanasparremberger@gmail.com';
                $mail->Password   = 'lblissptnfbtuxmq';
                $mail->SMTPSecure = 'tls';
                $mail->Port       = 587;

                $mail->setFrom('seuemail@gmail.com', 'Site da Taylor');
                $mail->addAddress($email);

                $mail->isHTML(true);
                $mail->Subject = 'Recuperação de Senha';
                $mail->Body    = "Foi solicitada a recuperação de senha para o seu e-mail\n\nClique no link e informe o token para redefinir sua senha:<br><a href='$link'>Link</a> \n\n TOKEN: $token";

                $mail->send();
                $_SESSION['sucesso'] = "Um token de recuperação foi enviado para seu e-mail.";
                header("Location:  token_senha.php");
                exit();
            } catch (Exception $e) {
                $_SESSION['erro'] = "Erro ao enviar e-mail: {$mail->ErrorInfo}";
                header("Location:  recuperar_senha.php");
                exit();
            }
        } else {
            $_SESSION['erro'] = "Erro ao enviar e-mail:" . mysqli_error($conexao);
            header("Location:  logar.php");
            exit();
        }
    } else {
        $_SESSION['erro'] = "E-mail não encontrado!";
        header("Location:  recuperar_senha.php");
        exit();
    }
}
?>