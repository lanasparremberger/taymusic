
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Cadastro</title>
  <?php include 'layouts/header.php' ?>
  <main class="max-w-2xl mx-auto mt-12 bg-[#111827] p-10 rounded-2xl shadow-2xl shadow-purple-500/60 border border-pink-400/30">

    <h1 class="text-3xl font-bold text-pink-500 mb-8 text-center">
      Cadastre-se para compartilhar sua paixão pela Taylor Swift!
    </h1>
    <form method="post" action="recebimentocad.php" enctype="multipart/form-data" class="space-y-6">

      <div>
        <label for="nome_user" class="block text-purple-300 font-medium mb-1">Nome:</label>
        <input type="text" name="nome_user" id="nome_user" placeholder="Taylor Alison Swift" class="w-full px-4 py-2 bg-[#1F2937] text-gray-200 border border-pink-500 rounded focus:outline-none focus:ring-2 focus:ring-sky-200" required />
      </div>
      <div>
        <label for="nascimento_user" class="block text-purple-300 font-medium mb-1">Data de nascimento:</label>
        <input type="date" name="nascimento_user" id="nascimento_user" class="w-full px-4 py-2 bg-[#1F2937] text-gray-400 border border-pink-500 rounded focus:outline-none focus:ring-2 focus:ring-sky-200" required />
      </div>
      <div>
        <label for="user_user" class="block text-purple-300 font-medium mb-1">User:</label>
        <input type="text" name="user_user" id="user_user" placeholder="swift_lula13" class="w-full px-4 py-2 bg-[#1F2937] text-gray-200 border border-pink-500 rounded focus:outline-none focus:ring-2 focus:ring-sky-200" required />
      </div>
      <div>
        <label for="email_user" class="block text-purple-300 font-medium mb-1">E-mail:</label>
        <input type="email_user" name="email_user" id="email_user" placeholder="taylorswift13@gmail.com" class="w-full px-4 py-2 bg-[#1F2937] text-gray-200 border border-pink-500 rounded focus:outline-none focus:ring-2 focus:ring-sky-200" required />
      </div>
      <div>
        <label for="senha_user" class="block text-purple-300 font-medium mb-1">Senha:</label>
        <div class="relative">
          <input type="password" id="senha_user" name="senha_user" placeholder="TaylorSwift13" class="w-full px-4 py-2 bg-[#1F2937] text-gray-200 border border-pink-500 rounded focus:outline-none focus:ring-2 focus:ring-sky-200" required placeholder="Digite sua senha">
          <i id="toggleSenha" class="fa-solid fa-eye absolute right-3 top-3 text-gray-500 cursor-pointer"></i>
        </div>
      </div>
      <div>
        <label for="imagem_user" class="block text-purple-300 font-medium mb-3">Selecione uma imagem de perfil:</label>
        <label for="imagem_user"
          class="bg-pink-500 hover:bg-pink-600 text-white  px-8 py-3 rounded-lg shadow-lg shadow-pink-700/50 transition duration-300 focus:outline-2 focus:outline-offset-2 focus:outline-pink-700 cursor-pointer">
          Escolher arquivo
        </label>
        <input type="file" name="imagem_user" id="imagem_user" class="hidden" required>
        <span id="file-chosen" class="ml-2 text-sm text-gray-600">Nenhum arquivo selecionado</span>
      </div>
      <a href="logar.php"
        class="block text-center text-sm text-purple-300 font-medium hover:underline hover:text-sky-300 hover:scale-105 duration-200 mb-4">
        Já tem cadastro? Logue em sua conta
      </a>
         <?php if (isset($_SESSION['erro'])): ?>
          <div class="mb-4 p-3 text-red-400 bg-red-900/30 border border-red-500 rounded-lg text-center">
            <?= $_SESSION['erro']; ?>
          </div>
          <?php unset($_SESSION['erro']); ?>
        <?php endif; ?>
      <div class="flex justify-center">
        <input type="submit" value="Cadastrar" name="Cadastrar"
          class="bg-pink-500 hover:bg-pink-600 text-white px-8 py-3 rounded-lg shadow-lg shadow-pink-700/50 transition duration-300 focus:outline-2 focus:outline-offset-2 focus:outline-pink-700 cursor-pointer" />
      </div>
    </form>
  </main>
  <script>
    const senhaInput = document.getElementById("senha_user");
    const toggleSenha = document.getElementById("toggleSenha");

    toggleSenha.addEventListener("click", () => {
      const tipo = senhaInput.getAttribute("type") === "password" ? "text" : "password";
      senhaInput.setAttribute("type", tipo);

      // troca o ícone entre olho aberto e fechado
      toggleSenha.classList.toggle("fa-eye");
      toggleSenha.classList.toggle("fa-eye-slash");
    });

    const fileInput = document.getElementById('imagem_user');
    const fileChosen = document.getElementById('file-chosen');

    fileInput.addEventListener('change', function() {
      fileChosen.textContent = this.files[0] ? this.files[0].name : 'Nenhum arquivo selecionado';
    });
  </script>
  </body>


</html>