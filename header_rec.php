<header>
    <div>
        <a href="#"><img src="imagens/mascote.png" id="logo" alt="CampusTec Logo"></a>
        <div class="logo">
            <div class="center">
                <div class="menu">
                    <a href="#"><img src="imagens/notificacaoBranco.png" id="notificacao" alt="Notificações"></a>
                    <a href="perfilRecrutador.php"><img src="imagens/perfilBranco.png" id="perfil" alt="Perfil"></a>
                    <a href="#" id="menu-btn"><img src="imagens/menuBranco.png" id="menu" alt="Menu"></a>
                </div>
            </div>
</header>

<div id="side-menu" class="side-menu">
    <a href="javascript:void(0)" class="close-btn" onclick="closeMenu()">&times;</a>
    <a href="#">Tutorial</a>
    <a href="candidatos.php">Candidatos</a>
    <a href="candidatos.php">Candidatos</a>
    <a href="eventosRecrutador.php">Eventos</a>
    <a href="postar_evento.php">Adicionar evento</a>
    <a href="editar_perfil_rec.php">Configurações</a>
    <a href="sobre_nos.php">Sobre Nós</a>
    <a href="logout.php">Logout</a>
</div>

<style>
    .dialog {
        display: none;
        position: fixed;
        top: 20%;
        left: 70%;
        /* Centralizado horizontalmente */
        transform: translate(-50%, -20%);
        /* Ajusta o posicionamento para o centro */
        background-color: white;
        border-radius: 10px;
        padding: 20px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
        z-index: 1000;
        width: 300px;
        /* Largura fixa */
        max-height: 400px;
        /* Altura máxima aumentada para notificações extras */
        overflow-y: auto;
        /* Adiciona barra de rolagem quando necessário */
    }

    .dialog .close-btn {
        cursor: pointer;
        float: right;
        font-size: 1.5em;
    }

    .dialog h2 {
        margin: 0 0 10px;
        text-align: center;
        font-size: 1.5em;
        color: #15471F;
    }

    .dialog .notificacao {
        border-bottom: 1px solid #ccc;
        padding: 10px 0;
        transition: background-color 0.3s;
        display: flex;
        /* Adicionado para alinhamento */
        align-items: center;
        justify-content: space-between;
        /* Para melhor espaçamento */
    }

    .dialog .notificacao:hover {
        background-color: #f1f1f1;
    }

    .dialog button {
        background-color: #15471F;
        color: white;
        padding: 10px;
        border: none;
        border-radius: 8px;
        cursor: pointer;
        font-size: 14px;
        transition: background-color 0.3s;
    }

    .dialog button:hover {
        background-color: #1c5f29;
    }


    body {
        background-color: #ffffff;
        background: rgb(0, 0, 0);
        background: linear-gradient(180deg, rgb(0, 0, 0) 0%, rgba(83, 136, 75, 1) 100%);
    }

    .header {
        height: 100px;
        padding: 20px 0;
        background-color: #15471F;
        box-shadow: 2px 2px 7px rgba(70, 141, 49, 0.4);
        z-index: 2;
        width: 100%;
    }

    #menu,
    #notificacao,
    #perfil {
        width: 80px;
        margin-top: -10px;
        margin-left: 15px;
        padding: 20px;
        display: flex;
        float: right;
        z-index: 0;
    }

    #menu {
        margin-top: -5px;
    }
</style>