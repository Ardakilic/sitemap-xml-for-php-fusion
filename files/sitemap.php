<?php
/*-------------------------------------------------------+
| PHP-Fusion Content Management System
| Copyright © 2002 - 2013 Nick Jones
| http://www.php-fusion.co.uk/
+--------------------------------------------------------+
| Filename: sitemap.php
| Version: 3.00
| Author: Arda Kilicdagi (SoulSmasher)
| Web: http://www.arda.pw
+--------------------------------------------------------+
| This program is released as free software under the
| Affero GPL license. You can redistribute it and/or
| modify it under the terms of this license which you
| can read by viewing the included agpl.txt or online
| at www.gnu.org/licen... Removal of this
| copyright header is strictly prohibited without
| written permission from the original author(s).
+--------------------------------------------------------*/

//THIS PHP IS FOR THE PERSONS WHO WANT THE XML GENERATED DYNAMICALLY
//BU PHP DOSYASI DİNAMİK OLUŞTURMA İÇİNDİR STATİK OLUŞTURMAYI İSTEMEYENLER BUNU KULLANSIN

require "maincore.php";
require INFUSIONS."sitemapxml/infusion_db.php";
require INFUSIONS."sitemapxml/sitemap_functions.php";
header ("Content-type: application/xml");
echo generate_sitemapxml();
?>