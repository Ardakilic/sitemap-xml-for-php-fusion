<?php
/*-------------------------------------------------------+
| PHP-Fusion Content Management System
| Copyright © 2002 - 2009 Nick Jones
| http://www.php-fusion.co.uk/
+--------------------------------------------------------+
| Filename: sitemapxml_panel.php
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
if (!defined("IN_FUSION")) { die("Acecss Denied"); }

require_once INFUSIONS."sitemapxml/infusion_db.php";
require_once INFUSIONS."sitemapxml/sitemap_functions.php";


if((time()-filemtime(BASEDIR."sitemap.xml"))>$sitemapsettings['update_interval']) {
	make_sitemapxml();
}


if (checkrights("XM") && iADMIN && defined("iAUTH")) {
	openside($locale['smxml_10']);
	echo $locale['smxml_11']."<br />\n";
	echo showdate("longdate",filemtime(BASEDIR."sitemap.xml"));
	echo "<br />\n";
	echo "<a href='".INFUSIONS."sitemapxml/sitemap_admin.php".$aidlink."&amp;force=1'>".$locale['smxml_12']."</a>\n";
	closeside();
}


?>