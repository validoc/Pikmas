<?php
function select_and_fill ($types) {

    $the_sql = "SELECT pd.products_id, pd.products_name from " . TABLE_PRODUCTS_DESCRIPTION . " pd
        WHERE pd.products_id IN ( SELECT products_id FROM products_selected WHERE products_selected.type = '$types')
        AND pd.language_id = 3";

    $the_query = tep_db_query($the_sql);
    ?>

<span style="padding: 20px;float: left;">
    <h4><?php echo $types ?></h4>
    <select multiple="true" style="height: 200px; width: 150px">
            <?php
            while ($the_record = tep_db_fetch_array($the_query)) {
                $the_result .= "<option value='".$the_record["products_id"]."'>".$the_record["products_name"]."</option>";
            }
            echo $the_result;
            ?>
    </select>
</span>

    <?php
}

if(isset($_POST["action"])) {
    require('includes/application_top.php');
    $the_action = $_POST["action"];
    if($the_action == 'create') {
        if(isset($_POST["section"])) {
            $section = $_POST["section"];
            if($_POST["section"] == '42') {
                $section = 'consolas';
            } elseif($_POST["section"] == '29') {
                $section = 'seminuevos';
            }
            if(isset($_POST["product_id"])) {
                $product_id = $_POST["product_id"];
                $the_sql = "INSERT INTO products_selected
                            (id ,type ,products_id ,position)
                            VALUES (NULL , '$section', '$product_id', '1');";
                $the_result = tep_db_query($the_sql);
                if($the_result) {
                    echo 'Añadido con exito';
                } else {
                    echo "No se pudo añadir a la BD";
                }

            } else {
                echo "Debe de seleccionar un producto";
            }
        } else {
            echo "Debe de seleccionar una categoria";
        }
    } elseif ($the_action == 'destroy') {
        $the_id = $_POST['id'];
        $the_sql = "DELETE FROM products_selected WHERE products_selected.products_id = '$the_id'";
        $the_query = tep_db_query($the_sql);
    } elseif($the_action == 'update') {
        echo select_and_fill('top');
        echo select_and_fill('consolas');
        echo select_and_fill('seminuevos');
        echo select_and_fill('rebajas');
    }
} elseif(isset($_POST["section"])) {
    require('includes/application_top.php');
    $the_action = $_POST["section"];
    if($the_action == 'top') {
        $the_query = tep_db_query("select distinct p.products_id, p.products_price, p.products_tax_class_id, p.products_image, p.products_model, pd.products_name from " . TABLE_PRODUCTS . " p, " . TABLE_PRODUCTS_DESCRIPTION . " pd where p.products_status = '1' and p.products_ordered > 0 and p.products_id = pd.products_id and pd.language_id = '" . (int)$languages_id . "' order by p.products_ordered desc, pd.products_name");
    } elseif($the_action == '29') {
        $the_query = tep_db_query("select distinct p.products_id, p.products_model, p.products_image, p.products_tax_class_id, pd.products_name, if(s.status, s.specials_new_products_price, p.products_price) as products_price, c.categories_image AS category_image FROM " . TABLE_PRODUCTS . " p LEFT JOIN " . TABLE_SPECIALS . " s on p.products_id = s.products_id, " . TABLE_PRODUCTS_DESCRIPTION . " pd, " . TABLE_PRODUCTS_TO_CATEGORIES . " p2c, " . TABLE_CATEGORIES . " c where p.products_id = p2c.products_id and p2c.categories_id = c.categories_id and c.categories_id = '29' and p.products_status = '1' and p.products_id = pd.products_id and pd.language_id = '" . (int)$languages_id . "' order by p.products_date_added desc");
    } elseif($the_action == '42') {
        $the_query = tep_db_query("SELECT distinct p.products_id,
                                    p.products_model, p.products_image,
                                    p.products_tax_class_id, pd.products_name,
                                    if(s.status, s.specials_new_products_price, p.products_price) as products_price,
                                    c.categories_id AS category_id , c.categories_image AS category_image
                                    FROM " . TABLE_PRODUCTS . " p
                                    LEFT JOIN " . TABLE_SPECIALS . " s ON p.products_id = s.products_id, " . TABLE_PRODUCTS_DESCRIPTION . " pd, " . TABLE_PRODUCTS_TO_CATEGORIES . " p2c, " . TABLE_CATEGORIES . " c
                                    WHERE p.products_id = p2c.products_id and p2c.categories_id = c.categories_id
                                    AND c.categories_id = '42' and p.products_status = '1' AND p.products_id = pd.products_id
                                    AND pd.language_id = '" . (int)$languages_id . "'
                                    ORDER by p.products_date_added desc");

    } elseif($the_action == 'rebajas') {
        $the_sql = "select p.products_id, pd.products_name, p.products_price, p.products_tax_class_id, p.products_model, p.products_image, s.specials_new_products_price from " . TABLE_PRODUCTS . " p, " . TABLE_PRODUCTS_DESCRIPTION . " pd, " . TABLE_SPECIALS . " s where p.products_status = '1' and p.products_id = s.products_id and pd.products_id = s.products_id and pd.language_id = '" . (int)$languages_id . "' and s.status = '1' order by s.specials_date_added desc";
        $the_query = tep_db_query($the_sql);
    }
    $the_result = "<select name='product_id'>";
    while ($the_record = tep_db_fetch_array($the_query)) {
        $the_result .= "<option value='".$the_record["products_id"]."'>".$the_record["products_name"]."</option>";
    }
    $the_result .= "</select>";
    echo $the_result;
} else {
    ?>
<form action="login.php#" method="post" id="data-category">
    <h4>ACA ELEGIS LOS PRODUCTOS QUE VAS  A MOSTRAR EN CADA PANEL:</h4>
    <select name="section" id="section-cat">
        <option value="0">Seleccione ...</option>
        <option value="top">Top ventas</option>
        <option value="42">Consolas</option>
        <option value="29">Seminuevos</option>
        <option value="rebajas">Rebajas</option>
    </select>
    <span id="products-cart">
    </span>
    <input type="submit" value="Adicionar" />
    <br style="clear: both;" />
    <div id="select-combos">
            <?php
            select_and_fill('top');
            select_and_fill('consolas');
            select_and_fill('seminuevos');
            select_and_fill('rebajas');
            ?>
    </div>
    <br style="clear: both;" />
    <span id="the_result">
    </span>
    <input type="submit" value="eliminar seleccionados" id="btn-borrar">
</form>

<script type="text/javascript" src="js/jquery-1.2.6.pack.js"></script>
<script type="text/javascript">
    jQuery('document').ready(function (){
        jQuery.ajaxSetup({cache:false});
        jQuery('#section-cat').change(function() {
            jQuery.post('<?php echo DIR_PIKMAS . '_categories.php' ?>',
            jQuery('#data-category').serializeArray(),
            function(data){
                jQuery('#products-cart').html(data);
            });
            return false;
        });
        jQuery('#data-category').submit(function (){
            jQuery('#data-category').append('<input value="create" name="action" type="hidden" id="creator-id" />');
            jQuery.post('<?php echo DIR_PIKMAS . '_categories.php?' ?>' + Math.random(),
            jQuery('#data-category').serializeArray(),
            function(data){
                jQuery('#the_result').html(data);
            });
            jQuery.post('<?php echo DIR_PIKMAS . '_categories.php?'?>' + Math.random(),{'action':"update"}, function(data){
                jQuery('#select-combos').html(data);
            });
            jQuery('#creator-id').remove();
            return false;
        });
        jQuery('#btn-borrar').click(function(){
            jQuery('#select-combos select option:selected').each(function(){
                jQuery.post('<?php echo DIR_PIKMAS . '_categories.php?' ?>' + Math.random(),{"id" : jQuery(this).val(), 'action':"destroy"});
            });
            jQuery.post('<?php echo DIR_PIKMAS . '_categories.php?' ?>' + Math.random(),{'action':"update"}, function(data){
                jQuery('#select-combos').html(data);
            });
            return false;
        });
    });

</script>
    <?php } ?>