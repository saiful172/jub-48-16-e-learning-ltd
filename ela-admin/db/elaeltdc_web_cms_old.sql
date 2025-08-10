-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 05, 2025 at 06:46 AM
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
(17, 140, 'E-Learning and Earning Ltd. has been the foremost information technology service provider since 2013. ', '<p>The training programs of e-Learning and Earning Ltd. a wide range of skills that are integral and necessary parts of everyday business. In our quest to address every organizational development need, we offer a gamut of training programs, which ranges from Executive Coaching and Leadership Training to basic Communication Skills.&nbsp;</p>', '<p>At Moral Learning Institute, we believe in creating an inclusive and supportive learning environment for all our students. We foster a sense of community among our students, faculty, and staff, creating a vibrant and engaging learning atmosphere.In addition to language courses, we offer cultural immersion programs, where students can learn about the rich cultural heritage of the countries whose languages they are learning. Our cultural programs include language exchange events, cultural festivals, and study abroad opportunities.</p>\r\n<blockquote>\r\n<p>&nbsp;</p>\r\n</blockquote>\r\n<p>Our institute is committed to continuous improvement. We regularly update our curriculum, teaching methodologies, and student support services to ensure that we stay at the forefront of language education.As a testament to our dedication to excellence, we have received numerous awards and accolades for our language training programs. Our students consistently achieve outstanding results in language proficiency exams, which is a testament to the quality of education we provide.</p>\r\n<p>&nbsp;</p>', 'digital-training-center-916678-p8.jpg');

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
-- Table structure for table `blog_section`
--

CREATE TABLE `blog_section` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
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

INSERT INTO `blog_section` (`id`, `user_id`, `title`, `slug`, `details`, `userPic`, `canonical_link`, `keyword`, `description`, `author`, `date`) VALUES
(1, 140, 'A Complete Guideline for making a Youtube video', 'a-complete-guideline-for-making-a-youtube-video', '<blockquote>\r\n<p><strong>&nbsp;</strong><strong>Are you interested in creating &amp; editing videos and building a career on YouTube? </strong><span style=\"font-weight: 400;\">If you are, then there are several steps to creating a successful YouTube video with the necessary skills. Here is a complete guide that will help you create a good YT video that makes you a professional one.</span></p>\r\n</blockquote>\r\n<h3><strong>Step 1: Start Learning</strong></h3>\r\n<blockquote>\r\n<p><span style=\"font-weight: 400;\">If you&rsquo;re new to YouTube and don&rsquo;t know where to start, a YouTube Video Making Course can help you get started. You&rsquo;ll learn about YouTube and how to start your own channel from the pros. Moreover, you can gather knowledge about creating videos for entertainment or education, starting a vlog, or building a brand around your channel.</span></p>\r\n<p><span style=\"font-weight: 400;\">However, if you want to learn more than creating and editing, you might consider taking a more specific course that covers topics like video editing, YouTube marketing, etc. Various online and offline youtube video-making courses can help you learn from the basics. Eventually, you will do better as a video creator or a </span><a href=\"https://www.creativeitinstitute.com/courses/video-editing\"><span style=\"font-weight: 400;\">professional video editor</span></a><span style=\"font-weight: 400;\"> on this platform.</span></p>\r\n</blockquote>\r\n<h3><strong>Step 2: Find Out What Works on YouTube</strong></h3>\r\n<blockquote>\r\n<p><span style=\"font-weight: 400;\">Studying the platform is an essential requirement to be succeeded as a YouTuber. You need to understand how the YouTube algorithm works, what types of videos become popular, and how such videos are performing. Make sure you read and follow the guidelines properly.&nbsp;</span></p>\r\n<p><span style=\"font-weight: 400;\">Once you are done with your research, it&rsquo;s time to start planning unique and fresh video content for your target audience.</span></p>\r\n</blockquote>\r\n<h3><strong>Step 3: Plan Your YouTube Video Strategy</strong></h3>\r\n<blockquote>\r\n<p><span style=\"font-weight: 400;\">If you want to create a professional YouTube video, there are a few things you need to do. First, you need to come up with an idea for your video. Think about what you want to share with your audience and what will be interesting or not for them to see. It can be anything &ndash; make sure it&rsquo;s something you&rsquo;re passionate about.</span></p>\r\n<p>&nbsp;</p>\r\n<p><span style=\"font-weight: 400;\">When you have an idea, it&rsquo;s time to start making a structure for it. Viewers will find your videos more interesting than others if your videos are about unique and creative topics or any social messages. So, think outside the box for ideas and topics and write a script or storyboard to stay on track.</span></p>\r\n</blockquote>', 'digital-training-center-240410-youtube.jpg', 'na', 'Youtube video', 'A Complete Guideline for making a Youtube video', 's', '2024-02-08 11:00:00'),
(4, 140, '5 Effective Digital Marketing Channels You Must Know', '5-effective-digital-marketing-channels-you-must-know', '<blockquote>\r\n<p><span style=\"font-weight: 400;\">With the constant evolution of digital marketing, keeping a constant marketing strategy is a challenge. So when marketing your brand or service you should not have a specific choice of platform you are thinking of focusing on. You should use all of those online marketing channels that work for you. Moreover, linking digital marketing channels for a complete digital footprint can produce better results for you.</span></p>\r\n<p><span style=\"font-weight: 400;\"> </span><span style=\"font-weight: 400;\">To know more about the world of digital marketing channels, keep reading this blog. Here we have discussed the important factors to consider when making your choice. By the end of this article, you&rsquo;ll have a clear concept of how to select and leverage the most effective digital marketing channels for your business.</span></p>\r\n<p>&nbsp;</p>\r\n<p><span style=\"font-weight: 400;\">These marketing platforms allow businesses to reach and engage with a large audience, build brand awareness, and drive website traffic. Still, the challenge lies in selecting the ones that align with your business goals and resonate with your audience.</span></p>\r\n<p>&nbsp;</p>\r\n<h2><strong>5 Types of Effective Digital Marketing Channels</strong></h2>\r\n<p><span style=\"font-weight: 400;\">Here are the top 5 digital marketing channels that are mostly used because of their effectiveness. However, it is essential to remember that the effectiveness of each channel may vary depending on your specific business goals, target audience, and industry. There are several courses available for mastering digital marketing. </span><a href=\"https://www.creativeitinstitute.com/\"><span style=\"font-weight: 400;\">Best IT Training Centers </span></a><span style=\"font-weight: 400;\">offer comprehensive courses for skills but learn the basics first. Let&rsquo;s take a closer look at some of the most powerful digital marketing channels.</span></p>\r\n<p>&nbsp;</p>\r\n<ul>\r\n<li aria-level=\"1\">\r\n<h3><strong>Social Media Marketing</strong></h3>\r\n</li>\r\n</ul>\r\n<p><span style=\"font-weight: 400;\">Social media platforms such as Facebook, Instagram, Twitter, LinkedIn, and Pinterest offer extensive opportunities for businesses to connect with their target audience. With your effective social media marketing you can create engaging content, build a strong online presence, run paid advertising campaigns, and foster genuine interactions with your audience.</span></p>\r\n<p>&nbsp;</p>\r\n<ul>\r\n<li aria-level=\"1\">\r\n<h3><strong>Search Engine Optimization (SEO)</strong><span style=\"font-weight: 400;\">&nbsp;</span></h3>\r\n</li>\r\n</ul>\r\n<p><span style=\"font-weight: 400;\">SEO (Search Engine Optimization)&nbsp; is the process of </span><a href=\"https://www.blog.creativeitinstitute.com/the-importance-of-seo-for-small-businesses/\"><span style=\"font-weight: 400;\">optimizing your website to rank higher</span></a><span style=\"font-weight: 400;\"> on search engine results pages (SERPs) like Google, Bing, and Yahoo. SEO, or, uses different methods to make your website show up higher on Google and other search engines. Some of these methods include finding the right keywords, optimizing your web pages, fixing technical issues, and getting other websites to link to yours.&nbsp;</span><span style=\"font-weight: 400;\">SEO results in organic traffic. It&rsquo;s valuable for any business website because it&rsquo;s more specific to what you offer, and it doesn&rsquo;t cost as much as other advertising methods.</span></p>\r\n<p>&nbsp;</p>\r\n<ul>\r\n<li aria-level=\"1\">\r\n<h3><strong>Email Marketing</strong></h3>\r\n</li>\r\n</ul>\r\n<p><span style=\"font-weight: 400;\">Email remains a powerful tool for building relationships and driving conversions. This marketing channel allows you to send newsletters, promotions, and product updates directly to subscribers&rsquo; inboxes. Automation tools enable you to segment your list and send relevant content, increasing engagement and conversion rates. </span><a href=\"https://blog.hubspot.com/marketing/email-marketing-stats#:~:text=64%25%20of%20small%20businesses%20use%20email%20marketing%20to%20reach%20customers\"><span style=\"font-weight: 400;\">According to a survey, 64% of small businesses are using email marketing to reach clients</span></a><span style=\"font-weight: 400;\">. Maintaining a schedule for your personalized email can deliver impressive results.</span></p>\r\n<p>&nbsp;</p>\r\n<ul>\r\n<li aria-level=\"1\">\r\n<h3><strong>Content Marketing</strong></h3>\r\n</li>\r\n</ul>\r\n<p><span style=\"font-weight: 400;\">Creating valuable, informative, and engaging content can position your brand as an authority in your industry. Along with developing brand awareness, you can attract a clearly defined audience. This content can include blog posts, articles, videos, infographics, and more. Well-executed content marketing can establish your brand as an authority in your industry and drive organic traffic to your website.</span></p>\r\n<p>&nbsp;</p>\r\n<ul>\r\n<li aria-level=\"1\">\r\n<h3><strong>Pay-Per-Click Advertising (PPC)</strong></h3>\r\n</li>\r\n</ul>\r\n<p><span style=\"font-weight: 400;\">PPC advertising, often associated with platforms like Google Ads and Microsoft Advertising, allows you to bid on keywords and display ads. Paid advertising can provide immediate visibility. Google Ads and social media advertising allow for precise targeting and measurable results. You pay only when someone clicks on your ad. PPC campaigns can be highly effective for driving immediate traffic and conversions, making them an essential part of many digital marketing strategies.</span></p>\r\n<p>&nbsp;</p>\r\n<p><span style=\"font-weight: 400;\">Apart from this influencer marketing, affiliate marketing, podcast marketing, and video marketing also play an important role in digital marketing channels. Link the channels you are using to maximize ROI.</span></p>\r\n</blockquote>', 'digital-training-center-861725-digital-marketing.jpg', 'Digital ', '5 Effective Digital Marketing Channels You Must Know', '5 Effective Digital Marketing Channels You Must Know', 'Digital ', '2024-02-08 11:00:00'),
(13, 140, 'Career Growth for an Image Editing Professional', 'career-growth-for-an-image-editing-professional', '<blockquote>\r\n<p>good graphic designer will be a good photo editor. This is because graphic design is visual art so is photo editing to convey a message or produce something informative. If you know<a href=\"https://www.blog.creativeitinstitute.com/digital-image-editing/\"> the top 9 secrets of digital image editing</a>, you can be a good image editor.&nbsp;&nbsp; But yes, there are differences between these two roles which are described below.</p>\r\n<p>&nbsp;</p>\r\n<p>Photo editing is the process of altering an image. Such as cropping, removing the background, changing the contrast, saturation, exposure, and so on.</p>\r\n<p>&nbsp;</p>\r\n<p><strong><a href=\"https://www.blog.creativeitinstitute.com/is-graphic-design-a-good-career-guideline-2022/\">Graphic design</a></strong> is a vector illustration in which the drawings are created digitally. Photo editing is the process of improving a photograph by using photo editing software&rsquo;s features and composition.</p>\r\n<p>&nbsp;</p>\r\n<p>Graphics design is primarily concerned with the creation and development of unique graphics for use in the digital environment. Image editing is used to remove undesired features. Such as dust specks and scratches, adjusting the geometry of the image.&nbsp; It also includes rotating and cropping, sharpening or softening the image, making color changes, and adding special effects. Just like image editing courses online, you will have many graphic design tutorial videos. These resources are very helpful.</p>\r\n<p>&nbsp;</p>\r\n<p><strong>Now if you blend these two, you will have the skills and knowledge to make something more dynamic.</strong></p>\r\n<p>&nbsp;</p>\r\n<h2>The checklist you need to be a professional image editor</h2>\r\n<p>&nbsp;</p>\r\n<p><strong>For being a successful image editor make sure you have fulfilled this checklist.</strong></p>\r\n</blockquote>\r\n<ul>\r\n<li>\r\n<blockquote>Leadership abilities: Managing a large crew of photographers is a bonus.</blockquote>\r\n</li>\r\n<li>\r\n<blockquote>Experience negotiating contracts and assigning projects to a respected and trustworthy group of freelance photographers.</blockquote>\r\n</li>\r\n<li>\r\n<blockquote>Strong technical abilities and familiarity with editing software. Get fluent in Photoshop, InDesign, Bridge, Lightroom, and other similar programs.</blockquote>\r\n</li>\r\n<li>\r\n<blockquote>Working with creative, digital marketing, and social media teams to produce, edit, and disseminate big volumes of photography for a number of functions is a skill.</blockquote>\r\n</li>\r\n<li>\r\n<blockquote>Working in a fast-paced atmosphere with deadlines and where project requirements might change quickly</blockquote>\r\n</li>\r\n<li>\r\n<blockquote>Be a strong decision-maker with editing skills and a grasp of how an image communicates the story of our organization.</blockquote>\r\n</li>\r\n<li>\r\n<blockquote>Previous experience as a photo editor in an agency or for a corporation is a bonus.</blockquote>\r\n</li>\r\n</ul>', 'digital-training-center-154779-photo-edit.jpg', 'Natus obcaecati ipsu update', 'Career Growth for an Image Editing Professional', 'Career Growth for an Image Editing Professional', 'Sunt voluptas reici update', '2024-02-15 11:00:00'),
(14, 140, 'Content Marketing Career Opportunities', 'content-marketing-career-opportunities', '<blockquote>\r\n<p>As a content marketer, you have already known that the work you do is valuable. So it should be no surprise that demand for your skills is only going to grow in the upcoming years.</p>\r\n<p>&nbsp;</p>\r\n<h3>1.&nbsp;&nbsp;&nbsp;&nbsp; Content producers</h3>\r\n<p>Content producers are responsible for creating content. These contents are then used to create a marketing strategy.</p>\r\n<p>If you know content marketing, then you can also work as a content producer.</p>\r\n<p>&nbsp;</p>\r\n<p>As a content producer, you have to work with the content marketing team. Also, you have to work on their strategies in the process.</p>\r\n<p>In short, you have to track the analytics of in-house content marketing team&rsquo;s performance.</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<h3>2.&nbsp;&nbsp;&nbsp;&nbsp; Content editors</h3>\r\n<p>As a content editor, you&rsquo;re responsible for editing content.</p>\r\n<p>&nbsp;</p>\r\n<p>You&rsquo;ll also be checking the quality of that content and making sure that it&rsquo;s engaging. Content editors are also responsible for making sure that their content meets the standards of their brand. They ensure all relevant keywords are properly placed within articles.</p>\r\n<p>&nbsp;</p>\r\n<p>Lastly, work for SEO friendly content. So that it can be found by search engines when someone searches for something related to what the company sells or does.</p>\r\n<p>&nbsp;</p>\r\n<h3>3.&nbsp;&nbsp;&nbsp;&nbsp; Content marketer</h3>\r\n<p>The goal of content marketing is to acquire and retain customers through the publishing and promotion of content. An effective content marketer creates and distributes engaging and relevant content.</p>\r\n<p>&nbsp;</p>\r\n<p>The job of a content marketer includes managing social media, writing blog posts and case studies, planning events or webinars, developing videos, recording podcasts, etc.</p>\r\n</blockquote>', 'digital-training-center-822064-Content-Marketing.jpg', 'Odit rerum necessita', 'Content Marketing Career Opportunities', 'Content Marketing Career Opportunities', 'Magnam mollitia moll', NULL),
(15, 140, 'How to Start Freelancing Career', 'how-to-start-freelancing-career', '<blockquote>\r\n<p>Starting a career in freelancing is tough and challenging. Yet, it can be easy with some effective tips and tricks. Here is a 4-step guide to set up a successful career in freelancing that you can follow-</p>\r\n<p>&nbsp;</p>\r\n<h3>Step 1- Prerequisites of Freelancing</h3>\r\n<p>Thinking about starting your career in freelancing? Check out the prerequisites before starting to outsource freelancing.</p>\r\n<p>&nbsp;</p>\r\n<h4>●&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Adequate knowledge</h4>\r\n<p>Knowledge is fundamental for any career. Thus, it is also important for freelance as well. You can choose one or more to serve from a wide variety of freelancing services. However, it is quite impossible to get established without adequate knowledge. To overcome this, you can do freelance training in your own language. For instance- do freelancing classes in any <strong><a href=\"https://www.creativeitinstitute.com/\">freelance learning course in Bangla.</a></strong></p>\r\n<p>&nbsp;</p>\r\n<h4>●&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Necessary device/appliance</h4>\r\n<p>Most freelancing works need a device or specific appliance. These works are online-based. For this reason, it needs specific devices.</p>\r\n<p>&nbsp;</p>\r\n<p>To illustrate, if you are freelance as a UI/UX designer, you will need a highly configured desktop or laptop. The UI/UX design minimum requires a quad-core processor, intel i5, or higher. Otherwise, it will need at least 8-16 GB RAM for smooth operating.</p>\r\n<p>&nbsp;</p>\r\n<h4>●&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Growing mindset</h4>\r\n<p>Freelancing workers need skills in research and creative activities. In fact, you can research the work prototypes in freelancing marketplaces like Fiverr, Upwork, and other platforms. During these activities, you must have a growth mindset. Because a growth mindset can shape our thinking capabilities and assist us to be more creative. However, it ensures intellect and talent through continuous development as well.</p>\r\n<p>&nbsp;</p>\r\n<h4>●&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; The tendency of accepting failure</h4>\r\n<p>Hardships are common in every profession. Similarly, a freelancing business is not beyond it. Whereas, a successful career in freelancing is quite different from any other career. For this reason, people go through a lot of struggles in this career. From learning to earning, hardships are in every step of working as a freelancer.</p>\r\n</blockquote>', 'digital-training-center-52251-frelancing.jpg', 'Modi vel non at dist', 'How to Start Freelancing Career', 'How to Start Freelancing Career', 'Consequatur earum f', NULL),
(16, 140, 'How to Become an SEO Expert', 'how-to-become-an-seo-expert', '<blockquote>\r\n<p>Yes, it is. SEO is a great career opportunity for individuals who enjoy working with computers. SEO experts use numerous strategies. For optimizing and increasing the number of visitors to a website. It also includes keyword research, backlinking, optimizing, etc.</p>\r\n<p>&nbsp;</p>\r\n<h3><strong>1.&nbsp;&nbsp;&nbsp; </strong><strong>Gather knowledge of Information Technology</strong></h3>\r\n<p>There are many different paths to becoming an SEO expert. One of the best ways is to study information technology, or IT. After earning your degree in IT, there will be several different opportunities for you to work as an SEO specialist. It can be on a freelance basis or full-time. Numerous companies are hiring these professionals.</p>\r\n<p>&nbsp;</p>\r\n<h3><strong>2.&nbsp;&nbsp;&nbsp; </strong><strong>Take SEO-related courses</strong></h3>\r\n<p>Another great way to learn how to become an SEO expert is by taking online <a href=\"https://www.creativeitinstitute.com/courses/search-engine-optimization\">SEO-related courses</a>. Online courses often cost less than traditional college classes. Yet they offer the same type of experience and education. Along with the flexibility of being able to study from home and at your own pace. If you are not comfortable with online classes, you can enroll in offline classes. There are reputed institutions that are providing various courses in this field.</p>\r\n<p>&nbsp;</p>\r\n<h3><strong>3.&nbsp;&nbsp;&nbsp; </strong><strong>Acquire the skills required</strong></h3>\r\n<p><strong>&nbsp;</strong>There are many different skill sets needed to become a successful SEO professional. Most companies prefer candidates who have expertise in link building, keyword research, and analysis of web traffic patterns.</p>\r\n<p>&nbsp;</p>\r\n<p>Additionally, these professionals need to have <strong><a href=\"https://www.blog.creativeitinstitute.com/content-marketing-career-opportunities-in-2022/\">strong writing</a></strong> and communication skills. This shows the ability to articulate complex concepts.</p>\r\n<p>&nbsp;</p>\r\n<p>Also, general skills are always valuable. Such as adaptability with new tools, creativity, analytical thinking, problem-solving abilities, and business knowledge.</p>\r\n<p>&nbsp;</p>\r\n</blockquote>', 'digital-training-center-11157-seo.png', 'Dolorem optio quos ', 'How to Become an SEO Expert', 'How to Become an SEO Expert', 'Sunt delectus et s', NULL);

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
(14, 140, '01610-762576', ' pcltd75@gmail.com', 'Puran Bogura, Rajshahi Division, Bangladesh', '249198.jpg');

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
  `entry_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact_info`
--

INSERT INTO `contact_info` (`id`, `name`, `email`, `phone`, `subject`, `message`, `entry_date`) VALUES
(60, 'Faith Aguirre', 'hujogaxe@mailinator.com', '+1 (814) 895-4739', 'Reprehenderit dolor', 'Explicabo Suscipit ', '0000-00-00'),
(61, 'Cherokee Cantu', 'busupiw@mailinator.com', '+1 (505) 345-1111', 'Sint sed voluptatum ', 'Accusantium Nam ut c', '0000-00-00'),
(62, 'Ginger Brady', 'bovitomoh@mailinator.com', '01751891037', 'Ullamco ut ad sed te', 'Molestiae nostrum do', '0000-00-00'),
(63, 'Stacy Mcguire', 'togesic@mailinator.com', '01751891037', 'Id laboris officia s', 'Consectetur numquam ', '0000-00-00'),
(64, 'Samiul Alam', 'ricemill@gmail.com', '', 'sgsdg', 'qfqwfqaf', '2024-09-10');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(500) NOT NULL,
  `slug` varchar(300) NOT NULL,
  `course_fee` varchar(100) NOT NULL,
  `duration` varchar(100) NOT NULL,
  `total_semester` varchar(100) NOT NULL,
  `details` longtext NOT NULL,
  `userPic` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`id`, `category_id`, `user_id`, `name`, `slug`, `course_fee`, `duration`, `total_semester`, `details`, `userPic`) VALUES
(13, 10, 140, 'Microsoft Office Application', 'microsoft-office-application', '5000', '3-Months', '1', '<p style=\"text-align: justify;\">মাইক্রোসফট ওয়ার্ড ব্যবহার হয় যেমন চিঠিপত্র, বই লেখা, নোটিশ দেয়া,ডকুমেন্ট প্রিন্ট , বেসিক ডিজাইন, দলিল,প্রশ্নপত্র , প্রিন্ট , অফিসিয়াল নোট , অফিসিয়াল লেটার , বিভিন্ন চুক্তি প্রত্র , টেবলে বক্স ,ব্যক্তিগত নোট ,বিভিন্ন প্রজেক্ট ডকুমেন্ট,নিজের জীবনবৃত্তান্ত সহ আরো অনেক কাজ করতে পারবেন। বিভিন্ন গুরুত্বপুর্ন তথ্য সংগ্রহ করে রাখা ইত্যাদি।</p>\r\n<div class=\"col-lg-12 mt-5 aos-init aos-animate\" data-aos=\"fade-left\">\r\n<h4 style=\"text-align: center;\">&nbsp;</h4>\r\n<h4 style=\"text-align: center;\"><span style=\"color: #d11447;\"><strong>&nbsp;কেন শিখবেন এই কোর্সটি ?</strong></span></h4>\r\n<hr />\r\n<ul style=\"list-style-type: square;\">\r\n<li><strong>যারা অলরেডি গ্রাজুয়েট এবং বেসিক কম্পিউটার ইন্ডাস্ট্রিতে চাকুরি করতে চান।</strong></li>\r\n<li><strong>বিভিন্ন মার্কেটিং এজেন্সি, আইটি কোম্পানিতে ক্যারিয়ার শুরু করতে চান।</strong></li>\r\n<li><strong>ভালোভাবে কাজ শিখলে চাকুরী পাওয়াটাই স্বাভাবিক ।</strong></li>\r\n<li><strong>কর্ম জীবনে উন্নতি পাবেন ও এক ধাপ এগিয়ে যাবেন।</strong></li>\r\n<li><strong>আপনার নিজের কাজ গুলোকেও সহজ ও সুন্দরভাবে করতে পারবেন।</strong></li>\r\n<li><strong>কাজের গতি বাড়বে। কাজ হবে প্রফেশনাল লেভেলের।</strong></li>\r\n<li><strong>আধুনিক যুগের ডিজিটাল প্রতিযোগীতায় টিকে থাকতে পারবেন।</strong></li>\r\n</ul>\r\n<p>&nbsp;</p>\r\n<h4 style=\"text-align: center;\"><span style=\"color: #d11447;\">এই কোর্সে যা শিখানো হবে : 𝗠𝗶𝗰𝗿𝗼𝘀𝗼𝗳𝘁 𝗢𝗳𝗳𝗶𝗰𝗲 𝗦𝗽𝗲𝗰𝗶𝗮𝗹𝗶𝘀𝘁</span></h4>\r\n<hr />\r\n<ul>\r\n<li style=\"text-align: left;\">মাইক্রোসফট ওয়ার্ড ব্যবহার হয় যেমন চিঠিপত্র, বই লেখা, নোটিশ দেয়া,ডকুমেন্ট প্রিন্ট , বেসিক ডিজাইন, দলিল,প্রশ্নপত্র , প্রিন্ট , অফিসিয়াল নোট , অফিসিয়াল লেটার , বিভিন্ন চুক্তি প্রত্র , টেবলে বক্স ,ব্যক্তিগত নোট ,বিভিন্ন প্রজেক্ট ডকুমেন্ট,নিজের জীবনবৃত্তান্ত সহ আরো অনেক কাজ করতে পারবেন। বিভিন্ন গুরুত্বপুর্ন তথ্য সংগ্রহ করে রাখা ইত্যাদি।</li>\r\n</ul>\r\n<p style=\"text-align: left;\">&nbsp;</p>\r\n<ul style=\"text-align: left;\">\r\n<li style=\"text-align: justify;\">মাইক্রোসফট এক্সেলের মাধ্যমে আপনি সহজেই তাদের বিভিন্ন রকম তথ্য সংগ্রহ করে রাখতে পারবেন। আবার ধরুন কোন প্রতিষ্ঠানের বেতন ,রেজাল্ট,বিদুৎ বিল,লাভ ক্ষতি ,ব্যাংক লোন হিসাব , ব্যক্তিগত হিসাব ,প্রতিষ্ঠান হিসাব ,ইত্যাদি সুত্র প্রয়োগ করে সহজেই আপনি কাজ করতে পারবেন।</li>\r\n</ul>\r\n<p style=\"text-align: left;\">&nbsp;</p>\r\n<ul>\r\n<li style=\"text-align: left;\">মাইক্রোসফট পাওয়ারপয়েন্টে অফিস অথবা কলেজের প্রেজেন্টেশন তৈরি করা, স্লাইড আকারে নিজের জীবনবৃতান্ত তৈরি করা, কোন স্থান বা দেশের ডকুমেন্টরি তৈরি করা, এমনকি ভিডিও পর্যন্ত তৈরি করা যায় মাইক্রোসফট পাওয়ারপয়েন্ট দিয়ে।</li>\r\n</ul>\r\n<p>&nbsp;</p>\r\n<h4 style=\"text-align: center;\"><span style=\"color: #d11447;\">কেন আমাদের কাছে কাজ শিখবেন</span></h4>\r\n<hr />\r\n<ul>\r\n<li style=\"text-align: left;\">হাতে কলমে প্র্যাক্টিক্যাল প্রজেক্টস করানো হয় এবং প্রতিটি ক্লাসে এসাইন্মেন্ট দেওয়া হয়</li>\r\n<li style=\"text-align: left;\">সব ক্লাস সমূহের রেকর্ডেট ভিডিও দেওয়া হয়।</li>\r\n<li style=\"text-align: left;\">ক্লাস পিডিএফ এন্ড স্লাইড দেওয়া হয়।</li>\r\n<li style=\"text-align: left;\">সরাসরি মেন্টরিং সাপোর্ট ছাড়াও এই কোর্স থেকে পাবেন আরো অনেক কিছু!</li>\r\n<li style=\"text-align: left;\">অনলাইন ভেরিফায়েড সার্টিফিকেট প্রদান।</li>\r\n<li style=\"text-align: left;\">লাইফ টাইম কোর্স ফ্রি ফ্যাসিলিটি থাকছে।</li>\r\n<li style=\"text-align: left;\">অফিস ফ্রি টাইম ল্যাব প্র্যাক্টিস করতে পারবেন।</li>\r\n<li style=\"text-align: left;\">অনলাইন ও অফলাইন ক্লাস করা যায়।</li>\r\n<li style=\"text-align: left;\">জব প্লেসমেন্ট ও ইন্টার্নশিপ এর ব্যবস্থা।</li>\r\n<li style=\"text-align: left;\">ইন্টারভিউ ও জব প্রিপারেশন করানো হয়।</li>\r\n</ul>\r\n<p class=\"text-center\" style=\"text-align: left;\"><span style=\"background-color: var(--bs-table-bg); font-size: var(--bs-body-font-size); font-weight: var(--bs-body-font-weight); text-align: var(--bs-body-text-align);\">&nbsp;</span></p>\r\n</div>', 'digital-training-center-617942-office.jpeg'),
(14, 11, 140, 'Graphics Design / Freelancing', 'graphics-design-freelancing', '12000', '3-Months', '36', '<p style=\"text-align: justify;\">বর্তমানে ফ্রিল্যান্সিং গুলোর মধ্যে সবচেয়ে শক্তিশালী এবং জনপ্রিয় সেক্টর হচ্ছে Graphics Design(গ্রাফিক্স ডিজাইন)। আমাদের কোর্সটি সাজানো হয়েছে এমন ভাবে যাতে একজন সহজেই বেসিক থেকে এডভান্স লেভেল এর কাজে সক্ষম হয় এবং Freelancing এর দুনিয়ায় সহজে তার ক্যারিয়ার গড়তে পারে।&nbsp;</p>\r\n<p style=\"text-align: justify;\">&nbsp;</p>\r\n<blockquote>\r\n<h4 class=\"title sal-animate\" data-sal-delay=\"150\" data-sal=\"slide-up\" data-sal-duration=\"800\"><strong><span style=\"color: #000000;\">কোর্স কারিকুলাম</span></strong></h4>\r\n</blockquote>\r\n<ul>\r\n<li style=\"list-style-type: none;\">\r\n<ul>\r\n<li><span style=\"color: #000000;\">Design Principles and Elements</span></li>\r\n<li><span style=\"color: #000000;\">Logo Designing</span></li>\r\n<li><span style=\"color: #000000;\">Brochure Design</span></li>\r\n<li><span style=\"color: #000000;\">Colour Theory</span></li>\r\n<li><span style=\"color: #000000;\">Brand identity Design</span></li>\r\n<li><span style=\"color: #000000;\">Typography</span></li>\r\n<li><span style=\"color: #000000;\">বিজনেস কার্ড ডিজাইন,ব্যানার, পোষ্টার, লোগো , বিলবোর্ড, সোশ্যাল মিডিয়া কভার ফটো ইত্যাদি।</span></li>\r\n<li><span style=\"color: #000000;\">ক্লিপিং পাথ, মাল্টিপাথ, কালার কারেকশন।</span></li>\r\n<li><span style=\"color: #000000;\">ফ্রিল্যান্সিং, ডিজাইন হিল, আপওয়ার্ক, ফাইভার ইত্যাদি।</span></li>\r\n<li><span style=\"color: #000000;\">গ্রাফিক্স ডিজাইন করে কি ভাবে একটিভ ও পেসিভ ইনকাম করা যায় ।</span></li>\r\n<li><span style=\"color: #000000;\">লাইফ টাইম ইনকাম কিভাবে করবেন ।</span></li>\r\n</ul>\r\n</li>\r\n</ul>\r\n<p>&nbsp;</p>\r\n<h4 style=\"text-align: center;\"><span style=\"color: #d11447;\">কেন আমাদের কাছে কাজ শিখবেন</span></h4>\r\n<hr />\r\n<ul>\r\n<li style=\"list-style-type: none;\">\r\n<ul style=\"list-style-type: square;\">\r\n<li style=\"text-align: left;\">হাতে কলমে প্র্যাক্টিক্যাল প্রজেক্টস করানো হয় এবং প্রতিটি ক্লাসে এসাইন্মেন্ট দেওয়া হয়</li>\r\n<li style=\"text-align: left;\">সব ক্লাস সমূহের রেকর্ডেট ভিডিও দেওয়া হয়।</li>\r\n<li style=\"text-align: left;\">ক্লাস পিডিএফ এন্ড স্লাইড দেওয়া হয়।</li>\r\n<li style=\"text-align: left;\">সরাসরি মেন্টরিং সাপোর্ট ছাড়াও এই কোর্স থেকে পাবেন আরো অনেক কিছু!</li>\r\n<li style=\"text-align: left;\">অনলাইন ভেরিফায়েড সার্টিফিকেট প্রদান।</li>\r\n<li style=\"text-align: left;\">লাইফ টাইম কোর্স ফ্রি ফ্যাসিলিটি থাকছে।</li>\r\n<li style=\"text-align: left;\">অফিস ফ্রি টাইম ল্যাব প্র্যাক্টিস করতে পারবেন।</li>\r\n<li style=\"text-align: left;\">অনলাইন ও অফলাইন ক্লাস করা যায়।</li>\r\n<li style=\"text-align: left;\">জব প্লেসমেন্ট ও ইন্টার্নশিপ এর ব্যবস্থা।</li>\r\n<li style=\"text-align: left;\">ইন্টারভিউ ও জব প্রিপারেশন করানো হয়।</li>\r\n</ul>\r\n</li>\r\n</ul>', 'digital-training-center-588223-graphics-design.jpeg'),
(15, 12, 140, 'Website Design', 'website-design', '15000', '36', '3-Months', '<blockquote>\r\n<h4 style=\"text-align: center;\"><span style=\"color: #d81d1d;\"><strong>কোর্স</strong><strong> </strong><strong>কারিকুলাম</strong></span></h4>\r\n</blockquote>\r\n<ul>\r\n<li style=\"list-style-type: none;\">\r\n<ul style=\"list-style-type: square;\">\r\n<li><span style=\"color: #000000;\">HTML5</span></li>\r\n<li><span style=\"color: #000000;\">CSS3</span></li>\r\n<li><span style=\"color: #000000;\">PSD To HTML</span></li>\r\n<li><span style=\"color: #000000;\">Bootstrap Latest Version</span></li>\r\n<li><span style=\"color: #000000;\">JavaScript</span></li>\r\n<li><span style=\"color: #000000;\">jQuery</span></li>\r\n<li><span style=\"color: #000000;\">Basic PhotoShop</span></li>\r\n<li><span style=\"color: #000000;\">Marketplace Related Classes</span></li>\r\n</ul>\r\n</li>\r\n</ul>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<blockquote>\r\n<h4 style=\"text-align: center;\"><span style=\"color: #6a25d1;\"><strong>এই কোর্সটি থেকে যা শিখতে পারবেন</strong></span></h4>\r\n</blockquote>\r\n<ul>\r\n<li style=\"list-style-type: none;\">\r\n<ul style=\"list-style-type: circle;\">\r\n<li>HTML, CSS ও JavaScript ল্যাংগুয়েজের ব্যবহার</li>\r\n<li>Bootstrap এবং jQuery লাইব্রেরির ব্যবহার</li>\r\n<li>PhotoShop এর বেসিক ব্যবহার</li>\r\n<li>ওয়েবসাইটের লেআউট ও টেমপ্লেট তৈরি করা</li>\r\n<li>Bootstrap ব্যবহার করে কম সময়ে Responsive ওয়েব ডিজাইন করা</li>\r\n<li>ইউজার ফ্রেন্ডলি ওয়েবসাইট তৈরির পদ্ধতি</li>\r\n<li>অনলাইন মার্কেট প্লেসের জন্য Template ডিজাইন</li>\r\n</ul>\r\n</li>\r\n</ul>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<blockquote>\r\n<h4 style=\"text-align: center;\"><strong><span style=\"color: #d11447;\">কেন আমাদের কাছে কাজ শিখবেন</span></strong></h4>\r\n</blockquote>\r\n<ul>\r\n<li style=\"list-style-type: none;\">\r\n<ul>\r\n<li style=\"text-align: left;\">হাতে কলমে প্র্যাক্টিক্যাল প্রজেক্টস করানো হয় এবং প্রতিটি ক্লাসে এসাইন্মেন্ট দেওয়া হয়</li>\r\n<li style=\"text-align: left;\">সব ক্লাস সমূহের রেকর্ডেট ভিডিও দেওয়া হয়।</li>\r\n<li style=\"text-align: left;\">ক্লাস পিডিএফ এন্ড স্লাইড দেওয়া হয়।</li>\r\n<li style=\"text-align: left;\">সরাসরি মেন্টরিং সাপোর্ট ছাড়াও এই কোর্স থেকে পাবেন আরো অনেক কিছু!</li>\r\n<li style=\"text-align: left;\">অনলাইন ভেরিফায়েড সার্টিফিকেট প্রদান।</li>\r\n<li style=\"text-align: left;\">লাইফ টাইম কোর্স ফ্রি ফ্যাসিলিটি থাকছে।</li>\r\n<li style=\"text-align: left;\">অফিস ফ্রি টাইম ল্যাব প্র্যাক্টিস করতে পারবেন।</li>\r\n<li style=\"text-align: left;\">অনলাইন ও অফলাইন ক্লাস করা যায়।</li>\r\n<li style=\"text-align: left;\">জব প্লেসমেন্ট ও ইন্টার্নশিপ এর ব্যবস্থা।</li>\r\n<li style=\"text-align: left;\">ইন্টারভিউ ও জব প্রিপারেশন করানো হয়।</li>\r\n</ul>\r\n</li>\r\n</ul>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>', 'digital-training-center-444015-web.jpg'),
(16, 12, 140, 'Web Development With Laravel', 'web-development-with-laravel', '20000', '36', '3-Months', '<p style=\"text-align: justify;\">বর্তমানে ওয়েব ডিজাইন ও ডেভেলপমেন্ট-এর চাহিদা মার্কেট প্লেস গুলোতে অনেক বেশি, সেই সাথে প্রতিনিয়ত বেড়েই চলেছ এবং ভবিষ্যতে আরও বাড়বে। বর্তমানে ব্যাকএন্ড ডেভেলপমেন্টের জন্য লারাভেল হলো PHP-এর সবচেয়ে জনপ্রিয় ফ্রেমওয়ার্ক! এই কোর্সে বেসিক থেকে শুরু করে প্রফেশনাল লেভেল পর্যন্ত Laravel এর ফিচারগুলো শিখুন।<br /><br />দেশে -বিদেশে কাজ করা সুযোগ বাড়ছে। আপনি ও এই কোর্স টা করে নিজের চাকরি / ব্যবসা শুরু করতে পারবেন। অনলাইন মার্কেটপ্লেস কাজ করতে পারবে।</p>\r\n<p>&nbsp;</p>\r\n<h3 class=\"text-center\"><span style=\"color: #236fa1;\"><strong>এই কোর্সে যা শিখানো হবে</strong></span></h3>\r\n<ul>\r\n<li>Must Have Knowledge Basic Web (HTML, CSS,JS,PHP etc)</li>\r\n<li>Laravel Basic To Advanced</li>\r\n<li>Laravel API</li>\r\n<li>MySQL Database</li>\r\n<li>Todo list Application</li>\r\n<li>Blog Application</li>\r\n<li>Ecommerce Application</li>\r\n<li>Marketplace Related Classes</li>\r\n</ul>\r\n<p>&nbsp;</p>\r\n<h3 class=\"text-center\"><strong>Needed Software</strong></h3>\r\n<hr />\r\n<ul>\r\n<li>Visual Studio Code</li>\r\n<li>Composer</li>\r\n<li>Xampp / Wampp</li>\r\n<li>Web Browser</li>\r\n</ul>\r\n<h3 class=\"text-center\">&nbsp;</h3>\r\n<h3 class=\"text-center\"><strong>Job Opportunities</strong></h3>\r\n<hr />\r\n<ul>\r\n<li>Full-Stack Web Developer</li>\r\n<li>Back-End Developer</li>\r\n<li>Python Developer</li>\r\n<li>Software Engineer</li>\r\n</ul>\r\n<p>&nbsp;</p>\r\n<h3 class=\"text-center\"><strong>Marketplace Job</strong></h3>\r\n<hr />\r\n<ul>\r\n<li>Upwork</li>\r\n<li>Fiver</li>\r\n<li>Freelancer</li>\r\n</ul>', 'digital-training-center-118410-laravel-el.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `course_apply`
--

CREATE TABLE `course_apply` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` int(11) NOT NULL,
  `course` varchar(255) NOT NULL,
  `course_type` varchar(255) NOT NULL,
  `entry_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `course_apply`
--

INSERT INTO `course_apply` (`id`, `name`, `email`, `phone`, `course`, `course_type`, `entry_date`) VALUES
(43, 'Garth Fischer', 'somynikylu@mailinator.com', 93, 'Computer Science Engineering', 'offline', '2024-02-11 18:09:38'),
(44, 'Beck Rocha', 'qavuh@mailinator.com', 34, 'Diploma in Medical Technology', 'online', '2024-02-11 18:09:54'),
(45, 'Michael Nielsen', 'marinixa@mailinator.com', 47, 'Diploma in Medical Assistant', 'online', '2024-02-11 18:10:02'),
(46, 'Samiul Vai - Prince Alam', 'samiul@gmail.com', 1576576591, 'Microsoft Office Application', 'offline', '2024-07-06 12:38:47'),
(47, 'Aliul Vai  - Prince Education', 'aliul@gmail.com', 1733053796, 'Graphics Design / Freelancing', 'offline', '2024-07-06 12:41:48'),
(48, 'Samiul Alam', 'ricemill@gmail.com', 1751891037, 'Microsoft Office Application', 'offline', '2024-07-06 12:43:18'),
(49, 'Samiul Vai', 'samiul@gmail.com', 1576576591, 'Web Development With Laravel', 'offline', '2025-02-02 11:39:31');

-- --------------------------------------------------------

--
-- Table structure for table `course_category`
--

CREATE TABLE `course_category` (
  `cat_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `cat_name` varchar(500) DEFAULT NULL,
  `cat_details` longtext DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `cat_photo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `course_category`
--

INSERT INTO `course_category` (`cat_id`, `user_id`, `cat_name`, `cat_details`, `link`, `cat_photo`) VALUES
(10, 140, 'Office Application', '<p>Microsoft Office Application</p>', 'Microsoft Office Application', 'digital-training-center-779000-square-dot.png'),
(11, 140, 'Graphics Design', '<h2 class=\"mb-2 text-center mt-5\"><strong>Graphics Design With Freelancing</strong></h2>', '--', 'digital-training-center-487388-square-dot.png'),
(12, 140, 'Website', '<p>Web</p>', '', NULL),
(13, 140, 'ff', '', '', NULL);

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
(7, 140, 'What teaching methods are effective for Moral Education?', 'Effective teaching methods for Moral Education include discussions, role-playing, storytelling, case studies, community service projects, and reflective exercises. These methods encourage critical thinking, empathy, and moral reflection.', '2024-03-12');

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
(23, 140, 'Sheikh Hasina Youth Volunteer Award-2022', 'digital-training-center-589269-award-2.jpg'),
(24, 140, 'Visiting the office of the owner of the Iranian Petroleum Industry', 'digital-training-center-945238-irani5.jpg'),
(25, 140, 'Program Photo', 'digital-training-center-378561-prince-417576-3.jpg'),
(26, 140, 'National Gold Cup Football Tournament - 2022', 'digital-training-center-418311-army-stadium1.jpg'),
(27, 140, 'Office Corridor ', 'digital-training-center-720964-coridor-1.jpg'),
(28, 140, 'Office Corridor ', 'digital-training-center-748845-coridor-2.jpg'),
(29, 140, 'Building Photo', 'digital-training-center-676103-building-photo-2.jpg');

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
(24, 140, 'Photo Gallery', 'digital-training-435532-p2.jpg'),
(25, 140, 'Program Photo', 'digital-training-407533-p3.jpg'),
(26, 140, 'Photo Gallery', 'digital-training-845993-p4.jpg'),
(27, 140, 'Photo Gallery', 'digital-training-841864-p5.jpg'),
(28, 140, 'Photo Gallery', 'digital-training-282070-p6.jpg'),
(29, 140, 'Photo Gallery', 'digital-training-38052-p7.jpg'),
(30, 140, 'Photo Gallery', 'digital-training-208958-p8.jpg'),
(31, 140, 'Photo Gallery', 'digital-training-935749-p9.jpg');

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
(1, 140, 'SDF অফিস কতৃপক্ষ এবং ওয়ার্ল্ড ব্যাংকের প্রতিনিধি অফিস পরিদর্শনের কিছু মুহূর্ত ।', 'https://www.youtube.com/embed/71Sx3rjcvDE?si=nKiwWOfXR1qgKWO2', 'digital-training-center-977788-logo.png', '2024-07-14 11:32:57'),
(2, 140, 'ই-লার্নিং অ্যান্ড আর্নিং লিমিটেড এর রাজশাহী শাখার একজন প্রশিক্ষণার্থীর সফলতার গল্প ।', 'https://www.youtube.com/embed/cubMR1irkzg?si=-ym_X-SoxdTDaRoY', 'digital-training-center-718454-5437a-sga-case-study-data-analytics-youtube-thumbnail.jpg', '2024-07-14 12:06:12'),
(3, 140, 'একজন প্রশিক্ষণার্থীর সফলতার গল্প', 'https://www.youtube.com/embed/f9ZYAw3T7A0?si=2HZUHOvYIgD4KLUV', 'digital-training-center-957641-5437a-sga-case-study-data-analytics-youtube-thumbnail.jpg', '2024-07-14 12:24:31'),
(4, 140, 'সনদপত্র বিতরণ অনুষ্ঠান', 'https://www.youtube.com/embed/CDAJoiIEFbc?si=50zgbqk6yY5qAQ5p', 'digital-training-center-880288-5437a-sga-case-study-data-analytics-youtube-thumbnail.jpg', '2024-07-14 12:25:18'),
(5, 140, 'একজন প্রশিক্ষণার্থীর সফলতার গল্প', 'https://www.youtube.com/embed/SdULVB2s06Q?si=tZNq5_Hdr9birGES', 'digital-training-center-534759-5437a-sga-case-study-data-analytics-youtube-thumbnail.jpg', '2024-07-14 12:25:53'),
(6, 140, 'সনদপত্র বিতরণ, জব ফেয়ার ও ইমপ্যাক্ট প্রকল্পের বায়োগ্যাস প্লান্ট স্থাপনের শুভ উদ্বোধন অনুষ্ঠান', 'https://www.youtube.com/embed/RltiOkMnSB8?si=x24f-9dlKZQ8X3eD', 'digital-training-center-348707-5437a-sga-case-study-data-analytics-youtube-thumbnail.jpg', '2024-07-14 12:27:49');

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
  `link_two` mediumtext DEFAULT NULL,
  `details` text NOT NULL,
  `userPic` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `header_section`
--

INSERT INTO `header_section` (`id`, `user_id`, `type`, `title`, `subtitle`, `link_one`, `link_two`, `details`, `userPic`) VALUES
(1, 140, 'Banner', 'New Way To Learn', 'And , Build Your Career.', 'about', 'courses', '<p>Details</p>', ''),
(2, 140, 'Course', 'OUR SPECIAL COURSES', 'Sub Title', NULL, NULL, '<p><span style=\"color: #0d0d0d; font-family: S&ouml;hne, ui-sans-serif, system-ui, -apple-system, \'Segoe UI\', Roboto, Ubuntu, Cantarell, \'Noto Sans\', sans-serif, \'Helvetica Neue\', Arial, \'Apple Color Emoji\', \'Segoe UI Emoji\', \'Segoe UI Symbol\', \'Noto Color Emoji\'; font-size: 16px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; white-space: pre-wrap; background-color: #ffffff; text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial; display: inline !important; float: none;\">Moral education, also known as character education or values education, is the process of teaching children and adults fundamental moral values, such as honesty, respect, responsibility, integrity, and compassion. The goal of moral education is to develop individuals who are not only academically proficient but also morally upright and socially responsible.</span></p>', ''),
(3, 140, 'Why Chose', 'Why Choose Us', 'And , Build Your Career.', NULL, NULL, '', 'digital-training-center-61711-chose.gif'),
(4, 140, 'Trainer', 'OUR EXPERT TRAINERS', 'Why', NULL, NULL, '<p>Details</p>', ''),
(5, 140, 'Testimonials', 'STUDENTS FEEDBACK', 'Why', NULL, NULL, '<p>fjg</p>', ''),
(6, 140, 'Gallery', 'OUR GALLERY', 'Why', NULL, NULL, '<p>fjg</p>', ''),
(7, 140, 'FAQ', 'Frequently Asked Questions', 'Sub Title', NULL, NULL, '<p><span style=\"color: #0d0d0d; font-family: S&ouml;hne, ui-sans-serif, system-ui, -apple-system, \'Segoe UI\', Roboto, Ubuntu, Cantarell, \'Noto Sans\', sans-serif, \'Helvetica Neue\', Arial, \'Apple Color Emoji\', \'Segoe UI Emoji\', \'Segoe UI Symbol\', \'Noto Color Emoji\'; font-size: 16px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; white-space: pre-wrap; background-color: #ffffff; text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial; display: inline !important; float: none;\">Moral education, also known as character education or values education, is the process of teaching children and adults fundamental moral values, such as honesty, respect, responsibility, integrity, and compassion. The goal of moral education is to develop individuals who are not only academically proficient but also morally upright and socially responsible.</span></p>', 'digital-training-center-817450-faq.png');

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
  `news_title` varchar(500) NOT NULL,
  `news_subtitle` longtext NOT NULL,
  `news_date` date NOT NULL,
  `userPic` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `news_section`
--

INSERT INTO `news_section` (`id`, `user_id`, `news_title`, `news_subtitle`, `news_date`, `userPic`) VALUES
(17, 140, 'ডেটা নির্দেশিকায় পরিবর্তন, কমেছে প্যাকেজ ও মেয়াদ', '<div class=\"news_block\">\r\n                                    \r\n                    <div class=\"tittle_area\">\r\n                        <div class=\"newsdetails_top\">\r\n                            \r\n                            <p><span style=\"font-family: sans-serif; background-color: var(--bs-table-bg); font-size: var(--bs-body-font-size); font-weight: var(--bs-body-font-weight); text-align: var(--bs-body-text-align);\">প্রায় দেড় বছর আগে করা ডেটা নির্দেশিকায় পরিবর্তন-পরিমার্জন এনে নতুন \r\nনির্দেশিকা করেছে নিয়ন্ত্রণ সংস্থাটি। ইতোমধ্যে মোবাইল ফোন অপারেটরদের তা \r\nবাস্তবায়নের নির্দেশনাও দেয়া হয়েছে। নতুন এসব সিদ্ধান্ত অক্টোবর হতে \r\nবাস্তবায়ন করতে হবে।</span></p></div></div></div><div class=\"news_row\"><div class=\"post_details\">\r\n\r\n\r\n\r\n<p>নির্দেশিকায় ২১ টি সিদ্ধান্ত পরিবর্তন-পরিমার্জন বা নতুন করে যুক্ত হয়েছে। যেখানে একটি সিদ্ধান্ত বিলুপ্ত করা হয়েছে।</p><p><span style=\"background-color: var(--bs-table-bg); font-size: var(--bs-body-font-size); font-weight: var(--bs-body-font-weight); text-align: var(--bs-body-text-align);\"> </span><span style=\"background-color: var(--bs-table-bg); font-size: var(--bs-body-font-size); font-weight: var(--bs-body-font-weight); text-align: var(--bs-body-text-align);\">অপারেটর যে প্যাকেজেই দিক না কেনো তার মেয়াদ হবে ৭ দিন, ৩০ দিন এবং \r\nআনলিমিটেড। আগে এটি ছিলো ৩ দিন, ৭ দিন, ১৫ দিন এবং ৩০ দিন। যেখানে ডেটা \r\nভলিউম সংক্রান্ত কিছু নির্দেশনাও ছিল।</span></p>\r\n\r\n\r\n\r\n<p>একটি অপারেটরের নিয়মিত, বিশেষ, রিসার্চ ও ডেভেলমেন্ট, সব ধরনের \r\nব্র্যান্ড (গ্রামীণফোন, স্কিটো, রবি, এয়ারটেল, বাংলালিংক ইত্যাদিসহ যা আছে)\r\n মিলিয়ে প্যাকেজের সংখ্যা হবে ৪০টি। আগে এটি ছিলো ৮৫টি।  </p>\r\n\r\n\r\n\r\n<p>মেয়াদ শেষ হওয়ার আগে একই প্যাকেজ কিনলে ডেটা ক্যারি ফরওয়ার্ড হবে। এতে \r\nএকই ভলিউম এবং একই কন্টেন্টের ৭ বা ৩০ দিন মেয়াদের প্যাকেজ ব্যবহার করার \r\nক্ষেত্রে মেয়াদ শেষ হওয়ার আগেই গ্রাহক ওই প্যাকেজ আবার কিনলে ডেটা ক্যারি \r\nফরওয়ার্ড হবে। ক্যারি ফরওয়ার্ড করা যাবে সর্বোচ্চ ৫০ জিবি ডেটা পর্যন্ত। </p>\r\n\r\n\r\n\r\n<p>কমানো হয়েছে প্রমোশনাল এসএমএসের সংখ্যাও। আগে প্রতিদিন সর্বোচ্চ ৪ টি এসএমএস দিতে পারত অপারে', '2023-09-09', '861086.jpg'),
(18, 140, ' কুমিল্লায় ১৭৫ কোটি টাকায় নলেজ পার্ক', '<p><b>প্রায় ১৭৫ কোটি টাকা</b> ব্যয়ে কুমিল্লা জেলার লালমাই উপজেলার দত্তপুর \r\nমৌজায় ৭.৮৮ একর জায়গায় ‘নলেজ পার্ক’ এর ভিত্তিপ্রস্তর স্থাপন করলেন \r\nঅর্থমন্ত্রী আ হ ম মুস্তফা কামাল ও আইসিটি প্রতিমন্ত্রী <b>জুনাইদ আহমেদ পলক</b>। </p><p>শনিবার <b>নলেজ পার্কের</b> ভিত্তিপ্রস্তর স্থাপন অনুষ্ঠানে আয়োজিত আলোচনা \r\nসভায় প্রধান অতিথির বক্তব্যে অর্থমন্ত্রী আ হ ম মুস্তফা কামাল বলেন, এ \r\nনলেজ পার্কের মাধ্যমে সমগ্র কুমিল্লার ছেলে-মেয়েরা প্রযুক্তির ক্ষেত্র \r\nএগিয়ে যাবে। আমরা সবাই মিলে কুমিল্লাকে এগিয়ে নেবো।</p><p>\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n</p><p>সভাপতির বক্তব্যে আইসিটি প্রতিমন্ত্রী জুনাইদ আহমেদ পলক বলেন, \r\n‘কুমিল্লার অনেক সনামধন্য শিক্ষা প্রতিষ্ঠানে হাজার হাজার শিক্ষার্থী \r\nরয়েছেন। এই তরুণ-তরুনীদেরকে যদি আমরা আমরা আইটিতে দক্ষ মানবসম্পদ হিসেবে \r\nগড়ে তুলতে পারি তাহলে এই অঞ্চলের অর্থনীতির ইকোসিস্টেমে আমূল পরিবর্তন \r\nআসবে।</p><p>তিনি বলেন, ১৫ বছর আগেও দেশের স্বল্প শিক্ষিত তরুণ প্রজন্ম \r\nকর্মসংস্থানের জন্য যেখানে গার্মেন্টসসহ অন্যান্য শ্রমনির্ভর শিল্পের উপর \r\nনির্ভরশীল ছিলো সেখানে বর্তমানে তারা আইটি শিল্পে নিজেদের ক্যারিয়ার গড়ে \r\nতুলছে। এছাড়া স্টার্টআপ এবং ক্ষুদ্র ও মাঝারি প্রতিষ্ঠানগুলোর \r\nইন্ডাস্ট্রিতে প্রবেশের হার বাড়ানো এবং জেন্ডার ইনক্লুসিভ \r\nএন্টারপ্রেনারশিপ তৈরিতে এই নলেজ পার্ক সরাসরি ভূমিকা রাখবে। আগামীর \r\nস্মার্ট বাংলাদেশ হবে বিশ্বের অন্যতম আইটি হাব। </p>\r\n\r\n\r\n\r\n<p>পলক বলেন, বাংলাদেশ থেকেই পরিচালিত হবে বিশ্বের অনেক জায়ান্ট কোম্পানি।\r\n সেগুলোর পরিচালনায় নেতৃত্ব দেবে আমাদের নতুন প্রজন্মের সন্তানেরা। সেই \r\nসময়ের উদ্ভাবনী মেধাসম্পন্ন তরুণ-তরুণীর মেধার বিকাশ ঘটবে আইটি বিজনেস \r\nইনকিউবেটর, ইনোভেশন হাব-এর মতো প্রতিষ্ঠানের মাধ্যমে। শীঘ্রই এই পার্কের \r\nপাশে ‘শেখ কামাল আইটি ট্রেনিং এন্ড ইনকিউবেশন সেন্টার’ এর নির্মাণ কাজ শেষ \r\nহবে। এখানে যে দক্ষ জনবল সৃষ্টি হবে তারাই আবার এই নলেজ পার্কে কাজ করবে। \r\nতখন এই পার্কের জন্য প্রয়োজনীয় দক্ষ মানবসম্পদ পেতে সমস্যা হবে না।</p>\r\n\r\n\r\n\r\n<p>স্বাগত বক্তব্যে বাংলাদেশ হাই-টেক পার্ক কর্তৃপক্ষ এর ব্যবস্থাপনা \r\nপরিচালক (গ্রেড-১) জি এস এম জাফরউল্লাহ্ বলেন, বাংলাদেশ হাই-টেক পার্ক \r\nকর্তৃপক্ষ এর মাধ্যমে বর্তমানে সারা দেশে সরাকারি উদ্যোগে ৯২টি হাই-টেক \r\nপার্ক/সফটওয়্যার টেকনোলজি পার্ক/আইটি ট্রেনিং এন্ড ইনকিউবেশন সেন্টার \r\nস্থাপনের কাজ চলমান রয়েছে, ইতোমধ্যে ১১টি পার্ক স্থাপনের কাজ সমাপ্ত \r\nহয়েছে যেখানে ইতোমধ্যে ব্যবসায়িক কার্যক্রম শুরু হয়েছে। এছাড়া বেসরকারি\r\n উদ্যোগে গঠিত হয়েছে আরো ১৭টি পার্ক। ৪র্থ শিল্প বিপ্লবের প্রতিযোগিতা \r\nমোকাবেলায় বিভিন্ন বিশ্ববিদ্যালয়ে আইওটি, রোবোটিক্স, সাইবার সিকিউরিটির \r\nউচ্চপ্রযুক্তির ৩৩টি বিশেষায়িত ল্যাব স্থাপন করা হয়েছে এবং \r\nবিশ্ববিদ্যালয়গুলোতে আইটি বিজনেস ইনকিউবেটর স্থাপন করা হচ্ছে।</p>\r\n\r\n\r\n\r\n<p>প্রকল্প পরিচালক এ, কে, এ, এম, ফজলুল হক জানান,  এই ‘নলেজ পার্ক’ \r\nস্থাপনের কাজ শেষ হলে এখানে প্রায় ১০০০ জনের কর্মসংস্থানের সুযোগ সৃষ্টি \r\nহবে। এছাড়া প্রকল্পের আওতায় প্রতি বছর ৩০০০ জনকে প্রশিক্ষণ প্রদান করা \r\nহবে।</p>\r\n\r\n\r\n\r\n<p><span style=\"background-color: var(--bs-table-bg); font-size: var(--bs-body-font-size); font-weight: var(--bs-body-font-weight); text-align: var(--bs-body-text-align);\">ভিত্তিপ্রস্তর স্থাপন অনুষ্ঠানে বাংলাদেশ হাই-টেক পার্ক কর্তৃপক্ষ ও স্থানীয় প্রশাসনের অন্যান্য কর্মকর্তারা উপস্থিত ছিলেন।</span> </p>', '2023-09-09', '795722.jpg');

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
-- Table structure for table `parner`
--

CREATE TABLE `parner` (
  `pr_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `pr_name` varchar(200) NOT NULL,
  `pr_details` varchar(200) NOT NULL,
  `userPic` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `parner`
--

INSERT INTO `parner` (`pr_id`, `user_id`, `pr_name`, `pr_details`, `userPic`) VALUES
(3, 140, 'Amazon', '', 'digital-training-center-995456-amazon.jpeg'),
(4, 140, 'Freelancer.com', '', 'digital-training-center-748515-frelancer.png'),
(5, 140, 'Fiverr', '', 'digital-training-center-935679-fiver.jpg'),
(6, 140, 'Upwork', '', 'digital-training-center-354043-upwork.png'),
(8, 140, 'Toptal', 'Na', 'digital-training-center-97189-toptal.png');

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
  `slider_title` varchar(200) NOT NULL,
  `slider_subtitle` varchar(200) NOT NULL,
  `link1` varchar(250) NOT NULL,
  `link2` varchar(250) NOT NULL,
  `userPic` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `slider_section`
--

INSERT INTO `slider_section` (`id`, `user_id`, `slider_title`, `slider_subtitle`, `link1`, `link2`, `userPic`) VALUES
(2, 140, 'Certificate Giving ', 'Certificate Giving ', 'courses', 'courses', 'digital-training-center-352286-banner3.jpg'),
(3, 140, 'Microsoft Office  /  Hardware  /  Graphics Design  /  Web Design ', 'Microsoft Office  /  Hardware  /  Graphics Design  /  Web Design ', '', '', 'digital-training-center-932469-banner2.jpg'),
(9, 140, 'Welcome To Our Training Institute', 'Welcome To Our Training Institute', '', '', 'digital-training-974281-banner12.jpg');

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
(4, 140, 'Awards Achieved', '16', '', 'digital-training-center-570786-digital-training-center-805921-Award.jpg');

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
(140, 'E-Learning and Earning Ltd', 'Management System                                ', '01751891037', 'Digital Training', 'We are Creative. Best IT / Training service company. Get the most of reduction in your team’s operating creates our amazing  experiences.', '500', '01893-280417', 'trainingcenter@gmail.com', 'trainingcenter.com', 'Khaja IT Park, 2nd to 7th Floor, Kallyanpur Bus Stop, Mirpur Road, Dhaka-1207.', 'Thanks For Work With Us', 'upload/training-logo_1710830248.png', 'upload/Samiul_1694185179.jpg', '2022-04-11', 1, 2, 'Trail', 1, 5, 14, 'iss');

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
  `name` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `details` mediumtext NOT NULL,
  `userPic` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `success_student_section`
--

INSERT INTO `success_student_section` (`id`, `user_id`, `name`, `title`, `details`, `userPic`) VALUES
(4, 140, 'Ali Arman Tuha', 'Network Engineer', 'ডিপ্লোমা ইন্ডাস্ট্রিয়াল এটাচমেন্ট-২০২৩ শিক্ষার্থী \"মো:আলী আরমান তোহা\" নেটওয়ার্কিং এর উপর প্ৰশিক্ষণ শেষ করে বর্তমানে হযরত শাহজালাল আন্তজার্তিক বিমানবন্দরে নেটওয়ার্ক ইঞ্জিনিয়ার হিসাবে জব করছেন।', 'digital-training-747227-ali.jpg'),
(5, 140, 'Nazia Akter ', 'Graphic Designer', 'ডিপ্লোমা ইন্ডাস্ট্রিয়াল এটাচমেন্ট-২০২৩ শিক্ষার্থী \"নাজিয়া আক্তার\" গ্রাফিক্স ডিজাইন ও ফ্রিল্যান্সিংয়ের উপর প্ৰশিক্ষণ শেষে বর্তমানে লোকাল ও ফ্রিল্যান্সিং মার্কেটপ্লেসে কাজ করছেন।', 'digital-training-397564-nazia.jpg'),
(6, 140, 'Tasnim Chowdhury Rupa ', 'Graphic Designer', ' ডিপ্লোমা ইন্ডাস্ট্রিয়াল এটাচমেন্ট-২০২৩ শিক্ষার্থী \"তৌহিদা তমা\" গ্রাফিক্স ডিজানের উপর প্ৰশিক্ষণ শেষে বর্তমানে গ্রাফিক্স ডিজাইনার হিসাবে চাকুরী করছেন । ', 'digital-training-622037-tasnim.jpg'),
(7, 140, 'Md. Fizar Mondol ', 'CCTV Engineer', 'ডিপ্লোমা ইন্ডাস্ট্রিয়াল এটাচমেন্ট-২০২৩ শিক্ষার্থী \"মো:ফিজার মন্ডল\" নেটওয়ার্কিং এর উপর প্ৰশিক্ষণ শেষ করে বর্তমানে CCTV(সিসিটিভি) ইঞ্জিনিয়ার হিসাবে জব করছেন।', 'digital-training-592413-fizar.jpg'),
(8, 140, 'রুহেনা', 'ডিজিটাল মার্কেটিং', 'ই-লার্নিং এন্ড আর্নিং লিমিটেড এর ভোলানন্দ উত্তরন কারিগরি প্রশিক্ষন কেন্দ্র,চৌহাট্টা সিলেট এই প্রতিষ্ঠানের ৭ম ব্যাচের একজন শিক্ষার্থী। আমি ডিজিটাল মার্কেটিং কোর্সটি করেছি এখান থেকে। আমি UK থেকে YouTubeএ একটা কাজের মাধ্যমে 140 পাউন্ড যা বাংলাদেশি টাকায় 21000 টাকা ইনকাম করেছি।\r\n', 'digital-training-937226-ruhena.png'),
(9, 140, 'মোঃ ছালিম আহমদ খান', 'ডিজিটাল মার্কেটিং', 'আসসালামুআলাইকুম। Alhamdulillah ক্লাস চলাকালীন সময়েই 20$ এবং 12$ এর একটা কাজ সম্পূর্ণ করলাম । অসংখ্য ধন্যবাদ E-Learning & Earning Institute . কে যাদের অক্লান্ত পরিশ্রমের কারনে আমরা এতো সুন্দর প্রতিষ্ঠান এবং একজন ভালো মেন্টর পেয়েছি। \r\n', 'digital-training-552397-salim-k.png');

-- --------------------------------------------------------

--
-- Table structure for table `teacher_section`
--

CREATE TABLE `teacher_section` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `teacher_title` varchar(255) NOT NULL,
  `teacher_subtitle` varchar(255) NOT NULL,
  `userPic` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teacher_section`
--

INSERT INTO `teacher_section` (`id`, `user_id`, `teacher_title`, `teacher_subtitle`, `userPic`) VALUES
(2, 140, 'SHAHRIAR HASAN', 'EXECUTIVE CUM KOREAN INSTRUCTOR', 'digital-training-center-483633-Shahriar Hasan.JPG'),
(3, 140, 'M. NIAZ RASHID', 'FACULTY OF ENGLISH', 'digital-training-center-971711-M. NIAZ RASHID.JPG');

-- --------------------------------------------------------

--
-- Table structure for table `team_section`
--

CREATE TABLE `team_section` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `team_title` varchar(200) NOT NULL,
  `team_subtitle` varchar(200) NOT NULL,
  `userPic` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `team_section`
--

INSERT INTO `team_section` (`id`, `user_id`, `team_title`, `team_subtitle`, `userPic`) VALUES
(27, 140, 'Shahriar Akmol ', 'Graphics Designer', 'e-learning-and-earning-ltd-551459-akmol.jpeg'),
(28, 140, 'Niaz Mahmud', 'IELTS', 'e-learning-and-earning-ltd-97865-niaz.jpeg'),
(29, 140, 'Likhon Mia', 'Motion Graphics', 'e-learning-and-earning-ltd-387934-likhon-mia.jpeg'),
(30, 140, 'Nishan', 'Digital Marketing', 'e-learning-and-earning-ltd-100872-nisan.jpeg'),
(31, 140, 'Anoy Pal ', 'Digital Marketing', 'e-learning-and-earning-ltd-571168-anoy.jpeg'),
(32, 140, 'MD. Shurov ', 'Microsoft Office', 'e-learning-and-earning-ltd-843099-sourov.jpeg');

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
(2, 140, 'Mahmuda Begum', 'Senior Stuff Nurse', '<div style=\"font-family: Consolas, \" courier=\"\" new\",=\"\" monospace;=\"\" line-height:=\"\" 22px;=\"\" white-space:=\"\" pre;\"=\"\"><div style=\"font-family: Consolas, \"Courier New\", monospace; line-height: 22px; white-space: pre;\">As a pharmacy student, I am grateful for the exceptional education provided by my college. The curriculum blends scientific knowledge with practical skills, equipping me to serve as a trusted healthcare provider. The supportive faculty, cutting-edge facilities, and diverse clinical experiences have prepared me to make a positive impact on patient care.</div></div>', '33621.jpg'),
(3, 140, 'Sabbir Ahmmed', 'Pharmacist BSMMU', '<div style=\"font-family: Consolas, \" courier=\"\" new\",=\"\" monospace;=\"\" line-height:=\"\" 22px;=\"\" white-space:=\"\" pre;\"=\"\"><div style=\"font-family: Consolas, \"Courier New\", monospace; line-height: 22px; white-space: pre;\">Being a pathology student at my college has been an enlightening experience. The comprehensive curriculum, state-of-the-art laboratories, and expert guidance from faculty members have nurtured my passion for understanding disease processes. The collaborative environment and research opportunities have prepared me for a promising career in diagnostic medicine.</div></div>', '747542.jpg'),
(4, 140, 'রুম্মান ফেরদৌস', 'Student', '<div style=\"font-family: Consolas, \" courier=\"\" new\",=\"\" monospace;=\"\" line-height:=\"\" 22px;=\"\" white-space:=\"\" pre;\"=\"\"><div style=\"font-family: Consolas, \" courier=\"\" new\",=\"\" monospace;=\"\" line-height:=\"\" 22px;=\"\" white-space:=\"\" pre;\"=\"\"><font color=\"#232088\" face=\"Open Sans, sans-serif\"><i>আমি সোশ্যাল পলিটেকনিক ইনস্টিটিউট, ঠাকুরগাঁও জেলা থেকে \"ই-লার্নিং এন্ড আর্নিং লিমিটেড\" এ ইন্ডাস্ট্রিয়াল এটাচমেন্ট শেষ করেছি। এটি শুধুমাত্র ইন্ডাস্ট্রিয়াল এটাচমেন্ট এর জন্যই নয়, এটি দেশের সর্ববৃহৎ আইটি এন্ড ল্যাক্সগুয়েজ পার্ক । ধন্যবাদ সবাইকে।&nbsp;</i></font><br></div></div>', '186360.jpg'),
(7, 140, 'মো: শামিম হাসান', 'Student', '<p>আগে ইচ্ছে থাকলেও এমন ভাবে করতে পারতাম না এই প্রশিক্ষনটি দিয়ে ইনশাআল্লাহ \r\nঅনেক কিছু শিখতে পারছি এবং ইনকাম করতে পারছি। লোকাল মার্কেট থেকে ফেসবুক \r\nপেজ এর এড চালিয়ে আমি মাসে অনুমানিক ১৫ থেকে ২০ হাজার টাকা উপার্যন করছি \r\nঘরে বসে।<br></p>', 'digital-training-center-610679-jpg');

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
  `sub_title` mediumtext NOT NULL,
  `why_icon` varchar(150) NOT NULL,
  `userPic` varchar(255) NOT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `why_section`
--

INSERT INTO `why_section` (`id`, `user_id`, `title`, `sub_title`, `why_icon`, `userPic`, `date`) VALUES
(1, 140, 'Best Training Center', 'Best Training Center', 'fa fa-certificate', '0', NULL),
(2, 140, 'Available Office & Training Space', 'Best Training Center', 'fa fa-certificate', '0', NULL),
(3, 140, 'Practice Lab Support', 'Best Training Center', 'fa fa-certificate', '0', NULL),
(4, 140, 'Skilled Trainer And Supporting', 'Best Training Center', 'fa fa-certificate', '0', NULL),
(5, 140, 'Review Class', 'Best Training Center', 'fa fa-certificate', '0', NULL),
(6, 140, 'Job Placement Facility', 'Best Training Center', 'fa fa-certificate', '0', NULL);

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
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `parner`
--
ALTER TABLE `parner`
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
-- AUTO_INCREMENT for table `blog_section`
--
ALTER TABLE `blog_section`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `board`
--
ALTER TABLE `board`
  MODIFY `brd_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `branch`
--
ALTER TABLE `branch`
  MODIFY `br_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

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
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `contact_info`
--
ALTER TABLE `contact_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `course_apply`
--
ALTER TABLE `course_apply`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `course_category`
--
ALTER TABLE `course_category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `gallery_image`
--
ALTER TABLE `gallery_image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

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
  MODIFY `ms_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `month`
--
ALTER TABLE `month`
  MODIFY `mnt_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `news_section`
--
ALTER TABLE `news_section`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

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
-- AUTO_INCREMENT for table `parner`
--
ALTER TABLE `parner`
  MODIFY `pr_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `social_media`
--
ALTER TABLE `social_media`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `stats`
--
ALTER TABLE `stats`
  MODIFY `st_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=124;

--
-- AUTO_INCREMENT for table `stuff_details`
--
ALTER TABLE `stuff_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `success_student_section`
--
ALTER TABLE `success_student_section`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `teacher_section`
--
ALTER TABLE `teacher_section`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `team_section`
--
ALTER TABLE `team_section`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `testimonial`
--
ALTER TABLE `testimonial`
  MODIFY `ts_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `year_name`
--
ALTER TABLE `year_name`
  MODIFY `yer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
