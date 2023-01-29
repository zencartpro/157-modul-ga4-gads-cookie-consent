<?php
/**
 * @package GA4/Gads/Cookie Consent
 * @copyright Copyright 2003-2023 Zen Cart Development Team
 * Zen Cart German Version - www.zen-cart-pro.at
 * @copyright Portions Copyright 2003 osCommerce
 * @license https://www.zen-cart-pro.at/license/3_0.txt GNU General Public License V3.0
 * @version $Id: ga4-gads-cookie-consent.php 2023-01-29 05:57:51Z webchills $
 */
?>
<?php if (defined('GA4_COOKIE_CONSENT_ENABLED') && GA4_COOKIE_CONSENT_ENABLED === 'true'){ ?>
<?php 
// Falls Sie im Shop weitere Sprachen als deutsch, englisch, französisch, italienisch oder spanisch aktiv haben, erweitern Sie die folgende Liste entsprechend
$cookieconsentlanguage='en';
if ($_SESSION['language']=='german') {$cookieconsentlanguage='de';} 
if ($_SESSION['language']=='french') {$cookieconsentlanguage='fr';}
if ($_SESSION['language']=='italian') {$cookieconsentlanguage='it';}
if ($_SESSION['language']=='spanish') {$cookieconsentlanguage='es';}
?>
<?php if ($current_page_base!='privacy' && $current_page_base!='conditions' && $current_page_base!='impressum' && $current_page_base!='down_for_maintenance') { ?>
<!-- Cookie Consent by PrivacyPolicies.com https://www.PrivacyPolicies.com -->
<script src="<?php  echo $template->get_template_dir('',DIR_WS_TEMPLATE, $current_page_base,'ga4-gads-cookie-consent').'/cookie-consent.js'?>"></script>
<?php require(DIR_WS_TEMPLATE . 'ga4-gads-cookie-consent/cookie-consent.php');?>
<!-- End Cookie Consent by PrivacyPolicies.com https://www.PrivacyPolicies.com -->
<?php } ?>
<?php } ?>
<?php 
if (defined('GA4_ENABLED') && GA4_ENABLED === 'true') {
	require(DIR_WS_TEMPLATE . 'ga4-gads-cookie-consent/optout.php');
}
?>
<?php 
if (defined('GA4_ENABLED') && GA4_ENABLED === 'true') {
	require(DIR_WS_TEMPLATE . 'ga4-gads-cookie-consent/ga4.php');
}
?>
<?php 
if (defined('GA4_GADS_ENABLED') && GA4_GADS_ENABLED === 'true') {
	require(DIR_WS_TEMPLATE . 'ga4-gads-cookie-consent/gads.php');
}
?>