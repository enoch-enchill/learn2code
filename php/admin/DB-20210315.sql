-- --------------------------------------------------------
-- Host:                         localhost
-- Server version:               5.7.24 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping structure for table apsuusao_ntxau.tbl_contents
CREATE TABLE IF NOT EXISTS `tbl_contents` (
  `pkId` int(12) NOT NULL AUTO_INCREMENT,
  `intMenuId` int(12) NOT NULL,
  `intPageId` int(12) NOT NULL,
  `strTitle` varchar(256) NOT NULL,
  `strCaption` varchar(1024) DEFAULT NULL,
  `strBody` text,
  `strBrief` varchar(1024) DEFAULT NULL,
  `imgThumbnail` varchar(128) DEFAULT NULL,
  `imgBanner` varchar(128) DEFAULT NULL,
  `strIcon` varchar(30) DEFAULT NULL,
  `strRoute` varchar(50) DEFAULT NULL,
  `strPath` varchar(50) DEFAULT NULL,
  `intAuthorId` int(12) NOT NULL,
  `intStatus` int(3) NOT NULL DEFAULT '0',
  `dtCreatedAt` datetime NOT NULL,
  `dtUpdatedAt` datetime NOT NULL,
  PRIMARY KEY (`pkId`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

-- Dumping data for table apsuusao_ntxau.tbl_contents: ~9 rows (approximately)
/*!40000 ALTER TABLE `tbl_contents` DISABLE KEYS */;
REPLACE INTO `tbl_contents` (`pkId`, `intMenuId`, `intPageId`, `strTitle`, `strCaption`, `strBody`, `strBrief`, `imgThumbnail`, `imgBanner`, `strIcon`, `strRoute`, `strPath`, `intAuthorId`, `intStatus`, `dtCreatedAt`, `dtUpdatedAt`) VALUES
	(7, 1, 1, 'VISION', '', '&lt;p&gt;To create a dynamic association that collaborates with APSU National Executive Council and administration of St. Augustineâ€™s College to promote academic excellence of the institution and mentorship of graduates entering into tertiary institution and other vocational endeavors. It will strive to foster the unique traditions of the institution, mutually beneficial relations amongst members and the institution and sustain a life-long passion for the college and its progress.&lt;/p&gt;\n', '', 'anAebrNyOG63.png', 'TLzhZCclB7Kg.png', '', '/our-vision', 'our-vision.php', 1, 1, '2020-07-08 16:09:49', '2020-07-16 20:17:54'),
	(8, 1, 1, 'MISSION', '', '&lt;p&gt;To promote a life-long interest in the welfare of St. Augustine&rsquo;s College and of all APSU USA members.&lt;/p&gt;', '', 'nSFZYlkR14TK.png', 'tbzxvrf4VJEM.png', '', 'our-mission', '#', 1, 1, '2020-07-16 20:21:32', '2020-07-16 20:21:32'),
	(9, 1, 1, 'GUIDING PRINCIPLES', '', '&lt;ul&gt;\n                    &lt;li&gt;Relationships and Camaraderie&lt;/li&gt;\n                    &lt;li&gt;Build a united family of brethren where members have a source of belonging and assurance of a brother&rsquo;s keeper in times of need&lt;/li&gt;\n                    &lt;li&gt;Engagement, Professional Development and Networking&lt;/li&gt;\n                    &lt;li&gt;Promote the involvement of all members in various activities and discussion&lt;/li&gt;\n                    &lt;li&gt;Create various forums for professional development and networking&lt;/li&gt;\n                    &lt;li&gt;Partnership with College Administration and other Regional Alumni Associations&lt;/li&gt;\n                    &lt;li&gt;Staying abreast with College objectives and ensuring that all activities complement the activities of the worldwide APSU confraternity&lt;/li&gt;\n                    &lt;li&gt;Service, Integrity and Innovation&lt;/li&gt;\n                    &lt;li&gt;Offering all resources including time and money to the success of the associations objectives&lt;/li&gt;\n                    &lt;li&gt;Maintaining a high sense of focus and adherence to laid down principle and high ethical standards&lt;/li&gt;\n                    &lt;li&gt;Willing to move beyond current comfort zone to explore new ideas and solutions not accustomed to&lt;/li&gt;\n                    &lt;li&gt;Excellence and Accuracy&lt;/li&gt;\n                    &lt;li&gt;Striving for the best output in all endeavors whiles respecting all ethical boundaries and exercising healthy dose of realism&lt;/li&gt;\n                    &lt;li&gt;Striving to provide correct information and abiding by the promises we make to the association and each other&lt;/li&gt;\n                    &lt;li&gt;Strategic Planning  and Execution&lt;/li&gt;\n                    &lt;li&gt;Adequate consultation before  setting clear objectives for activities and projects and setting up a workable plan before commencement of the activity or projects and proper delegation and assignment of responsibilities to ensure success.&lt;/li&gt;\n                    &lt;li&gt;Transparency and Trust&lt;/li&gt;\n                    &lt;li&gt;Clear and open communication on processes, activities and provision of records for all members, tasks force, support group, committees etc. whiles respecting privacy where applicable.&lt;/li&gt;\n                &lt;/ul&gt;', '', 'A0W5LXYbTyvP.png', 'Lhkwv3xCcNto.png', '', 'guiding-principles', '#', 1, 1, '2020-07-16 20:23:28', '2020-07-16 21:00:38'),
	(10, 1, 2, 'College Motto', '', '&lt;p&gt;The College motto in Latin is &ldquo;Omnia Vincit Labor&rdquo; which means, â€˜Perseverance conquers all&rsquo; in English. The origin of the motto is ascribed to Archbishop William T. Porter, who declared in a statement made during the official opening ceremony of the College on 22nd January 1936:&lt;/p&gt;\n&lt;p&gt;&ldquo;Labour Overcometh all things&rdquo; is the motto chosen for this School, and to this day is the splendid triumph for the labour and sacrifices of our predecessors. It is a fitting motto and a noble ideal to set before the citizens of any country: It represents the position, the mind and the determination of Gold Coast Catholics today. Their example will be an inspiration to their children, and I trust that it will be the ideal set before the students who in future years will pass through this school, and afterwards will take their places as responsible citizens in their country.&rdquo; Rev. Fr. Maurice B. Kelly, a founding member and the first Headmaster of the College, saw in this statement a good maxim to be adopted as the College&rsquo;s motto. He therefore summarised the statement in Latin as â€˜Omnia Vincit Labor.&rsquo;&lt;/p&gt;', '', 'tLIb31GdDraS.png', '60xAiyEj7RPI.png', '', '#', '#', 1, 1, '2020-07-16 20:39:36', '2020-07-16 20:39:36'),
	(11, 1, 2, 'College Flag and Colours', '', '&lt;p&gt;Being Irish, the founding fathers, carved out the colours of the College flag from their country&rsquo;s national flag, which has green to the left and orange to the right with white in the middle.&lt;/p&gt;\n&lt;p&gt;The green represents the Catholic population of Ireland and the orange, the protestants population. The white symbolizes the growing desire for peace between the two dominant religious groups, since the nationalist struggle in 1848.&lt;/p&gt;\n&lt;p&gt;Similarly, the green in the College Flag signifies the Catholic identity of the College. The white symbolizes the College&rsquo;s invitation to other institutions of learning to co-exist and share in its rich experience. The flag is hoisted with the green on top, which shows the Catholic identity of the College soaring above all. The white below shows the College&rsquo;s readiness to co-exist with all other institutions of learning that relate with it.&lt;/p&gt;', '', 'hvNiMSAZLj43.png', 'yZB2Hpj60hC7.png', '', '#', '#', 1, 1, '2020-07-16 20:40:39', '2020-07-16 20:40:39'),
	(12, 1, 2, 'College Emblem', '', '&lt;p&gt;The College emblem consists of a shield on which is a white cross on a green field. In the grand old days of medieval chivalry, when brave Knights went forth to do battle for the Holy Places and returned victorious, they had their shields emblazoned with the white cross.&lt;/p&gt;\n &lt;p&gt;In the same vein, it is our hope that when teachers and students go forth to do battle against the forces of ignorance and superstition and emerge victorious, the white cross of purity will be emblazoned on their hearts.&lt;/p&gt;\n&lt;p&gt;Superimposed on the white cross is a lighted torch, flanked by a laurel that is represented by yellow olive branches. The lighted torch is symbolic of the College&rsquo;s shining leadership in academic excellence and progress. The laurel represents the reward of victory awaiting every Augustinian who nobly applies himself to his role in life.&lt;/p&gt;\n&lt;p&gt;The green background represents the fertility of the College&rsquo;s ongoing desire and pursuance for developing holistic students&mdash;students of excellence in both academic and moral upbringing.&lt;/p&gt;\n&lt;p&gt;The grey colour on the upper part of the shield&mdash;a combination of white and black&mdash;signifies the combined efforts of the white Society of African Missionaries (SMA) Fathers and the African faithful in propagating the gospel through the promotion of excellent academic and moral discipline. Their aim was to produce a perfect Christian and thus a perfect citizen.&lt;/p&gt;', '', 'y60szOcB87rw.png', 'ICgMi4cjboyW.png', '', '#', '#', 1, 1, '2020-07-16 20:41:32', '2020-07-16 20:41:32'),
	(13, 7, 3, 'Personal Information', 'Full Name, Birth Day, Contact Details & Profession', 'Your name will be used for identification purposes. You may have to address appropriately by your full name and title especially on all our official correspondences with you. Your email address and phone (or WhatsApp) contact details by which we can communicate with you. We may assign you a mentorship role to help groom APSUnians who are university students and/or graduates with respect to your profession or occupation. We\'ll display your professional info in an APSU professional network page.', '', 'khj8RxV1F4yM.png', 'RQPFYsBnH4iG.png', '', '#', '#', 1, 1, '2020-09-01 06:55:06', '2020-09-01 09:45:29'),
	(16, 7, 3, 'Augusco Details', 'House, Class & Year Group', 'Which house and class were you during your days in Augusco and in which year did you leave the college? ', '', 'ilqOJwGhLPHN.png', 'W3RFCDaG9wi8.png', '', '#', '#', 1, 1, '2020-09-01 08:00:13', '2020-09-01 08:16:22'),
	(17, 7, 3, 'Location Information', 'Country, State or Province, Zip Code', 'Your location information will help us plan our weekly, monthly and annual activities and outreach programs', '', 'IVMeAPfGcR0o.png', 'XwgYkGjmf89p.png', '', '#', '#', 1, 1, '2020-09-01 09:32:19', '2020-09-01 09:32:19');
/*!40000 ALTER TABLE `tbl_contents` ENABLE KEYS */;

-- Dumping structure for table apsuusao_ntxau.tbl_members
CREATE TABLE IF NOT EXISTS `tbl_members` (
  `pkId` int(12) NOT NULL AUTO_INCREMENT,
  `strFirstName` varchar(50) NOT NULL DEFAULT '',
  `strMiddleName` varchar(50) DEFAULT '',
  `strLastName` varchar(50) NOT NULL DEFAULT '',
  `strBirthMonth` varchar(5) NOT NULL DEFAULT '',
  `strBirthDay` varchar(5) NOT NULL DEFAULT '',
  `strEmailAddress` varchar(80) NOT NULL DEFAULT '',
  `strPhoneNumber` varchar(80) NOT NULL DEFAULT '',
  `strProfession` varchar(80) DEFAULT '',
  `strIndustry` varchar(80) DEFAULT '',
  `strNetwork` varchar(5) NOT NULL DEFAULT '',
  `strAuguscoHouse` varchar(25) NOT NULL DEFAULT '',
  `strAuguscoClass` varchar(25) NOT NULL DEFAULT '',
  `strAuguscoYear` varchar(10) NOT NULL DEFAULT '',
  `strCountryName` varchar(80) NOT NULL DEFAULT '',
  `strRegionName` varchar(80) NOT NULL DEFAULT '',
  `strZipCode` varchar(25) NOT NULL DEFAULT '',
  `strShirtSize` varchar(25) NOT NULL DEFAULT '',
  `intStatus` int(4) NOT NULL DEFAULT '0',
  `dtCreatedAt` datetime NOT NULL,
  `dtUpdatedAt` datetime NOT NULL,
  PRIMARY KEY (`pkId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='APSU USA Members Registration Base';

-- Dumping data for table apsuusao_ntxau.tbl_members: ~0 rows (approximately)
/*!40000 ALTER TABLE `tbl_members` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_members` ENABLE KEYS */;

-- Dumping structure for table apsuusao_ntxau.tbl_menus
CREATE TABLE IF NOT EXISTS `tbl_menus` (
  `pkId` int(12) NOT NULL AUTO_INCREMENT,
  `strTitle` varchar(50) NOT NULL,
  `strRoute` varchar(50) NOT NULL DEFAULT '/',
  `strPath` varchar(50) NOT NULL DEFAULT 'home.php',
  `strCaption` varchar(256) DEFAULT NULL,
  `intStatus` int(3) NOT NULL DEFAULT '0',
  `intOrder` int(3) NOT NULL DEFAULT '1',
  `dtCreatedAt` datetime NOT NULL,
  `dtUpdatedAt` datetime NOT NULL,
  PRIMARY KEY (`pkId`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- Dumping data for table apsuusao_ntxau.tbl_menus: ~6 rows (approximately)
/*!40000 ALTER TABLE `tbl_menus` DISABLE KEYS */;
REPLACE INTO `tbl_menus` (`pkId`, `strTitle`, `strRoute`, `strPath`, `strCaption`, `intStatus`, `intOrder`, `dtCreatedAt`, `dtUpdatedAt`) VALUES
	(1, 'Who We Are', '#', '#', 'List of pages that describe us', 1, 1, '2020-07-03 15:08:27', '2020-07-16 18:25:02'),
	(4, 'Giving', '#', '#', 'Giving', 1, 2, '2020-07-03 17:44:59', '2020-07-16 18:25:48'),
	(5, 'Our School', '#', '#', 'Info about our school', 1, 6, '2020-07-03 17:47:44', '2020-07-16 18:27:59'),
	(6, 'APSU SWAG', '#', '#', 'APSU SWAG', 1, 5, '2020-07-03 17:50:12', '2020-07-16 18:27:32'),
	(7, 'Join Us', '#', '#', 'Manages Join Us Pages', 1, 3, '2020-07-03 18:24:42', '2020-07-16 18:26:08'),
	(8, 'Memory Lane', '#', '#', 'Manages Memory Lane Pages', 1, 4, '2020-07-03 18:26:55', '2020-07-16 18:26:53');
/*!40000 ALTER TABLE `tbl_menus` ENABLE KEYS */;

-- Dumping structure for table apsuusao_ntxau.tbl_pages
CREATE TABLE IF NOT EXISTS `tbl_pages` (
  `pkId` int(12) NOT NULL AUTO_INCREMENT,
  `intMenuId` int(12) NOT NULL,
  `strTitle` varchar(50) NOT NULL,
  `strRoute` varchar(50) NOT NULL DEFAULT '/',
  `strPath` varchar(50) NOT NULL DEFAULT 'home.php',
  `strCaption` varchar(265) DEFAULT NULL,
  `strBody` text,
  `intStatus` int(3) NOT NULL DEFAULT '0',
  `intOrder` int(3) NOT NULL DEFAULT '1',
  `dtCreatedAt` datetime NOT NULL,
  `dtUpdatedAt` datetime NOT NULL,
  PRIMARY KEY (`pkId`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Dumping data for table apsuusao_ntxau.tbl_pages: ~2 rows (approximately)
/*!40000 ALTER TABLE `tbl_pages` DISABLE KEYS */;
REPLACE INTO `tbl_pages` (`pkId`, `intMenuId`, `strTitle`, `strRoute`, `strPath`, `strCaption`, `strBody`, `intStatus`, `intOrder`, `dtCreatedAt`, `dtUpdatedAt`) VALUES
	(1, 1, 'About Us', '/about-us', 'about-us.php', 'WHO WE ARE?', '&lt;p&gt;APSU USA is the United States of America Chapter of the St. Augustine&rsquo;s Past Students Union, a fraternity of brethren who were once students of the great St. Augustine&rsquo;s College, Cape Coast, Ghana, West Africa, the premier catholic secondary educational institution in Ghana. The association or union is open to all former students of the college resident in the United States of America, Mexico and the Caribbean.&lt;/p&gt;\n&lt;p&gt;Members are referred to as &ldquo;Breders&rdquo; a slang for brothers and can be identified by the various year groups which is the year in which the member sat for O Level or SSSCE or the year in which your class mates took these same exams.&lt;/p&gt;\n &lt;p&gt;For example an alumnus who completed or would have sat for O Levels or SSSCE in 1992 shall have the designation APSU 92.&lt;/p&gt;', 1, 1, '2020-07-03 20:43:58', '2020-07-16 19:42:23'),
	(2, 1, 'Our Identity', '/our-identity', '/our-identity.php', 'Our Identity', NULL, 1, 2, '2020-07-03 20:46:30', '2020-07-16 18:34:51'),
	(3, 7, 'Register', '/register', 'register.php', 'APSU USA Registration', 'Welcome to the members registration page. Kindly ready data consent notes and click on \'Start\' to proceed.', 1, 1, '2020-09-01 06:25:58', '2020-09-01 06:25:58');
/*!40000 ALTER TABLE `tbl_pages` ENABLE KEYS */;

-- Dumping structure for table apsuusao_ntxau.tbl_users
CREATE TABLE IF NOT EXISTS `tbl_users` (
  `pkId` int(12) NOT NULL AUTO_INCREMENT,
  `strName` varchar(50) NOT NULL,
  `strEmail` varchar(50) NOT NULL,
  `strPhone` varchar(50) NOT NULL,
  `strPassword` varchar(256) NOT NULL,
  `intIsAdmin` int(2) NOT NULL DEFAULT '0',
  `intIsActive` int(2) NOT NULL DEFAULT '1',
  `dtCreatedAt` datetime NOT NULL,
  `dtUpdatedAt` datetime NOT NULL,
  PRIMARY KEY (`pkId`),
  UNIQUE KEY `strEmail` (`strEmail`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Dumping data for table apsuusao_ntxau.tbl_users: ~3 rows (approximately)
/*!40000 ALTER TABLE `tbl_users` DISABLE KEYS */;
REPLACE INTO `tbl_users` (`pkId`, `strName`, `strEmail`, `strPhone`, `strPassword`, `intIsAdmin`, `intIsActive`, `dtCreatedAt`, `dtUpdatedAt`) VALUES
	(1, 'Joejo', 'et.enchill@gmail.com', '+233265006096', '$2y$10$b4ZMe.VUTSNTvNi5.9Gii.ZZzEoPArQAXRWoNIavkZXmv4xa6r8wu', 0, 1, '2020-06-27 19:13:46', '2020-06-27 19:13:46'),
	(2, 'Emmanuel', 'iribat@gmail.com', '+17013066666', '$2y$10$DXV56DvvMiTM4DpJ19OHpOlG1vZtaIIEXuuYMq8o5FrLULwZkan/.', 0, 1, '2020-07-16 21:31:07', '2020-07-16 21:31:07'),
	(3, 'Augustine', 'abotsia@gmail.com', '+14692545455', '$2y$10$JeU0zxjUQFPePQ8g9GDE3OeJHXBER/MzTXWTELsI7w1ku9Ff6DZJi', 0, 1, '2020-07-16 21:32:00', '2020-07-16 21:32:00');
/*!40000 ALTER TABLE `tbl_users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
