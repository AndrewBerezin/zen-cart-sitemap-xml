<?php
/**
 * SitemapXML Installation
 *
 * @notes 	Andrew - change the stuff down here as you like
 *
 * @package     SitemapXML
 * @author      Frank Riegel <office@isonetwork.net.au> aka frank18
 * @copyright   Copyright 2016 iSO Network [www.isonetwork.net.au]
 * @copyright   Portions Copyright 2003-2006 Zen Cart Development Team
 * @copyright   Portions Copyright 2003 osCommerce
 * @license     http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version     $Id: 3_6_1.php 169 2016-05-20 08:01:18Z frank18 $
 */

// use $configuration_group_id where needed
$zc150 = (PROJECT_VERSION_MAJOR > 1 || (PROJECT_VERSION_MAJOR == 1 && substr(PROJECT_VERSION_MINOR, 0, 3) >= 5));
if ($zc150) { // continue Zen Cart 1.5.0
  $admin_page = 'sitemapxml';
  // delete configuration menu
  $db->Execute("DELETE FROM " . TABLE_ADMIN_PAGES . " WHERE page_key = '".$admin_page."' LIMIT 1;");
}

// add tools menu for Sitemap XML
$admin_page = 'sitemapxml';
if (!zen_page_key_exists($admin_page)) {
  if ((int)$configuration_group_id > 0) {
    zen_register_admin_page($admin_page,
                            'BOX_SITEMAPXML',
                            'FILENAME_SITEMAPXML',
                            '',
                            'tools',
                            'Y',
                            $configuration_group_id);
    $messageStack->add('Successfully enabled Sitemap XML Tool Menu.', 'success');
  }
}
