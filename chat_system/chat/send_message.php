<?php
session_start();
include('conexao.php');

if (!isset($_SESSION['user_id'])) {
    echo json_encode(['status' => 'error', 'message' => 'Usuário não autenticado.']);
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validar os dados recebidos via AJAX
    $user_from = $_SESSION['user_id']; // Usuário que está enviando a mensagem
    $user_to = isset($_POST['user_to']) ? intval($_POST['user_to']) : 0; // Destinatário
    $message = isset($_POST['message']) ? trim($_POST['message']) : '';

    // Verificações básicas
    if (empty($message)) {
        echo json_encode(['status' => 'error', 'message' => 'A mensagem não pode estar vazia.']);
        exit();
    }

    if ($user_to === 0) {
        echo json_encode(['status' => 'error', 'message' => 'Destinatário inválido.']);
        exit();
    }

    // Preparar a query para inserir a mensagem no banco de dados
    $stmt = $conn->prepare("INSERT INTO messages (user_from, user_to, message, created_at) VALUES (?, ?, ?, NOW())");
    $stmt->bind_param('iis', $user_from, $user_to, $message);

    if ($stmt->execute()) {
        // Mensagem enviada e salva com sucesso
        echo json_encode(['status' => 'success', 'message' => 'Mensagem enviada com sucesso.']);
    } else {
        // Erro ao salvar a mensagem
        echo json_encode(['status' => 'error', 'message' => 'Erro ao enviar mensagem.']);
    }

    $stmt->close();
} else {
    echo json_encode(['status' => 'error', 'message' => 'Método inválido.']);
}
?>
