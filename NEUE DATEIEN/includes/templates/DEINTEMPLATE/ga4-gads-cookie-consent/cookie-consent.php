<?php
/**
 * @package GA4/Gads/Cookie Consent
 * @copyright Copyright 2003-2023 Zen Cart Development Team
 * Zen Cart German Version - www.zen-cart-pro.at
 * @copyright Portions Copyright 2003 osCommerce
 * @license https://www.zen-cart-pro.at/license/3_0.txt GNU General Public License V3.0
 * @version $Id: cookie-consent.php 2023-01-25 16:09:51Z webchills $
 */
if (defined('GA4_COOKIE_CONSENT_ENABLED') && GA4_COOKIE_CONSENT_ENABLED === 'true') { ?>
<script type="text/javascript" charset="UTF-8">
document.addEventListener('DOMContentLoaded', function () {
cookieconsent.run({"notice_banner_type":"<?php echo GA4_COOKIE_CONSENT_LAYOUT; ?>","consent_type":"express","palette":"<?php echo GA4_COOKIE_CONSENT_COLOR_PALETTE; ?>","language":"<?php echo $cookieconsentlanguage; ?>","page_load_consent_levels":["strictly-necessary"],"notice_banner_reject_button_hide":true,"preferences_center_close_button_hide":false,"page_refresh_confirmation_buttons":false,"website_name":"<?php echo STORE_NAME; ?>","website_privacy_policy_url":"<?php echo GA4_COOKIE_CONSENT_PRIVACY_PAGE; ?>"});
});
</script>
<noscript>Cookie Consent by <a href="https://www.privacypolicies.com/" rel="noopener">Privacy Policies website</a></noscript>
<?php }