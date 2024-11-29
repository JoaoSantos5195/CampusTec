<?php
session_start();
include('../conexao.php');

if (isset($_SESSION['tipo_usuario'])) {
    if ($_SESSION['tipo_usuario'] == 'candidato') {
        include('headerCandidato.php');
    } elseif ($_SESSION['tipo_usuario'] == 'recrutador') {
        include('headerRec.php');
    }
} else {
    echo('deu ruim');
}

$tipo_usuario = $_SESSION['tipo_usuario'];
$email = $_SESSION['email'];

// Buscar informações do usuário logado
$query = "SELECT id, nomeCompleto FROM " .
    ($tipo_usuario === 'candidato' ? 'usuarios' : 'recrutadores') .
    " WHERE emailPessoal = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    echo "Erro: Usuário não encontrado.";
    exit();
}

$usuario = $result->fetch_assoc();
$usuario_id = $usuario['id'];
$usuario_nome = $usuario['nomeCompleto'];
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

    <div class="tudo">
        <div id="chat">
            <!-- Mensagens aparecerão aqui -->
        </div>
        <form id="form-mensagem">
            <input type="text" name="mensagem" id="mensagem" placeholder="Digite sua mensagem" required>
            <input type="hidden" name="remetente_id" value="<?php echo $usuario_id; ?>">
            <input type="hidden" name="remetente_tipo" value="<?php echo $tipo_usuario; ?>">
            <button type="submit">Enviar</button>
        </form>
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