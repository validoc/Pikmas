<?php
/*
  $Id: new_products.php 1806 2008-01-11 22:48:15Z hpdl $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2008 osCommerce

  Released under the GNU General Public License
*/
?>
<!-- new_products //-->
<?php
  
       $modelos = tep_db_query("select distinct p.products_model from " . TABLE_PRODUCTS . " p  order by p.products_model asc ");
  
      echo "<h1>Novedades </h1>";
	  echo '<table width="100%"><tr><td colspan="4"><div id="TabbedPanels1" class="TabbedPanels"><ul class="TabbedPanelsTabGroup">';
	  while ($modelo = tep_db_fetch_array($modelos)) {
		  if ( (!isset($new_products_category_id)) || ($new_products_category_id == '0') ) {
			$new_products_query = tep_db_query("select p.products_id, p.products_image, p.products_model, p.products_tax_class_id, pd.products_name, if(s.status, s.specials_new_products_price, p.products_price) as products_price from " . TABLE_PRODUCTS . " p left join " . TABLE_SPECIALS . " s on p.products_id = s.products_id, " . TABLE_PRODUCTS_DESCRIPTION . " pd where p.products_model = '".$modelo['products_model']."' AND p.products_status = '1' and p.products_id = pd.products_id and pd.language_id = '" . (int)$languages_id . "' order by p.products_date_added desc limit " . MAX_DISPLAY_NEW_PRODUCTS);
		  } else {
			$new_products_query = tep_db_query("select distinct p.products_id, p.products_model, p.products_image, p.products_tax_class_id, pd.products_name, if(s.status, s.specials_new_products_price, p.products_price) as products_price from " . TABLE_PRODUCTS . " p left join " . TABLE_SPECIALS . " s on p.products_id = s.products_id, " . TABLE_PRODUCTS_DESCRIPTION . " pd, " . TABLE_PRODUCTS_TO_CATEGORIES . " p2c, " . TABLE_CATEGORIES . " c where p.products_model = '".$modelo['products_model']."' AND p.products_id = p2c.products_id and p2c.categories_id = c.categories_id and c.parent_id = '" . (int)$new_products_category_id . "' and p.products_status = '1' and p.products_id = pd.products_id and pd.language_id = '" . (int)$languages_id . "' order by p.products_date_added desc limit " . MAX_DISPLAY_NEW_PRODUCTS);
		  }
		   if (tep_db_num_rows($new_products_query) > 0) {
			 echo '<li class="TabbedPanelsTab" tabindex="0"><a name="'.$modelo['products_model'].'"><span>'.$modelo['products_model'].'</span></a></li>';
		   }
	  }
	  echo '</ul><div class="TabbedPanelsContentGroup">';

	  $modelos = tep_db_query("select distinct p.products_model from " . TABLE_PRODUCTS . " p  order by p.products_model asc ");
		 
  	  /* $info_box_contents = array();
	  $info_box_contents[] = array('text' => sprintf(TABLE_HEADING_NEW_PRODUCTS, strftime('%B')));

	  new contentBoxHeading($info_box_contents); */
	  
  
  while ($modelo = tep_db_fetch_array($modelos)) {
	  $row = 0;
	  $col = 0;
	  $info_box_contents = array();

	  if ( (!isset($new_products_category_id)) || ($new_products_category_id == '0') ) {
		$new_products_query = tep_db_query("select p.products_id, p.products_image, p.products_model, p.products_tax_class_id, pd.products_name, if(s.status, s.specials_new_products_price, p.products_price) as products_price from " . TABLE_PRODUCTS . " p left join " . TABLE_SPECIALS . " s on p.products_id = s.products_id, " . TABLE_PRODUCTS_DESCRIPTION . " pd where p.products_model = '".$modelo['products_model']."' AND p.products_status = '1' and p.products_id = pd.products_id and pd.language_id = '" . (int)$languages_id . "' order by p.products_date_added desc limit " . MAX_DISPLAY_NEW_PRODUCTS);
	  } else {
		$new_products_query = tep_db_query("select distinct p.products_id, p.products_model, p.products_image, p.products_tax_class_id, pd.products_name, if(s.status, s.specials_new_products_price, p.products_price) as products_price from " . TABLE_PRODUCTS . " p left join " . TABLE_SPECIALS . " s on p.products_id = s.products_id, " . TABLE_PRODUCTS_DESCRIPTION . " pd, " . TABLE_PRODUCTS_TO_CATEGORIES . " p2c, " . TABLE_CATEGORIES . " c where p.products_model = '".$modelo['products_model']."' AND p.products_id = p2c.products_id and p2c.categories_id = c.categories_id and c.parent_id = '" . (int)$new_products_category_id . "' and p.products_status = '1' and p.products_id = pd.products_id and pd.language_id = '" . (int)$languages_id . "' order by p.products_date_added desc limit " . MAX_DISPLAY_NEW_PRODUCTS);
	  }
	  
	  $col = 0;
	  while ($new_products = tep_db_fetch_array($new_products_query)) {
		$info_box_contents[$row][$col] = array('align' => 'center',
											   'params' => 'class="smallText" width="25%" valign="top"',
											   'text' => '
											 <table class="novedadestable">
											   <tr>
											   		<td style="text-align:center">
													<a href="' . tep_href_link(FILENAME_PRODUCT_INFO, 'products_id=' . $new_products['products_id']) . '">' . tep_image(DIR_WS_IMAGES . $new_products['products_image'], $new_products['products_name'], SMALL_IMAGE_WIDTH, SMALL_IMAGE_HEIGHT) . '</a>
													</td>
											   </tr>
											   <tr>
											   		<td style="height:50px;text-align:center">
													<a href="' . tep_href_link(FILENAME_PRODUCT_INFO, 'products_id=' . $new_products['products_id']) . '">' . $new_products['products_name'] . '</a>
													</td>
												</tr>
												<tr>
													<td style="color:#fe0000; font-weight:bold;text-align:center; font-size:14px">' . $currencies->display_price($new_products['products_price'], tep_get_tax_rate($new_products['products_tax_class_id'])).'</td></tr><tr><td style="text-align:center"><small><img src="images/icons/'.$new_products['products_model'].'-small.gif" /></small>
													</td>
												</tr>
											</table>');

		$col ++;
		if ($col > 3) {
		  $col = 0;
		  $row ++;
		}
	  }	
	  if ($col > 0 || $row > 0) {
		echo '<div class="TabbedPanelsContent"><table width="100%"><tr class="bloquenovedades"><td align="center" class="smallText" width="100%" valign="top">';
		new contentBox($info_box_contents);		
		echo '</td></tr><tr><td class="upcommingProductsVerMas"><a href="index.php?products_model='.$modelo['products_model'].'">Ver todas las novedades '.$modelo['products_model'].' &rarr;</a></td></tr></table></div>';
	  }
  }
  echo '</div></td></tr></table>';
  
?>
<script type="text/javascript">
	<!--
var TabbedPanels1 = new Spry.Widget.TabbedPanels("TabbedPanels1");
var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgDown:"SpryAssets/SpryMenuBarDownHover.gif", imgRight:"SpryAssets/SpryMenuBarRightHover.gif"});
//-->

</script>

<!-- new_products_eof //-->
