-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 24/09/2024 às 00:50
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
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nomeCompleto` varchar(255) NOT NULL,
  `numeroTel` varchar(20) NOT NULL,
  `curso` varchar(100) NOT NULL,
  `emailInstitucional` varchar(255) NOT NULL,
  `emailPessoal` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `biografia` text NOT NULL,
  `curriculo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nomeCompleto`, `numeroTel`, `curso`, `emailInstitucional`, `emailPessoal`, `senha`, `biografia`, `curriculo`) VALUES
(1, 'Arthur Santana dos Santos', '1198765432', 'dsEtim', 'arthur.santos203@etec.sp.gov.br', 'arthur.santosguitarrista@gmail.com', '$2y$10$L0o1ihIRyVDxSNj8UdZuT.ne4EieGyTyZmc9oGY2a1rPVC4FxrmSu', 'Sou um desenvolvedor PHP com vasta experiência na criação de soluções web dinâmicas e escaláveis. Ao longo de 8 anos de carreira, tenho me especializado em transformar ideias em realidade através de código eficiente e seguro. Minha paixão por tecnologia me impulsiona a estar sempre atualizado com as mais recentes tendências do desenvolvimento, garantindo que meus projetos atendam aos padrões mais elevados de qualidade. Busco sempre entregar soluções inovadoras e de alto desempenho.', 'uploads/66c8be17a5342-curriculo (3).pdf'),
(2, 'Bruno Rodrigues da Costa', '11923456788', 'seguranca', 'bruno.costa211@etec.sp.gov.br', 'brunorodrigues.costa2007@gmail.com', '$2y$10$/3PQpOLRq4l9mIooC3hFT.PZP2XVuRDf/sLhkdVVCjzo/ZBoScHhK', 'Sou um técnico em Segurança do Trabalho comprometido com a prevenção de acidentes e a promoção de um ambiente de trabalho seguro e saudável. Com mais de 10 anos de atuação na área, tenho ampla experiência na implementação de programas de segurança, realização de treinamentos e análise de riscos. Meu foco é garantir que todas as normas regulamentadoras sejam seguidas, preservando a integridade física dos trabalhadores e contribuindo para a produtividade das empresas.', 'uploads/66d606d32de48-curriculo.pdf'),
(3, 'João Pedro da Penha Santos', '11918273645', 'nutriEtim', 'joao.santos1857@etec.sp.gov.br', 'jotape5195@gmail.com', '$2y$10$UeMCtdEdVlYKYFQyWwNPY.vwMERP3d6u9aKPfSVJkiUdq7a.VxF4C', 'Sou um nutricionista apaixonado pela saúde e bem-estar, com mais de 5 anos de experiência ajudando pessoas a alcançar seus objetivos de vida saudável. Com uma abordagem personalizada e baseada em evidências científicas, trabalho para transformar hábitos alimentares e promover uma alimentação equilibrada que atenda às necessidades individuais de cada paciente. Meu objetivo é empoderar meus clientes para que possam viver de forma mais saudável e feliz.', 'uploads/66d60965b3bcf-curriculo (1).pdf'),
(4, 'Samuel Santana dos Santos', '11987765431', 'gastronomia', 'samuel@etec.sp.gov.br', 'samuel@gmail.com', '$2y$10$TGY./ds6x//W8MQ9Dj1Rf.LA3waUCMQ0l16gMiSZN8zvJVFPNOXLW', 'Renomado chef de cozinha com mais de 15 anos de experiência no setor de gastronomia, iniciou sua carreira em restaurantes locais antes de alcançar reconhecimento nacional. Formado em Gastronomia pela prestigiada Cambridge, ele desenvolveu uma sólida base em técnicas culinárias, que ampliou ao longo dos anos por meio de viagens e cursos especializados em diferentes partes do mundo. Sua paixão pela culinária teve início na infância, observando a avó preparar pratos tradicionais com ingredientes frescos e da estação, o que inspirou sua filosofia de cozinha: valorização dos produtos locais e respeito ao tempo de preparo.', 'uploads/66f1d9319cafd-curriculo.pdf');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

ALTER TABLE usuarios
MODIFY COLUMN curriculo VARCHAR(255) NULL;


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
