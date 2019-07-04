<?php
/**
 * Sitemap XML
 *
 * @param $errno
 * @param $errstr
 * @param $errfile
 * @param $errline
 * @return
 * @package Sitemap XML
 * @copyright Copyright 2005-2015 Andrew Berezin eCommerce-Service.com
 * @copyright Copyright 2003-2015 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @link http://www.sitemaps.org/
 * @version $Id: sitemapxml.php, v 3.3.1 31.01.2015 16:27:07 AndrewBerezin $
 */

//@ini_set('display_errors', '1');
//error_reporting(E_ALL);

function sitemapxmlErrorHandler($errno, $errstr, $errfile, $errline) {
  global $old_error_handler;
  if ($errno == 2048 && $errstr == 'is_a(): Deprecated. Please use the instanceof operator') return $old_error_handler;
  if ($errno == 8 && $errstr == 'Undefined offset: 1' && substr($errfile, -11) == 'seo.url.php') return $old_error_handler;
  if ($errno == 8 && (substr($errstr, 0, 9) == 'Constant ' && substr($errstr, -16) == ' already defined')) return $old_error_handler;
  if ($errno == 2048 && strpos($errstr, 'It is not safe to rely on the system\'s timezone settings.') !== false) return $old_error_handler;
  if ($errno == 2 && substr($errfile, -17) == 'template_func.php') return $old_error_handler;
  error_log('errno => ' . $errno . ',' . "\n" . 'errstr => \'' . $errstr . '\',' . "\n" . 'errfile => \'' . $errfile . '\',' . "\n" . 'errline => ' . $errline . ',' . "\n", 3, DIR_FS_CATALOG . 'sitemapxml.log');
  return $old_error_handler;
}

if (defined('DEBUG_IP')) {
  $old_error_handler = set_error_handler('sitemapxmlErrorHandler');
}

if (!get_cfg_var('safe_mode') && function_exists('set_time_limit')) {
  set_time_limit(0);
}

// This should be first line of the script:
$zco_notifier->notify('NOTIFY_HEADER_START_SITEMAPXML');

/**
 * load the site map class
 */
require(DIR_WS_CLASSES . 'sitemapxml.php');
/**
 * load language files
 */
require(DIR_WS_MODULES . zen_get_module_directory('require_languages.php'));
$breadcrumb->add(NAVBAR_TITLE);

$inline   = (isset($_GET['inline']) && $_GET['inline'] == 'yes') ? true : false;
$genxml   = (!isset($_GET['genxml']) || $_GET['genxml'] != 'no') ? true : false;
$ping     = (isset($_GET['ping']) && $_GET['ping'] == 'yes') ? true : false;
$checkurl = (isset($_GET['checkurl']) && $_GET['checkurl'] == 'yes') ? true : false;
$rebuild  = (isset($_GET['rebuild']) && $_GET['rebuild'] == 'yes') ? true : false;

if (defined('SITEMAPXML_EXECUTION_TOKEN') && zen_not_null(SITEMAPXML_EXECUTION_TOKEN) && SITEMAPXML_EXECUTION_TOKEN != $_GET['token']) {
  header('HTTP/1.1 401 Unauthorized');
  echo 'Incorrect Start Security Token';
  exit(0);
}

$sitemapXML = new zen_SiteMapXML($inline, $ping, $rebuild, $genxml);

$sitemapXML->setCheckURL($checkurl);

$tpl_dir = $template->get_template_dir('gss\.xsl', DIR_WS_TEMPLATE, $current_page_base, 'css');
if (is_file($tpl_dir . '/gss.xsl')) {
  $sitemapXML->setStylesheet($tpl_dir . '/gss.xsl');
}

$SiteMapXMLmodules = array();
$SiteMapXMLmodules = glob(DIR_WS_MODULES . 'pages/' . $current_page_base . '/sitemapxml_*.php');

$pluginsFilesActive = explode(';', SITEMAPXML_PLUGINS);
$temp = array();
foreach ($SiteMapXMLmodules as $pluginFile) {
  if (in_array(basename($pluginFile), $pluginsFilesActive)) {
    $temp[] = $pluginFile;
  }
}
$SiteMapXMLmodules = $temp;

// This should be last line of the script:
$zco_notifier->notify('NOTIFY_HEADER_END_SITEMAPXML');

//  @ini_set('display_errors', '1');
//  error_reporting(1);

// EOF