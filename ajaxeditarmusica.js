tinymce.init({
    selector: '#descricao_musica', // ID do textarea
    height: 300,
    plugins: 'advlist autolink lists link image charmap preview anchor',
    toolbar: 'undo redo | formatselect | bold italic backcolor | \
              alignleft aligncenter alignright alignjustify | \
              bullist numlist outdent indent | removeformat | help',
    menubar: false
  });
async function editarmusica(id){
    const url = "editar_musica_back.php"+ id;
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