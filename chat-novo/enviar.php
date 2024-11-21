<?php
session_start();
include('../conexao.php');

$candidato_id = $_SESSION['email'];
$recrutador_id = $_SESSION['recrutador_id'];


function verificaConversa(){
    $query = 'SELECT id FROM conversas WHERE 
    (candidato_id = ? and recrutador_id = ?) OR
    (candidato_id = ? and recrutador_id = ?)';
    $stmt->bind_param('iiii', $recrutador_id, $candidato_id, $candidato_id, $recrutador_id);
    $stmt = $conn->prepare($query);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if($result -> num_rows > 0){
        $conversa = $result->fetch_assoc();
        $conversa_id = $conversa['id'];
    }else{
        $conversa_id = NULL;
    }
}


if ($_SERVER['REQUEST_METHOD'] === "POST") {
    if (!isset($_SESSION['email'], $_POST['mensagem'], $_POST['remetente_id'], $_POST['remetente_tipo'])) {
        echo "Erro: Dados insuficientes.";
        exit();
    }

    $mensagem = trim($_POST['mensagem']);
    $remetente_id = intval($_POST['remetente_id']);
    $remetente_tipo = $_POST['remetente_tipo'];

    if ($mensagem === "") {
        echo "Erro: Mensagem vazia.";
        exit();
    }


    // Inserir mensagem na tabela
    $query = "INSERT INTO mensagens (remetente_id, remetente_tipo, mensagem) 
              VALUES (?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("iss", $remetente_id, $remetente_tipo, $mensagem);

    if ($stmt->execute()) {
        echo "Mensagem enviada.";
    } else {
        echo "Erro ao enviar mensagem.";
    }
}
?>
