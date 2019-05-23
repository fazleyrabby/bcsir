-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 11, 2017 at 07:48 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `saibonso_thedux`
--

-- --------------------------------------------------------

--
-- Table structure for table `bal_statement`
--

CREATE TABLE `bal_statement` (
  `id` bigint(100) UNSIGNED NOT NULL,
  `in_id` int(11) DEFAULT NULL,
  `exp_id` int(11) DEFAULT NULL,
  `sal_id` bigint(100) UNSIGNED DEFAULT NULL,
  `item_id` int(11) NOT NULL DEFAULT '0',
  `amount_in` int(11) DEFAULT '0',
  `amount_exp` int(11) DEFAULT '0',
  `s_id` int(100) DEFAULT NULL,
  `t_id` int(100) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `promt_id` bigint(100) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `bank_branch`
--

CREATE TABLE `bank_branch` (
  `id` int(11) NOT NULL,
  `branch_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mobile` varchar(14) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bank_id` int(11) NOT NULL,
  `is_trashed` enum('No','Yes') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'No'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `bank_branch`
--

INSERT INTO `bank_branch` (`id`, `branch_name`, `address`, `mobile`, `bank_id`, `is_trashed`) VALUES
  (1, 'OR Nizam Road Branch', 'CDA Avenue', NULL, 2, 'No');

-- --------------------------------------------------------

--
-- Table structure for table `bank_info`
--

CREATE TABLE `bank_info` (
  `id` int(11) NOT NULL,
  `bank_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mobile` varchar(14) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_trashed` enum('No','Yes') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'No'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `bank_info`
--

INSERT INTO `bank_info` (`id`, `bank_name`, `address`, `mobile`, `is_trashed`) VALUES
  (1, 'Dutch Bangla Bank Limited', NULL, NULL, 'No'),
  (2, 'City Bank', NULL, NULL, 'No'),
  (3, 'Mutual Trust Bank', NULL, NULL, 'No');

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `id` int(11) NOT NULL,
  `c_name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `c_id` int(11) NOT NULL,
  `total_subject` int(2) NOT NULL,
  `gpa_divide` int(3) DEFAULT NULL,
  `is_trashed` enum('No','Yes') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'No'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`id`, `c_name`, `c_id`, `total_subject`, `gpa_divide`, `is_trashed`) VALUES
  (4, 'One', 1, 6, 6, 'No'),
  (5, 'Two', 2, 7, 7, 'No'),
  (6, 'Three', 3, 9, 9, 'No'),
  (7, 'Four', 4, 9, 9, 'No'),
  (8, 'Five', 5, 6, 6, 'No'),
  (9, 'Six', 6, 11, 11, 'No'),
  (10, 'Sevenn', 7, 11, 11, 'No'),
  (11, 'Eight', 8, 11, 11, 'No'),
  (12, 'Nine', 9, 12, 11, 'No'),
  (13, 'Ten', 10, 12, 11, 'No'),
  (1, 'Play', 101, 4, 4, 'No'),
  (2, 'Nursery', 102, 4, 4, 'No'),
  (3, 'KG', 103, 4, 4, 'No');

-- --------------------------------------------------------

--
-- Table structure for table `class_payment`
--

CREATE TABLE `class_payment` (
  `id` int(11) NOT NULL COMMENT 'Class Payment ID',
  `tuition_fee` int(11) NOT NULL DEFAULT '0' COMMENT 'Class Payment Fee',
  `c_id` int(11) NOT NULL COMMENT 'Class ID',
  `grp_id` int(11) NOT NULL COMMENT 'Group ID',
  `is_trashed` enum('No','Yes') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'No'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `class_payment`
--

INSERT INTO `class_payment` (`id`, `tuition_fee`, `c_id`, `grp_id`, `is_trashed`) VALUES
  (2, 800, 102, 1, 'No'),
  (3, 800, 103, 1, 'No'),
  (4, 800, 1, 1, 'No'),
  (5, 800, 2, 1, 'No'),
  (6, 800, 3, 1, 'No'),
  (7, 800, 4, 1, 'No'),
  (8, 800, 5, 1, 'No'),
  (9, 800, 6, 1, 'No'),
  (10, 800, 7, 1, 'No'),
  (11, 800, 8, 1, 'No'),
  (12, 1000, 9, 2, 'No'),
  (13, 1000, 9, 3, 'No'),
  (14, 1000, 9, 4, 'No'),
  (15, 1000, 10, 2, 'No'),
  (16, 1000, 10, 3, 'No'),
  (17, 1000, 10, 4, 'No');

-- --------------------------------------------------------

--
-- Table structure for table `expense`
--

CREATE TABLE `expense` (
  `id` int(100) NOT NULL,
  `item_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL DEFAULT '0',
  `total` int(11) NOT NULL DEFAULT '0',
  `discount_fee` int(11) NOT NULL DEFAULT '0',
  `s_id` int(100) DEFAULT NULL,
  `t_id` int(100) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `remarks` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Triggers `expense`
--
DELIMITER $$
CREATE TRIGGER `t_expense_before_insert` BEFORE INSERT ON `expense` FOR EACH ROW SET NEW.`amount` = NEW.`total` - NEW.`discount_fee`
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `t_expense_before_update` BEFORE UPDATE ON `expense` FOR EACH ROW SET NEW.`amount` = NEW.`total` - NEW.`discount_fee`
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `t_expense_statement_delete` AFTER DELETE ON `expense` FOR EACH ROW DELETE FROM `bal_statement` where exp_id=old.id
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `t_expense_statement_insert` AFTER INSERT ON `expense` FOR EACH ROW INSERT INTO `bal_statement` (`exp_id`, `amount_exp`, `created_at`,`item_id`,`s_id`,`t_id`)
VALUES (NEW.`id`,NEW.`amount`,NEW.`created_at`,NEW.`item_id`,NEW.`s_id`,NEW.`t_id`)
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `t_expense_statement_update` AFTER UPDATE ON `expense` FOR EACH ROW UPDATE `bal_statement`
SET `amount_exp`= NEW.`amount`,`item_id`= NEW.`item_id`,`updated_at`= NEW.`updated_at`
WHERE `exp_id`= NEW.`id`
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `gpa`
--

CREATE TABLE `gpa` (
  `s_id` int(11) NOT NULL,
  `yr` int(11) NOT NULL,
  `term_id` int(11) NOT NULL,
  `c_id` int(11) NOT NULL,
  `gpa` decimal(11,2) NOT NULL,
  `ga` varchar(6) COLLATE utf8_unicode_ci NOT NULL,
  `sms_status` enum('0','1') COLLATE utf8_unicode_ci NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Triggers `gpa`
--
DELIMITER $$
CREATE TRIGGER `t_gpa_insert` BEFORE INSERT ON `gpa` FOR EACH ROW BEGIN
  IF (NEW.`gpa`>=5) THEN
    SET NEW.`ga` = 'A+';
  ELSEIF (NEW.`gpa`>=4) THEN
    SET NEW.`ga` = 'A';
  ELSEIF (NEW.`gpa`>=3.5) THEN
    SET NEW.`ga` = 'A-';
  ELSEIF (NEW.`gpa`>=3) THEN
    SET NEW.`ga` = 'B';
  ELSEIF (NEW.`gpa`>=2) THEN
    SET NEW.`ga` = 'C';
  ELSEIF (NEW.`gpa`>=1) THEN
    SET NEW.`ga` = 'D';
  ELSE
    SET NEW.`ga` = 'F';
  END IF;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `t_gpa_update` BEFORE UPDATE ON `gpa` FOR EACH ROW BEGIN
  IF (NEW.`gpa`>=5) THEN
    SET NEW.`ga` = 'A+';
  ELSEIF (NEW.`gpa`>=4) THEN
    SET NEW.`ga` = 'A';
  ELSEIF (NEW.`gpa`>=3.5) THEN
    SET NEW.`ga` = 'A-';
  ELSEIF (NEW.`gpa`>=3) THEN
    SET NEW.`ga` = 'B';
  ELSEIF (NEW.`gpa`>=2) THEN
    SET NEW.`ga` = 'C';
  ELSEIF (NEW.`gpa`>=1) THEN
    SET NEW.`ga` = 'D';
  ELSE
    SET NEW.`ga` = 'F';
  END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `grp`
--

CREATE TABLE `grp` (
  `id` int(11) NOT NULL,
  `group_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `is_trashed` enum('No','Yes') COLLATE utf8_unicode_ci DEFAULT 'No'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `grp`
--

INSERT INTO `grp` (`id`, `group_name`, `is_trashed`) VALUES
  (1, 'General', 'No'),
  (2, 'Science', 'No'),
  (3, 'Business Studies', 'No'),
  (4, 'Humanities', 'No');

-- --------------------------------------------------------

--
-- Table structure for table `income`
--

CREATE TABLE `income` (
  `id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL DEFAULT '0',
  `total` int(11) NOT NULL DEFAULT '0',
  `discount_fee` int(11) NOT NULL DEFAULT '0',
  `s_id` int(100) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `remarks` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Triggers `income`
--
DELIMITER $$
CREATE TRIGGER `t_income_before_insert` BEFORE INSERT ON `income` FOR EACH ROW SET NEW.`amount` = NEW.`total` - NEW.`discount_fee`
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `t_income_before_update` BEFORE UPDATE ON `income` FOR EACH ROW SET NEW.`amount` = NEW.`total` - NEW.`discount_fee`
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `t_income_statement_delete` AFTER DELETE ON `income` FOR EACH ROW DELETE FROM `bal_statement` where in_id=old.id
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `t_income_statement_insert` AFTER INSERT ON `income` FOR EACH ROW INSERT INTO `bal_statement` (`in_id`, `amount_in`, `created_at`,`item_id`,`s_id`)
VALUES (NEW.`id`,NEW.`amount`,NEW.`created_at`,NEW.`item_id`,NEW.`s_id`)
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `t_income_statement_update` AFTER UPDATE ON `income` FOR EACH ROW UPDATE `bal_statement`
SET `amount_in`= NEW.`amount`,`item_id`= NEW.`item_id`,`updated_at`= NEW.`updated_at`
WHERE `in_id`= NEW.`id`
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `institution`
--

CREATE TABLE `institution` (
  `id` int(11) NOT NULL,
  `ins_full_name` varchar(100) DEFAULT NULL,
  `ins_short_name` varchar(50) DEFAULT NULL,
  `ins_address` varchar(255) DEFAULT NULL,
  `ins_mobile` varchar(20) DEFAULT NULL,
  `ins_email` varchar(100) DEFAULT NULL,
  `ins_web` varchar(100) DEFAULT NULL,
  `board_no` varchar(100) DEFAULT NULL,
  `logo` varchar(100) NOT NULL,
  `ins_path` varchar(20) NOT NULL,
  `is_trashed` enum('Yes','No') NOT NULL DEFAULT 'No'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `institution`
--

INSERT INTO `institution` (`id`, `ins_full_name`, `ins_short_name`, `ins_address`, `ins_mobile`, `ins_email`, `ins_web`, `board_no`, `logo`, `ins_path`, `is_trashed`) VALUES
  (1, 'S@ibonsoft', NULL, NULL, NULL, NULL, 'http://saibonsoft.com', NULL, '', '', 'No'),
  (2, 'The Dux School', 'dux', 'Mohammad Nagar, Bayezid, Chittagong', '01972040303', 'sam@gmial.com', 'http://www.hollyhockeducation.com', '1233', 'logo.png', 'HS', 'No');

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `id` int(11) NOT NULL,
  `item_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `item_type` enum('Dr','Cr','DC') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'DC',
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `is_trashed` enum('Yes','No') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'No'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`id`, `item_name`, `item_type`, `created_at`, `updated_at`, `is_trashed`) VALUES
  (1, 'Admission', 'Cr', '2017-06-18 03:10:11', NULL, 'No'),
  (2, 'Promotion', 'Cr', '2017-06-18 03:10:11', NULL, 'No'),
  (3, 'Student Salary', 'Cr', '2017-06-18 04:13:16', NULL, 'No'),
  (4, 'Teacher Salary', 'Dr', '2017-06-18 03:10:11', NULL, 'No'),
  (5, 'Syllabus3', 'Cr', '2017-06-18 03:10:11', '2017-08-11 14:11:22', 'No'),
  (6, 'Electricity Bill', 'Dr', '2017-06-18 06:15:00', NULL, 'No'),
  (7, 'Snack', 'Dr', '2017-07-24 08:17:00', '2017-07-24 18:55:21', 'No'),
  (8, 'Sheet', 'Cr', '2017-07-24 22:54:19', NULL, 'No'),
  (9, 'Teacher Salary (Hourly)', 'Dr', '2017-07-26 00:00:00', NULL, 'No');

-- --------------------------------------------------------

--
-- Table structure for table `message_count`
--

CREATE TABLE `message_count` (
  `sl_no` int(11) NOT NULL,
  `msg_date` datetime NOT NULL,
  `msg_recieve` int(11) NOT NULL DEFAULT '0',
  `msg_lost` int(11) NOT NULL DEFAULT '0',
  `msg_type` varchar(15) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `month`
--

CREATE TABLE `month` (
  `id` int(11) NOT NULL,
  `month_name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `month`
--

INSERT INTO `month` (`id`, `month_name`) VALUES
  (1, 'January'),
  (2, 'February'),
  (3, 'March'),
  (4, 'April'),
  (5, 'May'),
  (6, 'June'),
  (7, 'July'),
  (8, 'August'),
  (9, 'September'),
  (10, 'October'),
  (11, 'November'),
  (12, 'December');

-- --------------------------------------------------------

--
-- Table structure for table `result`
--

CREATE TABLE `result` (
  `id` bigint(11) UNSIGNED NOT NULL,
  `s_id` int(11) NOT NULL,
  `yr` int(11) NOT NULL,
  `c_id` int(11) NOT NULL,
  `sub_id` int(4) NOT NULL,
  `mcq` int(11) DEFAULT NULL,
  `written` int(11) DEFAULT NULL,
  `practical` int(11) DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `grade_point` decimal(11,2) DEFAULT NULL,
  `grade` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `term_id` int(11) NOT NULL,
  `is_trashed` varchar(5) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Triggers `result`
--
DELIMITER $$
CREATE TRIGGER `t_result_delete` AFTER DELETE ON `result` FOR EACH ROW UPDATE gpa g
SET g.gpa = (
  SELECT ROUND(SUM(
                   CASE
                   WHEN grade_point>=3 and sub_id > 500 THEN grade_point-2
                   WHEN grade_point<=2 and sub_id > 500 THEN grade_point=0
                   ELSE grade_point
                   END)/(SELECT gpa_divide FROM `class` WHERE c_id = OLD.c_id),2) as 'grade_point'
  FROM `result` GROUP BY s_id,yr,term_id, c_id HAVING yr=OLD.yr and term_id=OLD.term_id and c_id =OLD.c_id and s_id = OLD.s_id )
WHERE g.yr=OLD.yr and g.term_id=OLD.term_id and g.c_id =OLD.c_id and g.s_id =OLD.s_id
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `t_result_insert` BEFORE INSERT ON `result` FOR EACH ROW BEGIN
  SET NEW.`total` = COALESCE(NEW.`mcq`,0) + COALESCE(NEW.`written`,0) + COALESCE(NEW.`practical`,0);
  IF NEW.sub_id = (SELECT id FROM `subject` WHERE total_marks=100 AND id=NEW.sub_id) THEN
    IF (NEW.`total`>=80) THEN
      SET NEW.`grade` = 'A+';
      SET NEW.`grade_point` = 5;
    ELSEIF (NEW.`total`>=70) THEN
      SET NEW.`grade_point` = 4;
      SET NEW.`grade` = 'A';
    ELSEIF (NEW.`total`>=60) THEN
      SET NEW.`grade_point` = 3.5;
      SET NEW.`grade` = 'A-';
    ELSEIF (NEW.`total`>=50) THEN
      SET NEW.`grade_point` = 3;
      SET NEW.`grade` = 'B';
    ELSEIF (NEW.`total`>=40) THEN
      SET NEW.`grade_point` = 2;
      SET NEW.`grade` = 'C';
    ELSEIF (NEW.`total`>=33) THEN
      SET NEW.`grade_point` = 1;
      SET NEW.`grade` = 'D';
    ELSE
      SET NEW.`grade` = 'F';
      SET NEW.`grade_point` = 0;
    END IF;
  ELSE
    IF (NEW.`total`>=40) THEN
      SET NEW.`grade` = 'A+';
      SET NEW.`grade_point` = 5;
    ELSEIF (NEW.`total`>=35) THEN
      SET NEW.`grade_point` = 4;
      SET NEW.`grade` = 'A';
    ELSEIF (NEW.`total`>=30) THEN
      SET NEW.`grade_point` = 3.5;
      SET NEW.`grade` = 'A-';
    ELSEIF (NEW.`total`>=25) THEN
      SET NEW.`grade_point` = 3;
      SET NEW.`grade` = 'B';
    ELSEIF (NEW.`total`>=20) THEN
      SET NEW.`grade_point` = 2;
      SET NEW.`grade` = 'C';
    ELSEIF (NEW.`total`>=17) THEN
      SET NEW.`grade_point` = 1;
      SET NEW.`grade` = 'D';
    ELSE
      SET NEW.`grade` = 'F';
      SET NEW.`grade_point` = 0;
    END IF;
  END IF;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `t_result_update` BEFORE UPDATE ON `result` FOR EACH ROW BEGIN
  SET NEW.`total` = COALESCE(NEW.`mcq`,0) + COALESCE(NEW.`written`,0) + COALESCE(NEW.`practical`,0);
  IF NEW.sub_id = (SELECT id FROM `subject` WHERE total_marks=100 AND id=NEW.sub_id) THEN
    IF (NEW.`total`>=80) THEN
      SET NEW.`grade` = 'A+';
      SET NEW.`grade_point` = 5;
    ELSEIF (NEW.`total`>=70) THEN
      SET NEW.`grade_point` = 4;
      SET NEW.`grade` = 'A';
    ELSEIF (NEW.`total`>=60) THEN
      SET NEW.`grade_point` = 3.5;
      SET NEW.`grade` = 'A-';
    ELSEIF (NEW.`total`>=50) THEN
      SET NEW.`grade_point` = 3;
      SET NEW.`grade` = 'B';
    ELSEIF (NEW.`total`>=40) THEN
      SET NEW.`grade_point` = 2;
      SET NEW.`grade` = 'C';
    ELSEIF (NEW.`total`>=33) THEN
      SET NEW.`grade_point` = 1;
      SET NEW.`grade` = 'D';
    ELSE
      SET NEW.`grade` = 'F';
      SET NEW.`grade_point` = 0;
    END IF;
  ELSE
    IF (NEW.`total`>=40) THEN
      SET NEW.`grade` = 'A+';
      SET NEW.`grade_point` = 5;
    ELSEIF (NEW.`total`>=35) THEN
      SET NEW.`grade_point` = 4;
      SET NEW.`grade` = 'A';
    ELSEIF (NEW.`total`>=30) THEN
      SET NEW.`grade_point` = 3.5;
      SET NEW.`grade` = 'A-';
    ELSEIF (NEW.`total`>=25) THEN
      SET NEW.`grade_point` = 3;
      SET NEW.`grade` = 'B';
    ELSEIF (NEW.`total`>=20) THEN
      SET NEW.`grade_point` = 2;
      SET NEW.`grade` = 'C';
    ELSEIF (NEW.`total`>=17) THEN
      SET NEW.`grade_point` = 1;
      SET NEW.`grade` = 'D';
    ELSE
      SET NEW.`grade` = 'F';
      SET NEW.`grade_point` = 0;
    END IF;
  END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `section`
--

CREATE TABLE `section` (
  `id` int(11) NOT NULL,
  `sec_name` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `is_trashed` enum('No','Yes') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'No'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `section`
--

INSERT INTO `section` (`id`, `sec_name`, `is_trashed`) VALUES
  (1, 'A', 'No'),
  (2, 'B', 'No'),
  (3, 'C', 'No');

-- --------------------------------------------------------

--
-- Table structure for table `student_info`
--

CREATE TABLE `student_info` (
  `id` int(100) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `f_name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `f_ocp` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `m_name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `m_ocp` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gender` varchar(8) COLLATE utf8_unicode_ci DEFAULT NULL,
  `religion` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nationality` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Bangladeshi',
  `gur_name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gur_ocp` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gur_mobile` varchar(14) COLLATE utf8_unicode_ci DEFAULT NULL,
  `std_mobile` varchar(14) COLLATE utf8_unicode_ci DEFAULT NULL,
  `std_email` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `pr_vill` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pr_po` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pr_ps` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pr_dist` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pm_vill` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pm_po` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pm_ps` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pm_dist` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `is_trashed` enum('Yes','No') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'No'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `student_info`
--

INSERT INTO `student_info` (`id`, `name`, `f_name`, `f_ocp`, `m_name`, `m_ocp`, `gender`, `religion`, `nationality`, `gur_name`, `gur_ocp`, `gur_mobile`, `std_mobile`, `std_email`, `dob`, `pr_vill`, `pr_po`, `pr_ps`, `pr_dist`, `pm_vill`, `pm_po`, `pm_ps`, `pm_dist`, `photo`, `created_at`, `updated_at`, `is_trashed`) VALUES
  (1, 'Jarif Abdullah', '', '', '', '', 'M', '', 'Bangladeshi', '', '', '01733052083', '', '', '1970-01-01', '', '', '', '', '', '', '', '', NULL, '2017-08-07 00:28:53', NULL, 'No'),
  (2, 'Jonaid Bin Amin', '', '', '', '', 'M', '', 'Bangladeshi', '', '', '01781929186', '', '', '1970-01-01', '', '', '', '', '', '', '', '', NULL, '2017-08-07 00:28:53', NULL, 'No'),
  (3, 'Afifa Jannat Mona', '', '', '', '', 'F', '', 'Bangladeshi', '', '', '01819670749', '', '', '1970-01-01', '', '', '', '', '', '', '', '', NULL, '2017-08-07 00:28:54', NULL, 'No'),
  (4, 'Fahim Mahmud Howlader', '', '', '', '', 'M', '', 'Bangladeshi', '', '', '01713104985', '', '', '1970-01-01', '', '', '', '', '', '', '', '', NULL, '2017-08-07 00:28:54', NULL, 'No'),
  (5, 'Afnan Rabi', '', '', '', '', 'M', '', 'Bangladeshi', '', '', '01815045991', '', '', '1970-01-01', '', '', '', '', '', '', '', '', NULL, '2017-08-07 00:28:54', NULL, 'No'),
  (6, 'Ahmad Zubair Chowdhury', '', '', '', '', 'M', '', 'Bangladeshi', '', '', '01818027189', '', '', '1970-01-01', '', '', '', '', '', '', '', '', NULL, '2017-08-07 00:28:54', NULL, 'No'),
  (7, 'Sidratul Marwa', '', '', '', '', 'F', '', 'Bangladeshi', '', '', '01857648793', '', '', '1970-01-01', '', '', '', '', '', '', '', '', NULL, '2017-08-07 00:28:54', NULL, 'No'),
  (8, 'Safwan Ahmed', '', '', '', '', 'M', '', 'Bangladeshi', '', '', '01713489186', '', '', '1970-01-01', '', '', '', '', '', '', '', '', NULL, '2017-08-07 00:28:55', NULL, 'No'),
  (9, 'Tasin Ahmed', '', '', '', '', 'M', '', 'Bangladeshi', '', '', '01876973115', '', '', '1970-01-01', '', '', '', '', '', '', '', '', NULL, '2017-08-07 00:28:55', NULL, 'No');

-- --------------------------------------------------------

--
-- Table structure for table `student_promotion`
--

CREATE TABLE `student_promotion` (
  `id` bigint(100) UNSIGNED NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `yr` int(11) DEFAULT NULL,
  `amount` int(11) DEFAULT '0',
  `discount_fee` int(11) NOT NULL DEFAULT '0',
  `card_no` int(11) DEFAULT NULL,
  `s_id` int(100) NOT NULL,
  `c_id` int(11) NOT NULL,
  `roll` int(5) DEFAULT NULL,
  `grp_id` int(11) NOT NULL,
  `opt_subject` int(11) DEFAULT NULL,
  `section_id` int(11) DEFAULT NULL,
  `is_trashed` enum('Yes','No') CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT 'No'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `student_promotion`
--

INSERT INTO `student_promotion` (`id`, `created_at`, `updated_at`, `yr`, `amount`, `discount_fee`, `card_no`, `s_id`, `c_id`, `roll`, `grp_id`, `opt_subject`, `section_id`, `is_trashed`) VALUES
  (1, '2017-08-07 00:28:53', NULL, 2017, 0, 0, NULL, 1, 101, 0, 1, NULL, 1, 'No'),
  (2, '2017-08-07 00:28:53', NULL, 2017, 0, 0, NULL, 2, 101, 0, 1, NULL, 1, 'No'),
  (3, '2017-08-07 00:28:54', NULL, 2017, 0, 0, NULL, 3, 101, 0, 1, NULL, 1, 'No'),
  (4, '2017-08-07 00:28:54', NULL, 2017, 0, 0, NULL, 4, 101, 0, 1, NULL, 1, 'No'),
  (5, '2017-08-07 00:28:54', NULL, 2017, 0, 0, NULL, 5, 101, 0, 1, NULL, 1, 'No'),
  (6, '2017-08-07 00:28:54', NULL, 2017, 0, 0, NULL, 6, 101, 0, 1, NULL, 1, 'No'),
  (7, '2017-08-07 00:28:54', NULL, 2017, 0, 0, NULL, 7, 101, 0, 1, NULL, 1, 'No'),
  (8, '2017-08-07 00:28:55', NULL, 2017, 0, 0, NULL, 8, 101, 0, 1, NULL, 1, 'No'),
  (9, '2017-08-07 00:28:55', NULL, 2017, 0, 0, NULL, 9, 101, 0, 1, NULL, 1, 'No');

--
-- Triggers `student_promotion`
--
DELIMITER $$
CREATE TRIGGER `t_std_promotion_statement_delete` AFTER DELETE ON `student_promotion` FOR EACH ROW DELETE FROM bal_statement where promt_id=old.id
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `t_std_promotion_statement_insert` AFTER INSERT ON `student_promotion` FOR EACH ROW INSERT INTO `bal_statement` (`promt_id`, `s_id`, `amount_in`, `created_at`,`item_id`)
VALUES (NEW.`id`,NEW.`s_id`,NEW.`amount`,NEW.`created_at`,

        case when (select COUNT(*) from `student_promotion`where `s_id`=NEW.s_id)>1
          then 2
        else 1
        end
)
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `t_std_promotion_statement_update` AFTER UPDATE ON `student_promotion` FOR EACH ROW UPDATE `bal_statement`
SET `amount_in`= NEW.`amount`, `created_at`= NEW.`created_at`, `updated_at`= NEW.`updated_at`
WHERE `s_id`= NEW.`s_id` AND `promt_id`= NEW.`id`
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `student_salary`
--

CREATE TABLE `student_salary` (
  `id` bigint(100) UNSIGNED NOT NULL,
  `s_id` int(100) NOT NULL,
  `month_id` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `amount` int(11) NOT NULL DEFAULT '0',
  `total` int(11) NOT NULL DEFAULT '0',
  `due` int(11) NOT NULL DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `yr` int(4) DEFAULT '2017',
  `remarks` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Triggers `student_salary`
--
DELIMITER $$
CREATE TRIGGER `t_std_salary_due_insert` BEFORE INSERT ON `student_salary` FOR EACH ROW SET NEW.`due` = NEW.`total` - NEW.`amount`
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `t_std_salary_due_update` BEFORE UPDATE ON `student_salary` FOR EACH ROW SET NEW.`due` = NEW.`total` - NEW.`amount`
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `t_stdsalary_statement_delete` AFTER DELETE ON `student_salary` FOR EACH ROW DELETE FROM `bal_statement` where `sal_id`=OLD.`id` AND `s_id`= OLD.`s_id`
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `t_stdsalary_statement_insert` AFTER INSERT ON `student_salary` FOR EACH ROW INSERT INTO `bal_statement` (`sal_id`, `amount_in`, `created_at`,`item_id`,`s_id`)
VALUES (NEW.`id`,NEW.`amount`,NEW.`created_at`,'3',NEW.`s_id`)
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `t_stdsalary_statement_update` AFTER UPDATE ON `student_salary` FOR EACH ROW UPDATE `bal_statement`
SET `amount_in`= NEW.`amount`,`updated_at`= NEW.`updated_at`
WHERE `sal_id`= NEW.`id` AND `s_id`= NEW.`s_id`
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `id` int(11) NOT NULL,
  `sub_name` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `total_marks` int(11) NOT NULL,
  `pass_marks` int(11) NOT NULL,
  `is_trashed` enum('No','Yes') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'No'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`id`, `sub_name`, `total_marks`, `pass_marks`, `is_trashed`) VALUES
  (101, 'Bornomala', 100, 33, 'No'),
  (102, 'Bornoshekha', 100, 33, 'No'),
  (103, 'Bangla', 100, 33, 'No'),
  (104, 'Bangla 1st Paper', 100, 33, 'No'),
  (105, 'Bangla 2nd Paper', 100, 33, 'No'),
  (106, 'Bangla 2nd Paper-50', 50, 17, 'No'),
  (107, 'English', 100, 33, 'No'),
  (108, 'English 1st Paper', 100, 33, 'No'),
  (109, 'English 2nd Paper', 100, 33, 'No'),
  (110, 'English 2nd Paper-50', 50, 17, 'No'),
  (111, 'ABC', 100, 33, 'No'),
  (112, 'Mathematics', 100, 33, 'No'),
  (113, 'Ongko Shekha', 100, 33, 'No'),
  (114, 'Dharapat & Ongko Shekha', 100, 33, 'No'),
  (115, 'General Khowledge', 50, 17, 'No'),
  (116, 'Religion & Moral Edu. (Islam)', 100, 33, 'No'),
  (117, 'Religion & Moral Edu. (Hindu)', 100, 33, 'No'),
  (118, 'Religion & Moral Edu. (Bhuddo)', 100, 33, 'No'),
  (119, 'Religion & Moral Edu. (Christian)', 100, 33, 'No'),
  (120, 'Religion & Moral Edu. (Islam)-50', 50, 17, 'No'),
  (121, 'Religion & Moral Edu. (Hindu)-50', 50, 17, 'No'),
  (122, 'Religion & Moral Edu. (Bhuddo)-50', 50, 17, 'No'),
  (123, 'Religion & Moral Edu. (Christian)-50', 50, 17, 'No'),
  (124, 'Science', 100, 33, 'No'),
  (125, 'Bangladesh & Global Studies', 100, 33, 'No'),
  (126, 'Physics', 100, 33, 'No'),
  (127, 'Chemistry', 100, 33, 'No'),
  (128, 'Biology', 100, 33, 'No'),
  (129, 'Accounting', 100, 33, 'No'),
  (130, 'Finance & Banking', 100, 33, 'No'),
  (131, 'Business Entrepreneurship', 100, 33, 'No'),
  (132, 'Physical Edu. & Health', 100, 33, 'No'),
  (133, 'Physical Edu. & Health - 50', 50, 17, 'No'),
  (135, 'Work & Life-Oriented Edu.', 50, 17, 'No'),
  (137, 'Career Education', 50, 17, 'No'),
  (139, 'Information And Cummunication Teachnolog', 50, 17, 'No'),
  (141, 'Computer', 50, 17, 'No'),
  (143, 'Drawing', 50, 17, 'No'),
  (145, 'Arts & Crafts', 50, 17, 'No'),
  (150, 'Higher Math', 100, 33, 'No'),
  (151, 'Agriculture', 100, 33, 'No'),
  (152, 'Home Science', 100, 33, 'No'),
  (501, 'Agriculture Studies (Optional)', 100, 33, 'No'),
  (502, 'Higher Math (Optional)', 100, 33, 'No'),
  (503, 'Home Science (Optional)', 100, 33, 'No');

-- --------------------------------------------------------

--
-- Table structure for table `teacher_info`
--

CREATE TABLE `teacher_info` (
  `id` int(11) NOT NULL,
  `t_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `designation` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `qualification` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `f_name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `m_name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gender` char(1) COLLATE utf8_unicode_ci DEFAULT NULL,
  `religion` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nationality` varchar(20) COLLATE utf8_unicode_ci DEFAULT 'Bangladeshi',
  `nid` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mobile` varchar(14) COLLATE utf8_unicode_ci DEFAULT NULL,
  `e_mail` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `join_date` date DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `pr_vill` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pr_po` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pr_ps` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pr_dist` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pm_vill` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pm_po` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pm_ps` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pm_dist` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `passport_no` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bank_id` int(11) DEFAULT NULL,
  `bank_branch_id` int(11) DEFAULT NULL,
  `bank_ac` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `amount` int(11) NOT NULL DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `is_trashed` enum('Yes','No') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'No',
  `card_no` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `teacher_salary`
--

CREATE TABLE `teacher_salary` (
  `id` bigint(100) UNSIGNED NOT NULL,
  `t_id` int(100) NOT NULL,
  `month_id` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `amount` int(11) NOT NULL DEFAULT '0',
  `total` int(11) NOT NULL DEFAULT '0',
  `due` int(11) NOT NULL DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `yr` int(4) DEFAULT '2017',
  `remarks` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Triggers `teacher_salary`
--
DELIMITER $$
CREATE TRIGGER `t_tsalary_due_insert` BEFORE INSERT ON `teacher_salary` FOR EACH ROW SET NEW.`due` = NEW.`total` - NEW.`amount`
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `t_tsalary_due_update` BEFORE UPDATE ON `teacher_salary` FOR EACH ROW SET NEW.`due` = NEW.`total` - NEW.`amount`
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `t_tsalary_statement_delete` AFTER DELETE ON `teacher_salary` FOR EACH ROW DELETE FROM `bal_statement` where `sal_id`=OLD.`id` AND `t_id`= OLD.`t_id`
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `t_tsalary_statement_insert` AFTER INSERT ON `teacher_salary` FOR EACH ROW INSERT INTO `bal_statement` (`sal_id`, `amount_exp`, `created_at`,`item_id`,`t_id`)
VALUES (NEW.`id`,NEW.`amount`,NEW.`created_at`,'4',NEW.`t_id`)
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `t_tsalary_statement_update` AFTER UPDATE ON `teacher_salary` FOR EACH ROW UPDATE `bal_statement`
SET `amount_exp`= NEW.`amount`,`created_at`= NEW.`created_at`,`updated_at`= NEW.`updated_at`
WHERE `sal_id`= NEW.`id` AND `t_id`= NEW.`t_id`
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `term`
--

CREATE TABLE `term` (
  `id` int(11) NOT NULL,
  `term_name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `is_trashed` enum('No','Yes') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'No'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `term`
--

INSERT INTO `term` (`id`, `term_name`, `is_trashed`) VALUES
  (1, '1st Class Test', 'No'),
  (2, '2nd Class Test', 'No'),
  (3, 'Half Yearly Exam', 'No'),
  (4, '3rd Class Test', 'No'),
  (5, '4th Class Test', 'No'),
  (6, 'Annual Exam', 'No');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(111) NOT NULL,
  `last_name` varchar(111) NOT NULL,
  `email` varchar(111) NOT NULL,
  `password` varchar(111) NOT NULL,
  `phone` varchar(111) NOT NULL,
  `address` varchar(333) NOT NULL,
  `level` int(3) NOT NULL,
  `email_verified` enum('Yes','No') DEFAULT 'Yes'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`, `phone`, `address`, `level`, `email_verified`) VALUES
  (1, 'Developer', '', 'developer', '81dc9bdb52d04dc20036dbd8313ed055', '0123456', 'ctg', 1, 'Yes'),
  (2, 'Superadmin', '', 'superadmin', '81dc9bdb52d04dc20036dbd8313ed055', '', '', 2, 'Yes'),
  (3, 'Accountant', '', 'accountant', '81dc9bdb52d04dc20036dbd8313ed055', '', '', 3, 'Yes'),
  (4, 'Teacher', '', 'teacher', '81dc9bdb52d04dc20036dbd8313ed055', '', '', 4, 'Yes'),
  (5, 'Parents', '', 'parents', '81dc9bdb52d04dc20036dbd8313ed055', '', '', 5, 'Yes'),
  (6, 'Student', '', 'student', '81dc9bdb52d04dc20036dbd8313ed055', '', '', 6, 'Yes'),
  (7, '', '', 'thedux', '81dc9bdb52d04dc20036dbd8313ed055', '', '', 2, 'Yes');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bal_statement`
--
ALTER TABLE `bal_statement`
ADD PRIMARY KEY (`id`),
ADD KEY `item_id` (`item_id`);

--
-- Indexes for table `bank_branch`
--
ALTER TABLE `bank_branch`
ADD PRIMARY KEY (`id`),
ADD KEY `fk_bank_branch_bank_info` (`bank_id`);

--
-- Indexes for table `bank_info`
--
ALTER TABLE `bank_info`
ADD PRIMARY KEY (`id`);

--
-- Indexes for table `class`
--
ALTER TABLE `class`
ADD PRIMARY KEY (`c_id`),
ADD UNIQUE KEY `c_id` (`id`);

--
-- Indexes for table `class_payment`
--
ALTER TABLE `class_payment`
ADD PRIMARY KEY (`id`),
ADD KEY `fk_classpay_class` (`c_id`),
ADD KEY `fk_grp_class` (`grp_id`);

--
-- Indexes for table `expense`
--
ALTER TABLE `expense`
ADD PRIMARY KEY (`id`),
ADD KEY `item_id` (`item_id`);

--
-- Indexes for table `gpa`
--
ALTER TABLE `gpa`
ADD PRIMARY KEY (`s_id`,`yr`,`term_id`,`c_id`) USING BTREE;

--
-- Indexes for table `grp`
--
ALTER TABLE `grp`
ADD PRIMARY KEY (`id`);

--
-- Indexes for table `income`
--
ALTER TABLE `income`
ADD PRIMARY KEY (`id`),
ADD KEY `item_id` (`item_id`);

--
-- Indexes for table `institution`
--
ALTER TABLE `institution`
ADD PRIMARY KEY (`id`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
ADD PRIMARY KEY (`id`);

--
-- Indexes for table `message_count`
--
ALTER TABLE `message_count`
ADD PRIMARY KEY (`sl_no`);

--
-- Indexes for table `month`
--
ALTER TABLE `month`
ADD PRIMARY KEY (`id`);

--
-- Indexes for table `result`
--
ALTER TABLE `result`
ADD PRIMARY KEY (`s_id`,`yr`,`sub_id`,`term_id`) USING BTREE,
ADD KEY `term` (`term_id`),
ADD KEY `term_id` (`term_id`),
ADD KEY `c_id` (`c_id`),
ADD KEY `sub_id` (`sub_id`),
ADD KEY `s_id` (`s_id`),
ADD KEY `term_id_2` (`term_id`),
ADD KEY `sub_id_2` (`sub_id`),
ADD KEY `abd` (`id`);

--
-- Indexes for table `section`
--
ALTER TABLE `section`
ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_info`
--
ALTER TABLE `student_info`
ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_promotion`
--
ALTER TABLE `student_promotion`
ADD PRIMARY KEY (`id`),
ADD KEY `s_id` (`s_id`,`c_id`,`grp_id`),
ADD KEY `s_id_2` (`s_id`,`c_id`,`grp_id`),
ADD KEY `grp_id` (`grp_id`),
ADD KEY `section_id` (`section_id`),
ADD KEY `c_id` (`c_id`);

--
-- Indexes for table `student_salary`
--
ALTER TABLE `student_salary`
ADD PRIMARY KEY (`id`),
ADD KEY `fk_student_salary_student_info` (`s_id`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teacher_info`
--
ALTER TABLE `teacher_info`
ADD PRIMARY KEY (`id`),
ADD KEY `fk_teacher_info_bank_info` (`bank_id`),
ADD KEY `fk_teacher_info_bank_branch` (`bank_branch_id`);

--
-- Indexes for table `teacher_salary`
--
ALTER TABLE `teacher_salary`
ADD PRIMARY KEY (`id`),
ADD KEY `fk_teacher_salary_teacher_info` (`t_id`);

--
-- Indexes for table `term`
--
ALTER TABLE `term`
ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bal_statement`
--
ALTER TABLE `bal_statement`
MODIFY `id` bigint(100) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=179;
--
-- AUTO_INCREMENT for table `bank_branch`
--
ALTER TABLE `bank_branch`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `bank_info`
--
ALTER TABLE `bank_info`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `class_payment`
--
ALTER TABLE `class_payment`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Class Payment ID', AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `expense`
--
ALTER TABLE `expense`
MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `grp`
--
ALTER TABLE `grp`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `income`
--
ALTER TABLE `income`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `institution`
--
ALTER TABLE `institution`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `message_count`
--
ALTER TABLE `message_count`
MODIFY `sl_no` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `month`
--
ALTER TABLE `month`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `result`
--
ALTER TABLE `result`
MODIFY `id` bigint(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `section`
--
ALTER TABLE `section`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `student_info`
--
ALTER TABLE `student_info`
MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `student_promotion`
--
ALTER TABLE `student_promotion`
MODIFY `id` bigint(100) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `student_salary`
--
ALTER TABLE `student_salary`
MODIFY `id` bigint(100) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=504;
--
-- AUTO_INCREMENT for table `teacher_info`
--
ALTER TABLE `teacher_info`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `teacher_salary`
--
ALTER TABLE `teacher_salary`
MODIFY `id` bigint(100) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `term`
--
ALTER TABLE `term`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `bal_statement`
--
ALTER TABLE `bal_statement`
ADD CONSTRAINT `bal_statement_ibfk_1` FOREIGN KEY (`item_id`) REFERENCES `item` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `bank_branch`
--
ALTER TABLE `bank_branch`
ADD CONSTRAINT `fk_bank_branch_bank_info` FOREIGN KEY (`bank_id`) REFERENCES `bank_info` (`id`);

--
-- Constraints for table `class_payment`
--
ALTER TABLE `class_payment`
ADD CONSTRAINT `fk_classpay_class` FOREIGN KEY (`c_id`) REFERENCES `class` (`c_id`),
ADD CONSTRAINT `fk_grp_class` FOREIGN KEY (`grp_id`) REFERENCES `grp` (`id`);

--
-- Constraints for table `expense`
--
ALTER TABLE `expense`
ADD CONSTRAINT `expense_ibfk_1` FOREIGN KEY (`item_id`) REFERENCES `item` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `income`
--
ALTER TABLE `income`
ADD CONSTRAINT `income_ibfk_1` FOREIGN KEY (`item_id`) REFERENCES `item` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `result`
--
ALTER TABLE `result`
ADD CONSTRAINT `result_ibfk_1` FOREIGN KEY (`c_id`) REFERENCES `class` (`c_id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `result_ibfk_2` FOREIGN KEY (`s_id`) REFERENCES `student_info` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `result_ibfk_3` FOREIGN KEY (`term_id`) REFERENCES `term` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `result_ibfk_4` FOREIGN KEY (`sub_id`) REFERENCES `subject` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student_promotion`
--
ALTER TABLE `student_promotion`
ADD CONSTRAINT `student_promotion_ibfk_1` FOREIGN KEY (`s_id`) REFERENCES `student_info` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `student_promotion_ibfk_3` FOREIGN KEY (`grp_id`) REFERENCES `grp` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `student_promotion_ibfk_4` FOREIGN KEY (`section_id`) REFERENCES `section` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `student_promotion_ibfk_5` FOREIGN KEY (`c_id`) REFERENCES `class` (`c_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student_salary`
--
ALTER TABLE `student_salary`
ADD CONSTRAINT `fk_student_salary_student_info` FOREIGN KEY (`s_id`) REFERENCES `student_info` (`id`);

--
-- Constraints for table `teacher_info`
--
ALTER TABLE `teacher_info`
ADD CONSTRAINT `fk_teacher_info_bank_branch` FOREIGN KEY (`bank_branch_id`) REFERENCES `bank_branch` (`id`),
ADD CONSTRAINT `fk_teacher_info_bank_info` FOREIGN KEY (`bank_id`) REFERENCES `bank_info` (`id`);

--
-- Constraints for table `teacher_salary`
--
ALTER TABLE `teacher_salary`
ADD CONSTRAINT `fk_teacher_salary_teacher_info` FOREIGN KEY (`t_id`) REFERENCES `teacher_info` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
