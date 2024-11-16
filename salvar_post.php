<?php
session_start();
include 'conexao.php';

// Verifica se as variáveis necessárias estão definidas
if (isset($_SESSION['usuario_id']) && isset($_POST['post_id'])) {
    $usuario_id = $_SESSION['usuario_id'];
    $post_id = $_POST['post_id'];

    // Prepara a query
    $sql = "INSERT INTO posts_salvos (usuario_id, post_id) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);

    // Verifica se a preparação da query foi bem-sucedida
    if ($stmt) {
        $stmt->bind_param("ii", $usuario_id, $post_id);
        if ($stmt->execute()) {
            echo "Postagem salva com sucesso!";
        } else {
            echo "Erro ao salvar a postagem: " . $stmt->error;
        }
        $stmt->close();
    } else {
        echo "Erro ao preparar a query: " . $conn->error;
    }
} else {
    echo "Erro: Dados insuficientes para salvar a postagem.";
}
