CREATE TABLE `posts` (
  `post_id` INT(11) NOT NULL AUTO_INCREMENT,
  `usuario_id` INT(11) DEFAULT NULL,       -- Coluna para usuário
  `recrutador_id` INT(11) DEFAULT NULL,     -- Coluna para recrutador
  `tipo_autor` ENUM('usuario', 'recrutador') NOT NULL,
  `texto` TEXT DEFAULT NULL,
  `imagem` VARCHAR(255) DEFAULT NULL,
  `data_postagem` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP(),
  PRIMARY KEY (`post_id`),
  KEY `usuario_id` (`usuario_id`),
  KEY `recrutador_id` (`recrutador_id`),
  CONSTRAINT `fk_posts_usuarios` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE,
  CONSTRAINT `fk_posts_recrutadores` FOREIGN KEY (`recrutador_id`) REFERENCES `recrutadores` (`id`) ON DELETE CASCADE,
  CHECK ((`tipo_autor` = 'usuario' AND `usuario_id` IS NOT NULL AND `recrutador_id` IS NULL) OR 
         (`tipo_autor` = 'recrutador' AND `recrutador_id` IS NOT NULL AND `usuario_id` IS NULL))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
