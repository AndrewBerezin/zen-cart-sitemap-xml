<?php
/**
 * SitemapXML Installation
 * @package     SitemapXML
 * @copyright Copyright 2005-2016 Andrew Berezin eCommerce-Service.com
 * @copyright   Copyright 2016 iSO Network [www.isonetwork.net.au]
 * @copyright   Portions Copyright 2003-2016 Zen Cart Development Team
 * @copyright   Portions Copyright 2003 osCommerce
 * @license     http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version     $Id: 3_9_3.php 3.9.3 09.11.2016 13:37:18 AndrewBerezin $
 */

if ($current_version != $installer) {
  $ext_modules = new ext_modules;
  $ext_modules->install_configuration_group('SITEMAPXML_', 'BOX_CONFIGURATION_SITEMAPXML', 'SitemapXML', 'sitemapxmlConfig');
  $ext_modules->install_configuration($install_configuration);
}