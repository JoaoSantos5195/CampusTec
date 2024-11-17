<?php
session_start(); // Inicia a sessão para acessar os dados do usuário logado

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

include('conexao.php');

// Consulta SQL para selecionar todos os usuários
$sql = "SELECT id, nomeCompleto, emailPessoal, curso, numeroTel FROM usuarios";

// Prepara a consulta
if ($stmt = $conn->prepare($sql)) {
    // Executa a consulta
    $stmt->execute();
    $result = $stmt->get_result();

    // Verifica se há usuários e exibe em blocos
    if ($result->num_rows > 0) {
        while ($usuario = $result->fetch_assoc()) {
            echo '<div class="vaga">';
            echo '<h2>Nome: ' . htmlspecialchars($usuario['nomeCompleto']) . '</h2>';
            echo '<p>Email: ' . htmlspecialchars($usuario['emailPessoal']) . '</p>';
            echo '<p>Curso: ' . htmlspecialchars($usuario['curso']) . '</p>';
            echo '<p>Telefone: ' . htmlspecialchars($usuario['numeroTel']) . '</p>';
            echo '<form method="post">';
            echo '<input type="hidden" name="id" value="' . $usuario['id'] . '">';
            echo '<a href="perfilUsuario_view.php?id=' . $usuario['id'] . '"><button type="button">Visualizar Perfil</button></a>';
            echo '</form>';
            echo '</div>';
        }
    } else {
        echo '<p>Nenhum usuário encontrado.</p>';
    }

    // Fecha a declaração
    $stmt->close();
} else {
    echo 'Erro ao preparar a consulta: ' . $conn->error;
}

// Fecha a conexão
$conn->close();
