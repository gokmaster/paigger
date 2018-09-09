-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 14, 2018 at 10:13 AM
-- Server version: 5.7.14
-- PHP Version: 7.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `paigger_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `page`
--

CREATE TABLE `page` (
  `pageid` int(11) NOT NULL,
  `content` longtext NOT NULL,
  `page_title` varchar(99) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `page_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `audience` varchar(60) NOT NULL DEFAULT 'only me',
  `likes` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `page`
--

INSERT INTO `page` (`pageid`, `content`, `page_title`, `user_id`, `page_date`, `audience`, `likes`) VALUES
(217, '\n		\n		\n		\n		<p>\n				\n			</p><div class="pageimage_container alignCenter" contenteditable="false"><img class="pageimage" alt="page-image" src="image/image_uploads/290705510_8975_Capture.JPG" id="img1330422n4463515" style="width: 650px;"></div> <div class="pageimage_container alignCenter" contenteditable="false"><img class="pageimage" alt="page-image" src="image/image_uploads/817961200_7427_Cavpture.JPG" id="img516695n5470462" style="width: 660px;"></div><br>Source: <i>Multidisciplinary Social Networks Research: International Conference, MISNC ... edited by Leon Shyue-Liang Wang, Jason J. Jung, Chung-Hong Lee, Koji Okuhara, Hs<br><br>https://books.google.com.fj/books?id=X-GCBAAAQBAJ&amp;pg=PA216&amp;dq=hits+algorithm&amp;hl=en&amp;sa=X&amp;redir_esc=y#v=onepage&amp;q=hits%20algorithm&amp;f=false<br></i><div id="volume-info-sidebar"><br><span class="addmd"></span><br></div> <p></p>\n	\n	', 'HITS Algorithm', 58, '2017-04-23 10:14:39', 'public', 0),
(219, '\n		\n		\n		\n		\n	Learning to Rank for Information Retrieval&nbsp;&nbsp; <br>by Liu, Tie-Yan <br><ul><li>page 9</li></ul><p><a href="https://books.google.com.fj/books?hl=en&amp;lr=&amp;id=XlMBNwE0xDMC&amp;oi=fnd&amp;pg=PR5&amp;dq=Liu+T.Y.+(2011),+Learning+to+Rank+for+Information+Retrieval.+Berlin.+Heidelberg:+Springer&amp;ots=xA9k8qaKWP&amp;sig=cfQ26GVi2bAkeh1OpqQ-m_KLJCc&amp;redir_esc=y#v=snippet&amp;q=importance%20ranking&amp;f=false" target="_blank">google book link</a> <br></p>\n	', 'TrustRank', 58, '2017-04-25 14:29:00', 'public', 0),
(230, '\n		\n		<a href="http://www.sitepoint.com/forums/showthread.php?653443-Inverted-index-in-a-search-engine" target="_blank">Inverted index in a search engine&nbsp; </a> <br><a href="https://bytes.com/topic/mysql/answers/933632-inverted-index-postings-lists-linked-lists" target="_blank">inverted index, postings lists, and linked lists</a> &nbsp;<br><p><a href="https://www.google.com/patents/US7149748" target="_blank">Expanded inverted index</a> <br></p>\n	\n	', 'Inverted Index', 61, '2017-06-10 05:45:35', '15', 0),
(220, '\n		\n		\n		\n		<a href="http://www.evoluted.net/thinktank/web-development/paypal-php-integration" target="_blank">Check this link for complete tutorial</a> &nbsp;<br>\n	\n	', 'How to Set Up PayPal Integration with PHP & MySQL', 61, '2017-05-09 14:11:51', '14', 0),
(77, '\n	\n	\nAdSense is a free, simple way to earn money by placing ads on your website. All you do is copy some code into your site to display the ads, and you earn every time someone clicks on those ads. You may also earn from impressions in some cases. The amount you earn per click varies; usually it ranges from US $0.02 to US $3 per click.<h3>How to get Adsense Approval for your Website or Blog?</h3>\nWhile there are many other advertising networks out there, Adsense offers the best paying rates out of all the other networks, which is why it is so popular among bloggers and webmasters. But getting Adsense approval is not an easy task. I have heard many bloggers and webmasters who have had their Adsense application rejected.<br><br><b>Tip 1: Write Good Quality Content\n\n</b><br>To have good quality content, try to create a website/blog on something that you know a lot about or have an expertise in. This would allow you to write better articles that would give value to readers or users. Also, make sure that the content is well-written and there are no grammatical mistakes. If the content is poorly written with grammatical errors, Google will reject it straight away.\n<br><br><b>Tip 2: Well-designed Page\n</b><br>\nA well-designed page is one which is easy to read and navigate. What would you do if you come to a page that has a black background with dark purple text on it and buttons scattered all over the page? You would most likely go away from that page, won\'t you?\n\nTry to choose contrasting colours for background and text (such as black text over white background). Have proper navigation menus or links; for example, a top menu bar containing links to essential pages of your website such as the Home page.\n<br><br><b>Tip 3: Ensure there is a Privacy Policy, About Us, and Contact Us page</b>\n<br>\nWhen reviewing your application, Google will check for the following pages: Privacy Policy, About Us, and Contact Us pages. So ensure your website or blog has those pages, otherwise Google may reject your application.\n<br><br><b>Tip 4: Site must Not contain content prohibited by Google\'s Policies\n\n</b><br>There certain content that Google prohibits for Adsense publishers. The following checkpoints lists some types of content prohibited by Google\'s policies:\n<br><ol><li>Pornography or Adult-content&nbsp;<br></li><li>Gambling&nbsp;<br></li><li>Contents relating to illegal activities, violence or racial intolerance&nbsp;<br></li><li>Counterfeit goods&nbsp;<br></li><li>Copyrighted material&nbsp;<br></li></ol>\n\n<p></p>', 'What is Adsense?', 61, '2016-06-23 09:10:59', 'public', 0),
(279, '\n		\n		<p>\n				\n			<a href="http://neevek.net/posts/2013/10/13/implementing-onInterceptTouchEvent-and-onTouchEvent-for-ViewGroup.html" target="_blank">Correctly implementing onInterceptTouchEvent and onTouchEvent methods for ViewGroup</a> </p>\n	<p><a href="https://stackoverflow.com/questions/27346030/detect-when-user-swipes-the-viewpager-from-edge-of-a-page" target="_blank">Detect when user swipes the viewpager from edge of a page</a> <br></p><p></p>', 'Android: onInterceptTouchEvent ', 58, '2017-10-25 15:14:32', '14', 0),
(202, '<div><br></div><div><p class="qtext_para" style="margin: 0px 0px 1em; padding: 0px; color: rgb(51, 51, 51); font-family: q_serif, Georgia, Times, &quot;Times New Roman&quot;, serif; font-size: 15px; text-align: start;">Amazon Uses A3 Algorithm to rank products in their search results. There are several ranking factors which are behind it. Some of the most important factors are as below</p><p class="qtext_para" style="margin: 0px 0px 1em; padding: 0px; color: rgb(51, 51, 51); font-family: q_serif, Georgia, Times, &quot;Times New Roman&quot;, serif; font-size: 15px; text-align: start;"><b>a) Keyword Match type</b></p><p class="qtext_para" style="margin: 0px 0px 1em; padding: 0px; color: rgb(51, 51, 51); font-family: q_serif, Georgia, Times, &quot;Times New Roman&quot;, serif; font-size: 15px; text-align: start;">Does your product contain keywords which people are searching for?</p><p class="qtext_para" style="margin: 0px 0px 1em; padding: 0px; color: rgb(51, 51, 51); font-family: q_serif, Georgia, Times, &quot;Times New Roman&quot;, serif; font-size: 15px; text-align: start;"><b>b) Product Popularity</b></p><p class="qtext_para" style="margin: 0px 0px 1em; padding: 0px; color: rgb(51, 51, 51); font-family: q_serif, Georgia, Times, &quot;Times New Roman&quot;, serif; font-size: 15px; text-align: start;">This is an important factor behind ranking on Amazon. This show how many people are buying for the product against any specific keyword.</p><p class="qtext_para" style="margin: 0px 0px 1em; padding: 0px; color: rgb(51, 51, 51); font-family: q_serif, Georgia, Times, &quot;Times New Roman&quot;, serif; font-size: 15px; text-align: start;"><b>c) No of reviews</b></p><p class="qtext_para" style="margin: 0px 0px 1em; padding: 0px; color: rgb(51, 51, 51); font-family: q_serif, Georgia, Times, &quot;Times New Roman&quot;, serif; font-size: 15px; text-align: start;">Higher the no higher the chances of ranking and getting more sales.</p><p class="qtext_para" style="margin: 0px 0px 1em; padding: 0px; color: rgb(51, 51, 51); font-family: q_serif, Georgia, Times, &quot;Times New Roman&quot;, serif; font-size: 15px; text-align: start;"><b>d) Quality of reviews</b></p><p class="qtext_para" style="margin: 0px 0px 1em; padding: 0px; color: rgb(51, 51, 51); font-family: q_serif, Georgia, Times, &quot;Times New Roman&quot;, serif; font-size: 15px; text-align: start;">Good rating leads towards higher sales.</p><p class="qtext_para" style="margin: 0px 0px 1em; padding: 0px; color: rgb(51, 51, 51); font-family: q_serif, Georgia, Times, &quot;Times New Roman&quot;, serif; font-size: 15px; text-align: start;"><b>e) Category</b></p><p class="qtext_para" style="margin: 0px 0px 1em; padding: 0px; color: rgb(51, 51, 51); font-family: q_serif, Georgia, Times, &quot;Times New Roman&quot;, serif; font-size: 15px; text-align: start;">The relevant category or correct category means higher chances of ranking.</p><p class="qtext_para" style="margin: 0px 0px 1em; padding: 0px; color: rgb(51, 51, 51); font-family: q_serif, Georgia, Times, &quot;Times New Roman&quot;, serif; font-size: 15px; text-align: start;"><b>f) Best seller rank</b></p><p class="qtext_para" style="margin: 0px 0px 1em; padding: 0px; color: rgb(51, 51, 51); font-family: q_serif, Georgia, Times, &quot;Times New Roman&quot;, serif; font-size: 15px; text-align: start;"><b>g) Product Title</b></p><p class="qtext_para" style="margin: 0px 0px 1em; padding: 0px; color: rgb(51, 51, 51); font-family: q_serif, Georgia, Times, &quot;Times New Roman&quot;, serif; font-size: 15px; text-align: start;">This is an important factors. Using relevant keywords means higher ranking and higher sales.</p><p class="qtext_para" style="margin: 0px 0px 1em; padding: 0px; color: rgb(51, 51, 51); font-family: q_serif, Georgia, Times, &quot;Times New Roman&quot;, serif; font-size: 15px; text-align: start;"><b>h) Product description</b></p><p class="qtext_para" style="margin: 0px 0px 1em; padding: 0px; color: rgb(51, 51, 51); font-family: q_serif, Georgia, Times, &quot;Times New Roman&quot;, serif; font-size: 15px; text-align: start;">Catchy and informative description leads towards higher conversion which means higher ranking.</p><p class="qtext_para" style="margin: 0px 0px 1em; padding: 0px; color: rgb(51, 51, 51); font-family: q_serif, Georgia, Times, &quot;Times New Roman&quot;, serif; font-size: 15px; text-align: start;"><b>i) Product Images</b></p><p class="qtext_para" style="margin: 0px 0px 1em; padding: 0px; color: rgb(51, 51, 51); font-family: q_serif, Georgia, Times, &quot;Times New Roman&quot;, serif; font-size: 15px; text-align: start;">These are some of the ranking factors which Amazon considers.</p><p class="qtext_para" style="margin: 0px 0px 1em; padding: 0px; color: rgb(51, 51, 51); font-family: q_serif, Georgia, Times, &quot;Times New Roman&quot;, serif; font-size: 15px; text-align: start;"><br></p></div><p></p>', 'How Amazon Ranks Search Results?', 58, '2017-02-02 05:23:58', '15', 0),
(201, '\n		\n		<p><div class="pageimage_container alignCenter" contenteditable="false"><img class="pageimage" alt="page-image" src="image/image_uploads/217093725_7260_Capture.JPG" id="img628161n8689533" style="width: 700px;"></div> <div class="pageimage_container alignCenter" contenteditable="false"><img class="pageimage" alt="page-image" src="image/image_uploads/1953148379_3488_Capture2.JPG" id="img1665380n6293940" style="width: 710px;"></div><i> Source: Web Information Retrieval By Stefano Ceri, Alessandro Bozzon, Marco Brambilla, Emanuele Della Valle, Piero Fraternali, Silvia Quarteroni</i><br></p>\n	<p></p>', 'Defining Relevance in Information Retrieval', 58, '2017-01-30 01:36:04', '15', 0),
(221, '\n		\n		\n		\n		<p>\n				\n			<a href="https://books.google.com.fj/books?id=X-GCBAAAQBAJ&amp;pg=PA216&amp;dq=hits+algorithm&amp;hl=en&amp;sa=X&amp;redir_esc=y#v=onepage&amp;q=hits%20algorithm&amp;f=false" target="_blank">Multidisciplinary Social Networks Research: International Conference, MISNC</a> </p><hr><p><a href="http://jaygrossman.com/post/2013/06/10/Predicting-eBay-Auction-Sales-with-Machine-Learning.aspx" target="_blank">Predicting eBay Auction Sales with Machine Learning</a> <br></p>\n	\n	', 'Important references for thesis', 58, '2017-05-11 17:25:58', '15', 0),
(222, '\n		\n		\n		\n		<p>\n				\n			<a href="http://orion.lcg.ufrj.br/Dr.Dobbs/books/book5/chap14.htm" target="_blank">RANKING MODELS AND EXPERIMENTS WITH THESE MODELS</a> </p>\n	\n	<ul><li>Vector space models</li><li>Probalistic models <br></li></ul><p><a href="https://www.duo.uio.no/handle/10852/10761" target="_blank">Information Retrieval Models and Relevancy Ranking</a> <br></p><p><br></p><p><a href="https://link.springer.com/chapter/10.1007/978-3-642-17187-1_1" target="_blank">Relevance Ranking Using Kernels</a> <br></p><ul><li>bag-of-words assumption</li><li>term dependency<br></li></ul><p></p>', 'Ranking Models', 61, '2017-05-31 15:03:26', '15', 0),
(260, '\n		\n		<p><a href="https://www.acunetix.com/websitesecurity/upload-forms-threat/" target="_blank">Why File Upload Forms are a Major Security Threat</a> <br></p>\n	<p><a href="http://www.computerweekly.com/answer/File-upload-security-best-practices-Block-a-malicious-file-upload" target="_blank">File upload security best practices: Block a malicious file upload</a> </p><p><a href="https://paragonie.com/blog/2015/10/how-securely-allow-users-upload-files" target="_blank">How to Securely Allow Users to Upload Files </a> <br></p>', 'File Upload Security Tips', 58, '2017-06-27 05:26:29', '14', 0),
(218, '\n		\n		<p><a href="http://stackoverflow.com/questions/32717824/notification-system-using-php-and-mysql" target="_blank">Example from stackoverflow</a> <br></p>\n	', 'Notification system using php and mysql', 58, '2017-04-24 06:54:58', '14', 0),
(231, '\n		\n		<a href="http://www.vertabelo.com/blog/technical-articles/looking-for-a-simple-full-text-search-try-mysql-innodb-cakephp-with-word-stemming" target="_blank">Full-Text Search? Try MySQL InnoDB + CakePHP with Word Stemming</a> &nbsp;\n	\n	', 'Full-Text Search? Try MySQL InnoDB + CakePHP with Word Stemming ', 61, '2017-06-15 15:21:04', '15', 0),
(232, '\n		\n		\n	<p><a href="https://link.springer.com/chapter/10.1007/3-540-36618-0_15" target="_blank">Term Proximity Scoring for Keyword-Based Retrieval Systems</a> </p><p><a href="http://dl.acm.org/citation.cfm?id=1148285" target="_blank">Term proximity scoring for ad-hoc retrieval on very large text collections</a> </p><p><a href="http://ilpubs.stanford.edu:8090/321/" target="_blank">Proximity search in databases</a> <br></p>', 'Term Proximity Scoring', 61, '2017-06-16 15:51:10', '15', 0),
(276, '\n		\n		<p>\n				\n			<a href="https://stackoverflow.com/questions/16630296/php-resize-depending-of-image-resolution" target="_blank">PHP - resize depending of image resolution</a> </p>\n	', 'PHP - resize depending of image resolution', 58, '2017-10-18 04:49:27', '14', 0),
(261, '\n		\n		<p><a href="https://stackoverflow.com/questions/43951871/allowing-video-to-be-played-in-video-element-from-my-website-but-not-allowing" target="_blank">Allowing video to be played in  element from my website, but not allowing it through direct link</a> <br></p>\n	<p><a href="https://stackoverflow.com/questions/2679524/block-direct-access-to-a-file-over-http-but-allow-php-script-access" target="_blank">Block direct access to a file over http but allow php script access</a> </p>', 'Block direct access to a file over http but allow php script access', 58, '2017-06-27 13:57:25', '14', 0),
(257, '\n		\n		<p>\n				\n			<a href="http://people.mpi-inf.mpg.de/~mtb/pub/proximity-spire07.pdf" target="_blank">Efficient Text Proximity Search</a> </p>\n	', 'Proximity Search', 58, '2017-06-24 15:09:25', '15', 0),
(255, '\n		\n		<p>\n				\n			<a href="https://www.quora.com/Information-Retrieval-What-is-inverted-index" target="_blank">quora</a> </p><p><a href="http://www.ardendertat.com/2011/05/30/how-to-implement-a-search-engine-part-1-create-index/" target="_blank">How to Implement a Search Engine Part 1: Create Index</a> <br></p>\n	', 'Inverted index', 58, '2017-06-24 14:33:47', '15', 0),
(256, '\n		\n		\n		\n		\n		\n		\n		\n		\n		\n		<ul><li>\n				\n			<a href="https://www.google.com/patents/US20090063304" target="_blank">System and method for searching, identifying, and ranking merchants based upon preselected criteria such as social values</a> </li><li><a href="https://www.google.com/patents/US7099859" target="_blank">System and method for integrating off-line ratings of businesses with search engines</a></li><li><a href="https://www.google.com/patents/US6327590" target="_blank">System and method for collaborative ranking of search results employing user and group profiles derived from document collection content analysis</a> <br></li><li><a href="https://www.google.com/patents/US20070294127" target="_blank">System and method for ranking and recommending products or services by parsing natural-language text and converting it into numerical scores</a></li></ul><h3>Ebay<br></h3><ul><li><a href="https://www.google.com/patents/US20070294127" target="_blank"></a><a href="https://www.google.com/patents/US8065199" target="_blank">Method, medium, and system for adjusting product ranking scores based on an adjustment factor</a><br></li></ul>\n	\n	\n	\n	<blockquote><p class="styled_quote">If a preference is given to one seller, such that the one seller\'s item \nlistings are consistently being presented in the most prominent \nposition(s) on a search results page, other sellers may not participate,\n which will ultimately have a negative impact on the enterprise. \nSimilarly, if item listings are presented in accordance with an \nalgorithm that is too rigid and that cannot easily be altered or \ntweaked, such as a first-listed first-presented algorithm, some sellers \nmay attempt to game the system, again negatively impacting other \nsellers, the potential buyers\' experience, and ultimately the enterprise\n itself. Furthermore, using a simple and rigid algorithm for presenting \nitem listings prevents the enterprise from optimizing the presentation \nof item listings to improve the overall conversion rate for item \nlistings. This may lead potential buyers to shop elsewhere, which \nultimately will negatively affect the e-commerce enterprise.</p></blockquote>\n	', 'Merchant ranking', 58, '2017-06-24 15:03:28', '15', 0),
(190, '\n		\n		<div class="pageimage_container alignCenter" contenteditable="false"><img class="pageimage" alt="page-image" src="image/image_uploads/377643108_768_timed_pagerank.jpg" id="img326167n2784023" style="width: 630px;"></div> &nbsp;<div class="pageimage_container alignCenter" contenteditable="false"><img class="pageimage" alt="page-image" src="image/image_uploads/2053275687_9458_timed_pagerank2.jpg" id="img672241n3262685" style="width: 640px;"></div> &nbsp;<div class="pageimage_container alignCenter" contenteditable="false"><img class="pageimage" alt="page-image" src="image/image_uploads/1335752921_9164_timed_pagerank3.jpg" id="img197314n3947256" style="width: 640px;"></div> &nbsp;<div class="pageimage_container alignCenter" contenteditable="false"><img class="pageimage" alt="page-image" src="image/image_uploads/1872398421_9022_timed_pagerank4.jpg" id="img1764384n2190121" style="width: 640px;"></div>&nbsp; <br><i>Source: </i><i><i>Bing Liu, </i>Web Data Mining: Exploring Hyperlinks, Contents, and Usage Data </i><br>\n	<p></p>', 'Timed PageRank', 58, '2017-01-24 13:58:46', 'public', 0),
(290, '\n		\n		<p>\n				\n			<a href="http://www.vogella.com/tutorials/AndroidServices/article.html" target="_blank">Android Services - Tutorial</a> </p>\n	', 'Android Services', 58, '2017-11-03 17:04:50', '14', 0),
(291, '\n		\n		<p>\n				\n			<a href="https://stackoverflow.com/questions/41430796/difference-between-uri-and-bitmap-image" target="_blank">https://stackoverflow.com/questions/41430796/difference-between-uri-and-bitmap-image</a> </p>\n	', 'Difference between URI and Bitmap image', 58, '2017-11-18 15:43:07', '14', 0),
(292, '\n		\n		<p>\n				\n			<a href="https://www.simplifiedcoding.net/android-upload-image-to-server/" target="_blank">Android Upload Image using Android Upload Service</a> </p>\n	', 'Android Upload', 58, '2017-12-11 14:54:41', '14', 0),
(301, '\n		\n		<p>\n				 <br></p><p><div class="page_video_container" contenteditable="false"><iframe class="page_video" src="https://www.youtube.com/embed/bhQnZ21hynk"></iframe></div><br></p>\n	', 'Antminer L3+ Nicehash setup ', 58, '2018-02-07 03:59:23', '15', 0),
(302, '\n		\n		<p>\n				\n			<a href="https://github.com/ccxt/ccxt/wiki/Manual#markets" target="_blank">ccxt</a> </p>\n	<p><a href="https://www.cryptonator.com/api" target="_blank">cryptonator.com</a> </p><p></p>', 'Crypto API', 58, '2018-02-26 13:57:41', '14', 0),
(198, '\n		\n		\n		\n		<p></p><div class="pageimage_container alignCenter" contenteditable="false"><img class="pageimage" alt="page-image" src="image/image_uploads/1905592621_8374_Capture22.JPG" id="img876758n3407856" style="width: 720px;"></div> <div class="pageimage_container alignCenter" contenteditable="false"><img class="pageimage" alt="page-image" src="image/image_uploads/1631462836_5128_Capture33.JPG" id="img1582751n1172498" style="width: 720px;"></div> <div class="pageimage_container alignCenter" contenteditable="false"><img class="pageimage" alt="page-image" src="image/image_uploads/385054082_7815_bb.JPG" id="img1390080n5741154" style="width: 720px;"></div> <div class="pageimage_container alignCenter" contenteditable="false"><img class="pageimage" alt="page-image" src="image/image_uploads/464430784_8719_cc.JPG" id="img79187n3430338" style="width: 720px;"></div> <div class="pageimage_container alignCenter" contenteditable="false"><img class="pageimage" alt="page-image" src="image/image_uploads/1462149043_3858_zz.JPG" id="img1862978n945028" style="width: 720px;"></div>  <i>Source: Advances in Computer Vision and Information Technology By K. V. Kale</i><br><p></p>\n	\n	', 'Web Structure Mining', 58, '2017-01-29 05:46:31', '15', 0),
(199, '\n		\n		<p>\n				\n			<div class="pageimage_container alignCenter" contenteditable="false"><img class="pageimage" alt="page-image" src="image/image_uploads/1592300470_8837_Capture.JPG" id="img1074744n4078658" style="width: 640px;"></div><i> Source: Web Intelligence By Ning Zhong, Jiming Liu, Yiyu Yao</i></p>\n	<p></p>', 'Web Structure Mining', 58, '2017-01-29 07:56:48', '15', 0),
(200, '\n		\n		\n		\n		<p></p><div class="pageimage_container alignCenter" contenteditable="false"><img class="pageimage" alt="page-image" src="image/image_uploads/1740271457_8250_ir.JPG" id="img925991n6723519" style="width: 670px;"></div> <i>Source: Web Information Retrieval By Stefano Ceri, Alessandro Bozzon, Marco Brambilla, Emanuele Della Valle, Piero Fraternali, Silvia Quarteroni</i><br><p></p>\n	\n	', 'Information Retrieval', 58, '2017-01-29 09:30:28', '15', 0),
(203, '\n		\n		\n	<h3>&nbsp;Web mining and its relation to search engines</h3><p><div class="pageimage_container alignCenter" contenteditable="false"><img class="pageimage" alt="page-image" src="image/image_uploads/442409077_4995_web.JPG" id="img675678n8721339" style="width: 630px;"></div><i> Source: Web Mining: Applications and Techniques edited by Anthony Scime</i></p><p></p>', 'Web mining', 58, '2017-02-07 13:23:48', '15', 0),
(204, '\n		\n		\n	<p><span class="inline_editor_value"><span class="rendered_qtext"><p class="qtext_para">We\n all know for SEO â€œGoogleâ€is the search engine. But apart from this \nthere are many other renowned websites for example â€œ Amazonâ€ that have \ntheir own search engines inside them.</p><p class="qtext_para">Amazon is an online retail monster having over 200 million products. To rank well in Amzon <b>BSR Marketing offers complete marketing solutions to help launch and rank your products. Read here &gt;&gt; </b><span class="qlink_container"><a href="https://bsrmarketing.com/amazon-consulting-services/" rel="noopener nofollow" target="_blank" class="external_link" data-qt-tooltip="bsrmarketing.com" data-tooltip="attached"><b>Amazon Consulting Services - Our Process | BSR Marketing</b></a></span></p><p class="qtext_para"><b>The Amazon Algorithm</b></p><p class="qtext_para">Amazonâ€™s\n search engine algorithm has a name, and it\'s called A9. Started in 2003\n as a subsidiary of Amazon, A9 was tasked with the sole responsibility \nof creating a better user experience by placing the right products in \nfront of the right customers.</p></span></span><span class="inline_editor_value"><span class="rendered_qtext"><div class="qtext_image_wrapper"><img class="landscape qtext_image zoomable_in_feed lazy_loaded lazy_loading" src="https://qph.ec.quoracdn.net/main-qimg-bafa82b1cee2e09c24bf951c15aee129-c" style="opacity: 1;"></div><p class="qtext_para">Like Google, A9 works to find the right pages using specific on-page and off-page data in order to build their own SERPs.</p><p class="qtext_para">However,\n there are major differences between Googleâ€™s algorithm and Amazonâ€™s A9.\n Unlike Google, Amazonâ€™s definition of success isnâ€™t to send traffic to \nother sites, but to find the product that will provide the best sales \nconversion.</p><p class="qtext_para">So, to help you understand a little\n more about A9 and optimization for amazon sales pages, weâ€™ll discuss \nthe 5 major variables that A9 uses when creating their rankings.</p></span></span><span class="inline_editor_value"><span class="rendered_qtext"><div class="qtext_image_wrapper"><img class="landscape qtext_image zoomable_in zoomable_in_feed lazy_loaded lazy_loading" src="https://qph.ec.quoracdn.net/main-qimg-6253f58e8a2766f02e6e45fec5ad739a-c" style="opacity: 1;"></div><p class="qtext_para">Amazon also doesnâ€™t go out of their way to hide their ranking factors. They <span class="qlink_container"><a href="http://services.amazon.com/blog" rel="noopener nofollow" target="_blank" class="external_link" data-qt-tooltip="amazon.com">want you to know them</a></span>,\n so you can optimize your product listings to sell more, because the \nmore you sell, the more they make. Here are the most potent:</p><ul><li>Sales Rank â€“ Primarily, the <span class="qlink_container"><a href="http://growtraffic.com/blog/2015/02/ultimate-guide-getting-sales-amazon-store" rel="noopener nofollow" target="_blank" class="external_link" data-qt-tooltip="growtraffic.com">sheer number of sales</a></span> a product has on the site. The more copies of an item youâ€™ve sold, the higher your product is going to rank.</li><li>Reviews â€“ Particularly good reviews. A higher average star rating across a larger number of reviews means a higher rank.</li><li>Questions\n Answered â€“ Amazon has a process whereby users can ask questions about a\n product if they donâ€™t find the answer in the product listing or in \nreviews. The more answered questions a product has, the better off the \nproduct will be.</li><li>Image Quality â€“ Buyers like to see a product in\n as much detail as possible before buying. High definition, high quality\n images help sell products. Always make sure you have at least one image\n of at least 1000Ã—1000 pixels in size. This allows users to zoom in on \nit.</li><li>Price â€“ Obviously enough, a product priced reasonably is \ngoing to show up higher ranked, particularly if the user changes their \nsearch to search by price rather than most relevant. However, extremely \nlow prices are suspicious, so donâ€™t dramatically undercut the \ncompetition.</li><li>Child Products â€“ When you go to something like a \nKindle case and see 20 different color and pattern options, those are \nall child options of the parent case. Color options, size options, \nformats in the case of movies, and so forth â€“ these are all child \noptions. Use these rather than making multiple listings, so you can \naggregate traffic, reviews, sales, and all the rest around one listing.</li></ul><p class="qtext_para">However,\n we product placers do not have as much control on a product page as we \ndo on our blogs. Therefore, where you can place content and how you \nstructure it for Amazon is even more important than for Google.</p><p class="qtext_para">For an Amazon page, he have seven areas in which we can place our keywords to include:</p><ol><li>Page title</li><li>Subtitle</li><li>Product description</li><li>Editorial review</li><li>Product picture file name</li><li>Name of author, editor, etc (Publishing onlyâ€¦Also, donâ€™t recommend keyword stuffing here)</li><li>Last but not least, Amazonâ€™s own â€˜specialâ€™ keywords</li></ol></span></span><span class="inline_editor_value"><span class="rendered_qtext"><div class="qtext_image_wrapper"><img class="landscape qtext_image zoomable_in zoomable_in_feed lazy_loaded lazy_loading" src="https://qph.ec.quoracdn.net/main-qimg-ecefbae987ee80d7d574d64eb88066ac" style="opacity: 1;"></div><p class="qtext_para"><b>Conclusion</b></p><p class="qtext_para">As\n you can see, Amazon is one of the more important search engines to rank\n for. Simply put, ranking higher in a keyword SERP on Amazon equates to \nmore sales, not just clicks.</p></span></span></p><p></p>', 'Amazon\'s A9 algorithm', 58, '2017-02-08 03:22:13', '15', 0),
(209, '\n		\n		\n	<p>In this guide, I would be showing you how to connect a 3G USB modem to \nyour router and configure your router to use the 3G USB modem. \n			The USB modem I would be using in this tutorial is Connect Nomad512 \nprovided by Connect Fiji and the router I would be using is EnGenius \nESR6650 router. <br></p><h3>Step 1</h3>\n			<p>Connect the 3G USB modem to the router via the USB port on the router.</p><h3>Step 2</h3>\n			<p>Go to your router\'s configuration page by typing something like \n192.168.0.1 in the address bar of your browser\n			(Note: your router may have a different address so check the manual \nfor your router). Then login using your username and password \n			(the default username and password is usually "admin" (without \nquotes) for for both, some have "user" (without quotes) as the default \nusername and password).</p>\n			\n			\n			<h3>Step 3</h3>\n			<p>This step would vary depending on the router and USB modem you are\n using. I\'m using EnGenious ESR6650 router so the place to enter the \nconfiguration details for the 3G USB modem is\n			located at Internet--&gt;3G. </p>\n			<p>The main fields you need to fill in are: APN Code, Dial Number, \nUsername, and Password. This details you can get from your Internet \nService Provider.</p>\n			<p>Now if you using Connect Nomad like me, then the APN Code is \nConnect, the Dial Number is #777, Username is xxxx@connectmobile.com.fj \n(for Nomad512) or xxxx@connect.com.fj (for Nomad128) where xxxx is the \nusername you get from your ISP, and Password is the password you get \nform your ISP.</p><p><div class="pageimage_container alignCenter" contenteditable="false"><img class="pageimage" alt="page-image" src="image/image_uploads/1782812820_7166_engenius.jpg" id="img916386n5534842" style="width: 610px;"></div> <br></p><h3>Step 4</h3>\n			<p>Click Apply once done. Now your router has been configured to use your 3G USB modem.\n			</p><p></p>', 'Configure your Router to use 3G USB Modem', 63, '2017-02-26 02:07:31', 'public', 0),
(210, '\n		\n		\n		\n		\n		\n		\n		\n		\n		\n		\n	<p>In this guide, I would be showing you how to connect a 3G USB modem to \nyour router and configure your router to use the 3G USB modem. \n			The USB modem I would be using in this tutorial is <b>Flashnet</b> from Vodafone Fiji and the router I would be using is EnGenius \nESR6650 router. <br></p><h3>Step 1</h3>\n			<p>Connect the 3G USB modem to the router via the USB port on the router.</p><h3>Step 2</h3>\n			<p>Go to your router\'s configuration page by typing something like \n192.168.0.1 in the address bar of your browser\n			(Note: your router may have a different address so check the manual \nfor your router). Then login using your username and password \n			(the default username and password is usually "admin" (without \nquotes) for for both, some have "user" (without quotes) as the default \nusername and password).</p>\n			\n			\n			<h3>Step 3</h3>\n			<p>This step would vary depending on the router and USB modem you are\n using. I\'m using EnGenious ESR6650 router so the place to enter the \nconfiguration details for the 3G USB modem is\n			located at Internet--&gt;3G. </p>\n			<p>Enter the Pin Code, APN Code, and Dial Number (Access Number) as follows:</p><ul><li>Pin Code: (Enter the PIN for your Sim card if you have set one; if not the default PIN for Vodafone Fiji Sim Cards is 0000 )</li><li>APN: prepay.vfinternet.fj</li><li>Dial number: *99#<br></li></ul>\n			<p>For Username and Password, leave it blank.<br></p><p></p> <div class="pageimage_container alignCenter" contenteditable="false"><img class="pageimage" alt="page-image" src="image/image_uploads/563114001_2708_flashnet_router.JPG" id="img865981n6863208" style="width: 640px;"></div> &nbsp;<br><p></p> <h3>Step 4</h3>\n			<p>Click Apply once done and your router would be configured to use the 3G USB modem (Flashnet) from Vodafone Fiji.\n			</p>\n	\n	\n	\n	<p></p>', 'How to Connect Flashnet (a 3G USB Modem from Vodafone Fiji) to a Router?', 63, '2017-02-26 07:46:37', 'public', 0),
(263, '\n		\n		\n		\n		\n		\n		\n		\n		<p>\n				\n			<a href="http://www.sciencedirect.com/science/article/pii/S1045926X17300095" target="_blank">An SVD-Entropy and bilinearity based product ranking algorithm using heterogeneous data</a> </p><p><a href="http://www.sciencedirect.com/science/article/pii/S0306437916304227" target="_blank">Exploratory product search using top-k join queries</a> <br></p>\n	\n	<p><u><a href="http://ksiresearch.org/seke/dms16paper/dms16paper_24.pdf" target="_blank">An Entropy based Product Ranking Algorithm  using Reviews and Q&amp;A Data <br></a></u></p><p><a href="http://ksiresearch.org/seke/dms16paper/dms16paper_24.pdf" target="_blank"></a><a href="https://pdfs.semanticscholar.org/877f/a6a1baf9136679598e1c6ae43066e675f53a.pdf" target="_blank">Aggregating Reviews to Rank Products and Merchants</a> <u><a href="http://ksiresearch.org/seke/dms16paper/dms16paper_24.pdf" target="_blank"><br></a></u></p><p><a href="http://www.ijert.org/view-pdf/5587/mining-features-and-ranking-products-from-online-customer-reviews" target="_blank">Mining Features and Ranking Products From Online Customer Reviews</a> <u><a href="http://ksiresearch.org/seke/dms16paper/dms16paper_24.pdf" target="_blank"><br></a></u></p><p><u><a href="http://ksiresearch.org/seke/dms16paper/dms16paper_24.pdf" target="_blank"></a><a href="http://gridsec.usc.edu/hwang/papers/rainbow-product-ranking.pdf" target="_blank">Rainbow Product Ranking</a> <br></u></p>\n	\n	<p></p>', 'Product ranking algorithm', 58, '2017-07-15 14:05:09', '15', 0),
(265, '\n		\n		\n		\n		\n		\n		\n	<p><a href="https://www.scrapehero.com/tutorial-how-to-scrape-amazon-product-details-using-python/" target="_blank">How To Scrape Amazon Product Details and Pricing using Python</a> </p>\n	<p><a href="https://office-watch.com/2013/amazon-price-scraping-to-excel/" target="_blank">Amazon price scraping to Excel</a> </p>\n	<p><a href="https://ctrlq.org/code/19064-web-scraping-amazon" target="_blank">Web Scraping Amazon with PHP</a> </p>', 'How To Scrape Amazon Product Details and Pricing', 58, '2017-07-16 13:23:05', '15', 0),
(266, '\n		\n		\n		\n		<p>\n				\n			<a href="https://www.ibm.com/communities/analytics/watson-analytics-blog/guide-to-sample-datasets/" target="_blank">Guide to Sample Data Sets</a> </p>\n	\n	<p><a href="https://perso.telecom-paristech.fr/eagan/class/igr204/datasets" target="_blank">Project datasets</a> </p>', 'Datasets', 58, '2017-07-16 14:46:26', '15', 0),
(267, '\n		\n		\n		\n		\n		\n		\n		\n		<p><a href="http://faculty.haas.berkeley.edu/stadelis/EPP.pdf" target="_blank">The Limits of Reputation in Platform Markets</a></p><p><a href="http://faculty.haas.berkeley.edu/stadelis/EPP.pdf" target="_blank"></a><a href="https://econ.arizona.edu/sites/econ/files/econ-wp-13-05.pdf" target="_blank">Losing to Win: Reputation Management of Online Sellers</a> <br></p>\n	<p><a href="http://google.com/patents/WO2008144444A1?cl=en" target="_blank">Ranking online advertisements using product and seller reputation</a> <br></p>\n	<p><a href="http://faculty.haas.berkeley.edu/stadelis/Annual_Review_Tadelis.pdf" target="_blank">Reputation and Feedback Systems in Online Platform Markets</a> <br></p>\n	<p><a href="http://ieeexplore.ieee.org/stamp/stamp.jsp?arnumber=5562489" target="_blank">Trust and  Reputation Management</a> </p>\n	<p><a href="https://www.aclweb.org/anthology/W/W16/W16-0419.pdf" target="_blank">Reputation System: Evaluating Reputation among All Good Sellers</a> </p>', 'Seller reputation in online marketplace', 58, '2017-07-31 14:10:53', '15', 0),
(268, '<a href="https://www.simplifiedcoding.net/android-login-and-registration-tutorial/" target="_blank">https://www.simplifiedcoding.net/android-login-and-registration-tutorial/</a> &nbsp;<p><a href="https://www.journaldev.com/12607/android-login-registration-php-mysql" target="_blank">https://www.journaldev.com/12607/android-login-registration-php-mysql</a> <br></p>\n	<p></p>', 'Android Login and Registration Tutorial with PHP MySQL', 58, '2017-09-23 11:45:34', '14', 0),
(269, '\n		\n		\n		\n		\n		\n		\n		\n		\n		\n		\n		\n		<p>\n				\n			<a href="https://stackoverflow.com/questions/28647624/how-to-manage-session-for-a-user-logged-in-from-mobile-app-in-php" target="_blank">How to manage session for a user logged in from mobile app in PHP?</a> </p><p><a href="https://stackoverflow.com/questions/37133093/practice-in-managing-session-in-modern-mobile-application?rq=1" target="_blank">Practice in managing session in modern mobile application</a> <br></p>\n	\n	\n	<p><a href="https://stackoverflow.com/questions/19799416/how-do-popular-apps-authenticate-user-requests-from-their-mobile-app-to-their-se" target="_blank">How do popular apps authenticate user requests from their mobile app to their server?</a> </p><p><a href="https://stormpath.com/blog/token-authentication-scalable-user-mgmt" target="_blank">Token Authentication: The Secret to Scalable User Management</a> </p>\n	<p><a href="https://www.theodo.fr/blog/2017/03/how-to-create-an-authentication-system-and-a-persistent-user-session-with-react-native/" target="_blank">How To Create an Authentication System and a Persistent User Session with React Native</a></p><p><a href="https://www.theodo.fr/blog/2017/03/how-to-create-an-authentication-system-and-a-persistent-user-session-with-react-native/" target="_blank"></a><a href="https://www.sitepoint.com/php-authorization-jwt-json-web-tokens/" target="_blank">PHP Authorization with JWT (JSON Web Tokens)</a> <br></p><p><a href="https://www.theodo.fr/blog/2017/03/how-to-create-an-authentication-system-and-a-persistent-user-session-with-react-native/" target="_blank"></a><a href="https://stackoverflow.com/questions/14005460/android-login-with-token-session-like-user-logins-and-stays-in-session-until-lo" target="_blank">Android Login with Token Session: like user logins and stays in session until logout</a> <br> </p>\n	\n	<p><a href="https://www.androidhive.info/2012/08/android-session-management-using-shared-preferences/" target="_blank">Android User Session Management using Shared Preferences </a> </p>', 'Managing session in modern mobile application', 58, '2017-09-27 08:28:41', '14', 0),
(270, '\n		\n		<p>\n				\n			<a href="https://stormpath.com/blog/the-ultimate-guide-to-mobile-api-security" target="_blank">The Ultimate Guide to Mobile API Security</a> </p>\n	', 'Mobile API and JWT', 58, '2017-09-28 09:28:43', '14', 0),
(271, '\n		\n		<p>\n				\n			<a href="https://www.studytutorial.in/android-httpurlconnection-post-and-get-request-tutorial" target="_blank">Android Httpurlconnection Post and Get Request Tutorial</a> </p>\n	', 'Android Httpurlconnection', 58, '2017-10-03 14:02:20', '14', 0),
(272, '\n		\n		\n		\n		\n		\n		\n		\n		\n		\n		\n		\n		\n		\n		\n		\n		\n		\n		<p>\n				\n			<a href="http://www.phpbuilder.com/articles/application-architecture/security/using-a-json-web-token-in-php.html" target="_blank">Using a JSON Web Token in PHP</a> </p>\n	\n	<a href="https://phpclicks.com/php-token-based-authentication/" target="_blank">Simple JWT example with javascript and php</a> &nbsp;<br>\n	\n	<p></p>\n	<div><a href="https://stackoverflow.com/questions/26340275/where-to-save-a-jwt-in-a-browser-based-application-and-how-to-use-it" target="_blank">Where to save a JWT in a browser-based application</a> &nbsp;<br></div>\n	\n	<p><a href="https://stormpath.com/blog/where-to-store-your-jwts-cookies-vs-html5-web-storage" target="_blank">Where to Store your JWTs â€“ Cookies vs HTML5 Web Storage</a> <br></p><p><a href="https://blog.angular-university.io/angular-jwt-authentication/" target="_blank">Angular Security - Authentication With JSON Web Tokens (JWT): The Complete Guide</a> <br></p>\n	', 'Create JWT with PHP', 58, '2017-10-06 13:29:43', '14', 0),
(273, '\n		\n		\n		\n		\n		\n		<p>\n				\n			<a href="http://www.theappguruz.com/blog/android-take-photo-camera-gallery-code-sample" target="_blank"> Android Take Photo From Camera and Gallery - Code Sample</a> </p>\n	\n	<p><a href="https://stackoverflow.com/questions/18590514/loading-all-the-images-from-gallery-into-the-application-in-android" target="_blank">Loading all the images from gallery into the Application in android</a> </p>\n	<p><a href="https://deepshikhapuri.wordpress.com/2017/03/20/get-all-images-from-gallery-in-android-programmatically/" target="_blank">Get all images from gallery in android programmatically - by Deepshikha</a> </p>', ' Android Take Photo From Camera and Gallery', 58, '2017-10-11 11:37:24', '14', 0),
(277, '\n		\n		\n		\n		<p>\n				\n			<a href="https://arthurhub.github.io/Android-Image-Cropper/" target="_blank">Android Image Cropper</a> </p>\n	\n	<p><a href="https://www.simplifiedcoding.net/crop-image-android-tutorial/" target="_blank">Pick and Crop Image in Android</a> </p>', 'Android Image Crop, Resize, and Rotate', 58, '2017-10-21 13:56:32', '14', 0),
(275, '<a href="https://www.printful.com/docs/products" target="_blank">Product Catalog API</a> &nbsp;\n		\n		\n		\n		\n	\n	', 'Printful API', 58, '2017-10-17 02:46:42', '14', 0);

-- --------------------------------------------------------

--
-- Table structure for table `page_likes`
--

CREATE TABLE `page_likes` (
  `pagelike_id` bigint(20) NOT NULL,
  `page_id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `page_likes`
--

INSERT INTO `page_likes` (`pagelike_id`, `page_id`, `user_id`) VALUES
(36, 162, 58),
(39, 171, 58),
(89, 77, 58),
(4, 163, 61),
(61, 175, 61),
(6, 160, 58),
(16, 169, 61),
(42, 177, 61),
(67, 177, 58),
(69, 175, 58),
(71, 179, 58),
(82, 181, 58),
(75, 180, 58),
(76, 106, 63),
(78, 182, 58),
(80, 187, 58),
(83, 189, 61),
(87, 191, 58),
(92, 190, 58),
(94, 198, 58),
(95, 163, 58),
(97, 217, 61),
(98, 210, 61),
(99, 220, 61),
(100, 217, 58),
(110, 220, 58),
(103, 226, 58),
(109, 221, 61),
(122, 78, 58),
(125, 221, 58);

-- --------------------------------------------------------

--
-- Table structure for table `pending_join_group`
--

CREATE TABLE `pending_join_group` (
  `pending_id` bigint(20) NOT NULL,
  `grp_id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `pending_status` varchar(20) NOT NULL COMMENT 'accepted, pending, declined'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pending_join_group`
--

INSERT INTO `pending_join_group` (`pending_id`, `grp_id`, `user_id`, `pending_status`) VALUES
(25, 17, 63, 'pending'),
(26, 17, 61, 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `p_comment`
--

CREATE TABLE `p_comment` (
  `comment_id` bigint(20) NOT NULL,
  `comment` varchar(9999) NOT NULL,
  `user_id` int(11) NOT NULL,
  `comment_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `page_id` bigint(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `p_comment`
--

INSERT INTO `p_comment` (`comment_id`, `comment`, `user_id`, `comment_date`, `page_id`) VALUES
(101, '\n		\n	<p>Make money online<b> </b>with <u>Adsense</u><b><br></b></p><div class="pageimage_container alignCenter" contenteditable="false"><img style="width: 230px;" class="pageimage" alt="page-image" src="image/image_uploads/792256300_adsense.jpg" id="img158769n3978519"></div> &nbsp;\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n', 61, '2016-07-16 15:32:18', 163),
(168, '\n		\n	<p>hello</p>', 58, '2017-05-07 07:13:43', 163),
(139, '\n		\n	<p>xcxcx cxx</p>', 61, '2016-12-21 08:29:27', 169),
(146, '\n		\n	<p>This is helpful</p>\n', 61, '2016-12-22 13:10:12', 175),
(157, '\n		\n	<p><div class="pageimage_container" contenteditable="false"><img class="pageimage" alt="page-image" src="image/image_uploads/1607228406_8616_qaa3.JPG" id="img213121n2658616"></div></p><p>Hello can I get your permission to see this page.</p>', 63, '2017-02-15 03:22:59', 203),
(124, '<p>awesome</p>\n\n', 58, '2016-07-20 09:29:04', 163),
(159, 'Nice', 58, '2017-04-24 09:21:18', 163),
(105, '\n		\n	<p>Testing this site. quite awesum this is</p>\n\n\n\n\n\n\n\n\n\n\n\n\n', 61, '2016-07-17 02:22:48', 163),
(166, 'Whats up?\n\n\n', 61, '2017-04-29 02:29:47', 163),
(171, 'hope alls well<br>', 61, '2017-05-07 18:14:23', 163),
(173, '<p>Good job</p>', 58, '2017-05-08 03:19:38', 163),
(170, '\n		\n	<p>hows everyone</p>', 61, '2017-05-07 18:14:07', 163),
(161, 'please like this comment<br>', 58, '2017-04-28 15:07:19', 163),
(149, '\n		\n	<p>Nice</p>', 58, '2016-12-24 05:59:43', 177),
(150, '\n		\n	<p>Where is this place?</p>', 58, '2016-12-27 04:43:52', 183),
(163, 'nice music coool<br>\n', 58, '2017-04-28 15:41:17', 163),
(156, '\n		\n	<p>ä½ å†™çš„ä¸é”™ã€‚Good</p>\n', 61, '2017-01-23 14:55:32', 189),
(164, 'love this music <br>\n', 58, '2017-04-28 15:41:46', 163),
(183, '\n		\n	<p>xcxcvcv</p>\n', 61, '2017-06-19 15:08:04', 221),
(190, '\n		\n	<p>dd dfdf</p><p><div class="pageimage_container alignRight" id="containerimg23732n9423428" style="width: 184.88px; height: 242px;" contenteditable="false"><img class="pageimage" id="img23732n9423428" style="width: 240px; transform: translate(-28.56px, 28.56px) rotate(270deg);" alt="page-image" src="image/image_uploads/1130507879_5311_source.gif"></div> </p>', 58, '2017-06-22 13:53:57', 220);

-- --------------------------------------------------------

--
-- Table structure for table `p_follow`
--

CREATE TABLE `p_follow` (
  `follow_id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `follower_id` bigint(20) NOT NULL COMMENT 'this is simply the user_id of another user'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `p_follow`
--

INSERT INTO `p_follow` (`follow_id`, `user_id`, `follower_id`) VALUES
(114, 61, 58),
(129, 58, 61),
(59, 63, 61),
(23, 61, 63),
(134, 63, 58),
(42, 58, 63);

-- --------------------------------------------------------

--
-- Table structure for table `p_group`
--

CREATE TABLE `p_group` (
  `grp_id` bigint(20) NOT NULL,
  `grp_name` varchar(180) NOT NULL,
  `grp_pic` varchar(99) NOT NULL DEFAULT 'group_pic.jpg',
  `grp_coverphoto` varchar(99) NOT NULL DEFAULT 'cover_pic.jpg 	',
  `grp_update_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `grp_privacy` varchar(20) NOT NULL DEFAULT 'public'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `p_group`
--

INSERT INTO `p_group` (`grp_id`, `grp_name`, `grp_pic`, `grp_coverphoto`, `grp_update_date`, `grp_privacy`) VALUES
(18, 'Is433', 'group_pic.jpg', 'cover_pic.jpg 	', '2016-07-22 05:37:54', 'closed'),
(17, 'Movie Lovers', 'compress_863285796_6914_video.jpg', '1613718073_1902_images.jpg', '2016-06-28 13:28:25', 'closed'),
(14, 'Programmer Forum', 'group_pic.jpg', 'cover_pic.jpg 	', '2016-06-27 12:00:55', 'closed'),
(15, 'Gossipers', 'compress_1083867969_8612_index.png', '1372019984_7211_15095429119071220868059.jpg', '2016-06-27 12:01:27', 'closed'),
(16, 'Talk all you want', 'group_pic.jpg', 'cover_pic.jpg 	', '2016-06-28 09:09:43', 'closed'),
(19, 'Count 123', 'compress_537674601_1881_index.png', '1613718073_1902_images.jpg', '2017-06-25 13:28:57', 'closed');

-- --------------------------------------------------------

--
-- Table structure for table `p_grp_members`
--

CREATE TABLE `p_grp_members` (
  `id` bigint(20) NOT NULL,
  `grp_id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `member_status` varchar(20) NOT NULL COMMENT 'admin or member'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `p_grp_members`
--

INSERT INTO `p_grp_members` (`id`, `grp_id`, `user_id`, `member_status`) VALUES
(29, 16, 58, 'member'),
(41, 19, 58, 'admin'),
(23, 17, 58, 'admin'),
(11, 14, 58, 'admin'),
(12, 15, 58, 'admin'),
(38, 18, 61, 'admin'),
(40, 15, 61, 'member'),
(42, 14, 61, 'member');

-- --------------------------------------------------------

--
-- Table structure for table `p_images`
--

CREATE TABLE `p_images` (
  `id` bigint(20) NOT NULL,
  `filename` varchar(99) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `upload_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `p_images`
--

INSERT INTO `p_images` (`id`, `filename`, `user_id`, `upload_date`) VALUES
(385, '1372019984_7211_15095429119071220868059.jpg', 58, '2017-11-01 13:29:10'),
(382, '1937792361_7351_mars.jpg', 66, '2017-11-01 11:56:21'),
(381, '537674601_1881_index.png', 58, '2017-11-01 11:36:49'),
(380, '1844381724_89_grass.jpg', 62, '2017-11-01 09:28:10'),
(379, '1754319207_3555_donkey.jpg', 62, '2017-11-01 09:27:23'),
(378, '1096032505_6121_images.jpg', 65, '2017-11-01 08:51:21'),
(377, '1613718073_1902_images.jpg', 58, '2017-11-01 08:42:37'),
(376, '1781149304_2387_index.jpg', 61, '2017-11-01 08:42:02'),
(375, '510640598_3477_index.png', 61, '2017-11-01 08:39:45'),
(374, '1083867969_8612_index.png', 58, '2017-11-01 08:37:57'),
(373, '2127016029_2593_index.jpg', 58, '2017-11-01 08:37:37'),
(372, '955931100_675_index.png', 58, '2017-11-01 08:36:50'),
(371, '863285796_6914_video.jpg', 58, '2017-11-01 08:33:40'),
(370, '1881032408_4882_image.jpg', 58, '2017-11-01 08:33:11'),
(369, '289533607_1046_liked.png', 65, '2017-11-01 08:29:49');

-- --------------------------------------------------------

--
-- Table structure for table `p_reply`
--

CREATE TABLE `p_reply` (
  `reply_id` bigint(20) NOT NULL,
  `reply` varchar(999) NOT NULL,
  `comment_id` bigint(20) NOT NULL,
  `reply_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` bigint(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `p_reply`
--

INSERT INTO `p_reply` (`reply_id`, `reply`, `comment_id`, `reply_date`, `user_id`) VALUES
(2, 'typo wat?', 102, '2016-07-19 06:58:04', 58),
(74, 'just kidding', 161, '2017-05-08 04:21:29', 58),
(67, '\n				\n				\n				\n				\n				\n				yes??\n			', 99, '2017-05-07 07:18:24', 58),
(68, '\n				stay awesome\n			', 166, '2017-05-07 07:19:12', 58),
(69, 'nice', 164, '2017-05-07 07:23:18', 58),
(7, 'yeah', 117, '2016-07-19 09:17:51', 61),
(8, 'water', 117, '2016-07-20 09:00:03', 61),
(10, 'watf', 102, '2016-07-20 09:23:01', 61),
(11, 's2u', 102, '2016-07-20 09:23:31', 61),
(12, 'wats this?', 99, '2016-07-20 09:24:10', 61),
(13, '??????\n			', 99, '2016-07-20 09:24:54', 61),
(34, '\n						thanks.. :)', 149, '2016-12-24 06:00:04', 61),
(19, 'bsp', 117, '2016-07-20 12:22:15', 61),
(20, 'yeah wat', 105, '2016-07-20 12:23:58', 61),
(70, '\n				Hi there', 99, '2017-05-08 03:16:26', 58),
(22, '\n				\n				What is adsense?\n			\n			\n			', 101, '2016-12-20 15:13:13', 58),
(36, 'è°¢è°¢', 156, '2017-01-23 14:57:02', 58),
(31, 'cxcx xcx', 139, '2016-12-21 08:29:41', 61),
(71, 'Yo', 99, '2017-05-08 03:18:53', 58),
(72, '2333333', 99, '2017-05-08 03:21:40', 58),
(73, ':)', 164, '2017-05-08 04:21:01', 58),
(63, '\n				\n				\n				yo man u cool???', 166, '2017-05-07 06:28:54', 58),
(55, '\n				:-)\n			', 105, '2017-04-28 08:55:21', 58),
(58, '?', 105, '2017-04-29 02:32:19', 61),
(59, 'Yeah', 117, '2017-04-29 02:33:22', 61),
(60, 'Yes so true', 163, '2017-04-29 02:35:04', 61),
(79, 'hey', 159, '2017-05-09 14:47:53', 61),
(66, '\n				\n				\n				hi\n			', 159, '2017-05-07 06:44:03', 58),
(78, 'hello', 164, '2017-05-09 14:46:31', 61);

-- --------------------------------------------------------

--
-- Table structure for table `p_user`
--

CREATE TABLE `p_user` (
  `user_id` bigint(20) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `pword` varchar(999) NOT NULL,
  `verify_email` varchar(999) NOT NULL DEFAULT 'no',
  `profile_pic` varchar(200) NOT NULL DEFAULT 'profile_pic.jpg',
  `cover_photo` varchar(200) NOT NULL DEFAULT 'cover_pic.jpg',
  `date_joined` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `p_user`
--

INSERT INTO `p_user` (`user_id`, `fname`, `lname`, `user_email`, `pword`, `verify_email`, `profile_pic`, `cover_photo`, `date_joined`) VALUES
(58, 'Don', 'Ryu', 'goksing@live.com', 'b2f5ff47436671b6e533d8dc3614845d', 'complete', 'compress_2127016029_2593_index.jpg', '1613718073_1902_images.jpg', '0000-00-00 00:00:00'),
(61, 'Willy', 'Willie', 'go2012.gp@gmail.com', '9274f394f58f82d65d5d5a15c478d186', 'complete', 'compress_510640598_3477_index.png', '1781149304_2387_index.jpg', '0000-00-00 00:00:00'),
(75, 'Popo', 'PIpi', 'fa_sanwao@yahoo.com', 'b2f5ff47436671b6e533d8dc3614845d', '2f3ec3b76c07c6108da43921c69b6b65', 'profile_pic.jpg', 'cover_pic.jpg', '2018-01-31 17:29:12'),
(63, 'John', 'Faz', '123999fa@gmail.com', 'b2f5ff47436671b6e533d8dc3614845d', 'complete', 'profile_pic.jpg', 'cover_pic.jpg', '0000-00-00 00:00:00'),
(64, 'Nischal', 'Singh', 'singhnischalr@gmail.com', '749e9c7cc1f5b526fde49f92fdb2ab1a', 'complete', 'profile_pic.jpg', 'cover_pic.jpg', '2016-07-27 14:42:36');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `page`
--
ALTER TABLE `page`
  ADD PRIMARY KEY (`pageid`);

--
-- Indexes for table `page_likes`
--
ALTER TABLE `page_likes`
  ADD PRIMARY KEY (`pagelike_id`);

--
-- Indexes for table `pending_join_group`
--
ALTER TABLE `pending_join_group`
  ADD PRIMARY KEY (`pending_id`);

--
-- Indexes for table `p_comment`
--
ALTER TABLE `p_comment`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `p_follow`
--
ALTER TABLE `p_follow`
  ADD PRIMARY KEY (`follow_id`);

--
-- Indexes for table `p_group`
--
ALTER TABLE `p_group`
  ADD PRIMARY KEY (`grp_id`);

--
-- Indexes for table `p_grp_members`
--
ALTER TABLE `p_grp_members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `p_images`
--
ALTER TABLE `p_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `p_reply`
--
ALTER TABLE `p_reply`
  ADD PRIMARY KEY (`reply_id`);

--
-- Indexes for table `p_user`
--
ALTER TABLE `p_user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `page`
--
ALTER TABLE `page`
  MODIFY `pageid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=303;
--
-- AUTO_INCREMENT for table `page_likes`
--
ALTER TABLE `page_likes`
  MODIFY `pagelike_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=127;
--
-- AUTO_INCREMENT for table `pending_join_group`
--
ALTER TABLE `pending_join_group`
  MODIFY `pending_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `p_comment`
--
ALTER TABLE `p_comment`
  MODIFY `comment_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=200;
--
-- AUTO_INCREMENT for table `p_follow`
--
ALTER TABLE `p_follow`
  MODIFY `follow_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=135;
--
-- AUTO_INCREMENT for table `p_group`
--
ALTER TABLE `p_group`
  MODIFY `grp_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `p_grp_members`
--
ALTER TABLE `p_grp_members`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT for table `p_images`
--
ALTER TABLE `p_images`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=386;
--
-- AUTO_INCREMENT for table `p_reply`
--
ALTER TABLE `p_reply`
  MODIFY `reply_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;
--
-- AUTO_INCREMENT for table `p_user`
--
ALTER TABLE `p_user`
  MODIFY `user_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
