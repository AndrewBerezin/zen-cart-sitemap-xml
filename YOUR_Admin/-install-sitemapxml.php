<?php
/**
 * @package
 * @copyright Copyright 2004-2015 Andrew Berezin eCommerce-Service.com
 * @copyright Copyright 2003-2015 Zen Cart Development Team
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: -install-sitemapxml.php 1.0 19.10.2015 4:36:16 AndrewBerezin $
 */

require('includes/application_top.php');

if (defined('TABLE_ADMIN_PAGES')) {
//  zen_deregister_admin_pages('sitemapxml');
  if (!zen_page_key_exists('sitemapxml')) {
    zen_register_admin_page('sitemapxml', // page_key
                            'BOX_SITEMAPXML', // language_key
                            'FILENAME_SITEMAPXML', // main_page
                            '', // page_params
                            'tools', // menu_key
                            'Y', // display_on_menu
                            100); // sort_order
  }
}
