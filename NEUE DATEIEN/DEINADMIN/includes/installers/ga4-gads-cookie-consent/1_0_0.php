<?php
/**
 * @package GA4/Gads/Cookie Consent
 * @copyright Copyright 2003-2023 Zen Cart Development Team
 * Zen Cart German Version - www.zen-cart-pro.at
 * @copyright Portions Copyright 2003 osCommerce
 * @license https://www.zen-cart-pro.at/license/3_0.txt GNU General Public License V3.0
 * @version $Id: 1_0_0.php 2023-01-28 09:47:51Z webchills $
 */


$db->Execute(" SELECT @gid:=configuration_group_id
FROM ".TABLE_CONFIGURATION_GROUP."
WHERE configuration_group_title= 'GA4/Google Ads/Cookie Consent'
LIMIT 1;");

$db->Execute("INSERT IGNORE INTO ".TABLE_CONFIGURATION." (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added, use_function, set_function) VALUES
('Enable Cookie Consent', 'GA4_COOKIE_CONSENT_ENABLED', 'false', 'Set to true to enable the cookie consent banner', @gid, 1, NOW(), NULL, 'zen_cfg_select_option(array(\'true\', \'false\'),'),
('Cookie Consent Layout', 'GA4_COOKIE_CONSENT_LAYOUT', 'interstitial', 'Choose your notice banner layout between:<br>interstitial = The banner is placed in a kind of lightbox over the upper part of the page. A surfing in the store is not possible, as long as no cookie selection was made. This is the recommended default<br>simple = The banner is placed over the lower right area and remains visible until a cookie selection was made<br>headline = The banner is displayed in the upper part of the page and moves the remaining content down<br>standalone = The banner replaces the page completely', @gid, 2, NOW(), NULL, 'zen_cfg_select_option(array(\'interstitial\', \'simple\', \'headline\', \'standalone\'),'),
('Cookie Consent Color Palette', 'GA4_COOKIE_CONSENT_COLOR_PALETTE', 'light', 'Choose a color scheme for your banner layout between light and dark', @gid, 3, NOW(), NULL, 'zen_cfg_select_option(array(\'light\', \'dark\'),'),
('Cookie Consent Privacy Page', 'GA4_COOKIE_CONSENT_PRIVACY_PAGE', 'https://www.meinshop.de/index.php?main_page=privacy', 'Enter the link to your Privaxy Policy page', @gid, 4, NOW(), NULL, NULL),
('Enable Google Analytics GA4', 'GA4_ENABLED', 'false', 'Set to true to enable Google Analytics GA4 Tracking', @gid, 5, NOW(), NULL, 'zen_cfg_select_option(array(\'true\', \'false\'),'),
('Enable Google Ads Conversion Tracking', 'GA4_GADS_ENABLED', 'false', 'Set to true to enable Google Ads Conversion Tracking', @gid, 6, NOW(), NULL, 'zen_cfg_select_option(array(\'true\', \'false\'),'),
('Google Analytics GA4 ID', 'GA4_ID', 'G-1234567', 'Enter your Google Analytics GA4 ID<br>Note: Google Analytics 4-Properties (GA4-Properties) have an ID that starts with G- and no tracking ID that starts with UA-.<br>', @gid, 7, NOW(), NULL, NULL),
('Google Ads ID', 'GA4_GADS_ID', 'AW-1234567', 'Enter your Google Ads Tag ID<br>Note: This ID normally starts with AW-.<br>', @gid, 8, NOW(), NULL, NULL),
('Google Ads Conversion Label', 'GA4_GADS_LABEL', 'a1b2C3d4E5F6g7h8i9j', 'Enter your Google Ads Conversion Label.<br>Note: This value normally consists of around 20 alphanumeric characters.<br>', @gid, 9, NOW(), NULL, NULL);");

$db->Execute("REPLACE INTO ".TABLE_CONFIGURATION_LANGUAGE." (configuration_title, configuration_key, configuration_description, configuration_language_id) VALUES
('Cookie Consent Banner aktivieren?', 'GA4_COOKIE_CONSENT_ENABLED', 'Stellen Sie auf true, um die Cookie Consent Abfrage zu aktivieren.', 43),
('Cookie Consent Banner Layout', 'GA4_COOKIE_CONSENT_LAYOUT', 'Wählen Sie ein Layout für den Cookie Consent Banner:<br>interstitial = Der Banner legt sich in einer Art Lightbox über den oberen Teil der Seite. Ein Surfen im Shop ist nicht möglich, solange keine Cookieauswahl getroffen wurde. Das ist die empfohlene Voreinstellung<br>simple = Der Banner legt sich über den rechten unteren Bereich und bleibt solange sichtbar bis eine Cookieauswahl getroffen wurde<br>headline = Der Banner wird im oberen Teil der Seite angezeigt und verschiebt den restlichen Inhalt nach unten<br>standalone = Der Banner ersetzt die Seite komplett', 43),
('Cookie Consent Banner Farbschema', 'GA4_COOKIE_CONSENT_COLOR_PALETTE', 'Wählen Sie ein Farbschema light oder dark:', 43),
('Cookie Consent Datenschutz Seite', 'GA4_COOKIE_CONSENT_PRIVACY_PAGE', 'Geben Sie hier die URL zur Datenschutzerklärung Ihres Shops ein:', 43),
('Google Analytics GA4 aktivieren?', 'GA4_ENABLED', 'Stellen Sie auf true, um Google Analytics GA4 Tracking zu aktivieren.', 43),
('Google Ads Conversion Tracking aktivieren?', 'GA4_GADS_ENABLED', 'Stellen Sie auf true, um Google Ads Conversion Tracking zu aktivieren.', 43),
('Google Analytics GA4 ID', 'GA4_ID', 'Geben Sie Ihre Google Analytics GA4 ID ein.<br>Hinweis: Google Analytics 4-Properties (GA4-Properties) haben eine ID, die mit G- beginnt, und keine Tracking-ID, die mit UA- beginnt.<br>', 43),
('Google Ads ID', 'GA4_GADS_ID', 'Geben Sie Ihre Google Ads Tag ID ein<br>Hinweis: Diese ID beginnt normalerweise mit AW-.', 43),
('Google Ads Conversion Label', 'GA4_GADS_LABEL', 'Geben Sie Ihr Google Ads Conversion Label ein.<br>Hinweis: Dieser Wert besteht normalerweise aus etwa 20 alphanumerischen Zeichen.<br>', 43)");

$admin_page = 'configGA4GADSCOOKIECONSENT';
// delete configuration menu
$db->Execute("DELETE FROM " . TABLE_ADMIN_PAGES . " WHERE page_key = '" . $admin_page . "' LIMIT 1;");
// add configuration menu
if (!zen_page_key_exists($admin_page)) {
$db->Execute(" SELECT @gid:=configuration_group_id
FROM ".TABLE_CONFIGURATION_GROUP."
WHERE configuration_group_title= 'GA4/Google Ads/Cookie Consent'
LIMIT 1;");

$db->Execute("INSERT IGNORE INTO " . TABLE_ADMIN_PAGES . " (page_key,language_key,main_page,page_params,menu_key,display_on_menu,sort_order) VALUES 
('configGA4GADSCOOKIECONSENT','BOX_CONFIGURATION_GA4GADSCOOKIECONSENT','FILENAME_CONFIGURATION',CONCAT('gID=',@gid),'configuration','Y',@gid)");
$messageStack->add('GA4/Google Ads/Cookie Consent Konfiguration erfolgreich hinzugefügt.', 'success');  
}