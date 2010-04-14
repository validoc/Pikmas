<?php
/*
  $Id: conditions.php 1739 2007-12-20 00:52:16Z hpdl $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2003 osCommerce

  Released under the GNU General Public License
*/

  require('includes/application_top.php');

  require(DIR_WS_LANGUAGES . $language . '/' . FILENAME_CONDITIONS);

  $breadcrumb->add(NAVBAR_TITLE, tep_href_link(FILENAME_CONDITIONS));
?>
<!doctype html public "-//W3C//DTD HTML 4.01 Transitional//EN">
<html <?php echo HTML_PARAMS; ?>>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo CHARSET; ?>">
<title><?php echo TITLE; ?></title>
<base href="<?php echo (($request_type == 'SSL') ? HTTPS_SERVER : HTTP_SERVER) . DIR_WS_CATALOG; ?>">
<link rel="stylesheet" type="text/css" href="stylesheet.css">
<link href="SpryAssets/SpryMenuBarHorizontal.css" rel="stylesheet" type="text/css" />
</head>
<body>
	<div class="wrapper header">
<!-- header //-->
<?php require(DIR_WS_INCLUDES . 'header.php'); ?>
<!-- header_eof //-->

<!-- body //-->
<table border="0" width="100%" cellspacing="3" cellpadding="3">
  <tr>
    <td width="<?php echo BOX_WIDTH; ?>" valign="top"><table border="0" width="<?php echo BOX_WIDTH; ?>" cellspacing="0" cellpadding="2">
<!-- left_navigation //-->
<?php require(DIR_WS_INCLUDES . 'column_left.php'); ?>
<!-- left_navigation_eof //-->
    </table></td>
<!-- body_text //-->
    <td width="100%" valign="top"><table border="0" width="100%" cellspacing="0" cellpadding="0">
      <tr>
        <td><table border="0" width="100%" cellspacing="0" cellpadding="0">
          <tr>
            <td class="pageHeading"><?php echo HEADING_TITLE; ?></td>
            <td class="pageHeading" align="right"><?php echo tep_image(DIR_WS_IMAGES . 'table_background_specials.gif',  HEADING_TITLE, HEADING_IMAGE_WIDTH, HEADING_IMAGE_HEIGHT); ?></td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td><?php echo tep_draw_separator('pixel_trans.gif', '100%', '10'); ?></td>
      </tr>
      <tr>
        <td class="main"><!--<?php echo TEXT_INFORMATION; ?>-->
        
        <table cellspacing="0" cellpadding="0">
              <tr>
                <td><table width="100%" border="0" cellpadding="0" cellspacing="0">
                  <tbody>
                    <tr>
                      <td height="19"><h2>Pol&iacute;tica de privacidad</h2></td>
                    </tr>
                    </tbody>
                </table></td>
              </tr>
              <tr>
                <td><img src="http://www.futura-online.com/images/pixel_trans.gif" alt="" width="100%" border="0" height="10"></td>
              </tr>
              <tr>
                <td><table width="100%" border="0" cellpadding="2" cellspacing="0" class="privacy">
                    <tbody>
                      <tr>
                        <td><p>PIKMAS Videojuegos sabe como cuidas la   informaci&oacute;n que sobre t&iacute; se usa y se comparte,     por este motivo, y  apreciando tu confianza,  lo haremos cuidadosamente   y sensiblemente. Este aviso describe nuestra pol&iacute;tica de privacidad.     Visitando PIKMAS Videojuegos, est&aacute;s aceptando las pr&aacute;cticas descritas   en este Aviso de privacidad.<br>
                          <br>
                          <strong>&iquest;Qu&eacute; hacemos con informaci&oacute;n personal sobre clientes de PIKMAS   Videojuegos?</strong><br>
                          La informaci&oacute;n que recogemos de clientes nos ayuda a personalizar y a   mejorar cont&iacute;nuamente tu experiencia de comprar en     PIKMAS Videojuegos. Aqu&iacute; est&aacute;n los tipos de informaci&oacute;n que recogemos.<br>
                            <br>
                            <strong>Informaci&oacute;n que  nos das:</strong><br>
                          Recibimos y guardamos cualquier informaci&oacute;n que  insertas en nuestro   sitio web o nos das de cualquier otra manera.     Puedes escoger no proporcionar cierta informaci&oacute;n, pero entonces no   podr&iacute;as disfrutar de muchos de los beneficios que te ofrecemos. Usamos   la informaci&oacute;n que nos proporcionas, as&iacute; como la que nos propones, para   responder a tus demandas, personalizar tus futuras compras, mejorar   nuestras tiendas y contactar contigo.<br>
                            <br>
                            <strong>Informaci&oacute;n Autom&aacute;tica:</strong><br>
                          Recibimos y guardamos ciertos tipos de informaci&oacute;n siempre que   interact&uacute;as con nosotros. Por ejemplo, como muchos sitios web,    usamos las "cookies", y obtenemos ciertos tipos de informaci&oacute;n cuando tu   navegador de web accede a PIKMAS Videojuegos.     Ve al final de esta p&aacute;gina para ver ejemplos de informaci&oacute;n que   recibimos. Varias compa&ntilde;&iacute;as ofrecen utilidades dise&ntilde;adas para ayudarte a   visitar sitios web de forma an&oacute;nima. Aunque  no podemos proporcionarte   una navegaci&oacute;n personalizada en PIKMAS Videojuegos, si no podemos   reconocerte, queremos que seas consciente que estas herramientas   existen.<br>
                            <br>
                            <strong>Comunicaciones v&iacute;a e-mail:</strong><br>
                          Para ayudarnos a hacer e-mails m&aacute;s &uacute;tiles e interesantes, recibimos a   menudo una confirmaci&oacute;n cuando abres un e-mail de     PIKMAS Videojuegos si tu ordenador soporta tales capacidades. Tambi&eacute;n   comparamos nuestra lista de clientes a listas recibidas de     otras compa&ntilde;&iacute;as, en el esfuerzo de evitar enviar mensajes innecesarios a   nuestros clientes. Si no quieres recibir     e-mails u otro correo nuestro, Ajusta tu cuenta para reflejar esto   seleccionando no suscribirse en la opci&oacute;n de Boletines de noticias.<br>
                            <br>
                            <strong>Informaci&oacute;n de otras fuentes:</strong><br>
                          Para mejorar la personalizaci&oacute;n de nuestro servicio (por ejemplo:   proporcionando las mejores recomendaciones de productos u ofertas   especiales que pensamos te interesar&aacute;n), podr&iacute;amos recibir informaci&oacute;n   tuya de otras fuentes y te agregar&iacute;amos     a nuestra informaci&oacute;n de cuentas. Tambi&eacute;n recibimos actualizaciones e   informaci&oacute;n de direcci&oacute;n de nuestros transportistas u otras fuentes para   que podamos corregir nuestros archivos y podemos entregar tu pr&oacute;xima   compra o comunicaci&oacute;n m&aacute;s f&aacute;cilmente.<br>
                            <br>
                            <strong>&iquest;Qu&eacute; son las Cookies?</strong><br>
                          Las cookies son identificadores alfanum&eacute;ricos que transferimos a tu   disco duro a trav&eacute;s de tu navegador web para habilitar la capacidad de   nuestros sistemas de reconocer tu navegador y proporcionar diversos   servicios como los login autom&aacute;ticos y los carritos permanentes para el   almacenamiento de art&iacute;culos en tu carrito entre tus visitas.<br>
                          La opci&oacute;n de "ayuda" del toolbar de la mayor&iacute;a de los navegadores te   dir&aacute; c&oacute;mo impedir a tu navegador aceptar nuevas cookies,     c&oacute;mo hacer que el navegador te notifique cuando recibes una nueva   cookie, o c&oacute;mo desactivar las cookies totalmente.     Sin embargo, las cookies te permiten utilizar muchos de los mejores   servicios de PIKMAS Videojuegos y recomendamos las tengas activadas.<br>
                            <br>
                            <strong>&iquest;Qu&eacute; Hace PIKMAS Videojuegos con la informaci&oacute;n que recibe?</strong><br>
                          La informaci&oacute;n sobre nuestros clientes es una parte importante de   nuestro negocio, y no estamos por la labor de venderlo a otros. S&oacute;lo   compartimos la informaci&oacute;n del cliente con los afiliados a PIKMAS   Videojuegos y la controlamos como se describe m&aacute;s abajo.<br>
                            <br>
                            <strong>Negocios afiliados que no controlamos:</strong><br>
                          Trabajamos estrechamente con nuestros afiliados. En algunos casos, estos   operan en las tiendas de PIKMAS Videojuegos o te proporcionan ofertas   en PIKMAS Videojuegos. En otros casos, operamos con sus tiendas,   proporcionamos los servicios o vendemos productos en l&iacute;nea juntamente   con estos afiliados. Puedes decirnos cuando un afiliado est&aacute; envuelto en   tus transacciones, y compartimos la informaci&oacute;n de cliente que est&eacute;   relacionada a esas transacciones con ese afiliado.<br>
                            <br>
                            <strong>Agentes:</strong><br>
                          Empleamos a otras compa&ntilde;&iacute;as e individuos para realizar funciones en   nuestro nombre.     como puedan ser procesar pedidos, entregando paquetes, enviando correo   postal, mandando e-mails, quitando la informaci&oacute;n repetitiva de las   listas de clientes, analizando datos, proporcionando asistencia al   cliente, procesando los pagos de tarjeta de cr&eacute;dito, proporcionando   servicio al cliente en general. Ellos tienen acceso a la informaci&oacute;n   personal necesaria para realizar sus funciones, pero no pueden usarla   para     otros prop&oacute;sitos.<br>
                            <br>
                            <strong>Ofertas y promociones:</strong><br>
                          A veces enviamos ofertas a grupos seleccionados de clientes de PIKMAS   Videojuegos en nombre de otros negocios.     Cuando hacemos esto, no damos tu nombre y direcci&oacute;n a ese negocio. Si   no quieres recibir estas ofertas,     ajusta tu preferencia de boletines informativos de cuenta a no   susbribirse y no te mandaremos nuestras promociones.<br>
                            <br>
                            <strong>Transferencias comerciales:</strong><br>
                          Para el  desarrollo de nuestro negocio, podr&iacute;amos vender o comprar   tiendas o recursos. En las tales transacciones, la informaci&oacute;n del   cliente     generalmente es uno de los recursos comerciales transferidos. En el   caso improbable que PIKMAS Videojuegos, o substancialmente     todos sus recursos sean adquiridos, la informaci&oacute;n del cliente ser&aacute; uno   de los recursos transferidos.<br>
                            <br>
                            <strong>Protecci&oacute;n de PIKMAS Videojuegos y otros:</strong><br>
                          Daremos cuenta y otra informaci&oacute;n personal cuando creamos que el   descargo es apropiado para obedecer la ley,     d&eacute; fuerza o aplique nuestras <a href="http://www.noblepagan.com/catalog/conditions.php">Condiciones de   uso</a> y otros    acuerdos o protega los derechos, propiedades o seguridad de PIKMAS   Videojuegos, de nuestros usuarios u otros. Esto incluye el intercambio   de    informaci&oacute;n con otras compa&ntilde;&iacute;as y organizaciones para la protecci&oacute;n del   fraude y reducci&oacute;n de los riesgos de cr&eacute;dito.<br>
                            <br>
                            <strong>Con tu consentimiento:</strong><br>
                          Independientemente del apartado anterior, recibir&aacute;s el aviso cuando la   informaci&oacute;n sobre t&iacute; pueda ir a terceras partes,     y  tendr&aacute;s la oportunidad de escoger no compartir la informaci&oacute;n.<br>
                            <br>
                            <strong>&iquest;C&oacute;mo es de segura la informaci&oacute;n sobre m&iacute;?</strong><br>
                          Trabajamos para proteger la seguridad de tu informaci&oacute;n durante la   transmisi&oacute;n usando <a href="https://www.paypal.com">PayPal</a> como     nuestra &uacute;nica forma online de pago, ellos procesan las tarjetas de   cr&eacute;dito, para que PIKMAS Videojuegos NUNCA te vea tu n&uacute;mero de tarjeta   de cr&eacute;dito.     Paypal protege tu privacidad e informaci&oacute;n usando la capa de conexiones   segura (SSL), software que encripta la informaci&oacute;n que itrodujiste.<br>
                          Es importante para  t&iacute; proteger con contrase&ntilde;a tu ordenardor para evitar   el acceso desautorizado a tu ordenador.     Aseg&uacute;rate de hacer un logout al terminar de usar un ordenador   compartido.<br>
                            <br>
                            <strong>&iquest;A qu&eacute; informaci&oacute;n puedo acceder?</strong><br>
                          PIKMAS Videojuegos te da acceso a la siguiente informaci&oacute;n sobre t&iacute; para   que la puedas ver y,     en ciertos casos, actualizar. Esta lista cambiar&aacute; a medida que nuestro   sitio web vaya evolucionando.<br>
                            <br>
                            <a href="http://www.futura-online.com/catalog/account.php">Tu cuenta</a><br>
                            <br>
                            <strong>&iquest;Qu&eacute; opciones tengo?</strong><br>
                          Como se ha dicho anteriormente, siempre puedes escoger no proporcionar    informaci&oacute;n, aunque es necesaria para hacer una compra o para   beneficiarse de los servicios de  PIKMAS Videojuegos como el login   autom&aacute;tico y los carritos permanentes. Puedes agregar o poner al d&iacute;a   cierta informaci&oacute;n en la opci&oacute;n "Mi Cuenta". Cuando pones al d&iacute;a la   informaci&oacute;n, normalmente guardamos una copia de la versi&oacute;n anterior en   nuestros archivos.<br>
                          Si no quieres recibir e-mails u otro correo nustro, ajusta en tu cuenta   la opci&oacute;n bolet&iacute;n de noticias a no suscribirse.<br>
                            <br>
                            <strong>Menores de edad</strong><br>
                          PIKMAS Videojuegos no vende su productos a menores de edad. Si eres   menor de edad, puedes usar los servicios de  PIKMAS Videojuegos s&oacute;lo con   el consentimiento de un padre o tutor legal.<br>
                            <br>
                            <strong>Condiciones de uso, noticias y revisiones</strong><br>
                          Si visitas PIKMAS Videojuegos, tu visita y cualquier disputa acerca de   tu privacidad est&aacute;n sujetas a este aviso y     nuestras condiciones de uso, incluso las limitaciones en los da&ntilde;os y   perjuicios, el arbitraje de disputas, y aplicaci&oacute;n de la ley espa&ntilde;ola.   Si tienes cualquier preocupaci&oacute;n sobre la confidencialidad en PIKMAS   Videojuegos, env&iacute;anos     una descripci&oacute;n completa a info@pikmas.com, y intentaremos   resolverlo. Nuestros cambios comerciales son constantes.     Este aviso y las condiciones de uso tambi&eacute;n cambiar&aacute;n, y el uso de   informaci&oacute;n que recogemos ahora est&aacute; sujeto aviso de confidencialidad   activo en el momento de uso. Podemos mandar electr&oacute;nicamente   recordatorios peri&oacute;dicos de nuestros avisos y condiciones, a menos que   nos hayas indicado lo contrario, pero deber&iacute;as verificar peri&oacute;dicamente   nuestro sitio web para ver los cambios.<br>
                            <br>
                            <strong>La informaci&oacute;n que nos das</strong><br>
                          Nos env&iacute;as datos cuando realizas b&uacute;squedas, compras, ves ofertas, env&iacute;as   o participas en encuestas, o contactas con el servicio del cliente. Por   ejemplo, proporcionas informaci&oacute;n cuando busca un producto, haces un   pedido, haces un pedido,    proporcionas informaci&oacute;n en tu cuenta (podr&iacute;as tener m&aacute;s de una si has   usado m&aacute;s de un e-mail al comprarnos), contactas con nosotros por   tel&eacute;fono, nos mandas e-mails u opinas sobre nuestros productos. Como   resultado de esas acciones, podr&iacute;as proporcionarnos con la informaci&oacute;n   tu nombre, direcci&oacute;n,     y n&uacute;mero de tel&eacute;fono; las personas a quienes se han enviado las   compras, incluso la direcci&oacute;n y n&uacute;mero de tel&eacute;fono. .<br>
                            <br>
                            <strong>Informaci&oacute;n Autom&aacute;tica</strong><br>
                          Ejemplos de informaci&oacute;n que almacenamos y analizamos s&oacute;n la direcci&oacute;n   del protocolo de Internet (IP) que usaba tu     ordenador; el login; la direcci&oacute;n del e-mail; la contrase&ntilde;a; el   ordenador e informaci&oacute;n de conexi&oacute;n como el tipo de navegador     y su versi&oacute;n, sistema operativo, y plataforma; tu historial de compra;   el URL      a trav&eacute;s del cual has accedidoa  nuestro web, incluso la fecha y hora,   el n&uacute;mero de la cookie y los productos has visto o buscado. </p>
                          <p>&nbsp;</p>
                          <p>&nbsp;</p>
                          <p>&nbsp;</p></td>
                      </tr>
                    </tbody>
                </table></td>
              </tr>
            </table>
        </td>
      </tr>
      <tr>
        <td><?php echo tep_draw_separator('pixel_trans.gif', '100%', '10'); ?></td>
      </tr>
      <tr>
        <td><table border="0" width="100%" cellspacing="1" cellpadding="2" class="infoBox">
          <tr class="infoBoxContents">
            <td><table border="0" width="100%" cellspacing="0" cellpadding="2">
              <tr>
                <td width="10"><?php echo tep_draw_separator('pixel_trans.gif', '10', '1'); ?></td>
                <td align="right"><?php echo '<a href="' . tep_href_link(FILENAME_DEFAULT) . '">' . tep_image_button('button_continue.gif', IMAGE_BUTTON_CONTINUE) . '</a>'; ?></td>
                <td width="10"><?php echo tep_draw_separator('pixel_trans.gif', '10', '1'); ?></td>
              </tr>
            </table></td>
          </tr>
        </table></td>
      </tr>
    </table></td>
<!-- body_text_eof //-->
    <td width="<?php echo BOX_WIDTH; ?>" valign="top"><table border="0" width="<?php echo BOX_WIDTH; ?>" cellspacing="0" cellpadding="2">
<!-- right_navigation //-->
<?php require(DIR_WS_INCLUDES . 'column_right.php'); ?>
<!-- right_navigation_eof //-->
    </table></td>
  </tr>
</table>
<!-- body_eof //-->
<br>
</div>
<tr>
<!-- footer //-->
<?php require(DIR_WS_INCLUDES . 'footer.php'); ?>
<!-- footer_eof //-->
</tr>
<!--<script type="text/javascript">
    var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgDown:"SpryAssets/SpryMenuBarDownHover.gif", imgRight:"SpryAssets/SpryMenuBarRightHover.gif"});
</script>-->
</body>
</html>
<?php require(DIR_WS_INCLUDES . 'application_bottom.php'); ?>