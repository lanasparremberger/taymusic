<?php
include_once('conecta.php');
session_start();
$usuario_logado = $_SESSION['id_user'];
$foto_logado = $_SESSION['imagem_user'];
$amigo = $_SESSION['recebeu'];

$sql = "SELECT imagem_user from usuarios where id_user = '{$amigo}'";
$retorno = mysqli_query($conexao, $sql);
$dados = mysqli_fetch_assoc($retorno);
$foto_amigo = $dados['imagem_user'];

$sql = "SELECT * FROM chats 
        WHERE (id_enviou='$usuario_logado' && id_recebeu='$amigo') 
        OR (id_enviou='$amigo' && id_recebeu='$usuario_logado') 
        ORDER BY id_chat LIMIT 100;";
$resultados = mysqli_query($conexao, $sql);


while ($row = mysqli_fetch_assoc($resultados)) {

    if ($usuario_logado == $row['id_enviou']) {

        echo "
        <div class='flex justify-end items-start gap-3 mb-4'>
            <div class='max-w-[70%] bg-pink-500 text-white px-4 py-2 rounded-2xl rounded-br-sm shadow-md'>
                <p class='text-sm'>$row[conteudo_chat]</p>
            </div>
            <img src='$foto_logado' class='w-10 h-10 rounded-full border-2 border-pink-300 shadow'>
        </div>
        ";
    
    } else {

        echo "
        <div class='flex justify-start items-start gap-3 mb-4'>
            <img src='$foto_amigo' class='w-10 h-10 rounded-full border-2 border-purple-300 shadow'>
            <div class='max-w-[70%] bg-purple-200 text-gray-800 px-4 py-2 rounded-2xl rounded-bl-sm shadow'>
                <p class='text-sm'>$row[conteudo_chat]</p>
            </div>
        </div>
        ";
    }

}
