<?php
/*
  $Id: best_sellers.php 1739 2007-12-20 00:52:16Z hpdl $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2003 osCommerce

  Released under the GNU General Public License
*/

if (isset($current_category_id) && ($current_category_id > 0)) {
    $best_sellers_query = tep_db_query("select distinct p.products_id, p.products_price, p.products_tax_class_id, p.products_image, p.products_model, pd.products_name from " . TABLE_PRODUCTS . " p, " . TABLE_PRODUCTS_DESCRIPTION . " pd, " . TABLE_PRODUCTS_TO_CATEGORIES . " p2c, " . TABLE_CATEGORIES . " c where p.products_status = '1' and p.products_ordered > 0 and p.products_id = pd.products_id and pd.language_id = '" . (int)$languages_id . "' and p.products_id = p2c.products_id and p2c.categories_id = c.categories_id and '" . (int)$current_category_id . "' in (c.categories_id, c.parent_id) order by p.products_ordered desc, pd.products_name limit " . MAX_DISPLAY_BESTSELLERS);
} else {
    if(isset($extra)) {
        $prod = tep_db_fetch_array(tep_db_query('SELECT products_model FROM products WHERE products.products_id = '. $HTTP_GET_VARS['products_id']));
        //$best_sellers_query = tep_db_query("select distinct p.products_id, p.products_price, p.products_tax_class_id, p.products_image, p.products_model, pd.products_name from " . TABLE_PRODUCTS . " p, " . TABLE_PRODUCTS_DESCRIPTION . " pd where p.products_status = '1' and p.products_ordered > 0 and p.products_id = pd.products_id and pd.language_id = '" . (int)$languages_id . "' order by p.products_ordered desc, pd.products_name limit " . MAX_DISPLAY_BESTSELLERS);
        $best_sellers_query = tep_db_query("select distinct p.products_id, p.products_price, p.products_tax_class_id, p.products_image, p.products_model, pd.products_name from " . TABLE_PRODUCTS . " p, " . TABLE_PRODUCTS_DESCRIPTION . " pd where p.products_status = '1' and p.products_ordered > 0 and p.products_id = pd.products_id and pd.language_id = '" . (int)$languages_id . "'
        AND p.products_id IN (SELECT products_id FROM products WHERE products.products_model = '". $prod['products_model'] ."')
        ORDER BY p.products_ordered desc, pd.products_name");
    } else {
        //$best_sellers_query = tep_db_query("select distinct p.products_id, p.products_price, p.products_tax_class_id, p.products_image, p.products_model, pd.products_name from " . TABLE_PRODUCTS . " p, " . TABLE_PRODUCTS_DESCRIPTION . " pd where p.products_status = '1' and p.products_ordered > 0 and p.products_id = pd.products_id and pd.language_id = '" . (int)$languages_id . "' order by p.products_ordered desc, pd.products_name limit " . MAX_DISPLAY_BESTSELLERS);
        $best_sellers_query = tep_db_query("select distinct p.products_id, p.products_price, p.products_tax_class_id, p.products_image, p.products_model, pd.products_name from " . TABLE_PRODUCTS . " p, " . TABLE_PRODUCTS_DESCRIPTION . " pd where p.products_status = '1' and p.products_ordered > 0 and p.products_id = pd.products_id and pd.language_id = '" . (int)$languages_id . "'
        AND p.products_id IN (SELECT products_id FROM products_selected WHERE products_selected.type = 'top')
        ORDER BY p.products_ordered desc, pd.products_name");
    }
}

if (tep_db_num_rows($best_sellers_query) >= MIN_DISPLAY_BESTSELLERS) {
    ?>
<!-- best_sellers //-->
<tr>
    <td>
            <?php
            $info_box_contents = array();
            $info_box_contents[] = array('text' => BOX_HEADING_BESTSELLERS);

            new infoBoxHeading($info_box_contents, false, false);
            $rows = 0;
            $bestsellers_list = '<ul class="bestSellers">';
            while ($best_sellers = tep_db_fetch_array($best_sellers_query)) {
                $rows++;
                $bestsellers_list .= '<li class="bestSellers top'.$rows.'">
	  <table>
	  		<tr>
				<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
				<td>'. tep_image(DIR_WS_IMAGES . $best_sellers['products_image'], $best_sellers['products_name'], SMALL_IMAGE_WIDTH, SMALL_IMAGE_HEIGHT) . ' </td>
				<td>
					<table>
						<tr>
							<td><a href="' . tep_href_link(FILENAME_PRODUCT_INFO, 'products_id=' . $best_sellers['products_id']) . '">' . $best_sellers['products_name'] . '</a> </td>
						</tr>
						<tr>
							<td><span>' . $currencies->display_price($best_sellers['products_price'], tep_get_tax_rate($best_sellers['products_tax_class_id'])) . '</span></td>
						</tr>
						<tr>
							<td><img src="images/icons/'.$best_sellers['products_model'].'-small.gif" /></td>
						</tr>
					</table>
				</td>

			</tr>
	  </table>
	  </li>';
            }
            $bestsellers_list .= '</ul>';

            $info_box_contents = array();
            $info_box_contents[] = array('text' => $bestsellers_list);

            new infoBox($info_box_contents);
            ?>
    </td>
</tr>
<!-- best_sellers_eof //-->
    <?php
}
?>
