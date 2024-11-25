<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['tipo_usuario'])) {
        $_SESSION['tipo_usuario'] = $_POST['tipo_usuario'];
        header("Location: conversa.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seleção de Tipo de Usuário</title>
    <link href="https://fonts.googleapis.com/css2?family=MuseoModerno:ital,wght@0,100..900;1,100..900&family=Nova+Square&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Poppins", sans-serif;
            font-weight: 600;
            font-style: normal;
        }

        html,
        body {
            height: 100%;
            background-color: #ffffff;
            background: rgb(0, 0, 0);
            background: linear-gradient(180deg, rgb(0, 0, 0) 0%, rgba(83, 136, 75, 1) 100%);
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .container {
            text-align: center;
            color: white;
        }

        .header h1 {
            font-size: 2.5rem;
            margin-bottom: 10px;
        }

        .header p {
            font-size: 1rem;
            margin-bottom: 30px;
        }

        .buttons {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-bottom: 30px;
        }

        .buttons button {
            background-color: white;
            color: green;
            border: none;
            padding: 15px 30px;
            border-radius: 10px;
            font-size: 1.2rem;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .buttons button:hover {
            background-color: lightgray;
        }

        .login {
            background-color: white;
            color: black;
            border: none;
            padding: 1px;
            border-radius: 10px;
            font-size: 0.5rem;
            cursor: pointer;
            transition: background-color 0.3s ease;
            position: absolute;
            bottom: 20px;
            left: 20px;
        }

        .login:hover {
            background-color: lightgray;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <h1>Selecione o tipo de usuário:</h1>
        </div>
        <form method="POST" action="">
            <div class="buttons">
                <button type="submit" name="tipo_usuario" value="candidato">Candidato</button>
                <button type="submit" name="tipo_usuario" value="recrutador">Recrutador</button>
            </div>
        </form>
    </div>
</body>

</html>