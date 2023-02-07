<?php
/**
 * @package GA4/Gads/Cookie Consent
 * @copyright Copyright 2003-2023 Zen Cart Development Team
 * Zen Cart German Version - www.zen-cart-pro.at
 * @copyright Portions Copyright 2003 osCommerce
 * @license https://www.zen-cart-pro.at/license/3_0.txt GNU General Public License V3.0
 * @version $Id: 1_1_0.php 2023-02-07 18:25:51Z webchills $
 */

$db->Execute(" SELECT @gid:=configuration_group_id
FROM ".TABLE_CONFIGURATION_GROUP."
WHERE configuration_group_title= 'GA4/Google Ads/Cookie Consent'
LIMIT 1;");

$db->Execute("INSERT IGNORE INTO ".TABLE_CONFIGURATION." (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added, use_function, set_function) VALUES
('Enable Google Analytics GA4 Conversion Tracking', 'GA4_CONVERSIONS_ENABLED', 'false', 'Set to true to enable the conversion tracking for GA4. If set to true on the checkout success page the event purchase with the appropiate values will be transmitted to Google Analytics GA4.', @gid, 6, NOW(), NULL, 'zen_cfg_select_option(array(\'true\', \'false\'),');");
$db->Execute("REPLACE INTO ".TABLE_CONFIGURATION_LANGUAGE." (configuration_title, configuration_key, configuration_description, configuration_language_id) VALUES
('Google Analytics GA4 Conversion Tracking aktivieren?', 'GA4_CONVERSIONS_ENABLED', 'Stellen Sie auf true, um das Conversion Tracking für Google Analytics GA4 zu aktivieren. Falls aktiviert wird auf der checkout_success Seite das Event purchase mit den entsprechenden Werten an Google Analytics übergeben.', 43)");
$db->Execute("UPDATE " . TABLE_CONFIGURATION . " SET configuration_value = '1.1.0' WHERE configuration_key = 'GA4_MODUL_VERSION';");