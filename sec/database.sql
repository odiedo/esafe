create database `uni_sec`;


DROP TABLE IF EXISTS `prof_pic`;
CREATE TABLE `prof_pic` (
    `image_id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `id_number` varchar(200) NOT NULL,
    `image_up` longtext NOT NULL    
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS `p_user`;
CREATE TABLE `p_user` (
    `user_id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `username` varchar(200) NOT NULL,
    `id_number` varchar(200) NOT NULL,
    `phone` int(10) NOT NULL,
    `email` varchar(200) NOT NULL,
    `home_location` varchar(255) NOT NULL,
    `gender` varchar(200) NOT NULL,
    `password` varchar(255) NOT NULL,
    `join_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `image` longtext NOT NULL    
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS `report`;
CREATE TABLE `report` (
    `report_id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `id_number` varchar(200) NOT NULL,
    `phone` int(10) NOT NULL,
    `title` varchar(200) NOT NULL,
    `description` varchar(200) NOT NULL,
    `location` varchar(255) NOT NULL,
    `address` varchar(200) NOT NULL,
    `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `feedback` VARCHAR(10) NOT NULL, 
    `attended` VARCHAR(10) NOT NULL, 
    `satisfied` VARCHAR(10) NOT NULL,
    `follow_up` VARCHAR(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS `fire`;
CREATE TABLE `fire` (
    `report_id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `id_number` varchar(200) NOT NULL,
    `phone` int(10) NOT NULL,
    `nfire` varchar(200) NOT NULL,
    `description` varchar(200) NOT NULL,
    `location` varchar(255) NOT NULL,
    `address` varchar(200) NOT NULL,
    `active_phone` int(10) NOT NULL,
    `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `feedback` VARCHAR(10) NOT NULL, 
    `attended` VARCHAR(10) NOT NULL, 
    `satisfied` VARCHAR(10) NOT NULL,
    `follow_up` VARCHAR(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS `caretaker`;
CREATE TABLE `caretaker` (
    `care_id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `username` varchar(200) NOT NULL,
    `id_number` varchar(200) NOT NULL,
    `phone` int(10) NOT NULL,
    `email` varchar(200) NOT NULL,
    `hostel` varchar(255) NOT NULL,
    `gender` varchar(200) NOT NULL,
    `password` varchar(255) NOT NULL,
    `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `image` longtext NOT NULL    
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS `uni_security`;
CREATE TABLE `uni_security` (
    `sec_id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `username` varchar(200) NOT NULL,
    `id_number` varchar(200) NOT NULL,
    `phone` int(10) NOT NULL,
    `gender` varchar(200) NOT NULL,
    `password` varchar(255) NOT NULL,
    `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `image` longtext NOT NULL    
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS `most_wanted`;
CREATE TABLE `most_wanted` (
    `wanted_id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `sec_id` int(20) NOT NULL,
    `cname` varchar(200) NOT NULL,
    `ctitle` varchar(200) NOT NULL,
    `cdesc` varchar(200) NOT NULL,
    `crate` int(20) NOT NULL,
    `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `filename` VARCHAR(100)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS `missing_person`;
CREATE TABLE `missing_person` (
    `missing_id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `sec_id` int(20) NOT NULL,
    `mname` varchar(200) NOT NULL,
    `last_time` varchar(200) NOT NULL,
    `last_location` varchar(200) NOT NULL,
    `mdesc` varchar(200) NOT NULL,
    `phone` int(20) NOT NULL,
    `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `filename` VARCHAR(100)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS `comments`;
CREATE TABLE `comments` (
  `id` int(255) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `message` text,
  `report_id` int(255) DEFAULT NULL,
  `post_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `chat`;
CREATE TABLE `chat` (
  `chat_id` int(255) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `message` text,
  `id_number` int(255) DEFAULT NULL,
  `chat_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `walk_map`;
CREATE TABLE `walk_map` (
  `walk_id` int(255) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `id_number` VARCHAR(30) NOT NULL,
  `walk_code` VARCHAR(255) NOT NULL,
  `walk_title` varchar(255) DEFAULT NULL,
  `start` varchar(255) DEFAULT NULL,
  `destination` varchar(255) DEFAULT NULL,
  `zone` varchar(255) DEFAULT NULL,
  `esafe` varchar(255) DEFAULT NULL,
  `walk_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS `walk_progress`;
CREATE TABLE `walk_progress` (
  `progress_id` int(255) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `id_number` VARCHAR(30) NOT NULL,
  `walk_code` VARCHAR(30) NOT NULL,
  `progress` varchar(255) DEFAULT NULL,
  `walk_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS `my_circle`;
CREATE TABLE `my_circle` (
    `zone_id` INT(4) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `id_number` VARCHAR(30) NOT NULL,
    `name` VARCHAR(50) NOT NULL, 
    `phone` VARCHAR(30) NOT NULL,
    `join_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS `my_circle_messages`;
CREATE TABLE `my_circle_messages` (
    `circle_message_id` INT(4) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `id_number` VARCHAR(30) NOT NULL,
    `message` VARCHAR(30) NOT NULL,
    `hostel` VARCHAR(50) NOT NULL, 
    `feedback` VARCHAR(10) NOT NULL, 
    `attended` VARCHAR(10) NOT NULL, 
    `satisfied` VARCHAR(10) NOT NULL, 
    `location` VARCHAR(255) NOT NULL,
    `phone` INT(11) NOT NULL,
    `ambulance` VARCHAR(255) NOT NULL, 
    `sent_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `Medical_emergency`;
CREATE TABLE `Medical_emergency` (
    `medical_id` INT(4) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `id_number` VARCHAR(30) NOT NULL,
    `message` VARCHAR(30) NOT NULL,
    `hostel` VARCHAR(50) NOT NULL, 
    `feedback` VARCHAR(10) NOT NULL, 
    `attended` VARCHAR(10) NOT NULL, 
    `satisfied` VARCHAR(10) NOT NULL, 
    `location` VARCHAR(255) NOT NULL,
    `phone` INT(11) NOT NULL,
    `ambulance` VARCHAR(255) NOT NULL, 
    `sent_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `officer_location`;
CREATE TABLE `officer_location` (
  `officer_loc_id` int(255) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `id_number` VARCHAR(30) NOT NULL,
  `location_code` VARCHAR(30) NOT NULL,
  `progress` varchar(255) DEFAULT NULL,
  `walk_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS `notice`;
CREATE TABLE `notice` (
  `notice_id` int(255) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `id_number` int(30) NOT NULL,
  `message` VARCHAR(255) NOT NULL,
  `venue` varchar(100) DEFAULT NULL,
  `time` VARCHAR(30) NOT NULL,
  `date` VARCHAR(30) NOT NULL,
  `tag` VARCHAR(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

