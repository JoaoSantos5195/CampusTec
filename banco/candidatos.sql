-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 23/09/2024 às 14:51
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.0.30

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
-- Estrutura para tabela `candidatos`
--

CREATE TABLE `candidatos` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `idade` int(11) DEFAULT NULL,
  `experiencia` text DEFAULT NULL,
  `habilidades` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `candidatos`
--

INSERT INTO `candidatos` (`id`, `nome`, `idade`, `experiencia`, `habilidades`) VALUES
(1, 'Ana Costa', 24, 'Estágio em desenvolvimento web e suporte técnico.', 'JavaScript, HTML5, CSS3, PHP'),
(2, 'Rafael Oliveira', 26, 'Desenvolvedor júnior com foco em desenvolvimento web e mobile.', 'React, React Native, HTML5, CSS3'),
(3, 'Juliana Silva', 23, 'Experiência em desenvolvimento de software e análise de dados.', 'Python, SQL, R'),
(4, 'Felipe Almeida', 25, 'Experiência em desenvolvimento de software e aplicativos móveis.', 'Flutter, Kotlin, Java'),
(5, 'Sofia Lima', 27, 'Desenvolvedora júnior com experiência em desenvolvimento de software para dispositivos móveis.', 'Kotlin, Java, React Native'),
(6, 'Carlos Costa', 28, 'Desenvolvedor com foco em desenvolvimento de software e manutenção de sistemas.', 'Java, PHP, MySQL'),
(7, 'Gabriela Almeida', 22, 'Estágio em automação e análise de dados.', 'Python, SQL, Excel'),
(8, 'Daniel Oliveira', 29, 'Experiência em desenvolvimento de software e sistemas integrados.', 'React, JavaScript, Python'),
(9, 'Fernanda Oliveira', 30, 'Desenvolvedora júnior com foco em integração de sistemas.', 'PHP, MySQL, JavaScript'),
(10, 'Mariana Costa', 25, 'Experiência em desenvolvimento de software e automação.', 'Python, SQL, JavaScript'),
(11, 'Vinícius Costa', 24, 'Desenvolvedor com experiência em análise de dados.', 'R, SQL, Python'),
(12, 'Luana Rodrigues', 23, 'Estágio em desenvolvimento de software e manutenção de sistemas.', 'Java, PHP, MySQL'),
(13, 'Paula Silva', 26, 'Experiência em desenvolvimento de software e integração de sistemas.', 'Python, Java, PHP'),
(14, 'Eduardo Costa', 24, 'Desenvolvedor júnior com experiência em desenvolvimento de software para educação.', 'HTML5, CSS3, JavaScript'),
(15, 'Bruno Pereira', 27, 'Experiência em desenvolvimento backend e integração de sistemas.', 'Ruby, SQL, PHP'),
(16, 'Tatiane Lima', 26, 'Desenvolvedora com experiência em desenvolvimento de software e aplicativos móveis.', 'Flutter, React Native, Kotlin'),
(17, 'Simone Rodrigues', 28, 'Desenvolvedora com experiência em suporte técnico e desenvolvimento de software.', 'PHP, MySQL, JavaScript'),
(18, 'Marcos Silva', 24, 'Estágio em desenvolvimento de software e manutenção de sistemas.', 'Java, PHP, HTML5'),
(19, 'Lucas Santos', 25, 'Desenvolvedor com experiência em desenvolvimento web e mobile.', 'React, React Native, JavaScript'),
(20, 'Rafael Santos', 23, 'Experiência em desenvolvimento de front-end e back-end.', 'React, JavaScript, HTML5'),
(21, 'Bruno Santos', 28, 'Desenvolvedor júnior com experiência em desenvolvimento de aplicativos móveis.', 'Flutter, React Native, JavaScript'),
(22, 'Rodrigo Santos', 27, 'Desenvolvedor com experiência em desenvolvimento de software e aplicativos móveis.', 'Kotlin, Flutter, Java'),
(23, 'Isabela Pereira', 22, 'Estágio em desenvolvimento de software e análise de dados.', 'SQL, Python, JavaScript'),
(24, 'Amanda Costa', 26, 'Experiência em desenvolvimento de software e automação industrial.', 'C#, SQL, Python'),
(25, 'Juliana Costa', 25, 'Desenvolvedora com experiência em desenvolvimento de sistemas para empresas.', '.NET, Java, SQL'),
(26, 'Eduardo Ferreira', 23, 'Desenvolvedor júnior com experiência em desenvolvimento de software e manutenção de sistemas.', 'PHP, MySQL, JavaScript'),
(27, 'André Costa', 24, 'Experiência em desenvolvimento web e mobile.', 'React Native, JavaScript, HTML5'),
(28, 'Patrícia Almeida', 27, 'Desenvolvedora júnior com experiência em sistemas empresariais.', '.NET, C#, SQL'),
(29, 'Giovana Santos', 26, 'Desenvolvedora com foco em desenvolvimento de software para gestão empresarial.', 'PHP, JavaScript, MySQL'),
(30, 'Rodrigo Pereira', 24, 'Experiência em desenvolvimento de software e aplicativos móveis.', 'Kotlin, Java, React Native'),
(31, 'Camila Santos', 23, 'Estágio em desenvolvimento de jogos e aplicativos.', 'Unity, C#, JavaScript'),
(32, 'Luana Costa', 28, 'Desenvolvedora com experiência em desenvolvimento de software e análise de dados.', 'SQL, Python, JavaScript');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `candidatos`
--
ALTER TABLE `candidatos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `candidatos`
--
ALTER TABLE `candidatos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
