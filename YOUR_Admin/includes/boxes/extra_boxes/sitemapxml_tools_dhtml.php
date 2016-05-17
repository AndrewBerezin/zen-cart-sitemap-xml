<?php
/**
 * Sitemap XML Feed
 *
 * @package Sitemap XML Feed
 * @copyright Copyright 2005-2013 Andrew Berezin eCommerce-Service.com
 * @copyright Copyright 2003-2013 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @link http://www.sitemaps.org/
 * @version $Id: sitemapxml.php, v 3.2.2 07.05.2012 19:12 AndrewBerezin $
 */

/////////////////////////////////////////
// NOT USED IN Zen Cart v1.5 - see install-sitemapxml_only_for_zen-cart-1_5_0.sql
/////////////////////////////////////////

if (!defined('IS_ADMIN_FLAG')) {
  die('Illegal Access');
}

$za_contents[] = array('text' => BOX_SITEMAPXML, 'link' => zen_href_link(FILENAME_SITEMAPXML, '', 'NONSSL'));

// EOF