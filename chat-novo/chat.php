<?php
include ('../conexao.php');
session_start();

if(isset($_SESSION['email'])){
    $email = $_SESSION['email'];

    $sql = "SELECT id, nomeCompleto, emailPessoal
            FROM usuarios
            WHERE emailPessoal = ?";


    $stmt = $conn -> prepare($sql);
    if ($stmt === false){
        die("Erro na consulta" . $conn->error);
    }
    
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $result = $stmt->get_result();
    if($result->num_rows>0){
        $row = $result->fetch_assoc();
        $nomeCompleto = htmlspecialchars($row['nomeCompleto']);
        $emailPessoal = htmlspecialchars($row['emailPessoal']);
    }else{
        echo"Usuario não localizado";
        exit;
    }
}else{
    echo "<h1>Perfil não encontrado</h1>";
    header('Location: login.html');
    exit;
}

$stmt->close();
$conn->close();     
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="chatCSS/chat.css">
    <title>Campustec- Chat</title>
</head>
<body>
        <div class="center">
            <section>

                <img src="../imagens/usuario-de-perfil.png" alt="">
                <div class="detalhes"><span><?php echo $nomeCompleto; ?></span></div>
                <p>Online</p>

                <form method="POST" name="pesquisa" action="chat.php">
                    <input type="text" name="pesquisar" placeholder="Com quem quer conversar">
                    <button type="submit" value="procurar">Procurar</button> 
                </form>        
            
            </section>
        </div>
    
<hr>
    <div class="userList">
        <img src="#" alt="">
        <div class="detalhes"><span>Nome usuario</span></div>
        <p>Online</p>
        <button type="submit">Conversar</button>
    </div>

    <?php
        $pesquisar = $_POST['pesquisar'];
    
        $query = "SELECT nomeCompleto
        FROM recrutadores
        WHERE nomeCompleto LIKE '%$pesquisar%'";
        
        $resultado = mysqli_query($conn, $query);   
    
        if($resultado->num_rows>0){
        while($row=mysqli_fetch_array($resultado)){
            echo $row['nomeCompleto'];
        }
    }else{
        echo "Recrutador não encontrado";
    }
    ?>

</body>
</html>