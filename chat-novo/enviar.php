<?php
session_start();
include('../conexao.php');

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    if (!isset($_SESSION['email'], $_POST['mensagem'], $_POST['remetente_id'], $_POST['remetente_tipo'])) {
        echo "Erro: Dados insuficientes.";
        exit();
    }

    $mensagem = trim($_POST['mensagem']);
    $remetente_id = intval($_POST['remetente_id']);
    $remetente_tipo = $_POST['remetente_tipo'];

    if ($mensagem === "") {
        echo "Erro: Mensagem vazia.";
        exit();
    }

    // Inserir mensagem na tabela
    $query = "INSERT INTO mensagens (remetente_id, remetente_tipo, mensagem) 
              VALUES (?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("iss", $remetente_id, $remetente_tipo, $mensagem);

    if ($stmt->execute()) {
        echo "Mensagem enviada.";
    } else {
        echo "Erro ao enviar mensagem.";
    }
}
?>
