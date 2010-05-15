<?php
/*
  $Id: checkout_success.php 1739 2007-12-20 00:52:16Z hpdl $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2002 osCommerce

  Released under the GNU General Public License
*/

define('NAVBAR_TITLE_1', 'Pedido');
define('NAVBAR_TITLE_2', 'Realizado con &eacute;xito');

define('HEADING_TITLE', 'Tu Pedido ha sido Procesado!');

define('TEXT_SUCCESS', 'Tu pedido ha sido realizado con &eacute;xito! Tus productos llegar&aacute;n a su destino en 24 horas.');
define('TEXT_NOTIFY_PRODUCTS', 'Por favor notif&iacute;came de cambios realizados a los productos seleccionados:');
define('TEXT_SEE_ORDERS', 'Puedes ver tus pedidos viendo la pagina de <a href="' . tep_href_link(FILENAME_ACCOUNT, '', 'SSL') . '">\'Tu Cuenta\'</a> y pulsando sobre <a href="' . tep_href_link(FILENAME_ACCOUNT_HISTORY, '', 'SSL') . '">\'Historial\'</a>.');
define('TEXT_CONTACT_STORE_OWNER', 'Dirige tus preguntas al <a href="' . tep_href_link(FILENAME_CONTACT_US) . '">dudas@pikmas.com</a> o ll&aacute;manos al 942 087 182 ó 942 087 833 .');
define('TEXT_THANKS_FOR_SHOPPING', '¡Gracias por comprar con nosotros!');

define('TABLE_HEADING_COMMENTS', 'Introduzca un comentario sobre su pedido');

define('TABLE_HEADING_DOWNLOAD_DATE', 'Fecha Caducidad: ');
define('TABLE_HEADING_DOWNLOAD_COUNT', ' descargas restantes');
define('HEADING_DOWNLOAD', 'Descargue sus productos aqui:');
define('FOOTER_DOWNLOAD', 'Puede descargar sus productos mas tarde en \'%s\'');
?>