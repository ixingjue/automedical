set charset utf8;
CREATE TABLE `lyb` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `biaoti` varchar(200) NOT NULL,
  `neirong` text NOT NULL,
  `touxiang` varchar(200) NOT NULL,
  `nicheng` varchar(100) NOT NULL,
  `time` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
insert into `lyb`(`id`,`biaoti`,`neirong`,`touxiang`,`nicheng`,`time`) values('1','²âÊÔ±êÌâ','²âÊÔÄÚÈÝ','03','²âÊÔêÇ³Æ','1295602131');
