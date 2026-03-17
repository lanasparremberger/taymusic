-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 25/10/2025 às 05:20
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `trab6lanasparremberger`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `albuns`
--

CREATE TABLE `albuns` (
  `id_album` int(11) NOT NULL,
  `nome_album` varchar(80) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `albuns`
--

INSERT INTO `albuns` (`id_album`, `nome_album`) VALUES
(1, 'Taylor Swift (2006)'),
(2, 'Fearless (2008)'),
(3, 'The Taylor Swift Holiday Collection (2008)'),
(4, 'Speak Now (2010)'),
(5, 'Red (2012)'),
(6, '1989 (2014)'),
(7, 'reputation (2017)'),
(8, 'Lover (2019)'),
(9, 'Folklore (2020)'),
(10, 'evermore (2020)'),
(11, 'Fearless (Taylor\'s Version) (2021)'),
(12, 'Red (Taylor\'s Version) (2021)'),
(13, 'Midnights (The Til Dawn Edition) (2022)'),
(14, 'Speak Now (Taylor\'s Version) (2023)'),
(15, '1989 (Taylor\'s Version) (2023)'),
(16, 'THE TORTURED POESTS DEPARTAMENT: THE ANTHOLOGY (2024)'),
(17, 'The Life of a Showgirl (2025)'),
(18, 'Outros');

-- --------------------------------------------------------

--
-- Estrutura para tabela `chats`
--

CREATE TABLE `chats` (
  `id_chat` int(10) UNSIGNED NOT NULL,
  `id_enviou` int(10) UNSIGNED DEFAULT NULL,
  `id_recebeu` int(10) UNSIGNED DEFAULT NULL,
  `conteudo_chat` text DEFAULT NULL,
  `timestamp_chat` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `comentarios`
--

CREATE TABLE `comentarios` (
  `id_comentario` int(10) UNSIGNED NOT NULL,
  `conteudo_comentario` text DEFAULT NULL,
  `timestamp_comentario` timestamp NOT NULL DEFAULT current_timestamp(),
  `id_musica` int(11) DEFAULT NULL,
  `id_user` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `comentarios`
--

INSERT INTO `comentarios` (`id_comentario`, `conteudo_comentario`, `timestamp_comentario`, `id_musica`, `id_user`) VALUES
(3, 'tyjtjy', '2025-10-07 01:30:19', 21, 14),
(4, 'greknrfgle', '2025-10-07 01:31:07', 21, 14),
(5, 'ert', '2025-10-07 01:32:26', 21, 14),
(6, '6ur6ur', '2025-10-07 01:33:04', 21, 14),
(7, 'fyjdyjyh', '2025-10-07 01:33:55', 21, 13),
(12, 'fgsdzhbgf', '2025-10-13 21:45:54', 21, 15),
(14, 'hjghgj', '2025-10-13 21:58:11', 22, 13);

-- --------------------------------------------------------

--
-- Estrutura para tabela `favoritos`
--

CREATE TABLE `favoritos` (
  `id_favorito` int(10) UNSIGNED NOT NULL,
  `id_musica` int(11) DEFAULT NULL,
  `id_user` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `favoritos`
--

INSERT INTO `favoritos` (`id_favorito`, `id_musica`, `id_user`) VALUES
(1, 18, 13),
(3, 22, 12),
(6, 22, 13),
(7, 20, 13),
(8, 22, 15),
(9, 21, 14);

-- --------------------------------------------------------

--
-- Estrutura para tabela `generos`
--

CREATE TABLE `generos` (
  `id_genero` int(11) NOT NULL,
  `nome_genero` varchar(80) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `generos`
--

INSERT INTO `generos` (`id_genero`, `nome_genero`) VALUES
(1, 'Pop'),
(2, 'Synth-Pop'),
(3, 'Country'),
(4, 'Dream Pop'),
(5, 'Bubblegum Pop'),
(6, 'Pop Funk'),
(7, 'Indie Pop'),
(8, 'R&B'),
(9, 'Soft Rock'),
(10, 'Folk Rock'),
(11, 'Disco Pop'),
(12, 'Indie Folk'),
(13, 'Art Pop'),
(14, 'Emo Pop'),
(15, 'Folk'),
(16, 'Orquestral'),
(17, 'Gospel');

-- --------------------------------------------------------

--
-- Estrutura para tabela `like_comentarios`
--

CREATE TABLE `like_comentarios` (
  `id_like_comentario` int(10) UNSIGNED NOT NULL,
  `id_user` int(10) UNSIGNED DEFAULT NULL,
  `id_comentario` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `like_comentarios`
--

INSERT INTO `like_comentarios` (`id_like_comentario`, `id_user`, `id_comentario`) VALUES
(10, 13, 7),
(12, 13, 6),
(15, 12, 4),
(16, 12, 5),
(17, 12, 7),
(19, 15, 12),
(20, 15, 7),
(23, 14, 14);

-- --------------------------------------------------------

--
-- Estrutura para tabela `like_musicas`
--

CREATE TABLE `like_musicas` (
  `id_like` int(10) UNSIGNED NOT NULL,
  `id_user` int(10) UNSIGNED DEFAULT NULL,
  `id_musica` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `like_musicas`
--

INSERT INTO `like_musicas` (`id_like`, `id_user`, `id_musica`) VALUES
(17, 12, 19),
(44, 12, 21),
(28, 13, 18),
(26, 13, 19),
(31, 13, 20),
(30, 13, 21),
(39, 13, 22),
(47, 13, 33),
(38, 14, 18),
(36, 14, 19),
(35, 14, 20),
(34, 14, 21),
(37, 14, 22);

-- --------------------------------------------------------

--
-- Estrutura para tabela `musicas`
--

CREATE TABLE `musicas` (
  `id_musica` int(11) NOT NULL,
  `nome_musica` varchar(80) DEFAULT NULL,
  `numero_musica` varchar(20) DEFAULT NULL,
  `imagem_musica` varchar(100) DEFAULT NULL,
  `id_album` int(11) NOT NULL,
  `id_genero` int(11) NOT NULL,
  `id_user` int(6) UNSIGNED NOT NULL,
  `criado_em` timestamp NOT NULL DEFAULT current_timestamp(),
  `descricao_musica` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `musicas`
--

INSERT INTO `musicas` (`id_musica`, `nome_musica`, `numero_musica`, `imagem_musica`, `id_album`, `id_genero`, `id_user`, `criado_em`, `descricao_musica`) VALUES
(18, 'Actually Romantic', '7', 'upload/foto_musica/690618747afe994e5d67f979712c9cff.jpeg', 17, 9, 12, '2025-10-03 22:19:19', NULL),
(19, 'The Archer', '5', 'upload/foto_musica/7f1bc6b9c8dc5a854682448b1a50e8e6.jpg', 8, 1, 12, '2025-10-03 22:30:58', '<p>Ive been <em>the archer</em></p>'),
(20, 'The Life of a Showgirl', '12', 'upload/foto_musica/86ed2c12021289af508f82198b5568f0.webp', 17, 2, 12, '2025-10-04 04:29:44', 'But I&#039;m Imortal now'),
(21, 'Anti-Hero', '3', 'upload/foto_musica/7269788dcd67726b8ee4b91be6335ee0.jpg', 13, 2, 13, '2025-10-04 15:20:03', '<p>dvbfbng<strong>hnggn</strong></p>'),
(22, 'Don&#039;t Blame Me', '4', 'upload/foto_musica/c9ea21dea67426fb67d94eea5472662d.jpeg', 7, 17, 14, '2025-10-06 22:03:44', 'Album Producers: Max Martin, Shellback and Taylor Swift'),
(33, 'evermore', '15', 'upload/foto_musica/80e8522c7ea4ed98cf196adcc9a31a08.jpg', 10, 15, 13, '2025-10-15 21:35:31', '<p><span style=\"background-color: #fbeeb8;\"><em>quem dotou a ra&ccedil;a humana de tamanho sentimento</em></span></p>'),
(34, 'I Can Do It With a Broken Heart', '13', 'upload/foto_musica/eb9cff0d97e4bfc2c8dd988256f248ee.jpg', 16, 13, 13, '2025-10-15 21:39:40', '<p><span style=\"background-color: #eccafa;\">im so depressed, I act like its my birthday every day</span><br aria-hidden=\"true\"><span style=\"background-color: #eccafa;\">im so obsessed with him but he avoids me like the plague</span><br aria-hidden=\"true\"><span style=\"background-color: #eccafa;\">I cry a lot but I am so productive, its an art</span><br aria-hidden=\"true\"><span style=\"background-color: #eccafa;\">You know youre good when you can even do it</span><br aria-hidden=\"true\"><em><span style=\"background-color: #eccafa;\">With a broken heart</span></em></p>'),
(35, 'Out Of The Woods', '4', 'upload/foto_musica/1ceabc8f538452c35dfd028255ceb592.jpg', 6, 2, 14, '2025-10-15 21:42:30', '<p>aq o pop foi inventado</p>');

-- --------------------------------------------------------

--
-- Estrutura para tabela `seguidores`
--

CREATE TABLE `seguidores` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_seguiu` int(10) UNSIGNED DEFAULT NULL,
  `id_seguindo` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `seguidores`
--

INSERT INTO `seguidores` (`id`, `id_seguiu`, `id_seguindo`) VALUES
(27, 13, 12),
(29, 13, 14),
(30, 14, 13);

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id_user` int(6) UNSIGNED NOT NULL,
  `nome_user` varchar(80) DEFAULT NULL,
  `nascimento_user` date DEFAULT NULL,
  `user_user` varchar(50) DEFAULT NULL,
  `email_user` varchar(255) DEFAULT NULL,
  `senha_user` varchar(255) DEFAULT NULL,
  `imagem_user` varchar(255) DEFAULT NULL,
  `capa_user` varchar(255) DEFAULT NULL,
  `bio_user` text DEFAULT NULL,
  `token` varchar(255) DEFAULT NULL,
  `token_expiracao` datetime DEFAULT NULL,
  `timestamp_user` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`id_user`, `nome_user`, `nascimento_user`, `user_user`, `email_user`, `senha_user`, `imagem_user`, `capa_user`, `bio_user`, `token`, `token_expiracao`, `timestamp_user`) VALUES
(12, 'Lana', '2089-03-02', 'lana', 'lanasparremberger02@gmail.com', '$2y$10$Tu5G9gCh.IvF8.KA180itOU0uBgGuK8zCb3tK1qs78dtWfUP2lhZK', 'upload/foto_perfil/6a912b7d3367f418c896e136b70717c6.jpeg', 'upload/capa_perfil/6a912b7d3367f418c896e136b70717c6.jfif', 'GSDHG', NULL, NULL, '2025-10-03 22:12:52'),
(13, 'laninha', '2009-03-02', 'lenin13ts', 'lanasparremberger@gmail.com', '$2y$10$2w5vtBGkRz9y8kF.Hf5/nei9PYtIeOyza5Fo9IAXBeqdNRmkWqysG', 'upload/foto_perfil/1ebcd2fc033199dfda8ff1db62c12dbc.jpg', 'upload/capa_perfil/e17d9174ab08395909c406a3575d09ab.jpg', 'i had the time of my life with you', NULL, NULL, '2025-10-04 04:38:38'),
(14, 'blabla', '0000-00-00', 'anakin123', 'anakin@g123', '$2y$10$f.IVvWdFel3a1hDD6aZXR.jDl2n5x6wwqDS4ADzvofTnwxm9clrvS', 'upload/foto_perfil/d3ea1ad94fc1761c0d53f35c1f1cf451.jpg', 'upload/capa_perfil/d3ea1ad94fc1761c0d53f35c1f1cf451.jpeg', '', NULL, NULL, '2025-10-06 21:57:55'),
(15, 'Lana', '2009-03-02', 'bla', 'bla@gmail.com', '$2y$10$wRZ19Vqa6UyqxPWHRLwBguCXGDK.mtjXzIjQpsbMRYJJsHNygtG5C', 'upload/foto_perfil/b1f8d73b90937b324302aeac95512c69.webp', NULL, '', NULL, NULL, '2025-10-13 21:45:33');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `albuns`
--
ALTER TABLE `albuns`
  ADD PRIMARY KEY (`id_album`);

--
-- Índices de tabela `chats`
--
ALTER TABLE `chats`
  ADD PRIMARY KEY (`id_chat`),
  ADD KEY `id_enviou` (`id_enviou`),
  ADD KEY `id_recebeu` (`id_recebeu`);

--
-- Índices de tabela `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`id_comentario`),
  ADD KEY `id_musica` (`id_musica`),
  ADD KEY `id_user` (`id_user`);

--
-- Índices de tabela `favoritos`
--
ALTER TABLE `favoritos`
  ADD PRIMARY KEY (`id_favorito`),
  ADD KEY `id_musica` (`id_musica`),
  ADD KEY `id_user` (`id_user`);

--
-- Índices de tabela `generos`
--
ALTER TABLE `generos`
  ADD PRIMARY KEY (`id_genero`);

--
-- Índices de tabela `like_comentarios`
--
ALTER TABLE `like_comentarios`
  ADD PRIMARY KEY (`id_like_comentario`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_comentario` (`id_comentario`);

--
-- Índices de tabela `like_musicas`
--
ALTER TABLE `like_musicas`
  ADD PRIMARY KEY (`id_like`),
  ADD UNIQUE KEY `id_user` (`id_user`,`id_musica`),
  ADD KEY `id_musica` (`id_musica`);

--
-- Índices de tabela `musicas`
--
ALTER TABLE `musicas`
  ADD PRIMARY KEY (`id_musica`),
  ADD KEY `id_album` (`id_album`),
  ADD KEY `id_genero` (`id_genero`),
  ADD KEY `id_user` (`id_user`);

--
-- Índices de tabela `seguidores`
--
ALTER TABLE `seguidores`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_seguiu` (`id_seguiu`),
  ADD KEY `id_seguindo` (`id_seguindo`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `user_user` (`user_user`),
  ADD UNIQUE KEY `email_user` (`email_user`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `albuns`
--
ALTER TABLE `albuns`
  MODIFY `id_album` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de tabela `chats`
--
ALTER TABLE `chats`
  MODIFY `id_chat` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `id_comentario` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de tabela `favoritos`
--
ALTER TABLE `favoritos`
  MODIFY `id_favorito` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `generos`
--
ALTER TABLE `generos`
  MODIFY `id_genero` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de tabela `like_comentarios`
--
ALTER TABLE `like_comentarios`
  MODIFY `id_like_comentario` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de tabela `like_musicas`
--
ALTER TABLE `like_musicas`
  MODIFY `id_like` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT de tabela `musicas`
--
ALTER TABLE `musicas`
  MODIFY `id_musica` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT de tabela `seguidores`
--
ALTER TABLE `seguidores`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_user` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `chats`
--
ALTER TABLE `chats`
  ADD CONSTRAINT `chats_ibfk_1` FOREIGN KEY (`id_enviou`) REFERENCES `usuarios` (`id_user`),
  ADD CONSTRAINT `chats_ibfk_2` FOREIGN KEY (`id_recebeu`) REFERENCES `usuarios` (`id_user`);

--
-- Restrições para tabelas `comentarios`
--
ALTER TABLE `comentarios`
  ADD CONSTRAINT `comentarios_ibfk_1` FOREIGN KEY (`id_musica`) REFERENCES `musicas` (`id_musica`),
  ADD CONSTRAINT `comentarios_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `usuarios` (`id_user`);

--
-- Restrições para tabelas `favoritos`
--
ALTER TABLE `favoritos`
  ADD CONSTRAINT `favoritos_ibfk_1` FOREIGN KEY (`id_musica`) REFERENCES `musicas` (`id_musica`),
  ADD CONSTRAINT `favoritos_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `usuarios` (`id_user`);

--
-- Restrições para tabelas `like_comentarios`
--
ALTER TABLE `like_comentarios`
  ADD CONSTRAINT `like_comentarios_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `usuarios` (`id_user`),
  ADD CONSTRAINT `like_comentarios_ibfk_2` FOREIGN KEY (`id_comentario`) REFERENCES `comentarios` (`id_comentario`);

--
-- Restrições para tabelas `like_musicas`
--
ALTER TABLE `like_musicas`
  ADD CONSTRAINT `like_musicas_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `usuarios` (`id_user`),
  ADD CONSTRAINT `like_musicas_ibfk_2` FOREIGN KEY (`id_musica`) REFERENCES `musicas` (`id_musica`);

--
-- Restrições para tabelas `musicas`
--
ALTER TABLE `musicas`
  ADD CONSTRAINT `musicas_ibfk_1` FOREIGN KEY (`id_album`) REFERENCES `albuns` (`id_album`),
  ADD CONSTRAINT `musicas_ibfk_2` FOREIGN KEY (`id_genero`) REFERENCES `generos` (`id_genero`),
  ADD CONSTRAINT `musicas_ibfk_3` FOREIGN KEY (`id_user`) REFERENCES `usuarios` (`id_user`);

--
-- Restrições para tabelas `seguidores`
--
ALTER TABLE `seguidores`
  ADD CONSTRAINT `seguidores_ibfk_1` FOREIGN KEY (`id_seguiu`) REFERENCES `usuarios` (`id_user`),
  ADD CONSTRAINT `seguidores_ibfk_2` FOREIGN KEY (`id_seguindo`) REFERENCES `usuarios` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
