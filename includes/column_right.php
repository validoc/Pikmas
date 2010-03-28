<?php
/*
  $Id: column_right.php 1739 2007-12-20 00:52:16Z hpdl $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2003 osCommerce

  Released under the GNU General Public License
*/

  //require(DIR_WS_BOXES . 'shopping_cart.php');


  if (isset($HTTP_GET_VARS['products_id'])) include(DIR_WS_BOXES . 'manufacturer_info.php');

  if (tep_session_is_registered('customer_id')) include(DIR_WS_BOXES . 'order_history.php');

  if (isset($HTTP_GET_VARS['products_id'])) {
    if (tep_session_is_registered('customer_id')) {
      $check_query = tep_db_query("select count(*) as count from " . TABLE_CUSTOMERS_INFO . " where customers_info_id = '" . (int)$customer_id . "' and global_product_notifications = '1'");
      $check = tep_db_fetch_array($check_query);
      if ($check['count'] > 0) {
        include(DIR_WS_BOXES . 'best_sellers.php');
      } else {
        //include(DIR_WS_BOXES . 'product_notifications.php');
      }
    } else {
      include(DIR_WS_BOXES . 'product_notifications.php');
    }
  }  

  if (substr(basename($PHP_SELF), 0, 8) != 'checkout') {
   
 
  }
require(DIR_WS_BOXES . 'consolas.php');
  if ($banner = tep_banner_exists('dynamic', 'asistencia')) {

	?>

    

		<!-- banner asistencia-->

		<tr><td>

             <table border="0" cellspacing="0" width="100%" cellpadding="0">

             </table>

             <table width="100%" border="0" cellspacing="0" cellpadding="0" >

               <tr>

                 <td><table  width="100%"  border="0" cellspacing="0" cellpadding="0" >

                     <tr>

                       <td>

                       <?=tep_display_banner('static', $banner)?>

                       </td>

                     </tr>

                     <tr>



                       <td><img src="images/pixel_trans.gif" border="0" alt="" width="100%" height="1" /> </td>

                     </tr>

                 </table></td>

               </tr>

             </table>
             </td></tr>

<?php  }

  require(DIR_WS_BOXES . 'specials.php');
?>
