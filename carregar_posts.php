<?php
include 'conexao.php';

$sql = "
    SELECT p.id, p.texto, p.imagem, p.data_postagem, u.nomeCompleto 
    FROM posts p
    JOIN usuarios u ON p.usuario_id = u.id
    ORDER BY p.data_postagem DESC";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "
        <div class='post'>
            <h3>" . htmlspecialchars($row['nomeCompleto']) . "</h3>
            <p>" . htmlspecialchars($row['texto']) . "</p>
            " . renderizarArquivo($row['imagem']) . "
            <button class='salvar' data-id='" . $row['id'] . "'>Salvar</button>
            <button id='btn-compartilhar' class='button btn-compartilhar'>Compartilhar</button>
            <p class='timestamp'>" . $row['data_postagem'] . "</p>
        </div>";
    }
} else {
    echo '<p style="color: white; font-size: 24px; text-align: center;">Não há postagens disponíveis.</p>';
}

$conn->close();

// Função para renderizar imagem ou vídeo
function renderizarArquivo($caminho)
{
    if (empty($caminho)) {
        return "";
    }

    $extensao = strtolower(pathinfo($caminho, PATHINFO_EXTENSION));
    if (in_array($extensao, ['jpg', 'jpeg', 'png', 'gif'])) {
        return "<img src='$caminho' alt='Imagem da Postagem' style='max-width:100%;'>";
    } elseif (in_array($extensao, ['mp4', 'webm', 'ogg'])) {
        return "
        <video controls style='max-width:100%;'>
            <source src='$caminho' type='video/$extensao'>
            Seu navegador não suporta este formato de vídeo.
        </video>";
    } else {
        return "<p>[Arquivo não suportado]</p>";
    }
}
