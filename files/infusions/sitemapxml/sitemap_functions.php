<?php
/*-------------------------------------------------------+
| PHP-Fusion Content Management System
| Copyright © 2002 - 2009 Nick Jones
| http://www.php-fusion.co.uk/
+--------------------------------------------------------+
| Filename: sitemap_functions.php
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

if (!defined("IN_FUSION") || !defined("DB_SITEMAPXML")) { die("Access Denied"); }

//for form functions
if (file_exists(INFUSIONS."sitemapxml/locale/".$settings['locale'].".php")) {
	include_once INFUSIONS."sitemapxml/locale/".$settings['locale'].".php";
} else {
	include_once INFUSIONS."sitemapxml/locale/English.php";
}
//for form functions

//for sitemap settings
$sitemapsettings=dbarray(dbquery("SELECT * FROM ".DB_SITEMAPXML));
//for sitemap settings

//tanýmladýk ki daha hýzlý olsun , we defined the siteurl for optimization
if (!defined("XMLSITEURL")) { define("XMLSITEURL", $sitemapsettings['site_url']); }

//bu fonksiyon kýsýtlý alanlarýn forumda görünümünü engellemek için lazým, düz üyelerin görebileceði þekilde ayarlandý
//this function is needed for accessibility on auto generated sitemap, because we don't want to make restricted areas show on xml, do we ;)
function groupxmlaccess($field) {
	return "($field='0' OR $field='101')";
}

// Check if user is assigned to the specified user group for sitemap xml
function checkxmlgroup($group) {
	if ($group == "0" || $group == "101") { 
	return true;
	} else {
	return false;
	}
}


//sitemap.xml için date fonksiyonu - date function for sitemap.xml for <lastmod> tags
function makexmldate($date) {
	//return date(DATE_ATOM,$date);
	return date('Y-m-d\TH:i:s',$date).substr_replace(date('O',$date),':',3,0); //for compatibility for old php versions
}

function generate_sitemapxml() {
global $sitemapsettings;
mt_srand((double)microtime()*1000000); //memoryde random için yer ayarlýyor


//içerik baþlýyor burada yazýlmaya
$content = "<?xml version='1.0' encoding='UTF-8'?>\n\n";
$content.= "<?xml-stylesheet type='text/xsl' href='".XMLSITEURL."infusions/sitemapxml/sitemap.xsl'?>\n\n";
$content.= "<!-- generator='Google Sitemap Generator 3.00 By Arda Kilicdagi (SoulSmasher)' -->\n<!-- sitemap-generator-url='http://www.soulsmasher.net/google-xml-sitemap-for-php-fusion/' sitemap-generator-version='3.00' -->\n
<!-- generated-on='".date("F j, Y g:i a")."' -->\n\n"; //lütfen copyright silmeyin zaten site haritasýnda gözükmez bu yorum içindir, please don't delete this line, this is just a comment
$content.= "<urlset xmlns:xsi='http://www.w3.org/2001/XMLSchema-instance' xsi:schemaLocation='http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd' xmlns='http://www.sitemaps.org/schemas/sitemap/0.9'>\n\n";


//haberleri dizelim - News
if ($sitemapsettings['news_enabled']==1) {
$limiter=$sitemapsettings['news_limit']?" LIMIT ".$sitemapsettings['news_limit']:"";
$result=dbquery("SELECT news_id, news_datestamp FROM ".DB_NEWS." WHERE ".groupxmlaccess('news_visibility')." AND (news_start='0'||news_start<=".time().") AND (news_end='0'||news_end>=".time().") AND news_draft='0' ORDER BY news_id DESC".$limiter);
$rows = dbrows($result);
	if ($rows!=0) {
		while ($data = dbarray($result)) {
					$content.= "\t<url>\n";
					$content.= "\t\t<loc>".XMLSITEURL."news.php?readmore=".$data['news_id']."</loc>\n";
					$content.= "\t\t<lastmod>".makexmldate($data['news_datestamp'])."</lastmod>\n";
					$content.= "\t\t<priority>".$sitemapsettings['news_priority']."</priority>\n";
					$content.= "\t\t<changefreq>".makechangefreq($sitemapsettings['news_changefreq'])."</changefreq>\n"; 
					$content.= "\t</url>\n";
		}
	}
}

//2.00 ile geldi , new with 2.00 - news cats - haber kategorileri
if ($sitemapsettings['newscats_enabled']==1) {
$limiter=$sitemapsettings['newscats_limit']?" LIMIT ".$sitemapsettings['newscats_limit']:"";
$result = dbquery("SELECT news_cat_id FROM ".DB_NEWS_CATS." ORDER BY news_cat_id DESC".$limiter);
$rows=dbrows($result);
	if ($rows!=0) {
		while ($data=dbarray($result)) {
					$content.= "\t<url>\n";
					$content.= "\t\t<loc>".XMLSITEURL."news_cats.php?cat_id=".$data['news_cat_id']."</loc>\n";
					$content.= "\t\t<priority>".$sitemapsettings['newscats_priority']."</priority>\n";
					$content.= "\t\t<changefreq>".makechangefreq($sitemapsettings['newscats_changefreq'])."</changefreq>\n"; 
					$content.= "\t</url>\n";
		}
	}
}
	
//inceleme kategorileri - Article Categories
if ($sitemapsettings['articlecats_enabled']==1) {
$limiter=$sitemapsettings['articlecats_limit']?" LIMIT ".$sitemapsettings['articlecats_limit']:"";
$result = dbquery("SELECT article_cat_id FROM ".DB_ARTICLE_CATS." WHERE ".groupxmlaccess('article_cat_access')." ORDER BY article_cat_name ASC".$limiter);
$rows = dbrows($result);
	if ($rows!=0) {
		while ($data = dbarray($result)) {
					$content.= "\t<url>\n";
					$content.= "\t\t<loc>".XMLSITEURL."articles.php?cat_id=".$data['article_cat_id']. "</loc>\n";
					$content.= "\t\t<priority>".$sitemapsettings['articlecats_priority']."</priority>\n";
					$content.= "\t\t<changefreq>".makechangefreq($sitemapsettings['articlecats_changefreq'])."</changefreq>\n";
					$content.= "\t</url>\n";
		}
	}
}
	
//Ýncelemeler - Articles
if ($sitemapsettings['articles_enabled']==1) {
$limiter=$sitemapsettings['articles_limit']?" LIMIT ".$sitemapsettings['articles_limit']:"";
$result = dbquery(
	"SELECT ta.article_id, ta.article_datestamp, tac.article_cat_id FROM ".DB_ARTICLES." ta
	INNER JOIN ".DB_ARTICLE_CATS." tac ON ta.article_cat=tac.article_cat_id WHERE ".groupxmlaccess('article_cat_access')." AND article_draft='0' ORDER BY article_datestamp DESC".$limiter
);
$rows = dbrows($result);
	if ($rows!=0) {
		while ($data = dbarray($result)) {
					$content.= "\t<url>\n";
					$content.= "\t\t<loc>".XMLSITEURL."articles.php?article_id=".$data['article_id']."</loc>\n";
					$content.= "\t\t<lastmod>".makexmldate($data['article_datestamp'])."</lastmod>\n";
					$content.= "\t\t<priority>".$sitemapsettings['articles_priority']."</priority>\n";
					$content.= "\t\t<changefreq>".makechangefreq($sitemapsettings['articles_changefreq'])."</changefreq>\n";
					$content.= "\t</url>\n";
		}
	}
}

//Ýncelemeler - Articles
if ($sitemapsettings['profiles_enabled']==1) {
$limiter=$sitemapsettings['profiles_limit']?" LIMIT ".$sitemapsettings['profiles_limit']:"";
$result = dbquery("SELECT user_id FROM ".DB_USERS." WHERE user_status='0' ORDER BY user_id ASC".$limiter);
$rows = dbrows($result);
	if ($rows!=0) {
		while ($data = dbarray($result)) {
					$content.= "\t<url>\n";
					$content.= "\t\t<loc>".XMLSITEURL."profile.php?lookup=".$data['user_id']."</loc>\n";
					//$content.= "\t\t<lastmod>".makexmldate($data['article_datestamp'])."</lastmod>\n";
					$content.= "\t\t<priority>".$sitemapsettings['profiles_priority']."</priority>\n";
					$content.= "\t\t<changefreq>".makechangefreq($sitemapsettings['profiles_changefreq'])."</changefreq>\n";
					$content.= "\t</url>\n";
		}
	}
}

//Resim Albümleri - Photoalbums
if ($sitemapsettings['photoalbums_enabled']==1) {
$limiter=$sitemapsettings['photoalbums_limit']?" LIMIT ".$sitemapsettings['photoalbums_limit']:"";
$result = dbquery("SELECT album_id, album_datestamp FROM ".DB_PHOTO_ALBUMS." WHERE ".groupxmlaccess('album_access')." ORDER BY album_datestamp ASC".$limiter);
$rows = dbrows($result);
if ($rows!=0) {
	while ($data = dbarray($result)) {
				$content.= "\t<url>\n";
				$content.= "\t\t<loc>".XMLSITEURL."photogallery.php?album_id=".$data['album_id']. "</loc>\n";
				$content.= "\t\t<lastmod>".makexmldate($data['album_datestamp'])."</lastmod>\n";
				$content.= "\t\t<priority>".$sitemapsettings['photoalbums_priority']."</priority>\n";
				$content.= "\t\t<changefreq>".makechangefreq($sitemapsettings['photoalbums_changefreq'])."</changefreq>\n";
				$content.= "\t</url>\n";
		}
	}
}

//Resimler - Photos
if ($sitemapsettings['photos_enabled']==1) {
$limiter=$sitemapsettings['photos_limit']?" LIMIT ".$sitemapsettings['photos_limit']:"";
$result = dbquery("SELECT tp.photo_id, tp.photo_datestamp, ta.album_access FROM ".DB_PHOTOS." tp LEFT JOIN ".DB_PHOTO_ALBUMS." ta USING (album_id) ORDER BY tp.photo_datestamp ASC".$limiter);
$rows = dbrows($result);
if ($rows!=0) {
	while ($data = dbarray($result)) {
		if (checkxmlgroup($data['album_access'])) {
				$content.= "\t<url>\n";
				$content.= "\t\t<loc>".XMLSITEURL."photogallery.php?photo_id=".$data['photo_id']. "</loc>\n";
				$content.= "\t\t<lastmod>".makexmldate($data['photo_datestamp'])."</lastmod>\n";
				$content.= "\t\t<priority>".$sitemapsettings['photos_priority']."</priority>\n";
				$content.= "\t\t<changefreq>".makechangefreq($sitemapsettings['photos_changefreq'])."</changefreq>\n";
				$content.= "\t</url>\n";
			}
		}
	}
}

//özel sayfalar - Custom pages
if ($sitemapsettings['custompages_enabled']==1) {
$limiter=$sitemapsettings['custompages_limit']?" LIMIT ".$sitemapsettings['custompages_limit']:"";
$result = dbquery("SELECT page_id FROM ".DB_CUSTOM_PAGES." WHERE ".groupxmlaccess('page_access')." ORDER BY page_title ASC".$limiter);
$rows = dbrows($result);
if ($rows!=0) {
	while ($data = dbarray($result)) {
				$content.= "\t<url>\n";
				$content.= "\t\t<loc>".XMLSITEURL."viewpage.php?page_id=".$data['page_id']. "</loc>\n";
				$content.= "\t\t<priority>".$sitemapsettings['custompages_priority']."</priority>\n";
				$content.= "\t\t<changefreq>".makechangefreq($sitemapsettings['custompages_changefreq'])."</changefreq>\n";
				$content.= "\t</url>\n";
		}
	}
}

//SSS kategorileri - FAQ Cats
if ($sitemapsettings['faqcats_enabled']==1) {
$limiter=$sitemapsettings['faqcats_limit']?" LIMIT ".$sitemapsettings['faqcats_limit']:"";
$result = dbquery("SELECT faq_cat_id FROM ".DB_FAQ_CATS." ORDER BY faq_cat_name ASC".$limiter);
$rows = dbrows($result);
if ($rows!=0) {
	while ($data = dbarray($result)) {
				$content.= "\t<url>\n";
				$content.= "\t\t<loc>".XMLSITEURL."faq.php?cat_id=".$data['faq_cat_id']. "</loc>\n";
				$content.= "\t\t<priority>".$sitemapsettings['faqcats_priority']."</priority>\n";
				$content.= "\t\t<changefreq>".makechangefreq($sitemapsettings['faqcats_changefreq'])."</changefreq>\n";
				$content.= "\t</url>\n";
		}
	}
}
	
//download kategorileri - download cats
if ($sitemapsettings['downloadcats_enabled']==1) {
$limiter=$sitemapsettings['downloadcats_limit']?" LIMIT ".$sitemapsettings['downloadcats_limit']:"";
$result = dbquery("SELECT download_cat_id FROM ".DB_DOWNLOAD_CATS." WHERE ".groupxmlaccess('download_cat_access')." ORDER BY download_cat_name ASC".$limiter);
$rows = dbrows($result);
if ($rows!=0) {
	while ($data = dbarray($result)) {
				$content.= "\t<url>\n";
				$content.= "\t\t<loc>".XMLSITEURL."downloads.php?cat_id=".$data['download_cat_id']."</loc>\n";
				$content.= "\t\t<priority>".$sitemapsettings['downloadcats_priority']."</priority>\n";
				$content.= "\t\t<changefreq>".makechangefreq($sitemapsettings['downloadcats_changefreq'])."</changefreq>\n";
				$content.= "\t</url>\n";
		}
	}
}
	
//dosyalar - downloads
if ($sitemapsettings['downloads_enabled']==1) {
$limiter=$sitemapsettings['downloads_limit']?" LIMIT ".$sitemapsettings['downloads_limit']:"";
$result = dbquery("SELECT download_cat,download_datestamp,download_id FROM ".DB_DOWNLOADS." ORDER BY download_datestamp DESC".$limiter);
$rows = dbrows($result);
if ($rows!=0) {
	while ($data = dbarray($result)) {
				$content.= "\t<url>\n";
				$content.= "\t\t<loc>".XMLSITEURL."downloads.php?cat_id=".$data['download_cat']."&amp;download_id=".$data['download_id']."</loc>\n";
				$content.= "\t\t<lastmod>".makexmldate($data['download_datestamp'])."</lastmod>\n";
				$content.= "\t\t<priority>".$sitemapsettings['downloads_priority']."</priority>\n";
				$content.= "\t\t<changefreq>".makechangefreq($sitemapsettings['downloads_changefreq'])."</changefreq>\n";
				$content.= "\t</url>\n";
		}
	}
}
	
//web linki kategorileri - weblink cats
if ($sitemapsettings['weblinkcats_enabled']==1) {
$limiter=$sitemapsettings['weblinkcats_limit']?" LIMIT ".$sitemapsettings['weblinkcats_limit']:"";
$result = dbquery("SELECT * FROM ".DB_WEBLINK_CATS." WHERE ".groupxmlaccess('weblink_cat_access')." ORDER BY weblink_cat_name ASC".$limiter);
$rows = dbrows($result);
if ($rows!=0) {
	while ($data = dbarray($result)) {
				$content.= "\t<url>\n";
				$content.= "\t\t<loc>".XMLSITEURL."weblinks.php?cat_id=".$data['weblink_cat_id']. "</loc>\n";
				$content.= "\t\t<priority>".$sitemapsettings['weblinkcats_priority']."</priority>\n";
				$content.= "\t\t<changefreq>".makechangefreq($sitemapsettings['weblinkcats_changefreq'])."</changefreq>\n";
				$content.= "\t</url>\n";
		}
	}
}


//forumlar - forums
if ($sitemapsettings['forums_enabled']==1) {
//for forum/index.php
				$content.= "\t<url>\n";
				$content.= "\t\t<loc>".XMLSITEURL."forum/index.php</loc>\n";
				//$content.= "\t\t<lastmod>".makexmldate($data['forum_lastpost'])."</lastmod>\n";
				$content.= "\t\t<priority>".$sitemapsettings['forums_priority']."</priority>\n";
				$content.= "\t\t<changefreq>".makechangefreq($sitemapsettings['forums_changefreq'])."</changefreq>\n";
				$content.= "\t</url>\n";
//for forum/index.php end
$limiter=$sitemapsettings['forums_limit']?" LIMIT ".$sitemapsettings['forums_limit']:"";
$result = dbquery("SELECT forum_id FROM ".DB_FORUMS." WHERE ".groupxmlaccess('forum_access')." AND forum_cat!=0 ORDER BY forum_order ASC".$limiter);
$rows = dbrows($result);
if ($rows!=0) {
	while ($data = dbarray($result)) {
				$content.= "\t<url>\n";
				$content.= "\t\t<loc>".XMLSITEURL."forum/viewforum.php?forum_id=".$data['forum_id']."</loc>\n";
				//$content.= "\t\t<lastmod>".makexmldate($data['forum_lastpost'])."</lastmod>\n";
				$content.= "\t\t<priority>".$sitemapsettings['forums_priority']."</priority>\n";
				$content.= "\t\t<changefreq>".makechangefreq($sitemapsettings['forums_changefreq'])."</changefreq>\n";
				$content.= "\t</url>\n";
		}
	}
}
	
//popüler forum baþlýklarý - popular threads
if ($sitemapsettings['threads_enabled']==1) {
$limiter=$sitemapsettings['threads_limit']?" LIMIT ".$sitemapsettings['threads_limit']:"";
$result = dbquery("
	SELECT tt.thread_id,tt.thread_lastpost FROM ".DB_THREADS." tt
	INNER JOIN ".DB_FORUMS." tf ON tt.forum_id=tf.forum_id
	WHERE ".groupxmlaccess('forum_access')."
	ORDER BY thread_postcount DESC".$limiter
	);
$rows = dbrows($result);
if ($rows!=0) {
	while ($data = dbarray($result)) {
				$content.= "\t<url>\n";
				$content.= "\t\t<loc>".XMLSITEURL."forum/viewthread.php?thread_id=".$data['thread_id']."</loc>\n";
				$content.= "\t\t<lastmod>".makexmldate($data['thread_lastpost'])."</lastmod>\n";
				$content.= "\t\t<priority>".$sitemapsettings['threads_priority']."</priority>\n";
				$content.= "\t\t<changefreq>".makechangefreq($sitemapsettings['threads_changefreq'])."</changefreq>\n";
				$content.= "\t</url>\n";
		}
	}
}

//Kroax Categories
if ($sitemapsettings['kroaxcats_enabled']==1 && file_exists(INFUSIONS."the_kroax/infusion_db.php")) {
$limiter=$sitemapsettings['kroaxcats_limit']?" LIMIT ".$sitemapsettings['kroaxcats_limit']:"";
$result=dbquery("SELECT cid FROM ".DB_PREFIX."kroax_kategori WHERE ".groupxmlaccess('access')." ORDER BY cid DESC".$limiter);
	if (dbrows($result)!=0) {
		while($data = dbarray($result)) {
				$content.= "\t<url>\n";
				$content.= "\t\t<loc>".XMLSITEURL."infusions/the_kroax/kroax.php?category=".$data['cid']."</loc>\n";
				//$content.= "\t\t<lastmod>".makexmldate($data['kroax_date'])."</lastmod>\n";
				$content.= "\t\t<priority>".$sitemapsettings['kroaxcats_priority']."</priority>\n";
				$content.= "\t\t<changefreq>".makechangefreq($sitemapsettings['kroaxcats_changefreq'])."</changefreq>\n";
				$content.= "\t</url>\n";
		}
	}
}


//Kroax videos
if ($sitemapsettings['kroaxvideos_enabled']==1 && file_exists(INFUSIONS."the_kroax/infusion_db.php")) {
$limiter=$sitemapsettings['kroaxvideos_limit']?" LIMIT ".$sitemapsettings['kroaxvideos_limit']:"";
$result=dbquery("SELECT kroax_id,kroax_titel,kroax_date FROM ".DB_PREFIX."kroax WHERE ".groupxmlaccess('kroax_access')." AND kroax_approval='' ORDER BY kroax_id DESC".$limiter);
	if (dbrows($result)!=0) {
		while($data = dbarray($result)) {
				$content.= "\t<url>\n";
				$content.= "\t\t<loc>".XMLSITEURL."infusions/the_kroax/embed.php?url=".$data['kroax_id']."</loc>\n";
				$content.= "\t\t<lastmod>".makexmldate($data['kroax_date'])."</lastmod>\n";
				$content.= "\t\t<priority>".$sitemapsettings['kroaxvideos_priority']."</priority>\n";
				$content.= "\t\t<changefreq>".makechangefreq($sitemapsettings['kroaxvideos_changefreq'])."</changefreq>\n";
				$content.= "\t</url>\n";
		}
	}
}

//Varcade kategorileri ve oyunlarý - varcade categories and games
if ($sitemapsettings['varcadecats_enabled']==1 && file_exists(INFUSIONS."varcade/infusion.php")) {
$limiter=$sitemapsettings['varcadecats_limit']?" LIMIT ".$sitemapsettings['varcadecats_limit']:"";
$result = dbquery("SELECT cid FROM ".DB_PREFIX."varcade_cats WHERE ".groupxmlaccess('access')." ORDER BY title ASC".$limiter);
	if (dbrows($result)!=0) {
		while($data = dbarray($result)) {
				$content.= "\t<url>\n";
				$content.= "\t\t<loc>".XMLSITEURL."infusions/varcade/index.php?category=".$data['cid']."</loc>\n";
				//$content.= "\t\t<lastmod>".makexmldate($data['kroax_date'])."</lastmod>\n";
				$content.= "\t\t<priority>".$sitemapsettings['varcadecats_priority']."</priority>\n";
				$content.= "\t\t<changefreq>".makechangefreq($sitemapsettings['varcadecats_changefreq'])."</changefreq>\n";
				$content.= "\t</url>\n";
		}
	}
}

if ($sitemapsettings['varcadegames_enabled']==1 && file_exists(INFUSIONS."varcade/infusion.php")) {
$limiter=$sitemapsettings['varcadegames_limit']?" LIMIT ".$sitemapsettings['varcadegames_limit']:"";
$result = dbquery("SELECT lid FROM ".DB_PREFIX."varcade_games WHERE ".groupxmlaccess('access')." AND status='2' ORDER BY played DESC".$limiter);
	if (dbrows($result)!=0) {
		while($data = dbarray($result)) {
				$content.= "\t<url>\n";
				$content.= "\t\t<loc>".XMLSITEURL."infusions/varcade/arcade.php?game=".$data['lid']."</loc>\n";
				//$content.= "\t\t<lastmod>".makexmldate($data['kroax_date'])."</lastmod>\n";
				$content.= "\t\t<priority>".$sitemapsettings['varcadegames_priority']."</priority>\n";
				$content.= "\t\t<changefreq>".makechangefreq($sitemapsettings['varcadegames_changefreq'])."</changefreq>\n";
				$content.= "\t</url>\n";
		}
	}
}

//Pro Download Panel v. >= 1.85
//Pro Download Panel >= 1.85 Categories - Dosya Kategorileri
if ($sitemapsettings['pdpcats_enabled']==1 && file_exists(INFUSIONS."pro_download_panel/infusion_db.php")) {
require_once INFUSIONS."pro_download_panel/infusion_db.php";
$limiter=$sitemapsettings['pdpcats_limit']?" LIMIT ".$sitemapsettings['pdpcats_limit']:"";
$result=dbquery("SELECT cat_id FROM ".DB_PDP_CATS." WHERE ".groupxmlaccess('cat_access')." ORDER BY cat_id DESC".$limiter);
	if (dbrows($result)!=0) {
		while($data = dbarray($result)) {
				$content.= "\t<url>\n";
				$content.= "\t\t<loc>".XMLSITEURL."infusions/pro_download_panel/download.php?catid=".$data['cat_id']."</loc>\n";
				//$content.= "\t\t<lastmod>".makexmldate($data['kroax_date'])."</lastmod>\n";
				$content.= "\t\t<priority>".$sitemapsettings['pdpcats_priority']."</priority>\n";
				$content.= "\t\t<changefreq>".makechangefreq($sitemapsettings['pdpcats_changefreq'])."</changefreq>\n";
				$content.= "\t</url>\n";
		}
	}
}

//Pro Download Panel >= 1.85 Downloads - Dosyalar
if ($sitemapsettings['pdpdownloads_enabled']==1 && file_exists(INFUSIONS."pro_download_panel/infusion_db.php")) {
require_once INFUSIONS."pro_download_panel/infusion_db.php";
$limiter=$sitemapsettings['pdpdownloads_limit']?" LIMIT ".$sitemapsettings['pdpdownloads_limit']:"";
$result=dbquery("SELECT download_id, dl_mtime FROM ".DB_PDP_DOWNLOADS." WHERE dl_status='Y' ORDER BY dl_mtime DESC".$limiter);
	if (dbrows($result)!=0) {
		while($data = dbarray($result)) {
				$content.= "\t<url>\n";
				$content.= "\t\t<loc>".XMLSITEURL."infusions/pro_download_panel/download.php?did=".$data['download_id']."</loc>\n";
				$content.= "\t\t<lastmod>".makexmldate($data['dl_mtime'])."</lastmod>\n";
				$content.= "\t\t<priority>".$sitemapsettings['pdpdownloads_priority']."</priority>\n";
				$content.= "\t\t<changefreq>".makechangefreq($sitemapsettings['pdpdownloads_changefreq'])."</changefreq>\n";
				$content.= "\t</url>\n";
		}
	}
}

//Ti Blog System
if ($sitemapsettings['tiblogsystem_enabled']==1 && file_exists(INFUSIONS."ti_blog_system/infusion.php")) {
$limiter=$sitemapsettings['tiblogsystem_limit']?" LIMIT ".$sitemapsettings['tiblogsystem_limit']:"";
$result=dbquery("SELECT blog_id, blog_date FROM ".DB_PREFIX."ti_blog_system ORDER BY blog_id DESC".$limiter);
	if (dbrows($result)!=0) {
		while($data = dbarray($result)) {
				$content.= "\t<url>\n";
				$content.= "\t\t<loc>".XMLSITEURL."blog.php?page=blog_id&amp;id=".$data['blog_id']."</loc>\n";
				$content.= "\t\t<lastmod>".makexmldate($data['blog_date'])."</lastmod>\n";
				$content.= "\t\t<priority>".$sitemapsettings['tiblogsystem_priority']."</priority>\n";
				$content.= "\t\t<changefreq>".makechangefreq($sitemapsettings['tiblogsystem_changefreq'])."</changefreq>\n";
				$content.= "\t</url>\n";
		}
	}
}

//Firma Rehberi - Company Book System
if ($sitemapsettings['firmarehberi_enabled']==1 && file_exists(INFUSIONS."firma_rehberi/infusion_db.php")) {
include_once INFUSIONS."firma_rehberi/infusion_db.php";
$limiter=$sitemapsettings['firmarehberi_limit']?" LIMIT ".$sitemapsettings['firmarehberi_limit']:"";
$result=dbquery("SELECT firma_id FROM ".DB_FIRMALAR." ORDER BY firma_id DESC".$limiter);
	if (dbrows($result)!=0) {
		while($data = dbarray($result)) {
				$content.= "\t<url>\n";
				$content.= "\t\t<loc>".XMLSITEURL."infusions/firma_rehberi/firma.php?firma_id=".$data['firma_id']."</loc>\n";
				//$content.= "\t\t<lastmod>".makexmldate($data['blog_date'])."</lastmod>\n";
				$content.= "\t\t<priority>".$sitemapsettings['firmarehberi_priority']."</priority>\n";
				$content.= "\t\t<changefreq>".makechangefreq($sitemapsettings['firmarehberi_changefreq'])."</changefreq>\n";
				$content.= "\t</url>\n";
		}
	}
}

//Firma Rehberi Kategorileri - Company Book System Vategories
if ($sitemapsettings['firmarehbericats_enabled']==1 && file_exists(INFUSIONS."firma_rehberi/infusion_db.php")) {
include_once INFUSIONS."firma_rehberi/infusion_db.php";
$limiter=$sitemapsettings['firmarehbericats_limit']?" LIMIT ".$sitemapsettings['firmarehbericats_limit']:"";
$result=dbquery("SELECT firma_kat_id FROM ".DB_FIRMA_KAT." ORDER BY firma_kat_id DESC".$limiter);
	if (dbrows($result)!=0) {
		while($data = dbarray($result)) {
				$content.= "\t<url>\n";
				$content.= "\t\t<loc>".XMLSITEURL."infusions/firma_rehberi/firmalar.php?cat_id=".$data['firma_id']."</loc>\n";
				//$content.= "\t\t<lastmod>".makexmldate($data['blog_date'])."</lastmod>\n";
				$content.= "\t\t<priority>".$sitemapsettings['firmarehbericats_priority']."</priority>\n";
				$content.= "\t\t<changefreq>".makechangefreq($sitemapsettings['firmarehbericats_changefreq'])."</changefreq>\n";
				$content.= "\t</url>\n";
		}
	}
}

//Custom URLs
$result=dbquery("SELECT link_url, link_priority, link_frequency FROM ".DB_SITEMAPXML_CUSTOMLINKS." ORDER BY link_id DESC");
	if(dbrows($result)!=0) {
		while($data = dbarray($result)) {
				$content.= "\t<url>\n";
				$content.= "\t\t<loc>".XMLSITEURL.$data['link_url']."</loc>\n";
				//$content.= "\t\t<lastmod>".makexmldate($data['blog_date'])."</lastmod>\n";
				$content.= "\t\t<priority>".$data['link_priority']."</priority>\n";
				$content.= "\t\t<changefreq>".makechangefreq($data['link_frequency'])."</changefreq>\n";
				$content.= "\t</url>\n";
		}
	}


$content.= "</urlset>\n";

return $content;

}



function make_sitemapxml() {
$sitemapfile=BASEDIR."sitemap.xml"; //dosyamýzý belirleyelim
	if (!file_exists($sitemapfile) || !is_writable($sitemapfile)) {
	return false;
	} else {
		$write=false;
		$file=fopen($sitemapfile,"w");
		if (fwrite($file,generate_sitemapxml())) {
			$write=true;
		}
		fclose($file);
		return $write;
	}
}

//admin paneli form fonksiyonlarý - admin panel form functions
function makechangefreq($value) {
	switch ($value) {
		case 0:
			return "daily";
			break;
		case 1:
			return "weekly";
			break;
		case 2:
			return "monthly";
			break;
		case 3:
			return "yearly";
			break;
		default:
			return "weekly";
			break;
	}
}

function makepriorityform($selectname,$value) {
$output= "<select name='".$selectname."' class='textbox'>\n";
	for ($i=1;$i<10;$i++) { //why should I make PHP calculate ($i/10) each time, this way it's better ;)
		$current="0.$i";
		$output.= "<option".($current == $value ? " selected='selected'" : "").">".$current."</option>\n";
	}
	$output.= "<option".("1.0" == $value ? " selected='selected'" : "").">1.0</option>\n";
	$output.="</select>\n";
	
	return $output;
}

function makefrequencyform($selectname,$value) {
global $locale;
$output="<select name='".$selectname."' class='textbox'>\n";
	for ($i=0;$i<4;$i++) {
		$output.="<option value='".$i."'".($i == $value ? " selected='selected'" : "").">".$locale['smxml_16'][$i]."</option>\n";
	}
	$output.="</select>\n";

	return $output;
}

function makeyesnoform($selectname, $value) {
global $locale;
	$output = "<select name='".$selectname."' class='textbox'>\n";
	$output.= "<option value='1'".($value == 1 ? " selected='selected'" : "").">".$locale['smxml_44']."</option>\n";
	$output.= "<option value='0'".($value == 0 ? " selected='selected'" : "").">".$locale['smxml_45']."</option>\n";
	$output.= "</select>\n";
	return $output;
}

function makecheckboxform($checkname,$value) {
	return "<input type='checkbox' name='".$checkname."' value='y'".($value==1?" checked='checked'":"")." />";
}

function makeinputform($inputname,$value,$style=" style='width:70px'") {
	return "<input type='text' name='".$inputname."' value='".$value."' class='textbox'".$style." />";
}


?>