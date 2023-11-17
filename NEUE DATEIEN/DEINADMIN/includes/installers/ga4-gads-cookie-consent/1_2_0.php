<?php
/**
 * @package GA4/Gads/Cookie Consent
 * @copyright Copyright 2003-2023 Zen Cart Development Team
 * Zen Cart German Version - www.zen-cart-pro.at
 * @copyright Portions Copyright 2003 osCommerce
 * @license https://www.zen-cart-pro.at/license/3_0.txt GNU General Public License V3.0
 * @version $Id: 1_1_1.php 2023-11-17 18:25:51Z webchills $
 */

$db->Execute("UPDATE " . TABLE_CONFIGURATION . " SET configuration_value = '1.1.1' WHERE configuration_key = 'GA4_MODUL_VERSION';");