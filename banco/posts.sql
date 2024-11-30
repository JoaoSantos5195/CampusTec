-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 14/11/2024 às 01:06
-- Versão do servidor: 10.4.28-MariaDB
-- Versão do PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `campustec`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `posts`
--

CREATE TABLE `posts` (
<<<<<<< Updated upstream
  `id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `texto` text DEFAULT NULL,
  `imagem` varchar(255) DEFAULT NULL,
  `data_postagem` timestamp NOT NULL DEFAULT current_timestamp()
=======
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

>>>>>>> Stashed changes
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `posts`
--

INSERT INTO `posts` (`id`, `usuario_id`, `texto`, `imagem`, `data_postagem`) VALUES
(4, 4, 'Participar da FETEPS foi uma experiência enriquecedora e marcante em minha jornada acadêmica e profissional. Desde o momento em que decidi me envolver até o encerramento do evento, cada etapa foi uma oportunidade de aprendizado, troca de conhecimentos e crescimento pessoal.\r\n\r\nA preparação para a feira exigiu dedicação. Trabalhar em equipe foi essencial, e tivemos que unir ideias, planejar e estruturar nosso projeto de forma clara e objetiva. Durante essa fase, aprendi a lidar com prazos apertados e a importância da colaboração. Também foi um momento em que percebi o quanto podemos evoluir quando nos desafiamos e saímos da zona de conforto.\r\n\r\nNo dia da exposição, a energia do evento era contagiante. Ver tantos projetos inovadores apresentados por alunos de diversas áreas me inspirou e me motivou a continuar aprimorando minhas habilidades. Apresentar o projeto ao público e aos avaliadores foi uma experiência incrível. Pude colocar em prática minha capacidade de comunicação e perceber como é importante adaptar a linguagem para diferentes públicos, desde visitantes curiosos até jurados experientes.', 'uploads/WhatsApp Image 2024-10-28 at 16.37.05.jpeg', '2024-10-28 19:38:09');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario_id` (`usuario_id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
