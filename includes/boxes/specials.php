<?php
/*
  $Id: specials.php 1739 2007-12-20 00:52:16Z hpdl $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2003 osCommerce

  Released under the GNU General Public License
*/

	
?>
<!-- specials //-->
          <tr>
            <td>
            	     <table border="0" cellspacing="0" width="180px" cellpadding="0">
                     	<tr>
                        <td>
<?php
    $info_box_contents = array();
    $info_box_contents[] = array('text' => BOX_HEADING_SPECIALS);

    new infoBoxHeading($info_box_contents, false, false, tep_href_link(FILENAME_SPECIALS));

	$row=0;
	$contenidos = "<ul>";
    while ($row <= 4) {
      $row++;
  if ($random_product = tep_random_select("select p.products_id, pd.products_name, p.products_price, p.products_tax_class_id, p.products_model, p.products_image, s.specials_new_products_price from " . TABLE_PRODUCTS . " p, " . TABLE_PRODUCTS_DESCRIPTION . " pd, " . TABLE_SPECIALS . " s where p.products_status = '1' and p.products_id = s.products_id and pd.products_id = s.products_id and pd.language_id = '" . (int)$languages_id . "' and s.status = '1' order by s.specials_date_added desc limit " . MAX_RANDOM_SELECT_SPECIALS)) {


	   $contenidos .= '<li class="consoleType">
	   <table>
	   	<tr>
			<td>' . tep_image(DIR_WS_IMAGES . $random_product['products_image'], $random_product['products_name'], SMALL_IMAGE_WIDTH, SMALL_IMAGE_HEIGHT) . ' 
			</td>
			<td>
				<a style="font-weight:normal" href="' . tep_href_link(FILENAME_PRODUCT_INFO, 'products_id=' . $random_product['products_id']) . '">
					' . $random_product['products_name'] . '</a>
					<br/>
					<span style="font-weight:bold; font-size:13px;"><span style="text-decoration:none  !important">Antes:&nbsp;</span>' . $currencies->display_price($random_product['products_price'], tep_get_tax_rate($random_product['products_tax_class_id'])) . '</span><br/>
					<span class="productSpecialPrice" style="color:#fe0000; font-weight:bold; font-size:14px; font-family:arial">Ahora:&nbsp;' . $currencies->display_price($random_product['specials_new_products_price'], tep_get_tax_rate($random_product['products_tax_class_id'])) . '</span> <br />
					<small><img src="images/icons/'.$random_product['products_model'].'-small.gif" /></small><br/></td>
		</tr>	
		</table>
		</li>';
	   /* $contenidos .= '<li class="consoleType"><div  class="offerImg"><a href="' . tep_href_link(FILENAME_PRODUCT_INFO, 'products_id=' . $random_product["products_id"]) . '">' . tep_image(DIR_WS_IMAGES . $random_product['products_image'], $random_product['products_name'], SMALL_IMAGE_WIDTH, SMALL_IMAGE_HEIGHT) . '</a><br><a href="' . tep_href_link(FILENAME_PRODUCT_INFO, 'products_id=' . $random_product['products_id']) . '">' . $random_product['products_name'] . '</a><br><s>' . $currencies->display_price($random_product['products_price'], tep_get_tax_rate($random_product['products_tax_class_id'])) . '</s><br><span class="productSpecialPrice">' . $currencies->display_price($random_product['specials_new_products_price'], tep_get_tax_rate($random_product['products_tax_class_id'])) . '</li>'; */

    
	  }
	  
  }
  
  $contenidos .= "</ul>";
  $info_box_contents = array();
	  $info_box_contents[] = array('text' => $contenidos);
	  new infoBox($info_box_contents);

	
?>
            </td>
            </tr>
            </table>
            </td>
          </tr>
<!-- specials_eof //-->
<?php
?>
