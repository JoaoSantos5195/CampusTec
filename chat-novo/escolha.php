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
</head>

<body>
    <h1>Selecione o tipo de usuário:</h1>
    <form method="POST" action="">
        <button type="submit" name="tipo_usuario" value="candidato">Candidato</button>
        <button type="submit" name="tipo_usuario" value="recrutador">Recrutador</button>
    </form>
</body>

</html>