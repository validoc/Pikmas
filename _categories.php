<?php
function select_and_fill ($types) {
    $the_query = tep_db_query("select distinct p.products_id, p.products_price, p.products_tax_class_id, p.products_image, p.products_model, pd.products_name from " . TABLE_PRODUCTS . " p, " . TABLE_PRODUCTS_DESCRIPTION . " pd where p.products_status = '1' and p.products_ordered > 0
        and p.products_id IN ( SELECT products_id FROM products_selected WHERE products_selected.type = '$types')
        and pd.language_id = '" . (int)$languages_id . "' order by p.products_ordered desc, pd.products_name");
    ?>
    <select multiple="true" style="margin:20px;height: 200px;">
        <?php
        while ($the_record = tep_db_fetch_array($the_query)) {
            $the_result .= "<option value='".$the_record["products_id"]."'>".$the_record["products_name"]."</option>";
        }
        echo $the_result;
        ?>
    </select>
    <?php
}

if(isset($_POST["action"])) {
    require('includes/application_top.php');
    $the_
    $the_sql = "INSERT INTO freelance_pikmas.products_selected (id ,type ,products_id ,position) VALUES (NULL , 'trucho', '1', '1');";
    $the_result = tep_db_query($the_sql);
    echo tep_db_result($the_result);
    
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
    <br/>
    <?php
    select_and_fill('top');
    select_and_fill('consolas');
    select_and_fill('seminuevos');
    select_and_fill('rebajas');
    ?>
</form>
<script type="text/javascript" src="js/jquery-1.2.6.pack.js"></script>
<script type="text/javascript">
    jQuery('document').ready(function (){
        jQuery('select').change(function() {
            jQuery.post('<?php echo DIR_PIKMAS . '_categories.php' ?>',
            jQuery('#data-category').serializeArray(),
            function(data){
                jQuery('#products-cart').html(data);
            });
            return false;
        });
        jQuery('#data-category').submit(function (){
            jQuery('#data-category').append('<input value="create" name="action" type="hidden" />');
            jQuery.post('<?php echo DIR_PIKMAS . '_categories.php' ?>',
            jQuery('#data-category').serializeArray(),
            function(data){
                jQuery('#products-cart').html(data);
            });
            return false;
        });
    });
</script>
<?php } ?>