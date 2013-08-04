<?php
/*-------------------------------------------------------+
| PHP-Fusion Content Management System
| Copyright © 2002 - 2008 Nick Jones
| http://www.php-fusion.co.uk/
+---------------------------------------------------------+
| Sitemap XML Infusion 3.00
| Author: SoulSmasher © 2008-2013
| web: http://www.soulsmasher.net
| email: soulsmasher@gmail.com
+--------------------------------------------------------+
| This program is released as free software under the
| Affero GPL license. You can redistribute it and/or
| modify it under the terms of this license which you
| can read by viewing the included agpl.txt or online
| at www.gnu.org/licenses/agpl.html. Removal of this
| copyright header is strictly prohibited without
| written permission from the original author(s).
+--------------------------------------------------------*/

if (!defined("IN_FUSION")) { die("Access Denied"); }

if (file_exists(INFUSIONS."sitemapxml/locale/".$settings['locale'].".php")) {
	include_once INFUSIONS."sitemapxml/locale/".$settings['locale'].".php";
} else {
	include_once INFUSIONS."sitemapxml/locale/English.php";
}

include INFUSIONS."sitemapxml/infusion_db.php";

// Infusion Information
$inf_title = $locale['smxml_13'];
$inf_version = "3.00";
$inf_developer = "Arda Kilicdagi (SoulSmasher)";
$inf_email = "soulsmasher@gmail.com";
$inf_weburl = "http://www.arda.pw/";
$inf_description = $locale['smxml_14'];

$inf_folder = "sitemapxml"; // The folder in which the infusion resides.

// Delete any items not required here.
$inf_newtable[1] = DB_SITEMAPXML." (
	update_interval MEDIUMINT(8) UNSIGNED NOT NULL DEFAULT '86400',
	site_url VARCHAR(200) NOT NULL DEFAULT '',
	news_enabled TINYINT(1) UNSIGNED NOT NULL DEFAULT '1',
	news_changefreq TINYINT(1) UNSIGNED NOT NULL DEFAULT '0',
	news_priority VARCHAR(3) NOT NULL DEFAULT '0.6',
	news_limit MEDIUMINT(8) UNSIGNED NOT NULL DEFAULT '0',
	newscats_enabled TINYINT(1) UNSIGNED NOT NULL DEFAULT '1',
	newscats_changefreq TINYINT(1) UNSIGNED NOT NULL DEFAULT '2',
	newscats_priority VARCHAR(3) NOT NULL DEFAULT '0.2',
	newscats_limit MEDIUMINT(8) UNSIGNED NOT NULL DEFAULT '0',
	articlecats_enabled TINYINT(1) UNSIGNED NOT NULL DEFAULT '1',
	articlecats_changefreq TINYINT(1) UNSIGNED NOT NULL DEFAULT '0',
	articlecats_priority VARCHAR(3) NOT NULL DEFAULT '0.2',
	articlecats_limit MEDIUMINT(8) UNSIGNED NOT NULL DEFAULT '0',
	articles_enabled TINYINT(1) UNSIGNED NOT NULL DEFAULT '1',
	articles_changefreq TINYINT(1) UNSIGNED NOT NULL DEFAULT '1',
	articles_priority VARCHAR(3) NOT NULL DEFAULT '0.5',
	articles_limit MEDIUMINT(8) UNSIGNED NOT NULL DEFAULT '0',
	profiles_enabled TINYINT(1) UNSIGNED NOT NULL DEFAULT '1',
	profiles_changefreq TINYINT(1) UNSIGNED NOT NULL DEFAULT '2',
	profiles_priority VARCHAR(3) NOT NULL DEFAULT '0.1',
	profiles_limit MEDIUMINT(8) UNSIGNED NOT NULL DEFAULT '0',
	photoalbums_enabled TINYINT(1) UNSIGNED NOT NULL DEFAULT '1',
	photoalbums_changefreq TINYINT(1) UNSIGNED NOT NULL DEFAULT '0',
	photoalbums_priority VARCHAR(3) NOT NULL DEFAULT '0.2',
	photoalbums_limit MEDIUMINT(8) UNSIGNED NOT NULL DEFAULT '0',
	photos_enabled TINYINT(1) UNSIGNED NOT NULL DEFAULT '1',
	photos_changefreq TINYINT(1) UNSIGNED NOT NULL DEFAULT '0',
	photos_priority VARCHAR(3) NOT NULL DEFAULT '0.3',
	photos_limit MEDIUMINT(8) UNSIGNED NOT NULL DEFAULT '0',
	custompages_enabled TINYINT(1) UNSIGNED NOT NULL DEFAULT '1',
	custompages_changefreq TINYINT(1) UNSIGNED NOT NULL DEFAULT '1',
	custompages_priority VARCHAR(3) NOT NULL DEFAULT '0.3',
	custompages_limit MEDIUMINT(8) UNSIGNED NOT NULL DEFAULT '0',
	faqcats_enabled TINYINT(1) UNSIGNED NOT NULL DEFAULT '1',
	faqcats_changefreq TINYINT(1) UNSIGNED NOT NULL DEFAULT '1',
	faqcats_priority VARCHAR(3) NOT NULL DEFAULT '0.3',
	faqcats_limit MEDIUMINT(8) UNSIGNED NOT NULL DEFAULT '0',
	downloadcats_enabled TINYINT(1) UNSIGNED NOT NULL DEFAULT '1',
	downloadcats_changefreq TINYINT(1) UNSIGNED NOT NULL DEFAULT '2',
	downloadcats_priority VARCHAR(3) NOT NULL DEFAULT '0.3',
	downloadcats_limit MEDIUMINT(8) UNSIGNED NOT NULL DEFAULT '0',
	downloads_enabled TINYINT(1) UNSIGNED NOT NULL DEFAULT '1',
	downloads_changefreq TINYINT(1) UNSIGNED NOT NULL DEFAULT '1',
	downloads_priority VARCHAR(3) NOT NULL DEFAULT '0.4',
	downloads_limit MEDIUMINT(8) UNSIGNED NOT NULL DEFAULT '0',
	weblinkcats_enabled TINYINT(1) UNSIGNED NOT NULL DEFAULT '1',
	weblinkcats_changefreq TINYINT(1) UNSIGNED NOT NULL DEFAULT '2',
	weblinkcats_priority VARCHAR(3) NOT NULL DEFAULT '0.3',
	weblinkcats_limit MEDIUMINT(8) UNSIGNED NOT NULL DEFAULT '0',
	forums_enabled TINYINT(1) UNSIGNED NOT NULL DEFAULT '1',
	forums_changefreq TINYINT(1) UNSIGNED NOT NULL DEFAULT '1',
	forums_priority VARCHAR(3) NOT NULL DEFAULT '0.4',
	forums_limit MEDIUMINT(8) UNSIGNED NOT NULL DEFAULT '0',
	threads_enabled TINYINT(1) UNSIGNED NOT NULL DEFAULT '1',
	threads_changefreq TINYINT(1) UNSIGNED NOT NULL DEFAULT '0',
	threads_priority VARCHAR(3) NOT NULL DEFAULT '0.6',
	threads_limit MEDIUMINT(8) UNSIGNED NOT NULL DEFAULT '0',
	kroaxcats_enabled TINYINT(1) UNSIGNED NOT NULL DEFAULT '0',
	kroaxcats_changefreq TINYINT(1) UNSIGNED NOT NULL DEFAULT '0',
	kroaxcats_priority VARCHAR(3) NOT NULL DEFAULT '0.1',
	kroaxcats_limit MEDIUMINT(8) UNSIGNED NOT NULL DEFAULT '0',
	kroaxvideos_enabled TINYINT(1) UNSIGNED NOT NULL DEFAULT '0',
	kroaxvideos_changefreq TINYINT(1) UNSIGNED NOT NULL DEFAULT '0',
	kroaxvideos_priority VARCHAR(3) NOT NULL DEFAULT '0.3',
	kroaxvideos_limit MEDIUMINT(8) UNSIGNED NOT NULL DEFAULT '0',
	varcadecats_enabled TINYINT(1) UNSIGNED NOT NULL DEFAULT '0',
	varcadecats_changefreq TINYINT(1) UNSIGNED NOT NULL DEFAULT '1',
	varcadecats_priority VARCHAR(3) NOT NULL DEFAULT '0.3',
	varcadecats_limit MEDIUMINT(8) UNSIGNED NOT NULL DEFAULT '0',
	varcadegames_enabled TINYINT(1) UNSIGNED NOT NULL DEFAULT '0',
	varcadegames_changefreq TINYINT(1) UNSIGNED NOT NULL DEFAULT '1',
	varcadegames_priority VARCHAR(3) NOT NULL DEFAULT '0.3',
	varcadegames_limit MEDIUMINT(8) UNSIGNED NOT NULL DEFAULT '0',
	pdpcats_enabled TINYINT(1) UNSIGNED NOT NULL DEFAULT '0',
	pdpcats_changefreq TINYINT(1) UNSIGNED NOT NULL DEFAULT '1',
	pdpcats_priority VARCHAR(3) NOT NULL DEFAULT '0.2',
	pdpcats_limit MEDIUMINT(8) UNSIGNED NOT NULL DEFAULT '0',
	pdpdownloads_enabled TINYINT(1) UNSIGNED NOT NULL DEFAULT '0',
	pdpdownloads_changefreq TINYINT(1) UNSIGNED NOT NULL DEFAULT '1',
	pdpdownloads_priority VARCHAR(3) NOT NULL DEFAULT '0.3',
	pdpdownloads_limit MEDIUMINT(8) UNSIGNED NOT NULL DEFAULT '0',
	tiblogsystem_enabled TINYINT(1) UNSIGNED NOT NULL DEFAULT '0',
	tiblogsystem_changefreq TINYINT(1) UNSIGNED NOT NULL DEFAULT '1',
	tiblogsystem_priority VARCHAR(3) NOT NULL DEFAULT '0.3',
	tiblogsystem_limit MEDIUMINT(8) UNSIGNED NOT NULL DEFAULT '0',
	firmarehberi_enabled TINYINT(1) UNSIGNED NOT NULL DEFAULT '0',
	firmarehberi_changefreq TINYINT(1) UNSIGNED NOT NULL DEFAULT '1',
	firmarehberi_priority VARCHAR(3) NOT NULL DEFAULT '0.3',
	firmarehberi_limit MEDIUMINT(8) UNSIGNED NOT NULL DEFAULT '0',
	firmarehbericats_enabled TINYINT(1) UNSIGNED NOT NULL DEFAULT '0',
	firmarehbericats_changefreq TINYINT(1) UNSIGNED NOT NULL DEFAULT '1',
	firmarehbericats_priority VARCHAR(3) NOT NULL DEFAULT '0.2',
	firmarehbericats_limit MEDIUMINT(8) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=MyISAM;";


$inf_newtable[2] = DB_SITEMAPXML_CUSTOMLINKS." (
	link_id MEDIUMINT(8) UNSIGNED NOT NULL AUTO_INCREMENT,
	link_url TEXT NOT NULL,
	link_frequency TINYINT(1) UNSIGNED NOT NULL DEFAULT '1',
	link_priority VARCHAR(3) NOT NULL DEFAULT '0.4',
	PRIMARY KEY (link_id)
) ENGINE=MyISAM;";


$inf_insertdbrow[1] = DB_SITEMAPXML." (update_interval, site_url) VALUES ('86400','".$settings['siteurl']."')"; //defaults are added automatically / varolan standart değerleri sql den zaten alıyor
$inf_insertdbrow[2] = DB_PANELS." SET panel_name='".$locale['smxml_13']."', panel_filename='sitemapxml_panel', panel_side='3', panel_order='99', panel_type='file', panel_access='0', panel_display='1', panel_status='1' ";

$inf_deldbrow[1] = DB_PANELS." WHERE panel_filename='sitemapxml_panel'";


$inf_adminpanel[1] = array(
	"title" => $locale['smxml_15'],
	"image" => "../../infusions/sitemapxml/google.png",
	"panel" => "sitemap_admin.php",
	"rights" => "XM"
);

$inf_droptable[1] = DB_SITEMAPXML;
$inf_droptable[2] = DB_SITEMAPXML_CUSTOMLINKS;
?>