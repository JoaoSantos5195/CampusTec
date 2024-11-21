<?php
session_start();
include('../conexao.php');

if (!isset($_SESSION['email'])) {
    echo ('DEU MERDA');
}
?>

<link rel="stylesheet" href="chatCSS/style.css">


<form id="form-mensagem" action="enviar.php">
    <input type="text" name="mensagem" id="mensagem" placeholder="Digite sua mensagem" required>
    <button type="submit">Enviar</button>
</form>

<div id="chat">
    <!-- Mensagens aparecerão aqui -->
</div>

<script>
    document.getElementById("form-mensagem").addEventListener("submit", function(e) {
        e.preventDefault();

        const mensagem = document.getElementById("mensagem").value;

        fetch("enviar.php", {
            method: "POST",
            headers: {
                "Content-Type": "application/x-www-form-urlencoded"
            },
            body: "mensagem=" + encodeURIComponent(mensagem)
        }).then(() => {
            document.getElementById("mensagem").value = "";
            carregarMensagens();
        });
    });

    function carregarMensagens() {
        fetch("atualizaMsg.php")
            .then(response => response.text())
            .then(data => {
                document.getElementById("chat").innerHTML = data;
            });
    }

    // Atualiza as mensagens a cada 2 segundos
    setInterval(carregarMensagens, 2000);
    carregarMensagens();
</script>