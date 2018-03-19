-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2017 年 04 月 09 日 01:35
-- 服务器版本: 5.5.24-log
-- PHP 版本: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `bigdata`
--

-- --------------------------------------------------------

--
-- 表的结构 `data_user`
--

CREATE TABLE IF NOT EXISTS `data_user` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `uname` varchar(100) CHARACTER SET latin1 NOT NULL,
  `utelphone` int(50) NOT NULL,
  `upwd` varchar(50) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- 转存表中的数据 `data_user`
--

INSERT INTO `data_user` (`uid`, `uname`, `utelphone`, `upwd`) VALUES
(1, '1412840107', 2147483647, '123456');

-- --------------------------------------------------------

--
-- 表的结构 `diseastypes`
--

CREATE TABLE IF NOT EXISTS `diseastypes` (
  `did` int(3) NOT NULL AUTO_INCREMENT,
  `dname` varchar(20) NOT NULL,
  `dsum` varchar(5) NOT NULL,
  PRIMARY KEY (`did`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- 转存表中的数据 `diseastypes`
--

INSERT INTO `diseastypes` (`did`, `dname`, `dsum`) VALUES
(1, '痔疮', '10000'),
(2, '禽流感', '7300');

-- --------------------------------------------------------

--
-- 表的结构 `recipe`
--

CREATE TABLE IF NOT EXISTS `recipe` (
  `rid` int(3) NOT NULL AUTO_INCREMENT,
  `rname` varchar(300) NOT NULL,
  `did` int(3) NOT NULL,
  `effect1` int(4) NOT NULL,
  `effect2` int(4) NOT NULL,
  `effect3` int(4) NOT NULL,
  PRIMARY KEY (`rid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- 转存表中的数据 `recipe`
--

INSERT INTO `recipe` (`rid`, `rname`, `did`, `effect1`, `effect2`, `effect3`) VALUES
(1, '银黄口服液、降脂增蛋散 ', 1, 600, 700, 1000),
(2, '乌药、大黄、当归、血竭、地榆各150克，黄柏、菖蒲、红花各75克，黄连15克，冰片、枯矾各50克。'', 0, 600, 820, 1030),', 1, 600, 820, 1030),
(3, '双黄连口服液、板清颗粒', 1, 580, 900, 880),
(4, '荆防败毒散、银翘散、维生素C泡腾片', 1, 500, 1020, 980),
(5, '蝉蜕15克，冰片12克，麻油30毫升', 2, 580, 900, 880),
(6, '银黄注射液、清瘟败毒片', 2, 770, 1000, 500),
(7, '麝香、熊胆、冰片、猬皮各0.3克', 2, 600, 700, 1000);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
