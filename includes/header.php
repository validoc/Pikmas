<?php
/*
  $Id: header.php 1739 2007-12-20 00:52:16Z hpdl $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2003 osCommerce

  Released under the GNU General Public License
*/

// check if the 'install' directory exists, and warn of its existence
if (WARN_INSTALL_EXISTENCE == 'true') {
    if (file_exists(dirname($HTTP_SERVER_VARS['SCRIPT_FILENAME']) . '/install')) {
        $messageStack->add('header', WARNING_INSTALL_DIRECTORY_EXISTS, 'warning');
    }
}

// check if the configure.php file is writeable
if (WARN_CONFIG_WRITEABLE == 'true') {
    if ( (file_exists(dirname($HTTP_SERVER_VARS['SCRIPT_FILENAME']) . '/includes/configure.php')) && (is_writeable(dirname($HTTP_SERVER_VARS['SCRIPT_FILENAME']) . '/includes/configure.php')) ) {
        $messageStack->add('header', WARNING_CONFIG_FILE_WRITEABLE, 'warning');
    }
}

// check if the session folder is writeable
if (WARN_SESSION_DIRECTORY_NOT_WRITEABLE == 'true') {
    if (STORE_SESSIONS == '') {
        if (!is_dir(tep_session_save_path())) {
            $messageStack->add('header', WARNING_SESSION_DIRECTORY_NON_EXISTENT, 'warning');
        } elseif (!is_writeable(tep_session_save_path())) {
            $messageStack->add('header', WARNING_SESSION_DIRECTORY_NOT_WRITEABLE, 'warning');
        }
    }
}

// check session.auto_start is disabled
if ( (function_exists('ini_get')) && (WARN_SESSION_AUTO_START == 'true') ) {
    if (ini_get('session.auto_start') == '1') {
        $messageStack->add('header', WARNING_SESSION_AUTO_START, 'warning');
    }
}

if ( (WARN_DOWNLOAD_DIRECTORY_NOT_READABLE == 'true') && (DOWNLOAD_ENABLED == 'true') ) {
    if (!is_dir(DIR_FS_DOWNLOAD)) {
        $messageStack->add('header', WARNING_DOWNLOAD_DIRECTORY_NON_EXISTENT, 'warning');
    }
}

if ($messageStack->size('header') > 0) {
    echo $messageStack->output('header');
}
?>
<table border="0" width="960" cellspacing="0" cellpadding="0">
    <tr>
        <td><!-- ******************************** HEAD SECTION  ******************************* -->
            <div id="TopMenu">
                <div class="Logo">
                    <h1><a href="<?php echo tep_href_link('index.php') ?>" target="_parent"><img src="images/store_logo.png" border="0" title="Compra de videjuegos, cosolas, accesorios, PIKMAS todo un mundo de videojuegos" alt="Logo Pikmas"/></a></h1> <br />
                </div>
                <!-- //Logo-->
                <div class="UserMenu">
                    <table>
                        <tr>
                            <td colspan="3">
                                <a href="<?php echo tep_href_link('logoff.php') ?>" class="usertopmenu">Salir</a> &nbsp;|&nbsp;
                                <a href="<?php echo tep_href_link('account.php') ?>" class="usertopmenu">Mi Cuenta</a> &nbsp;|&nbsp;
                                <a href="<?php echo tep_href_link('shopping_cart.php') ?>" class="usertopmenu">Ver Cesta</a> &nbsp;|&nbsp;
                                <a href="<?php echo tep_href_link('shopping_cart.php') ?>" class="usertopmenu">Mis Pedidos</a>
                            </td>
                        </tr>
                        <tr>
                        <!--<td>
                   <form  action="" method="get">
                      <input style="width:120px; font-size:12px; color:#666" name="Noticias en tu email" type="text" value="Noticias en tu mail" />
                      <input name="" style="margin-top:5px" type="image" src="images/enviar.png" value="Enviar"></form>
                      </td>-->
                            <td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
                            <td>
                                <form name="quick_find" action="http://www.pikmas.com/tienda/advanced_search_result.php" method="get">
                                    <input value="B&uacute;squeda" name="keywords" style="width:120px; font-size:12px; color:#666" type="text" id="cajaBusqueda" onfocus="this.value='';">
                                    <input src="images/button_quick_find.png" alt="B&uacute;squeda Rápida"  title=" Buscar " border="0" type="image">
                                    <br /><br />
                                    <span class="AdvancedSearch">
                                        <a href="http://www.pikmas.com/tienda/advanced_search.php"><b>B&uacute;squeda Avanzada</b></a>
                                    </span>
                                </form>
                            </td>
                        </tr>
                    </table>
                </div><!-- //UserMenu-->

                <div class="clearleft"></div>
            </div> <!--//TopMenu-->
            <div id="MainMenu">
                <ul id="MenuBar1" class="MenuBarHorizontal">
                    <li><a class="MenuBarItemSubmenu textleft" href="<?php echo tep_href_link('index.php', 'products_model=ps3') ?>" title="Play Station 3">PS 3</a>
                        <ul >
                            <li><a href="<?php echo tep_href_link('index.php?product_info.php', 'cPath=22_36&products_id=252') ?>">Juegos</a></li>
                            <li><a href="#">Seminuevos</a></li>
                            <li><a href="<?php echo tep_href_link('index.php', 'cPath=42&sort=2a&filter_id=14') ?>">Consolas</a></li>
                            <li><a href="#">Accesorios</a></li>
                        </ul>
                    </li>
                    <li><a class="MenuBarItemSubmenu textleft" title="Play Station Portable y Play Station Go" href="<?php echo tep_href_link('index.php?products_model=psp') ?>">PSP</a>
                        <ul>
                            <li><a href="#">Juegos</a></li>
                            <li><a href="#">Seminuevos</a></li>
                            <li><a href="#">Consolas</a></li>
                            <li><a href="#">Accesorios</a></li>
                        </ul>
                    </li>
                    <li><a class="MenuBarItemSubmenu textleft" title="Nintendo Wii" href="<?php echo tep_href_link('index.php', 'products_model=wii') ?>">Wii</a>
                        <ul>
                            <li><a href="#">Juegos</a></li>
                            <li><a href="#">Seminuevos</a></li>
                            <li><a href="#">Consolas</a></li>
                            <li><a href="#">Accesorios</a></li>
                        </ul>
                    </li>
                    <li><a class="MenuBarItemSubmenu textleft" title="Nintendo DS" href="<?php echo tep_href_link('index.php', 'products_model=nds') ?>">NDS</a>
                        <ul>
                            <li><a href="#">Juegos</a></li>
                            <li><a href="#">Seminuevos</a></li>
                            <li><a href="#">Consolas</a></li>
                            <li><a href="#">Accesorios</a></li>
                        </ul>
                    </li>    <li><a class="MenuBarItemSubmenu lileft textleft" title="Xbox 360" href="<?php echo tep_href_link('index.php', 'products_model=XBOX360') ?>">Xbox 360</a>
                        <ul>
                            <li><a href="#">Juegos</a></li>
                            <li><a href="#">Seminuevos</a></li>
                            <li><a href="#">Consolas</a></li>
                            <li><a href="#">Accesorios</a></li>
                        </ul>
                    </li>
                    <li><a class="MenuBarItemSubmenu textleft" title="Play Station 2" href="<?php echo tep_href_link('index.php', 'products_model=ps2') ?>">PS 2</a>
                        <ul>
                            <li><a href="#">Juegos</a></li>
                            <li><a href="#">Seminuevos</a></li>
                            <li><a href="#">Consolas</a></li>
                            <li><a href="#">Accesorios</a></li>
                        </ul>
                    </li>
                    <li><a class="MenuBarItemSubmenu textleft" title="Ordenador" href="<?php echo tep_href_link('index.php', 'products_model=pc') ?>">PC</a>
                        <ul>
                            <li><a href="#">Juegos</a></li>
                            <li><a href="#">Seminuevos</a></li>
                            <li><a href="#">Consolas</a></li>
                            <li><a href="#">Accesorios</a></li>
                        </ul>
                    </li>
                    <li><a class="MenuBarItemSubmenu textleft" href="<?php echo tep_href_link('seminuevos.php') ?>">Seminuevos</a>
                        <ul>
                            <li><a href="http://www.pikmas.com/tienda/product_info.php?cPath=29&products_id=676">Xbox360</a></li>
                            <li><a href="#">Wii</a></li>
                            <li><a href="http://www.pikmas.com/tienda/product_info.php?products_id=901">PS3</a></li>
                            <li><a href="#">PS2</a></li>
                            <li><a href="http://www.pikmas.com/tienda/product_info.php?products_id=902">PSP</a></li>
                            <li><a href="#">PC</a></li>
                        </ul>
                    </li>
                    <li><a class="MenuBarItemSubmenu textleft" href="<?php echo tep_href_link('index.php','cPath=42&sort=2a&filter_id=') ?>">Consolas</a>
                        <ul>
                            <li><a href="http://www.pikmas.com/tienda/index.php?cPath=42&sort=2a&filter_id=16">Xbox360</a></li>
                            <li><a href="http://www.pikmas.com/tienda/index.php?cPath=42&sort=2a&filter_id=15">Wii NDS</a></li>
                            <li><a href="http://www.pikmas.com/tienda/index.php?cPath=42&sort=2a&filter_id=14">PS3 PS2 PSP</a></li>
                            <li><a href="#">PS2</a></li>
                        </ul>
                    </li>
                    <li><a class="MenuBarItemSubmenu textleft" href="<?php echo tep_href_link('index.php','cPath=28') ?>">Accesorios</a>
                    </li>
                </ul>
            </div>
            <!--//MainMenu-->
        </td>
    </tr>
</table>
<table>
    <tr>
        <td class="breadcrumb" >&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $breadcrumb->trail(' &raquo; '); ?>
        </td>

    </tr>
</table>
<?php
if (isset($HTTP_GET_VARS['error_message']) && tep_not_null($HTTP_GET_VARS['error_message'])) {
    ?>
<table border="0" width="100%" cellspacing="0" cellpadding="2">
    <tr class="headerError">
        <td class="headerError"><?php echo htmlspecialchars(stripslashes(urldecode($HTTP_GET_VARS['error_message']))); ?></td>
    </tr>
</table>
<?php } if (isset($HTTP_GET_VARS['info_message']) && tep_not_null($HTTP_GET_VARS['info_message'])) { ?>
<table border="0" width="100%" cellspacing="0" cellpadding="2">
    <tr class="headerInfo">
        <td class="headerInfo"><?php echo htmlspecialchars(stripslashes(urldecode($HTTP_GET_VARS['info_message']))); ?></td>
    </tr>
</table>
<?php } ?>