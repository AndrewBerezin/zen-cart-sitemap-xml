<?php
/**
 * SitemapXML Installation
 * @package     SitemapXML
 * @copyright Copyright 2005-2017 Andrew Berezin eCommerce-Service.com
 * @copyright   Copyright 2017 iSO Network [www.isonetwork.net.au]
 * @copyright   Portions Copyright 2003-2017 Zen Cart Development Team
 * @copyright   Portions Copyright 2003 osCommerce
 * @license     http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version     $Id: 3_9_4.php 3.9.4 17.04.2017 14:27:59 AndrewBerezin $
 */

if ($current_version != $installer) {
  $ext_modules = new ext_modules;
  $ext_modules->install_configuration_group('SITEMAPXML_', 'BOX_CONFIGURATION_SITEMAPXML', 'SitemapXML', 'sitemapxmlConfig');
  $ext_modules->install_configuration($install_configuration);
}
if (defined('TABLE_ADMIN_PAGES')) {
  $admin_page = 'sitemapxml';
  $sql = "SELECT * FROM " . TABLE_ADMIN_PAGES . " WHERE page_key=:pageKey:";
  $sql = $db->bindVars($sql, ':pageKey:', $admin_page, 'string');
  $check = $db->Execute($sql);
  if (substr($check->fields['page_params'], 0, 4) == 'gID=') {
    $sql = "UPDATE " . TABLE_ADMIN_PAGES . " SET page_params='' WHERE page_key=:pageKey:";
    $sql = $db->bindVars($sql, ':pageKey:', $admin_page, 'string');
    $db->Execute($sql);
  }
}