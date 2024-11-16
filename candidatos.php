<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/recrutadores.css">
    <title>CampusTec</title>
</head>
<body>
<style>
    .vaga {
        background-color: #333; 
        color: #fff; 
        border-radius: 8px; 
        padding: 30px; 
        margin: 25px 40px; 
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3); 
    }

    .vaga h2 {
        font-size: 1.5em; 
        margin: 0 0 10px; 
    }

    .vaga p {
        font-size: 1em; 
        margin: 5px 0; 
    }

    .vaga form {
        margin-top: 10px; 
    }

    .vaga button {
        background-color: #007BFF; 
        color: #fff; 
        border: none; 
        border-radius: 5px; 
        padding: 10px 15px; 
        cursor: pointer; 
        transition: background-color 0.3s; 
    }

    .vaga button:hover {
        background-color: #0056b3; 
    }
</style>

<header>
    <div>
        <a href="postar_evento.php"><img src="imagens/mascote.png" id="logo" alt="CampusTec Logo"></a>
    </div>
    <div class="logo">
        <div class="center">
            <div class="menu">
                <a href="#"><img src="imagens/notificacaoBranco.png" id="notificacao" alt="Notificações"></a>
                <a href="perfilUsuario.php"><img src="imagens/perfilBranco.png" id="perfil" alt="Perfil"></a>
                <a href="#" id="menu-btn"><img src="imagens/menuBranco.png" id="menu" alt="Menu"></a>
            </div>
        </div>
    </div>
</header>

<div id="side-menu" class="side-menu">
    <a href="javascript:void(0)" class="close-btn" onclick="closeMenu()">&times;</a>
    <a href="#">Tutorial</a>
        <a href="recrutadores.html">Recrutadores</a>
        <a href="eventosRecrutador.php">Eventos</a>
        <a href="editar_perfil_rec.php">Configurações</a>
        <a href="logout.php">Logout</a>
        <a href="sobre_nos.html">Sobre Nós</a>
</div>



<div class="search-container">
    <h1 id="buscar">Lista de Candidatos</h1>
    <div class="filter-container">
    <form action="processa_cand_filter.php" method="GET">
        <label for="filter">Filtrar Candidatos:</label>
        <select name="filter" id="filter">
            <option value="">Selecione uma opção</option>
            <option value="curriculo">Com Currículo</option>
            <option value="area">Por Área</option>
            <option value="soft_skills">Com Soft Skills</option>
            <option value="email_institucional">E-mail Institucional (@etec.sp.gov.br)</option>
        </select>
        <button type="submit">Aplicar Filtro</button>
    </form>
</div>
    <div id="resultado-busca" class="resultado-busca">
        <!-- O arquivo PHP será incluído diretamente aqui para exibir os recrutadores -->
        <?php include 'processa_cand.php'; ?> <!-- Arquivo PHP que exibe recrutadores -->
    </div>
</div>



<footer id="footer">
    <p>&copy; 2024 CampusTec. Todos os direitos reservados.</p>
</footer>

<script>
    function openMenu() {
        document.getElementById("side-menu").style.width = "250px";
    }

    function closeMenu() {
        document.getElementById("side-menu").style.width = "0";
    }

    document.getElementById("menu-btn").onclick = openMenu;

    // Função para lidar com o clique do botão de candidatura
    function candidatarSe(event, botaoId) {
        event.preventDefault();  // Previne o envio do formulário
        var botao = document.getElementById(botaoId);
        botao.textContent = 'Você se candidatou!';
        botao.disabled = true;  // Desativa o botão após a candidatura
    }
</script>
</body>
</html>
