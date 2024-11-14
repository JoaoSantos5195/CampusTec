<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

session_start(); // Inicia a sessão para acessar os dados do usuário logado

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
            echo '<div class="vaga">'; // Mudança de classe para "usuario"
            echo '<h2>Nome: ' . htmlspecialchars($usuario['nomeCompleto']) . '</h2>';
            echo '<p>Email: ' . htmlspecialchars($usuario['emailPessoal']) . '</p>';
            echo '<p>Curso: ' . htmlspecialchars($usuario['curso']) . '</p>';
            echo '<p>Telefone: ' . htmlspecialchars($usuario['numeroTel']) . '</p>';
            // Formulário para enviar o ID do usuário
            echo '<form method="post">';
            echo '<input type="hidden" name="id" value="' . $usuario['id'] . '">'; // Envia o ID do usuário via POST
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

$filter = isset($_GET['filter']) ? $_GET['filter'] : '';

// Construa a query com base no filtro selecionado
$query = "SELECT * FROM usuarios";  // Nome da sua tabela de candidatos

switch ($filter) {
    case 'curriculo':
        $query .= " WHERE curriculo IS NOT NULL";  // Exemplo: Verificar se existe um currículo
        break;

    case 'area':
        $query .= " WHERE area IS NOT NULL";  // Exemplo: Verificar se a área está cadastrada
        // Talvez você precise adaptar esta consulta dependendo de como as áreas estão armazenadas.
        break;

    case 'soft_skills':
        $query .= " WHERE biografia LIKE '%soft skills%'";  // Exemplo: Verificar se a biografia contém "soft skills"
        break;

    case 'email_institucional':
        $query .= " WHERE email LIKE '%@etec.sp.gov.br'";  // Exemplo: Verificar se o e-mail é institucional
        break;
}

// Execute a consulta no banco de dados
$result = mysqli_query($conn, $query);

// Exiba os candidatos filtrados
if ($result && mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<div class='vaga'>";
        echo "<h2>{$row['nome']}</h2>";  // Exemplo: Exibindo o nome do candidato
        echo "<p>Área: {$row['area']}</p>";
        echo "<p>Biografia: {$row['biografia']}</p>";
        echo "<p>E-mail: {$row['email']}</p>";
        echo "</div>";
    }
} else {
    echo "<p>Nenhum candidato encontrado.</p>";
}


// Fecha a conexão
$conn->close();
?>
