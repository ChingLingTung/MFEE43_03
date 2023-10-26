-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2023-10-26 09:11:16
-- 伺服器版本： 10.4.28-MariaDB
-- PHP 版本： 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `rides`
--

-- --------------------------------------------------------

--
-- 資料表結構 `amusement_ride`
--

CREATE TABLE `amusement_ride` (
  `amusement_ride_id` int(11) NOT NULL,
  `amusement_ride_name` varchar(100) NOT NULL,
  `amusement_ride_img` varchar(100) NOT NULL,
  `amusement_ride_longitude` varchar(100) NOT NULL,
  `amusement_ride_latitude` varchar(100) NOT NULL,
  `ride_category_id` int(11) NOT NULL,
  `thriller_rating` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `ride_support_id` int(11) NOT NULL,
  `theme_id` int(11) NOT NULL,
  `amusement_ride_description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='設施表格';

--
-- 傾印資料表的資料 `amusement_ride`
--

INSERT INTO `amusement_ride` (`amusement_ride_id`, `amusement_ride_name`, `amusement_ride_img`, `amusement_ride_longitude`, `amusement_ride_latitude`, `ride_category_id`, `thriller_rating`, `created_at`, `ride_support_id`, `theme_id`, `amusement_ride_description`) VALUES
(1, '八彩天梯', '水-八彩天梯.jpg', '21315', '54365', 3, 4, '2023-10-20 00:54:50', 1, 1, '在滑行墊上接受極速挑戰，先在神秘漆黑的密封迴旋管道中不停旋轉，到中段開放式管道時重見光明，但瞬間即向下高速俯衝至終點。滑道終點的計時器，讓大家可在不同滑道並列競賽，一較高下！'),
(2, '急流漩渦\n', '水-急流漩渦.jpg\n', '54353', '6532898', 3, 5, '2023-10-20 00:54:51', 1, 1, '與親朋友伴坐在巨型水泡中，衝入巨大湯碗中旋轉，感受由戶外玩到戶內的驚心動魄玩樂時刻，最後極速衝入漏斗，強大離心力令巨型水泡劇烈左右搖晃，刺激度爆表！\n'),
(12, '漂流探秘', '水-漂流探秘.jpg', '0256387', '5298634', 3, 1, '2023-10-20 00:54:51', 1, 1, '懶洋洋地躺在水泡上輕輕盪漾，展開一趟室內漂流之旅，享受與家人、好友的美好時光。'),
(13, '湧浪灣', '水-湧浪灣.jpg', '254838', '897968', 2, 3, '2023-10-20 00:54:51', 1, 1, '可以在戶外欣賞南區海岸美景，映襯著漣漪不斷的浪池，享受多種不同模式的人造海浪，不同刺激程度的人造海浪可讓大人小孩一起同遊。遠處的瀑布與流水更構建成優美的景致，極盡視覺享受。'),
(14, '深谷飛瀑', '水-深谷飛瀑.jpg', '57896676', '783687', 3, 5, '2023-10-20 00:54:51', 1, 1, '直立式滑梯挑戰你的膽量！深谷飛瀑讓你感受突然高速垂直飛墜的快感！'),
(69, '八彩天梯', '水-八彩天梯.jpg', '2564567', '86846564', 3, 4, '2023-10-20 00:54:51', 1, 1, '在滑行墊上接受極速挑戰，先在神秘漆黑的密封迴旋管道中不停旋轉，到中段開放式管道時重見光明，但瞬間即向下高速俯衝至終點。滑道終點的計時器，讓大家可在不同滑道並列競賽，一較高下！'),
(70, '急流漩渦', '水-急流漩渦.jpg', '546468746', '5546655', 3, 5, '2023-10-20 00:54:51', 1, 1, '與親朋友伴坐在巨型水泡中，衝入巨大湯碗中旋轉，感受由戶外玩到戶內的驚心動魄玩樂時刻，最後極速衝入漏斗，強大離心力令巨型水泡劇烈左右搖晃，刺激度爆表！'),
(71, '漂流探秘', '水-漂流探秘.jpg', '454546545', '654', 2, 1, '2023-10-20 00:54:51', 2, 1, '懶洋洋地躺在水泡上輕輕盪漾，展開一趟室內漂流之旅，享受與家人、好友的美好時光。'),
(72, '湧浪灣', '水-湧浪灣.jpg', '546465645', '5454545', 2, 3, '2023-10-20 00:54:51', 1, 1, '可以在戶外欣賞南區海岸美景，映襯著漣漪不斷的浪池，享受多種不同模式的人造海浪，不同刺激程度的人造海浪可讓大人小孩一起同遊。遠處的瀑布與流水更構建成優美的景致，極盡視覺享受。'),
(73, '深谷飛瀑', '水-深谷飛瀑.jpg', '569865', '565468', 3, 5, '2023-10-20 00:54:51', 1, 1, '直立式滑梯挑戰你的膽量！深谷飛瀑讓你感受突然高速垂直飛墜的快感！'),
(74, '神秘迷沖', '水-神秘迷沖.jpg', '4656653', '6546456968', 3, 4, '2023-10-20 00:54:51', 1, 1, '於直徑2.7米的漆黑巨型管道中與家人和朋友展開漂流冒險之旅，感受急彎旋轉的刺激快感，讓歡樂笑聲充滿整個管道。'),
(75, '沖天瀑布', '水-沖天瀑布.jpg', '656459665', '54545554', 3, 5, '2023-10-20 00:54:51', 1, 1, '沖天瀑布為熱愛冒險的勇者帶來刺激體驗，坐在巨型水泡上穿越蜿蜒曲折的地帶，由滑板底部衝上與水平成70度角的巨型大滑板頂端。在最高點上短暫懸浮，體驗一飛沖天的感覺，然後高速飛墜，迂迴滑行結束旅程。'),
(76, '激流旅程', '水-激流旅程.jpg', '32356353', '4523543', 2, 3, '2023-10-20 00:54:51', 1, 1, '探險家沿著戶外漂流旅程盡情暢玩噴射水槍、倒水桶和拱形噴霧等互動水上設施，而終點的無邊際壯麗海景定必能締造難忘的回憶。'),
(77, '旋風雙子梯/急轉雙子梯', '水-旋風雙子梯/急轉雙子梯.jpg', '2356353253', '2133365', 2, 2, '2023-10-20 00:54:51', 1, 1, '黑暗的旋風雙子梯充滿神秘快感，而半透明的急轉雙子梯則隱約透光。設有連續急彎旋轉的「雙生兒」為大家帶來截然不同的刺激。'),
(78, '時速飛車', '刺激冒險-時速飛車.jpg', '2313543', '32314534', 2, 3, '2023-10-20 00:55:25', 1, 2, '過山車帶你與家人一同享受飛車快感。'),
(79, '沖天搖擺船', '刺激冒險-沖天搖擺船.jpg', '321351434', '23136565', 3, 4, '2023-10-20 00:55:25', 1, 2, '沖天搖擺船帶你征服一個又一個的驚濤駭浪！旅程當中記得緊握扶手，因為搖擺船將瘋狂地前後搖動，將你由離地20米的高空，以45°向下急速俯衝，讓你體驗快被拋離甲板的忘我快感，盡情放聲尖叫！'),
(80, '飛天鞦韆', '刺激冒險-飛天鞦韆.jpg', '31213531', '23135353', 3, 4, '2023-10-20 00:55:25', 1, 2, '飛天鞦韆將嶄新刺激的元素注入傳統鞦韆之中，當你慢慢升上7米高空後，除了高高低低地擺動外，更會隨著節奏作波浪式迴旋，讓你跟朋友感受「飛」一般的盪鞦韆樂趣，在半空之中回味童真一刻。'),
(81, '急速快車', '刺激冒險-急速快車.jpg', '321315353', '2131235', 3, 5, '2023-10-20 00:55:25', 1, 2, '急速快車採用雙腳懸空設計，刺激感全面倍升！它會載你緩緩攀上半空，放眼欣賞南中國海美景，轉眼間極速滑落，以驚人高速狂野俯衝 ！旅程更穿越一個接一個的轉圈和急彎，加上強勁的4G地心吸力，給你更快更瘋狂的飛馳快感，離心體驗加倍興奮，尖叫聲響徹雲霄！'),
(82, '翻天覆地', '刺激冒險-翻天覆地.jpg', '213315431543', '231313543', 3, 5, '2023-10-20 00:55:25', 1, 2, '追求終極刺激的你，一定要挑戰「翻天覆地」的天旋地轉快感！這座機動遊戲超過22米高，其強勁的臂彎以每小時60公里的驚人速度在半空搖擺，加上瘋狂自轉，及突如其來的360度凌空迴旋，勢要你感受3.9G的極級重力，瞬間帶來心驚膽跳的忘我快感﹗'),
(83, '狂野龍捲風', '刺激冒險-狂野龍捲風.jpg', '1235313', '231353', 3, 5, '2023-10-20 00:55:25', 1, 2, '想挑戰膽量？嶄新登場的「狂野龍捲風」必定能給你盡情尖叫的滿足感，風車式旋轉巨型鋼臂和瘋狂的自轉式座椅，帶給你3種不同角度的4G重力極速旋轉，讓你體驗震撼龍捲風滋味！'),
(84, '升空奇遇', '慢樂悠遊-升空奇遇.jpg', '232131231', '123323156', 1, 1, '2023-10-20 00:55:51', 2, 3, '乘坐小型摩天輪「昇空奇遇」，置身七彩繽紛的氣球之中，悠悠飄盪於藍天白雲間﹗小朋友可以在旅程中從半空俯瞰色彩奪目的「威威天地」，激發無窮想像力，滿載歡樂與溫馨﹗'),
(85, '橫衝直撞', '刺激冒險-橫衝直撞.jpg', '35635635', '536535', 2, 3, '2023-10-20 00:55:25', 1, 2, '齊齊駕駛色彩繽紛的碰碰車，與全場車手較量一番！在這個歷久不衰的經典遊戲中，大家可以踏盡油門互相追逐，享受碰碰車橫掃全場的霹靂快感，小心一不留神隨時被撞得打轉！'),
(86, '還迴水世界', '慢樂悠遊-還迴水世界.jpg', '246387', '789865698', 1, 1, '2023-10-20 00:55:51', 2, 3, '「海洋奇觀」的海洋生物經已變成珍寶級旋轉木馬，帶你展開充滿動感的海底世界之旅！快來騎上七彩繽紛的巨型海馬、金魚、海豚或鯊魚等，無論男女老幼，都可在歡笑聲中漫遊奇趣的海洋國度。'),
(87, '摩天巨輪', '慢樂悠遊-摩天巨輪.jpg', '2455432', '4565988', 1, 1, '2023-10-20 00:55:51', 2, 3, '乘坐「摩天巨輪」，緩緩攀升至24米的空中，享受無邊無際的視覺感受。在柔柔的海風吹送下，你不單可以俯瞰海洋公園的美景，更可以飽覽浩瀚的南中國海景色。記得把握難得機會，與好友或摰愛在此美景前拍攝留念，留下珍貴難忘的一刻。'),
(88, '海洋列車', '慢樂悠遊-海洋列車.jpg', '2002345453', '3233215', 1, 1, '2023-10-20 00:55:51', 2, 3, '歡迎乘坐「海洋列車」，當你登上這部以探索潛水艇為設計主題的列車，車內的多媒體影片將帶你展開深海歷程 ，由七彩繽紛的海洋生物陪你乘車，一起潛入深不見底的海洋世界！'),
(89, '登山纜車', '慢樂悠遊-登山纜車.jpg', '2543543560', '4253435', 1, 2, '2023-10-20 00:55:51', 2, 3, '乘客可以在海風中緩緩攀上綠油油的山坡，盡情欣賞海天一色的美景，一覽無遺地鳥瞰海洋公園各個景點，好好計劃下一站的行程。'),
(90, '迷你天地', '樂高天堂-迷你天地.jpg', '2545634563', '233456354', 1, 1, '2023-10-20 00:53:28', 2, 4, '迷你天地是一個用超過一百萬塊樂高積木搭建而成的超級迷你世界，多款淘氣的樂高小人藏身於迷你天地的各個角落中，你可以找出他們嗎？'),
(91, '古堡歷險', '樂高天堂-古堡歷險.jpg', '25435635', '543566', 2, 2, '2023-10-20 00:53:28', 1, 4, '古堡歷險是騎乘互動的人氣設施。在這裡，你可以乘上勇士座駕，用你手中的鐳射槍瞄準骨骸戰士等邪惡的怪獸魔鬼們，去拯救美麗的公主。'),
(92, '樂高4D動感體驗', '樂高天堂-樂高4D動感體驗.jpg', '2134453', '3565352565', 2, 2, '2023-10-20 00:53:28', 2, 4, '您希望於樂高4D動感體驗觸摸星星嗎？一邊觀看我們的3D影片，一邊感受雨、風、雪等效果，讓大家彷如置身其中。'),
(93, '小小建築師', '樂高天堂-小小建築師.jpg', '1232135463', '8966863', 1, 1, '2023-10-20 00:53:28', 2, 4, '專為二至五歲的學齡前兒童設計的建構玩具，透過建構，培育兒童的無窮潛能，提升個人發展，激發小朋友創意。在這個充滿色彩和創意的莊園裡，小朋友們可以發揮無限的想像力，用超大的積木創造心中的夢想基地，增強兒童的創新能力。'),
(94, '魔法轉盤', '樂高天堂-魔法轉盤.jpg', '5465453465', '5634635654', 2, 2, '2023-10-20 00:53:28', 1, 4, '進入魔法師的魔法屋，在轉盤上快速踩動踏板施展魔法 – 你有自信飛上天空，成為頂級魔法學徒嗎？'),
(95, '賽車小能手', '樂高天堂-賽車小能手.jpg', '53646345', '35635565', 1, 1, '2023-10-20 00:53:28', 2, 4, '提供大大小小的輪子及車體零件，可以讓小朋友們自己動手做出屬於自己獨一無二的樂高賽車。做好的車子可以讓它在測速道上所向披靡，自由地奔跑起來。小朋友們還可以一比高下，看看誰的賽車速度更快。你今天建構出來的模型是怎麼樣的呢？在我們的速度測試跑道上給你的賽車計時吧。秒錶精確到百分之一秒，試試看在小小的調整下能帶來更好的成績嗎？');

-- --------------------------------------------------------

--
-- 資料表結構 `expresspasstoamuse`
--

CREATE TABLE `expresspasstoamuse` (
  `sid` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `parent_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='ExpresspassToAmuse';

--
-- 傾印資料表的資料 `expresspasstoamuse`
--

INSERT INTO `expresspasstoamuse` (`sid`, `name`, `parent_id`) VALUES
(1, 'expressPass3', 0),
(2, 'expressPass4', 0),
(3, 'amuse_1', 1),
(4, 'amuse_2', 1),
(5, 'amuse_3', 1),
(6, 'amuse_4', 1),
(7, 'amuse_5', 1),
(8, 'amuse_6', 1),
(9, 'amuse_7', 2),
(10, 'amuse_8', 2),
(11, 'amuse_9', 2),
(12, 'amuse_10', 2);

-- --------------------------------------------------------

--
-- 資料表結構 `maintenance`
--

CREATE TABLE `maintenance` (
  `maintenance_id` int(11) NOT NULL,
  `amusement_ride_id` int(11) NOT NULL,
  `maintenance_category_id` int(11) NOT NULL,
  `maintenance_begin` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `maintenance_end` timestamp NOT NULL DEFAULT current_timestamp(),
  `maintenance_result` varchar(100) NOT NULL,
  `update_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='設施維護詳情';

-- --------------------------------------------------------

--
-- 資料表結構 `maintenance_category`
--

CREATE TABLE `maintenance_category` (
  `maintenance_category_id` int(11) NOT NULL,
  `maintenance_category_name` varchar(100) NOT NULL,
  `maintenance_category_description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='維修類型';

-- --------------------------------------------------------

--
-- 資料表結構 `orderlist`
--

CREATE TABLE `orderlist` (
  `order_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `tc2_id` int(11) NOT NULL,
  `orderTime` date NOT NULL,
  `orderState_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='orderlist';

--
-- 傾印資料表的資料 `orderlist`
--

INSERT INTO `orderlist` (`order_id`, `user_name`, `tc2_id`, `orderTime`, `orderState_id`) VALUES
(1, '董正恩', 1, '2023-10-20', 2),
(2, '董孟芃', 1, '2023-10-20', 2),
(3, '池涵祺', 1, '2023-10-20', 1),
(4, '張員靖', 1, '2023-10-20', 1),
(5, '吳佳鈴', 1, '2023-10-20', 1),
(6, '顏羿碩', 2, '2023-10-15', 2),
(7, '華俊喆', 2, '2023-10-18', 2),
(8, '許家詮', 2, '2023-10-19', 2),
(9, '阮瑞丞', 3, '2023-10-20', 2),
(10, '樊安稘', 4, '2023-10-21', 2),
(11, '石柏慶', 6, '2023-10-08', 1),
(12, '梁佑振', 6, '2023-10-08', 1),
(13, '歐陽品越', 6, '2023-10-08', 2),
(14, '顏羿碩', 6, '2023-10-08', 2),
(15, '葛柏浩', 6, '2023-10-08', 2),
(16, '馮瑩襄', 5, '2023-10-10', 1),
(17, '華俊喆', 5, '2023-10-10', 2),
(18, '管芊宥', 5, '2023-10-10', 1),
(32, '1成', 3, '2023-10-10', 1);

-- --------------------------------------------------------

--
-- 資料表結構 `orderstate`
--

CREATE TABLE `orderstate` (
  `orderState_id` int(11) NOT NULL,
  `stateName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='orderstate';

--
-- 傾印資料表的資料 `orderstate`
--

INSERT INTO `orderstate` (`orderState_id`, `stateName`) VALUES
(1, '未付款'),
(2, '已付款');

-- --------------------------------------------------------

--
-- 資料表結構 `productlist`
--

CREATE TABLE `productlist` (
  `sid` int(11) NOT NULL,
  `tc1_id` int(11) NOT NULL,
  `tc2_id` int(11) NOT NULL,
  `beginTime` date NOT NULL,
  `endTime` date NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='procductList';

--
-- 傾印資料表的資料 `productlist`
--

INSERT INTO `productlist` (`sid`, `tc1_id`, `tc2_id`, `beginTime`, `endTime`, `description`) VALUES
(1, 1, 1, '2023-10-01', '2100-01-01', '成人票 適用於一般成人。'),
(2, 1, 2, '2023-10-01', '2100-01-01', '學生票 國中以上學生、高中、大專院校學生憑證購票。'),
(3, 1, 3, '2023-10-01', '2100-01-01', '兒童票 12歲以下(無法出示證明者以身高120公分以上未達150公分)國小學童適用。'),
(4, 1, 4, '2023-10-01', '2100-01-01', '愛心票 65歲以上長者、孕婦、持有身心障礙手冊者(身障者必要陪伴者一人，同享博幼票價)、3歲以上未滿6歲幼童?(無法出示證明者以身高100公分以上未滿120公分)，憑證購票。'),
(5, 2, 5, '2023-10-01', '2100-01-01', '恕無法指定各項遊樂設施的入場時間，所以同行者的入場時間也有可能不同，訂購後無法要求更改相近或一致的時間，實際入場時間請依憑證顯示為主。.票券一旦付款成功，將無法退換或更改，敬請知悉。'),
(6, 3, 6, '2023-10-01', '2100-01-01', '恕無法指定各項遊樂設施的入場時間，所以同行者的入場時間也有可能不同，訂購後無法要求更改相近或一致的時間，實際入場時間請依憑證顯示為主。.票券一旦付款成功，將無法退換或更改，敬請知悉。'),
(25, 3, 9, '2023-10-25', '2023-11-01', 'marry X\'mas'),
(27, 9, 13, '2023-10-27', '2023-11-10', '萬聖節快樂');

-- --------------------------------------------------------

--
-- 資料表結構 `product_category`
--

CREATE TABLE `product_category` (
  `PDcategory_id` int(11) NOT NULL,
  `PDcategory_name` varchar(255) NOT NULL,
  `parent_PDcategory_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='商品類別';

--
-- 傾印資料表的資料 `product_category`
--

INSERT INTO `product_category` (`PDcategory_id`, `PDcategory_name`, `parent_PDcategory_id`) VALUES
(1, '包包', 0),
(2, '衣服', 0),
(3, '杯子', 0),
(4, '玩具', 0),
(5, '書本', 0),
(6, '帽子', 0),
(7, '飾品', 0),
(8, '短袖', 2),
(9, '長袖', 2),
(10, '相冊', 5),
(11, '背包', 1),
(12, '氣球', 4),
(13, '馬克杯', 3),
(14, '掛飾', 7),
(15, '普通杯', 3),
(16, '相框', 7),
(17, '模型', 4),
(18, '鴨舌帽', 6),
(19, '圖畫書', 5),
(20, '提袋', 1);

-- --------------------------------------------------------

--
-- 資料表結構 `product_color`
--

CREATE TABLE `product_color` (
  `PDcolor_id` int(11) NOT NULL,
  `PDcolor_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='商品顏色';

--
-- 傾印資料表的資料 `product_color`
--

INSERT INTO `product_color` (`PDcolor_id`, `PDcolor_name`) VALUES
(1, '白'),
(2, '紅'),
(3, '粉'),
(4, '橙'),
(5, '黃'),
(6, '棕'),
(7, '黑'),
(9, '墨綠'),
(10, 'DPP綠'),
(11, 'KMT藍'),
(12, '柯P白');

-- --------------------------------------------------------

--
-- 資料表結構 `product_list`
--

CREATE TABLE `product_list` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `PDcategory_id` int(11) NOT NULL,
  `PDstyle_id` int(11) NOT NULL,
  `PDcolor_id` int(11) NOT NULL,
  `product_price` int(11) NOT NULL,
  `PDpicture_id` varchar(255) NOT NULL,
  `product_inventory_quantity` int(11) NOT NULL,
  `product_description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='產品列表';

--
-- 傾印資料表的資料 `product_list`
--

INSERT INTO `product_list` (`product_id`, `product_name`, `PDcategory_id`, `PDstyle_id`, `PDcolor_id`, `product_price`, `PDpicture_id`, `product_inventory_quantity`, `product_description`) VALUES
(1, '唐老鴨氣球(橙)', 12, 3, 4, 1930, '123', 143, '123'),
(2, '米奇普通杯(黑)', 15, 1, 7, 1118, '123', 136, '123'),
(3, '唐老鴨模型(紅)', 17, 3, 2, 1192, '123', 124, '123'),
(4, '唐老鴨馬克杯(白)', 13, 3, 1, 1256, '123', 173, '123'),
(5, '米奇模型(紅)', 17, 1, 2, 681, '123', 69, '123'),
(6, '白雪公主模型(粉)', 17, 6, 3, 1122, '123', 154, '123'),
(7, '米妮鴨舌帽(黑)', 18, 2, 7, 1720, '123', 10, '123'),
(8, '唐老鴨掛飾(橙)', 14, 3, 4, 1857, '123', 191, '123'),
(9, '米奇普通杯(紅)', 15, 1, 2, 890, '123', 69, '123'),
(10, '唐老鴨氣球(棕)', 12, 3, 6, 549, '123', 13, '123'),
(11, '唐老鴨掛飾(白)', 14, 3, 1, 918, '123', 23, '123'),
(12, '唐老鴨普通杯(紅)', 15, 3, 2, 804, '123', 3, '123'),
(13, '米妮圖畫書(橙)', 19, 2, 4, 319, '123', 51, '123'),
(14, '米奇氣球(橙)', 12, 1, 4, 795, '123', 152, '123'),
(15, '唐老鴨相框(橙)', 16, 3, 4, 558, '123', 163, '123'),
(16, '米奇相冊(黑)', 10, 1, 7, 477, '123', 5, '123'),
(17, '米妮相冊(白)', 10, 2, 1, 199, '123', 52, '123'),
(18, '米奇模型(黃)', 17, 1, 5, 1797, '123', 184, '123'),
(19, '高飛提袋(紅)', 20, 4, 2, 1902, '123', 153, '123'),
(20, '唐老鴨掛飾(白)', 14, 3, 1, 1420, '123', 124, '123'),
(21, '唐老鴨鴨舌帽(紅)', 18, 3, 2, 858, '123', 124, '123'),
(22, '高飛普通杯(紅)', 15, 4, 2, 1227, '123', 163, '123'),
(23, '唐老鴨提袋(黑)', 20, 3, 7, 1456, '123', 64, '123'),
(24, '白雪公主馬克杯(黃)', 13, 6, 5, 779, '123', 104, '123'),
(25, '米妮提袋(橙)', 20, 2, 4, 875, '123', 101, '123'),
(26, '唐老鴨掛飾(黃)', 14, 3, 5, 1169, '123', 57, '123'),
(27, '米奇圖畫書(黑)', 19, 1, 7, 1787, '123', 21, '123'),
(28, '唐老鴨普通杯(黑)', 15, 3, 7, 487, '123', 174, '123'),
(29, '唐老鴨氣球(白)', 12, 3, 1, 1580, '123', 13, '123'),
(30, '米妮背包(棕)', 11, 2, 6, 1552, '123', 10, '123'),
(31, '唐老鴨背包(黃)', 11, 3, 5, 679, '123', 100, '123'),
(32, '米奇相框(橙)', 16, 1, 4, 627, '123', 199, '123'),
(33, '唐老鴨鴨舌帽(黑)', 18, 3, 7, 702, '123', 82, '123'),
(34, '米妮相框(黑)', 16, 2, 7, 775, '123', 120, '123'),
(35, '唐老鴨鴨舌帽(紅)', 18, 3, 2, 408, '123', 101, '123'),
(36, '米奇提袋(橙)', 20, 1, 4, 675, '123', 53, '123'),
(37, '唐老鴨掛飾(棕)', 14, 3, 6, 937, '123', 190, '123'),
(38, '米奇鴨舌帽(黃)', 18, 1, 5, 198, '123', 92, '123'),
(39, '米奇鴨舌帽(白)', 18, 1, 1, 1041, '123', 185, '123'),
(40, '高飛長袖(白)', 9, 4, 1, 341, '123', 196, '123'),
(41, '米奇圖畫書(橙)', 19, 1, 4, 877, '123', 199, '123'),
(42, '高飛長袖(白)', 9, 4, 1, 524, '123', 124, '123'),
(43, '唐老鴨提袋(紅)', 20, 3, 2, 432, '123', 46, '123'),
(44, '米妮圖畫書(棕)', 19, 2, 6, 1871, '123', 137, '123'),
(45, '米奇鴨舌帽(橙)', 18, 1, 4, 667, '123', 62, '123'),
(46, '白雪公主普通杯(橙)', 15, 6, 4, 1196, '123', 97, '123'),
(47, '米奇模型(橙)', 17, 1, 4, 1613, '123', 158, '123'),
(48, '米奇氣球(白)', 12, 1, 1, 1299, '123', 121, '123'),
(49, '唐老鴨氣球(橙)', 12, 3, 4, 585, '123', 163, '123'),
(50, '高飛相冊(紅)', 10, 4, 2, 1411, '123', 92, '123'),
(51, '米奇背包(紅)', 11, 1, 2, 108, '123', 182, '123'),
(52, '高飛圖畫書(棕)', 19, 4, 6, 1302, '123', 5, '123'),
(53, '米奇背包(橙)', 11, 1, 4, 496, '123', 191, '123'),
(54, '米妮背包(白)', 11, 2, 1, 297, '123', 69, '123'),
(55, '米妮普通杯(紅)', 15, 2, 2, 1201, '123', 118, '123'),
(56, '高飛相框(紅)', 16, 4, 2, 1417, '123', 16, '123'),
(57, '唐老鴨提袋(黑)', 20, 3, 7, 319, '123', 136, '123'),
(58, '唐老鴨普通杯(白)', 15, 3, 1, 1795, '123', 152, '123'),
(59, '唐老鴨相冊(棕)', 10, 3, 6, 546, '123', 3, '123'),
(60, '米奇掛飾(白)', 14, 1, 1, 1386, '123', 161, '123'),
(61, '米妮氣球(粉)', 12, 2, 3, 435, '123', 64, '123'),
(62, '唐老鴨相冊(橙)', 10, 3, 4, 1333, '123', 143, '123'),
(63, '米奇鴨舌帽(白)', 18, 1, 1, 1457, '123', 121, '123'),
(64, '唐老鴨長袖(紅)', 9, 3, 2, 1093, '123', 138, '123'),
(65, '唐老鴨普通杯(白)', 15, 3, 1, 1205, '123', 113, '123'),
(66, '米奇圖畫書(橙)', 19, 1, 4, 1089, '123', 80, '123'),
(67, '米奇圖畫書(棕)', 19, 1, 6, 1535, '123', 35, '123'),
(68, '米奇背包(棕)', 11, 1, 6, 1839, '123', 13, '123'),
(69, '高飛相框(棕)', 16, 4, 6, 772, '123', 52, '123'),
(70, '米奇鴨舌帽(白)', 18, 1, 1, 1813, '123', 172, '123'),
(71, '白雪公主圖畫書(黃)', 19, 6, 5, 1657, '123', 180, '123'),
(72, '米奇鴨舌帽(棕)', 18, 1, 6, 1317, '123', 8, '123'),
(73, '唐老鴨馬克杯(紅)', 13, 3, 2, 254, '123', 135, '123'),
(74, '米奇相框(紅)', 16, 1, 2, 1405, '123', 154, '123'),
(75, '米奇馬克杯(棕)', 13, 1, 6, 1758, '123', 159, '123'),
(76, '米奇背包(紅)', 11, 1, 2, 1117, '123', 51, '123'),
(77, '米奇提袋(粉)', 20, 1, 3, 594, '123', 8, '123'),
(78, '高飛馬克杯(粉)', 13, 4, 3, 704, '123', 14, '123'),
(79, '高飛普通杯(粉)', 15, 4, 3, 1744, '123', 108, '123'),
(80, '米妮相冊(粉)', 10, 2, 3, 1121, '123', 85, '123'),
(81, '唐老鴨掛飾(橙)', 14, 3, 4, 1223, '123', 45, '123'),
(82, '米妮相框(黃)', 16, 2, 5, 868, '123', 137, '123'),
(83, '米奇背包(橙)', 11, 1, 4, 1526, '123', 55, '123'),
(84, '米奇模型(紅)', 17, 1, 2, 1978, '123', 43, '123'),
(85, '米奇普通杯(黑)', 15, 1, 7, 709, '123', 179, '123'),
(86, '唐老鴨掛飾(黃)', 14, 3, 5, 1645, '123', 125, '123'),
(87, '米奇提袋(紅)', 20, 1, 2, 929, '123', 129, '123'),
(88, '米奇鴨舌帽(黃)', 18, 1, 5, 1283, '123', 85, '123'),
(89, '高飛普通杯(粉)', 15, 4, 3, 209, '123', 67, '123'),
(90, '米奇掛飾(紅)', 14, 1, 2, 934, '123', 133, '123'),
(91, '米妮模型(白)', 17, 2, 1, 239, '123', 52, '123'),
(92, '白雪公主馬克杯(白)', 13, 6, 1, 1577, '123', 121, '123'),
(93, '米奇提袋(黃)', 20, 1, 5, 1426, '123', 186, '123'),
(94, '米奇長袖(紅)', 9, 1, 2, 170, '123', 106, '123'),
(95, '高飛長袖(棕)', 9, 4, 6, 1581, '123', 53, '123'),
(96, '米奇氣球(黃)', 12, 1, 5, 158, '123', 58, '123'),
(97, '唐老鴨長袖(白)', 9, 3, 1, 1593, '123', 55, '123'),
(98, '米妮相框(棕)', 16, 2, 6, 154, '123', 161, '123'),
(99, '高飛背包(黃)', 11, 4, 5, 989, '123', 114, '123'),
(100, '唐老鴨模型(粉)', 17, 3, 3, 471, '123', 111, '123'),
(101, '高飛馬克杯(白)', 13, 4, 1, 1735, '123', 153, '123'),
(102, '唐老鴨長袖(紅)', 9, 3, 2, 1585, '123', 42, '123'),
(103, '高飛圖畫書(白)', 19, 4, 1, 197, '123', 34, '123'),
(104, '米奇短袖(黃)', 8, 1, 5, 625, '123', 14, '123'),
(105, '唐老鴨圖畫書(紅)', 19, 3, 2, 1499, '123', 47, '123'),
(106, '維尼相冊(白)', 10, 5, 1, 1929, '123', 151, '123'),
(107, '米妮長袖(棕)', 9, 2, 6, 1231, '123', 116, '123'),
(108, '米奇提袋(紅)', 20, 1, 2, 1682, '123', 38, '123'),
(109, '高飛鴨舌帽(紅)', 18, 4, 2, 1386, '123', 29, '123'),
(110, '米奇長袖(棕)', 9, 1, 6, 1605, '123', 173, '123'),
(111, '米妮掛飾(粉)', 14, 2, 3, 124, '123', 143, '123'),
(112, '高飛提袋(橙)', 20, 4, 4, 577, '123', 15, '123'),
(113, '高飛鴨舌帽(紅)', 18, 4, 2, 238, '123', 103, '123'),
(114, '唐老鴨鴨舌帽(棕)', 18, 3, 6, 659, '123', 127, '123'),
(115, '唐老鴨掛飾(黃)', 14, 3, 5, 288, '123', 10, '123'),
(116, '米妮圖畫書(黃)', 19, 2, 5, 1781, '123', 99, '123'),
(117, '米奇圖畫書(棕)', 19, 1, 6, 1260, '123', 93, '123'),
(118, '唐老鴨圖畫書(白)', 19, 3, 1, 918, '123', 133, '123'),
(119, '米奇相冊(粉)', 10, 1, 3, 1471, '123', 101, '123'),
(120, '米妮模型(白)', 17, 2, 1, 786, '123', 166, '123'),
(121, '米奇相框(棕)', 16, 1, 6, 1324, '123', 10, '123'),
(122, '高飛鴨舌帽(白)', 18, 4, 1, 1809, '123', 101, '123'),
(123, '維尼氣球(紅)', 12, 5, 2, 1328, '123', 124, '123'),
(124, '高飛長袖(橙)', 9, 4, 4, 1365, '123', 171, '123'),
(125, '高飛圖畫書(白)', 19, 4, 1, 1336, '123', 139, '123'),
(126, '高飛圖畫書(紅)', 19, 4, 2, 1929, '123', 101, '123'),
(127, '唐老鴨模型(棕)', 17, 3, 6, 1759, '123', 134, '123'),
(128, '高飛背包(黑)', 11, 4, 7, 964, '123', 200, '123'),
(129, '唐老鴨氣球(黃)', 12, 3, 5, 1221, '123', 142, '123'),
(130, '米奇圖畫書(橙)', 19, 1, 4, 1738, '123', 19, '123'),
(131, '唐老鴨掛飾(黃)', 14, 3, 5, 1860, '123', 65, '123'),
(132, '米妮模型(黑)', 17, 2, 7, 1866, '123', 15, '123'),
(133, '米妮普通杯(粉)', 15, 2, 3, 1999, '123', 151, '123'),
(134, '米奇模型(黃)', 17, 1, 5, 1025, '123', 137, '123'),
(135, '唐老鴨氣球(黑)', 12, 3, 7, 270, '123', 64, '123'),
(136, '唐老鴨模型(白)', 17, 3, 1, 1856, '123', 72, '123'),
(137, '維尼鴨舌帽(橙)', 18, 5, 4, 1368, '123', 149, '123'),
(138, '白雪公主普通杯(紅)', 15, 6, 2, 1615, '123', 65, '123'),
(139, '維尼普通杯(紅)', 15, 5, 2, 400, '123', 77, '123'),
(141, '200', 2, 2, 2, 2, '2', 2, '7777777'),
(145, '1', 12, 4, 5, 111, '1', 1, '11111'),
(146, '2', 11, 1, 1, 2, '2', 22, '2222'),
(147, '888', 19, 5, 5, 22, '2', 2, ''),
(148, '123', 13, 4, 6, 11, '11', 1, '7777'),
(149, '維尼普通杯(紅)', 15, 5, 2, 100, '123', 100, '維尼紅色杯子'),
(151, '白雪公主圖畫書(白)', 1, 6, 1, 123, '123', 200, '白雪公主白色圖畫書'),
(153, '哭美人馬克杯(紅)', 13, 13, 2, 111, '', 200, '紅色哭美人馬克杯'),
(154, '哭美人馬克杯(紅)', 13, 13, 2, 200, '', 200, '紅色哭美人馬克杯'),
(155, '12', 19, 15, 5, 200, '20', 200, '222222'),
(157, '11', 11, 1, 1, 200, '', 100, '222');

-- --------------------------------------------------------

--
-- 資料表結構 `product_picture`
--

CREATE TABLE `product_picture` (
  `PDpicture_id` int(11) NOT NULL,
  `PDpicture_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='產品照片';

--
-- 傾印資料表的資料 `product_picture`
--

INSERT INTO `product_picture` (`PDpicture_id`, `PDpicture_name`) VALUES
(16, 'b43b9d0f2cd1682d863d0571e744cd116b073956.jpg'),
(18, 'ff762921413636594b695d3aabf0dd7feccf2278.jpg'),
(19, 'b5055482ecae44eadaf3d4b18f1fbd3c6af9a29f.jpg'),
(20, '1dd302c75134aa521e6e38f054212af3e8ef5dfa.jpg'),
(21, '04acff1b2950eb3d9ee3f21999e46f32ba2785f5.jpg');

-- --------------------------------------------------------

--
-- 資料表結構 `product_style`
--

CREATE TABLE `product_style` (
  `PDstyle_id` int(11) NOT NULL,
  `PDstyle_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='商品造型';

--
-- 傾印資料表的資料 `product_style`
--

INSERT INTO `product_style` (`PDstyle_id`, `PDstyle_name`) VALUES
(1, '米奇'),
(2, '米妮'),
(3, '唐老鴨'),
(4, '高飛'),
(5, '維尼'),
(6, '白雪公主'),
(11, '睡美人'),
(13, '哭美人'),
(15, '跳跳虎'),
(18, '小美人魚'),
(19, '跳跳貓');

-- --------------------------------------------------------

--
-- 資料表結構 `restaurant_reservation`
--

CREATE TABLE `restaurant_reservation` (
  `restaurant_reservation_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `shop_id` int(11) NOT NULL,
  `shop_name` varchar(100) NOT NULL,
  `adult` int(11) NOT NULL,
  `child` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `starting_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='餐廳預約系統';

-- --------------------------------------------------------

--
-- 資料表結構 `ride_category`
--

CREATE TABLE `ride_category` (
  `ride_category_id` int(11) NOT NULL,
  `ride_category_name` varchar(100) NOT NULL,
  `ride_category_description` varchar(100) NOT NULL,
  `height_requirement` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='設施類型';

--
-- 傾印資料表的資料 `ride_category`
--

INSERT INTO `ride_category` (`ride_category_id`, `ride_category_name`, `ride_category_description`, `height_requirement`) VALUES
(1, '兒童友善', '規劃給兒童的設施', 0),
(2, '親子同樂', '規劃給家庭大小同遊', 100),
(3, '刺激冒險', '規劃給喜歡刺激的冒險者', 140);

-- --------------------------------------------------------

--
-- 資料表結構 `ride_support`
--

CREATE TABLE `ride_support` (
  `ride_support_id` int(11) NOT NULL,
  `ride_support_name` varchar(100) NOT NULL,
  `ride_support_description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='設施特殊支援類型';

--
-- 傾印資料表的資料 `ride_support`
--

INSERT INTO `ride_support` (`ride_support_id`, `ride_support_name`, `ride_support_description`) VALUES
(1, '無', '無任何支援'),
(2, '孕婦', '孕婦可搭乘'),
(3, '輪椅', '可乘坐輪椅搭乘');

-- --------------------------------------------------------

--
-- 資料表結構 `shop`
--

CREATE TABLE `shop` (
  `shop_id` int(11) NOT NULL,
  `shop_name` varchar(100) NOT NULL,
  `shop_longitude` varchar(100) NOT NULL,
  `shop_latitude` varchar(100) NOT NULL,
  `shop_img` varchar(100) NOT NULL,
  `shop_type_id` int(11) NOT NULL,
  `seat` int(11) NOT NULL,
  `eating_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='商店的表格';

-- --------------------------------------------------------

--
-- 資料表結構 `shop_opentime`
--

CREATE TABLE `shop_opentime` (
  `shop_opentime_id` int(11) NOT NULL,
  `shop_id` int(11) NOT NULL,
  `open_week` varchar(100) NOT NULL,
  `open_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `close_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='商店營業時間';

-- --------------------------------------------------------

--
-- 資料表結構 `theme`
--

CREATE TABLE `theme` (
  `theme_id` int(11) NOT NULL,
  `theme_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='設施主題';

--
-- 傾印資料表的資料 `theme`
--

INSERT INTO `theme` (`theme_id`, `theme_name`) VALUES
(1, '水世界'),
(2, '冒險之旅'),
(3, '慢樂悠遊'),
(4, '樂高天堂');

-- --------------------------------------------------------

--
-- 資料表結構 `ticketcategory1`
--

CREATE TABLE `ticketcategory1` (
  `tc1_id` int(11) NOT NULL,
  `tc1_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='ticketCategory1';

--
-- 傾印資料表的資料 `ticketcategory1`
--

INSERT INTO `ticketcategory1` (`tc1_id`, `tc1_name`) VALUES
(1, '入園票'),
(2, '快速通關3'),
(3, '快速通關4'),
(9, '萬聖節套票');

-- --------------------------------------------------------

--
-- 資料表結構 `ticketcategory2`
--

CREATE TABLE `ticketcategory2` (
  `tc2_id` int(11) NOT NULL,
  `tc2_name` varchar(255) NOT NULL,
  `tc_amount` text NOT NULL,
  `tc1_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='ticketCategory2';

--
-- 傾印資料表的資料 `ticketcategory2`
--

INSERT INTO `ticketcategory2` (`tc2_id`, `tc2_name`, `tc_amount`, `tc1_id`) VALUES
(1, '成人票', '1000', 1),
(2, '學生票', '800', 1),
(3, '兒童票', '700', 1),
(4, '愛心票', '500', 1),
(5, '快速通關3套票', '1500', 2),
(6, '快速通關4套票', '2000', 3),
(13, '萬聖節一日暢遊', '1500', 9);

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `amusement_ride`
--
ALTER TABLE `amusement_ride`
  ADD PRIMARY KEY (`amusement_ride_id`);

--
-- 資料表索引 `expresspasstoamuse`
--
ALTER TABLE `expresspasstoamuse`
  ADD PRIMARY KEY (`sid`);

--
-- 資料表索引 `maintenance`
--
ALTER TABLE `maintenance`
  ADD PRIMARY KEY (`maintenance_id`);

--
-- 資料表索引 `maintenance_category`
--
ALTER TABLE `maintenance_category`
  ADD PRIMARY KEY (`maintenance_category_id`);

--
-- 資料表索引 `orderlist`
--
ALTER TABLE `orderlist`
  ADD PRIMARY KEY (`order_id`);

--
-- 資料表索引 `orderstate`
--
ALTER TABLE `orderstate`
  ADD PRIMARY KEY (`orderState_id`);

--
-- 資料表索引 `productlist`
--
ALTER TABLE `productlist`
  ADD PRIMARY KEY (`sid`);

--
-- 資料表索引 `product_category`
--
ALTER TABLE `product_category`
  ADD PRIMARY KEY (`PDcategory_id`);

--
-- 資料表索引 `product_color`
--
ALTER TABLE `product_color`
  ADD PRIMARY KEY (`PDcolor_id`);

--
-- 資料表索引 `product_list`
--
ALTER TABLE `product_list`
  ADD PRIMARY KEY (`product_id`);

--
-- 資料表索引 `product_picture`
--
ALTER TABLE `product_picture`
  ADD PRIMARY KEY (`PDpicture_id`);

--
-- 資料表索引 `product_style`
--
ALTER TABLE `product_style`
  ADD PRIMARY KEY (`PDstyle_id`);

--
-- 資料表索引 `restaurant_reservation`
--
ALTER TABLE `restaurant_reservation`
  ADD PRIMARY KEY (`restaurant_reservation_id`);

--
-- 資料表索引 `ride_category`
--
ALTER TABLE `ride_category`
  ADD PRIMARY KEY (`ride_category_id`);

--
-- 資料表索引 `ride_support`
--
ALTER TABLE `ride_support`
  ADD PRIMARY KEY (`ride_support_id`);

--
-- 資料表索引 `shop`
--
ALTER TABLE `shop`
  ADD PRIMARY KEY (`shop_id`);

--
-- 資料表索引 `shop_opentime`
--
ALTER TABLE `shop_opentime`
  ADD PRIMARY KEY (`shop_opentime_id`);

--
-- 資料表索引 `theme`
--
ALTER TABLE `theme`
  ADD PRIMARY KEY (`theme_id`);

--
-- 資料表索引 `ticketcategory1`
--
ALTER TABLE `ticketcategory1`
  ADD PRIMARY KEY (`tc1_id`);

--
-- 資料表索引 `ticketcategory2`
--
ALTER TABLE `ticketcategory2`
  ADD PRIMARY KEY (`tc2_id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `amusement_ride`
--
ALTER TABLE `amusement_ride`
  MODIFY `amusement_ride_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `expresspasstoamuse`
--
ALTER TABLE `expresspasstoamuse`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `maintenance`
--
ALTER TABLE `maintenance`
  MODIFY `maintenance_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `maintenance_category`
--
ALTER TABLE `maintenance_category`
  MODIFY `maintenance_category_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `orderlist`
--
ALTER TABLE `orderlist`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `orderstate`
--
ALTER TABLE `orderstate`
  MODIFY `orderState_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `productlist`
--
ALTER TABLE `productlist`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `product_category`
--
ALTER TABLE `product_category`
  MODIFY `PDcategory_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `product_color`
--
ALTER TABLE `product_color`
  MODIFY `PDcolor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `product_list`
--
ALTER TABLE `product_list`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=158;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `product_picture`
--
ALTER TABLE `product_picture`
  MODIFY `PDpicture_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `product_style`
--
ALTER TABLE `product_style`
  MODIFY `PDstyle_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `restaurant_reservation`
--
ALTER TABLE `restaurant_reservation`
  MODIFY `restaurant_reservation_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `ride_category`
--
ALTER TABLE `ride_category`
  MODIFY `ride_category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `ride_support`
--
ALTER TABLE `ride_support`
  MODIFY `ride_support_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `shop`
--
ALTER TABLE `shop`
  MODIFY `shop_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `shop_opentime`
--
ALTER TABLE `shop_opentime`
  MODIFY `shop_opentime_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `theme`
--
ALTER TABLE `theme`
  MODIFY `theme_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `ticketcategory1`
--
ALTER TABLE `ticketcategory1`
  MODIFY `tc1_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `ticketcategory2`
--
ALTER TABLE `ticketcategory2`
  MODIFY `tc2_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
