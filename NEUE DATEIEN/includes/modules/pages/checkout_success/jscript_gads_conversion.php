<?php
/**
 * @package GA4/Gads/Cookie Consent
 * @copyright Copyright 2003-2023 Zen Cart Development Team
 * Zen Cart German Version - www.zen-cart-pro.at
 * @copyright Portions Copyright 2003 osCommerce
 * @license https://www.zen-cart-pro.at/license/3_0.txt GNU General Public License V3.0
 * @version $Id: jscript_gads_conversion.php 2023-02-07 16:21:51Z webchills $
 */
if (defined('GA4_GADS_ENABLED') && GA4_GADS_ENABLED === 'true') { 
// get customers last order
$find_last_order = "SELECT 
		orders_id, 			
		order_total		
		FROM " . TABLE_ORDERS . " 
		WHERE customers_id = " . (int)$_SESSION['customer_id'] . " 
		ORDER BY orders_id DESC 
		LIMIT 1;";
$last_order = $db->Execute($find_last_order);
if ($last_order->RecordCount() > 0) {	 
?> 
<!-- bof Google Ads Conversion Tracking-->
<?php if (defined('GA4_COOKIE_CONSENT_ENABLED') && GA4_COOKIE_CONSENT_ENABLED === 'true'){ ?>
<script type="text/plain" cookie-consent="targeting">
<?php } else { ?>
<script>
<?php } ?>
  gtag('event', 'conversion', {
      'send_to': '<?php echo GA4_GADS_ID; ?>/<?php echo GA4_GADS_LABEL; ?>',
      'value': <?php echo $last_order->fields['order_total']; ?>,
      'currency': 'EUR',
      'transaction_id': '<?php echo $last_order->fields['orders_id']; ?>'
  });
</script>
<!-- eof Google Ads Conversion Tracking -->
<?php } ?>
<?php } ?>