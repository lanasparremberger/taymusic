async function lerMural() {
    const url = "mscprint2.php";
    try {
        const response = await fetch(url);
        if (!response.ok) {
            document.getElementById('conteudo').innerHTML = "Houve um erro ao recuperar os dados remotos: "+ await response.statusText;
        }
        document.getElementById('conteudo').innerHTML = await response.text();
    } catch (error) {
        document.getElementById('conteudo').innerHTML = "Houve um erro ao recuperar os dados remotos:" + error;
    }
   
}

lerMural();
// Recarrega a cada 10000 milissegundo (10 segundos)
setInterval("lerMural()", 10000);