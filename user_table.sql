SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

CREATE TABLE `user_table` (
  `u_id` varchar(4) NOT NULL,
  `u_name` varchar(6) DEFAULT NULL,
  `u_acco` varchar(12) DEFAULT NULL,
  `u_brith` varchar(7) DEFAULT NULL,
  `u_email` varchar(40) DEFAULT NULL,
  `u_pw` varchar(6) DEFAULT NULL,
  `u_tel` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;




INSERT INTO `user_table` (`u_id`, `u_name`, `u_acco`, `u_brith`, `u_email`, `u_pw`, `u_tel`) VALUES
('u001', '董正恩', '1fsdoag1f3', '03,21', 'bwfefy@gmail.com', '10001', '0961651151'),
('u002', '董孟芃', 'gfvvvd326', '12,05', 'ghgefqe@gmail.com', '10002', '0945434523'),
('u003', '池涵祺', 'hbdf6544n', '08,31', 'fsafrdrsfhtr@gmail.com', '19003', '0954654376'),
('u004', '張員靖', 'jy923yf', '01,29', 'ghgedsaqe@gmail.com', '28004', '0976874534'),
('u005', '吳佳鈴', 'fcwc3v43', '09,21', 'bwegdsfy@gmail.com', '37005', '0956325656'),
('u006', '顏羿碩', 'r7f6t7df', '09,10', 'ghgefqe@gmail.com', '46006', '0987456453'),
('u007', '華俊喆', 'd6ydt65t', '06,10', 'bwsasassafy@gmail.com', '55007', '0932653469'),
('u008', '許家詮', '5w4y5w', '10,22', 'ghgsdsad3aefqe@gmail.com', '64008', '0954235432'),
('u009', '阮瑞丞', 'htsryjt14', '01,22', 'bwefEFEWy@gmail.com', '73009', '0974654654'),
('u010', '樊安稘', '6y34gr543fhf', '12,25', 'ghgfrfrwefqe@gmail.com', '82010', '0932465346'),
('u011', '石柏慶', 'g3g4rqeg41', '03,09', 'fsafrdrsfhtr@gmail.com', '91011', '0916161161'),
('u012', '梁佑振', 'qafhyde24', '12,16', 'fdghbgcxzv@gmail.com', '100012', '0948942234'),
('u013', '歐陽品越', 'rths35thre', '11,04', 'ghf1isdhij@gmail.com', '109013', '0954658761'),
('u014', '顏羿碩', '542hfdj5hg', '08,31', 'ifg1dhs@gmail.com', '118014', '0943567898'),
('u015', '葛柏浩', '45hrte43fs', '05,31', 'ghfdisn@gmail.com', '127015', '0978756564'),
('u016', '馮瑩襄', 'gfdsyrge45h', '10,09', '46jfdb93@gmail.com', '136016', '0976534634'),
('u017', '華俊喆', 'fgdsjy34', '06,04', 'hdsr3y291@gmail.com', '145017', '0954352772'),
('u018', '管芊宥', 'gershfr542', '06,03', 'gdgb3266gfd@gmail.com', '154018', '0968676765'),
('u019', '辛巧非', 'ghshwt34dsf', '07,21', 'n1iwn14365@yahoo.com', '163019', '0964563474'),
('u020', '連妍庭', 'sadfhgsdg24', '06,30', 'h18ifsh@gmail.com', '172020', '0976354521'),
('u021', '吳詠立', '35tge4ews', '01,23', '109109222@mail.oit.edu.tw', '181021', '0986546345'),
('u022', '崔星偉', '34r3443rrhew', '12.05', 'dsa89dsa@yahoo.com', '190022', '0986534353'),
('u023', '伍詩旂', '43re34reds', '1.26', '32132141@mail.ntu.edu.tw', '199023', '0985674263'),
('u024', '錢廷益', '3454eyjt', '4.17', 'masidao1@gmail.com', '208024', '0954642536'),
('u025', '任築盈', '6thdf2e', '08.26', '382r1enij@gmail.com', '217025', '0998643232'),
('u026', '丁慈妏', '32e23refd', '05,26', '65ytgfgfrye4@gmail.com', '226026', '0986534234'),
('u027', '侯榆睎', '2r3efdv3r', '03,22', '23qwercrqd@gmail.com', '235027', '0984564315'),
('u028', '翁貴涵', '32ewfd2ew', '10,22', '342190473@mail.ntu.edu.tw', '244028', '0975654326'),
('u029', '韋士奕', '23ew2ew', '01,22', '343789037@mail.ntu.edu.tw', '253029', '0967354554'),
('u030', '吳三桂', 'w13gway', '06,08', 'w13gway@gmail.com', '262030', '0976554243');




ALTER TABLE `user_table`
  ADD PRIMARY KEY (`u_id`);
COMMIT;

