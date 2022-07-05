-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Lug 05, 2022 alle 10:58
-- Versione del server: 10.4.24-MariaDB
-- Versione PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hmw1`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `likes`
--

CREATE TABLE `likes` (
  `idutente` int(11) NOT NULL,
  `idpost` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `likes`
--

INSERT INTO `likes` (`idutente`, `idpost`) VALUES
(20, 18),
(20, 17),
(65, 16);

--
-- Trigger `likes`
--
DELIMITER $$
CREATE TRIGGER `trigger_dei_like` AFTER INSERT ON `likes` FOR EACH ROW BEGIN
UPDATE posts
SET nlikes = nlikes + 1
WHERE id = new.idpost;

END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `trigger_dei_nolike` AFTER DELETE ON `likes` FOR EACH ROW BEGIN
UPDATE posts
SET nlikes = nlikes - 1
WHERE id = old.idpost;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struttura della tabella `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `Utente` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp(),
  `nlikes` int(11) DEFAULT 0,
  `ncomments` int(11) DEFAULT 0,
  `content` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`content`))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `posts`
--

INSERT INTO `posts` (`id`, `Utente`, `time`, `nlikes`, `ncomments`, `content`) VALUES
(16, 20, '2022-06-06 16:05:39', 1, 0, '{\"immagine\":\"aHR0cHM6Ly9mb29kaXNoLWFwaS5oZXJva3VhcHAuY29tL2ltYWdlcy9kZXNzZXJ0L2Rlc3NlcnQzNS5qcGc=\",\"titolo\":\"Fragola\",\"post\":\"Fragola buona\"}'),
(17, 20, '2022-06-06 16:22:11', 1, 0, '{\"immagine\":\"aHR0cHM6Ly9mb29kaXNoLWFwaS5oZXJva3VhcHAuY29tL2ltYWdlcy9idXJnZXIvYnVyZ2VyODAuanBn\",\"titolo\":\"Panino\",\"post\":\"Panino imbottito sostanzioso\"}'),
(18, 25, '2022-06-06 16:23:11', 1, 0, '{\"immagine\":\"aHR0cHM6Ly9mb29kaXNoLWFwaS5oZXJva3VhcHAuY29tL2ltYWdlcy9iaXJ5YW5pL2Jpcnlhbmk3Ny5qcGc=\",\"titolo\":\"Riso Indiano\",\"post\":\"Riso non buono\"}'),
(20, 7, '2022-07-01 14:17:26', 0, 0, '{\"immagine\":\"aHR0cHM6Ly9mb29kaXNoLWFwaS5oZXJva3VhcHAuY29tL2ltYWdlcy9zYW1vc2Evc2Ftb3NhMTguanBn\",\"titolo\":\"Panzerotti Ripieni\",\"post\":\"Provati alla torretta, buonissimi\"}'),
(21, 20, '2022-07-02 14:32:24', 0, 0, '{\"immagine\":\"aHR0cHM6Ly9mb29kaXNoLWFwaS5oZXJva3VhcHAuY29tL2ltYWdlcy9kZXNzZXJ0L2Rlc3NlcnQxMS5qcGc=\",\"titolo\":\"Faccine che ridono \",\"post\":\"Mangiate a carnevale\"}'),
(25, 65, '2022-07-04 17:06:16', 0, 0, '{\"immagine\":\"aHR0cHM6Ly9mb29kaXNoLWFwaS5oZXJva3VhcHAuY29tL2ltYWdlcy9kZXNzZXJ0L2Rlc3NlcnQzNi5qcGc=\",\"titolo\":\"Torta alle fragole\",\"post\":\"Buona ma da migliorare!\"}');

-- --------------------------------------------------------

--
-- Struttura della tabella `utente`
--

CREATE TABLE `utente` (
  `Nome` char(15) NOT NULL,
  `Cognome` char(15) NOT NULL,
  `mail` char(40) NOT NULL,
  `Password` char(15) NOT NULL,
  `Genere` char(1) DEFAULT NULL,
  `Username` varchar(15) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `utente`
--

INSERT INTO `utente` (`Nome`, `Cognome`, `mail`, `Password`, `Genere`, `Username`, `id`) VALUES
('Angelo', 'Cocuzza', 'angelo.cocuzza@hotmail.com', 'Angelo13@', 'm', 'Angelo3100', 7),
('Giovanni', 'Scelso', 'g.scelso@gmail.com', 'Giovanni07@', 'm', 'dirty_face', 18),
('Gaetano', 'Lo Monaco', 'gaetano66@yahoo.de', 'Gaet@555!', 'm', 'el_rabo', 19),
('Gianni', 'Celeste', 'gianni.celeste@hotmail.com', 'Gianni00##', 'm', 'Gianni00', 20),
('Ilario', 'Alicante', 'ilario06@gmail.com', 'Ilario09@', 'm', 'Ilario00', 25),
('Lorenzo', 'Basile', 'lollo13@gmail.com', 'Lorenzo16#', 'm', 'Lorum01', 28),
('Pippo', 'Paperino', 'pippopape@gmail.com', 'Eldsjdjj00#', 'm', 'monopoly77', 37),
('Paolo', 'Palo', 'paolo.palo@hotmail.com', 'Paolo12@@', 'm', 'Paolo00', 64),
('Ignazio', 'Ciciri', 'ignazio.ciciri@gmail.com', 'Ignazio00@@', 'm', 'Ignazio111', 65),
('Stefano', 'Mastroianni', 'stefano.mastroianni@gmail.com', 'Stefano00@', 'm', 'Stefano00', 68);

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `likes`
--
ALTER TABLE `likes`
  ADD KEY `utente` (`idutente`),
  ADD KEY `post` (`idpost`);

--
-- Indici per le tabelle `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Utente` (`Utente`);

--
-- Indici per le tabelle `utente`
--
ALTER TABLE `utente`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT per la tabella `utente`
--
ALTER TABLE `utente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `likes`
--
ALTER TABLE `likes`
  ADD CONSTRAINT `likes_ibfk_1` FOREIGN KEY (`idutente`) REFERENCES `utente` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `likes_ibfk_2` FOREIGN KEY (`idpost`) REFERENCES `posts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limiti per la tabella `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`Utente`) REFERENCES `utente` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
