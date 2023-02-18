-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2023-02-18 05:47:15
-- 伺服器版本： 10.4.27-MariaDB
-- PHP 版本： 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `53_1`
--

-- --------------------------------------------------------

--
-- 資料表結構 `type`
--

CREATE TABLE `type` (
  `id` int(4) UNSIGNED ZEROFILL NOT NULL,
  `itext` text NOT NULL,
  `ihtml` text NOT NULL,
  `Aort` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 傾印資料表的資料 `type`
--

INSERT INTO `type` (`id`, `itext`, `ihtml`, `Aort`) VALUES
(0004, '\n\n圖片\n相關連結\n\n\n商品名稱\n商品簡介\n發布日期\n費用\n\n', '\n            <div class=\"row\">\n                <div class=\"rimg\">圖片</div>\n                <div class=\"rlink\">相關連結</div>\n            </div>\n            <div class=\"row\">\n                <div class=\"rname\">商品名稱</div>\n                <div class=\"rintro\">商品簡介</div>\n                <div class=\"rdate\">發布日期</div>\n                <div class=\"rfee\">費用</div>\n            </div>  \n        ', 'A'),
(0005, '\n\n商品名稱\n圖片\n\n\n費用\n商品簡介\n發布日期\n相關連結\n\n', '\n            <div class=\"row ui-sortable\">\n                <div class=\"rname ui-sortable-handle\">商品名稱</div>\n                <div class=\"rimg ui-sortable-handle\">圖片</div>\n            </div>\n            <div class=\"row ui-sortable\">\n                <div class=\"rfee ui-sortable-handle\">費用</div>\n                <div class=\"rintro ui-sortable-handle\">商品簡介</div>\n                <div class=\"rdate ui-sortable-handle\">發布日期</div>\n                <div class=\"rlink ui-sortable-handle\">相關連結</div>\n            </div>  \n        ', 'A'),
(0006, '商品名稱\n圖片\n費用\n商品簡介\n發布日期\n相關連結', '\n            <div class=\"row ui-sortable\">\n                <div class=\"rname ui-sortable-handle\">商品名稱</div><div class=\"rimg ui-sortable-handle\" style=\"\">圖片</div>\n                \n            </div>\n            <div class=\"row ui-sortable\">\n                <div class=\"rfee ui-sortable-handle\">費用</div>\n                <div class=\"rintro ui-sortable-handle\">商品簡介</div>\n                <div class=\"rdate ui-sortable-handle\">發布日期</div>\n                <div class=\"rlink ui-sortable-handle\">相關連結</div>\n            </div>  \n        ', 'A'),
(0007, '商品名稱\n圖片\n商品簡介\n費用\n發布日期\n相關連結', '\n            <div class=\"row ui-sortable\">\n                <div class=\"rname ui-sortable-handle\">商品名稱</div>\n                <div class=\"rimg ui-sortable-handle\">圖片</div>\n            </div>\n            <div class=\"row ui-sortable\">\n                <div class=\"rintro ui-sortable-handle\" style=\"\">商品簡介</div><div class=\"rfee ui-sortable-handle\">費用</div>\n                \n                <div class=\"rdate ui-sortable-handle\">發布日期</div>\n                <div class=\"rlink ui-sortable-handle\">相關連結</div>\n            </div>  \n        ', 'A'),
(0008, '商品名稱\n圖片\n發布日期\n費用\n相關連結\n商品簡介', '\n            <div class=\"row ui-sortable\">\n                <div class=\"rname ui-sortable-handle\">商品名稱</div>\n                <div class=\"rimg ui-sortable-handle\">圖片</div>\n            </div>\n            <div class=\"row ui-sortable\">\n                <div class=\"rdate ui-sortable-handle\" style=\"\">發布日期</div><div class=\"rfee ui-sortable-handle\">費用</div>\n                <div class=\"rlink ui-sortable-handle\" style=\"\">相關連結</div><div class=\"rintro ui-sortable-handle\">商品簡介</div>\n                \n                \n            </div>  \n        ', 'A');

-- --------------------------------------------------------

--
-- 資料表結構 `user`
--

CREATE TABLE `user` (
  `id` int(4) UNSIGNED ZEROFILL NOT NULL,
  `account` text NOT NULL,
  `password` text NOT NULL,
  `name` text NOT NULL,
  `rank` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 傾印資料表的資料 `user`
--

INSERT INTO `user` (`id`, `account`, `password`, `name`, `rank`) VALUES
(0000, 'admin', '1234', '超級管理者', '管理者'),
(0003, 'bc', 'b', 'b', '一般使用者'),
(0004, 'c', 'c', 'c', '一般使用者');

-- --------------------------------------------------------

--
-- 資料表結構 `user_log_recd`
--

CREATE TABLE `user_log_recd` (
  `id` int(4) UNSIGNED ZEROFILL NOT NULL,
  `name` text NOT NULL,
  `action` text NOT NULL,
  `time` text NOT NULL,
  `sf` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 傾印資料表的資料 `user_log_recd`
--

INSERT INTO `user_log_recd` (`id`, `name`, `action`, `time`, `sf`) VALUES
(0001, 'admin', '登入', '04:05:02 2023/02/18', '成功');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `user_log_recd`
--
ALTER TABLE `user_log_recd`
  ADD PRIMARY KEY (`id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `type`
--
ALTER TABLE `type`
  MODIFY `id` int(4) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `user`
--
ALTER TABLE `user`
  MODIFY `id` int(4) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `user_log_recd`
--
ALTER TABLE `user_log_recd`
  MODIFY `id` int(4) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
