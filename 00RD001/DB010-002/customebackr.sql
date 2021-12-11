-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- ホスト: localhost
-- 生成時間: 2011 年 6 月 14 日 11:17
-- サーバのバージョン: 5.1.41
-- PHP のバージョン: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- データベース: `09rd000`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `customer`
--

CREATE TABLE IF NOT EXISTS `customer` (
  `C_ID` int(5) NOT NULL,
  `C_Name` varchar(20) NOT NULL,
  `C_Address` varchar(40) NOT NULL,
  `C_Yoshin` varchar(10) NOT NULL,
  `C_URI` int(10) NOT NULL,
  `C_Other` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`C_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- テーブルのデータをダンプしています `customer`
--

INSERT INTO `customer` (`C_ID`, `C_Name`, `C_Address`, `C_Yoshin`, `C_URI`, `C_Other`) VALUES
(1, 'TDU商店', '埼玉県比企郡鳩山町石坂', '100000', 0, '特記なし'),
(2, '高坂ストアー', '埼玉県東松山市高坂', '200000', 0, '特記なし'),
(3, 'ＸＸマート', '埼玉県坂戸市にっさい', '150000', 0, '特記なし'),
(4, 'Great-A', '埼玉県坂戸市にっさい', '350000', 0, '特記なし'),
(30, 'Super太郎2', '東京都新宿区1-2-3', '555000', 0, '特記なし'),
(31, 'Super太郎3', '東京都新宿区4-5-6', '777000', 0, '特記なし'),
(100, 'Great-B', '千葉県市川市1-2-3', '200000', 0, '特記なし'),
(200, 'Great-A', '埼玉県坂戸市にっさい999', '200000', 0, '特記なし');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
