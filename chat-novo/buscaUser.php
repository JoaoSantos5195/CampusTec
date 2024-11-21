<?php
session_start();
include('../conexao.php');

// Verificar se o tipo de usuário foi definido
if (!isset($_SESSION['tipo_usuario'], $_SESSION['email'])) {
    header("Location: escolha.php");
    exit();
}

$tipo_usuario = $_SESSION['tipo_usuario'];
$email = $_SESSION['email'];

// Buscar informações do usuário logado
$query = "SELECT id, nomeCompleto FROM " .
    ($tipo_usuario === 'candidato' ? 'usuarios' : 'recrutadores') .
    " WHERE emailPessoal = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    echo "Erro: Usuário não encontrado.";
    exit();
}

$usuario = $result->fetch_assoc();
$usuario_id = $usuario['id'];
$usuario_nome = $usuario['nomeCompleto'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Campustec- Chat</title>
</head>

<body>
    <div class="center">
        <section>

            <div class="detalhes"><span><?php echo $usuario_nome; ?></span></div>
            <p>Online</p>
            <form method="POST" name="pesquisa" action="buscaUser.php">
                <input type="text" name="pesquisar" placeholder="Com quem quer conversar">
                <button type="submit" value="procurar" name="procurar">Procurar</button>
            </form>

            <hr>
            <h1>Resultado</h1>

            <?php

            if ($tipo_usuario === 'candidato') {
                // Verifica se o formulário foi submetido
                if (isset($_POST['pesquisar'])) {
                    //coiso pra evitar sql injection
                    $pesquisar = mysqli_real_escape_string($conn, $_POST['pesquisar']);

                    // Prepara e executa a query
                    $query = "SELECT nomeCompleto FROM recrutadores WHERE nomeCompleto LIKE '%$pesquisar%'";
                    $resultado = mysqli_query($conn, $query);

                    // Verifica e exibe os resultados
                    if ($resultado && $resultado->num_rows > 0) {
                        while ($row = mysqli_fetch_array($resultado)) {
                            echo $row['nomeCompleto'] . "<br>" . "<a href='conversa.php'>Conversar</a> " . "<br>";
                        }
                    } else {
                        echo "Recrutador não encontrado";
                    }
                }
            } elseif ($tipo_usuario === 'recrutador') {
                if (isset($_POST['pesquisar'])) {
                    //coiso pra evitar sql injection
                    $pesquisar = mysqli_real_escape_string($conn, $_POST['pesquisar']);

                    // Prepara e executa a query
                    $query = "SELECT nomeCompleto FROM usuarios WHERE nomeCompleto LIKE '%$pesquisar%'";
                    $resultado = mysqli_query($conn, $query);

                    // Verifica e exibe os resultados
                    if ($resultado && $resultado->num_rows > 0) {
                        while ($row = mysqli_fetch_array($resultado)) {
                            echo $row['nomeCompleto'] . "<br>" . "<a href='conversa.php'>Conversar</a>" . "<br>";
                        }
                    } else {
                        echo "Candidato não encontrado";
                    }
                }
            }
            ?>

</body>

</html>