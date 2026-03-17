<?php
include 'conecta.php';
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Perfil do Usuário</title>
  <?php include 'layouts/header.php' ?>
  <style>
    .tinymce-content {
      all: revert;
      line-height: 1.6;
      margin-top: 0.5rem;
      color: #444;
    }

    .tinymce-content p {
      margin-bottom: 0.75rem;
    }

    .icon-btn {
      display: inline-flex;
      align-items: center;
      justify-content: center;
      width: 32px;
      height: 32px;
      border-radius: 8px;
      transition: 0.2s;
    }

    .icon-btn:hover {
      transform: scale(1.1);
    }
  </style>
</head>

<body class="bg-gradient-to-br from-pink-50 via-blue-50 to-purple-50 min-h-screen text-gray-800">
  <main class="max-w-4xl mx-auto mt-10 p-6 space-y-8">

    <?php
    if (isset($_GET['id_user'])) {
      $id_user = $_GET['id_user'];

      if (isset($_SESSION['id_user']) && $id_user == $_SESSION['id_user']) {
        header("Location: perfil.php");
        exit();
      }

      $sql = "SELECT nome_user, user_user, imagem_user, capa_user, bio_user, timestamp_user 
              FROM usuarios 
              WHERE id_user = '$id_user'";
      $retorno = mysqli_query($conexao, $sql);

      if (isset($_SESSION['id_user'])) {
        $sql2 = "SELECT * FROM seguidores WHERE id_seguiu='{$_SESSION['id_user']}' AND id_seguindo='$id_user'";
        $retorno2 = mysqli_query($conexao, $sql2);
      }

      if (mysqli_num_rows($retorno) > 0):
        $dado = mysqli_fetch_assoc($retorno);
    ?>

        <!-- Perfil do outro usuário -->
        <div class="relative bg-white/80 backdrop-blur-md rounded-2xl shadow-lg border border-pink-200 overflow-hidden">
          <?php if (!empty($dado['capa_user'])): ?>
            <img src="<?= $dado['capa_user']; ?>" alt="Capa do usuário" class="w-full h-48 object-cover">
          <?php else: ?>
            <div class="w-full h-48 bg-gradient-to-r from-pink-200 via-purple-200 to-blue-200"></div>
          <?php endif; ?>

          <div class="flex flex-col items-center p-6">
            <img src="<?= $dado['imagem_user']; ?>" alt="Foto de perfil"
              class="w-28 h-28 rounded-full border-4 border-pink-300 shadow-md -mt-16 bg-white object-cover">

            <h1 class="text-2xl font-bold text-pink-600 mt-4"><?= $dado['nome_user']; ?></h1>
            <p class="text-purple-500">@<?= $dado['user_user']; ?></p>

            <?php if (!empty($dado['bio_user'])): ?>
              <p class="text-gray-600 text-center mt-4 px-6 italic"><?= $dado['bio_user']; ?></p>
            <?php endif; ?>

            <?php if (isset($_SESSION['id_user'])) { ?>
              <?php if (mysqli_num_rows($retorno2) > 0): ?>
                <a href="unfollow.php?id_user=<?= $id_user; ?>"
                  class="inline-flex items-center mt-4 gap-2 px-5 py-2 rounded-full text-sm font-semibold 
                       bg-pink-600 text-white hover:bg-pink-700 shadow-md shadow-pink-700/40 hover:shadow-pink-800/50 transition-all duration-200">
                  <i class="fa-solid fa-user-minus"></i> Deixar de seguir
                </a>
                <a href="chat.php?id=<?= $id_user; ?>"
                  class="inline-flex items-center justify-center mt-4 ml-2 w-10 h-10 rounded-full 
         bg-purple-500 text-white shadow-md shadow-purple-500/40 
         hover:bg-purple-600 hover:shadow-purple-700/50 transition-all duration-200">
                  <i class="fa-solid fa-message text-lg"></i>
                </a>
              <?php else: ?>
                <a href="seguir.php?id_user=<?= $id_user; ?>"
                  class="inline-flex items-center mt-4 gap-2 px-5 py-2 rounded-full text-sm font-semibold 
                       bg-pink-500 text-white hover:bg-pink-600 shadow-md shadow-pink-600/40 hover:shadow-pink-700/50 transition-all duration-200">
                  <i class="fa-solid fa-user-plus"></i> Seguir
                </a>
              <?php endif; ?>
            <?php } ?>
            <p class="text-sm text-gray-400 mt-4">Membro desde: <?= date('d/m/Y', strtotime($dado['timestamp_user'])); ?></p>
          </div>
        </div>

        <!-- Músicas adicionadas -->
        <div class="bg-white/80 backdrop-blur-md rounded-2xl shadow-lg border border-pink-200 p-6">
          <h2 class="text-2xl font-bold text-pink-600 mb-4 text-center">Músicas adicionadas</h2>
          <?php
          include_once 'tempo_relativo.php';
          $sql_musicas = "SELECT 
              musicas.id_musica, musicas.nome_musica, musicas.numero_musica,
              musicas.imagem_musica, musicas.descricao_musica, musicas.criado_em,
              albuns.nome_album, generos.nome_genero
            FROM musicas
            INNER JOIN albuns ON musicas.id_album = albuns.id_album
            INNER JOIN generos ON musicas.id_genero = generos.id_genero
            WHERE musicas.id_user = '$id_user'";
          $resultado_musicas = mysqli_query($conexao, $sql_musicas);

          if (mysqli_num_rows($resultado_musicas) > 0):
            echo "<ul class='space-y-6'>";
            while ($musica = mysqli_fetch_assoc($resultado_musicas)):
          ?>
              <li class='p-4 bg-white border border-pink-200 rounded-xl shadow hover:shadow-md hover:scale-[1.01] transition duration-300'>
                <div class='flex justify-between items-start gap-4'>
                  <img src='<?= $musica['imagem_musica']; ?>' alt='Capa da música'
                    class='w-20 h-20 rounded-lg object-cover border border-pink-300 shadow-sm'>
                  <div class='flex-1'>
                    <p class='text-lg font-bold text-pink-600'><?= $musica['nome_musica']; ?></p>
                    <p class='text-sm text-gray-600'>
                      Álbum: <span class='text-pink-500 font-medium'><?= $musica['nome_album']; ?></span> |
                      Gênero: <span class='text-pink-500 font-medium'><?= $musica['nome_genero']; ?></span>
                    </p>
                    <p class='text-xs text-gray-400 mt-1'>Adicionada <?= tempo_relativo($musica['criado_em']); ?></p>
                    <div class='tinymce-content mt-2'><?= $musica['descricao_musica']; ?></div>
                  </div>
                  <span class='text-xs font-bold text-pink-500 bg-pink-50 border border-pink-200 px-2 py-1 rounded-lg self-start whitespace-nowrap'>
                    #<?= $musica['numero_musica']; ?>
                  </span>
                </div>
              </li>
            <?php endwhile;
            echo "</ul>";
          else: ?>
            <p class='text-center text-gray-500 italic'>Nenhuma música adicionada ainda.</p>
          <?php endif; ?>
        </div>

        <!-- Músicas favoritas -->
        <div class="bg-white/80 backdrop-blur-md rounded-2xl shadow-lg border border-pink-200 p-6">
          <h2 class="text-2xl font-bold text-pink-600 mb-4 text-center">Músicas favoritas</h2>
          <?php
          $sql_favoritos = "SELECT 
              musicas.id_musica, musicas.nome_musica, musicas.numero_musica,
              musicas.imagem_musica, musicas.descricao_musica, musicas.criado_em,
              albuns.nome_album, generos.nome_genero, usuarios.user_user, usuarios.id_user
            FROM favoritos
            INNER JOIN musicas ON favoritos.id_musica = musicas.id_musica
            INNER JOIN albuns ON musicas.id_album = albuns.id_album
            INNER JOIN generos ON musicas.id_genero = generos.id_genero
            INNER JOIN usuarios ON musicas.id_user = usuarios.id_user
            WHERE favoritos.id_user = '$id_user'";
          $resultado_favoritos = mysqli_query($conexao, $sql_favoritos);

          if (mysqli_num_rows($resultado_favoritos) > 0):
            echo "<ul class='space-y-6'>";
            while ($fav = mysqli_fetch_assoc($resultado_favoritos)):
          ?>
              <li class='p-4 bg-white border border-pink-200 rounded-xl shadow hover:shadow-md hover:scale-[1.01] transition duration-300'>
                <div class='flex justify-between items-start gap-4'>
                  <img src='<?= $fav['imagem_musica']; ?>' alt='Capa da música'
                    class='w-20 h-20 rounded-lg object-cover border border-pink-300 shadow-sm'>
                  <div class='flex-1'>
                    <p class='text-lg font-bold text-pink-600'><?= $fav['nome_musica']; ?></p>
                    <p class='text-sm text-gray-600'>
                      Autor: <a href='listar_outro_user.php?id_user=<?= $fav['id_user']; ?>' class='text-pink-500 font-medium'><?= $fav['user_user']; ?></a> |
                      Álbum: <span class='text-pink-500 font-medium'><?= $fav['nome_album']; ?></span> |
                      Gênero: <span class='text-pink-500 font-medium'><?= $fav['nome_genero']; ?></span>
                    </p>
                    <p class='text-xs text-gray-400 mt-1'>Adicionada <?= tempo_relativo($fav['criado_em']); ?></p>
                    <div class='tinymce-content mt-2'><?= $fav['descricao_musica']; ?></div>
                  </div>
                  <span class='text-xs font-bold text-pink-500 bg-pink-50 border border-pink-200 px-2 py-1 rounded-lg self-start whitespace-nowrap'>
                    #<?= $fav['numero_musica']; ?>
                  </span>
                </div>
              </li>
            <?php endwhile;
            echo "</ul>";
          else: ?>
            <p class='text-center text-gray-500 italic'>Nenhuma música favorita ainda.</p>
          <?php endif; ?>
        </div>

      <?php else: ?>
        <p class="text-center text-gray-700 text-lg font-semibold">Usuário não encontrado.</p>
    <?php endif;
    } ?>

  </main>
</body>

</html>