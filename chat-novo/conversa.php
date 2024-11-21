<?php
include('../conexao.php');
include('../header_candidato.php');
include('processaConexao.php');
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat</title>
    <link rel="stylesheet" href="chatCSS/style.css">
</head>

<body>
    <h1>Chat - Usuário: <?php echo htmlspecialchars($usuario_nome); ?></h1>

    <form id="form-mensagem">
        <input type="text" name="mensagem" id="mensagem" placeholder="Digite sua mensagem" required>
        <input type="hidden" name="remetente_id" value="<?php echo $usuario_id; ?>">
        <input type="hidden" name="remetente_tipo" value="<?php echo $tipo_usuario; ?>">
        <button type="submit">Enviar</button>
    </form>

    <div id="chat">
        <!-- Mensagens aparecerão aqui -->
    </div>

    <script>
        document.getElementById("form-mensagem").addEventListener("submit", function(e) {
            e.preventDefault();

            const mensagemInput = document.getElementById("mensagem");
            const mensagem = mensagemInput.value.trim();
            const remetenteId = document.querySelector("input[name='remetente_id']").value;
            const remetenteTipo = document.querySelector("input[name='remetente_tipo']").value;

            if (!mensagem) {
                alert("Digite uma mensagem antes de enviar!");
                return;
            }

            fetch("enviar.php", {
                method: "POST",
                headers: {
                    "Content-Type": "application/x-www-form-urlencoded"
                },
                body: `mensagem=${encodeURIComponent(mensagem)}&remetente_id=${encodeURIComponent(remetenteId)}&remetente_tipo=${encodeURIComponent(remetenteTipo)}`
            }).then(response => {
                if (!response.ok) {
                    alert("Erro ao enviar mensagem.");
                }
                mensagemInput.value = "";
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

        // Atualizar mensagens a cada 2 segundos
        setInterval(carregarMensagens, 2000);
        carregarMensagens();
    </script>
</body>

</html>