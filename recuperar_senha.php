<!DOCTYPE html>
<html lang="pt-br">

<head>
  <title>Recuperação de Senha</title>
  <?php include('layouts/header.php') ?>
</head>

<body class="bg-gradient-to-br from-blue-100 via-pink-100 to-purple-100 min-h-screen flex items-center justify-center">

  <div class="w-full max-w-md p-6">
    <?php
    if (isset($_SESSION['erro'])) {
      echo "
        <div class='bg-red-500/20 border border-red-500 text-red-700 px-4 py-3 rounded relative mb-4 text-center'>
          {$_SESSION['erro']}
        </div>";
      unset($_SESSION['erro']);
    }
    ?>

    <div class="bg-[#111827] rounded-2xl shadow-xl shadow-purple-600/40 border border-pink-400/30 p-6">
      <h3 class="text-center text-2xl font-bold text-pink-400 mb-6">Recuperar Senha</h3>

      <form action="enviar_email.php" method="POST" class="space-y-4">
        <div>
          <label class="block text-gray-300 mb-1">Digite seu e-mail</label>
          <input type="email" name="email" placeholder="taylorswift13@gmail.com" required
            class="w-full px-4 py-2 bg-gray-800 text-gray-200 border border-pink-500 rounded focus:outline-none focus:ring-2 focus:ring-pink-400">
        </div>

        <button type="submit" name="recuperar"
          class="w-full bg-pink-500 hover:bg-pink-600 text-white font-semibold py-2 rounded-xl shadow-md transition duration-300">
          Enviar link de recuperação
        </button>
      </form>
    </div>
  </div>

</body>
</html>
