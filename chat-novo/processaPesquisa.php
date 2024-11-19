<?php
session_start();
include('../conexao.php');

if(isset($_POST['buscaPerfil'])){
    $busca = $_POST['buscaPerfil'];

    $sql = "SELECT id as id, nomeCompleto, emailPessoal
    FROM recrutadores
    WHERE "
}
?>