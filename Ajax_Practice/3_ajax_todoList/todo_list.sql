CREATE TABLE IF NOT EXISTS `todo_list` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(500) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;


INSERT INTO `todo_list` (`id`, `title`) VALUES
(1, 'Testing1'),
(2, 'Testing2'),
(4, 'Testing3'),
(5, 'Testing4');
