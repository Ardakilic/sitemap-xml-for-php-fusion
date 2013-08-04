<?php
/*-------------------------------------------------------+
| PHP-Fusion Content Management System
| Copyright © 2002 - 2008 Nick Jones
| http://www.php-fusion.co.uk/
+--------------------------------------------------------+
| Filename: sitemap_admin.php
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
require "../../maincore.php";

require_once THEMES."templates/admin_header.php";
include INFUSIONS."sitemapxml/infusion_db.php";
require_once INFUSIONS."sitemapxml/sitemap_functions.php";
/*
if (file_exists(INFUSIONS."sitemapxml/locale/".$settings['locale'].".php")) {
	include_once INFUSIONS."sitemapxml/locale/".$settings['locale'].".php";
} else {
	include_once INFUSIONS."sitemapxml/locale/English.php";
}*/
if (!checkrights("XM") || !defined("iAUTH") || $_GET['aid'] != iAUTH) { redirect("../../index.php"); }

//tanýmladýk ki daha hýzlý olsun , we defined the siteurl for optimization
if (!defined("XMLSITEURL")) { define("XMLSITEURL", $sitemapsettings['site_url']); }


opentable($locale['smxml_05']);

echo "<div style='text-align: center'><a href='".INFUSIONS."sitemapxml/sitemap_admin.php".$aidlink."'><strong>".$locale['smxml_150']."</strong></a></div>\n";

opentable("Google");
echo "<iframe src='http://www.google.com/webmasters/sitemaps/ping?sitemap=".XMLSITEURL."sitemap.xml' width='450' height='300'><p>Your browser does not support iframes.</p></iframe>\n";
closetable();

opentable("Yahoo");
echo "<iframe src='http://search.yahooapis.com/SiteExplorerService/V1/updateNotification?appid=soulsmasher&amp;url=".XMLSITEURL."sitemap.xml' width='450' height='300'><p>Your browser does not support iframes.</p></iframe>\n";
closetable();

opentable("Ask.com");
echo "<iframe src='http://submissions.ask.com/ping?sitemap=".XMLSITEURL."sitemap.xml' width='450' height='300'><p>Your browser does not support iframes.</p></iframe>\n";
closetable();

opentable("Bing (Microsoft Live Search)");
echo "<iframe src='http://www.bing.com/webmaster/ping.aspx?siteMap=".XMLSITEURL."sitemap.xml' width='450' height='300'><p>Your browser does not support iframes.</p></iframe>\n";
closetable();

opentable("Moreover");
echo "<iframe src='http://rpc.weblogs.com/pingSiteForm?name=".urlencode($settings['sitename'])."&url=".XMLSITEURL."/sitemap.xml' width='450' height='300'><p>Your browser does not support iframes.</p></iframe>\n";
closetable();

closetable();
require_once THEMES."templates/footer.php";
?>