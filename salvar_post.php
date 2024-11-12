<?php
session_start();
include 'conexao.php';

$usuario_id = $_SESSION['usuario_id'];
$post_id = $_POST['post_id'];

$sql = "INSERT INTO posts_salvos (usuario_id, post_id) VALUES (?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ii", $usuario_id, $post_id);
$stmt->execute();

echo "Postagem salva com sucesso!";
?>
