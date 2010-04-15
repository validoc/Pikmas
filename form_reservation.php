<?php

require('includes/application_top.php');
require('includes/classes/http_client.php');

if (!tep_session_is_registered('customer_id')) {
  $navigation->set_snapshot();
  tep_redirect(tep_href_link(FILENAME_LOGIN, '', 'SSL'));
}

$the_user = tep_db_fetch_array(tep_db_query("select * from customers u where u.customers_id = '$customer_id'"));

$the_products_id = implode(",", array_keys($_SESSION['cart']->contents));


$the_product = tep_db_fetch_array(tep_db_query("select * from products_description pd where pd.products_id in ($the_products_id) and pd.language_id = '" . (int)$languages_id . "'"));



include_once('../class.phpmailer.php');

$mail             = new PHPMailer();

$mail->From       = "reservation@pikmas.com";
$mail->FromName   = "Reservation";

$mail->Subject    = "[Pikmas] Nueva reserva de producto $email_to";

$mail->Body    = "Acaba de registrarse la siguiente reserva:\n

Usuario:
Nombre completo   :    " . $the_user['customers_firstname'] . "  " . $the_user['customers_lastname'] . "
Correo electronico: " .$the_user['customers_email_address'] . "
Telefono          : " .$the_user['customers_telephone'] . "

Datos del producto:
Nombre:             " .$the_product['products_name'] . "
Url   :             " .$the_product['products_url'] . "
Url del producto   :" . tep_href_link('product_info.php', 'products_id='.$the_product['products_id'], 'NONSSL', false)  . "

www.pikmas.com";

$mail->AddAddress("alex@pikmas.com", "Alex");
$mail->AddAddress("israel@pikmas.com", "Israel");
//$mail->AddAddress("carakan@gmail.com", "Carlos");

if(!$mail->Send()) {
  $message_email =  "Mailer Error: " . $mail->ErrorInfo;
} else {
  $message_email = "Hemos recibido la informaci&oacute;n de contacto.";
}



?>
<!doctype html public "-//W3C//DTD HTML 4.01 Transitional//EN">
<html <?php echo HTML_PARAMS; ?>>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=<?php echo CHARSET; ?>">
    <title><?php echo TITLE; ?></title>
    <base href="<?php echo (($request_type == 'SSL') ? HTTPS_SERVER : HTTP_SERVER) . DIR_WS_CATALOG; ?>">
    <link rel="stylesheet" type="text/css" href="stylesheet.css">

    <script type="text/javascript" src="js/jquery-1.2.6.pack.js"></script>
    <script src="js/lightbox.js" type="text/javascript"></script>
    <script src="SpryAssets/SpryTabbedPanels.js" type="text/javascript"></script>
    <script src="SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
    <link href="lightbox.css" rel="stylesheet" type="text/css" />

    <link href="SpryAssets/SpryTabbedPanels.css" rel="stylesheet" type="text/css" />

    <link href="SpryAssets/SpryMenuBarHorizontal.css" rel="stylesheet" type="text/css" />


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
            </table></td>
          <!-- body_text //-->
          <td width="100%" valign="top"><?php echo tep_draw_form('cart_quantity', tep_href_link(FILENAME_PRODUCT_INFO, tep_get_all_get_params(array('action')) . 'action=add_product')); ?><table border="0" width="100%" cellspacing="0" cellpadding="0">
              <tr>
                <td><?php new infoBox(array(array('text' => 'Nuevo pedido de reserva confirmado'))); ?></td>
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
                            <td align="right">Muchas Gracias se envio una solicitud de reserva del producto, le responderemos lo mas pronto posible.

                            <p>
                              <?php echo $message_email; ?>
                            </p>
                            </td>
                            <td width="10"><?php echo tep_draw_separator('pixel_trans.gif', '10', '1'); ?></td>
                          </tr>
                        </table></td>
                    </tr>
                  </table></td>
              </tr>
          </td>
        </tr>
      </table></form></td>
  <!-- body_text_eof //-->
  <td width="<?php echo BOX_WIDTH; ?>" valign="top"><table border="0" width="<?php echo BOX_WIDTH; ?>" cellspacing="0" cellpadding="2">
      <!-- right_navigation //-->
      <?php require(DIR_WS_INCLUDES . 'column_right.php'); ?>
      <!-- right_navigation_eof //-->
    </table></td>
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
