<?php
include('conexao.php')

// Obtenha o valor do filtro selecionado
$filter = isset($_GET['filter']) ? $_GET['filter'] : '';

// Construa a query com base no filtro selecionado
$query = "SELECT * FROM candidatos";  // Nome da sua tabela de candidatos

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

// Feche a conexão
mysqli_close($conn);
?>
