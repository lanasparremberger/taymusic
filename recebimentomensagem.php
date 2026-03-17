<?php
    include_once ('conecta.php');
    session_start();
    $usuario_logado = $_SESSION['id_user'];
    $amigo= $_SESSION['recebeu'];

    $dados = json_decode(file_get_contents("php://input")); // Assim você lê e faz o decode

    $sql = "INSERT INTO chats(id_enviou, id_recebeu, conteudo_chat) VALUES($usuario_logado, $amigo,'$dados->mensagem')";

    if (mysqli_query($conexao, $sql)) {
        echo "Mensagem enviada com sucesso!";
    } else {
        echo "Erro: " . $sql . "<br>" . mysqli_error($conexao);
    }
?>