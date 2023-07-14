-- phpMyAdmin SQL Dump
-- version 5.1.2
-- https://www.phpmyadmin.net/
--
-- ホスト: localhost:3306
-- 生成日時: 2023-07-14 08:14:53
-- サーバのバージョン： 5.7.24
-- PHP のバージョン: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `todo`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `task`
--

CREATE TABLE `task` (
  `id` int(11) NOT NULL,
  `title` varchar(20) NOT NULL,
  `created_at` datetime NOT NULL,
  `status_id` int(11) NOT NULL,
  `memo` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `task`
--

INSERT INTO `task` (`id`, `title`, `created_at`, `status_id`, `memo`) VALUES
(1, '経済学1のレポート', '2023-07-11 17:03:32', 1, '月末までに教授の部屋にもっていく'),
(2, '保証会社に更新料を振り込む', '2023-07-11 17:12:17', 1, '更新料は10000円。振込先はりそな銀行で店舗は新大阪店。'),
(3, '先輩のお別れ会の準備', '2023-07-11 17:15:33', 2, '色紙はお別れ会の2日前までに完成させる。当日の参加人数をもとに会場を決める'),
(4, 'ワイシャツをクリーニングに出す', '2023-07-13 17:23:28', 1, 'クリーニングは17時にしまる');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `task`
--
ALTER TABLE `task`
  ADD PRIMARY KEY (`id`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `task`
--
ALTER TABLE `task`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
