
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Músicas Favoritas</title>
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

<body class="bg-gradient-to-br from-pink-50 via-blue-50 to-purple-50 min-h-screen text-gray-800">
  <p class="mt-6 text-4xl font-extrabold bg-clip-text text-transparent bg-gradient-to-r from-pink-500 via-purple-500 to-blue-500 mb-8 text-center drop-shadow-sm">
    Músicas favoritadas!
  </p>

  <main class="max-w-4xl mx-auto p-4 space-y-8">
    <?php if (isset($_SESSION['erro'])): ?>
          <div class="mb-4 p-3 text-red-600 bg-red-100 border border-red-400 rounded-lg text-center">
            <?= $_SESSION['erro']; unset($_SESSION['erro']); ?>
          </div>
        <?php endif; ?>

        <?php if (isset($_SESSION['sucesso'])): ?>
          <div class="mb-4 p-3 text-green-600 bg-green-100 border border-green-400 rounded-lg text-center">
            <?= $_SESSION['sucesso']; unset($_SESSION['sucesso']); ?>
          </div>
        <?php endif; ?>
   <div id="conteudo">

        </div>
  </main>

  <script src="ajaxmscprint.js">

  </script>
</body>

</html>
