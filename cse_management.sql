-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 11, 2025 at 05:32 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cse_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `cases`
--

CREATE TABLE `cases` (
  `CaseID` int(11) NOT NULL,
  `CaseState` enum('Open','Closed') DEFAULT 'Open',
  `DateFiled` timestamp NOT NULL DEFAULT current_timestamp(),
  `AssignedJudgeID` int(11) DEFAULT NULL,
  `UserID` int(11) DEFAULT NULL,
  `Case_Status` enum('Financial','Personal','Intellectual Property','Civil','Commercial','Family','Criminal','Electronic') DEFAULT NULL,
  `Name` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `Description` text DEFAULT NULL,
  `verdict` text DEFAULT NULL,
  `Modi_Req` varchar(255) DEFAULT NULL,
  `withdraw_ability` enum('1','2','3') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cases`
--

INSERT INTO `cases` (`CaseID`, `CaseState`, `DateFiled`, `AssignedJudgeID`, `UserID`, `Case_Status`, `Name`, `created_at`, `Description`, `verdict`, `Modi_Req`, `withdraw_ability`) VALUES
(1, 'Open', '2025-02-01 19:11:53', 2, 1, 'Financial', 'Ar-Rasheed Labs tools stealing', '2025-02-03 18:38:20', 'Jane Doe, a former employee of XYZ Corporation, has filed a workplace discrimination lawsuit against her employer. She alleges that she was subjected to gender-based discrimination, unequal pay, and retaliation after raising concerns about unfair treatment.', NULL, NULL, '1'),
(2, 'Closed', '2025-02-01 19:11:53', 2, 2, 'Personal', 'Forgery Mohammed\'s ID', '2025-02-03 18:38:20', 'Jane Doe, a former employee of XYZ Corporation, has filed a workplace discrimination lawsuit against her employer. She alleges that she was subjected to gender-based discrimination, unequal pay, and retaliation after raising concerns about unfair treatment.', NULL, NULL, '1'),
(3, 'Open', '2025-02-01 19:11:53', 2, 3, 'Intellectual Property', 'Awlad Haratna', '2025-02-03 18:38:20', 'Jane Doe, a former employee of XYZ Corporation, has filed a workplace discrimination lawsuit against her employer. She alleges that she was subjected to gender-based discrimination, unequal pay, and retaliation after raising concerns about unfair treatment.', NULL, NULL, '1'),
(4, 'Open', '2025-02-01 19:11:53', 2, 4, 'Civil', 'De Baggash seizes Mohammed\'s Land', '2025-02-03 18:38:20', 'Jane Doe, a former employee of XYZ Corporation, has filed a workplace discrimination lawsuit against her employer. She alleges that she was subjected to gender-based discrimination, unequal pay, and retaliation after raising concerns about unfair treatment.', NULL, NULL, '1'),
(5, 'Closed', '2025-02-01 19:11:53', 2, 5, 'Commercial', 'Disagreement between Ar-Rashhed Partners', '2025-02-03 18:38:20', 'Jane Doe, a former employee of XYZ Corporation, has filed a workplace discrimination lawsuit against her employer. She alleges that she was subjected to gender-based discrimination, unequal pay, and retaliation after raising concerns about unfair treatment.', NULL, NULL, '1'),
(6, 'Open', '2025-02-01 19:11:53', 2, 6, 'Family', 'De Mughalles Inheritance', '2025-02-03 18:38:20', 'Jane Doe, a former employee of XYZ Corporation, has filed a workplace discrimination lawsuit against her employer. She alleges that she was subjected to gender-based discrimination, unequal pay, and retaliation after raising concerns about unfair treatment.', NULL, NULL, '1'),
(7, 'Closed', '2025-02-01 19:11:53', 2, 7, 'Criminal', 'murder Eyad Aqlan', '2025-02-03 18:38:20', 'Jane Doe, a former employee of XYZ Corporation, has filed a workplace discrimination lawsuit against her employer. She alleges that she was subjected to gender-based discrimination, unequal pay, and retaliation after raising concerns about unfair treatment.', NULL, NULL, '1'),
(8, 'Open', '2025-02-01 19:11:53', 2, 8, 'Electronic', 'Hacking Ar-Rasheed Network', '2025-02-03 18:38:20', 'Jane Doe, a former employee of XYZ Corporation, has filed a workplace discrimination lawsuit against her employer. She alleges that she was subjected to gender-based discrimination, unequal pay, and retaliation after raising concerns about unfair treatment.', NULL, NULL, '1'),
(9, 'Closed', '2025-02-01 19:11:53', 2, 9, 'Financial', NULL, '2025-02-03 18:38:20', 'Jane Doe, a former employee of XYZ Corporation, has filed a workplace discrimination lawsuit against her employer. She alleges that she was subjected to gender-based discrimination, unequal pay, and retaliation after raising concerns about unfair treatment.', NULL, NULL, '1'),
(10, 'Open', '2025-02-01 19:11:53', 2, 10, 'Personal', NULL, '2025-02-03 18:38:20', 'Jane Doe, a former employee of XYZ Corporation, has filed a workplace discrimination lawsuit against her employer. She alleges that she was subjected to gender-based discrimination, unequal pay, and retaliation after raising concerns about unfair treatment.', NULL, NULL, '1'),
(11, 'Open', '2025-02-01 19:16:07', 2, 11, 'Commercial', NULL, '2025-02-03 18:38:20', 'Jane Doe, a former employee of XYZ Corporation, has filed a workplace discrimination lawsuit against her employer. She alleges that she was subjected to gender-based discrimination, unequal pay, and retaliation after raising concerns about unfair treatment.', NULL, NULL, '2'),
(12, 'Open', '2025-02-01 19:16:19', 2, 11, 'Family', NULL, '2025-02-03 18:38:20', 'Jane Doe, a former employee of XYZ Corporation, has filed a workplace discrimination lawsuit against her employer. She alleges that she was subjected to gender-based discrimination, unequal pay, and retaliation after raising concerns about unfair treatment.', NULL, NULL, '2'),
(13, 'Open', '2025-02-01 21:19:52', 2, 20, 'Civil', 'The Aqlan seizes Mohammed\'s Land ', '2025-02-03 18:38:20', 'Jane Doe, a former employee of XYZ Corporation, has filed a workplace discrimination lawsuit against her employer. She alleges that she was subjected to gender-based discrimination, unequal pay, and retaliation after raising concerns about unfair treatment.', 'The court has decided that magged is guilty', 'yo have to choose appropriate status for you case', '3'),
(14, 'Open', '2025-02-01 21:20:06', 2, 20, 'Family', 'Humam\'s Inheritance', '2025-02-03 18:38:20', 'Jane Doe, a former employee of XYZ Corporation, has filed a workplace discrimination lawsuit against her employer. She alleges that she was subjected to gender-based discrimination, unequal pay, and retaliation after raising concerns about unfair treatment.', NULL, NULL, '2'),
(15, 'Open', '2025-02-03 22:11:58', NULL, 20, 'Personal', 'ddddddd', '2025-02-03 22:11:58', 'ddddd', NULL, NULL, '2'),
(16, 'Open', '2025-02-03 22:18:00', NULL, 20, 'Civil', 'Humam to maged', '2025-02-03 22:18:00', 'Humam', NULL, NULL, '2'),
(17, 'Open', '2025-02-03 22:19:39', NULL, 20, 'Civil', 'ss', '2025-02-03 22:19:39', 'ssss', NULL, NULL, '2'),
(18, 'Open', '2025-02-03 22:23:46', NULL, 20, 'Civil', 'sdsdsd', '2025-02-03 22:23:46', 'dfdfd', NULL, NULL, '2'),
(19, 'Open', '2025-02-03 22:31:57', NULL, 20, 'Personal', 'sdf;llf;skdl;fk', '2025-02-03 22:31:57', 'dsfsdfsd', NULL, NULL, '2'),
(20, 'Open', '2025-02-03 22:33:40', NULL, 20, 'Civil', 'sdsdad', '2025-02-03 22:33:40', 'asdasdasdasdada', NULL, NULL, '2');

-- --------------------------------------------------------

--
-- Table structure for table `document`
--

CREATE TABLE `document` (
  `DocumentID` int(11) NOT NULL,
  `DocumentType` varchar(100) DEFAULT NULL,
  `UploadDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `CaseID` int(11) DEFAULT NULL,
  `DocumentName` varchar(255) DEFAULT NULL,
  `DocumentSize` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `document`
--

INSERT INTO `document` (`DocumentID`, `DocumentType`, `UploadDate`, `CaseID`, `DocumentName`, `DocumentSize`) VALUES
(14, 'application/octet-stream', '2025-02-03 21:03:31', NULL, 'upload.php', 1999),
(15, 'image/gif', '2025-02-03 22:44:32', NULL, 'car.gif', 3787515),
(16, 'image/jpeg', '2025-02-03 22:46:48', 13, 'photo_2024-08-23_11-19-52.jpg', 33175),
(17, 'image/jpeg', '2025-02-03 22:51:50', 13, 'photo_2024-08-23_11-19-52.jpg', 33175),
(18, 'image/gif', '2025-02-03 22:57:39', 5, 'car.gif', 3787515),
(19, 'image/gif', '2025-02-03 22:59:27', 1, 'car1.gif', 127223),
(20, 'image/gif', '2025-02-03 22:59:55', 1, 'car2.gif', 120566),
(21, 'image/gif', '2025-02-03 23:02:16', 6, 'car.gif', 3787515),
(24, 'image/gif', '2025-02-03 23:05:02', 5, 'car.gif', 3787515),
(25, 'image/gif', '2025-02-03 23:06:28', 1, 'car.gif', 3787515);

-- --------------------------------------------------------

--
-- Table structure for table `dynamic_permissions`
--

CREATE TABLE `dynamic_permissions` (
  `UserID` int(11) NOT NULL,
  `PermissionID` int(11) NOT NULL,
  `ResourceID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hearing`
--

CREATE TABLE `hearing` (
  `HearingID` int(11) NOT NULL,
  `State` enum('Delaied','Ongoing') DEFAULT NULL,
  `Location` varchar(255) DEFAULT NULL,
  `Date` date DEFAULT NULL,
  `Notes` text DEFAULT NULL,
  `CaseID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hearing`
--

INSERT INTO `hearing` (`HearingID`, `State`, `Location`, `Date`, `Notes`, `CaseID`) VALUES
(1, 'Ongoing', 'Courtroom A', '2025-03-01', 'Initial hearing', 1),
(2, 'Delaied', 'Courtroom B', '2025-03-02', 'Final hearing', 2),
(3, 'Ongoing', 'Courtroom C', '2025-03-03', 'Evidence presentation', 3),
(4, 'Delaied', 'Courtroom D', '2025-03-04', 'Witness testimonies', 4),
(5, 'Ongoing', 'Courtroom E', '2025-03-05', 'Closing arguments', 5),
(6, 'Delaied', 'Courtroom F', '2025-03-06', 'Judgment delivered', 6),
(7, 'Ongoing', 'Courtroom G', '2025-03-07', 'Pre-trial conference', 7),
(8, 'Delaied', 'Courtroom H', '2025-03-08', 'Settlement discussion', 8),
(9, 'Ongoing', 'Courtroom I', '2025-03-09', 'Mediation session', 9),
(10, 'Delaied', 'Courtroom J', '2025-03-10', 'Final verdict', 10);

-- --------------------------------------------------------

--
-- Table structure for table `judgement_detail`
--

CREATE TABLE `judgement_detail` (
  `Detail_ID` int(11) NOT NULL,
  `JudgmentID` int(11) DEFAULT NULL,
  `Summary` text DEFAULT NULL,
  `Reasoning` text DEFAULT NULL,
  `LegalReferences` text DEFAULT NULL,
  `Outcome` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `judgement_detail`
--

INSERT INTO `judgement_detail` (`Detail_ID`, `JudgmentID`, `Summary`, `Reasoning`, `LegalReferences`, `Outcome`) VALUES
(1, 1, 'Plaintiff wins', 'Based on evidence presented', 'Ref: 123/456', 'Awarded $10,000'),
(2, 2, 'Defendant wins', 'Insufficient evidence', 'Ref: 789/012', 'No damages awarded'),
(3, 3, 'Case dismissed', 'Lack of merit', 'Ref: 345/678', 'Dismissed without prejudice'),
(4, 4, 'Settlement', 'Mutual agreement', 'Ref: 901/234', 'Settled out of court'),
(5, 5, 'Plaintiff wins', 'Clear evidence of wrongdoing', 'Ref: 567/890', 'Awarded $15,000'),
(6, 6, 'Defendant wins', 'Strong defense', 'Ref: 135/792', 'No damages awarded'),
(7, 7, 'Case retried', 'New evidence found', 'Ref: 468/024', 'Retrial ordered'),
(8, 8, 'No jurisdiction', 'Court lacks authority', 'Ref: 246/801', 'Case dismissed'),
(9, 9, 'Plaintiff wins', 'Clear liability established', 'Ref: 369/258', 'Awarded $20,000'),
(10, 10, 'Defendant wins', 'Clear evidence of compliance', 'Ref: 147/963', 'No damages awarded');

-- --------------------------------------------------------

--
-- Table structure for table `judgment`
--

CREATE TABLE `judgment` (
  `JudgmentID` int(11) NOT NULL,
  `CaseID` int(11) DEFAULT NULL,
  `Date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `judgment`
--

INSERT INTO `judgment` (`JudgmentID`, `CaseID`, `Date`) VALUES
(1, 1, '2025-02-01 19:11:53'),
(2, 2, '2025-02-01 19:11:53'),
(3, 3, '2025-02-01 19:11:53'),
(4, 4, '2025-02-01 19:11:53'),
(5, 5, '2025-02-01 19:11:53'),
(6, 6, '2025-02-01 19:11:53'),
(7, 7, '2025-02-01 19:11:53'),
(8, 8, '2025-02-01 19:11:53'),
(9, 9, '2025-02-01 19:11:53'),
(10, 10, '2025-02-01 19:11:53');

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `LogID` int(11) NOT NULL,
  `UserID` int(11) DEFAULT NULL,
  `Actions` varchar(255) DEFAULT NULL,
  `ResourceType` int(11) DEFAULT NULL,
  `ResourceID` int(11) DEFAULT NULL,
  `Result` enum('Success','Failure') DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `IP_Address` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `PerID` int(11) NOT NULL,
  `Name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`PerID`, `Name`) VALUES
(1, 'Open New Case'),
(2, 'View Case Details'),
(3, 'Withdraw Case'),
(4, 'Submit Case File'),
(5, 'Review Case'),
(6, 'Make Modification Request'),
(7, 'Schedule Hearing Dates'),
(8, 'Choose Judge'),
(9, 'Update Case State'),
(10, 'Unleash verdicts'),
(11, 'Review verdicts'),
(12, 'Upload Case Reports');

-- --------------------------------------------------------

--
-- Table structure for table `resources`
--

CREATE TABLE `resources` (
  `ResourceID` int(11) NOT NULL,
  `ResourceName` varchar(50) DEFAULT NULL,
  `EntityID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `resources`
--

INSERT INTO `resources` (`ResourceID`, `ResourceName`, `EntityID`) VALUES
(62, 'Judgement', 1),
(63, 'Judgement', 2),
(64, 'Judgement', 3),
(65, 'Judgement', 4),
(66, 'Judgement', 5),
(67, 'Judgement', 6),
(68, 'Judgement', 7),
(69, 'Judgement', 8),
(70, 'Judgement', 9),
(71, 'Judgement', 10),
(79, 'Cases', 1),
(80, 'Cases', 2),
(81, 'Cases', 3),
(82, 'Cases', 4),
(83, 'Cases', 5),
(84, 'Cases', 6),
(85, 'Cases', 7),
(86, 'Cases', 8),
(87, 'Cases', 9),
(88, 'Cases', 10),
(89, 'Cases', 11),
(90, 'Cases', 12),
(91, 'Cases', 13),
(92, 'Cases', 14),
(93, 'Cases', 15),
(94, 'Cases', 16),
(95, 'Cases', 17),
(96, 'Cases', 18),
(97, 'Cases', 19),
(98, 'Cases', 20),
(110, 'Document', 14),
(111, 'Document', 15),
(112, 'Document', 19),
(113, 'Document', 20),
(114, 'Document', 25),
(115, 'Document', 18),
(116, 'Document', 24),
(117, 'Document', 21),
(118, 'Document', 16),
(119, 'Document', 17);

-- --------------------------------------------------------

--
-- Table structure for table `rolepermissions`
--

CREATE TABLE `rolepermissions` (
  `RoleID` int(11) NOT NULL,
  `PerID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rolepermissions`
--

INSERT INTO `rolepermissions` (`RoleID`, `PerID`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(2, 5),
(2, 6),
(2, 7),
(2, 8),
(3, 10),
(3, 11),
(4, 8),
(4, 9),
(5, 12);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `RoleID` int(11) NOT NULL,
  `Name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`RoleID`, `Name`) VALUES
(1, 'User'),
(2, 'Clerk'),
(3, 'Judge'),
(4, 'HOC'),
(5, 'Secretary'),
(6, 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `UserID` int(11) NOT NULL,
  `Name` varchar(255) DEFAULT NULL,
  `Role` int(11) DEFAULT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `Phone` int(9) DEFAULT NULL,
  `userpassword` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `Address` text DEFAULT NULL,
  `LastLogin` datetime DEFAULT NULL
) ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UserID`, `Name`, `Role`, `Email`, `Phone`, `userpassword`, `created_at`, `Address`, `LastLogin`) VALUES
(1, 'Alice Smith', 1, 'alice@example.com', 123456789, 'password123', '2025-02-01 19:11:53', 'Hadaa Street', NULL),
(2, 'Bob Johnson', 3, 'bob@example.com', 987654321, 'password123', '2025-02-01 19:11:53', 'Hadaa Street', NULL),
(3, 'Carol Williams', 1, 'carol@example.com', 456789123, 'password123', '2025-02-01 19:11:53', 'Hadaa Street', NULL),
(4, 'David Brown', 1, 'david@example.com', 321654987, 'password123', '2025-02-01 19:11:53', 'Hadaa Street', NULL),
(5, 'Eva Davis', 1, 'eva@example.com', 789123456, 'password123', '2025-02-01 19:11:53', 'Hadaa Street', NULL),
(6, 'Frank Miller', 1, 'frank@example.com', 654321789, 'password123', '2025-02-01 19:11:53', 'Hadaa Street', NULL),
(7, 'Grace Wilson', 1, 'grace@example.com', 321987654, 'password123', '2025-02-01 19:11:53', 'Hadaa Street', NULL),
(8, 'Hank Moore', 1, 'hank@example.com', 159753486, 'password123', '2025-02-01 19:11:53', 'Hadaa Street', NULL),
(9, 'Ivy Taylor', 1, 'ivy@example.com', 753159852, 'password123', '2025-02-01 19:11:53', 'Hadaa Street', NULL),
(10, 'Jack Anderson', 1, 'jack@example.com', 852963741, 'password123', '2025-02-01 19:11:53', 'Hadaa Street', NULL),
(11, 'Maged', 1, 'maged@gmail.com', 772477542, '$2y$10$tlA996vbBw.efNFwR26dwuz74LRVM0B/gXjwZ3Wqefb.mU0pj4l7O', '2025-02-01 19:13:18', 'Hadaa Street', NULL),
(12, 'Mohammed Fahd', 1, 'mofahd@gmail.com', 771236360, '12345678', '2025-02-01 19:14:25', 'Hadaa Street', NULL),
(18, 'Mohammed Fahd', 1, 'mohammedfahd@gmail.com', 771236360, '$2y$10$bcUrnBnF6/qUct7lM1HZ/u6w0EJqvAcOUC/T.wwtLAlD2nAaJA8IC', '2025-02-01 21:09:03', 'Bayt Baws', NULL),
(19, 'eyad aqlan', 1, 'eyad@gmail.com', 770606161, '$2y$10$7epCqFSi8eqFSgQP4bxfL.hVyG0gWuOdtKXm1g1lnAemUF9qlWlpK', '2025-02-01 21:10:10', 'hadda street', NULL),
(20, 'Humam', 1, 'humam@gmail.com', 772967753, '$2y$10$p4F5/e8FfFqN6dkzEocZduxZttBfaaslSdAfAEtng6yd4.3TY8V5O', '2025-02-01 21:17:01', 'hadda street', NULL),
(21, 'Ahmed Al-Sanee', 1, 'ahmed@gmail.com', 770424344, '$2y$10$4mWKLg0hGdKeB8Lzc9kp8uB1UIyBx0XzhJw6hih0YmVLAbQYpe7qS', '2025-02-04 00:04:30', 'next to the police department', '2025-02-04 19:08:01'),
(22, 'ramzy alqobati', 2, 'ramzy@gmail.com', 776572487, '$2y$10$u.DhoEKSBD7JDcv8/PJphOjgzg3hcuOjAv/drkJ9CqhsQRQlUv3L6', '2025-02-04 00:06:51', 'saawan', NULL),
(24, 'ali adnan', 2, 'ali@gmail.com', 771409093, '$2y$10$Xn.a/ke5zR2fWgOMz7b3/uw/eC1IjZoWd6Bl.gSjQxMU6jsgOg1Wm', '2025-02-04 14:53:09', 'hadda street', NULL),
(25, 'Anas Hamood', 6, 'anas@gmail.com', 773131719, '$2y$10$sZJueSwrWpoRvd8qWuJbDegEe8rReoU8IQnGPeXBqEHM9y.wtmite', '2025-02-04 14:53:54', 'hadda street', '2025-02-04 21:44:23'),
(31, 'ssss', 3, 'anass@gmail.com', 2147483647, '$2y$10$ZkZGzPmLWUviQ0CBe4ox..Pcjvmr3HfxWktLx7B4iG4SjIE2rDPGq', '2025-02-04 16:36:35', 'ssss', NULL),
(33, 'sss', 6, 'anasss@gmail.com', 3333, '$2y$10$uF8eSWrqez0DpckSUvJP1.WQWyMtrEIJUTVpkYH3qteG//Jx1A0qW', '2025-02-04 17:28:56', 'sss', '2025-02-04 21:27:36'),
(34, 'aaa', 3, 'anaaaasss@gmail.com', 323232323, '$2y$10$WfBnEoqfN48OaKzR5MtMHOw0xGR6UPzHiDoo9SkSS9tfUwvB4m/5C', '2025-02-04 17:31:50', 'aaa', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cases`
--
ALTER TABLE `cases`
  ADD PRIMARY KEY (`CaseID`),
  ADD KEY `UserID` (`UserID`);

--
-- Indexes for table `document`
--
ALTER TABLE `document`
  ADD PRIMARY KEY (`DocumentID`),
  ADD KEY `CaseID` (`CaseID`);

--
-- Indexes for table `dynamic_permissions`
--
ALTER TABLE `dynamic_permissions`
  ADD PRIMARY KEY (`UserID`,`PermissionID`,`ResourceID`),
  ADD KEY `PermissionID` (`PermissionID`),
  ADD KEY `ResourceID` (`ResourceID`);

--
-- Indexes for table `hearing`
--
ALTER TABLE `hearing`
  ADD PRIMARY KEY (`HearingID`),
  ADD KEY `CaseID` (`CaseID`);

--
-- Indexes for table `judgement_detail`
--
ALTER TABLE `judgement_detail`
  ADD PRIMARY KEY (`Detail_ID`),
  ADD KEY `JudgmentID` (`JudgmentID`);

--
-- Indexes for table `judgment`
--
ALTER TABLE `judgment`
  ADD PRIMARY KEY (`JudgmentID`),
  ADD KEY `CaseID` (`CaseID`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`LogID`),
  ADD KEY `ResourceID` (`ResourceID`),
  ADD KEY `UserID` (`UserID`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`PerID`);

--
-- Indexes for table `resources`
--
ALTER TABLE `resources`
  ADD PRIMARY KEY (`ResourceID`);

--
-- Indexes for table `rolepermissions`
--
ALTER TABLE `rolepermissions`
  ADD PRIMARY KEY (`RoleID`,`PerID`),
  ADD KEY `PerID` (`PerID`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`RoleID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UserID`),
  ADD UNIQUE KEY `Email` (`Email`),
  ADD KEY `fk_users_roles` (`Role`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cases`
--
ALTER TABLE `cases`
  MODIFY `CaseID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `document`
--
ALTER TABLE `document`
  MODIFY `DocumentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `hearing`
--
ALTER TABLE `hearing`
  MODIFY `HearingID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `judgement_detail`
--
ALTER TABLE `judgement_detail`
  MODIFY `Detail_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `judgment`
--
ALTER TABLE `judgment`
  MODIFY `JudgmentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `LogID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `PerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `resources`
--
ALTER TABLE `resources`
  MODIFY `ResourceID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=125;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `RoleID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cases`
--
ALTER TABLE `cases`
  ADD CONSTRAINT `cases_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `users` (`UserID`);

--
-- Constraints for table `document`
--
ALTER TABLE `document`
  ADD CONSTRAINT `document_ibfk_1` FOREIGN KEY (`CaseID`) REFERENCES `cases` (`CaseID`);

--
-- Constraints for table `dynamic_permissions`
--
ALTER TABLE `dynamic_permissions`
  ADD CONSTRAINT `dynamic_permissions_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `users` (`UserID`) ON DELETE CASCADE,
  ADD CONSTRAINT `dynamic_permissions_ibfk_2` FOREIGN KEY (`PermissionID`) REFERENCES `permissions` (`PerID`) ON DELETE CASCADE,
  ADD CONSTRAINT `dynamic_permissions_ibfk_3` FOREIGN KEY (`ResourceID`) REFERENCES `resources` (`ResourceID`) ON DELETE CASCADE;

--
-- Constraints for table `hearing`
--
ALTER TABLE `hearing`
  ADD CONSTRAINT `hearing_ibfk_1` FOREIGN KEY (`CaseID`) REFERENCES `cases` (`CaseID`);

--
-- Constraints for table `judgement_detail`
--
ALTER TABLE `judgement_detail`
  ADD CONSTRAINT `judgement_detail_ibfk_1` FOREIGN KEY (`JudgmentID`) REFERENCES `judgment` (`JudgmentID`) ON DELETE CASCADE;

--
-- Constraints for table `judgment`
--
ALTER TABLE `judgment`
  ADD CONSTRAINT `judgment_ibfk_1` FOREIGN KEY (`CaseID`) REFERENCES `cases` (`CaseID`) ON DELETE CASCADE;

--
-- Constraints for table `logs`
--
ALTER TABLE `logs`
  ADD CONSTRAINT `logs_ibfk_1` FOREIGN KEY (`ResourceID`) REFERENCES `resources` (`ResourceID`),
  ADD CONSTRAINT `logs_ibfk_2` FOREIGN KEY (`UserID`) REFERENCES `users` (`UserID`);

--
-- Constraints for table `rolepermissions`
--
ALTER TABLE `rolepermissions`
  ADD CONSTRAINT `rolepermissions_ibfk_1` FOREIGN KEY (`RoleID`) REFERENCES `roles` (`RoleID`),
  ADD CONSTRAINT `rolepermissions_ibfk_2` FOREIGN KEY (`PerID`) REFERENCES `permissions` (`PerID`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_users_roles` FOREIGN KEY (`Role`) REFERENCES `roles` (`RoleID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
