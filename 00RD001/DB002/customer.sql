-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- ホスト: 127.0.0.1
-- 生成日時: 2013 年 5 月 21 日 04:37
-- サーバのバージョン: 5.5.27
-- PHP のバージョン: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- データベース: `00rd000`
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
  PRIMARY KEY (`C_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `customer`
--

INSERT INTO `customer` (`C_ID`, `C_Name`, `C_Address`, `C_Yoshin`) VALUES
(1, 'TDU商店', '埼玉県比企郡鳩山町石', '1000000'),
(2, '高坂ストア', '埼玉県東松山市高', '2000000'),
(3, 'XXマート', '埼玉県坂戸市にっさ', '3500000'),
(4, 'Great-A', '埼玉県坂戸市にっさ', '1500000'),
(5, 'Super太郎1', '東京都新宿区1-2-3', '555,000'),
(6, 'Super太郎2', '東京都新宿区4-5-6', '777,000');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
