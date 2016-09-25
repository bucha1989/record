DROP TABLE general;

CREATE TABLE `general` (
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
) ENGINE=InnoDB AUTO_INCREMENT=526 DEFAULT CHARSET=utf8;

INSERT INTO general VALUES("525","2016-06-21","14:00:00","10","1","Форд","Евгений","096-923-30-35","","");






