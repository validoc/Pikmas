<?php
/*
  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  CECA Module Copyright (c) 2009 by escri2

  seopedro@gmail.com

  Released under the GNU General Public License
*/
require('includes/application_top.php');
require(DIR_WS_MODULES . 'payment/ceca_escri2_module.php');
$ceca = new ceca_escri2_module();
$ceca->answer( $_POST['MerchantID'],
               $_POST['AcquirerBIN'],
               $_POST['TerminalID'],
               $_POST['Num_operacion'],
               $_POST['Importe'],
               $_POST['TipoMoneda'],
               $_POST['Exponente'],
               $_POST['Referencia'],
               $_POST['Firma'],
               $_POST['Num_aut']
             );
?>