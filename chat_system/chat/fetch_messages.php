<?php
session_start();
include('conexao.php');

if (!isset($_SESSION['user_id'])) {
    echo "Usuário não autenticado";
    exit();
}

$user_id = $_SESSION['user_id'];
$user_to = isset($_GET['user_to']) ? intval($_GET['user_to']) : 0;

if ($user_to === 0) {
    echo "Destinatário inválido";
    exit();
}

// Buscar todas as mensagens entre o usuário logado e o destinatário
$sql = "SELECT * FROM messages WHERE (user_from='$user_id' AND user_to='$user_to') OR (user_from='$user_to' AND user_to='$user_id') ORDER BY created_at ASC";
$result = mysqli_query($conn, $sql);

// Exibir as mensagens
while ($row = mysqli_fetch_assoc($result)) {
    echo "<p><strong>" . ($row['user_from'] == $user_id ? 'Você' : 'Usuário ' . $row['user_from']) . ":</strong> " . htmlspecialchars($row['message']) . "</p>";
}
?>
