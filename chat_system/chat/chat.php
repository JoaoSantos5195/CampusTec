<?php
session_start();
include('conexao.php');

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

if (!isset($_SESSION['chat_with_recruiter_id'])) {
    header('Location: pre_chat.php');
    exit();
}

$user_id = $_SESSION['user_id'];
$user_to = $_SESSION['chat_with_recruiter_id']; // ID do usuário com quem deseja conversar

// Buscar todas as mensagens entre o usuário logado e o destinatário
$sql = "SELECT * FROM messages WHERE (user_from='$user_id' AND user_to='$user_to') OR (user_from='$user_to' AND user_to='$user_id') ORDER BY created_at ASC";
$result = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=MuseoModerno:ital,wght@0,100..900;1,100..900&family=Nova+Square&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Poppins", sans-serif;
            font-weight: 600;
        }

        body, html {
            height: 100%;
        }

        h2 {
            color: #fff;
            text-align: center;
            margin-bottom: 20px;
            font-family: "Nova Square", sans-serif;
        }
        #back{
            text-decoration: none;
            color: #53884B;
        }
        .center {
            background: linear-gradient(180deg, #000000 0%, #53884B 100%);
            height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        #chat-box {
            width: 80%;
            max-width: 800px;
            height: 400px;
            border: 2px solid #ccc;
            border-radius: 10px;
            padding: 20px;
            background-color: #f4f4f4;
            overflow-y: scroll;
            box-shadow: 0px 10px 40px #00000056;
            margin-bottom: 20px;
        }

        #message-input {
            width: 80%;
            max-width: 800px;
            display: flex;
            justify-content: space-between;
            position: relative;
        }

        input[type="text"] {
            width: 100%;
            padding: 15px;
            border-radius: 10px;
            border: none;
            background-color: #fff;
            box-shadow: 0px 10px 40px #00000056;
            outline: none;
            font-size: 14px;
        }

        button {
            background-color: #53884B;
            color: #fff;
            border: none;
            border-radius: 60%;
            width: 50px;
            height: 50px;
            margin-left: 10px;
            background-image: url('send.png');
            background-size: 24px;
            background-repeat: no-repeat;
            background-position: center;
            cursor: pointer;
            box-shadow: 0px 10px 40px #53884B;
        }

        p {
            margin-bottom: 10px;
            font-size: 14px;
        }

        p strong {
            color: #53884B;
        }

        p.received {
            text-align: left;
            color: #333;
        }

        p.sent {
            text-align: right;
            color: #53884B;
        }
    </style>

    <!-- Incluir jQuery (para facilitar o uso de AJAX) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
<div class="center">
    <h2>Chat</h2>
        <a href="../../recrutadores.php" id="back">Voltar para Recrutadores</a>

    <div id="chat-box">
        <!-- Exibir mensagens do banco de dados -->
        <?php while ($row = mysqli_fetch_assoc($result)) : ?>
            <p class="<?= $row['user_from'] == $user_id ? 'sent' : 'received' ?>">
                <strong><?= $row['user_from'] == $user_id ? 'Você' : 'Usuário ' . $row['user_from'] ?>:</strong> <?= htmlspecialchars($row['message']) ?>
            </p>
        <?php endwhile; ?>
    </div>

    <div id="message-input">
        <input type="text" id="message" placeholder="Digite sua mensagem">
        <button onclick="sendMessage()"></button>
    </div>

    <script>
        // Conectar ao WebSocket
        const socket = new WebSocket('ws://localhost:5500');  // Verifique o endereço do WebSocket

        // Aguardar a conexão ser aberta
        socket.onopen = function() {
            console.log('Conectado ao WebSocket.');
        };

        // Enviar mensagem via AJAX para o banco de dados e também para o WebSocket
        function sendMessage() {
            const messageInput = document.getElementById('message').value;
            const userTo = <?= $user_to ?>; // ID do usuário destinatário

            if (messageInput.trim() === '') {
                alert("A mensagem não pode estar vazia.");
                return;
            }

            // Enviar a mensagem para o banco de dados via AJAX
            $.post('send_message.php', { message: messageInput, user_to: userTo }, function(response) {
                console.log('Resposta do backend:', response); // Exibe a resposta do backend no console
                
                // Append a própria mensagem no chat-box
                $('#chat-box').append('<p class="sent"><strong>Você:</strong> ' + messageInput + '</p>');
                document.getElementById('message').value = ''; // Limpar o campo de entrada
            }).fail(function(jqXHR, textStatus, errorThrown) {
                console.error('Erro ao enviar mensagem para o backend:', textStatus, errorThrown);
            });

            // Enviar a mensagem pelo WebSocket
            const messageData = {
                message: messageInput,
                user_from: <?= $user_id ?>,
                user_to: userTo
            };

            // Verifique se a conexão está aberta antes de enviar
            if (socket.readyState === WebSocket.OPEN) {
                socket.send(JSON.stringify(messageData));
            } else {
                console.error('WebSocket não está conectado.');
            }
        }

        // Receber mensagens do WebSocket
        socket.onmessage = function(event) {
            const messageData = JSON.parse(event.data);
            const messageUserFrom = messageData.user_from === <?= $user_id ?> ? 'Você' : 'Usuário ' + messageData.user_from;
            
            // Append a nova mensagem no chat-box
            $('#chat-box').append('<p class="received"><strong>' + messageUserFrom + ':</strong> ' + messageData.message + '</p>');
        };

        // Mostrar erros de WebSocket
        socket.onerror = function(error) {
            console.log('WebSocket Error:', error);
        };

        // Fechar conexão WebSocket
        socket.onclose = function() {
            console.log('WebSocket foi desconectado.');
        };

        // Atualizar o chat-box a cada 5 segundos via AJAX (Polling)
        setInterval(function() {
            $.get('fetch_messages.php?user_to=<?= $user_to ?>', function(data) {
                $('#chat-box').html(data); // Atualiza o conteúdo do chat-box com as novas mensagens
            });
        }, 5000);
    </script>
</div>
</body>
</html>
