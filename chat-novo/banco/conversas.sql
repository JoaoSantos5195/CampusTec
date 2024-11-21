CREATE TABLE conversas(
        id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
        candidato_id INT NOT NULL references usuarios('id'),
        recrutador_id INT NOT NULL references recrutadores('id'),
        data_criacao TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);