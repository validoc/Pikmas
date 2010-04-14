<?php
require('includes/application_top.php');
$category_depth = 'top';
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

if(isset($HTTP_GET_VARS['products_model'])){
    $extra = true;
}

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
        <link rel="shortcut icon" type="image/x-icon" href="/tienda/favicon.ico">
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
                                var contador = 1;
                                var incrementar = true;
                                function set_slide_rotate(){
                                  stepcarousel.stepTo('mygallery', contador)
                                  if(incrementar){
                                    contador += 1;
                                    if(contador >= 4 ){
                                      incrementar = false;
                                    }
                                  } else{
                                    contador -= 1;
                                    if(contador <= 1 ){
                                      incrementar = true;
                                    }
                                  }
                                }
                            jQuery(document).ready(function(){
                              setInterval('set_slide_rotate()', 8000);
                            });
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
                        <?php
                        if ($banner = tep_banner_exists('dynamic', 'izquierda3')) {
                            ?>
                        <!-- banner asistencia-->
                        </br>
                        <table border="0" cellspacing="0" width="100%" cellpadding="0">
                        </table>
                        <table width="100%" border="0" cellspacing="0" cellpadding="0" >
                            <tr>
                                <td>
                                    <table  width="100%"  border="0" cellspacing="0" cellpadding="0" >
                                        <tr>
                                            <td>
                                                    <?php echo tep_display_banner('static', $banner)?>                                       </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <img src="images/pixel_trans.gif" border="0" alt="" width="100%" height="1" />                                       </td>
                                        </tr>
                                    </table>                                 </td>
                            </tr>
                        </table>

                            <?php  } ?>
                        <?php

                        if ($banner = tep_banner_exists('dynamic', 'izquierda4')) {

                            ?>
                        <!-- banner asistencia-->

                        <br />

                        <table border="0" cellspacing="0" width="100%" cellpadding="0">
                        </table>

                        <table width="100%" border="0" cellspacing="0" cellpadding="0" >

                            <tr>

                                <td>
                                    <table  width="100%"  border="0" cellspacing="0" cellpadding="0" >
                                        <tr>
                                            <td>
                                                    <?php echo tep_display_banner('static', $banner)?>                                       </td>
                                        </tr>
                                        <tr>
                                            <td><img src="images/pixel_trans.gif" border="0" alt="" width="100%" height="1" /> </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>

                            <?php  } ?>
                        <?php

                        if ($banner = tep_banner_exists('dynamic', 'izquierda6')) {

                            ?>
                        <!-- banner asistencia-->

                        </br>

                        <table border="0" cellspacing="0" width="100%" cellpadding="0">
                        </table>

                        <table width="100%" border="0" cellspacing="0" cellpadding="0" >

                            <tr>

                                <td><table  width="100%"  border="0" cellspacing="0" cellpadding="0" >

                                        <tr>

                                            <td>

                                                    <?php echo tep_display_banner('static', $banner)?>                                       </td>
                                        </tr>

                                        <tr>



                                            <td><img src="images/pixel_trans.gif" border="0" alt="" width="100%" height="1" /> </td>
                                        </tr>

                                    </table></td>
                            </tr>
                        </table>

                            <?php  } ?>
                        <?php

                        if ($banner = tep_banner_exists('dynamic', 'izquierda5')) {

                            ?>
                        <!-- banner asistencia-->

                        </br>

                        <table border="0" cellspacing="0" width="100%" cellpadding="0">
                        </table>

                        <table width="100%" border="0" cellspacing="0" cellpadding="0" >
                            <tr>
                                <td><table  width="100%"  border="0" cellspacing="0" cellpadding="0" >
                                        <tr>
                                            <td>
                                                    <?php echo tep_display_banner('static', $banner)?>                                       </td>
                                        </tr>
                                        <tr>
                                            <td><img src="images/pixel_trans.gif" border="0" alt="" width="100%" height="1" /> </td>
                                        </tr>
                                    </table></td>
                            </tr>
                        </table>
                        <!-- accesorios-pdf-->
                        
                        	 <table width="100%" border="0" cellspacing="0" cellpadding="0" >
                            <tr>
                                <td><table  width="100%"  border="0" cellspacing="0" cellpadding="0" >
                                        <tr>
                                            <td>
                                                <a href="tienda/Regalos-Accesorios-Web.pdf" target="_blank"> <img src="/tienda/images/banner-descarga-accesorios.gif" border="0"/></a>
                                                                                        </td>
                                        </tr>
                                        <tr>
                                            <td><img src="images/pixel_trans.gif" border="0" alt="" width="100%" height="1" /> </td>
                                        </tr>
                                    </table></td>
                            </tr>
                        </table>
                        <!--// accesorios-pdf -->
                            <?php  } ?></td>
                    <?php
                    if ($category_depth == 'nested') {
                        $category_query = tep_db_query("select cd.categories_name, c.categories_image from " . TABLE_CATEGORIES . " c, " . TABLE_CATEGORIES_DESCRIPTION . " cd where c.categories_id = '" . (int)$current_category_id . "' and cd.categories_id = '" . (int)$current_category_id . "' and cd.language_id = '" . (int)$languages_id . "'");
                        $category = tep_db_fetch_array($category_query);
                        ?>
                    <td width="545" valign="top">
                        <table border="0" width="100%" cellspacing="0" cellpadding="0" class="categories">
                            <tr>
                                <td><table border="0" width="100%" cellspacing="0" cellpadding="0">
                                        <tr>
                                            <td class="pageHeading"><?php echo HEADING_TITLE; ?></td>
                                            <td class="pageHeading" align="right"><?php echo tep_image(DIR_WS_IMAGES . $category['categories_image'], $category['categories_name'], HEADING_IMAGE_WIDTH, HEADING_IMAGE_HEIGHT); ?></td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td><?php echo tep_draw_separator('pixel_trans.gif', '100%', '10'); ?></td>
                            </tr>
                            <tr>
                                <td><table border="0" width="100%" cellspacing="0" cellpadding="2">
                                        <tr>
                                            <td>
                                                <table border="0" width="100%" cellspacing="0" cellpadding="2">
                                                    <tr>
                                                            <?php
                                                            if (isset($cPath) && strpos('_', $cPath)) {
// check to see if there are deeper categories within the current category
                                                                $category_links = array_reverse($cPath_array);
                                                                for($i=0, $n=sizeof($category_links); $i<$n; $i++) {
                                                                    $categories_query = tep_db_query("select count(*) as total from " . TABLE_CATEGORIES . " c, " . TABLE_CATEGORIES_DESCRIPTION . " cd where c.parent_id = '" . (int)$category_links[$i] . "' and c.categories_id = cd.categories_id and cd.language_id = '" . (int)$languages_id . "'");
                                                                    $categories = tep_db_fetch_array($categories_query);
                                                                    if ($categories['total'] < 1) {
                                                                        // do nothing, go through the loop
                                                                    } else {
                                                                        $categories_query = tep_db_query("select c.categories_id, cd.categories_name, c.categories_image, c.parent_id from " . TABLE_CATEGORIES . " c, " . TABLE_CATEGORIES_DESCRIPTION . " cd where c.parent_id = '" . (int)$category_links[$i] . "' and c.categories_id = cd.categories_id and cd.language_id = '" . (int)$languages_id . "' order by sort_order, cd.categories_name");
                                                                        break; // we've found the deepest category the customer is in
                                                                    }
                                                                }
                                                            } else {
                                                                $categories_query = tep_db_query("select c.categories_id, cd.categories_name, c.categories_image, c.parent_id from " . TABLE_CATEGORIES . " c, " . TABLE_CATEGORIES_DESCRIPTION . " cd where c.parent_id = '" . (int)$current_category_id . "' and c.categories_id = cd.categories_id and cd.language_id = '" . (int)$languages_id . "' order by sort_order, cd.categories_name");
                                                            }

                                                            $number_of_categories = tep_db_num_rows($categories_query);

                                                            $rows = 0;
                                                            while ($categories = tep_db_fetch_array($categories_query)) {
                                                                $rows++;
                                                                $cPath_new = tep_get_path($categories['categories_id']);
                                                                $width = (int)(100 / MAX_DISPLAY_CATEGORIES_PER_ROW) . '%';
                                                                echo '                <td align="center" class="smallText" width="' . $width . '" valign="top"><a href="' . tep_href_link(FILENAME_DEFAULT, $cPath_new) . '">' . tep_image(DIR_WS_IMAGES . $categories['categories_image'], $categories['categories_name'], SUBCATEGORY_IMAGE_WIDTH, SUBCATEGORY_IMAGE_HEIGHT) . '<br>' . $categories['categories_name'] . '</a></td>' . "\n";
                                                                if ((($rows / MAX_DISPLAY_CATEGORIES_PER_ROW) == floor($rows / MAX_DISPLAY_CATEGORIES_PER_ROW)) && ($rows != $number_of_categories)) {
                                                                    echo '              </tr>' . "\n";
                                                                    echo '              <tr>' . "\n";
                                                                }
                                                            }

// needed for the new products module shown below
                                                            $new_products_category_id = $current_category_id;
                                                            ?>
                                                    </tr>
                                                </table>            </td>
                                        </tr>
                                        <tr>
                                            <td><?php echo tep_draw_separator('pixel_trans.gif', '100%', '10'); ?> </td>
                                        </tr>
                                        <tr>
                                            <td><?php include(DIR_WS_MODULES . FILENAME_NEW_PRODUCTS); ?></td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </td>
                        <?php
                    } elseif ($category_depth == 'products' || isset($HTTP_GET_VARS['manufacturers_id'])  || isset($HTTP_GET_VARS['products_model'])) {
// create column list
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
// show the products of a specified manufacturer
                        if (isset($HTTP_GET_VARS['manufacturers_id'])) {
                            if (isset($HTTP_GET_VARS['filter_id']) && tep_not_null($HTTP_GET_VARS['filter_id'])) {
// We are asked to show only a specific category
                                $listing_sql = "select " . $select_column_list . " p.products_id, p.manufacturers_id, p.products_price, p.products_tax_class_id, IF(s.status, s.specials_new_products_price, NULL) as specials_new_products_price, IF(s.status, s.specials_new_products_price, p.products_price) as final_price from " . TABLE_PRODUCTS . " p left join " . TABLE_SPECIALS . " s on p.products_id = s.products_id, " . TABLE_PRODUCTS_DESCRIPTION . " pd, " . TABLE_MANUFACTURERS . " m, " . TABLE_PRODUCTS_TO_CATEGORIES . " p2c where p.products_status = '1' and p.manufacturers_id = m.manufacturers_id and m.manufacturers_id = '" . (int)$HTTP_GET_VARS['manufacturers_id'] . "' and p.products_id = p2c.products_id and pd.products_id = p2c.products_id and pd.language_id = '" . (int)$languages_id . "' and p2c.categories_id = '" . (int)$HTTP_GET_VARS['filter_id'] . "'";
                            } else {
// We show them all
                                $listing_sql = "select " . $select_column_list . " p.products_id, p.manufacturers_id, p.products_price, p.products_tax_class_id, IF(s.status, s.specials_new_products_price, NULL) as specials_new_products_price, IF(s.status, s.specials_new_products_price, p.products_price) as final_price from " . TABLE_PRODUCTS . " p left join " . TABLE_SPECIALS . " s on p.products_id = s.products_id, " . TABLE_PRODUCTS_DESCRIPTION . " pd, " . TABLE_MANUFACTURERS . " m where p.products_status = '1' and pd.products_id = p.products_id and pd.language_id = '" . (int)$languages_id . "' and p.manufacturers_id = m.manufacturers_id and m.manufacturers_id = '" . (int)$HTTP_GET_VARS['manufacturers_id'] . "'";
                            }
                        }
                        else
                        if (isset($HTTP_GET_VARS['products_model'])) {
                            if (isset($HTTP_GET_VARS['filter_id']) && tep_not_null($HTTP_GET_VARS['filter_id'])) {
// We are asked to show only a specific category
                                $listing_sql = "select " . $select_column_list . " p.products_id, p.manufacturers_id, p.products_price, p.products_tax_class_id, IF(s.status, s.specials_new_products_price, NULL) as specials_new_products_price, IF(s.status, s.specials_new_products_price, p.products_price) as final_price from " . TABLE_PRODUCTS . " p left join " . TABLE_SPECIALS . " s on p.products_id = s.products_id, " . TABLE_PRODUCTS_DESCRIPTION . " pd, " . TABLE_MANUFACTURERS . " m, " . TABLE_PRODUCTS_TO_CATEGORIES . " p2c where p.products_status = '1' and p.manufacturers_id = m.manufacturers_id and p.products_model = '" . $HTTP_GET_VARS['products_model'] . "' and p.products_id = p2c.products_id and pd.products_id = p2c.products_id and pd.language_id = '" . (int)$languages_id . "' and p2c.categories_id = '" . (int)$HTTP_GET_VARS['filter_id'] . "'";
                            } else {
// We show them all
                                $listing_sql = "select " . $select_column_list . " p.products_id, p.manufacturers_id, p.products_price, p.products_tax_class_id, IF(s.status, s.specials_new_products_price, NULL) as specials_new_products_price, IF(s.status, s.specials_new_products_price, p.products_price) as final_price from " . TABLE_PRODUCTS . " p left join " . TABLE_SPECIALS . " s on p.products_id = s.products_id, " . TABLE_PRODUCTS_DESCRIPTION . " pd, " . TABLE_MANUFACTURERS . " m where p.products_status = '1' and pd.products_id = p.products_id and pd.language_id = '" . (int)$languages_id . "' and p.manufacturers_id = m.manufacturers_id and p.products_model = '" . $HTTP_GET_VARS['products_model'] . "'";
                            }
                        }
                        else {
// show the products in a given categorie
                            if (isset($HTTP_GET_VARS['filter_id']) && tep_not_null($HTTP_GET_VARS['filter_id'])) {
// We are asked to show only specific catgeory
                                $listing_sql = "select " . $select_column_list . " p.products_id, p.manufacturers_id, p.products_price, p.products_tax_class_id, IF(s.status, s.specials_new_products_price, NULL) as specials_new_products_price, IF(s.status, s.specials_new_products_price, p.products_price) as final_price from " . TABLE_PRODUCTS . " p left join " . TABLE_SPECIALS . " s on p.products_id = s.products_id, " . TABLE_PRODUCTS_DESCRIPTION . " pd, " . TABLE_MANUFACTURERS . " m, " . TABLE_PRODUCTS_TO_CATEGORIES . " p2c where p.products_status = '1' and p.manufacturers_id = m.manufacturers_id and m.manufacturers_id = '" . (int)$HTTP_GET_VARS['filter_id'] . "' and p.products_id = p2c.products_id and pd.products_id = p2c.products_id and pd.language_id = '" . (int)$languages_id . "' and p2c.categories_id = '" . (int)$current_category_id . "'";
                            } else {
// We show them all
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
                        <table border="0" width="100%" cellspacing="0" cellpadding="0" class="catnone">
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
                                                        $filterlist_sql= "select distinct m.manufacturers_id as id, m.manufacturers_name as name from " . TABLE_PRODUCTS . " p, " . TABLE_PRODUCTS_TO_CATEGORIES . " p2c, " . TABLE_MANUFACTURERS . " m where p.products_status = '1' and p.manufacturers_id = m.manufacturers_id and p.products_id = p2c.products_id and p2c.categories_id = '" . (int)$current_category_id . "' order by m.manufacturers_name";
                                                    }
                                                    $filterlist_query = tep_db_query($filterlist_sql);
                                                    if (tep_db_num_rows($filterlist_query) > 1) {
                                                        echo '            <td align="center" >' . tep_draw_form('filter', FILENAME_DEFAULT, 'get') . TEXT_SHOW . '&nbsp;';
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
                                                if (isset($HTTP_GET_VARS['manufacturers_id'])) {
                                                    $image = tep_db_query("select manufacturers_image from " . TABLE_MANUFACTURERS . " where manufacturers_id = '" . (int)$HTTP_GET_VARS['manufacturers_id'] . "'");
                                                    $image = tep_db_fetch_array($image);
                                                    $image = $image['manufacturers_image'];
                                                } elseif ($current_category_id) {
                                                    $image = tep_db_query("select categories_image from " . TABLE_CATEGORIES . " where categories_id = '" . (int)$current_category_id . "'");
                                                    $image = tep_db_fetch_array($image);
                                                    $image = $image['categories_image'];
                                                }
                                                ?>
                                                <?php
                                                if (isset($HTTP_GET_VARS['products_model'])) { ?>
                                            <td align="right"><?php echo tep_image(DIR_WS_IMAGES . 'consola-'. $_GET['products_model'].'.png', HEADING_TITLE, '187', '67'); ?></td>

                                                    <?php } else { ?>
                                            <td align="right"><?php echo tep_image(DIR_WS_IMAGES . "consolas.png", HEADING_TITLE, '187', '67'); ?></td>
                                                    <?php } ?>
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
                        <?php
                    } else { // default page
                        ?>

                    <td valign="top" width="500">
                        <table border="0" cellspacing="0" cellpadding="0">
                            <tr>
                                <td>
                                    <table border="0" width="100%" cellspacing="0" cellpadding="0">

                                        <tr>
                                            <td><?php echo tep_draw_separator('pixel_trans.gif', '100%', '10'); ?></td>
                                        </tr>
                                        <tr>
                                            <td>

                                                <table border="0" width="100%" cellspacing="0" cellpadding="0">
                                                    <tr>
                                                        <td ><?php echo tep_customer_greeting(); ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td><?php echo tep_draw_separator('pixel_trans.gif', '100%', '10'); ?></td>
                                                    </tr>
                                                    <!--<tr>
                                                      <td ><?php echo TEXT_MAIN; ?></td>
                                                    </tr>-->
                                                    <tr>
                                                        <td><?php echo tep_draw_separator('pixel_trans.gif', '100%', '10'); ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td><?php include(DIR_WS_MODULES . FILENAME_NEW_PRODUCTS); ?></td>
                                                    </tr>
                                                </table>        </td>
                                        </tr>
                                        <tr>
                                            <td><?php echo tep_draw_separator('pixel_trans.gif', '100%', '10'); ?> </td>
                                        </tr>
                                        <!-- accesorios -->
                                        <tr>
                                            <td>

                                                <br />

                                                <h1>Accesorios</h1>

                                                <table border="0"  cellspacing="0" cellpadding="0" width="100%" >
                                                    <tr>
                                                        <td>
                                                            <div id="SlideShowAccessories">
                                                                <!-- carrusel accessories -->
                                                                <script>
                                                                    stepcarousel.setup({
                                                                        galleryid: 'mygalleryAccessories', //id of carousel DIV
                                                                        beltclass: 'beltAccessories', //class of inner "belt" DIV containing all the panel DIVs
                                                                        panelclass: 'panelAccessories', //class of panel DIVs each holding content
                                                                        autostep: {enable:false, moveby:4, pause:3000},
                                                                        panelbehavior: {speed:1000, wraparound:false, persist:false},
                                                                        defaultbuttons: {enable: true, moveby: 4, leftnav: ['left.png', -40, 60], rightnav: ['right.png', 0, 60]},
                                                                        statusvars: ['statusA', 'statusB', 'statusC'], //register 3 variables that contain current panel (start), current panel (last), and total panels
                                                                        contenttype: ['inline'] //content setting ['inline'] or ['external', 'path_to_external_file']
                                                                    })
                                                                </script><!-- // carrusel accessories -->
                                                                <div id="mygalleryAccessories" class="stepcarouselAccessories">
                                                                    <div class="beltAccessories">
                                                                            <?php

                                                                            $accesorios_query = tep_db_query("select distinct p.products_id, p.products_model, p.products_image, p.products_tax_class_id, pd.products_name, if(s.status, s.specials_new_products_price, p.products_price) as products_price from " . TABLE_PRODUCTS . " p left join " . TABLE_SPECIALS . " s on p.products_id = s.products_id, " . TABLE_PRODUCTS_DESCRIPTION . " pd, " . TABLE_PRODUCTS_TO_CATEGORIES . " p2c, " . TABLE_CATEGORIES . " c where p.products_id = p2c.products_id and p2c.categories_id = c.categories_id and c.categories_id = '28' and p.products_status = '1' and p.products_id = pd.products_id and pd.language_id = '" . (int)$languages_id . "' order by p.products_date_added desc limit 100");
                                                                            while ($accesorios = tep_db_fetch_array($accesorios_query)) { ?>
                                                                        <div class="panelAccessories">
                                                                            <table>
                                                                                <tr>
                                                                                    <td style="text-align:center"><?php echo('<a  href="' . tep_href_link(FILENAME_PRODUCT_INFO, 'products_id=' . $accesorios['products_id']) . '">' . tep_image(DIR_WS_IMAGES . $accesorios['products_image'], $accesorios['products_name'], SMALL_IMAGE_WIDTH, SMALL_IMAGE_HEIGHT) . '</a>')?>                               </td>
                                                                                <tr>
                                                                                    <td  style="height:30px !important; color:#222;text-align:center; font-size:12px; font-weight:normal"><?php echo $accesorios['products_name']?>                               </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td style="text-align:center"><strong style="color:#fe0000; font-size:14px">
                                                                                                    <?php echo($currencies->display_price($accesorios['products_price'], tep_get_tax_rate($accesorios['products_tax_class_id'])))?>
                                                                                        </strong> </td>
                                                                                <tr>
                                                                                    <td style="text-align:center"><img src="images/icons/<?php echo $accesorios['products_model'] ?>-small.gif"/> </td>
                                                                                </tr>
                                                                            </table>
                                                                        </div>
                                                                                <?php } ?>
                                                                    </div>
                                                                </div>              	<a  class="upcommingProductsVerMas" href="http://www.pikmas.com/tienda/index.php?cPath=28"><img src="../tienda/images/vermas.png" border="0"/> </a>                 	 </div>

                                                            <!--//SlideShow-->                     </td>
                                                    </tr>
                                                </table>            </tr>
                                        <!--  // accesorios-->
                                        <!--novedades-->
                                        <tr>
                                            <td><?php echo tep_draw_separator('pixel_trans.gif', '100%', '10'); ?> </td>
                                        </tr>
                                        <tr>
                                            <td><?php  include(DIR_WS_MODULES . FILENAME_UPCOMING_PRODUCTS); ?>
                                        <tr>
                                        <tr>
                                            <td>

                                                <table width="550" border="0" cellspacing="0" cellpadding="5" align="center">

                                                    <tr>
                                                    <td colspan="2" align="center"><img src="/tienda/images/oferta-comuniones.gif" title="Oferta comuniones"/></td>
</tr>
                                                <?php

                                                        if ($banner = tep_banner_exists('dynamic', 'izquierda1') || $banner = tep_banner_exists('dynamic', 'derecha1')) {

                                                            ?>

                                                    <tr>

                                                        <td colspan="2">&nbsp;</td>
                                                    </tr>



                                                    <tr>

                                                        <td colspan="2" align="center"><?php if ($banner = tep_banner_exists('dynamic', 'izquierda1')) {
                                                                        echo tep_display_banner('static', $banner);
                                                                    }?></td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="2" align="center"><?php if ($banner = tep_banner_exists('dynamic', 'derecha1')) {
                                                                        echo tep_display_banner('static', $banner);
                                                                    }?></td>

                                                    </tr>

                                                            <?php

                                                        }

                                                        ?>

                                                        <?php

                                                        if ($banner = tep_banner_exists('dynamic', 'izquierda2') || $banner = tep_banner_exists('dynamic', 'derecha2')) {

                                                            ?>

                                                    <tr>

                                                        <td colspan="2">&nbsp;</td>
                                                    </tr>



                                                    <tr>

                                                        <td colspan="2" align="center"><?php if ($banner = tep_banner_exists('dynamic', 'izquierda2')) {
                                                                        echo tep_display_banner('static', $banner);
                                                                    }?></td>
                                                    </tr>
                                                    <tr>
                                                        <td  colspan="2" align="center"><?php if ($banner = tep_banner_exists('dynamic', 'derecha2')) {
                                                                        echo tep_display_banner('static', $banner);
                                                                    }?></td>
                                                    </tr>

                                                            <?php

                                                        }


                                                        ?>

                                                        <?php

                                                        if ($banner = tep_banner_exists('dynamic', 'baner1') || $banner = tep_banner_exists('dynamic', 'baner2')) {

                                                            ?>

                                                    <tr>

                                                        <td colspan="2">&nbsp;</td>
                                                    </tr>



                                                    <tr>

                                                        <td align="center"><?php if ($banner = tep_banner_exists('dynamic', 'baner1')) {
                                                                        echo tep_display_banner('static', $banner);
                                                                    }?></td>

                                                        <td align="center"><?php if ($banner = tep_banner_exists('dynamic', 'baner2')) {
                                                                        echo tep_display_banner('static', $banner);
                                                                    }?></td>
                                                    </tr>


                                                    <tr>

                                                        <td align="center"><?php if ($banner = tep_banner_exists('dynamic', 'baner3')) {
                                                                        echo tep_display_banner('static', $banner);
                                                                    }?></td>

                                                        <td align="center"><?php if ($banner = tep_banner_exists('dynamic', 'baner4')) {
                                                                        echo tep_display_banner('static', $banner);
                                                                    }?></td>
                                                    </tr>

                                                            <?php

                                                        }


                                                        ?>


                                                </table>

                                            </td>
                                        </tr>
                                    </table>        </td>
                            </tr>
                        </table>     </td>
                        <?php
                    }
                    ?>



                    </td>





                    <td width="180" valign="top">

                        <table border="0" width="180"cellspacing="0" cellpadding="2">
                            <?php require(DIR_WS_INCLUDES . 'column_right.php'); ?>
                        </table>

                        <?php

                        if ($banner = tep_banner_exists('dynamic', 'derecha3')) {

                            ?>



                        <!-- banner asistencia-->

                        </br>

                        <table border="0" cellspacing="0" width="100%" cellpadding="0">
                        </table>

                        <table width="100%" border="0" cellspacing="0" cellpadding="0" >

                            <tr>

                                <td><table  width="100%"  border="0" cellspacing="0" cellpadding="0" >

                                        <tr>

                                            <td>

                                                    <?php echo tep_display_banner('static', $banner)?>                               </td>
                                        </tr>

                                        <tr>



                                            <td><img src="images/pixel_trans.gif" border="0" alt="" width="100%" height="1" /> </td>
                                        </tr>

                                    </table></td>
                            </tr>
                        </table>

                            <?php  } ?>
                        <?php

                        if ($banner = tep_banner_exists('dynamic', 'derecha4')) {

                            ?>
                        <!-- banner asistencia-->

                        </br>

                        <table border="0" cellspacing="0" width="100%" cellpadding="0">
                        </table>

                        <table width="100%" border="0" cellspacing="0" cellpadding="0" >

                            <tr>

                                <td><table  width="100%"  border="0" cellspacing="0" cellpadding="0" >

                                        <tr>

                                            <td>

                                                    <?php echo tep_display_banner('static', $banner)?>                               </td>
                                        </tr>

                                        <tr>



                       <td><!--<img src="images/pixel_trans.gif" border="0" alt="" width="100%" height="1" /> --></td>
                                        </tr>

                                    </table></td>
                            </tr>
                        </table>

                            <?php  } ?>
                        <?php

                        if ($banner = tep_banner_exists('dynamic', 'derecha5')) {

                            ?>
                        <!-- banner asistencia-->
                        </br>
                        <table border="0" cellspacing="0" width="100%" cellpadding="0">
                        </table>
                        <table width="100%" border="0" cellspacing="0" cellpadding="0" >

                            <tr>

                                <td><table  width="100%"  border="0" cellspacing="0" cellpadding="0" >

                                        <tr>

                                            <td>

                                                    <?php echo tep_display_banner('static', $banner)?>                               </td>
                                        </tr>

                                        <tr>



                                            <td><img src="images/pixel_trans.gif" border="0" alt="" width="100%" height="1" /> </td>
                                        </tr>



                                    </table></td>
                            </tr>
                        </table>

                  <?php  } ?></td>
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
