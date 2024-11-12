<?php
session_start();
include('conexao.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];  // Pode ser email pessoal ou institucional
    $password = $_POST['password'];

    // Usando prepared statements para prevenir SQL injection
    $stmt = $conn->prepare("SELECT id, nomeCompleto, emailPessoal, emailInstitucional, senha FROM usuarios WHERE emailPessoal=? OR emailInstitucional=?");
    $stmt->bind_param("ss", $email, $email);  // A pesquisa funciona com qualquer dos dois emails
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if ($user && password_verify($password, $user['senha'])) {
        // Armazenar o ID do usuário e outros dados na sessão
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['nome'] = $user['nomeCompleto'];
        $_SESSION['email'] = $user['emailPessoal'];  // Ou pode armazenar o emailInstitucional, conforme sua necessidade

        // Redirecionar para a página inicial do chat ou perfil
        header('Location: pre_chat.php');
        exit();
    } else {
        echo "Email ou senha incorretos!";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=MuseoModerno:ital,wght@0,100..900;1,100..900&family=Nova+Square&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900&display=swap');
        
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

        form {
            background-color: rgba(0, 0, 0, 0.8);
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.5);
            width: 100%;
            max-width: 400px;
        }

        input {
            width: 100%;
            padding: 12px;
            margin-bottom: 20px;
            border-radius: 8px;
            border: none;
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

        h2 {
            text-align: center;
            color: #fff;
            margin-bottom: 20px;
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
        <h2>Login</h2>

        <?php if (isset($error_message)): ?>
            <p><?= htmlspecialchars($error_message) ?></p>
        <?php endif; ?>

        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Senha" required>
        <button type="submit">Login</button>
    </form>

</body>
</html>
