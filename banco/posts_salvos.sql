CREATE TABLE `posts_salvos` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `usuario_id` INT(11) DEFAULT NULL,       -- Para salvar o usuário
  `recrutador_id` INT(11) DEFAULT NULL,     -- Para salvar o recrutador
  `post_id` INT(11) NOT NULL,
  `tipo_autor` ENUM('usuario', 'recrutador') NOT NULL,
  `data_salvo` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `usuario_id` (`usuario_id`),
  KEY `recrutador_id` (`recrutador_id`),
  KEY `post_id` (`post_id`),
  KEY `tipo_autor` (`tipo_autor`),
  CONSTRAINT `fk_posts_salvos_usuarios` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE,
  CONSTRAINT `fk_posts_salvos_recrutadores` FOREIGN KEY (`recrutador_id`) REFERENCES `recrutadores` (`id`) ON DELETE CASCADE,
  CONSTRAINT `fk_posts_salvos_posts` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE,
  CHECK ((`tipo_autor` = 'usuario' AND `usuario_id` IS NOT NULL AND `recrutador_id` IS NULL) OR (`tipo_autor` = 'recrutador' AND `recrutador_id` IS NOT NULL AND `usuario_id` IS NULL))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
