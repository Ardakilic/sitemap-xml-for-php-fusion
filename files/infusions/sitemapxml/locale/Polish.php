<?php
/*-------------------------------------------------------+
| PHP-Fusion Content Management System
| Copyright � 2002 - 2008 Nick Jones
| http://www.php-fusion.co.uk/
+--------------------------------------------------------+
| Filename: Polish.php
| Version: 3.00
| Author: Arda K�l��da�� (SoulSmasher) & correction by zezol
| Web: http://www.soulsmasher.net
+--------------------------------------------------------+
| This program is released as free software under the
| Affero GPL license. You can redistribute it and/or
| modify it under the terms of this license which you
| can read by viewing the included agpl.txt or online
| at www.gnu.org/licenses/agpl.html. Removal of this
| copyright header is strictly prohibited without
| written permission from the original author(s).
+--------------------------------------------------------*/

//sitemap_admin.php
$locale['smxml_01'] = "Google Sitemap";
$locale['smxml_02'] = "Data utworzenia Sitemap: ";
$locale['smxml_03'] = "Przejd� do Sitemap!";
$locale['smxml_04'] = "Wygeneruj Sitemap teraz!";
$locale['smxml_05'] = "Zg�o� sitemap do wyszukiwarek (wspierane przez sitemapwriter.com)!";
$locale['smxml_06'] = "Sukces!";
$locale['smxml_07'] = "Sitemap utworzono pomy�lnie";
$locale['smxml_08'] = "B��d!";
$locale['smxml_09'] = "Wyst�pi� b��d podczas tworzenia sitemap, plik sitemap.xml musi znajdowa� si� w gl�wnym folderze php-fusion's a CHMODy musz� by� ustawione na 777";

$locale['smxml_16'] = array ( //new in 2.0
	0 => "dziennie",
	1 => "tygodniowo",
	2 => "miesi�cznie",
	3 => "rocznie"
);
$locale['smxml_17'] = "Ustawienia zapisano pomy�lnie!"; //new in 2.0
$locale['smxml_18'] = "Wyst�pi� b�ad podczas zapisywania ustawie�"; //new in 2.0

$locale['smxml_200'] = "Component"; //New in 3.0
$locale['smxml_201'] = "Enabled?"; //New in 3.0
$locale['smxml_202'] = "Priority"; //New in 3.0
$locale['smxml_203'] = "Frequency"; //New in 3.0
$locale['smxml_204'] = "Items (0=Unlimited)"; //New in 3.0

$locale['smxml_210'] = "News"; //New in 3.0
$locale['smxml_211'] = "News Cats"; //New in 3.0
$locale['smxml_212'] = "Articles"; //New in 3.0
$locale['smxml_213'] = "Article Cats"; //New in 3.0
$locale['smxml_214'] = "Profiles"; //New in 3.0
$locale['smxml_215'] = "Photo Albums"; //New in 3.0
$locale['smxml_216'] = "Photos"; //New in 3.0
$locale['smxml_217'] = "Custom Pages"; //New in 3.0
$locale['smxml_218'] = "FAQ Cats"; //New in 3.0
$locale['smxml_219'] = "Download Cats"; //New in 3.0
$locale['smxml_220'] = "Downloads"; //New in 3.0
$locale['smxml_221'] = "Weblink Cats"; //New in 3.0
$locale['smxml_222'] = "Forum Categories"; //New in 3.0
$locale['smxml_223'] = "Forum Threads"; //New in 3.0
$locale['smxml_224'] = "Kroax Categories"; //New in 3.0
$locale['smxml_225'] = "Kroax Videos"; //New in 3.0
$locale['smxml_226'] = "VArcade Cats"; //New in 3.0
$locale['smxml_227'] = "VArcade Games"; //New in 3.0
$locale['smxml_228'] = "Pro Download Panel Cats"; //New in 3.0
$locale['smxml_229'] = "Pro Download Panel Dowloads"; //New in 3.0
$locale['smxml_230'] = "Ti Blog System"; //New in 3.0
$locale['smxml_231'] = "Firma Rehberi (Company Catalogue System)"; //New in 3.0
$locale['smxml_232'] = "Firma Rehberi Categories"; //New in 3.0


$locale['smxml_43'] = "Zapisz ustawienia!"; //new in 2.01

$locale['smxml_44'] = "Tak"; //new in 2.10
$locale['smxml_45'] = "Nie"; //new in 2.10

$locale['smxml_49'] = "Ponowne generowanie (sekundy)"; //new in 2.10


$locale['smxml_100'] = "W�asne skecje stron Sitemap"; //new in 2.50
$locale['smxml_101'] = "W tej sekcji mo�esz dodawa� w�asne adresy URL, kt�re nie s� wbudowane w map� witryny w formacie XML.<br />\n Linki nie mog� zawiera� / na pocz�tku. tj.: ".$settings['siteurl']."main.php powinno zosta� dodane jako main.php, ".$settings['siteurl']."infusions/wtyczka/wtyczka.php jako infusions/wtyczka/wtyczka.php"; //new in 2.50
$locale['smxml_102'] = "Adres linku"; //new in 2.50
$locale['smxml_103'] = "Priorytet linku"; //new in 2.50
$locale['smxml_104'] = "Cz�stotliwo�� linku"; //new in 2.50
$locale['smxml_105'] = "Zapisz link"; //new in 2.50

$locale['smxml_110'] = "Obecne linki"; //new in 2.50
$locale['smxml_111'] = "Adres linku"; //new in 2.50
$locale['smxml_112'] = "Cz�stotliwo�� i priorytet"; //new in 2.50
$locale['smxml_113'] = "Opcje"; //new in 2.50
$locale['smxml_114'] = "Edycja"; //new in 2.50
$locale['smxml_115'] = "Usu�"; //new in 2.50
$locale['smxml_116'] = "Brak niestandardowych link�w."; //new in 2.50
$locale['smxml_117'] = "Link usuni�ty poprawnie"; //new in 2.50
$locale['smxml_118'] = "Wyst�pi� b��d podczas usuwania linku"; //new in 2.50
$locale['smxml_119'] = "Podaj adres linku"; //new in 2.50
$locale['smxml_120'] = "Link zaktualizowany pomy�lnie"; //new in 2.50
$locale['smxml_121'] = "Wyst�pi� b��d podczas aktualizacji linku"; //new in 2.50
$locale['smxml_122'] = "Link dodany pomy�lnie"; //new in 2.50
$locale['smxml_123'] = "Wyst�pi� b��d podczas dodawania linku"; //new in 2.50
$locale['smxml_124'] = "Aby utrzyma� si� na moich projektach, prosz� wesprzyj mnie datkiem. Wszelkie wp�aty zostan� serdecznie docenione, dzi�ki!"; //new in 2.50
$locale['smxml_125'] = "Adres Twojej strony"; //new in 2.50

//sitemap_submit.php
$locale['smxml_150'] = "Return to Sitemap XML Administration"; //new in 2.60

//sitemapxml_panel.php
$locale['smxml_10'] = "Administracja Sitemap";
$locale['smxml_11'] = "Ostatnio wygenerowano:";
$locale['smxml_12'] = "Wygeneruj ponownie!";

//infusion.php
$locale['smxml_13'] = "Google Sitemap";
$locale['smxml_14'] = "Generuje map� strony Google (XML)";
$locale['smxml_15'] = "Google Sitemap";

?>