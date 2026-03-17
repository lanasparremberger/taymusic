
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Entrar ou Cadastrar</title>

    <?php include 'layouts/header.php';
    if(!isset($_SESSION["user"])){
    ?>

    <main class="flex-1 flex items-center justify-center">
        <div class="max-w-lg w-full mx-auto bg-[#111827] p-10 rounded-2xl shadow-2xl shadow-purple-500/60 border border-pink-400/30 text-center">
            <h1 class="text-3xl font-bold text-pink-500 mb-8">
                Bem-vindo à Plataforma!
            </h1>

            <p class="text-purple-300 mb-6 text-lg">
                Escolha se deseja entrar em sua conta ou se cadastrar para começar:
            </p>

            <div class="flex justify-center items-center gap-8">
                <a href="logar.php"
                    class="bg-pink-500 hover:bg-pink-600 text-white px-6 py-3 rounded-xl shadow-lg shadow-pink-700/50 transition duration-300 text-lg font-medium flex items-center gap-2">
                    <i class="fa-solid fa-arrow-right-to-bracket text-xl"></i> Entrar
                </a>

                <a href="formcad.php"
                    class="bg-sky-500 hover:bg-sky-600 text-white px-6 py-3 rounded-xl shadow-lg shadow-sky-700/50 transition duration-300 text-lg font-medium flex items-center gap-2">
                    <i class="fa-solid fa-user-plus text-xl"></i> Cadastrar
                </a>
            </div>
        </div>
        <?php }else{
            header("Location:index.php");
            }?>
    </main>

</body>

</html>
