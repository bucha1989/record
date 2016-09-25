DROP TABLE general;nnCREATE TABLE `general` (
  `id` int(7) NOT NULL AUTO_INCREMENT,
  `date` varchar(10) DEFAULT NULL,
  `time` time DEFAULT NULL,
  `point` int(3) DEFAULT NULL,
  `box` int(1) DEFAULT NULL,
  `auto` varchar(64) DEFAULT NULL,
  `name` varchar(32) DEFAULT NULL,
  `phone` varchar(32) DEFAULT NULL,
  `storage` varchar(10) DEFAULT NULL,
  `note` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=362 DEFAULT CHARSET=utf8;nnINSERT INTO general VALUES("360","2016-06-17","13:00:00","3","2","Митсубиши падже","Сергей","050-232-32-32","1212","121222122");nINSERT INTO general VALUES("361","2016-06-17","11:00:00","10","1","Mazda","Сергей","","","");nnnn