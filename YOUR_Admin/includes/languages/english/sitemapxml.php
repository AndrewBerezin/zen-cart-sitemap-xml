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
 * @version $Id: sitemapxml.php, v 3.8 07.07.2016 12:39:33 AndrewBerezin $
 */

define('SITEMAPXML_SITEMAPINDEX_HTTP_LINK', HTTP_CATALOG_SERVER . DIR_WS_CATALOG . SITEMAPXML_SITEMAPINDEX . '.xml');
define('HEADING_TITLE', 'Sitemap XML');
define('TEXT_SITEMAPXML_TIPS_HEAD', 'Tips');
define('TEXT_SITEMAPXML_TIPS_TEXT', '<p>You can read all about sitemaps at <strong><a href="http://sitemaps.org/" target="_blank" class="splitPageLink">[Sitemaps.org]</a></strong>.</p>
<p>Once the sitemaps are generated, you need to get them noticed:</p>
<ol>
<li>Register or login to your account: <strong><a href="https://www.google.com/webmasters/tools/home" target="_blank" class="splitPageLink">[Google]</a></strong>, <strong><a href="https://ssl.bing.com/webmaster" target="_blank" class="splitPageLink">[Bing]</a></strong>.</li>
<li>Submit your Sitemap <input type="text" readonly="readonly" value="' . SITEMAPXML_SITEMAPINDEX_HTTP_LINK . '" size="' . strlen(SITEMAPXML_SITEMAPINDEX_HTTP_LINK) . '" style="border: solid 1px; padding: 0 4px 0 4px;"/> via the search engine\'s submission interface <strong><a href="https://www.google.com/webmasters/tools/home" target="_blank" class="splitPageLink">[Google]</a></strong>, <strong><a href="http://www.bing.com/webmaster/WebmasterAddSitesPage.aspx" target="_blank" class="splitPageLink">[Bing]</a></strong>.</li>
<li>Specify the Sitemap location in your <a href="' . HTTP_CATALOG_SERVER . DIR_WS_CATALOG . 'robots.txt' . '" target="_blank" class="splitPageLink">robots.txt</a> file (<a href="http://sitemaps.org/protocol.php#submit_robots" target="_blank" class="splitPageLink">more...</a>):<br /><input type="text" readonly="readonly" value="Sitemap: ' . SITEMAPXML_SITEMAPINDEX_HTTP_LINK . '" size="' . strlen('Sitemap: ' . SITEMAPXML_SITEMAPINDEX_HTTP_LINK) . '" style="border: solid 1px; padding: 0 4px 0 4px;"/></li>
<li>Notify crawlers of the update to your XML sitemap.<br /><span><b>Note:</b> <i>CURL is used for communication with the crawlers, so must be active on your hosting server (if you need to use a CURL proxy, set the CURL proxy settings under Admin->Configuration->My Store.)</i></span></li>
</ol>
<p>To <em>automatically</em> update sitemaps and notify crawlers, you will need to set up a Cron job via your host\'s control panel.</p>
<p>To run the generation as a cron job (at 5am for example), you will need to create something similar to the following examples.</p>
<p>0 5 * * * GET \'http://your_domain/index.php?main_page=sitemapxml\&amp;rebuild=yes\&amp;ping=yes\'</p>
<p>0 5 * * * wget -q \'http://your_domain/index.php?main_page=sitemapxml\&amp;rebuild=yes\&amp;ping=yes\' -O /dev/null</p>
<p>0 5 * * * curl -s \'http://your_domain/index.php?main_page=sitemapxml\&amp;rebuild=yes\&amp;ping=yes\'</p>
<p>0 5 * * * php -f &lt;path to shop&gt;/cgi-bin/sitemapxml.php rebuild=yes ping=yes</p>');

define('TEXT_SITEMAPXML_INSTRUCTIONS_HEAD', 'Create / update your site map(s)');
define('TEXT_SITEMAPXML_CHOOSE_PARAMETERS', 'Select Actions');
define('TEXT_SITEMAPXML_CHOOSE_PARAMETERS_PING', 'Ping Search Engines');
define('TEXT_SITEMAPXML_CHOOSE_PARAMETERS_REBUILD', 'Rebuild all sitemap*.xml files!');
define('TEXT_SITEMAPXML_CHOOSE_PARAMETERS_INLINE', 'Output file ' . SITEMAPXML_SITEMAPINDEX . '.xml');

define('TEXT_SITEMAPXML_PLUGINS_LIST', 'Sitemap Plugins');
define('TEXT_SITEMAPXML_PLUGINS_LIST_SELECT', 'Select Sitemaps to Generate');

define('TEXT_SITEMAPXML_FILE_LIST', 'Sitemaps File List');
define('TEXT_SITEMAPXML_FILE_LIST_TABLE_FNAME', 'Name');
define('TEXT_SITEMAPXML_FILE_LIST_TABLE_FSIZE', 'Size');
define('TEXT_SITEMAPXML_FILE_LIST_TABLE_FTIME', 'Last modified');
define('TEXT_SITEMAPXML_FILE_LIST_TABLE_FPERMS', 'Permissions');
define('TEXT_SITEMAPXML_FILE_LIST_TABLE_TYPE', 'Type');
define('TEXT_SITEMAPXML_FILE_LIST_TABLE_ITEMS', 'Items');
define('TEXT_SITEMAPXML_FILE_LIST_TABLE_COMMENTS', 'Comments');
define('TEXT_SITEMAPXML_FILE_LIST_TABLE_ACTION', 'Action');

define('TEXT_SITEMAPXML_IMAGE_POPUP_ALT', 'open sitemap in new window');
define('TEXT_SITEMAPXML_RELOAD_WINDOW', 'Refresh File List');

define('TEXT_SITEMAPXML_FILE_LIST_COMMENTS_READONLY', 'Read Only!!!');
define('TEXT_SITEMAPXML_FILE_LIST_COMMENTS_IGNORED', 'Ignored');

define('TEXT_SITEMAPXML_FILE_LIST_TYPE_URLSET', 'UrlSet');
define('TEXT_SITEMAPXML_FILE_LIST_TYPE_SITEMAPINDEX', 'SitemapIndex');
define('TEXT_SITEMAPXML_FILE_LIST_TYPE_UNDEFINED', 'Undefined!!!');

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
define('CFGTITLE_SITEMAPXML_VERSION', 'Module version');
define('CFGDESC_SITEMAPXML_VERSION', '<img src="images/icon_popup.gif" alt="SitemapXML Version" border="0">&nbsp;<a href="http://ecommerce-service.com/" target="_blank" style="text-decoration: underline; font-weight: bold;">eCommerce Service</a>');
define('CFGTITLE_SITEMAPXML_SITEMAPINDEX', 'SitemapXML Index file name');
define('CFGDESC_SITEMAPXML_SITEMAPINDEX', 'SitemapXML Index file name - this file should be given to the search engines');
define('CFGTITLE_SITEMAPXML_DIR_WS', 'Sitemap directory');
define('CFGDESC_SITEMAPXML_DIR_WS', 'Directory for sitemap files. If empty all sitemap xml files saved on shop root directory.');
define('CFGTITLE_SITEMAPXML_COMPRESS', 'Compress SitemapXML Files');
define('CFGDESC_SITEMAPXML_COMPRESS', 'Compress SitemapXML files');
define('CFGTITLE_SITEMAPXML_LASTMOD_FORMAT', 'Lastmod tag format');
define('CFGDESC_SITEMAPXML_LASTMOD_FORMAT', 'Lastmod tag format:<br />date - Complete date: YYYY-MM-DD (eg 1997-07-16)<br />full -    Complete date plus hours, minutes and seconds: YYYY-MM-DDThh:mm:ssTZD (eg 1997-07-16T19:20:30+01:00)');
define('CFGTITLE_SITEMAPXML_EXECUTION_TOKEN', 'Start Security Token');
define('CFGDESC_SITEMAPXML_EXECUTION_TOKEN', 'Used to prevent a third party not authorized start of the generator Sitemap XML. To avoid the creation of intentional excessive load on the server, DDoS-attacks.');
define('CFGTITLE_SITEMAPXML_USE_EXISTING_FILES', 'Use Existing Files');
define('CFGDESC_SITEMAPXML_USE_EXISTING_FILES', 'Use Existing XML Files');
define('CFGTITLE_SITEMAPXML_USE_ONLY_DEFAULT_LANGUAGE', 'Generate links only for default language');
define('CFGDESC_SITEMAPXML_USE_ONLY_DEFAULT_LANGUAGE', 'Generate links for all languages or only for default language');
//define('CFGTITLE_SITEMAPXML_USE_DEFAULT_LANGUAGE', 'Generate language for default language');
//define('CFGDESC_SITEMAPXML_USE_DEFAULT_LANGUAGE', 'Generate language parameter for default language');
define('CFGTITLE_SITEMAPXML_USE_LANGUAGE_PARM', 'Using parameter language in links');
define('CFGDESC_SITEMAPXML_USE_LANGUAGE_PARM', 'Using parameter language in links:<br />true - normally use it,<br />all - using for all languages including pages for default language,<br />false - don\'t use it');
define('CFGTITLE_SITEMAPXML_PING_URLS', 'Ping urls');
define('CFGDESC_SITEMAPXML_PING_URLS', 'List of pinging urls separated by ;');
define('CFGTITLE_SITEMAPXML_CHECK_DUPLICATES', 'Check Duplicates');
define('CFGDESC_SITEMAPXML_CHECK_DUPLICATES', 'true - check duplicates,<br />mysql - check duplicates using mySQL (used to store a large number of products),<br />false - don\'t check duplicates');

define('CFGTITLE_SITEMAPXML_HOMEPAGE_ORDERBY', 'Home page order by');
define('CFGDESC_SITEMAPXML_HOMEPAGE_ORDERBY', '');
define('CFGTITLE_SITEMAPXML_HOMEPAGE_CHANGEFREQ', 'Home page changefreq');
define('CFGDESC_SITEMAPXML_HOMEPAGE_CHANGEFREQ', 'How frequently the Home page is likely to change.');

define('CFGTITLE_SITEMAPXML_PRODUCTS_ORDERBY', 'Products order by');
define('CFGDESC_SITEMAPXML_PRODUCTS_ORDERBY', '');
define('CFGTITLE_SITEMAPXML_PRODUCTS_CHANGEFREQ', 'Products changefreq');
define('CFGDESC_SITEMAPXML_PRODUCTS_CHANGEFREQ', 'How frequently the Product pages page is likely to change.');
define('CFGTITLE_SITEMAPXML_PRODUCTS_USE_CPATH', 'Use cPath parameter');
define('CFGDESC_SITEMAPXML_PRODUCTS_USE_CPATH', 'Use cPath parameter in products url. Coordinate this value with the value of variable $includeCPath in file init_canonical.php');
define('CFGTITLE_SITEMAPXML_PRODUCTS_IMAGES', 'Add Products Images');
define('CFGDESC_SITEMAPXML_PRODUCTS_IMAGES', 'Generate Products Image tags for products urls');
define('CFGTITLE_SITEMAPXML_PRODUCTS_IMAGES_CAPTION', 'Use Products Images Caption/Title');
define('CFGDESC_SITEMAPXML_PRODUCTS_IMAGES_CAPTION', 'Generate Product image tags Title and Caption');
define('CFGTITLE_SITEMAPXML_PRODUCTS_IMAGES_LICENSE', 'Products Images license');
define('CFGDESC_SITEMAPXML_PRODUCTS_IMAGES_LICENSE', 'A URL to the license of the Products images');

define('CFGTITLE_SITEMAPXML_CATEGORIES_ORDERBY', 'Categories order by');
define('CFGDESC_SITEMAPXML_CATEGORIES_ORDERBY', '');
define('CFGTITLE_SITEMAPXML_CATEGORIES_CHANGEFREQ', 'Category changefreq');
define('CFGDESC_SITEMAPXML_CATEGORIES_CHANGEFREQ', 'How frequently the Category pages page is likely to change.');
define('CFGTITLE_SITEMAPXML_CATEGORIES_PAGING', 'Category paging');
define('CFGDESC_SITEMAPXML_CATEGORIES_PAGING', 'Add all category pages (with page=) to sitemap');
define('CFGTITLE_SITEMAPXML_CATEGORIES_IMAGES', 'Add Categories Images');
define('CFGDESC_SITEMAPXML_CATEGORIES_IMAGES', 'Generate Categories Image tags for categories urls');
define('CFGTITLE_SITEMAPXML_CATEGORIES_IMAGES_CAPTION', 'Use Categories Images Caption/Title');
define('CFGDESC_SITEMAPXML_CATEGORIES_IMAGES_CAPTION', 'Generate Categories image tags Title and Caption');
define('CFGTITLE_SITEMAPXML_CATEGORIES_IMAGES_LICENSE', 'Categories Images license');
define('CFGDESC_SITEMAPXML_CATEGORIES_IMAGES_LICENSE', 'A URL to the license of the Categories images');

define('CFGTITLE_SITEMAPXML_REVIEWS_ORDERBY', 'Reviews order by');
define('CFGDESC_SITEMAPXML_REVIEWS_ORDERBY', '');
define('CFGTITLE_SITEMAPXML_REVIEWS_CHANGEFREQ', 'Reviews changefreq');
define('CFGDESC_SITEMAPXML_REVIEWS_CHANGEFREQ', 'How frequently the Reviews pages page is likely to change.');

define('CFGTITLE_SITEMAPXML_EZPAGES_ORDERBY', 'EZPages order by');
define('CFGDESC_SITEMAPXML_EZPAGES_ORDERBY', '');
define('CFGTITLE_SITEMAPXML_EZPAGES_CHANGEFREQ', 'EZPages changefreq');
define('CFGDESC_SITEMAPXML_EZPAGES_CHANGEFREQ', 'How frequently the EZPages pages page is likely to change.');

define('CFGTITLE_SITEMAPXML_TESTIMONIALS_ORDERBY', 'Testimonials order by');
define('CFGDESC_SITEMAPXML_TESTIMONIALS_ORDERBY', '');
define('CFGTITLE_SITEMAPXML_TESTIMONIALS_CHANGEFREQ', 'Testimonials changefreq');
define('CFGDESC_SITEMAPXML_TESTIMONIALS_CHANGEFREQ', 'How frequently the Testimonials page is likely to change.');

define('CFGTITLE_SITEMAPXML_NEWS_ORDERBY', 'News Articles order by');
define('CFGDESC_SITEMAPXML_NEWS_ORDERBY', '');
define('CFGTITLE_SITEMAPXML_NEWS_CHANGEFREQ', 'News Articles changefreq');
define('CFGDESC_SITEMAPXML_NEWS_CHANGEFREQ', 'How frequently the News Articles is likely to change.');

define('CFGTITLE_SITEMAPXML_MANUFACTURERS_ORDERBY', 'Manufacturers order by');
define('CFGDESC_SITEMAPXML_MANUFACTURERS_ORDERBY', '');
define('CFGTITLE_SITEMAPXML_MANUFACTURERS_CHANGEFREQ', 'Manufacturers changefreq');
define('CFGDESC_SITEMAPXML_MANUFACTURERS_CHANGEFREQ', 'How frequently the Manufacturers is likely to change.');
define('CFGTITLE_SITEMAPXML_MANUFACTURERS_IMAGES', 'Add Manufacturers Images');
define('CFGDESC_SITEMAPXML_MANUFACTURERS_IMAGES', 'Generate Manufacturers Image tags for manufacturers urls');
define('CFGTITLE_SITEMAPXML_MANUFACTURERS_IMAGES_CAPTION', 'Use Images Caption/Title');
define('CFGDESC_SITEMAPXML_MANUFACTURERS_IMAGES_CAPTION', 'Generate Manufacturer image tags Title and Caption');
define('CFGTITLE_SITEMAPXML_MANUFACTURERS_IMAGES_LICENSE', 'Manufacturers Images license');
define('CFGDESC_SITEMAPXML_MANUFACTURERS_IMAGES_LICENSE', 'A URL to the license of the Manufacturers images');

define('CFGTITLE_SITEMAPXML_BOXNEWS_ORDERBY', 'News Box Manager - order by');
define('CFGDESC_SITEMAPXML_BOXNEWS_ORDERBY', '');
define('CFGTITLE_SITEMAPXML_BOXNEWS_CHANGEFREQ', 'News Box Manager - changefreq');
define('CFGDESC_SITEMAPXML_BOXNEWS_CHANGEFREQ', 'How frequently the News Box Manager is likely to change.');

define('CFGTITLE_SITEMAPXML_PRODUCTS_REVIEWS_ORDERBY', 'Products Reviews - order by');
define('CFGDESC_SITEMAPXML_PRODUCTS_REVIEWS_ORDERBY', '');
define('CFGTITLE_SITEMAPXML_PRODUCTS_REVIEWS_CHANGEFREQ', 'Products Reviews - changefreq');
define('CFGDESC_SITEMAPXML_PRODUCTS_REVIEWS_CHANGEFREQ', 'How frequently the Products Reviews is likely to change.');

define('CFGTITLE_SITEMAPXML_PLUGINS', 'Active plugins');
define('CFGDESC_SITEMAPXML_PLUGINS', 'What plug-ins from existing uses to generate the site map');

//define('CFGTITLE_', '');
//define('CFGDESC_', '');

// EOF