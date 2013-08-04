<?php
/*-------------------------------------------------------+
| PHP-Fusion Content Management System
| Copyright © 2002 - 2008 Nick Jones
| http://www.php-fusion.co.uk/
+--------------------------------------------------------+
| Filename: Spanish.php
| Version: 3.00
| Author: Javier Esteban [NobNob]
| Email: nobnob @gmail.com
| Web: http://php-fusion.es
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
$locale['smxml_02'] = "Hora de Creación del Sitemap: ";
$locale['smxml_03'] = "¡Ir al Sitemap!";
$locale['smxml_04'] = "¡Generar el Sitemap Ahora!";
$locale['smxml_05'] = "¡Envía tu Sitemap a buscadores!";
$locale['smxml_06'] = "¡Correcto!";
$locale['smxml_07'] = "El Sitemap ha sido creado correctamente";
$locale['smxml_08'] = "¡Error!";
$locale['smxml_09'] = "Ha habido un arror al crear el Sitemap. El archivo 'sitemap.xml' tiene que estar en el directorio raíz ('root') de PHP-Fusion y tiene que tener asignados los permisos CHMOD 777.";

$locale['smxml_16'] = array ( //new in 2.0
	0 => "Diaria",
	1 => "Semanal",
	2 => "Mensual",
	3 => "Anual"
);
$locale['smxml_17'] = "¡Configuración guardada correctamente!"; //new in 2.0
$locale['smxml_18'] = "Ha ocurrido un error al guardar la configuración."; //new in 2.0

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


$locale['smxml_43'] = "¡Guardar Configuración!"; //new in 2.01

$locale['smxml_44'] = "Sí"; //new in 2.10
$locale['smxml_45'] = "No"; //new in 2.10

$locale['smxml_49'] = "Intervalo de Regeneración del Sitemap (segundos)"; //new in 2.10


$locale['smxml_100'] = "Sección de Páginas Sitemap Personalizadas"; //new in 2.50
$locale['smxml_101'] = "Desde esta sección puedes añadir tus propias URL que no están generadas en el Mapa del Sitio XML.<br />\nLos enlaces no deben incluir / al principio (Ej.: La URL ".$settings['siteurl']."mi-pagina.php debe ser añadida como mi-pagina.php; o la URL ".$settings['siteurl']."infusions/tu-infusion/tu-pagina-infusion.php debe añadirse como infusions/tu-infusion/tu-pagina-infusion.php)."; //new in 2.50
$locale['smxml_102'] = "Dirección Enlace"; //new in 2.50
$locale['smxml_103'] = "Prioridad Enlace"; //new in 2.50
$locale['smxml_104'] = "Frecuencia Enlace"; //new in 2.50
$locale['smxml_105'] = "Guardar Enlace"; //new in 2.50

$locale['smxml_110'] = "Enlaces Actuales"; //new in 2.50
$locale['smxml_111'] = "Dirección Enlace"; //new in 2.50
$locale['smxml_112'] = "Frecuancia y Prioridad"; //new in 2.50
$locale['smxml_113'] = "Opciones"; //new in 2.50
$locale['smxml_114'] = "Editar"; //new in 2.50
$locale['smxml_115'] = "Borrar"; //new in 2.50
$locale['smxml_116'] = "No se han añadido enlaces personalizados."; //new in 2.50
$locale['smxml_117'] = "Enlace Borrado Correctamente"; //new in 2.50
$locale['smxml_118'] = "Ha habido un error al borrar el enlace."; //new in 2.50
$locale['smxml_119'] = "La dirección del enlace no puede estar en blanco."; //new in 2.50
$locale['smxml_120'] = "Enlace Actualizado Correctamente"; //new in 2.50
$locale['smxml_121'] = "Ha habido un error al actualizar el enlace."; //new in 2.50
$locale['smxml_122'] = "Enlace Añadido Correctamente"; //new in 2.50
$locale['smxml_123'] = "Ha habido un error al añadir el enlace."; //new in 2.50
$locale['smxml_124'] = "Para mantener mis proyectos, por favor, ayúdame con una donación. Cualquier cantidad será muy apreciada. Gracias."; //new in 2.50
$locale['smxml_125'] = "URL de tu Sitio Web"; //new in 2.50

//sitemap_submit.php
$locale['smxml_150'] = "Return to Sitemap XML Administration"; //new in 2.60

//sitemapxml_panel.php
$locale['smxml_10'] = "Administración del Sitemap";
$locale['smxml_11'] = "Última Generación:";
$locale['smxml_12'] = "¡Regenerar Ahora!";

//infusion.php
$locale['smxml_13'] = "Google Sitemap";
$locale['smxml_14'] = "Genera un Mapa del Sitio XML para Google";
$locale['smxml_15'] = "Google Sitemap";
?>