<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tiny.cloud/1/bbqxackm23b8mrjph6db5yh76zk3wouzx442wm2mwarb9hhw/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script>
  <title>Formulário de Músicas Favoritas</title>

  <?php include 'layouts/header.php' ?>

  <main class="max-w-2xl mx-auto mt-12 bg-[#111827] p-10 rounded-2xl shadow-2xl shadow-purple-500/60 border border-pink-400/30">
    <h1 class="text-3xl font-bold text-pink-500 mb-8 text-center">Cadastre suas músicas favoritas da loirinha!</h1>
    <?php
    if (isset($_SESSION['user'])) {
    ?>
      <form method="post" action="msc.php" enctype="multipart/form-data" class="space-y-6">
        <div>
          <label for="musica_favorita" class="block text-purple-300 font-medium mb-1">Digite uma das suas músicas favoritas da Taylor Swift:</label>
          <input type="text" name="musica_favorita" id="musica_favorita" placeholder="The Archer"
            class="w-full px-4 py-2 bg-[#1F2937] text-gray-200 border border-pink-500 rounded focus:outline-none focus:ring-2 focus:ring-sky-200" required />
        </div>

        <div>
          <label for="numero_musica" class="block text-purple-300 font-medium mb-1">Digite o número dela no álbum (1ª - 1, 2ª - 2):</label>
          <input type="number" name="numero_musica" id="numero_musica" min="1" max="31" placeholder="5"
            class="w-full px-4 py-2 bg-[#1F2937] text-gray-200 border border-pink-500 rounded focus:outline-none focus:ring-2 focus:ring-sky-200" />
        </div>

        <div>
          <label for="album_musica" class="block text-purple-300 font-medium mb-1">Qual álbum (ou EP) esta música pertence?</label>
          <select name="album_musica" id="album_musica" required
            class="w-full px-4 py-2 bg-[#1F2937] text-gray-200 border border-pink-500 rounded focus:outline-none focus:ring-2 focus:ring-sky-200">
            <option value="" class="text-gray-400" disabled selected>Selecione um álbum</option>
            <?php

            ?>
            <option value="1" class="text-pink-400">Taylor Swift (2006)</option>
            <option value="2" class="text-pink-400">Fearless (2008)</option>
            <option value="3" class="text-pink-400">The Taylor Swift Holiday Collection (2008)</option>
            <option value="4" class="text-pink-400">Speak Now (2010)</option>
            <option value="5" class="text-pink-400">Red (2012)</option>
            <option value="6" class="text-pink-400">1989 (2014)</option>
            <option value="7" class="text-pink-400">reputation (2017)</option>
            <option value="8" class="text-pink-400">Lover (2019)</option>
            <option value="9" class="text-pink-400">Folklore (2020)</option>
            <option value="10" class="text-pink-400">evermore (2020)</option>
            <option value="11" class="text-pink-400">Fearless (Taylor's Version) (2021)</option>
            <option value="12" class="text-pink-400">Red (Taylor's Version) (2021)</option>
            <option value="13" class="text-pink-400">Midnights (The Til Dawn Edition) (2022)</option>
            <option value="14" class="text-pink-400">Speak Now (Taylor's Version) (2023)</option>
            <option value="15" class="text-pink-400">1989 (Taylor's Version) (2023)</option>
            <option value="16" class="text-pink-400">THE TORTURED POESTS DEPARTAMENT: THE ANTHOLOGY (2024)</option>
            <option value="17" class="text-pink-400">The Life of a Showgirl (2025)</option>
            <option value="18" class="text-pink-400">Outros</option>
          </select>
        </div>

        <div>
          <label for="genero_musica" class="block text-purple-300 font-medium mb-1">Qual o gênero desta música?</label>
          <select name="genero_musica" id="genero_musica" required
            class="w-full px-4 py-2 bg-[#1F2937] text-gray-200 border border-pink-500 rounded focus:outline-none focus:ring-2 focus:ring-sky-200">
            <option value="" class="text-gray-400" disabled selected>Selecione um estilo</option>
            <option value="1" class="text-pink-400">Pop</option>
            <option value="2" class="text-pink-400">Synth-Pop</option>
            <option value="3" class="text-pink-400">Country</option>
            <option value="4" class="text-pink-400">Dream Pop</option>
            <option value="5" class="text-pink-400">Bubblegum Pop</option>
            <option value="6" class="text-pink-400">Pop Funk</option>
            <option value="7" class="text-pink-400">Indie Pop</option>
            <option value="8" class="text-pink-400">R&B</option>
            <option value="9" class="text-pink-400">Soft Rock</option>
            <option value="10" class="text-pink-400">Folk Rock</option>
            <option value="11" class="text-pink-400">Disco Pop</option>
            <option value="12" class="text-pink-400">Indie Folk</option>
            <option value="13" class="text-pink-400">Art Pop</option>
            <option value="14" class="text-pink-400">Emo Pop</option>
            <option value="15" class="text-pink-400">Folk</option>
            <option value="16" class="text-pink-400">Orquestral</option>
            <option value="17" class="text-pink-400">Gospel</option>
          </select>
        </div>
        <div>
          <label for="descricao_musica" class="block text-purple-300 font-medium mb-1">
            Você gostaria de inserir uma parte da letra ou um comentário sobre a música?
          </label>
          <textarea name="descricao_musica" id="descricao_musica" rows="4" placeholder="Digite aqui sua opinião ou um trecho da música..."
            class="w-full px-4 py-2 bg-[#1F2937] text-gray-200 border border-pink-500 rounded focus:outline-none focus:ring-2 focus:ring-sky-200 resize-none"></textarea>
        </div>
        <div>
          <label for="imagem_musica" class="block text-purple-300 font-medium mb-3">Selecione uma imagem que lhe remeta à música:</label>
          <label for="imagem_musica"
            class="bg-pink-500 hover:bg-pink-600 text-white  px-8 py-3 rounded-lg shadow-lg shadow-pink-700/50 transition duration-300 focus:outline-2 focus:outline-offset-2 focus:outline-pink-700 cursor-pointer">
            Escolher arquivo
          </label>
          <input type="file" name="imagem_musica" id="imagem_musica" class="hidden" required>
          <span id="file-chosen" class="ml-2 text-sm text-gray-600">Nenhum arquivo selecionado</span>
        </div>
        <?php if (isset($_SESSION['erro'])): ?>
          <div class="mb-4 p-3 text-red-400 bg-red-900/30 border border-red-500 rounded-lg text-center">
            <?= $_SESSION['erro']; ?>
          </div>
          <?php unset($_SESSION['erro']); ?>
        <?php endif; ?>
        <div class="flex justify-center">
          <input type="submit" value="Enviar" name="Enviar" class="bg-pink-500 hover:bg-pink-600 text-white px-8 py-3 rounded-lg shadow-lg shadow-pink-700/50 transition duration-300 focus:outline-2 focus:outline-offset-2 focus:outline-pink-700 cursor-pointer" />
        </div>
      <?php
    } else {
      echo "
    <div class='flex flex-col items-center justify-center mt-6 p-8 bg-[#111827] rounded-2xl  text-center'>
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
    </div>
    ";
    }
      ?>

      </form>
  </main>

  <script>
    tinymce.init({
      selector: '#descricao_musica', // ID do textarea
      height: 300,
      plugins: 'advlist autolink lists link image charmap preview anchor',
      toolbar: 'undo redo | formatselect | bold italic backcolor | \
                alignleft aligncenter alignright alignjustify | \
                bullist numlist outdent indent | removeformat | help',
      menubar: false
    });
    const fileInput = document.getElementById('imagem_musica');
    const fileChosen = document.getElementById('file-chosen');

    fileInput.addEventListener('change', function() {
      fileChosen.textContent = this.files[0] ? this.files[0].name : 'Nenhum arquivo selecionado';
    });
  </script>
  </body>

</html>