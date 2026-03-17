<?php
session_start();
?>
<script src="https://cdn.tailwindcss.com"></script>
<link rel="icon" href="img/icon.png">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
    integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
<link
    href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500&family=Playfair+Display:wght@600;700&display=swap"
    rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<style>
    body {
        font-family: 'Inter', sans-serif;
    }

    h1,
    h2 {
        font-family: 'Playfair Display', serif;
    }
    
</style>
</head>

<body class="bg-[#1F2937]">

    <header class="w-full z-[3] h-[6rem] bg-sky-200 flex items-center px-10">
        <div class="flex w-full items-center justify-between">
            
            <!-- Esquerda -->
            <div class="flex items-center space-x-10">
                <a href="index.php" class="flex items-center">
                    <i class="fa-solid fa-house text-4xl text-[#1F2937] hover:scale-110 hover:text-pink-400 transition ease-in-out"></i>
                </a>
                <a href="formmsc.php" class="flex items-center">
                    <i class="fa-solid fa-music text-4xl text-[#1F2937] hover:scale-110 hover:text-pink-400 transition ease-in-out"></i>
                </a>
                <a href="mscprint.php" class="flex items-center">
                    <i class="fa-solid fa-headphones text-4xl text-[#1F2937] hover:scale-110 hover:text-pink-400 transition ease-in-out"></i>
                </a>
            </div>

            <!-- Direita -->
            <div class="flex items-center space-x-10">
                <?php if (isset($_SESSION["user"])) { ?>
                    <a href="logout.php" class="flex items-center">
                        <i class="fa-solid fa-arrow-right-from-bracket text-4xl text-[#1F2937] hover:scale-110 hover:text-pink-400 transition ease-in-out"></i>
                    </a>
                    <a href="perfil.php" class="flex items-center">
                        <img alt="perfil"
                             class="w-12 h-12 object-cover rounded-full hover:scale-110 transition ease-in-out"
                             src="<?php echo $_SESSION['imagem_user']; ?>" />
                    </a>
                <?php
             } else { ?>
                    <a href="logar.php" class="flex items-center">
                        <i class="fa-solid fa-arrow-right-to-bracket text-4xl text-[#1F2937] hover:scale-110 hover:text-pink-400 transition ease-in-out"></i>
                    </a>
                    <a href="logar_cadastrar.php" class="flex items-center">
                        <i class="fa-solid fa-user text-4xl text-[#1F2937] hover:scale-110 hover:text-pink-400 transition ease-in-out"></i>
                    </a>
                <?php } ?>
            </div>

        </div>
    </header>
