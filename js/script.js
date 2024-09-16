document.querySelector('form').addEventListener('submit', function(event) {
    let nome = document.querySelector('input[name="nome"]').value;
    if (nome === '') {
        alert("Nome é obrigatório!");
        event.preventDefault();
    }
});
