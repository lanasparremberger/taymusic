<?php
session_start();
include 'conecta.php';
if (isset($_SESSION['user'])) {
    if(isset($_POST["Enviar"])){
    $musica_favorita = htmlspecialchars($_POST["musica_favorita"]);
    $numero_musica = $_POST["numero_musica"];
    $album_musica = $_POST["album_musica"];
    $genero_musica = $_POST["genero_musica"];
    $descricao_musica= $_POST["descricao_musica"];

    $validos = array("jpg", "gif", "png", "jpeg", "webp", "jfif", "jpe", "tiff");
    $ext = strtolower(pathinfo($_FILES['imagem_musica']['name'], PATHINFO_EXTENSION));
    if (in_array($ext, $validos)) {
        $img = $_FILES['imagem_musica'];
        $path = $_FILES['imagem_musica']['name'];
        $extensao = pathinfo($path, PATHINFO_EXTENSION);
        $novo_nome = md5(time()) . ".$extensao";
        $diretorio = "upload/foto_musica/" . $novo_nome;
        if (move_uploaded_file($img['tmp_name'], $diretorio)) {
            $sql = "INSERT INTO musicas (nome_musica, numero_musica, imagem_musica	, id_album	, id_genero, id_user, descricao_musica)
               VALUES ('$musica_favorita', '$numero_musica', '$diretorio', '$album_musica', '$genero_musica', '{$_SESSION['id_user']}', '$descricao_musica');";
            if (mysqli_query($conexao, $sql)) {
                header("Location: mscprint.php");
                exit;
            } else {
                $_SESSION['erro'] = "Erro ao inserir no banco: ";
                header("Location: formmsc.php");
                exit;
            }
        } else {
            $_SESSION['erro'] = "Erro ao mandar a imagem ";
            header("Location: formmsc.php");
            exit;
        }
    } else {
        $_SESSION['erro'] = "Tipo de imagem não suportado ";
        header("Location: formmsc.php");
        exit;
    }
    mysqli_close($conexao);
}else {
    $_SESSION['erro'] = "Preencha o form  ";
    header("Location: formmsc.php");
    exit;
}
} else {
    $_SESSION['erro'] = "Se cadastre antes  ";
    header("Location: logar.php");
    exit;
}

?>