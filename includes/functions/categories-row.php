<?php
/*
  $Id: categories-row.php,v 1.25 2007/08/03 09:13:00 hpdl Exp $

  Chili Pepper Consulting; chilico.com; Karen Piotrowski
  for osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2003 osCommerce

  Released under the GNU General Public License
*/

  function tep_show_category_row($counter) {

    global $tree, $categories_string, $cPath_array;

    $cPath_new = 'cPath=' . $counter;

    $categories_string .= '<span class="headerCategoriesItems">';

    $categories_string .= '<a href="' . tep_href_link(FILENAME_DEFAULT, $cPath_new) . '">';

    $categories_string .= $tree[$counter]['name'];

    $categories_string .= '</a>';

    if (SHOW_COUNTS == 'false') {
      $products_in_category = tep_count_products_in_category($counter);
      if ($products_in_category > 0) {
        $categories_string .= ' (' . $products_in_category . ')';
      }
    }

    $categories_string .= '</span>';

    if ($tree[$counter]['next_id'] != false) {
      tep_show_category_row($tree[$counter]['next_id']);
    }
		
  }
?>

<!-- categories //-->
<?php

  $categories_string = '';
  $tree = array();

  $categories_query = tep_db_query("select c.categories_id, cd.categories_name, c.parent_id from " . TABLE_CATEGORIES . " c, " . TABLE_CATEGORIES_DESCRIPTION . " cd where c.parent_id = '0' and c.categories_id = cd.categories_id and cd.language_id='" . (int)$languages_id ."' order by sort_order, cd.categories_name");
  while ($categories = tep_db_fetch_array($categories_query))  {
    $tree[$categories['categories_id']] = array('name' => $categories['categories_name'],
                                                'parent' => $categories['parent_id'],
                                                'level' => 0,
                                                'path' => $categories['categories_id'],
                                                'next_id' => false);

    if (isset($parent_id)) {
      $tree[$parent_id]['next_id'] = $categories['categories_id'];
    }

    $parent_id = $categories['categories_id'];

    if (!isset($first_element)) {
      $first_element = $categories['categories_id'];
    }
  }

  tep_show_category_row($first_element); 

  echo $categories_string;

?>
<!-- categories_eof //-->
