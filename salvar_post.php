<?php
session_start();
include 'conexao.php';

<<<<<<< Updated upstream
// Verifica se as variáveis necessárias estão definidas
if (isset($_SESSION['usuario_id']) && isset($_POST['post_id'])) {
    $usuario_id = $_SESSION['usuario_id'];
    $post_id = $_POST['post_id'];

    // Prepara a query
    $sql = "INSERT INTO posts_salvos (usuario_id, post_id) VALUES (?, ?)";
=======
if (isset($_SESSION['email']) && isset($_POST['post_id'])) {
    $email = $_SESSION['email'];
    $post_id = $_POST['post_id'];

    // Identificar o usuário (candidato ou recrutador)
    $sql = "
        SELECT id, 'usuario' AS tipo_autor FROM usuarios WHERE emailPessoal = ?
        UNION
        SELECT id, 'recrutador' AS tipo_autor FROM recrutadores WHERE emailPessoal = ?
    ";
>>>>>>> Stashed changes
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $email, $email);
    $stmt->execute();
    $result = $stmt->get_result();

<<<<<<< Updated upstream
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
=======
    if ($result->num_rows > 0) {
        $user_data = $result->fetch_assoc();
        $usuario_id = $user_data['id'];
        $tipo_autor = $user_data['tipo_autor'];

        // Verificar se o post existe
        $sql_check_post = "SELECT post_id FROM posts WHERE post_id = ?";
        $stmt_check_post = $conn->prepare($sql_check_post);
        $stmt_check_post->bind_param("i", $post_id);
        $stmt_check_post->execute();

        if ($stmt_check_post->get_result()->num_rows === 0) {
            die("Erro: Postagem inválida.");
        }

        // Inserir no banco, levando em conta o tipo do autor
        $sql_save = "
            INSERT INTO posts_salvos (usuario_id, post_id, tipo_autor) 
            VALUES (?, ?, ?)
        ";
        $stmt_save = $conn->prepare($sql_save);
        $stmt_save->bind_param("iis", $usuario_id, $post_id, $tipo_autor);

        if ($stmt_save->execute()) {
            echo "Postagem salva com sucesso!";
        } else {
            echo "Erro ao salvar a postagem: " . $stmt_save->error;
        }

        $stmt_save->close();
    } else {
        echo "Erro: Usuário não encontrado.";
>>>>>>> Stashed changes
    }

    $stmt->close();
} else {
    echo "Erro: Dados insuficientes para salvar a postagem.";
}
<<<<<<< Updated upstream
=======

$conn->close();
>>>>>>> Stashed changes
