function confirmarDelete(nome, url) {
    const mensagem = `Tem certeza que deseja deletar -> ${nome}`;
    if (window.confirm(mensagem)) {
        window.location.href = url;
    }
}

function cancelarParaIndex() {
    window.location.href = 'index.php';
}


