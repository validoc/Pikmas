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
           <div class="newshomesuscriber">     
          <form  action="../send_contact.php" method="post">
          <table>
          <tr>
           <td>
                      <input name="email" value="Noticias en tu mail" onfocus="this.value='';" type="text" />
             </td>
             <td>
                      <input name=""  type="image" src="images/enviar.png" value="Enviar"></form>
            </td>
            </tr>
            </table>
            </div>
                      <!-- <span>Noticias en tu mail</span><br/>		 <form action="../send_contact.php" method="post" id="newsletter">
			<label for="email"></label>
			<input type="text" name="email" id="email" value="" />
			<button type="submit" id="btnSubscribe" ><span></span></button>
		</form>-->
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
                        <td>
                 
                      </td>
                            <td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
                            <td>
                                <form name="quick_find" action="http://www.pikmas.com/tienda/advanced_search_result.php" method="get">
                                    <input value="B&uacute;squeda" name="keywords" style="width:120px; font-size:12px; color:#666" type="text" id="cajaBusqueda" onfocus="this.value='';">
                                    <input src="images/button_quick_find.png" alt="B&uacute;squeda Rápida"  title=" Buscar " border="0" type="image">
                                    <br /><br />
                                    <span class="AdvancedSearch">
                                        <a href="./advanced_search.php"><b>B&uacute;squeda Avanzada</b></a>
                                    </span>
                                </form>
                            </td>
                        </tr>
                    </table>
                </div><!-- //UserMenu-->

                <div class="clearleft"></div>
            </div> <!--//TopMenu-->
            <div id="MainMenu">
<!-- Begin Publishing Scripts of Flash Menu pikmasmenu -->
<div id="fm_placeholder_pikmasmenu" style="width: 950px; height: 36px ">
Loading Flash Menu</div><script type="text/javascript" defer>//<![CDATA[
var fm_pikmasmenu = function() {
  function getPos() {
    var p=[0,0]; var e=document.getElementById('fm_placeholder_pikmasmenu');
    do { p[0]+=e.offsetTop; p[1]+=e.offsetLeft; } while (e=e.offsetParent); return p; }
  function move() {
    var p=getPos(); var m=document.getElementById('fm_wrapper_pikmasmenu'); m.style.top=p[0]+'px'; m.style.left=p[1]+'px'; }
  var create = function() {
    var s; if (document.all && !window.opera) {
      s='<object id="fm_menu_pikmasmenu" width="960px" height="36px" classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" '
        +'codebase="http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,0,0">'
        +'<param name="quality" value="high" /><param name="scale" value="noscale" /><param name="salign" value="LT" />'
        +'<param name="movie" value="pikmasmenu.swf" /><param name="flashvars" value="callback=fm_pikmasmenu">'
        +'<param name="menu" value="false" /><param name="wmode" value="transparent" /></object>'; }
    else {
      s='<embed type="application/x-shockwave-flash" pluginspage="http://www.adobe.com/go/getflashplayer" '
        +'id="fm_menu_pikmasmenu" width="960px" height="36px" src="pikmasmenu.swf" wmode="transparent" '
        +'flashvars="callback=fm_pikmasmenu" quality="high" scale="noscale" menu="false" salign="LT" />'; }
    var p=getPos(); var m=document.createElement('div'); m.id='fm_wrapper_pikmasmenu'; m.style.position='absolute';
    m.style.zIndex='100'; m.style.top=p[0]+'px'; m.style.left=p[1]+'px'; m.innerHTML=s;
    document.body.insertBefore(m, document.body.firstChild); setInterval(move, 500); }(); 
  return {
    expand: function() { 
      document.getElementById('fm_menu_pikmasmenu').style.height='219px'; },
    collapse: function() {
      document.getElementById('fm_menu_pikmasmenu').style.height='36px';
 }};}();//]]></script>
<!-- End Publishing Scripts of Flash Menu pikmasmenu -->




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
    <?php
}
if (isset($HTTP_GET_VARS['info_message']) && tep_not_null($HTTP_GET_VARS['info_message'])) {
    ?>
<table border="0" width="100%" cellspacing="0" cellpadding="2">
    <tr class="headerInfo">
        <td class="headerInfo"><?php echo htmlspecialchars(stripslashes(urldecode($HTTP_GET_VARS['info_message']))); ?></td>
    </tr>
</table>
    <?php
}
?>
