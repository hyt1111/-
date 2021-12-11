-- phpMyAdmin SQL Dump
-- version 2.11.1
-- http://www.phpmyadmin.net
--
-- ホスト: localhost
-- 生成時間: 2009 年 9 月 10 日 20:37
-- サーバのバージョン: 5.0.45
-- PHP のバージョン: 5.2.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- データベース: `07rd000`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `Uriage`
--

CREATE TABLE `Uriage` (
  `C_ID` int(5) NOT NULL,
  `C_ID_Name` varchar(10) collate utf8_unicode_ci NOT NULL,
  `C_Name` varchar(20) collate utf8_unicode_ci NOT NULL,
  `C_Kingaku` varchar(10) collate utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


INSERT INTO `Uriage` (`C_ID`, `C_ID_Name`, `C_Name`, `C_Kingaku`) VALUES
(1, 'C_001', 'TDU商店', '1000000'),
(2, 'C_002', '高坂ストアー','2000000'),
(3, 'C_003', 'XXマート', '500000'),
(4, 'C_004', 'Great-A', '1500000'),
(6, 'C_005', 'Super太郎', '4000000');
