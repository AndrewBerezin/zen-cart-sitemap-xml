<?php
/**
 * Sitemap XML Feed
 *
 * @package Sitemap XML Feed
 * @copyright Copyright 2005-2017 Andrew Berezin eCommerce-Service.com
 * @copyright Copyright 2003-2017 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @link http://www.sitemaps.org/
 * @version $Id: sitemapxml_install.php, v 3.9.3 19.02.2017 18:11:03 AndrewBerezin $
 */

//$current_version = '3.9.3';
require_once(DIR_FS_ADMIN . DIR_WS_LANGUAGES . $_SESSION['language'] . '/sitemapxml.php');

if (defined('SITEMAPXML_VERSION')) {
  $default['SITEMAPXML_SITEMAPINDEX'] = 'sitemapindex';
  $default['SITEMAPXML_DIR_WS'] = '';
} else {
  $default['SITEMAPXML_SITEMAPINDEX'] = 'sitemap';
  $default['SITEMAPXML_DIR_WS'] = 'sitemap';
}
if (defined('SITEMAPXML_CHECK_DUBLICATES')) {
  $sql = "UPDATE " . TABLE_CONFIGURATION . " SET configuration_key='SITEMAPXML_CHECK_DUPLICATES' where configuration_key='SITEMAPXML_CHECK_DUBLICATES'";
  $db->Execute($sql);
}

$install_configuration = array(
'SITEMAPXML_VERSION' => array(CFGTITLE_SITEMAPXML_VERSION, $current_version, CFGDESC_SITEMAPXML_VERSION, -10, null, 'zen_cfg_read_only('),

'SITEMAPXML_SITEMAPINDEX' => array(CFGTITLE_SITEMAPXML_SITEMAPINDEX, $default['SITEMAPXML_SITEMAPINDEX'], CFGDESC_SITEMAPXML_SITEMAPINDEX, 1, null, null),

'SITEMAPXML_DIR_WS' => array(CFGTITLE_SITEMAPXML_DIR_WS, $default['SITEMAPXML_DIR_WS'], CFGDESC_SITEMAPXML_DIR_WS, 1, null, null),

'SITEMAPXML_COMPRESS' => array(CFGTITLE_SITEMAPXML_COMPRESS, 'false', CFGDESC_SITEMAPXML_COMPRESS, 2, null, 'zen_cfg_select_option(array(\'true\', \'false\'),'),

'SITEMAPXML_LASTMOD_FORMAT' => array(CFGTITLE_SITEMAPXML_LASTMOD_FORMAT, 'date', CFGDESC_SITEMAPXML_LASTMOD_FORMAT, 3, null, 'zen_cfg_select_option(array(\'date\', \'full\'),'),

'SITEMAPXML_EXECUTION_TOKEN' => array(CFGTITLE_SITEMAPXML_EXECUTION_TOKEN, '', CFGDESC_SITEMAPXML_EXECUTION_TOKEN, 3, null, null),

'SITEMAPXML_USE_EXISTING_FILES' => array(CFGTITLE_SITEMAPXML_USE_EXISTING_FILES, 'true', CFGDESC_SITEMAPXML_USE_EXISTING_FILES, 4, null, 'zen_cfg_select_option(array(\'true\', \'false\'),'),

'SITEMAPXML_USE_ONLY_DEFAULT_LANGUAGE' => array(CFGTITLE_SITEMAPXML_USE_ONLY_DEFAULT_LANGUAGE, 'false', CFGDESC_SITEMAPXML_USE_ONLY_DEFAULT_LANGUAGE, 5, null, 'zen_cfg_select_option(array(\'true\', \'false\'),'),

//'SITEMAPXML_USE_DEFAULT_LANGUAGE' => array(CFGTITLE_SITEMAPXML_USE_DEFAULT_LANGUAGE, 'false', CFGDESC_SITEMAPXML_USE_DEFAULT_LANGUAGE, 6, null, 'zen_cfg_select_option(array(\'true\', \'false\'),'),

'SITEMAPXML_USE_LANGUAGE_PARM' => array(CFGTITLE_SITEMAPXML_USE_LANGUAGE_PARM, 'true', CFGDESC_SITEMAPXML_USE_LANGUAGE_PARM, 6, null, 'zen_cfg_select_option(array(\'true\', \'all\', \'false\'),'),

'SITEMAPXML_CHECK_DUPLICATES' => array(CFGTITLE_SITEMAPXML_CHECK_DUPLICATES, 'true', CFGDESC_SITEMAPXML_CHECK_DUPLICATES, 7, null, 'zen_cfg_select_option(array(\'true\', \'mysql\', \'false\'),'),

'SITEMAPXML_PING_URLS' => array(CFGTITLE_SITEMAPXML_PING_URLS,
'Google => http://www.google.com/webmasters/sitemaps/ping?sitemap=%s;
Bing => http://www.bing.com/webmaster/ping.aspx?siteMap=%s', CFGDESC_SITEMAPXML_PING_URLS, 10, null, 'zen_cfg_textarea('),

'SITEMAPXML_PLUGINS' => array(CFGTITLE_SITEMAPXML_PLUGINS, 'sitemapxml_categories.php;sitemapxml_mainpage.php;sitemapxml_manufacturers.php;sitemapxml_products.php;sitemapxml_products_reviews.php;sitemapxml_testimonials.php', CFGDESC_SITEMAPXML_PLUGINS, 15, null, 'zen_cfg_read_only('),

'SITEMAPXML_HOMEPAGE_ORDERBY' => array(CFGTITLE_SITEMAPXML_HOMEPAGE_ORDERBY, 'sort_order ASC', CFGDESC_SITEMAPXML_HOMEPAGE_ORDERBY, 20, null, null),
'SITEMAPXML_HOMEPAGE_CHANGEFREQ' => array(CFGTITLE_SITEMAPXML_HOMEPAGE_CHANGEFREQ, 'weekly', CFGDESC_SITEMAPXML_HOMEPAGE_CHANGEFREQ, 21, null, 'zen_cfg_select_option(array(\'no\', \'always\', \'hourly\', \'daily\', \'weekly\', \'monthly\', \'yearly\', \'never\'),'),

'SITEMAPXML_PRODUCTS_ORDERBY' => array(CFGTITLE_SITEMAPXML_PRODUCTS_ORDERBY, 'products_sort_order ASC, last_date DESC', CFGDESC_SITEMAPXML_PRODUCTS_ORDERBY, 30, null, null),
'SITEMAPXML_PRODUCTS_CHANGEFREQ' => array(CFGTITLE_SITEMAPXML_PRODUCTS_CHANGEFREQ, 'weekly', CFGDESC_SITEMAPXML_PRODUCTS_CHANGEFREQ, 31, null, 'zen_cfg_select_option(array(\'no\', \'always\', \'hourly\', \'daily\', \'weekly\', \'monthly\', \'yearly\', \'never\'),'),
'SITEMAPXML_PRODUCTS_USE_CPATH' => array(CFGTITLE_SITEMAPXML_PRODUCTS_USE_CPATH, 'false', CFGDESC_SITEMAPXML_PRODUCTS_USE_CPATH, 32, null, 'zen_cfg_select_option(array(\'true\', \'false\'),'),
'SITEMAPXML_PRODUCTS_IMAGES' => array(CFGTITLE_SITEMAPXML_PRODUCTS_IMAGES, 'false', CFGDESC_SITEMAPXML_PRODUCTS_IMAGES, 35, null, 'zen_cfg_select_option(array(\'true\', \'false\'),'),
'SITEMAPXML_PRODUCTS_IMAGES_CAPTION' => array(CFGTITLE_SITEMAPXML_PRODUCTS_IMAGES_CAPTION, 'false', CFGDESC_SITEMAPXML_PRODUCTS_IMAGES_CAPTION, 36, null, 'zen_cfg_select_option(array(\'true\', \'false\'),'),
'SITEMAPXML_PRODUCTS_IMAGES_LICENSE' => array(CFGTITLE_SITEMAPXML_PRODUCTS_IMAGES_LICENSE, '', CFGDESC_SITEMAPXML_PRODUCTS_IMAGES_LICENSE, 37, null, null),

'SITEMAPXML_CATEGORIES_ORDERBY' => array(CFGTITLE_SITEMAPXML_CATEGORIES_ORDERBY, 'sort_order ASC, last_date DESC', CFGDESC_SITEMAPXML_CATEGORIES_ORDERBY, 40, null, null),
'SITEMAPXML_CATEGORIES_CHANGEFREQ' => array(CFGTITLE_SITEMAPXML_CATEGORIES_CHANGEFREQ, 'weekly', CFGDESC_SITEMAPXML_CATEGORIES_CHANGEFREQ, 41, null, 'zen_cfg_select_option(array(\'no\', \'always\', \'hourly\', \'daily\', \'weekly\', \'monthly\', \'yearly\', \'never\'),'),
'SITEMAPXML_CATEGORIES_IMAGES' => array(CFGTITLE_SITEMAPXML_CATEGORIES_IMAGES, 'false', CFGDESC_SITEMAPXML_CATEGORIES_IMAGES, 42, null, 'zen_cfg_select_option(array(\'true\', \'false\'),'),
'SITEMAPXML_CATEGORIES_IMAGES_CAPTION' => array(CFGTITLE_SITEMAPXML_CATEGORIES_IMAGES_CAPTION, 'false', CFGDESC_SITEMAPXML_CATEGORIES_IMAGES_CAPTION, 43, null, 'zen_cfg_select_option(array(\'true\', \'false\'),'),
'SITEMAPXML_CATEGORIES_IMAGES_LICENSE' => array(CFGTITLE_SITEMAPXML_CATEGORIES_IMAGES_LICENSE, '', CFGDESC_SITEMAPXML_CATEGORIES_IMAGES_LICENSE, 44, null, null),
'SITEMAPXML_CATEGORIES_PAGING' => array(CFGTITLE_SITEMAPXML_CATEGORIES_PAGING, 'false', CFGDESC_SITEMAPXML_CATEGORIES_PAGING, 45, null, 'zen_cfg_select_option(array(\'true\', \'false\'),'),

'SITEMAPXML_REVIEWS_ORDERBY' => array(CFGTITLE_SITEMAPXML_REVIEWS_ORDERBY, 'reviews_rating ASC, last_date DESC', CFGDESC_SITEMAPXML_REVIEWS_ORDERBY, 50, null, null),
'SITEMAPXML_REVIEWS_CHANGEFREQ' => array(CFGTITLE_SITEMAPXML_REVIEWS_CHANGEFREQ, 'weekly', CFGDESC_SITEMAPXML_REVIEWS_CHANGEFREQ, 51, null, 'zen_cfg_select_option(array(\'no\', \'always\', \'hourly\', \'daily\', \'weekly\', \'monthly\', \'yearly\', \'never\'),'),

'SITEMAPXML_EZPAGES_ORDERBY' => array(CFGTITLE_SITEMAPXML_EZPAGES_ORDERBY, 'sidebox_sort_order ASC, header_sort_order ASC, footer_sort_order ASC', CFGDESC_SITEMAPXML_EZPAGES_ORDERBY, 60, null, null),
'SITEMAPXML_EZPAGES_CHANGEFREQ' => array(CFGTITLE_SITEMAPXML_EZPAGES_CHANGEFREQ, 'weekly', CFGDESC_SITEMAPXML_EZPAGES_CHANGEFREQ, 61, null, 'zen_cfg_select_option(array(\'no\', \'always\', \'hourly\', \'daily\', \'weekly\', \'monthly\', \'yearly\', \'never\'),'),

'SITEMAPXML_TESTIMONIALS_ORDERBY' => array(CFGTITLE_SITEMAPXML_TESTIMONIALS_ORDERBY, 'last_date DESC', CFGDESC_SITEMAPXML_TESTIMONIALS_ORDERBY, 70, null, null),
'SITEMAPXML_TESTIMONIALS_CHANGEFREQ' => array(CFGTITLE_SITEMAPXML_TESTIMONIALS_CHANGEFREQ, 'weekly', CFGDESC_SITEMAPXML_TESTIMONIALS_CHANGEFREQ, 71, null, 'zen_cfg_select_option(array(\'no\', \'always\', \'hourly\', \'daily\', \'weekly\', \'monthly\', \'yearly\', \'never\'),'),

'SITEMAPXML_NEWS_ORDERBY' => array(CFGTITLE_SITEMAPXML_NEWS_ORDERBY, 'last_date DESC', CFGDESC_SITEMAPXML_NEWS_ORDERBY, 80, null, null),
'SITEMAPXML_NEWS_CHANGEFREQ' => array(CFGTITLE_SITEMAPXML_NEWS_CHANGEFREQ, 'weekly', CFGDESC_SITEMAPXML_NEWS_CHANGEFREQ, 81, null, 'zen_cfg_select_option(array(\'no\', \'always\', \'hourly\', \'daily\', \'weekly\', \'monthly\', \'yearly\', \'never\'),'),

'SITEMAPXML_MANUFACTURERS_ORDERBY' => array(CFGTITLE_SITEMAPXML_MANUFACTURERS_ORDERBY, 'last_date DESC', CFGDESC_SITEMAPXML_MANUFACTURERS_ORDERBY, 90, null, null),
'SITEMAPXML_MANUFACTURERS_CHANGEFREQ' => array(CFGTITLE_SITEMAPXML_MANUFACTURERS_CHANGEFREQ, 'weekly', CFGDESC_SITEMAPXML_MANUFACTURERS_CHANGEFREQ, 91, null, 'zen_cfg_select_option(array(\'no\', \'always\', \'hourly\', \'daily\', \'weekly\', \'monthly\', \'yearly\', \'never\'),'),
'SITEMAPXML_MANUFACTURERS_IMAGES' => array(CFGTITLE_SITEMAPXML_MANUFACTURERS_IMAGES, 'false', CFGDESC_SITEMAPXML_MANUFACTURERS_IMAGES, 92, null, 'zen_cfg_select_option(array(\'true\', \'false\'),'),
'SITEMAPXML_MANUFACTURERS_IMAGES_CAPTION' => array(CFGTITLE_SITEMAPXML_MANUFACTURERS_IMAGES_CAPTION, 'false', CFGDESC_SITEMAPXML_MANUFACTURERS_IMAGES_CAPTION, 93, null, 'zen_cfg_select_option(array(\'true\', \'false\'),'),
'SITEMAPXML_MANUFACTURERS_IMAGES_LICENSE' => array(CFGTITLE_SITEMAPXML_MANUFACTURERS_IMAGES_LICENSE, '', CFGDESC_SITEMAPXML_MANUFACTURERS_IMAGES_LICENSE, 94, null, null),

'SITEMAPXML_BOXNEWS_ORDERBY' => array(CFGTITLE_SITEMAPXML_BOXNEWS_ORDERBY, 'last_date DESC', CFGDESC_SITEMAPXML_BOXNEWS_ORDERBY, 100, null, null),
'SITEMAPXML_BOXNEWS_CHANGEFREQ' => array(CFGTITLE_SITEMAPXML_BOXNEWS_CHANGEFREQ, 'weekly', CFGDESC_SITEMAPXML_BOXNEWS_CHANGEFREQ, 101, null, 'zen_cfg_select_option(array(\'no\', \'always\', \'hourly\', \'daily\', \'weekly\', \'monthly\', \'yearly\', \'never\'),'),

'SITEMAPXML_PRODUCTS_REVIEWS_ORDERBY' => array(CFGTITLE_SITEMAPXML_PRODUCTS_REVIEWS_ORDERBY, 'last_date DESC', CFGDESC_SITEMAPXML_PRODUCTS_REVIEWS_ORDERBY, 110, null, null),
'SITEMAPXML_PRODUCTS_REVIEWS_CHANGEFREQ' => array(CFGTITLE_SITEMAPXML_PRODUCTS_REVIEWS_CHANGEFREQ, 'weekly', CFGDESC_SITEMAPXML_PRODUCTS_REVIEWS_CHANGEFREQ, 111, null, 'zen_cfg_select_option(array(\'no\', \'always\', \'hourly\', \'daily\', \'weekly\', \'monthly\', \'yearly\', \'never\'),'),

//'SITEMAPXML_EXTRAURLS' => array(CFGTITLE_SITEMAPXML_EXTRAURLS, 'last_date DESC', CFGDESC_SITEMAPXML_EXTRAURLS, 80, null, 'zen_cfg_textarea('),

/*
'SITEMAPXML_VIDEO_PING_URLS' => array('Ping urls',
'Google => http://www.google.com/webmasters/sitemaps/ping?sitemap=%s;
Ask.com => http://submissions.ask.com/ping?sitemap=%s;
Bing => http://www.bing.com/webmaster/ping.aspx?siteMap=%s', 'List of pinging urls separated by ;', 10, null, 'zen_cfg_textarea('),
*/
);

/*
  $admin_page = array(
          'page_key' => 'sitemapxml',
          'language_key' => 'BOX_SITEMAPXML',
          'main_page' => 'FILENAME_SITEMAPXML',
          'page_params' => '',
          'menu_key' => 'tools',
          'display_on_menu' => 'Y',
          'sort_order' => '',
                      );
  $ext_modules->install_admin_pages($admin_page);
*/
/*
  $admin_page = array(
          'page_key' => 'sitemapxmlConfig',
          'language_key' => 'BOX_CONFIGURATION_SITEMAPXML',
          'main_page' => 'FILENAME_CONFIGURATION',
          'page_params' => 'gID=' . $ext_modules->configuration_group_id,
          'menu_key' => 'configuration',
          'display_on_menu' => 'Y',
          'sort_order' => $ext_modules->configuration_group_id,
                      );
  $ext_modules->install_admin_pages($admin_page);
*/

$install_table_sitemapxml_extraurls_sql =
"CREATE TABLE IF NOT EXISTS `" . TABLE_SITEMAPXML_EXTRAURLS . "` (
  `id` int(11) NOT NULL auto_increment,
  `loc` varchar(256) NOT NULL DEFAULT '',
  `lastmod` varchar(32) NOT NULL DEFAULT '',
  `changefreq` varchar(8) NOT NULL DEFAULT '',
  `priority` varchar(4) NOT NULL DEFAULT '',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM" . ((strtolower(DB_CHARSET) == 'utf8') ? ' /*!40101 DEFAULT CHARSET=utf8 */;' : ';');
//  $ext_modules->install_db_table(TABLE_SITEMAPXML_EXTRAURLS, $install_table_sitemapxml_extraurls_sql);
