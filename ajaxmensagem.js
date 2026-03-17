async function enviar_mensagem(){
    var url = "recebimentomensagem.php";
    var mensagem = document.getElementById("mensagem").value;

    try {
        const response = await fetch(url, {
            method: 'POST',
            headers: { "Content-Type": "application/json" },
            body: JSON.stringify({'mensagem': mensagem})
        });
        if (!response.ok) {
            document.getElementById('mensagem').innerHTML = "Houve um erro ao recuperar os dados remotos: " + await response.statusText;
        }
        document.getElementById('mensagem').innerHTML = await response.text();
    } catch (error) {
        document.getElementById('mensagem').innerHTML = "Houve um erro ao recuperar os dados remotos:" + error;
    }
}

async function buscaMensagem() {
    url = "retornamensagem.php";

    try {
        const response = await fetch(url);
        if (!response.ok) {
            document.getElementById('chat-conteudo').innerHTML = "Houve um erro ao recuperar os dados remotos: " + await response.statusText;
        }
        document.getElementById('chat-conteudo').innerHTML = await response.text();
            $('#chat-conteudo').scrollTop($('#chat-conteudo')[0].scrollHeight);
    } catch (error) {
        document.getElementById('chat-conteudo').innerHTML = "Houve um erro ao recuperar os dados remotos:" + error;
    }
}
    