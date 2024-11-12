<?php
session_start();
include('conexao.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $recruiterName = trim($_POST['recruiter_name']); // Campo para buscar pelo nome do recrutador
    
    // Verificar se o recrutador existe no banco de dados
    $stmt = $conn->prepare("SELECT id FROM recrutadores WHERE nomeCompleto = ?");
    $stmt->bind_param('s', $recruiterName);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        $recruiter = $result->fetch_assoc();
        $_SESSION['chat_with_recruiter_id'] = $recruiter['id']; // Salva o ID do recrutador com quem vai conversar
        header('Location: chat.php');
        exit();
    } else {
        $error_message = "Recrutador não encontrado!";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pré-chat com Recrutador</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=MuseoModerno:ital,wght@0,100..900;1,100..900&family=Nova+Square&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Poppins", sans-serif;
        }

        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: linear-gradient(180deg, #000000 0%, #53884B 100%);
            color: white;
        }

        h2 {
            color: #fff;
            text-align: center;
            margin-bottom: 20px;
        }

        form {
            background-color: rgba(0, 0, 0, 0.8);
            padding: 20px;
            border-radius: 15px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.5);
            width: 100%;
            max-width: 400px;
        }

        label {
            font-size: 1.1em;
            margin-bottom: 10px;
            display: block;
            color: #fff;
        }

        input[type="text"] {
            width: 100%;
            padding: 10px;
            border-radius: 8px;
            border: none;
            margin-bottom: 20px;
            font-size: 1em;
            background-color: #f2f2f2;
        }

        button {
            width: 100%;
            padding: 12px;
            border: none;
            border-radius: 8px;
            background-color: #53884B;
            color: white;
            font-size: 1.1em;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #41703b;
        }

        p {
            text-align: center;
            color: red;
            margin-top: 10px;
        }
    </style>
</head>
<body>

    <form method="POST">
        <h2>Entrar em uma Conversa com Recrutador</h2>
        
        <?php if (isset($error_message)): ?>
            <p><?= htmlspecialchars($error_message) ?></p>
        <?php endif; ?>

        <label for="recruiter_name">Digite o nome do recrutador que deseja conversar:</label>
        <input type="text" name="recruiter_name" id="recruiter_name" required>

        <button type="submit">Entrar no Chat</button>
    </form>

</body>
</html>
