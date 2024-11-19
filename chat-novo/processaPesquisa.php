<?php
session_start();
include('../conexao.php');

if(isset($_POST['buscaPerfil'])){
    $busca = $_POST['buscaPerfil'];

    $sql = "SELECT id, nomeCompleto, emailPessoal
    FROM recrutadores
    WHERE nomeCompleto LIKE ? or id LIKE ?";
}

    $pesquisar = $_POST['pesquisar'];
    ""
    ?>