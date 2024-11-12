<?php
include('conexao.php');
session_start();

// Verifica se as sessões do usuário e recrutador estão ativas
if (!isset($_SESSION['usuario']) || !isset($_SESSION['recrutador'])) {
    header("Location: pre_chat.php");
    exit();
}

// Atribui as variáveis de sessão corretamente antes de utilizá-las
$usuario = $_SESSION['usuario'];
$recrutador = $_SESSION['recrutador'];

// Conexão com o banco de dados (garantir que o arquivo de conexão está correto)
$mysqli = new mysqli("localhost", "root", "", "campustec");

// Verifica se há erro de conexão
if ($mysqli->connect_error) {
    die("Erro na conexão: " . $mysqli->connect_error);
}

// Consulta as mensagens entre o usuário e o recrutador
$sql = "SELECT * FROM chats WHERE (remetente_id = ? AND destinatario_id = ?) OR (remetente_id = ? AND destinatario_id = ?) ORDER BY timestamp ASC";
$stmt = $mysqli->prepare($sql);

// Garante que as variáveis de $usuario e $recrutador tenham os IDs corretos
$stmt->bind_param("iiii", $usuario['id'], $recrutador['id'], $recrutador['id'], $usuario['id']);
$stmt->execute();
$result = $stmt->get_result();

// Armazena as mensagens em um array
$mensagens = [];
while ($row = $result->fetch_assoc()) {
    $mensagens[] = $row;
}
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Chat com Recrutador</title>
  <link rel="stylesheet" href="css/chat.css">
  <link href="https://fonts.googleapis.com/css2?family=Nova+Square&display=swap" rel="stylesheet">
</head>
<body>
<header>
    <div>
        <a href="home.html"><img src="imagens/mascote.png" id="logo" alt="CampusTec Logo"></a>
    <div class="logo">
        <div class="center">
            <div class="menu">
                <a href="#" id="menu-btn"><img src="imagens/menuBranco.png" id="menu" alt="Menu"></a>
                <a href="perfilUsuario.php"><img src="imagens/perfilBranco.png" id="perfil" alt="Perfil"></a>
                <a href="#"><img src="imagens/notificacaoBranco.png" id="notificacao" alt="Notificações"></a>
            </div>
        </div>
</header>

<div class="main">
    <div class="chat-container">
        <!-- Div superior com o nome do recrutador -->
        <div class="chat-header">
            <h3><?php echo $recrutador['nomeCompleto']; ?></h3>
        </div>

        <!-- Área para visualizar mensagens -->
        <div class="chat-messages" id="chat-messages">
            <?php foreach ($mensagens as $mensagem): ?>
                <div class="message <?php echo $mensagem['remetente_id'] == $usuario['id'] ? 'message-sent' : 'message-received'; ?>">
                    <p><?php echo htmlspecialchars($mensagem['mensagem']); ?></p>
                    <span class="message-time"><?php echo date('H:i', strtotime($mensagem['timestamp'])); ?></span>
                </div>
            <?php endforeach; ?>
        </div>

        <!-- Campo de input para enviar novas mensagens -->
        <div class="chat-input">
            <input type="text" id="message-input" placeholder="Digite sua mensagem...">
            <button id="send-btn"><img src="imagens/send.png" id="send"></button>
        </div>
    </div>
</div>

<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
<script>
document.getElementById('send-btn').addEventListener('click', function() {
    const inputField = document.getElementById('message-input');
    const messageText = inputField.value.trim();

    if (messageText !== "") {
        // Adiciona a mensagem no chat
        const messageDiv = document.createElement('div');
        messageDiv.classList.add('message', 'message-sent');
        messageDiv.innerHTML = `<p>${messageText}</p><span class="message-time">${getCurrentTime()}</span>`;
        
        document.getElementById('chat-messages').appendChild(messageDiv);
        inputField.value = '';
        document.getElementById('chat-messages').scrollTop = document.getElementById('chat-messages').scrollHeight;

        // Envia a mensagem para o backend via AJAX para salvar no banco
        console.log("Enviando mensagem ao servidor...");
        sendMessageToServer(messageText);
    } else {
        console.log("Mensagem vazia, não enviada.");
    }
});

function getCurrentTime() {
    const now = new Date();
    return now.getHours() + ':' + (now.getMinutes() < 10 ? '0' : '') + now.getMinutes();
}

function sendMessageToServer(message) {
    const xhr = new XMLHttpRequest();
    xhr.open('POST', 'salvar_mensagem.php', true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    
    // Enviar mensagem e IDs do remetente e destinatário
    const remetenteId = <?php echo $usuario['id']; ?>;
    const destinatarioId = <?php echo $recrutador['id']; ?>;
    
    xhr.send(`mensagem=${encodeURIComponent(message)}&remetente_id=${remetenteId}&destinatario_id=${destinatarioId}`);

    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            console.log("Mensagem salva no banco com sucesso!");
        } else if (xhr.readyState == 4) {
            console.error("Erro ao salvar mensagem no banco: " + xhr.statusText);
        }
    };
}

</script>

</body>
</html>
