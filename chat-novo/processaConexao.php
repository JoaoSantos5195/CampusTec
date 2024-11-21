<?php
session_start();
include('../conexao.php');

// Verificar se o tipo de usuário foi definido
if (!isset($_SESSION['tipo_usuario'], $_SESSION['email'])) {
    header("Location: escolha.php");
    exit();
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
