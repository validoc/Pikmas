<?php
/*
  $Id: upcoming_products.php 1739 2007-12-20 00:52:16Z hpdl $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2003 osCommerce

  Released under the GNU General Public License
*/

  $expected_query = tep_db_query("select p.products_id, pd.products_name, p.products_image, p.products_model, s.status, s.specials_new_products_price, p.products_price, p.products_tax_class_id, products_date_available as date_expected from " . TABLE_PRODUCTS . " p left join " . TABLE_SPECIALS . " s on p.products_id = s.products_id, " . TABLE_PRODUCTS_DESCRIPTION . " pd where to_days(products_date_available) >= to_days(now()) and p.products_id = pd.products_id and pd.language_id = '" . (int)$languages_id . "' order by " . EXPECTED_PRODUCTS_FIELD . " " . EXPECTED_PRODUCTS_SORT . " limit " . MAX_DISPLAY_UPCOMING_PRODUCTS);
  if (tep_db_num_rows($expected_query) > 0) {
?>
<!-- upcoming_products //-->
<tr>
	<td>
		<br>
			<h1>Pr&oacute;ximos Lanzamientos </h1>
			<table border="0" width="100%" cellspacing="0" cellpadding="0" class="upcommingProducts">

				<tr>
					<td>

						<?php
	  $row = 0;
	  $col = 0;
	  $info_box_contents = array();
	  $col = 0;
	  while ($new_products = tep_db_fetch_array($expected_query)) {
		$info_box_contents[$row][$col] = array('align' => 'center',
											   'params' => ' valign="top"',
											   'text' => '<span class="upcomingDate">'.tep_date_short($new_products['date_expected']).'</span><p style="margin-top:-2px" ><a href="' . tep_href_link(FILENAME_PRODUCT_INFO, 'products_id=' . $new_products['products_id']) . '">' . tep_image(DIR_WS_IMAGES . $new_products['products_image'], $new_products['products_name'], SMALL_IMAGE_WIDTH, SMALL_IMAGE_HEIGHT) . '</a></p><p style="color:#222;height:20px; margin-top:-20px;"><a style="font-size:12px; font-weight:normal" href="' . tep_href_link(FILENAME_PRODUCT_INFO, 'products_id=' . $new_products['products_id']) . '">' . $new_products['products_name'] . '</a></p><p style="color:#fe0000; font-size:14px; font-weight:bold">' . $currencies->display_price($new_products['products_price'], tep_get_tax_rate($new_products['products_tax_class_id'])).'<br/><small><img src="images/icons/'.$new_products['products_model'].'-small.gif" /></small></p><br/>');

		$col ++;
		if ($col > 3) {
		  $col = 0;
		  $row ++;
		}
	  }	
	  if ($col > 0 || $row > 0) {
		new contentBox($info_box_contents);		
	  }
								 
?>
					</td>
				</tr>
			</table>
				</td>
          </tr>
<!-- upcoming_products_eof //-->
<?php
  }
?>


                           