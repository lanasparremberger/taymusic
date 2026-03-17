<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Seguindo e Seguidores</title>
  <?php include 'layouts/header.php'; include 'conecta.php'; ?>

  <style>
    .icon-btn {
      display: inline-flex;
      align-items: center;
      justify-content: center;
      width: 36px;
      height: 36px;
      border-radius: 10px;
      transition: 0.2s;
    }
    .icon-btn:hover {
      transform: scale(1.1);
    }
  </style>
</head>

<body class="bg-gradient-to-br from-pink-50 via-blue-50 to-purple-50 min-h-screen text-gray-800">

  <main class="max-w-3xl mx-auto mt-12 bg-white/80 backdrop-blur-md p-8 rounded-2xl shadow-2xl border border-pink-200">
    <h1 class="text-3xl font-bold text-pink-600 mb-10 text-center">Seguidores e Seguindo</h1>

    <?php 
    //amigos
      if (isset($_SESSION['user'])) {
      if (isset($_GET['id_perfil'])) {
        $sql_seguiu = "SELECT u.user_user, imagem_user FROM seguidores as s,usuarios as u WHERE s.id_seguiu=$_GET[id_perfil] and s.id_seguindo=u.id_user AND s.id_seguindo=$_GET[id_perfil] and s.id_seguiu=u.id_user;";
        $retorno_seguiu = mysqli_query($conexao, $sql_seguiu);
        $seguiu = mysqli_fetch_assoc($retorno_seguiu);
    ?>

        <section class="mb-10">
          <h2 class="text-2xl font-semibold text-purple-600 mb-4 border-b border-pink-200 pb-2">Amigos</h2>

          <div class="space-y-4">
            <?php if (mysqli_num_rows($retorno_seguiu) > 0){ ?>
              <?php  do { ?>
                <div class="flex items-center justify-between bg-white border border-pink-100 rounded-xl shadow p-4 hover:shadow-md hover:scale-[1.01] transition">
                  <div class="flex items-center gap-4">
                    <img src="<?php echo $seguiu['imagem_user'] ?>" alt="Foto do usuário" class="w-14 h-14 rounded-full border-2 border-pink-300 object-cover">
                    <div>
                      <p class="font-semibold text-pink-600">@<?php echo $seguiu['user_user']; ?></p>
                    </div>
                  </div>
                  <button class="icon-btn bg-sky-100 hover:bg-purple-200 text-purple-600">
                  <i class="fa-solid fa-message"></i>
                  </button>
                  <button class="icon-btn bg-pink-100 hover:bg-pink-200 text-pink-600">
                    <i class="fa-solid fa-user-minus"></i>
                  </button>
                </div>
              <?php } while ($seguiu = mysqli_fetch_assoc($retorno_seguiu)); ?>
            <?php } else{ ?>
              <p class="text-gray-500 italic text-center">Você ainda não segue ninguém.</p>
            <?php } ?>
          </div>
        </section>


    <?php
    //seguiu
        $sql_seguiu = "SELECT u.user_user, imagem_user FROM seguidores as s,usuarios as u WHERE s.id_seguiu=$_GET[id_perfil] and s.id_seguindo=u.id_user;";
        $retorno_seguiu = mysqli_query($conexao, $sql_seguiu);
        $seguiu = mysqli_fetch_assoc($retorno_seguiu);
    ?>

        <section class="mb-10">
          <h2 class="text-2xl font-semibold text-purple-600 mb-4 border-b border-pink-200 pb-2">Seguindo</h2>

          <div class="space-y-4">
            <?php if (mysqli_num_rows($retorno_seguiu) > 0){ ?>
              <?php  do { ?>
                <div class="flex items-center justify-between bg-white border border-pink-100 rounded-xl shadow p-4 hover:shadow-md hover:scale-[1.01] transition">
                  <div class="flex items-center gap-4">
                    <img src="<?php echo $seguiu['imagem_user'] ?>" alt="Foto do usuário" class="w-14 h-14 rounded-full border-2 border-pink-300 object-cover">
                    <div>
                      <p class="font-semibold text-pink-600">@<?php echo $seguiu['user_user']; ?></p>
                    </div>
                  </div>
                  <button class="icon-btn bg-sky-100 hover:bg-purple-200 text-purple-600">
                  <i class="fa-solid fa-message"></i>
                  </button>
                  <button class="icon-btn bg-pink-100 hover:bg-pink-200 text-pink-600">
                    <i class="fa-solid fa-user-minus"></i>
                  </button>
                </div>
              <?php } while ($seguiu = mysqli_fetch_assoc($retorno_seguiu)); ?>
            <?php } else{ ?>
              <p class="text-gray-500 italic text-center">Você ainda não segue ninguém.</p>
            <?php } ?>
          </div>
        </section>

    <?php
        //seguidores
        $sql_seguindo = "SELECT u.user_user, imagem_user FROM seguidores as s,usuarios as u WHERE s.id_seguindo=$_GET[id_perfil] and s.id_seguiu=u.id_user;";
        $retorno_seguindo = mysqli_query($conexao, $sql_seguindo);
        $seguindo = mysqli_fetch_assoc($retorno_seguindo);
    ?>

        <section>
          <h2 class="text-2xl font-semibold text-purple-600 mb-4 border-b border-pink-200 pb-2">Seguidores</h2>

          <div class="space-y-4">
            <?php if (mysqli_num_rows($retorno_seguindo) > 0){ ?>
              <?php do { ?>
                <div class="flex items-center justify-between bg-white border border-pink-100 rounded-xl shadow p-4 hover:shadow-md hover:scale-[1.01] transition">
                  <div class="flex items-center gap-4">
                    <img src="<?php echo $seguindo['imagem_user'] ?>" alt="Foto do usuário" class="w-14 h-14 rounded-full border-2 border-purple-300 object-cover">
                    <div>
                      <p class="font-semibold text-purple-600">@<?php echo $seguindo['user_user']; ?></p>
                    </div>
                  </div>
                  <button class="icon-btn bg-sky-100 hover:bg-purple-200 text-purple-600">
                  <i class="fa-solid fa-message"></i>
                  </button>
                  <button class="icon-btn bg-purple-100 hover:bg-purple-200 text-purple-600">
                    <i class="fa-solid fa-heart"></i>
                  </button>
                </div>
              <?php } while ($seguindo = mysqli_fetch_assoc($retorno_seguindo)); ?>
            <?php } else{ ?>
              <p class="text-gray-500 italic text-center">Você ainda não tem seguidores.</p>
            <?php } ?>
          </div>
        </section>

    <?php
      }else{
        echo "Não mandou o id";
      }
    }else {
      echo "
      <div class='flex flex-col items-center justify-center p-8 bg-white/70 rounded-2xl text-center border border-pink-200 shadow-lg mt-10'>
        <i class='fa-solid fa-triangle-exclamation text-pink-500 text-4xl mb-4'></i>
        <p class='text-xl font-semibold text-pink-600 mb-2'>Você não está logado!</p>
        <p class='text-gray-500 mb-6'>Faça login para visualizar seus seguidores.</p>
        <a href='logar.php' class='px-6 py-3 bg-pink-500 hover:bg-pink-600 text-white rounded-lg shadow transition'>Ir para Login</a>
      </div>";
    }
    ?>
  </main>
</body>

</html>
