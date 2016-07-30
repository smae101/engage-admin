-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 28, 2015 at 07:11 AM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `librarysearch`
--

-- --------------------------------------------------------

--
-- Table structure for table `adviser`
--

CREATE TABLE IF NOT EXISTS `adviser` (
  `Id` int(11) NOT NULL,
  `Id_Thesis` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `adviser`
--

INSERT INTO `adviser` (`Id`, `Id_Thesis`, `Name`) VALUES
(2, 2, 'Mrs. Leah V. Barbaso'),
(3, 1, 'Mrs. Leah V. Barbaso'),
(4, 3, 'Mrs. Jennilyn C. Suson'),
(6, 5, 'Mr. Mario Silvano'),
(9, 4, 'Mr. Mario Silvano'),
(19, 9, 'Sample Adviser 1'),
(20, 10, 'Sample Adviser 2.1'),
(21, 6, 'Mr. Mario Silvano'),
(23, 10, 'Sample Adviser'),
(25, 14, 'Dasdassadas'),
(26, 15, 'Adasasd'),
(28, 16, 'Dasdsadas');

-- --------------------------------------------------------

--
-- Table structure for table `author`
--

CREATE TABLE IF NOT EXISTS `author` (
  `Id` int(11) NOT NULL,
  `Id_Thesis` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=71 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `author`
--

INSERT INTO `author` (`Id`, `Id_Thesis`, `Name`) VALUES
(6, 2, 'Glenn Patrick Cua'),
(7, 2, 'Mc Jeve Gindap'),
(8, 2, 'Silvia Sarte'),
(9, 2, 'Jeric Tac-al'),
(10, 2, 'Claudine Tamarra'),
(11, 1, 'Jeoganni Canda'),
(12, 1, 'Vincent Ferrer C. Rosales'),
(13, 1, 'Honeylette V. Tingson'),
(14, 1, 'Neldi Mar K. Cañizares'),
(15, 1, 'Chatelyn Villareal'),
(16, 3, 'Dominic E. Unabia'),
(17, 3, 'Breil Gemida'),
(18, 3, 'Klinton Keth Taboada'),
(19, 3, 'Dawit Tabonares'),
(20, 3, 'Kevin Espanol'),
(26, 5, 'Joseph Christopher Pimentel '),
(27, 5, 'Tiffany R. Ouano'),
(28, 5, 'Justin Empeño'),
(29, 5, 'Charie Raymundo'),
(30, 5, 'Rey Mart Abigan'),
(31, 5, 'Ivy Charmae Inogada'),
(40, 4, 'Jan Michael G. Ragasajo'),
(41, 4, 'Chris Ian L. Berbo'),
(42, 4, 'Joshua C. Bacarisas'),
(43, 4, 'John Mike H. Judan'),
(44, 4, 'Mel Patrick Lecciones'),
(57, 9, 'Sample Author 1'),
(58, 10, 'Sample Author 2.1'),
(59, 10, 'Sample Author 2.2'),
(60, 6, 'John Vincent Capoy'),
(61, 6, 'Neil Anthony Canton'),
(62, 6, 'Noe Norman Galo'),
(63, 6, 'Alwynn Batucan'),
(65, 10, 'Sample Author 3'),
(67, 14, 'Asdasd'),
(68, 15, 'Sdas'),
(70, 16, 'Adasd');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE IF NOT EXISTS `department` (
  `departmentId` int(11) NOT NULL,
  `departmentName` text NOT NULL,
  `collegeOffice` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`departmentId`, `departmentName`, `collegeOffice`) VALUES
(1, 'Architecture Department', 'College of Engineering and Architecture'),
(2, 'Chemical Engineering Department', 'College of Engineering and Architecture'),
(3, 'Civil Engineering Department', 'College of Engineering and Architecture'),
(4, 'Computer Engineering Department', 'College of Engineering and Architecture'),
(5, 'Electrical Engineering Department', 'College of Engineering and Architecture'),
(6, 'Electronics Engineering Department', 'College of Engineering and Architecture'),
(7, 'Industrial Engineering Department', 'College of Engineering and Architecture'),
(8, 'Mechanical Engineering Department', 'College of Engineering and Architecture'),
(9, 'Mining Engineering Department', 'College of Engineering and Architecture'),
(10, 'Computer Science Department', 'College of Computer Studies'),
(11, 'Information Technology Department', 'College of Computer Studies'),
(12, 'Associate In Computer Technology', 'College of Computer Studies'),
(13, 'Hotel And Restaurant Department', 'College of Commerce'),
(14, 'Tourism Department', 'College of Commerce'),
(15, 'Accounting Technology Department', 'College of Commerce'),
(16, 'Public Administration Department', 'College of Commerce'),
(17, 'Business Administration Department', 'College of Commerce'),
(18, 'Accountancy Department', 'College of Commerce'),
(19, 'Office Administration Department', 'College of Commerce'),
(20, 'Behavioral Science Department', 'College of Arts & Sciences'),
(21, 'Biology Department', 'College of Arts & Sciences'),
(22, 'Chemistry Department', 'College of Arts & Sciences'),
(23, 'Languages, Literature And Communication Department', 'College of Arts & Sciences'),
(24, 'Mathematics Department', 'College of Arts & Sciences'),
(25, 'Physics Department', 'College of Arts & Sciences'),
(27, 'Nursing Department', 'College of Nursing'),
(28, 'Diploma In Midwifery', 'College of Nursing'),
(29, 'Elementary  Department', 'College of Education'),
(30, 'Secondary Department', 'College of Education');

-- --------------------------------------------------------

--
-- Table structure for table `keyword`
--

CREATE TABLE IF NOT EXISTS `keyword` (
  `Id_Keyword` int(11) NOT NULL,
  `Id_Thesis` int(11) NOT NULL,
  `Keyword` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `keyword`
--

INSERT INTO `keyword` (`Id_Keyword`, `Id_Thesis`, `Keyword`) VALUES
(4, 2, 'Hospital'),
(5, 2, 'Talisay'),
(6, 1, 'Docs'),
(7, 1, 'Management'),
(8, 1, 'Desktop App'),
(10, 4, 'Calendar'),
(11, 4, 'HTML'),
(19, 9, 'Keyword1'),
(20, 10, 'Keyword 2'),
(21, 6, 'Round Plastic'),
(22, 11, 'Html'),
(23, 10, 'Kkkkkkk'),
(24, 13, 'Kkkk'),
(25, 14, 'Asd');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE IF NOT EXISTS `subject` (
  `Id` int(11) NOT NULL,
  `Id_Thesis` int(11) NOT NULL,
  `Subject` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`Id`, `Id_Thesis`, `Subject`) VALUES
(7, 9, 'Subject1'),
(8, 10, 'Subject 2'),
(9, 6, 'Web Apllication'),
(10, 11, 'Web Application'),
(11, 10, 'Subject Sampl Only'),
(12, 13, 'Ssss'),
(13, 14, 'Asd');

-- --------------------------------------------------------

--
-- Table structure for table `system_authority`
--

CREATE TABLE IF NOT EXISTS `system_authority` (
  `Id` int(11) NOT NULL,
  `Username` varchar(255) NOT NULL,
  `Uid` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Status` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `system_authority`
--

INSERT INTO `system_authority` (`Id`, `Username`, `Uid`, `Password`, `Status`) VALUES
(1, 'admin', 'SuperUser', '81dc9bdb52d04dc20036dbd8313ed055', ''),
(2, 'superUser', 'SuperUser', '81dc9bdb52d04dc20036dbd8313ed055', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `thesis_information`
--

CREATE TABLE IF NOT EXISTS `thesis_information` (
  `Id_Thesis` int(11) NOT NULL,
  `Call_Location` varchar(255) NOT NULL,
  `Call_Dewey` varchar(255) NOT NULL,
  `Call_DeweyExtend` varchar(255) NOT NULL,
  `Call_ClassNum` varchar(255) NOT NULL,
  `Call_Year` year(4) NOT NULL,
  `Call_Copy` varchar(255) NOT NULL,
  `Accession_Number` int(11) NOT NULL,
  `Book_Sem` int(11) NOT NULL,
  `Book_Year` int(11) NOT NULL,
  `Book_Group` int(11) NOT NULL,
  `Book_Number` varchar(255) NOT NULL,
  `Volume_Number` int(11) NOT NULL,
  `Issue_Number` int(11) NOT NULL,
  `Regular` tinyint(1) NOT NULL,
  `Title` varchar(255) NOT NULL,
  `Department` varchar(255) NOT NULL,
  `Published_Month` varchar(255) NOT NULL,
  `Published_Year` varchar(255) NOT NULL,
  `Date_Received` date NOT NULL,
  `File` varchar(255) NOT NULL,
  `Timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Description` text NOT NULL,
  `Status` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `thesis_information`
--

INSERT INTO `thesis_information` (`Id_Thesis`, `Call_Location`, `Call_Dewey`, `Call_DeweyExtend`, `Call_ClassNum`, `Call_Year`, `Call_Copy`, `Accession_Number`, `Book_Sem`, `Book_Year`, `Book_Group`, `Book_Number`, `Volume_Number`, `Issue_Number`, `Regular`, `Title`, `Department`, `Published_Month`, `Published_Year`, `Date_Received`, `File`, `Timestamp`, `Description`, `Status`) VALUES
(1, '', '', '', '', 0000, '', 0, 1, 2014, 2, '1-2014-2', 0, 0, 0, 'Document Management System', 'Information Technology Department', 'October', '2014', '0000-00-00', '1792355fb6bbf577ab.pdf', '2015-09-18 01:41:19', '<p>In this system it let the user know the importance of a document management system for future use. They will find this system interesting because they can access and retrieve files and/or documents whenever they need it. It will also prevent authorized changes to documents from employees who were not able to register.</p>\r\n<p>The document management system of Carmen Copper Corp. will allow the user to access and retrieve files and/or documents. The system will be web base and needs registration before use.</p>\r\n<p>In this system the user can create guidelines for document and data control, record keeping, review and approval and updating documents and to access and retrieve files and/or documents in the future. It ensures the availability of documents when needed and preventi on of unauthorized changes to documents. Also in this system, it prevents the use of unapproved or obsolete version of documents or files</p>', 'Available'),
(2, '', '', '', '', 0000, '', 0, 1, 2014, 3, '1-2014-3', 0, 0, 0, 'Talisay District Hospital Billing And Inventory System', 'Information Technology Department', 'October', '2014', '0000-00-00', '122155fb6ca41ecdd.pdf', '2015-09-18 01:45:08', '<p>Billing System will be all about the charges and payments of the patient while they are inside the hospital. It will all be recorded from the time they entered the hospital, until they checked-out. While for the Inventory system, it will be a front-end application where all the staff and personnel’s medical transactions with the hospital supplies will be recorded and is stored in the database and later on will be passed to the billing system after purchase. <br />In Billing System, the total charges will be based from the total discounts, patient charges, professional fee (doctor’s fee), medical social services, adjustments and more. <br />For Inventory System, which is a front-end based application, consists of patient’s medical supplies transactions which are recorded and will be applied in the total charges and linked to the billing system. <br />Patients will be able to view their current balances and total charges. But their access will only be there. Hospital admin and staff have the total access of the systems by adding, deleting, and editing transactions.</p>', 'On Process'),
(3, '', '', '', '', 0000, '', 0, 1, 2014, 6, '1-2014-6', 0, 0, 0, 'ZMJ Printing Client And Employee - Tracking System', 'Information Technology Department', 'October', '2014', '0000-00-00', '1117955fb6e40239a0.pdf', '2015-09-18 01:52:00', '<p>This Project is built to give help to the working environment of ZMJ Pixer Printing. Help such as adding, deleting, editing, storing, and retrieving. This system is specially built for ZMJ Pixer Printing for them to have a well manage and organized working environment. This syste can help ZMJ Pixer Printing become a more efficient and productive work. This system will be provided with a user-friendly interface so that the user has find it very convenient to interact with the system.</p>\r\n<p>Many of the components of such an environment are available today but not in an integrated fashion and this integration will be one of the main contributions of this project. This document specifies the requirements and constraints of such an environment. We will first discuss the different roles that the system will support followed by a discussion on the actual requirements.</p>\r\n<p>The Software Requirements Specification is in content compliance with IEEE standard 830-1998 in which the contents of this standard are rearranged and a mapping is provided. It is mapped into various clauses and sub clauses of the IEEE standard 830-1998.</p>', 'Available'),
(4, '', '', '', '', 0000, '', 0, 1, 2014, 7, '1-2014-7', 0, 0, 0, 'CIT-U Events Calendar', 'Information Technology Department', 'October', '2014', '0000-00-00', '2362955fb6eddd0d22.pdf', '2015-09-18 01:54:37', '<p>This is software CIT-U Events Calendar is intended for faculty, staff, and students specifically the new students. CIT-U Calendar Events App gives the<br />students, staff, and faculty the information in our school. Its main purpose is to provide vital information for CIT-U’s students, staff, and faculty members about the school events, memos, holidays, announcements and schedules about examinations.</p>', 'On Process'),
(5, '', '', '', '', 0000, '', 0, 1, 2014, 8, '1-2014-8', 0, 0, 0, 'Tracking System and Registration System for International Marketing Group', 'Information Technology Department', 'October', '2014', '0000-00-00', '1241855fb6fed22aae.pdf', '2015-09-18 01:59:09', '<p>The purpose of the systems is to track down every activity of the enrollees and the members of International Marketing Groups (IMG) for promotion<br />notification and to create a user-friendly registration and membership system. The system will run in web browser. This Tracking and Registration System will be implemented at the International Marketing Group as client.  <br />The Tracking and Registration System for IMG will allow the user to manage their accounts as an IMG member. IMG Web Team is using Fountain model process for the implementation of the project. Documents will be applied specify the phase of the implementation for the project.</p>', 'Available'),
(6, 'T.', '000', '', '', 1990, ' ', 0, 1, 2014, 9, '1-2014-9', 0, 0, 0, 'CIT-U Medal Count', 'Information Technology Department', 'October', '2014', '0000-00-00', '897955fb70c09ecc0.pdf', '2015-09-18 02:02:40', '<p>This project was develop in order to have an easy and accurate way of providing a vital information for CIT-U’s students, staff and faculty members about the intramurals, and record list of winners in every department. This is to provide school’s Tally sheet of our Intramurals event. Our client is Dr. Larmie feliscuzo she is the assistant chair of our department college of computer studies, Cebu Institute of Technology University.</p>\r\n<p> </p>\r\n<p> </p>\r\n<p> </p>\r\n<p> </p>\r\n<p> </p>\r\n<p> </p>\r\n<p> </p>\r\n<p>Student’s staff and faculty members of CIT-U are always behind of the new or updates about the events during Intramurals, to aid this problem we come up to an idea that will make use of website which is the “Medal Tally” that provides an information about all the winners in all games. So that all the students, staff and faculty members will be updated about the happenings during intramurals.</p>\r\n<p> </p>\r\n<p> </p>\r\n<p> </p>\r\n<p> </p>\r\n<p> </p>\r\n<p> </p>\r\n<p> </p>\r\n<p>There  are possible revision that could be made for its improvements such as on sport page the winning list that are categorize in Gold, silver, Bronze will no longer appear in Silver or in Bronze once it is already in Gold category.</p>', 'Available'),
(9, 'T.', '000', '120', 'c123', 1990, ' ', 1, 1, 2000, 1, '1-2000-1', 0, 0, 0, 'Sample Thesis 1', 'Accountancy Department', 'January', '2000', '0000-00-00', '', '2015-10-20 18:15:16', '<p>Sample Description</p>', 'Available'),
(10, 'T.', '000', '', '', 1990, ' ', 0, 1, 2000, 12, '1-2000-12', 0, 0, 0, 'Sample Thesis 2', 'Information Technology Department', 'January', '2000', '0000-00-00', '', '2015-10-21 06:59:39', '<p>Sample Only</p>', 'Available'),
(14, 'T.', '000', '', '', 1990, '0', 0, 1, 2005, 1, '1-2005-1', 0, 1, 1, 'asdsadasdasas', 'Computer Science Department', 'January', '2005', '0000-00-00', '', '2015-10-23 01:54:07', '<p>dasdasd</p>', 'Available'),
(15, 'T.', '000', '', '', 1990, '0', 0, 1, 2000, 2, '1-2000-2', 0, 12, 0, '123', '', 'January', '2000', '0000-00-00', '', '2015-10-23 01:57:57', '<p>asdsad</p>', 'Available'),
(16, 'T.', '000', '', '', 1990, '0', 0, 0, 2000, 12, '-2000-12', 0, 2, 1, 'asdsad', '', 'January', '2000', '0000-00-00', '', '2015-10-23 01:59:57', '<p>asdasdasd</p>', 'Available');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adviser`
--
ALTER TABLE `adviser`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `author`
--
ALTER TABLE `author`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`departmentId`);

--
-- Indexes for table `keyword`
--
ALTER TABLE `keyword`
  ADD PRIMARY KEY (`Id_Keyword`), ADD UNIQUE KEY `Id_Keyword` (`Id_Keyword`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `system_authority`
--
ALTER TABLE `system_authority`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `thesis_information`
--
ALTER TABLE `thesis_information`
  ADD PRIMARY KEY (`Id_Thesis`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adviser`
--
ALTER TABLE `adviser`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `author`
--
ALTER TABLE `author`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=71;
--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `departmentId` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `keyword`
--
ALTER TABLE `keyword`
  MODIFY `Id_Keyword` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `system_authority`
--
ALTER TABLE `system_authority`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `thesis_information`
--
ALTER TABLE `thesis_information`
  MODIFY `Id_Thesis` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
