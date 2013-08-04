Google XML Sitemap Infusion
For PHP Fusion 7.x
Version: 3.00 (2010.04.12)
Author: Arda Kilicdagi (SoulSmasher)
Web: www.soulsmasher.net , www.phpfusionturkiye.com

Within this infusion, you can generate Google XML sitemaps instantly for your PHP-Fusion based website

Features:
---------------------
1-Generating a sitemap within one click
2-If the panel is activated, the sitemap.xml file is generated automatically (default: each 24 hours)
3-Force Generating option for admins
4-Because sitemap.xml will be a static content, when google pings your sitemap, it won't exhaust your sql
5-Submitting your sitemap instantly with one click to popular search engines
6-Quick navigation on sitemapxml_panel for admins
7-There's also a file called sitemap.php in root if you want the xml to generate dynamically on each request (deleting that file doesn't affect the sitemap.xml)

Current Translations:
--------------------
Danish (Thanks, Helmuth)
English
Turkish
Russian (Thanks, sbr80)
German (Thanks, slaughter)
Hungarian (Thanks, Rottenbacher Tamás ( sYska/!/ ))
Spanish (Thanks, NobNob)
Dutch (Thanks, Martijn78)
Polish
Swedish (Thanks, etxgmg!)

Installation:
--------------------
1-Upload everything under the folder "files" to your PHP-Fusion's base folder
2-After the upload, chmod the sitemap.xml file to 777
3-Go to admin panel/system administration/infusions and activate "Google Sitemap"
4-Sitemap XML Panel will be added automatically to your website at lower center panel, which'll trigger Sitemap generation. The contents of the panel won't be shown to normal members. 

From the admin interface, you can see the last time that sitemap is generated, and re-generate instantly anytime you want. You can also submit your sitemap to popular search engines via one click


FAQ:
--------------------
*To some users , this error message may occur:
	Error loading stylesheet: A network error occured loading an XSLT stylesheet:http://www.site.com/infusions/sitemapxml/sitemap.xsl
	Actually, this isn't an issue, just a simple misconfiguation error by admins:
	Because you submitted your website as http://www.yoursite.com/sitemap.xml, and the website setting at admin panel is: http://yoursite.com/ (or opposite)
	To fix this: Go to admin panel/infusions/google sitemap, and change http:// part (add www, or delete it, same as your submission url)
	OR please check this post for a .htaccess solution: http://www.phpfusion-mods.com/forum/viewthread.php?thread_id=7819&rowstart=140#post_45429
	

Tips:
--------------------
If you disabled your left or right panels on your website, for sitemap xml recreating cronjob, i suggest you to add the sitemapxml_panel as l-ctr and make it show on all pages
Update interval's value is set as 86400 (secs), which is equal to 1 day time period. You can easily increase or decrease the setting via admin panel


Update:
--------------------
Sorry, this new version has some major changes, so the cleanest way to do is reinstall from scratch:
Firstly defuse the old infusion, delete the old files, then upload new files and infuse again.

Version History:
--------------------
3.00 - Shiny new interface for sitemaps for easier administration (suggestion by kneekoo, thanks!)
	   Firma Rehberi (Company guide system) included
	   All language files and the infusion is now lighter.
	   Now all contents have limiter value.
	   Some queries are optimized.
	   Dutch Locale Updated by Martijn78
	   Swedish Locale Included (Thanks, etxgmg!)
2.60 - Sitemap Submission page is now internal
	   A tiny bug is fixed for pro_download_panel
	   A tiny locale error is fixed in admin panel
2.51 - A tiny bug fixed in infusion.php and a typo fixed in locales(Thanks Sharky!)
	   Custom website url now gets / at the end of value
	   Sitemap xml generator function make_sitemapxml() improved a bit for fclose() function.
2.50 - Custom URL Inclusion to XML file is now available
	   Now admins can set website's url from the sitemap administration (advanced setting for domain redirections etc.)
	   Dutch Locale Included (Thanks, Martijn78)
2.14 - Ti Blog System URL Structure Fixed
	   Spanish Locale Included (Thanks, NobNob!)
	   Articles now go to articles.php instead of readarticle.php
2.13 - Member profiles are now supported
	   Hungarian Locales Included (Thanks, Rottenbacher Tamás ( sYska/!/ ))
	   A Tiny bug on articles priority is fixed
2.12 - A tiny bug is fixed in admin panel that prevented to save settings in some browsers
	   Ti Blog System and Kroax Categories enabled
	   Some minor code cleanup and fix in sitemap_functions.php
2.11 - A tiny locale fix on admin page (thanks sbr80 for reporting)
	   Tiny code cleanups in sitemap_functions.php
	   Added Russian Locale (Thanks sbr80 :))
	   Added German Locale (Thanks slaughter :))
2.10 - Sitemap update interval can now be selected via admin area
	   Photogallery System is now supported
	   Pro Download Panel, Kroax and Varcade systems are now supported
	   Admin can enable/disable each section in sitemap now
	   a tiny bug on weblink categories is fixed
	   Access controls of weblinks added in queries
	   Articles query improved
2.01 - Threads limiter fixed
	   Downloads xml parsing fixed
2.00 - Fixed Date Issue on old PHP versions
	   Dropped Weblinks And Forum Cats (i think weblinks are bad for seo, also forum cats are not required when they're forums)
	   Added News Cats
	   All Priorpty and Frequency Values Can Be Set Via Admin Panel
	   Added Dynamic Version Of Sitemap (sitemap.php at root folder)
1.05 - Output handling issue fixed at admin panel for adding text to title
	   XML sitemap now has a better interface
1.04 - File generation date showing fixed
1.03 - Weblink cat bug fixed
1.02 - Threads bug fixed
1.01 - Weblink bug fixed

Enjoy ;)