<?php
include 'conecta.php';


?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Perfil</title>
    <script src="https://cdn.tiny.cloud/1/bbqxackm23b8mrjph6db5yh76zk3wouzx442wm2mwarb9hhw/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script>
    <?php include 'layouts/header.php';
    if (isset($_SESSION['id_user'])) {
        if (isset($_GET["id"])) {
            $_SESSION['id_musica'] = $_GET["id"];
            $id_musica= $_GET["id"];
            $sql = "SELECT *
        FROM musicas
        WHERE id_user = '{$_SESSION['id_user']}'
        AND id_musica=$id_musica";
            $retorno = mysqli_query($conexao, $sql);
            $dado = mysqli_fetch_assoc($retorno); ?>
</head>



<body class="min-h-screen bg-gradient-to-br from-[#0f172a] via-[#1e1b4b] to-[#3b0764] text-gray-200 flex items-center justify-center py-10">

    <main class="max-w-2xl mx-auto mt-12 bg-[#111827] p-10 rounded-2xl shadow-2xl shadow-purple-500/60 border border-pink-400/30">
        <h1 class="text-4xl font-extrabold text-center mb-10 bg-gradient-to-r from-pink-400 via-fuchsia-400 to-purple-400 bg-clip-text text-transparent">
            <i class="fa-solid fa-music mr-2"></i>Editar Música
        </h1>

        <form action="editar_musica_back.php?id=<?php echo $_SESSION['id_musica'] ?>" method="POST" enctype="multipart/form-data" class="space-y-8">

            <!-- Nome da música -->
            <div>
                <label for="musica_favorita" class="block text-pink-400 font-semibold mb-2">Nome da Música</label>
                <input type="text" name="musica_favorita" id="musica_favorita" value="<?php echo $dado['nome_musica'] ?>"
                    class="w-full px-4 py-3 rounded-xl bg-[#1f2937] border border-pink-500/40 text-gray-200 focus:ring-2 focus:ring-pink-400 focus:border-transparent transition-all duration-300" required>
            </div>

            <!-- Número no álbum -->
            <div>
                <label for="numero_musica" class="block text-pink-400 font-semibold mb-2">Número no Álbum</label>
                <input type="number" name="numero_musica" id="numero_musica" min="1" max="31" value="<?php echo $dado['numero_musica'] ?>"
                    class="w-full px-4 py-3 rounded-xl bg-[#1f2937] border border-pink-500/40 text-gray-200 focus:ring-2 focus:ring-pink-400 transition-all duration-300">
            </div>

            <!-- Álbum -->
            <div>
                <label for="album_musica" class="block text-pink-400 font-semibold mb-2">Álbum</label>
                <select name="album_musica" id="album_musica"
                    class="w-full px-4 py-3 rounded-xl bg-[#1f2937] border border-pink-500/40 text-gray-200 focus:ring-2 focus:ring-pink-400 transition-all duration-300">
                    <?php
                    $sql2 = "SELECT id_album, nome_album FROM albuns order by id_album";
                    $albuns = mysqli_query($conexao, $sql2);
                    while ($album = mysqli_fetch_assoc($albuns)) {
                        if ($album['id_album'] == $dado['id_album']) {
                            echo "<option value = $album[id_album] selected>" . $album['nome_album'] . "</option>";
                        } else {
                            echo "<option value = $album[id_album]>" . $album['nome_album'] . "</option>";
                        }
                    }
                    ?>
                </select>
            </div>

            <div>
                <label for="genero_musica" class="block text-pink-400 font-semibold mb-2">Gênero</label>
                <select name="genero_musica" id="genero_musica"
                    class="w-full px-4 py-3 rounded-xl bg-[#1f2937] border border-pink-500/40 text-gray-200 focus:ring-2 focus:ring-pink-400 transition-all duration-300">
                    <?php
                    $sql2 = "SELECT id_genero, nome_genero FROM generos order by id_genero";
                    $generos = mysqli_query($conexao, $sql2);
                    while ($genero = mysqli_fetch_assoc($generos)) {
                        if ($genero['id_genero'] == $dado['id_genero'])
                            echo "<option value = $genero[id_genero]  selected>" . $genero['nome_genero'] . "</option>";
                        else
                            echo "<option value = $genero[id_genero] >" . $genero['nome_genero'] . "</option>";
                    }
                    ?>
                </select>
            </div>

            <div>
                <label for="descricao_musica" class="block text-pink-400 font-semibold mb-2">Comentário sobre a música</label>
                <textarea name="descricao_musica" id="descricao_musica" rows="4"
                    class="w-full px-4 py-3 rounded-xl bg-[#1f2937] border border-pink-500/40 text-gray-200 focus:ring-2 focus:ring-pink-400 resize-none transition-all duration-300"><?php echo $dado['descricao_musica'] ?></textarea>
            </div>
            <div>
                <label for="imagem_musica" class="block text-pink-400 font-semibold mb-3">Imagem da Música</label>
                <img src="<?php echo $dado['imagem_musica'] ?>" alt="Imagem atual"
                    class="w-32 h-32 rounded-xl object-cover mb-3 border-2 border-pink-400 shadow-[0_0_20px_-5px_rgba(236,72,153,0.5)]">

                <label for="imagem_musica"
                    class="inline-block cursor-pointer bg-gradient-to-r from-pink-500 to-purple-600 hover:opacity-90 text-white px-6 py-2 rounded-lg shadow-md shadow-pink-700/50 transition duration-300">
                    Escolher arquivo
                </label>
                <input type="file" name="imagem_musica" id="imagem_musica" class="hidden">
                <span id="file-chosen" class="ml-2 text-sm text-gray-400">Nenhum arquivo selecionado</span>
            </div>

            <!-- Botões -->
            <div class="flex justify-center space-x-6 pt-4">
                <a href="perfil.php"
                    class="px-6 py-3 bg-gray-600 hover:bg-gray-700 text-white rounded-lg shadow-md shadow-gray-700/50 transition">
                    <i class="fa-solid fa-arrow-left mr-2"></i>Cancelar
                </a>
                <button onclick="editarmusica(<?php $_SESSION['id_musica']?>)" name="Salvar"
                    class="px-6 py-3 bg-gradient-to-r from-pink-500 to-purple-600 hover:opacity-90 text-white rounded-lg shadow-md shadow-pink-700/50 transition">
                    <i class="fa-solid fa-save mr-2"></i>Salvar Alterações
                </button>
            </div>
            <?php if (isset($_SESSION['erro'])): ?>
    <div class="p-3 text-red-400 bg-red-900/30 border border-red-500 rounded-lg text-center">
        <?php echo $_SESSION['erro']; ?>
    </div>
    <?php unset($_SESSION['erro']); ?>
<?php elseif (isset($_SESSION['sucesso'])): ?>
    <div class="p-3 text-green-400 bg-green-900/30 border border-green-500 rounded-lg text-center">
        <?php echo $_SESSION['sucesso']; ?>
    </div>
    <?php unset($_SESSION['sucesso']); ?>
<?php endif; ?>
    <?php        } else {
            $_SESSION['erro'] = "Não foi passado o ID da música editada.";
            header("Location: perfil.php");
            exit();
        }
    } else {
        echo "<div class='flex flex-col items-center justify-center mt-6 p-8 bg-[#111827] rounded-2xl  text-center'>
        <i class='fa-solid fa-triangle-exclamation text-purple-400 text-4xl mb-4'></i>
        <p class='text-xl font-semibold text-purple-400 mb-2'>
            Você não está logado!
        </p>
        <p class='text-gray-300 mb-6'>
            Faça login para cadastrar suas músicas favoritas.
        </p>
        <a href='logar.php'
           class='px-6 py-3 bg-pink-500 hover:bg-pink-600 text-white rounded-lg shadow-lg shadow-pink-700/50 transition duration-300 focus:outline-none focus:ring-2 focus:ring-pink-400'>
           Ir para Login
        </a>
    </div>";
    } ?>
        </form>
    </main>

    <script src="ajaxeditarmusica.js">
       
    </script>
</body>

</html>