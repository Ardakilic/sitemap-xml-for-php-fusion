<?php
/*-------------------------------------------------------+
| PHP-Fusion Content Management System
| Copyright © 2002 - 2008 Nick Jones
| http://www.php-fusion.co.uk/
+--------------------------------------------------------+
| Filename: Dutch.php
| Version: 3.00
| Author: Arda Kýlýçdaðý (SoulSmasher)
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
$locale['smxml_02'] = "Laatste Sitemap Gemaakt op: ";
$locale['smxml_03'] = "Ga Naar Sitemap!";
$locale['smxml_04'] = "Maak Nu Een Nieuwe Sitemap!";
$locale['smxml_05'] = "Voeg je sitemap toe aan zoekmachines (sitemapwriter.com)!";
$locale['smxml_06'] = "Gelukt!";
$locale['smxml_07'] = "Een Sitemap is succesvol gemaakt";
$locale['smxml_08'] = "Fout!";
$locale['smxml_09'] = "Er is een fout opgetreden bij het aanmaken van de sitemap, het bestand sitemap.xml moet in de root van je site staan en beschrijfbaar zijn (chmod naar 777)";

$locale['smxml_16'] = array ( //new in 2.0
	0 => "dagelijks",
	1 => "wekelijks",
	2 => "maandelijks",
	3 => "jaarlijks"
);
$locale['smxml_17'] = "Instellingen correct opgeslagen!"; //new in 2.0
$locale['smxml_18'] = "Er is een fout opgetreden bij het opslaan van de instellingen"; //new in 2.0

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


$locale['smxml_43'] = "Instellingen Opslaan!"; //new in 2.01

$locale['smxml_44'] = "JA"; //new in 2.10
$locale['smxml_45'] = "Nee"; //new in 2.10

$locale['smxml_49'] = "Vernieuwing Sitemap interval (seconden)"; //new in 2.10


$locale['smxml_100'] = "Aangepaste Sitemap Pagina"; //new in 2.50
$locale['smxml_101'] = "Hier kun je je eigen URL's toevoegen welke niet zijn ingebouwd in de XML Sitemap.<br />\n Links mogen geen  / aan het begin hebben. bijv.: ".$settings['siteurl']."main.php moet worden toegevoegd als main.php, ".$settings['siteurl']."infusions/je_infusion/je_infusionpagina.php als infusions/je_infusion/je_infusionpagina.php."; //new in 2.50
$locale['smxml_102'] = "Link Adres"; //new in 2.50
$locale['smxml_103'] = "Link Prioriteit"; //new in 2.50
$locale['smxml_104'] = "Link Frequentie"; //new in 2.50
$locale['smxml_105'] = "Link Opslaan"; //new in 2.50

$locale['smxml_110'] = "Huidige Links"; //new in 2.50
$locale['smxml_111'] = "Link Adres"; //new in 2.50
$locale['smxml_112'] = "Frequentie en Prioriteit"; //new in 2.50
$locale['smxml_113'] = "Opties"; //new in 2.50
$locale['smxml_114'] = "Wijzig"; //new in 2.50
$locale['smxml_115'] = "Verwijder"; //new in 2.50
$locale['smxml_116'] = "Er zijn nog geen aangepaste links toegevoegd."; //new in 2.50
$locale['smxml_117'] = "Link Succesvol Verwijderd"; //new in 2.50
$locale['smxml_118'] = "Er is een fout opgetreden tijdens het verwijderen van de link"; //new in 2.50
$locale['smxml_119'] = "Link adres mag niet leeg zijn"; //new in 2.50
$locale['smxml_120'] = "Link succesvol opgeslagen"; //new in 2.50
$locale['smxml_121'] = "Er is een fout opgetreden bij het opslaan van de link"; //new in 2.50
$locale['smxml_122'] = "Link succesvol toegevoegd"; //new in 2.50
$locale['smxml_123'] = "Er is een fout opgetreden bij het toevoegen van de link"; //new in 2.50
$locale['smxml_124'] = "Om mijn projecten te steunen vraag ik je om te doneren. Elke donatie wordt erg gewaardeerd, Bedankt!"; //new in 2.50
$locale['smxml_125'] = "Je Website URL"; //new in 2.50

//sitemap_submit.php
$locale['smxml_150'] = "Return to Sitemap XML Administration"; //new in 2.60

//sitemapxml_panel.php
$locale['smxml_10'] = "Sitemap Administratie";
$locale['smxml_11'] = "Laatste Aanmaak:";
$locale['smxml_12'] = "Nu Aanmaken!";

//infusion.php
$locale['smxml_13'] = "Google Sitemap";
$locale['smxml_14'] = "Google XML Sitemap Aanmaken";
$locale['smxml_15'] = "Google Sitemap";

?>