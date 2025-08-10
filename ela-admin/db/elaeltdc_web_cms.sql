-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 20, 2025 at 11:40 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `elaeltdc_web_cms`
--

-- --------------------------------------------------------

--
-- Table structure for table `about_section`
--

CREATE TABLE `about_section` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `about_title` varchar(500) NOT NULL,
  `about_subtitle` varchar(3000) NOT NULL,
  `details_02` text DEFAULT NULL,
  `userPic` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `about_section`
--

INSERT INTO `about_section` (`id`, `user_id`, `about_title`, `about_subtitle`, `details_02`, `userPic`) VALUES
(17, 140, 'E-Learning and Earning Ltd. has been the foremost information technology service provider since 2013. ', '<p>The training programs of e-Learning and Earning Ltd. a wide range of skills that are integral and necessary parts of everyday business. In our quest to address every organizational development need, we offer a gamut of training programs, which ranges from Executive Coaching and Leadership Training to basic Communication Skills.&nbsp;</p>', '<p>At Moral Learning Institute, we believe in creating an inclusive and supportive learning environment for all our students. We foster a sense of community among our students, faculty, and staff, creating a vibrant and engaging learning atmosphere.In addition to language courses, we offer cultural immersion programs, where students can learn about the rich cultural heritage of the countries whose languages they are learning. Our cultural programs include language exchange events, cultural festivals, and study abroad opportunities.</p>\r\n<blockquote>\r\n<p>&nbsp;</p>\r\n</blockquote>\r\n<p>Our institute is committed to continuous improvement. We regularly update our curriculum, teaching methodologies, and student support services to ensure that we stay at the forefront of language education.As a testament to our dedication to excellence, we have received numerous awards and accolades for our language training programs. Our students consistently achieve outstanding results in language proficiency exams, which is a testament to the quality of education we provide.</p>\r\n<p>&nbsp;</p>', 'e-learning-and-earning-ltd-121805-about-us.png');

-- --------------------------------------------------------

--
-- Table structure for table `activitylog`
--

CREATE TABLE `activitylog` (
  `activitylog` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `action` varchar(100) NOT NULL,
  `activity_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `activitylog`
--

INSERT INTO `activitylog` (`activitylog`, `userid`, `action`, `activity_date`) VALUES
(618, 22, 'Delete Stuff - Name: Regan', '2019-09-29 09:41:44'),
(619, 22, 'Delete Stuff - Name: ', '2019-09-29 09:41:58'),
(620, 22, 'Delete Stuff - Name: à¦œà§à§Ÿà§‡à¦²', '2020-02-03 14:56:31'),
(621, 22, 'Delete Stuff - Name: à¦®à§‹à¦ƒ à¦à¦¨à¦¾à¦®à§à¦² à¦¹à¦•', '2020-02-03 14:56:35'),
(622, 22, 'Delete Stuff - Name: Jakiul Hasan Ruel', '2020-02-03 14:56:38'),
(623, 22, 'Delete Stuff - Name: Jikrul Hasan Jewel', '2020-02-03 14:56:41'),
(624, 22, 'Delete Stuff - Name: Megh', '2020-02-03 14:56:45'),
(625, 22, 'Update account', '2020-07-18 21:53:28'),
(626, 22, 'Update account', '2020-07-18 21:53:53'),
(627, 130, 'Add New Client - Name: Kalam', '2022-02-06 20:48:46'),
(628, 22, 'Add New Client - Name: Kalam', '2022-02-06 21:10:10'),
(629, 22, 'Add New Client - Name: Kalam', '2022-02-06 21:21:11'),
(630, 22, 'Add New Client - Name: Kalam', '2022-02-06 21:21:48'),
(631, 22, 'Add New Client - Name: Kalam', '2022-02-06 13:23:16'),
(632, 22, 'Add New Client - Name: Kalam', '2022-02-06 13:54:58'),
(633, 22, 'Add New Client - Name: Tausif', '2022-03-18 06:00:10'),
(634, 22, 'Add New Client - Name: Tausif', '2022-03-20 02:28:47'),
(635, 22, 'Add New Client - Name: Tausif', '2022-03-23 10:17:59'),
(636, 22, 'Add New Client - Name: Tausif', '2022-03-23 10:18:43'),
(637, 22, 'Add New Client - Name: Abul Azad', '2022-03-23 10:25:02'),
(638, 22, 'Add New Client - Name: Tausif', '2022-03-23 10:35:19'),
(639, 22, 'Add New Client - Name: Abul Azad', '2022-03-23 10:35:27'),
(640, 22, 'Add New Client - Name: S.M Imran Islam', '2022-04-06 12:27:57'),
(641, 22, 'Add New Client - Name: S.M Imran Islam', '2022-04-06 12:29:00'),
(642, 22, 'Add New Client - Name: Imran Islam', '2023-04-14 20:12:11'),
(643, 22, 'Add New Client - Name: Tausif', '2023-04-14 20:14:28'),
(644, 22, 'Add New Client - Name: Tausif', '2023-08-31 21:34:40'),
(645, 22, 'Add New Client - Name: Digital Training Center', '2024-01-31 17:33:44'),
(646, 22, 'Add New Client - Name: Samiul Vai - Prince Alam', '2024-03-21 11:36:45'),
(647, 22, 'Add New Client - Name: Accounts', '2024-03-25 13:47:23'),
(648, 22, 'Add New Client - Name: Admin', '2024-03-25 13:49:04'),
(649, 22, 'Add New Client - Name: Digital Training Center', '2024-03-31 11:01:10'),
(650, 22, 'Add New Client - Name: Digital Training Center', '2024-06-09 15:57:24'),
(651, 22, 'Add New Client - Name: Digital Training', '2025-01-01 16:28:57'),
(652, 22, 'Add New Client - Name: E-Learning and Earning Ltd', '2025-02-05 11:25:04');

-- --------------------------------------------------------

--
-- Table structure for table `apply`
--

CREATE TABLE `apply` (
  `student_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `student_no` int(11) NOT NULL,
  `batch_no` varchar(250) NOT NULL,
  `course_name` varchar(200) NOT NULL,
  `student_name` varchar(250) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `bld_grp` varchar(50) NOT NULL,
  `father_name` varchar(250) NOT NULL,
  `mother_name` varchar(250) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `apply`
--

INSERT INTO `apply` (`student_id`, `user_id`, `student_no`, `batch_no`, `course_name`, `student_name`, `gender`, `bld_grp`, `father_name`, `mother_name`) VALUES
(101, 130, 2, 'Md.Samiul Alom', '', 'Managing Director', 'Male', '', 'Tinmatha', '01751458998'),
(103, 130, 3, 'New Customer', '', '', 'Male', '', 'Bogura', '01751456623'),
(104, 130, 4, 'Zobayer2', '', '', 'Male', '', 'Meghai', '01611-717527'),
(105, 135, 5, 'Kiron Alom', '', '', 'Male', '', 'Dhaka', '01751894256'),
(106, 136, 6, 'Talha Khan', '', '', 'Male', '', 'Dhaka', '054654'),
(107, 135, 7, 'Rubel Hossain', '', '', 'Male', '', 'Dhaka', '00154545'),
(108, 135, 8, 'Bappi Hasan', '', 'Marketing Officer1', 'Male', '', 'Mirpur-12, Dhaka', '017589'),
(109, 137, 9, 'Jhon doe', '', 'Managing director', 'Male', '', 'New York City, USA', '846446456'),
(110, 137, 10, 'Samiul Alom', '', 'CEO', 'Male', '', 'Bogura', '01751891037'),
(111, 140, 1, 'Sidgao', '1', 'Interney Marketing', '', '', 'USA', '3232323232'),
(112, 137, 11, 'Kalam', '', 'Business', 'Male', '', 'Bizrul', '01751-895247'),
(113, 140, 2, 'Batch-25', 'Office Application', 'Md.Salam Ali', 'Male', '', 'Md.Abbas', 'Mrs.Salma'),
(114, 140, 3, 'Batch-25', '1', 'Md.Jamal Sheakh1', '', '', 'Jalal Sheakh1', 'Jomila Sheakh1'),
(115, 137, 0, 'Batch-25', '1', 'Salam', '', '', 'father', 'mother'),
(116, 140, 4, 'Batch-25', '1', 'a', 'Male', '', 'as', 'as'),
(117, 140, 5, '7', '25', 'DD', 'Other', 'O+', 'sf', 'sf'),
(118, 22, 12, '1', '25', 'DD', 'Female', 'A+', 'safa', 'asf');

-- --------------------------------------------------------

--
-- Table structure for table `bank_money`
--

CREATE TABLE `bank_money` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `bank_id` int(11) NOT NULL,
  `account_no` varchar(300) NOT NULL,
  `previous_amt` varchar(200) NOT NULL,
  `today_amt` varchar(200) NOT NULL,
  `recent_amt` varchar(200) NOT NULL,
  `refer` varchar(200) NOT NULL,
  `cuses` varchar(200) NOT NULL,
  `entry_date` date NOT NULL,
  `last_update` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bank_money`
--

INSERT INTO `bank_money` (`id`, `user_id`, `bank_id`, `account_no`, `previous_amt`, `today_amt`, `recent_amt`, `refer`, `cuses`, `entry_date`, `last_update`) VALUES
(1, 130, 1, '121245', '25000', '3000', '28000', 'Own', 'Deposit', '2023-06-11', '2023-06-11'),
(2, 130, 2, '8523', '10500', '500', '10000', 'Own', 'Withdraw', '2023-06-11', '2023-06-11');

-- --------------------------------------------------------

--
-- Table structure for table `bank_money_history`
--

CREATE TABLE `bank_money_history` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `bank_id` int(11) NOT NULL,
  `account_no` varchar(300) NOT NULL,
  `previous_amt` varchar(200) NOT NULL,
  `money_in` varchar(200) NOT NULL,
  `money_out` varchar(500) NOT NULL,
  `recent_amt` varchar(200) NOT NULL,
  `refer` varchar(200) NOT NULL,
  `cuses` varchar(300) NOT NULL,
  `type` int(11) NOT NULL,
  `entry_date` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bank_money_history`
--

INSERT INTO `bank_money_history` (`id`, `user_id`, `bank_id`, `account_no`, `previous_amt`, `money_in`, `money_out`, `recent_amt`, `refer`, `cuses`, `type`, `entry_date`) VALUES
(1, 140, 1, '121245', '30000', '5000', '0', '35000', 'None', '???', 3, '2023-06-11'),
(2, 140, 1, '121245', '35000', '0', '10000', '25000', '???', '??????? ', 4, '2023-06-11'),
(3, 140, 2, '8523', '10000', '500', '0', '10500', 'None', '???', 3, '2023-06-11'),
(4, 140, 1, '121245', '25000', '3000', '0', '28000', 'Own', 'Deposit', 3, '2023-06-11'),
(5, 140, 2, '8523', '10500', '0', '500', '10000', 'Own', 'Withdraw', 4, '2023-06-11'),
(6, 140, 3, '458', '30000', '10000', '0', '40000', 'Own', 'Deposit', 3, '2023-06-15');

-- --------------------------------------------------------

--
-- Table structure for table `bank_name`
--

CREATE TABLE `bank_name` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bank_name`
--

INSERT INTO `bank_name` (`id`, `user_id`, `name`) VALUES
(1, 140, 'DBBL Agent'),
(2, 140, 'DBBL Agent'),
(3, 140, 'EBL Bank '),
(5, 140, 'SIBL');

-- --------------------------------------------------------

--
-- Table structure for table `batch`
--

CREATE TABLE `batch` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `batch_name` varchar(300) NOT NULL,
  `batch_no` varchar(100) NOT NULL,
  `trainer` varchar(350) NOT NULL,
  `entry_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `batch`
--

INSERT INTO `batch` (`id`, `user_id`, `batch_name`, `batch_no`, `trainer`, `entry_date`) VALUES
(1, 130, 'Domain ', '1000', 'Anik', '2022-01-28'),
(2, 135, 'Nasta', '200', 'rr', '2022-01-30'),
(3, 130, 'nasta', '50', 'dd', '2022-01-30'),
(4, 136, 'Nasta', '50', 'dd', '2022-01-31'),
(5, 137, 'Dinner ', '230', 'Bbn', '2022-02-13'),
(10, 140, 'Batch -02', 'Batch -02', 'Kalam', '2023-04-16'),
(11, 140, 'Batch -01', 'Batch -01', 'Salam', '2023-04-16');

-- --------------------------------------------------------

--
-- Table structure for table `bld_grp`
--

CREATE TABLE `bld_grp` (
  `bld_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `bld_name` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bld_grp`
--

INSERT INTO `bld_grp` (`bld_id`, `user_id`, `bld_name`) VALUES
(2, 140, 'Bogura'),
(3, 140, 'Rajshahi'),
(4, 140, 'Bsc'),
(5, 140, 'O-'),
(6, 140, 'A-'),
(7, 140, 'O+');

-- --------------------------------------------------------

--
-- Table structure for table `blog_category`
--

CREATE TABLE `blog_category` (
  `cat_id` int(25) NOT NULL,
  `user_id` int(25) NOT NULL,
  `cat_name` varchar(25) NOT NULL,
  `status` text NOT NULL DEFAULT '1',
  `slug` varchar(25) NOT NULL,
  `cat_photo` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blog_category`
--

INSERT INTO `blog_category` (`cat_id`, `user_id`, `cat_name`, `status`, `slug`, `cat_photo`) VALUES
(3, 140, 'Dillon Mann', '1', 'dillon-mann', '841432.jpg'),
(5, 140, 'Trevor Gray', '1', 'trevor-gray', '546665.jpg'),
(6, 140, 'Kuame Larson', '1', 'kuame-larson', '929088.jpg'),
(8, 140, '3D Design & Animation', '1', '3d-design-animation', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `blog_section`
--

CREATE TABLE `blog_section` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `category_id` int(25) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `details` text DEFAULT NULL,
  `userPic` varchar(255) DEFAULT NULL,
  `canonical_link` varchar(255) DEFAULT NULL,
  `keyword` mediumtext DEFAULT NULL,
  `description` mediumtext DEFAULT NULL,
  `author` varchar(255) DEFAULT NULL,
  `date` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blog_section`
--

INSERT INTO `blog_section` (`id`, `user_id`, `category_id`, `title`, `slug`, `details`, `userPic`, `canonical_link`, `keyword`, `description`, `author`, `date`) VALUES
(1, 140, 3, 'A Complete Guideline for making a Youtube video', 'a-complete-guideline-for-making-a-youtube-video', '<blockquote>\r\n<p><strong>&nbsp;</strong><strong>Are you interested in creating &amp; editing videos and building a career on YouTube? </strong><span style=\"font-weight: 400;\">If you are, then there are several steps to creating a successful YouTube video with the necessary skills. Here is a complete guide that will help you create a good YT video that makes you a professional one.</span></p>\r\n</blockquote>\r\n<h3><strong>Step 1: Start Learning</strong></h3>\r\n<blockquote>\r\n<p><span style=\"font-weight: 400;\">If you&rsquo;re new to YouTube and don&rsquo;t know where to start, a YouTube Video Making Course can help you get started. You&rsquo;ll learn about YouTube and how to start your own channel from the pros. Moreover, you can gather knowledge about creating videos for entertainment or education, starting a vlog, or building a brand around your channel.</span></p>\r\n<p><span style=\"font-weight: 400;\">However, if you want to learn more than creating and editing, you might consider taking a more specific course that covers topics like video editing, YouTube marketing, etc. Various online and offline youtube video-making courses can help you learn from the basics. Eventually, you will do better as a video creator or a </span><a href=\"https://www.creativeitinstitute.com/courses/video-editing\"><span style=\"font-weight: 400;\">professional video editor</span></a><span style=\"font-weight: 400;\"> on this platform.</span></p>\r\n</blockquote>\r\n<h3><strong>Step 2: Find Out What Works on YouTube</strong></h3>\r\n<blockquote>\r\n<p><span style=\"font-weight: 400;\">Studying the platform is an essential requirement to be succeeded as a YouTuber. You need to understand how the YouTube algorithm works, what types of videos become popular, and how such videos are performing. Make sure you read and follow the guidelines properly.&nbsp;</span></p>\r\n<p><span style=\"font-weight: 400;\">Once you are done with your research, it&rsquo;s time to start planning unique and fresh video content for your target audience.</span></p>\r\n</blockquote>\r\n<h3><strong>Step 3: Plan Your YouTube Video Strategy</strong></h3>\r\n<blockquote>\r\n<p><span style=\"font-weight: 400;\">If you want to create a professional YouTube video, there are a few things you need to do. First, you need to come up with an idea for your video. Think about what you want to share with your audience and what will be interesting or not for them to see. It can be anything &ndash; make sure it&rsquo;s something you&rsquo;re passionate about.</span></p>\r\n<p>&nbsp;</p>\r\n<p><span style=\"font-weight: 400;\">When you have an idea, it&rsquo;s time to start making a structure for it. Viewers will find your videos more interesting than others if your videos are about unique and creative topics or any social messages. So, think outside the box for ideas and topics and write a script or storyboard to stay on track.</span></p>\r\n</blockquote>', 'e-learning-and-earning-ltd-80373-blog-img-02.jpg', 'na', 'Youtube video', 'A Complete Guideline for making a Youtube video', 's', '2024-02-08 11:00:00'),
(4, 140, 3, '5 Effective Digital Marketing Channels You Must Know', '5-effective-digital-marketing-channels-you-must-know', '<blockquote>\r\n<p><span style=\"font-weight: 400;\">With the constant evolution of digital marketing, keeping a constant marketing strategy is a challenge. So when marketing your brand or service you should not have a specific choice of platform you are thinking of focusing on. You should use all of those online marketing channels that work for you. Moreover, linking digital marketing channels for a complete digital footprint can produce better results for you.</span></p>\r\n<p><span style=\"font-weight: 400;\"> </span><span style=\"font-weight: 400;\">To know more about the world of digital marketing channels, keep reading this blog. Here we have discussed the important factors to consider when making your choice. By the end of this article, you&rsquo;ll have a clear concept of how to select and leverage the most effective digital marketing channels for your business.</span></p>\r\n<p>&nbsp;</p>\r\n<p><span style=\"font-weight: 400;\">These marketing platforms allow businesses to reach and engage with a large audience, build brand awareness, and drive website traffic. Still, the challenge lies in selecting the ones that align with your business goals and resonate with your audience.</span></p>\r\n<p>&nbsp;</p>\r\n<h2><strong>5 Types of Effective Digital Marketing Channels</strong></h2>\r\n<p><span style=\"font-weight: 400;\">Here are the top 5 digital marketing channels that are mostly used because of their effectiveness. However, it is essential to remember that the effectiveness of each channel may vary depending on your specific business goals, target audience, and industry. There are several courses available for mastering digital marketing. </span><a href=\"https://www.creativeitinstitute.com/\"><span style=\"font-weight: 400;\">Best IT Training Centers </span></a><span style=\"font-weight: 400;\">offer comprehensive courses for skills but learn the basics first. Let&rsquo;s take a closer look at some of the most powerful digital marketing channels.</span></p>\r\n<p>&nbsp;</p>\r\n<ul>\r\n<li aria-level=\"1\">\r\n<h3><strong>Social Media Marketing</strong></h3>\r\n</li>\r\n</ul>\r\n<p><span style=\"font-weight: 400;\">Social media platforms such as Facebook, Instagram, Twitter, LinkedIn, and Pinterest offer extensive opportunities for businesses to connect with their target audience. With your effective social media marketing you can create engaging content, build a strong online presence, run paid advertising campaigns, and foster genuine interactions with your audience.</span></p>\r\n<p>&nbsp;</p>\r\n<ul>\r\n<li aria-level=\"1\">\r\n<h3><strong>Search Engine Optimization (SEO)</strong><span style=\"font-weight: 400;\">&nbsp;</span></h3>\r\n</li>\r\n</ul>\r\n<p><span style=\"font-weight: 400;\">SEO (Search Engine Optimization)&nbsp; is the process of </span><a href=\"https://www.blog.creativeitinstitute.com/the-importance-of-seo-for-small-businesses/\"><span style=\"font-weight: 400;\">optimizing your website to rank higher</span></a><span style=\"font-weight: 400;\"> on search engine results pages (SERPs) like Google, Bing, and Yahoo. SEO, or, uses different methods to make your website show up higher on Google and other search engines. Some of these methods include finding the right keywords, optimizing your web pages, fixing technical issues, and getting other websites to link to yours.&nbsp;</span><span style=\"font-weight: 400;\">SEO results in organic traffic. It&rsquo;s valuable for any business website because it&rsquo;s more specific to what you offer, and it doesn&rsquo;t cost as much as other advertising methods.</span></p>\r\n<p>&nbsp;</p>\r\n<ul>\r\n<li aria-level=\"1\">\r\n<h3><strong>Email Marketing</strong></h3>\r\n</li>\r\n</ul>\r\n<p><span style=\"font-weight: 400;\">Email remains a powerful tool for building relationships and driving conversions. This marketing channel allows you to send newsletters, promotions, and product updates directly to subscribers&rsquo; inboxes. Automation tools enable you to segment your list and send relevant content, increasing engagement and conversion rates. </span><a href=\"https://blog.hubspot.com/marketing/email-marketing-stats#:~:text=64%25%20of%20small%20businesses%20use%20email%20marketing%20to%20reach%20customers\"><span style=\"font-weight: 400;\">According to a survey, 64% of small businesses are using email marketing to reach clients</span></a><span style=\"font-weight: 400;\">. Maintaining a schedule for your personalized email can deliver impressive results.</span></p>\r\n<p>&nbsp;</p>\r\n<ul>\r\n<li aria-level=\"1\">\r\n<h3><strong>Content Marketing</strong></h3>\r\n</li>\r\n</ul>\r\n<p><span style=\"font-weight: 400;\">Creating valuable, informative, and engaging content can position your brand as an authority in your industry. Along with developing brand awareness, you can attract a clearly defined audience. This content can include blog posts, articles, videos, infographics, and more. Well-executed content marketing can establish your brand as an authority in your industry and drive organic traffic to your website.</span></p>\r\n<p>&nbsp;</p>\r\n<ul>\r\n<li aria-level=\"1\">\r\n<h3><strong>Pay-Per-Click Advertising (PPC)</strong></h3>\r\n</li>\r\n</ul>\r\n<p><span style=\"font-weight: 400;\">PPC advertising, often associated with platforms like Google Ads and Microsoft Advertising, allows you to bid on keywords and display ads. Paid advertising can provide immediate visibility. Google Ads and social media advertising allow for precise targeting and measurable results. You pay only when someone clicks on your ad. PPC campaigns can be highly effective for driving immediate traffic and conversions, making them an essential part of many digital marketing strategies.</span></p>\r\n<p>&nbsp;</p>\r\n<p><span style=\"font-weight: 400;\">Apart from this influencer marketing, affiliate marketing, podcast marketing, and video marketing also play an important role in digital marketing channels. Link the channels you are using to maximize ROI.</span></p>\r\n</blockquote>', 'e-learning-and-earning-ltd-333875-blog-img-02.jpg', 'Digital ', '5 Effective Digital Marketing Channels You Must Know', '5 Effective Digital Marketing Channels You Must Know', 'Digital ', '2024-02-08 11:00:00'),
(13, 140, 6, 'Career Growth for an Image Editing Professional', 'career-growth-for-an-image-editing-professional', '<blockquote>\r\n<p>good graphic designer will be a good photo editor. This is because graphic design is visual art so is photo editing to convey a message or produce something informative. If you know<a href=\"https://www.blog.creativeitinstitute.com/digital-image-editing/\"> the top 9 secrets of digital image editing</a>, you can be a good image editor.&nbsp;&nbsp; But yes, there are differences between these two roles which are described below.</p>\r\n<p>&nbsp;</p>\r\n<p>Photo editing is the process of altering an image. Such as cropping, removing the background, changing the contrast, saturation, exposure, and so on.</p>\r\n<p>&nbsp;</p>\r\n<p><strong><a href=\"https://www.blog.creativeitinstitute.com/is-graphic-design-a-good-career-guideline-2022/\">Graphic design</a></strong> is a vector illustration in which the drawings are created digitally. Photo editing is the process of improving a photograph by using photo editing software&rsquo;s features and composition.</p>\r\n<p>&nbsp;</p>\r\n<p>Graphics design is primarily concerned with the creation and development of unique graphics for use in the digital environment. Image editing is used to remove undesired features. Such as dust specks and scratches, adjusting the geometry of the image.&nbsp; It also includes rotating and cropping, sharpening or softening the image, making color changes, and adding special effects. Just like image editing courses online, you will have many graphic design tutorial videos. These resources are very helpful.</p>\r\n<p>&nbsp;</p>\r\n<p><strong>Now if you blend these two, you will have the skills and knowledge to make something more dynamic.</strong></p>\r\n<p>&nbsp;</p>\r\n<h2>The checklist you need to be a professional image editor</h2>\r\n<p>&nbsp;</p>\r\n<p><strong>For being a successful image editor make sure you have fulfilled this checklist.</strong></p>\r\n</blockquote>\r\n<ul>\r\n<li>\r\n<blockquote>Leadership abilities: Managing a large crew of photographers is a bonus.</blockquote>\r\n</li>\r\n<li>\r\n<blockquote>Experience negotiating contracts and assigning projects to a respected and trustworthy group of freelance photographers.</blockquote>\r\n</li>\r\n<li>\r\n<blockquote>Strong technical abilities and familiarity with editing software. Get fluent in Photoshop, InDesign, Bridge, Lightroom, and other similar programs.</blockquote>\r\n</li>\r\n<li>\r\n<blockquote>Working with creative, digital marketing, and social media teams to produce, edit, and disseminate big volumes of photography for a number of functions is a skill.</blockquote>\r\n</li>\r\n<li>\r\n<blockquote>Working in a fast-paced atmosphere with deadlines and where project requirements might change quickly</blockquote>\r\n</li>\r\n<li>\r\n<blockquote>Be a strong decision-maker with editing skills and a grasp of how an image communicates the story of our organization.</blockquote>\r\n</li>\r\n<li>\r\n<blockquote>Previous experience as a photo editor in an agency or for a corporation is a bonus.</blockquote>\r\n</li>\r\n</ul>', 'e-learning-and-earning-ltd-996843-blog-img-02.jpg', 'Natus obcaecati ipsu update', 'Career Growth for an Image Editing Professional', 'Career Growth for an Image Editing Professional', 'Sunt voluptas reici update', '2024-02-15 11:00:00'),
(14, 140, 3, 'Content Marketing Career Opportunities', 'content-marketing-career-opportunities', '<blockquote>\r\n<p>As a content marketer, you have already known that the work you do is valuable. So it should be no surprise that demand for your skills is only going to grow in the upcoming years.</p>\r\n<p>&nbsp;</p>\r\n<h3>1.&nbsp;&nbsp;&nbsp;&nbsp; Content producers</h3>\r\n<p>Content producers are responsible for creating content. These contents are then used to create a marketing strategy.</p>\r\n<p>If you know content marketing, then you can also work as a content producer.</p>\r\n<p>&nbsp;</p>\r\n<p>As a content producer, you have to work with the content marketing team. Also, you have to work on their strategies in the process.</p>\r\n<p>In short, you have to track the analytics of in-house content marketing team&rsquo;s performance.</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<h3>2.&nbsp;&nbsp;&nbsp;&nbsp; Content editors</h3>\r\n<p>As a content editor, you&rsquo;re responsible for editing content.</p>\r\n<p>&nbsp;</p>\r\n<p>You&rsquo;ll also be checking the quality of that content and making sure that it&rsquo;s engaging. Content editors are also responsible for making sure that their content meets the standards of their brand. They ensure all relevant keywords are properly placed within articles.</p>\r\n<p>&nbsp;</p>\r\n<p>Lastly, work for SEO friendly content. So that it can be found by search engines when someone searches for something related to what the company sells or does.</p>\r\n<p>&nbsp;</p>\r\n<h3>3.&nbsp;&nbsp;&nbsp;&nbsp; Content marketer</h3>\r\n<p>The goal of content marketing is to acquire and retain customers through the publishing and promotion of content. An effective content marketer creates and distributes engaging and relevant content.</p>\r\n<p>&nbsp;</p>\r\n<p>The job of a content marketer includes managing social media, writing blog posts and case studies, planning events or webinars, developing videos, recording podcasts, etc.</p>\r\n</blockquote>', 'e-learning-and-earning-ltd-390606-blog-img-02.jpg', 'Odit rerum necessita', 'Content Marketing Career Opportunities', 'Content Marketing Career Opportunities', 'Magnam mollitia moll', NULL),
(15, 140, 6, 'How to Start Freelancing Career', 'how-to-start-freelancing-career', '<blockquote>\r\n<p>Starting a career in freelancing is tough and challenging. Yet, it can be easy with some effective tips and tricks. Here is a 4-step guide to set up a successful career in freelancing that you can follow-</p>\r\n<p>&nbsp;</p>\r\n<h3>Step 1- Prerequisites of Freelancing</h3>\r\n<p>Thinking about starting your career in freelancing? Check out the prerequisites before starting to outsource freelancing.</p>\r\n<p>&nbsp;</p>\r\n<h4>●&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Adequate knowledge</h4>\r\n<p>Knowledge is fundamental for any career. Thus, it is also important for freelance as well. You can choose one or more to serve from a wide variety of freelancing services. However, it is quite impossible to get established without adequate knowledge. To overcome this, you can do freelance training in your own language. For instance- do freelancing classes in any <strong><a href=\"https://www.creativeitinstitute.com/\">freelance learning course in Bangla.</a></strong></p>\r\n<p>&nbsp;</p>\r\n<h4>●&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Necessary device/appliance</h4>\r\n<p>Most freelancing works need a device or specific appliance. These works are online-based. For this reason, it needs specific devices.</p>\r\n<p>&nbsp;</p>\r\n<p>To illustrate, if you are freelance as a UI/UX designer, you will need a highly configured desktop or laptop. The UI/UX design minimum requires a quad-core processor, intel i5, or higher. Otherwise, it will need at least 8-16 GB RAM for smooth operating.</p>\r\n<p>&nbsp;</p>\r\n<h4>●&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Growing mindset</h4>\r\n<p>Freelancing workers need skills in research and creative activities. In fact, you can research the work prototypes in freelancing marketplaces like Fiverr, Upwork, and other platforms. During these activities, you must have a growth mindset. Because a growth mindset can shape our thinking capabilities and assist us to be more creative. However, it ensures intellect and talent through continuous development as well.</p>\r\n<p>&nbsp;</p>\r\n<h4>●&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; The tendency of accepting failure</h4>\r\n<p>Hardships are common in every profession. Similarly, a freelancing business is not beyond it. Whereas, a successful career in freelancing is quite different from any other career. For this reason, people go through a lot of struggles in this career. From learning to earning, hardships are in every step of working as a freelancer.</p>\r\n</blockquote>', 'e-learning-and-earning-ltd-30231-blog-img-02.jpg', 'Modi vel non at dist', 'How to Start Freelancing Career', 'How to Start Freelancing Career', 'Consequatur earum f', NULL),
(16, 140, 3, 'How to Become an SEO Expert', 'how-to-become-an-seo-expert', '<blockquote>\r\n<p>Yes, it is. SEO is a great career opportunity for individuals who enjoy working with computers. SEO experts use numerous strategies. For optimizing and increasing the number of visitors to a website. It also includes keyword research, backlinking, optimizing, etc.</p>\r\n<p>&nbsp;</p>\r\n<h3><strong>1.&nbsp;&nbsp;&nbsp; </strong><strong>Gather knowledge of Information Technology</strong></h3>\r\n<p>There are many different paths to becoming an SEO expert. One of the best ways is to study information technology, or IT. After earning your degree in IT, there will be several different opportunities for you to work as an SEO specialist. It can be on a freelance basis or full-time. Numerous companies are hiring these professionals.</p>\r\n<p>&nbsp;</p>\r\n<h3><strong>2.&nbsp;&nbsp;&nbsp; </strong><strong>Take SEO-related courses</strong></h3>\r\n<p>Another great way to learn how to become an SEO expert is by taking online <a href=\"https://www.creativeitinstitute.com/courses/search-engine-optimization\">SEO-related courses</a>. Online courses often cost less than traditional college classes. Yet they offer the same type of experience and education. Along with the flexibility of being able to study from home and at your own pace. If you are not comfortable with online classes, you can enroll in offline classes. There are reputed institutions that are providing various courses in this field.</p>\r\n<p>&nbsp;</p>\r\n<h3><strong>3.&nbsp;&nbsp;&nbsp; </strong><strong>Acquire the skills required</strong></h3>\r\n<p><strong>&nbsp;</strong>There are many different skill sets needed to become a successful SEO professional. Most companies prefer candidates who have expertise in link building, keyword research, and analysis of web traffic patterns.</p>\r\n<p>&nbsp;</p>\r\n<p>Additionally, these professionals need to have <strong><a href=\"https://www.blog.creativeitinstitute.com/content-marketing-career-opportunities-in-2022/\">strong writing</a></strong> and communication skills. This shows the ability to articulate complex concepts.</p>\r\n<p>&nbsp;</p>\r\n<p>Also, general skills are always valuable. Such as adaptability with new tools, creativity, analytical thinking, problem-solving abilities, and business knowledge.</p>\r\n<p>&nbsp;</p>\r\n</blockquote>', 'e-learning-and-earning-ltd-514632-blog-img-02.jpg', 'Dolorem optio quos ', 'How to Become an SEO Expert', 'How to Become an SEO Expert', 'Sunt delectus et s', NULL),
(23, 140, 3, 'Blanditiis ut porro ', 'blanditiis-ut-porro', '', 'e-learning-and-earning-ltd-856032-blog-img-02.jpg', 'Et aliquid consectet', 'In molestiae tempore', 'Dolorum atque volupt', 'Tempor quia consequu', '2025-03-19 15:48:23');

-- --------------------------------------------------------

--
-- Table structure for table `board`
--

CREATE TABLE `board` (
  `brd_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `brd_name` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `board`
--

INSERT INTO `board` (`brd_id`, `user_id`, `brd_name`) VALUES
(2, 140, 'Bogura'),
(3, 140, 'Rajshahi'),
(4, 140, 'Bsc'),
(5, 140, 'Rangpur');

-- --------------------------------------------------------

--
-- Table structure for table `branch`
--

CREATE TABLE `branch` (
  `br_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `br_name` varchar(300) DEFAULT NULL,
  `br_address` varchar(200) NOT NULL,
  `br_contact` varchar(50) NOT NULL,
  `br_mail` varchar(200) NOT NULL,
  `div_id` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `branch`
--

INSERT INTO `branch` (`br_id`, `user_id`, `br_name`, `br_address`, `br_contact`, `br_mail`, `div_id`) VALUES
(3, 140, 'Dhaka', 'Khaja IT Park (2nd - 6th Floor), 07 South Kallyanpur, Kallyanpur Bus Stand, Mirpur Road, Dhaka-1207', 'N/A', 'dhaka.elel@gmail.com', 1),
(4, 140, 'Gazipur', 'Habiba Sharkar Complex (4th Floor), Tongi College Gate, Dhaka Maymensingh Road, Tangi, Gazipur', 'N/A', 'gazipur.elel@gmail.com', 1),
(5, 140, 'Gopalganj', 'Laik Uddin Super Market (Ground Floor), Natun Bazar, Gopalganj', 'N/A', 'gopalganj.elel@gmail.com', 1),
(6, 140, 'Shariatpur', 'Hazi Super Market (2nd Floor), Gosairhat, Shariatpur', 'N/A', 'shariatpur.elel@gmail.com', 1),
(7, 140, 'Madaripur', 'Habib Plaza (3rd Floor), Master Colony, Tormuguria, Madaripur Sadar, Madaripur', 'N/A', 'madaripur.elel@gmail.com', 1),
(8, 140, 'Rajbari', 'Atiyar Tower (2nd Floor), Rajbari Main Road, Sajjankanda, Barapul, Rajbari', 'N/A', 'rajbari.elel@gmail.com', 1),
(9, 140, 'Narayanganj', 'Momtaz Plaza (4th Floor), Dhaka-Narayanganj Link Road, South Sastapur, Fatullah, Narayanganj', '1332852560 | 1332852561', 'narayanganj.elel@gmail.com', 1),
(10, 140, 'Manikganj', 'Lalmia Tower (3rd Floor), Police Line Bridge, Nawkhanda Bus Stand, Manikgan', '1332852566 | 1332852565', 'manikganj.elel@gmail.com', 1),
(11, 140, 'Narsingdi', 'Holding No. 263, Sultan Uddin Complex (3rd Floor), Bazir Mor, Narsingdi', '1332852570 | 1332852571', 'narsingdi.elel@gmail.com', 1),
(12, 140, 'Munshiganj', '437/1, Zarina Complex (1st and 5th Floor), Munshiganj', '1332852575 | 1332852576', 'munshiganj.elel@gmail.com', 1),
(13, 140, 'Kishoreganj', 'Alhaj Matiur Rahman Master Tower (2nd Floor), Adjacent to Gaital Circuit House, Mymensingh Road, Kishoreganj', '1332852580| 1332852581', 'kishoreganj.elel@gmail.com', 1),
(14, 140, 'Tangail', 'Sheikh Hasina Medical College Road, Sabalia,Tangail-1900, Tangail Sadar, Tangail', '1332852586 | 1332852585', 'tangail.elel@gmail.com', 1),
(15, 140, 'Rajshahi', 'House No-86 (3rd Floor), Khan Samar Chak, Ghoramara, Rajshahi (Behind the Ballia Thana)', 'N/A', 'rajshahi.elel@gmail.com', 2),
(16, 140, 'Chapainawabganj', '171, Alhamdulillah Shelter (2nd - 3rd Floor), Nakhraj Para Mahananda Bus Station, Chapainawabganj', '1332852650 | 1332852651', 'chapai.elel@gmail.com', 2),
(17, 140, 'Naogaon', 'ATN Tower (4th - 6th Floor), Rubir More, Naogaon', '1332852655 | 1332852656', 'naogaon.elel@gmail.com', 2),
(18, 140, 'Natore', 'IT Training and Incubation Center (2nd Floor), Cell No-02, Kandivitua, Natore Sadar, Natore', '1332852660 | 1332852661', 'natore.elel@gmail.com', 2),
(19, 140, 'Bogura', 'Suborna Tower (2nd Floor), Khandar Bazar,  East Side of Shaheed Chandu Stadium, Bogura', '1332852665 | 1332852666', 'bogura.elel@gmail.com', 2),
(20, 140, 'Joypurhat', 'Surjer Hasi Clinic (7th Floor), Lift #6, Professor Para, Jamalganj Road, Notunhat, Joypurhat Sadar, Joypurhat', '1332852670 | 1332852671', 'joypurhat.elel@gmail.com', 2),
(21, 140, 'Pabna', 'Mushab Tower (2nd Floor), Radhanagar Maktab, Dak Bunglow Road, Pabna Sadar, Pabna', '1332852675 | 1332852676', 'pabna.elel@gmail.com', 2),
(22, 140, 'Sirajganj', 'Hider Complex (4th Floor), SB Fazlul Haque  Road, Railgate, Sirajganj', '1332852680 | 1332852681', 'sirajganj.elel@gmail.com', 1),
(23, 140, 'Rangpur', 'Mobarak Complex Bhaban (2nd Floor), Shaheed Abu Said Chattar, Kurigram Road, Rangpur', '1332852730 | 1332852731', 'rangpur.elel@gmail.com', 3),
(24, 140, 'Kurigram', 'Rahman Villa (2nd - 3rd Floor), Central  Bus Stand, RK Road, Kurigram', '1332852735 | 1332852736', 'kurigram.elel@gmail.com', 3),
(25, 140, 'Lalmonirhat', 'Yusuf Complex (2nd - 3rd Floor), Mission Road, Lalmonirhat', '1332852740 | 1332852741', 'lalmonirhat.elel@gmail.com', 3),
(26, 140, 'Gaibandha', 'Zara Tower (4th Floor), Zone-C, DB Road, Paschim Para, Gaibandha', '1332852745 | 1332852746', 'gaibandha.elel@gmail.com', 3),
(27, 140, 'Nilphamari', 'Kibria Mansion (3rd Floor), Thana Para, Dak Bunglow Road, Nilphamari Sadar, Nilphamari', '1332852750 | 1332852751', 'nilphamari.elel@gmail.com', 3),
(28, 140, 'Dinajpur', 'Fatema Plaza (2nd Floor), Iqbal School Road, Paharpur, Dinajpur', '1332852755 | 1332852756', 'dinajpur.elel@gmail.com', 3),
(29, 140, 'Thakurgaon', 'Nurjahan Plaza (2nd Floor), Chowrastar Mor, Main Road, Thakurgaon Shadar,Thakurgaon', 'N/A', 'thakurgaon.elel@gamil.com', 3),
(30, 140, 'Panchagarh', 'Alhaj Shafir Uddin Ahmed Super Market (2nd Floor), Tetulia Road, Kayet Para, Panchagarh', '1332852760 | 1332852761', 'panchagarh.elel@gmail.com', 3),
(31, 140, 'Khulna', 'IT Training and Incubation Center,  Road No-6, KUET, Yogipole, Dighalia, Khulna', '1332852685 | 1332852686', 'khulna.elel@gmail.com', 4),
(32, 140, 'Narail', 'Trust Bhaban (1st-3rd Floor), Family Housing, Mohishkhola, Narail Sadar, Narail', 'N/A', 'narail.elel@gmail.com', 4),
(33, 140, 'Satkhira', 'Argh Plaza (2nd - 3rd Floor), Shaheed Nazmul Sarani, Satkhira', '1332852690 | 1332852691', 'satkhira.elel@gmail.com', 4),
(34, 140, 'Bagerhat', 'Safayet Tower (2nd Floor), LGED Mor, Dashani, Bagerhat', '1332852695 | 1332852696', 'bagerhat.elel@gmail.com', 4),
(35, 140, 'Jessore', 'Software Technology Park (Level -13), Nazir Sankarpur Road, Jessore Sadar, Jessore', '1332852700 | 1332852701', 'jashore.elel@gmail.com', 4),
(36, 140, 'Jhenaidah', 'Molla Super Market (3rd Floor), Modern Mor, Jhenaidah', '1332852705 | 1332852706', 'jhenaidah.elel@gmail.com', 4),
(37, 140, 'Magura', 'Molla Tower (3rd Floor), Police Line, Banshtala, Magura', '1332852710 | 1332852711', 'magura.elel@gmail.com', 4),
(38, 140, 'Chuadanga', 'Shubhtara Complex (4th Floor), Shaheed Abul Kashem Road, Shahjahan Chattar, Chuadanga', '1332852715 | 1332852716', 'chuadanga.elel@gmail.com', 4),
(39, 140, 'Meherpur', 'Hotel Bazar Building (3rd Floor), Shaheed Gafur Road, Meherpur', '1332852720 | 1332852721', 'meherpur.elel@gmail.com', 4),
(40, 140, 'Kushtia', 'Holding No- 25/7 (2nd Floor), Central Bus Terminal, TTC Gate (Opposite Side), Chauhas, Kushtia', '1332852725 | 1332852726', 'kushtia.elel@gmail.com', 4),
(41, 140, 'Barishal', 'Holding No- 1448 (3rd Floor), Sagardari Main Road (Near Dost Pamp), Ward No-24, Notun Kafra Bari, Barishal Sadar, Barishal', '1332852765 | 1332852766', 'barishal.elel@gmail.com', 5),
(42, 140, 'Jhalakathi', 'Holding No- 413/3, M/S Sardar & Sons Bhaban (2nd Floor), Jhalakathi Government College Road, Jhalakathi', '1332852770 | 1332852771', 'jhalakathi.elel@gmail.com', 5),
(43, 140, 'Bhola', 'Jahangir Center (2nd-3rd Floor), Western Para Road, Bhola Sadar, Bhola', 'N/A', 'bhola.elel@gmail.com', 5),
(44, 140, 'Pirojpur', 'Holding- 0052-01 (3rd floor), Machimpur, Pirojpur Sadar, Pirojpur', '1332852775 | 1332852776', 'pirojpur.elel@gmail.com', 5),
(45, 140, 'Patuakhali', 'House No- 0025/A, 41, Suborna Tower, Joler Kol Road, Adjacent to Sabek Mukul Cinema Hall, Patuakhali', '1332852780 | 1332852781', 'patuakhali.elel@gmail.com', 5),
(46, 140, 'Barguna', 'Khajurtala Old Bus Stand, Barguna Sadar, Barguna', '1332852785  | 1332852786', 'barguna.elel@gmail.com', 5),
(47, 140, 'Mymensingh', 'House No. 23, Sehra Road, Adjacent to Purovi Cinema Hall, Mymensingh', '1332852595 | 1332852596', 'mymensingh.elel@gmail.com', 6),
(48, 140, 'Sherpur', 'Sauravi Villa (2nd Floor), Wirless Mor, Shibbari, Sherpur Sadar, Sherpur', 'N/A', 'sherpur.elel@gmail.com', 6),
(49, 140, 'Jamalpur (Bakshiganj)', 'Professor Shahidullah Bhaban (2nd Floor), Adjacent to old Cowshed, Bakshiganj, Jamalpur', '1332852600 | 1332852601', 'jamalpur.elel@gmail.com', 6),
(50, 140, 'Netrokona', 'Dulu Mansion (3rd Floor), Muktar Para, Road No: 651,Netrokona Sadar, Netrokona', '1332852605 | 1332852606', 'netrokona.elel@gmail.com', 6),
(51, 140, 'Sylhet', 'Bholananda-Uttaran Technical Training Center, (1st - 2nd Floor), Chouhatta, Sylhet Sadar, Sylhet', 'N/A', 'sylhet.elel@gmail.com', 7),
(52, 140, 'Sunamganj', 'House No-0776 (2nd Floor), Hazipara, Sunamganj (Near Circuit House)', 'N/A', 'sunamganj.elel@gmail.com', 7),
(53, 140, 'Habiganj', 'House No- 5691 (2nd Floor), Fire Service Road, Habiganj-3300, Habiganj', '1332852790 | 1332852791', 'habiganj.elel@gmail.com', 7),
(54, 140, 'Moulvibazar', 'Holding No: 311/1 (3rd Floor), Srimangal Road, Moulvibazar', '1332852795 | 1332852796', 'moulvibazar.elel@gmail.com', 7),
(55, 140, 'Chattogram', 'Johor Tower (5th Floor), Sheikh Mujib Road, Double Mooring, Agrabad, Chattogram', '1332852610 | 1332852611', 'chattogram.elel@gmail.com', 8),
(56, 140, 'Cox\'s Bazar', 'Trade Link Center (4th Floor), Cox’s Bazar Sadar, Cox’s Bazar', '1332852615 | 1332852616', 'coxsbazar.elel@gmail.com', 8),
(57, 140, 'Bandarban', 'Murari Haven (2nd Floor), Road No-04, Ward No-04, Bomang Raja Mong Shai Pru Chowdhury Road, Bandarban', '1332852620 | 1332852621', 'bandarban.elel@gmail.com', 8),
(58, 140, 'Khagrachari', 'Holding No: 523/01 (Ground Floor), College Road Narikel Bagan, Khagrachari', '1332852625 | 1332852626', 'khagrachari.elel@gmail.com', 8),
(59, 140, 'Rangamati', 'House No: 854, Rupsha Villa (2nd Floor), Ward No. 08, North Kalindipur, Rangamati', '1332852630 | 1332852631', 'rangamati.elel@gmail.com', 8),
(60, 140, 'Cumilla', 'Al Amin Bhawan (3rd Floor), (Opposite Haji Akram Uddin School & College), Paduar Bazar, International Road, Cumilla', 'N/A', 'cumilla.elel@gmail.com', 8),
(61, 140, 'Lakshimipur', 'BRDB Bhaban (2nd Floor), Upazila Parishad, Lakshimipur', 'N/A', 'lakshimipur.elel@gmail.com', 8),
(62, 140, 'Chandpur', 'Akhand Market (2nd Floor) Kalibari,  Chandpur Sadar, Chandpur', 'N/A', 'chandpur.elel@gmail.com', 8),
(63, 140, 'Noakhali', 'Sultana Plaza (2nd - 3rd Floor), Dutter Hat Purba Bazar, Noakhali', '1332852635 | 1332852636', 'noakhali.elel@gmail.com', 8),
(64, 140, 'Feni', 'Holding: 175/2, Yusuf Tower (3rd Floor), Mahipal Highway, Adjacent to Mahipal Overbridge (North Side), Feni', '1332852640 | 1332852641', 'eni.elel@gmail.com', 8),
(65, 140, 'B-Baria', '437/1, Asma Mahal (Ground Floor), Shyamoli Barir Mor, Fulbaria, Brahmanbaria', '1332852645 | 1332852646', 'b_baria.elel@gmail.com', 8),
(66, 140, 'Faridpur', 'Police Welfare Market, (3rd Floor), Alhaj Badiyar Rahman Mola Road, Jhiltuli, Faridpur', '1332852590 | 1332852591', 'faridpur.elel@gmail.com', 1);

-- --------------------------------------------------------

--
-- Table structure for table `career`
--

CREATE TABLE `career` (
  `id` int(11) NOT NULL,
  `user_id` int(25) NOT NULL,
  `category_id` int(25) NOT NULL,
  `title` varchar(50) NOT NULL,
  `slug` varchar(25) NOT NULL,
  `details` longtext NOT NULL,
  `salary` varchar(50) NOT NULL,
  `deadline` varchar(30) NOT NULL,
  `userPic` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `career`
--

INSERT INTO `career` (`id`, `user_id`, `category_id`, `title`, `slug`, `details`, `salary`, `deadline`, `userPic`) VALUES
(9, 140, 3, 'sdfdfs', 'sdfdfs', '<p>sdfsdf</p>', 'Modi ipsa earum a c', '2025-04-25', 'sdfdfs-382700.jpg'),
(10, 140, 1, 'Web Developer', 'web-developer', '<div class=\"flex shrink basis-auto flex-col overflow-hidden -mb-(--composer-overlap-px) [--composer-overlap-px:24px] grow\">\r\n<div class=\"relative h-full\">\r\n<div class=\"flex h-full flex-col overflow-y-auto [scrollbar-gutter:stable]\">\r\n<div class=\"@thread-xl/thread:pt-header-height mt-1.5 flex flex-col text-sm md:pb-9\">\r\n<article class=\"text-token-text-primary w-full\" dir=\"auto\" data-testid=\"conversation-turn-2\" data-scroll-anchor=\"true\">\r\n<div class=\"text-base my-auto mx-auto py-5 [--thread-content-margin:--spacing(4)] @[37rem]:[--thread-content-margin:--spacing(6)] @[70rem]:[--thread-content-margin:--spacing(12)] px-(--thread-content-margin)\">\r\n<div class=\"[--thread-content-max-width:32rem] @[34rem]:[--thread-content-max-width:40rem] @[64rem]:[--thread-content-max-width:48rem] mx-auto flex max-w-(--thread-content-max-width) flex-1 text-base gap-4 md:gap-5 lg:gap-6 group/turn-messages focus-visible:outline-hidden\" tabindex=\"-1\">\r\n<div class=\"group/conversation-turn relative flex w-full min-w-0 flex-col agent-turn\">\r\n<div class=\"relative flex-col gap-1 md:gap-3\">\r\n<div class=\"flex max-w-full flex-col grow\">\r\n<div class=\"min-h-8 text-message relative flex w-full flex-col items-end gap-2 text-start break-words whitespace-normal [.text-message+&amp;]:mt-5\" dir=\"auto\" data-message-author-role=\"assistant\" data-message-id=\"e4d49e4a-4b32-4c09-a7a8-f34db36eb73a\" data-message-model-slug=\"gpt-4o\">\r\n<div class=\"flex w-full flex-col gap-1 empty:hidden first:pt-[3px]\">\r\n<div class=\"markdown prose dark:prose-invert w-full break-words light\">\r\n<h3 class=\"\" data-start=\"189\" data-end=\"221\"><span style=\"color: #f1c40f;\"><strong data-start=\"193\" data-end=\"221\">Job Title: Web Developer</strong></span></h3>\r\n<p class=\"\" data-start=\"223\" data-end=\"372\"><strong data-start=\"223\" data-end=\"236\">Location:</strong> [Insert Location or \"Remote\"]<br data-start=\"266\" data-end=\"269\" /><strong data-start=\"269\" data-end=\"282\">Job Type:</strong> [Full-Time/Part-Time/Contract]<br data-start=\"313\" data-end=\"316\" /><strong data-start=\"316\" data-end=\"337\">Experience Level:</strong> [Entry-Level / Mid-Level / Senior]</p>\r\n<hr class=\"\" data-start=\"374\" data-end=\"377\" />\r\n<h3 class=\"\" data-start=\"379\" data-end=\"399\"><span style=\"color: #f1c40f;\"><strong data-start=\"383\" data-end=\"399\">Job Summary:</strong></span></h3>\r\n<p class=\"\" data-start=\"401\" data-end=\"786\">We are looking for a talented and detail-oriented <strong data-start=\"451\" data-end=\"468\">Web Developer</strong> to join our team. You will be responsible for developing and maintaining websites and web applications that are visually appealing, user-friendly, and functionally robust. You should have a strong understanding of front-end and/or back-end web development, and a passion for building high-quality digital experiences.</p>\r\n<hr class=\"\" data-start=\"788\" data-end=\"791\" />\r\n<h3 class=\"\" data-start=\"793\" data-end=\"822\"><span style=\"color: #f1c40f;\"><strong data-start=\"797\" data-end=\"822\">Key Responsibilities:</strong></span></h3>\r\n<ul data-start=\"824\" data-end=\"1519\">\r\n<li class=\"\" data-start=\"824\" data-end=\"903\">\r\n<p class=\"\" data-start=\"826\" data-end=\"903\">Design, develop, test, and maintain responsive websites and web applications.</p>\r\n</li>\r\n<li class=\"\" data-start=\"904\" data-end=\"1021\">\r\n<p class=\"\" data-start=\"906\" data-end=\"1021\">Collaborate with designers, developers, and other team members to create functional and visually engaging websites.</p>\r\n</li>\r\n<li class=\"\" data-start=\"1022\" data-end=\"1072\">\r\n<p class=\"\" data-start=\"1024\" data-end=\"1072\">Write clean, scalable, and well-documented code.</p>\r\n</li>\r\n<li class=\"\" data-start=\"1073\" data-end=\"1123\">\r\n<p class=\"\" data-start=\"1075\" data-end=\"1123\">Optimize applications for speed and scalability.</p>\r\n</li>\r\n<li class=\"\" data-start=\"1124\" data-end=\"1192\">\r\n<p class=\"\" data-start=\"1126\" data-end=\"1192\">Troubleshoot and debug issues across various browsers and devices.</p>\r\n</li>\r\n<li class=\"\" data-start=\"1193\" data-end=\"1256\">\r\n<p class=\"\" data-start=\"1195\" data-end=\"1256\">Ensure cross-browser compatibility and mobile responsiveness.</p>\r\n</li>\r\n<li class=\"\" data-start=\"1257\" data-end=\"1338\">\r\n<p class=\"\" data-start=\"1259\" data-end=\"1338\">Stay updated with the latest industry trends, technologies, and best practices.</p>\r\n</li>\r\n<li class=\"\" data-start=\"1339\" data-end=\"1395\">\r\n<p class=\"\" data-start=\"1341\" data-end=\"1395\">Integrate APIs and third-party services when required.</p>\r\n</li>\r\n<li class=\"\" data-start=\"1396\" data-end=\"1460\">\r\n<p class=\"\" data-start=\"1398\" data-end=\"1460\">Participate in code reviews and provide constructive feedback.</p>\r\n</li>\r\n<li class=\"\" data-start=\"1461\" data-end=\"1519\">\r\n<p class=\"\" data-start=\"1463\" data-end=\"1519\">Maintain and improve existing websites and applications.</p>\r\n</li>\r\n</ul>\r\n<hr class=\"\" data-start=\"1521\" data-end=\"1524\" />\r\n<h3 class=\"\" data-start=\"1526\" data-end=\"1569\"><span style=\"color: #f1c40f;\"><strong data-start=\"1530\" data-end=\"1569\">Required Skills and Qualifications:</strong></span></h3>\r\n<ul data-start=\"1571\" data-end=\"2247\">\r\n<li class=\"\" data-start=\"1571\" data-end=\"1688\">\r\n<p class=\"\" data-start=\"1573\" data-end=\"1688\">Proficient in <strong data-start=\"1587\" data-end=\"1612\">HTML, CSS, JavaScript</strong>, and related frameworks/libraries (e.g., Bootstrap, jQuery, React, Vue.js).</p>\r\n</li>\r\n<li class=\"\" data-start=\"1689\" data-end=\"1837\">\r\n<p class=\"\" data-start=\"1691\" data-end=\"1837\">Experience with <strong data-start=\"1707\" data-end=\"1731\">backend technologies</strong> such as PHP, Laravel, Node.js, Python, or Ruby on Rails. <em data-start=\"1789\" data-end=\"1837\">(Optional depending on full-stack requirement)</em></p>\r\n</li>\r\n<li class=\"\" data-start=\"1838\" data-end=\"1914\">\r\n<p class=\"\" data-start=\"1840\" data-end=\"1914\">Familiar with <strong data-start=\"1854\" data-end=\"1877\">database management</strong> using MySQL, PostgreSQL, or MongoDB.</p>\r\n</li>\r\n<li class=\"\" data-start=\"1915\" data-end=\"1970\">\r\n<p class=\"\" data-start=\"1917\" data-end=\"1970\">Experience with <strong data-start=\"1933\" data-end=\"1960\">version control systems</strong> like Git.</p>\r\n</li>\r\n<li class=\"\" data-start=\"1971\" data-end=\"2041\">\r\n<p class=\"\" data-start=\"1973\" data-end=\"2041\">Understanding of <strong data-start=\"1990\" data-end=\"2008\">SEO principles</strong> and web accessibility standards.</p>\r\n</li>\r\n<li class=\"\" data-start=\"2042\" data-end=\"2098\">\r\n<p class=\"\" data-start=\"2044\" data-end=\"2098\">Strong problem-solving skills and attention to detail.</p>\r\n</li>\r\n<li class=\"\" data-start=\"2099\" data-end=\"2145\">\r\n<p class=\"\" data-start=\"2101\" data-end=\"2145\">Excellent communication and teamwork skills.</p>\r\n</li>\r\n<li class=\"\" data-start=\"2146\" data-end=\"2247\">\r\n<p class=\"\" data-start=\"2148\" data-end=\"2247\">Bachelor\'s degree in Computer Science, Web Development, or related field, or equivalent experience.</p>\r\n</li>\r\n</ul>\r\n<hr class=\"\" data-start=\"2249\" data-end=\"2252\" />\r\n<h3 class=\"\" data-start=\"2254\" data-end=\"2287\"><span style=\"color: #f1c40f;\"><strong data-start=\"2258\" data-end=\"2287\">Preferred Qualifications:</strong></span></h3>\r\n<ul data-start=\"2289\" data-end=\"2536\">\r\n<li class=\"\" data-start=\"2289\" data-end=\"2347\">\r\n<p class=\"\" data-start=\"2291\" data-end=\"2347\">Experience with CMS platforms (e.g., WordPress, Drupal).</p>\r\n</li>\r\n<li class=\"\" data-start=\"2348\" data-end=\"2405\">\r\n<p class=\"\" data-start=\"2350\" data-end=\"2405\">Familiarity with DevOps tools and deployment processes.</p>\r\n</li>\r\n<li class=\"\" data-start=\"2406\" data-end=\"2444\">\r\n<p class=\"\" data-start=\"2408\" data-end=\"2444\">Knowledge of web security practices.</p>\r\n</li>\r\n<li class=\"\" data-start=\"2445\" data-end=\"2484\">\r\n<p class=\"\" data-start=\"2447\" data-end=\"2484\">Understanding of Agile methodologies.</p>\r\n</li>\r\n<li class=\"\" data-start=\"2485\" data-end=\"2536\">\r\n<p class=\"\" data-start=\"2487\" data-end=\"2536\">Portfolio of previous work or live websites/apps.</p>\r\n</li>\r\n</ul>\r\n<hr class=\"\" data-start=\"2538\" data-end=\"2541\" />\r\n<h3 class=\"\" data-start=\"2543\" data-end=\"2560\"><strong data-start=\"2547\" data-end=\"2560\">Benefits:</strong></h3>\r\n<ul data-start=\"2562\" data-end=\"2721\">\r\n<li class=\"\" data-start=\"2562\" data-end=\"2582\">\r\n<p class=\"\" data-start=\"2564\" data-end=\"2582\">Competitive salary</p>\r\n</li>\r\n<li class=\"\" data-start=\"2583\" data-end=\"2607\">\r\n<p class=\"\" data-start=\"2585\" data-end=\"2607\">Flexible working hours</p>\r\n</li>\r\n<li class=\"\" data-start=\"2608\" data-end=\"2629\">\r\n<p class=\"\" data-start=\"2610\" data-end=\"2629\">Remote work options</p>\r\n</li>\r\n<li class=\"\" data-start=\"2630\" data-end=\"2674\">\r\n<p class=\"\" data-start=\"2632\" data-end=\"2674\">Opportunities for professional development</p>\r\n</li>\r\n<li class=\"\" data-start=\"2675\" data-end=\"2721\">\r\n<p class=\"\" data-start=\"2677\" data-end=\"2721\">Collaborative and inclusive work environment</p>\r\n</li>\r\n</ul>\r\n<hr class=\"\" data-start=\"2723\" data-end=\"2726\" />\r\n<p class=\"\" data-start=\"2728\" data-end=\"2792\">Let me know if you want to generate a tailored version, such as:</p>\r\n<ul data-start=\"2794\" data-end=\"2963\" data-is-last-node=\"\" data-is-only-node=\"\">\r\n<li class=\"\" data-start=\"2794\" data-end=\"2821\">\r\n<p class=\"\" data-start=\"2796\" data-end=\"2821\"><strong data-start=\"2796\" data-end=\"2821\">Laravel Web Developer</strong></p>\r\n</li>\r\n<li class=\"\" data-start=\"2822\" data-end=\"2853\">\r\n<p class=\"\" data-start=\"2824\" data-end=\"2853\"><strong data-start=\"2824\" data-end=\"2853\">Junior Frontend Developer</strong></p>\r\n</li>\r\n<li class=\"\" data-start=\"2854\" data-end=\"2900\">\r\n<p class=\"\" data-start=\"2856\" data-end=\"2900\"><strong data-start=\"2856\" data-end=\"2900\">Full-Stack Web Developer (Vue + Laravel)</strong></p>\r\n</li>\r\n<li class=\"\" data-start=\"2901\" data-end=\"2963\">\r\n<p class=\"\" data-start=\"2903\" data-end=\"2963\">Or something more niche for your projects or team structure</p>\r\n</li>\r\n</ul>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</article>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n<div id=\"thread-bottom-container\" class=\"isolate z-3 w-full basis-auto has-data-has-thread-error:pt-2 has-data-has-thread-error:[box-shadow:var(--sharp-edge-bottom-shadow)] md:border-transparent md:pt-0 dark:border-white/20 md:dark:border-transparent flex flex-col\">\r\n<div id=\"thread-bottom\">\r\n<div class=\"text-base mx-auto [--thread-content-margin:--spacing(4)] @[37rem]:[--thread-content-margin:--spacing(6)] @[70rem]:[--thread-content-margin:--spacing(12)] px-(--thread-content-margin)\">\r\n<div class=\"[--thread-content-max-width:32rem] @[34rem]:[--thread-content-max-width:40rem] @[64rem]:[--thread-content-max-width:48rem] mx-auto flex max-w-(--thread-content-max-width) flex-1 text-base gap-4 md:gap-5 lg:gap-6\">\r\n<div class=\"relative z-1 flex max-w-full flex-1 flex-col h-full max-xs:[--force-hide-label:none]\" aria-haspopup=\"dialog\" aria-expanded=\"false\" aria-controls=\"radix-&laquo;r2p&raquo;\" data-state=\"closed\"><form class=\"w-full [view-transition-name:var(--vt-composer)]\" data-type=\"unified-composer\">\r\n<div class=\"border-token-border-default flex w-full cursor-text flex-col items-center justify-center rounded-[28px] border bg-clip-padding contain-inline-size overflow-clip shadow-sm sm:shadow-lg dark:shadow-none! bg-token-main-surface-primary dark:bg-[#303030]\">\r\n<div class=\"relative flex w-full items-end px-3 py-3\">\r\n<div class=\"relative flex w-full flex-auto flex-col\">\r\n<div class=\"relative ms-1.5 grid grid-cols-[auto_minmax(0,1fr)]\">\r\n<div class=\"relative flex-auto bg-transparent ps-2 pt-0.5\">\r\n<div class=\"flex flex-col justify-start\">\r\n<div class=\"flex min-h-12 items-start\">\r\n<div class=\"max-w-full min-w-0 flex-1\">\r\n<div class=\"_prosemirror-parent_k4nam_2 text-token-text-primary max-h-[25dvh] max-h-52 overflow-auto [scrollbar-width:thin] default-browser min-h-12 pe-3\">&nbsp;</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</form></div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>', '50000', '2025-05-03', 'web-developer-304301.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `career_category`
--

CREATE TABLE `career_category` (
  `cat_id` int(25) NOT NULL,
  `user_id` int(11) NOT NULL,
  `cat_name` varchar(30) NOT NULL,
  `status` varchar(25) DEFAULT NULL,
  `slug` varchar(25) NOT NULL,
  `cat_photo` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `career_category`
--

INSERT INTO `career_category` (`cat_id`, `user_id`, `cat_name`, `status`, `slug`, `cat_photo`) VALUES
(1, 140, '3D Design & Animation', NULL, '3d-design-animation', '6832.jpg'),
(3, 140, '3D Design & Animationss', NULL, '3d-design-animationss', NULL),
(4, 140, 'Graphic Design & Animation', NULL, 'graphic-design-animation', NULL),
(5, 140, 'Digital Marketing', NULL, 'digital-marketing', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `chair_man_massage`
--

CREATE TABLE `chair_man_massage` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(500) NOT NULL,
  `subtitle` varchar(5000) NOT NULL,
  `userPic` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `chair_man_massage`
--

INSERT INTO `chair_man_massage` (`id`, `user_id`, `title`, `subtitle`, `userPic`) VALUES
(18, 130, 'Chairman', 'Prince Education Group has been established to keep pace with the progress of science and information technology and to achieve success in the journey of progress of Bangladesh with the potential of a large population and to expand teaching and research activities with due importance in the field of technical and work-oriented education and modern knowledge practice at the national level. Action oriented education is the main driver of development and progress. The economic emancipation of the common people lies in the wide spread of this education. Today it is the need of the hour to take this education to the grass root level, at the doorstep of all the hardworking people. Various organizations are being established at the public and private level with the aim of promoting, expanding, skilling and developing career-oriented education, innovative development projects have been adopted and are being implemented.', '829213.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `choose_section`
--

CREATE TABLE `choose_section` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `choose_title` varchar(200) NOT NULL,
  `choose_subtitle` varchar(200) NOT NULL,
  `userPic` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `choose_section`
--

INSERT INTO `choose_section` (`id`, `user_id`, `choose_title`, `choose_subtitle`, `userPic`) VALUES
(9, 130, 'World Class Service', 'Provide World Class Service According To Your Demand', '576321.png'),
(10, 130, 'Best Quality Product', 'We always try to our best quality product service.', '443611.png'),
(11, 130, 'Best Price For You', 'We Take Affordable Price And Best Quality Product', '665496.png'),
(12, 130, 'Best Price For You', 'We Take Affordable Price And Best Quality Product', '812993.png'),
(13, 130, 'Best Price For You', 'We Take Affordable Price And Best Quality Product', '67187.png'),
(14, 130, 'Best Price For You', 'We Take Affordable Price And Best Quality Product', '538535.jpg'),
(15, 130, 'Best Price For You', 'We Take Affordable Price And Best Quality Product', '700985.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `c_id` int(30) NOT NULL,
  `user_id` int(30) NOT NULL,
  `c_name` text DEFAULT NULL,
  `c_details` longtext DEFAULT NULL,
  `userPic` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`c_id`, `user_id`, `c_name`, `c_details`, `userPic`) VALUES
(1, 140, 'Igor Tyler33', 'Reprehenderit imped33', 'e-learning-and-earning-ltd-318578-buttc.png'),
(8, 140, '..', 'Na', 'e-learning-and-earning-ltd-161362-basis.png'),
(9, 140, '..', 'Na', 'e-learning-and-earning-ltd-761058-bangladesh-police.png');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `address` varchar(200) NOT NULL,
  `userPic` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `user_id`, `phone`, `email`, `address`, `userPic`) VALUES
(14, 140, '01550-666800', 'info@e-laeltd.com', 'Khaja IT Park, 2nd to 7th Floor, Kallyanpur Bus Stop, Mirpur Road, Dhaka-1207.', '484608.png');

-- --------------------------------------------------------

--
-- Table structure for table `contact2`
--

CREATE TABLE `contact2` (
  `id` int(30) NOT NULL,
  `name` text NOT NULL,
  `email` text NOT NULL,
  `msg_subject` text NOT NULL,
  `massage` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `contact_info`
--

CREATE TABLE `contact_info` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `phone` varchar(200) NOT NULL,
  `subject` varchar(200) NOT NULL,
  `message` varchar(1000) NOT NULL,
  `entry_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact_info`
--

INSERT INTO `contact_info` (`id`, `name`, `email`, `phone`, `subject`, `message`, `entry_date`) VALUES
(96, 'Colette Burke', 'pawapareja@mailinator.com', '+1 (833) 727-3917', 'Voluptate molestiae ', 'In sint aspernatur ', '2025-04-23 00:00:00'),
(97, 'Kameko Gay', 'qyvygof@mailinator.com', '+1 (153) 507-5819', 'Consequatur pariatu', 'Et ea quia reiciendi', '2025-04-23 13:08:38'),
(98, 'Acton Palmer', 'pizy@mailinator.com', '+1 (739) 813-9025', 'Consequatur pariatu', 'Vel iure enim ration', '2025-04-23 13:36:58'),
(99, 'Kitra Bates', 'lididy@mailinator.com', '01928695384', 'Dolores quasi aliqui', 'Aute velit enim fugi', '2025-04-24 13:00:32');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(500) NOT NULL,
  `type` varchar(255) DEFAULT NULL,
  `sub_name` longtext DEFAULT NULL,
  `status` int(30) NOT NULL DEFAULT 1,
  `slug` varchar(300) NOT NULL,
  `regular_price` varchar(100) NOT NULL,
  `discount_price` varchar(30) NOT NULL,
  `duration` varchar(100) NOT NULL,
  `total_semester` varchar(100) DEFAULT NULL,
  `project` text DEFAULT NULL,
  `weekly` varchar(100) NOT NULL,
  `hours` varchar(100) NOT NULL,
  `details` longtext DEFAULT NULL,
  `carear_path` longtext NOT NULL,
  `course_overview` longtext DEFAULT NULL,
  `course_curriculum` longtext DEFAULT NULL,
  `software` longtext DEFAULT NULL,
  `course_desinger` longtext DEFAULT NULL,
  `career_opportunities` longtext DEFAULT NULL,
  `job_position` longtext DEFAULT NULL,
  `exclusive_solution` longtext DEFAULT NULL,
  `userPic` longtext DEFAULT NULL,
  `video_link` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`id`, `category_id`, `user_id`, `name`, `type`, `sub_name`, `status`, `slug`, `regular_price`, `discount_price`, `duration`, `total_semester`, `project`, `weekly`, `hours`, `details`, `carear_path`, `course_overview`, `course_curriculum`, `software`, `course_desinger`, `career_opportunities`, `job_position`, `exclusive_solution`, `userPic`, `video_link`) VALUES
(27, 16, 140, 'Diploma in Full Stack Development', '', 'Turn Your Passion into a Full-Stack Developer', 1, 'diploma-in-full-stack-development', '', '', '8 ', '70', '40+', '', '', '<p><span style=\"font-weight: 400;\">Full-stack development is a </span><strong>highly sought-after skill</strong><span style=\"font-weight: 400;\"> in the </span><strong>tech industry</strong><span style=\"font-weight: 400;\">, enabling developers to build </span><strong>both front-end and back-end applications</strong><span style=\"font-weight: 400;\">. As businesses continue their digital transformation, full-stack developers are in </span><strong>high demand</strong><span style=\"font-weight: 400;\">.</span></p>\r\n<p><span style=\"font-weight: 400;\">This diploma course is designed for individuals looking to </span><strong>become proficient in web development using the latest technologies</strong><span style=\"font-weight: 400;\">. Learn to </span><strong>build dynamic, scalable websites and applications</strong><span style=\"font-weight: 400;\"> from scratch. </span><strong>Enroll today and become a full-stack developer!</strong></p>', '', '<p><span style=\"font-weight: 400;\">This course provides </span><strong>step-by-step guidance on front-end, back-end, and database management</strong><span style=\"font-weight: 400;\">. Students will gain hands-on experience in </span><strong>JavaScript frameworks, server-side programming, and cloud deployment</strong><span style=\"font-weight: 400;\">.</span></p>\r\n<p><span style=\"font-weight: 400;\">By the end of the course, students will be able to </span><strong>design, develop, and deploy fully functional web applications</strong><span style=\"font-weight: 400;\">.</span></p>', '<ul style=\"list-style-type: circle;\">\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Introduction to Web Development &amp; Internet Technologies</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">HTML, CSS, &amp; JavaScript Fundamentals</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Front-End Frameworks (React, Vue.js, Angular)</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Back-End Development with Node.js &amp; Express.js</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Database Management (MongoDB, MySQL, Firebase)</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">REST APIs &amp; Server-Side Programming</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Cloud Hosting &amp; Deployment Strategies (AWS, Heroku, Vercel)</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">AI-Powered Development &amp; Automation</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Testing, Debugging &amp; Performance Optimization</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Freelancing &amp; Career Development in Full-Stack Development</li>\r\n</ul>', '<ul style=\"list-style-type: circle;\">\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">React.js &amp; Vue.js</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Node.js &amp; Express.js</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">MongoDB &amp; Firebase</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Docker &amp; Kubernetes</li>\r\n</ul>', '<ul style=\"list-style-type: circle;\">\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Aspiring Web Developers</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Software Engineers &amp; Programmers</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Freelancers &amp; Entrepreneurs</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Students Interested in App &amp; Web Development</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">UI/UX Designers Looking to Learn Coding</li>\r\n</ul>', '<p><span style=\"font-weight: 400;\">With </span><strong>technology-driven industries expanding rapidly</strong><span style=\"font-weight: 400;\">, full-stack developers are in high demand. This course prepares students for careers in </span><strong>software engineering, web application development, and startup ventures</strong><span style=\"font-weight: 400;\">.</span></p>', '<ul style=\"list-style-type: circle;\">\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Full-Stack Developer</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Front-End Web Developer</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Back-End Developer</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Software Engineer</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Freelance Web Developer</li>\r\n</ul>', '<ul style=\"list-style-type: circle;\">\r\n<li style=\"font-weight: 400;\" aria-level=\"1\"><strong>Live Coding Sessions:</strong><span style=\"font-weight: 400;\"> Learn full-stack development with real-world coding exercises.</span></li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\"><strong>Industry Projects &amp; Practical Assignments:</strong><span style=\"font-weight: 400;\"> Work on applications that mimic real business cases.</span></li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\"><strong>AI-Integrated Development Tools:</strong><span style=\"font-weight: 400;\"> Utilize automation and AI-powered debugging tools.</span></li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\"><strong>Freelancing &amp; Portfolio Building:</strong><span style=\"font-weight: 400;\"> Get expert advice on securing projects online.</span></li>\r\n</ul>\r\n<ul style=\"list-style-type: circle;\">\r\n<li><strong>Job Placement &amp; Networking Opportunities:</strong><span style=\"font-weight: 400;\"> Connect with recruiters and tech companies.</span></li>\r\n</ul>', 'e-learning-and-earning-ltd-889514-diploma-in-full-stack-development.jpg', ''),
(28, 16, 140, 'MERN Stack Development', 'featured ', 'Turn Your Passion into a Full-Stack Web Developer', 1, 'mern-stack-development', '', '', '5 ', '50', '25+', '', '', '<p><span style=\"font-weight: 400;\">MERN Stack (MongoDB, Express.js, React.js, and Node.js) is one of the </span><strong>most powerful frameworks for building modern web applications</strong><span style=\"font-weight: 400;\">. Companies worldwide are seeking </span><strong>MERN Stack developers</strong><span style=\"font-weight: 400;\"> to create </span><strong>scalable, high-performance applications</strong><span style=\"font-weight: 400;\">.</span></p>\r\n<p><span style=\"font-weight: 400;\">This course is designed for individuals looking to </span><strong>become full-stack JavaScript developers</strong><span style=\"font-weight: 400;\">. Learn to </span><strong>build interactive front-end applications, develop back-end APIs, and deploy full-stack web apps</strong><span style=\"font-weight: 400;\">. </span><strong>Enroll today and start your journey in web development!</strong></p>', '', '<p><span style=\"font-weight: 400;\">This course covers </span><strong>front-end and back-end development, API integration, and cloud deployment</strong><span style=\"font-weight: 400;\">. Students will gain hands-on experience in </span><strong>JavaScript programming, database management, and web app optimization</strong><span style=\"font-weight: 400;\">.</span></p>\r\n<p><span style=\"font-weight: 400;\">By the end of the course, students will be able to </span><strong>develop and deploy dynamic, database-driven web applications</strong><span style=\"font-weight: 400;\">.</span></p>', '<ul style=\"list-style-type: circle;\">\r\n<li>Introduction to MERN Stack &amp; JavaScript ES6+</li>\r\n<li>React.js for Front-End Development</li>\r\n<li>Node.js &amp; Express.js for Back-End Development</li>\r\n<li>MongoDB &amp; NoSQL Database Management</li>\r\n<li>Building REST APIs &amp; Handling Authentication</li>\r\n<li>AI-Powered Web Development Tools</li>\r\n<li>Redux for State Management</li>\r\n<li>Testing, Debugging &amp; Performance Optimization</li>\r\n<li>Deploying Full-Stack Applications (AWS, Vercel, Netlify)</li>\r\n<li>Freelancing &amp; Career Guidance in MERN Stack Development</li>\r\n</ul>', '<ul style=\"list-style-type: circle;\">\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">React.js &amp; Redux</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Node.js &amp; Express.js</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">MongoDB &amp; Firebase</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Docker &amp; Kubernetes</li>\r\n</ul>', '<ul style=\"list-style-type: circle;\">\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Aspiring Web Developers</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Software Engineers &amp; Programmers</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Freelancers &amp; Entrepreneurs</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Students Interested in Full-Stack Development</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">UI/UX Designers Looking to Learn Coding</li>\r\n</ul>', '<p><span style=\"font-weight: 400;\">With the </span><strong>increasing demand for web applications</strong><span style=\"font-weight: 400;\">, MERN Stack developers are in high demand. This course prepares students for roles in </span><strong>full-stack development, web application design, and cloud-based app development</strong><span style=\"font-weight: 400;\">.</span></p>', '<ul style=\"list-style-type: circle;\">\r\n<li>Full-Stack Developer</li>\r\n<li>React Developer</li>\r\n<li>Node.js Developer</li>\r\n<li>Software Engineer</li>\r\n<li>Freelance Web Developer</li>\r\n</ul>', '<ul style=\"list-style-type: circle;\">\r\n<li style=\"font-weight: 400;\" aria-level=\"1\"><strong>Live Coding Sessions:</strong><span style=\"font-weight: 400;\"> Learn full-stack development through practical coding exercises.</span></li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\"><strong>Real-World Project Development:</strong><span style=\"font-weight: 400;\"> Work on full-stack applications for portfolio building.</span></li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\"><strong>AI-Powered Development Tools:</strong><span style=\"font-weight: 400;\"> Implement automation for faster coding and debugging.</span></li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\"><strong>Freelancing &amp; Career Development:</strong><span style=\"font-weight: 400;\"> Get guidance on securing projects and jobs.</span></li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\"><strong>Job Placement &amp; Networking Opportunities:</strong><span style=\"font-weight: 400;\"> Connect with </span><strong>leading tech companies</strong><span style=\"font-weight: 400;\">.</span></li>\r\n</ul>', 'e-learning-and-earning-ltd-799766-Marn-stack-development.jpg', ''),
(29, 16, 140, 'Python Django', '', 'Turn Your Passion into a Python Developer', 1, 'python-django', '', '', '5 ', '50', '25+', '', '', '<p><span style=\"font-weight: 400;\">Python is one of the </span><strong>most popular programming languages</strong><span style=\"font-weight: 400;\">, widely used in </span><strong>web development, AI, and data science</strong><span style=\"font-weight: 400;\">. Django, a </span><strong>high-level Python framework</strong><span style=\"font-weight: 400;\">, enables developers to build secure, scalable, and efficient web applications.</span></p>\r\n<p><span style=\"font-weight: 400;\">This course is designed for individuals looking to </span><strong>master back-end development using Python and Django</strong><span style=\"font-weight: 400;\">. Learn to </span><strong>develop dynamic, database-driven web applications</strong><span style=\"font-weight: 400;\">. </span><strong>Enroll today and start building professional web apps!</strong></p>', '', '<p><span style=\"font-weight: 400;\">This course provides step-by-step guidance in </span><strong>Python programming, Django framework, API development, and cloud deployment</strong><span style=\"font-weight: 400;\">. Students will work on </span><strong>real-world projects, including e-commerce platforms, dashboards, and automation tools</strong><span style=\"font-weight: 400;\">.</span></p>\r\n<p><span style=\"font-weight: 400;\">By the end of the course, students will be able to </span><strong>design and deploy full-stack web applications with Django</strong><span style=\"font-weight: 400;\">.</span></p>', '<ul style=\"list-style-type: circle;\">\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Introduction to Python &amp; Django</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Django Models &amp; ORM for Database Management</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Building RESTful APIs with Django REST Framework</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Authentication &amp; User Management</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">AI Tools for Web Development &amp; Automation</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Deploying Django Apps on Cloud (AWS, Heroku)</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Performance Optimization &amp; Security Best Practices</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Integrating Payment Gateways &amp; E-commerce Features</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Testing &amp; Debugging Django Applications</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Freelancing &amp; Job Placement Strategies</li>\r\n</ul>', '<ul style=\"list-style-type: circle;\">\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Python &amp; Django</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">PostgreSQL &amp; SQLite</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Django REST Framework</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">AI-Based Coding Assistants (ChatGPT, Copilot)</li>\r\n</ul>', '<ul style=\"list-style-type: circle;\">\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Aspiring Web Developers</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Python Programmers &amp; Software Engineers</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Freelancers in Web Development</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Students Interested in Back-End Development</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Entrepreneurs Looking to Build Scalable Web Apps</li>\r\n</ul>', '<p><span style=\"font-weight: 400;\">With businesses transitioning to </span><strong>scalable web solutions</strong><span style=\"font-weight: 400;\">, Django developers are in </span><strong>high demand globally</strong><span style=\"font-weight: 400;\">.</span></p>', '<ul style=\"list-style-type: circle;\">\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Python Developer</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Django Web Developer</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Back-End Engineer</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">API Developer</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Freelance Web Developer</li>\r\n</ul>', '<ul style=\"list-style-type: circle;\">\r\n<li style=\"font-weight: 400;\" aria-level=\"1\"><strong>Live Coding Sessions:</strong><span style=\"font-weight: 400;\"> Learn Python &amp; Django with real-time projects.</span></li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\"><strong>Hands-On Web Development Projects:</strong><span style=\"font-weight: 400;\"> Build professional applications.</span></li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\"><strong>AI-Powered Development Tools:</strong><span style=\"font-weight: 400;\"> Automate coding with AI-assisted solutions.</span></li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\"><strong>Freelancing &amp; Job Placement Support:</strong><span style=\"font-weight: 400;\"> Get connected with </span><strong>tech companies and clients</strong><span style=\"font-weight: 400;\">.</span></li>\r\n</ul>', 'e-learning-and-earning-ltd-503685-python-django.jpg', ''),
(30, 16, 140, 'Python Machine Learning', '', 'Turn Your Passion into an AI & Data Science Expert', 1, 'python-machine-learning', '', '', '6 ', '60', '30+', '', '', '<p><span style=\"color: #0af51a;\"><span style=\"font-weight: 400;\">Machine Learning (ML) is transforming industries by enabling </span><strong>automation, predictive analytics, and AI-driven solutions</strong><span style=\"font-weight: 400;\">. With Python being the </span><strong>most widely used language for ML</strong><span style=\"font-weight: 400;\">, professionals skilled in </span><strong>AI development</strong><span style=\"font-weight: 400;\"> are in high demand.</span></span></p>\r\n<p><span style=\"color: #0af51a;\"><span style=\"font-weight: 400;\">This course is designed for individuals looking to </span><strong>build, train, and deploy AI models using Python</strong><span style=\"font-weight: 400;\">. Learn to </span><strong>analyze data, create predictive models, and work with neural networks</strong><span style=\"font-weight: 400;\">. </span><strong>Enroll today and become an AI professional!</strong></span></p>', '', '<p><span style=\"color: #2dc26b;\"><span style=\"font-weight: 400;\">This course provides in-depth training in </span><strong>data analysis, machine learning algorithms, and AI automation tools</strong><span style=\"font-weight: 400;\">. Students will gain hands-on experience in </span><strong>training and deploying machine learning models</strong><span style=\"font-weight: 400;\">.</span></span></p>\r\n<p><span style=\"color: #2dc26b;\"><span style=\"font-weight: 400;\">By the end of the course, students will be able to </span><strong>design AI-driven applications and work on real-world data science projects</strong><span style=\"font-weight: 400;\">.</span></span></p>', '<ul style=\"list-style-type: circle;\">\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Introduction to Machine Learning &amp; AI</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Python for Data Science &amp; ML</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Supervised &amp; Unsupervised Learning Techniques</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Deep Learning &amp; Neural Networks</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">AI-Based Predictive Analytics</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Natural Language Processing (NLP) &amp; Chatbots</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Data Visualization &amp; Model Optimization</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">AI Tools for Business Automation</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Deploying Machine Learning Models (AWS, Google Cloud)</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Freelancing &amp; Job Placement Strategies</li>\r\n</ul>', '<ul style=\"list-style-type: circle;\">\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Python &amp; TensorFlow</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Scikit-Learn &amp; Pandas</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Google Colab &amp; Jupyter Notebooks</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">AI-Based Development Tools (OpenAI, Hugging Face)</li>\r\n</ul>', '<ul style=\"list-style-type: circle;\">\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Data Scientists &amp; AI Engineers</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Python Programmers &amp; Developers</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Freelancers in AI &amp; ML</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Students Interested in Data Analytics</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Entrepreneurs Looking to Implement AI in Business</li>\r\n</ul>', '', '', '', 'e-learning-and-earning-ltd-951610-python-machine learning.jpg', ''),
(31, 17, 140, 'Adobe Photoshop', '', 'Professional Image Editor', 1, 'adobe-photoshop', '', '', '4 ', '50', '30+', '', '', '<p><span style=\"color: #0945e0;\"><span style=\"font-weight: 400;\">Adobe Photoshop is the industry standard for </span><strong>photo editing, graphic design, and digital art</strong><span style=\"font-weight: 400;\">. Whether you want to become a </span><strong>professional photo editor, branding expert, or content creator</strong><span style=\"font-weight: 400;\">, mastering Photoshop is essential.</span></span></p>\r\n<p><span style=\"color: #0945e0;\"><span style=\"font-weight: 400;\">This course is designed for individuals looking to </span><strong>enhance images, create stunning visuals, and design professional graphics</strong><span style=\"font-weight: 400;\">. Learn how to use Photoshop&rsquo;s advanced tools for </span><strong>photo retouching, digital painting, compositing, and AI-assisted editing</strong><span style=\"font-weight: 400;\">. </span><strong>Enroll now and transform your creativity into professional skills!</strong></span></p>', '', '<p><span style=\"font-weight: 400;\">This course offers in-depth training on </span><strong>photo enhancement, creative composition, and digital design</strong><span style=\"font-weight: 400;\">. Students will learn to use </span><strong>Photoshop&rsquo;s latest AI-powered features</strong><span style=\"font-weight: 400;\"> for </span><strong>image restoration, object removal, and automatic color correction</strong><span style=\"font-weight: 400;\">.</span></p>\r\n<p><span style=\"font-weight: 400;\">By the end of the course, students will be able to </span><strong>edit professional images, create visual effects, and design graphics</strong><span style=\"font-weight: 400;\"> for marketing, branding, and digital media.</span></p>', '<ul style=\"list-style-type: circle;\">\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Introduction to Adobe Photoshop</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Photo Retouching &amp; Restoration</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Color Grading &amp; Image Enhancement</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">AI Tools for Smart Editing</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Layering, Masking &amp; Blending Modes</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Creative Photo Manipulation &amp; Compositing</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Typography &amp; Graphic Design Elements</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Product &amp; Branding Design</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Social Media Content &amp; Ad Design</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Portfolio Development &amp; Freelancing</li>\r\n</ul>', '<ul style=\"list-style-type: circle;\">\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Adobe Photoshop</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Adobe Lightroom</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Canva</li>\r\n</ul>', '<ul style=\"list-style-type: circle;\">\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Photographers &amp; Retouchers</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Graphic Designers</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Digital Marketers &amp; Content Creators</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Social Media Managers</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Freelancers in Photo Editing</li>\r\n</ul>', '<p><span style=\"font-weight: 400;\">With the increasing need for </span><strong>high-quality visuals in digital marketing, branding, and social media</strong><span style=\"font-weight: 400;\">, Photoshop experts are in demand. This course prepares students for careers in </span><strong>photo editing, content design, and digital advertising</strong><span style=\"font-weight: 400;\">. Graduates can work in </span><strong>media agencies, fashion photography, branding firms, or as freelance Photoshop artists</strong><span style=\"font-weight: 400;\">.</span></p>', '<ul style=\"list-style-type: circle;\">\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Photo Editor</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Graphic Designer</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Digital Retouching Artist</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Marketing Visual Designer</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Image Manipulation Specialist</li>\r\n</ul>', '<ul style=\"list-style-type: circle;\">\r\n<li style=\"font-weight: 400;\" aria-level=\"1\"><strong>Live Online Sessions:</strong><span style=\"font-weight: 400;\"> Learn Photoshop from experienced professionals.</span></li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\"><strong>Real-World Editing Projects:</strong><span style=\"font-weight: 400;\"> Work on professional-grade photo enhancements.</span></li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\"><strong>AI-Assisted Editing Techniques:</strong><span style=\"font-weight: 400;\"> Use automation to streamline workflows.</span></li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\"><strong>Freelancing &amp; Portfolio Building:</strong><span style=\"font-weight: 400;\"> Get expert guidance on attracting global clients.</span></li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\"><strong>Job Assistance &amp; Career Support:</strong><span style=\"font-weight: 400;\"> Connect with industry professionals and recruiters.</span></li>\r\n</ul>', 'e-learning-and-earning-ltd-705007-adobe-photoshop.jpg', ''),
(32, 17, 140, 'Digital Image Editing', '', 'Turn Your Passion into a Professional Image Editor', 1, 'digital-image-editing', '', '', '4 ', '40', '25+', '', '', '<p><span style=\"font-weight: 400;\">Digital image editing is an essential skill for </span><strong>photographers, graphic designers, and marketing professionals</strong><span style=\"font-weight: 400;\">. With the increasing demand for high-quality visuals in branding and advertising, mastering image enhancement techniques is crucial.</span></p>\r\n<p><span style=\"font-weight: 400;\">This course is designed for individuals who want to </span><strong>refine their skills in photo retouching, color correction, and creative image manipulation</strong><span style=\"font-weight: 400;\">. Learn to use </span><strong>industry-standard editing tools and AI-powered features</strong><span style=\"font-weight: 400;\"> to create stunning visuals. </span><strong>Enroll today and enhance your digital editing expertise!</strong></p>', '', '<p><span style=\"font-weight: 400;\">This course provides hands-on training in </span><strong>photo enhancement, restoration, and creative editing techniques</strong><span style=\"font-weight: 400;\">. Students will learn how to </span><strong>optimize images for web, print, and advertising purposes</strong><span style=\"font-weight: 400;\"> while leveraging AI tools to </span><strong>improve workflow efficiency</strong><span style=\"font-weight: 400;\">.</span></p>\r\n<p><span style=\"font-weight: 400;\">By the end of the course, students will be able to </span><strong>edit, retouch, and enhance images like a professional</strong><span style=\"font-weight: 400;\"> while building a strong portfolio.</span></p>', '<ul style=\"list-style-type: circle;\">\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Fundamentals of Digital Image Editing</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Photo Retouching &amp; Restoration</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Color Grading &amp; Enhancement</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">AI Tools for Smart Editing</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Creative Photo Manipulation &amp; Effects</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Removing Objects &amp; Background Editing</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Optimizing Images for Web &amp; Print</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Advanced Layering &amp; Masking Techniques</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Portfolio Development &amp; Freelancing</li>\r\n</ul>', '<ul style=\"list-style-type: circle;\">\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Adobe Photoshop</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Adobe Lightroom</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">GIMP</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">AI-Based Image Enhancement Tools</li>\r\n</ul>', '<ul style=\"list-style-type: circle;\">\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Photographers &amp; Retouchers</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Graphic Designers</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Digital Marketers &amp; Content Creators</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Social Media Managers</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Freelancers in Image Editing</li>\r\n</ul>', '<p><span style=\"font-weight: 400;\">With businesses prioritizing high-quality </span><strong>visual content</strong><span style=\"font-weight: 400;\">, digital image editors are highly sought after. This course prepares students for careers in </span><strong>photo editing, graphic design, and advertising</strong><span style=\"font-weight: 400;\">. Graduates can work in </span><strong>media agencies, creative studios, or as freelance photo editors</strong><span style=\"font-weight: 400;\">.</span></p>', '<ul style=\"list-style-type: circle;\">\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Photo Editor</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Digital Retouching Artist</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Graphic Designer</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Image Manipulation Specialist</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Visual Content Creator</li>\r\n</ul>', '<ul style=\"list-style-type: circle;\">\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Live Online Training:<span style=\"font-weight: 400;\"> Learn digital image editing from expert professionals.</span></li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Real-World Editing Projects:<span style=\"font-weight: 400;\"> Work on high-quality visuals for different industries.</span></li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">AI-Powered Editing Tools:<span style=\"font-weight: 400;\"> Enhance efficiency with automation features.</span></li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Freelancing &amp; Portfolio Development:<span style=\"font-weight: 400;\"> Get expert guidance on building a career.</span></li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Job Assistance &amp; Career Support:<span style=\"font-weight: 400;\"> Connect with agencies and clients worldwide.</span></li>\r\n</ul>', 'e-learning-and-earning-ltd-694247-digital-image editing.jpg', ''),
(33, 17, 140, 'Digital Product Design', '', 'Turn Your Passion into a Digital Product Designer', 1, 'digital-product-design', '', '', '4 ', '45', '25+', '', '', '<p><span style=\"font-weight: 400;\">Digital product design is at the heart of </span><strong>UI/UX, app development, and web platforms</strong><span style=\"font-weight: 400;\">. Businesses rely on </span><strong>seamless user experiences and visually appealing digital products</strong><span style=\"font-weight: 400;\"> to attract and retain customers.</span></p>\r\n<p><span style=\"font-weight: 400;\">This course is designed for individuals who want to </span><strong>create stunning digital interfaces and improve user experiences</strong><span style=\"font-weight: 400;\">. Learn to design </span><strong>websites, mobile apps, and digital experiences</strong><span style=\"font-weight: 400;\"> that drive engagement. </span><strong>Enroll today and start building intuitive, user-friendly digital products!</strong></p>', '', '<p><span style=\"font-weight: 400;\">This course provides comprehensive training on </span><strong>UI/UX principles, wireframing, prototyping, and AI-assisted design</strong><span style=\"font-weight: 400;\">. Students will work on real-world </span><strong>digital products, mobile app interfaces, and responsive web designs</strong><span style=\"font-weight: 400;\">.</span></p>\r\n<p><span style=\"font-weight: 400;\">By the end of the course, students will be able to </span><strong>design interactive digital products that meet user needs</strong><span style=\"font-weight: 400;\"> and build a strong portfolio.</span></p>', '<ul style=\"list-style-type: circle;\">\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Fundamentals of Digital Product Design</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">User Research &amp; UX Design Principles</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Wireframing &amp; Prototyping</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">AI Tools for UI/UX Design</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">App &amp; Web Interface Design</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Designing for Accessibility &amp; Usability</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Typography, Color Theory &amp; Visual Hierarchy</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Figma &amp; Adobe XD for Product Design</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Portfolio Development &amp; Career Guidance</li>\r\n</ul>', '<ul style=\"list-style-type: circle;\">\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Figma</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Adobe XD</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Sketch</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">AI-Powered Design Tools</li>\r\n</ul>', '<ul style=\"list-style-type: circle;\">\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">UI/UX Designers</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Graphic Designers</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">App &amp; Web Developers</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Freelancers in Digital Design</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Students Interested in Product Design</li>\r\n</ul>', '', '', '', 'e-learning-and-earning-ltd-476642-digital-product-desing.jpg', ''),
(34, 17, 140, 'Diploma in Graphics and Animation', '', '. Turn Your Passion into a Graphics & Animation Expert', 1, 'diploma-in-graphics-and-animation', '', '', '8 ', '70', '45+', '', '', '<p><span style=\"font-weight: 400;\">Graphics and animation are at the core of </span><strong>branding, entertainment, gaming, and advertising</strong><span style=\"font-weight: 400;\">. With the increasing demand for </span><strong>creative content</strong><span style=\"font-weight: 400;\">, skilled designers and animators are </span><strong>highly valued</strong><span style=\"font-weight: 400;\">.</span></p>\r\n<p><span style=\"font-weight: 400;\">This diploma course is designed for individuals looking to </span><strong>master graphic design, motion graphics, and 3D animation</strong><span style=\"font-weight: 400;\">. Learn to </span><strong>create stunning visuals, dynamic animations, and compelling brand stories</strong><span style=\"font-weight: 400;\">. </span><strong>Enroll today and bring your creative ideas to life!</strong></p>', '', '<p><span style=\"font-weight: 400;\">This course provides </span><strong>hands-on training in graphic design, motion graphics, and animation</strong><span style=\"font-weight: 400;\">. Students will work on </span><strong>real-world projects</strong><span style=\"font-weight: 400;\"> for </span><strong>branding, film production, gaming, and digital marketing</strong><span style=\"font-weight: 400;\">.</span></p>\r\n<p><span style=\"font-weight: 400;\">By the end of the course, students will be able to </span><strong>design and animate professional visuals for various industries</strong><span style=\"font-weight: 400;\">.</span></p>', '<ul style=\"list-style-type: circle;\">\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Fundamentals of Graphic Design &amp; Visual Communication</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Adobe Photoshop &amp; Illustrator for Branding</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Typography &amp; Color Theory</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">2D Animation with Adobe After Effects</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Motion Graphics &amp; Video Editing</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">3D Animation with Blender &amp; Maya</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">AI Tools for Creative Design &amp; Animation</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Storyboarding &amp; Character Animation</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Visual Effects (VFX) &amp; Cinematic Techniques</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Portfolio Development &amp; Career Guidance</li>\r\n</ul>', '<ul style=\"list-style-type: circle;\">\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Adobe Photoshop &amp; Illustrator</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Adobe After Effects &amp; Premiere Pro</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Blender &amp; Autodesk Maya</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">AI-Based Design &amp; Animation Tools</li>\r\n</ul>', '<ul style=\"list-style-type: circle;\">\r\n<li>Graphic Designers &amp; Animators</li>\r\n<li>Video Editors &amp; Motion Artists</li>\r\n<li>Game Developers &amp; Filmmakers</li>\r\n<li>Freelancers in Graphics &amp; Animation</li>\r\n<li>Students Interested in Creative Design</li>\r\n</ul>', '', '', '', 'e-learning-and-earning-ltd-235368-diploma-in-graphic-&-animation.jpg', ''),
(35, 17, 140, 'Motion Graphics', '', 'Turn Your Passion into a Motion Graphics Specialist', 1, 'motion-graphics', '', '', '5 ', '50', '30+', '', '', '<p><span style=\"font-weight: 400;\">Motion graphics bring </span><strong>visual storytelling to life</strong><span style=\"font-weight: 400;\"> by combining design, animation, and digital effects. With the </span><strong>growth of video content in advertising, social media, and film</strong><span style=\"font-weight: 400;\">, skilled motion designers are in high demand.</span></p>\r\n<p><span style=\"font-weight: 400;\">This course is designed for individuals looking to </span><strong>create professional motion graphics, animations, and video effects</strong><span style=\"font-weight: 400;\">. Learn to use industry-leading tools like </span><strong>Adobe After Effects and Cinema 4D</strong><span style=\"font-weight: 400;\"> to produce engaging visuals. </span><strong>Enroll today and start your journey in motion graphics!</strong></p>', '', '<p><span style=\"font-weight: 400;\">This course provides hands-on training in </span><strong>2D and 3D motion graphics, kinetic typography, VFX, and animation</strong><span style=\"font-weight: 400;\">. Students will gain expertise in </span><strong>creating animated visuals for commercials, social media, and film production</strong><span style=\"font-weight: 400;\">.</span></p>\r\n<p><span style=\"font-weight: 400;\">By the end of the course, students will be able to </span><strong>design and animate high-quality motion graphics for various media platforms</strong><span style=\"font-weight: 400;\">.</span></p>', '<ul>\r\n<li>Fundamentals of Motion Graphics &amp; Animation</li>\r\n<li>Adobe After Effects for 2D Motion Design</li>\r\n<li>Kinetic Typography &amp; Text Animation</li>\r\n<li>3D Motion Graphics with Cinema 4D</li>\r\n<li>Visual Effects (VFX) &amp; Compositing</li>\r\n<li>AI Tools for Motion Graphics &amp; Automation</li>\r\n<li>Video Editing &amp; Transitions for Social Media</li>\r\n<li>Sound Design &amp; Synchronization</li>\r\n<li>Rendering &amp; Exporting for Different Platforms</li>\r\n<li>Portfolio Development &amp; Freelancing Strategies</li>\r\n</ul>', '<ul>\r\n<li>Adobe After Effects</li>\r\n<li>Cinema 4D</li>\r\n<li>Adobe Premiere Pro</li>\r\n<li>AI-Based Animation Tools</li>\r\n</ul>', '<ul>\r\n<li>Graphic Designers &amp; Animators</li>\r\n<li>Video Editors &amp; Content Creators</li>\r\n<li>Digital Marketers &amp; Social Media Managers</li>\r\n<li>Freelancers in Motion Graphics</li>\r\n<li>Students Interested in Digital Animation</li>\r\n</ul>', '<p><span style=\"font-weight: 400;\">With video content dominating digital platforms, </span><strong>motion graphic artists</strong><span style=\"font-weight: 400;\"> are in high demand across industries like </span><strong>advertising, film, and social media marketing</strong><span style=\"font-weight: 400;\">.</span></p>', '<ul>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Motion Graphics Designer</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Video Editor &amp; Animator</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Visual Effects (VFX) Artist</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Digital Content Creator</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Freelance Motion Designer</li>\r\n</ul>', '<ul>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\"><strong>Live Animation Workshops:</strong><span style=\"font-weight: 400;\"> Learn motion graphics techniques from industry professionals.</span></li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\"><strong>Hands-On Projects:</strong><span style=\"font-weight: 400;\"> Work on </span><strong>real-world motion graphics and video effects</strong><span style=\"font-weight: 400;\">.</span></li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\"><strong>AI-Powered Design Automation:</strong><span style=\"font-weight: 400;\"> Use cutting-edge AI tools to streamline animation.</span></li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\"><strong>Freelancing &amp; Career Guidance:</strong><span style=\"font-weight: 400;\"> Get expert insights on securing projects and clients.</span></li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\"><strong>Job Placement &amp; Networking Support:</strong><span style=\"font-weight: 400;\"> Connect with leading </span><strong>design studios and agencies</strong><span style=\"font-weight: 400;\">.</span></li>\r\n</ul>', 'e-learning-and-earning-ltd-797115-motion-graphic.jpg', ''),
(36, 17, 140, 'Professional Graphic Design', 'featured ', 'Turn Your Passion into a Graphic Design Professional', 1, 'professional-graphic-design', '20000', '15400', '4', '60', '25', '', '', '<p><span style=\"font-weight: 400;\">Graphic design plays a </span><strong>critical role in branding, marketing, and digital content creation</strong><span style=\"font-weight: 400;\">. With businesses investing heavily in </span><strong>visual identity</strong><span style=\"font-weight: 400;\">, skilled graphic designers are highly sought after.</span></p>\r\n<p><span style=\"font-weight: 400;\">This course is designed for individuals looking to </span><strong>master design principles, branding, and digital content creation</strong><span style=\"font-weight: 400;\">. Learn to create </span><strong>logos, marketing materials, and user interfaces</strong><span style=\"font-weight: 400;\">. </span><strong>Enroll today and start your journey in professional graphic design!</strong></p>', '<p>sfs</p>', '<p><span style=\"font-weight: 400;\">This course provides hands-on training in </span><strong>visual design, branding, and UI/UX design</strong><span style=\"font-weight: 400;\">. Students will work on </span><strong>real-world branding and advertising projects</strong><span style=\"font-weight: 400;\">.</span></p>\r\n<p><span style=\"font-weight: 400;\">By the end of the course, students will be able to </span><strong>design professional graphics for businesses and creative projects</strong><span style=\"font-weight: 400;\">.</span></p>', '<ul style=\"list-style-type: circle;\">\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Fundamentals of Graphic Design &amp; Visual Communication</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Typography &amp; Color Theory for Branding</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Logo &amp; Branding Design Principles</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Print &amp; Digital Media Design</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Social Media Graphics &amp; Advertising Creatives</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">AI Tools for Graphic Design &amp; Automation</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Packaging Design &amp; Mockups</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">UI/UX Design for Web &amp; Mobile</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Freelancing &amp; Portfolio Development</li>\r\n</ul>', '<ul style=\"list-style-type: circle;\">\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Adobe Photoshop &amp; Illustrator</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Adobe InDesign &amp; Figma</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Canva &amp; AI-Based Design Tools</li>\r\n</ul>', '<ul>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Graphic Designers &amp; Branding Specialists</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Social Media Marketers &amp; Content Creators</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Freelancers in Graphic Design</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Students Interested in Digital Design</li>\r\n</ul>', '<p><span style=\"font-weight: 400;\">With </span><strong>businesses investing in branding and digital presence</strong><span style=\"font-weight: 400;\">, graphic designers are in </span><strong>constant demand</strong><span style=\"font-weight: 400;\">.</span></p>', '<ul style=\"list-style-type: circle;\">\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Graphic Designer</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Brand Identity Designer</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Social Media Designer</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">UI/UX Designer</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Freelance Creative Designer</li>\r\n</ul>', '<p>sfsdf</p>', 'e-learning-and-earning-ltd-165475-professional-graphic-design.jpg', 'https://www.youtube.com/embed/SG-x64G7q7g?si=7FghsnG2OHHaq-er');
INSERT INTO `course` (`id`, `category_id`, `user_id`, `name`, `type`, `sub_name`, `status`, `slug`, `regular_price`, `discount_price`, `duration`, `total_semester`, `project`, `weekly`, `hours`, `details`, `carear_path`, `course_overview`, `course_curriculum`, `software`, `course_desinger`, `career_opportunities`, `job_position`, `exclusive_solution`, `userPic`, `video_link`) VALUES
(37, 17, 140, 'UX/UI Design', '', 'Turn Your Passion into a UX/UI Design Expert', 1, 'ux-ui-design', '', '', '5 ', '50', '30+', '', '', '<p><span style=\"font-weight: 400;\">User Experience (UX) and User Interface (UI) design are essential for </span><strong>creating intuitive, engaging, and visually appealing digital products</strong><span style=\"font-weight: 400;\">. Businesses rely on UX/UI designers to </span><strong>enhance user satisfaction and improve product usability</strong><span style=\"font-weight: 400;\">.</span></p>\r\n<p><span style=\"font-weight: 400;\">This course is designed for individuals looking to </span><strong>develop user-friendly digital experiences and stunning interfaces</strong><span style=\"font-weight: 400;\">. Learn </span><strong>wireframing, prototyping, and AI-enhanced UX strategies</strong><span style=\"font-weight: 400;\">. </span><strong>Enroll today and start designing the future of digital experiences!</strong></p>', '', '<p><span style=\"font-weight: 400;\">This course covers </span><strong>UI/UX principles, user research, and interactive design</strong><span style=\"font-weight: 400;\">. Students will work on </span><strong>real-world projects, creating mobile apps, websites, and digital platforms</strong><span style=\"font-weight: 400;\">.</span></p>\r\n<p><span style=\"font-weight: 400;\">By the end of the course, students will be able to </span><strong>design high-quality user interfaces and improve user experience with AI-driven tools</strong><span style=\"font-weight: 400;\">.</span></p>', '<ul style=\"list-style-type: circle;\">\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Introduction to UX/UI Design &amp; Human-Centered Design</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">User Research &amp; Journey Mapping</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Wireframing &amp; Prototyping Techniques</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">AI-Powered UX Research &amp; Design Optimization</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">UI Design Principles &amp; Visual Hierarchy</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Interaction Design &amp; Micro-Animations</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Figma &amp; Adobe XD for Digital Product Design</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Mobile &amp; Web UI/UX Best Practices</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Usability Testing &amp; A/B Testing Strategies</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Freelancing &amp; Job Opportunities in UX/UI Design</li>\r\n</ul>', '<ul style=\"list-style-type: circle;\">\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Figma &amp; Adobe XD</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Sketch &amp; InVision</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">AI-Based UX Research &amp; Design Tools</li>\r\n</ul>', '<ul style=\"list-style-type: circle;\">\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Graphic Designers &amp; Digital Artists</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">App &amp; Web Developers</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Entrepreneurs &amp; Product Designers</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Freelancers in UX/UI Design</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Students Interested in Digital Product Design</li>\r\n</ul>', '<p><span style=\"font-weight: 400;\">With </span><strong>companies prioritizing digital experience</strong><span style=\"font-weight: 400;\">, UX/UI designers are among the </span><strong>most in-demand professionals</strong><span style=\"font-weight: 400;\"> worldwide.</span></p>', '<ul style=\"list-style-type: circle;\">\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">UX/UI Designer</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Product Designer</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Interaction Designer</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Freelance UX Consultant</li>\r\n</ul>', '<ul style=\"list-style-type: circle;\">\r\n<li style=\"font-weight: 400;\" aria-level=\"1\"><strong>Live UX/UI Workshops:</strong><span style=\"font-weight: 400;\"> Learn from design experts.</span></li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\"><strong>Hands-On Product Design:</strong><span style=\"font-weight: 400;\"> Work on real-world digital interfaces.</span></li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\"><strong>AI-Powered UX Optimization Tools:</strong><span style=\"font-weight: 400;\"> Enhance user experiences with AI-driven solutions.</span></li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\"><strong>Freelancing &amp; Career Growth Support:</strong><span style=\"font-weight: 400;\"> Build a strong UX/UI portfolio.</span></li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\"><strong>Job Placement &amp; Networking:</strong><span style=\"font-weight: 400;\"> Connect with </span><strong>leading tech companies and startups</strong><span style=\"font-weight: 400;\">.</span></li>\r\n</ul>', 'e-learning-and-earning-ltd-680456-uxui-design.jpg', ''),
(38, 18, 140, 'Affiliate Marketing', '', 'Turn Your Passion into a Profitable Online Business', 1, 'affiliate-marketing', '', '', '4 ', '45', '20+', '', '', '<p><span style=\"font-weight: 400;\">Affiliate marketing is one of the most lucrative online business models, allowing individuals to earn passive income by promoting products and services. With the </span><strong>rise of digital commerce and influencer marketing</strong><span style=\"font-weight: 400;\">, affiliate marketing has become a </span><strong>multi-billion-dollar industry</strong><span style=\"font-weight: 400;\">.</span></p>\r\n<p><span style=\"font-weight: 400;\">This course is designed for individuals looking to build a </span><strong>successful affiliate marketing business</strong><span style=\"font-weight: 400;\">. Learn how to select profitable products, create high-converting content, and drive traffic using SEO, paid ads, and social media strategies. </span><strong>Enroll today and start earning through affiliate marketing!</strong></p>', '', '<p><span style=\"font-weight: 400;\">This course provides </span><strong>step-by-step guidance</strong><span style=\"font-weight: 400;\"> on setting up, managing, and scaling an affiliate marketing business. Students will learn </span><strong>proven strategies for generating commissions</strong><span style=\"font-weight: 400;\">, leveraging AI-powered tools for automation, and monetizing content across various platforms.</span></p>\r\n<p><span style=\"font-weight: 400;\">By the end of the course, students will be able to </span><strong>create, optimize, and scale their affiliate websites, YouTube channels, and social media campaigns</strong><span style=\"font-weight: 400;\"> to maximize earnings.</span></p>', '<ul style=\"list-style-type: circle;\">\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Introduction to Affiliate Marketing</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Choosing Profitable Niches &amp; Products</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Affiliate Networks &amp; Partner Programs</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Website &amp; Blog Setup for Affiliate Marketing</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">SEO Strategies for Organic Traffic</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Content Marketing &amp; High-Converting Copywriting</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Email Marketing &amp; Lead Generation</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Paid Advertising (Google Ads, Facebook Ads)</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">AI Tools for Automation &amp; Optimization</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Scaling &amp; Passive Income Strategies</li>\r\n</ul>', '<ul style=\"list-style-type: circle;\">\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Google Analytics &amp; Search Console</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">WordPress &amp; Elementor</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Ahrefs &amp; SEMrush</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Facebook &amp; Google Ads Manager</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">ChatGPT &amp; AI Copywriting Tools</li>\r\n</ul>', '<ul style=\"list-style-type: circle;\">\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Aspiring Entrepreneurs</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Bloggers &amp; Content Creators</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Freelancers &amp; Digital Marketers</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">YouTubers &amp; Social Media Influencers</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Anyone Interested in Passive Income</li>\r\n</ul>', '<p><span style=\"font-weight: 400;\">With </span><strong>affiliate marketing expanding globally</strong><span style=\"font-weight: 400;\">, individuals can build a full-time business or supplement their income. This course prepares students to </span><strong>generate consistent revenue through content creation, paid ads, and search engine optimization</strong><span style=\"font-weight: 400;\">. Graduates can </span><strong>become full-time affiliate marketers, digital marketing consultants, or content monetization strategists</strong><span style=\"font-weight: 400;\">.</span></p>', '<ul style=\"list-style-type: circle;\">\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Affiliate Marketer</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">SEO &amp; Content Marketing Strategist</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Paid Ads Specialist</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">E-commerce Affiliate Consultant</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">YouTube Monetization Expert</li>\r\n</ul>', '<ul style=\"list-style-type: circle;\">\r\n<li><strong>Live Online Training:</strong><span style=\"font-weight: 400;\"> Learn affiliate marketing strategies from industry experts.</span></li>\r\n<li><strong>Real-World Projects:</strong><span style=\"font-weight: 400;\"> Build an affiliate website and launch your first campaign.</span></li>\r\n<li><strong>AI-Powered Marketing Tools:</strong><span style=\"font-weight: 400;\"> Automate processes and improve performance.</span></li>\r\n<li><strong>Freelancing &amp; Business Growth:</strong><span style=\"font-weight: 400;\"> Get expert guidance on scaling affiliate earnings.</span></li>\r\n<li><strong>Job &amp; Networking Support:</strong><span style=\"font-weight: 400;\"> Connect with top affiliate networks and agencies.</span></li>\r\n</ul>', 'e-learning-and-earning-ltd-83027-affiliate-markteting.jpg', ''),
(39, 18, 140, 'Content Writing', '', 'Turn Your Passion into a Professional Writer', 1, 'content-writing', '', '', '3 ', '40', '15+', '', '', '<p><span style=\"font-weight: 400;\">Content writing is a fundamental skill for </span><strong>digital marketing, blogging, and brand communication</strong><span style=\"font-weight: 400;\">. As businesses compete for online visibility, </span><strong>high-quality content is essential</strong><span style=\"font-weight: 400;\"> for engaging audiences and driving conversions.</span></p>\r\n<p><span style=\"font-weight: 400;\">This course is designed for individuals looking to </span><strong>master the art of writing compelling articles, blogs, and marketing copy</strong><span style=\"font-weight: 400;\">. Learn to create content that ranks in </span><strong>search engines (SEO), converts readers, and builds authority</strong><span style=\"font-weight: 400;\">. </span><strong>Enroll today and start your journey in professional writing!</strong></p>', '', '<p><span style=\"font-weight: 400;\">This course covers </span><strong>writing techniques, SEO optimization, and AI-assisted content creation</strong><span style=\"font-weight: 400;\">. Students will gain hands-on experience in </span><strong>writing for different industries, audience engagement, and digital marketing</strong><span style=\"font-weight: 400;\">.</span></p>\r\n<p><span style=\"font-weight: 400;\">By the end of the course, students will be able to </span><strong>craft high-quality content, optimize it for SEO, and start a freelance writing career</strong><span style=\"font-weight: 400;\">.</span></p>', '<ul style=\"list-style-type: circle;\">\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Fundamentals of Content Writing</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">SEO Writing &amp; Keyword Optimization</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Copywriting for Marketing &amp; Branding</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Blogging &amp; Long-Form Content Creation</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Email Writing &amp; Social Media Content</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">AI Tools for Writing Assistance</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Editing &amp; Proofreading Techniques</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Writing for Different Industries</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Freelancing &amp; Client Acquisition</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Portfolio Development &amp; Career Guidance</li>\r\n</ul>', '<ul style=\"list-style-type: circle;\">\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Grammarly &amp; Hemingway Editor</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Google Docs &amp; Microsoft Word</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Ahrefs &amp; SEMrush (SEO Tools)</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">ChatGPT &amp; AI Content Generators</li>\r\n</ul>', '<ul style=\"list-style-type: circle;\">\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Aspiring Writers &amp; Bloggers</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Digital Marketers &amp; SEO Experts</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Entrepreneurs &amp; Business Owners</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Freelancers in Content Writing</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Students &amp; Professionals Looking to Improve Writing Skills</li>\r\n</ul>', '<p><span style=\"font-weight: 400;\">With the </span><strong>rise of content marketing and online businesses</strong><span style=\"font-weight: 400;\">, skilled content writers are in high demand. This course prepares students for careers in </span><strong>blogging, digital marketing, and professional copywriting</strong><span style=\"font-weight: 400;\">.</span></p>', '<ul style=\"list-style-type: circle;\">\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Content Writer</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">SEO Copywriter</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Digital Marketer</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Social Media Content Creator</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Freelance Blogger</li>\r\n</ul>', '<ul style=\"list-style-type: circle;\">\r\n<li style=\"font-weight: 400;\" aria-level=\"1\"><strong>Live Writing Workshops:</strong><span style=\"font-weight: 400;\"> Learn from professional content writers.</span></li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\"><strong>SEO &amp; AI Writing Techniques:</strong><span style=\"font-weight: 400;\"> Master writing strategies that drive traffic.</span></li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\"><strong>Freelancing &amp; Blogging Guidance:</strong><span style=\"font-weight: 400;\"> Start a career in content writing.</span></li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\"><strong>Editing &amp; Proofreading Skills:</strong><span style=\"font-weight: 400;\"> Enhance the </span><strong>quality and clarity</strong><span style=\"font-weight: 400;\"> of your writing.</span></li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\"><strong>Career Assistance &amp; Networking:</strong><span style=\"font-weight: 400;\"> Connect with </span><strong>clients and job opportunities</strong><span style=\"font-weight: 400;\">.</span></li>\r\n</ul>', 'e-learning-and-earning-ltd-844975-content-writing.jpg', ''),
(40, 18, 140, 'Digital Marketing', 'featured ', 'Turn Your Passion into a Digital Marketing Career', 1, 'digital-marketing', '', '', '6', '50', '30+', '', '', '<p><span style=\"font-weight: 400;\">Digital marketing is the backbone of modern businesses, enabling companies to </span><strong>expand their reach, generate leads, and drive sales</strong><span style=\"font-weight: 400;\">. As businesses shift online, </span><strong>skilled digital marketers</strong><span style=\"font-weight: 400;\"> are in high demand.</span></p>\r\n<p><span style=\"font-weight: 400;\">This course is designed for individuals who want to </span><strong>master SEO, social media marketing, PPC campaigns, and content strategy</strong><span style=\"font-weight: 400;\">. Gain hands-on experience with the latest </span><strong>digital marketing tools and strategies</strong><span style=\"font-weight: 400;\">. </span><strong>Enroll today and build a successful career in digital marketing!</strong></p>', '', '<p><span style=\"font-weight: 400;\">This course provides in-depth training on </span><strong>digital marketing fundamentals, data analytics, and AI-powered marketing tools</strong><span style=\"font-weight: 400;\">. Students will develop expertise in </span><strong>SEO, paid advertising, social media management, and conversion optimization</strong><span style=\"font-weight: 400;\">.</span></p>\r\n<p><span style=\"font-weight: 400;\">By the end of the course, students will be able to </span><strong>plan, execute, and optimize digital marketing campaigns for businesses and clients</strong><span style=\"font-weight: 400;\">.</span></p>', '<ul style=\"list-style-type: circle;\">\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Fundamentals of Digital Marketing</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Search Engine Optimization (SEO)</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Google Ads &amp; PPC Campaigns</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Social Media Marketing (Facebook, Instagram, LinkedIn, Twitter, TikTok)</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Email Marketing &amp; Lead Generation</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">AI Tools for Digital Marketing</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Content Marketing &amp; Copywriting</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">E-commerce &amp; Affiliate Marketing</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Data Analytics &amp; Performance Optimization</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Career Guidance &amp; Freelancing Strategies</li>\r\n</ul>', '<ul style=\"list-style-type: circle;\">\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Google Ads &amp; Analytics</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Facebook Ads Manager</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Ahrefs &amp; SEMrush (SEO Tools)</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">ChatGPT &amp; AI Marketing Automation</li>\r\n</ul>', '<ul style=\"list-style-type: circle;\">\r\n<li>Marketing Professionals</li>\r\n<li>Entrepreneurs &amp; Business Owners</li>\r\n<li>Social Media Managers</li>\r\n<li>Freelancers in Digital Marketing</li>\r\n<li>Students Interested in Online Business</li>\r\n</ul>', '<p><span style=\"font-weight: 400;\">With </span><strong>digital marketing being a key factor in business success</strong><span style=\"font-weight: 400;\">, professionals with digital expertise are highly sought after. This course prepares students for careers in </span><strong>SEO, PPC, content marketing, and social media management</strong><span style=\"font-weight: 400;\">.</span></p>', '<ul style=\"list-style-type: circle;\">\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Digital Marketing Specialist</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">SEO Manager</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Social Media Marketer</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Performance Marketer</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Content Strategist</li>\r\n</ul>', '<ul style=\"list-style-type: circle;\">\r\n<li style=\"font-weight: 400;\" aria-level=\"1\"><strong>Live Online Sessions:</strong><span style=\"font-weight: 400;\"> Learn digital marketing from industry professionals.</span></li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\"><strong>Real-World Project Experience:</strong><span style=\"font-weight: 400;\"> Work on live campaigns to gain practical skills.</span></li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\"><strong>AI-Powered Marketing Tools:</strong><span style=\"font-weight: 400;\"> Implement automation strategies for efficiency.</span></li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\"><strong>Freelancing &amp; Business Growth:</strong><span style=\"font-weight: 400;\"> Learn how to monetize digital marketing skills.</span></li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\"><strong>Job Placement &amp; Career Support:</strong><span style=\"font-weight: 400;\"> Get connected with hiring companies.</span></li>\r\n</ul>', '280289.jpg', ''),
(41, 18, 140, 'Diploma in Digital Marketing', 'featured ', 'Turn Your Passion into a Digital Marketing Expert', 1, 'diploma-in-digital-marketing', '', '', '6 ', '60', '35+', '', '', '<p><span style=\"font-weight: 400;\">Digital marketing is the </span><strong>driving force behind business growth and online success</strong><span style=\"font-weight: 400;\">. With more companies investing in </span><strong>SEO, social media, and paid advertising</strong><span style=\"font-weight: 400;\">, digital marketing expertise is in high demand worldwide.</span></p>\r\n<p><span style=\"font-weight: 400;\">This diploma course is designed for individuals looking to </span><strong>become full-stack digital marketing professionals</strong><span style=\"font-weight: 400;\">. Learn to </span><strong>develop marketing strategies, run high-converting campaigns, and analyze data for business growth</strong><span style=\"font-weight: 400;\">. </span><strong>Enroll today and start your journey toward digital marketing success!</strong></p>', '', '<p><span style=\"font-weight: 400;\">This course provides </span><strong>comprehensive training in SEO, PPC, content marketing, email automation, and AI-driven marketing techniques</strong><span style=\"font-weight: 400;\">. Students will gain hands-on experience in </span><strong>building, managing, and optimizing online campaigns</strong><span style=\"font-weight: 400;\">.</span></p>\r\n<p><span style=\"font-weight: 400;\">By the end of the course, students will be able to </span><strong>create, execute, and scale marketing strategies for businesses and clients</strong><span style=\"font-weight: 400;\">.</span></p>', '<ul style=\"list-style-type: circle;\">\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Fundamentals of Digital Marketing</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Search Engine Optimization (SEO) &amp; Keyword Research</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Google Ads &amp; Paid Advertising Strategies</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Social Media Marketing (Facebook, Instagram, LinkedIn, TikTok)</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Content Marketing &amp; Copywriting for Engagement</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Email Marketing &amp; Lead Generation</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">AI-Powered Marketing Automation</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">E-commerce &amp; Affiliate Marketing Strategies</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Data Analytics &amp; Performance Tracking</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Freelancing &amp; Job Placement Assistance</li>\r\n</ul>', '<ul style=\"list-style-type: circle;\">\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Google Ads &amp; Analytics</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Facebook Ads Manager</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Ahrefs &amp; SEMrush (SEO Tools)</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">ChatGPT &amp; AI Marketing Automation</li>\r\n</ul>', '<ul style=\"list-style-type: circle;\">\r\n<li>Aspiring Digital Marketers</li>\r\n<li>Entrepreneurs &amp; Business Owners</li>\r\n<li>Social Media Managers</li>\r\n<li>Freelancers in Digital Marketing</li>\r\n<li>Students Interested in Marketing &amp; Branding</li>\r\n</ul>', '<p><span style=\"font-weight: 400;\">With the rise of </span><strong>online businesses and brand marketing</strong><span style=\"font-weight: 400;\">, skilled digital marketers are essential. This course prepares students for careers in </span><strong>SEO, PPC, content strategy, and social media management</strong><span style=\"font-weight: 400;\">.</span></p>', '<ul style=\"list-style-type: circle;\">\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Digital Marketing Specialist</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">SEO Manager</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Social Media Marketer</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Performance Marketer</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Content Strategist</li>\r\n</ul>', '<ul style=\"list-style-type: circle;\">\r\n<li style=\"font-weight: 400;\" aria-level=\"1\"><strong>Live Online Training:</strong><span style=\"font-weight: 400;\"> Learn marketing techniques from industry experts.</span></li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\"><strong>Real-World Project Experience:</strong><span style=\"font-weight: 400;\"> Work on live campaigns to gain practical skills.</span></li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\"><strong>AI-Powered Marketing Strategies:</strong><span style=\"font-weight: 400;\"> Implement automation for higher efficiency.</span></li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\"><strong>Freelancing &amp; Business Development:</strong><span style=\"font-weight: 400;\"> Monetize your digital marketing skills.</span></li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\"><strong>Job Placement Support:</strong><span style=\"font-weight: 400;\"> Connect with hiring companies and agencies.</span></li>\r\n</ul>', 'e-learning-and-earning-ltd-290552-diploma-in-digital-marketing.jpg', ''),
(42, 18, 140, 'Google AdSense', '', 'Turn Your Passion into a Monetized Website Owner', 1, 'google-adsense', '', '', '3', '40', '20+', '', '', '<p><span style=\"font-weight: 400;\">Google AdSense is a powerful monetization tool that allows </span><strong>bloggers, website owners, and content creators</strong><span style=\"font-weight: 400;\"> to earn passive income from their platforms. As digital content consumption grows, </span><strong>earning through ads has never been easier</strong><span style=\"font-weight: 400;\">.</span></p>\r\n<p><span style=\"font-weight: 400;\">This course is designed for individuals looking to </span><strong>monetize their websites, blogs, or YouTube channels</strong><span style=\"font-weight: 400;\">. Learn </span><strong>how to create high-quality content, optimize ads, and increase revenue</strong><span style=\"font-weight: 400;\">. </span><strong>Enroll today and start generating income online!</strong></p>', '', '<p><span style=\"font-weight: 400;\">This course provides step-by-step guidance on </span><strong>setting up, optimizing, and scaling Google AdSense revenue</strong><span style=\"font-weight: 400;\">. Students will gain hands-on experience in </span><strong>SEO, keyword research, and traffic-building techniques</strong><span style=\"font-weight: 400;\">.</span></p>\r\n<p><span style=\"font-weight: 400;\">By the end of the course, students will be able to </span><strong>set up AdSense-approved websites and maximize their ad earnings</strong><span style=\"font-weight: 400;\">.</span></p>', '<ul style=\"list-style-type: circle;\">\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Introduction to Google AdSense &amp; Online Monetization</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Creating a Blog or Website for AdSense Approval</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">SEO Strategies for Increasing Organic Traffic</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Keyword Research &amp; Content Strategy</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Google Ad Placement Optimization</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">AI Tools for Content Creation &amp; Automation</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Traffic Growth via Social Media &amp; Paid Ads</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">AdSense Policy Compliance &amp; Avoiding Bans</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Scaling &amp; Diversifying Revenue Streams</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Freelancing &amp; Passive Income Strategies</li>\r\n</ul>', '<ul style=\"list-style-type: circle;\">\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Google AdSense Dashboard</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Google Analytics &amp; Search Console</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">SEO Tools (Ahrefs, SEMrush, Ubersuggest)</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">AI Writing Assistants (ChatGPT, Jasper AI)</li>\r\n</ul>', '<ul style=\"list-style-type: circle;\">\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Bloggers &amp; Content Creators</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Entrepreneurs &amp; Website Owners</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Freelancers in Content Monetization</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">YouTubers Looking to Maximize Ad Revenue</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Anyone Interested in Passive Income</li>\r\n</ul>', '<p><span style=\"font-weight: 400;\">With the </span><strong>rise of digital publishing and content-driven businesses</strong><span style=\"font-weight: 400;\">, professionals skilled in AdSense monetization are </span><strong>highly sought after</strong><span style=\"font-weight: 400;\">. This course prepares students to </span><strong>monetize websites, blogs, and online content</strong><span style=\"font-weight: 400;\">.</span></p>', '<ul style=\"list-style-type: circle;\">\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">AdSense Website Monetization Expert</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">SEO &amp; Content Strategist</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Ad Optimization Consultant</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Digital Content Publisher</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Freelance Monetization Specialist</li>\r\n</ul>', '<ul>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\"><strong>Live Online Training:</strong><span style=\"font-weight: 400;\"> Learn directly from AdSense revenue experts.</span></li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\"><strong>Real-World Website Monetization Projects:</strong><span style=\"font-weight: 400;\"> Build, optimize, and scale AdSense websites.</span></li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\"><strong>AI-Powered Content Tools:</strong><span style=\"font-weight: 400;\"> Automate content creation and SEO strategies.</span></li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\"><strong>Freelancing &amp; Passive Income Guidance:</strong><span style=\"font-weight: 400;\"> Monetize skills through client work.</span></li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\"><strong>Job Placement &amp; Digital Business Support:</strong><span style=\"font-weight: 400;\"> Get connected with agencies and platforms.</span></li>\r\n</ul>', 'e-learning-and-earning-ltd-768361-google-adsense.jpg', ''),
(43, 18, 140, 'Search Engine Optimization (SEO)', '', 'Turn Your Passion into an SEO Expert', 1, 'search-engine-optimization-seo-', '', '', '4', '50', '25+', '', '', '<p><span style=\"font-weight: 400;\">Search Engine Optimization (SEO) is essential for businesses looking to </span><strong>increase their online presence and drive organic traffic</strong><span style=\"font-weight: 400;\">. With search engines continuously evolving, </span><strong>SEO professionals</strong><span style=\"font-weight: 400;\"> are in high demand to optimize websites and improve rankings.</span></p>\r\n<p><span style=\"font-weight: 400;\">This course is designed for individuals looking to </span><strong>master SEO strategies, keyword research, on-page and off-page SEO, and AI-driven SEO tools</strong><span style=\"font-weight: 400;\">. Learn how to rank websites higher on </span><strong>Google, Bing, and other search engines</strong><span style=\"font-weight: 400;\">. </span><strong>Enroll today and start your journey in SEO mastery!</strong></p>', '', '<p><span style=\"font-weight: 400;\">This course covers </span><strong>fundamental and advanced SEO techniques</strong><span style=\"font-weight: 400;\">, focusing on </span><strong>search engine algorithms, ranking factors, and performance tracking</strong><span style=\"font-weight: 400;\">. Students will work on </span><strong>real-world SEO projects, including website audits, backlink building, and AI-based content optimization</strong><span style=\"font-weight: 400;\">.</span></p>\r\n<p><span style=\"font-weight: 400;\">By the end of the course, students will be able to </span><strong>optimize websites for better search visibility, implement effective SEO strategies, and drive traffic using organic methods</strong><span style=\"font-weight: 400;\">.</span></p>', '<ul style=\"list-style-type: circle;\">\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Introduction to SEO &amp; Search Engine Algorithms</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Keyword Research &amp; Content Optimization</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">On-Page &amp; Off-Page SEO Strategies</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Technical SEO &amp; Website Speed Optimization</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">AI-Powered SEO Tools &amp; Automation</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Local SEO &amp; Google My Business Optimization</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Link Building &amp; Backlink Analysis</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">SEO Analytics &amp; Performance Tracking (Google Analytics, Search Console)</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">E-commerce SEO &amp; Affiliate Marketing Strategies</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Freelancing &amp; Career Growth in SEO</li>\r\n</ul>', '<ul style=\"list-style-type: circle;\">\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Google Search Console &amp; Google Analytics</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">SEMrush &amp; Ahrefs</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Yoast SEO &amp; Rank Math</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">AI-Powered SEO Assistants</li>\r\n</ul>', '<ul style=\"list-style-type: circle;\">\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Digital Marketers &amp; SEO Enthusiasts</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Entrepreneurs &amp; Business Owners</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Freelancers &amp; Content Creators</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Students Interested in Search Engine Optimization</li>\r\n</ul>', '<p><span style=\"font-weight: 400;\">With businesses investing heavily in </span><strong>SEO and digital marketing</strong><span style=\"font-weight: 400;\">, professionals skilled in </span><strong>search engine optimization</strong><span style=\"font-weight: 400;\"> are in high demand worldwide.</span></p>', '<ul style=\"list-style-type: circle;\">\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">SEO Specialist</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">SEO Analyst</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Content Marketing Strategist</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Freelance SEO Consultant</li>\r\n</ul>', '<ul style=\"list-style-type: circle;\">\r\n<li style=\"font-weight: 400;\" aria-level=\"1\"><strong>Live SEO Training:</strong><span style=\"font-weight: 400;\"> Learn SEO techniques from industry experts.</span></li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\"><strong>Hands-On SEO Projects:</strong><span style=\"font-weight: 400;\"> Work on live website audits and optimization strategies.</span></li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\"><strong>AI-Powered SEO Tools:</strong><span style=\"font-weight: 400;\"> Utilize automation for advanced keyword research.</span></li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\"><strong>Freelancing &amp; Job Placement Support:</strong><span style=\"font-weight: 400;\"> Secure SEO clients and career opportunities.</span></li>\r\n</ul>', 'e-learning-and-earning-ltd-751541-search-engine-optimization(seo).jpg', ''),
(44, 18, 140, 'Social Media Marketing (SMM)', 'featured ', 'Turn Your Passion into a Social Media Marketing Expert', 1, 'social-media-marketing-smm-', '', '', '4 ', '50', '25+', '', '', '<p><span style=\"font-weight: 400;\">Social media platforms like </span><strong>Facebook, Instagram, LinkedIn, and TikTok</strong><span style=\"font-weight: 400;\"> dominate digital marketing. Brands and businesses </span><strong>rely on skilled marketers</strong><span style=\"font-weight: 400;\"> to create engaging content, run ads, and grow their online presence.</span></p>\r\n<p><span style=\"font-weight: 400;\">This course is designed for individuals looking to </span><strong>master social media marketing strategies, content creation, and paid advertising</strong><span style=\"font-weight: 400;\">. Learn how to </span><strong>manage campaigns, analyze performance, and use AI tools for automation</strong><span style=\"font-weight: 400;\">. </span><strong>Enroll today and start your journey as a social media marketing expert!</strong></p>', '', '<p><span style=\"font-weight: 400;\">This course provides training in </span><strong>social media management, paid advertising, and influencer marketing</strong><span style=\"font-weight: 400;\">. Students will gain hands-on experience in </span><strong>creating viral content, optimizing ad campaigns, and measuring analytics</strong><span style=\"font-weight: 400;\">.</span></p>\r\n<p><span style=\"font-weight: 400;\">By the end of the course, students will be able to </span><strong>develop and execute high-converting social media marketing strategies</strong><span style=\"font-weight: 400;\">.</span></p>', '<ul style=\"list-style-type: circle;\">\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Introduction to Social Media Marketing</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Content Creation &amp; Visual Storytelling</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Facebook, Instagram &amp; TikTok Ads Management</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">AI Tools for Social Media Automation</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Hashtag &amp; Engagement Strategies</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Influencer Marketing &amp; Brand Collaborations</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Social Media Analytics &amp; Performance Tracking</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">YouTube Growth Strategies &amp; Monetization</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Freelancing &amp; Business Growth in Social Media Marketing</li>\r\n</ul>', '<ul style=\"list-style-type: circle;\">\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Facebook &amp; Instagram Ads Manager</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Canva &amp; AI Content Generators</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Hootsuite &amp; Buffer for Social Media Scheduling</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">YouTube Studio &amp; TikTok Creator Tools</li>\r\n</ul>', '<ul style=\"list-style-type: circle;\">\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Social Media Managers &amp; Marketers</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Entrepreneurs &amp; Business Owners</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Freelancers in Social Media Marketing</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Students Interested in Digital Branding</li>\r\n</ul>', '<p><span style=\"font-weight: 400;\">With the </span><strong>rise of influencer marketing and digital advertising</strong><span style=\"font-weight: 400;\">, </span><strong>social media marketers</strong><span style=\"font-weight: 400;\"> are in high demand globally.</span></p>', '<ul style=\"list-style-type: circle;\">\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Social Media Manager</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Paid Ads Specialist</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Content Marketing Strategist</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Freelance Social Media Consultant</li>\r\n</ul>', '<ul style=\"list-style-type: circle;\">\r\n<li style=\"font-weight: 400;\" aria-level=\"1\"><strong>Live Social Media Strategy Training:</strong><span style=\"font-weight: 400;\"> Learn from digital marketing professionals.</span></li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\"><strong>Hands-On Campaigns &amp; Content Creation:</strong><span style=\"font-weight: 400;\"> Work on real-world brand marketing projects.</span></li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\"><strong>AI-Powered Social Media Automation:</strong><span style=\"font-weight: 400;\"> Leverage AI tools for scheduling and optimization.</span></li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\"><strong>Freelancing &amp; Business Growth Support:</strong><span style=\"font-weight: 400;\"> Get guidance on securing social media clients.</span></li>\r\n</ul>', 'e-learning-and-earning-ltd-973446-social-media-marketing(smm).jpg', ''),
(45, 19, 140, '3D Floor Plan', '', '3D Architectural Designer', 1, '3d-floor-plan', '', '', '4 ', '45', '20+', '', '', '<p><span style=\"font-weight: 400;\">3D floor planning is a crucial skill in architecture, interior design, and real estate. With the growing need for realistic property visualization, professionals skilled in 3D modeling and layout planning are in high demand. This course is designed for individuals who want to master architectural floor plan visualization and 3D modeling.</span></p>\r\n<p><span style=\"font-weight: 400;\">Learn to create detailed, professional-grade 3D layouts for residential and commercial spaces using industry-leading tools. Develop skills in space planning, material texturing, and rendering to produce high-quality, interactive floor plans. </span><strong>Enroll today and start creating stunning 3D designs!</strong></p>', '', '<p><span style=\"font-weight: 400;\">This course provides comprehensive training on architectural visualization, space optimization, and 3D modeling techniques. Through </span><strong>hands-on projects</strong><span style=\"font-weight: 400;\">, students will gain expertise in </span><strong>designing, rendering, and presenting</strong><span style=\"font-weight: 400;\"> high-quality floor plans. The curriculum includes </span><strong>AI-assisted tools</strong><span style=\"font-weight: 400;\"> to enhance precision and workflow efficiency.</span></p>\r\n<p><span style=\"font-weight: 400;\">By the end of the course, students will be able to create </span><strong>detailed 3D floor plans</strong><span style=\"font-weight: 400;\"> with accurate measurements, realistic materials, and professional presentations.</span></p>', '<ul style=\"list-style-type: circle;\">\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Fundamentals of 3D Floor Planning</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Architectural Visualization Techniques</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Understanding Space Planning &amp; Layouts</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">3D Modeling &amp; Structural Design</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Material Texturing &amp; Lighting Setup</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Rendering High-Quality Floor Plans</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">AI Tools for Smart 3D Design</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Creating Walkthrough &amp; Interactive Presentations</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Exporting and Finalizing 3D Floor Plans</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Portfolio Development for Clients &amp; Freelancing</li>\r\n</ul>', '<ul style=\"list-style-type: circle;\">\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">AutoCAD</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">SketchUp</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">3ds Max</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Blender</li>\r\n</ul>', '<ul style=\"list-style-type: circle;\">\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Architects</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Interior Designers</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Real Estate Professionals</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">3D Modelers &amp; Visualizers</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Freelancers in Architectural Design</li>\r\n</ul>', '<p><span style=\"font-weight: 400;\">The demand for </span><strong>3D floor planning professionals</strong><span style=\"font-weight: 400;\"> is increasing as businesses focus on </span><strong>realistic architectural visualization</strong><span style=\"font-weight: 400;\">. This course prepares students for </span><strong>careers in architectural design, interior planning, and real estate marketing</strong><span style=\"font-weight: 400;\">. Graduates can work in </span><strong>design firms, construction companies, or as freelance 3D artists</strong><span style=\"font-weight: 400;\">.</span></p>', '<ul style=\"list-style-type: circle;\">\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">3D Floor Plan Designer</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Architectural Visualizer</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Interior Designer</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">CAD Technician</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Real Estate 3D Artist</li>\r\n</ul>', '<ul style=\"list-style-type: circle;\">\r\n<li style=\"font-weight: 400;\" aria-level=\"1\"><strong>Online Live Batch:</strong><span style=\"font-weight: 400;\"> Learn 3D floor plan design from professional instructors.</span></li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\"><strong>Hands-On Project Training:</strong><span style=\"font-weight: 400;\"> Work on real-world architectural design projects.</span></li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\"><strong>AI-Powered Tools &amp; Automation:</strong><span style=\"font-weight: 400;\"> Implement AI features to speed up your workflow.</span></li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\"><strong>Freelancing &amp; Portfolio Development:</strong><span style=\"font-weight: 400;\"> Get expert guidance on attracting global clients.</span></li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\"><strong>Career Assistance &amp; Job Support:</strong><span style=\"font-weight: 400;\"> Receive networking opportunities and career mentorship.</span></li>\r\n</ul>', 'e-learning-and-earning-ltd-503096-3d-floor-plan.png', '');
INSERT INTO `course` (`id`, `category_id`, `user_id`, `name`, `type`, `sub_name`, `status`, `slug`, `regular_price`, `discount_price`, `duration`, `total_semester`, `project`, `weekly`, `hours`, `details`, `carear_path`, `course_overview`, `course_curriculum`, `software`, `course_desinger`, `career_opportunities`, `job_position`, `exclusive_solution`, `userPic`, `video_link`) VALUES
(47, 19, 140, 'Blender For Everyone', '', 'Turn Your Passion into a 3D Artist', 1, 'blender-for-everyone', '', '', '4', '50', '25+', '', '', '<p><span style=\"font-weight: 400;\">Blender is a powerful </span><strong>open-source 3D modeling, animation, and rendering software</strong><span style=\"font-weight: 400;\"> used in gaming, film production, and architectural visualization. Whether you\'re an aspiring 3D artist, animator, or game designer, mastering Blender opens up countless creative opportunities.</span></p>\r\n<p><span style=\"font-weight: 400;\">This course is designed for individuals looking to </span><strong>learn 3D modeling, sculpting, texturing, and animation</strong><span style=\"font-weight: 400;\">. Gain hands-on experience in </span><strong>character creation, environment design, and visual effects (VFX)</strong><span style=\"font-weight: 400;\">. </span><strong>Enroll today and start your journey in 3D creation!</strong></p>', '', '<p><span style=\"font-weight: 400;\">This course provides an </span><strong>in-depth understanding</strong><span style=\"font-weight: 400;\"> of Blender&rsquo;s tools and features, from </span><strong>basic modeling to advanced rendering techniques</strong><span style=\"font-weight: 400;\">. Students will work on real-world </span><strong>animation, game assets, and visual effects projects</strong><span style=\"font-weight: 400;\">.</span></p>\r\n<p><span style=\"font-weight: 400;\">By the end of the course, students will be able to </span><strong>create professional-grade 3D models, animations, and cinematic renderings</strong><span style=\"font-weight: 400;\">.</span></p>', '<ul style=\"list-style-type: circle;\">\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Introduction to Blender &amp; 3D Modeling Basics</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Polygonal Modeling &amp; Sculpting Techniques</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Texturing &amp; UV Mapping</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Lighting &amp; Rendering with Cycles &amp; Eevee</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Character Rigging &amp; Animation</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Physics Simulations &amp; Particle Effects</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">AI Tools for 3D Modeling &amp; Animation</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Game Asset Creation &amp; Exporting for Game Engines</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Cinematic Rendering &amp; Compositing</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Portfolio Development &amp; Freelancing</li>\r\n</ul>', '<ul style=\"list-style-type: circle;\">\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Blender</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Substance Painter</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">ZBrush</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Unreal Engine &amp; Unity</li>\r\n</ul>', '<ul style=\"list-style-type: circle;\">\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">3D Modelers &amp; Animators</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Game Developers &amp; Designers</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Architectural Visualizers</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Graphic Designers Interested in 3D</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Freelancers in 3D Art &amp; Animation</li>\r\n</ul>', '<p><span style=\"font-weight: 400;\">The </span><strong>demand for 3D artists and animators</strong><span style=\"font-weight: 400;\"> is rising in industries such as </span><strong>gaming, film, and virtual reality (VR)</strong><span style=\"font-weight: 400;\">. This course prepares students for roles in </span><strong>3D modeling, animation, and VFX production</strong><span style=\"font-weight: 400;\">. Graduates can work in </span><strong>gaming studios, animation houses, or as freelance 3D artists</strong><span style=\"font-weight: 400;\">.</span></p>', '<ul style=\"list-style-type: circle;\">\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">3D Modeler</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">3D Animator</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">VFX Artist</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Game Asset Designer</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Architectural Visualizer</li>\r\n</ul>', '<ul style=\"list-style-type: circle;\">\r\n<li style=\"font-weight: 400;\" aria-level=\"1\"><strong>Live Online Training:</strong><span style=\"font-weight: 400;\"> Learn Blender from professional 3D artists.</span></li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\"><strong>Hands-On 3D Projects:</strong><span style=\"font-weight: 400;\"> Work on </span><strong>real-world animations and models</strong><span style=\"font-weight: 400;\">.</span></li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\"><strong>AI-Assisted Modeling &amp; Rendering:</strong><span style=\"font-weight: 400;\"> Utilize AI tools for 3D creation.</span></li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\"><strong>Freelancing &amp; Portfolio Building:</strong><span style=\"font-weight: 400;\"> Get expert guidance on showcasing your work.</span></li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\"><strong>Career Assistance &amp; Job Support:</strong><span style=\"font-weight: 400;\"> Connect with recruiters and 3D industry professionals.</span></li>\r\n</ul>', 'e-learning-and-earning-ltd-556380-blender-for-everyone.png', ''),
(48, 19, 140, 'Interior and Exterior Design', '', 'Turn Your Passion into a Design & Architecture Expert', 1, 'interior-and-exterior-design', '', '', '5 Months', '50', '30+', '', '', '<p><span style=\"font-weight: 400;\">Interior and exterior design play a crucial role in </span><strong>architectural visualization, home improvement, and commercial space planning</strong><span style=\"font-weight: 400;\">. Businesses and homeowners rely on </span><strong>skilled designers</strong><span style=\"font-weight: 400;\"> to create functional and visually appealing spaces.</span></p>\r\n<p><span style=\"font-weight: 400;\">This course is designed for individuals looking to </span><strong>master interior and exterior design using industry-standard software</strong><span style=\"font-weight: 400;\">. Learn </span><strong>3D modeling, space planning, material selection, and rendering techniques</strong><span style=\"font-weight: 400;\">. </span><strong>Enroll today and bring your creative ideas to life!</strong></p>', '', '<p><span style=\"font-weight: 400;\">This course provides hands-on training in </span><strong>design principles, 3D visualization, and rendering</strong><span style=\"font-weight: 400;\">. Students will work on real-world </span><strong>residential and commercial design projects</strong><span style=\"font-weight: 400;\">.</span></p>\r\n<p><span style=\"font-weight: 400;\">By the end of the course, students will be able to </span><strong>design, visualize, and present professional interior and exterior spaces</strong><span style=\"font-weight: 400;\">.</span></p>', '<ul style=\"list-style-type: circle;\">\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Fundamentals of Interior &amp; Exterior Design</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Space Planning &amp; Layout Optimization</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">3D Modeling for Architecture &amp; Furniture</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Color Theory &amp; Material Selection</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Lighting &amp; Texturing Techniques</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">AI Tools for Smart Interior Planning</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Realistic Rendering &amp; Presentation Techniques</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Commercial &amp; Residential Design Concepts</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Virtual Staging &amp; Walkthrough Creation</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Freelancing &amp; Career Development in Interior Design</li>\r\n</ul>', '<ul style=\"list-style-type: circle;\">\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">AutoCAD &amp; SketchUp</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Blender &amp; 3ds Max</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Lumion &amp; V-Ray</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">AI-Driven Design Tools</li>\r\n</ul>', '<ul style=\"list-style-type: circle;\">\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Interior Designers &amp; Architects</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">3D Modelers &amp; Render Artists</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Real Estate Professionals</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Freelancers in Design &amp; Architecture</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Students Interested in Space Planning</li>\r\n</ul>', '', '', '', 'e-learning-and-earning-ltd-773462-Interior-and-exterior-design.png', ''),
(49, 19, 140, 'Professional 3D Animation', 'featured ', 'Turn Your Passion into a 3D Animation Professional', 1, 'professional-3d-animation', '', '', '6', '55', '35+', '', '', '<p><span style=\"font-weight: 400;\">3D animation is at the core of </span><strong>film, gaming, and digital entertainment</strong><span style=\"font-weight: 400;\">. As the demand for </span><strong>high-quality animated content grows</strong><span style=\"font-weight: 400;\">, 3D animators are in high demand.</span></p>\r\n<p><span style=\"font-weight: 400;\">This course is designed for individuals looking to </span><strong>create professional 3D animations, character designs, and visual effects</strong><span style=\"font-weight: 400;\">. Learn to </span><strong>model, rig, and animate</strong><span style=\"font-weight: 400;\"> using industry-standard tools. </span><strong>Enroll today and bring your creative visions to life!</strong></p>', '', '<p><span style=\"font-weight: 400;\">This course provides hands-on training in </span><strong>3D modeling, rigging, animation, and rendering</strong><span style=\"font-weight: 400;\">. Students will gain expertise in </span><strong>creating characters, environments, and cinematic animations</strong><span style=\"font-weight: 400;\">.</span></p>\r\n<p><span style=\"font-weight: 400;\">By the end of the course, students will be able to </span><strong>develop high-quality animated films, commercials, and game assets</strong><span style=\"font-weight: 400;\">.</span></p>', '<ul style=\"list-style-type: circle;\">\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Introduction to 3D Animation &amp; Character Design</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Polygonal Modeling &amp; Sculpting Techniques</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Texturing, Lighting &amp; Rendering for Realism</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Rigging &amp; Character Animation</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Physics Simulations &amp; Dynamic Effects</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">AI-Powered 3D Animation &amp; Automation</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Motion Capture &amp; Facial Animation</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Game Asset Creation &amp; Optimization</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Cinematic Storytelling &amp; Scene Composition</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Portfolio Development &amp; Career Guidance</li>\r\n</ul>', '<ul style=\"list-style-type: circle;\">\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Blender &amp; Autodesk Maya</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">ZBrush &amp; Substance Painter</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Cinema 4D &amp; Houdini</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">AI-Based 3D Animation Tools</li>\r\n</ul>', '<ul style=\"list-style-type: circle;\">\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">3D Modelers &amp; Animators</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Game Developers &amp; Designers</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Visual Effects (VFX) Artists</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Freelancers in Animation &amp; CGI</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Students Interested in Digital Animation</li>\r\n</ul>', '<p><span style=\"font-weight: 400;\">With industries like </span><strong>gaming, film, and advertising heavily relying on 3D animation</strong><span style=\"font-weight: 400;\">, skilled professionals are </span><strong>in high demand worldwide</strong><span style=\"font-weight: 400;\">.</span></p>', '<ul style=\"list-style-type: circle;\">\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">3D Animator</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Character Rigger &amp; Modeler</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Visual Effects (VFX) Artist</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Game Asset Designer</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Freelance 3D Artist</li>\r\n</ul>', '<ul style=\"list-style-type: circle;\">\r\n<li style=\"font-weight: 400;\" aria-level=\"1\"><strong>Live Animation Workshops:</strong><span style=\"font-weight: 400;\"> Learn 3D animation techniques from experts.</span></li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\"><strong>Hands-On Project-Based Learning:</strong><span style=\"font-weight: 400;\"> Work on </span><strong>real-world character designs and animations</strong><span style=\"font-weight: 400;\">.</span></li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\"><strong>AI-Powered Tools for Animation:</strong><span style=\"font-weight: 400;\"> Leverage automation for </span><strong>smoother workflows</strong><span style=\"font-weight: 400;\">.</span></li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\"><strong>Freelancing &amp; Career Guidance:</strong><span style=\"font-weight: 400;\"> Get expert insights on securing </span><strong>global animation projects</strong><span style=\"font-weight: 400;\">.</span></li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\"><strong>Job Placement &amp; Studio Networking:</strong><span style=\"font-weight: 400;\"> Connect with </span><strong>top animation studios</strong><span style=\"font-weight: 400;\">.</span></li>\r\n</ul>', 'e-learning-and-earning-ltd-571942-professional-3d-animation.jpg', ''),
(50, 20, 140, 'Cisco CCNA', '', 'Turn Your Passion into a Networking Specialist', 1, 'cisco-ccna', '', '', '5', '55', '20+', '', '', '<p><span style=\"font-weight: 400;\">Cisco Certified Network Associate (</span><strong>CCNA</strong><span style=\"font-weight: 400;\">) is one of the most recognized certifications in </span><strong>IT networking and security</strong><span style=\"font-weight: 400;\">. As companies expand their digital infrastructure, networking professionals are </span><strong>highly sought after</strong><span style=\"font-weight: 400;\">.</span></p>\r\n<p><span style=\"font-weight: 400;\">This course is designed for individuals looking to </span><strong>gain expertise in networking, routing, switching, and cybersecurity</strong><span style=\"font-weight: 400;\">. Learn how to </span><strong>configure, troubleshoot, and secure enterprise-level networks</strong><span style=\"font-weight: 400;\">. </span><strong>Enroll today and build a strong career in networking!</strong></p>', '', '<p><span style=\"font-weight: 400;\">This course provides a </span><strong>detailed understanding</strong><span style=\"font-weight: 400;\"> of networking fundamentals, security protocols, and infrastructure management. Students will work on </span><strong>real-world network setups, troubleshooting, and configuration projects</strong><span style=\"font-weight: 400;\">.</span></p>\r\n<p><span style=\"font-weight: 400;\">By the end of the course, students will be able to </span><strong>design, implement, and manage secure and scalable networks</strong><span style=\"font-weight: 400;\">.</span></p>', '<ul style=\"list-style-type: circle;\">\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Networking Fundamentals &amp; TCP/IP Protocols</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Cisco Router &amp; Switch Configuration</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Subnetting &amp; VLAN Management</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Network Security &amp; Firewall Configuration</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Wireless Networking &amp; VPN Technologies</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">AI Tools for Network Automation</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Troubleshooting &amp; Network Optimization</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Cloud Networking &amp; Virtualization</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Network Monitoring &amp; Performance Analysis</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">CCNA Exam Preparation &amp; Career Guidance</li>\r\n</ul>', '<ul style=\"list-style-type: circle;\">\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Cisco Packet Tracer</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Wireshark</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">GNS3 &amp; EVE-NG</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Cloud Networking Tools (AWS, Azure)</li>\r\n</ul>', '<ul style=\"list-style-type: circle;\">\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Network Engineers &amp; IT Professionals</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">System Administrators</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Cybersecurity Enthusiasts</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Cloud Computing Specialists</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Freelancers in Networking Services</li>\r\n</ul>', '<p><span style=\"font-weight: 400;\">With networking being a </span><strong>core component of IT infrastructure</strong><span style=\"font-weight: 400;\">, CCNA-certified professionals can work in </span><strong>enterprises, service providers, and cybersecurity firms</strong><span style=\"font-weight: 400;\">. This course prepares students for roles in </span><strong>network engineering, administration, and security</strong><span style=\"font-weight: 400;\">.</span></p>', '<ul style=\"list-style-type: circle;\">\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Network Engineer</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">System Administrator</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Cybersecurity Analyst</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Cloud Network Engineer</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">IT Support Specialist</li>\r\n</ul>', '<ul style=\"list-style-type: circle;\">\r\n<li style=\"font-weight: 400;\" aria-level=\"1\"><strong>Live Hands-On Training:</strong><span style=\"font-weight: 400;\"> Gain experience with Cisco networking equipment.</span></li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\"><strong>Real-World Configuration Projects:</strong><span style=\"font-weight: 400;\"> Work on </span><strong>practical networking scenarios</strong><span style=\"font-weight: 400;\">.</span></li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\"><strong>AI-Driven Network Automation:</strong><span style=\"font-weight: 400;\"> Learn how AI optimizes networking tasks.</span></li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\"><strong>Certification Guidance &amp; Exam Prep:</strong><span style=\"font-weight: 400;\"> Get fully prepared for the CCNA exam.</span></li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\"><strong>Job Assistance &amp; Career Networking:</strong><span style=\"font-weight: 400;\"> Connect with </span><strong>IT companies and recruiters</strong><span style=\"font-weight: 400;\">.</span></li>\r\n</ul>', 'e-learning-and-earning-ltd-650669-cisco-ccna.jpg', ''),
(51, 20, 140, 'CompTIA Network+', 'featured ', 'Turn Your Passion into a Network Security Specialist', 1, 'comptia-network-', '', '', '4', '50', '20+', '', '', '<p><span style=\"font-weight: 400;\">CompTIA Network+ is a globally recognized certification for </span><strong>IT professionals specializing in networking and security</strong><span style=\"font-weight: 400;\">. It provides foundational knowledge required for </span><strong>network administration, troubleshooting, and cybersecurity management</strong><span style=\"font-weight: 400;\">.</span></p>\r\n<p><span style=\"font-weight: 400;\">This course is designed for individuals looking to </span><strong>develop expertise in networking infrastructure, wireless communication, and network security protocols</strong><span style=\"font-weight: 400;\">. Learn how to </span><strong>configure, manage, and secure enterprise networks</strong><span style=\"font-weight: 400;\">. </span><strong>Enroll today and advance your career in IT networking!</strong></p>', '', '<p><span style=\"font-weight: 400;\">This course covers </span><strong>network architecture, security best practices, and cloud networking solutions</strong><span style=\"font-weight: 400;\">. Students will gain hands-on experience with </span><strong>network configuration, troubleshooting, and automation tools</strong><span style=\"font-weight: 400;\">.</span></p>\r\n<p><span style=\"font-weight: 400;\">By the end of the course, students will be able to </span><strong>design, manage, and secure small-to-medium business networks</strong><span style=\"font-weight: 400;\"> while preparing for the </span><strong>CompTIA Network+ certification exam</strong><span style=\"font-weight: 400;\">.</span></p>', '<ul style=\"list-style-type: circle;\">\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Introduction to Networking Concepts</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Network Infrastructure &amp; Topologies</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Routing &amp; Switching Fundamentals</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Network Security &amp; Firewalls</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Wireless Networking &amp; VPNs</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Cloud Networking &amp; Virtualization</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">AI-Based Network Automation</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Troubleshooting Network Issues</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Network Monitoring &amp; Performance Optimization</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Certification Preparation &amp; Career Guidance</li>\r\n</ul>', '<ul style=\"list-style-type: circle;\">\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Wireshark</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Cisco Packet Tracer</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">GNS3 &amp; Virtual Labs</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Cloud Networking Platforms (AWS, Azure)</li>\r\n</ul>', '<ul style=\"list-style-type: circle;\">\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">IT Support Specialists</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Network Engineers &amp; Administrators</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Cybersecurity Analysts</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Cloud Computing Enthusiasts</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Freelancers in IT Networking</li>\r\n</ul>', '<p><span style=\"font-weight: 400;\">With the increasing need for </span><strong>secure and reliable networking infrastructure</strong><span style=\"font-weight: 400;\">, CompTIA Network+ professionals are highly valued. This course prepares students for </span><strong>network administration, cloud security, and IT support roles</strong><span style=\"font-weight: 400;\">.</span></p>', '<ul style=\"list-style-type: circle;\">\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Network Administrator</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">IT Support Specialist</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Network Security Analyst</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Cloud Networking Engineer</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Cybersecurity Associate</li>\r\n</ul>', '<ul style=\"list-style-type: circle;\">\r\n<li style=\"font-weight: 400;\" aria-level=\"1\"><strong>Live Network Training:</strong><span style=\"font-weight: 400;\"> Hands-on experience with real-world network setups.</span></li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\"><strong>Practical Troubleshooting Labs:</strong><span style=\"font-weight: 400;\"> Work on </span><strong>real networking issues</strong><span style=\"font-weight: 400;\"> and solutions.</span></li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\"><strong>AI-Driven Network Management:</strong><span style=\"font-weight: 400;\"> Learn </span><strong>automation and optimization tools</strong><span style=\"font-weight: 400;\">.</span></li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\"><strong>Certification Preparation Support:</strong><span style=\"font-weight: 400;\"> Get </span><strong>study materials, mock tests, and exam guidance</strong><span style=\"font-weight: 400;\">.</span></li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\"><strong>Career Assistance &amp; Freelancing Guidance:</strong><span style=\"font-weight: 400;\"> Connect with </span><strong>IT recruiters and professionals</strong><span style=\"font-weight: 400;\">.</span></li>\r\n</ul>', 'e-learning-and-earning-ltd-329173-comp-tia-network+.jpg', ''),
(52, 20, 140, 'IT Infrastructure and Cyber Security Diploma', '', 'Turn Your Passion into a Cybersecurity and IT Expert', 1, 'it-infrastructure-and-cyber-security-diploma', '', '', '6', '60', '30+', '', '', '<p><span style=\"font-weight: 400;\">With cyber threats increasing worldwide, businesses need skilled </span><strong>IT professionals</strong><span style=\"font-weight: 400;\"> to </span><strong>manage infrastructure and secure digital systems</strong><span style=\"font-weight: 400;\">. Cybersecurity and IT infrastructure are among the </span><strong>most in-demand tech fields</strong><span style=\"font-weight: 400;\">, with companies investing in network security, cloud security, and ethical hacking.</span></p>\r\n<p><span style=\"font-weight: 400;\">This diploma course is designed for individuals who want to </span><strong>build a strong foundation in IT infrastructure management and cybersecurity</strong><span style=\"font-weight: 400;\">. Learn how to </span><strong>configure secure networks, manage cloud services, and protect systems from cyber attacks</strong><span style=\"font-weight: 400;\">. </span><strong>Enroll today and become a cybersecurity specialist!</strong></p>', '', '<p><span style=\"font-weight: 400;\">This course covers </span><strong>network security, ethical hacking, cloud computing, and IT infrastructure management</strong><span style=\"font-weight: 400;\">. Students will gain hands-on experience in </span><strong>penetration testing, server management, and security compliance</strong><span style=\"font-weight: 400;\">.</span></p>\r\n<p><span style=\"font-weight: 400;\">By the end of the course, students will be able to </span><strong>design and secure IT infrastructures, perform security audits, and protect businesses from cyber threats</strong><span style=\"font-weight: 400;\">.</span></p>', '<ul style=\"list-style-type: circle;\">\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Fundamentals of IT Infrastructure &amp; Networking</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Cybersecurity Threats &amp; Risk Management</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Firewalls, VPNs &amp; Secure Network Configuration</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Cloud Security &amp; Data Protection</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Ethical Hacking &amp; Penetration Testing</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">AI-Powered Cybersecurity Tools</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Malware Analysis &amp; Threat Detection</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Server Management &amp; IT Support</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Incident Response &amp; Digital Forensics</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Freelancing &amp; Cybersecurity Career Development</li>\r\n</ul>', '<ul style=\"list-style-type: circle;\">\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Kali Linux &amp; Metasploit</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Wireshark &amp; Nmap</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Cloud Security Tools (AWS, Azure)</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">AI-Based Cyber Threat Analysis Tools</li>\r\n</ul>', '<ul style=\"list-style-type: circle;\">\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">IT Professionals &amp; System Administrators</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Cybersecurity Enthusiasts</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Network Engineers &amp; Cloud Security Experts</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Freelancers in IT Infrastructure &amp; Security</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Students Interested in Cyber Defense</li>\r\n</ul>', '<p><span style=\"font-weight: 400;\">With </span><strong>businesses investing in cybersecurity and IT management</strong><span style=\"font-weight: 400;\">, trained professionals are in high demand. This course prepares students for careers in </span><strong>IT security, network administration, and cybersecurity consulting</strong><span style=\"font-weight: 400;\">.</span></p>', '<ul style=\"list-style-type: circle;\">\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Cybersecurity Analyst</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">IT Infrastructure Engineer</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Network Security Specialist</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Cloud Security Engineer</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Freelance Cybersecurity Consultant</li>\r\n</ul>', '<ul style=\"list-style-type: circle;\">\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Live Cybersecurity Labs:<span style=\"font-weight: 400;\"> Learn with real-world simulations and hands-on hacking exercises.</span></li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">AI-Powered Security Analysis:<span style=\"font-weight: 400;\"> Use AI-driven tools to detect and prevent cyber threats.</span></li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Industry Certification Guidance:<span style=\"font-weight: 400;\"> Prepare for certifications like </span>CompTIA Security+, CISSP, and CEH<span style=\"font-weight: 400;\">.</span></li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Freelancing &amp; Cybersecurity Careers:<span style=\"font-weight: 400;\"> Build a strong portfolio to work with global clients.</span></li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Job Placement Assistance:<span style=\"font-weight: 400;\"> Connect with </span>top cybersecurity firms and IT companies<span style=\"font-weight: 400;\">.</span></li>\r\n</ul>', 'e-learning-and-earning-ltd-918635-it-infrastructure-and-cyber-security.jpg', ''),
(53, 20, 140, 'Mikrotik Training', '', 'Turn Your Passion into a Network Engineer', 1, 'mikrotik-training', '', '', '4 Months', '45', '20+', '', '', '<p><span style=\"font-weight: 400;\">Mikrotik is a leading provider of </span><strong>router and network management solutions</strong><span style=\"font-weight: 400;\">, widely used by ISPs, enterprises, and IT professionals. With increasing demand for </span><strong>network automation and security</strong><span style=\"font-weight: 400;\">, Mikrotik-certified engineers are highly sought after.</span></p>\r\n<p><span style=\"font-weight: 400;\">This course is designed for individuals looking to </span><strong>gain expertise in Mikrotik RouterOS configuration, firewall security, and network optimization</strong><span style=\"font-weight: 400;\">. Learn to </span><strong>design and maintain scalable networks with Mikrotik routers</strong><span style=\"font-weight: 400;\">. </span><strong>Enroll today and become a certified Mikrotik network specialist!</strong></p>', '', '<p><span style=\"font-weight: 400;\">This course provides hands-on training in </span><strong>Mikrotik RouterOS, firewall configuration, and wireless networking</strong><span style=\"font-weight: 400;\">. Students will work on </span><strong>real-world networking scenarios and troubleshooting exercises</strong><span style=\"font-weight: 400;\">.</span></p>\r\n<p><span style=\"font-weight: 400;\">By the end of the course, students will be able to </span><strong>configure, optimize, and secure Mikrotik-based networks</strong><span style=\"font-weight: 400;\">.</span></p>', '<ul style=\"list-style-type: circle;\">\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Introduction to Mikrotik &amp; RouterOS</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Routing &amp; Switching Configuration</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Wireless Network Optimization</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Firewall Security &amp; VPN Configuration</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Bandwidth Management &amp; Traffic Shaping</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">AI-Based Network Automation Tools</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Network Monitoring &amp; Performance Analysis</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Troubleshooting &amp; Security Best Practices</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Certification Preparation for MTCNA &amp; MTCRE</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Freelancing &amp; Job Placement Guidance</li>\r\n</ul>', '<ul style=\"list-style-type: circle;\">\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Mikrotik RouterOS</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">WinBox &amp; CLI Configuration</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">GNS3 for Network Simulation</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">AI-Powered Network Optimization Tools</li>\r\n</ul>', '', '<p><span style=\"font-weight: 400;\">With businesses and ISPs relying on </span><strong>secure and scalable networks</strong><span style=\"font-weight: 400;\">, Mikrotik-certified professionals are in high demand.</span></p>', '<ul style=\"list-style-type: circle;\">\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Network Engineer</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Mikrotik Router Specialist</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">ISP Network Administrator</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Network Security Analyst</li>\r\n</ul>', '', 'e-learning-and-earning-ltd-302279-mikrotik-training.jpg', ''),
(54, 21, 140, 'Amazon Web Services (AWS)', '', 'Turn Your Passion into a Cloud Computing Expert', 1, 'amazon-web-services-aws-', '', '', '4 Months', '50', '25+', '', '', '<p><span style=\"font-weight: 400;\">Amazon Web Services (AWS) is the world&rsquo;s </span><strong>leading cloud computing platform</strong><span style=\"font-weight: 400;\">, powering businesses, startups, and enterprises globally. As cloud adoption continues to grow, AWS expertise is one of the most in-demand IT skills today.</span></p>\r\n<p><span style=\"font-weight: 400;\">This course is designed for individuals looking to </span><strong>build, deploy, and manage applications on AWS</strong><span style=\"font-weight: 400;\">. Learn how to use </span><strong>AWS services like EC2, S3, Lambda, and RDS</strong><span style=\"font-weight: 400;\">, and gain hands-on experience in cloud computing. </span><strong>Enroll today and advance your career in the cloud industry!</strong></p>', '', '<p><span style=\"font-weight: 400;\">This course provides a </span><strong>comprehensive guide</strong><span style=\"font-weight: 400;\"> to AWS cloud services, infrastructure management, and deployment strategies. Students will gain hands-on experience with </span><strong>AWS solutions architecture, serverless computing, and cloud security</strong><span style=\"font-weight: 400;\">.</span></p>\r\n<p><span style=\"font-weight: 400;\">By the end of the course, students will be able to </span><strong>design scalable cloud architectures, deploy applications, and manage cloud security efficiently</strong><span style=\"font-weight: 400;\">.</span></p>', '<ul style=\"list-style-type: circle;\">\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Introduction to AWS &amp; Cloud Computing</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">AWS Identity &amp; Access Management (IAM)</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Elastic Compute Cloud (EC2) &amp; Virtual Machines</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Amazon S3 &amp; Cloud Storage Management</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Database Services (RDS, DynamoDB, Aurora)</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">AWS Lambda &amp; Serverless Computing</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Networking &amp; Content Delivery (VPC, Route 53, CloudFront)</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Cloud Security &amp; Compliance</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">AI &amp; Machine Learning Services in AWS</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">AWS Cost Optimization &amp; Best Practices</li>\r\n</ul>', '<ul style=\"list-style-type: circle;\">\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">AWS Management Console</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">AWS CLI &amp; SDKs</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Terraform &amp; CloudFormation</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Docker &amp; Kubernetes</li>\r\n</ul>', '<ul style=\"list-style-type: circle;\">\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">IT Professionals &amp; System Administrators</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Cloud Computing Enthusiasts</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Software Developers &amp; DevOps Engineers</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Entrepreneurs &amp; Startups</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Freelancers in Cloud Services</li>\r\n</ul>', '<p><span style=\"font-weight: 400;\">As companies shift to the cloud, </span><strong>AWS-certified professionals</strong><span style=\"font-weight: 400;\"> are in high demand. This course prepares students for careers in </span><strong>cloud architecture, DevOps, and cloud security</strong><span style=\"font-weight: 400;\">. Graduates can work for </span><strong>tech companies, startups, or as freelance AWS consultants</strong><span style=\"font-weight: 400;\">.</span></p>', '<ul style=\"list-style-type: circle;\">\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">AWS Cloud Engineer</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Solutions Architect</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">DevOps Engineer</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Cloud Security Specialist</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">AWS Consultant</li>\r\n</ul>', '<ul style=\"list-style-type: circle;\">\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Live Cloud Training:<span style=\"font-weight: 400;\"> Learn AWS services with real-time cloud environments.</span></li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Hands-On Deployment Projects:<span style=\"font-weight: 400;\"> Build, deploy, and manage applications on AWS.</span></li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">AI &amp; Automation in Cloud:<span style=\"font-weight: 400;\"> Utilize AI-powered cloud optimization tools.</span></li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Certification Preparation:<span style=\"font-weight: 400;\"> Get guidance for AWS certifications.</span></li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Career Assistance &amp; Freelancing Support:<span style=\"font-weight: 400;\"> Network with cloud professionals and clients.</span></li>\r\n</ul>', 'e-learning-and-earning-ltd-191475-amazon-web-services(aws).jpg', ''),
(55, 21, 140, 'Professional Video Editing', 'featured ', 'Turn Your Passion into a Video Editing Expert', 1, 'professional-video-editing', '20000', '', '', '50', '', '', '', '<p><span style=\"font-weight: 400;\">Video content is the </span><strong>most engaging form of digital media</strong><span style=\"font-weight: 400;\">, widely used in </span><strong>advertising, social media, film production, and online learning</strong><span style=\"font-weight: 400;\">. As demand for </span><strong>high-quality video content</strong><span style=\"font-weight: 400;\"> grows, skilled video editors are in high demand worldwide.</span></p>\r\n<p><span style=\"font-weight: 400;\">This course is designed for individuals looking to </span><strong>master video editing, motion graphics, and cinematic effects</strong><span style=\"font-weight: 400;\">. Learn to use </span><strong>industry-standard tools like Adobe Premiere Pro and DaVinci Resolve</strong><span style=\"font-weight: 400;\"> to create professional video content. </span><strong>Enroll today and start your journey as a video editing expert!</strong></p>', '', '<p><span style=\"font-weight: 400;\">This course provides hands-on training in </span><strong>video editing techniques, color grading, and post-production workflows</strong><span style=\"font-weight: 400;\">. Students will work on </span><strong>real-world projects, including advertisements, YouTube videos, and film editing</strong><span style=\"font-weight: 400;\">.</span></p>\r\n<p><span style=\"font-weight: 400;\">By the end of the course, students will be able to </span><strong>edit, enhance, and produce high-quality video content for various platforms</strong><span style=\"font-weight: 400;\">.</span></p>', '<ul style=\"list-style-type: circle;\">\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Introduction to Video Editing &amp; Post-Production</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Adobe Premiere Pro &amp; Timeline Mastery</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">DaVinci Resolve for Color Grading</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">AI Tools for Automated Editing</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Sound Editing &amp; Audio Mixing</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Visual Effects (VFX) &amp; Motion Graphics</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Video Editing for YouTube &amp; Social Media</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Storytelling &amp; Editing for Film &amp; Documentaries</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Exporting &amp; Optimizing for Different Platforms</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Portfolio Development &amp; Freelancing Strategies</li>\r\n</ul>', '<ul style=\"list-style-type: circle;\">\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Adobe Premiere Pro</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">DaVinci Resolve</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Final Cut Pro</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">AI-Based Video Editing Tools</li>\r\n</ul>', '<ul style=\"list-style-type: circle;\">\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Video Editors &amp; Content Creators</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Filmmakers &amp; Documentary Editors</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">YouTubers &amp; Social Media Marketers</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Freelancers in Video Editing</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Students Interested in Post-Production</li>\r\n</ul>', '<p><span style=\"font-weight: 400;\">With video content </span><strong>dominating digital marketing and entertainment</strong><span style=\"font-weight: 400;\">, skilled editors are in high demand.</span></p>', '<ul style=\"list-style-type: circle;\">\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Video Editor</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Film Post-Production Specialist</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Motion Graphics Artist</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Social Media Video Creator</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Freelance Video Editor</li>\r\n</ul>', '<ul style=\"list-style-type: circle;\">\r\n<li style=\"font-weight: 400;\" aria-level=\"1\"><strong>Live Editing Sessions:</strong><span style=\"font-weight: 400;\"> Learn professional editing techniques from experts.</span></li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\"><strong>Real-World Video Editing Projects:</strong><span style=\"font-weight: 400;\"> Work on social media ads, films, and promotional videos.</span></li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\"><strong>AI-Powered Editing Tools:</strong><span style=\"font-weight: 400;\"> Automate tasks with AI-driven video enhancement tools.</span></li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\"><strong>Freelancing &amp; Career Guidance:</strong><span style=\"font-weight: 400;\"> Get expert advice on securing video editing projects.</span></li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\"><strong>Job Placement &amp; Networking Support:</strong><span style=\"font-weight: 400;\"> Connect with media agencies and content creators.</span></li>\r\n</ul>', 'e-learning-and-earning-ltd-721998-professional-video-editing.jpg', '');
INSERT INTO `course` (`id`, `category_id`, `user_id`, `name`, `type`, `sub_name`, `status`, `slug`, `regular_price`, `discount_price`, `duration`, `total_semester`, `project`, `weekly`, `hours`, `details`, `carear_path`, `course_overview`, `course_curriculum`, `software`, `course_desinger`, `career_opportunities`, `job_position`, `exclusive_solution`, `userPic`, `video_link`) VALUES
(56, 21, 140, 'Voiceover Masterclass', '', 'Turn Your Passion into a Professional Voiceover Artist', 1, 'voiceover-masterclass', '', '', '3 Months', '40', '15+', '', '', '<p><span style=\"font-weight: 400;\">The </span><strong>voiceover industry is growing rapidly</strong><span style=\"font-weight: 400;\">, with opportunities in </span><strong>advertising, audiobooks, animations, and podcasts</strong><span style=\"font-weight: 400;\">. Voice artists are in high demand for </span><strong>narration, dubbing, and commercial recordings</strong><span style=\"font-weight: 400;\">.</span></p>\r\n<p><span style=\"font-weight: 400;\">This course is designed for individuals looking to </span><strong>master voice modulation, narration techniques, and audio editing</strong><span style=\"font-weight: 400;\">. Learn to </span><strong>record professional-quality voiceovers</strong><span style=\"font-weight: 400;\"> and market your skills globally. </span><strong>Enroll today and become a voiceover professional!</strong></p>', '', '<p><span style=\"font-weight: 400;\">This course provides hands-on training in </span><strong>voice acting, script reading, and professional audio production</strong><span style=\"font-weight: 400;\">. Students will work on </span><strong>real-world voiceover projects for commercials, storytelling, and digital content</strong><span style=\"font-weight: 400;\">.</span></p>\r\n<p><span style=\"font-weight: 400;\">By the end of the course, students will be able to </span><strong>produce high-quality voiceovers and start a career in voice acting</strong><span style=\"font-weight: 400;\">.</span></p>', '<ul style=\"list-style-type: circle;\">\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Introduction to Voice Acting &amp; Industry Opportunities</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Breath Control &amp; Voice Modulation Techniques</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">AI Tools for Voice Enhancement &amp; Editing</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Microphone Techniques &amp; Sound Engineering</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Script Reading &amp; Performance Delivery</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Voiceover for Ads, Narration &amp; Animation</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Podcast Recording &amp; Audiobook Narration</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Freelancing &amp; Business Growth in Voiceover Work</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Building a Professional Voiceover Portfolio</li>\r\n</ul>', '<ul style=\"list-style-type: circle;\">\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Adobe Audition &amp; Audacity</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">AI Voice Enhancement Tools</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Professional Studio Recording Equipment</li>\r\n</ul>', '<ul style=\"list-style-type: circle;\">\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Aspiring Voiceover Artists</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Podcasters &amp; Audiobook Narrators</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Freelancers in Voice Acting</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Students Interested in Audio Production</li>\r\n</ul>', '<p><span style=\"font-weight: 400;\">With the growth of </span><strong>digital content, e-learning, and entertainment</strong><span style=\"font-weight: 400;\">, skilled voice artists are in </span><strong>high demand</strong><span style=\"font-weight: 400;\"> globally.</span></p>', '<ul style=\"list-style-type: circle;\">\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Voiceover Artist</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Audiobook Narrator</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Podcast Host</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Freelance Voice Actor</li>\r\n</ul>', '<ul style=\"list-style-type: circle;\">\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Live Voice Coaching Sessions:<span style=\"font-weight: 400;\"> Learn from professional voiceover artists.</span></li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Hands-On Audio Recording Projects:<span style=\"font-weight: 400;\"> Work on real-world voiceover assignments.</span></li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">AI-Powered Audio Tools:<span style=\"font-weight: 400;\"> Improve voice quality using AI enhancement.</span></li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Freelancing &amp; Business Growth Support:<span style=\"font-weight: 400;\"> Secure global voiceover projects.</span></li>\r\n</ul>', 'e-learning-and-earning-ltd-692879-voiceover-masterclass.jpg', ''),
(57, 22, 140, 'Spoken English (Business English)23', 'featured ', 'Turn Your Passion into a Confident English Speaker23', 1, 'spoken-english-business-english-23', '40003', '30802', '23', '43', '23', '23', '23', '<p>Fluency in English is essential for <strong>professional communication, business negotiations, and global networking</strong>. Mastering <strong>business English</strong> can help individuals <strong>excel in job interviews, presentations, and workplace conversations</strong>.</p>\r\n<p><span style=\"font-weight: 400;\">This course is designed for individuals looking to </span><strong>enhance their spoken English, pronunciation, and professional communication skills</strong><span style=\"font-weight: 400;\">. Learn </span><strong>practical speaking techniques, business vocabulary, and confidence-building exercises</strong><span style=\"font-weight: 400;\">. </span><strong>Enroll today and improve your English fluency!23</strong></p>\r\n<p>&nbsp;</p>', '<p>23</p>', '<h3><span style=\"font-weight: 400;\">This course provides step-by-step training in </span><strong>spoken English, business writing, and professional communication</strong><span style=\"font-weight: 400;\">. Students will gain confidence in </span><strong>public speaking, negotiations, and formal discussions</strong><span style=\"font-weight: 400;\">.</span></h3>\r\n<p><span style=\"font-weight: 400;\">By the end of the course, students will be able to </span><strong>speak English fluently and confidently in business settings</strong><span style=\"font-weight: 400;\">.23</span></p>', '<ul style=\"list-style-type: circle;\">\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Fundamentals of Spoken English &amp; Pronunciation</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Business Communication &amp; Professional Conversations</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Email Writing &amp; Business Correspondence</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">AI Tools for Language Learning &amp; Improvement</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Interview Preparation &amp; Public Speaking</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Confidence-Building &amp; Accent Training</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Cross-Cultural Communication &amp; Networking</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Grammar &amp; Sentence Structuring for Professionals</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Freelancing &amp; Career Advancement with English Skills23</li>\r\n</ul>', '<ul style=\"list-style-type: circle;\">\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Grammarly &amp; AI Writing Assistants</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Speech Recognition &amp; Pronunciation Tools</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Language Learning Apps (Duolingo, Cambly)23</li>\r\n</ul>', '<ul style=\"list-style-type: circle;\">\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Professionals &amp; Business Executives</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Students &amp; Job Seekers</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Freelancers &amp; Entrepreneurs</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Anyone Looking to Improve Spoken English Skills23</li>\r\n</ul>', '<p><span style=\"font-weight: 400;\">With English being the </span><strong>global business language</strong><span style=\"font-weight: 400;\">, fluent speakers have </span><strong>more career growth opportunities</strong><span style=\"font-weight: 400;\"> worldwide.23</span></p>', '<ul style=\"list-style-type: circle;\">\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Corporate Communications Specialist</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Customer Support Executive</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Public Speaker &amp; Trainer</li>\r\n<li style=\"font-weight: 400;\" aria-level=\"1\">Freelance Language Instructor23</li>\r\n</ul>', '<p>23</p>', 'e-learning-and-earning-ltd-893477-gallery-6.jpg', 'https://www.youtube.com/embed/ZR53fOUxrBU?si=wY6x2kkqkygwia0f');

-- --------------------------------------------------------

--
-- Table structure for table `course_apply`
--

CREATE TABLE `course_apply` (
  `ca_id` int(11) NOT NULL,
  `course_id` int(25) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `course` varchar(255) NOT NULL,
  `regular_price` varchar(30) NOT NULL,
  `percentage` varchar(50) DEFAULT NULL,
  `discount_price` varchar(30) NOT NULL,
  `course_type` varchar(255) NOT NULL,
  `entry_date` datetime NOT NULL,
  `entry_time` varchar(25) NOT NULL,
  `address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `course_apply`
--

INSERT INTO `course_apply` (`ca_id`, `course_id`, `name`, `email`, `phone`, `course`, `regular_price`, `percentage`, `discount_price`, `course_type`, `entry_date`, `entry_time`, `address`) VALUES
(137, NULL, 'Bo Thomas', 'mycax@mailinator.com', '01928695384', 'Professional Graphic Design', '20000', NULL, '15400', 'online', '2025-04-23 12:52:18', '', 'dhaka'),
(138, NULL, 'Francesca Good', 'kexafe@mailinator.com', '01928695384', 'Motion Graphics', '00', NULL, '00', 'online', '2025-04-23 13:02:33', '', 'Minima recusandae E'),
(139, NULL, 'Francesca Good', 'kexafe@mailinator.com', '01518936463', 'Professional Graphic Design', '20000', '23%', '15400', 'offline', '2025-04-24 15:12:22', '', 'Minima recusandae E'),
(140, NULL, 'SAYDUL ISALAM SUJON', 'sujonmia100095@gmail.com', '01518936463', 'Diploma in Full Stack Development', '00', '0%', '00', 'offline', '2025-04-24 15:45:28', '', 'Bashtoli, Kaliakor, Gazipur'),
(141, NULL, 'jahid233', 'jahidlaravel23@gmail.com', '01928695384', 'Digital Product Design', '00', '0%', '00', 'offline', '2025-05-15 13:21:15', '', 'dhaka'),
(142, NULL, 'jahid', 'jahidhasanofficial23@gmail.com', '01865277323', 'Professional Graphic Design', '20000', '23%', '15400', 'offline', '2025-07-07 17:24:09', '', 'Dhaka'),
(143, NULL, 'Francesca Good', 'kexafe@mailinator.com', '02865277323', 'Professional Graphic Design', '20000', '23%', '15400', 'offline', '2025-07-07 17:31:37', '', 'Minima recusandae E');

-- --------------------------------------------------------

--
-- Table structure for table `course_category`
--

CREATE TABLE `course_category` (
  `cat_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `cat_name` varchar(500) DEFAULT NULL,
  `status` int(30) DEFAULT 1,
  `slug` text DEFAULT NULL,
  `cat_details` longtext DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `cat_photo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `course_category`
--

INSERT INTO `course_category` (`cat_id`, `user_id`, `cat_name`, `status`, `slug`, `cat_details`, `link`, `cat_photo`) VALUES
(16, 140, 'Web & Software Development', 1, 'web-software-development', '', '', 'e-learning-and-earning-ltd-493479-web-&-software-development.png'),
(17, 140, 'Graphic Design & Animation', 1, 'graphic-design-animation', '', '', 'e-learning-and-earning-ltd-318999-graphic-design-&-animation.png'),
(18, 140, 'Digital Marketing', 1, 'digital-marketing', '', '', 'e-learning-and-earning-ltd-216992-digital-marketing.png'),
(19, 140, '3D Design & Animation', 1, '3d-design-animation', '', '', 'e-learning-and-earning-ltd-690032-3d-design-&-animation.png'),
(20, 140, 'Cyber Security & Networking', 1, 'cyber-security-networking', '', '', 'e-learning-and-earning-ltd-484651-cyber-security-&-networking.png'),
(21, 140, 'Miscellaneous Tech & Skills', 1, 'miscellaneous-tech-skills', '', '', 'e-learning-and-earning-ltd-228845-miscellaneous-tech-&-skills.png'),
(22, 140, 'Language & Communication', 1, 'language-communication', '', '', 'e-learning-and-earning-ltd-332511-language-&-communication.png'),
(23, 140, 'Others', 1, 'others', '', '', 'e-learning-and-earning-ltd-531712-categories-icon-03.png');

-- --------------------------------------------------------

--
-- Table structure for table `crse_topic`
--

CREATE TABLE `crse_topic` (
  `crse_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `crse_name` varchar(300) NOT NULL,
  `topic` varchar(200) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `crse_topic`
--

INSERT INTO `crse_topic` (`crse_id`, `user_id`, `crse_name`, `topic`, `status`) VALUES
(11, 140, '25', ' Basic Hardware, Software', '1'),
(12, 140, '25', 'Introduction to Computer Operating System', '1'),
(13, 140, '25', ' Microsoft Word', '1'),
(14, 140, '25', 'Microsoft Excel', '1');

-- --------------------------------------------------------

--
-- Table structure for table `daily_notes`
--

CREATE TABLE `daily_notes` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `note_title` varchar(300) NOT NULL,
  `note_details` varchar(1000) NOT NULL,
  `alarm_date` date NOT NULL,
  `entry_date` date NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `daily_notes`
--

INSERT INTO `daily_notes` (`id`, `user_id`, `note_title`, `note_details`, `alarm_date`, `entry_date`, `status`) VALUES
(1, 130, 'Domain ', '1000', '0000-00-00', '2022-01-28', 0),
(2, 135, 'Nasta', '200', '0000-00-00', '2022-01-30', 0),
(3, 130, 'nasta', '50', '0000-00-00', '2022-01-30', 0),
(4, 136, 'Nasta', '50', '0000-00-00', '2022-01-31', 0),
(5, 137, 'Dinner ', '230', '0000-00-00', '2022-02-13', 0),
(10, 141, 'Nasta', '20', '0000-00-00', '2022-06-08', 0),
(17, 144, 'Need Buy', 'Need Buy Need Buy', '0000-00-00', '2022-08-20', 1),
(18, 144, 'Laptop', 'Laptop Laptop Laptop', '2022-08-25', '2022-08-20', 1),
(19, 140, 'Ocean Life Limited', 'DD', '2023-10-17', '2023-10-17', 1);

-- --------------------------------------------------------

--
-- Table structure for table `degree`
--

CREATE TABLE `degree` (
  `deg_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `deg_name` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `degree`
--

INSERT INTO `degree` (`deg_id`, `user_id`, `deg_name`) VALUES
(2, 140, 'Bogura'),
(3, 140, 'Rajshahi'),
(4, 140, 'Bsc'),
(5, 140, 'fgnbfg');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `id` int(11) NOT NULL,
  `user_id` int(30) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `user_id`, `name`, `status`) VALUES
(2, 140, 'Managing Director', NULL),
(3, 140, 'Management', NULL),
(4, 140, 'Senior Instructor', NULL),
(5, 140, 'Junior Instructor', NULL),
(6, 140, 'Instructor', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `diploma_admission`
--

CREATE TABLE `diploma_admission` (
  `ad_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `ad_name` varchar(255) NOT NULL,
  `ad_details` text NOT NULL,
  `userPic` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `diploma_admission`
--

INSERT INTO `diploma_admission` (`ad_id`, `user_id`, `ad_name`, `ad_details`, `userPic`) VALUES
(1, 140, 'CSE1', '<p>CSE Here1</p>', '872646.png');

-- --------------------------------------------------------

--
-- Table structure for table `district`
--

CREATE TABLE `district` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `dist_name` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `district`
--

INSERT INTO `district` (`id`, `user_id`, `dist_name`) VALUES
(2, 140, 'Bogura'),
(3, 140, 'Rajshahi'),
(4, 140, 'Pabna');

-- --------------------------------------------------------

--
-- Table structure for table `division`
--

CREATE TABLE `division` (
  `div_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `div_name` varchar(300) NOT NULL,
  `status` text DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `division`
--

INSERT INTO `division` (`div_id`, `user_id`, `div_name`, `status`) VALUES
(1, 140, 'Dhaka Division', '1'),
(2, 140, 'Rajshahi Division', '1'),
(3, 140, 'Rangpur Division', '1'),
(4, 140, 'Khulna Division', '1'),
(5, 140, 'Barishal Division', '1'),
(6, 140, 'Mymensingh Division', '1'),
(7, 140, 'Sylhet Division', '1'),
(8, 140, 'Chattogram Division', '1');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` int(11) NOT NULL,
  `emp_name` varchar(100) NOT NULL,
  `father_name` varchar(100) NOT NULL,
  `national_id` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `contact_info` varchar(50) NOT NULL,
  `birthdate` date NOT NULL,
  `gender` varchar(50) NOT NULL,
  `photo` varchar(200) NOT NULL,
  `position` varchar(200) NOT NULL,
  `hire_date` date NOT NULL,
  `sal_type` varchar(200) NOT NULL,
  `salary` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `emp_name` varchar(500) NOT NULL,
  `address` varchar(500) NOT NULL,
  `phone` varchar(200) NOT NULL,
  `email` varchar(220) NOT NULL,
  `national_id` varchar(200) NOT NULL,
  `gross` varchar(50) NOT NULL,
  `house` varchar(50) NOT NULL,
  `medical` varchar(50) NOT NULL,
  `salary` varchar(300) NOT NULL,
  `position` varchar(300) NOT NULL,
  `join_date` date NOT NULL,
  `status` int(11) NOT NULL,
  `userPic` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `user_id`, `emp_name`, `address`, `phone`, `email`, `national_id`, `gross`, `house`, `medical`, `salary`, `position`, `join_date`, `status`, `userPic`) VALUES
(86, 140, 'Menon Bogura', 'Bogura', '0175187955', 'menon@gmail.com', '55', '10000', '2000', '3000', '15000', 'Manager', '2023-10-05', 1, '349810.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `employees_salary`
--

CREATE TABLE `employees_salary` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `emp_id` int(11) NOT NULL,
  `year` varchar(300) NOT NULL,
  `month` varchar(300) NOT NULL,
  `salary` varchar(300) NOT NULL,
  `bonus` varchar(300) NOT NULL,
  `total_salary` varchar(300) NOT NULL,
  `adv_paid` varchar(300) NOT NULL,
  `full_paid` varchar(300) NOT NULL,
  `recent_due` varchar(300) NOT NULL,
  `entry_date` date NOT NULL,
  `last_update` date NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employees_salary`
--

INSERT INTO `employees_salary` (`id`, `user_id`, `emp_id`, `year`, `month`, `salary`, `bonus`, `total_salary`, `adv_paid`, `full_paid`, `recent_due`, `entry_date`, `last_update`, `status`) VALUES
(150, 140, 86, '2023', 'January', '15000', '0', '15000', '0', '10000', '0', '2023-10-05', '2023-10-05', 0);

-- --------------------------------------------------------

--
-- Table structure for table `employees_salary_details`
--

CREATE TABLE `employees_salary_details` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `emp_id` int(11) NOT NULL,
  `year` varchar(100) NOT NULL,
  `month` varchar(100) NOT NULL,
  `salary` varchar(100) NOT NULL,
  `bonus` varchar(100) NOT NULL,
  `total_salary` varchar(200) NOT NULL,
  `adv_paid` varchar(100) NOT NULL,
  `full_paid` varchar(200) NOT NULL,
  `recent_due` varchar(100) NOT NULL,
  `entry_date` date NOT NULL,
  `sal_type` int(11) NOT NULL,
  `comment` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employees_salary_details`
--

INSERT INTO `employees_salary_details` (`id`, `user_id`, `emp_id`, `year`, `month`, `salary`, `bonus`, `total_salary`, `adv_paid`, `full_paid`, `recent_due`, `entry_date`, `sal_type`, `comment`) VALUES
(157, 140, 86, '2023', 'January', '15000', '0', '15000', '5000', '0', '10000', '2023-10-05', 4, 'Advance Paid'),
(158, 140, 86, '2023', 'January', '15000', '0', '15000', '0', '10000', '0', '2023-10-05', 5, 'Full Paid');

-- --------------------------------------------------------

--
-- Table structure for table `expense`
--

CREATE TABLE `expense` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `expense_name` varchar(300) NOT NULL,
  `exp_details` varchar(300) NOT NULL,
  `ammount` varchar(200) NOT NULL,
  `expense_cost` varchar(100) NOT NULL,
  `reference` varchar(350) NOT NULL,
  `entry_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `expense`
--

INSERT INTO `expense` (`id`, `user_id`, `expense_name`, `exp_details`, `ammount`, `expense_cost`, `reference`, `entry_date`) VALUES
(7, 22, '3', 'TruckTruckTruckTruck', '', '10000', 'Nahid', '2020-10-01'),
(8, 22, '3', 'keyboard', '', '500', 'à¦•à¦¾à¦®à¦¾à¦²1', '2020-10-11'),
(9, 22, '5', 'keyboard', '1ps', '1000', 'aaa', '2020-10-11'),
(10, 22, '5', 'keyboard', '5ps', '1000', 'à¦•à¦¾à¦®à¦¾à¦²', '2020-10-11'),
(11, 22, '6', 'Drone', '1pcs', '45500', 'Dd', '2020-10-11'),
(12, 22, '3', 'shgrbhfhy', '1kg', '100', 'gh', '2020-10-11'),
(13, 22, '7', 'color', '1 galon', '540', 'ASX', '2020-10-11'),
(14, 22, '8', 'zdshkjvbhng', '5', '1000', 'Asraf', '2020-10-16'),
(15, 130, '9', 'aifgnxcujv', '1pcs', '250', 'Asraf', '2020-11-27'),
(16, 130, '10', 'computer', '2 Pcs', '30000', '', '2021-01-01'),
(17, 130, '13', '100 pcs ', '100', '2000', 'Suvo', '2021-04-07'),
(18, 130, '5', 'A4 Tech mouse', '1', '300', 'dsd', '2021-04-07'),
(19, 130, '14', '1 Bigha Land', '1', '5000', 'rr', '2021-04-16'),
(20, 130, '14', 'Fish 30kg Medum Size', '30', '6000', 'mm', '2021-04-16'),
(21, 130, '14', 'Food 5kg ', '5', '750', 'ff', '2021-04-16'),
(22, 140, '15', 'Small Fan', '1', '1050', 'aa', '2022-05-30'),
(25, 140, '5', 'dd', '1', '55', 'll', '2022-05-31'),
(26, 140, '16', 'ss', '1', '120', 'ss', '2022-06-05');

-- --------------------------------------------------------

--
-- Table structure for table `expense_other`
--

CREATE TABLE `expense_other` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `expense_name` varchar(300) NOT NULL,
  `expense_cost` varchar(100) NOT NULL,
  `reference` varchar(350) NOT NULL,
  `entry_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `expense_other`
--

INSERT INTO `expense_other` (`id`, `user_id`, `expense_name`, `expense_cost`, `reference`, `entry_date`) VALUES
(1, 130, 'Domain ', '1000', 'Anik', '2022-01-28'),
(2, 135, 'Nasta', '200', 'rr', '2022-01-30'),
(3, 130, 'nasta', '50', 'dd', '2022-01-30'),
(4, 136, 'Nasta', '50', 'dd', '2022-01-31'),
(5, 137, 'Dinner ', '230', 'Bbn', '2022-02-13'),
(6, 140, 'Tea 3cup', '30', 'sa', '2022-04-08'),
(7, 140, 'Nasta Tea 4-cup', '20', 'ss', '2022-05-29'),
(8, 140, 'Biscuit 2Pack', '40', 'aa', '2022-05-30'),
(9, 140, 'Nasta Tea 4-cup', '55', 'aff', '2022-05-31');

-- --------------------------------------------------------

--
-- Table structure for table `faq_section`
--

CREATE TABLE `faq_section` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `details` text NOT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `faq_section`
--

INSERT INTO `faq_section` (`id`, `user_id`, `title`, `details`, `date`) VALUES
(4, 140, 'What is Moral Education?', 'Moral Education is an educational approach that aims to instill moral values, virtues, and ethical principles in individuals. It focuses on fostering empathy, compassion, integrity, and responsible decision-making.', '2024-03-12'),
(5, 140, 'Why is Moral Education important?', 'Moral Education is crucial for the holistic development of individuals. It helps in shaping character, promoting social harmony, and building a more ethical society. It equips individuals with the necessary tools to navigate moral dilemmas and make ethical choices.', '2024-03-12'),
(6, 140, 'How can Moral Education be integrated into the curriculum?', 'Moral Education can be integrated into various subjects and activities within the curriculum. It can be taught explicitly through dedicated courses or embedded implicitly in other subjects such as literature, history, and social studies.', '2024-03-12'),
(7, 140, 'What teaching methods are effective for Moral Education?', 'Effective teaching methods for Moral Education include discussions, role-playing, storytelling, case studies, community service projects, and reflective exercises. These methods encourage critical thinking, empathy, and moral reflection.', '2024-03-12'),
(8, 140, 'question', 'answer', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `feature1`
--

CREATE TABLE `feature1` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `sub_title` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `link1` varchar(255) DEFAULT NULL,
  `link2` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feature1`
--

INSERT INTO `feature1` (`id`, `user_id`, `title`, `sub_title`, `image`, `link1`, `link2`) VALUES
(3, 0, 'Are you Interested   !', '<p>If you Interested Our Courses , Yo Can Contact With Us. So Don\'t late to Admission..</p>', 'digital-training-center-772635-p8.jpg', 'courses', 'contact');

-- --------------------------------------------------------

--
-- Table structure for table `feature2`
--

CREATE TABLE `feature2` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `sub_title` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `link1` varchar(255) DEFAULT NULL,
  `link2` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feature2`
--

INSERT INTO `feature2` (`id`, `user_id`, `title`, `sub_title`, `image`, `link1`, `link2`) VALUES
(2, 140, 'Company has been Business companies since 1985.', '<blockquote>\r\n<p class=\"title-big mb-4 mx-0 mw-100\">Company has been giving best consultation to top USA&rsquo;s Business companies since 1985.Start working with us that can provide everything you need to generate awareness.&nbsp;</p>\r\n&lt;p class=\"title-', 'img-746437-square-dot.png', 'about', 'gallery');

-- --------------------------------------------------------

--
-- Table structure for table `features_all`
--

CREATE TABLE `features_all` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `sub_title` text NOT NULL,
  `details` longtext NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `link1` varchar(255) DEFAULT NULL,
  `link2` varchar(255) DEFAULT NULL,
  `feature_name` varchar(150) NOT NULL,
  `status` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `features_all`
--

INSERT INTO `features_all` (`id`, `user_id`, `title`, `sub_title`, `details`, `image`, `link1`, `link2`, `feature_name`, `status`) VALUES
(3, 0, 'Are you Interested   !', '<p>If you Interested Our Courses , Yo Can Contact With Us. So Don\'t late to Admission..</p>', '', 'digital-training-center-772635-p8.jpg', 'courses', 'contact', 'service', 1),
(4, 0, 'Are you Interested   !', '<p>If you Interested Our Courses , Yo Can Contact With Us. So Don\'t late to Admission 22</p>', '', 'digital-training-668833-why-chose-us.jpg', 'courses', 'contact', 'why-chose', 1),
(5, 0, 'Start Learning With Us 11', 'Enhance Your Skills With Best Courses', '<h3 class=\"title-big\">Enhance Your Skills With Best Courses</h3>', 'digital-training-center-772635-p8.jpg', 'apply', 'contact', 'call-to', 1),
(6, 0, 'EXPERIENCED PROFESSIONALS', 'Meet Our Teachers', '<p class=\"text-para\">Curabitur id gravida risus. Fusce eget ex fermentum, ultricies nisi ac sed, lacinia est. Quisque ut lectus consequat, venenatis eros et, commodo risus. Nullam sit amet laoreet elit. Suspendisse non magna a velit efficitur.</p>\r\n<p class=\"mt-3\">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Voluptas ab qui impedit, libero illo quia sequi quibusdam iure. Error minus quod reprehenderit quae dolor velit soluta animi voluptate dicta enim? Lorem ipsum dolor sit amet consectetur adipisicing elit. Odio, provident!</p>', 'digital-training-center-772635-p8.jpg', 'apply', 'contact', 'team', 1),
(7, 0, 'Are you Interested !', 'Are you Interested !', '<p>Welcome to Moral Learning Institute, your premier destination for language and cultural education.</p>\r\n<p class=\"text-para\">As a leading language training institute, we specialize in delivering high-quality language courses and cultural immersion experiences to our diverse student community.</p>', 'digital-training-center-391611-chose.gif', 'apply', 'contact', 'apply', 1);

-- --------------------------------------------------------

--
-- Table structure for table `free_consultation`
--

CREATE TABLE `free_consultation` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) DEFAULT NULL,
  `phone` varchar(200) NOT NULL,
  `subject` varchar(200) DEFAULT NULL,
  `message` varchar(1000) DEFAULT NULL,
  `entry_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `free_consultation`
--

INSERT INTO `free_consultation` (`id`, `name`, `email`, `phone`, `subject`, `message`, `entry_date`) VALUES
(107, 'Francesca Good', NULL, '7584956925', NULL, 'Minima recusandae E', '2025-07-06 16:47:39'),
(108, 'SAYDUL ISALAM SUJON', NULL, '01518936463', NULL, 'Bashtoli, Kaliakor, Gazipur', '2025-07-06 16:47:46'),
(109, '3sfsdf', NULL, '01865277', NULL, 'sfsdfsd', '2025-07-06 17:55:23'),
(110, 'Francesca Good', NULL, '01865277323', NULL, 'Minima recusandae E', '2025-07-06 17:57:33');

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `userPic` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id`, `user_id`, `title`, `userPic`) VALUES
(23, 140, 'Sheikh Hasina Youth Volunteer Award-2022', 'e-learning-and-earning-ltd-402420-e-learning-and-earning13.jpg'),
(24, 140, 'Visiting the office of the owner of the Iranian Petroleum Industry', 'e-learning-and-earning-ltd-347397-portfolio-10.jpg'),
(25, 140, 'Program Photo', 'e-learning-and-earning-ltd-761367-e-learning-and-earning23.jpg'),
(26, 140, 'National Gold Cup Football Tournament - 2022', 'e-learning-and-earning-ltd-969260-portfolio-11.jpg'),
(27, 140, 'Office Corridor ', 'e-learning-and-earning-ltd-147011-e-learning-and-earning22.jpg'),
(28, 140, 'Office Corridor ', 'e-learning-and-earning-ltd-545395-industrial-training1.jpg'),
(30, 140, 'sdfsdf', 'e-learning-and-earning-ltd-159355-c2d88682-1090-4de6-a212-0383587cb752.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `gallery_image`
--

CREATE TABLE `gallery_image` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `userPic` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gallery_image`
--

INSERT INTO `gallery_image` (`id`, `user_id`, `title`, `userPic`) VALUES
(23, 140, 'ডিজিটাল মার্কেটিং ফর ফ্রিল্যান্সিং - ৩৭তম ব্যাচের শিক্ষার্থীদের শুভেচ্ছা !', 'e-learning-and-earning-ltd-522889-el-gl-1.jpg'),
(24, 140, 'Photo Gallery', 'e-learning-and-earning-ltd-22836-e-learning-and-earning12.jpg'),
(25, 140, 'Program Photo', 'e-learning-and-earning-ltd-847991-e-learning-and-earning15.jpg'),
(26, 140, 'Photo Gallery', 'e-learning-and-earning-ltd-906508-portfolio-8.jpg'),
(27, 140, 'Photo Gallery', 'e-learning-and-earning-ltd-414647-e-learning-and-earning10.jpg'),
(28, 140, 'Photo Gallery', 'e-learning-and-earning-ltd-115008-e-learning-and-earning22.jpg'),
(29, 140, 'Photo Gallery', 'e-learning-and-earning-ltd-613865-e-learning-and-earning10.jpg'),
(30, 140, 'Photo Gallery', 'e-learning-and-earning-ltd-881187-portfolio-6.jpg'),
(31, 140, 'Photo Gallery', 'e-learning-and-earning-ltd-969261-portfolio-2.jpg'),
(32, 140, 'Voluptas vero veniam', 'e-learning-and-earning-ltd-44207-e-learning-and-earning12.jpg'),
(33, 140, 'Id sapiente culpa a', 'e-learning-and-earning-ltd-101601-e-learning-and-earning1.jpg'),
(34, 140, 'Quisquam ullamco fug', 'e-learning-and-earning-ltd-581044-e-learning-and-earning1.jpg'),
(35, 140, 'Quis officiis perspi', 'e-learning-and-earning-ltd-564308-e-learning-and-earning1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `gallery_video`
--

CREATE TABLE `gallery_video` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `link` text NOT NULL,
  `userPic` varchar(255) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gallery_video`
--

INSERT INTO `gallery_video` (`id`, `user_id`, `title`, `link`, `userPic`, `date`) VALUES
(1, 140, 'SDF অফিস কতৃপক্ষ এবং ওয়ার্ল্ড ব্যাংকের প্রতিনিধি অফিস পরিদর্শনের কিছু মুহূর্ত ।', 'https://www.youtube.com/embed/71Sx3rjcvDE?si=nKiwWOfXR1qgKWO2', 'e-learning-and-earning-ltd-232151-blender-for-everyone.png', '2024-07-14 11:32:57'),
(2, 140, 'ই-লার্নিং অ্যান্ড আর্নিং লিমিটেড এর রাজশাহী শাখার একজন প্রশিক্ষণার্থীর সফলতার গল্প ।', 'https://www.youtube.com/embed/cubMR1irkzg?si=-ym_X-SoxdTDaRoY', 'e-learning-and-earning-ltd-301976-professional-video-editing.jpg', '2024-07-14 12:06:12'),
(3, 140, 'একজন প্রশিক্ষণার্থীর সফলতার গল্প', 'https://www.youtube.com/embed/f9ZYAw3T7A0?si=2HZUHOvYIgD4KLUV', 'e-learning-and-earning-ltd-854558-Front-End-Development-with-React.jpg', '2024-07-14 12:24:31'),
(4, 140, 'সনদপত্র বিতরণ অনুষ্ঠান', 'https://www.youtube.com/embed/CDAJoiIEFbc?si=50zgbqk6yY5qAQ5p', 'e-learning-and-earning-ltd-236713-Untitled-13.jpg', '2024-07-14 12:25:18'),
(5, 140, 'একজন প্রশিক্ষণার্থীর সফলতার গল্প', 'https://www.youtube.com/embed/SdULVB2s06Q?si=tZNq5_Hdr9birGES', 'e-learning-and-earning-ltd-465871-motion-graphic.jpg', '2024-07-14 12:25:53'),
(6, 140, 'সনদপত্র বিতরণ, জব ফেয়ার ও ইমপ্যাক্ট প্রকল্পের বায়োগ্যাস প্লান্ট স্থাপনের শুভ উদ্বোধন অনুষ্ঠান', 'https://www.youtube.com/embed/RltiOkMnSB8?si=x24f-9dlKZQ8X3eD', 'e-learning-and-earning-ltd-371277-uxui-design.jpg', '2024-07-14 12:27:49');

-- --------------------------------------------------------

--
-- Table structure for table `header_section`
--

CREATE TABLE `header_section` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `subtitle` varchar(255) DEFAULT NULL,
  `link_one` mediumtext DEFAULT NULL,
  `link_one_text` text DEFAULT NULL,
  `link_two` mediumtext DEFAULT NULL,
  `link_two_text` text DEFAULT NULL,
  `details` text NOT NULL,
  `userPic` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `header_section`
--

INSERT INTO `header_section` (`id`, `user_id`, `type`, `title`, `subtitle`, `link_one`, `link_one_text`, `link_two`, `link_two_text`, `details`, `userPic`) VALUES
(1, 140, 'Banner', 'Unlock Your Potential and Become an IT Professional ', 'Shape Your Future in the Digital World', 'regular-course', 'Explore Courses', 'about', 'About Us', 'At e-Learning & Earning ltd, we are dedicated to transforming talent into valuable assets. With a focus on industry-relevant skills and an up-to-date curriculum, we provide a learning experience guided by expert mentors. Choose from our in-demand courses designed to equip you with the knowledge and expertise to thrive in today’s digital landscape', 'banner-217131.png'),
(2, 140, 'Course', 'OUR SPECIAL COURSES', 'Sub Title', '', '', '', '', '<p><span style=\"color: #0d0d0d; font-family: S&ouml;hne, ui-sans-serif, system-ui, -apple-system, \'Segoe UI\', Roboto, Ubuntu, Cantarell, \'Noto Sans\', sans-serif, \'Helvetica Neue\', Arial, \'Apple Color Emoji\', \'Segoe UI Emoji\', \'Segoe UI Symbol\', \'Noto Color Emoji\'; font-size: 16px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; white-space: pre-wrap; background-color: #ffffff; text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial; display: inline !important; float: none;\">Moral education, also known as character education or values education, is the process of teaching children and adults fundamental moral values, such as honesty, respect, responsibility, integrity, and compassion. The goal of moral education is to develop individuals who are not only academically proficient but also morally upright and socially responsible.</span></p>', ''),
(3, 140, 'Why Chose', 'Why Choose Us', 'Why We Are The Best', NULL, '', NULL, '', 'Get certified, master modern tech skills, and level up your career — whether you’re starting out or a seasoned pro. 95% of eLearning learners report our hands-on content directly helped their careers.', 'banner-63103.jpg'),
(4, 140, 'Trainer', 'OUR EXPERT TRAINERS', 'Why', '', '', '', '', '<p>Details</p>', ''),
(5, 140, 'Testimonials', 'STUDENTS FEEDBACK', 'Why', '', '', '', '', '<p>fjg</p>', ''),
(6, 140, 'Gallery', 'OUR GALLERY', 'Why', '', '', '', '', '<p>fjg</p>', ''),
(7, 140, 'FAQ', 'Frequently Asked Questions', 'Sub Title', '', '', '', '', '<p><span style=\"color: #0d0d0d; font-family: S&ouml;hne, ui-sans-serif, system-ui, -apple-system, \'Segoe UI\', Roboto, Ubuntu, Cantarell, \'Noto Sans\', sans-serif, \'Helvetica Neue\', Arial, \'Apple Color Emoji\', \'Segoe UI Emoji\', \'Segoe UI Symbol\', \'Noto Color Emoji\'; font-size: 16px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; white-space: pre-wrap; background-color: #ffffff; text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial; display: inline !important; float: none;\">Moral education, also known as character education or values education, is the process of teaching children and adults fundamental moral values, such as honesty, respect, responsibility, integrity, and compassion. The goal of moral education is to develop individuals who are not only academically proficient but also morally upright and socially responsible.</span></p>', 'digital-training-center-817450-faq.png');

-- --------------------------------------------------------

--
-- Table structure for table `job_apply`
--

CREATE TABLE `job_apply` (
  `id` int(11) NOT NULL,
  `title` varchar(30) NOT NULL,
  `name` varchar(25) NOT NULL,
  `phone` varchar(25) NOT NULL,
  `email` varchar(25) NOT NULL,
  `present_address` varchar(30) NOT NULL,
  `cover_letter` varchar(50) NOT NULL,
  `cv_file` varchar(50) NOT NULL,
  `entry_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `job_apply`
--

INSERT INTO `job_apply` (`id`, `title`, `name`, `phone`, `email`, `present_address`, `cover_letter`, `cv_file`, `entry_date`) VALUES
(1, 'web', 'jahi55d', '01865277323', 'jahid@gmail.com', 'dhaka', 'hi', '', '0000-00-00 00:00:00'),
(2, 'Web Developer', 'Francesca Good', '01928695384', 'kexafe@mailinator.com', 'Minima recusandae E', 'sfsdf', '', '2025-04-20 17:51:12'),
(3, 'Web Developer', 'Francesca Good', '01928695384', 'kexafe@mailinator.com', 'dhaka', 'sdfsdf', '6804e069db8b4.pdf', '2025-04-20 17:54:17'),
(4, 'Web Developer', 'Francesca Good', '01928695384', 'kexafe@mailinator.com', 'Minima recusandae E', 'sdfsdf', '6804e311daa9a.pdf', '2025-04-20 18:05:37');

-- --------------------------------------------------------

--
-- Table structure for table `jubo_info_16`
--

CREATE TABLE `jubo_info_16` (
  `id` int(11) NOT NULL,
  `user_id` varchar(30) NOT NULL,
  `start_date` varchar(25) NOT NULL,
  `end_date` varchar(25) NOT NULL,
  `start_details` longtext DEFAULT NULL,
  `end_details` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jubo_info_16`
--

INSERT INTO `jubo_info_16` (`id`, `user_id`, `start_date`, `end_date`, `start_details`, `end_details`) VALUES
(1, '140', '2025-03-04', '2025-11-21', 'sdfsd', 'sdfsd');

-- --------------------------------------------------------

--
-- Table structure for table `jubo_info_48`
--

CREATE TABLE `jubo_info_48` (
  `id` int(11) NOT NULL,
  `user_id` varchar(30) NOT NULL,
  `start_date` varchar(25) NOT NULL,
  `end_date` varchar(25) NOT NULL,
  `start_details` longtext DEFAULT NULL,
  `end_details` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jubo_info_48`
--

INSERT INTO `jubo_info_48` (`id`, `user_id`, `start_date`, `end_date`, `start_details`, `end_details`) VALUES
(1, '140', '2025-03-03', '2025-08-21', 'Ad quo dolor enim eu', 'Id sed quis volupta');

-- --------------------------------------------------------

--
-- Table structure for table `map`
--

CREATE TABLE `map` (
  `mp_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `mp_title` varchar(300) NOT NULL,
  `mp_link` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `map`
--

INSERT INTO `map` (`mp_id`, `user_id`, `mp_title`, `mp_link`) VALUES
(1, 140, 'Google Map', 'https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d1825.5771759557658!2d90.359866!3d23.7775173!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c1fdea5e4ecf%3A0xeee537de7c4ef4da!2sMoral%20Learning%20Institute!5e0!3m2!1sen!2sbd!4v1710400558783!5m2!1sen!2sbd');

-- --------------------------------------------------------

--
-- Table structure for table `medical_admission`
--

CREATE TABLE `medical_admission` (
  `ad_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `ad_name` varchar(255) NOT NULL,
  `ad_details` text NOT NULL,
  `userPic` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `medical_admission`
--

INSERT INTO `medical_admission` (`ad_id`, `user_id`, `ad_name`, `ad_details`, `userPic`) VALUES
(1, 140, 'Medical1', '<p>Details Medical<br></p>', '611412.png');

-- --------------------------------------------------------

--
-- Table structure for table `medical_assistant_admission`
--

CREATE TABLE `medical_assistant_admission` (
  `ad_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `ad_name` varchar(255) NOT NULL,
  `ad_details` text NOT NULL,
  `userPic` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `medical_assistant_admission`
--

INSERT INTO `medical_assistant_admission` (`ad_id`, `user_id`, `ad_name`, `ad_details`, `userPic`) VALUES
(1, 140, 'Medical Assistant', '<p>Details Medical Assistant<br></p>', '361786.png');

-- --------------------------------------------------------

--
-- Table structure for table `mission`
--

CREATE TABLE `mission` (
  `ms_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `details` longtext NOT NULL,
  `userPic` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mission`
--

INSERT INTO `mission` (`ms_id`, `user_id`, `name`, `details`, `userPic`) VALUES
(1, 140, 'Our Mission Statement', '<p>To empower individuals with linguistic proficiency and cultural understanding to navigate a globalized world with confidence and competence.</p>\r\n<p><span style=\"font-size: 18pt; color: #00407b;\"><strong>Core Values:</strong></span></p>\r\n<ul style=\"list-style-type: square;\">\r\n<li><strong><span style=\"color: #00407b;\">Excellence</span>:</strong> Commitment to delivering high-quality language education and cultural understanding.</li>\r\n<li><strong><span style=\"color: #00407b;\">Inclusivity</span>:</strong> Providing an inclusive and supportive learning environment for all learners.</li>\r\n<li><strong><span style=\"color: #00407b;\">Innovation</span>:</strong> Embracing innovation and technology to enhance language learning.</li>\r\n<li><strong><span style=\"color: #00407b;\">Community</span>:</strong> Fostering a sense of community among our students, faculty, and staff.</li>\r\n<li><strong><span style=\"color: #00407b;\">Global Perspective</span>:</strong> Promoting a global perspective through language and cultural education.</li>\r\n<li><strong><span style=\"color: #00407b;\">Continuous Improvement</span>:</strong> Commitment to continuous improvement in curriculum, teaching methodologies, and student support services.</li>\r\n</ul>', '22254.png');

-- --------------------------------------------------------

--
-- Table structure for table `month`
--

CREATE TABLE `month` (
  `mnt_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `mnth_name` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `month`
--

INSERT INTO `month` (`mnt_id`, `user_id`, `mnth_name`) VALUES
(1, 140, 'June'),
(2, 140, 'July'),
(3, 140, 'August');

-- --------------------------------------------------------

--
-- Table structure for table `news_section`
--

CREATE TABLE `news_section` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` varchar(11) NOT NULL DEFAULT 'active',
  `news_title` varchar(50) NOT NULL,
  `news_subtitle` longtext NOT NULL,
  `details` longtext NOT NULL,
  `news_date` date NOT NULL,
  `userPic` varchar(200) DEFAULT NULL,
  `pdf_file` varchar(225) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `news_section`
--

INSERT INTO `news_section` (`id`, `user_id`, `status`, `news_title`, `news_subtitle`, `details`, `news_date`, `userPic`, `pdf_file`) VALUES
(27, 140, 'active', '🏢 অফিস ছুটির নোটিশ', '৩১ মে ২০২৫ তারিখে জুমারুল বিদা উপলক্ষে অফিস বন্ধ থাকবে', '<article class=\"text-token-text-primary w-full\" dir=\"auto\" data-testid=\"conversation-turn-6\" data-scroll-anchor=\"true\">\r\n<div class=\"text-base my-auto mx-auto py-5 [--thread-content-margin:--spacing(4)] @[37rem]:[--thread-content-margin:--spacing(6)] @[70rem]:[--thread-content-margin:--spacing(12)] px-(--thread-content-margin)\">\r\n<div class=\"[--thread-content-max-width:32rem] @[34rem]:[--thread-content-max-width:40rem] @[64rem]:[--thread-content-max-width:48rem] mx-auto flex max-w-(--thread-content-max-width) flex-1 text-base gap-4 md:gap-5 lg:gap-6 group/turn-messages focus-visible:outline-hidden\" tabindex=\"-1\">\r\n<div class=\"group/conversation-turn relative flex w-full min-w-0 flex-col agent-turn\">\r\n<div class=\"relative flex-col gap-1 md:gap-3\">\r\n<div class=\"flex max-w-full flex-col grow\">\r\n<div class=\"min-h-8 text-message relative flex w-full flex-col items-end gap-2 text-start break-words whitespace-normal [.text-message+&amp;]:mt-5\" dir=\"auto\" data-message-author-role=\"assistant\" data-message-id=\"47421eba-c3b2-49f4-b26d-5c5a233a9c67\" data-message-model-slug=\"gpt-4o\">\r\n<div class=\"flex w-full flex-col gap-1 empty:hidden first:pt-[3px]\">\r\n<div class=\"markdown prose dark:prose-invert w-full break-words light\">\r\n<p class=\"\" data-start=\"93\" data-end=\"112\">📌<br data-start=\"95\" data-end=\"98\" /><strong data-start=\"98\" data-end=\"112\">অফিস নোটিশ</strong></p>\r\n<p class=\"\" data-start=\"114\" data-end=\"173\"><strong data-start=\"114\" data-end=\"124\">তারিখ:</strong> ২১ এপ্রিল ২০২৫<br data-start=\"139\" data-end=\"142\" /><strong data-start=\"142\" data-end=\"159\">স্মারক নম্বর:</strong> অফিস/২০২৫/০৩১</p>\r\n<p class=\"\" data-start=\"175\" data-end=\"330\">সকল কর্মকর্তা ও কর্মচারীদের অবগতির জন্য জানানো যাচ্ছে যে, আগামী <strong data-start=\"239\" data-end=\"264\">৩১ মে ২০২৫ (শুক্রবার)</strong> পবিত্র <strong data-start=\"272\" data-end=\"288\">জুমারুল বিদা</strong> উপলক্ষে অফিস <strong data-start=\"302\" data-end=\"323\">সম্পূর্ণরূপে বন্ধ</strong> থাকবে।</p>\r\n<p class=\"\" data-start=\"332\" data-end=\"467\">এই ছুটির দিনটি সরকার ঘোষিত ছুটির অন্তর্ভুক্ত এবং অফিসের সকল কার্যক্রম ওই দিন বন্ধ থাকবে। জরুরি প্রয়োজন ছাড়া কেউ অফিসে প্রবেশ করবেন না।</p>\r\n<p class=\"\" data-start=\"469\" data-end=\"623\"><strong data-start=\"469\" data-end=\"623\">ছুটির আগের দিন অর্থাৎ ৩০ মে (বৃহস্পতিবার) পর্যন্ত অফিস স্বাভাবিক নিয়মে চলবে এবং পরবর্তী দিন অর্থাৎ ১ জুন (শনিবার) থেকে অফিস পুনরায় যথারীতি চালু থাকবে।</strong></p>\r\n<p class=\"\" data-start=\"625\" data-end=\"675\">সকলকে সময়মতো দায়িত্ব পালনের জন্য অনুরোধ করা হচ্ছে।</p>\r\n<p class=\"\" data-start=\"677\" data-end=\"706\">আশাকরি আপনারা সহযোগিতা করবেন।</p>\r\n<p class=\"\" data-start=\"708\" data-end=\"842\">ধন্যবাদান্তে,<br data-start=\"721\" data-end=\"724\" /><strong data-start=\"724\" data-end=\"746\">[প্রতিষ্ঠানের নাম]</strong><br data-start=\"746\" data-end=\"749\" /><strong data-start=\"749\" data-end=\"774\">[প্রতিষ্ঠানের ঠিকানা]</strong><br data-start=\"774\" data-end=\"777\" /><strong data-start=\"777\" data-end=\"797\">[আধিকারিকের নাম]</strong><br data-start=\"797\" data-end=\"800\" /><strong data-start=\"800\" data-end=\"810\">[পদবি]</strong><br data-start=\"810\" data-end=\"813\" /><strong data-start=\"813\" data-end=\"842\">[সাক্ষর ও সিল (প্রয়োজনে)]</strong></p>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</article>', '2025-04-21', 'e-learning-and-earning-ltd-772443-c2d88682-1090-4de6-a212-0383587cb752.jpeg', NULL),
(28, 140, 'active', '📝 পরীক্ষা সংক্রান্ত নোটিশ', '২০২৫ সালের ডিপ্লোমা ইন ইঞ্জিনিয়ারিং টার্ম ফাইনাল পরীক্ষা', '<h3 class=\"\" data-start=\"141\" data-end=\"177\"><span style=\"color: #f1c40f; font-size: 12pt;\"><strong data-start=\"148\" data-end=\"175\">পরীক্ষা সংক্রান্ত নোটিশ</strong></span></h3>\r\n<h4 class=\"\" data-start=\"178\" data-end=\"242\">২০২৫ সালের ডিপ্লোমা ইন ইঞ্জিনিয়ারিং টার্ম ফাইনাল পরীক্ষা</h4>\r\n<p class=\"\" data-start=\"244\" data-end=\"305\"><strong data-start=\"244\" data-end=\"254\">তারিখ:</strong> ২১ এপ্রিল ২০২৫<br data-start=\"269\" data-end=\"272\" /><strong data-start=\"272\" data-end=\"289\">স্মারক নম্বর:</strong> পরীক্ষা/২০২৫/০৭</p>\r\n<p class=\"\" data-start=\"307\" data-end=\"458\">সকল শিক্ষার্থীর অবগতির জন্য জানানো যাচ্ছে যে, ২০২৫ সালের <strong data-start=\"364\" data-end=\"414\">ডিপ্লোমা ইন ইঞ্জিনিয়ারিং টার্ম ফাইনাল পরীক্ষা</strong> আগামী <strong data-start=\"421\" data-end=\"436\">১৫ জুন ২০২৫</strong> তারিখ থেকে শুরু হবে।</p>\r\n<p class=\"\" data-start=\"460\" data-end=\"644\">পরীক্ষা সংক্রান্ত বিস্তারিত সময়সূচি (Routine) খুব শীঘ্রই ইনস্টিটিউটের নোটিশ বোর্ড এবং অফিসিয়াল ওয়েবসাইটে প্রকাশ করা হবে। সকল শিক্ষার্থীকে যথাসময়ে প্রস্তুতি গ্রহণের জন্য অনুরোধ করা হলো।</p>\r\n<p class=\"\" data-start=\"646\" data-end=\"666\"><strong data-start=\"646\" data-end=\"666\">বিশেষ নির্দেশনা:</strong></p>\r\n<ul data-start=\"667\" data-end=\"837\">\r\n<li class=\"\" data-start=\"667\" data-end=\"706\">\r\n<p class=\"\" data-start=\"669\" data-end=\"706\">পরীক্ষার সময় যথাসময়ে উপস্থিত হতে হবে।</p>\r\n</li>\r\n<li class=\"\" data-start=\"707\" data-end=\"773\">\r\n<p class=\"\" data-start=\"709\" data-end=\"773\">প্রবেশপত্র ছাড়া কোনো শিক্ষার্থী পরীক্ষায় অংশগ্রহণ করতে পারবে না।</p>\r\n</li>\r\n<li class=\"\" data-start=\"774\" data-end=\"837\">\r\n<p class=\"\" data-start=\"776\" data-end=\"837\">মোবাইল ফোন ও অন্যান্য ইলেকট্রনিক ডিভাইস পরীক্ষার হলে নিষিদ্ধ।</p>\r\n</li>\r\n</ul>\r\n<p class=\"\" data-start=\"839\" data-end=\"941\">পরীক্ষা সংক্রান্ত যেকোনো তথ্যের জন্য অফিস সময়ের মধ্যে পরীক্ষা শাখার সঙ্গে যোগাযোগ করার অনুরোধ করা হলো।</p>\r\n<p class=\"\" data-start=\"943\" data-end=\"1034\"><strong data-start=\"943\" data-end=\"960\">ধন্যবাদান্তে,</strong><br data-start=\"960\" data-end=\"963\" /><strong data-start=\"963\" data-end=\"984\">পরীক্ষা নিয়ন্ত্রক</strong><br data-start=\"984\" data-end=\"987\" /><strong data-start=\"987\" data-end=\"1009\">[ইনস্টিটিউটের নাম]</strong><br data-start=\"1009\" data-end=\"1012\" /><strong data-start=\"1012\" data-end=\"1034\">[ঠিকানা ও যোগাযোগ]</strong></p>', '2025-04-21', 'e-learning-and-earning-ltd-646641-6241e809-a419-4c42-8344-06e4910ce011.jpeg', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `office_exp_name`
--

CREATE TABLE `office_exp_name` (
  `of_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `office_exp_name`
--

INSERT INTO `office_exp_name` (`of_id`, `user_id`, `name`) VALUES
(3, 22, 'Keyboard'),
(4, 22, 'Keyboard'),
(5, 22, 'Mouse'),
(6, 22, 'Mavic mini'),
(7, 22, 'White paint'),
(8, 22, 'Costacb'),
(9, 130, 'New'),
(11, 130, 'Charger'),
(12, 130, 'profit'),
(13, 130, 'Khata'),
(14, 130, 'Pond-01 Season-01 ( January To December-2021 )'),
(15, 140, 'Fan'),
(16, 140, 'Burger'),
(17, 140, 'New Dd');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `order_date` date NOT NULL,
  `deliver_date_or_last_update` date NOT NULL,
  `client_name` varchar(255) NOT NULL,
  `client_contact` varchar(255) NOT NULL,
  `address` varchar(500) NOT NULL,
  `order_email` varchar(300) NOT NULL,
  `sub_total` varchar(255) NOT NULL,
  `vat` varchar(255) NOT NULL,
  `total_amount` varchar(255) NOT NULL,
  `discount` varchar(100) NOT NULL,
  `pre_due` varchar(500) NOT NULL,
  `today_total` varchar(500) NOT NULL,
  `grand_total` varchar(500) NOT NULL,
  `paid` varchar(100) NOT NULL,
  `deliver_date_paid` varchar(220) NOT NULL,
  `due` varchar(255) NOT NULL,
  `dues_or_paid` varchar(30) NOT NULL,
  `dues_or_paid_status` varchar(50) NOT NULL,
  `payment_type` int(11) NOT NULL,
  `payment_status` int(11) NOT NULL,
  `order_status` int(11) NOT NULL DEFAULT 0,
  `order_type` int(11) NOT NULL,
  `custom_invoice_no` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `order_id`, `user_id`, `customer_id`, `order_date`, `deliver_date_or_last_update`, `client_name`, `client_contact`, `address`, `order_email`, `sub_total`, `vat`, `total_amount`, `discount`, `pre_due`, `today_total`, `grand_total`, `paid`, `deliver_date_paid`, `due`, `dues_or_paid`, `dues_or_paid_status`, `payment_type`, `payment_status`, `order_status`, `order_type`, `custom_invoice_no`) VALUES
(1001, 0, 130, 101, '2020-07-18', '2024-03-31', 'Md.Samiul Alom', '01751458998', '', '', '450.00', '0.00', '450.00', '0', '0', '450.00', '450.00', '450', '0', '0.00', 'Dues', '4', 1, 1, 1, 1, 0),
(1002, 0, 130, 0, '2020-08-05', '2024-03-31', 'Md.Samiul Alom', '01751458998', '', '', '450.00', '0.00', '450.00', '0', '0', '450.00', '450.00', '450', '0', '0.00', 'Dues', '4', 1, 1, 1, 2, 0),
(1003, 0, 130, 104, '2020-08-10', '2024-03-31', 'Md.Samiul Alom', '01751458998', '', '', '450.00', '0.00', '450.00', '0', '0', '450.00', '450.00', '450', '0', '0.00', 'Dues', '4', 1, 1, 1, 1, 0),
(1004, 0, 130, 0, '2020-08-10', '2024-03-31', 'Md.Samiul Alom', '01751458998', '', '', '450.00', '0.00', '450.00', '0', '0', '450.00', '450.00', '450', '0', '0.00', 'Dues', '4', 1, 1, 1, 2, 0),
(1005, 0, 130, 101, '2022-01-28', '2024-03-31', 'Md.Samiul Alom', '01751458998', '', '', '450.00', '0.00', '450.00', '0', '0', '450.00', '450.00', '450', '0', '0.00', 'Dues', '4', 1, 1, 1, 1, 0),
(1006, 0, 130, 101, '2022-01-28', '2024-03-31', 'Md.Samiul Alom', '01751458998', '', '', '450.00', '0.00', '450.00', '0', '0', '450.00', '450.00', '450', '0', '0.00', 'Dues', '4', 1, 1, 1, 1, 0),
(1007, 0, 130, 101, '2022-01-28', '2024-03-31', 'Md.Samiul Alom', '01751458998', '', '', '450.00', '0.00', '450.00', '0', '0', '450.00', '450.00', '450', '0', '0.00', 'Dues', '4', 1, 1, 1, 1, 0),
(1008, 0, 130, 101, '2022-01-28', '2024-03-31', 'Md.Samiul Alom', '01751458998', '', '', '450.00', '0.00', '450.00', '0', '0', '450.00', '450.00', '450', '0', '0.00', 'Dues', '4', 1, 1, 1, 1, 0),
(1009, 0, 130, 101, '2022-01-28', '2024-03-31', 'Md.Samiul Alom', '01751458998', '', '', '450.00', '0.00', '450.00', '0', '0', '450.00', '450.00', '450', '0', '0.00', 'Dues', '4', 1, 1, 1, 1, 0),
(1010, 0, 130, 101, '2022-01-28', '2024-03-31', 'Md.Samiul Alom', '01751458998', '', '', '450.00', '0.00', '450.00', '0', '0', '450.00', '450.00', '450', '0', '0.00', 'Dues', '4', 1, 1, 1, 1, 0),
(1011, 0, 130, 101, '2022-01-28', '2024-03-31', 'Md.Samiul Alom', '01751458998', '', '', '450.00', '0.00', '450.00', '0', '0', '450.00', '450.00', '450', '0', '0.00', 'Dues', '4', 1, 1, 1, 1, 0),
(1012, 0, 130, 101, '2022-01-28', '2024-03-31', 'Md.Samiul Alom', '01751458998', '', '', '450.00', '0.00', '450.00', '0', '0', '450.00', '450.00', '450', '0', '0.00', 'Dues', '4', 1, 1, 1, 1, 0),
(1013, 0, 130, 104, '2022-01-28', '2024-03-31', 'Md.Samiul Alom', '01751458998', '', '', '450.00', '0.00', '450.00', '0', '0', '450.00', '450.00', '450', '0', '0.00', 'Dues', '4', 1, 1, 1, 1, 0),
(1014, 0, 130, 0, '2022-01-28', '2024-03-31', 'Md.Samiul Alom', '01751458998', '', '', '450.00', '0.00', '450.00', '0', '0', '450.00', '450.00', '450', '0', '0.00', 'Dues', '4', 1, 1, 1, 2, 0),
(1015, 0, 130, 0, '2022-01-28', '2024-03-31', 'Md.Samiul Alom', '01751458998', '', '', '450.00', '0.00', '450.00', '0', '0', '450.00', '450.00', '450', '0', '0.00', 'Dues', '4', 1, 1, 1, 2, 0),
(1016, 0, 130, 101, '2022-01-28', '2024-03-31', 'Md.Samiul Alom', '01751458998', '', '', '450.00', '0.00', '450.00', '0', '0', '450.00', '450.00', '450', '0', '0.00', 'Dues', '4', 1, 1, 1, 1, 0),
(1017, 0, 130, 101, '2022-01-28', '2024-03-31', 'Md.Samiul Alom', '01751458998', '', '', '450.00', '0.00', '450.00', '0', '0', '450.00', '450.00', '450', '0', '0.00', 'Dues', '4', 1, 1, 1, 1, 0),
(1018, 0, 130, 0, '2022-01-29', '2024-03-31', 'Md.Samiul Alom', '01751458998', '', '', '450.00', '0.00', '450.00', '0', '0', '450.00', '450.00', '450', '0', '0.00', 'Dues', '4', 1, 1, 1, 1, 0),
(1019, 0, 135, 105, '2022-01-30', '2024-03-31', 'Md.Samiul Alom', '01751458998', '', '', '450.00', '0.00', '450.00', '0', '0', '450.00', '450.00', '450', '0', '0.00', 'Dues', '4', 1, 1, 1, 1, 0),
(1020, 0, 135, 105, '2022-01-30', '2024-03-31', 'Md.Samiul Alom', '01751458998', '', '', '450.00', '0.00', '450.00', '0', '0', '450.00', '450.00', '450', '0', '0.00', 'Dues', '4', 1, 1, 1, 1, 0),
(1021, 0, 130, 101, '2022-01-30', '2024-03-31', 'Md.Samiul Alom', '01751458998', '', '', '450.00', '0.00', '450.00', '0', '0', '450.00', '450.00', '450', '0', '0.00', 'Dues', '4', 1, 1, 1, 1, 0),
(1022, 0, 136, 106, '2022-01-31', '2024-03-31', 'Md.Samiul Alom', '01751458998', '', '', '450.00', '0.00', '450.00', '0', '0', '450.00', '450.00', '450', '0', '0.00', 'Dues', '4', 1, 1, 1, 1, 0),
(1023, 0, 135, 107, '2022-02-01', '2024-03-31', 'Md.Samiul Alom', '01751458998', '', '', '450.00', '0.00', '450.00', '0', '0', '450.00', '450.00', '450', '0', '0.00', 'Dues', '4', 1, 1, 1, 1, 0),
(1024, 0, 135, 0, '2022-02-01', '2024-03-31', 'Md.Samiul Alom', '01751458998', '', '', '450.00', '0.00', '450.00', '0', '0', '450.00', '450.00', '450', '0', '0.00', 'Dues', '4', 1, 1, 1, 1, 0),
(1025, 0, 130, 0, '2022-02-02', '2024-03-31', 'Md.Samiul Alom', '01751458998', '', '', '450.00', '0.00', '450.00', '0', '0', '450.00', '450.00', '450', '0', '0.00', 'Dues', '4', 1, 1, 1, 1, 0),
(1026, 0, 130, 101, '2022-02-02', '2024-03-31', 'Md.Samiul Alom', '01751458998', '', '', '450.00', '0.00', '450.00', '0', '0', '450.00', '450.00', '450', '0', '0.00', 'Dues', '4', 1, 1, 1, 1, 0),
(1027, 1301027, 130, 104, '2022-02-02', '2022-02-02', 'Zobayer2', '01611-717527', 'Meghai', '', '10030.00', '0.00', '10030.00', '30', '0.00', '10000.00', '10000.00', '10000', '0', '0.00', 'Dues', '4', 1, 1, 1, 1, 0),
(1028, 1301028, 130, 101, '2022-02-02', '2022-02-02', 'Md.Samiul Alom', '01751458998', 'Tinmatha', '', '210.00', '0.00', '210.00', '0', '0.00', '210.00', '210.00', '210', '0', '0.00', 'Dues', '4', 1, 1, 1, 1, 0),
(1029, 1301029, 130, 104, '2022-02-02', '2022-02-02', 'Zobayer2', '01611-717527', 'Meghai', '', '90.00', '0.00', '90.00', '0', '0.00', '90.00', '90.00', '90', '0', '0.00', 'Dues', '4', 1, 1, 1, 1, 1001),
(1030, 1301030, 130, 104, '2022-02-02', '2022-02-02', 'Zobayer2', '01611-717527', 'Meghai', '', '2700.00', '0.00', '2700.00', '0', '0.00', '2700.00', '2700.00', '2000', '0', '700.00', 'Dues', '4', 2, 4, 1, 1, 1002),
(1031, 1301031, 130, 101, '2022-02-02', '2022-02-02', 'Md.Samiul Alom', '01751458998', 'Tinmatha', '', '90.00', '0.00', '90.00', '0', '0.00', '90.00', '90.00', '90', '0', '0.00', 'Dues', '4', 1, 1, 1, 1, 1003),
(1032, 0, 137, 109, '2022-02-03', '2024-03-31', 'Md.Samiul Alom', '01751458998', '', '', '450.00', '0.00', '450.00', '0', '0', '450.00', '450.00', '450', '0', '0.00', 'Dues', '4', 1, 1, 1, 1, 1001),
(1033, 1371033, 137, 109, '2022-02-03', '2022-02-03', 'Jhon doe', '846446456', 'New York City, USA', '', '2220.00', '0.00', '2220.00', '20', '0.00', '2200.00', '2220.00', '2200', '0', '0.00', 'Dues', '4', 1, 1, 1, 1, 1002),
(1034, 1371034, 137, 109, '2022-02-03', '2022-02-03', 'Jhon doe', '846446456', 'New York City, USA', '', '1600.00', '0.00', '1600.00', '0', '0.00', '1600.00', '1600.00', '1600', '0', '0.00', 'Dues', '4', 1, 1, 1, 1, 1003),
(1035, 1371034, 137, 109, '2022-02-03', '2022-02-03', 'Jhon doe', '846446456', 'New York City, USA', '', '1600.00', '0.00', '1600.00', '0', '0.00', '1600.00', '1600.00', '1600', '0', '0.00', 'Dues', '4', 1, 1, 1, 1, 1003),
(1036, 1371036, 137, 109, '2022-02-03', '2022-02-03', 'Jhon doe', '846446456', 'New York City, USA', '', '1600.00', '0.00', '1600.00', '0', '0.00', '1600.00', '1600.00', '1600', '0', '0.00', 'Dues', '4', 1, 1, 1, 1, 1004),
(1037, 1371037, 137, 0, '2022-02-03', '2022-02-03', 'Na', 'Na', 'Na', '', '1050.00', '0.00', '1050.00', '0', '0', '1050.00', '1050.00', '1050', '0', '0.00', 'Dues', '4', 1, 1, 1, 1, 1005),
(1038, 1371038, 137, 0, '2022-02-03', '2022-02-03', 'Na', 'Na', 'Na', 'Na', '550.00', '0.00', '550.00', '0', '0', '550.00', '550.00', '550', '0', '0.00', 'Dues', '4', 1, 1, 1, 1, 1006),
(1039, 1371039, 137, 0, '2022-02-03', '2022-02-03', 'Na', 'Na', 'Na', 'Na', '620.00', '0.00', '620.00', '0', '0', '620.00', '620.00', '620', '0', '0.00', 'Dues', '4', 1, 1, 1, 1, 1007),
(1040, 1371040, 137, 0, '2022-02-03', '2022-02-03', 'Kalam', '56456', 'Dhaka', 'samiulbdb@gmail.com', '1050.00', '0.00', '1050.00', '0', '0', '1050.00', '1050.00', '1050', '0', '0.00', 'Dues', '4', 1, 1, 1, 1, 1008),
(1041, 1371041, 137, 0, '2022-02-03', '2022-02-06', 'Na', 'Na', 'Na', 'Na', '550.00', '0.00', '550.00', '0', '0', '550.00', '550.00', '500', '0', '50.00', 'Dues', '4', 2, 4, 1, 1, 1009),
(1042, 1371042, 137, 109, '2022-02-10', '2022-02-10', 'Jhon doe', '846446456', 'New York City, USA', 'Na', '1120.00', '0.00', '1120.00', '20', '0.00', '1100.00', '1100.00', '1000', '0', '100.00', 'Dues', '4', 1, 4, 1, 1, 1010),
(1043, 1371043, 137, 110, '2022-02-23', '2022-02-23', 'Samiul Alom', '01751891037', 'Bogura', 'Na', '28000.00', '0.00', '28000.00', '500', '0', '27500.00', '27500.00', '20000', '0', '7500.00', 'Dues', '4', 1, 2, 1, 1, 1011),
(1044, 1371044, 137, 0, '2022-03-18', '2022-03-18', 'Na', 'Na', 'Na', 'Na', '12550.00', '0.00', '12550.00', '0', '0', '12550.00', '12550.00', '12550', '0', '0.00', 'Dues', '4', 1, 1, 1, 1, 1012),
(1045, 1371045, 137, 110, '2022-03-18', '2022-03-18', 'Samiul Alom', '01751891037', 'Bogura', 'Na', '1170.00', '0.00', '1170.00', '0', '7500.00', '1170.00', '8670.00', '870', '0', '7800.00', 'Dues', '4', 1, 1, 1, 1, 1013),
(1046, 1371046, 137, 0, '2022-03-20', '2022-03-20', 'Na', 'Na', 'Na', 'Na', '15000.00', '0.00', '15000.00', '0', '0', '15000.00', '15000.00', '10000', '0', '5000.00', 'Dues', '4', 2, 4, 1, 1, 1014),
(1047, 1301047, 140, 111, '2022-03-23', '2022-03-23', 'Sidgao', '3232323232', 'USA', 'Na', '2000.00', '0.00', '2000.00', '0', '0', '2000.00', '2000.00', '1000', '0', '1000.00', 'Dues', '4', 2, 4, 1, 1, 1001),
(1048, 1301048, 138, 0, '2022-03-23', '2022-03-23', 'Na', 'Na', 'Na', 'Na', '800.00', '0.00', '800.00', '0', '0', '800.00', '800.00', '800', '0', '0.00', 'Dues', '4', 2, 1, 1, 1, 10),
(1049, 1401048, 140, 114, '2022-04-02', '2022-04-06', 'Md.Jamal Sheakh', '01751891999', 'Pal Para', 'Na', '2500.00', '0.00', '2500.00', '0', '0', '2500.00', '2500.00', '1000', '0', '1500.00', 'Dues', '4', 2, 4, 1, 1, 1002),
(1050, 1401050, 140, 114, '2022-04-06', '2022-04-06', 'Md.Jamal Sheakh', '01751891999', 'Pal Para', 'jamal@gmail.com', '2600.00', '0.00', '2600.00', '0', '0', '2600.00', '2600.00', '1600', '0', '1000.00', 'Dues', '4', 2, 4, 1, 1, 1003),
(1051, 1401051, 140, 114, '2022-04-06', '2022-04-06', 'Md.Jamal Sheakh', '01751891999', 'Pal Para', 'jamal@gmail.com', '2500.00', '0.00', '2500.00', '0', '0', '2500.00', '2500.00', '500', '0', '2000.00', 'Dues', '4', 2, 2, 1, 1, 1004),
(1052, 1401052, 140, 114, '2022-06-05', '2022-06-05', 'Md.Jamal Sheakh', '01751891999', 'Pal Para', 'jamal@gmail.com', '3000.00', '0.00', '3000.00', '0', '0', '3000.00', '3000.00', '3000', '0', '0.00', 'Dues', '4', 1, 1, 1, 1, 1005),
(1053, 1401053, 140, 114, '2023-04-14', '2023-04-14', 'Md.Jamal Sheakh', '01751891999', 'Pal Para', 'jamal@gmail.com', '2500.00', '0.00', '2500.00', '0', '0', '2500.00', '2500.00', '0', '0', '2500.00', 'Dues', '4', 2, 5, 1, 1, 1006),
(1054, 1401054, 140, 113, '2023-04-15', '2023-04-15', 'Md.Salam Ali', '01751891037', 'Model village', 'salam@gmail.com', '5000.00', '0.00', '5000.00', '0', '1000', '5000.00', '6000.00', '0', '0', '6000.00', 'Dues', '4', 1, 5, 1, 1, 1007),
(1055, 1401055, 140, 113, '2023-10-12', '2023-10-12', 'Md.Salam Ali', '01751891037', 'Model village', 'salam@gmail.com', '8000.00', '0.00', '8000.00', '0', '1000', '8000.00', '9000.00', '9000', '0', '0.00', 'Dues', '4', 1, 1, 1, 1, 1008),
(1056, 1401056, 140, 114, '2023-10-12', '2023-10-12', 'Md.Jamal Sheakh1', '01751891999', 'Pal Para1', 'jamal@gmail.com', '5500.00', '0.00', '5500.00', '0', '0', '5500.00', '5500.00', '4000', '0', '1500.00', 'Dues', '4', 2, 2, 1, 1, 1009),
(1057, 1401057, 140, 113, '2023-10-17', '2023-10-17', 'Md.Salam Ali', '01751891037', 'Model village', 'salam@gmail.com', '2500.00', '0.00', '2500.00', '0', '1000', '2500.00', '3500.00', '500', '0', '3000.00', 'Dues', '4', 2, 4, 1, 1, 1010),
(1058, 1401058, 140, 113, '2024-01-31', '2024-01-31', 'Md.Salam Ali', '01751891037', 'Model village', 'salam@gmail.com', '6000.00', '0.00', '6000.00', '0', '1000', '6000.00', '7000.00', '300', '0', '6700.00', 'Dues', '4', 1, 1, 1, 1, 1011),
(1059, 1401059, 140, 113, '2024-01-31', '2024-03-21', 'Md.Salam Ali', '01751891037', 'Model village', 'salam@gmail.com', '2500.00', '0.00', '2500.00', '0', '0', '2500.00', '2500.00', '1500', '0', '1000.00', 'Dues', '4', 2, 3, 1, 1, 1012),
(1060, 1401060, 140, 113, '2024-03-25', '2024-03-25', 'Md.Salam Ali', '01751891037', 'Model village', 'salam@gmail.com', '2500.00', '0.00', '2500.00', '0', '0', '2500.00', '2500.00', '2500', '0', '0.00', 'Dues', '4', 1, 1, 1, 1, 1013),
(1061, 1401061, 140, 114, '2024-03-25', '2024-03-25', 'Md.Jamal Sheakh1', '01751891999', 'Pal Para1', 'jamal@gmail.com', '5500.00', '0.00', '5500.00', '0', '0', '5500.00', '5500.00', '3000', '0', '2500.00', 'Dues', '4', 1, 1, 1, 1, 1014),
(1062, 1401062, 140, 113, '2024-03-25', '2024-03-25', 'Md.Salam Ali', '01751891037', 'Model village', 'salam@gmail.com', '2500.00', '0.00', '2500.00', '0', '0', '2500.00', '2500.00', '2500', '0', '0.00', 'Dues', '4', 1, 1, 1, 1, 1015),
(1063, 1401063, 140, 114, '2024-03-25', '2024-03-25', 'Md.Jamal Sheakh1', '01751891999', 'Pal Para1', 'jamal@gmail.com', '6000.00', '0.00', '6000.00', '0', '0', '6000.00', '6000.00', '3000', '0', '3000.00', 'Dues', '4', 1, 1, 1, 1, 1016),
(1064, 1401064, 140, 122, '2024-03-25', '2024-03-29', 'Pappu', '5676', 'Village', 'samiul@gmail.com', '3000.00', '0.00', '3000.00', '0', '0', '3000.00', '3000.00', '3000', '0', '0.00', 'Dues', '4', 1, 1, 1, 1, 1017),
(1065, 1351025, 135, 122, '2024-03-31', '2024-03-31', 'Pappu', '5676', '', 'samiul@gmail.com', '12500.00', '0.00', '12500.00', '0', '0', '12500.00', '12500.00', '5000', '0', '7500.00', 'Dues', '4', 2, 4, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders_details`
--

CREATE TABLE `orders_details` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `order_date` date NOT NULL,
  `pre_due` varchar(255) NOT NULL,
  `today_total` varchar(255) NOT NULL,
  `grand_total` varchar(255) NOT NULL,
  `paid` varchar(255) NOT NULL,
  `recent_due` varchar(255) NOT NULL,
  `causes` varchar(200) NOT NULL,
  `order_type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders_details`
--

INSERT INTO `orders_details` (`id`, `user_id`, `order_id`, `student_id`, `order_date`, `pre_due`, `today_total`, `grand_total`, `paid`, `recent_due`, `causes`, `order_type`) VALUES
(54, 140, 0, 114, '2022-04-02', '0', '0', '0', '0', '0', 'New Student', 1),
(55, 140, 0, 113, '2022-04-02', '0', '0', '0', '0', '0', 'New Student', 1),
(56, 140, 0, 113, '2022-04-02', '3000', '0', '0', '2000', '1000', 'Dues Paid', 3),
(57, 140, 1401048, 114, '2022-04-02', '0', '2500.00', '2500.00', '1000', '1500.00', 'By Invoice', 1),
(58, 140, 1401050, 114, '2022-04-06', '0', '2600.00', '2600.00', '1600', '1000.00', 'By Invoice', 1),
(59, 140, 0, 113, '2022-04-06', '1000', '0', '0', '1000', '0', 'Dues Paid', 3),
(60, 140, 1401051, 114, '2022-04-06', '0', '2500.00', '2500.00', '500', '2000.00', 'By Invoice', 1),
(61, 140, 1401052, 114, '2022-06-05', '0', '3000.00', '3000.00', '3000', '0.00', 'By Invoice', 1),
(62, 140, 1401053, 114, '2023-04-14', '0', '2500.00', '2500.00', '0', '2500.00', 'By Invoice', 1),
(63, 140, 1401054, 113, '2023-04-15', '1000', '5000.00', '6000.00', '0', '6000.00', 'By Invoice', 1),
(64, 140, 1401055, 113, '2023-10-12', '1000', '8000.00', '9000.00', '9000', '0.00', 'By Invoice', 1),
(65, 140, 1401056, 114, '2023-10-12', '0', '5500.00', '5500.00', '4000', '1500.00', 'By Invoice', 1),
(66, 140, 1401057, 113, '2023-10-17', '1000', '2500.00', '3500.00', '500', '3000.00', 'By Invoice', 1),
(67, 140, 1401058, 113, '2024-01-31', '1000', '6000.00', '7000.00', '300', '6700.00', 'By Invoice', 1),
(68, 140, 1401059, 113, '2024-01-31', '0', '2500.00', '2500.00', '1500', '1000.00', 'By Invoice', 1),
(69, 140, 1401060, 113, '2024-03-25', '0', '2500.00', '2500.00', '2500', '0.00', 'By Invoice', 1),
(70, 140, 1401061, 114, '2024-03-25', '0', '5500.00', '5500.00', '3000', '2500.00', 'By Invoice', 1),
(71, 140, 1401062, 113, '2024-03-25', '0', '2500.00', '2500.00', '2500', '0.00', 'By Invoice', 1),
(72, 140, 1401063, 114, '2024-03-25', '0', '6000.00', '6000.00', '3000', '3000.00', 'By Invoice', 1),
(73, 140, 1401064, 122, '2024-03-25', '0', '3000.00', '3000.00', '3000', '0.00', 'By Invoice', 1),
(74, 135, 1351025, 122, '2024-03-31', '0', '12500.00', '12500.00', '5000', '7500.00', 'By Invoice', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders_dues`
--

CREATE TABLE `orders_dues` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `order_date` date NOT NULL,
  `last_update` date NOT NULL,
  `pre_due` varchar(500) NOT NULL,
  `today_total` varchar(500) NOT NULL,
  `grand_total` varchar(500) NOT NULL,
  `paid` varchar(240) NOT NULL,
  `recent_due` varchar(500) NOT NULL,
  `causes` varchar(200) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders_dues`
--

INSERT INTO `orders_dues` (`id`, `user_id`, `order_id`, `student_id`, `order_date`, `last_update`, `pre_due`, `today_total`, `grand_total`, `paid`, `recent_due`, `causes`, `status`) VALUES
(15, 140, 1401063, 114, '2024-03-25', '2024-03-25', '0', '6000.00', '6000.00', '3000', '3000.00', 'By Invoice', 1),
(16, 140, 1401062, 113, '2024-03-25', '2024-03-25', '0', '2500.00', '2500.00', '2500', '0.00', 'By Invoice', 3),
(17, 140, 1351025, 122, '2024-03-31', '2024-03-31', '0', '12500.00', '12500.00', '5000', '7500.00', 'By Invoice', 1),
(18, 140, 0, 123, '2024-03-25', '2024-03-25', '0', '0', '0', '0', '0', 'New Student', 1);

-- --------------------------------------------------------

--
-- Table structure for table `order_item`
--

CREATE TABLE `order_item` (
  `order_item_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL DEFAULT 0,
  `product_id` int(11) NOT NULL DEFAULT 0,
  `quantity` varchar(255) NOT NULL,
  `rate` varchar(255) NOT NULL,
  `total` varchar(255) NOT NULL,
  `short_details` varchar(1500) NOT NULL,
  `order_item_status` int(11) NOT NULL DEFAULT 0,
  `entry_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_item`
--

INSERT INTO `order_item` (`order_item_id`, `order_id`, `product_id`, `quantity`, `rate`, `total`, `short_details`, `order_item_status`, `entry_date`) VALUES
(1, 1001, 2001, '5', '50', '250.00', '', 1, '2020-07-18'),
(2, 1001, 2002, '5', '40', '200.00', '', 1, '2020-07-18'),
(3, 1002, 2001, '2', '55', '110.00', '', 1, '2020-08-05'),
(4, 1003, 2003, '5', '120', '600.00', '', 1, '2020-08-10'),
(5, 1003, 2001, '3', '50', '150.00', '', 1, '2020-08-10'),
(6, 1004, 2003, '2', '120', '240.00', '', 1, '2020-08-10'),
(7, 1005, 2001, '10', '50', '500.00', '', 1, '2022-01-28'),
(8, 1012, 3, '3', '120', '120.00', '', 1, '2022-01-28'),
(9, 1012, 5, '3', '30', '90.00', '', 1, '2022-01-28'),
(10, 1012, 3, '3', '120', '360.00', '', 1, '2022-01-28'),
(11, 1013, 3, '1', '120', '120.00', '', 1, '2022-01-28'),
(12, 1013, 5, '1', '30', '30.00', '', 1, '2022-01-28'),
(13, 1013, 6, '1', '10000', '10000.00', '', 1, '2022-01-28'),
(14, 1016, 3, '30', '120', '3600.00', '', 1, '2022-01-28'),
(15, 1016, 5, '50', '30', '1500.00', '', 1, '2022-01-28'),
(16, 1017, 3, '1', '500', '500.00', '', 1, '2022-01-28'),
(17, 1017, 5, '2', '310', '620.00', '', 1, '2022-01-28'),
(19, 1018, 2, '1', '40', '40.00', '', 1, '2022-01-29'),
(20, 1019, 7, '10', '50', '500.00', '', 1, '2022-01-30'),
(21, 1019, 8, '10', '100', '1000.00', '', 1, '2022-01-30'),
(22, 1019, 9, '15', '60', '900.00', '', 1, '2022-01-30'),
(23, 1020, 7, '5', '50', '250.00', '', 1, '2022-01-30'),
(24, 1020, 8, '8', '100', '800.00', '', 1, '2022-01-30'),
(25, 1020, 9, '4', '60', '240.00', '', 1, '2022-01-30'),
(26, 1021, 3, '8', '120', '960.00', '', 1, '2022-01-30'),
(27, 1021, 2, '10', '40', '400.00', '', 1, '2022-01-30'),
(28, 1022, 11, '1', '15000', '15000.00', '', 1, '2022-01-31'),
(29, 1022, 12, '50', '100', '5000.00', '', 1, '2022-01-31'),
(34, 1024, 8, '1', '100', '100.00', '', 1, '2022-02-01'),
(37, 1023, 8, '1', '100', '100.00', 'Very High', 1, '2022-02-01'),
(38, 1023, 8, '1', '100', '100.00', 'Medium Work', 1, '2022-02-01'),
(39, 1025, 1, '1', '50', '50.00', 'Na', 1, '2022-02-02'),
(40, 1025, 2, '1', '40', '40.00', 'Na', 1, '2022-02-02'),
(41, 1025, 5, '1', '30', '30.00', 'Na', 1, '2022-02-02'),
(42, 1026, 1, '1', '50', '50.00', 'Na', 1, '2022-02-02'),
(43, 1026, 2, '1', '40', '40.00', 'Na', 1, '2022-02-02'),
(44, 1301027, 5, '1', '30', '30.00', 'Na', 1, '2022-02-02'),
(45, 1301027, 6, '1', '10000', '10000.00', 'Na', 1, '2022-02-02'),
(46, 1301028, 1, '1', '50', '50.00', 'Na', 1, '2022-02-02'),
(47, 1301028, 2, '1', '40', '40.00', 'Na', 1, '2022-02-02'),
(48, 1301028, 3, '1', '120', '120.00', 'Na', 1, '2022-02-02'),
(49, 1301029, 1, '1', '50', '50.00', 'Na', 1, '2022-02-02'),
(50, 1301029, 2, '1', '40', '40.00', 'Na', 1, '2022-02-02'),
(51, 1301030, 3, '20', '120', '2400.00', 'Blur with new Style', 1, '2022-02-02'),
(52, 1301030, 5, '10', '30', '300.00', 'Medium Work', 1, '2022-02-02'),
(53, 1301031, 1, '1', '50', '50.00', 'Na', 1, '2022-02-02'),
(54, 1301031, 2, '1', '40', '40.00', 'Na', 1, '2022-02-02'),
(62, 1371033, 13, '1', '550', '550.00', 'model:150', 1, '2022-02-03'),
(63, 1371033, 14, '1', '1050', '1050.00', 'model:151', 1, '2022-02-03'),
(64, 1371033, 15, '1', '620', '620.00', 'model:153', 1, '2022-02-03'),
(67, 1371036, 13, '1', '550', '550.00', 'Na', 1, '2022-02-03'),
(68, 1371036, 14, '1', '1050', '1050.00', 'Na', 1, '2022-02-03'),
(69, 1371037, 14, '1', '1050', '1050.00', 'model:159', 1, '2022-02-03'),
(70, 1371038, 13, '1', '550', '550.00', 'Na', 1, '2022-02-03'),
(71, 1371039, 15, '1', '620', '620.00', 'Na', 1, '2022-02-03'),
(72, 1371040, 14, '1', '1050', '1050.00', 'Na', 1, '2022-02-03'),
(74, 1371041, 13, '1', '550', '550.00', 'Na', 1, '2022-02-03'),
(75, 1371042, 16, '1', '500', '500.00', 'Na', 1, '2022-02-10'),
(76, 1371042, 15, '1', '620', '620.00', 'Na', 1, '2022-02-10'),
(77, 1371043, 17, '2', '10000', '20000.00', 'warenty 1 year', 1, '2022-02-23'),
(78, 1371043, 19, '1', '8000', '8000.00', 'warenty 1 year', 1, '2022-02-23'),
(79, 1371044, 13, '1', '550', '550.00', 'Na', 1, '2022-03-18'),
(80, 1371044, 18, '1', '12000', '12000.00', 'Na', 1, '2022-03-18'),
(81, 1371045, 13, '1', '550', '550.00', 'Na', 1, '2022-03-18'),
(82, 1371045, 15, '1', '620', '620.00', 'Na', 1, '2022-03-18'),
(83, 1371046, 22, '50', '100', '5000.00', 'Medium Sise  50/KG', 1, '2022-03-20'),
(84, 1371046, 17, '1', '10000', '10000.00', 'Na', 1, '2022-03-20'),
(85, 1301047, 20, '1', '1000', '1000.00', 'Na', 1, '2022-03-23'),
(86, 1301047, 21, '1', '1000', '1000.00', 'Na', 1, '2022-03-23'),
(87, 1301048, 23, '1', '500', '500.00', 'Na', 1, '2022-03-23'),
(88, 1301048, 24, '1', '300', '300.00', 'Na', 1, '2022-03-23'),
(90, 1401048, 25, '1', '2500', '2500.00', '3-Month (Jan-June)', 1, '2022-04-02'),
(91, 1401050, 26, '1', '2600', '2600.00', '3-Month', 1, '2022-04-06'),
(92, 1401051, 25, '1', '2500', '2500.00', 'Three Month', 1, '2022-04-06'),
(94, 1401052, 26, '1', '3000', '3000.00', 'Six Month', 1, '2022-06-05'),
(95, 1401053, 25, '1', '2500', '2500.00', 'Three Month', 1, '2023-04-14'),
(96, 1401054, 28, '1', '5000', '5000.00', 'Six Month', 1, '2023-04-15'),
(103, 1401056, 25, '1', '2500', '2500.00', 'Three Month', 1, '2023-10-12'),
(104, 1401056, 29, '1', '3000', '3000.00', 'Six Month', 1, '2023-10-12'),
(105, 1401055, 28, '1', '5000', '5000.00', 'Six Month', 1, '2023-10-12'),
(106, 1401055, 27, '1', '3000', '3000.00', 'Three Month', 1, '2023-10-12'),
(107, 1401057, 25, '1', '2500', '2500.00', 'Three Month', 1, '2023-10-17'),
(108, 1401058, 26, '1', '3000', '3000.00', 'Six Month', 1, '2024-01-31'),
(109, 1401058, 27, '1', '3000', '3000.00', 'Three Month', 1, '2024-01-31'),
(111, 1401059, 25, '1', '2500', '2500.00', 'Three Month', 1, '2024-01-31'),
(112, 1401060, 25, '1', '2500', '2500.00', 'Three Month', 1, '2024-03-25'),
(113, 1401061, 25, '1', '2500', '2500.00', 'Three Month', 1, '2024-03-25'),
(114, 1401061, 26, '1', '3000', '3000.00', 'Six Month', 1, '2024-03-25'),
(117, 1401062, 25, '1', '2500', '2500.00', 'Three Month', 1, '2024-03-25'),
(120, 1401063, 27, '1', '3000', '3000.00', 'Three Month', 1, '2024-03-25'),
(121, 1401063, 26, '1', '3000', '3000.00', 'Six Month', 1, '2024-03-25'),
(125, 1401064, 27, '1', '3000', '3000.00', 'Three Month', 1, '2024-03-25'),
(126, 1351025, 32, '1', '12500', '12500.00', '3-Month', 1, '2024-03-31');

-- --------------------------------------------------------

--
-- Table structure for table `partner`
--

CREATE TABLE `partner` (
  `pr_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `pr_name` varchar(200) NOT NULL,
  `pr_details` varchar(200) NOT NULL,
  `userPic` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `partner`
--

INSERT INTO `partner` (`pr_id`, `user_id`, `pr_name`, `pr_details`, `userPic`) VALUES
(3, 140, 'Amazon', '', 'e-learning-and-earning-ltd-783306-bcc.jpg'),
(4, 140, 'Freelancer.com', '', 'e-learning-and-earning-ltd-505937-bitm.png'),
(5, 140, 'Fiverr', '', 'e-learning-and-earning-ltd-875188-at.jpg'),
(6, 140, 'Upwork', '', 'e-learning-and-earning-ltd-59182-byests.jpeg'),
(8, 140, 'Toptal', '', 'e-learning-and-earning-ltd-897958-comtia.png'),
(9, 140, 'Toptal', 'Na', 'e-learning-and-earning-ltd-963561-nhrdf.jpeg'),
(10, 140, 'Toptal', 'Na', 'e-learning-and-earning-ltd-185118-dbw.jpg'),
(11, 140, 'Fiverr', 'Na', 'e-learning-and-earning-ltd-207292-pairson.png'),
(12, 140, 'Freelancer.com', 'Na', 'e-learning-and-earning-ltd-101670-army.png'),
(13, 140, 'N/A', 'Na', 'e-learning-and-earning-ltd-691390-army.png');

-- --------------------------------------------------------

--
-- Table structure for table `password`
--

CREATE TABLE `password` (
  `passwordid` int(11) NOT NULL,
  `original` varchar(30) NOT NULL,
  `mdfive` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `password`
--

INSERT INTO `password` (`passwordid`, `original`, `mdfive`) VALUES
(6, 'admin', '21232f297a57a5a743894a0e4a801fc3'),
(130, 'samiul004', 'b17c7f9d339f87ae91c72e08daf1c8db'),
(135, 'Sam1', '490bd89bcdc4e9f01d1a33899736f7a3'),
(140, 'ITM23', 'eb2dd0656157562e37736fe7e186d438');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `order_date` date NOT NULL,
  `last_update` date NOT NULL,
  `pre_due` varchar(500) NOT NULL,
  `today_total` varchar(500) NOT NULL,
  `grand_total` varchar(500) NOT NULL,
  `paid` varchar(240) NOT NULL,
  `recent_due` varchar(500) NOT NULL,
  `dues_or_paid` varchar(30) NOT NULL,
  `dues_or_paid_status` int(11) NOT NULL,
  `cuses` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `user_id`, `order_id`, `customer_id`, `order_date`, `last_update`, `pre_due`, `today_total`, `grand_total`, `paid`, `recent_due`, `dues_or_paid`, `dues_or_paid_status`, `cuses`) VALUES
(2, 130, 1301031, 101, '2022-02-02', '2022-02-02', '0.00', '90.00', '90.00', '90', '0.00', 'Dues', 5, 'By Invoice'),
(3, 130, 0, 102, '2020-08-05', '2020-08-05', '0', '0', '0', '0', '0', 'Dues', 4, 'New Customer'),
(4, 130, 1301030, 104, '2022-02-02', '2022-02-02', '0.00', '2700.00', '2700.00', '2000', '700.00', 'Dues', 4, 'By Invoice'),
(5, 135, 1020, 105, '2022-01-30', '2022-01-30', '0.00', '1280.00', '1280.00', '1000', '280.00', 'Dues', 4, 'By Invoice'),
(6, 136, 1022, 106, '2022-01-31', '2022-01-31', '10000.00', '0', '0', '10000', '0', 'Dues', 5, 'Dues Paid'),
(7, 135, 1023, 107, '2022-02-01', '2022-02-01', '0', '200.00', '200.00', '1600', '0.00', 'Dues', 4, 'Invoice Update'),
(8, 135, 0, 108, '2022-02-01', '2022-02-01', '0', '0', '0', '0', '0', 'Dues', 4, 'New Customer'),
(9, 137, 1371042, 109, '2022-02-10', '2022-02-10', '0.00', '1100.00', '1100.00', '1000', '100.00', 'Dues', 4, 'By Invoice'),
(10, 137, 1371045, 110, '2022-03-18', '2022-03-18', '7500.00', '1170.00', '8670.00', '870', '7800.00', 'Dues', 4, 'By Invoice'),
(11, 140, 1301047, 111, '2022-03-23', '2022-03-23', '0', '2000.00', '2000.00', '1000', '1000.00', 'Dues', 4, 'By Invoice'),
(12, 137, 0, 112, '2022-03-20', '2022-03-20', '0', '0', '0', '0', '0', 'Dues', 4, 'New Customer');

-- --------------------------------------------------------

--
-- Table structure for table `popup`
--

CREATE TABLE `popup` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `link` varchar(255) NOT NULL,
  `status` varchar(50) DEFAULT NULL,
  `userPic` varchar(25) DEFAULT NULL,
  `date` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `popup`
--

INSERT INTO `popup` (`id`, `user_id`, `link`, `status`, `userPic`, `date`) VALUES
(1, 140, 'http://localhost/all/jahid/e-learnign-ltd/regular-course', 'active', 'banner-844287.png', '2025-04-24');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(500) NOT NULL,
  `product_image` text NOT NULL,
  `quantity` varchar(100) NOT NULL,
  `duration` varchar(250) NOT NULL,
  `course_fee` varchar(255) NOT NULL,
  `my_cost` varchar(250) NOT NULL,
  `entry_date` date NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `product_image`, `quantity`, `duration`, `course_fee`, `my_cost`, `entry_date`, `user_id`) VALUES
(25, 'Computer Office Application', '250745.', '-8', 'Three Month', '2500', '2000', '2022-03-31', 140),
(26, 'Computer Office Application', '601432.', '-4', 'Six Month', '3000', '2500', '2022-03-31', 140),
(27, 'Database Programming', '891517.', '-3', 'Three Month', '3000', '2500', '2022-04-06', 140),
(29, 'Graphics Design & Multimedia', '865016.', '0', 'Six Month', '3000', '2500', '2022-04-06', 140),
(30, 'ADVANCED CERTIFICATE COURSE IN COMPUTER APPLICATION', '417198.', '1', 'One Year And Two Semester with 11 subject', '35000', '30000', '2022-04-06', 140),
(31, 'Computer Office Application', '410471.', '1', 'Three Month', '3000', '2500', '2022-06-01', 137),
(32, 'Web Design', '463830.', '0', '3-Month', '12500', '5000', '2024-03-31', 135);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `pro_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_name` varchar(300) NOT NULL,
  `short_details` varchar(500) NOT NULL,
  `details` longtext NOT NULL,
  `size` varchar(150) NOT NULL,
  `weight` varchar(50) NOT NULL,
  `price` varchar(40) NOT NULL,
  `photo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`pro_id`, `user_id`, `product_name`, `short_details`, `details`, `size`, `weight`, `price`, `photo`) VALUES
(13, 130, 'Enerton', 'Vitalizer & Tonic (Herbal & Nutraceuticals)', 'Strength and energy booster . Superb sports tonic . Tonic for asthmatic patients . Libido enhancer . Excellent solution for debility', 'Children: Under the age of 12 years: Not recommended Adult: 2 - 3 teaspoonful (10 - 15ml) 2-3 times daily or as directed by the physician. ', '200 ml Syrup in PET Bottle', '3', '649856.jpg'),
(14, 130, 'Eredex', 'Aphrodisiac (Herbal & Nutraceuticals)', 'Erectile dysfunction (Male Impotence), Loss of Libido, Exhaustion', '1 capsule 3 times daily or as advised by the physician. ', '5.4mg capsule. 4 x 6\'s Alu-Alu blister Pack', '2', '992653.jpg'),
(15, 130, 'Adovas', 'Adhatoda vasica', 'AdovasÂ® is a sugar free, non sedating herbal cough syrup. It liquefies phlegm. It is effective for all kinds of common cold and cough such as, dry irritable cough, allergic cough, smokers cough and cough associated with bronchitis. It soothens the throat irritation and relieves hoarseness. ', 'Adults: 3 tea spoonfuls (15 ml) 2-3 times a day. In acute cough warm water can be added for better result. Children under 12 years of age: 1-2 teaspoo', '100 ml & 200ml Syrup in PET bottle.', '3', '693666.jpg'),
(16, 130, 'Asmon ', 'Asmona', 'helps to control asthma and dyspnoea,\r\n prevents allergies,\r\nrelieves bronchitis,\r\nrelieves cough.', 'Adult: 2 tablets daily in the evening or as directed by the physician.\r\nNB: Not recommended for under 8 years old children.\r\n', '50 Tablets in a modern plastic container', '1', '902656.jpg'),
(17, 130, 'Serpentin', 'Effective for Hypertension ', 'Control hypertension,\r\nrelieves unsteadiness,\r\nrelieves insomnia,\r\nrelieves headache.', '1-2 tablets morning and evening daily or as directed by the physician', '10 × 5 tablets blister box.', '1', '50072.jpg'),
(18, 130, 'AmCivit®', 'Amlaki rashayan', 'Vitamin C deficiency, Scurvy, Anemia in children, Prevent premature ageing.', '6 months-12 years: 1/2 teaspoonful-2 teaspoonful 3 times daily.\r\nAbove 12 years-Adult: 2-3 teaspoonful 3 times daily.', '100 ml Syrup in PET bottle', '3', '674094.jpg'),
(19, 130, 'Arubin®', 'Carbonyl enriched herbal hematinic', 'Carbonyl enriched herbal hematinic', 'Adult: 1 capsule should be taken daily before meal.\r\nChildren: Not recommended for children under 12 years of age.', '3 x 10`s blister pack', '2', '334591.png'),
(20, 130, 'Ulpep™', 'Hingastak churna', 'Indication:\r\n    Gastritis (wounds in the lining of stomach)\r\n    Gastric Ulcer & Duodenal Ulcer\r\n    Dyspepsia\r\n    Indigestion', 'One Ulpep™ capsule 2 times a day before meals or as directed by the physician.', 'Strength: 500 mg Dosage form: Capsule Pack size: 3', '2', '643378.jpg'),
(21, 130, 'UripamTM Softgel', 'Saw Palmetto', 'UripamTM is indicated for the treatment of Benign prostatic hyperplasia (BPH).', 'One softgel capsule one to two times daily or as advised by the physician.', 'UripamTM Softgel Capsule: Each box contains 30 sof', '2', '428262.png'),
(22, 130, 'Torel™', 'Muscle rub', '• Muscle pain\r\n\r\n• Sprains, strains and sports injuries\r\n\r\n• Headache\r\n\r\n• Bruising\r\n\r\n• Fibrositis\r\n\r\n• Neuralgia\r\n\r\n• Pain due to herpes zoster\r\n\r\n• Osteoarthritis', 'Adult: Clean the affected area. Apply a small amount of TorelTM muscle rub (an amount equal to the surface area of the tip of a finger) 3 to 4 times d', 'TorelTM : Each lami tube contains 20 gm TorelTM mu', '4', '113370.png'),
(23, 130, 'Reli BalmTM', 'Neck & Shoulder Rub', 'Neck & Shoulder pain', 'For adults and children over 12, rub well on the affected area. Repeat 3 to 4 times daily.', 'Each lamitube contains 25 gm Neck & Shoulder Rub. ', '4', '200168.jpg'),
(24, 130, 'Giloba®', 'Ginkgo biloba', '    Cerebral insufficiency,\r\n    Demential syndromes: memory deficit, poor concentration, depression, dizziness and headache,\r\n    Vertigo & tinnitus,\r\n    Peripheral vascular diseases,\r\n    Sexual dysfunction secondary to SSRI use,\r\n    Acute cochlear deafness.', 'Giloba® 60 mg 1 or 2 capsule 2 to 3 times daily or as advised by the physician.\r\nGiloba® 120 mg 1 or 2 capsule 2 to 3 times daily or as advised by the', 'Giloba® 60 mg: 5 x 6\'s Alu-Alu blister pack, <br> ', '2', '583603.jpg'),
(25, 130, 'Gintex®', 'Panax ginseng', '• Adaptogen & General Tonic for fatigue\r\n• Aphrodisiac & for Erectile Dysfunction\r\n• As an additive in Non Insulin Dependent Diabetes Mellitus\r\n• Menopausal symptoms\r\n• Immunostimulation\r\n• Pulmonary function improvement\r\n• Chronic respiratory disease', 'One Gintex® capsule one or two times a day or as advised by the physician. ', 'One Gintex® capsule one or two times a day or as a', '2', '279261.jpg'),
(26, 130, 'Lecogen', 'Lecogena', 'relieves long-standing lecucorrhoea.\r\neffective for trichomonas vaginalis, candida albicans, fungal and bacterial infections.\r\n relieves abnormal discharge and protects urinogenital infection.\r\nrelieves irregular menstruation, pain and inflammation of uterus.\r\ndiminished albuminuria.\r\neffective for gonorrhoea, syphilis and inflammation of gonorrhea.\r\n strengthens the body and prevents effect of age.', 'Adult: 2 tablets to be taken with milk morning & evening daily or as directed by the physician.', '10 × 5 film coated tablets blister box.', '1', '607063.jpg'),
(27, 130, 'Herboplex ', 'Vitamin & Mineral deficiencies', 'Herboplex is an ideal nutritional therapy of natural extract.\r\n\r\n    Relieves General weakness\r\n    Effective for vitamin and mineral deficiencies.\r\n    Effective in anemia during pregnancy.', '\r\n\r\nAdult: 2 teaspoonfuls 1-2 times daily.<br>\r\n\r\nChildren: 1 teaspoonful 1-2 times daily.\r\n', '100ml, 200ml & 450ml syrup PET bottle with measuri', '3', '847916.jpg'),
(28, 130, 'Livoliv ', 'Effective for Liver disorder & to Protect the Liver', 'Livoliv relieves hepatitis, all kinds of jaundice, protect menopausal hot flushes, burning sensation of body & skin', 'Adult: 2-4 teaspoonfuls 2-3 times daily after meal.<br>\r\n\r\nChildren: 1-2 teaspoonfuls 2-3 times daily after meal or as directed by the physician.', '100 ml & 450ml  syrup  in PET bottle with a measur', '3', '365673.jpg'),
(29, 130, 'Dyalin ', 'Remedy for Dysentery, Bacillary dysentery & Diarrhoea', 'Dyalin relieves dysentery, bacillary dysentery, haemorrhydal bleeding, intestinal colic, diarrhoea', 'Adult: 2-4 teaspoonfuls 3 times daily after meal.<br>\r\nChildren: 1-2 teaspoonfuls 3 times daily after meal, or as directed by the physician.\r\n', '450ml PET bottle syrup with a measuring cap.', '3', '135387.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `product_category`
--

CREATE TABLE `product_category` (
  `cat_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `cat_name` varchar(200) NOT NULL,
  `cat_details` varchar(200) NOT NULL,
  `link` varchar(300) NOT NULL,
  `cat_photo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_category`
--

INSERT INTO `product_category` (`cat_id`, `user_id`, `cat_name`, `cat_details`, `link`, `cat_photo`) VALUES
(1, 140, 'Tablet', 'Unani Best Medicin', 'tablet.php', '196361.jpg'),
(2, 140, 'Capsule', 'Unani Best Medicin', 'capsule.php', '567846.jpg'),
(3, 140, 'Syrup', 'Unani Best Medicin', 'syrup.php', '404832.jpg'),
(4, 140, 'Gel', 'Unani Best Medicin', 'gel.php', '220476.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `publish1`
--

CREATE TABLE `publish1` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `pb_title` varchar(500) NOT NULL,
  `pb_subtitle` longtext NOT NULL,
  `pb_date` date NOT NULL,
  `pb_file` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `publish1`
--

INSERT INTO `publish1` (`id`, `user_id`, `pb_title`, `pb_subtitle`, `pb_date`, `pb_file`) VALUES
(1, 140, ' Result Of Computer Science Engineering (4th Semester)', '<p><span style=\"color: rgb(82, 83, 104); font-family: &quot;Open Sans&quot;, sans-serif; font-size: 14px; background-color: rgb(243, 242, 242);\">Diploma in Engineering</span><br></p>', '2023-09-13', '');

-- --------------------------------------------------------

--
-- Table structure for table `publish_result_routine`
--

CREATE TABLE `publish_result_routine` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `userPic` varchar(200) NOT NULL,
  `entry_date` datetime NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `publish_result_routine`
--

INSERT INTO `publish_result_routine` (`id`, `user_id`, `type`, `title`, `userPic`, `entry_date`, `status`) VALUES
(33, 140, 1, 'Result Of Computer Science Engineering (4th Semester)', 'prince-894464-Institution Approval Letter.pdf', '2023-10-06 21:33:25', 1),
(34, 140, 2, 'Medical Assistant Programme 12', 'prince-1863-Fordwing Domail.pdf', '2023-10-06 21:35:20', 1),
(35, 140, 3, 'Nursing & Midwifery Programme', 'prince-588781-Dental bangla Email.pdf', '2023-10-06 21:38:54', 1);

-- --------------------------------------------------------

--
-- Table structure for table `seo_section`
--

CREATE TABLE `seo_section` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `canonical_link` varchar(255) NOT NULL,
  `keyword` mediumtext NOT NULL,
  `description` mediumtext NOT NULL,
  `author` varchar(255) NOT NULL,
  `breadcrumb_title` varchar(255) DEFAULT NULL,
  `breadcrumb_subtitle` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `seo_section`
--

INSERT INTO `seo_section` (`id`, `user_id`, `type`, `title`, `canonical_link`, `keyword`, `description`, `author`, `breadcrumb_title`, `breadcrumb_subtitle`) VALUES
(1, 140, 'Home', 'Digital Training Center', 'Digital Training Center', 'Digital Training Center', 'Digital Training Center', 'Digital Training Center', 'Home', 'Home'),
(5, 140, 'About', 'About Us', 'About Us', 'About Us', 'About Us', 'About Us', 'About Us', 'About Us'),
(6, 140, 'Team', 'Our Expert Team Members', 'Our Expert Team Members', 'Our Expert Team Members', 'Our Expert Team Members', 'Our Expert Team Members', 'Our Expert Team Members', 'Team'),
(7, 140, 'Teacher', 'Our Teacher', 'Our Teacher', 'Our Teacher', 'Our Teacher', 'Our Teacher', 'Teacher', 'Teacher'),
(8, 140, 'Student', 'Success Students', 'Success Students', 'Success Students', 'Success Students', 'Success Students', 'Our Success Students', 'Student'),
(9, 140, 'Course', 'Our Courses', 'Our Course', 'Our Course', 'Our Course', 'Our Course', 'Our Courses', 'Course'),
(10, 140, 'Gallery', 'Our Gallery', 'Our Gallery', 'Our Gallery', 'Our Gallery', 'Our Gallery', 'Gallery', 'Gallery'),
(11, 140, 'Blog', 'Blog', 'Blog', 'Blog', 'Blog', 'Blog', 'Blog', 'Blog'),
(12, 140, 'Blog Details', 'Blog Details', 'Blog Details', 'Blog Details', 'Blog Details', 'Blog Details', 'Blog Details', 'Blog Details'),
(13, 140, 'Contact', 'Contact Us', 'Contact Us', 'Contact Us', 'Contact Us', 'Contact Us', 'Contact', 'Contact'),
(16, 140, 'Course Details', 'Sit aut enim suscip', 'Saepe dolor quis qui', 'Quod labore impedit', 'Ab culpa omnis earu', 'Dignissimos enim aut', 'Course Details', 'Course Details'),
(17, 140, 'testimonials', 'Our Students Feedback', 'Saepe dolor quis qui', 'Our Students Feedback', 'Our Students Feedback', 'Students Feedback', 'Our Students Feedback', 'Feedback');

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `subtitle` varchar(255) NOT NULL,
  `details` text NOT NULL,
  `userPic` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`id`, `category_id`, `user_id`, `title`, `subtitle`, `details`, `userPic`) VALUES
(3, 0, 140, 'Distinctio Quam ut ', 'Quis ea et ut nemo a', '<p>Amet, mollit eum dol.</p>', 'prince-946653-square-dot.png'),
(4, 0, 140, 'Sed laudantium pers', 'Incididunt facere ex', '<p>In veritatis consequ.</p>', 'digital-training-center-493611-square-dot.png');

-- --------------------------------------------------------

--
-- Table structure for table `services_feature`
--

CREATE TABLE `services_feature` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `sub_title` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `link1` varchar(255) DEFAULT NULL,
  `link2` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `services_feature`
--

INSERT INTO `services_feature` (`id`, `user_id`, `title`, `sub_title`, `image`, `link1`, `link2`) VALUES
(2, 140, 'title', '<p>hlkhlkhlkhlkh</p>', 'img-746437-square-dot.png', 'products', 'link2');

-- --------------------------------------------------------

--
-- Table structure for table `service_category`
--

CREATE TABLE `service_category` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `cat_name` varchar(255) NOT NULL,
  `cat_details` text NOT NULL,
  `link` varchar(500) NOT NULL,
  `cat_photo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `service_category`
--

INSERT INTO `service_category` (`id`, `user_id`, `cat_name`, `cat_details`, `link`, `cat_photo`) VALUES
(1, 140, 'Carla Newton', '<p>Nulla nihil consequa.</p>', 'Dolore et aspernatur', 'prince-661831-square-dot.png'),
(5, 140, 'Zenaida England', '<p>Qui nihil illo aliqu.</p>', 'At quo aut minus qua', 'prince-539881-square-dot.png');

-- --------------------------------------------------------

--
-- Table structure for table `skill_section`
--

CREATE TABLE `skill_section` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `percent` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `skill_section`
--

INSERT INTO `skill_section` (`id`, `user_id`, `name`, `percent`) VALUES
(6, 130, 'Web Development', '80%'),
(7, 130, 'Adobe', '60%'),
(67, 130, 'Microsoft Office', '70%');

-- --------------------------------------------------------

--
-- Table structure for table `slider_section`
--

CREATE TABLE `slider_section` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `slider_title` varchar(200) DEFAULT NULL,
  `slider_subtitle` varchar(200) DEFAULT NULL,
  `link` varchar(250) NOT NULL,
  `link2` varchar(250) DEFAULT NULL,
  `userPic` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `slider_section`
--

INSERT INTO `slider_section` (`id`, `user_id`, `slider_title`, `slider_subtitle`, `link`, `link2`, `userPic`) VALUES
(2, 140, NULL, NULL, 'regular-course', NULL, 'e-learning-and-earning-ltd-987233-Screenshot_1w.png'),
(17, 140, NULL, NULL, 'trainer', NULL, 'e-learning-and-earning-ltd-690570-Screenshot_1w.png'),
(18, 140, NULL, NULL, 'student-feedback', NULL, 'e-learning-and-earning-ltd-208181-buttc-certificate.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `social_media`
--

CREATE TABLE `social_media` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `facebook` varchar(100) NOT NULL,
  `twitter` varchar(100) NOT NULL,
  `youtube` varchar(100) NOT NULL,
  `instagram` varchar(100) NOT NULL,
  `tiktok` varchar(255) DEFAULT NULL,
  `linkedin` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `social_media`
--

INSERT INTO `social_media` (`id`, `user_id`, `facebook`, `twitter`, `youtube`, `instagram`, `tiktok`, `linkedin`) VALUES
(15, 140, 'https://www.facebook.com/morallearningdhaka', 'https://twitter.com/morallearning', 'https://www.youtube.com/@morallearninginstitute', '', '', 'https://www.linkedin.com/in/morallearninginstitute/');

-- --------------------------------------------------------

--
-- Table structure for table `stats`
--

CREATE TABLE `stats` (
  `st_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `st_name` varchar(300) NOT NULL,
  `st_num` varchar(100) NOT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `userPic` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stats`
--

INSERT INTO `stats` (`st_id`, `user_id`, `st_name`, `st_num`, `icon`, `userPic`) VALUES
(1, 140, 'Teachers', '25', '', 'digital-training-center-492509-irani5.jpg'),
(2, 140, 'Courses', '10', '', 'digital-training-center-134497-digital-training-center-145051-Course.jpg'),
(3, 140, 'Trained Students', '550', '', 'digital-training-center-131606-digital-training-center-700153-Students.jpg'),
(4, 140, 'Awards Achieved', '16', '', 'digital-training-center-570786-digital-training-center-805921-Award.jpg'),
(9, 140, 'Joshua Phelps', 'Consequatur sint as', 'Et est ipsum enim fu', 'e-learning-and-earning-ltd-288280-emon.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `student_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `student_no` int(11) NOT NULL,
  `batch_no` varchar(250) NOT NULL,
  `course_no` varchar(30) NOT NULL,
  `student_name` varchar(250) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `bld_grp` varchar(50) NOT NULL,
  `father_name` varchar(250) NOT NULL,
  `mother_name` varchar(250) NOT NULL,
  `upazila` varchar(50) NOT NULL,
  `district` varchar(50) NOT NULL,
  `address` varchar(250) NOT NULL,
  `marriage_info` varchar(150) NOT NULL,
  `religion` varchar(150) NOT NULL,
  `nationality` varchar(150) NOT NULL,
  `birth_date` date NOT NULL,
  `student_phone` varchar(150) NOT NULL,
  `student_email` varchar(150) NOT NULL,
  `guardian_phone` varchar(150) NOT NULL,
  `degree` varchar(150) NOT NULL,
  `institute_name` varchar(250) NOT NULL,
  `board_roll` varchar(100) NOT NULL,
  `pass_year` varchar(100) NOT NULL,
  `gpa` varchar(100) NOT NULL,
  `board_name` varchar(200) NOT NULL,
  `reference` varchar(350) NOT NULL,
  `join_date` date NOT NULL,
  `status` int(11) NOT NULL,
  `userPic` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`student_id`, `user_id`, `student_no`, `batch_no`, `course_no`, `student_name`, `gender`, `bld_grp`, `father_name`, `mother_name`, `upazila`, `district`, `address`, `marriage_info`, `religion`, `nationality`, `birth_date`, `student_phone`, `student_email`, `guardian_phone`, `degree`, `institute_name`, `board_roll`, `pass_year`, `gpa`, `board_name`, `reference`, `join_date`, `status`, `userPic`) VALUES
(117, 22, 12, '1', '26', 'Jamal', 'Male', 'A+', 'ff', 'mm', '#', '#', '#', 'Yes', 'Muslim', 'Bangladeshi', '2023-05-02', '848465', 'jabed@gmail.com', 'fgjd', '#', 'dh', 'dh', 'dh', 'dh', '#', 'dh', '2023-05-02', 1, 'itm-dtc-'),
(118, 22, 13, '2', '25', 'Abdul Alim', 'Male', 'A+', 'Father', 'Mother', '2', '2', '2', 'Yes', 'Muslim', 'Bangladeshi', '2023-05-04', '098798798', 'jabed@gmail.com', '098798798', '2', 'Dhaka Model College', '2566', '2022', '5.00', '3', 'SAD', '2023-05-04', 1, 'itm-dtc-'),
(119, 140, 5, '10', '25', 'Abdul Bari', '', 'Male', 'Jubayer Hossain', 'Arifa Akter', '2', '2', '2', 'Yes', 'Muslim', 'Bangladeshi', '2024-03-25', '01758952347', 'samiul@gmail.com', '01576576591', '4', 'School/College/University', '5520', '2014', '5', '5', 'Babul', '2024-03-25', 1, 'itm-dtc-itm-dtcms.png'),
(122, 140, 6, '11', '26', 'Pappu', 'Male', 'A+', 'Jubayer Hossain1', 'Arifa Akter1', '2', '2', '2', 'Yes', 'Muslim', 'Bangladeshi', '2024-03-25', '5676', 'samiul@gmail.com', '01576576591', '2', 'School/College/University', '5225', '2025', '5', '3', 'Sad', '2024-03-25', 1, 'itm-dtc-logo_silver.png.png'),
(123, 140, 7, '11', '28', 'Abul Basar', '', 'Male', 'Jubayer Hossain1', 'Arifa Akter1', '2', '2', 'Bogura, Rajshahi Division, Bangladesh', 'Yes', 'Muslim', 'Bangladeshi', '2024-03-25', '01751891037', 'ricemill@gmail.com', '01576576591', '2', 'erwe', '855', '2012', '5', '5', 'OKJ', '2024-03-25', 1, 'itm-dtc-');

-- --------------------------------------------------------

--
-- Table structure for table `student_feedback`
--

CREATE TABLE `student_feedback` (
  `id` int(30) NOT NULL,
  `user_id` int(25) NOT NULL,
  `course_id` int(50) NOT NULL,
  `name` varchar(255) NOT NULL,
  `position` varchar(255) NOT NULL,
  `rating` int(255) NOT NULL,
  `status` varchar(255) DEFAULT NULL,
  `details` longtext NOT NULL,
  `userPic` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_feedback`
--

INSERT INTO `student_feedback` (`id`, `user_id`, `course_id`, `name`, `position`, `rating`, `status`, `details`, `userPic`) VALUES
(2, 140, 0, 'মো: শামিম হাসান', 'Students', 5, NULL, '\r\n\r\nআলহামদুলিল্লাহ! আমি মোঃ শাখাওয়াত হোসেন রাব্বী। ডিজিটাল মার্কেট ব্যাচ নাম্বার ৩২। মহান আল্লাহর কাছে কৃতজ্ঞতা জ্ঞাপন করছি, কারণ আমি একজন ফ্রিল্যান্সার হিসেবে আমার প্রথম অর্ডার সম্পন্ন করতে সক্ষম হয়েছি। কেবলমাত্র ২ মাসের ট্রেনিংয়ের মধ্যেই এই সাফল্য অর্জন করলাম, যা আমার জন্য এক বিরাট অর্জন। আমার টোটাল আর্নিং প্রায় ১০০ ডলার । বিশেষভাবে কৃতজ্ঞতা জানাচ্ছি আমার ট্রেইনার অনয় পাল স্যার-কে, যিনি তাঁর অমূল্য নির্দেশনা এবং পরামর্শের মাধ্যমে আমাকে পথ দেখিয়েছেন। এছাড়াও, আমি ধন্যবাদ জানাই ই-লার্নিং অ্যান্ড আর্নিং-কে, যাদের মাধ্যমে এই অসাধারণ সুযোগটি পেয়েছি। এটা শুধুমাত্র শুরু, এবং আমি আগামীর পথে আরও অনেক কিছু অর্জন করতে চাই!', 'e-learning-and-earning-ltd-853841-jpg'),
(3, 140, 0, 'মো: শামিম হাসান', 'Student', 4, NULL, 'আগে ইচ্ছে থাকলেও এমন ভাবে করতে পারতাম না এই প্রশিক্ষনটি দিয়ে ইনশাআল্লাহ অনেক কিছু শিখতে পারছি এবং ইনকাম করতে পারছি। লোকাল মার্কেট থেকে ফেসবুক পেজ এর এড চালিয়ে আমি মাসে অনুমানিক ১৫ থেকে ২০ হাজার টাকা উপার্যন করছি ঘরে বসে। আগে ইচ্ছে থাকলেও এমন ভাবে করতে পারতাম না এই প্রশিক্ষনটি দিয়ে ইনশাআল্লাহ অনেক কিছু শিখতে পারছি এবং ইনকাম করতে পারছি। লোকাল মার্কেট থেকে ফেসবুক পেজ এর এড চালিয়ে আমি মাসে অনুমানিক ১৫ থেকে ২০ হাজার টাকা উপার্যন করছি ঘরে বসে।', 'e-learning-and-earning-ltd-992553-jpg'),
(4, 140, 0, 'Macaulay Warren', 'Dolorem adipisicing ', 3, NULL, 'Architecto nesciunt', 'e-learning-and-earning-ltd-173639-jpg'),
(5, 140, 0, 'Anthony Lindsay', 'Aute sequi tempore ', 1, NULL, 'Amet earum voluptat', 'e-learning-and-earning-ltd-508990-jpg'),
(6, 140, 0, 'Ora Walton', 'Culpa omnis cumque c', 2, NULL, 'Fugiat explicabo Au', 'e-learning-and-earning-ltd-406500-jpg'),
(7, 140, 29, 'Sade Downs', 'Mollit magni minim e', 5, NULL, 'Earum rem sunt ducim', 'e-learning-and-earning-ltd-543966-jpg'),
(8, 140, 29, 'Rachel Holder', 'Veniam et in dolor ', 5, NULL, 'Earum consequatur v', 'e-learning-and-earning-ltd-770118-png'),
(9, 140, 29, 'jahid', 'none', 4, NULL, 'আমি রাকিবুল হাসান, ই-লার্নিং এন্ড আর্নিং-এর সিপিএ মার্কেটিং ২৬৬তম ব্যাচের শিক্ষার্থী। আমার মেন্টর নাঈম স্যার-এর দিকনির্দেশনায় আমি আজ সিপিএ মার্কেটিং থেকে আয় করতে সক্ষম হয়েছি। আলহামদুলিল্লাহ! বর্তমানে আমার দুইটি সিপিএ অ্যাকাউন্ট রয়েছে, এবং এখন আমি প্রতিদিন ১০ ডলারের বেশি ইনকাম করছি। ইতোমধ্যে আমি ১৭০ ডলারেরও বেশি উপার্জন করেছি, যা আমার ফ্রিল্যান্সিং ক্যারিয়ারের জন্য এক বিশাল অর্জন। এই অসাধারণ সুযোগ ও দিকনির্দেশনার জন্য ই-লার্নিং এন্ড আর্নিং-কে আন্তরিক ধন্যবাদ। যারা ফ্রিল্যান্সিং ও অনলাইন ইনকামের পথ খুঁজছেন, তাদের জন্য এটি নিঃসন্দেহে একটি দারুণ প্ল্যাটফর্ম।', 'e-learning-and-earning-ltd-287963-jpg');

-- --------------------------------------------------------

--
-- Table structure for table `stuff`
--

CREATE TABLE `stuff` (
  `userid` int(11) NOT NULL,
  `stuff_name` varchar(50) NOT NULL,
  `position` varchar(500) NOT NULL,
  `contact_info` varchar(50) NOT NULL,
  `business_name` varchar(500) CHARACTER SET utf8 NOT NULL,
  `business_details` varchar(250) NOT NULL,
  `service_charge` varchar(250) NOT NULL,
  `business_phone` varchar(100) NOT NULL,
  `business_email` varchar(250) NOT NULL,
  `biz_web` varchar(200) NOT NULL,
  `business_address` varchar(500) NOT NULL,
  `invoice_welcome` varchar(500) NOT NULL,
  `photo` varchar(150) NOT NULL,
  `sign_img` text NOT NULL,
  `join_date` date NOT NULL,
  `status` int(11) NOT NULL,
  `software_status` int(11) NOT NULL,
  `comments` varchar(500) NOT NULL,
  `division_id` int(11) NOT NULL,
  `district_id` int(11) NOT NULL,
  `upazila_id` int(11) NOT NULL,
  `inv_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stuff`
--

INSERT INTO `stuff` (`userid`, `stuff_name`, `position`, `contact_info`, `business_name`, `business_details`, `service_charge`, `business_phone`, `business_email`, `biz_web`, `business_address`, `invoice_welcome`, `photo`, `sign_img`, `join_date`, `status`, `software_status`, `comments`, `division_id`, `district_id`, `upazila_id`, `inv_name`) VALUES
(22, 'Admin-ITM', 'Admin', 'Admin', '', '', '', '', '', '', '', '', 'upload/com-logo_1643530916.jpg', '', '2020-03-22', 0, 0, '', 0, 0, 0, ''),
(130, 'Admin', 'Main Admin', '01751891037', 'ITM Computer & Tech Gadget', '', '1500', '01751891037', 'samiulbdb@gmail.com', '', 'Bogura City, Bogura', '', 'upload/com-logo_1643530916.jpg', '', '2019-07-10', 1, 0, '', 0, 0, 0, ''),
(135, 'Accounts', 'Accounts', '017545', '', '', '1500', '', '', '', '', '', 'upload/training-logo_1711871720.png', '', '2022-01-30', 1, 1, '', 0, 0, 0, ''),
(140, 'E-Learning and Earning Ltd', 'Management System                                  ', '01751891037', 'Digital Training', 'We are Creative. Best IT / Training service company. Get the most of reduction in your team’s operating creates our amazing  experiences.', '500', '01893-280417', 'info@e-laeltd.com', 'trainingcenter.com', 'Khaja IT Park, 2nd to 7th Floor, Kallyanpur Bus Stop, Mirpur Road, Dhaka-1207.', 'Thanks For Work With Us', 'upload/training-logo_1710830248.png', 'upload/Samiul_1694185179.jpg', '2022-04-11', 1, 2, 'Trail', 1, 5, 14, 'iss');

-- --------------------------------------------------------

--
-- Table structure for table `stuff_details`
--

CREATE TABLE `stuff_details` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `own_name` varchar(300) NOT NULL,
  `business_name` varchar(300) NOT NULL,
  `status` int(11) NOT NULL,
  `software_status` int(11) NOT NULL,
  `comments` varchar(300) NOT NULL,
  `division_id` int(11) NOT NULL,
  `district_id` int(11) NOT NULL,
  `upazila_id` int(11) NOT NULL,
  `entry_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `success_student_section`
--

CREATE TABLE `success_student_section` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_swedish_ci NOT NULL,
  `year` int(30) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_swedish_ci NOT NULL,
  `details` mediumtext COLLATE utf8mb4_swedish_ci NOT NULL,
  `userPic` varchar(255) COLLATE utf8mb4_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

--
-- Dumping data for table `success_student_section`
--

INSERT INTO `success_student_section` (`id`, `user_id`, `name`, `year`, `title`, `details`, `userPic`) VALUES
(10, 140, 'মো: শাম্মি আক্তার', 0, 'ডিজিটাল মার্কেটিং', 'ই-লার্নিং-এ ডিজিটাল মার্কেটিং কোর্স (ব্যাচ ৩৪) করে আমি সত্যিই মুগ্ধ! এখানে শেখার পরিবেশ অত্যন্ত আধুনিক ও বাস্তবভিত্তিক, যা আমাকে দক্ষ হয়ে উঠতে অনুপ্রাণিত করেছে। অন্যান্য আইটি প্রতিষ্ঠানের তুলনায় এখানে শেখার পদ্ধতি অনেক বেশি গাইডলাই নভিত্তিক ও কার্যকর। শিক্ষকরা অসাধারণ যত্ন ও অভিজ্ঞতার সঙ্গে প্রশিক্ষণ দিয়েছেন, যা আমাকে বাস্তব কাজের জন্য আত্মবিশ্বাসী করে তুলেছে। ল্যাবের উন্নত সুবিধা ও সহায়ক পরিবেশ প্রতিটি শিক্ষার্থীকে দক্ষ করে তুলতে সহায়তা করে। আমি কৃতজ্ঞ ই-লার্নিং-এর প্রতি, যারা সত্যিকারের মানসম্পন্ন শিক্ষা নিশ্চিত করছে।', 'e-learning-and-earning-ltd-258791-tasnim.jpg'),
(14, 140, 'Hu Kirkland', 0, 'ডিজিটাল মার্কেটিং', 'ই-লার্নিং-এ ডিজিটাল মার্কেটিং কোর্স (ব্যাচ ৩৪) করে আমি সত্যিই মুগ্ধ! \r\nএখানে শেখার পরিবেশ অত্যন্ত আধুনিক ও বাস্তবভিত্তিক, যা আমাকে দক্ষ হয়ে উঠতে অনুপ্রাণিত করেছে। অন্যান্য আইটি প্রতিষ্ঠানের তুলনায় এখানে শেখার পদ্ধতি অনেক বেশি গাইডলাই নভিত্তিক ও কার্যকর। শিক্ষকরা অসাধারণ যত্ন ও অভিজ্ঞতার সঙ্গে প্রশিক্ষণ দিয়েছেন, যা আমাকে বাস্তব কাজের জন্য আত্মবিশ্বাসী করে তুলেছে। ল্যাবের উন্নত সুবিধা ও সহায়ক পরিবেশ প্রতিটি শিক্ষার্থীকে দক্ষ করে তুলতে সহায়তা করে। আমি কৃতজ্ঞ ই-লার্নিং-এর প্রতি, যারা সত্যিকারের মানসম্পন্ন শিক্ষা নিশ্চিত করছে।ই-লার্নিং-এ ডিজিটাল মার্কেটিং কোর্স (ব্যাচ ৩৪) করে আমি সত্যিই মুগ্ধ! এখানে শেখার পরিবেশ অত্যন্ত আধুনিক ও বাস্তবভিত্তিক, যা আমাকে দক্ষ হয়ে উঠতে অনুপ্রাণিত করেছে। অন্যান্য আইটি প্রতিষ্ঠানের তুলনায় এখানে শেখার পদ্ধতি অনেক বেশি গাইডলাই নভিত্তিক ও কার্যকর। শিক্ষকরা অসাধারণ যত্ন ও অভিজ্ঞতার সঙ্গে প্রশিক্ষণ দিয়েছেন, যা আমাকে বাস্তব কাজের জন্য আত্মবিশ্বাসী করে তুলেছে। ল্যাবের উন্নত সুবিধা ও সহায়ক পরিবেশ প্রতিটি শিক্ষার্থীকে দক্ষ করে তুলতে সহায়তা করে। ', 'e-learning-and-earning-ltd-472491-fizar.jpg'),
(15, 140, 'Jahid Hasan', 0, 'Web Developer ', 'ই-লার্নিং-এ ডিজিটাল মার্কেটিং কোর্স (ব্যাচ ৩৪) করে আমি সত্যিই মুগ্ধ! এখানে শেখার পরিবেশ অত্যন্ত আধুনিক ও বাস্তবভিত্তিক, যা আমাকে দক্ষ হয়ে উঠতে অনুপ্রাণিত করেছে। অন্যান্য আইটি প্রতিষ্ঠানের তুলনায় এখানে শেখার পদ্ধতি অনেক বেশি গাইডলাই নভিত্তিক ও কার্যকর। শিক্ষকরা অসাধারণ যত্ন ও অভিজ্ঞতার সঙ্গে\r\n\r\nই-লার্নিং-এ ডিজিটাল মার্কেটিং কোর্স (ব্যাচ ৩৪) করে আমি সত্যিই মুগ্ধ! এখানে শেখার পরিবেশ অত্যন্ত আধুনিক ও বাস্তবভিত্তিক, যা আমাকে দক্ষ হয়ে উঠতে অনুপ্রাণিত করেছে। অন্যান্য আইটি প্রতিষ্ঠানের তুলনায় এখানে শেখার পদ্ধতি অনেক বেশি গাইডলাই নভিত্তিক ও কার্যকর। শিক্ষকরা অসাধারণ যত্ন ও অভিজ্ঞতার সঙ্গে', 'e-learning-and-earning-ltd-236549-WhatsApp Image 2025-03-15 at 16.21.39_0648a567.jpg'),
(16, 140, 'Rohim Mia', 0, 'Digital Marketing', 'ই-লার্নিং-এ ডিজিটাল মার্কেটিং কোর্স (ব্যাচ ৩৪) করে আমি সত্যিই মুগ্ধ! এখানে শেখার পরিবেশ অত্যন্ত আধুনিক ও বাস্তবভিত্তিক, যা আমাকে দক্ষ হয়ে উঠতে অনুপ্রাণিত করেছে। অন্যান্য আইটি প্রতিষ্ঠানের তুলনায় এখানে শেখার পদ্ধতি অনেক বেশি গাইডলাই নভিত্তিক ও কার্যকর। শিক্ষকরা অসাধারণ যত্ন ও অভিজ্ঞতার সঙ্গেই-লার্নিং-এ ডিজিটাল মার্কেটিং কোর্স (ব্যাচ ৩৪) করে আমি সত্যিই মুগ্ধ! এখানে শেখার পরিবেশ অত্যন্ত আধুনিক ও বাস্তবভিত্তিক, যা আমাকে দক্ষ হয়ে উঠতে অনুপ্রাণিত করেছে। অন্যান্য আইটি প্রতিষ্ঠানের তুলনায় এখানে শেখার পদ্ধতি অনেক বেশি গাইডলাই নভিত্তিক ও কার্যকর। শিক্ষকরা অসাধারণ যত্ন ও অভিজ্ঞতার সঙ্গে', 'e-learning-and-earning-ltd-676934-ali.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `teacher_section`
--

CREATE TABLE `teacher_section` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `course_id1` varchar(25) NOT NULL,
  `course_id2` varchar(25) NOT NULL DEFAULT '0',
  `course_id3` varchar(25) NOT NULL DEFAULT '0',
  `department_id` int(30) NOT NULL,
  `teacher_title` varchar(255) NOT NULL,
  `teacher_subtitle` varchar(255) NOT NULL,
  `about` longtext NOT NULL,
  `facebook` varchar(3000) DEFAULT NULL,
  `linkedin` varchar(3000) DEFAULT NULL,
  `upwork` varchar(3000) DEFAULT NULL,
  `fiver` varchar(3000) DEFAULT NULL,
  `twitter` varchar(3000) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `userPic` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teacher_section`
--

INSERT INTO `teacher_section` (`id`, `user_id`, `course_id1`, `course_id2`, `course_id3`, `department_id`, `teacher_title`, `teacher_subtitle`, `about`, `facebook`, `linkedin`, `upwork`, `fiver`, `twitter`, `type`, `userPic`) VALUES
(9, 140, '28', '30', '32', 4, 'Nishith Kumar Roy', 'Sr. Graphic Designer & Freelancer', 'Introduction to Development with Flutter\r\nCreating Beautiful UI With Flutter for Beginner\r\nBuilding Apps with State\r\nLeveraging Flutter Packages to Speed Up Development\r\nStructuring Flutter Apps\r\nFlutter Pattern Design\r\nCreating Beautiful UI With Flutter for Intermediates', 'https://www.facebook.com/elaeltd.official/', 'https://www.linkedin.com/company/e-learning-and-earning-ltd/posts/?feedView=all', 'https://www.facebook.com/elaeltd.official/', 'https://www.facebook.com/elaeltd.official/', 'https://twitter.com/morallearning', 'senior', 'e-learning-and-earning-ltd-876572-nishit kumar roy.jpg'),
(10, 140, '28', '37', '34', 6, 'Anoy Chandra Pal', 'Digital Marketing Specialist', 'wqeqwe', 'https://www.facebook.com/elaeltd.official/', 'https://www.linkedin.com/company/e-learning-and-earning-ltd/posts/?feedView=all', 'https://www.facebook.com/elaeltd.official/33', 'https://www.facebook.com/elaeltd.official/', 'https://twitter.com/morallearning', 'senior', 'e-learning-and-earning-ltd-620898-anoy.jpeg'),
(12, 140, '', '0', '0', 6, 'Md.Akmal Shahriar', 'Graphic Design', '', '', '', '', '', '', 'senior', 'e-learning-and-earning-ltd-735288-akmol.jpeg'),
(13, 140, '29', '28', '29', 6, 'Md Sourov Sarker', 'Web Design & Computer Operation', 'werw', 'https://www.facebook.com/elaeltd.official/33', 'https://www.facebook.com/elaeltd.official/33', 'https://www.facebook.com/elaeltd.official/', 'https://www.facebook.com/elaeltd.official/', 'https://twitter.com/morallearning', 'senior', 'e-learning-and-earning-ltd-911116-Sourov 02.jpg'),
(14, 140, '', '0', '0', 5, 'Aynul Bari', 'Graphic Design, Digital Marketing & Blogger', '', '', '', '', '', '', 'senior', 'e-learning-and-earning-ltd-642120-Aynul Bari 01.jpg'),
(17, 140, '', '0', '0', 0, 'Tafsir Ahmed', 'Korean Language', '', '', '', '', '', '', 'senior', 'e-learning-and-earning-ltd-265329-Rafi 01.jpg'),
(18, 140, '30', '57', '31', 4, 'Niaz Mahmud', 'IELTS', 'zxbnm,', 'https://www.facebook.com/elaeltd.official/', 'https://www.facebook.com/elaeltd.official/33', 'https://www.facebook.com/elaeltd.official/33', 'https://www.facebook.com/elaeltd.official/', 'https://twitter.com/morallearning', 'senior', 'e-learning-and-earning-ltd-401965-niaz.jpeg'),
(19, 140, '', '0', '0', 0, 'Arup Sarker', 'Digital Marketing Specialist', '', '', '', '', '', '', 'senior', 'e-learning-and-earning-ltd-939666-Jahid 001.jpg'),
(20, 140, '', '0', '0', 0, 'Abu Taher Robin', 'Digital Marketing Specialist', '', '', '', '', '', '', 'senior', 'e-learning-and-earning-ltd-58303-Shohel 01.jpg'),
(21, 140, '', '0', '0', 0, 'Sohel Rana', 'Digital Marketing Specialist', '', '', '', '', '', '', '', 'e-learning-and-earning-ltd-520699-Rony 01.jpg'),
(24, 140, '28', '29', '30', 2, 'jahid', 'Digital Marketing Specialist', 'werwere', 'https://www.facebook.com/elaeltd.official/', 'https://www.linkedin.com/company/e-learning-and-earning-ltd/posts/?feedView=all', 'https://www.facebook.com/elaeltd.official/', 'https://www.facebook.com/elaeltd.official/', 'https://twitter.com/morallearning', 'senior', 'e-learning-and-earning-ltd-864664-WhatsApp Image 2025-02-09 at 17.14.35_262895ab.jpg'),
(25, 140, '28', '', '', 2, 'ertert', 'rwer', 'sdfsdfs', '', '', '', '', '', 'senior', 'e-learning-and-earning-ltd-387519-22.jpg'),
(26, 140, '29', '', '', 3, 'ertert', 'rwer', '4rwerwerwerwe', '', '', '', '', '', 'senior', 'e-learning-and-earning-ltd-597296-about-us.png');

-- --------------------------------------------------------

--
-- Table structure for table `team_section`
--

CREATE TABLE `team_section` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `department_id` int(30) NOT NULL,
  `team_title` varchar(200) NOT NULL,
  `team_subtitle` varchar(200) NOT NULL,
  `type` varchar(255) DEFAULT NULL,
  `userPic` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `team_section`
--

INSERT INTO `team_section` (`id`, `user_id`, `department_id`, `team_title`, `team_subtitle`, `type`, `userPic`) VALUES
(27, 140, 0, 'Shahriar Akmol ', 'Graphics Designer', NULL, 'e-learning-and-earning-ltd-551459-akmol.jpeg'),
(28, 140, 3, 'Niaz Mahmud', 'IELTS', NULL, 'e-learning-and-earning-ltd-97865-niaz.jpeg'),
(29, 140, 0, 'Likhon Mia', 'Motion Graphics', NULL, 'e-learning-and-earning-ltd-387934-likhon-mia.jpeg'),
(30, 140, 0, 'Nishan', 'Digital Marketing', NULL, 'e-learning-and-earning-ltd-100872-nisan.jpeg'),
(31, 140, 3, 'Anoy Pal ', 'Digital Marketing', NULL, 'e-learning-and-earning-ltd-571168-anoy.jpeg'),
(32, 140, 0, 'MD. Shurov ', 'Microsoft Office', NULL, 'e-learning-and-earning-ltd-843099-sourov.jpeg'),
(33, 140, 0, 'jahid', 'web', 'junior-web', 'e-learning-and-earning-ltd-328260-avatar-08.jpg'),
(34, 140, 2, 'Voluptas magni quis ', 'Libero officia rerum', NULL, 'e-learning-and-earning-ltd-15407-php-course.jpg'),
(35, 140, 0, 'Itaque do temporibus', 'Ad quas ea ut volupt', NULL, 'e-learning-and-earning-ltd-385101-office.jpeg'),
(36, 140, 0, 'jahid', 'web', NULL, 'e-learning-and-earning-ltd-953203-php-course.jpg'),
(37, 140, 3, 'jahid', 'Libero officia rerum', NULL, 'e-learning-and-earning-ltd-906084-php-course.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `testimonial`
--

CREATE TABLE `testimonial` (
  `ts_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `position` varchar(200) NOT NULL,
  `details` text NOT NULL,
  `userPic` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `testimonial`
--

INSERT INTO `testimonial` (`ts_id`, `user_id`, `name`, `position`, `details`, `userPic`) VALUES
(2, 140, 'Mahmuda Begum', 'Senior Stuff Nurse', '<div style=\"font-family: Consolas, \" courier=\"\" new\",=\"\" monospace;=\"\" line-height:=\"\" 22px;=\"\" white-space:=\"\" pre;\"=\"\"><div style=\"font-family: Consolas, \"Courier New\", monospace; line-height: 22px; white-space: pre;\">As a pharmacy student, I am grateful for the exceptional education provided by my college. The curriculum blends scientific knowledge with practical skills, equipping me to serve as a trusted healthcare provider. The supportive faculty, cutting-edge facilities, and diverse clinical experiences have prepared me to make a positive impact on patient care.</div></div>', 'e-learning-and-earning-ltd-104193-jpg'),
(3, 140, 'Sabbir Ahmmed', 'Pharmacist BSMMU', '<div style=\"font-family: Consolas, \" courier=\"\" new\",=\"\" monospace;=\"\" line-height:=\"\" 22px;=\"\" white-space:=\"\" pre;\"=\"\"><div style=\"font-family: Consolas, \"Courier New\", monospace; line-height: 22px; white-space: pre;\">Being a pathology student at my college has been an enlightening experience. The comprehensive curriculum, state-of-the-art laboratories, and expert guidance from faculty members have nurtured my passion for understanding disease processes. The collaborative environment and research opportunities have prepared me for a promising career in diagnostic medicine.</div></div>', 'e-learning-and-earning-ltd-24553-jpg'),
(4, 140, 'রুম্মান ফেরদৌস', 'Student', '<div style=\"font-family: Consolas, \" courier=\"\" new\",=\"\" monospace;=\"\" line-height:=\"\" 22px;=\"\" white-space:=\"\" pre;\"=\"\"><div style=\"font-family: Consolas, \" courier=\"\" new\",=\"\" monospace;=\"\" line-height:=\"\" 22px;=\"\" white-space:=\"\" pre;\"=\"\"><font color=\"#232088\" face=\"Open Sans, sans-serif\"><i>আমি সোশ্যাল পলিটেকনিক ইনস্টিটিউট, ঠাকুরগাঁও জেলা থেকে \"ই-লার্নিং এন্ড আর্নিং লিমিটেড\" এ ইন্ডাস্ট্রিয়াল এটাচমেন্ট শেষ করেছি। এটি শুধুমাত্র ইন্ডাস্ট্রিয়াল এটাচমেন্ট এর জন্যই নয়, এটি দেশের সর্ববৃহৎ আইটি এন্ড ল্যাক্সগুয়েজ পার্ক । ধন্যবাদ সবাইকে। </i></font><br></div></div>', 'e-learning-and-earning-ltd-780362-png'),
(7, 140, 'মো: শামিম', 'Student', '<p>আগে ইচ্ছে থাকলেও এমন ভাবে করতে পারতাম না এই প্রশিক্ষনটি দিয়ে ইনশাআল্লাহ \r\nঅনেক কিছু শিখতে পারছি এবং ইনকাম করতে পারছি। লোকাল মার্কেট থেকে ফেসবুক \r\nপেজ এর এড চালিয়ে আমি মাসে অনুমানিক ১৫ থেকে ২০ হাজার টাকা উপার্যন করছি \r\nঘরে বসে।<br></p>', 'e-learning-and-earning-ltd-871220-jpg');

-- --------------------------------------------------------

--
-- Table structure for table `thana`
--

CREATE TABLE `thana` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `thana_name` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `thana`
--

INSERT INTO `thana` (`id`, `user_id`, `thana_name`) VALUES
(1, 22, 'Mirpur'),
(2, 22, 'Uttara');

-- --------------------------------------------------------

--
-- Table structure for table `title_name`
--

CREATE TABLE `title_name` (
  `id` int(11) NOT NULL,
  `location` varchar(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `stutas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `title_name`
--

INSERT INTO `title_name` (`id`, `location`, `name`, `stutas`) VALUES
(2, 'Header', 'Digital Training Center', 0),
(5, 'Title Bar', 'Digital Training Center', 0),
(6, 'Report Title', 'Digital Training Center', 0);

-- --------------------------------------------------------

--
-- Table structure for table `upazila`
--

CREATE TABLE `upazila` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `upazila_name` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `upazila`
--

INSERT INTO `upazila` (`id`, `user_id`, `upazila_name`) VALUES
(2, 140, 'Bogura'),
(3, 140, 'Rajshahi'),
(4, 140, 'Bogura Sadar'),
(5, 140, 'Gabtoli'),
(6, 140, 'Sherpur');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userid` int(11) NOT NULL,
  `full_name` varchar(250) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `access_level` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `expire_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userid`, `full_name`, `username`, `password`, `access_level`, `status`, `expire_date`) VALUES
(22, 'Admin-ITM', 'AdmiN', '3052737b4b919b27a424455bb6475e24', 1, 1, '0000-00-00'),
(130, 'Admin', 'samiul004', 'b17c7f9d339f87ae91c72e08daf1c8db', 2, 1, '2024-06-12'),
(135, 'Accounts', 'Sam1', '490bd89bcdc4e9f01d1a33899736f7a3', 3, 1, '2024-06-25'),
(140, 'E-Learning and Earning Ltd', 'ITM', 'eb2dd0656157562e37736fe7e186d438', 4, 1, '2024-03-30');

-- --------------------------------------------------------

--
-- Table structure for table `userlog`
--

CREATE TABLE `userlog` (
  `userlogid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `login` datetime NOT NULL,
  `logout` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `vision`
--

CREATE TABLE `vision` (
  `ms_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `details` longtext NOT NULL,
  `userPic` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vision`
--

INSERT INTO `vision` (`ms_id`, `user_id`, `name`, `details`, `userPic`) VALUES
(1, 140, 'Our Vision', '<p>To be a premier language training institute, recognized for our excellence in language education, cultural immersion, and personalized learning experiences.</p>', '608594.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `why_section`
--

CREATE TABLE `why_section` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `sub_title` mediumtext DEFAULT NULL,
  `why_icon` varchar(150) DEFAULT NULL,
  `userPic` varchar(255) DEFAULT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `why_section`
--

INSERT INTO `why_section` (`id`, `user_id`, `title`, `sub_title`, `why_icon`, `userPic`, `date`) VALUES
(1, 140, 'Best Training Centereee', 'Best Training Center', 'fa fa-certificate', 'e-learning-and-earning-ltd-240118-q2i.png', NULL),
(2, 140, 'Available Office & Training Space', 'Best Training Center', 'fa fa-certificate', '0', NULL),
(3, 140, 'Practice Lab Support', 'Best Training Center', 'fa fa-certificate', '0', NULL),
(4, 140, 'Skilled Trainer And Supporting', 'Best Training Center', 'fa fa-certificate', '0', NULL),
(7, 140, 'Deserunt illum elig', 'Sit dolor eum minim ', 'Dignissimos laboris ', 'e-learning-and-earning-ltd-18388-why-we-best.jpg', NULL),
(8, 140, 'Distinctio Quam mag', 'Dolore voluptatem v', 'Sint ab est sint ips', 'e-learning-and-earning-ltd-262324-about-home.jpeg', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `year_name`
--

CREATE TABLE `year_name` (
  `yer_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `yer_name` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `year_name`
--

INSERT INTO `year_name` (`yer_id`, `user_id`, `yer_name`) VALUES
(1, 140, '2023'),
(2, 140, '2024');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about_section`
--
ALTER TABLE `about_section`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `activitylog`
--
ALTER TABLE `activitylog`
  ADD PRIMARY KEY (`activitylog`);

--
-- Indexes for table `apply`
--
ALTER TABLE `apply`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `bank_money`
--
ALTER TABLE `bank_money`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bank_money_history`
--
ALTER TABLE `bank_money_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bank_name`
--
ALTER TABLE `bank_name`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `batch`
--
ALTER TABLE `batch`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bld_grp`
--
ALTER TABLE `bld_grp`
  ADD PRIMARY KEY (`bld_id`);

--
-- Indexes for table `blog_category`
--
ALTER TABLE `blog_category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `blog_section`
--
ALTER TABLE `blog_section`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `board`
--
ALTER TABLE `board`
  ADD PRIMARY KEY (`brd_id`);

--
-- Indexes for table `branch`
--
ALTER TABLE `branch`
  ADD PRIMARY KEY (`br_id`);

--
-- Indexes for table `career`
--
ALTER TABLE `career`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `career_category`
--
ALTER TABLE `career_category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `chair_man_massage`
--
ALTER TABLE `chair_man_massage`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `choose_section`
--
ALTER TABLE `choose_section`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_info`
--
ALTER TABLE `contact_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course_apply`
--
ALTER TABLE `course_apply`
  ADD PRIMARY KEY (`ca_id`);

--
-- Indexes for table `course_category`
--
ALTER TABLE `course_category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `crse_topic`
--
ALTER TABLE `crse_topic`
  ADD PRIMARY KEY (`crse_id`);

--
-- Indexes for table `daily_notes`
--
ALTER TABLE `daily_notes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `degree`
--
ALTER TABLE `degree`
  ADD PRIMARY KEY (`deg_id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `diploma_admission`
--
ALTER TABLE `diploma_admission`
  ADD PRIMARY KEY (`ad_id`);

--
-- Indexes for table `district`
--
ALTER TABLE `district`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `division`
--
ALTER TABLE `division`
  ADD PRIMARY KEY (`div_id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees_salary`
--
ALTER TABLE `employees_salary`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees_salary_details`
--
ALTER TABLE `employees_salary_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expense`
--
ALTER TABLE `expense`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expense_other`
--
ALTER TABLE `expense_other`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faq_section`
--
ALTER TABLE `faq_section`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feature1`
--
ALTER TABLE `feature1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feature2`
--
ALTER TABLE `feature2`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `features_all`
--
ALTER TABLE `features_all`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `free_consultation`
--
ALTER TABLE `free_consultation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gallery_image`
--
ALTER TABLE `gallery_image`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gallery_video`
--
ALTER TABLE `gallery_video`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `header_section`
--
ALTER TABLE `header_section`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_apply`
--
ALTER TABLE `job_apply`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jubo_info_16`
--
ALTER TABLE `jubo_info_16`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jubo_info_48`
--
ALTER TABLE `jubo_info_48`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `map`
--
ALTER TABLE `map`
  ADD PRIMARY KEY (`mp_id`);

--
-- Indexes for table `medical_admission`
--
ALTER TABLE `medical_admission`
  ADD PRIMARY KEY (`ad_id`);

--
-- Indexes for table `medical_assistant_admission`
--
ALTER TABLE `medical_assistant_admission`
  ADD PRIMARY KEY (`ad_id`);

--
-- Indexes for table `mission`
--
ALTER TABLE `mission`
  ADD PRIMARY KEY (`ms_id`);

--
-- Indexes for table `month`
--
ALTER TABLE `month`
  ADD PRIMARY KEY (`mnt_id`);

--
-- Indexes for table `news_section`
--
ALTER TABLE `news_section`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `office_exp_name`
--
ALTER TABLE `office_exp_name`
  ADD PRIMARY KEY (`of_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders_details`
--
ALTER TABLE `orders_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders_dues`
--
ALTER TABLE `orders_dues`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_item`
--
ALTER TABLE `order_item`
  ADD PRIMARY KEY (`order_item_id`);

--
-- Indexes for table `partner`
--
ALTER TABLE `partner`
  ADD PRIMARY KEY (`pr_id`);

--
-- Indexes for table `password`
--
ALTER TABLE `password`
  ADD PRIMARY KEY (`passwordid`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `popup`
--
ALTER TABLE `popup`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `product_id_2` (`product_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`pro_id`);

--
-- Indexes for table `product_category`
--
ALTER TABLE `product_category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `publish1`
--
ALTER TABLE `publish1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `publish_result_routine`
--
ALTER TABLE `publish_result_routine`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seo_section`
--
ALTER TABLE `seo_section`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services_feature`
--
ALTER TABLE `services_feature`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service_category`
--
ALTER TABLE `service_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `skill_section`
--
ALTER TABLE `skill_section`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slider_section`
--
ALTER TABLE `slider_section`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `social_media`
--
ALTER TABLE `social_media`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stats`
--
ALTER TABLE `stats`
  ADD PRIMARY KEY (`st_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `student_feedback`
--
ALTER TABLE `student_feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stuff`
--
ALTER TABLE `stuff`
  ADD PRIMARY KEY (`userid`);

--
-- Indexes for table `stuff_details`
--
ALTER TABLE `stuff_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `success_student_section`
--
ALTER TABLE `success_student_section`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teacher_section`
--
ALTER TABLE `teacher_section`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `team_section`
--
ALTER TABLE `team_section`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonial`
--
ALTER TABLE `testimonial`
  ADD PRIMARY KEY (`ts_id`);

--
-- Indexes for table `thana`
--
ALTER TABLE `thana`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `title_name`
--
ALTER TABLE `title_name`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `upazila`
--
ALTER TABLE `upazila`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userid`);

--
-- Indexes for table `userlog`
--
ALTER TABLE `userlog`
  ADD PRIMARY KEY (`userlogid`);

--
-- Indexes for table `vision`
--
ALTER TABLE `vision`
  ADD PRIMARY KEY (`ms_id`);

--
-- Indexes for table `why_section`
--
ALTER TABLE `why_section`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `year_name`
--
ALTER TABLE `year_name`
  ADD PRIMARY KEY (`yer_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about_section`
--
ALTER TABLE `about_section`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `activitylog`
--
ALTER TABLE `activitylog`
  MODIFY `activitylog` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=653;

--
-- AUTO_INCREMENT for table `apply`
--
ALTER TABLE `apply`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=119;

--
-- AUTO_INCREMENT for table `bank_money`
--
ALTER TABLE `bank_money`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `bank_money_history`
--
ALTER TABLE `bank_money_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `bank_name`
--
ALTER TABLE `bank_name`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `batch`
--
ALTER TABLE `batch`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `bld_grp`
--
ALTER TABLE `bld_grp`
  MODIFY `bld_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `blog_category`
--
ALTER TABLE `blog_category`
  MODIFY `cat_id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `blog_section`
--
ALTER TABLE `blog_section`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `board`
--
ALTER TABLE `board`
  MODIFY `brd_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `branch`
--
ALTER TABLE `branch`
  MODIFY `br_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `career`
--
ALTER TABLE `career`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `career_category`
--
ALTER TABLE `career_category`
  MODIFY `cat_id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `chair_man_massage`
--
ALTER TABLE `chair_man_massage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `choose_section`
--
ALTER TABLE `choose_section`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `c_id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `contact_info`
--
ALTER TABLE `contact_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `course_apply`
--
ALTER TABLE `course_apply`
  MODIFY `ca_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=144;

--
-- AUTO_INCREMENT for table `course_category`
--
ALTER TABLE `course_category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `crse_topic`
--
ALTER TABLE `crse_topic`
  MODIFY `crse_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `daily_notes`
--
ALTER TABLE `daily_notes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `degree`
--
ALTER TABLE `degree`
  MODIFY `deg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `diploma_admission`
--
ALTER TABLE `diploma_admission`
  MODIFY `ad_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `district`
--
ALTER TABLE `district`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `division`
--
ALTER TABLE `division`
  MODIFY `div_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT for table `employees_salary`
--
ALTER TABLE `employees_salary`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=151;

--
-- AUTO_INCREMENT for table `employees_salary_details`
--
ALTER TABLE `employees_salary_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=159;

--
-- AUTO_INCREMENT for table `expense`
--
ALTER TABLE `expense`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `expense_other`
--
ALTER TABLE `expense_other`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `faq_section`
--
ALTER TABLE `faq_section`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `feature1`
--
ALTER TABLE `feature1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `feature2`
--
ALTER TABLE `feature2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `features_all`
--
ALTER TABLE `features_all`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `free_consultation`
--
ALTER TABLE `free_consultation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `gallery_image`
--
ALTER TABLE `gallery_image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `gallery_video`
--
ALTER TABLE `gallery_video`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `header_section`
--
ALTER TABLE `header_section`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT for table `job_apply`
--
ALTER TABLE `job_apply`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `map`
--
ALTER TABLE `map`
  MODIFY `mp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `medical_admission`
--
ALTER TABLE `medical_admission`
  MODIFY `ad_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `medical_assistant_admission`
--
ALTER TABLE `medical_assistant_admission`
  MODIFY `ad_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `mission`
--
ALTER TABLE `mission`
  MODIFY `ms_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `month`
--
ALTER TABLE `month`
  MODIFY `mnt_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `news_section`
--
ALTER TABLE `news_section`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `office_exp_name`
--
ALTER TABLE `office_exp_name`
  MODIFY `of_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1066;

--
-- AUTO_INCREMENT for table `orders_details`
--
ALTER TABLE `orders_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `orders_dues`
--
ALTER TABLE `orders_dues`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `order_item`
--
ALTER TABLE `order_item`
  MODIFY `order_item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=127;

--
-- AUTO_INCREMENT for table `partner`
--
ALTER TABLE `partner`
  MODIFY `pr_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `password`
--
ALTER TABLE `password`
  MODIFY `passwordid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=141;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `popup`
--
ALTER TABLE `popup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `pro_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `product_category`
--
ALTER TABLE `product_category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `publish1`
--
ALTER TABLE `publish1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `publish_result_routine`
--
ALTER TABLE `publish_result_routine`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `seo_section`
--
ALTER TABLE `seo_section`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `service`
--
ALTER TABLE `service`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `services_feature`
--
ALTER TABLE `services_feature`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `service_category`
--
ALTER TABLE `service_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `skill_section`
--
ALTER TABLE `skill_section`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `slider_section`
--
ALTER TABLE `slider_section`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `social_media`
--
ALTER TABLE `social_media`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `stats`
--
ALTER TABLE `stats`
  MODIFY `st_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=124;

--
-- AUTO_INCREMENT for table `student_feedback`
--
ALTER TABLE `student_feedback`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `stuff_details`
--
ALTER TABLE `stuff_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `success_student_section`
--
ALTER TABLE `success_student_section`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `teacher_section`
--
ALTER TABLE `teacher_section`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `team_section`
--
ALTER TABLE `team_section`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `testimonial`
--
ALTER TABLE `testimonial`
  MODIFY `ts_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `thana`
--
ALTER TABLE `thana`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `title_name`
--
ALTER TABLE `title_name`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `upazila`
--
ALTER TABLE `upazila`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=141;

--
-- AUTO_INCREMENT for table `userlog`
--
ALTER TABLE `userlog`
  MODIFY `userlogid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `vision`
--
ALTER TABLE `vision`
  MODIFY `ms_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `why_section`
--
ALTER TABLE `why_section`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `year_name`
--
ALTER TABLE `year_name`
  MODIFY `yer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
