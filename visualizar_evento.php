<?php
include('conexao.php');
session_start();

// Selecionar todos os eventos
$sql = "SELECT id, nome, data, local, google_maps_link FROM eventos";
$result = $conn->query($sql);


?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todos os Eventos</title>
    <link rel="stylesheet" href="css/visualizar_evento.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"> <!-- Link para Bootstrap Icons -->
</head>

<body>
    <header>
        <div>
            <a href="home.php"><img src="imagens/mascote.png" id="logo" alt="CampusTec Logo"></a>
            <div class="logo">
                <div class="center">
                    <div class="menu">
                        <a href="#"><img src="imagens/notificacaoBranco.png" id="notificacao" alt="Notificações"></a>
                        <a href="perfilUsuario.php"><img src="imagens/perfilBranco.png" id="perfil" alt="Perfil"></a>
                        <a href="#" id="menu-btn"><img src="imagens/menuBranco.png" id="menu" alt="Menu"></a>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div id="notificacaoDialog" class="dialog">
        <span class="close-btn" id="closeBtn">&times;</span>
        <div id="notificacoes-content">
            <!-- As notificações serão carregadas aqui -->
        </div>
    </div>
    <div id="side-menu" class="side-menu">
        <a href="javascript:void(0)" class="close-btn" onclick="closeMenu()">&times;</a>
        <a href="#">Tutorial</a>
        <a href="curriculo.html">Criador de currículo</a>
        <a href="recrutadores.html">Recrutadores</a>
        <a href="meus_eventos.php">Meus Eventos</a>
        <a href="editar-perfil.php">Configurações</a>
        <a href="logout.php">Logout</a>
        <a href="sobre_nos.html">Sobre Nós</a>
    </div>

    <h1>Todos os Eventos</h1>

    <?php
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $modalId = 'credenciamentoModal' . md5($row['nome']);
            $buttonId = 'credencial' . md5($row['nome']);

            echo "<div class='event'>";
            echo "<h3>" . $row["nome"] . "</h3>";
            echo "<p>Data: " . $row["data"] . "</p>";
            echo "<p>Local: " . $row["local"] . "</p>";

            echo "<button id='$buttonId' onclick='openModal(\"$modalId\")'>Credenciar-me</button>";
            echo "<button class='save-btn' onclick='salvarEvento(" . $row['id'] . ", this)'><i class='bi bi-floppy icon-large'></i></button>"; // Ícone inicial

            if (!empty($row["google_maps_link"])) {
                $embedLink = str_replace("/maps/", "/maps/embed?", $row["google_maps_link"]);
                echo "<iframe src='$embedLink' allowfullscreen></iframe>";
            }

            echo "<div id='$modalId' class='modal'>";
            echo    "<div class='modal-content'>";
            echo        "<span class='close' onclick='closeModal(\"$modalId\")'>&times;</span>";
            echo        "<h2>Credenciamento para o evento</h2>";
            echo        "<form id='credenciamentoForm' action='enviar_credencial.php' method='post'>";
            echo            "<input type='hidden' name='nome_evento' value='" . $row['nome'] . "'>";
            echo            "<input type='hidden' name='local_evento' value='" . $row['local'] . "'>";
            echo            "<div class='form-group'>";
            echo                "<label for='nome'>Nome Completo:</label>";
            echo                "<input type='text' id='nome' name='nome' required>";
            echo            "</div>";
            echo            "<div class='form-group'>";
            echo                "<label for='email'>E-mail:</label>";
            echo                "<input type='email' id='email' name='email' required>";
            echo            "</div>";
            echo            "<div class='form-group'>";
            echo                "<button type='submit' onclick='mudarTexto()'>Enviar Credenciamento</button>";
            echo            "</div>";
            echo        "</form>";
            echo    "</div>";
            echo "</div>";
            echo "</div>";
        }
    } else {
        echo "Nenhum evento encontrado.";
    }
    ?>

    <script>
        function openMenu() {
            document.getElementById("side-menu").style.width = "250px";
        }

        function closeMenu() {
            document.getElementById("side-menu").style.width = "0";
        }

        document.getElementById("menu-btn").onclick = openMenu;

        function openModal(modalId) {
            document.getElementById(modalId).style.display = 'flex';
        }

        function closeModal(modalId) {
            document.getElementById(modalId).style.display = 'none';
        }

        window.onclick = function(event) {
            const modals = document.getElementsByClassName('modal');
            for (let i = 0; i < modals.length; i++) {
                if (event.target == modals[i]) {
                    modals[i].style.display = 'none';
                }
            }
        }

        function mudarTexto() {
            var botao = document.getElementById("meuBotao");
            botao.innerHTML = "Enviado";
        }

        function salvarEvento(eventId, button) {
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "processa_salvar_evento.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    alert(xhr.responseText); // Mostrar a resposta do servidor

                    // Mudar o ícone dependendo da resposta
                    if (xhr.responseText.includes("salvo")) {
                        button.innerHTML = "<i class='bi bi-floppy-fill'></i>"; // Ícone preenchido
                    } else {
                        button.innerHTML = "<i class='bi bi-floppy'></i>"; // Ícone padrão
                    }
                }
            };
            xhr.send("evento_id=" + eventId);
        }

        // Função para abrir e fechar o diálogo de notificações
        document.getElementById('notificacao').addEventListener('click', function() {
            getNotificacoes();
            document.getElementById('notificacaoDialog').style.display = 'block';
        });

        // Fechar o diálogo ao clicar no botão de fechar
        document.getElementById('closeBtn').addEventListener('click', function() {
            document.getElementById('notificacaoDialog').style.display = 'none';
        });

        // Fechar o diálogo ao clicar fora dele
        window.addEventListener('click', function(event) {
            const dialog = document.getElementById('notificacaoDialog');
            if (event.target == dialog) {
                dialog.style.display = 'none';
            }
        });

        // Função para obter as notificações via AJAX
        function getNotificacoes() {
            var xhr = new XMLHttpRequest();
            xhr.open('POST', 'get_notificacoes.php', true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.onload = function() {
                if (xhr.status === 200) {
                    try {
                        var notificacoes = JSON.parse(xhr.responseText);
                        var notificacoesContent = document.getElementById('notificacoes-content');
                        notificacoesContent.innerHTML = ''; // Limpa o conteúdo anterior

                        if (notificacoes.length > 0) {
                            var html = '';
                            for (var i = 0; i < notificacoes.length; i++) {
                                var notificacao = notificacoes[i];

                                // Adicionar linha separadora
                                html += '<div style="border-bottom: 1px solid #ccc; padding: 10px 0;">';

                                // Exibir o nome do evento
                                html += '<p>' + notificacao.mensagem + '</p>';

                                // Adicionar botão "Ver evento" se o ID do evento estiver presente
                                if (notificacao.id) {
                                    html += '<a href="visualizar_evento.php"' + notificacao.id + '</a>';
                                    html += '<button onclick="verEvento(' + notificacao.id + ') id="btn_not">Ver evento</button>';
                                }

                                html += '</div>'; // Fechar o bloco da notificação
                            }
                            notificacoesContent.innerHTML = html;
                        } else {
                            notificacoesContent.innerHTML = 'Sem notificações';
                        }
                    } catch (e) {
                        console.error('Erro ao processar as notificações:', e);
                        notificacoesContent.innerHTML = 'Erro ao carregar notificações';
                    }
                } else {
                    console.error('Erro na requisição AJAX');
                }
            };

            // Envie o ID do usuário (você precisa ajustar isso de acordo com sua implementação de sessão)
            var userID = 1; // Defina isso corretamente
            xhr.send('id_usuario=' + encodeURIComponent(userID));
        }

        // Função para redirecionar o usuário para a página de visualização de eventos
        function verEvento(eventoId) {
            window.location.href = 'visualizar_evento.php?id=' + eventoId;
        }
    </script>
</body>

</html>