-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- ホスト: localhost
-- 生成時間: 2010 年 6 月 21 日 22:04
-- サーバのバージョン: 5.1.41
-- PHP のバージョン: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- データベース: `07rd000`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `customer2`
--

CREATE TABLE IF NOT EXISTS `customer2` (
  `C_ID` int(5) NOT NULL AUTO_INCREMENT,
  `C_ID_Name` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `C_Name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `C_Address` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `C_Yoshin` mediumint(10) NOT NULL,
  `C_Other` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`C_ID`),
  UNIQUE KEY `C_ID` (`C_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- テーブルのデータをダンプしています `customer2`
--

INSERT INTO `customer2` (`C_ID`, `C_ID_Name`, `C_Name`, `C_Address`, `C_Yoshin`, `C_Other`) VALUES
(1, 'C_001', 'TDU商店', '埼玉県比企郡鳩山町石坂', 100000, '特記なし'),
(2, 'C_002', '高坂ストアー', '埼玉県東松山市高坂', 200000, '特記なし'),
(3, 'C_003', 'XXマート', '埼玉県坂戸市にっさい', 150000, '特記なし'),
(4, 'C_004', 'Great-A', '埼玉県坂戸市にっさい', 350000, '特記なし'),
(5, 'C_005', 'Super太郎', '東京都新宿区1-2-3', 500000, '特記なし');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
