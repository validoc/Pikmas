<?php
  require('includes/application_top.php');
  require(DIR_WS_LANGUAGES . $language . '/' . FILENAME_PRODUCT_INFO);
  $product_check_query = tep_db_query("select count(*) as total from " . TABLE_PRODUCTS . " p, " . TABLE_PRODUCTS_DESCRIPTION . " pd where p.products_status = '1' and p.products_id = '" . (int)$HTTP_GET_VARS['products_id'] . "' and pd.products_id = p.products_id and pd.language_id = '" . (int)$languages_id . "'");
  $product_check = tep_db_fetch_array($product_check_query);
?>
<!doctype html public "-//W3C//DTD HTML 4.01 Transitional//EN">
<html <?php echo HTML_PARAMS; ?>>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo CHARSET; ?>">
<title><?php echo TITLE; ?></title>
<base href="<?php echo (($request_type == 'SSL') ? HTTPS_SERVER : HTTP_SERVER) . DIR_WS_CATALOG; ?>">
<link rel="stylesheet" type="text/css" href="stylesheet.css">
      <!--lightbox-->
 <script type="text/javascript" src="js/prototype.js"></script>
<script type="text/javascript" src="js/scriptaculous.js?load=effects"></script>
<script type="text/javascript" src="js/lightbox.js"></script>
<link rel="stylesheet" type="text/css" href="lightbox.css">
        <!--//endlightbox-->
</head>
<body>

<div class="wrapper header">
<!-- header //-->

<?php require(DIR_WS_INCLUDES . 'header.php');
    $extra = true;
?>
<!-- header_eof //-->

<!-- body //-->
<table border="0" width="100%" cellspacing="3" cellpadding="3">
  <tr>
    <td width="<?php echo BOX_WIDTH; ?>" valign="top"><table border="0" width="<?php echo BOX_WIDTH; ?>" cellspacing="0" cellpadding="2">
<!-- left_navigation //-->
<?php require(DIR_WS_INCLUDES . 'column_left.php'); ?>
<!-- left_navigation_eof //-->
    </table>
    <?php require(DIR_WS_INCLUDES . 'banner_left.php'); ?><!-- left_navigation_eof //-->
    </td>
<!-- body_text //-->
    <td width="100%" valign="top"><?php echo tep_draw_form('cart_quantity', tep_href_link(FILENAME_PRODUCT_INFO, tep_get_all_get_params(array('action')) . 'action=add_product')); ?><table border="0" width="100%" cellspacing="0" cellpadding="0">
<?php
  if ($product_check['total'] < 1) {
?>
      <tr>
        <td><?php new infoBox(array(array('text' => TEXT_PRODUCT_NOT_FOUND))); ?></td>
      </tr>
      <tr>
        <td><?php echo tep_draw_separator('pixel_trans.gif', '100%', '10'); ?></td>
      </tr>
      <tr>
        <td><table border="0" width="100%" cellspacing="1" cellpadding="2" class="infoBox">
          <tr class="infoBoxContents">
            <td>
                <table border="0" width="100%" cellspacing="0" cellpadding="2">
              <tr>
                <td width="10"><?php echo tep_draw_separator('pixel_trans.gif', '10', '1'); ?></td>
                <td align="right"><?php echo '<a href="' . tep_href_link(FILENAME_DEFAULT) . '">' . tep_image_button('button_continue.gif', IMAGE_BUTTON_CONTINUE) . '</a>'; ?></td>
                <td width="10"><?php echo tep_draw_separator('pixel_trans.gif', '10', '1'); ?></td>
              </tr>
            </table></td>
          </tr>
        </table></td>
      </tr>
<?php
  } else {
    $product_info_query = tep_db_query("select p.products_id, pd.products_name, pd.products_description, p.products_model, p.products_quantity, p.products_image, pd.products_url, p.products_price, p.products_tax_class_id, p.products_date_added, p.products_date_available, p.manufacturers_id from " . TABLE_PRODUCTS . " p, " . TABLE_PRODUCTS_DESCRIPTION . " pd where p.products_status = '1' and p.products_id = '" . (int)$HTTP_GET_VARS['products_id'] . "' and pd.products_id = p.products_id and pd.language_id = '" . (int)$languages_id . "'");
    $product_info = tep_db_fetch_array($product_info_query);

    tep_db_query("update " . TABLE_PRODUCTS_DESCRIPTION . " set products_viewed = products_viewed+1 where products_id = '" . (int)$HTTP_GET_VARS['products_id'] . "' and language_id = '" . (int)$languages_id . "'");

    if ($new_price = tep_get_products_special_price($product_info['products_id'])) {
      $products_price = '<s>' . $currencies->display_price($product_info['products_price'], tep_get_tax_rate($product_info['products_tax_class_id'])) . '</s> <span class="productSpecialPrice">' . $currencies->display_price($new_price, tep_get_tax_rate($product_info['products_tax_class_id'])) . '</span>';
    } else {
      $products_price = $currencies->display_price($product_info['products_price'], tep_get_tax_rate($product_info['products_tax_class_id']));
    }

    if (tep_not_null($product_info['products_model'])) {
      $products_name = $product_info['products_name'] . '<br><span class="smallText">' .  tep_image(DIR_WS_IMAGES . 'consola-'. $product_info['products_model'].'.png', $product_info['products_model'], '187', '67') . '</span>';
    } else {
      $products_name = $product_info['products_name'];
    }
?>
      <tr>
        <td>
            <table border="0" width="100%" cellspacing="0" cellpadding="0">
          <tr>
            <td class="pageHeading" style="color:#777; padding:10px" valign="top"><?php echo $products_name; ?></td>
            <td class="pageHeading" style="color:#D72006; font-size:30px;padding:10px; " align="right" valign="top"><?php echo $products_price; ?></td>
          </tr>
          <?php if($product_info['products_quantity'] < 1) { ?>
          <tr>
            <td class="pageHeading" style="color:#777; padding:10px" valign="top"></td>
            <td class="pageHeading" style="color:#D72006; font-size:20px;padding:0 25px; " align="right" valign="top">AGOTADO</td>
          </tr>
          <?php } ?>
        </table>
        </td>
      </tr>
      <tr>
        <td><?php echo tep_draw_separator('pixel_trans.gif', '100%', '10'); ?></td>
      </tr>
      <tr>
        <td class="main">
<?php
    if (tep_not_null($product_info['products_image'])) {
?>
          <table border="0" cellspacing="0" cellpadding="2" align="right">
            <tr>
              <td align="center" class="smallText">
<?php echo '<a href="' . tep_href_link(DIR_WS_IMAGES . $product_info['products_image']) . '" target="_blank" rel="lightbox">' . tep_image(DIR_WS_IMAGES . $product_info['products_image'], $product_info['products_name'], SMALL_IMAGE_WIDTH, SMALL_IMAGE_HEIGHT, 'hspace="5" vspace="5"') . '<br>' . TEXT_CLICK_TO_ENLARGE . '</a>'; ?>
              </td>
            </tr>
          </table>
<?php
    }
?>
          <p><?php echo stripslashes($product_info['products_description']); ?></p>
<?php
    $products_attributes_query = tep_db_query("select count(*) as total from " . TABLE_PRODUCTS_OPTIONS . " popt, " . TABLE_PRODUCTS_ATTRIBUTES . " patrib where patrib.products_id='" . (int)$HTTP_GET_VARS['products_id'] . "' and patrib.options_id = popt.products_options_id and popt.language_id = '" . (int)$languages_id . "'");
    $products_attributes = tep_db_fetch_array($products_attributes_query);
    if ($products_attributes['total'] > 0) {
?>
          <table border="0" cellspacing="0" cellpadding="2">
            <tr>
              <td class="main" colspan="2"><?php echo TEXT_PRODUCT_OPTIONS; ?></td>
            </tr>
<?php
      $products_options_name_query = tep_db_query("select distinct popt.products_options_id, popt.products_options_name from " . TABLE_PRODUCTS_OPTIONS . " popt, " . TABLE_PRODUCTS_ATTRIBUTES . " patrib where patrib.products_id='" . (int)$HTTP_GET_VARS['products_id'] . "' and patrib.options_id = popt.products_options_id and popt.language_id = '" . (int)$languages_id . "' order by popt.products_options_name");
      while ($products_options_name = tep_db_fetch_array($products_options_name_query)) {
        $products_options_array = array();
        $products_options_query = tep_db_query("select pov.products_options_values_id, pov.products_options_values_name, pa.options_values_price, pa.price_prefix from " . TABLE_PRODUCTS_ATTRIBUTES . " pa, " . TABLE_PRODUCTS_OPTIONS_VALUES . " pov where pa.products_id = '" . (int)$HTTP_GET_VARS['products_id'] . "' and pa.options_id = '" . (int)$products_options_name['products_options_id'] . "' and pa.options_values_id = pov.products_options_values_id and pov.language_id = '" . (int)$languages_id . "'");
        while ($products_options = tep_db_fetch_array($products_options_query)) {
          $products_options_array[] = array('id' => $products_options['products_options_values_id'], 'text' => $products_options['products_options_values_name']);
          if ($products_options['options_values_price'] != '0') {
            $products_options_array[sizeof($products_options_array)-1]['text'] .= ' (' . $products_options['price_prefix'] . $currencies->display_price($products_options['options_values_price'], tep_get_tax_rate($product_info['products_tax_class_id'])) .') ';
          }
        }

        if (isset($cart->contents[$HTTP_GET_VARS['products_id']]['attributes'][$products_options_name['products_options_id']])) {
          $selected_attribute = $cart->contents[$HTTP_GET_VARS['products_id']]['attributes'][$products_options_name['products_options_id']];
        } else {
          $selected_attribute = false;
        }
?>
            <tr>
              <td class="main"><?php echo $products_options_name['products_options_name'] . ':'; ?></td>
              <td class="main"><?php echo tep_draw_pull_down_menu('id[' . $products_options_name['products_options_id'] . ']', $products_options_array, $selected_attribute); ?></td>
            </tr>
<?php
      }
?>
          </table>
<?php
    }
?>
        </td>
      </tr>
      <tr>
        <td><?php echo tep_draw_separator('pixel_trans.gif', '100%', '10'); ?></td>
      </tr>
<?php
    $reviews_query = tep_db_query("select count(*) as count from " . TABLE_REVIEWS . " where products_id = '" . (int)$HTTP_GET_VARS['products_id'] . "'");
    $reviews = tep_db_fetch_array($reviews_query);
    if ($reviews['count'] > 0) {
?>
      <tr>
        <td class="main"><?php echo TEXT_CURRENT_REVIEWS . ' ' . $reviews['count']; ?></td>
      </tr>
      <tr>
        <td><?php echo tep_draw_separator('pixel_trans.gif', '100%', '10'); ?></td>
      </tr>
<?php
    }

    if (tep_not_null($product_info['products_url'])) {
?>
      <tr>
        <td class="main"><?php echo sprintf(TEXT_MORE_INFORMATION, tep_href_link(FILENAME_REDIRECT, 'action=url&goto=' . urlencode($product_info['products_url']), 'NONSSL', true, false)); ?></td>
      </tr>
      <tr>
        <td><?php echo tep_draw_separator('pixel_trans.gif', '100%', '10'); ?></td>
      </tr>
<?php
    }

    if ($product_info['products_date_available'] > date('Y-m-d H:i:s')) {
?>
      <tr>
        <td align="center" class="smallText"><?php echo sprintf(TEXT_DATE_AVAILABLE, tep_date_long($product_info['products_date_available'])); ?></td>
      </tr>
<?php
    } else {
?>
      <tr>
        <td align="center" class="smallText"><?php echo sprintf(TEXT_DATE_ADDED, tep_date_long($product_info['products_date_added'])); ?></td>
      </tr>
<?php
    }
?>
  <!-- regalo -->
  <?php
      $the_query = tep_db_query("select distinct p.products_id as id, pd.products_name as text FROM " . TABLE_PRODUCTS . " p LEFT JOIN " . TABLE_SPECIALS . " s on p.products_id = s.products_id, " . TABLE_PRODUCTS_DESCRIPTION . " pd, " . TABLE_PRODUCTS_TO_CATEGORIES . " p2c, " . TABLE_CATEGORIES . " c where p.products_id = p2c.products_id and p2c.categories_id = c.categories_id and c.categories_id = '46' and p.products_status = '1' and p.products_id = pd.products_id and pd.language_id = '" . (int)$languages_id . "' order by p.products_date_added desc");
      $the_names = array(array('id'=>'', 'text' => 'Ninguno'));
      while ($the_records = tep_db_fetch_array($the_query)) {
        array_push($the_names, $the_records);
      }
  ?>
      <tr>
        <td align="center" class="smallText"><b>Seleccione su regalo: </b><?php echo tep_draw_pull_down_menu('gift_id', $the_names, '', 'id="gift_id"'); ?></td>
      
                        <script>
                          function replacer(str, p1, offset, s){
                            var result = jQuery('#gift_id').val();
                            if(result != ''){
                            return (str + ',' + result);
                            } else{
                              return str;
                            }
                          }
                  jQuery(document).ready(function(){
                  jQuery("#btn_agregar_p").click(function(){
                    var the_form = jQuery(this).parents('form');
                    var url_for_action = the_form.attr('action').replace(/products_id=(\d*)/, replacer);
                    the_form.attr('action', url_for_action);
                    the_form.submit();
                    return false;
                  });
                  });
                </script>
      </tr>
<!-- regalo end -->
      <tr>
        <td><?php echo tep_draw_separator('pixel_trans.gif', '100%', '10'); ?></td>
      </tr>
      <tr>
        <td><table border="0" width="100%" cellspacing="1" cellpadding="2" class="infoBox">
          <tr class="infoBoxContents">
            <td>
                <table border="0" width="100%" cellspacing="0" cellpadding="2">
              <tr>
                <td width="10"><?php echo tep_draw_separator('pixel_trans.gif', '10', '1'); ?></td>
                <td class="main"><?php echo '<a href="' . tep_href_link(FILENAME_PRODUCT_REVIEWS, tep_get_all_get_params()) . '">' . tep_image_button('button_reviews.gif', IMAGE_BUTTON_REVIEWS) . '</a>'; ?></td>
                <?php  if ($product_info['products_date_available'] > date('Y-m-d H:i:s')) { ?>
                <input type="hidden" value="true" name="resevar"/>
                <td class="main" align="right"><?php echo tep_draw_hidden_field('products_id', $product_info['products_id']) . tep_image_submit('boton-reservar.gif', IMAGE_BUTTON_IN_CART, 'id="btn_reservation"'); ?></td>
                <script>
                  jQuery(document).ready(function(){
                  jQuery("#btn_reservation").click(function(){
                    var the_form = jQuery(this).parents('form');
                    var url_for_action = the_form.attr('action').replace("product_info.php", "form_reservation.php", "gi");
                    url_for_action = url_for_action.replace("add_product", "reservation_al", "gi");
                    the_form.attr('action', url_for_action);
                    the_form.submit();
                    return false;
                  });
                  });
                </script>
                <?php } else { ?>
                <td class="main" align="right"><?php echo tep_draw_hidden_field('products_id', $product_info['products_id']) . tep_image_submit('button_in_cart.gif', IMAGE_BUTTON_IN_CART, 'id="btn_agregar_p"'); ?></td>
                <?php } ?>
                <td width="10"><?php echo tep_draw_separator('pixel_trans.gif', '10', '1'); ?></td>
              </tr>
            </table></td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td><?php echo tep_draw_separator('pixel_trans.gif', '100%', '10'); ?></td>
      </tr>
      <tr>
        <td>
<?php
    if ((USE_CACHE == 'true') && empty($SID)) {
      echo tep_cache_also_purchased(3600);
    } else {
      include(DIR_WS_MODULES . FILENAME_ALSO_PURCHASED_PRODUCTS);
    }
  }
?>
        </td>
      </tr>
    </table></form></td>
<!-- body_text_eof //-->
    <td width="<?php echo BOX_WIDTH; ?>" valign="top"><table border="0" width="<?php echo BOX_WIDTH; ?>" cellspacing="0" cellpadding="2">
<!-- right_navigation //-->
<?php require(DIR_WS_INCLUDES . 'column_right.php'); ?>
<!-- right_navigation_eof //-->
    </table>
<?php require(DIR_WS_INCLUDES . 'banner_right.php'); ?>
    </td>
  </tr>
</table>
<!-- body_eof //-->



<!-- footer_eof //-->
</div>
<br/>
<tr>
<!-- footer //-->
<?php require(DIR_WS_INCLUDES . 'footer.php'); ?>
</tr>
<!--<script type="text/javascript">
    var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgDown:"SpryAssets/SpryMenuBarDownHover.gif", imgRight:"SpryAssets/SpryMenuBarRightHover.gif"});
</script>-->
</body>
</html>
<?php require(DIR_WS_INCLUDES . 'application_bottom.php'); ?>
