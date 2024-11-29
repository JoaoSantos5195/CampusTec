CREATE TABLE mensagens (
    id INT AUTO_INCREMENT PRIMARY KEY,
    remetente_id INT NOT NULL,
    remetente_tipo ENUM('candidato', 'recrutador') NOT NULL,
    destinatario_id INT NOT NULL,
    destinatario_tipo ENUM('candidato', 'recrutador') NOT NULL,
    mensagem TEXT NOT NULL,
    data_envio TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
