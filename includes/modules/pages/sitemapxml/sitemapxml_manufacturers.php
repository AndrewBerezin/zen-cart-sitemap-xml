<?php
/**
 * Sitemap XML
 *
 * @package Sitemap XML
 * @copyright Copyright 2005-2012 Andrew Berezin eCommerce-Service.com
 * @copyright Copyright 2003-2012 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: sitemapxml_manufacturers.php, v 3.2.2 07.05.2012 19:12 AndrewBerezin $
 */

echo '<h3>' . TEXT_HEAD_MANUFACTURERS . '</h3>';
$last_date = $db->Execute("SELECT MAX(GREATEST(IFNULL(m.date_added, '0001-01-01 00:00:00'), IFNULL(m.last_modified, '0001-01-01 00:00:00'))) AS last_date
                           FROM " . TABLE_MANUFACTURERS . " m");
$table_status = $db->Execute("SHOW TABLE STATUS LIKE '" . TABLE_MANUFACTURERS . "'");
$last_date = max($table_status->fields['Update_time'], $last_date->fields['last_date']);
$select = '';
$xtra = '';
if ($sitemapXML->SitemapOpen('manufacturers', $last_date)) {
  if (SITEMAPXML_MANUFACTURERS_IMAGES == 'true') {
    $select = ", m.manufacturers_image, m.manufacturers_name";
  }
  $manufacturers = $db->Execute("SELECT m.manufacturers_id, GREATEST(m.date_added, IFNULL(m.last_modified, '0001-01-01 00:00:00')) AS last_date, mi.languages_id" . $select . "
                                 FROM " . TABLE_MANUFACTURERS . " m
                                   LEFT JOIN " . TABLE_MANUFACTURERS_INFO . " mi ON (mi.manufacturers_id = m.manufacturers_id)
                                 WHERE mi.languages_id IN (" . $sitemapXML->getLanguagesIDs() . ") " .
                                 (SITEMAPXML_MANUFACTURERS_ORDERBY != '' ? "ORDER BY " . SITEMAPXML_MANUFACTURERS_ORDERBY : ''));
  $sitemapXML->SitemapSetMaxItems($manufacturers->RecordCount());
  while (!$manufacturers->EOF) {
    if (SITEMAPXML_MANUFACTURERS_IMAGES == 'true' && zen_not_null($manufacturers->fields['manufacturers_image']) && is_file(DIR_FS_CATALOG . DIR_WS_IMAGES . $manufacturers->fields['manufacturers_image'])) {
      $images = array(
                      array(
                           'file' => DIR_WS_IMAGES . $manufacturers->fields['manufacturers_image'],
                           'title' => $manufacturers->fields['manufacturers_name'],
                           ),
                     );
      $xtra = $sitemapXML->imagesTags($images, SITEMAPXML_MANUFACTURERS_IMAGES_CAPTION, SITEMAPXML_MANUFACTURERS_IMAGES_LICENSE);
    } else {
      $xtra = '';
    }
    $sitemapXML->writeItem(FILENAME_DEFAULT, 'manufacturers_id=' . $manufacturers->fields['manufacturers_id'], $manufacturers->fields['languages_id'], $manufacturers->fields['last_date'], SITEMAPXML_MANUFACTURERS_CHANGEFREQ, $xtra);
    $manufacturers->MoveNext();
  }
  $sitemapXML->SitemapClose();
  unset($manufacturers);
}

// EOF