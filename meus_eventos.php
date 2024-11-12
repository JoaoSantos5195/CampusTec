<?php
session_start();
include('conexao.php');

// Verificar se o usuário está logado
if (!isset($_SESSION['email'])) {
    die("Erro: usuário não está logado.");
}

$user_email = $_SESSION['email'];

// Buscar o ID do usuário baseado no email
$sql_buscar_usuario = "SELECT id FROM usuarios WHERE emailInstitucional = ? OR emailPessoal = ?";
$stmt = $conn->prepare($sql_buscar_usuario);
$stmt->bind_param("ss", $user_email, $user_email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    die("Erro: Usuário não encontrado.");
}

$user = $result->fetch_assoc();
$user_id = $user['id']; // ID do usuário encontrado

// Buscar os eventos salvos pelo usuário
$sql = "SELECT e.id, e.nome, e.data, e.local FROM eventos e
        JOIN eventos_salvos es ON e.id = es.evento_id
        WHERE es.user_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

$conn->close();
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meus Eventos Salvos</title>
    <link rel="stylesheet" href="css/meus_eventos.css">
</head>

<body>
    <header>
        <div>
            <a href="home.html"><img src="imagens/mascote.png" id="logo" alt="CampusTec Logo"></a>
        </div>
        <div class="logo">
            <div class="center">
                <div class="menu">
                    <a href="#"><img src="imagens/notificacaoBranco.png" id="notificacao" alt="Notificações"></a>
                    <a href="perfilRecrutador.php"><img src="imagens/perfilBranco.png" id="perfil" alt="Perfil"></a>
                    <a href="#" id="menu-btn"><img src="imagens/menuBranco.png" id="menu" alt="Menu"></a>
                </div>
            </div>
        </div>
    </header>

    <div id="side-menu" class="side-menu">
        <a href="javascript:void(0)" class="close-btn" onclick="closeMenu()">&times;</a>
        <a href="#">Tutorial</a>
        <a href="curriculo.html">Criador de currículo</a>
        <a href="recrutadores.html">Recrutadores</a>
        <a href="visualizar_evento.php">Eventos</a>
        <a href="editar-perfil.php">Configurações</a>
        <a href="logout.php">Logout</a>
        <a href="sobre_nos.html">Sobre Nós</a>
    </div>

    <div class="eventos-container">
        <?php
        // Exibir os eventos salvos
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<div class='event'>";
                echo "<h3>" . htmlspecialchars($row["nome"]) . "</h3>";
                echo "<p>Data: " . htmlspecialchars($row["data"]) . "</p>";
                echo "<p>Local: " . htmlspecialchars($row["local"]) . "</p>";
                echo "<form method='POST' action='remover_evento.php' style='display:inline;'>
                    <input type='hidden' name='evento_id' value='" . $row['id'] . "'>
                    <button type='submit'>Remover</button>
                  </form>";
                echo "</div>";
            }
        } else {
            echo "<p style='color: white; font-size: 30px; text-align: center;'>Nenhum evento salvo.</p>";
        }

        ?>
    </div>

    <script>
        function openMenu() {
            document.getElementById("side-menu").style.width = "250px";
        }

        function closeMenu() {
            document.getElementById("side-menu").style.width = "0";
        }

        document.getElementById("menu-btn").onclick = openMenu;
    </script>
</body>

</html>