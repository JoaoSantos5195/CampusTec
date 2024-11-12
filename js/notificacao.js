// Função para abrir e fechar o diálogo de notificações
document.getElementById('notificacao').addEventListener('click', function () {
    getNotificacoes();
    document.getElementById('notificacaoDialog').style.display = 'block';
});

// Fechar o diálogo ao clicar no botão de fechar
document.getElementById('closeBtn').addEventListener('click', function () {
    document.getElementById('notificacaoDialog').style.display = 'none';
});

// Fechar o diálogo ao clicar fora dele
window.addEventListener('click', function (event) {
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
    xhr.onload = function () {
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
