<?php 
session_start();
include 'conecta.php';

if (isset($_SESSION['user'])): 
      $sql = "SELECT nome_user, user_user, imagem_user, capa_user, bio_user, timestamp_user 
              FROM usuarios 
              WHERE id_user = '{$_SESSION['id_user']}'";
      $retorno = mysqli_query($conexao, $sql);
      if (mysqli_num_rows($retorno) > 0):
        while ($dado = mysqli_fetch_assoc($retorno)):
          
          echo "<div class='relative bg-white/80 backdrop-blur-md rounded-2xl shadow-lg border border-pink-200 overflow-hidden'>";
           if (!empty($dado['capa_user'])): 
             echo " <img src=' $dado[capa_user] ' alt='Capa do usuário' class='w-full h-48 object-cover'>";
           else: 
              echo "<div class='w-full h-48 bg-gradient-to-r from-pink-200 via-purple-200 to-blue-200'></div>";
           endif; 
echo "
            <a href='editar_perfil.php'
              class='absolute top-4 right-4 bg-pink-500 hover:bg-pink-600 icon-btn shadow-md'>
              <i class='fa-solid fa-pen text-white'></i>
            </a>

            <div id='modo_escuro'
              class='absolute top-4 right-12 bg-pink-500 hover:bg-pink-600 icon-btn shadow-md'>
              <i class='fa-solid fa-cloud-moon-rain'></i>
            </div>

            <div id='modo_claro'
              class='absolute top-4 right-18 bg-pink-500 hover:bg-pink-600 icon-btn shadow-md'>
              <i class='fa-solid fa-sun'></i>
            </div>

            <div class='flex flex-col items-center p-6'>
              <img src=' $dado[imagem_user] ' alt='Foto de perfil'
                class='w-28 h-28 rounded-full border-4 border-pink-300 shadow-md -mt-16 bg-white object-cover'>

              <h1 class='text-2xl font-bold text-pink-600 mt-4'> $dado[nome_user] </h1>
              <p class='text-purple-500'>@$dado[user_user] </p>";

             
              $sql_seguidores="SELECT COUNT(*) AS total_seguidores FROM seguidores WHERE id_seguindo = $_SESSION[id_user]";
              $retorno_seguidores = mysqli_query($conexao, $sql_seguidores);
        $seguidores = mysqli_fetch_assoc($retorno_seguidores);
               echo "
              <div class='flex justify-center gap-8 mt-4'>
                <a href='listarseguidoresseguindo.php?id_perfil=$_SESSION[id_user]' 
                   class='flex flex-col items-center text-center group transition hover:scale-105'>
                  <span class='text-2xl font-bold text-pink-600 group-hover:text-pink-700'>$seguidores[total_seguidores]  </span>
                  <span class='text-sm text-gray-600 group-hover:text-pink-500'>Seguidores</span>
                </a>

               ";
              $sql_seguindo="SELECT COUNT(*) AS total_seguiu FROM seguidores WHERE id_seguiu = $_SESSION[id_user]";
              $retorno_seguindo = mysqli_query($conexao, $sql_seguindo);
        $seguindo = mysqli_fetch_assoc($retorno_seguindo);
              
        echo "
                <a href='listarseguidoresseguindo.php?id_perfil=$_SESSION[id_user]' 
                   class='flex flex-col items-center text-center group transition hover:scale-105'>
                  <span class='text-2xl font-bold text-purple-600 group-hover:text-purple-700'>$seguindo[total_seguiu]  </span>
                  <span class='text-sm text-gray-600 group-hover:text-purple-500'>Seguindo</span>
                </a>
              </div>
";
             if (!empty($dado['bio_user'])): 
                echo "<p class='text-gray-600 text-center mt-4 px-6 italic'>$dado[bio_user] </p>";
             endif; 
             $data=date('d/m/Y', strtotime($dado['timestamp_user']));
             echo "
              <p class='text-sm text-gray-400 mt-4'>Membro desde: $data </p>
            </div>
          </div>
          ";
     endwhile; endif; 

      echo "
      <div class='bg-white/80 backdrop-blur-md rounded-2xl shadow-lg border border-pink-200 p-6'>
        <h2 class='text-2xl font-bold text-pink-600 mb-4 text-center'>Músicas adicionadas</h2>
";
       if (isset($_SESSION['erro'])): 
        echo "  
        <div class='mb-4 p-3 text-red-600 bg-red-100 border border-red-400 rounded-lg text-center'>
        <p>$_SESSION[erro]</p>
        </div>
          ";
          unset($_SESSION['erro']); 
       endif; 

       if (isset($_SESSION['sucesso'])): 
        echo "
        <div class='mb-4 p-3 text-green-600 bg-green-100 border border-green-400 rounded-lg text-center'>
             $_SESSION[sucesso] 
          </div>
          ";
          unset($_SESSION['sucesso']); 
       endif; 

        
      include_once 'tempo_relativo.php';
        $sql_musicas = "SELECT 
              musicas.id_musica, musicas.nome_musica, musicas.numero_musica,
              musicas.imagem_musica, musicas.descricao_musica, musicas.criado_em,
              albuns.nome_album, generos.nome_genero
            FROM musicas
            INNER JOIN albuns ON musicas.id_album = albuns.id_album
            INNER JOIN generos ON musicas.id_genero = generos.id_genero
            WHERE musicas.id_user = '{$_SESSION['id_user']}'";

        $resultado_musicas = mysqli_query($conexao, $sql_musicas);

        if (mysqli_num_rows($resultado_musicas) > 0):
          echo "<ul class='space-y-6'>";
          while ($musica = mysqli_fetch_assoc($resultado_musicas)):
            $tempo=tempo_relativo($musica["criado_em"]);
        
            echo "
            <li class='p-4 bg-white border border-pink-200 rounded-xl shadow hover:shadow-md hover:scale-[1.01] transition duration-300'>
              <div class='flex justify-between items-start gap-4'>
                <img src=' $musica[imagem_musica] ' alt='Capa da música'
                  class='w-20 h-20 rounded-lg object-cover border border-pink-300 shadow-sm'>
                <div class='flex-1'>
                  <p class='text-lg font-bold text-pink-600'> $musica[nome_musica] </p>
                  <p class='text-sm text-gray-600'>Álbum: <span class='text-pink-500 font-medium'> $musica[nome_album] </span> | Gênero: <span class='text-pink-500 font-medium'> $musica[nome_genero] </span></p>
                  <p class='text-xs text-gray-400 mt-1'>Adicionada:  $tempo </p>
                  <div class='tinymce-content mt-2'> $musica[descricao_musica] </div>
                </div>
                <div class='flex flex-col items-end gap-2'>
                  <a  href='editar_musica.php?id=$musica[id_musica] ' class='icon-btn bg-pink-100 hover:bg-pink-200 text-pink-600'>
                    <i class='fa-solid fa-pen'></i>
                  </a>
                  <button onclick='apagamusica($musica[id_musica] )' class='icon-btn bg-pink-100 hover:bg-pink-200 text-pink-600'>
                    <i class='fa-solid fa-trash'></i>
                  </button>
                  <span class='text-xs font-bold text-pink-500 bg-pink-50 border border-pink-200 px-2 py-1 rounded-lg self-start whitespace-nowrap'>
                    # $musica[numero_musica]
                  </span>
                </div>
              </div>
            </li>
            ";
         endwhile; echo "</ul>"; else: 
          echo "  <p class='text-center text-gray-500 italic'>Nenhuma música adicionada ainda.</p>";
       endif; 
     echo" </div>

      <div class='bg-white/80 backdrop-blur-md rounded-2xl shadow-lg border border-pink-200 p-6'>
        <h2 class='text-2xl font-bold text-pink-600 mb-4 text-center'>Músicas favoritas</h2>
        ";
        
      include_once 'tempo_relativo.php';
        $sql_favoritos = "SELECT 
              favoritos.id_favorito, musicas.id_musica, musicas.nome_musica, musicas.numero_musica,
              musicas.imagem_musica, musicas.descricao_musica, musicas.criado_em,
              albuns.nome_album, generos.nome_genero, usuarios.user_user, usuarios.id_user
            FROM favoritos
            INNER JOIN musicas ON favoritos.id_musica = musicas.id_musica
            INNER JOIN albuns ON musicas.id_album = albuns.id_album
            INNER JOIN generos ON musicas.id_genero = generos.id_genero
            INNER JOIN usuarios ON musicas.id_user = usuarios.id_user
            WHERE favoritos.id_user = '{$_SESSION['id_user']}'";

        $resultado_favoritos = mysqli_query($conexao, $sql_favoritos);

        if (mysqli_num_rows($resultado_favoritos) > 0):
          echo "<ul class='space-y-6'>";
          while ($favorito = mysqli_fetch_assoc($resultado_favoritos)):
            $tempo=tempo_relativo($favorito["criado_em"]);
        echo "
            <li class='p-4 bg-white border border-pink-200 rounded-xl shadow hover:shadow-md hover:scale-[1.01] transition duration-300'>
              <div class='flex justify-between items-start gap-4'>
                <img src=' $favorito[imagem_musica] ' alt='Capa da música'
                  class='w-20 h-20 rounded-lg object-cover border border-pink-300 shadow-sm'>
                <div class='flex-1'>
                  <p class='text-lg font-bold text-pink-600'> $favorito[nome_musica] </p>
                  <p class='text-sm text-gray-600'>
                    Autor: <a href='listar_outro_user.php?id_user= $favorito[id_user] ' class='text-pink-500 font-medium'> $favorito[user_user] </a> |
                    Álbum: <span class='text-pink-500 font-medium'> $favorito[nome_album] </span> |
                    Gênero: <span class='text-pink-500 font-medium'> $favorito[nome_genero] </span>
                  </p>
                  <p class='text-xs text-gray-400 mt-1'>Adicionada  $tempo </p>
                  <div class='tinymce-content mt-2'> $favorito[descricao_musica] </div>
                </div>
                <span class='text-xs font-bold text-pink-500 bg-pink-50 border border-pink-200 px-2 py-1 rounded-lg self-start whitespace-nowrap'>
                  # $favorito[numero_musica] 
                </span>
              </div>
            </li>
            ";
         endwhile; echo "</ul>"; else: 
          echo "  <p class='text-center text-gray-500 italic'>Nenhuma música favorita ainda.</p>";
       endif; 
      echo "</div>
";
   else: 
      echo "
      <div class='flex flex-col items-center justify-center mt-6 p-8 bg-white/70 rounded-2xl text-center border border-pink-200 shadow-lg'>
        <i class='fa-solid fa-triangle-exclamation text-pink-500 text-4xl mb-4'></i>
        <p class='text-xl font-semibold text-pink-600 mb-2'>Você não está logado!</p>
        <p class='text-gray-500 mb-6'>Faça login para cadastrar suas músicas favoritas.</p>
        <a href='logar.php'
          class='px-6 py-3 bg-pink-500 hover:bg-pink-600 text-white rounded-lg shadow transition duration-300'>
          Ir para Login
        </a>
      </div>
      ";
   endif; ?>