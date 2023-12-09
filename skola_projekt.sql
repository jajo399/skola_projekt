-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hostiteľ: 127.0.0.1
-- Čas generovania: Št 07.Dec 2023, 17:34
-- Verzia serveru: 10.4.32-MariaDB
-- Verzia PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databáza: `skola_projekt`
--

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `admin_users`
--

CREATE TABLE `admin_users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `image_file_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Sťahujem dáta pre tabuľku `admin_users`
--

INSERT INTO `admin_users` (`id`, `username`, `password`, `description`, `image_file_name`) VALUES
(1, 'admin', '$2y$10$i6izfzeePT5Ock5VIwwsT.4BS6lNX1X6bcT.T5heCRmg.LldcsN9y', 'Toto som ja a ostatny co sem pridete citajte poriadne co sa tu pise', 'c965bb933a0a86fe5de66ccedc43f4.png');

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `blog_post`
--

CREATE TABLE `blog_post` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `image_file_name` varchar(50) NOT NULL,
  `create_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Sťahujem dáta pre tabuľku `blog_post`
--

INSERT INTO `blog_post` (`id`, `title`, `description`, `content`, `image_file_name`, `create_time`) VALUES
(20, 'PrÃ¡vo a informaÄnÃ¡ bezpeÄnosÅ¥ â€“ Ãºvod do problematiky', 'Informacna bezpecnost', '<p id=\"isPasted\">Zauj&iacute;ma V&aacute;s problematika Pr&aacute;va a informaÄnej bezpeÄnosti? Ak &aacute;no, pripravili sme pre V&aacute;s s&eacute;riu webin&aacute;rov, na ktor&yacute;ch V&aacute;s s touto t&eacute;mou obozn&aacute;mime. Prv&yacute; &uacute;vodn&yacute; webin&aacute;r predstavil z&aacute;kladn&yacute; n&aacute;hÄ¾ad do danej problematiky a dozvedeli ste sa v&scaron;eobecn&yacute; rozmer ochrany inform&aacute;ci&iacute; v slovenskom pr&aacute;ve (d&ocirc;vernosÅ¥, integrita a dostupnosÅ¥). Venovali sme sa &uacute;lohe, zodpovednosti a povinnosti pri ochrane &scaron;t&aacute;tu a na pomedz&iacute; &scaron;t&aacute;t &ndash; s&uacute;kromn&aacute; sf&eacute;ra. &nbsp;T&eacute;mou bola aj zodpovednosÅ¥ za informaÄn&uacute; bezpeÄnosÅ¥ v regulovan&yacute;ch s&uacute;kromn&yacute;ch oblastiach a v s&uacute;kromnej neregulovanej oblasti. T&aacute;to s&eacute;ria workshopov je pripraven&aacute; Pavlom Adamcom z KPMG a Martinom Jackom z Lansky, Ganzger &amp; Partner.</p><p><br></p><p>PoÄas roka s&uacute; pripraven&eacute; Äal&scaron;ie podujatia k tejto t&eacute;me.</p>', '4b75604d74ddfaad2f24af06bc918a.jpg', '2023-12-07 17:16:16'),
(21, 'TÃ­my svorne prehlasujÃº, Å¾e Wolffovcov neudali. S myÅ¡lienkou priÅ¡iel prekvapivo Horner', 'Formula 1', '<p id=\"isPasted\">V utorok veÄer otriasol svetom F1 &scaron;kand&aacute;l. ÄŒasopis Business F1 totiÅ¾ do &eacute;teru vypustil, Å¾e tak Toto Wolff, ako aj jeho manÅ¾elka Susie Wolffov&aacute;, maj&uacute; disponovaÅ¥ neopr&aacute;vnen&yacute;mi inform&aacute;ciami. Rak&uacute;&scaron;an sa m&aacute; prostredn&iacute;ctvom svojej neÅ¾nej poloviÄky dost&aacute;vaÅ¥ k poznatkom z prostredia FOM, zatiaÄ¾ Äo &Scaron;k&oacute;tka &uacute;dajne o tom, Äo prebieha na stretnutiach &scaron;&eacute;fov t&iacute;mov, informuje FIA. Po tom, Äo cel&uacute; vec zaÄala vy&scaron;etrovaÅ¥ Medzin&aacute;rodn&aacute; automobilov&aacute; feder&aacute;cia, sa Wolffovci voÄi t&yacute;mto tvrdeniam takmer okamÅ¾ite vyhradili. A formulov&aacute; verejnosÅ¥ na Äele s t&iacute;mami svorne prehlasuje, Å¾e stoj&iacute; za nimi.</p><p><br></p><p>V utorok veÄer sa kauzou &bdquo;Wolffgate&ldquo;, ktor&uacute; zapoÄal spom&iacute;nan&yacute; magaz&iacute;n, zaÄala zaoberaÅ¥ aj FIA &ndash; a to vraj na z&aacute;klade sÅ¥aÅ¾nost&iacute; t&iacute;mov, ktor&yacute;m prek&aacute;Å¾alo, Å¾e Toto Wolff disponuje inform&aacute;ciami, ktor&eacute; by mu zn&aacute;me byÅ¥ nemali. Prv&yacute; z celkov, ktor&yacute; poprel, Å¾e by voÄi Wolffovcom kul nejak&eacute; pykle, bol Red Bull na Äele s Christianom Hornerom.</p><p><br></p><p>&bdquo;M&ocirc;Å¾eme potvrdiÅ¥, Å¾e sme FIA nepodali Å¾iadnu sÅ¥aÅ¾nosÅ¥ t&yacute;kaj&uacute;cu sa obvinenia z pren&aacute;&scaron;ania inform&aacute;ci&iacute; d&ocirc;vern&eacute;ho charakteru medzi &scaron;&eacute;fom t&iacute;mu F1 a Älenom FOM. Radi a hrdo podporujeme F1 Academy a jej v&yacute;konn&uacute; riaditeÄ¾ku (Susie Wolffov&uacute;, pozn. red.), a to prostredn&iacute;ctvom n&aacute;&scaron;ho z&aacute;v&auml;zku, ktor&yacute;m je od bud&uacute;ceho roka sponzorovanie jednej z &uacute;Äastn&iacute;Äok s&uacute;Å¥aÅ¾e, ktor&aacute; bude pretekaÅ¥ v na&scaron;ich farb&aacute;ch,&ldquo; stoj&iacute; vo vyhl&aacute;sen&iacute; t&iacute;mu.</p><p><br></p><p>Rovnak&yacute; postoj ako Red Bull zaujali aj ostatn&eacute; z t&iacute;mov &scaron;tartov&eacute;ho poÄ¾a &ndash; pochopiteÄ¾ne s v&yacute;nimkou Mercedesu, ktor&eacute;ho &scaron;&eacute;f je jednou z hlavn&yacute;ch post&aacute;v celej kauzy. Stajne dokonca prevzali stanovisko celku z Milton Keynes od slova do slova.</p><p><br></p><p>Christian Horner sa k celej problematike vyslovil aj vo vlastnom mene, a to e&scaron;te pred zverejnen&iacute;m t&iacute;mov&eacute;ho vyhl&aacute;senia: &bdquo;Na trati s&iacute;ce prechov&aacute;vame rivalitu, ale FIA sme nepodali Å¾iadnu ofici&aacute;lnu sÅ¥aÅ¾nosÅ¥, a to ani na Susie, ani na Tota a ani na Mercedes.&ldquo;</p><p><br></p><p>&bdquo;Red Bull sa v F1 Academy angaÅ¾oval od jej vzniku najviac, a to aÅ¾ do takej miery, Å¾e dve stajne Red Bullu bud&uacute; pozost&aacute;vaÅ¥ aÅ¾ z troch &aacute;ut,&ldquo; povedal na obhajobu svojho t&iacute;mu &nbsp;Horner pre Sky Sports News.</p><p><br></p><p>&bdquo;So Susie &uacute;zko spolupracujeme, v F1 Academy odv&aacute;dza skvel&uacute; pr&aacute;cu. Mysl&iacute;m si teda, Å¾e n&aacute;s, podobne ako ostatn&yacute;ch, dosÅ¥ prekvapilo vyhl&aacute;senie, ktor&eacute; vy&scaron;lo vÄera veÄer. UrÄite v&scaron;ak nebolo podnieten&eacute;, vyÅ¾adovan&eacute; alebo vyvolan&eacute; Red Bullom,&ldquo; doplnil Horner, ktor&yacute; sa napriek urÄit&yacute;m nezhod&aacute;m tentokr&aacute;t postavil jasne na stranu svojho najv&auml;Ä&scaron;ieho rivala &ndash; Tota Wolffa.</p>', 'cca448e965f10c6ab70c724ebd6b6a.jpg', '2023-12-07 17:18:35'),
(22, 'AktuÃ¡lne dopravnÃ© informÃ¡cie', 'DopravnÃ½ servis', '<p id=\"isPasted\">DiaÄ¾nice, r&yacute;chlostn&eacute; cesty:</p><p><br></p><p>V&scaron;etky sledovan&eacute; diaÄ¾niÄn&eacute; &uacute;seky a r&yacute;chlostn&eacute; cesty s&uacute; zjazdn&eacute;, povrch vozoviek je prevaÅ¾ne vlhk&yacute; aÅ¾ mokr&yacute;, okrem D1 Ivachnov&aacute; - V&yacute;chodn&aacute;, kde je vrstva ka&scaron;ovit&eacute;ho snehu do 1 cm. Vrstva Äerstv&eacute;ho aÅ¾ ka&scaron;ovit&eacute;ho snehu 1-3 cm na R3 obchvat Hornej &Scaron;tubne, R3 na Orave, R2 obchvat OÅ¾dian, R4 obchvat Svidn&iacute;ka a R1 Å½iar nad Hronom - Hronsk&aacute; D&uacute;brava. Na R1 Hronsk&aacute; D&uacute;brava - Bansk&aacute; Bystrica a R2 BudÄa - Zvolen - Kriv&aacute;Åˆ je vrstva ka&scaron;ovit&eacute;ho snehu do 5 cm.</p><p><br></p><p>Cesty I., II. a III. triedy s&uacute; zjazdn&eacute;, povrch vozoviek je prevaÅ¾ne pokryt&yacute; Äerstv&yacute;m, ka&scaron;ovit&yacute;m aÅ¾ utlaÄen&yacute;m snehom v hr&uacute;bke 1-3 cm, miestami do 5 cm, na ceste Skalka - Kremnica aÅ¾ do 10 cm. Cesty na z&aacute;padnom Slovensku a krajnom v&yacute;chode Slovenska s&uacute; prevaÅ¾ne mokr&eacute;.</p><p><br></p><p>Horsk&eacute; priechody:</p><p><br></p><p>Horsk&eacute; priechody s&uacute; zjazdn&eacute; s pr&iacute;padn&yacute;mi obmedzeniami uveden&yacute;mi v rubrike OBMEDZENIA niÅ¾&scaron;ie. Povrch vozoviek je pokryt&yacute; vrstvou Äerstv&eacute;ho, ka&scaron;ovit&eacute;ho aÅ¾ utlaÄen&eacute;ho snehu 1-3 cm, na priechodoch Pust&eacute; Pole a Klenov 4-5 cm. Biela Hora, Pezinsk&aacute; Baba, &Scaron;&uacute;tovce, Soro&scaron;ka, Dargov a Hom&ocirc;lka maj&uacute; vozovky mokr&eacute;.</p><p><br></p><p>Donovaly prejazdn&eacute; pre v&scaron;etku dopravu!</p><p>Vern&aacute;r: Å¥aÅ¾ko prejazdn&yacute; pre kami&oacute;ny, zasneÅ¾en&aacute; vozovka.</p><p>ÄŒertovica vozovka prejazdn&aacute;.</p><p>&Scaron;turec prejazdn&yacute;.</p><p>Dob&scaron;in&aacute; uzavret&aacute; pre vozidl&aacute; nad 3,5 tony.</p><p>Soro&scaron;ka prejazdn&aacute;.</p><p>Pezinsk&aacute; Baba mokr&aacute; vozovka, pozor na poÄ¾adovicu, prejazdn&aacute; iba vozidl&aacute; do 7,5 tony.</p><p>&Scaron;&uacute;tovce uzavret&eacute; pre vozidl&aacute; nad 10 metrov.</p><p>FaÄkov prejazdn&yacute;.</p>', 'aba63ec90770776225b6a62be6a8f7.jpg', '2023-12-07 17:21:14'),
(23, 'Midjuerny umela inteligencia', 'Midjurney', '<p>Tento obrazok generovala umela inteligencia. Pouzili sme na to nasledovny promt&nbsp;</p><p>&quot;/imagine Create a picture of random people and environment&quot;</p><p><br></p>', 'bd58a55dc957e415835863d30885da.png', '2023-12-07 17:26:13');

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `comment` text NOT NULL,
  `post_id` int(11) NOT NULL,
  `cookie` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Sťahujem dáta pre tabuľku `comments`
--

INSERT INTO `comments` (`id`, `name`, `comment`, `post_id`, `cookie`) VALUES
(35, 'Jozko', 'Tak to je husteee', 18, 'c95747a9e726fd68dcf21985e667a3'),
(36, 'Ferko', 'Ano', 19, 'c95747a9e726fd68dcf21985e667a3'),
(37, 'Martin', 'test', 18, '43c54cffbe69249a2179cf8c3ec249'),
(40, 'Jozko', 'Nie', 19, '2814b74c499a1229c0d9e7d4069b0e'),
(41, 'Ema', 'Ajeeeje', 20, '2814b74c499a1229c0d9e7d4069b0e'),
(42, 'Matko', 'Suhlasim', 21, '2814b74c499a1229c0d9e7d4069b0e'),
(43, 'Andrej', 'Zase budem meskat', 22, '2814b74c499a1229c0d9e7d4069b0e'),
(44, 'Kristina', 'Wau', 23, '2814b74c499a1229c0d9e7d4069b0e');

--
-- Kľúče pre exportované tabuľky
--

--
-- Indexy pre tabuľku `admin_users`
--
ALTER TABLE `admin_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexy pre tabuľku `blog_post`
--
ALTER TABLE `blog_post`
  ADD PRIMARY KEY (`id`);

--
-- Indexy pre tabuľku `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pre exportované tabuľky
--

--
-- AUTO_INCREMENT pre tabuľku `admin_users`
--
ALTER TABLE `admin_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pre tabuľku `blog_post`
--
ALTER TABLE `blog_post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT pre tabuľku `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
