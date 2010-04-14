<?php
if(!isset($HTTP_GET_VARS['products_model']) && !isset($HTTP_GET_VARS['cPath']) && !isset($HTTP_GET_VARS['products_id'])&& !isset($HTTP_GET_VARS['category'])){
require(DIR_WS_BOXES . 'best_sellers.php');
}
require(DIR_WS_BOXES . 'seminuevos.php');
?>