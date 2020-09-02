-- phpMyAdmin SQL Dump
-- version 4.9.3
-- https://www.phpmyadmin.net/
--
-- 主機： localhost:8889
-- 產生時間： 2020 年 09 月 02 日 02:34
-- 伺服器版本： 5.7.26
-- PHP 版本： 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- 資料庫： `bank`
create database bank default character set utf8;

use bank;
--

-- --------------------------------------------------------

--
-- 資料表結構 `details`
--

CREATE TABLE `details` (
  `uID` int(11) UNSIGNED NOT NULL,
  `Date` datetime DEFAULT NULL,
  `type` varchar(20) NOT NULL,
  `money` smallint(6) NOT NULL DEFAULT '0',
  `balance` smallint(6) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 資料表結構 `member`
--

CREATE TABLE `member` (
  `uID` int(11) UNSIGNED NOT NULL,
  `unumber` varchar(20) NOT NULL,
  `uPasswd` varchar(50) DEFAULT NULL,
  `uName` varchar(20) NOT NULL DEFAULT '',
  `total` smallint(6) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `details`
--
ALTER TABLE `details`
  ADD KEY `fk_member_details` (`uID`);

--
-- 資料表索引 `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`uID`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `member`
--
ALTER TABLE `member`
  MODIFY `uID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 已傾印資料表的限制式
--

--
-- 資料表的限制式 `details`
--
ALTER TABLE `details`
  ADD CONSTRAINT `fk_member_details` FOREIGN KEY (`uID`) REFERENCES `member` (`uID`) ON DELETE CASCADE ON UPDATE CASCADE;
