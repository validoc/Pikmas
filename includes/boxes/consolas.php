<!-- consolas-->

<tr>
    <td>
        <table border="0" cellspacing="0" width="180px"  cellpadding="0">
            <tr>
                <td width="10px"><img border="0" alt="" src="images/infobox/corner_left.gif"> </td>
                <td width="100%" height="14" class="infoBoxHeading">Consolas</td>
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
                            <td class="boxText">
                                <ul>
                                    <?php
                                    $seminuevos_query = tep_db_query("select distinct p.products_id, p.products_model, p.products_image, p.products_tax_class_id, pd.products_name, if(s.status, s.specials_new_products_price, p.products_price) as products_price, c.categories_image AS category_image FROM " . TABLE_PRODUCTS . " p left join " . TABLE_SPECIALS . " s on p.products_id = s.products_id, " . TABLE_PRODUCTS_DESCRIPTION . " pd, " . TABLE_PRODUCTS_TO_CATEGORIES . " p2c, " . TABLE_CATEGORIES . " c where p.products_id = p2c.products_id and p2c.categories_id = c.categories_id and c.categories_id = '42' and p.products_status = '1' and p.products_id = pd.products_id and pd.language_id = '" . (int)$languages_id . "' order by p.products_date_added desc limit 5");
                                    while ($seminuevos = tep_db_fetch_array($seminuevos_query)) { ?>
                                    <li class="consoleType">
                                        <table>
                                            <tr>
                                                <td>
                                                    <table>
                                                        <tr>
                                                            <td>
                                                                    <?php echo(tep_image(DIR_WS_IMAGES . $seminuevos['products_image'], $seminuevos['products_name'], SMALL_IMAGE_WIDTH, SMALL_IMAGE_HEIGHT))?>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                                <td>
                                                    <table align="left">
                                                        <tr>
                                                            <td>
                                                                    <?php echo('<a  style="font-weight:normal !important; color:#222; font-size:12px" href="' . tep_href_link(FILENAME_PRODUCT_INFO, 'products_id=' . $seminuevos['products_id']) . '">' . $seminuevos['products_name']. '</a>')?>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <span style="font-size:14px; color:#fe0000">
                                                                    <b<?php echo $currencies->display_price($seminuevos['products_price'], tep_get_tax_rate($seminuevos['products_tax_class_id'])) ?></b>
                                                                </span>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <small>
                                                                    <img src="images/icons/<?php echo $seminuevos['category_image']; ?>" />
                                                                </small>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                        </table>
                                    </li>
                                        <?php } ?>
                                </ul>
                                <a  class="upcommingProductsVerMas" href="http://www.pikmas.com/tienda/index.php?cPath=42&sort=2a&filter_id=">Ver todas las consolas  	&rarr; </a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <img src="images/pixel_trans.gif" border="0" alt="" width="100%" height="1" />
                            </td>
                        </tr>
                    </table></td></tr></table>
    </td></tr>
<!-- // consolas-->