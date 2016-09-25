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
) ENGINE=InnoDB AUTO_INCREMENT=547 DEFAULT CHARSET=utf8;

INSERT INTO general VALUES("540","2016-08-02","12:00:00","10","1","Газель","Дмитрий","093-239-66-64","","");
INSERT INTO general VALUES("541","2016-08-10","12:00:00","10","1","Тойота","Николай","095-521-49-34","","Покупка шин 205 55 16 SX");
INSERT INTO general VALUES("546","2016-08-27","16:00:00","10","1","Ford","Евгений","099-930-27-73","","Балансировка");



