async function lerperfil() {
    const url = "perfil2.php";
    try {
        const response = await fetch(url);
        if (!response.ok) {
            document.getElementById('conteudo').innerHTML = "Houve um erro ao recuperar os dados remotos: " + await response.statusText;
        }
        document.getElementById('conteudo').innerHTML = await response.text();
    } catch (error) {
        document.getElementById('conteudo').innerHTML = "Houve um erro ao recuperar os dados remotos:" + error;
    }

}


async function apagamusica(id) {
    const url = "apaga_produto.php?id=" + id;
    try {
        const response = await fetch(url);
        if (!response.ok) {
            document.getElementById('conteudo_apaga').innerHTML = "Houve um erro ao recuperar os dados remotos: " + await response.statusText;
        }
        document.getElementById('conteudo_apaga').innerHTML = await response.text();
    } catch (error) {
        document.getElementById('conteudo_apaga').innerHTML = "Houve um erro ao recuperar os dados remotos:" + error;
    }
}
lerperfil();
// Recarrega a cada 10000 milissegundo (10 segundos)
setInterval("lerperfil()", 2000);