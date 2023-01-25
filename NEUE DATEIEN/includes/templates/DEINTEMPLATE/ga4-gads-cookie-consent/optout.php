<?php
/**
 * @package GA4/Gads
 * @copyright Copyright 2003-2023 Zen Cart Development Team
 * Zen Cart German Version - www.zen-cart-pro.at
 * @copyright Portions Copyright 2003 osCommerce
 * @license https://www.zen-cart-pro.at/license/3_0.txt GNU General Public License V3.0
 * @version $Id: jscript_gads_conversion.php 2023-01-24 17:56:51Z webchills $
 */
if (defined('GA4_ENABLED') && GA4_ENABLED === 'true') { ?>
<script>
var gaProperty = '<?php echo GA4_ID; ?>';
var disableStr = 'ga-disable-' + gaProperty;
if (document.cookie.indexOf(disableStr + '=true') > -1) { window[disableStr] = true;
}
function gaOptout() {
document.cookie = disableStr + '=true; expires=Thu, 31 Dec 2099 23:59:59 UTC; path=/';
window[disableStr] = true; }
</script>    
<?php }