CREATE TABLE `eventos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `data` date NOT NULL,
  `local` varchar(255) NOT NULL,
  `google_maps_link` varchar(500) DEFAULT NULL,
  `criador_id` int(11) NOT NULL,  -- Coluna para vincular o criador do evento
  PRIMARY KEY (`id`),
  FOREIGN KEY (`criador_id`) REFERENCES recrutadores(`id`) -- Chave estrangeira que referencia a tabela 'usuarios'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

ALTER TABLE `eventos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

COMMIT;
