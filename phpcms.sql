-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Czas generowania: 04 Kwi 2018, 12:00
-- Wersja serwera: 5.7.20-log
-- Wersja PHP: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `phpcms`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `admin_panel`
--

CREATE TABLE `admin_panel` (
  `id` int(10) NOT NULL,
  `date_time` varchar(50) COLLATE utf8_polish_ci NOT NULL,
  `title` varchar(200) COLLATE utf8_polish_ci NOT NULL,
  `category` varchar(100) COLLATE utf8_polish_ci NOT NULL,
  `author` varchar(1000) COLLATE utf8_polish_ci NOT NULL,
  `image` varchar(200) COLLATE utf8_polish_ci NOT NULL,
  `post` varchar(10000) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `admin_panel`
--

INSERT INTO `admin_panel` (`id`, `date_time`, `title`, `category`, `author`, `image`, `post`) VALUES
(39, '02/04/2018 18:34:53', 'Python', 'Python', 'Krzysztof', 'python.png', 'In felis dolor, vulputate sed neque nec, congue iaculis neque. Aliquam dolor lectus, pharetra id ultricies eget, dignissim in neque. Ut interdum massa id suscipit tristique. Curabitur vitae enim feugiat, eleifend lacus vel, molestie nisl. Vestibulum non placerat lectus. Ut nec diam non ante fermentum cursus. Integer congue fermentum dapibus. Maecenas in orci urna. Curabitur diam turpis, tempor nec volutpat ac, tempus sed lectus. Fusce tempor enim eros, eu rhoncus libero sodales egestas. Integer suscipit, ligula sit amet commodo faucibus, felis libero suscipit turpis, tempus placerat metus lacus id sem. Donec ex massa, commodo sit amet magna et, rhoncus tincidunt est. Donec malesuada risus sit amet aliquet porttitor. '),
(40, '02/04/2018 18:35:18', 'News in Java', 'JAVA', 'Krzysztof', 'JAVA.png', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec tristique mattis lacus vel pulvinar. Duis rutrum tincidunt ligula, vel convallis nisl malesuada a. Etiam mollis risus id nisl sodales tempus ac non lectus. Quisque id orci non neque varius posuere ut hendrerit risus. Aliquam ut ullamcorper magna, congue vestibulum massa. In consequat at sapien eu auctor. Pellentesque vel nisl nisl. Curabitur volutpat facilisis nulla, id consequat nibh hendrerit sit amet. '),
(41, '02/04/2018 18:35:42', 'JavaScript tricks', 'JavaScript', 'Krzysztof', 'JavaScript.png', 'Praesent porta ultricies justo, eu porta tellus elementum vestibulum. Aenean sed augue mi. Nulla facilisi. Vestibulum fringilla sapien ac porta malesuada. Aliquam dapibus sodales nunc, in ultricies est bibendum vel. Praesent porttitor elit et nulla semper lobortis. Sed orci risus, convallis id auctor id, maximus ac turpis. Etiam facilisis magna ut ex ultrices, sit amet lobortis ipsum pharetra. Cras non urna non lacus mattis commodo in vel elit. In malesuada fringilla dapibus. Sed in libero sem. Donec placerat gravida ligula. Etiam vitae metus massa. Sed non velit mauris. Pellentesque a nisi eleifend, mattis mi at, laoreet metus. Morbi nisi ipsum, malesuada ut vehicula nec, pharetra in ipsum. '),
(42, '02/04/2018 18:36:09', 'PHPmyadmin and MySQL', 'MySQL', 'Krzysztof', 'mySQL.png', 'Vivamus bibendum tristique erat, ac laoreet velit iaculis ut. Pellentesque volutpat lorem iaculis pulvinar gravida. Mauris viverra tincidunt dui, vel porta odio sollicitudin nec. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer ullamcorper hendrerit magna rutrum vulputate. Praesent condimentum quis sapien at fermentum. Quisque a eros purus. Praesent in dapibus enim. Curabitur ex sem, tempus eu justo in, scelerisque tempor urna. Praesent dignissim turpis et neque hendrerit venenatis. Vestibulum vehicula ante mi, condimentum cursus velit ultrices varius. Proin elit libero, dictum vitae ultrices et, molestie ut nunc. Fusce hendrerit auctor nulla, quis scelerisque massa pharetra eget. Aliquam eu enim vitae velit faucibus lacinia. Phasellus mauris magna, dictum at pharetra at, rutrum eget nisi. In eu quam bibendum, scelerisque nisi at, ultricies erat'),
(43, '02/04/2018 18:36:36', 'ReactJS Components', 'React JS', 'Krzysztof', 'react.png', 'Vivamus bibendum tristique erat, ac laoreet velit iaculis ut. Pellentesque volutpat lorem iaculis pulvinar gravida. Mauris viverra tincidunt dui, vel porta odio sollicitudin nec. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer ullamcorper hendrerit magna rutrum vulputate. Praesent condimentum quis sapien at fermentum. Quisque a eros purus. Praesent in dapibus enim. Curabitur ex sem, tempus eu justo in, scelerisque tempor urna. Praesent dignissim turpis et neque hendrerit venenatis. Vestibulum vehicula ante mi, condimentum cursus velit ultrices varius. Proin elit libero, dictum vitae ultrices et, molestie ut nunc. Fusce hendrerit auctor nulla, quis scelerisque massa pharetra eget. Aliquam eu enim vitae velit faucibus lacinia. Phasellus mauris magna, dictum at pharetra at, rutrum eget nisi. In eu quam bibendum, scelerisque nisi at, ultricies erat'),
(44, '02/04/2018 18:37:15', 'Programming in C', 'C', 'Krzysztof', 'C.png', 'Vivamus bibendum tristique erat, ac laoreet velit iaculis ut. Pellentesque volutpat lorem iaculis pulvinar gravida. Mauris viverra tincidunt dui, vel porta odio sollicitudin nec. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer ullamcorper hendrerit magna rutrum vulputate. Praesent condimentum quis sapien at fermentum. Quisque a eros purus. Praesent in dapibus enim. Curabitur ex sem, tempus eu justo in, scelerisque tempor urna. Praesent dignissim turpis et neque hendrerit venenatis. Vestibulum vehicula ante mi, condimentum cursus velit ultrices varius. Proin elit libero, dictum vitae ultrices et, molestie ut nunc. Fusce hendrerit auctor nulla, quis scelerisque massa pharetra eget. Aliquam eu enim vitae velit faucibus lacinia. Phasellus mauris magna, dictum at pharetra at, rutrum eget nisi. In eu quam bibendum, scelerisque nisi at, ultricies erat'),
(45, '02/04/2018 18:37:38', 'C++ programming', 'C++', 'Krzysztof', 'c++.png', ' Duis non dui nec felis tempor tempus. Sed sit amet lorem eget risus pulvinar sollicitudin facilisis non sem. Quisque vel tempor eros. Cras et fermentum turpis, sed molestie magna. Fusce euismod mauris quis ex eleifend consequat. Praesent at diam enim. Pellentesque varius nisi nec sapien aliquam scelerisque. Aliquam ac tellus urna. Nulla in mi ipsum. Quisque at ex id ligula finibus tincidunt. Quisque pellentesque tortor ac metus tincidunt convallis. In egestas dictum lacus placerat convallis. Duis semper molestie fermentum. Mauris placerat sapien sed gravida commodo.\r\n\r\nPraesent porta ultricies justo, eu porta tellus elementum vestibulum. Aenean sed augue mi. Nulla facilisi. Vestibulum fringilla sapien ac porta malesuada. Aliquam dapibus sodales nunc, in ultricies est bibendum vel. Praesent porttitor elit et nulla semper lobortis. Sed orci risus, convallis id auctor id, maximus ac turpis. Etiam facilisis magna ut ex ultrices, sit amet lobortis ipsum pharetra. Cras non urna non lacus mattis commodo in vel elit. In malesuada fringilla dapibus. Sed in libero sem. Donec placerat gravida ligula. Etiam vitae metus massa. Sed non velit mauris. Pellentesque a nisi eleifend, mattis mi at, laoreet metus. Morbi nisi ipsum, malesuada ut vehicula nec, pharetra in ipsum. '),
(46, '02/04/2018 18:38:19', '.NET Framework', '.NET', 'Krzysztof', 'NET.png', ' Duis non dui nec felis tempor tempus. Sed sit amet lorem eget risus pulvinar sollicitudin facilisis non sem. Quisque vel tempor eros. Cras et fermentum turpis, sed molestie magna. Fusce euismod mauris quis ex eleifend consequat. Praesent at diam enim. Pellentesque varius nisi nec sapien aliquam scelerisque. Aliquam ac tellus urna. Nulla in mi ipsum. Quisque at ex id ligula finibus tincidunt. Quisque pellentesque tortor ac metus tincidunt convallis. In egestas dictum lacus placerat convallis. Duis semper molestie fermentum. Mauris placerat sapien sed gravida commodo.\r\n\r\nPraesent porta ultricies justo, eu porta tellus elementum vestibulum. Aenean sed augue mi. Nulla facilisi. Vestibulum fringilla sapien ac porta malesuada. Aliquam dapibus sodales nunc, in ultricies est bibendum vel. Praesent porttitor elit et nulla semper lobortis. Sed orci risus, convallis id auctor id, maximus ac turpis. Etiam facilisis magna ut ex ultrices, sit amet lobortis ipsum pharetra. Cras non urna non lacus mattis commodo in vel elit. In malesuada fringilla dapibus. Sed in libero sem. Donec placerat gravida ligula. Etiam vitae metus massa. Sed non velit mauris. Pellentesque a nisi eleifend, mattis mi at, laoreet metus. Morbi nisi ipsum, malesuada ut vehicula nec, pharetra in ipsum. '),
(47, '02/04/2018 18:38:42', 'Wordpress vs Drupal', 'WordPress', 'Krzysztof', 'wordpress.png', ' Duis non dui nec felis tempor tempus. Sed sit amet lorem eget risus pulvinar sollicitudin facilisis non sem. Quisque vel tempor eros. Cras et fermentum turpis, sed molestie magna. Fusce euismod mauris quis ex eleifend consequat. Praesent at diam enim. Pellentesque varius nisi nec sapien aliquam scelerisque. Aliquam ac tellus urna. Nulla in mi ipsum. Quisque at ex id ligula finibus tincidunt. Quisque pellentesque tortor ac metus tincidunt convallis. In egestas dictum lacus placerat convallis. Duis semper molestie fermentum. Mauris placerat sapien sed gravida commodo.\r\n\r\nPraesent porta ultricies justo, eu porta tellus elementum vestibulum. Aenean sed augue mi. Nulla facilisi. Vestibulum fringilla sapien ac porta malesuada. Aliquam dapibus sodales nunc, in ultricies est bibendum vel. Praesent porttitor elit et nulla semper lobortis. Sed orci risus, convallis id auctor id, maximus ac turpis. Etiam facilisis magna ut ex ultrices, sit amet lobortis ipsum pharetra. Cras non urna non lacus mattis commodo in vel elit. In malesuada fringilla dapibus. Sed in libero sem. Donec placerat gravida ligula. Etiam vitae metus massa. Sed non velit mauris. Pellentesque a nisi eleifend, mattis mi at, laoreet metus. Morbi nisi ipsum, malesuada ut vehicula nec, pharetra in ipsum. '),
(48, '02/04/2018 18:39:05', 'Bootstrap', 'Bootstrap', 'Krzysztof', 'bootstrap.png', ' Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec tristique mattis lacus vel pulvinar. Duis rutrum tincidunt ligula, vel convallis nisl malesuada a. Etiam mollis risus id nisl sodales tempus ac non lectus. Quisque id orci non neque varius posuere ut hendrerit risus. Aliquam ut ullamcorper magna, congue vestibulum massa. In consequat at sapien eu auctor. Pellentesque vel nisl nisl. Curabitur volutpat facilisis nulla, id consequat nibh hendrerit sit amet.\r\n\r\nIn felis dolor, vulputate sed neque nec, congue iaculis neque. Aliquam dolor lectus, pharetra id ultricies eget, dignissim in neque. Ut interdum massa id suscipit tristique. Curabitur vitae enim feugiat, eleifend lacus vel, molestie nisl. Vestibulum non placerat lectus. Ut nec diam non ante fermentum cursus. Integer congue fermentum dapibus. Maecenas in orci urna. Curabitur diam turpis, tempor nec volutpat ac, tempus sed lectus. Fusce tempor enim eros, eu rhoncus libero sodales egestas. Integer suscipit, ligula sit amet commodo faucibus, felis libero suscipit turpis, tempus placerat metus lacus id sem. Donec ex massa, commodo sit amet magna et, rhoncus tincidunt est. Donec malesuada risus sit amet aliquet porttitor. '),
(49, '02/04/2018 18:39:34', 'Angular vs Vue', 'Angular', 'Marek', 'angular.png', 'Duis non dui nec felis tempor tempus. Sed sit amet lorem eget risus pulvinar sollicitudin facilisis non sem. Quisque vel tempor eros. Cras et fermentum turpis, sed molestie magna. Fusce euismod mauris quis ex eleifend consequat. Praesent at diam enim. Pellentesque varius nisi nec sapien aliquam scelerisque. Aliquam ac tellus urna. Nulla in mi ipsum. Quisque at ex id ligula finibus tincidunt. Quisque pellentesque tortor ac metus tincidunt convallis. In egestas dictum lacus placerat convallis. Duis semper molestie fermentum. Mauris placerat sapien sed gravida commodo.'),
(50, '02/04/2018 18:39:44', 'Vue', 'Vue', 'Marek', 'vue.png', 'Duis non dui nec felis tempor tempus. Sed sit amet lorem eget risus pulvinar sollicitudin facilisis non sem. Quisque vel tempor eros. Cras et fermentum turpis, sed molestie magna. Fusce euismod mauris quis ex eleifend consequat. Praesent at diam enim. Pellentesque varius nisi nec sapien aliquam scelerisque. Aliquam ac tellus urna. Nulla in mi ipsum. Quisque at ex id ligula finibus tincidunt. Quisque pellentesque tortor ac metus tincidunt convallis. In egestas dictum lacus placerat convallis. Duis semper molestie fermentum. Mauris placerat sapien sed gravida commodo.'),
(51, '02/04/2018 18:41:23', 'HTML5', 'HTML', 'Marek', 'html.png', 'Duis non dui nec felis tempor tempus. Sed sit amet lorem eget risus pulvinar sollicitudin facilisis non sem. Quisque vel tempor eros. Cras et fermentum turpis, sed molestie magna. Fusce euismod mauris quis ex eleifend consequat. Praesent at diam enim. Pellentesque varius nisi nec sapien aliquam scelerisque. Aliquam ac tellus urna. Nulla in mi ipsum. Quisque at ex id ligula finibus tincidunt. Quisque pellentesque tortor ac metus tincidunt convallis. In egestas dictum lacus placerat convallis. Duis semper molestie fermentum. Mauris placerat sapien sed gravida commodo.'),
(52, '02/04/2018 18:41:50', 'Ruby on Rails news', 'Ruby', 'Marek', 'ruby.png', 'Duis non dui nec felis tempor tempus. Sed sit amet lorem eget risus pulvinar sollicitudin facilisis non sem. Quisque vel tempor eros. Cras et fermentum turpis, sed molestie magna. Fusce euismod mauris quis ex eleifend consequat. Praesent at diam enim. Pellentesque varius nisi nec sapien aliquam scelerisque. Aliquam ac tellus urna. Nulla in mi ipsum. Quisque at ex id ligula finibus tincidunt. Quisque pellentesque tortor ac metus tincidunt convallis. In egestas dictum lacus placerat convallis. Duis semper molestie fermentum. Mauris placerat sapien sed gravida commodo.'),
(53, '02/04/2018 18:42:29', 'PHP - form validation', 'PHP', 'Marek', 'php.png', 'Duis non dui nec felis tempor tempus. Sed sit amet lorem eget risus pulvinar sollicitudin facilisis non sem. Quisque vel tempor eros. Cras et fermentum turpis, sed molestie magna. Fusce euismod mauris quis ex eleifend consequat. Praesent at diam enim. Pellentesque varius nisi nec sapien aliquam scelerisque. Aliquam ac tellus urna. Nulla in mi ipsum. Quisque at ex id ligula finibus tincidunt. Quisque pellentesque tortor ac metus tincidunt convallis. In egestas dictum lacus placerat convallis. Duis semper molestie fermentum. Mauris placerat sapien sed gravida commodo.'),
(54, '02/04/2018 18:43:03', 'Drupal', 'Drupal', 'Marek', 'drupal.png', 'Duis non dui nec felis tempor tempus. Sed sit amet lorem eget risus pulvinar sollicitudin facilisis non sem. Quisque vel tempor eros. Cras et fermentum turpis, sed molestie magna. Fusce euismod mauris quis ex eleifend consequat. Praesent at diam enim. Pellentesque varius nisi nec sapien aliquam scelerisque. Aliquam ac tellus urna. Nulla in mi ipsum. Quisque at ex id ligula finibus tincidunt. Quisque pellentesque tortor ac metus tincidunt convallis. In egestas dictum lacus placerat convallis. Duis semper molestie fermentum. Mauris placerat sapien sed gravida commodo.'),
(55, '02/04/2018 18:43:42', 'Objective-C', 'C', 'Marek', 'C.png', 'Duis non dui nec felis tempor tempus. Sed sit amet lorem eget risus pulvinar sollicitudin facilisis non sem. Quisque vel tempor eros. Cras et fermentum turpis, sed molestie magna. Fusce euismod mauris quis ex eleifend consequat. Praesent at diam enim. Pellentesque varius nisi nec sapien aliquam scelerisque. Aliquam ac tellus urna. Nulla in mi ipsum. Quisque at ex id ligula finibus tincidunt. Quisque pellentesque tortor ac metus tincidunt convallis. In egestas dictum lacus placerat convallis. Duis semper molestie fermentum. Mauris placerat sapien sed gravida commodo.'),
(56, '02/04/2018 18:43:59', 'TypeScript', 'TypeScript', 'Marek', 'typescript.png', ' Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec tristique mattis lacus vel pulvinar. Duis rutrum tincidunt ligula, vel convallis nisl malesuada a. Etiam mollis risus id nisl sodales tempus ac non lectus. Quisque id orci non neque varius posuere ut hendrerit risus. Aliquam ut ullamcorper magna, congue vestibulum massa. In consequat at sapien eu auctor. Pellentesque vel nisl nisl. Curabitur volutpat facilisis nulla, id consequat nibh hendrerit sit amet.\r\n\r\nIn felis dolor, vulputate sed neque nec, congue iaculis neque. Aliquam dolor lectus, pharetra id ultricies eget, dignissim in neque. Ut interdum massa id suscipit tristique. Curabitur vitae enim feugiat, eleifend lacus vel, molestie nisl. Vestibulum non placerat lectus. Ut nec diam non ante fermentum cursus. Integer congue fermentum dapibus. Maecenas in orci urna. Curabitur diam turpis, tempor nec volutpat ac, tempus sed lectus. Fusce tempor enim eros, eu rhoncus libero sodales egestas. Integer suscipit, ligula sit amet commodo faucibus, felis libero suscipit turpis, tempus placerat metus lacus id sem. Donec ex massa, commodo sit amet magna et, rhoncus tincidunt est. Donec malesuada risus sit amet aliquet porttitor. '),
(57, '02/04/2018 18:44:16', 'SQL queries', 'SQL', 'Marek', 'SQL.png', ' Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec tristique mattis lacus vel pulvinar. Duis rutrum tincidunt ligula, vel convallis nisl malesuada a. Etiam mollis risus id nisl sodales tempus ac non lectus. Quisque id orci non neque varius posuere ut hendrerit risus. Aliquam ut ullamcorper magna, congue vestibulum massa. In consequat at sapien eu auctor. Pellentesque vel nisl nisl. Curabitur volutpat facilisis nulla, id consequat nibh hendrerit sit amet.\r\n\r\nIn felis dolor, vulputate sed neque nec, congue iaculis neque. Aliquam dolor lectus, pharetra id ultricies eget, dignissim in neque. Ut interdum massa id suscipit tristique. Curabitur vitae enim feugiat, eleifend lacus vel, molestie nisl. Vestibulum non placerat lectus. Ut nec diam non ante fermentum cursus. Integer congue fermentum dapibus. Maecenas in orci urna. Curabitur diam turpis, tempor nec volutpat ac, tempus sed lectus. Fusce tempor enim eros, eu rhoncus libero sodales egestas. Integer suscipit, ligula sit amet commodo faucibus, felis libero suscipit turpis, tempus placerat metus lacus id sem. Donec ex massa, commodo sit amet magna et, rhoncus tincidunt est. Donec malesuada risus sit amet aliquet porttitor. '),
(58, '02/04/2018 22:46:00', 'JavaScript special tricks', 'JavaScript', 'Krzysztof', 'JavaScript.png', 'Bacon ipsum dolor amet picanha spare ribs ground round, chuck rump salami swine short ribs boudin shank jowl andouille ball tip. Short loin boudin beef pig pastrami sirloin picanha ribeye spare ribs. Leberkas doner spare ribs buffalo tongue shoulder t-bone shank sausage. Boudin filet mignon pork belly, cupim leberkas ground round ribeye pork loin chuck. Sausage jerky rump prosciutto drumstick porchetta pork t-bone bresaola brisket.'),
(59, '02/04/2018 23:47:13', 'Java tricks', 'JAVA', 'Łukasz', 'JAVA.png', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean at sem ut orci consectetur rutrum vel non nibh. Vivamus varius mi tellus, vitae eleifend augue interdum sed. Phasellus commodo, elit eu lacinia consectetur, ipsum nunc tristique augue, ut fermentum erat lectus quis velit. Duis commodo laoreet erat vel lacinia. Mauris pretium nisl quis dui posuere, consectetur malesuada neque iaculis. Ut pretium diam diam, vestibulum pulvinar felis gravida sed. Quisque in hendrerit eros, ut varius tellus. Ut feugiat sagittis nulla, et euismod nibh venenatis quis. Maecenas at hendrerit dolor. Curabitur blandit porttitor velit quis cursus. Fusce eu tristique metus, blandit elementum ante. Aenean cursus viverra massa, in venenatis augue aliquam vitae. Pellentesque id lacus at magna rutrum feugiat. Curabitur volutpat felis a dapibus vehicula.             '),
(60, '02/04/2018 23:50:22', 'React JS news', 'ReactJS', 'Łukasz', 'react.png', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean at sem ut orci consectetur rutrum vel non nibh. Vivamus varius mi tellus, vitae eleifend augue interdum sed. Phasellus commodo, elit eu lacinia consectetur, ipsum nunc tristique augue, ut fermentum erat lectus quis velit.              ');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `category`
--

CREATE TABLE `category` (
  `id` int(10) NOT NULL,
  `date_time` varchar(50) COLLATE utf8_polish_ci NOT NULL,
  `name` varchar(100) COLLATE utf8_polish_ci NOT NULL,
  `creatorname` varchar(200) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `category`
--

INSERT INTO `category` (`id`, `date_time`, `name`, `creatorname`) VALUES
(11, '02/04/2018 16:58:41', 'Python', 'Krzysztof'),
(12, '02/04/2018 16:58:46', 'C', 'Krzysztof'),
(13, '02/04/2018 16:58:50', 'C++', 'Krzysztof'),
(14, '02/04/2018 16:58:58', '.NET', 'Krzysztof'),
(15, '02/04/2018 16:59:05', 'WordPress', 'Krzysztof'),
(16, '02/04/2018 16:59:12', 'Bootstrap', 'Krzysztof'),
(17, '02/04/2018 16:59:15', 'Angular', 'Krzysztof'),
(18, '02/04/2018 16:59:19', 'Vue', 'Krzysztof'),
(19, '02/04/2018 16:59:24', 'Ruby', 'Krzysztof'),
(20, '02/04/2018 16:59:28', 'Drupal', 'Krzysztof'),
(21, '02/04/2018 16:59:36', 'Objective-C', 'Krzysztof'),
(22, '02/04/2018 16:59:39', 'TypeScript', 'Krzysztof'),
(23, '02/04/2018 16:59:43', 'MySQL', 'Krzysztof'),
(24, '02/04/2018 16:59:48', 'SQL', 'Krzysztof'),
(25, '02/04/2018 18:40:18', 'CSS', 'Marek'),
(26, '02/04/2018 18:40:34', 'PHP', 'Marek'),
(27, '02/04/2018 18:40:40', 'ReactJS', 'Marek'),
(28, '02/04/2018 18:40:47', 'JAVA ', 'Marek'),
(29, '02/04/2018 18:40:49', 'HTML', 'Marek'),
(30, '02/04/2018 22:45:11', 'JavaScript', 'Krzysztof');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `comments`
--

CREATE TABLE `comments` (
  `id` int(10) NOT NULL,
  `date_time` varchar(50) COLLATE utf8_polish_ci NOT NULL,
  `name` varchar(200) COLLATE utf8_polish_ci NOT NULL,
  `email` varchar(200) COLLATE utf8_polish_ci NOT NULL,
  `comment` varchar(500) COLLATE utf8_polish_ci NOT NULL,
  `approvedby` varchar(200) COLLATE utf8_polish_ci NOT NULL,
  `status` varchar(5) COLLATE utf8_polish_ci NOT NULL,
  `admin_panel_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `comments`
--

INSERT INTO `comments` (`id`, `date_time`, `name`, `email`, `comment`, `approvedby`, `status`, `admin_panel_id`) VALUES
(13, '02/04/2018 23:45:13', 'Artur', 'artur@gmail.com', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean at sem ut orci consectetur rutrum vel non nibh. Vivamus varius mi tellus, vitae eleifend augue interdum sed.', 'Marek', 'ON', 58),
(14, '02/04/2018 23:54:47', 'Dariusz', 'dariusz@gmail.com', 'Maecenas at hendrerit dolor. Curabitur blandit porttitor velit quis cursus. Fusce eu tristique metus, blandit elementum ante. Aenean cursus viverra massa, in venenatis augue aliquam vitae. Pellentesque id lacus at magna rutrum feugiat. Curabitur volutpat felis a dapibus vehicula. ', 'Marek', 'ON', 58),
(15, '03/04/2018 20:42:33', 'Roman', 'roman@gmail.com', 'Pellentesque ligula ante, varius in sem quis, venenatis pretium velit. Duis sit amet leo nec augue vulputate vulputate at vitae justo', 'Krzysztof', 'ON', 59),
(16, '04/04/2018 11:52:19', 'Arkadiusz', 'arek@gmail.com', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque sed mauris et erat hendrerit lacinia. Aenean fringilla faucibus tincidunt. Curabitur suscipit faucibus viverra. Donec quis mollis sem.', 'Pending', 'OFF', 59),
(17, '04/04/2018 11:52:34', 'Mark', 'mark@gmail.com', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. ', 'Marek', 'ON', 59),
(18, '04/04/2018 11:52:50', 'Henry', 'henry@gmail.com', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque sed mauris et erat hendrerit lacinia. Aenean fringilla faucibus tincidunt. Curabitur suscipit faucibus viverra. Donec quis mollis sem.', 'Pending', 'OFF', 58),
(19, '04/04/2018 11:53:07', 'Gabriel', 'gabriel@gmail.com', 'Nunc imperdiet, diam ac gravida aliquam, ligula justo aliquam neque, at lobortis augue tortor ut purus. Aenean aliquam volutpat arcu. Integer et enim non dui egestas blandit.', 'Grzegorz', 'ON', 58),
(20, '04/04/2018 11:53:36', 'Tomasz', 'tomasz@gmail.com', 'Nunc imperdiet, diam ac gravida aliquam, ligula justo aliquam neque, at lobortis augue tortor ut purus. Aenean aliquam volutpat arcu. Integer et enim non dui egestas blandit.', 'Marek', 'ON', 54),
(21, '04/04/2018 11:53:56', 'Mateusz', 'mateusz@gmail.com', 'Cras facilisis nibh et laoreet aliquet.', 'Pending', 'OFF', 54),
(22, '04/04/2018 11:54:15', 'Radek', 'radek@gmail.com', 'Nullam aliquet dignissim dolor eu pellentesque. Praesent nec hendrerit nunc. Maecenas augue dui, facilisis ac nibh id, posuere euismod sapien', 'Grzegorz', 'ON', 53),
(23, '04/04/2018 11:54:30', 'Monika', 'monika@gmail.com', 'Quisque tincidunt mollis arcu, eget accumsan enim bibendum et. Vestibulum ac lobortis neque, ut congue risus. ', 'Krzysztof', 'ON', 53),
(24, '04/04/2018 11:55:02', 'Michael', 'michael@gmail.com', 'Quisque tincidunt mollis arcu, eget accumsan enim bibendum et. Vestibulum ac lobortis neque, ut congue risus. ', 'Pending', 'OFF', 50),
(25, '04/04/2018 11:55:26', 'Artur', 'artur@gmail.com', 'Vivamus sed lectus orci. Sed ultrices leo eros, sed aliquet lectus semper in. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae;', 'Krzysztof', 'ON', 50),
(26, '04/04/2018 11:55:41', 'Doris', 'doris@gmal.com', 'Etiam bibendum ullamcorper ex at faucibus. Sed consectetur dolor ut magna tempus dapibus. Quisque elementum quam non libero consequat tempus. ', 'Pending', 'OFF', 50),
(27, '04/04/2018 11:56:00', 'Magda', 'magda@gmail.com', 'Maecenas vel eros purus. Phasellus ullamcorper congue eros vitae imperdiet.', 'Pending', 'OFF', 49),
(28, '04/04/2018 11:56:15', 'Sylwia', 'sylwia@gmail.com', 'Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Maecenas non suscipit tellus.', 'Krzysztof', 'ON', 49),
(29, '04/04/2018 11:56:33', 'Alex', 'alex@gmail.com', 'Donec id laoreet nibh. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Aliquam congue rutrum condimentum.', 'Pending', 'OFF', 49),
(30, '04/04/2018 11:56:56', 'Karol', 'karol@gmail.com', 'Proin egestas, urna in egestas condimentum, leo odio mattis dui, eget elementum neque quam a sapien. In ut magna a massa eleifend rhoncus.', 'Grzegorz', 'ON', 45),
(31, '04/04/2018 11:57:18', 'Julien', 'julien@gmail.com', 'Cras orci est, condimentum vitae nulla quis, semper vehicula erat. In volutpat gravida nunc vel fringilla. Fusce a risus sed libero fermentum dignissim.', 'Marek', 'ON', 45),
(32, '04/04/2018 11:57:37', 'Klaudia', 'klaudia@gmail.com', 'Nunc consectetur leo in turpis hendrerit sodales. Aliquam et leo sed lectus elementum feugiat. Etiam at neque facilisis, mattis quam non, sagittis lacus. ', 'Krzysztof', 'ON', 44),
(33, '04/04/2018 11:58:06', 'Karolina', 'karolina@gmail.com', 'Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Aliquam congue rutrum condimentum.', 'Marek', 'ON', 44),
(34, '04/04/2018 11:58:27', 'Szymon', 'szymon@gmail.com', 'Vestibulum eleifend metus justo, sit amet semper ante bibendum a. Mauris non turpis id ante rutrum pretium in id magna. Nullam aliquet dignissim dolor eu pellentesque. ', 'Grzegorz', 'ON', 43),
(35, '04/04/2018 11:58:50', 'Olek', 'olek@gmail.com', 'Nunc imperdiet, diam ac gravida aliquam, ligula justo aliquam neque, at lobortis augue tortor ut purus. Aenean aliquam volutpat arcu. Integer et enim non dui egestas blandit. ', 'Krzysztof', 'ON', 43);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `registration`
--

CREATE TABLE `registration` (
  `id` int(10) NOT NULL,
  `date_time` varchar(50) COLLATE utf8_polish_ci NOT NULL,
  `username` varchar(200) COLLATE utf8_polish_ci NOT NULL,
  `password` varchar(200) COLLATE utf8_polish_ci NOT NULL,
  `addedby` varchar(200) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `registration`
--

INSERT INTO `registration` (`id`, `date_time`, `username`, `password`, `addedby`) VALUES
(4, '30/03/2018 18:32:46', 'Krzysztof', '$2y$10$62GavXHGAWViG59wHiHFROdZQf5KwOLEKzVf8GyqwC3Kzf.4gJssG', ''),
(6, '02/04/2018 17:07:02', 'Marek', '$2y$10$62GavXHGAWViG59wHiHFROdZQf5KwOLEKzVf8GyqwC3Kzf.4gJssG', 'Krzysztof'),
(9, '02/04/2018 20:00:13', 'Grzegorz', '$2y$10$Har.6UtIQbVexaM/dHtN8.vklmcRYHYsWSmW7b918dMmCVMpNJfoy', 'Krzysztof'),
(12, '02/04/2018 23:10:09', 'Łukasz', '$2y$10$JhvhNWASdTva2e0J.SiqP.wqV.e1a5TCpu1XavOhNe5W2M17LhiK2', 'Krzysztof');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indexes for table `admin_panel`
--
ALTER TABLE `admin_panel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `admin_panel_id` (`admin_panel_id`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `admin_panel`
--
ALTER TABLE `admin_panel`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT dla tabeli `category`
--
ALTER TABLE `category`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT dla tabeli `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT dla tabeli `registration`
--
ALTER TABLE `registration`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `Foreign Key to admin_panel table` FOREIGN KEY (`admin_panel_id`) REFERENCES `admin_panel` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
