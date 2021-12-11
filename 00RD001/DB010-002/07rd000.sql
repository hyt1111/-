-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- ホスト: localhost
-- 生成時間: 2010 年 6 月 22 日 11:19
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
-- テーブルの構造 `customer`
--

CREATE TABLE IF NOT EXISTS `customer` (
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
-- テーブルのデータをダンプしています `customer`
--

INSERT INTO `customer` (`C_ID`, `C_ID_Name`, `C_Name`, `C_Address`, `C_Yoshin`, `C_Other`) VALUES
(1, 'C_001', 'TDU商店', '埼玉県比企郡鳩山町石坂', 100000, '特記なし'),
(2, 'C_002', '高坂ストアー', '埼玉県東松山市高坂', 200000, '特記なし'),
(3, 'C_003', 'XXマート', '埼玉県坂戸市にっさい', 150000, '特記なし'),
(4, 'C_004', 'Great-A', '埼玉県坂戸市にっさい', 350000, '特記なし'),
(5, 'C_005', 'Super太郎', '東京都新宿区1-2-3', 500000, '特記なし');

-- --------------------------------------------------------

--
-- テーブルの構造 `customer2`
--

CREATE TABLE IF NOT EXISTS `customer2` (
  `C_ID` int(5) NOT NULL,
  `C_ID_Name` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `C_Name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `C_Address` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `C_Yoshin` mediumint(10) NOT NULL,
  `C_Other` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータをダンプしています `customer2`
--

INSERT INTO `customer2` (`C_ID`, `C_ID_Name`, `C_Name`, `C_Address`, `C_Yoshin`, `C_Other`) VALUES
(1, 'C_011', 'TDUマーケット', '群馬県比企郡鳩山町石坂', 200000, '特記なし'),
(2, 'C_012', '高坂電気', '群馬県東松山市高坂', 400000, '特記なし'),
(3, 'C_013', 'XX商会', '群馬県坂戸市にっさい', 250000, '特記なし'),
(4, 'C_014', 'Great-B', '群馬県坂戸市にっさい', 400000, '特記なし'),
(5, 'C_015', 'Super次郎', '東京都港区1-2-3', 700000, '特記なし');

-- --------------------------------------------------------

--
-- テーブルの構造 `goods`
--

CREATE TABLE IF NOT EXISTS `goods` (
  `G_ID` int(5) NOT NULL AUTO_INCREMENT,
  `G_Name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `G_Price` mediumint(10) NOT NULL,
  `G_Number` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `G_ZAIKO` int(5) NOT NULL,
  PRIMARY KEY (`G_ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- テーブルのデータをダンプしています `goods`
--

INSERT INTO `goods` (`G_ID`, `G_Name`, `G_Price`, `G_Number`, `G_ZAIKO`) VALUES
(1, '鉛筆鉛筆', 50, '0', 100),
(2, '消しゴム', 100, '0', 50),
(3, '定規', 120, '0', 10),
(4, 'ノート', 180, '0', 2);

-- --------------------------------------------------------

--
-- テーブルの構造 `new_customer`
--

CREATE TABLE IF NOT EXISTS `new_customer` (
  `C_ID` int(5) NOT NULL DEFAULT '0',
  `C_ID_Name` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `C_Name` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `C_Address` varchar(40) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `C_Yoshin` mediumint(11) NOT NULL,
  `C_Other` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `C_URI` int(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- テーブルのデータをダンプしています `new_customer`
--

INSERT INTO `new_customer` (`C_ID`, `C_ID_Name`, `C_Name`, `C_Address`, `C_Yoshin`, `C_Other`, `C_URI`) VALUES
(4, 'C_004', 'Great-A', '埼玉県坂戸市にっさい', 350000, '特記なし', 0);

-- --------------------------------------------------------

--
-- テーブルの構造 `uriage`
--

CREATE TABLE IF NOT EXISTS `uriage` (
  `C_ID` int(5) NOT NULL,
  `C_ID_Name` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `C_Name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `C_Kingaku` varchar(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータをダンプしています `uriage`
--

INSERT INTO `uriage` (`C_ID`, `C_ID_Name`, `C_Name`, `C_Kingaku`) VALUES
(1, 'C_001', 'TDU商店', '1000000'),
(2, 'C_002', '高坂ストアー', '2000000'),
(3, 'C_003', 'XXマート', '500000'),
(4, 'C_004', 'Great-A', '1500000'),
(6, 'C_005', 'Super太郎', '4000000');

-- --------------------------------------------------------

--
-- テーブルの構造 `view01`
--

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `07rd000`.`view01` AS select `07rd000`.`customer`.`C_ID` AS `C_ID`,`07rd000`.`customer`.`C_ID_Name` AS `C_ID_Name`,`07rd000`.`customer`.`C_Name` AS `C_Name`,`07rd000`.`customer`.`C_Yoshin` AS `C_Yoshin` from `07rd000`.`customer`;

--
-- テーブルのデータをダンプしています `view01`
--

INSERT INTO `view01` (`C_ID`, `C_ID_Name`, `C_Name`, `C_Yoshin`) VALUES
(1, 'C_001', 'TDU商店', 100000),
(2, 'C_002', '高坂ストアー', 200000),
(3, 'C_003', 'XXマート', 150000),
(4, 'C_004', 'Great-A', 350000),
(5, 'C_005', 'Super太郎', 500000);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
