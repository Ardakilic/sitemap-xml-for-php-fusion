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

/* already included in sitemap_functions.php - sitemap_functions.php de zaten ekli
if (file_exists(INFUSIONS."sitemapxml/locale/".$settings['locale'].".php")) {
	include_once INFUSIONS."sitemapxml/locale/".$settings['locale'].".php";
} else {
	include_once INFUSIONS."sitemapxml/locale/English.php";
}*/
if (!checkrights("XM") || !defined("iAUTH") || $_GET['aid'] != iAUTH) { redirect("../../index.php"); }

add_to_title(" - ".$locale['smxml_01']);

if (isset($_POST['save'])) {
	$news_limit = isnum($_POST['news_limit'])?$_POST['news_limit']:0;
	$newscats_limit = isnum($_POST['newscats_limit'])?$_POST['newscats_limit']:0;
	$articles_limit = isnum($_POST['articles_limit'])?$_POST['articles_limit']:0;
	$articlecats_limit = isnum($_POST['articlecats_limit'])?$_POST['articlecats_limit']:0;
	$profiles_limit = isnum($_POST['profiles_limit'])?$_POST['profiles_limit']:0;
	$photoalbums_limit = isnum($_POST['photoalbums_limit'])?$_POST['photoalbums_limit']:0;
	$photos_limit = isnum($_POST['photos_limit'])?$_POST['photos_limit']:0;
	$custompages_limit = isnum($_POST['custompages_limit'])?$_POST['custompages_limit']:0;
	$faqcats_limit = isnum($_POST['faqcats_limit'])?$_POST['faqcats_limit']:0;
	$downloadcats_limit = isnum($_POST['downloadcats_limit'])?$_POST['downloadcats_limit']:0;
	$downloads_limit = isnum($_POST['downloads_limit'])?$_POST['downloads_limit']:0;
	$weblinkcats_limit = isnum($_POST['weblinkcats_limit'])?$_POST['weblinkcats_limit']:0;
	$forums_limit = isnum($_POST['forums_limit'])?$_POST['forums_limit']:0;
	$threads_limit = isnum($_POST['threads_limit'])?$_POST['threads_limit']:0; //deðer illa ki bir sayý olmalýdýr - value has to be an integer
	$kroaxcats_limit = isnum($_POST['kroaxcats_limit'])?$_POST['kroaxcats_limit']:0;
	$kroaxvideos_limit = isnum($_POST['kroaxvideos_limit'])?$_POST['kroaxvideos_limit']:0;
	$varcadecats_limit = isnum($_POST['varcadecats_limit'])?$_POST['varcadecats_limit']:0;
	$varcadegames_limit = isnum($_POST['varcadegames_limit'])?$_POST['varcadegames_limit']:0;
	$pdpcats_limit = isnum($_POST['pdpcats_limit'])?$_POST['pdpcats_limit']:0;
	$pdpdownloads_limit = isnum($_POST['pdpdownloads_limit'])?$_POST['pdpdownloads_limit']:0;
	$tiblogsystem_limit = isnum($_POST['tiblogsystem_limit'])?$_POST['tiblogsystem_limit']:0;
	$firmarehberi_limit = isnum($_POST['firmarehberi_limit'])?$_POST['firmarehberi_limit']:0;
	$firmarehbericats_limit = isnum($_POST['firmarehbericats_limit'])?$_POST['firmarehbericats_limit']:0;
	
	$update_interval = isnum($_POST['update_interval'])?$_POST['update_interval']:86400; //deðer illa ki bir sayý olmalýdýr - value has to be an integer
	$site_url=stripinput($_POST['site_url']).(strrchr($_POST['site_url'],"/") != "/" ? "/" : ""); //for http://www. issues
	
	$news_enabled = (isset($_POST['news_enabled']) && $_POST['news_enabled']=='y')?1:0;
	$newscats_enabled = (isset($_POST['newscats_enabled']) && $_POST['newscats_enabled']=='y')?1:0;
	$articlecats_enabled = (isset($_POST['articlecats_enabled']) && $_POST['articlecats_enabled']=='y')?1:0;
	$articles_enabled = (isset($_POST['articles_enabled']) && $_POST['articles_enabled']=='y')?1:0;
	$profiles_enabled = (isset($_POST['profiles_enabled']) && $_POST['profiles_enabled']=='y')?1:0;
	$photoalbums_enabled = (isset($_POST['photoalbums_enabled']) && $_POST['photoalbums_enabled']=='y')?1:0;
	$photos_enabled = (isset($_POST['photos_enabled']) && $_POST['photos_enabled']=='y')?1:0;
	$custompages_enabled = (isset($_POST['custompages_enabled']) && $_POST['custompages_enabled']=='y')?1:0;
	$faqcats_enabled = (isset($_POST['faqcats_enabled']) && $_POST['faqcats_enabled']=='y')?1:0;
	$downloadcats_enabled = (isset($_POST['downloadcats_enabled']) && $_POST['downloadcats_enabled']=='y')?1:0;
	$downloads_enabled = (isset($_POST['downloads_enabled']) && $_POST['downloads_enabled']=='y')?1:0;
	$weblinkcats_enabled = (isset($_POST['weblinkcats_enabled']) && $_POST['weblinkcats_enabled']=='y')?1:0;
	$forums_enabled = (isset($_POST['forums_enabled']) && $_POST['forums_enabled']=='y')?1:0;
	$threads_enabled = (isset($_POST['threads_enabled']) && $_POST['threads_enabled']=='y')?1:0;
	$kroaxcats_enabled = (isset($_POST['kroaxcats_enabled']) && $_POST['kroaxcats_enabled']=='y')?1:0;	
	$kroaxvideos_enabled = (isset($_POST['kroaxvideos_enabled']) && $_POST['kroaxvideos_enabled']=='y')?1:0;
	$varcadecats_enabled = (isset($_POST['varcadecats_enabled']) && $_POST['varcadecats_enabled']=='y')?1:0;
	$varcadegames_enabled = (isset($_POST['varcadegames_enabled']) && $_POST['varcadegames_enabled']=='y')?1:0;
	$pdpcats_enabled = (isset($_POST['pdpcats_enabled']) && $_POST['pdpcats_enabled']=='y')?1:0;
	$pdpdownloads_enabled = (isset($_POST['pdpdownloads_enabled']) && $_POST['pdpdownloads_enabled']=='y')?1:0;
	$tiblogsystem_enabled = (isset($_POST['tiblogsystem_enabled']) && $_POST['tiblogsystem_enabled']=='y')?1:0;
	$firmarehberi_enabled = (isset($_POST['firmarehberi_enabled']) && $_POST['firmarehberi_enabled']=='y')?1:0;
	$firmarehbericats_enabled = (isset($_POST['firmarehbericats_enabled']) && $_POST['firmarehbericats_enabled']=='y')?1:0;

	$result=dbquery("UPDATE ".DB_SITEMAPXML." SET
	update_interval='".$update_interval."',
	site_url='".$site_url."',
	news_enabled='".$news_enabled."',
	news_changefreq='".$_POST['news_changefreq']."', 
	news_priority='".$_POST['news_priority']."',
	news_limit='".$news_limit."',
	newscats_enabled='".$newscats_enabled."',
	newscats_changefreq='".$_POST['newscats_changefreq']."', 
	newscats_priority='".$_POST['newscats_priority']."',
	newscats_limit='".$newscats_limit."',
	articlecats_enabled='".$articlecats_enabled."',
	articlecats_changefreq='".$_POST['articlecats_changefreq']."', 
	articlecats_priority='".$_POST['articlecats_priority']."', 
	articlecats_limit='".$articlecats_limit."', 
	articles_enabled='".$articles_enabled."',
	articles_changefreq='".$_POST['articles_changefreq']."', 
	articles_priority='".$_POST['articles_priority']."',
	articles_limit='".$articles_limit."',
	profiles_enabled='".$profiles_enabled."',
	profiles_changefreq='".$_POST['profiles_changefreq']."', 
	profiles_priority='".$_POST['profiles_priority']."',
	profiles_limit='".$profiles_limit."',
	photoalbums_enabled='".$photoalbums_enabled."',
	photoalbums_changefreq='".$_POST['photoalbums_changefreq']."', 
	photoalbums_priority='".$_POST['photoalbums_priority']."',
	photoalbums_limit='".$photoalbums_limit."',
	photos_enabled='".$photos_enabled."',
	photos_changefreq='".$_POST['photos_changefreq']."', 
	photos_priority='".$_POST['photos_priority']."',
	photos_limit='".$photos_limit."',
	custompages_enabled='".$custompages_enabled."',
	custompages_changefreq='".$_POST['custompages_changefreq']."', 
	custompages_priority='".$_POST['custompages_priority']."', 
	custompages_limit='".$custompages_limit."', 
	faqcats_enabled='".$faqcats_enabled."',
	faqcats_changefreq='".$_POST['faqcats_changefreq']."', 
	faqcats_priority='".$_POST['faqcats_priority']."', 
	faqcats_limit='".$faqcats_limit."', 
	downloadcats_enabled='".$downloadcats_enabled."',
	downloadcats_changefreq='".$_POST['downloadcats_changefreq']."', 
	downloadcats_priority='".$_POST['downloadcats_priority']."',
	downloadcats_limit='".$downloadcats_limit."',
	downloads_enabled='".$downloads_enabled."',
	downloads_changefreq='".$_POST['downloads_changefreq']."', 
	downloads_priority='".$_POST['downloads_priority']."', 
	downloads_limit='".$downloads_limit."', 
	weblinkcats_enabled='".$weblinkcats_enabled."',
	weblinkcats_changefreq='".$_POST['weblinkcats_changefreq']."', 
	weblinkcats_priority='".$_POST['weblinkcats_priority']."',
	weblinkcats_limit='".$weblinkcats_limit."',
	forums_enabled='".$forums_enabled."',
	forums_changefreq='".$_POST['forums_changefreq']."', 
	forums_priority='".$_POST['forums_priority']."',
	forums_limit='".$forums_limit."',
	threads_enabled='".$threads_enabled."',
	threads_changefreq='".$_POST['threads_changefreq']."', 
	threads_priority='".$_POST['threads_priority']."', 
	threads_limit='".$threads_limit."',
	kroaxcats_enabled='".$kroaxcats_enabled."',
	kroaxcats_changefreq='".$_POST['kroaxcats_changefreq']."',
	kroaxcats_priority='".$_POST['kroaxcats_priority']."',
	kroaxcats_limit='".$kroaxcats_limit."',
	kroaxvideos_enabled='".$kroaxvideos_enabled."',
	kroaxvideos_changefreq='".$_POST['kroaxvideos_changefreq']."',
	kroaxvideos_priority='".$_POST['kroaxvideos_priority']."',
	kroaxvideos_limit='".$kroaxvideos_limit."',
	varcadecats_enabled='".$varcadecats_enabled."',
	varcadecats_changefreq='".$_POST['varcadecats_changefreq']."',
	varcadecats_priority='".$_POST['varcadecats_priority']."',
	varcadecats_limit='".$varcadecats_limit."',
	varcadegames_enabled='".$varcadegames_enabled."',
	varcadegames_changefreq='".$_POST['varcadegames_changefreq']."',
	varcadegames_priority='".$_POST['varcadegames_priority']."',
	varcadegames_limit='".$varcadegames_limit."',
	pdpcats_enabled='".$pdpcats_enabled."',
	pdpcats_changefreq='".$_POST['pdpcats_changefreq']."',
	pdpcats_priority='".$_POST['pdpcats_priority']."',
	pdpcats_limit='".$pdpcats_limit."',
	pdpdownloads_enabled='".$pdpdownloads_enabled."',
	pdpdownloads_changefreq='".$_POST['pdpdownloads_changefreq']."',
	pdpdownloads_priority='".$_POST['pdpdownloads_priority']."',
	pdpdownloads_limit='".$pdpdownloads_limit."',
	tiblogsystem_enabled='".$tiblogsystem_enabled."',
	tiblogsystem_changefreq='".$_POST['tiblogsystem_changefreq']."',
	tiblogsystem_priority='".$_POST['tiblogsystem_priority']."',
	tiblogsystem_limit='".$tiblogsystem_limit."',
	firmarehberi_enabled='".$firmarehberi_enabled."',
	firmarehberi_changefreq='".$_POST['firmarehberi_changefreq']."',
	firmarehberi_priority='".$_POST['firmarehberi_priority']."',
	firmarehberi_limit='".$firmarehberi_limit."',
	firmarehbericats_enabled='".$firmarehbericats_enabled."',
	firmarehbericats_changefreq='".$_POST['firmarehbericats_changefreq']."',
	firmarehbericats_priority='".$_POST['firmarehbericats_priority']."',
	firmarehbericats_limit='".$firmarehbericats_limit."'
	");
	
	if ($result) {
		redirect(FUSION_SELF.$aidlink."&amp;update=settingsok");
	} else {
		redirect(FUSION_SELF.$aidlink."&amp;update=settingsnotok");
	}
}


if (isset($_GET['force']) && $_GET['force']==1) {
	if (make_sitemapxml()) {
		redirect(FUSION_SELF.$aidlink."&amp;update=ok");
	} else {
		redirect(FUSION_SELF.$aidlink."&amp;update=notok");
	}
}


if (isset($_GET['update'])) {
	if ($_GET['update']=="ok") {
		opentable($locale['smxml_06']);
		echo $locale['smxml_07'];
		closetable();
	} else if ($_GET['update']=="notok"){
		opentable($locale['smxml_08']);
		echo $locale['smxml_09'];
		closetable();
	} else if ($_GET['update']=="settingsok"){
		opentable($locale['smxml_06']);
		echo $locale['smxml_17'];
		closetable();
	} else if ($_GET['update']=="settingsok"){
		opentable($locale['smxml_08']);
		echo $locale['smxml_18'];
		closetable();
	} else {
		redirect(FUSION_SELF.$aidlink);
	}
}

$link_id=""; $link_url=""; $link_priority=""; $link_frequency="";
if (isset($_GET['action']) && isset($_GET['id']) && isnum($_GET['id'])) {
	$action=$_GET['action'];
	if ($action=="edit") {
		$result=dbquery("SELECT * FROM ".DB_SITEMAPXML_CUSTOMLINKS." WHERE link_id='".$_GET['id']."'");
		$data=dbarray($result);
		$link_id=$data['link_id'];
		$link_url=$data['link_url'];
		$link_priority=$data['link_priority'];
		$link_frequency=$data['link_frequency'];
	} else if ($action=="delete") {
		$result=dbquery("DELETE FROM ".DB_SITEMAPXML_CUSTOMLINKS." WHERE link_id='".$_GET['id']."'");
		echo "<div style='width: 70%; text-align: center; margin: 0px auto' class='tbl'>".($result?$locale['smxml_117']:$locale['smxml_118'])."</div>";
	} else {
		redirect(FUSION_SELF.$aidlink);
	}
}


if (isset($_GET['linkresult'])) {
$linkresult=$_GET['linkresult'];
echo "<div style='width: 70%; text-align: center; margin: 0px auto' class='tbl'>\n";
	if ($linkresult=="urlblank") {
		echo $locale['smxml_119'];
	} else if ($linkresult=="updatedone") {
		echo $locale['smxml_120'];
	} else if ($linkresult=="updatenotdone") {
		echo $locale['smxml_121'];
	} else if ($linkresult=="insertdone") {
		echo $locale['smxml_122'];
	} else if ($linkresult=="insertnotdone") {
		echo $locale['smxml_123'];
	}
	
echo "</div>\n";
}


if (isset($_POST['savelink'])) {

$link_id=isset($_POST['link_id'])?stripinput($_POST['link_id']):0;
$link_url=!empty($_POST['link_url'])?ltrim(stripinput($_POST['link_url']),"/"):"";
$link_frequency=stripinput($_POST['link_frequency']);
$link_priority=stripinput($_POST['link_priority']);

if ($_POST['link_url']=="") { redirect(FUSION_SELF.$aidlink."&amp;linkresult=urlblank"); }
	if (isset($_POST['link_id'])) {
		$result=dbquery("UPDATE ".DB_SITEMAPXML_CUSTOMLINKS." SET link_url='".$link_url."', link_priority='".$link_priority."', link_frequency='".$link_frequency."' WHERE link_id='".$link_id."'");
		redirect(FUSION_SELF.$aidlink."&amp;linkresult=".($result?"updatedone":"updatenotdone"));
	} else {
		$result=dbquery("INSERT INTO ".DB_SITEMAPXML_CUSTOMLINKS." (link_url, link_frequency, link_priority) VALUES ('".$link_url."', '".$link_frequency."', '".$link_priority."')");
		redirect(FUSION_SELF.$aidlink."&amp;linkresult=".($result?"insertdone":"insertnotdone"));
	}
}

opentable($locale['smxml_01']);
echo "<div style='width: 70%; text-align: center; margin: 0px auto;'>\n";

echo "<table cellpadding='0' cellspacing='0' border='0' width='100%'>";
echo "<tr><td align='center' width='60%'>";
echo $locale['smxml_02']."<br />\n".showdate("longdate",filemtime(BASEDIR."sitemap.xml"))."<br />\n";
echo "<a href='".BASEDIR."sitemap.xml' target='_blank'>".$locale['smxml_03']."</a><br />";
echo "<a href='".FUSION_SELF.$aidlink."&amp;force=1'>".$locale['smxml_04']."</a><br /><br />\n";

echo "<a href='".INFUSIONS."sitemapxml/sitemap_submit.php".$aidlink."'>".$locale['smxml_05']."</a>\n";
echo "</td><td width='40%'>";
echo '<form action="https://www.paypal.com/cgi-bin/webscr" method="post">
<input type="hidden" name="cmd" value="_s-xclick">
<input type="hidden" name="hosted_button_id" value="6410325">
<input type="image" src="https://www.paypal.com/en_US/i/btn/btn_donateCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
<img alt="" border="0" src="https://www.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1">
</form><br /><strong>'.$locale['smxml_124']."</strong>";
echo "</td></tr></table>";



echo "<hr style='margin: 5px;' />";

echo "<div>";
echo "<form name='inputform' method='post' action='".FUSION_SELF.$aidlink."&amp;update=settings'>";
echo "<table cellpadding='0' cellspacing='0' border='0' width='100%' align='center'>";
echo "<tr><td align='left' class='tbl1' width='50%'>".$locale['smxml_49']."</td>";
echo "<td align='left' class='tbl1' width='50%'><input type='text' name='update_interval' value='".$sitemapsettings['update_interval']."' class='textbox' style='width: 150px;' /></td></tr>\n";
echo "<tr><td align='left' class='tbl1' width='50%'>".$locale['smxml_125']."</td>\n";
echo "<td align='left' class='tbl1' width='50%'><input type='text' name='site_url' value='".$sitemapsettings['site_url']."' class='textbox' style='width: 150px;' /></td></tr>\n";
echo "</table>";

echo "<hr style='margin: 5px' />";

echo "<table cellpadding='0' cellspacing='0' border='0' width='100%' align='center'>";
echo "<tr>
<td class='tbl' width='20%'>".$locale['smxml_200']."</td>
<td class='tbl' width='20%'>".$locale['smxml_201']."</td>
<td class='tbl' width='20%'>".$locale['smxml_202']."</td>
<td class='tbl' width='20%'>".$locale['smxml_203']."</td>
<td class='tbl' width='20%'>".$locale['smxml_204']."</td>
</tr>\n";

$components = array (
	"news" => array ($locale['smxml_210'],'news_enabled','news_priority','news_changefreq','news_limit'),
	"news_cats" => array ($locale['smxml_211'],'newscats_enabled','newscats_priority','newscats_changefreq','newscats_limit'),
	"articles" => array ($locale['smxml_212'],'articles_enabled','articles_priority','articles_changefreq','articles_limit'),
	"articlecats" => array ($locale['smxml_213'],'articlecats_enabled','articlecats_priority','articlecats_changefreq','articlecats_limit'),
	"profiles" => array ($locale['smxml_214'],'profiles_enabled','profiles_priority','profiles_changefreq','profiles_limit'),
	"photoalbums" => array ($locale['smxml_215'],'photoalbums_enabled','photoalbums_priority','photoalbums_changefreq','photoalbums_limit'),
	"photos" => array ($locale['smxml_216'],'photos_enabled','photos_priority','photos_changefreq','photos_limit'),
	"custompages" => array ($locale['smxml_217'],'custompages_enabled','custompages_priority','custompages_changefreq','custompages_limit'),
	"faqcats" => array ($locale['smxml_218'],'faqcats_enabled','faqcats_priority','faqcats_changefreq','faqcats_limit'),
	"downloadcats" => array ($locale['smxml_219'],'downloadcats_enabled','downloadcats_priority','downloadcats_changefreq','downloadcats_limit'),
	"downloads" => array ($locale['smxml_220'],'downloads_enabled','downloads_priority','downloads_changefreq','downloads_limit'),
	"weblinkcats" => array ($locale['smxml_221'],'weblinkcats_enabled','weblinkcats_priority','weblinkcats_changefreq','weblinkcats_limit'),
	"forums" => array ($locale['smxml_222'],'forums_enabled','forums_priority','forums_changefreq','forums_limit'),
	"threads" => array ($locale['smxml_223'],'threads_enabled','threads_priority','threads_changefreq','threads_limit'),
	"kroaxcats" => array ($locale['smxml_224'],'kroaxcats_enabled','kroaxcats_priority','kroaxcats_changefreq','kroaxcats_limit'),
	"kroaxvideos" => array ($locale['smxml_225'],'kroaxvideos_enabled','kroaxvideos_priority','kroaxvideos_changefreq','kroaxvideos_limit'),
	"varcadecats" => array ($locale['smxml_226'],'varcadecats_enabled','varcadecats_priority','varcadecats_changefreq','varcadecats_limit'),
	"varcadegames" => array ($locale['smxml_227'],'varcadegames_enabled','varcadegames_priority','varcadegames_changefreq','varcadegames_limit'),
	"pdpcats" => array ($locale['smxml_228'],'pdpcats_enabled','pdpcats_priority','pdpcats_changefreq','pdpcats_limit'),
	"pdpdownloads" => array ($locale['smxml_229'],'pdpdownloads_enabled','pdpdownloads_priority','pdpdownloads_changefreq','pdpdownloads_limit'),
	"tiblogsystem" => array ($locale['smxml_230'],'tiblogsystem_enabled','tiblogsystem_priority','tiblogsystem_changefreq','tiblogsystem_limit'),
	"firmarehberi" => array ($locale['smxml_231'],'firmarehberi_enabled','firmarehberi_priority','firmarehberi_changefreq','firmarehberi_limit'),
	"firmarehbericats" => array ($locale['smxml_232'],'firmarehbericats_enabled','firmarehbericats_priority','firmarehbericats_changefreq','firmarehbericats_limit')
);

$i=0;
foreach ($components as $type => $row) {
	echo "<tr>";
	echo "<td class='tbl".(($i%2)?1:2)."' width='20%' align='center'>".$row[0]."</td>\n";
	echo "<td class='tbl".(($i%2)?1:2)."' width='20%' align='center'>".makecheckboxform($row[1],$sitemapsettings[$row[1]])."</td>\n";
	echo "<td class='tbl".(($i%2)?1:2)."' width='20%' align='center'>".makepriorityform($row[2],$sitemapsettings[$row[2]])."</td>\n";
	echo "<td class='tbl".(($i%2)?1:2)."' width='20%' align='center'>".makefrequencyform($row[3],$sitemapsettings[$row[3]])."</td>\n";
	echo "<td class='tbl".(($i%2)?1:2)."' width='20%' align='center'>".makeinputform($row[4],$sitemapsettings[$row[4]])."</td>\n";
	echo "</tr>";
	$i++;
}

echo "<tr><td align='center' colspan='5' class='tbl1' width='100%'><input type='submit' name='save' value='".$locale['smxml_43']."' class='button' /></td></tr>\n";

echo "</table></form>\n";
echo "</div>";

echo "</div>";
closetable();

echo "<a href='#' id='customsection'></a>";
opentable($locale['smxml_100']);
echo $locale['smxml_101']."<br />";

echo "<form name='inputform2' method='post' action='".FUSION_SELF.$aidlink."&amp;custompage=update'>\n";
echo "<div style='width: 70%; text-align: center; margin: 0px auto;'>\n";
echo "<table cellpadding='0' cellspacing='0' border='0' align='center'><tr>\n";
echo "<td align='left' class='tbl1' width='40%'>".$locale['smxml_102']."</td>";
echo "<td align='left' class='tbl1' width='60%'><input type='text' name='link_url' value='".$link_url."' class='textbox' /></td></tr>";
echo "<tr><td align='left' class='tbl2' width='40%'>".$locale['smxml_103']."</td>";
echo "<td align='left' class='tbl2' width='60%'>".makepriorityform("link_priority",$link_priority)."</td></tr>\n";
echo "<tr><td align='left' class='tbl1' width='40%'>".$locale['smxml_104']."</td>";
echo "<td align='left' class='tbl1' width='60%'>".makefrequencyform("link_frequency",$link_frequency)."</td></tr>\n";
if ($link_id !="") { echo "<input type='hidden' name='link_id' value='".$link_id."' />"; }
echo "<tr><td align='center' colspan='2' class='tbl1' width='100%'><input type='submit' name='savelink' value='".$locale['smxml_105']."' class='button' /></td></tr>\n";
echo "</table>\n</div>\n</form>\n";
closetable();

opentable($locale['smxml_110']);

echo "<table cellpadding='0' cellspacing='0' border='0' width='100%' align='center'><tr>\n";
echo "<td align='left' width='50%' class='tbl'>".$locale['smxml_111']."</td>\n";
echo "<td align='left' width='25%' class='tbl'>".$locale['smxml_112']."</td>\n";
echo "<td align='left' width='25%' class='tbl'>".$locale['smxml_113']."</td></tr>";

$result=dbquery("SELECT * FROM ".DB_SITEMAPXML_CUSTOMLINKS." ORDER BY link_url ASC");
if (dbrows($result)) {
	$i=0;
	while ($data=dbarray($result)) {
		echo "<tr><td align='left' width='50%' class='tbl".(!($i%2)?1:2)."'><a href='".XMLSITEURL.$data['link_url']."' target='_blank'>".trimlink($data['link_url'],32)."</a></td>\n";
		echo "<td align='left' width='25%' class='tbl".(!($i%2)?1:2)."'>".$locale['smxml_16'][$data['link_frequency']]." - ".$data['link_priority']."</td>\n";
		echo "<td align='left' width='25%' class='tbl".(!($i%2)?1:2)."'><a href='".FUSION_SELF.$aidlink."&amp;action=edit&amp;id=".$data['link_id']."#customsection'>".$locale['smxml_114']."</a> ".THEME_BULLET." <a href='".FUSION_SELF.$aidlink."&amp;action=delete&amp;id=".$data['link_id']."#customsection'>".$locale['smxml_115']."</a></td></tr>";
		$i++;
	}
} else {
	echo "<tr><td align='center' colspan='3'>".$locale['smxml_116']."</td></tr>";
}

echo "</table>";
closetable();

require_once THEMES."templates/footer.php";
?>