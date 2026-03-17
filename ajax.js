async function curtir(id) {
    var url = "curtir.php";

    try {
        const response = await fetch(url, {
            method: 'POST',
            headers: { "Content-Type": "application/json" },
            body: JSON.stringify({id_musica: id})
        });
        if (!response.ok) {
            document.getElementById('mensagem').innerHTML = "Houve um erro ao recuperar os dados remotos: " + await response.statusText;
        }
        document.getElementById('mensagem').innerHTML = await response.text();
    } catch (error) {
        document.getElementById('mensagem').innerHTML = "Houve um erro ao recuperar os dados remotos:" + error;
    }
}
async function descurtir(id) {
    
}
async function curtir_comentario(id) {
    
}
async function descurtir_comentario(id) {
    
}
async function comentar(id) {
    
}
async function descomentar(id) {
    
}
async function favoritar(id) {
    
}
async function desfavoritar(id) {
    
}