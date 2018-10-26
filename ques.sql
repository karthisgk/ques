-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 04, 2018 at 05:43 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ques`
--

-- --------------------------------------------------------

--
-- Table structure for table `assign`
--

CREATE TABLE `assign` (
  `id` int(11) NOT NULL,
  `test_id` int(11) NOT NULL,
  `batch_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `from` time NOT NULL,
  `to` time NOT NULL,
  `publish` enum('0','1') NOT NULL DEFAULT '0',
  `negative` enum('0','1') NOT NULL DEFAULT '0' COMMENT 'allow negative',
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assign`
--

INSERT INTO `assign` (`id`, `test_id`, `batch_id`, `name`, `date`, `from`, `to`, `publish`, `negative`, `created_at`) VALUES
(2, 1, 1, 'test 14', '2018-09-13', '09:00:00', '10:00:00', '1', '0', '2018-09-09 19:41:43'),
(3, 1, 2, 'test 14', '2018-09-14', '09:00:00', '13:30:00', '0', '0', '2018-09-09 19:58:31'),
(4, 1, 2, 'Aptidute Test', '2018-09-22', '12:30:00', '14:30:00', '1', '0', '2018-09-09 20:00:40'),
(5, 1, 1, 'test 14', '2018-09-09', '09:00:00', '10:00:00', '1', '0', '2018-09-09 20:01:24'),
(6, 1, 1, 'test 14', '2018-09-09', '09:00:00', '10:00:00', '1', '0', '2018-09-09 20:01:35'),
(7, 1, 2, 'test1', '2018-09-21', '09:00:00', '12:45:00', '1', '0', '2018-09-21 08:56:53'),
(8, 1, 2, 'removefu', '2018-10-02', '09:30:00', '10:50:00', '1', '0', '2018-09-21 09:37:46'),
(9, 13, 1, 'New Test 1', '2018-09-26', '21:00:00', '22:00:00', '1', '1', '2018-09-26 18:06:45');

-- --------------------------------------------------------

--
-- Table structure for table `batch`
--

CREATE TABLE `batch` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `from` varchar(5) NOT NULL,
  `to` varchar(5) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `batch`
--

INSERT INTO `batch` (`id`, `name`, `from`, `to`, `created_at`) VALUES
(1, '1st year', '2014', '2017', '2018-08-10 11:20:10'),
(2, '2nd year', '2015', '2017', '2018-08-10 15:22:52');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(11) NOT NULL,
  `content` text NOT NULL,
  `qtype` int(2) NOT NULL COMMENT 'question type',
  `choises` text NOT NULL COMMENT 'choise for multiple choise quest',
  `tf` enum('0','1') NOT NULL DEFAULT '0' COMMENT 'true or false',
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `content`, `qtype`, `choises`, `tf`, `created_at`) VALUES
(1, 'Consider the <i>following <u>line? <b>askjdhajksdhasdj aksd hkjadh kjas hdkjhasjkdh akjdhkajsdhkjahkjashdkjhaskjdhjaskdhkajshdkjashdkjahsdjkahsdkjahsdk jhaskjdhaskj dhaksjdhask?</b></u></i>', 0, '[{"id":"opt-a","value":"ajskdhkjashdjahsk","crt":"0"},{"id":"opt-b","value":"djlkjslkj","crt":"1"},{"id":"opt-c","value":"aklsdjklajsdlkjsa","crt":"0"},{"id":"opt-d","value":"slakjdlaksdjalksjd","crt":"0"}]', '0', '2018-09-01 04:25:09'),
(2, 'sdfndkjfhjsdhfkjsdhkfhsdkjhfsdgfjhsgdfjk sdjkfgkjsdkj?', 0, '[{"id":"opt-a","value":"jfhdjfh","crt":"1"},{"id":"opt-b","value":"skjhfkjsdh","crt":"0"},{"id":"opt-c","value":"sldifjsldk","crt":"0"},{"id":"opt-d","value":"lsdjflksdjflksdf","crt":"0"}]', '0', '2018-09-02 10:11:20'),
(3, 'sathyanfhcnefenhfjkwlwepe?', 0, '[{"id":"opt-a","value":"goitt","crt":"1"},{"id":"opt-b","value":"reurnlkisatsj","crt":"0"},{"id":"opt-c","value":"isdjijddld","crt":"0"},{"id":"opt-d","value":"kepuwyel[","crt":"0"}]', '0', '2018-09-02 10:12:55'),
(4, 'Dbdndndndndn?&nbsp;', 0, '[{"id":"opt-a","value":"Dhhdhdjdjd","crt":"1"},{"id":"opt-b","value":"Bsbdbdbd","crt":"0"},{"id":"opt-c","value":"Dnxndndbdbdbx","crt":"0"},{"id":"opt-d","value":"Sbdbbddbbd","crt":"0"}]', '0', '2018-09-02 10:21:32'),
(5, 'Fgshhhsthhf?&nbsp;', 0, '[{"id":"opt-a","value":"Hfghavnd","crt":"1"},{"id":"opt-b","value":"Ranhsnjs","crt":"0"},{"id":"opt-c","value":"Dggejrhs","crt":"0"},{"id":"opt-d","value":"Klhggdngd","crt":"0"}]', '0', '2018-09-02 10:23:31'),
(6, 'Rghyghfjjgdsdjh?&nbsp;', 0, '[{"id":"opt-a","value":"Gsdhjdgjb","crt":"1"},{"id":"opt-b","value":"Asdghjjc","crt":"0"},{"id":"opt-c","value":"Fhhjjdsdg","crt":"0"},{"id":"opt-d","value":"Afgbjuhhfgh","crt":"0"}]', '0', '2018-09-02 10:24:32'),
(7, 'Thyafbnfbdfnjvcbd?&nbsp;', 0, '[{"id":"opt-a","value":"Vauvcsndgnxj","crt":"1"},{"id":"opt-b","value":"Cvdbjjdvjks","crt":"0"},{"id":"opt-c","value":"Dgbsjjjb","crt":"0"},{"id":"opt-d","value":"Vhhjkjbsgggb","crt":"0"}]', '0', '2018-09-02 10:25:14'),
(8, 'Bcskhcshgjksjfgsj?&nbsp;', 0, '[{"id":"opt-a","value":"Dabjhfnnd","crt":"1"},{"id":"opt-b","value":"Vshfjsjcvd","crt":"0"},{"id":"opt-c","value":"Evbndjvdjhvcd","crt":"0"},{"id":"opt-d","value":"Gwngchjdvh","crt":"0"}]', '0', '2018-09-02 10:26:30'),
(9, 'Sanhchdjh?&nbsp;', 0, '[{"id":"opt-a","value":"Dgghdjgf","crt":"1"},{"id":"opt-b","value":"Bjkgsfhks","crt":"0"},{"id":"opt-c","value":"Sfnsbhkbd","crt":"0"},{"id":"opt-d","value":"Sahana","crt":"0"}]', '0', '2018-09-02 10:27:18'),
(10, 'Sggdkbgdg?&nbsp;', 0, '[{"id":"opt-a","value":"Dgbshvbhd","crt":"1"},{"id":"opt-b","value":"Xghndhhfh","crt":"0"},{"id":"opt-c","value":"Dbbbfhjjfhhf","crt":"0"},{"id":"opt-d","value":"Ghrjjgrhbf","crt":"0"}]', '0', '2018-09-02 10:29:42'),
(11, 'Sghahhbdhbnfhh?&nbsp;', 0, '[{"id":"opt-a","value":"Thjdvvkdvbdgbd","crt":"1"},{"id":"opt-b","value":"Bbxdshjsvbhdb","crt":"0"},{"id":"opt-c","value":"Dhfvndgndhbf","crt":"0"},{"id":"opt-d","value":"Gvsjgvdjhdbnnn","crt":"0"}]', '0', '2018-09-02 10:30:36'),
(12, '<hr id="null">Sathyasahana?&nbsp;', 0, '[{"id":"opt-a","value":"Vishnu","crt":"1"},{"id":"opt-b","value":"Priya","crt":"0"},{"id":"opt-c","value":"Siva","crt":"0"},{"id":"opt-d","value":"Susmitha","crt":"0"}]', '0', '2018-09-02 10:31:17'),
(13, 'Fggsjhgdnggjdgndvb?&nbsp;', 0, '[{"id":"opt-a","value":"Fvbhdjbdnj","crt":"1"},{"id":"opt-b","value":"Dbbkscbdfbd","crt":"0"},{"id":"opt-c","value":"Dnfjfhfdjf","crt":"0"},{"id":"opt-d","value":"Sghjdhndhvf","crt":"0"}]', '0', '2018-09-02 10:33:27'),
(14, 'Bbdibvdkvcsbnjdnvbd?&nbsp;', 0, '[{"id":"opt-a","value":"Dvvcbndhndbnd","crt":"1"},{"id":"opt-b","value":"Sgffhdhfgd","crt":"0"},{"id":"opt-c","value":"Dgvkbcdb","crt":"0"},{"id":"opt-d","value":"Gbdbvcbnfv","crt":"0"}]', '0', '2018-09-02 10:34:00'),
(15, 'Vbdbbbdbgghdhhvdb?&nbsp;', 0, '[{"id":"opt-a","value":"Ddfggg","crt":"1"},{"id":"opt-b","value":"Fggbfgbd","crt":"0"},{"id":"opt-c","value":"Fggndjhvsj","crt":"0"},{"id":"opt-d","value":"Gang adult","crt":"0"}]', '0', '2018-09-02 10:34:44'),
(16, 'Slick snuck usher fb DH?&nbsp;', 0, '[{"id":"opt-a","value":"And em sixth","crt":"1"},{"id":"opt-b","value":"Dick","crt":"0"},{"id":"opt-c","value":"Fish","crt":"0"},{"id":"opt-d","value":"Pan fabric","crt":"0"}]', '0', '2018-09-02 10:35:22'),
(17, 'Asdfklhghferqpfrgu?&nbsp;', 0, '[{"id":"opt-a","value":"Asdflkjhg","crt":"1"},{"id":"opt-b","value":"Ghjjadf","crt":"0"},{"id":"opt-c","value":"Dfghjkl","crt":"0"},{"id":"opt-d","value":"Asdfghjkl","crt":"0"}]', '0', '2018-09-02 10:36:21'),
(18, '&nbsp;Gf sshvudlbkch?&nbsp;', 0, '[{"id":"opt-a","value":"Scorn","crt":"1"},{"id":"opt-b","value":"With","crt":"0"},{"id":"opt-c","value":"Eighty","crt":"0"},{"id":"opt-d","value":"elitists","crt":"0"}]', '0', '2018-09-02 10:37:01'),
(19, 'Xvjffgjdokdcbfivkackgififmv?&nbsp;', 0, '[{"id":"opt-a","value":"Shh hhjdghjf","crt":"1"},{"id":"opt-b","value":"Shindig","crt":"0"},{"id":"opt-c","value":"Sigh though","crt":"0"},{"id":"opt-d","value":"Griffith","crt":"0"}]', '0', '2018-09-02 10:38:32'),
(20, 'Sushi sgghdjfjlfhd?&nbsp;', 0, '[{"id":"opt-a","value":"Hdpckfyy","crt":"1"},{"id":"opt-b","value":"Lend","crt":"0"},{"id":"opt-c","value":"Ditch","crt":"0"},{"id":"opt-d","value":"Nice","crt":"0"}]', '0', '2018-09-02 10:39:04'),
(21, 'Dick jerk highs csnhhs?&nbsp;', 0, '[{"id":"opt-a","value":"Fvvdhjjdhk","crt":"1"},{"id":"opt-b","value":"Dvbdhghdhh","crt":"0"},{"id":"opt-c","value":"Fvgnfvbd","crt":"0"},{"id":"opt-d","value":"Yhfhhhgf","crt":"0"}]', '0', '2018-09-02 10:40:15'),
(22, 'End sggdhhghd?&nbsp;', 0, '[{"id":"opt-a","value":"Dgghdhhfhb","crt":"1"},{"id":"opt-b","value":"Dbvgdjhvs","crt":"0"},{"id":"opt-c","value":"Dfhjvdbbd","crt":"0"},{"id":"opt-d","value":"Fghdfujfvhhd","crt":"0"}]', '0', '2018-09-02 10:51:27'),
(23, 'Gdhshdhhdhdhfhbf?&nbsp;', 0, '[{"id":"opt-a","value":"Dggdbbvvdhh","crt":"1"},{"id":"opt-b","value":"Dgbjjfhbfbbf","crt":"0"},{"id":"opt-c","value":"Fbvbdbbbfnnf","crt":"0"},{"id":"opt-d","value":"Fgvbfbbfnbfbfbdb","crt":"0"}]', '0', '2018-09-02 10:51:57'),
(24, 'Svvsvdggdhdbbdbdb?&nbsp;', 0, '[{"id":"opt-a","value":"Fhbhvfjjghdhf","crt":"1"},{"id":"opt-b","value":"Dhgfdjhghdh","crt":"0"},{"id":"opt-c","value":"Dnvvvbfhhknsbb","crt":"0"},{"id":"opt-d","value":"Dghhdhhfhdhd","crt":"0"}]', '0', '2018-09-02 10:52:23'),
(25, 'Fbggvhhdbbddjjg?&nbsp;', 0, '[{"id":"opt-a","value":"Rhhhhhfvjjtjhh","crt":"1"},{"id":"opt-b","value":"Rhhhrjggvdb","crt":"0"},{"id":"opt-c","value":"Rhhhrhhr","crt":"0"},{"id":"opt-d","value":"Fjnvvsghfbh","crt":"0"}]', '0', '2018-09-02 10:53:38'),
(26, 'Dgdjhvdhjbfbjd?&nbsp;', 0, '[{"id":"opt-a","value":"Cfjdgjbdbdb","crt":"1"},{"id":"opt-b","value":"Dggjdggrhdhbdbd","crt":"0"},{"id":"opt-c","value":"Rvbjbfnbbnd","crt":"0"},{"id":"opt-d","value":"Cbjfnhhhdjhd","crt":"0"}]', '0', '2018-09-02 10:54:24'),
(27, 'Didngndjhhdjdfrjj?&nbsp;', 0, '[{"id":"opt-a","value":"Hhbdhuehjf","crt":"1"},{"id":"opt-b","value":"Dbhhdjrhbd","crt":"0"},{"id":"opt-c","value":"Fvhjgjrjvdhjdj","crt":"0"},{"id":"opt-d","value":"Ggneghejugehjjdjje","crt":"0"}]', '0', '2018-09-02 10:54:53'),
(28, 'Xfggghhhhhhhhhj?&nbsp;', 0, '[{"id":"opt-a","value":"Gghhhfjj","crt":"1"},{"id":"opt-b","value":"Djgjdggjdjudjjh","crt":"0"},{"id":"opt-c","value":"Dgjshhjfjjh","crt":"0"},{"id":"opt-d","value":"Cliff","crt":"0"}]', '0', '2018-09-02 10:55:41'),
(29, 'FB h hdhghdbbhvhd?&nbsp;', 0, '[{"id":"opt-a","value":"Fhhggdjhdh","crt":"1"},{"id":"opt-b","value":"Gbdhjhfnjgdb","crt":"0"},{"id":"opt-c","value":"Fghkfbufjjgdh","crt":"0"},{"id":"opt-d","value":"Gjjdhhhhdhhhhdhh","crt":"0"}]', '0', '2018-09-02 10:57:16'),
(30, 'Didhdjjsbdbbdhhbdhjd', 0, '[{"id":"opt-a","value":"Gjjbsbghdbjjdn","crt":"1"},{"id":"opt-b","value":"Dhhjrhvghrbb","crt":"0"},{"id":"opt-c","value":"Dbhhdhhf","crt":"0"},{"id":"opt-d","value":"Rglrbbhdjhd","crt":"0"}]', '0', '2018-09-02 10:58:47'),
(31, 'DJs shjjrhhhhdhghs?&nbsp;', 0, '[{"id":"opt-a","value":"Fhnfhhgfnh","crt":"1"},{"id":"opt-b","value":"Fhfhjdghdj","crt":"0"},{"id":"opt-c","value":"Fhfjeggdhgdb","crt":"0"},{"id":"opt-d","value":"Fgjdjgrhjfgdbd","crt":"0"}]', '0', '2018-09-02 10:59:13'),
(32, 'Dbjdffdhbndggsgh?&nbsp;', 0, '[{"id":"opt-a","value":"Dbcvdbhhd","crt":"1"},{"id":"opt-b","value":"Fvjjdvvdhh","crt":"0"},{"id":"opt-c","value":"Fgnhdvbdj","crt":"0"},{"id":"opt-d","value":"Hrjrghjdjfhdh","crt":"0"}]', '0', '2018-09-02 10:59:40'),
(33, 'Did dghdbgvsndjdvbdjd?&nbsp;', 0, '[{"id":"opt-a","value":"Zgbbdgbdjdhhdnd","crt":"1"},{"id":"opt-b","value":"Dbdbbdgdjdj","crt":"0"},{"id":"opt-c","value":"Fbbgcgh","crt":"0"},{"id":"opt-d","value":"Dbndhjjd","crt":"0"}]', '0', '2018-09-02 11:00:06'),
(34, 'Get hushhshdjhdh?&nbsp;', 0, '[{"id":"opt-a","value":"Fhggjdbghd","crt":"1"},{"id":"opt-b","value":"Fgnhchjrbnfh","crt":"0"},{"id":"opt-c","value":"Fgnggdjnhdjdnnd","crt":"0"},{"id":"opt-d","value":"Fgnnnfhnnbvbj","crt":"0"}]', '0', '2018-09-02 11:00:49'),
(35, 'Dog shbdhhjdjbbd', 0, '[{"id":"opt-a","value":"Fjord abbhdnhhd","crt":"1"},{"id":"opt-b","value":"Gbdhhjdnbf","crt":"0"},{"id":"opt-c","value":"Dbnvjdjvbdjdb","crt":"0"},{"id":"opt-d","value":"Rhjjjbdbbdbfnb","crt":"0"}]', '0', '2018-09-02 11:01:22'),
(36, 'DJ Hyushhdjdghdjdm?&nbsp;', 0, '[{"id":"opt-a","value":"Dhkdvhdjdjjdbhd","crt":"1"},{"id":"opt-b","value":"Dgjfhdjgbdb","crt":"0"},{"id":"opt-c","value":"Dfbggjdbvdg","crt":"0"},{"id":"opt-d","value":"Dgnjvbndbs","crt":"0"}]', '0', '2018-09-02 11:01:47'),
(37, 'Dfffghhcsghggfdd?&nbsp;', 0, '[{"id":"opt-a","value":"Ffghgfcvffgv","crt":"1"},{"id":"opt-b","value":"DH jghfjcbb","crt":"0"},{"id":"opt-c","value":"Vbhggghjs","crt":"0"},{"id":"opt-d","value":"Svbjjfbfhdb","crt":"0"}]', '0', '2018-09-02 11:02:48'),
(38, 'Sigh dbhghjdhgdgdhdhh?&nbsp;', 0, '[{"id":"opt-a","value":"SMS","crt":"1"},{"id":"opt-b","value":"smitten","crt":"0"},{"id":"opt-c","value":"Show","crt":"0"},{"id":"opt-d","value":"Spam","crt":"0"}]', '0', '2018-09-02 11:03:26'),
(39, 'Spam wish an oz an odds week?&nbsp;', 0, '[{"id":"opt-a","value":"Dhjdhgdjghd","crt":"1"},{"id":"opt-b","value":"Dfhjdghdjgvf","crt":"0"},{"id":"opt-c","value":"Rvnfjvnnfvnd","crt":"0"},{"id":"opt-d","value":"CNN jdghjjjkkgfd","crt":"0"}]', '0', '2018-09-02 11:04:11'),
(40, 'Disk visual?&nbsp;', 0, '[{"id":"opt-a","value":"Dhdhdhdhdh","crt":"1"},{"id":"opt-b","value":"Dhhdfgdjdhhd","crt":"0"},{"id":"opt-c","value":"Dghhdghdhh","crt":"0"},{"id":"opt-d","value":"Dgbgdbshgshs","crt":"0"}]', '0', '2018-09-02 11:05:01'),
(41, 'Site dbdndhdhndjdj?&nbsp;', 0, '[{"id":"opt-a","value":"Dbndbbdhgbd","crt":"1"},{"id":"opt-b","value":"Dhgjddhbd","crt":"0"},{"id":"opt-c","value":"Dhhdgdhjd","crt":"0"},{"id":"opt-d","value":"Dvhhdjdjbgdjw","crt":"0"}]', '0', '2018-09-02 11:05:25'),
(42, 'Fix dbdbdvdhhdbdbn?&nbsp;', 0, '[{"id":"opt-a","value":"Dhjdgjd","crt":"1"},{"id":"opt-b","value":"Gshhdbdbxndn","crt":"0"},{"id":"opt-c","value":"Dvhsbdjdb","crt":"0"},{"id":"opt-d","value":"Dhndbdbdb","crt":"0"}]', '0', '2018-09-02 11:07:43'),
(43, 'Shhdhdhgdhjdsgbsb?&nbsp;', 0, '[{"id":"opt-a","value":"Zghdhdhhdhhd","crt":"1"},{"id":"opt-b","value":"Dgbbdhhd","crt":"0"},{"id":"opt-c","value":"Dgjhdghdhd","crt":"0"},{"id":"opt-d","value":"Dhjdjgdhdj","crt":"0"}]', '0', '2018-09-02 11:08:08'),
(44, 'CBD snbsgbsbsvbdnd?&nbsp;', 0, '[{"id":"opt-a","value":"Dbndhhdj","crt":"1"},{"id":"opt-b","value":"Fhjhdhjd","crt":"0"},{"id":"opt-c","value":"Fhhdhhfhd","crt":"0"},{"id":"opt-d","value":"Dhbdgbdn","crt":"0"}]', '0', '2018-09-02 11:22:10'),
(45, 'Fsbbsvshdbnd?&nbsp;', 0, '[{"id":"opt-a","value":"Dbbbdhhd","crt":"1"},{"id":"opt-b","value":"Ffndjvvdhd","crt":"0"},{"id":"opt-c","value":"Dghfjghd","crt":"0"},{"id":"opt-d","value":"Dhhdhhjdgdh","crt":"0"}]', '0', '2018-09-02 11:22:34'),
(46, 'Svbdbdvhdjdbdb?&nbsp;', 0, '[{"id":"opt-a","value":"Dhnfnhjdj","crt":"1"},{"id":"opt-b","value":"Dhbxhvvbd","crt":"0"},{"id":"opt-c","value":"Fsvdbvdb","crt":"0"},{"id":"opt-d","value":"Dfhjdh","crt":"0"}]', '0', '2018-09-02 11:23:18'),
(47, 'Gsnjsjghdbdbnfhfb?&nbsp;', 0, '[{"id":"opt-a","value":"Fhkdjhd","crt":"1"},{"id":"opt-b","value":"Dgnvdghd","crt":"0"},{"id":"opt-c","value":"Fhjgdjjdh","crt":"0"},{"id":"opt-d","value":"Dgjrhdjfhrbhdg","crt":"0"}]', '0', '2018-09-02 11:23:45'),
(48, 'Bnsgbdnbndnkdjjdbbsn?&nbsp;', 0, '[{"id":"opt-a","value":"Dhhdgshjsbd","crt":"1"},{"id":"opt-b","value":"Dbbdbdvbdbd","crt":"0"},{"id":"opt-c","value":"Dhnvdjjd","crt":"0"},{"id":"opt-d","value":"Dbndgbdjd","crt":"0"}]', '0', '2018-09-02 11:24:11'),
(49, 'Gsbdfhxhdnnxbd?&nbsp;', 0, '[{"id":"opt-a","value":"Dbndjfdh","crt":"1"},{"id":"opt-b","value":"Dvbndvdghdfxbd","crt":"0"},{"id":"opt-c","value":"Dghbbbbnn","crt":"0"},{"id":"opt-d","value":"Dgndvbdbbd","crt":"0"}]', '0', '2018-09-02 11:26:17'),
(50, 'NNdndndndjjdnd', 1, '[{"id":"opt-a","value":"Option A","crt":"1"},{"id":"opt-b","value":"Option B","crt":"0"},{"id":"opt-c","value":"Option C","crt":"0"},{"id":"opt-d","value":"Option D","crt":"0"}]', '1', '2018-09-02 11:26:50'),
(51, 'Dixit ggdhdhgdjdjdh?&nbsp;', 0, '[{"id":"opt-a","value":"Dhhdhdbbfnfh","crt":"1"},{"id":"opt-b","value":"Dgbndghdnbd","crt":"0"},{"id":"opt-c","value":"Dvndbvjdnd","crt":"0"},{"id":"opt-d","value":"Dhjgdgbdbd","crt":"0"}]', '0', '2018-09-02 11:27:36'),
(52, 'Fbshsvsjkdhjdbbdghj?&nbsp;', 0, '[{"id":"opt-a","value":"Dnndgjdj","crt":"1"},{"id":"opt-b","value":"Dhhndhbjf","crt":"0"},{"id":"opt-c","value":"Rhkghdjdhjd","crt":"0"},{"id":"opt-d","value":"Dhnhgdjbd","crt":"0"}]', '0', '2018-09-02 11:27:58'),
(53, 'Vnndhdjnddbbsgnsmsj?&nbsp;', 0, '[{"id":"opt-a","value":"Dhnfdhj","crt":"1"},{"id":"opt-b","value":"Jkhhfgb","crt":"0"},{"id":"opt-c","value":"Ffhjjbv","crt":"0"},{"id":"opt-d","value":"Fahajkananab","crt":"0"}]', '0', '2018-09-02 11:28:23'),
(54, 'Dvcxghccbbnvghdhdg?&nbsp;', 0, '[{"id":"opt-a","value":"Dhjdhbd","crt":"1"},{"id":"opt-b","value":"Fhndhndj","crt":"0"},{"id":"opt-c","value":"Dghdjgdjjf","crt":"0"},{"id":"opt-d","value":"Dhjbdvndjfb","crt":"0"}]', '0', '2018-09-02 11:29:19'),
(55, 'Fjsnbdjdjfbkf?&nbsp;', 0, '[{"id":"opt-a","value":"Dnjfhdjcdhh","crt":"1"},{"id":"opt-b","value":"Dhbkfghdjhdh","crt":"0"},{"id":"opt-c","value":"Dgjffdhvfdgv","crt":"0"},{"id":"opt-d","value":"Dgjhdhbsvdvhsh","crt":"0"}]', '0', '2018-09-02 11:29:46'),
(56, 'Shush Bbbcbhbsfnn?&nbsp;', 0, '[{"id":"opt-a","value":"Csjhdhkdjhd","crt":"1"},{"id":"opt-b","value":"Svndbhdm","crt":"0"},{"id":"opt-c","value":"Vbchdhchhchf","crt":"0"},{"id":"opt-d","value":"High brb n","crt":"0"}]', '0', '2018-09-02 11:30:21'),
(57, 'She''ll pairs?&nbsp;', 0, '[{"id":"opt-a","value":"Dhndg","crt":"1"},{"id":"opt-b","value":"Spots","crt":"0"},{"id":"opt-c","value":"Shots","crt":"0"},{"id":"opt-d","value":"Smurf","crt":"0"}]', '0', '2018-09-02 11:30:45'),
(58, 'Spek spaniel?&nbsp;', 0, '[{"id":"opt-a","value":"Click","crt":"1"},{"id":"opt-b","value":"Cord","crt":"0"},{"id":"opt-c","value":"Mall","crt":"0"},{"id":"opt-d","value":"Have","crt":"0"}]', '0', '2018-09-02 11:31:28'),
(59, 'Did find vbjchgcsnsvsbsn?&nbsp;', 0, '[{"id":"opt-a","value":"Dots","crt":"1"},{"id":"opt-b","value":"Edith","crt":"0"},{"id":"opt-c","value":"Wish","crt":"0"},{"id":"opt-d","value":"Dogs","crt":"0"}]', '0', '2018-09-02 11:32:02'),
(60, 'So ski trick dbbdbdhdjd?&nbsp;', 0, '[{"id":"opt-a","value":"Dhjdgbdjnd","crt":"1"},{"id":"opt-b","value":"Dbknvdbbd","crt":"0"},{"id":"opt-c","value":"Errors do","crt":"0"},{"id":"opt-d","value":"Dogs do","crt":"0"}]', '0', '2018-09-02 11:33:43'),
(61, 'Dots DG vdbdhdjhd?&nbsp;', 0, '[{"id":"opt-a","value":"Rgksgfsghsgg","crt":"1"},{"id":"opt-b","value":"Fbndhhdhndj","crt":"0"},{"id":"opt-c","value":"Fhdhgshhsjehdgd","crt":"0"},{"id":"opt-d","value":"Rgjrjgjrhrhjr","crt":"0"}]', '0', '2018-09-02 11:34:14'),
(62, 'Shhdhjrurujrhrjgdjnegjejgdh?&nbsp;', 0, '[{"id":"opt-a","value":"Gsjdfhsjd","crt":"1"},{"id":"opt-b","value":"Dhjfgjdhdj","crt":"0"},{"id":"opt-c","value":"Fbdjjsvbd","crt":"0"},{"id":"opt-d","value":"Dbhdjjdgdhjd","crt":"0"}]', '0', '2018-09-02 11:34:47'),
(63, 'Dicky D goal sbnsvsjsn?&nbsp;', 0, '[{"id":"opt-a","value":"Dhhdhgjdkghdndvvdhd","crt":"1"},{"id":"opt-b","value":"Dvbjkfghjfhh","crt":"0"},{"id":"opt-c","value":"Rgkjdbdnndjdjjdjddl","crt":"0"},{"id":"opt-d","value":"Dvdbdjjdndnsbb","crt":"0"}]', '0', '2018-09-02 11:35:32'),
(64, 'Cncbxbbcjcndnbfhdhhfjjfh?&nbsp;', 0, '[{"id":"opt-a","value":"Fhjjhdjfgjjj","crt":"1"},{"id":"opt-b","value":"Rhjgdjhdhvdbdjh","crt":"0"},{"id":"opt-c","value":"Evjndvhbdbb","crt":"0"},{"id":"opt-d","value":"Ghdjgeoggeh","crt":"0"}]', '0', '2018-09-02 11:36:23'),
(65, 'Fleeing dhhdhhdjdjjdhdhd do?&nbsp;', 0, '[{"id":"opt-a","value":"Dhbdhdjdh","crt":"1"},{"id":"opt-b","value":"Dhjdgdkfg","crt":"0"},{"id":"opt-c","value":"God Hdgdhbdb","crt":"0"},{"id":"opt-d","value":"Gsbdfdnndbdbnfn","crt":"0"}]', '0', '2018-09-02 11:36:52'),
(66, 'Sneak bar fvbnfhnvvbehb?&nbsp;', 0, '[{"id":"opt-a","value":"Gnrjxhbdnxhhxhbxbbx","crt":"1"},{"id":"opt-b","value":"Fyjhgdhdhh","crt":"0"},{"id":"opt-c","value":"Dghdhdghhdhd","crt":"0"},{"id":"opt-d","value":"Dfhhdjksgshdj","crt":"0"}]', '0', '2018-09-02 11:37:40'),
(67, 'Svndgsbjdhfhfjfj', 0, '[{"id":"opt-a","value":"Fjjdvbbb","crt":"0"},{"id":"opt-b","value":"Dhcbdvvbfgbd","crt":"1"},{"id":"opt-c","value":"Rjjgdjdjhdhdj","crt":"0"},{"id":"opt-d","value":"Dvndjhjdjbbd","crt":"0"}]', '0', '2018-09-02 11:38:30'),
(68, 'CNN skhshdhhdgskjsvhd?&nbsp;', 0, '[{"id":"opt-a","value":"Dgjdhdjhsgsvn","crt":"1"},{"id":"opt-b","value":"Dfbjgghnvd","crt":"0"},{"id":"opt-c","value":"Dgjjfjdghhs","crt":"0"},{"id":"opt-d","value":"Sjghdhdhhjd","crt":"0"}]', '0', '2018-09-02 11:39:08'),
(69, 'new questionad asdlkasdlkasdj?', 0, '[{"id":"opt-a","value":"Xhhbbbbn","crt":"1"},{"id":"opt-b","value":"Fjd Hindu","crt":"0"},{"id":"opt-c","value":"Does","crt":"0"},{"id":"opt-d","value":"Shoes","crt":"0"}]', '0', '2018-09-02 11:39:42'),
(72, 'newly1 created als djaskdjkajs dljaslkdjalksjd?', 1, '[{"id":"opt-a","value":"Option A","crt":"1"},{"id":"opt-b","value":"Option B","crt":"0"},{"id":"opt-c","value":"Option C","crt":"0"},{"id":"opt-d","value":"Option D","crt":"0"}]', '1', '2018-09-02 20:42:25'),
(73, 'newly2 created als djaskdjkajs dljaslkdjalksjd?', 1, '[{"id":"opt-a","value":"Option A","crt":"1"},{"id":"opt-b","value":"Option B","crt":"0"},{"id":"opt-c","value":"Option C","crt":"0"},{"id":"opt-d","value":"Option D","crt":"0"}]', '1', '2018-09-02 20:48:02'),
(74, 'newly3 created als djaskdjkajs dljaslkdjalksjd?', 1, '[{"id":"opt-a","value":"Option A","crt":"1"},{"id":"opt-b","value":"Option B","crt":"0"},{"id":"opt-c","value":"Option C","crt":"0"},{"id":"opt-d","value":"Option D","crt":"0"}]', '0', '2018-09-02 20:51:56'),
(75, 'newly5 created als djaskdjkajs dljaslkdjalksjd?', 1, '[{"id":"opt-a","value":"Option A","crt":"1"},{"id":"opt-b","value":"Option B","crt":"0"},{"id":"opt-c","value":"Option C","crt":"0"},{"id":"opt-d","value":"Option D","crt":"0"}]', '1', '2018-09-02 20:58:09'),
(76, 'newly6 created als djaskdjkajs dljaslkdjalksjd?', 1, '[{"id":"opt-a","value":"Option A","crt":"1"},{"id":"opt-b","value":"Option B","crt":"0"},{"id":"opt-c","value":"Option C","crt":"0"},{"id":"opt-d","value":"Option D","crt":"0"}]', '1', '2018-09-02 20:59:01'),
(77, 'newly7 created als djaskdjkajs dljaslkdjalksjd?', 1, '[{"id":"opt-a","value":"Option A","crt":"1"},{"id":"opt-b","value":"Option B","crt":"0"},{"id":"opt-c","value":"Option C","crt":"0"},{"id":"opt-d","value":"Option D","crt":"0"}]', '1', '2018-09-02 21:00:31'),
(78, 'newly8 created als djaskdjkajs dljaslkdjalksjd?', 1, '[{"id":"opt-a","value":"Option A","crt":"1"},{"id":"opt-b","value":"Option B","crt":"0"},{"id":"opt-c","value":"Option C","crt":"0"},{"id":"opt-d","value":"Option D","crt":"0"}]', '0', '2018-09-02 21:01:17'),
(79, 'consider the probleeamma sasd asjdhajshdj hakjdh', 0, '[{"id":"opt-a","value":"asdh","crt":"0"},{"id":"opt-b","value":"aslkdjaskldj lkj","crt":"1"},{"id":"opt-c","value":"asd askdh","crt":"0"},{"id":"opt-d","value":"skdj kljasda","crt":"0"}]', '1', '2018-09-23 10:32:39');

-- --------------------------------------------------------

--
-- Table structure for table `result`
--

CREATE TABLE `result` (
  `id` int(11) NOT NULL,
  `assign_id` int(11) NOT NULL,
  `from` datetime NOT NULL,
  `to` datetime NOT NULL,
  `test_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `no_of_q` int(11) NOT NULL,
  `noc` int(11) NOT NULL COMMENT 'num of correct answered',
  `now` int(11) NOT NULL COMMENT 'no of wrong',
  `attempt` int(11) NOT NULL,
  `details` text NOT NULL,
  `started_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `result`
--

INSERT INTO `result` (`id`, `assign_id`, `from`, `to`, `test_id`, `user_id`, `no_of_q`, `noc`, `now`, `attempt`, `details`, `started_at`) VALUES
(3, 8, '2018-09-23 18:30:00', '2018-09-23 18:50:00', 1, 9, 11, 9, 2, 1, '[{"id":"d22980","ans":"opt-b"},{"id":"b56fo0","ans":"opt-b"},{"id":"b6po00","ans":"opt-a"},{"id":"b8d080","ans":"opt-a"},{"id":"cmrfg0","ans":"1"},{"id":"coeno0","ans":"1"},{"id":"cq2000","ans":"0"},{"id":"crl880","ans":"1"},{"id":"ct8gg0","ans":"1"},{"id":"curoo0","ans":"0"},{"id":"d0f100","ans":"1"}]', '2018-09-23 07:55:27'),
(5, 9, '2018-09-26 21:00:00', '2018-09-26 22:00:00', 13, 10, 12, 8, 3, 1, '[{"id":"b8d080","ans":"opt-a"},{"id":"cq2000","ans":"0"},{"id":"ct8gg0","ans":"1"},{"id":"d0f100","ans":"0"},{"id":"curoo0","ans":"1"},{"id":"crl880","ans":"1"},{"id":"coeno0","ans":"1"},{"id":"cmrfg0","ans":"1"},{"id":"b0cn00","ans":"opt-a"},{"id":"b3j7g0","ans":"opt-c"},{"id":"b56fo0","ans":"opt-c"},{"id":"b6po00","ans":"opt-b"}]', '2018-09-26 18:10:20');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(1) NOT NULL,
  `title` varchar(50) NOT NULL,
  `site_name` varchar(50) NOT NULL,
  `load_more_count` int(11) NOT NULL,
  `no_of_negt_quest` int(11) NOT NULL,
  `no_of_attempt` int(11) NOT NULL,
  `stud_approve` enum('0','1') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `title`, `site_name`, `load_more_count`, `no_of_negt_quest`, `no_of_attempt`, `stud_approve`) VALUES
(1, 'Quest', 'Quiz Systemm', 10, 3, 1, '0');

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE `test` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `questions` text NOT NULL,
  `desb` text NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `test`
--

INSERT INTO `test` (`id`, `name`, `questions`, `desb`, `created_at`) VALUES
(1, 'test1', '[{"id":"78","created":"2018-09-19 09:55:45"},{"id":"77","created":"2018-09-19 09:55:46"},{"id":"76","created":"2018-09-19 09:55:46"},{"id":"75","created":"2018-09-19 09:55:47"},{"id":"74","created":"2018-09-19 09:55:47"},{"id":"73","created":"2018-09-19 09:55:49"},{"id":"72","created":"2018-09-23 14:01:50"},{"id":"69","created":"2018-09-23 14:01:52"},{"id":"68","created":"2018-09-23 14:01:53"},{"id":"67","created":"2018-09-23 14:01:54"},{"id":"79","created":"2018-09-23 14:02:39"}]', 'lksj kjasjdadlksj kjasjdadlksj kjasjdadlksj kjasjdadlksj kjasjdadlksj kjasjdadlksj kjasjdadlksj kjasjdadlksj kjasjdadlksj kjasjdadlksj kjasjdadlksj kjasjdadlksj kjasjdadlksj kjasjdadlksj kjasjdadlksj kjasjdadlksj kjasjdadlksj kjasjdadlksj kjasjdadlksj kja', '2018-08-23 18:34:53'),
(2, 'test2', '', 'k hajshhasd kjasdh kashdkjh sakjdh aksjdhkasj hdkjashdkjashdkjsah dkjashdkjashdkjashdkjashd kjashdkjasdhasdj ashdkjahsdjkha ksdhakjsdhjksajdhkjsadhkjas hdkjasdh', '2018-08-26 12:16:39'),
(3, 'new test', '', 'asdj haskjdja hdkjasdjhakjsdhkjashdkjas', '2018-08-26 12:18:29'),
(4, 'new test123 kasjdk ahsdhakjhdkjashkjdh kashkdha', '', 'hi hello welcome', '2018-08-26 12:24:08'),
(5, 'asjdlkajs', '', 'lkjaskjdk askdjlkajs lkdjaslkdjalkjd', '2018-08-26 14:10:41'),
(6, 'aks djlkjasd', '', 'lkj laksjlkdjlaksjd', '2018-08-26 14:10:47'),
(7, 'zxzxzkjshdkhs', '', 'asdhkjashkhas', '2018-08-26 14:10:56'),
(8, 'asdkjh askdhjkash', '', 'jkhkd jhjkxhkjhvkhslkd', '2018-08-26 14:11:04'),
(9, 'skfhkdjshfjkh skjh', '', 'kjhsdkjfhkjsdhfkjh', '2018-08-26 14:11:11'),
(10, 'jhfkjs hjkfhskjdhqkjhdfkjh', '', 'sjkdh fkjsdhfkj', '2018-08-26 14:11:19'),
(11, 'al jdlaj dlkajsdl', '', 'lkjslkdjlkajdlkjaslkd', '2018-08-26 14:11:42'),
(12, 'askj dlkajsdlkj aslkdj', '[{"id":"78","created":"2018-09-09 20:18:44"}]', 'lksjdlkajdlkjasd', '2018-08-26 14:11:47'),
(13, 'test 14', '[{"id":"68","created":"2018-09-02 23:26:17"},{"id":"67","created":"2018-09-02 23:28:25"},{"id":"66","created":"2018-09-02 23:28:50"},{"id":"64","created":"2018-09-02 23:28:52"},{"id":"72","created":"2018-09-03 00:12:26"},{"id":"73","created":"2018-09-03 00:18:02"},{"id":"75","created":"2018-09-03 00:28:10"},{"id":"77","created":"2018-09-03 00:30:31"},{"id":"78","created":"2018-09-03 00:31:17"},{"id":"76","created":"2018-09-03 00:32:21"},{"id":"74","created":"2018-09-03 00:32:23"},{"id":"69","created":"2018-09-03 00:32:23"}]', 'sjak hdjaskhdjkahs dkjhakjsdhkjhdkja shdk', '2018-08-27 12:05:57');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `user_type` int(2) NOT NULL DEFAULT '1' COMMENT '0 = admin, 1 = user',
  `name` varchar(30) NOT NULL,
  `lname` varchar(30) NOT NULL,
  `uname` varchar(50) NOT NULL COMMENT '(roll no)',
  `email` varchar(70) NOT NULL,
  `password` varchar(32) NOT NULL,
  `created_at` datetime NOT NULL,
  `batch_id` int(11) NOT NULL,
  `activated` int(2) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `user_type`, `name`, `lname`, `uname`, `email`, `password`, `created_at`, `batch_id`, `activated`) VALUES
(1, 0, 'karthi', '', 'karthisgk', 'admin@admin.com', 'e10adc3949ba59abbe56e057f20f883e', '2018-08-10 00:00:00', 0, 0),
(5, 1, 'mahesh', 'm', '188066', 'maheshwaren@g.in', 'e10adc3949ba59abbe56e057f20f883e', '2018-08-10 16:07:28', 1, 1),
(6, 1, 'sajdhjas', 'ajskhdjas', '100596', 'karthisgkasd@g.in', '89f0f675e2e4822ba531f97566dbccae', '2018-08-12 04:43:23', 1, 1),
(7, 1, 'karthick', 'jhkjsh', '10005863', 'asjdhkja@g.in', 'e10adc3949ba59abbe56e057f20f883e', '2018-08-17 04:38:08', 2, 0),
(8, 1, 'student1', 'asd', '10656985', 'stud1@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '2018-08-18 07:01:55', 2, 0),
(9, 1, 'student2', 'sajdalk', '100597', 'askdjaksdk@g.in', '89f0f675e2e4822ba531f97566dbccae', '2018-08-18 13:01:50', 2, 1),
(10, 1, 'Dhdjdj', 'Sjdjd', '100569', 'dkdjdjjd@hotmail.com', 'e10adc3949ba59abbe56e057f20f883e', '2018-09-02 11:42:29', 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assign`
--
ALTER TABLE `assign`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `batch`
--
ALTER TABLE `batch`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `result`
--
ALTER TABLE `result`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assign`
--
ALTER TABLE `assign`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `batch`
--
ALTER TABLE `batch`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;
--
-- AUTO_INCREMENT for table `result`
--
ALTER TABLE `result`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `test`
--
ALTER TABLE `test`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
