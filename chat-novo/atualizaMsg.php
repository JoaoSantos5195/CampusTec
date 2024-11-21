<?php
session_start();
include('../conexao.php');

if (!isset($_SESSION['email'], $_SESSION['tipo_usuario'])) {
    echo "Erro: Usuário não logado.";
    exit();
}

$tipo_usuario = $_SESSION['tipo_usuario'];

// Consultar mensagens no banco
$query = "SELECT m.mensagem, m.data_envio, 
                 r.nomeCompleto AS remetente_nome, 
                 d.nomeCompleto AS destinatario_nome
          FROM mensagens m
          LEFT JOIN usuarios r ON m.remetente_id = r.id AND m.remetente_tipo = 'candidato'
          LEFT JOIN recrutadores d ON m.remetente_id = d.id AND m.remetente_tipo = 'recrutador'
          ORDER BY m.data_envio ASC";
$result = $conn->query($query);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<p><strong>" . htmlspecialchars($row['remetente_nome'] ?? 'Desconhecido') . ":</strong> " . 
             htmlspecialchars($row['mensagem']) . " <em>(" . $row['data_envio'] . ")</em></p>";
    }
} else {
    echo "Nenhuma mensagem ainda.";
}
?>
