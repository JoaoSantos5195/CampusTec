<?php 
session_start();
include 'conexao.php';

// Verifica se as variáveis necessárias estão definidas
if (isset($_SESSION['email']) && isset($_POST['post_id'])) {
    $email = $_SESSION['email'];
    $post_id = $_POST['post_id'];

    // Identificar se o usuário é 'usuario' ou 'recrutador'
    $sql = "
        SELECT id, 'usuario' AS tipo_autor FROM usuarios WHERE emailPessoal = ?
        UNION
        SELECT id, 'recrutador' AS tipo_autor FROM recrutadores WHERE emailPessoal = ?
    ";
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("ss", $email, $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $user_data = $result->fetch_assoc();
            $usuario_id = $user_data['id'];
            $tipo_autor = $user_data['tipo_autor'];

            // Salvar o post
            $sql_save = "INSERT INTO posts_salvos (usuario_id, post_id) VALUES (?, ?)";
            $stmt_save = $conn->prepare($sql_save);

            if ($stmt_save) {
                $stmt_save->bind_param("ii", $usuario_id, $post_id);
                if ($stmt_save->execute()) {
                    echo "Postagem salva com sucesso!";
                } else {
                    echo "Erro ao salvar a postagem: " . $stmt_save->error;
                }
                $stmt_save->close();
            } else {
                echo "Erro ao preparar a query para salvar o post: " . $conn->error;
            }
        } else {
            echo "Erro: Usuário não encontrado.";
        }

        $stmt->close();
    } else {
        echo "Erro ao preparar a query de identificação do usuário: " . $conn->error;
    }
} else {
    echo "Erro: Dados insuficientes para salvar a postagem.";
}

$conn->close();
?>
