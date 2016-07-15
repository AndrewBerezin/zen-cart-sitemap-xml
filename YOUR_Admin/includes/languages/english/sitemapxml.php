<?php
/**
 * Sitemap XML Feed
 *
 * @package Sitemap XML Feed
 * @copyright Copyright 2005-2016 Andrew Berezin eCommerce-Service.com
 * @copyright Copyright 2003-2016 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @link http://www.sitemaps.org/
 * @version $Id: sitemapxml.php, v 3.7 07.07.2016 11:25:41 AndrewBerezin $
 */

define('SITEMAPXML_SITEMAPINDEX_HTTP_LINK', HTTP_CATALOG_SERVER . DIR_WS_CATALOG . SITEMAPXML_SITEMAPINDEX . '.xml');
define('HEADING_TITLE', 'Sitemap XML');
define('TEXT_SITEMAPXML_OVERVIEW_HEAD', 'Overview:');
define('TEXT_SITEMAPXML_OVERVIEW_TEXT', 'This module: automatically generates several XML sitemaps for your Zen-Cart store: a main site map, categories, products, reviews, EZ-pages, testimonials. <br />
<p>All about Sitemap facilities you can read at <strong><a href="http://sitemaps.org/" target="_blank" class="splitPageLink">[Sitemaps.org]</a></strong>.</p>
<ol>
<li>Register or login to your account: <strong><a href="https://www.google.com/webmasters/tools/home" target="_blank" class="splitPageLink">[Google]</a></strong>, <strong><a href="https://ssl.bing.com/webmaster" target="_blank" class="splitPageLink">[Bing]</a></strong>.</li>
<li>Submit your Sitemap <input type="text" readonly="readonly" value="' . SITEMAPXML_SITEMAPINDEX_HTTP_LINK . '" size="' . strlen(SITEMAPXML_SITEMAPINDEX_HTTP_LINK) . '" style="border: solid 1px; padding: 0 4px 0 4px;"/> via the search engine\'s submission interface <strong><a href="https://www.google.com/webmasters/tools/home" target="_blank" class="splitPageLink">[Google]</a></strong>, <strong><a href="http://www.bing.com/webmaster/WebmasterAddSitesPage.aspx" target="_blank" class="splitPageLink">[Bing]</a></strong>.</li>
<li>Specifying the Sitemap location in your <a href="' . HTTP_CATALOG_SERVER . DIR_WS_CATALOG . 'robots.txt' . '" target="_blank" class="splitPageLink">robots.txt</a> file (<a href="http://sitemaps.org/protocol.php#submit_robots" target="_blank" class="splitPageLink">more...</a>):<br /><input type="text" readonly="readonly" value="Sitemap: ' . SITEMAPXML_SITEMAPINDEX_HTTP_LINK . '" size="' . strlen('Sitemap: ' . SITEMAPXML_SITEMAPINDEX_HTTP_LINK) . '" style="border: solid 1px; padding: 0 4px 0 4px;"/></li>
<li>Notify crawlers of the update to your XML sitemap. <span><b>Note:</b> <i>CURL is used for communication with the crawlers, so must be active on your hosting server (if you need to use a CURL proxy, set the CURL proxy settings under Admin->Configuration->My Store.)</i></span></li>
</ol>');
define('TEXT_SITEMAPXML_TIPS_HEAD', 'Tips:');
define('TEXT_SITEMAPXML_TIPS_TEXT', 'To have update sitemaps and automatically notify crawlers, you will need to set up a Cron job via your host\'s control panel.<br />
To run it as a cron job (at 5:0am like you wanted), put in your crontab something like the following:
<div>
0 5 * * * GET \'http://your_domain/index.php?main_page=sitemapxml\&amp;rebuild=yes\&amp;ping=yes\'<br />
or<br />
0 5 * * * wget -q \'http://your_domain/index.php?main_page=sitemapxml\&amp;rebuild=yes\&amp;ping=yes\' -O /dev/null<br />
or<br />
0 5 * * * curl -s \'http://your_domain/index.php?main_page=sitemapxml\&amp;rebuild=yes\&amp;ping=yes\'<br />
or<br />
0 5 * * * php -f &lt;path to shop&gt;/cgi-bin/sitemapxml.php rebuild=yes ping=yes<br />
</div>');

//zen_catalog_href_link(SITEMAPXML_SITEMAPINDEX . '.xml')
define('TEXT_SITEMAPXML_INSTRUCTIONS_HEAD', 'Create / update your site map:');
define('TEXT_SITEMAPXML_CHOOSE_PARAMETERS', 'Choose parameters:');
define('TEXT_SITEMAPXML_CHOOSE_PARAMETERS_PING', 'Pinging Search Engine.');
define('TEXT_SITEMAPXML_CHOOSE_PARAMETERS_REBUILD', 'Force rebuild all sitemap*.xml files!');
define('TEXT_SITEMAPXML_CHOOSE_PARAMETERS_INLINE', 'Output file ' . SITEMAPXML_SITEMAPINDEX . '.xml');

define('TEXT_SITEMAPXML_PLUGINS_LIST', 'Plugins');
define('TEXT_SITEMAPXML_PLUGINS_LIST_SELECT', 'Select Active Plugins');

define('TEXT_SITEMAPXML_FILE_LIST', 'Sitemap File List');
define('TEXT_SITEMAPXML_FILE_LIST_TABLE_FNAME', 'Name');
define('TEXT_SITEMAPXML_FILE_LIST_TABLE_FSIZE', 'Size');
define('TEXT_SITEMAPXML_FILE_LIST_TABLE_FTIME', '	Last modification date');
define('TEXT_SITEMAPXML_FILE_LIST_TABLE_FPERMS', 'Permissions');
define('TEXT_SITEMAPXML_FILE_LIST_TABLE_TYPE', 'Type');
define('TEXT_SITEMAPXML_FILE_LIST_TABLE_ITEMS', 'Items');
define('TEXT_SITEMAPXML_FILE_LIST_TABLE_COMMENTS', 'Comments');
define('TEXT_SITEMAPXML_FILE_LIST_TABLE_ACTION', 'Action');

define('TEXT_SITEMAPXML_FILE_LIST_COMMENTS_READONLY', 'Read Only!!!');
define('TEXT_SITEMAPXML_FILE_LIST_COMMENTS_IGNORED', 'Ignored');

define('TEXT_SITEMAPXML_FILE_LIST_TYPE_URLSET', 'UrlSet');
define('TEXT_SITEMAPXML_FILE_LIST_TYPE_SITEMAPINDEX', 'SitemapIndex');
define('TEXT_SITEMAPXML_FILE_LIST_TYPE_UNDEFINE', 'Undefine!!!');

define('TEXT_ACTION_VIEW_FILE', 'View');
define('TEXT_ACTION_TRUNCATE_FILE', 'Truncate');
define('TEXT_ACTION_TRUNCATE_FILE_CONFIRM', 'You really want to truncate the file %s?');
define('TEXT_ACTION_DELETE_FILE', 'Delete');
define('TEXT_ACTION_DELETE_FILE_CONFIRM', 'You really want to delete the file %s?');

define('TEXT_MESSAGE_FILE_ERROR_OPENED', 'Error opening file %s');
define('TEXT_MESSAGE_FILE_TRUNCATED', 'File %s truncated');
define('TEXT_MESSAGE_FILE_DELETED', 'File %s deleted');
define('TEXT_MESSAGE_FILE_ERROR_DELETED', 'Error deleted file %s');
define('TEXT_MESSAGE_LANGUGE_FILE_NOT_FOUND', 'SitemapXML Languge file not found for %s - using default english file.');

define('TEXT_SITEMAPXML_INSTALL_HEAD', 'Installation notes:');

define('TEXT_SITEMAPXML_INSTALL_DELETE_FILE', 'Delete this file');

///////////
define('TEXT_INSTALL', 'Install SitemapXML SQL');
define('TEXT_UPGRADE', 'Upgrade SitemapXML SQL');
define('TEXT_UNINSTALL', 'Uninstall SitemapXML SQL');
define('TEXT_UPGRADE_CONFIG_ADD', '');
define('TEXT_UPGRADE_CONFIG_UPD', '');
define('TEXT_UPGRADE_CONFIG_DEL', '');

///////////
define('TEXT_CONFIGURATION_TITLE_SITEMAPXML_VERSION', 'Module version');
define('TEXT_CONFIGURATION_DESCRIPTION_SITEMAPXML_VERSION', '<img src="images/icon_popup.gif" border="0">&nbsp;<a href="http://ecommerce-service.com/" target="_blank" style="text-decoration: underline; font-weight: bold;">eCommerce Service</a>');
define('TEXT_CONFIGURATION_TITLE_SITEMAPXML_SITEMAPINDEX', 'SitemapXML Index file name');
define('TEXT_CONFIGURATION_DESCRIPTION_SITEMAPXML_SITEMAPINDEX', 'SitemapXML Index file name - this file should be given to the search engines');
define('TEXT_CONFIGURATION_TITLE_SITEMAPXML_DIR_WS', 'Sitemap directory');
define('TEXT_CONFIGURATION_DESCRIPTION_SITEMAPXML_DIR_WS', 'Directory for sitemap files. If empty all sitemap xml files saved on shop root directory.');
define('TEXT_CONFIGURATION_TITLE_SITEMAPXML_COMPRESS', 'Compress SitemapXML Files');
define('TEXT_CONFIGURATION_DESCRIPTION_SITEMAPXML_COMPRESS', 'Compress SitemapXML files');
define('TEXT_CONFIGURATION_TITLE_SITEMAPXML_LASTMOD_FORMAT', 'Lastmod tag format');
define('TEXT_CONFIGURATION_DESCRIPTION_SITEMAPXML_LASTMOD_FORMAT', 'Lastmod tag format:<br />date - Complete date: YYYY-MM-DD (eg 1997-07-16)<br />full -    Complete date plus hours, minutes and seconds: YYYY-MM-DDThh:mm:ssTZD (eg 1997-07-16T19:20:30+01:00)');
define('TEXT_CONFIGURATION_TITLE_SITEMAPXML_EXECUTION_TOKEN', 'Start Security Token');
define('TEXT_CONFIGURATION_DESCRIPTION_SITEMAPXML_EXECUTION_TOKEN', 'Used to prevent a third party not authorized start of the generator Sitemap XML. To avoid the creation of intentional excessive load on the server, DDoS-attacks.');
define('TEXT_CONFIGURATION_TITLE_SITEMAPXML_USE_EXISTING_FILES', 'Use Existing Files');
define('TEXT_CONFIGURATION_DESCRIPTION_SITEMAPXML_USE_EXISTING_FILES', 'Use Existing XML Files');
define('TEXT_CONFIGURATION_TITLE_SITEMAPXML_USE_ONLY_DEFAULT_LANGUAGE', 'Generate links only for default language');
define('TEXT_CONFIGURATION_DESCRIPTION_SITEMAPXML_USE_ONLY_DEFAULT_LANGUAGE', 'Generate links for all languages or only for default language');
//define('TEXT_CONFIGURATION_TITLE_SITEMAPXML_USE_DEFAULT_LANGUAGE', 'Generate language for default language');
//define('TEXT_CONFIGURATION_DESCRIPTION_SITEMAPXML_USE_DEFAULT_LANGUAGE', 'Generate language parameter for default language');
define('TEXT_CONFIGURATION_TITLE_SITEMAPXML_USE_LANGUAGE_PARM', 'Using parameter language in links');
define('TEXT_CONFIGURATION_DESCRIPTION_SITEMAPXML_USE_LANGUAGE_PARM', 'Using parameter language in links:<br />true - normally use it,<br />all - using for all langusges including pages for default language,<br />false - don\'t use it');
define('TEXT_CONFIGURATION_TITLE_SITEMAPXML_PING_URLS', 'Ping urls');
define('TEXT_CONFIGURATION_DESCRIPTION_SITEMAPXML_PING_URLS', 'List of pinging urls separated by ;');
define('TEXT_CONFIGURATION_TITLE_SITEMAPXML_CHECK_DUPLICATES', 'Check Duplicates');
define('TEXT_CONFIGURATION_DESCRIPTION_SITEMAPXML_CHECK_DUPLICATES', 'true - check dublicates,<br />mysql - check dublicates using mySQL (used to store a large number of products),<br />false - don\'t check dublicates');

define('TEXT_CONFIGURATION_TITLE_SITEMAPXML_HOMEPAGE_ORDERBY', 'Home page order by');
define('TEXT_CONFIGURATION_DESCRIPTION_SITEMAPXML_HOMEPAGE_ORDERBY', '');
define('TEXT_CONFIGURATION_TITLE_SITEMAPXML_HOMEPAGE_CHANGEFREQ', 'Home page changefreq');
define('TEXT_CONFIGURATION_DESCRIPTION_SITEMAPXML_HOMEPAGE_CHANGEFREQ', 'How frequently the Home page is likely to change.');

define('TEXT_CONFIGURATION_TITLE_SITEMAPXML_PRODUCTS_ORDERBY', 'Products order by');
define('TEXT_CONFIGURATION_DESCRIPTION_SITEMAPXML_PRODUCTS_ORDERBY', '');
define('TEXT_CONFIGURATION_TITLE_SITEMAPXML_PRODUCTS_CHANGEFREQ', 'Products changefreq');
define('TEXT_CONFIGURATION_DESCRIPTION_SITEMAPXML_PRODUCTS_CHANGEFREQ', 'How frequently the Product pages page is likely to change.');
define('TEXT_CONFIGURATION_TITLE_SITEMAPXML_PRODUCTS_USE_CPATH', 'Use cPath parameter');
define('TEXT_CONFIGURATION_DESCRIPTION_SITEMAPXML_PRODUCTS_USE_CPATH', 'Use cPath parameter in products url. Coordinate this value with the value of variable $includeCPath in file init_canonical.php');
define('TEXT_CONFIGURATION_TITLE_SITEMAPXML_PRODUCTS_IMAGES', 'Add Products Images');
define('TEXT_CONFIGURATION_DESCRIPTION_SITEMAPXML_PRODUCTS_IMAGES', 'Generate Products Image tags for products urls');
define('TEXT_CONFIGURATION_TITLE_SITEMAPXML_PRODUCTS_IMAGES_CAPTION', 'Use Products Images Caption/Title');
define('TEXT_CONFIGURATION_DESCRIPTION_SITEMAPXML_PRODUCTS_IMAGES_CAPTION', 'Generate Product image tags Title and Caption');
define('TEXT_CONFIGURATION_TITLE_SITEMAPXML_PRODUCTS_IMAGES_LICENSE', 'Products Images license');
define('TEXT_CONFIGURATION_DESCRIPTION_SITEMAPXML_PRODUCTS_IMAGES_LICENSE', 'A URL to the license of the Products images');

define('TEXT_CONFIGURATION_TITLE_SITEMAPXML_CATEGORIES_ORDERBY', 'Categories order by');
define('TEXT_CONFIGURATION_DESCRIPTION_SITEMAPXML_CATEGORIES_ORDERBY', '');
define('TEXT_CONFIGURATION_TITLE_SITEMAPXML_CATEGORIES_CHANGEFREQ', 'Category changefreq');
define('TEXT_CONFIGURATION_DESCRIPTION_SITEMAPXML_CATEGORIES_CHANGEFREQ', 'How frequently the Category pages page is likely to change.');
define('TEXT_CONFIGURATION_TITLE_SITEMAPXML_CATEGORIES_PAGING', 'Category paging');
define('TEXT_CONFIGURATION_DESCRIPTION_SITEMAPXML_CATEGORIES_PAGING', 'Add all category pages (with page=) to sitemap');
define('TEXT_CONFIGURATION_TITLE_SITEMAPXML_CATEGORIES_IMAGES', 'Add Categories Images');
define('TEXT_CONFIGURATION_DESCRIPTION_SITEMAPXML_CATEGORIES_IMAGES', 'Generate Categories Image tags for categories urls');
define('TEXT_CONFIGURATION_TITLE_SITEMAPXML_CATEGORIES_IMAGES_CAPTION', 'Use Categories Images Caption/Title');
define('TEXT_CONFIGURATION_DESCRIPTION_SITEMAPXML_CATEGORIES_IMAGES_CAPTION', 'Generate Categories image tags Title and Caption');
define('TEXT_CONFIGURATION_TITLE_SITEMAPXML_CATEGORIES_IMAGES_LICENSE', 'Categories Images license');
define('TEXT_CONFIGURATION_DESCRIPTION_SITEMAPXML_CATEGORIES_IMAGES_LICENSE', 'A URL to the license of the Categories images');

define('TEXT_CONFIGURATION_TITLE_SITEMAPXML_REVIEWS_ORDERBY', 'Reviews order by');
define('TEXT_CONFIGURATION_DESCRIPTION_SITEMAPXML_REVIEWS_ORDERBY', '');
define('TEXT_CONFIGURATION_TITLE_SITEMAPXML_REVIEWS_CHANGEFREQ', 'Reviews changefreq');
define('TEXT_CONFIGURATION_DESCRIPTION_SITEMAPXML_REVIEWS_CHANGEFREQ', 'How frequently the Reviews pages page is likely to change.');

define('TEXT_CONFIGURATION_TITLE_SITEMAPXML_EZPAGES_ORDERBY', 'EZPages order by');
define('TEXT_CONFIGURATION_DESCRIPTION_SITEMAPXML_EZPAGES_ORDERBY', '');
define('TEXT_CONFIGURATION_TITLE_SITEMAPXML_EZPAGES_CHANGEFREQ', 'EZPages changefreq');
define('TEXT_CONFIGURATION_DESCRIPTION_SITEMAPXML_EZPAGES_CHANGEFREQ', 'How frequently the EZPages pages page is likely to change.');

define('TEXT_CONFIGURATION_TITLE_SITEMAPXML_TESTIMONIALS_ORDERBY', 'Testimonials order by');
define('TEXT_CONFIGURATION_DESCRIPTION_SITEMAPXML_TESTIMONIALS_ORDERBY', '');
define('TEXT_CONFIGURATION_TITLE_SITEMAPXML_TESTIMONIALS_CHANGEFREQ', 'Testimonials changefreq');
define('TEXT_CONFIGURATION_DESCRIPTION_SITEMAPXML_TESTIMONIALS_CHANGEFREQ', 'How frequently the Testimonials page is likely to change.');

define('TEXT_CONFIGURATION_TITLE_SITEMAPXML_NEWS_ORDERBY', 'News Articles order by');
define('TEXT_CONFIGURATION_DESCRIPTION_SITEMAPXML_NEWS_ORDERBY', '');
define('TEXT_CONFIGURATION_TITLE_SITEMAPXML_NEWS_CHANGEFREQ', 'News Articles changefreq');
define('TEXT_CONFIGURATION_DESCRIPTION_SITEMAPXML_NEWS_CHANGEFREQ', 'How frequently the News Articles is likely to change.');

define('TEXT_CONFIGURATION_TITLE_SITEMAPXML_MANUFACTURERS_ORDERBY', 'Manufacturers order by');
define('TEXT_CONFIGURATION_DESCRIPTION_SITEMAPXML_MANUFACTURERS_ORDERBY', '');
define('TEXT_CONFIGURATION_TITLE_SITEMAPXML_MANUFACTURERS_CHANGEFREQ', 'Manufacturers changefreq');
define('TEXT_CONFIGURATION_DESCRIPTION_SITEMAPXML_MANUFACTURERS_CHANGEFREQ', 'How frequently the Manufacturers is likely to change.');
define('TEXT_CONFIGURATION_TITLE_SITEMAPXML_MANUFACTURERS_IMAGES', 'Add Manufacturers Images');
define('TEXT_CONFIGURATION_DESCRIPTION_SITEMAPXML_MANUFACTURERS_IMAGES', 'Generate Manufacturers Image tags for manufacturers urls');
define('TEXT_CONFIGURATION_TITLE_SITEMAPXML_MANUFACTURERS_IMAGES_CAPTION', 'Use Images Caption/Title');
define('TEXT_CONFIGURATION_DESCRIPTION_SITEMAPXML_MANUFACTURERS_IMAGES_CAPTION', 'Generate Manufacturer image tags Title and Caption');
define('TEXT_CONFIGURATION_TITLE_SITEMAPXML_MANUFACTURERS_IMAGES_LICENSE', 'Manufacturers Images license');
define('TEXT_CONFIGURATION_DESCRIPTION_SITEMAPXML_MANUFACTURERS_IMAGES_LICENSE', 'A URL to the license of the Manufacturers images');

define('TEXT_CONFIGURATION_TITLE_SITEMAPXML_BOXNEWS_ORDERBY', 'News Box Manager - order by');
define('TEXT_CONFIGURATION_DESCRIPTION_SITEMAPXML_BOXNEWS_ORDERBY', '');
define('TEXT_CONFIGURATION_TITLE_SITEMAPXML_BOXNEWS_CHANGEFREQ', 'News Box Manager - changefreq');
define('TEXT_CONFIGURATION_DESCRIPTION_SITEMAPXML_BOXNEWS_CHANGEFREQ', 'How frequently the News Box Manager is likely to change.');

define('TEXT_CONFIGURATION_TITLE_SITEMAPXML_PRODUCTS_REVIEWS_ORDERBY', 'Products Reviews - order by');
define('TEXT_CONFIGURATION_DESCRIPTION_SITEMAPXML_PRODUCTS_REVIEWS_ORDERBY', '');
define('TEXT_CONFIGURATION_TITLE_SITEMAPXML_PRODUCTS_REVIEWS_CHANGEFREQ', 'Products Reviews - changefreq');
define('TEXT_CONFIGURATION_DESCRIPTION_SITEMAPXML_PRODUCTS_REVIEWS_CHANGEFREQ', 'How frequently the Products Reviews is likely to change.');

define('TEXT_CONFIGURATION_TITLE_SITEMAPXML_PLUGINS', 'Active plugins');
define('TEXT_CONFIGURATION_DESCRIPTION_SITEMAPXML_PLUGINS', 'What plug-ins from existing uses to generate the site map');

//define('TEXT_CONFIGURATION_TITLE_', '');
//define('TEXT_CONFIGURATION_DESCRIPTION_', '');

// EOF