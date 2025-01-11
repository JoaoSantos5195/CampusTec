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
INSERT INTO `usuarios` (`id`, `nomeCompleto`, `numeroTel`, `curso`, `emailInstitucional`, `emailPessoal`, `senha`, `biografia`, `curriculo`) VALUES
(6, 'Ana Silva', '11999999999', 'Desenvolvimento de Sistemas', 'ana.silva@etec.com', 'anasilva@gmail.com', 'senhaSegura123', 'Apaixonada por tecnologia e desenvolvimento web.', NULL),
(2, 'João Santos', '11988888888', 'Nutrição e Dietética', 'joao.santos@etec.com', 'joaosantos@yahoo.com', 'senhaForte456', 'Estudante dedicado, interessado em alimentação saudável.', NULL),
(3, 'Maria Oliveira', '11977777777', 'Administração', 'maria.oliveira@etec.com', 'mariaoliveira@hotmail.com', 'admin2024', NULL, 'maria_curriculo.pdf'),
(4, 'Carlos Pereira', '11966666666', 'Desenvolvimento de Sistemas', 'carlos.pereira@etec.com', 'carlospereira@outlook.com', 'senhaCarlos789', 'Estudante de programação com foco em soluções criativas.', NULL),
(5, 'Fernanda Costa', '11955555555', 'Logística', 'fernanda.costa@etec.com', 'fernandacosta@gmail.com', 'logistica321', 'Interesse em otimização de processos e cadeia de suprimentos.', 'fernanda_curriculo.docx');
