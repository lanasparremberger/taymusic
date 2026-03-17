<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat</title>
    <?php include 'layouts/header.php' ?>
<?php
if (!isset($_SESSION['user'])) {
    $_SESSION['erro'] = "É necessário realizar login para poder fazer a operação";
    header("Location:  logar.php");
    exit();
}

if (!isset($_GET['id'])) {
    $_SESSION['erro'] = "É necessário escolher o usuário que quer conversar";
    header("Location:  index.php");
    exit();
}
$_SESSION['recebeu'] = $_GET['id'];
?>
</head>

<body class="bg-gradient-to-br from-pink-50 via-blue-50 to-purple-50 min-h-screen text-gray-800">

    <main class="max-w-3xl mx-auto mt-10 p-4">

        <div class="bg-white/80 backdrop-blur-md rounded-2xl shadow-lg border border-pink-200 overflow-hidden">

            <!-- Cabeçalho -->
            <div class="bg-gradient-to-r from-pink-200 via-purple-200 to-blue-200 p-4 border-b border-pink-200">
                <h1 class="text-xl font-bold text-pink-700 text-center"> Chat </h1>
            </div>

            <!-- Área das mensagens -->
            <div id="chat-conteudo"
                class="overflow-y-scroll h-[400px] p-4 space-y-4 scroll-smooth"
                style="scroll-behavior: smooth !important;">
            </div>

            <!-- Form de envio -->
            <form action="javascript:enviar_mensagem()" class="border-t border-pink-200 bg-white/60 p-4 flex items-center gap-3">

                <img src="<?= $_SESSION['imagem_user'] ?>" class="w-10 h-10 rounded-full border-2 border-pink-300 shadow">

                <input 
                    type="text" 
                    id="mensagem"
                    placeholder="Escreva uma mensagem..."
                    class="flex-1 px-4 py-2 rounded-full bg-white border border-pink-300 focus:ring-2 focus:ring-pink-400 outline-none shadow-sm"
                >

                <button type="submit"
                    class="w-10 h-10 flex items-center justify-center rounded-full
                           bg-pink-500 text-white shadow-md shadow-pink-500/40
                           hover:bg-pink-600 hover:shadow-pink-700/40 transition">
                    <i class="fa fa-paper-plane text-lg"></i>
                </button>

            </form>

        </div>

        <div id="resposta"></div>

    </main>

    <script src="ajaxmensagem.js"></script>

    <script>
        buscaMensagem();
        setInterval("buscaMensagem()", 1000);
    </script>

</body>
</html>
