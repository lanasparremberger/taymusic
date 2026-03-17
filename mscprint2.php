<?php
include 'conecta.php';
session_start();

$sql = "SELECT 
          usuarios.id_user,
          usuarios.user_user,
          usuarios.imagem_user,
          musicas.id_musica, 
          musicas.nome_musica, 
          musicas.numero_musica,
          musicas.imagem_musica,
          musicas.criado_em,
          musicas.descricao_musica,
          albuns.nome_album,
          generos.nome_genero,
          COUNT(like_musicas.id_musica) AS curtidas
        FROM musicas
        INNER JOIN usuarios ON musicas.id_user = usuarios.id_user
        INNER JOIN albuns ON musicas.id_album = albuns.id_album
        INNER JOIN generos ON musicas.id_genero = generos.id_genero
        LEFT JOIN like_musicas ON musicas.id_musica = like_musicas.id_musica
        GROUP BY musicas.id_musica
        ORDER BY musicas.criado_em DESC";

$retorno = mysqli_query($conexao, $sql);
include_once 'tempo_relativo.php';

if (mysqli_num_rows($retorno) > 0) {
  while ($dado = mysqli_fetch_assoc($retorno)) {
?>
    <div class="p-6 bg-white/80 backdrop-blur-md rounded-2xl border border-pink-300/40 shadow-md hover:shadow-lg hover:scale-[1.01] transition duration-300">
      <div class="flex items-center gap-3 mb-4">
        <a href="listar_outro_user.php?id_user=<?= $dado['id_user'] ?>">
          <img src="<?= $dado['imagem_user'] ?>" alt="Foto do usuário"
            class="w-12 h-12 rounded-full object-cover border-2 border-pink-300">
        </a>
        <div>
          <a href="listar_outro_user.php?id_user=<?= $dado['id_user'] ?>" class="text-gray-800 font-semibold hover:text-pink-500 transition">@<?= $dado['user_user'] ?></a>
          <p class="text-xs text-gray-500">Adicionado <?= tempo_relativo($dado['criado_em']) ?></p>
        </div>
      </div>

      <div class="flex gap-6 flex-col md:flex-row">
        <img src="<?= $dado['imagem_musica'] ?>" alt="Capa da música"
          class="w-36 h-36 rounded-xl object-cover border-4 border-pink-300 shadow-md">

        <div class="flex-1 space-y-2">
          <p class="text-2xl font-bold text-pink-500"><?= $dado['nome_musica'] ?></p>
          <p class="text-sm text-gray-700">
            Álbum:
            <span class="text-pink-500 font-medium"><?= $dado['nome_album'] ?></span> |
            Gênero:
            <span class="text-pink-500 font-medium"><?= $dado['nome_genero'] ?></span>
          </p>
          <p class="text-xs text-gray-500">
            Número da faixa:
            <span class="text-pink-600 font-semibold">#<?= $dado['numero_musica'] ?></span>
          </p>

          <?php if (!empty($dado['descricao_musica'])): ?>
            <div class="tinymce-content"><?= $dado['descricao_musica'] ?></div>
          <?php endif; ?>

          <div id="like-<?= $dado['id_musica'] ?>" class="flex items-center gap-6 mt-3">
            <?php
            // CURTIDA
            if (isset($_SESSION['id_user'])) {
              $sql2 = "SELECT COUNT(*) AS curtiu 
                       FROM like_musicas 
                       WHERE id_user = {$_SESSION['id_user']} 
                       AND id_musica = {$dado['id_musica']}";
              $retorno2 = mysqli_query($conexao, $sql2);
              $curtida = mysqli_fetch_assoc($retorno2);

              if ($curtida['curtiu'] > 0) {
                echo "<button onclick='descurtir({$dado['id_musica']})' class='flex items-center gap-2 text-pink-500 hover:text-pink-600 transition'>
                        <i class=\"fa-solid fa-heart\"></i>
                        <span class='text-sm'>{$dado['curtidas']}</span>
                      </button>";
              } else {
                echo "<button onclick='curtir({$dado['id_musica']})' class='flex items-center gap-2 text-gray-500 hover:text-pink-500 transition'>
                        <i class=\"fa-regular fa-heart\"></i>
                        <span class='text-sm'>{$dado['curtidas']}</span>
                      </button>";
              }
            } else {
              echo "<span class='text-sm text-gray-500'>Faça login para curtir</span>";
            }
            ?>
          </div>

          <!-- COMENTÁRIOS -->
          <a href="listar_comentarios.php?id_musica=<?= $dado['id_musica'] ?>" class="flex items-center gap-2 text-blue-500 hover:text-blue-600 transition">
            <i class="fa-solid fa-comment"></i>
            <span class="text-sm">Comentários</span>
          </a>

          <?php
          if (isset($_SESSION['id_user']) && strcmp($_SESSION['id_user'], $dado['id_user']) != 0) {
            $sql3 = "SELECT * FROM favoritos 
                     WHERE id_user = {$_SESSION['id_user']} 
                     AND id_musica = {$dado['id_musica']}";
            $retorno3 = mysqli_query($conexao, $sql3);

            if (mysqli_num_rows($retorno3) > 0) {
              echo "<a href='desfavoritar.php?id_musica={$dado['id_musica']}' class='flex items-center gap-2 text-blue-500 hover:text-blue-600 transition'>
                      <i class='fa-solid fa-bookmark'></i>
                      <span class='text-sm'>Favoritado</span>
                    </a>";
            } else {
              echo "<a href='favoritar.php?id_musica={$dado['id_musica']}' class='flex items-center gap-2 text-blue-500 hover:text-blue-600 transition'>
                      <i class='fa-regular fa-bookmark'></i>
                      <span class='text-sm'>Favoritar</span>
                    </a>";
            }
          }
          ?>
        </div>
      </div>
    </div>
    <hr class="my-6 border-pink-200/40">
<?php
  }
} else {
  echo "<p class='text-center text-gray-500'>Nenhuma música cadastrada ainda.</p>";
}

mysqli_close($conexao);
?>
