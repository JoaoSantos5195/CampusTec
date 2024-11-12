-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 23/09/2024 às 14:53
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
-- Estrutura para tabela `vagas_emprego`
--

CREATE TABLE `vagas_emprego` (
  `id` int(11) NOT NULL,
  `nome_empresa` varchar(100) DEFAULT NULL,
  `empregador` varchar(100) DEFAULT NULL,
  `descricao_vaga` text DEFAULT NULL,
  `salario` decimal(10,2) DEFAULT NULL,
  `pretensoes` text DEFAULT NULL,
  `email_contratante` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `vagas_emprego`
--

INSERT INTO `vagas_emprego` (`id`, `nome_empresa`, `empregador`, `descricao_vaga`, `salario`, `pretensoes`, `email_contratante`) VALUES
(1, 'Tech Solutions', 'Ana Silva', 'Desenvolvedor Júnior para atuar em projetos de desenvolvimento web. Conhecimento em HTML, CSS, e JavaScript é desejável.', 3000.00, 'Proatividade, habilidades de comunicação e desejo de aprender.', 'arthur.santosguitarrista@gmail.com'),
(2, 'DevWorks', 'Carlos Pereira', 'Estamos em busca de um desenvolvedor júnior para trabalhar com Python e Django. Experiência com frameworks é um plus.', 3200.00, 'Boa capacidade de resolução de problemas e interesse em novas tecnologias.', 'carlos.pereira@gmail.com'),
(3, 'Innovatech', 'Mariana Oliveira', 'Vaga para desenvolvedor júnior com foco em desenvolvimento de aplicativos móveis. Conhecimentos em Swift ou Kotlin são desejados.', 3500.00, 'Entusiasmo por tecnologia e capacidade de trabalhar em equipe.', 'mariana.oliveira@gmail.com'),
(4, 'WebStart', 'João Souza', 'Procuramos um desenvolvedor júnior para integração de APIs e manutenção de sistemas existentes. Conhecimento em Node.js é um diferencial.', 3100.00, 'Capacidade de trabalhar sob pressão e interesse por desenvolvimento contínuo.', 'joão.souza@gmail.com'),
(5, 'FutureCode', 'Fernanda Costa', 'Desenvolvedor júnior para trabalhar em projetos de e-commerce. Experiência com PHP e MySQL é preferencial.', 2900.00, 'Organização e atenção aos detalhes.', 'fernanda.costa@gmail.com'),
(6, 'TechNet', 'Roberto Lima', 'Buscamos um desenvolvedor júnior para suporte e manutenção de sistemas internos. Conhecimento básico em C# é necessário.', 3300.00, 'Capacidade analítica e vontade de aprender novas ferramentas.', 'roberto.lima@gmail.com'),
(7, 'SoftTech', 'Luciana Santos', 'Vaga para desenvolvedor júnior para atuar em projetos de frontend. Experiência com React é um diferencial.', 3400.00, 'Criatividade e interesse por design de interfaces.', 'luciana.santos@gmail.com'),
(8, 'CodeLab', 'Pedro Almeida', 'Desenvolvedor júnior para trabalhar com Java e Spring Boot. Experiência anterior em projetos pessoais será considerada.', 3200.00, 'Boa comunicação e habilidades de trabalho em equipe.', 'pedro.almeida@gmail.com'),
(9, 'DataDriven', 'Julia Martins', 'Estamos procurando um desenvolvedor júnior para trabalhar em projetos de análise de dados e desenvolvimento de scripts. Conhecimento em SQL é desejável.', 3100.00, 'Interesse por dados e habilidade em resolver problemas complexos.', 'julia.martins@gmail.com'),
(10, 'XtremeDev', 'Eduardo Oliveira', 'Vaga para desenvolvedor júnior com foco em desenvolvimento backend. Conhecimento em Ruby on Rails é um diferencial.', 3000.00, 'Capacidade de aprender rapidamente e trabalhar em projetos desafiadores.', 'eduardo.oliveira@gmail.com'),
(11, 'Tech Innovations', 'Lucas Andrade', 'Desenvolvedor júnior para atuar em projetos de integração de sistemas. Conhecimento em APIs e RESTful services é desejável.', 3300.00, 'Vontade de aprender e habilidades de resolução de problemas.', 'lucas.andrade@gmail.com'),
(12, 'Digital Solutions', 'Tatiane Rodrigues', 'Vaga para desenvolvedor júnior com experiência em desenvolvimento web. Conhecimentos em Angular são um plus.', 3400.00, 'Capacidade de trabalhar bem em equipe e bom senso crítico.', 'tatiane.rodrigues@gmail.com'),
(13, 'WebWorks', 'Marcelo Lima', 'Desenvolvedor júnior para atuar em projetos de manutenção e suporte técnico. Conhecimento básico em .NET é necessário.', 3000.00, 'Disposição para aprender e atenção aos detalhes.', 'marcelo.lima@gmail.com'),
(14, 'SoftLab', 'Giovana Almeida', 'Buscamos um desenvolvedor júnior para atuar em projetos de mobile e web. Experiência com Flutter é desejada.', 3200.00, 'Criatividade e capacidade de se adaptar a novas tecnologias.', 'giovana.almeida@gmail.com'),
(15, 'CodeWorks', 'Vinícius Silva', 'Desenvolvedor júnior para projetos de front-end e back-end. Conhecimento em Vue.js é um diferencial.', 3300.00, 'Interesse por desenvolvimento full-stack e capacidade de aprender novas ferramentas.', 'vinícius.silva@gmail.com'),
(16, 'TechGen', 'Isabela Costa', 'Vaga para desenvolvedor júnior com foco em APIs e serviços web. Conhecimentos em Express.js são desejados.', 3100.00, 'Capacidade de resolver problemas e trabalhar em equipe.', 'isabela.costa@gmail.com'),
(17, 'NextGen Technologies', 'Thiago Pereira', 'Desenvolvedor júnior para atuar em projetos de software de gestão. Conhecimento em Java é um plus.', 3400.00, 'Interesse por desenvolvimento de software e habilidades de análise de requisitos.', 'thiago.pereira@gmail.com'),
(18, 'Innovative Solutions', 'Amanda Santos', 'Procuramos um desenvolvedor júnior para atuar em projetos de integração de dados e backend. Experiência com Python é desejável.', 3200.00, 'Boa capacidade de organização e interesse por novos desafios.', 'amanda.santos@gmail.com'),
(19, 'GlobalTech', 'Felipe Ferreira', 'Desenvolvedor júnior para trabalhar com sistemas de automação. Conhecimento em PHP e MySQL é necessário.', 3000.00, 'Capacidade de trabalhar com prazos curtos e vontade de aprender.', 'felipe.ferreira@gmail.com'),
(20, 'CyberTech', 'Marcelly Rocha', 'Vaga para desenvolvedor júnior com foco em desenvolvimento de aplicativos web. Experiência com JavaScript e frameworks é um plus.', 3300.00, 'Criatividade e interesse por design de sistemas.', 'marcelly.rocha@gmail.com'),
(21, 'TechFuture', 'Bruno Silva', 'Desenvolvedor júnior para atuar em projetos de desenvolvimento de jogos. Conhecimento em Unity é um diferencial.', 3500.00, 'Interesse por gamificação e habilidades de programação orientada a objetos.', 'bruno.silva@gmail.com'),
(22, 'SmartTech', 'Beatriz Costa', 'Vaga para desenvolvedor júnior com experiência em integração de sistemas e APIs. Conhecimento em Java é desejável.', 3200.00, 'Capacidade de trabalhar bem sob pressão e desejo de aprimorar habilidades.', 'beatriz.costa@gmail.com'),
(23, 'Evolutech', 'Carlos Santos', 'Desenvolvedor júnior para trabalhar em projetos de tecnologia educacional. Conhecimento em HTML5 e CSS3 é um plus.', 3100.00, 'Habilidade de comunicação e interesse em tecnologia educacional.', 'carlos.santos@gmail.com'),
(24, 'BlueTech', 'Sofia Lima', 'Procuramos um desenvolvedor júnior para atuar em manutenção de sistemas. Conhecimento básico em C++ é necessário.', 3000.00, 'Atenção aos detalhes e vontade de aprender novas linguagens.', 'sofia.lima@gmail.com'),
(25, 'VisionTech', 'Daniela Silva', 'Desenvolvedor júnior para projetos de software de análise de dados. Conhecimento em R ou Python é desejado.', 3300.00, 'Interesse por análise de dados e habilidade de trabalhar com grandes volumes de dados.', 'daniela.silva@gmail.com'),
(26, 'AlphaTech', 'Gustavo Almeida', 'Vaga para desenvolvedor júnior com foco em segurança da informação. Conhecimento em técnicas básicas de segurança é um plus.', 3200.00, 'Curiosidade por segurança cibernética e capacidade de se manter atualizado sobre ameaças.', 'gustavo.almeida@gmail.com'),
(27, 'TechStar', 'Rafaela Santos', 'Desenvolvedor júnior para projetos de aplicativos móveis e web. Conhecimento em Java e Kotlin é desejável.', 3400.00, 'Capacidade de trabalhar em ambientes dinâmicos e desejo de aprender novas tecnologias.', 'rafaela.santos@gmail.com'),
(28, 'ProTech', 'André Pereira', 'Vaga para desenvolvedor júnior com experiência em sistemas ERP. Conhecimento em PHP é um diferencial.', 3000.00, 'Interesse em sistemas ERP e habilidades de resolução de problemas.', 'andré.pereira@gmail.com'),
(29, 'FutureWorks', 'Laura Lima', 'Desenvolvedor júnior para trabalhar em desenvolvimento de software e aplicativos. Conhecimento em React Native é desejável.', 3100.00, 'Capacidade de aprender rapidamente e trabalhar em equipe.', 'laura.lima@gmail.com'),
(30, 'BrightTech', 'Rodrigo Costa', 'Desenvolvedor júnior para projetos de desenvolvimento ágil. Conhecimento em metodologias ágeis é um plus.', 3300.00, 'Boa capacidade de adaptação e desejo de crescer profissionalmente.', 'rodrigo.costa@gmail.com'),
(31, 'Innovate IT', 'Camila Rocha', 'Vaga para desenvolvedor júnior com foco em projetos de automação. Conhecimento básico em Python é desejado.', 3200.00, 'Interesse por automação e capacidade de resolver problemas de forma criativa.', 'camila.rocha@gmail.com'),
(32, 'Dynamic Tech', 'João Paulo', 'Desenvolvedor júnior para trabalhar com APIs e serviços web. Conhecimento em Node.js é um diferencial.', 3400.00, 'Capacidade de trabalhar bem em equipe e boa comunicação.', 'joão.paulo@gmail.com'),
(33, 'TechNexus', 'Viviane Pereira', 'Procuramos um desenvolvedor júnior para projetos de desenvolvimento de software para dispositivos móveis. Conhecimento em Flutter é desejável.', 3100.00, 'Entusiasmo por desenvolvimento de aplicativos móveis e capacidade de aprender novas tecnologias.', 'viviane.pereira@gmail.com'),
(34, 'Global Solutions', 'Eduardo Lima', 'Desenvolvedor júnior para atuar em projetos de software empresarial. Conhecimento em .NET é necessário.', 3300.00, 'Boa capacidade analítica e vontade de aprender e crescer na carreira.', 'eduardo.lima@gmail.com'),
(35, 'CodePro', 'Mariana Ferreira', 'Vaga para desenvolvedor júnior com experiência em desenvolvimento front-end. Conhecimento em Angular é um plus.', 3200.00, 'Capacidade de trabalhar bem sob pressão e interesse por design de interfaces.', 'mariana.ferreira@gmail.com'),
(36, 'TechGenie', 'Fernando Silva', 'Desenvolvedor júnior para projetos de software de análise de dados. Conhecimento em SQL é desejado.', 3100.00, 'Habilidade para trabalhar com grandes conjuntos de dados e desejo de aprimorar habilidades analíticas.', 'fernando.silva@gmail.com'),
(37, 'AdvanceTech', 'Tatiane Santos', 'Vaga para desenvolvedor júnior com foco em integração de sistemas. Conhecimento em Java é um diferencial.', 3400.00, 'Boa comunicação e capacidade de resolução de problemas complexos.', 'tatiane.santos@gmail.com'),
(38, 'NextLevel Tech', 'Rafael Oliveira', 'Desenvolvedor júnior para atuar em projetos de software e aplicativos web. Conhecimento em Vue.js é desejável.', 3200.00, 'Criatividade e interesse por novos desafios tecnológicos.', 'rafael.oliveira@gmail.com'),
(39, 'BrightFuture', 'Simone Rodrigues', 'Procuramos um desenvolvedor júnior para trabalhar em projetos de desenvolvimento de software e suporte técnico. Conhecimento em PHP é necessário.', 3300.00, 'Boa capacidade de aprendizado e habilidades de comunicação.', 'simone.rodrigues@gmail.com'),
(40, 'Innovative Systems', 'Paula Lima', 'Desenvolvedor júnior para atuar em projetos de automação de processos. Conhecimento básico em Python é desejável.', 3100.00, 'Capacidade de trabalhar em equipe e desejo de aprender novas ferramentas e técnicas.', 'paula.lima@gmail.com'),
(41, 'TechSavvy', 'Lucas Santos', 'Vaga para desenvolvedor júnior com experiência em desenvolvimento web e mobile. Conhecimento em React e React Native é um diferencial.', 3200.00, 'Interesse por desenvolvimento full-stack e capacidade de se adaptar a diferentes tecnologias.', 'lucas.santos@gmail.com'),
(42, 'FutureTech', 'Juliana Silva', 'Desenvolvedor júnior para projetos de desenvolvimento de software para educação. Conhecimento em JavaScript é desejado.', 3300.00, 'Entusiasmo por tecnologia educacional e boa capacidade de resolução de problemas.', 'juliana.silva@gmail.com'),
(43, 'Tech Solutions', 'Amanda Costa', 'Vaga para desenvolvedor júnior com foco em software de automação industrial. Conhecimento em C# é um diferencial.', 3100.00, 'Boa capacidade analítica e interesse por automação industrial.', 'amanda.costa@gmail.com'),
(44, 'CodeWorks', 'Bruno Pereira', 'Desenvolvedor júnior para projetos de desenvolvimento backend. Conhecimento em Ruby é desejável.', 3200.00, 'Capacidade de resolver problemas e interesse por desenvolvimento backend.', 'bruno.pereira@gmail.com'),
(45, 'SoftSkills', 'Luana Rodrigues', 'Procuramos um desenvolvedor júnior para atuar em projetos de manutenção de software. Conhecimento em Java é necessário.', 3300.00, 'Boa capacidade de trabalhar em equipe e habilidades de resolução de problemas.', 'luana.rodrigues@gmail.com'),
(46, 'TechPro', 'Mateus Silva', 'Desenvolvedor júnior para atuar em projetos de desenvolvimento de jogos. Conhecimento em Unity é um plus.', 3400.00, 'Interesse por desenvolvimento de jogos e habilidades de programação orientada a objetos.', 'mateus.silva@gmail.com'),
(47, 'NextTech', 'Tatiane Almeida', 'Vaga para desenvolvedor júnior com experiência em sistemas de gestão e ERP. Conhecimento em Python é desejável.', 3100.00, 'Habilidade de resolver problemas e desejo de crescer profissionalmente.', 'tatiane.almeida@gmail.com'),
(48, 'Innovate Systems', 'Lucas Costa', 'Desenvolvedor júnior para atuar em projetos de software para dispositivos móveis. Conhecimento em Java e Kotlin é um diferencial.', 3200.00, 'Entusiasmo por desenvolvimento de aplicativos móveis e boa comunicação.', 'lucas.costa@gmail.com'),
(49, 'TechGenie', 'Fernanda Lima', 'Procuramos um desenvolvedor júnior para projetos de software e sistemas integrados. Conhecimento em PHP e MySQL é desejado.', 3300.00, 'Capacidade de trabalhar bem em equipe e interesse por novos desafios.', 'fernanda.lima@gmail.com'),
(50, 'WebNexus', 'Rafael Santos', 'Desenvolvedor júnior para atuar em projetos de desenvolvimento de front-end e back-end. Conhecimento em React é um diferencial.', 3100.00, 'Boa capacidade de adaptação e desejo de aprender novas tecnologias.', 'rafael.santos@gmail.com'),
(51, 'CodeCrafter', 'Juliana Costa', 'Vaga para desenvolvedor júnior com foco em desenvolvimento de sistemas para empresas. Conhecimento em .NET é desejado.', 3200.00, 'Boa comunicação e interesse por desenvolvimento de software empresarial.', 'juliana.costa@gmail.com'),
(52, 'FutureTech', 'Vinícius Costa', 'Desenvolvedor júnior para trabalhar com projetos de software de análise de dados. Conhecimento em R é um diferencial.', 3300.00, 'Habilidade analítica e desejo de aprimorar habilidades de análise de dados.', 'vinícius.costa@gmail.com'),
(53, 'BrightTech', 'Isabela Pereira', 'Procuramos um desenvolvedor júnior para atuar em projetos de software e aplicativos web. Conhecimento em Angular é desejável.', 3100.00, 'Criatividade e capacidade de aprender novas ferramentas e técnicas.', 'isabela.pereira@gmail.com'),
(54, 'TechFuture', 'Roberta Lima', 'Desenvolvedor júnior para projetos de automação de processos. Conhecimento em Python e SQL é desejável.', 3200.00, 'Capacidade de resolver problemas e interesse por automação de processos.', 'roberta.lima@gmail.com'),
(55, 'NextLevel Tech', 'Felipe Pereira', 'Vaga para desenvolvedor júnior com experiência em desenvolvimento de software e aplicativos móveis. Conhecimento em Flutter é um plus.', 3300.00, 'Boa capacidade de comunicação e desejo de aprender novas tecnologias.', 'felipe.pereira@gmail.com'),
(56, 'Innovative Solutions', 'Paula Silva', 'Desenvolvedor júnior para projetos de software para gestão empresarial. Conhecimento em Java é necessário.', 3100.00, 'Capacidade de trabalhar bem em equipe e interesse por desenvolvimento de software.', 'paula.silva@gmail.com'),
(57, 'Tech Innovations', 'Lucas Costa', 'Vaga para desenvolvedor júnior com foco em desenvolvimento de jogos e aplicativos. Conhecimento em Unity e C# é desejável.', 3400.00, 'Interesse por desenvolvimento de jogos e capacidade de aprender rapidamente.', 'lucas.costa@gmail.com'),
(58, 'Dynamic Tech', 'Gabriela Almeida', 'Desenvolvedor júnior para atuar em projetos de software de automação. Conhecimento em Python é um diferencial.', 3200.00, 'Interesse por automação e capacidade de trabalhar com grandes volumes de dados.', 'gabriela.almeida@gmail.com'),
(59, 'TechNet', 'André Lima', 'Vaga para desenvolvedor júnior com foco em integração de sistemas e APIs. Conhecimento em Node.js é desejável.', 3100.00, 'Boa comunicação e capacidade de trabalhar em equipe.', 'andré.lima@gmail.com'),
(60, 'WebWorks', 'Tatiane Costa', 'Desenvolvedor júnior para trabalhar com desenvolvimento de aplicativos móveis e web. Conhecimento em React Native é um plus.', 3300.00, 'Capacidade de adaptação e desejo de aprender novas tecnologias.', 'tatiane.costa@gmail.com'),
(61, 'TechPro', 'Carlos Santos', 'Vaga para desenvolvedor júnior com experiência em sistemas de gestão e ERP. Conhecimento em PHP e MySQL é desejável.', 3200.00, 'Boa capacidade de resolução de problemas e desejo de crescer profissionalmente.', 'carlos.santos@gmail.com'),
(62, 'Innovative Systems', 'Juliana Silva', 'Desenvolvedor júnior para projetos de software de análise de dados. Conhecimento em SQL é um diferencial.', 3100.00, 'Habilidade analítica e desejo de aprender novas técnicas e ferramentas.', 'juliana.silva@gmail.com'),
(63, 'CodeWorks', 'Bruno Costa', 'Vaga para desenvolvedor júnior com foco em desenvolvimento de software para dispositivos móveis. Conhecimento em Kotlin é desejável.', 3300.00, 'Interesse por desenvolvimento de aplicativos móveis e boa comunicação.', 'bruno.costa@gmail.com'),
(64, 'NextTech', 'Mariana Almeida', 'Desenvolvedor júnior para atuar em projetos de software e sistemas integrados. Conhecimento em Java é um diferencial.', 3200.00, 'Capacidade de trabalhar bem em equipe e desejo de aprender novas tecnologias.', 'mariana.almeida@gmail.com'),
(65, 'TechSavvy', 'Rafael Oliveira', 'Vaga para desenvolvedor júnior com foco em desenvolvimento web e mobile. Conhecimento em React é desejável.', 3100.00, 'Criatividade e capacidade de se adaptar a diferentes tecnologias.', 'rafael.oliveira@gmail.com'),
(66, 'Innovate IT', 'Luciana Lima', 'Desenvolvedor júnior para projetos de software para educação e e-learning. Conhecimento em HTML5 e CSS3 é um plus.', 3300.00, 'Interesse por tecnologia educacional e boas habilidades de resolução de problemas.', 'luciana.lima@gmail.com'),
(67, 'BrightFuture', 'Eduardo Costa', 'Vaga para desenvolvedor júnior com foco em desenvolvimento de software e suporte técnico. Conhecimento em PHP e MySQL é desejável.', 3200.00, 'Boa capacidade de comunicação e desejo de aprender novas ferramentas.', 'eduardo.costa@gmail.com'),
(68, 'FutureTech', 'Roberta Pereira', 'Desenvolvedor júnior para atuar em projetos de desenvolvimento de software para dispositivos móveis. Conhecimento em Flutter é um diferencial.', 3400.00, 'Capacidade de trabalhar em equipe e entusiasmo por novas tecnologias.', 'roberta.pereira@gmail.com'),
(69, 'WebNexus', 'Felipe Almeida', 'Desenvolvedor júnior para projetos de desenvolvimento de software e integração de sistemas. Conhecimento em Python é desejável.', 3300.00, 'Boa capacidade analítica e interesse por novos desafios.', 'felipe.almeida@gmail.com'),
(70, 'TechGenie', 'Camila Santos', 'Vaga para desenvolvedor júnior com experiência em desenvolvimento de jogos e aplicativos. Conhecimento em Unity é um plus.', 3200.00, 'Criatividade e capacidade de resolver problemas complexos.', 'camila.santos@gmail.com'),
(71, 'CodeCrafter', 'Marcos Silva', 'Desenvolvedor júnior para trabalhar em projetos de software e manutenção de sistemas. Conhecimento em Java é desejado.', 3100.00, 'Boa capacidade de resolução de problemas e desejo de crescer na carreira.', 'marcos.silva@gmail.com'),
(72, 'FutureTech', 'Ana Costa', 'Vaga para desenvolvedor júnior com foco em desenvolvimento de software para educação. Conhecimento em JavaScript é um diferencial.', 3300.00, 'Entusiasmo por tecnologia educacional e capacidade de trabalhar bem em equipe.', 'ana.costa@gmail.com'),
(73, 'Innovative Solutions', 'Paula Silva', 'Desenvolvedor júnior para projetos de desenvolvimento de software e automação. Conhecimento em Python e SQL é desejável.', 3200.00, 'Interesse por automação e boas habilidades analíticas.', 'paula.silva@gmail.com'),
(74, 'TechFuture', 'Lucas Pereira', 'Vaga para desenvolvedor júnior com experiência em desenvolvimento web e aplicativos. Conhecimento em React e React Native é um diferencial.', 3300.00, 'Criatividade e capacidade de aprender novas ferramentas e técnicas.', 'lucas.pereira@gmail.com'),
(75, 'BrightTech', 'Juliana Lima', 'Desenvolvedor júnior para atuar em projetos de desenvolvimento de software e análise de dados. Conhecimento em SQL é desejável.', 3100.00, 'Boa capacidade de comunicação e interesse em análise de dados.', 'juliana.lima@gmail.com'),
(76, 'TechNet', 'Gustavo Costa', 'Vaga para desenvolvedor júnior com foco em sistemas de gestão e automação. Conhecimento em Java é um diferencial.', 3200.00, 'Boa capacidade analítica e desejo de aprender novas tecnologias.', 'gustavo.costa@gmail.com'),
(77, 'CodeWorks', 'Fernanda Oliveira', 'Desenvolvedor júnior para atuar em projetos de software e integração de sistemas. Conhecimento em PHP é desejável.', 3300.00, 'Capacidade de trabalhar bem em equipe e interesse por novos desafios.', 'fernanda.oliveira@gmail.com'),
(78, 'Innovate Systems', 'Rodrigo Pereira', 'Vaga para desenvolvedor júnior com foco em desenvolvimento de software e aplicativos móveis. Conhecimento em Kotlin é um diferencial.', 3200.00, 'Entusiasmo por desenvolvimento de aplicativos e boa capacidade de resolução de problemas.', 'rodrigo.pereira@gmail.com'),
(79, 'TechSavvy', 'Amanda Almeida', 'Desenvolvedor júnior para atuar em projetos de desenvolvimento de software e manutenção de sistemas. Conhecimento em Python é desejável.', 3300.00, 'Boa capacidade de comunicação e desejo de aprender novas ferramentas.', 'amanda.almeida@gmail.com'),
(80, 'BrightFuture', 'Marcelly Costa', 'Vaga para desenvolvedor júnior com foco em desenvolvimento web e integração de sistemas. Conhecimento em JavaScript é desejável.', 3100.00, 'Criatividade e capacidade de trabalhar em equipe.', 'marcelly.costa@gmail.com'),
(81, 'Innovate IT', 'Lucas Rodrigues', 'Desenvolvedor júnior para projetos de software e desenvolvimento de aplicativos. Conhecimento em Flutter é um diferencial.', 3400.00, 'Boa capacidade analítica e desejo de crescer profissionalmente.', 'lucas.rodrigues@gmail.com'),
(82, 'TechGenie', 'Sofia Santos', 'Procuramos um desenvolvedor júnior para trabalhar em projetos de software para dispositivos móveis. Conhecimento em React Native é desejável.', 3200.00, 'Capacidade de aprender rapidamente e interesse por desenvolvimento de aplicativos móveis.', 'sofia.santos@gmail.com'),
(83, 'FutureWorks', 'Tatiane Lima', 'Desenvolvedor júnior para atuar em projetos de desenvolvimento de software e sistemas integrados. Conhecimento em Python é desejável.', 3300.00, 'Boa capacidade de resolução de problemas e desejo de crescer na carreira.', 'tatiane.lima@gmail.com'),
(84, 'WebNexus', 'Eduardo Ferreira', 'Vaga para desenvolvedor júnior com foco em desenvolvimento de software e manutenção de sistemas. Conhecimento em PHP e MySQL é um diferencial.', 3100.00, 'Entusiasmo por desenvolvimento de software e boas habilidades analíticas.', 'eduardo.ferreira@gmail.com'),
(85, 'TechFuture', 'Paula Costa', 'Desenvolvedor júnior para projetos de automação de processos e integração de sistemas. Conhecimento em Java é desejável.', 3200.00, 'Boa capacidade de comunicação e desejo de aprender novas ferramentas.', 'paula.costa@gmail.com'),
(86, 'Innovative Solutions', 'Rodrigo Santos', 'Vaga para desenvolvedor júnior com foco em desenvolvimento de software e aplicativos móveis. Conhecimento em Kotlin é um diferencial.', 3300.00, 'Capacidade de trabalhar bem em equipe e interesse por novos desafios.', 'rodrigo.santos@gmail.com'),
(87, 'TechSavvy', 'Giovana Lima', 'Desenvolvedor júnior para atuar em projetos de software e análise de dados. Conhecimento em SQL é desejável.', 3100.00, 'Habilidade analítica e desejo de aprender novas técnicas e ferramentas.', 'giovana.lima@gmail.com'),
(88, 'BrightTech', 'Bruno Santos', 'Vaga para desenvolvedor júnior com foco em desenvolvimento de aplicativos móveis e web. Conhecimento em Flutter é desejável.', 3400.00, 'Capacidade de se adaptar a novas tecnologias e bom trabalho em equipe.', 'bruno.santos@gmail.com'),
(89, 'Innovate IT', 'Juliana Rodrigues', 'Desenvolvedor júnior para projetos de software e manutenção de sistemas. Conhecimento em Python é desejável.', 3300.00, 'Boa capacidade de comunicação e interesse por desenvolvimento de software.', 'juliana.rodrigues@gmail.com'),
(90, 'FutureTech', 'André Costa', 'Vaga para desenvolvedor júnior com foco em desenvolvimento web e mobile. Conhecimento em React Native é um diferencial.', 3200.00, 'Criatividade e desejo de aprender novas ferramentas e técnicas.', 'andré.costa@gmail.com'),
(91, 'TechGenie', 'Natalia Silva', 'Desenvolvedor júnior para projetos de software e integração de sistemas. Conhecimento em PHP e MySQL é desejável.', 3100.00, 'Boa capacidade analítica e desejo de crescer na carreira.', 'natalia.silva@gmail.com'),
(92, 'BrightFuture', 'Felipe Almeida', 'Vaga para desenvolvedor júnior com foco em desenvolvimento de software para educação. Conhecimento em HTML5 e CSS3 é desejável.', 3300.00, 'Entusiasmo por tecnologia educacional e boas habilidades de comunicação.', 'felipe.almeida@gmail.com'),
(93, 'TechSavvy', 'Mariana Costa', 'Desenvolvedor júnior para atuar em projetos de desenvolvimento de software e manutenção de sistemas. Conhecimento em Java é desejável.', 3200.00, 'Boa capacidade de resolução de problemas e desejo de aprender novas ferramentas.', 'mariana.costa@gmail.com'),
(94, 'FutureWorks', 'Eduardo Silva', 'Desenvolvedor júnior para projetos de software e aplicativos móveis. Conhecimento em Kotlin é um diferencial.', 3100.00, 'Interesse por desenvolvimento de aplicativos e capacidade de aprender rapidamente.', 'eduardo.silva@gmail.com'),
(95, 'TechNet', 'Patrícia Almeida', 'Vaga para desenvolvedor júnior com foco em desenvolvimento de software para sistemas empresariais. Conhecimento em .NET é desejável.', 3300.00, 'Boa capacidade de comunicação e desejo de crescer na carreira.', 'patrícia.almeida@gmail.com'),
(96, 'Innovative Systems', 'Roberta Ferreira', 'Desenvolvedor júnior para atuar em projetos de automação e integração de sistemas. Conhecimento em Python é um diferencial.', 3200.00, 'Capacidade de resolver problemas complexos e interesse por automação.', 'roberta.ferreira@gmail.com'),
(97, 'FutureTech', 'Daniel Oliveira', 'Desenvolvedor júnior para projetos de desenvolvimento de software e sistemas integrados. Conhecimento em React é desejável.', 3100.00, 'Boa capacidade de adaptação e desejo de aprender novas tecnologias.', 'daniel.oliveira@gmail.com'),
(98, 'TechGenie', 'Tatiane Lima', 'Vaga para desenvolvedor júnior com foco em desenvolvimento de aplicativos móveis e web. Conhecimento em Flutter é desejável.', 3400.00, 'Criatividade e interesse por novas tecnologias.', 'tatiane.lima@gmail.com'),
(99, 'BrightFuture', 'Lucas Costa', 'Desenvolvedor júnior para trabalhar com desenvolvimento de software e manutenção de sistemas. Conhecimento em JavaScript é um diferencial.', 3200.00, 'Boa capacidade de comunicação e desejo de aprender novas técnicas.', 'lucas.costa@gmail.com'),
(100, 'FutureWorks', 'Giovana Santos', 'Vaga para desenvolvedor júnior com foco em desenvolvimento de software para gestão empresarial. Conhecimento em PHP é desejável.', 3300.00, 'Boa capacidade analítica e desejo de crescer na carreira.', 'giovana.santos@gmail.com'),
(101, 'TechSavvy', 'Juliana Pereira', 'Desenvolvedor júnior para atuar em projetos de software e desenvolvimento de aplicativos. Conhecimento em React Native é um diferencial.', 3100.00, 'Criatividade e capacidade de se adaptar a novas tecnologias.', 'juliana.pereira@gmail.com'),
(102, 'Innovate IT', 'Rafael Almeida', 'Desenvolvedor júnior para projetos de desenvolvimento de software e integração de sistemas. Conhecimento em Python é desejável.', 3200.00, 'Boa capacidade de resolução de problemas e desejo de aprender novas ferramentas.', 'rafael.almeida@gmail.com'),
(103, 'TechGenie', 'Sofia Lima', 'Procuramos um desenvolvedor júnior para trabalhar em projetos de desenvolvimento de software para dispositivos móveis. Conhecimento em Kotlin é um diferencial.', 3300.00, 'Capacidade de trabalhar bem em equipe e interesse por desenvolvimento de aplicativos móveis.', 'sofia.lima@gmail.com'),
(104, 'BrightFuture', 'Carlos Costa', 'Vaga para desenvolvedor júnior com foco em desenvolvimento de software e manutenção de sistemas. Conhecimento em Java é desejável.', 3100.00, 'Boa capacidade analítica e desejo de aprender novas técnicas.', 'carlos.costa@gmail.com'),
(105, 'TechSavvy', 'Fernanda Rodrigues', 'Desenvolvedor júnior para projetos de software e análise de dados. Conhecimento em SQL é um diferencial.', 3200.00, 'Habilidade analítica e desejo de crescer profissionalmente.', 'fernanda.rodrigues@gmail.com'),
(106, 'FutureTech', 'Eduardo Silva', 'Desenvolvedor júnior para atuar em projetos de desenvolvimento de software e sistemas integrados. Conhecimento em React é desejável.', 3300.00, 'Criatividade e capacidade de aprender novas tecnologias.', 'eduardo.silva@gmail.com'),
(107, 'Innovative Solutions', 'Mariana Costa', 'Vaga para desenvolvedor júnior com foco em desenvolvimento de software e automação. Conhecimento em Python e SQL é desejável.', 3200.00, 'Boa capacidade analítica e desejo de aprender novas ferramentas.', 'mariana.costa@gmail.com'),
(108, 'TechGenie', 'Lucas Almeida', 'Desenvolvedor júnior para projetos de desenvolvimento de software e aplicativos móveis. Conhecimento em Flutter é um diferencial.', 3100.00, 'Capacidade de resolver problemas e desejo de crescer profissionalmente.', 'lucas.almeida@gmail.com'),
(109, 'BrightFuture', 'Tatiane Lima', 'Vaga para desenvolvedor júnior com foco em desenvolvimento de software para educação. Conhecimento em HTML5 e CSS3 é desejável.', 3200.00, 'Entusiasmo por tecnologia educacional e boas habilidades de comunicação.', 'tatiane.lima@gmail.com');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `vagas_emprego`
--
ALTER TABLE `vagas_emprego`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `vagas_emprego`
--
ALTER TABLE `vagas_emprego`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
