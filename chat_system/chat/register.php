<?php
include('conexao.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (username, password) VALUES ('$username', '$password')";
    mysqli_query($conn, $sql);
    
    echo "Usuário cadastrado com sucesso!";
}
?>

<form method="POST">
    <input type="text" name="username" placeholder="Nome de usuário" required>
    <input type="password" name="password" placeholder="Senha" required>
    <button type="submit">Cadastrar</button>
</form>
