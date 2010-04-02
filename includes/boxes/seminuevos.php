<?php
if(isset($extra)) {
    $prod = tep_db_fetch_array(tep_db_query('SELECT products_model FROM products WHERE products.products_id = '. $HTTP_GET_VARS['products_id']));
    $seminuevos_query = tep_db_query("SELECT distinct p.products_id, p.products_model, p.products_image, p.products_tax_class_id, pd.products_name, if(s.status, s.specials_new_products_price, p.products_price) as products_price, c.categories_image AS category_image FROM " . TABLE_PRODUCTS . " p LEFT JOIN " . TABLE_SPECIALS . " s on p.products_id = s.products_id, " . TABLE_PRODUCTS_DESCRIPTION . " pd, " . TABLE_PRODUCTS_TO_CATEGORIES . " p2c, " . TABLE_CATEGORIES . " c
                                        WHERE p.products_id = p2c.products_id and p2c.categories_id = c.categories_id and c.categories_id = '29' and p.products_status = '1' and p.products_id = pd.products_id and pd.language_id = '" . (int)$languages_id . "'
                                        AND p.products_id IN (SELECT products_id FROM products WHERE products.products_model = '". $prod['products_model'] ."')
                                        ORDER BY p.products_date_added desc limit 5");
} else {
    $seminuevos_query = tep_db_query("SELECT distinct p.products_id, p.products_model, p.products_image, p.products_tax_class_id, pd.products_name, if(s.status, s.specials_new_products_price, p.products_price) as products_price, c.categories_image AS category_image FROM " . TABLE_PRODUCTS . " p LEFT JOIN " . TABLE_SPECIALS . " s on p.products_id = s.products_id, " . TABLE_PRODUCTS_DESCRIPTION . " pd, " . TABLE_PRODUCTS_TO_CATEGORIES . " p2c, " . TABLE_CATEGORIES . " c
                                        WHERE p.products_id = p2c.products_id and p2c.categories_id = c.categories_id and c.categories_id = '29' and p.products_status = '1' and p.products_id = pd.products_id and pd.language_id = '" . (int)$languages_id . "'
                                        AND p.products_id IN (SELECT products_id FROM products_selected WHERE products_selected.type = 'seminuevos')
                                        ORDER BY p.products_date_added desc limit 5");
}
?>
<!-- seminuevos-->
<tr>
    <td>
        <table border="0" cellspacing="0" width="100%" cellpadding="0">
            <tr>
                <td width="10px"><img border="0" alt="" src="images/infobox/corner_left.gif"> </td>
                <td width="100%" height="14" class="infoBoxHeading">Seminuevos</td>
                <td><img border="0" alt="" src="images/infobox/corner_right.gif"> </td>
            </tr>
        </table>
        <table width="100%" border="0" cellspacing="0" cellpadding="1" class="infoBox">
            <tr>
                <td><table  width="100%"  border="0" cellspacing="0" cellpadding="3" class="infoBoxContents">
                        <tr>
                            <td><img src="images/pixel_trans.gif" border="0" alt="" width="100%" height="1" /></td>
                        </tr>
                        <tr>
                            <td class="boxText"><ul>
                                    <?php
                                    while ($seminuevos = tep_db_fetch_array($seminuevos_query)) { ?>
                                    <li class="consoleType">
                                        <table>
                                            <tr>
                                                <td>
                                                        <?php echo(tep_image(DIR_WS_IMAGES . $seminuevos['products_image'], $seminuevos['products_name'], SMALL_IMAGE_WIDTH, SMALL_IMAGE_HEIGHT))?>
                                                </td>
                                                <td>
                                                        <?php echo('<a href="' . tep_href_link(FILENAME_PRODUCT_INFO, 'products_id=' . $seminuevos['products_id']) . '">' . $seminuevos['products_name']. '</a>')?>
                                                    <br/>
                                                    <span>
                                                        <strong style="font-size:14px; color:#fe0000"><?php echo $currencies->display_price($seminuevos['products_price'], tep_get_tax_rate($seminuevos['products_tax_class_id'])) ?> </strong>
                                                    </span>
                                                    <br/>
                                                    <small>
                                                        <img src="images/icons/<?php echo $seminuevos['products_model']; ?>-small.gif" />
                                                    </small>
                                                </td>
                                            </tr>
                                        </table>
                                    </li>
                                        <?php } ?>
                                </ul>
                            <a class="upcommingProductsVerMas" href="http://www.pikmas.com/tienda/index.php?cPath=29#" style="border-top: medium none; display: inline-block; padding: 5px;">Ver todos los seminuevos &rarr; </a>
                            </td></tr><tr>
                            <td>
                                <img src="images/pixel_trans.gif" border="0" alt="" width="100%" height="1" />
                            </td>
                        </tr>
                    </table></td></tr></table>
    </td>
</tr>
<!-- // seminuevos-->
