-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           5.5.56-MariaDB - mariadb.org binary distribution
-- OS do Servidor:               Win32
-- HeidiSQL Versão:              9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Copiando estrutura do banco de dados para roomtrax
CREATE DATABASE IF NOT EXISTS `roomtrax` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `roomtrax`;

-- Copiando estrutura para tabela roomtrax.historico
CREATE TABLE IF NOT EXISTS `historico` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `idUsuario` int(10) unsigned NOT NULL,
  `dataHistorico` datetime NOT NULL,
  `ip` varchar(15) NOT NULL,
  `host` varchar(90) NOT NULL,
  `navegador` varchar(130) NOT NULL,
  `comentario` varchar(80) NOT NULL,
  `url` varchar(220) NOT NULL,
  `detalhes` mediumtext,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=387 DEFAULT CHARSET=utf8 COMMENT='Tabela onde para guardarmos todas as ações geradas dentro do sistema.';

-- Copiando dados para a tabela roomtrax.historico: ~21 rows (aproximadamente)
/*!40000 ALTER TABLE `historico` DISABLE KEYS */;
INSERT INTO `historico` (`id`, `idUsuario`, `dataHistorico`, `ip`, `host`, `navegador`, `comentario`, `url`, `detalhes`) VALUES
	(362, 1, '2017-06-14 21:05:50', '127.0.0.1', 'terure.dev', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36', 'Usuário se deslogou do sistema.', 'http://roomtrax/logout', NULL),
	(363, 1, '2017-06-14 21:06:15', '127.0.0.1', 'terure.dev', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36', 'Usuário se logou no sistema.', 'http://roomtrax/login', NULL),
	(364, 1, '2017-06-14 21:08:50', '127.0.0.1', 'terure.dev', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36', 'Usuário se deslogou do sistema.', 'http://roomtrax/logout', NULL),
	(365, 1, '2017-06-14 21:22:36', '127.0.0.1', 'terure.dev', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36', 'Usuário se logou no sistema.', 'http://roomtrax/login', NULL),
	(366, 1, '2017-06-14 21:31:51', '127.0.0.1', 'terure.dev', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36', 'Usuário se deslogou do sistema.', 'http://roomtrax/logout', NULL),
	(367, 1, '2017-06-14 21:32:11', '127.0.0.1', 'terure.dev', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36', 'Usuário se logou no sistema.', 'http://roomtrax/login', NULL),
	(368, 1, '2017-06-14 23:07:52', '127.0.0.1', 'terure.dev', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36', 'Usuário se deslogou do sistema.', 'http://roomtrax/logout', NULL),
	(369, 1, '2017-06-14 23:08:03', '127.0.0.1', 'terure.dev', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36', 'Usuário se logou no sistema.', 'http://roomtrax/login', NULL),
	(370, 1, '2017-06-14 23:16:38', '127.0.0.1', 'terure.dev', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36', 'Usuário se deslogou do sistema.', 'http://roomtrax/logout', NULL),
	(371, 1, '2017-06-15 06:38:59', '127.0.0.1', 'terure.dev', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36', 'Usuário se logou no sistema.', 'http://roomtrax/login', NULL),
	(372, 1, '2017-06-15 07:02:05', '127.0.0.1', 'terure.dev', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36', 'Usuário se deslogou do sistema.', 'http://roomtrax/sair', NULL),
	(373, 1, '2017-06-15 07:02:34', '127.0.0.1', 'terure.dev', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36', 'Usuário se logou no sistema.', 'http://roomtrax/login', NULL),
	(374, 1, '2017-06-15 14:17:09', '127.0.0.1', 'terure.dev', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36', 'Usuário se deslogou do sistema.', 'http://roomtrax/sair', NULL),
	(375, 3, '2017-06-15 14:24:41', '127.0.0.1', 'terure.dev', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36', 'Usuário se deslogou do sistema.', 'http://roomtrax/sair', NULL),
	(376, 3, '2017-06-15 14:26:34', '127.0.0.1', 'terure.dev', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36', 'Usuário se logou no sistema.', 'http://roomtrax/login', NULL),
	(377, 3, '2017-06-15 14:29:13', '127.0.0.1', 'terure.dev', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36', 'Usuário se deslogou do sistema.', 'http://roomtrax/sair', NULL),
	(378, 1, '2017-06-15 14:29:26', '127.0.0.1', 'terure.dev', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36', 'Usuário se logou no sistema.', 'http://roomtrax/login', NULL),
	(379, 1, '2017-06-15 14:31:11', '127.0.0.1', 'terure.dev', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36', 'Usuário se deslogou do sistema.', 'http://roomtrax/sair', NULL),
	(380, 3, '2017-06-15 14:31:19', '127.0.0.1', 'terure.dev', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36', 'Usuário se logou no sistema.', 'http://roomtrax/login', NULL),
	(381, 3, '2017-06-15 14:31:31', '127.0.0.1', 'terure.dev', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36', 'Usuário se deslogou do sistema.', 'http://roomtrax/sair', NULL),
	(382, 1, '2017-06-15 14:31:43', '127.0.0.1', 'terure.dev', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36', 'Usuário se logou no sistema.', 'http://roomtrax/login', NULL),
	(383, 1, '2017-06-15 16:35:04', '127.0.0.1', 'terure.dev', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36', 'Usuário se deslogou do sistema.', 'http://roomtrax/sair', NULL),
	(384, 1, '2017-06-15 16:35:16', '127.0.0.1', 'terure.dev', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36', 'Usuário se logou no sistema.', 'http://roomtrax/login', NULL),
	(385, 1, '2017-06-15 16:43:33', '127.0.0.1', 'terure.dev', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36', 'Usuário se deslogou do sistema.', 'http://roomtrax/sair', NULL),
	(386, 1, '2017-06-15 16:43:57', '127.0.0.1', 'terure.dev', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36', 'Usuário se logou no sistema.', 'http://roomtrax/login', NULL);
/*!40000 ALTER TABLE `historico` ENABLE KEYS */;

-- Copiando estrutura para tabela roomtrax.reservas
CREATE TABLE IF NOT EXISTS `reservas` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `usuario` int(10) unsigned NOT NULL,
  `sala` int(10) unsigned NOT NULL,
  `observacao` tinytext NOT NULL,
  `inicio` datetime NOT NULL,
  `termino` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='Tabela onde guardaremos todas as reservas de salas.';

-- Copiando dados para a tabela roomtrax.reservas: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `reservas` DISABLE KEYS */;
INSERT INTO `reservas` (`id`, `usuario`, `sala`, `observacao`, `inicio`, `termino`) VALUES
	(2, 1, 10, '', '2017-06-22 13:00:00', '2017-06-22 14:00:00'),
	(4, 1, 11, '', '2017-06-22 14:00:00', '2017-06-22 15:00:00');
/*!40000 ALTER TABLE `reservas` ENABLE KEYS */;

-- Copiando estrutura para tabela roomtrax.salas
CREATE TABLE IF NOT EXISTS `salas` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `lotacao` smallint(5) unsigned NOT NULL,
  `projetor` bit(1) NOT NULL DEFAULT b'0',
  `som` bit(1) NOT NULL DEFAULT b'0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COMMENT='Tabela onde salvamos as Salas.';

-- Copiando dados para a tabela roomtrax.salas: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `salas` DISABLE KEYS */;
INSERT INTO `salas` (`id`, `nome`, `lotacao`, `projetor`, `som`) VALUES
	(10, 'Sala', 200, b'0', b'0'),
	(11, 'Megasala', 20000, b'1', b'1');
/*!40000 ALTER TABLE `salas` ENABLE KEYS */;

-- Copiando estrutura para tabela roomtrax.usuarios
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(120) NOT NULL,
  `email` varchar(120) NOT NULL,
  `senha` varchar(120) NOT NULL,
  `administrador` bit(1) NOT NULL DEFAULT b'0',
  `dataCriacao` datetime DEFAULT NULL,
  `dataExclusao` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COMMENT='Tabela com todos os usuários do sistema RoomTrax';

-- Copiando dados para a tabela roomtrax.usuarios: ~4 rows (aproximadamente)
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` (`id`, `nome`, `email`, `senha`, `administrador`, `dataCriacao`, `dataExclusao`) VALUES
	(1, 'Anderson Bargas', 'admin@admin.com', '$2y$13$UN2nLFLGQXeY9r8WSMBTi.Yyi5iZZeJa45CFqVtwRn9jdjLgje5ZK', b'1', '2017-06-13 20:25:58', NULL);
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
