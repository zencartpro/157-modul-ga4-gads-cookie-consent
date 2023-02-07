<?php
/**
 * @package GA4/Gads/Cookie Consent
 * @copyright Copyright 2003-2023 Zen Cart Development Team
 * Zen Cart German Version - www.zen-cart-pro.at
 * @copyright Portions Copyright 2003 osCommerce
 * @license https://www.zen-cart-pro.at/license/3_0.txt GNU General Public License V3.0
 * @version $Id: gads.php 2023-02-07 16:19:51Z webchills $
 */
if (defined('GA4_GADS_ENABLED') && GA4_GADS_ENABLED === 'true') { ?>
<?php if (defined('GA4_COOKIE_CONSENT_ENABLED') && GA4_COOKIE_CONSENT_ENABLED === 'true'){ ?>
<script type="text/plain" data-cookie-consent="targeting" async src="https://www.googletagmanager.com/gtag/js?id=<?php echo GA4_GADS_ID; ?>"></script>
<script type="text/plain" data-cookie-consent="targeting">
<?php } else { ?>
<script async src="https://www.googletagmanager.com/gtag/js?id=<?php echo GA4_GADS_ID; ?>"></script>
<script>	
<?php } ?>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());
  gtag('config', '<?php echo GA4_GADS_ID; ?>');
</script>
<?php }