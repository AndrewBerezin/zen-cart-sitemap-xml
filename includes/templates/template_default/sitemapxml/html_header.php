<?php
/**
 * Common Template
 *
 * outputs the html header. i,e, everything that comes before the \</head\> tag <br />
 *
 * @package templateSystem
 * @copyright Copyright 2003-2006 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: html_header.php 6948 2007-09-02 23:30:49Z drbyte $
 */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php echo HTML_PARAMS; ?>>
<head>
<title><?php echo HEADING_TITLE; ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo CHARSET; ?>" />
<meta http-equiv="imagetoolbar" content="no" />
<?php if (defined('FAVICON')) { ?>
<link rel="icon" href="<?php echo FAVICON; ?>" type="image/x-icon" />
<link rel="shortcut icon" href="<?php echo FAVICON; ?>" type="image/x-icon" />
<?php } //endif FAVICON ?>

<base href="<?php echo (($request_type == 'SSL') ? HTTPS_SERVER . DIR_WS_HTTPS_CATALOG : HTTP_SERVER . DIR_WS_CATALOG ); ?>" />

</head>
<?php // NOTE: Blank line following is intended: ?>

