<?php
/*
  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  CECA Module Copyright (c) 2009 by escri2

  seopedro@gmail.com

  Released under the GNU General Public License
*/
  class ceca_escri2_module {
    var $code, $title, $description, $enabled, $debug;

// class constructor
    function ceca_escri2_module() {
      global $order, $request_type;

      $this->code = 'ceca_escri2_module';
      $this->title = MODULE_PAYMENT_CECA_ESCRI2_TEXT_TITLE;
      $this->description = MODULE_PAYMENT_CECA_ESCRI2_TEXT_DESCRIPTION;
      $this->enabled = ((MODULE_PAYMENT_CECA_STATUS == 'Sí') ? true : false);
      $this->sort_order = MODULE_PAYMENT_CECA_SORT_ORDER;
      $this->debug = true;
	  if(MODULE_PAYMENT_CECA_URL_TYPE=='Real'){
		  $this->form_action_url = "https://pgw.ceca.es/cgi-bin/tpv";
		  $this->clave = MODULE_PAYMENT_CECA_CLAVE_REAL;
	  }else{
	  	  $this->form_action_url = "http://tpv.ceca.es:8000/cgi-bin/tpv";
		  $this->clave = MODULE_PAYMENT_CECA_CLAVE_PRUEBAS;
	  }
      if ((int)MODULE_PAYMENT_CECA_ORDER_STATUS_ID > 0) {
        $this->order_status = MODULE_PAYMENT_CECA_ORDER_STATUS_ID;
      }

      if (is_object($order)) $this->update_status();
    }

    function trace($log){
      if(!$this->debug)
        return;
      $fp = fopen (DIR_FS_CATALOG . '/includes/modules/payment/ceca.log', "a+");
      fwrite($fp,date("Y-m-d H:i:s")." - ".$log."\n");
      fclose($fp);
    }

// class methods
    function update_status() {
      global $order;

      if ( ($this->enabled == true) && ((int)MODULE_PAYMENT_CECA_ZONE > 0) ) {
        $check_flag = false;
        $check_query = tep_db_query("select zone_id from " . TABLE_ZONES_TO_GEO_ZONES . " where geo_zone_id = '" . MODULE_PAYMENT_CECA_ZONE . "' and zone_country_id = '" . $order->billing['country']['id'] . "' order by zone_id");
        while ($check = tep_db_fetch_array($check_query)) {
          if ($check['zone_id'] < 1) {
            $check_flag = true;
            break;
          } elseif ($check['zone_id'] == $order->billing['zone_id']) {
            $check_flag = true;
            break;
          }
        }

        if ($check_flag == false) {
          $this->enabled = false;
        }
      }
    }

    function javascript_validation() {
      return false;
    }

    function selection() {
      return array('id' => $this->code,
                   'module' => $this->title);
    }

    function pre_confirmation_check() {
      return false;
    }

    function confirmation() {
      return false;
    }

    function process_button()
    {
      global $order, $currency, $language, $currencies;
      //Total setup without .
      $Importe=$order->info['total'];
      $Importe=round($Importe*$order->info['currency_value'],2);
      $Importe=number_format($Importe, 2, '.', '');
      $Importe=preg_replace('/\./', '', $Importe);
      $Importe=(int)$Importe;

      $data=array("importe"=>$Importe);
      tep_db_perform("ceca_escri2", $data);
      $Num_operacion = tep_db_insert_id();
	  $Descripcion = $order->customer['lastname'].", ".$order->customer['firstname']." (".$order->customer['email_address'].")";

	  $this->trace("Num Operacion: " . $Num_operacion . " \nImporte: " . $Importe . "\n Description: " . $Descripcion . "\n");

      $process_button_string='';
	  $moneda = "978";
	  switch ($language){
        case "italiano":
          $Idioma="10";
          break;
        case "portoges":
          $Idioma="9";
          break;
        case "german":
          $Idioma="8";
          break;
        case "french":
          $Idioma="7";
          break;
        case "english":
          $Idioma="6";
          break;
        case "valencia":
          $Idioma="5";
          break;
        case "galego":
          $Idioma="4";
          break;
        case "euskera":
          $Idioma="3";
          break;
        case "catala":
          $Idioma="2";
          break;
        default:
          $Idioma="1";
      }

      $this->trace("Moneda: " . $moneda . " \nIdioma: " . $Idioma . "\n");

	  //Calcula la firma
	  $MerchantID = MODULE_PAYMENT_CECA_MERCHANTID;
	  $AcquirerBIN = MODULE_PAYMENT_CECA_ACQUIRERBIN;
	  $TerminalID = MODULE_PAYMENT_CECA_TERMINALID;
	  if (file_exists(DIR_FS_CATALOG . '/includes/modules/payment/calculo')) {
	  	$this->trace(DIR_FS_CATALOG . '/includes/modules/payment/calculo' . "  --> Calculo existe" . "\n");
	  } else {
		$this->trace(DIR_FS_CATALOG . '/includes/modules/payment/calculo' . "  --> Calculo NO existe" . "\n");
	  }
	  //$string = DIR_FS_CATALOG . "/includes/modules/payment/calculo " . $this->clave . " " . $MerchantID . " " . $AcquirerBIN . " " . $TerminalID . " " . escapeshellcmd($Num_operacion) . " " . escapeshellcmd($Importe) ." 978 2 ''";
	  $string = $this->clave . $MerchantID .$AcquirerBIN . $TerminalID . escapeshellcmd($Num_operacion) . escapeshellcmd($Importe) ."9782SHA1".tep_href_link(FILENAME_CHECKOUT_PROCESS, 'Num_operacion=' . $Num_operacion, 'SSL').tep_href_link(FILENAME_CHECKOUT_PAYMENT, '', 'SSL');
	  $resultado = sha1($string, false); //exec($string);
	  

	  $this->trace("MerchantID: " . $MerchantID . " \n AcquirerBIN: " . $AcquirerBIN . "\n Terminal: " . $TerminalID . "\n");
	  $this->trace("String: " . $string . " \n Resultado: " . $resultado . "\n");

      $process_button_string = tep_draw_hidden_field('MerchantID', MODULE_PAYMENT_CECA_MERCHANTID) .
                               tep_draw_hidden_field('AcquirerBIN', MODULE_PAYMENT_CECA_ACQUIRERBIN) .
                               tep_draw_hidden_field('TerminalID', MODULE_PAYMENT_CECA_TERMINALID) .
                               tep_draw_hidden_field('Num_operacion', $Num_operacion).
                               tep_draw_hidden_field('Importe', $Importe) .
                               tep_draw_hidden_field('TipoMoneda', $moneda) .
                               tep_draw_hidden_field('Exponente', "2") .
							   tep_draw_hidden_field('Idioma', $Idioma) .
							   tep_draw_hidden_field('Pago_soportado', 'SSL') .
							   tep_draw_hidden_field('Cifrado', 'SHA1') .
   							   tep_draw_hidden_field('Firma', $resultado) .
                               tep_draw_hidden_field('URL_OK', tep_href_link(FILENAME_CHECKOUT_PROCESS, 'Num_operacion=' . $Num_operacion, 'SSL'),false) .
                               tep_draw_hidden_field('URL_NOK', tep_href_link(FILENAME_CHECKOUT_PAYMENT, '', 'SSL'),false) .
							   tep_draw_hidden_field('Descripcion', $Descripcion);
	    $this->trace($process_button_string);
		return $process_button_string;
    }

    function before_process()
    {
      if(MODULE_PAYMENT_CECA_ONLINE_CONF == 'No')
		  return false;
      $Num_operacion=$_GET['Num_operacion'];
      if($Num_operacion=='') $Num_operacion=$_POST['Num_operacion'];
		$this->trace($Num_operacion);
        $sql = "select resultado from ceca_escri2 where Num_operacion='".$Num_operacion."'";
		$this->trace($sql);
        $result_query = tep_db_query($sql);
      	while ($rows = tep_db_fetch_array($result_query)){
       		if ($Num_operacion!="" && $rows['resultado']==0) {
	    	  //The order has been succesfully paid
	      	  return false;
	        }
        }
      	//Payment unsuccesful
      	tep_redirect(tep_href_link(FILENAME_CHECKOUT_PAYMENT, 'error_message=' . urlencode("Hubo un error procesando el pago, por favor, intente de nuevo o contacte con el comercio"), 'SSL', true, false));
      	exit;
    }

    function after_process() {
      return false;
    }

    function output_error() {
      return false;
    }

    function check() {
      if (!isset($this->_check)) {
        $check_query = tep_db_query("select configuration_value from " . TABLE_CONFIGURATION . " where configuration_key = 'MODULE_PAYMENT_CECA_STATUS'");
        $this->_check = tep_db_num_rows($check_query);
      }
      return $this->_check;
    }

    function install() {
      tep_db_query("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, set_function, date_added) values ('¿Habilitar módulo CECA?', 'MODULE_PAYMENT_CECA_STATUS', 'Sí', '¿Desea aceptar pagos con Tarjeta de crédito a través de CECA?', '6', '0', 'tep_cfg_select_option(array(\'Sí\', \'No\'), ', now())");

      tep_db_query("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, set_function, date_added) values ('Entorno CECA', 'MODULE_PAYMENT_CECA_URL_TYPE', 'Real', 'No olvide poner el entorno en \"Real\" para comenzar a vender!!', '6', '1', 'tep_cfg_select_option(array(\'Real\', \'Pruebas\'), ', now())");

      tep_db_query("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, set_function, date_added) values ('¿Habilitar confirmacion del pago on-line?', 'MODULE_PAYMENT_CECA_ONLINE_CONF', 'No', '¿Ha configurado la pasarela en CECA para que notifique los pagos on-line a la url: ".HTTP_CATALOG_SERVER.DIR_WS_CATALOG."ceca_escri2_return.php ?', '6', '2', 'tep_cfg_select_option(array(\'Sí\', \'No\'), ', now())");

      tep_db_query("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('Clave_encriptacion', 'MODULE_PAYMENT_CECA_CLAVE_REAL', '00000001', 'Clave de encriptacion para generar la firma', '6', '3', now())");
      tep_db_query("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('Clave_encriptacion Pruebas', 'MODULE_PAYMENT_CECA_CLAVE_PRUEBAS', '00000002', 'Clave de encriptacion para generar la firma en el entorno de pruebas', '6', '3', now())");

      tep_db_query("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('Merchantid', 'MODULE_PAYMENT_CECA_MERCHANTID', '000000003', 'Este es el código de comercio facilitado por la Caja', '6', '4', now())");
      tep_db_query("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('Acquirerbin','MODULE_PAYMENT_CECA_ACQUIRERBIN', '0000000004', 'Código que identifica a la Caja', '6', '5', now())");
      tep_db_query("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('Terminalid','MODULE_PAYMENT_CECA_TERMINALID', '00000005', 'Código que identifica al terminal', '6', '6', now())");

	  tep_db_query("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('Orden de visualización', 'MODULE_PAYMENT_CECA_SORT_ORDER', '0', 'Orden de visualización, el más bajo se visualiza primero.', '6', '10', now())");

      tep_db_query("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, use_function, set_function, date_added) values ('Zona de pagos', 'MODULE_PAYMENT_CECA_ZONE', '0', 'Si se selecciona una zona, este módulo solo estará disponible para esa zona.', '6', '11', 'tep_get_zone_class_title', 'tep_cfg_pull_down_zone_classes(', now())");

      tep_db_query("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, set_function, use_function, date_added) values ('Estado de los pedidos', 'MODULE_PAYMENT_CECA_ORDER_STATUS_ID', '0', 'Los pedidos pagados por este método, se pondrán a este estado.', '6', '12', 'tep_cfg_pull_down_order_statuses(', 'tep_get_order_status_name', now())");

      $sql="CREATE TABLE ceca_escri2 (".
       "Num_operacion INT NOT NULL AUTO_INCREMENT ,".
       "resultado INT DEFAULT '666',".
       "Num_aut VARCHAR( 64 ) ,".
       "Referencia VARCHAR( 255 ) DEFAULT 'Falta notificacion Pasarela SET/SEP desde CECA',".
       "importe INT DEFAULT '0' NOT NULL,".
       "PRIMARY KEY ( Num_operacion ));";
      $result=tep_db_query($sql);
    }

    function remove() {
      tep_db_query("delete from " . TABLE_CONFIGURATION . " where configuration_key in ('" . implode("', '", $this->keys()) . "')");

      $sql="DROP TABLE IF EXISTS ceca_escri2";
      $result=tep_db_query($sql);
    }

    function keys() {
      return array('MODULE_PAYMENT_CECA_STATUS', 'MODULE_PAYMENT_CECA_URL_TYPE','MODULE_PAYMENT_CECA_ONLINE_CONF', 'MODULE_PAYMENT_CECA_CLAVE_REAL','MODULE_PAYMENT_CECA_CLAVE_PRUEBAS', 'MODULE_PAYMENT_CECA_MERCHANTID','MODULE_PAYMENT_CECA_ACQUIRERBIN','MODULE_PAYMENT_CECA_TERMINALID', 'MODULE_PAYMENT_CECA_SORT_ORDER', 'MODULE_PAYMENT_CECA_ZONE', 'MODULE_PAYMENT_CECA_ORDER_STATUS_ID');
    }

    function answer($MerchantID,
               		$AcquirerBIN,
	                $TerminalID,
	                $Num_operacion,
	                $Importe,
	                $TipoMoneda,
	                $Exponente,
	                $Referencia,
	                $Firma,
	                $Num_aut){

        //Chequeamos firma
	    $string = DIR_FS_CATALOG . "/includes/modules/payment/calculo " . $this->clave . " " . escapeshellcmd($MerchantID) . " " . escapeshellcmd($AcquirerBIN) . " " . escapeshellcmd($TerminalID) . " " . escapeshellcmd($Num_operacion) . " " . escapeshellcmd($Importe) ." ".escapeshellcmd($TipoMoneda)." ".escapeshellcmd($Exponente)." ".escapeshellcmd($Referencia);
		$this->trace($Firma."  !=  ".exec($string));
		$this->trace("Desde: ".$_SERVER['REMOTE_ADDR']." pide:".$_SERVER['REQUEST_URI']);
		foreach($_POST as $nombre_campo => $valor){
			$this->trace($nombre_campo . "='" . $valor . "';");
		}
	  if($Firma!=exec($string)){
        $result=-123456;
        $deserror="Firma no válida, procedencia del mensaje no verificada";
      }else{
		$result=0;
		echo '<HTML><HEAD><TITLE>Respuesta correcta a la comunicación ON-LINE</TITLE></HEAD><BODY>$*$OKY$*$</BODY></HTML>';
	  }
      $data=array(
        "resultado"=>$result,
        "Num_aut"=>$Num_aut,
        "Referencia"=>$Referencia
        );
      tep_db_perform("ceca_escri2", $data,'update',"Num_operacion='".$Num_operacion."'");
    }
  }
?>