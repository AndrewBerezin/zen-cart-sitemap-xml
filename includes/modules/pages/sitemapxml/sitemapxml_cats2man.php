<?php
/**
 * Sitemap XML
 *
 * @package Sitemap XML
 * @copyright Copyright 2005-2015 Andrew Berezin eCommerce-Service.com
 * @copyright Copyright 2003-2015 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @link hideCategories http://www.zen-cart.com/downloads.php?do=file&id=254
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: sitemapxml_cats2man.php v 1.1 27.03.2015 17:07:46 AndrewBerezin $
 */

echo '<h3>' . TEXT_HEAD_CATS2MAN . '</h3>';
// BOF hideCategories
if ($sitemapXML->dbTableExist('TABLE_HIDE_CATEGORIES')) {
  $from = " LEFT JOIN " . TABLE_HIDE_CATEGORIES . " h ON (c.categories_id = h.categories_id)";
  $where = " AND (h.visibility_status < 2 OR h.visibility_status IS NULL)";
} else {
  $from = '';
  $where = '';
}
// EOF hideCategories
$last_date = $db->Execute("SELECT MAX(GREATEST(IFNULL(c.date_added, '0001-01-01 00:00:00'), IFNULL(c.last_modified, '0001-01-01 00:00:00'))) AS last_date
                           FROM " . TABLE_CATEGORIES . " c
                           WHERE c.categories_status = 1");
$table_status = $db->Execute("SHOW TABLE STATUS LIKE '" . TABLE_CATEGORIES . "'");
$last_date = max($table_status->fields['Update_time'], $last_date->fields['last_date']);
$select = '';
$xtra = '';
if ($sitemapXML->SitemapOpen('cats2man', $last_date)) {
  $categories = $db->Execute("SELECT c.categories_id, GREATEST(c.date_added, IFNULL(c.last_modified, '0001-01-01 00:00:00')) AS last_date, c.sort_order AS priority, cd.language_id" . $select . "
                              FROM " . TABLE_CATEGORIES . " c
                                LEFT JOIN " . TABLE_CATEGORIES_DESCRIPTION . " cd ON (cd.categories_id = c.categories_id)" . $from . "
                              WHERE c.categories_status = 1" . $where . "
                                AND cd.language_id IN (" . $sitemapXML->getLanguagesIDs() . ") " .
                              (SITEMAPXML_CATEGORIES_ORDERBY != '' ? "ORDER BY " . SITEMAPXML_CATEGORIES_ORDERBY : ''));
  $sitemapXML->SitemapSetMaxItems($categories->RecordCount());
  while (!$categories->EOF) {
    $subcategories_array = array($categories->fields['categories_id']);
// BOF products_in_subcategories
    if (defined('SHOW_NESTED_AS_PRODUCTS') && SHOW_NESTED_AS_PRODUCTS == 'True') {
      zen_get_subcategories($subcategories_array, (int)$categories->fields['categories_id']);
    }
// EOF products_in_subcategories
    $sql = "SELECT COUNT(*) AS total
            FROM " . TABLE_PRODUCTS . " p
              LEFT JOIN " . TABLE_PRODUCTS_TO_CATEGORIES . " p2c ON (p.products_id = p2c.products_id)
            WHERE p.products_status = 1
              AND p2c.categories_id IN (" . implode(',', $subcategories_array) . ")";
    $products = $db->Execute($sql);
    if (SKIP_SINGLE_PRODUCT_CATEGORIES != 'True' && $products->fields['total'] == 1) {
      $products->fields['total'] = 2;
    }
    if ($products->fields['total'] > 1) {
      $cat_path = $sitemapXML->GetFullcPath($categories->fields['categories_id']);
    //echo '<pre>';var_dump($categories->fields);echo '</pre>';
      $sql = "SELECT DISTINCT m.manufacturers_id
              FROM " . TABLE_PRODUCTS . " p,
                   " . TABLE_PRODUCTS_TO_CATEGORIES . " p2c,
                   " . TABLE_MANUFACTURERS . " m
              WHERE p.products_status = 1
                AND p.manufacturers_id = m.manufacturers_id
                AND p.products_id = p2c.products_id
                AND p2c.categories_id in (" . implode(',', $subcategories_array) . ")";
    //echo '<pre>';var_dump($sql);echo '</pre>';
      $manufacturers = $db->Execute($sql);
      while (!$manufacturers->EOF) {
        //echo '<pre>';var_dump($manufacturers->fields);echo '</pre>';
        $sitemapXML->writeItem(FILENAME_DEFAULT, 'cPath=' . $cat_path . '&filter_id=' . $manufacturers->fields['manufacturers_id'], $categories->fields['language_id'], $categories->fields['last_date'], SITEMAPXML_CATEGORIES_CHANGEFREQ, '');
        $sql = "SELECT COUNT(*) AS total
                FROM " . TABLE_PRODUCTS . " p
                  LEFT JOIN " . TABLE_PRODUCTS_TO_CATEGORIES . " p2c ON (p.products_id = p2c.products_id)
                WHERE p.products_status = 1
                  AND p.manufacturers_id = " . (int)$manufacturers->fields['manufacturers_id'] . "
                  AND p2c.categories_id IN (" . implode(',', $subcategories_array) . ")";
        $products = $db->Execute($sql);
        $total_pages = ceil($products->fields['total']/MAX_DISPLAY_PRODUCTS_LISTING);
        for ($ind_page=2; $ind_page <= $total_pages; $ind_page++) {
  //        echo '<pre>';var_dump($ind_page);echo '</pre>';
          $sitemapXML->writeItem(FILENAME_DEFAULT, 'cPath=' . $cat_path . '&filter_id=' . $manufacturers->fields['manufacturers_id'] . '&page=' . $ind_page, $categories->fields['language_id'], $categories->fields['last_date'], SITEMAPXML_CATEGORIES_CHANGEFREQ);
        }
        $manufacturers->MoveNext();
      }
      unset($manufacturers);
    }
    $categories->MoveNext();
  }
  $sitemapXML->SitemapClose();
}
unset($categories);

// EOF