const WebSocket = require('ws');
const wss = new WebSocket.Server({ port: 5500 });

// Mantém os usuários conectados
const clients = [];

wss.on('connection', (ws) => {
  clients.push(ws);
  console.log('Novo cliente conectado.');

  ws.on('message', (message) => {
    console.log('Mensagem recebida:', message);

    // Enviar a mensagem para todos os outros clientes conectados
    clients.forEach((client) => {
      if (client !== ws && client.readyState === WebSocket.OPEN) {
        client.send(message);
      }
    });
  });

  ws.on('close', () => {
    console.log('Cliente desconectado.');
    const index = clients.indexOf(ws);
    if (index > -1) {
      clients.splice(index, 1);
    }
  });
});

console.log('Servidor WebSocket rodando na porta 5500');
