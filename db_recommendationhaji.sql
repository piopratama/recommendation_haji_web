/*
SQLyog Community v13.0.1 (64 bit)
MySQL - 10.1.35-MariaDB : Database - db_recommendation_haji
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`db_recommendation_haji` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `db_recommendation_haji`;

/*Table structure for table `tb_login` */

DROP TABLE IF EXISTS `tb_login`;

CREATE TABLE `tb_login` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=latin1;

/*Data for the table `tb_login` */

insert  into `tb_login`(`id`,`username`,`password`,`level`) values 
(1,'admin','21232f297a57a5a743894a0e4a801fc3',0),
(39,'ari','fc292bd7df071858c2d0f955545673c1',1);

/*Table structure for table `tb_packet` */

DROP TABLE IF EXISTS `tb_packet`;

CREATE TABLE `tb_packet` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_travel` int(11) NOT NULL,
  `packet` varchar(100) NOT NULL,
  `date_start` datetime NOT NULL,
  `date_end` datetime NOT NULL,
  `type` enum('umroh','haji') NOT NULL,
  `price` double NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `tb_packet` */

insert  into `tb_packet`(`id`,`id_travel`,`packet`,`date_start`,`date_end`,`type`,`price`,`description`) values 
(1,1,'haji 2','2019-03-31 14:50:10','2019-03-31 14:50:10','umroh',50000,'');

/*Table structure for table `tb_travel` */

DROP TABLE IF EXISTS `tb_travel`;

CREATE TABLE `tb_travel` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `travel` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `telp` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `logo` text NOT NULL,
  `rating` double NOT NULL,
  `license` varchar(100) NOT NULL,
  `id_user` int(20) NOT NULL,
  `status_travel` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `tb_travel` */

insert  into `tb_travel`(`id`,`travel`,`address`,`telp`,`email`,`description`,`logo`,`rating`,`license`,`id_user`,`status_travel`) values 
(1,'haji travel','ubud','123','haji@gmail.com','haji','http://192.168.100.5/github/recommendation_haji_service/thumbnail/dromedary.png',0,'haji-11',39,1);

/*Table structure for table `tb_user` */

DROP TABLE IF EXISTS `tb_user`;

CREATE TABLE `tb_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `telp` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `image` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=latin1;

/*Data for the table `tb_user` */

insert  into `tb_user`(`id`,`name`,`address`,`telp`,`email`,`image`) values 
(16,'adi','bali','123','adi@gmail.com',''),
(39,'ari','bali','123','ari','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');

/*Table structure for table `tb_user_booking` */

DROP TABLE IF EXISTS `tb_user_booking`;

CREATE TABLE `tb_user_booking` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user_packet` int(11) DEFAULT NULL,
  `name` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `telp` varchar(20) NOT NULL,
  `email` text NOT NULL,
  `image` text NOT NULL,
  `description` varchar(300) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=93 DEFAULT CHARSET=latin1;

/*Data for the table `tb_user_booking` */

insert  into `tb_user_booking`(`id`,`id_user_packet`,`name`,`address`,`telp`,`email`,`image`,`description`,`status`) values 
(91,101,'a','b','1','c','http://192.168.100.8/github/recommendation_haji_service/assets/images/img91.png','',1);

/*Table structure for table `tb_user_packet` */

DROP TABLE IF EXISTS `tb_user_packet`;

CREATE TABLE `tb_user_packet` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `id_packet` int(11) NOT NULL,
  `description` text NOT NULL,
  `status_book` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=103 DEFAULT CHARSET=latin1;

/*Data for the table `tb_user_packet` */

insert  into `tb_user_packet`(`id`,`id_user`,`id_packet`,`description`,`status_book`) values 
(101,39,1,'',0);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
