<?php
include('../conexao.php');
session_start();

if (isset($_SESSION['email'])) {
    $email = $_SESSION['email'];

    $sql = "SELECT id, nomeCompleto, emailPessoal
            FROM usuarios
            WHERE emailPessoal = ?";


    $stmt = $conn->prepare($sql);
    if ($stmt === false) {
        die("Erro na consulta" . $conn->error);
    }

    $stmt->bind_param('s', $email);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $nomeCompleto = htmlspecialchars($row['nomeCompleto']);
        $emailPessoal = htmlspecialchars($row['emailPessoal']);
    } else {
        echo "Usuario não localizado";
        exit;
    }
} else {
    echo "<h1>Perfil não encontrado</h1>";
    header('Location: login.html');
    exit;
}

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

            <div class="detalhes"><span><?php echo $nomeCompleto; ?></span></div>
            <p>Online</p>
            <form method="POST" name="pesquisa" action="buscaUser.php">
                <input type="text" name="pesquisar" placeholder="Com quem quer conversar">
                <button type="submit" value="procurar" name="procurar">Procurar</button>
            </form>

            <hr>
            <h1>Resultado</h1>

            <?php
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
                        echo $row['nomeCompleto'] . "<br>" . "<a href='conversa.php'>Conversar</a>";
                    }
                } else {
                    echo "Recrutador não encontrado";
                }
            }

            ?>

</body>

</html>