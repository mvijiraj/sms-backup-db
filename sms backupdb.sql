/*
SQLyog Ultimate v8.55 
MySQL - 5.5.5-10.4.24-MariaDB : Database - smsvijedb
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`smsvijedb` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `smsvijedb`;

/*Table structure for table `tbl_city` */

DROP TABLE IF EXISTS `tbl_city`;

CREATE TABLE `tbl_city` (
  `city_id` int(10) NOT NULL AUTO_INCREMENT,
  `city_name` varchar(20) NOT NULL,
  PRIMARY KEY (`city_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tbl_city` */

insert  into `tbl_city`(`city_id`,`city_name`) values (1,'Negombo'),(2,'Colombo'),(3,'Kandy '),(4,'Matara');

/*Table structure for table `tbl_notification` */

DROP TABLE IF EXISTS `tbl_notification`;

CREATE TABLE `tbl_notification` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `title` varchar(10) DEFAULT NULL,
  `msg` varchar(250) DEFAULT NULL,
  `created_datetime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_user` int(5) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_notification` */

insert  into `tbl_notification`(`id`,`title`,`msg`,`created_datetime`,`created_user`) values (1,'Holiday','Today is holiday','2022-11-28 22:00:03',4),(2,'asdasdsad','asdasdsadsadsad','2022-11-28 22:10:47',4),(3,'This is','This is sample','2022-11-28 22:10:57',4),(4,'no class t','there is noclass','2023-01-13 22:15:32',3),(5,'holi','noclass','2023-01-14 21:49:23',3),(6,'holi','noclass','2023-01-14 21:50:36',3),(7,'','','2023-01-14 21:51:10',3),(8,'','','2023-01-14 21:51:17',3),(9,'ddf','fg','2023-01-14 21:56:30',2),(10,'holiday','the leave has been cancelled today','2023-01-16 09:00:33',3),(11,'Resumption','The class will be resumed as scheduled','2023-01-16 10:29:53',4),(12,'dw','fsfd','2023-01-20 19:14:46',4);

/*Table structure for table `tbl_student` */

DROP TABLE IF EXISTS `tbl_student`;

CREATE TABLE `tbl_student` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `fname` varchar(50) DEFAULT NULL,
  `lname` varchar(50) DEFAULT NULL,
  `nic` varchar(12) DEFAULT NULL,
  `dob` varchar(30) DEFAULT NULL,
  `created_user` int(5) DEFAULT NULL,
  `created_datetime` timestamp NOT NULL DEFAULT current_timestamp(),
  `city_id` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_student` */

insert  into `tbl_student`(`id`,`fname`,`lname`,`nic`,`dob`,`created_user`,`created_datetime`,`city_id`) values (1,'Shaman','Perera','9996655',NULL,NULL,'2022-10-23 17:18:18',1),(2,'Samantha','Fernando','334455','',3,'2022-11-28 21:48:37',2),(3,'Vijay','marimuthu','2222','2022-09-12',0,'2023-01-14 20:37:33',3),(4,'Yanush','Vijay','235689','2023-01-11',3,'2023-01-16 10:34:06',4),(5,'vani','Megan','222222','2023-01-16',3,'2023-01-20 19:09:19',1),(6,'Soundar','Raja','333333','02-11-1967',NULL,'2023-01-22 07:32:05',1),(7,'Soundar','Raja','333333','02-11-1967',NULL,'2023-01-22 07:32:07',2),(8,NULL,NULL,NULL,NULL,NULL,'2023-01-22 21:08:29',4);

/*Table structure for table `tbl_student_subject` */

DROP TABLE IF EXISTS `tbl_student_subject`;

CREATE TABLE `tbl_student_subject` (
  `student_id` int(5) NOT NULL,
  `subject_id` int(5) NOT NULL,
  `enroll_datetime` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`student_id`,`subject_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tbl_student_subject` */

insert  into `tbl_student_subject`(`student_id`,`subject_id`,`enroll_datetime`) values (2,1,'2023-01-17 21:11:50'),(2,2,'2023-01-20 19:20:10'),(2,4,'2023-01-21 21:30:17'),(2,6,'2022-12-06 22:29:37'),(2,7,'2023-01-20 19:17:05'),(2,9,'2023-01-23 19:18:49'),(3,5,'2023-01-14 22:01:47'),(4,9,'2023-01-13 22:08:12'),(5,1,'2022-12-06 22:28:06'),(5,4,'2022-12-06 22:29:01'),(5,5,'2023-01-13 22:12:41'),(5,6,'2022-12-06 22:40:35'),(5,8,'2023-01-23 19:20:43'),(5,9,'2023-01-13 22:09:38'),(6,4,'2023-01-17 20:59:59'),(6,5,'2023-01-24 16:43:39'),(8,7,'2023-01-24 16:40:54');

/*Table structure for table `tbl_subject` */

DROP TABLE IF EXISTS `tbl_subject`;

CREATE TABLE `tbl_subject` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `subject_name` varchar(50) DEFAULT NULL,
  `duration` int(3) DEFAULT NULL,
  `fee` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `NewIndex1` (`subject_name`),
  UNIQUE KEY `NewIndex2` (`subject_name`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_subject` */

insert  into `tbl_subject`(`id`,`subject_name`,`duration`,`fee`) values (1,'ICT',10,'15000.00'),(2,'commerce',10,'5600.00'),(4,'maths',6,'6000.00'),(5,'English',6,'7500.00'),(6,'history',5,'258.00'),(7,'etech',6,'12000.00'),(8,'sfs',8,'254.00'),(9,'Science',10,'4700.00');

/*Table structure for table `tbl_teacher` */

DROP TABLE IF EXISTS `tbl_teacher`;

CREATE TABLE `tbl_teacher` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `fname` varchar(50) DEFAULT NULL,
  `lname` varchar(50) DEFAULT NULL,
  `tp` int(10) DEFAULT NULL,
  `nic` varchar(12) DEFAULT NULL,
  `created_by` int(1) DEFAULT NULL,
  `created_datetime` timestamp NULL DEFAULT current_timestamp(),
  `subject_id` int(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_teacher` */

insert  into `tbl_teacher`(`id`,`fname`,`lname`,`tp`,`nic`,`created_by`,`created_datetime`,`subject_id`) values (1,'Ravi','Fernan',7158888,'9999',1,'2022-10-23 17:12:31',1),(2,'Kumara','Gamagae',223355,'223355',2,'2022-10-23 17:12:31',2),(3,'Gihan','Fernando',22222,'221133',3,'2022-11-23 21:54:29',5),(4,'Samantha','Fernando',22222,'556677',3,'2022-11-23 22:01:01',6),(5,'ravi','kumar',121212,'121212',0,'2023-01-14 20:43:19',3),(6,'ravi','kumar',121212,'121212',0,'2023-01-14 20:43:19',4),(7,'yanushkaan','vijayaragavan',1770654401,'221133',3,'2023-01-16 10:44:46',5),(8,'yanushkaan','vijayaragavan',1770654401,'221133',3,'2023-01-16 10:44:46',6),(9,'Patric','Kandasamy',666666,'666666',3,'2023-01-20 19:07:54',2),(10,'Patric','ramesh',777777,'777777',3,'2023-01-20 19:07:55',1),(11,'Rani','gipal',888888,'888888',3,'2023-01-23 19:17:12',1),(12,'Rani','vel',555555,'555555',3,'2023-01-23 19:17:12',2);

/*Table structure for table `tbl_user` */

DROP TABLE IF EXISTS `tbl_user`;

CREATE TABLE `tbl_user` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `nic` varchar(12) DEFAULT NULL,
  `pword` text DEFAULT NULL,
  `user_role` varchar(20) DEFAULT NULL,
  `created_user` int(5) DEFAULT NULL,
  `created_datetime` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_user` int(1) DEFAULT NULL,
  `updated_datetime` varchar(30) DEFAULT NULL,
  `status_code` varchar(20) DEFAULT 'ACTIVE',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_user` */

insert  into `tbl_user`(`id`,`nic`,`pword`,`user_role`,`created_user`,`created_datetime`,`updated_user`,`updated_datetime`,`status_code`) values (1,'9999','123456','TEACHER',1,'2022-10-23 17:15:54',NULL,NULL,'ACTIVE'),(2,'9996655','9996655','STUDENT',NULL,'2022-10-23 17:18:43',NULL,NULL,'ACTIVE'),(3,'8888','123456','ADMIN',NULL,'2022-11-14 21:41:11',NULL,NULL,'ACTIVE'),(4,'221133','556677','TEACHER',3,'2022-11-23 22:01:01',NULL,NULL,'ACTIVE'),(5,'334455','334455','STUDENT',3,'2022-11-28 21:48:37',NULL,NULL,'ACTIVE'),(6,'2222','2222','STUDENT',0,'2023-01-14 20:37:33',NULL,NULL,'ACTIVE'),(7,'235689','235689','STUDENT',3,'2023-01-16 10:34:07',NULL,NULL,'ACTIVE'),(8,'333333','222222','STUDENT',3,'2023-01-20 19:09:19',NULL,NULL,'ACTIVE');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
