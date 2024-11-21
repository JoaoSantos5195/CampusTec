<?php
session_start();
include('../conexao.php');

if (isset($_SESSION['email'])) {
    $email = $_SESSION['email'];

    // Busca as mensagens no banco
    $query = "SELECT m.mensagem, u.nomeCompleto, m.data_envio 
              FROM mensagens m 
              JOIN usuarios u ON m.usuario_id = u.id 
              ORDER BY m.data_envio ASC";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<p><strong>" . htmlspecialchars($row['nome']) . ":</strong> " . 
                 htmlspecialchars($row['mensagem']) . " <em>(" . 
                 $row['data_envio'] . ")</em></p>";
        }
    } else {
        echo "Nenhuma mensagem ainda.";
    }
} else {
    echo "Você não está logado.";
}
?>
