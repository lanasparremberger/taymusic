<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Entre em Sua Conta</title>

  <?php include 'layouts/header.php' ?>
  <main class="max-w-2xl mx-auto mt-12 bg-[#111827] p-10 rounded-2xl shadow-2xl shadow-purple-500/60 border border-pink-400/30">

    <h1 class="text-3xl font-bold text-pink-500 mb-8 text-center">
      Entre em sua conta!
    </h1>
    <form method="post" action="recebimentologar.php" enctype="multipart/form-data" class="space-y-6">

      <div>
        <label for="user_user" class="block text-purple-300 font-medium mb-1">User:</label>
        <input type="text" name="user_user" id="user_user" placeholder="swift_lula13" class="w-full px-4 py-2 bg-[#1F2937] text-gray-200 border border-pink-500 rounded focus:outline-none focus:ring-2 focus:ring-sky-200" required />
      </div>
      <div>
        <label for="senha_user" class="block text-purple-300 font-medium mb-1">Senha:</label>
        <div class="relative">
          <input type="password" id="senha_user" name="senha_user" placeholder="TaylorSwift13" class="w-full px-4 py-2 bg-[#1F2937] text-gray-200 border border-pink-500 rounded focus:outline-none focus:ring-2 focus:ring-sky-200" required placeholder="Digite sua senha">
          <i id="toggleSenha" class="fa-solid fa-eye absolute right-3 top-3 text-gray-500 cursor-pointer"></i>

        </div>
        <a href="recuperar_senha.php"
          class="block text-center text-sm text-purple-300 font-medium hover:underline hover:text-sky-300 hover:scale-105 duration-200 mb-4">Deseja recuperar sua senha?</a>
      </div>
      <a href="formcad.php"
        class="block text-center text-sm text-purple-300 font-medium hover:underline hover:text-sky-300 hover:scale-105 duration-200 mb-4">
        Não tem cadastro? Faça sua conta
      </a>
      <?php if (isset($_SESSION['erro'])): ?>
        <div class="mb-4 p-3 text-red-400 bg-red-900/30 border border-red-500 rounded-lg text-center">
          <?= $_SESSION['erro']; ?>
        </div>
        <?php unset($_SESSION['erro']); ?>
      <?php endif; ?>

      <div class="flex justify-center">
        <input type="submit" value="Entrar" name="Entrar" class="bg-pink-500 hover:bg-pink-600 text-white px-8 py-3 rounded-lg shadow-lg shadow-pink-700/50 transition duration-300 focus:outline-2 focus:outline-offset-2 focus:outline-pink-700 cursor-pointer" />
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

    const fileInput = document.getElementById('img');
    const fileChosen = document.getElementById('file-chosen');

    fileInput.addEventListener('change', function() {
      fileChosen.textContent = this.files[0] ? this.files[0].name : 'Nenhum arquivo selecionado';
    });
  </script>
  </body>


</html>