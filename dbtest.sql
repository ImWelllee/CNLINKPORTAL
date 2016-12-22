-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 22, 2016 at 01:05 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dbtest`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE IF NOT EXISTS `tbl_users` (
  `userID` int(11) NOT NULL AUTO_INCREMENT,
  `userName` varchar(100) NOT NULL,
  `userNameChinese` varchar(100),
  `userPass` varchar(100) NOT NULL,
  `userCompanyName` varchar(100) NOT NULL DEFAULT 'CNLINK Networks Limited',
  `userDepartmentName` varchar(100) NOT NULL DEFAULT 'UNIT',
  `userRole` varchar(100) NOT NULL DEFAULT 'USER',
  `userStatus` enum('Y','N') NOT NULL DEFAULT 'N',
  `tokenCode` varchar(100) NOT NULL,
  `userPinCodePBX` varchar(100),
  `userMobilePhone` varchar(20),
  `userOfficeNum` varchar(20),
  `userExtNum1` varchar(20),
  `userExtNum2` varchar(20),
  `userHomeNumber` varchar(20),
  `userSoftphone1` varchar(20),
  `userPinCodeSIP1` varchar(20),
  `userSoftphone2` varchar(20),
  `userPinCodeSIP2` varchar(20),
  `userSoftphone3` varchar(20),
  `userPinCodeSIP3` varchar(20),
  `userTimeOutNum` varchar(20),
  `userForwardNum` varchar(20),
  `userBridgeNum` varchar(20),
  `userEmail` varchar(100) NOT NULL,
  `userVoiceBox` enum('Y','N') NOT NULL DEFAULT 'Y',
  `userVoiceMail` enum('Y','N') NOT NULL DEFAULT 'N',

  PRIMARY KEY (`userID`),
  UNIQUE KEY `userEmail` (`userEmail`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

CREATE TABLE IF NOT EXISTS `tbl_AddressBook` (
  `Contact_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Contact_NameEnglish` varchar(100) NOT NULL,
  `Contact_NameChinese` varchar(100),
  `Contact_CompanyName` varchar(100) NOT NULL DEFAULT 'CNLINK Networks Limited',
  `Contact_DepartmentName` varchar(100),
  `Contact_Role` varchar(100) NOT NULL DEFAULT 'Employee',
  `Contact_Status` enum('Y','N') NOT NULL DEFAULT 'N',
  `Contact_MobilePhone` varchar(20) NOT NULL,
  `Contact_OfficeNum` varchar(20) DEFAULT '886-2-82528258',
  `Contact_ExtNum1` varchar(20),
  `Contact_ExtNum2` varchar(20),
  `Contact_HomeNumber` varchar(20),
  `Contact_Softphone1` varchar(20),
  `Contact_PinCodeSIP1` varchar(20),
  `Contact_Softphone2` varchar(20),
  `Contact_PinCodeSIP2` varchar(20),
  `Contact_Softphone3` varchar(20),
  `Contact_PinCodeSIP3` varchar(20),
  `Contact_Email` varchar(100) NOT NULL,
  
  PRIMARY KEY (`Contact_ID`),
  UNIQUE KEY `Contact_Email` (`Contact_Email`),
  UNIQUE KEY `Contact_MobilePhone` (`Contact_MobilePhone`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;




INSERT INTO `tbl_AddressBook` (`Contact_NameEnglish`, `Contact_NameChinese`,
`Contact_Softphone1`, `Contact_ExtNum1`, `Contact_Softphone2`,`Contact_MobilePhone`,
`Contact_Email`,`Contact_DepartmentName`) 
VALUES
('Nicole Huang','黃綺君','8100','100','','0922-707-067','nicole_huang@tw.cnlink.net','臺灣分公司-總經理'),
('Heaven Li','李威龍','8112','112','','0920-105-029','heaven@tw.cnlink.net','業務部'),
('Leo Huang','黃市杰','8512','512','','0928-860-688','leo@tw.cnlink.net','業務部'),
('Joyce Chiu','邱淑君','8532','532','','0937-093-318','joyce@tw.cnlink.net','業務部'),
('Crystal Chang','張杏如','8521','521','','0958-507-053','crystal@tw.cnlink.net','業務部'),
('Kevin Yeh','葉祈賢','8535','535','','0955-313-212','kevin.yeh@tw.cnlink.net','業務部'),
('Kevin Chiu','邱裕翔','8522','522','700','0933-756-611','kevin@tw.cnlink.net','業務部'),
('Kevin Liu','柳柛宏','701','701','','0936-518-373','kevin.liu@tw.cnlink.net','業務部'),
('Anderson Lin','林濬緯','702','702','','0970-233-888','anderson@tw.cnlink.net','業務部'),
('Yoko Hung','洪芷羚','703','703','','0936-814-532','yoko@tw.cnlink.net','業務部'),
('Celine Chen','陳羿舲','8502','502','','0928-992-207','celine@tw.cnlink.net','業務部'),
('Well Lee','李國明','8501','501','','0926-811-898','well_lee@tw.cnlink.net','業務拓業部'),
('Fred Wei','魏建騰','8336','336','','0972-381-992','fred@tw.cnlink.net','IT&服務部'),
('Karen Lin','林逸庭','8103','103','','0958-420-372','karen.lin@tw.cnlink.net','IT&服務部'),
('Kelly Lin','林嵐郁','8102','102','','0918-680-170','kelly@tw.cnlink.net','IT&服務部'),
('Vonny Liu','劉燕柔','8513','513','','0916-755-119','vonny@tw.cnlink.net','IT&服務部'),
('Mark Nei','倪漁傑','8302','302','','0920-707-397','mark@tw.cnlink.net','IT&服務部'),
('Simon Shu','徐可帆','8301','301','','0981-108-682','simon@tw.cnlink.net','IT&服務部'),
('Justin','薛榮彬','8301','301','','0910-597-279','justin@tw.cnlink.net','IT&服務部'),
('Willson Chen','陳忠晧','8301','301','','0925-099-703','willson@tw.cnlink.net','IT&服務部'),
('Rockie Liu','劉伯杰','8301','301','','0981-335-858','rockie@tw.cnlink.net','IT&服務部'),
('Candy Chang','張世芳','8300','300','','0918-417-505','candy@tw.cnlink.net','財務部'),
('Vita Kuo','郭淑芬','8260','260','','0912-928-198','vita@tw.cnlink.net','財務部'),
('Karen Chen','陳玟伶','8201','201','','0952-490-250','karen_chen@tw.cnlink.net','人事行政管理部'),
('Nancy Kuo','郭蕙怡','8113','113','','0939-170-042','nancy@tw.cnlink.net','IT&服務部-HQ');

