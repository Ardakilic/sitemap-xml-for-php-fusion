<?php
/*-------------------------------------------------------+
| PHP-Fusion Content Management System
| Copyright � 2002 - 2008 Nick Jones
| http://www.php-fusion.co.uk/
+--------------------------------------------------------+
| Filename: Swedish.php
| Version: 2.51
| Author: etxgmg
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
$locale['smxml_01'] = "Google Webbplatskarta";
$locale['smxml_02'] = "Tidpunkt f�r generering av Webbplatskarta: ";
$locale['smxml_03'] = "G� till Webbplatskarta";
$locale['smxml_04'] = "Generera Webbplatskarta";
$locale['smxml_05'] = "Ladda upp din Webbplatskarta till s�kmotorer (till lista som tillhandah�lls av sitemapwriter.com)";
$locale['smxml_06'] = "Klart!";
$locale['smxml_07'] = "Webbplatskarta har skapats";
$locale['smxml_08'] = "Fel!";
$locale['smxml_09'] = "Det blev ett fel n�r Webbplatskartan skapades, filen sitemap.xml m�ste finnas i PHP-Fusion's root-katalog och dess chmod (r�ttigheter) m�ste vara 777";

$locale['smxml_16'] = array ( //new in 2.0
	0 => "varje dag",
	1 => "varje vecka",
	2 => "varje m�nad",
	3 => "varje �r"
);
$locale['smxml_17'] = "Inst�llningarna sparade"; //new in 2.0
$locale['smxml_18'] = "Det blev ett fel n�r inst�llningarna skulle sparas"; //new in 2.0

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

$locale['smxml_43'] = "Spara inst�llningar"; //new in 2.01

$locale['smxml_44'] = "Ja"; //new in 2.10
$locale['smxml_45'] = "Nej"; //new in 2.10

$locale['smxml_49'] = "Webbplatskartans genereringsintervall (sekunder)"; //new in 2.10

$locale['smxml_100'] = "Avdelning med egen-konfigurerade XML-sidor"; //new in 2.50
$locale['smxml_101'] = "Inom denna avdelning kan du l�gga till egna URL:ar som inte �r inbyggda i XML Webbplatskartan.<br />\n L�nkar f�r inte b�rja med / , exempelvis s� ska ".$settings['siteurl']."start.php l�ggas till som start.php och ".$settings['siteurl']."infusions/yourinfusion/yourinfusionpage.php som infusions/yourinfusion/yourinfusionpage.php."; //new in 2.50
$locale['smxml_102'] = "L�nkadress"; //new in 2.50
$locale['smxml_103'] = "Prioritet L�nk"; //new in 2.50
$locale['smxml_104'] = "Frekvens L�nk"; //new in 2.50
$locale['smxml_105'] = "Spara L�nk"; //new in 2.50

$locale['smxml_110'] = "Egen-konfigurerade L�nkar"; //new in 2.50
$locale['smxml_111'] = "L�nkadress"; //new in 2.50
$locale['smxml_112'] = "Frekvens och Prioritet"; //new in 2.50
$locale['smxml_113'] = "�tg�rder"; //new in 2.50
$locale['smxml_114'] = "Redigera"; //new in 2.50
$locale['smxml_115'] = "Radera"; //new in 2.50
$locale['smxml_116'] = "Inga egna l�nkar har lagts till �nnu."; //new in 2.50
$locale['smxml_117'] = "L�nk borttagen"; //new in 2.50
$locale['smxml_118'] = "Det blev ett fel n�r l�nken skulle tas bort"; //new in 2.50
$locale['smxml_119'] = "L�nkadressen kan inte vara tom"; //new in 2.50
$locale['smxml_120'] = "L�nken uppdaterad"; //new in 2.50
$locale['smxml_121'] = "Det blev ett fel n�r l�nken uppdaterades"; //new in 2.50
$locale['smxml_122'] = "L�nk tillagd"; //new in 2.50
$locale['smxml_123'] = "Det blev ett fel n�r l�nken lades till"; //new in 2.50
$locale['smxml_124'] = "F�r att jag ska kunna forts�tta med mina projekt, v�nligen st�d mig genom en donation. Varje donation tas emot med gl�dje, Tack!"; //new in 2.50
$locale['smxml_125'] = "Din webbadress (URL)"; //new in 2.50

//sitemap_submit.php
$locale['smxml_150'] = "Return to Sitemap XML Administration"; //new in 2.60

//sitemapxml_panel.php
$locale['smxml_10'] = "Webbplatskarta Administration";
$locale['smxml_11'] = "Senaste generering:";
$locale['smxml_12'] = "Generera nu";

//infusion.php
$locale['smxml_13'] = "Google Webbplatskarta";
$locale['smxml_14'] = "Genererar en Google XML Webbplatskarta";
$locale['smxml_15'] = "Google Webbplatskarta";

?>