<?php
/*-------------------------------------------------------+
| PHP-Fusion Content Management System
| Copyright � 2002 - 2008 Nick Jones
| http://www.php-fusion.co.uk/
+--------------------------------------------------------+
| Filename: Hungarian.php
| Version: 3.00
| Author: Arda K�l��da�� (SoulSmasher)
| Web: http://www.soulsmasher.net
+--------------------------------------------------------+
| This program is released as free software under the
| Affero GPL license. You can redistribute it and/or
| modify it under the terms of this license which you
| can read by viewing the included agpl.txt or online
| at www.gnu.org/licenses/agpl.html. Removal of this
| copyright header is strictly prohibited without
| written permission from the original author(s).
+--------------------------------------------------------+/
| A ford�t�st k�sz�tette:
|
| N�v: Rottenbacher Tam�s ( sYska/!/ )
| Weboldal: http://syska.vizipipafan.hu
| Email: syska@vizipipafan.hu
|
| Verzi�: 1.12 ford�t�s, 2.12-es Google Sitemap-hoz.
| F�jl n�v: Hungarian.php
| M�ret: 8KB
| Hely: root/infusions/sitemapxml/locale/Hungarian.php
|
| A ford�t�st eladni, saj�t n�ven terjeszteni szigor�an
| tilos. GPL licensz �rv�nyes erre a ford�t�sra.
| Add tov�bb, jel�ld meg a forr�st, ne m�dos�tsd!
+--------------------------------------------------------*/

//sitemap_admin.php
$locale['smxml_01'] = "Google Sitemap";
$locale['smxml_02'] = "Sitemap gener�lva: ";
$locale['smxml_03'] = "Sitemap megtekint�se!";
$locale['smxml_04'] = "Sitemap �jra gener�l�sa most!";
$locale['smxml_05'] = "Sitemap bek�ld�se a nagyobb b�ng�szoknek!";
$locale['smxml_06'] = "Teljes�tve!";
$locale['smxml_07'] = "Sitemap sikeresen l�tra lett hozva";
$locale['smxml_08'] = "Hiba t�rt�nt!";
$locale['smxml_09'] = "Hiba l�pett fel a gener�l�s sor�n. Az ok lehet: Rossz helyre m�soltad a sitemap.xml-t, a helyes a root mappa. (www.weblapod.hu/sitemap.xml) A m�sik lehets�ges ok, hogy nem �ll�tottad �t az attrib. jogosults�gokat 777-re.";

$locale['smxml_16'] = array ( //new in 2.0
	0 => "Naponta",
	1 => "Hetente",
	2 => "Havonta",
	3 => "�vente"
);
$locale['smxml_17'] = "Be�ll�t�sok elment�se sikeresen megt�rt�nt!"; //new in 2.0
$locale['smxml_18'] = "Hiba l�pett fel a be�ll�t�sok elment�se sor�n!"; //new in 2.0

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


$locale['smxml_43'] = "Be�ll�t�sok ment�se"; //new in 2.01

$locale['smxml_44'] = "Igen"; //new in 2.10
$locale['smxml_45'] = "Nem"; //new in 2.10

$locale['smxml_49'] = "Sitemap automatikus friss�t�s: (m�sodperc)"; //new in 2.10


$locale['smxml_100'] = "Custom Sitemap Pages Section"; //new in 2.50
$locale['smxml_101'] = "Within this section you can add your own URLs which isn't build in to the XML Sitemap.<br />\n Links must not include / at the beginnings. i.e: ".$settings['siteurl']."main.php should be added as main.php, ".$settings['siteurl']."infusions/yourinfusion/yourinfusionpage.php as infusions/yourinfusion/yourinfusionpage.php."; //new in 2.50
$locale['smxml_102'] = "Link Adress"; //new in 2.50
$locale['smxml_103'] = "Link Priority"; //new in 2.50
$locale['smxml_104'] = "Link Frequency"; //new in 2.50
$locale['smxml_105'] = "Save Link"; //new in 2.50

$locale['smxml_110'] = "Current Links"; //new in 2.50
$locale['smxml_111'] = "Link Adress"; //new in 2.50
$locale['smxml_112'] = "Frequency and Priority"; //new in 2.50
$locale['smxml_113'] = "Options"; //new in 2.50
$locale['smxml_114'] = "Edit"; //new in 2.50
$locale['smxml_115'] = "Delete"; //new in 2.50
$locale['smxml_116'] = "No custom links have been added yet."; //new in 2.50
$locale['smxml_117'] = "Link deleted Successfully"; //new in 2.50
$locale['smxml_118'] = "There has been an error while deleting the link"; //new in 2.50
$locale['smxml_119'] = "Link adress cannot be blank"; //new in 2.50
$locale['smxml_120'] = "Link updted successfully"; //new in 2.50
$locale['smxml_121'] = "There has been an error while updating the link"; //new in 2.50
$locale['smxml_122'] = "Link added successfully"; //new in 2.50
$locale['smxml_123'] = "There has been an error while adding the link"; //new in 2.50
$locale['smxml_124'] = "To keep on my projects, please support me by donating. Any donation will be kindly appreciated, Thanks!"; //new in 2.50
$locale['smxml_125'] = "Your Website URL"; //new in 2.50

//sitemap_submit.php
$locale['smxml_150'] = "Return to Sitemap XML Administration"; //new in 2.60

//sitemapxml_panel.php
$locale['smxml_10'] = "Sitemap Admin";
$locale['smxml_11'] = "Utols� gener�l�s ekkor:";
$locale['smxml_12'] = "�j gener�l�sa most!";

//infusion.php
$locale['smxml_13'] = "Google Sitemap (Hun)";
$locale['smxml_14'] = "XML Sitemap gener�tor";
$locale['smxml_15'] = "Google Sitemap (Hun)";

?>