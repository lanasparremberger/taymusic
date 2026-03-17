<?php
include 'conecta.php';
if (!isset($_GET['id_musica'])) {
  header("Location: mscprint.php");
  exit();
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Comentários</title>
  <?php include 'layouts/header.php' ?>
  <style>
    .tinymce-content {
      all: revert;
      line-height: 1.6;
      margin-top: 1rem;
    }

    .tinymce-content p {
      margin-bottom: 1rem;
    }
  </style>
</head>

<body class="bg-gradient-to-br from-pink-50 via-blue-50 to-purple-50 min-h-screen text-gray-800 font-sans">

  <main class="max-w-5xl mx-auto mt-10 p-6 space-y-10">
    <!-- Título -->
    <h1 class="text-4xl font-extrabold bg-clip-text text-transparent bg-gradient-to-r from-pink-500 via-purple-500 to-blue-500 mb-10 text-center drop-shadow-sm">
      Comentários da Música
    </h1>

    <?php
    // Buscar informações da música
    $sql = "SELECT 
              usuarios.id_user,
              usuarios.imagem_user,
              usuarios.user_user,
              musicas.id_musica,
              musicas.nome_musica, 
              musicas.numero_musica,
              musicas.imagem_musica,
              musicas.criado_em,
              musicas.descricao_musica,
              albuns.nome_album,
              generos.nome_genero
            FROM 
              musicas
            INNER JOIN usuarios ON musicas.id_user = usuarios.id_user
            INNER JOIN albuns ON musicas.id_album = albuns.id_album
            INNER JOIN generos ON musicas.id_genero = generos.id_genero
            WHERE musicas.id_musica = {$_GET['id_musica']}";
    $retorno = mysqli_query($conexao, $sql);
    include_once 'tempo_relativo.php';

    if (mysqli_num_rows($retorno) > 0) {
      while ($musica = mysqli_fetch_assoc($retorno)) {
        echo "
        <div class='p-6 bg-white/80 backdrop-blur-md rounded-2xl border border-pink-200 shadow-md hover:shadow-lg transition-transform duration-300 hover:scale-[1.01]'>
          <div class='flex items-center gap-4 mb-6'>
            <a href='listar_outro_user.php?id_user={$musica['id_user']}' class='flex items-center gap-3 group'>
              <img src='{$musica['imagem_user']}' alt='Foto do usuário'
                   class='w-12 h-12 rounded-full object-cover border-2 border-pink-300 group-hover:brightness-105 transition'>
              <div>
                <p class='text-gray-800 font-semibold group-hover:text-pink-500 transition'>@{$musica['user_user']}</p>
                <p class='text-xs text-gray-500'>Adicionado " . tempo_relativo($musica['criado_em']) . "</p>
              </div>
            </a>
          </div>

          <div class='flex flex-col sm:flex-row gap-6'>
            <img src='{$musica['imagem_musica']}' alt='Capa da música'
                 class='w-40 h-40 rounded-xl object-cover border-4 border-pink-300 shadow-md'>
            <div class='flex-1 space-y-3'>
              <p class='text-2xl font-bold text-pink-500'>{$musica['nome_musica']}</p>
              <p class='text-sm text-gray-700'>
                Álbum: <span class='text-pink-500 font-medium'>{$musica['nome_album']}</span> | 
                Gênero: <span class='text-pink-500 font-medium'>{$musica['nome_genero']}</span>
              </p>
              <p class='text-xs text-gray-500'>Faixa <span class='text-pink-600 font-semibold'>#{$musica['numero_musica']}</span></p>
              <div class='tinymce-content text-gray-700 leading-relaxed'>
                {$musica['descricao_musica']}
              </div>
            </div>
          </div>
        </div>";
      }
    }
    ?>

    <?php
    // Buscar comentários
    $sql = "SELECT comentarios.conteudo_comentario, 
                   comentarios.id_comentario,
                   comentarios.timestamp_comentario, 
                   comentarios.id_musica, 
                   usuarios.id_user, 
                   usuarios.user_user, 
                   usuarios.imagem_user, 
                   COUNT(like_comentarios.id_comentario) AS curtida
            FROM comentarios
            INNER JOIN usuarios ON comentarios.id_user = usuarios.id_user
            LEFT JOIN like_comentarios ON comentarios.id_comentario = like_comentarios.id_comentario
            WHERE comentarios.id_musica = {$_GET['id_musica']}
            GROUP BY comentarios.id_comentario
            ORDER BY comentarios.timestamp_comentario DESC";
    $retorno = mysqli_query($conexao, $sql);

    echo "<div class='space-y-5'>";
    if (mysqli_num_rows($retorno) > 0) {
      while ($dado = mysqli_fetch_assoc($retorno)) {
        echo "
        <div class='p-4 bg-white/80 backdrop-blur-md rounded-xl border border-pink-200 shadow-sm hover:shadow-md transition duration-300'>
          <div class='flex items-start gap-4'>
            <a href='listar_outro_user.php?id_user={$dado['id_user']}'>
              <img src='{$dado['imagem_user']}' alt='Foto de {$dado['user_user']}' 
                   class='w-10 h-10 rounded-full object-cover border-2 border-pink-300 hover:brightness-105 transition'>
            </a>

            <div class='flex-1'>
              <p class='text-gray-700 whitespace-pre-line'>" . $dado["conteudo_comentario"] . "</p>
              <div class='mt-1 text-xs text-gray-500'>
                Por <a href='listar_outro_user.php?id_user={$dado['id_user']}' 
                       class='font-semibold text-pink-500 hover:underline'>@" . $dado["user_user"] . "</a> 
                " . tempo_relativo($dado["timestamp_comentario"]) . "
              </div>
            </div>
          </div>

          <div class='mt-3 ml-14 flex items-center gap-3'>";
          
if (isset($_SESSION['id_user'])) {
    $sql2 = "SELECT COUNT(*) AS curtiu 
             FROM like_comentarios 
             WHERE id_user = {$_SESSION['id_user']} 
             AND id_comentario = {$dado['id_comentario']}";
    $retorno2 = mysqli_query($conexao, $sql2);
    $curtida = mysqli_fetch_assoc($retorno2);

    if ($curtida['curtiu'] > 0) {
        echo "
        <a href='descurtir_comentario.php?id_comentario={$dado['id_comentario']}&id_musica={$_GET['id_musica']}'
           class='flex items-center gap-1 text-pink-500 hover:text-pink-600 transition'>
            <i class='fa-solid fa-heart'></i>
            <span class='text-sm'>{$dado['curtida']}</span>
        </a>";
    } else {
        echo "
        <a href='curtir_comentario.php?id_comentario={$dado['id_comentario']}&id_musica={$_GET['id_musica']}'
           class='flex items-center gap-1 text-gray-500 hover:text-pink-500 transition'>
            <i class='fa-regular fa-heart'></i>
            <span class='text-sm'>{$dado['curtida']}</span>
        </a>";
    }

    if (strcmp($_SESSION['id_user'], $dado['id_user']) == 0) {
        echo "
        <a href='apaga_comentario.php?id_comentario={$dado['id_comentario']}&id_musica={$dado['id_musica']}'
           class='ml-2 inline-flex items-center justify-center w-8 h-8 rounded-full bg-pink-100 hover:bg-pink-200 text-pink-600 transition'>
            <i class='fa-solid fa-trash'></i>
        </a>";
    }
} else {
    echo "<span class='text-sm text-gray-400'>Faça login para curtir</span>";
}

echo "</div></div>";
      }
    } else {
      echo "<p class='text-center text-gray-500 italic'>Ainda não há comentários para esta música 🎧</p>";
    }
    echo "</div>";
    ?>

    <?php if (isset($_SESSION['user'])) { ?>
      <form action="recebimentocomentario.php" method="POST" 
        class="p-6 bg-white/80 backdrop-blur-md rounded-2xl border border-pink-300/40 shadow-md space-y-4">
        <input type="hidden" name="id_musica" value="<?php echo $_GET['id_musica']; ?>">

        <label for="conteudo_comentario" class="block text-pink-500 font-semibold">Deixe seu comentário:</label>
        <textarea name="conteudo_comentario" id="conteudo_comentario" rows="3" required
          class="w-full p-3 bg-white border border-pink-300 rounded-lg text-gray-800 focus:outline-none focus:ring-2 focus:ring-pink-400 resize-none"></textarea>

        <button type="submit" name="enviar"
          class="px-6 py-2 bg-gradient-to-r from-pink-500 to-purple-500 text-white rounded-lg shadow hover:opacity-90 transition">
          <i class='fa-solid fa-paper-plane mr-2'></i>Enviar Comentário
        </button>
      </form>
    <?php } else { ?>
      <p class="text-center text-gray-600">Você precisa 
        <a href="logar.php" class="text-pink-500 font-semibold hover:underline">fazer login</a> 
        para comentar 💬
      </p>
    <?php } ?>
  </main>
</body>
</html>
