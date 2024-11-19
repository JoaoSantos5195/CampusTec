<?php
session_start();
include('../conexao.php');

    $pesquisar = $_POST['pesquisar'];
    
    $query = "SELECT nomeCompleto
    FROM recrutadores
    WHERE nomeCompleto LIKE '%$pesquisar%'";
    
    $resultado = mysqli_query($conn, $query);   

    if($resultado->num_rows>0){
    while($row=mysqli_fetch_array($resultado , MYSQLI_ASSOC)){
        echo $row['nomeCompleto'];
    }
}else{
    echo "Recrutador não encontrado";
}
    ?>