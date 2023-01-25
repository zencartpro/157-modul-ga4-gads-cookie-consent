<?php
/**
 * @package GA4/Gads/Cookie Consent
 * @copyright Copyright 2003-2023 Zen Cart Development Team
 * Zen Cart German Version - www.zen-cart-pro.at
 * @copyright Portions Copyright 2003 osCommerce
 * @license https://www.zen-cart-pro.at/license/3_0.txt GNU General Public License V3.0
 * @version $Id: ga4.php 2023-01-25 14:56:51Z webchills $
 */
if (defined('GA4_ENABLED') && GA4_ENABLED === 'true') { ?>
<?php if (defined('GA4_COOKIE_CONSENT_ENABLED') && GA4_COOKIE_CONSENT_ENABLED === 'true'){ ?>
<script type="text/plain" cookie-consent="tracking" async src="https://www.googletagmanager.com/gtag/js?id=<?php echo GA4_ID; ?>"></script>
<script type="text/plain" cookie-consent="tracking">
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());
  gtag('config', '<?php echo GA4_ID; ?>', { 'anonymize_ip': true });
</script>
<?php } else { ?>
<script async src="https://www.googletagmanager.com/gtag/js?id=<?php echo GA4_ID; ?>"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());
  gtag('config', '<?php echo GA4_ID; ?>', { 'anonymize_ip': true });
</script>
<?php } ?>
<?php }