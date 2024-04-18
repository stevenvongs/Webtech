CREATE DATABASE UserName;

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `UserName` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  );

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `UserName`, `Password`) VALUES
(1, 'johnsmith', 'john123');
INSERT INTO `user` (`id`, `UserName`, `Password`) VALUES
(2, 'johndoe', 'john1234');
INSERT INTO `user` (`id`, `UserName`, `Password`) VALUES
(3, 'emilysmith', 'ilovedog1');

