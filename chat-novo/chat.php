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
    header(location: 'login.html');
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

                <form action="">
                    <input type="text" placeholder="Com quem quer conversar">
                    <button type="submit">Procurar</button> 
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

</body>
</html>