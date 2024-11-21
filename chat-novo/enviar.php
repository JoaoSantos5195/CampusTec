<?php
session_start();
include('../conexao.php');

if($_SERVER['REQUEST_METHOD'] == "POST"){
    $userEmail = $_SESSION['email'];
    $mensagem = $_POST['mensagem'];

    $query = "INSERT INTO mensagens (usuario_id, mensagem) VALUES (?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("is", $usuario_id, $mensagem);
    $stmt->execute();
}


?>