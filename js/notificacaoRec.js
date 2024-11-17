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
    if (event.target === dialog) {
        dialog.style.display = 'none';
    }
});

// Função para obter o ID do recrutador
function getSessionRecruiterId() {
    const metaTag = document.querySelector('meta[name="id_recrutador"]');
    return metaTag ? metaTag.content : null;
}

// Função para obter as notificações via AJAX
function getNotificacoes() {
    const userID = getSessionRecruiterId();
    console.log('ID do recrutador:', userID); // Log para depuração
    if (!userID) {
        console.error('ID do recrutador não encontrado');
        document.getElementById('notificacoes-content').innerHTML = 'Erro ao carregar notificações.';
        return;
    }

    const xhr = new XMLHttpRequest();
    xhr.open('POST', 'get_notificacoes.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onload = function () {
        if (xhr.status === 200) {
            console.log('Resposta do servidor:', xhr.responseText); // Log para depuração
            try {
                const notificacoes = JSON.parse(xhr.responseText);
                const notificacoesContent = document.getElementById('notificacoes-content');
                notificacoesContent.innerHTML = ''; // Limpa o conteúdo anterior

                if (notificacoes.length > 0) {
                    let html = '';
                    notificacoes.forEach(notificacao => {
                        html += `<div style="border-bottom: 1px solid #ccc; padding: 10px 0;">`;
                        html += `<p>${notificacao.mensagem}</p>`;

                        if (notificacao.id) {
                            html += '<button onclick="verEventoRecrutador(' + notificacao.id + ')" style="background-color: #15471F; color: white; padding: 10px; border: none; border-radius: 8px; cursor: pointer; font-size: 14px; transition: background-color 0.3s;">Ver evento</button>';
                        }

                        html += `</div>`;
                    });
                    notificacoesContent.innerHTML = html;
                } else {
                    notificacoesContent.innerHTML = 'Sem notificações';
                }
            } catch (e) {
                console.error('Erro ao processar as notificações:', e);
                document.getElementById('notificacoes-content').innerHTML = 'Erro ao carregar notificações.';
            }
        } else {
            console.error('Erro na requisição AJAX');
        }
    };

    xhr.send('id_recrutador=' + encodeURIComponent(userID));
}