<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Perfil</title>
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

    
     <div id="conteudo"></div>
     <div id="conteudo_apaga"></div>
  </main>
<script src="ajaxperfil.js"></script> 

</body>

</html>
