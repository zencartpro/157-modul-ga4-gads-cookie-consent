<?php 
/**
 * @package GA4/Gads/Cookie Consent
 * @copyright Copyright 2003-2023 Zen Cart Development Team
 * Zen Cart German Version - www.zen-cart-pro.at
 * @copyright Portions Copyright 2003 osCommerce
 * @license https://www.zen-cart-pro.at/license/3_0.txt GNU General Public License V3.0
 * @version $Id: ga4-conversions.php 2023-02-07 18:25:51Z webchills $
 */
 
if (defined('GA4_CONVERSIONS_ENABLED') && GA4_CONVERSIONS_ENABLED === 'true') { ?>
<?php if (isset($_SESSION['ga4']) ) { ?>  
    
<?php
    $gtagCustomerID = ( isset($_SESSION['customer_id']) ) ? "customerID#".$_SESSION['customer_id'] : "guest";
    $ga4 = $_SESSION['ga4'];
    if ( $ga4['action'] == 'purchase' && count($ga4['items']) >= 1 ){ ?>
    <?php if (defined('GA4_COOKIE_CONSENT_ENABLED') && GA4_COOKIE_CONSENT_ENABLED === 'true'){ ?>
    	<script type="text/plain" cookie-consent="tracking">
    	<?php } else { ?>
      <script>
      <?php } ?>
      <?php  
        $thisGtag  = "gtag('event', 'purchase', {" . PHP_EOL;
        $thisGtag .= '"transaction_id": "' . $ga4['transaction']['transaction_id'] . '",' . PHP_EOL;
        $thisGtag .= '"affiliation": "' . addslashes($ga4['transaction']['affiliation']) . '",' . PHP_EOL;
        $thisGtag .= '"value": ' . $ga4['transaction']['revenue'] . ',' . PHP_EOL;
        $thisGtag .= '"shipping": ' . $ga4['transaction']['shipping'] . ',' . PHP_EOL;
        $thisGtag .= '"currency": "' . $ga4['transaction']['currency'] . '",' . PHP_EOL;
        $thisGtag .= '"items": [' . PHP_EOL;      
        $isFirst = true;
        $gtagItemTracking = '';
        foreach ( $ga4['items'] as $item ) {
          $thisGtag .= ( $isFirst ? '' : ',') . PHP_EOL;
          $thisGtag .= '{"item_id": "' . $item['item_id'] . '",' . PHP_EOL;
          $thisGtag .= '"item_name": "' . addslashes($item['item_name']) . '",' . PHP_EOL;
          $thisGtag .= '"item_category": "' . addslashes($item['item_category']) . '",' . PHP_EOL;
          $thisGtag .= '"list_position": "' . $item['position'] . '",' . PHP_EOL;
          $thisGtag .= '"item_variant": "' . addslashes($item['item_variant']) . '",' . PHP_EOL;
          $thisGtag .= '"price": ' . $item['price'] . ',' . PHP_EOL;
          $thisGtag .= '"quantity":' . $item['quantity']  . PHP_EOL; 
          $thisGtag .= '}' . PHP_EOL;
          $isFirst = false;
        }
        $thisGtag .= ']});' . PHP_EOL;
        echo $thisGtag;
      ?>
      </script>
  <?php } ?>
   <?php
     unset($_SESSION['ga4']);
    ?>
<?php } ?>
<?php } ?>