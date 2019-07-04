<?php
/**
 * @package functions
 * @copyright Copyright 2016 iSO Network - https://isonetwork.net.au
 * @copyright Copyright 2003-2014 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: 2.6.1 17.04.2017 13:44:49 AndrewBerezin $
 */
if (!defined('IS_ADMIN_FLAG')) {
    die('Illegal Access');
}

$module_constant = 'SITEMAPXML_VERSION';
$module_installer_directory = DIR_FS_ADMIN . 'includes/installers/sitemapxml';
$module_name = "SitemapXML";
$zencart_com_plugin_id = 367;

//Just change the stuff above... Nothing down here should need to change

unset($configuration_group_id);
if (defined($module_constant)) {
  $current_version = constant($module_constant);
  $sql = "SELECT configuration_group_id FROM " . TABLE_CONFIGURATION . " WHERE configuration_key = :configurationKey:";
  $sql = $db->bindVars($sql, ':configurationKey:', $module_constant, 'string');
  $config = $db->Execute($sql);
  $configuration_group_id = $config->fields['configuration_group_id'];
  $sql = "SELECT configuration_group_id FROM " . TABLE_CONFIGURATION . " WHERE configuration_key LIKE ':configurationKey:%' AND configuration_group_id != :configurationGroupID: GROUP BY configuration_group_id";
  $sql = $db->bindVars($sql, ':configurationKey:', $module_name, 'noquotestring');
  $sql = $db->bindVars($sql, ':configurationGroupID:', $configuration_group_id, 'integer');
  $check = $db->Execute($sql);
  while (!$check->EOF) {
echo '<pre>';var_dump($check->fields);echo '</pre>';
    $sql = "UPDATE " . TABLE_CONFIGURATION . " SET configuration_group_id = :configurationGroupIDnew: WHERE configuration_group_id = :configurationGroupIDold:";
    $sql = $db->bindVars($sql, ':configurationGroupIDnew:', $configuration_group_id, 'integer');
    $sql = $db->bindVars($sql, ':configurationGroupIDold:', $check->fields['configuration_group_id'], 'integer');
    $db->Execute($sql);
    $sql = "DELETE FROM " . TABLE_CONFIGURATION_GROUP . " WHERE configuration_group_id = :configurationGroupIDold:";
    $sql = $db->bindVars($sql, ':configurationGroupIDold:', $check->fields['configuration_group_id'], 'integer');
    $db->Execute($sql);
    $check->MoveNext();
  }
} else {
  $current_version = "0.0.0";
  $sql = "SELECT configuration_group_id FROM " . TABLE_CONFIGURATION . " WHERE configuration_key LIKE ':configurationKey:%' GROUP BY configuration_group_id";
  $sql = $db->bindVars($sql, ':configurationKey:', $module_name, 'noquotestring');
  $check = $db->Execute($sql);
  if ($check->RecordCount() < 1) {
    $sql = "INSERT INTO " . TABLE_CONFIGURATION_GROUP . " (configuration_group_title, configuration_group_description, sort_order, visible) VALUES (':configurationGroupTitle:', 'Set :configurationGroupTitle: Options', '1', '1')";
    $sql = $db->bindVars($sql, ':configurationGroupTitle:', $module_name, 'noquotestring');
    $db->Execute($sql);
    $configuration_group_id = $db->Insert_ID();
    $sql = "UPDATE " . TABLE_CONFIGURATION_GROUP . " SET sort_order = :configurationGroupID: WHERE configuration_group_id = :configurationGroupID:";
    $sql = $db->bindVars($sql, ':configurationGroupID:', $configuration_group_id, 'integer');
    $db->Execute($sql);
  } elseif ($check->RecordCount() == 1) {
    $configuration_group_id = $check->fileds['configuration_group_id'];
  } elseif ($check->RecordCount() > 1) {
    while (!$check->EOF) {
      if (!isset($configuration_group_id)) {
        $configuration_group_id = $check->fields['configuration_group_id'];
      } else {
        $sql = "SELECT * FROM " . TABLE_CONFIGURATION . " WHERE configuration_group_id = :configurationGroupID:";
        $sql = $db->bindVars($sql, ':configurationGroupID:', $check->fields['configuration_group_id'], 'integer');
        $config = $db->Execute($sql);
        $sql = "UPDATE " . TABLE_CONFIGURATION . " SET configuration_group_id = :configurationGroupIDnew: WHERE configuration_group_id = :configurationGroupIDold:";
        $sql = $db->bindVars($sql, ':configurationGroupIDnew:', $configuration_group_id, 'integer');
        $sql = $db->bindVars($sql, ':configurationGroupIDold:', $check->fields['configuration_group_id'], 'integer');
        $db->Execute($sql);
        $sql = "DELETE FROM " . TABLE_CONFIGURATION_GROUP . " WHERE configuration_group_id = :configurationGroupIDold:";
        $sql = $db->bindVars($sql, ':configurationGroupIDold:', $check->fields['configuration_group_id'], 'integer');
        $db->Execute($sql);
      }
      $check->MoveNext();
    }
  }
  $sql = "INSERT INTO " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, last_modified, date_added, use_function, set_function) VALUES ('Version', :configurationKey:, '0.0.0', 'Indicates the currently installed version of CSAR.', :configurationGroupID:, 0, NOW(), NOW(), NULL, NULL)";
  $sql = $db->bindVars($sql, ':configurationKey:', $module_constant, 'string');
  $sql = $db->bindVars($sql, ':configurationGroupID:', $configuration_group_id, 'integer');
  $db->Execute($sql);
}

$installers = glob($module_installer_directory . '/*.php');
foreach ($installers as $i => $file) {
  $file = basename($file);
  $installers[$i] = substr($file, 0, strpos($file, '.php'));
}
natsort($installers);

$newest_version = end($installers);

//echo '<pre>';var_dump($newest_version, $current_version, version_compare($newest_version, $current_version));echo '</pre>';

if (version_compare($newest_version, $current_version) > 0) {
  require_once(DIR_WS_MODULES . 'sitemapxml_install.php');
  require_once(DIR_WS_CLASSES . 'ext_modules.php');
  foreach ($installers as $installer) {
    if (version_compare($newest_version, $installer) >= 0 && version_compare($current_version, $installer) < 0) {
      include($module_installer_directory . '/' . $installer . '.php');
      $current_version = str_replace("_", ".", $installer);
      $sql = "UPDATE " . TABLE_CONFIGURATION . " SET configuration_value = :configurationValue:, last_modified=NOW() WHERE configuration_key = :configurationKey:";
      $sql = $db->bindVars($sql, ':configurationValue:', $current_version, 'string');
      $sql = $db->bindVars($sql, ':configurationKey:', $module_constant, 'string');
      $db->Execute($sql);
      $messageStack->add("Installed " . $module_name . " v" . $current_version, 'success');
    }
  }

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
$admin_page = 'sitemapxmlConfig';
if (!zen_page_key_exists($admin_page)) {
  if ((int)$configuration_group_id > 0) {
    zen_register_admin_page($admin_page,
                            'BOX_CONFIGURATION_SITEMAPXML',
                            'FILENAME_CONFIGURATION',
                            'gID=' . $configuration_group_id,
                            'configuration',
                            'Y',
                            $configuration_group_id);
    $messageStack->add('Successfully enabled Sitemap XML Configuration Menu.', 'success');
  }
}

if (!function_exists('plugin_version_check_for_updates')) {
  function plugin_version_check_for_updates($fileid = 0, $version_string_to_check = '') {
    if ($fileid == 0){
        return FALSE;
    }
    $new_version_available = FALSE;
    $lookup_index = 0;
    $url = 'https://www.zen-cart.com/downloads.php?do=versioncheck' . '&id=' . (int) $fileid;
    $data = json_decode(file_get_contents($url), true);
    if (!$data || !is_array($data)) return false;
    // compare versions
    if (version_compare($data[$lookup_index]['latest_plugin_version'], $version_string_to_check) > 0) {
        $new_version_available = TRUE;
    }
    // check whether present ZC version is compatible with the latest available plugin version
    if (!in_array('v' . PROJECT_VERSION_MAJOR . '.' . PROJECT_VERSION_MINOR, $data[$lookup_index]['zcversions'])) {
        $new_version_available = FALSE;
    }
    if ($version_string_to_check == true) {
        return $data[$lookup_index];
    } else {
        return FALSE;
    }
  }
}

// Version Checking
if ($zencart_com_plugin_id != 0) {
  $new_version_details = plugin_version_check_for_updates($zencart_com_plugin_id, $current_version);
  if (!empty($_GET['gID']) && $_GET['gID'] == $configuration_group_id && $new_version_details != FALSE) {
      $messageStack->add("Version ".$new_version_details['latest_plugin_version']." of " . $new_version_details['title'] . ' is available at <a href="' . $new_version_details['link'] . '" target="_blank">[Details]</a>', 'caution');
  }
}
