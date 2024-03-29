CREATE DATABASE forum_db;
USE forum_db;
-- --------------------------------------------------------
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
--
-- Database: `forum_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `user`
--
CREATE TABLE `user` (
`id` int(11) NOT NULL,
`userName` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
`fullName` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
`email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
`dateOfBirth` date DEFAULT NULL,
`active_flg` int(11) NOT NULL,
`password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
`role_id` bigint(20) DEFAULT NULL,
`update_date` datetime DEFAULT NULL,
`remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
`avatar` varchar(255) DEFAULT NULL
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`,`userName`,`fullName`,`email`,`dateOfBirth`,`active_flg`,`password`,`role_id`,`update_date`,`avatar`) VALUES
(1,'admin','TRAN KIM HIEU','hieu@gmail','2019-02-08',1,'$2y$10$zSLvWNPQ8IrrRcOzVfPIJu5AmTTx9QWa4GVcbo8iplxhgINQ96mJG',1,'2019-02-09 00:00:00','\avatar'),
(2,'hieutk','ThanLibra','hieu@gmail','2019-02-09',1,'$2y$10$zSLvWNPQ8IrrRcOzVfPIJu5AmTTx9QWa4GVcbo8iplxhgINQ96mJG',2,'2019-02-09 00:00:00','\avatar');

--
-- Table structure for table `roleGlobal`
--
CREATE TABLE `roleGlobal` (
`id` int(11) NOT NULL,
`code` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
`descibe` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
`activeFlg` int(11) NOT NULL
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


--
-- Dumping data for table `roleGlobal`
--

INSERT INTO `roleGlobal` (`id`,`code`,`descibe`,`activeFlg`) values
(1,'ADMIN','Quan tri vien cua toan web',1),
(2,'USER','Thanh vien cua web',1);

--
-- Table structure for table `roleRoom`
--
CREATE TABLE `roleRoom` (
`id` int(11) NOT NULL,
`code` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
`descibe` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
`activeFlg` int(11) NOT NULL
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roleRoom`
--

INSERT INTO `roleRoom` (`id`,`code`,`descibe`,`activeFlg`) values
(1,'R_ADMIN','Quan tri vien cua toan room',1),
(2,'R_USER','Thanh vien cua room',1);
--
-- Table structure for table `comment`
--
CREATE TABLE `comment` (
`id` int(11) NOT NULL,
`user_id` bigint(20) DEFAULT NULL,
`content` varchar(255) DEFAULT NULL,
`question_id` bigint(20) DEFAULT NULL,
`voted` int(11) DEFAULT NULL,
`up` int(11) DEFAULT NULL,
`lastUpdated`datetime DEFAULT NULL,
`activeFlg` int(11) NOT NULL
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`,`user_id`,`content`,`question_id`,`voted`,`up`,`lastUpdated`,`activeFlg`) values
(1,1,'Day la binh luan cua tao ahihi',1,5,1,'2019-02-09 00:00:00',1);



--
-- Table structure for table `room`
--
CREATE TABLE `room` (
`id` int(11) NOT NULL,
`code` varchar(50) NOT NULL,
`name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
`password` varchar(255) DEFAULT NULL,
`category_id` bigint(20) DEFAULT NULL,
`describe` varchar(255) DEFAULT NULL,
`status_id` bigint(20) DEFAULT NULL,
`admin` bigint(20) DEFAULT NULL,
`created` datetime DEFAULT NULL,
`updated` datetime DEFAULT NULL,
`voted` int(11) DEFAULT NULL,
`isDeleted` int(11) NOT NULL
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`id`,`code`,`name`,`password`,`category_id`,`describe`,`status_id`,`admin`,`created`,`updated`,`voted`,`isDeleted`) values
(1,'HAVE201','Phong test 001','$10$No0Mgt9pCU1ZgM7JNHQgJ.HWHMTkNDkzURzzaK5Uzk2YwQJWn0ouS',1,'Ung dung cau AI vao cuoc song sinh vien Cong Nghe',1,1,'2019-02-09 00:00:00','2019-02-09 00:00:00',1,0),
(2,'DUMA100','Phong test 002',null,1,'ban luan ve viec hoc tap tu giac cua sinh vienUET',1,1,'2019-02-09 00:00:00','2019-02-09 00:00:00',1,0),
(3,'PHI9090','Phong test 003',null,1,'Nhu cau su dung thu vien cua sinh vien juet vaf vnu',1,2,'2019-02-09 00:00:00','2019-02-09 00:00:00',1,0),
(4,'GAME999','Phong test 004','$10$No0Mgt9pCU1ZgM7JNHQgJ.HWHMTkNDkzURzzaK5Uzk2YwQJWn0ouS',1,'Bai tap lon mon lap trinh web cua thay Viet Anh',1,2,'2019-02-09 00:00:00','2019-02-09 00:00:00',1,0);

--
-- Table structure for table `room_user`
--
CREATE TABLE `room_user` (
`id` int(11) NOT NULL,
`room_id` bigint(20) DEFAULT NULL,
`user_id` bigint(20) DEFAULT NULL,
`roleRoom_id` bigint(20) DEFAULT NULL,
`activeFlg` int(11) NOT NULL
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `room_user`
--

INSERT INTO `room_user` (`id`,`room_id`,`user_id`,`roleRoom_id`,`activeFlg`) values
(1,1,1,1,1),
(2,2,1,2,1),
(3,1,2,1,1),
(4,3,1,1,1);


--
-- Table structure for table `question`
--
CREATE TABLE `question` (
`id` int(11) NOT NULL,
`content` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
`room_id` bigint(20) DEFAULT NULL,
`created` datetime DEFAULT NULL,
`user_id` bigint(20) DEFAULT NULL,
`activeFlg` int(11) NOT NULL
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`id`,`content`,`room_id`,`created`,`user_id`,`activeFlg`) values
(1,'Anh Hieu co dep trai khong ?',1,'2019-02-09 00:00:00',1,1),
(2,'Ban co yeu cho khong ?',1,'2019-02-09 00:00:00',2,1);

--
-- Table structure for table `historyAction`
--
CREATE TABLE `historyAction` (
`id` int(11) NOT NULL,
`user_id` bigint(20) DEFAULT NULL,
`room_id` bigint(20) DEFAULT NULL,
`question_id` bigint(20) DEFAULT NULL,
`action` bigint(20) DEFAULT NULL,     --  action_id like role_id
`created` datetime DEFAULT NULL
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `historyAction`
--

INSERT INTO `historyAction` (`id`,`user_id`,`room_id`,`question_id`,`action`,`created`) values
(1,1,1,1,1,'2019-02-09 00:00:00');



--
-- Table structure for table `functionGlobal`
--
CREATE TABLE `functionGlobal` (
`id` int(11) NOT NULL,
`role_id` bigint(20) DEFAULT NULL,
`function_id` bigint(20) DEFAULT NULL
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `functionGlobal`
--

INSERT INTO `functionGlobal` (`id`,`role_id`,`function_id`) values
(1,1,1),
(2,1,2),
(3,2,1);


--
-- Table structure for table `functionRoom`
--
CREATE TABLE `functionRoom` (
`id` int(11) NOT NULL,
`role_id` bigint(20) DEFAULT NULL,
`function_id` bigint(20) DEFAULT NULL
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `functionRoom`
--

INSERT INTO `functionRoom` (`id`,`role_id`,`function_id`) values
(1,1,1),
(2,1,2),
(3,2,1);

--
-- Table structure for table `function`
--
CREATE TABLE `function` (
`id` int(11) NOT NULL,
`name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
`descibe` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
`created` datetime DEFAULT NULL
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `function`
--

INSERT INTO `function` (`id`,`name`,`descibe`,`created`) values
(1,'view','Co the xem','2019-02-09 00:00:00'),
(2,'delete','Co the xoa','2019-02-09 00:00:00'),
(3,'update','Co the sua','2019-02-09 00:00:00');

--
-- Table structure for table `category`
--
CREATE TABLE `category` (
`id` int(11) NOT NULL,
`name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
`descibe` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
`created` datetime DEFAULT NULL
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`,`name`,`descibe`,`created`) values
(1,'Phong khoa hoc','Cho nhung nguoi muon nghien cuu','2019-02-09 00:00:00'),
(2,'giai tri cuoi tuan','Doc cho vui thoi','2019-02-09 00:00:00'),
(3,'skill','Doc de di chem gio ahihi','2019-02-09 00:00:00');

--
-- Table structure for table `statusRoom`
--
CREATE TABLE `statusRoom` (
`id` int(11) NOT NULL,
`name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
`descibe` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
`created` datetime DEFAULT NULL
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `statusRoom`
--

INSERT INTO `statusRoom` (`id`,`name`,`descibe`,`created`) values
(1,'public','phong mo','2019-02-09 00:00:00'),
(2,'private','phong kin','2019-02-09 00:00:00'),
(3,'close','phong da dong nhung van xem duoc','2019-02-09 00:00:00');


--
-- Table structure for table `survey`
--
CREATE TABLE `survey` (
`id` int(11) NOT NULL,
`name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
`descibe` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
`created` datetime DEFAULT NULL,
`admin` bigint(20) DEFAULT NULL,
`activeFlg` int(11) DEFAULT 1
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `survey`
--

INSERT INTO `survey` (`id`,`name`,`descibe`,`created`,`admin`,`activeFlg`) values
(1,'phieu khao sat 1','phieu khao sat trinh do web sv cntt','2019-02-09 00:00:00',1,1),
(2,'phieu khao sat 2','phieu ks giao vien cntt','2019-02-09 00:00:00',2,1),
(3,'phieu 3','phieu ks cho vui','2019-02-09 00:00:00',1,1);

--
-- Table structure for table `survey_user`
--
CREATE TABLE `survey_user` (
`id` int(11) NOT NULL,
`user_id`  bigint(20) DEFAULT NULL,
`survey_id`  bigint(20) DEFAULT NULL,
`updated` datetime DEFAULT NULL,
`status` int(11) DEFAULT NULL
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `survey_user`
--

INSERT INTO `survey_user` (`id`,`user_id`,`survey_id`,`updated`,`status`) values
(1,1,1,'2019-02-09 00:00:00',1),
(2,1,2,'2019-02-09 00:00:00',0),
(3,1,3,'2019-02-09 00:00:00',0);


--
-- Table structure for table `questionSurvey`
--
CREATE TABLE `questionSurvey` (
`id` int(11) NOT NULL,
`type_id`  bigint(20) DEFAULT NULL,
`survey_id`  bigint(20) DEFAULT NULL,
`content` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `questionSurvey`
--

INSERT INTO `questionSurvey` (`id`,`type_id`,`survey_id`,`content`) values
(1,1,1,'dai hoc cong nghe o dau ?'),
(2,2,1,'anh co dep trai khong ?'),
(3,3,1,'ban nghi sao ve dai hoc cn?');

--
-- Table structure for table `answer`
--
CREATE TABLE `answer` (
`id` int(11) NOT NULL,
`question_id`  bigint(20) DEFAULT NULL,
`amount`  int(11) DEFAULT NULL,
`content` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `answer`
--

INSERT INTO `answer` (`id`,`question_id`,`amount`,`content`) values
(1,1,2,'dh cong nghe o xuan thuy'),
(2,1,1,'dh cong nghe o bac ninh'),
(3,2,2,'YES'),
(4,2,3,'NO'),
(5,3,1,'Dai hoc cong nghe vui vai lin ra hahahaa !');

--
-- Table structure for table `type`
--
CREATE TABLE `type` (
`id` int(11) NOT NULL,
`name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
`descibe` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
`created` datetime DEFAULT NULL
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


--
-- Dumping data for table `type`
--

INSERT INTO `type` (`id`,`name`,`descibe`,`created`) values
(1,'trac nghiem nhieu cau hoi','loai cau hoi cau hoi co nhieu dap an','2019-02-09 00:00:00'),
(2,'trac nghiem dung sai','loai cau hoi dung sai','2019-02-09 00:00:00'),
(3,'cau hoi tu luan','nguoi dung tu tra loi theo tu luan','2019-02-09 00:00:00');


-- --------------------------------------------------------

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`id`),
 ADD KEY `user_role_id` (`role_id`);
 
 --
-- Indexes for table `room`
--
ALTER TABLE `room`
 ADD PRIMARY KEY (`id`),
 ADD KEY `room_category_id` (`category_id`),
 ADD KEY `room_status_id` (`status_id`),
  ADD KEY `user_admin_id` (`admin`);
 
 --
-- Indexes for table `question`
--
ALTER TABLE `question`
 ADD PRIMARY KEY (`id`),
 ADD KEY `question_room_id` (`room_id`),
 ADD KEY `question_user_id` (`user_id`);
 
 --
-- Indexes for table `comment`
--
ALTER TABLE `comment`
 ADD PRIMARY KEY (`id`),
 ADD KEY `comment_user_id` (`user_id`),
 ADD KEY `comment_question_id` (`question_id`);
 
--
-- Indexes for table `room_user`
--
ALTER TABLE `room_user`
 ADD PRIMARY KEY (`id`),
 ADD KEY `room_user_room_id` (`room_id`),
 ADD KEY `room_user_user_id` (`user_id`),
 ADD KEY `room_userroleRoom_id` (`roleRoom_id`);
 
--
-- Indexes for table `historyAction`
--
ALTER TABLE `historyAction`
 ADD PRIMARY KEY (`id`),
 ADD KEY `historyAction_room_id` (`room_id`),
 ADD KEY `historyAction_user_id` (`user_id`),
 ADD KEY `historyAction_question_id` (`question_id`),
 ADD KEY `historyAction_action` (`action`);
 
--
-- Indexes for table `functionGlobal`
--
ALTER TABLE `functionGlobal`
 ADD PRIMARY KEY (`id`),
 ADD KEY `functionGlobal_function_id` (`function_id`),
 ADD KEY `functionGlobal_role_id` (`role_id`);
 
 
--
-- Indexes for table `functionRoom`
--
ALTER TABLE `functionRoom`
 ADD PRIMARY KEY (`id`),
 ADD KEY `functionRoom_function_id` (`function_id`),
 ADD KEY `functionRoom_role_id` (`role_id`);
 
--
-- Indexes for table `roleGlobal`
--
ALTER TABLE `roleGlobal`
 ADD PRIMARY KEY (`id`);
 
--
-- Indexes for table `roleRoom`
--
ALTER TABLE `roleRoom`
 ADD PRIMARY KEY (`id`);
 
--
-- Indexes for table `funtion`
--
ALTER TABLE `function`
 ADD PRIMARY KEY (`id`);
 
--
-- Indexes for table `category`
--
ALTER TABLE `category`
 ADD PRIMARY KEY (`id`);
 
--
-- Indexes for table `statusRoom`
--
ALTER TABLE `statusRoom`
 ADD PRIMARY KEY (`id`);
--
-- Indexes for table `survey`
--
 ALTER TABLE `survey`
 ADD PRIMARY KEY (`id`),
 ADD KEY `admin_fk` (`admin`);

--
-- Indexes for table `survey_user`
--
 ALTER TABLE `survey_user`
 ADD PRIMARY KEY (`id`),
 ADD KEY `survey_user_user_fk` (`user_id`),
  ADD KEY `survey_user_survey_fk` (`survey_id`);

--
-- Indexes for table `answer`
--
 ALTER TABLE `answer`
 ADD PRIMARY KEY (`id`),
 ADD KEY `answer_question_fk` (`question_id`);
 
 --
-- Indexes for table `questionSurvey`
--
 ALTER TABLE `questionSurvey`
 ADD PRIMARY KEY (`id`),
 ADD KEY `question_type_id_fk` (`type_id`),
 ADD KEY `question_survey_id_fk` (`survey_id`);
 
 --
-- Indexes for table `type`
--
 ALTER TABLE `type`
 ADD PRIMARY KEY (`id`);
 
  
  
  
--
-- AUTO_INCREMENT for dumped tables
--
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
 MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
 
--
-- AUTO_INCREMENT for table `roleGlobal`
--
ALTER TABLE `roleGlobal`
 MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
 
--
-- AUTO_INCREMENT for table `roleRoom`
--
ALTER TABLE `roleRoom`
 MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
 
 --
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
 MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
 
 --
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
 MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
  
  
--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
 MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
  
--
-- AUTO_INCREMENT for table `room_user`
--
ALTER TABLE `room_user`
 MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
 
 
--
-- AUTO_INCREMENT for table `historyAction`
--
ALTER TABLE `historyAction`
 MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
 
--
-- AUTO_INCREMENT for table `functionGlobal`
--
ALTER TABLE `functionGlobal`
 MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
 
--
-- AUTO_INCREMENT for table `functionRoom`
--
ALTER TABLE `functionRoom`
 MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT; 

--
-- AUTO_INCREMENT for table `function`
--
ALTER TABLE `function`
 MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
 MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `statusRoom`
--
ALTER TABLE `statusRoom`
 MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `survey`
--
ALTER TABLE `survey`
 MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;


--
-- AUTO_INCREMENT for table `survey_user`
--
ALTER TABLE `survey_user`
 MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `answer`
--
ALTER TABLE `answer`
 MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `questionSurvey`
--
ALTER TABLE `questionSurvey`
 MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `type`
--
ALTER TABLE `type`
 MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;


--
-- Constraints for dumped tables
--

--
-- Constraints for table `user`
--
ALTER TABLE `user` 
 ADD CONSTRAINT `user_role_id` FOREIGN KEY (`role_id`) REFERENCES `roleGlobal` (`id`);
 
--
-- Constraints for table `room`
--
ALTER TABLE `room` 
 ADD CONSTRAINT `room_status_id` FOREIGN KEY (`status_id`) REFERENCES `statusRoom` (`id`),
 ADD CONSTRAINT `room_category_id` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`),
 ADD CONSTRAINT `user_admin_id` FOREIGN KEY (`admin`) REFERENCES `user` (`id`);
 
--
-- Constraints for table `question`
--
ALTER TABLE `question` 
 ADD CONSTRAINT `question_room_id` FOREIGN KEY (`room_id`) REFERENCES `room` (`id`),
 ADD CONSTRAINT `question_user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);
 
--
-- Constraints for table `comment`
--
ALTER TABLE `comment` 
 ADD CONSTRAINT `comment_user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
 ADD CONSTRAINT `comment_question_id` FOREIGN KEY (`question_id`) REFERENCES `question` (`id`);
 
--
-- Constraints for table `room_user`
--
ALTER TABLE `room_user` 
 ADD CONSTRAINT `room_user_room_id` FOREIGN KEY (`room_id`) REFERENCES `room` (`id`),
 ADD CONSTRAINT `room_user_user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
 ADD CONSTRAINT `room_user_roleRoom_id` FOREIGN KEY (`roleRoom_id`) REFERENCES `roleRoom` (`id`);
 
--
-- Constraints for table `historyAction`
--
ALTER TABLE `historyAction` 
 ADD CONSTRAINT `historyAction_user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
 ADD CONSTRAINT `historyAction_question_id` FOREIGN KEY (`question_id`) REFERENCES `question` (`id`),
 ADD CONSTRAINT `historyAction_room_id` FOREIGN KEY (`room_id`) REFERENCES `room` (`id`),
 ADD CONSTRAINT `historyAction_action` FOREIGN KEY (`action`) REFERENCES `function` (`id`);
 
--
-- Constraints for table `functionGlobal`
--
ALTER TABLE `functionGlobal` 
 ADD CONSTRAINT `functionGlobal_role_id` FOREIGN KEY (`role_id`) REFERENCES `roleGlobal` (`id`),
 ADD CONSTRAINT `functionGlobal_function_id` FOREIGN KEY (`function_id`) REFERENCES `function` (`id`);
 
--
-- Constraints for table `functionRoom`
--
ALTER TABLE `functionRoom` 
 ADD CONSTRAINT `functionRoom_role_id` FOREIGN KEY (`role_id`) REFERENCES `roleRoom` (`id`),
 ADD CONSTRAINT `functionRoom_function_id` FOREIGN KEY (`function_id`) REFERENCES `function` (`id`);
  --
-- Constraints for table `survey`
--
ALTER TABLE `survey` 
 ADD CONSTRAINT `admin_fk` FOREIGN KEY (`admin`) REFERENCES `user` (`id`);
--
-- Constraints for table `survey_user`
--
ALTER TABLE `survey_user` 
 ADD CONSTRAINT `survey_user_user_fk` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
 ADD CONSTRAINT `survey_user_survey_fk` FOREIGN KEY (`survey_id`) REFERENCES `survey` (`id`);
 
 --
-- Constraints for table `answer`
--
ALTER TABLE `answer` 
 ADD CONSTRAINT `answer_question_fk` FOREIGN KEY (`question_id`) REFERENCES `questionSurvey` (`id`);
 
  --
-- Constraints for table `answer`
--
ALTER TABLE `questionSurvey` 
 ADD CONSTRAINT `question_survey_id_fk` FOREIGN KEY (`survey_id`) REFERENCES `survey` (`id`),
 ADD CONSTRAINT `question_type_id_fk` FOREIGN KEY (`type_id`) REFERENCES `type` (`id`);
 
 
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- drop database forum_db;




