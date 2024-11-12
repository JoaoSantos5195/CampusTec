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
        <a href="curriculo.html">Criador de currículo</a>
        <a href="sobre_nos.html">Sobre Nós</a>
        <a href="logout.php">Logout</a>
        <a href="candidatos.php">Candidatos</a>
        <a href="visualizar_evento.php">Eventos</a>
        <a href="postar_evento.php">Adicionar evento</a>
        <a href="#">Configurações</a>
    </div>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap');

        .center {
    display: flex;
    float: right;
    align-items: center;
    max-width: 1280px;
    margin: 0 auto;
    padding: 0 2%;
}

header {
    height: 100px;
    padding: 20px 0;
    background-color: #15471F;
    box-shadow: 2px 2px 7px rgba(70, 141, 49, 0.4);
    z-index: 2;
    width: 100%;
}
#logo {
    width: 70px;
    margin: -5px 20px 0 ;
    float: left;
    display: flex;
    position: relative;
    z-index: 1000;
}
#menu, #notificacao, #perfil {
    width: 80px;
    margin-top: -10px;
    margin-left: 15px;
    padding: 20px;
    z-index: 0;
}
#menu{
    margin-top: -5px;
}

.menu {
    list-style: none;
    display: flex;
}

.menu li {
    margin-right: 20px;
}

.menu a {
    text-decoration: none;
    color: #fff;
    font-size: 16px;
}


.side-menu {
    height: 100%;
    width: 0;
    position: fixed;
    z-index: 1;
    top: 0;
    right: 0;
    background-color:#15471F;
    overflow-x: hidden;
    transition: 0.5s;
    padding-top: 60px;
    box-shadow: 2px 2px 7px rgba(0, 0, 0, 0.4);
    z-index: 1000;
}

.side-menu a {
    padding: 15px 20px;
    margin-bottom: 15px;
    text-decoration: none;
    font-size: 22px;
    color: white;
    display: block;
    transition: 0.5s;
}

.side-menu a:hover {
    background-color: #1c5f29;
}

.side-menu .close-btn {
    position: absolute;
    top: 5px;
    right: 25px;
    font-size: 36px;
    padding: 5%;
    cursor: pointer;
}

.dialog {
    display: none;
    position: fixed;
    top: 20%;
    left: 75%;
    transform: translate(-50%, -50%);
    background-color: white;
    border-radius: 10px;
    padding: 20px;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
    z-index: 1000;
    width: 300px;
    max-height: 300px;
    /* Aumentado para permitir mais notificações */
    overflow-y: auto;
    /* Habilitar scroll quando necessário */
}

.dialog .close-btn {
    cursor: pointer;
    float: right;
    font-size: 1.5em;
}

.dialog h2 {
    margin: 0;
    text-align: center;
    font-size: 1.5em;
    color: #15471F;
    /* Cor do título */
}

.dialog .notificacao {
    border-bottom: 1px solid #ccc;
    padding: 10px 0;
    transition: background-color 0.3s;
    /* Adiciona transição ao passar o mouse */
}

.dialog .notificacao:hover {
    background-color: #f1f1f1;
    /* Cor de fundo ao passar o mouse */
}

.dialog button {
    background-color: #15471F;
    color: white;
    padding: 12px;
    border: none;
    border-radius: 8px;
    cursor: pointer;
    font-size: 16px;
    transition: background-color 0.3s;
}

.dialog button:hover {
    background-color: #1c5f29;
}


/* Rodapé */
footer {
    background-color: #333;
    color: white;
    text-align: center;
    padding: 20px 0;
    display: flex;
    justify-content: center;
    box-shadow: 2px 2px 7px rgba(70, 141, 49, 0.4);
    bottom: 0%;
    position: sticky;
    width: 100%;
    z-index: 1;
}
    </style>