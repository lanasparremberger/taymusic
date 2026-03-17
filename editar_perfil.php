<?php
include 'conecta.php';


?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Perfil</title>
    <?php include 'layouts/header.php';
    if(isset($_SESSION['user'])) {
    $sql = "SELECT nome_user, nascimento_user, user_user, email_user, imagem_user, capa_user, bio_user
        FROM usuarios
        WHERE id_user = '{$_SESSION['id_user']}'";
$retorno = mysqli_query($conexao, $sql);
$dado = mysqli_fetch_assoc($retorno); ?>
</head>


<body class="bg-gradient-to-br from-blue-100 via-pink-100 to-purple-100 min-h-screen">

  <main class="max-w-2xl mx-auto mt-12 bg-[#111827] p-10 rounded-2xl shadow-2xl shadow-purple-500/60 border border-pink-400/30">
    <h1 class="text-3xl font-bold text-pink-500 mb-8 text-center">
      <i class="fa-solid fa-user-pen mr-2"></i>Editar Perfil
    </h1>

    <form action="editar_perfil_back.php?id=<?php echo $_SESSION['id_user'] ?>" method="POST" enctype="multipart/form-data" class="space-y-6">
      
      <div>
        <label for="nome_user" class="block text-purple-300 font-medium mb-1">Nome:</label>
        <input type="text" name="nome_user" id="nome_user"
               value="<?php echo $dado['nome_user']; ?>"
               class="w-full px-4 py-2 bg-[#1F2937] text-gray-200 border border-pink-500 rounded focus:outline-none focus:ring-2 focus:ring-sky-200" />
      </div>

      <div>
        <label for="bio_user" class="block text-purple-300 font-medium mb-1">Bio:</label>
        <textarea name="bio_user" id="bio_user" rows="3"
                  class="w-full px-4 py-2 bg-[#1F2937] text-gray-200 border border-pink-500 rounded focus:outline-none focus:ring-2 focus:ring-sky-200"><?php echo $dado['bio_user'] ?></textarea>
      </div>

      <div>
        <label for="imagem_user" class="block text-purple-300 font-medium mb-3">Foto de Perfil:</label>
        <?php if (!empty($dado['imagem_user'])): ?>
          <img src="<?php echo $dado['imagem_user']; ?>" class="w-20 h-20 rounded-full object-cover mb-3 border-2 border-pink-400 shadow-md">
        <?php endif; ?>
        <label for="imagem_user"
          class="bg-pink-500 hover:bg-pink-600 text-white px-8 py-3 rounded-lg shadow-lg shadow-pink-700/50 transition duration-300 cursor-pointer">
          Escolher arquivo
        </label>
        <input type="file" name="imagem_user" id="imagem_user" class="hidden">
        <span id="file-chosen-img" class="ml-2 text-sm text-gray-400">Nenhum arquivo selecionado</span>
      </div>

      <div>
        <label for="capa_user" class="block text-purple-300 font-medium mb-3">Capa:</label>
        <?php if (!empty($dado['capa_user'])): ?>
          <img src="<?php echo $dado['capa_user']; ?>" class="w-full h-32 object-cover rounded-lg mb-3 border border-pink-400">
        <?php endif; ?>
        <label for="capa_user"
          class="bg-pink-500 hover:bg-pink-600 text-white px-8 py-3 rounded-lg shadow-lg shadow-pink-700/50 transition duration-300 cursor-pointer">
          Escolher arquivo
        </label>
        <input type="file" name="capa_user" id="capa_user" class="hidden">
        <span id="file-chosen-capa" class="ml-2 text-sm text-gray-400">Nenhum arquivo selecionado</span>
      </div>

      <?php if (isset($_SESSION['erro'])): ?>
        <div class="p-3 text-red-400 bg-red-900/30 border border-red-500 rounded-lg text-center">
          <?php echo $_SESSION['erro']; ?>
        </div>
        <?php unset($_SESSION['erro']); ?>
      <?php elseif (isset($_SESSION['sucesso'])): ?>
        <div class="p-3 text-green-400 bg-green-900/30 border border-green-500 rounded-lg text-center">
          <? echo $_SESSION['sucesso']; ?>
        </div>
        <?php unset($_SESSION['sucesso']); ?>
      <?php endif; ?>

      <div class="flex justify-center space-x-4">
        <a href="perfil.php"
           class="px-6 py-3 bg-gray-500 hover:bg-gray-600 text-white rounded-lg shadow-lg shadow-gray-700/50 transition">
           <i class="fa-solid fa-arrow-left mr-2"></i>Cancelar
        </a>
        <button type="submit" name="Salvar"
                class="px-6 py-3 bg-pink-500 hover:bg-pink-600 text-white rounded-lg shadow-lg shadow-pink-700/50 transition">
          <i class="fa-solid fa-save mr-2"></i>Salvar Alterações
        </button>
      </div>
<?php
    }else{
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
    
    const fileInputImg = document.getElementById('imagem_user');
    const fileChosenImg = document.getElementById('file-chosen-img');
    fileInputImg.addEventListener('change', function() {
      fileChosenImg.textContent = this.files[0] ? this.files[0].name : 'Nenhum arquivo selecionado';
    });

    const fileInputCapa = document.getElementById('capa_user');
    const fileChosenCapa = document.getElementById('file-chosen-capa');
    fileInputCapa.addEventListener('change', function() {
      fileChosenCapa.textContent = this.files[0] ? this.files[0].name : 'Nenhum arquivo selecionado';
    });
  </script>

</body>
</html>