<?php
require('includes/application_top.php');
$category_depth = 'top';
$cPath = 29;
$_GET['cPath'] = 29;
$current_category_id = 29;
if (isset($cPath) && tep_not_null($cPath)) {
    $categories_products_query = tep_db_query("select count(*) as total from " . TABLE_PRODUCTS_TO_CATEGORIES . " where categories_id = '" . (int)$current_category_id . "'");
    $cateqories_products = tep_db_fetch_array($categories_products_query);
    if ($cateqories_products['total'] > 0) {
        $category_depth = 'products'; // display products
    } else {
        $category_parent_query = tep_db_query("select count(*) as total from " . TABLE_CATEGORIES . " where parent_id = '" . (int)$current_category_id . "'");
        $category_parent = tep_db_fetch_array($category_parent_query);
        if ($category_parent['total'] > 0) {
            $category_depth = 'nested'; // navigate through the categories
        } else {
            $category_depth = 'products'; // category has no products, but display the 'no products' message
        }
    }
}

require(DIR_WS_LANGUAGES . $language . '/' . FILENAME_DEFAULT);
?>
<!doctype html public "-//W3C//DTD HTML 4.01 Transitional//EN">
<html <?php echo HTML_PARAMS; ?>>
    <head>
        <meta name="url" content="http://www.pikmas.com" />
        <meta name="page-topic" content="Videojuegos" />
        <meta name="page-type" content="Videojuegos" />
        <meta name="audience" content="All" />
        <meta name="Rating" content="General" />
        <meta name="Revisit-after" content="daily" />
        <meta name="Updated" content="daily" />
        <meta name="Distribution" content="Global" />
        <meta name="ObjectType" content="Document" />
        <meta name="Robots" content="all" />
        <meta name="author" content="PIKMAS" />
        <meta name="copyright" content=" 2010, PIKMAS." />
        <meta name="Search Engines" content="Google, AltaVista, AOLNet, Infoseek, Excite, Hotbot, Lycos, Magellan, LookSmart, CNET, Yahoo" />
        <meta name="Publisher" content="PIKMAS" />
        <meta name="classification" content="videojuegos, Playstation 3, playstation 2, Xbox 360, Xbox, gamecube, Wii, NDS, PC,  PSP, DS, GC, PS3, PS2" />
        <meta name="keywords" content="videojuegos, comprar videojuegos, Playstation 3, playstation 2, Xbox 360, Xbox, gamecube, Wii, NDS, PC,  PSP, DS, GC, PS3, PS2" />
        <meta name="description" content="Videojuegos todos los videojuegos al mejor precio" />
        <meta http-equiv="pragma" content="no-cache" />
        <meta http-equiv="cache-control" content="no-cache" />
        <meta http-equiv="Content-Type" content="text/html; charset=<?php echo CHARSET; ?>">
        <title><?php echo TITLE; ?></title>
        <base href="<?php echo (($request_type == 'SSL') ? HTTPS_SERVER : HTTP_SERVER) . DIR_WS_CATALOG; ?>">
        <link rel="stylesheet" type="text/css" href="stylesheet.css">
        <script type="text/javascript" src="js/jquery-1.2.6.pack.js"></script>
        <script type="text/javascript" src="js/stepcarousel.js"></script>
        <script src="SpryAssets/SpryTabbedPanels.js" type="text/javascript"></script>
        <script src="SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
        <link href="SpryAssets/SpryTabbedPanels.css" rel="stylesheet" type="text/css" />
        <link href="SpryAssets/SpryMenuBarHorizontal.css" rel="stylesheet" type="text/css" />
        <script src="http://cdn.jquerytools.org/1.1.2/jquery.tools.min.js"></script>
        <?php if(!isset($_COOKIE['banner'])) {
            $_COOKIE['banner'] = 1;
            setcookie("banner", 1);
            ?>
        <script>
            $(document).ready(function() {
                $("#facebox").overlay({
                    top: 102,
                    expose: {
                        color: '#fff',
                        loadSpeed: 0,
                        opacity: 0.5
                    },
                    closeOnClick: false,
                    api: true
                }).load();
            });
        </script>
            <?php } ?>
        <!--[if IE]>
           <style type="text/css">
           .facebox {
               background:transparent;
               filter:progid:DXImageTransform.Microsoft.gradient(startColorstr=#333333,endColorstr=#333333);
               zoom: 1;
            }
            </style>
        <![endif]-->
        <script type="text/javascript">
            $(document).ready(function(){
                $('ul.TabbedPanelsTabGroup li.TabbedPanelsTab:contains("otros")').css("display","none");
            });
        </script>
    </head>
    <body>
        <div id="facebox">
            <!--LISTA ACCESORIO GRATIS-->
            <a href="http://www.pikmas.com/tienda/Regalos-Accesorios-Web.pdf" target="_blank"><img border="0" src="http://www.pikmas.com/tienda/images/gamer.gif"/></a>
            <button class="close"> Cerrar</button>
        </div><!--//OVERLAY-->
        <div class="wrapper header">
            <!-- header //-->
            <table cellpadding="0" cellspacing="0">
                <tr>
                    <td>
                        <?php require(DIR_WS_INCLUDES . 'header.php'); ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        <!-- header_eof //-->
                        <!-- ******************************** SLIDE SHOW SECTION  ******************************* -->
                        <script type="text/javascript">

                            stepcarousel.setup({
                                galleryid: 'mygallery', //id of carousel DIV
                                beltclass: 'belt', //class of inner "belt" DIV containing all the panel DIVs
                                panelclass: 'panel', //class of panel DIVs each holding content
                                panelbehavior: {speed:300, wraparound:false, persist:true},
                                defaultbuttons: {enable: true, moveby: 1, leftnav: ['l.png', -40, 100], rightnav: ['r.png', -20, 100]},
                                statusvars: ['statusA', 'statusB', 'statusC'], // Register 3 "status" variables
                                contenttype: ['inline'] // content type <--No comma following the very last parameter, always!
                            })

                        </script>
                        <div id="mygallery" class="stepcarousel">
                            <div class="belt">

                                <div class="panel">
                                    <img src="images/banners_home/bio-shock-2.png" border="0"/></div>

                                <div class="panel">
                                    <img src="images/banners_home/final-fantasy-xiii.png" border="0"/></div>

                                <div class="panel">
                                    <img src="images/banners_home/heavy-rain.png" border="0"/></div>

                                <div class="panel">
                                    <img src="images/banners_home/modern-warfare-2.png" border="0"/></div>
                            </div>
                        </div>
                        <div id="mygallery-paginate">
                            <img src="opencircle.png" data-over="graycircle.png" data-select="closedcircle.png" data-moveby="1" /></div>
                        <!--//SlideShow--></td>
                </tr>
            </table>

            <table>
                <tr>

                    <td width="180" valign="top">
                        <table border="0" width="<?php echo BOX_WIDTH; ?>" cellspacing="0" cellpadding="2">
                            <!-- left_navigation //-->
                            <?php require(DIR_WS_INCLUDES . 'column_left.php'); ?><!-- left_navigation_eof //-->
                        </table>
                      <?php require(DIR_WS_INCLUDES . 'banner_left.php'); ?><!-- left_navigation_eof //-->
                    </td>
                    <?php
                        $define_list = array('PRODUCT_LIST_MODEL' => PRODUCT_LIST_MODEL,
                                'PRODUCT_LIST_NAME' => PRODUCT_LIST_NAME,
                                'PRODUCT_LIST_MANUFACTURER' => PRODUCT_LIST_MANUFACTURER,
                                'PRODUCT_LIST_PRICE' => PRODUCT_LIST_PRICE,
                                'PRODUCT_LIST_QUANTITY' => PRODUCT_LIST_QUANTITY,
                                'PRODUCT_LIST_WEIGHT' => PRODUCT_LIST_WEIGHT,
                                'PRODUCT_LIST_IMAGE' => PRODUCT_LIST_IMAGE,
                                'PRODUCT_LIST_BUY_NOW' => PRODUCT_LIST_BUY_NOW);

                        asort($define_list);

                        $column_list = array();
                        reset($define_list);
                        while (list($key, $value) = each($define_list)) {
                            if ($value > 0) $column_list[] = $key;
                        }
                        $select_column_list = '';
                        for ($i=0, $n=sizeof($column_list); $i<$n; $i++) {
                            switch ($column_list[$i]) {
                                case 'PRODUCT_LIST_MODEL':
                                    $select_column_list .= 'p.products_model, ';
                                    break;
                                case 'PRODUCT_LIST_NAME':
                                    $select_column_list .= 'pd.products_name, ';
                                    break;
                                case 'PRODUCT_LIST_MANUFACTURER':
                                    $select_column_list .= 'm.manufacturers_name, ';
                                    break;
                                case 'PRODUCT_LIST_QUANTITY':
                                    $select_column_list .= 'p.products_quantity, ';
                                    break;
                                case 'PRODUCT_LIST_IMAGE':
                                    $select_column_list .= 'p.products_image, ';
                                    break;
                                case 'PRODUCT_LIST_WEIGHT':
                                    $select_column_list .= 'p.products_weight, ';
                                    break;
                            }
                        }

                        if (isset($HTTP_GET_VARS['manufacturers_id'])) {
                            if (isset($HTTP_GET_VARS['filter_id']) && tep_not_null($HTTP_GET_VARS['filter_id'])) {
                                $listing_sql = "select " . $select_column_list . " p.products_id, p.manufacturers_id, p.products_price, p.products_tax_class_id, IF(s.status, s.specials_new_products_price, NULL) as specials_new_products_price, IF(s.status, s.specials_new_products_price, p.products_price) as final_price from " . TABLE_PRODUCTS . " p left join " . TABLE_SPECIALS . " s on p.products_id = s.products_id, " . TABLE_PRODUCTS_DESCRIPTION . " pd, " . TABLE_MANUFACTURERS . " m, " . TABLE_PRODUCTS_TO_CATEGORIES . " p2c where p.products_status = '1' and p.manufacturers_id = m.manufacturers_id and p.products_model = '" . (int)$HTTP_GET_VARS['manufacturers_id'] . "' and p.products_id = p2c.products_id and pd.products_id = p2c.products_id and pd.language_id = '" . (int)$languages_id . "' and p2c.categories_id = '" . (int)$HTTP_GET_VARS['filter_id'] . "'";
                            } else {
                                $listing_sql = "select " . $select_column_list . " p.products_id, p.manufacturers_id, p.products_price, p.products_tax_class_id, IF(s.status, s.specials_new_products_price, NULL) as specials_new_products_price, IF(s.status, s.specials_new_products_price, p.products_price) as final_price from " . TABLE_PRODUCTS . " p left join " . TABLE_SPECIALS . " s on p.products_id = s.products_id, " . TABLE_PRODUCTS_DESCRIPTION . " pd, " . TABLE_MANUFACTURERS . " m where p.products_status = '1' and pd.products_id = p.products_id and pd.language_id = '" . (int)$languages_id . "' and p.manufacturers_id = m.manufacturers_id and m.manufacturers_id = '" . (int)$HTTP_GET_VARS['manufacturers_id'] . "'";
                            }
                        }
                        else
                        if (isset($HTTP_GET_VARS['products_model'])) {
                            if (isset($HTTP_GET_VARS['filter_id']) && tep_not_null($HTTP_GET_VARS['filter_id'])) {
                                $listing_sql = "select " . $select_column_list . " p.products_id, p.manufacturers_id, p.products_price, p.products_tax_class_id, IF(s.status, s.specials_new_products_price, NULL) as specials_new_products_price, IF(s.status, s.specials_new_products_price, p.products_price) as final_price from " . TABLE_PRODUCTS . " p left join " . TABLE_SPECIALS . " s on p.products_id = s.products_id, " . TABLE_PRODUCTS_DESCRIPTION . " pd, " . TABLE_MANUFACTURERS . " m, " . TABLE_PRODUCTS_TO_CATEGORIES . " p2c where p.products_status = '1' and p.manufacturers_id = m.manufacturers_id and p.products_model = '" . $HTTP_GET_VARS['products_model'] . "' and p.products_id = p2c.products_id and pd.products_id = p2c.products_id and pd.language_id = '" . (int)$languages_id . "' and p2c.categories_id = '" . (int)$HTTP_GET_VARS['filter_id'] . "'";
                            } else {
                                $listing_sql = "select " . $select_column_list . " p.products_id, p.manufacturers_id, p.products_price, p.products_tax_class_id, IF(s.status, s.specials_new_products_price, NULL) as specials_new_products_price, IF(s.status, s.specials_new_products_price, p.products_price) as final_price from " . TABLE_PRODUCTS . " p left join " . TABLE_SPECIALS . " s on p.products_id = s.products_id, " . TABLE_PRODUCTS_DESCRIPTION . " pd, " . TABLE_MANUFACTURERS . " m where p.products_status = '1' and pd.products_id = p.products_id and pd.language_id = '" . (int)$languages_id . "' and p.manufacturers_id = m.manufacturers_id and p.products_model = '" . $HTTP_GET_VARS['products_model'] . "'";
                            }
                        }
                        else {
                            if (isset($HTTP_GET_VARS['filter_id']) && tep_not_null($HTTP_GET_VARS['filter_id'])) {
                                $listing_sql = "select " . $select_column_list . " p.products_id, p.manufacturers_id, p.products_price, p.products_tax_class_id, IF(s.status, s.specials_new_products_price, NULL) as specials_new_products_price, IF(s.status, s.specials_new_products_price, p.products_price) as final_price from " . TABLE_PRODUCTS . " p left join " . TABLE_SPECIALS . " s on p.products_id = s.products_id, " . TABLE_PRODUCTS_DESCRIPTION . " pd, " . TABLE_MANUFACTURERS . " m, " . TABLE_PRODUCTS_TO_CATEGORIES . " p2c where p.products_status = '1' and p.manufacturers_id = m.manufacturers_id and p.products_model = '" . $HTTP_GET_VARS['filter_id'] . "' and p.products_id = p2c.products_id and pd.products_id = p2c.products_id and pd.language_id = '" . (int)$languages_id . "' and p2c.categories_id = '" . (int)$current_category_id . "'";
                            } else {
                                $listing_sql = "select " . $select_column_list . " p.products_id, p.manufacturers_id, p.products_price, p.products_tax_class_id, IF(s.status, s.specials_new_products_price, NULL) as specials_new_products_price, IF(s.status, s.specials_new_products_price, p.products_price) as final_price from " . TABLE_PRODUCTS_DESCRIPTION . " pd, " . TABLE_PRODUCTS . " p left join " . TABLE_MANUFACTURERS . " m on p.manufacturers_id = m.manufacturers_id left join " . TABLE_SPECIALS . " s on p.products_id = s.products_id, " . TABLE_PRODUCTS_TO_CATEGORIES . " p2c where p.products_status = '1' and p.products_id = p2c.products_id and pd.products_id = p2c.products_id and pd.language_id = '" . (int)$languages_id . "' and p2c.categories_id = '" . (int)$current_category_id . "'";
                            }
                        }

                        if ( (!isset($HTTP_GET_VARS['sort'])) || (!ereg('^[1-8][ad]$', $HTTP_GET_VARS['sort'])) || (substr($HTTP_GET_VARS['sort'], 0, 1) > sizeof($column_list)) ) {
                            for ($i=0, $n=sizeof($column_list); $i<$n; $i++) {
                                if ($column_list[$i] == 'PRODUCT_LIST_NAME') {
                                    $HTTP_GET_VARS['sort'] = $i+1 . 'a';
                                    $listing_sql .= " order by pd.products_name";
                                    break;
                                }
                            }
                        } else {
                            $sort_col = substr($HTTP_GET_VARS['sort'], 0 , 1);
                            $sort_order = substr($HTTP_GET_VARS['sort'], 1);
                            switch ($column_list[$sort_col-1]) {
                                case 'PRODUCT_LIST_MODEL':
                                    $listing_sql .= " order by p.products_model " . ($sort_order == 'd' ? 'desc' : '') . ", pd.products_name";
                                    break;
                                case 'PRODUCT_LIST_NAME':
                                    $listing_sql .= " order by pd.products_name " . ($sort_order == 'd' ? 'desc' : '');
                                    break;
                                case 'PRODUCT_LIST_MANUFACTURER':
                                    $listing_sql .= " order by m.manufacturers_name " . ($sort_order == 'd' ? 'desc' : '') . ", pd.products_name";
                                    break;
                                case 'PRODUCT_LIST_QUANTITY':
                                    $listing_sql .= " order by p.products_quantity " . ($sort_order == 'd' ? 'desc' : '') . ", pd.products_name";
                                    break;
                                case 'PRODUCT_LIST_IMAGE':
                                    $listing_sql .= " order by pd.products_name";
                                    break;
                                case 'PRODUCT_LIST_WEIGHT':
                                    $listing_sql .= " order by p.products_weight " . ($sort_order == 'd' ? 'desc' : '') . ", pd.products_name";
                                    break;
                                case 'PRODUCT_LIST_PRICE':
                                    $listing_sql .= " order by final_price " . ($sort_order == 'd' ? 'desc' : '') . ", pd.products_name";
                                    break;
                            }
                        }
                        ?>
                    <td width="100%" valign="top">
                        <table border="0" width="100%" cellspacing="0" cellpadding="0">
                            <tr>
                                <td>
                                    <table border="0" width="100%" cellspacing="0" cellpadding="0">
                                        <tr>
                                            <td class="pageHeading"><?php echo HEADING_TITLE; ?></td>
                                                <?php
                                                // optional Product List Filter
                                                if (PRODUCT_LIST_FILTER > 0) {
                                                    if (isset($HTTP_GET_VARS['manufacturers_id'])) {
                                                        $filterlist_sql = "select distinct c.categories_id as id, cd.categories_name as name from " . TABLE_PRODUCTS . " p, " . TABLE_PRODUCTS_TO_CATEGORIES . " p2c, " . TABLE_CATEGORIES . " c, " . TABLE_CATEGORIES_DESCRIPTION . " cd where p.products_status = '1' and p.products_id = p2c.products_id and p2c.categories_id = c.categories_id and p2c.categories_id = cd.categories_id and cd.language_id = '" . (int)$languages_id . "' and p.manufacturers_id = '" . (int)$HTTP_GET_VARS['manufacturers_id'] . "' order by cd.categories_name";
                                                    } elseif (isset($HTTP_GET_VARS['products_model'])) {
                                                        $filterlist_sql = "select distinct c.categories_id as id, cd.categories_name as name from " . TABLE_PRODUCTS . " p, " . TABLE_PRODUCTS_TO_CATEGORIES . " p2c, " . TABLE_CATEGORIES . " c, " . TABLE_CATEGORIES_DESCRIPTION . " cd where p.products_status = '1' and p.products_id = p2c.products_id and p2c.categories_id = c.categories_id and p2c.categories_id = cd.categories_id and cd.language_id = '" . (int)$languages_id . "' and p.products_model = '" . (int)$HTTP_GET_VARS['products_model'] . "' order by cd.categories_name";
                                                    } else {
                                                        $filterlist_sql= "select distinct p.products_model as id, p.products_model as name from " . TABLE_PRODUCTS . " p, " . TABLE_PRODUCTS_TO_CATEGORIES . " p2c, " . TABLE_MANUFACTURERS . " m where p.products_status = '1' and p.manufacturers_id = m.manufacturers_id and p.products_id = p2c.products_id and p2c.categories_id = '" . (int)$current_category_id . "' order by m.manufacturers_name";
                                                    }
                                                    $filterlist_query = tep_db_query($filterlist_sql);
                                                    if (tep_db_num_rows($filterlist_query) > 1) {
                                                        echo '            <td align="center" >' . tep_draw_form('filter', 'seminuevos.php', 'get') . TEXT_SHOW . '&nbsp;';
                                                        if (isset($HTTP_GET_VARS['manufacturers_id'])) {
                                                            echo tep_draw_hidden_field('manufacturers_id', $HTTP_GET_VARS['manufacturers_id']);
                                                            $options = array(array('id' => '', 'text' => TEXT_ALL_CATEGORIES));
                                                        } else {
                                                            echo tep_draw_hidden_field('cPath', $cPath);
                                                            $options = array(array('id' => '', 'text' => TEXT_ALL_MANUFACTURERS));
                                                        }
                                                        echo tep_draw_hidden_field('sort', $HTTP_GET_VARS['sort']);
                                                        while ($filterlist = tep_db_fetch_array($filterlist_query)) {
                                                            $options[] = array('id' => $filterlist['id'], 'text' => $filterlist['name']);
                                                        }
                                                        echo tep_draw_pull_down_menu('filter_id', $options, (isset($HTTP_GET_VARS['filter_id']) ? $HTTP_GET_VARS['filter_id'] : ''), 'onchange="this.form.submit()"');
                                                        echo tep_hide_session_id() . '</form></td>' . "\n";
                                                    }
                                                }
                                                // Get the right image for the top-right
                                                $image = DIR_WS_IMAGES . 'table_background_list.gif';
                                               
                                                ?>
                                            <td align="right"><?php echo tep_image(DIR_WS_IMAGES . 'seminuevoslogo.gif', HEADING_TITLE, '187', '67'); ?></td>
                                        </tr>
                                    </table>        </td>
                            </tr>
                            <tr>
                                <td><?php echo tep_draw_separator('pixel_trans.gif', '100%', '10'); ?></td>
                            </tr>
                            <tr>
                                <td><?php include(DIR_WS_MODULES . FILENAME_PRODUCT_LISTING); ?></td>
                            </tr>
                        </table>    </td>

                    </td>
                    <td width="180" valign="top">

                        <table border="0" width="180"cellspacing="0" cellpadding="2">
                            <?php require(DIR_WS_INCLUDES . 'column_right.php'); ?>
                        </table>
                            <?php require(DIR_WS_INCLUDES . 'banner_right.php'); ?>
                        </td>
                </tr>
            </table>
        </div>
        <br>
    <tr>

        <?php require(DIR_WS_INCLUDES . 'footer.php'); ?>

    </tr>
<!--<script type="text/javascript">
    var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgDown:"SpryAssets/SpryMenuBarDownHover.gif", imgRight:"SpryAssets/SpryMenuBarRightHover.gif"});
</script>-->
</body>
</html>

<?php require(DIR_WS_INCLUDES . 'application_bottom.php'); ?>
