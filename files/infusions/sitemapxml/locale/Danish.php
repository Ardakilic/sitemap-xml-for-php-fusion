<?php  // Danish translation by Helmuth Mikkelsen, Nov. 13. 2008; edited Oct. 3. 2010
/*-------------------------------------------------------+
| PHP-Fusion Content Management System
| Copyright © 2002 - 2008 Nick Jones
| http://www.php-fusion.co.uk/
+--------------------------------------------------------+
| Filename: Danish.php
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
$locale['smxml_02'] = "Sitemap oprettet: ";
$locale['smxml_03'] = "Gå til sitemap!";
$locale['smxml_04'] = "Opret sitemap nu!";
$locale['smxml_05'] = "Indsend din sitemap til søgemaskiner!";
$locale['smxml_06'] = "Gennemført!";
$locale['smxml_07'] = "Sitemap er nu blevet oprettet";
$locale['smxml_08'] = "Fejl!";
$locale['smxml_09'] = "En fejl opstod under oprettelse af sitemap, filen sitemap.xml skal ligge i php-fusions rod-folder og dens chmod skal være 777";

$locale['smxml_16'] = array ( //new in 2.0
	0 => "dagligt",
	1 => "ugentlig",
	2 => "månedligt",
	3 => "årligt"
);
$locale['smxml_17'] = "Indstillinger gemt!"; //new in 2.0
$locale['smxml_18'] = "En fejl opstod da indstillinger skulle gemmes"; //new in 2.0

$locale['smxml_200'] = "Komponent"; //New in 3.0
$locale['smxml_201'] = "Aktiver?"; //New in 3.0
$locale['smxml_202'] = "Prioritet"; //New in 3.0
$locale['smxml_203'] = "Frekvens"; //New in 3.0
$locale['smxml_204'] = "Emner (0=Ubegrænset)"; //New in 3.0


$locale['smxml_210'] = "Nyheder"; //New in 3.0
$locale['smxml_211'] = "Nyheds kategorier"; //New in 3.0
$locale['smxml_212'] = "Artikler"; //New in 3.0
$locale['smxml_213'] = "Artikel kategorier"; //New in 3.0
$locale['smxml_214'] = "Profiler"; //New in 3.0
$locale['smxml_215'] = "Foto albums"; //New in 3.0
$locale['smxml_216'] = "Fotos"; //New in 3.0
$locale['smxml_217'] = "Brugeroprettede sider"; //New in 3.0
$locale['smxml_218'] = "FAQ kategorier"; //New in 3.0
$locale['smxml_219'] = "Download kategorier"; //New in 3.0
$locale['smxml_220'] = "Downloads"; //New in 3.0
$locale['smxml_221'] = "Link kategorier"; //New in 3.0
$locale['smxml_222'] = "Forum kategorier"; //New in 3.0
$locale['smxml_223'] = "Forum tråde"; //New in 3.0
$locale['smxml_224'] = "Kroax kategorier"; //New in 3.0
$locale['smxml_225'] = "Kroax videoer"; //New in 3.0
$locale['smxml_226'] = "VArcade kategorier"; //New in 3.0
$locale['smxml_227'] = "VArcade spil"; //New in 3.0
$locale['smxml_228'] = "Pro Download element kategorier"; //New in 3.0
$locale['smxml_229'] = "Pro Download element downloads"; //New in 3.0
$locale['smxml_230'] = "Ti Blog system"; //New in 3.0
$locale['smxml_231'] = "Firma Rehberi (Firma katalog system)"; //New in 3.0
$locale['smxml_232'] = "Firma Rehberi kategorier"; //New in 3.0


$locale['smxml_43'] = "Gem indstillinger!"; //new in 2.01

$locale['smxml_44'] = "Ja"; //new in 2.10
$locale['smxml_45'] = "Nej"; //new in 2.10

$locale['smxml_49'] = "Sitemap regenererings interval (sekunder)"; //new in 2.10



$locale['smxml_100'] = "Bruger sitemap side sektion"; //new in 2.50
$locale['smxml_101'] = "Indenfor denne sektion kan du tilføje dine egne URL'er som ikke er indbygget i  XML Sitemap.<br />\n Links må ikke indeholde / i starten. F.eks. ".$settings['siteurl']."main.php tilføjes som main.php, ".$settings['siteurl']."infusions/dininfusion/dininfusionside.php som infusions/dininfusion/dininfusionside.php."; //new in 2.50
$locale['smxml_102'] = "Link adresse"; //new in 2.50
$locale['smxml_103'] = "Link priotitet"; //new in 2.50
$locale['smxml_104'] = "Link frekvens"; //new in 2.50
$locale['smxml_105'] = "Gem link"; //new in 2.50

$locale['smxml_110'] = "Nuværende links"; //new in 2.50
$locale['smxml_111'] = "Link adresse"; //new in 2.50
$locale['smxml_112'] = "Frekvens og prioritet"; //new in 2.50
$locale['smxml_113'] = "Valg"; //new in 2.50
$locale['smxml_114'] = "Rediger"; //new in 2.50
$locale['smxml_115'] = "Slet"; //new in 2.50
$locale['smxml_116'] = "Der er ikke tilføjet bruger links endnu."; //new in 2.50
$locale['smxml_117'] = "Link er nu slettet"; //new in 2.50
$locale['smxml_118'] = "En fejl opstod under sletning af link"; //new in 2.50
$locale['smxml_119'] = "Link adresse kan ikke være blank"; //new in 2.50
$locale['smxml_120'] = "Link er nu opdateret"; //new in 2.50
$locale['smxml_121'] = "En fejl opstod under opdatering af link"; //new in 2.50
$locale['smxml_122'] = "Link er blevet tilføjet"; //new in 2.50
$locale['smxml_123'] = "En fejl opstod under tilføjelse af link"; //new in 2.50
$locale['smxml_124'] = "For at kunne fortsætte mine projekter, støt da venligst ved at donere. Enhver donation vil blive højt værdsat, tak!"; //new in 2.50
$locale['smxml_125'] = "Din hjemmeside URL"; //new in 2.50

//sitemap_submit.php
$locale['smxml_150'] = "Tilbage til Sitemap XML administration"; //new in 2.60

//sitemapxml_panel.php
$locale['smxml_10'] = "Sitemap administration";
$locale['smxml_11'] = "Seneste version:";
$locale['smxml_12'] = "Genopfrisk nu!";

//infusion.php
$locale['smxml_13'] = "Google Sitemap";
$locale['smxml_14'] = "Opretter en Google XML sitemap";
$locale['smxml_15'] = "Google Sitemap";

?>