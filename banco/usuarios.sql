SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nomeCompleto` varchar(255) NOT NULL,
  `numeroTel` varchar(20) NOT NULL,
  `curso` varchar(100) NOT NULL,
  `emailInstitucional` varchar(255) NOT NULL,
  `emailPessoal` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `biografia` text NULL,
  `curriculo` varchar(255) NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

COMMIT;
