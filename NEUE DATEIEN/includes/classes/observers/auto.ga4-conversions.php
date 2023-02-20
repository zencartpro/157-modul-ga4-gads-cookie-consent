<?php 
/**
 * @package GA4/Gads/Cookie Consent
 * @copyright Copyright 2003-2023 Zen Cart Development Team
 * Zen Cart German Version - www.zen-cart-pro.at
 * @copyright Portions Copyright 2003 osCommerce
 * @license https://www.zen-cart-pro.at/license/3_0.txt GNU General Public License V3.0
 * @version $Id: auto.ga4-conversions.php 2023-02-20 16:49:51Z webchills $
 */

 class zcObserverGA4Conversions extends base { 

  function __construct() {  
    $this->attach($this, array('NOTIFY_HEADER_START_CHECKOUT_SUCCESS'));  
  }

  public function update(&$callingClass, $notifier, $paramsArray) {
  
    global $db, $ga4;

    switch ($notifier) {
      case 'NOTIFY_HEADER_START_CHECKOUT_SUCCESS': //  All Checkout complete/successful 
        
        $order_summary = !empty($_SESSION['order_summary']) ? $_SESSION['order_summary'] : array(); 
        // prevent execution and error logs if the customer refreshes the checkout_success page and $_SESSION['order_summary'] is not available anymore
        if (!empty($_SESSION['order_summary'])){
        $coupon = isset($order_summary['coupon_code']) ? $order_summary['coupon_code'] : "n/a";
        
        $ga4['transaction'] = array('transaction_id' => (string)$order_summary['order_number'],
                                          'affiliation' => $order_summary['shipping_method'],
                                          'revenue'  => number_format($order_summary['order_total'],2,'.',''),
                                          'tax'  => number_format($order_summary['tax'],2,'.',''),
                                          'shipping'  => number_format($order_summary['shipping'],2,'.',''),
                                          'currency'  => $order_summary['currency_code']
                                        );
        
        $items_query = "SELECT DISTINCT orders_products_id, products_id, products_name, products_model, final_price, products_tax, products_quantity
                        FROM " . TABLE_ORDERS_PRODUCTS . " WHERE orders_id = :ordersID ORDER BY products_name";

        $items_query = $db->bindVars($items_query, ':ordersID', $order_summary['order_number'], 'integer');
        $items_in_cart = $db->Execute($items_query);
        
        $i = 0 ; 
        
        while (!$items_in_cart->EOF) {          
          $variant = $db->Execute("SELECT products_options_values FROM " . TABLE_ORDERS_PRODUCTS_ATTRIBUTES . " WHERE orders_products_id = " . (string)$items_in_cart->fields['orders_products_id']);
          if (!empty ($variant->fields['products_options_values'])){
          $variantTxt = $variant->fields['products_options_values'];	
          } else {
          $variantTxt = 'n/a';          
          }
          $ga4['items'][] = array('item_id' => $items_in_cart->fields['products_id'],
                                        'item_name' => $items_in_cart->fields['products_name'],                                        
                                        'item_category' => zen_get_categories_name_from_product($items_in_cart->fields['products_id']),
                                        'item_variant' => $variantTxt,
                                        'price' => number_format($items_in_cart->fields['final_price'] + ($items_in_cart->fields['final_price'] *  $items_in_cart->fields['products_tax'] / 100 ),2,'.',''),
                                        'quantity' => $items_in_cart->fields['products_quantity'],
                                        'coupon' => $coupon,
                                        'position' => $i + 1);
          $i++;
          $items_in_cart->MoveNext();
        }
        $ga4['action'] = "purchase";
        break;
       }
      default:   
      $notifyArr = explode("_", $notifier, 2);
      $ga4['action'] = ucwords(strtolower(str_replace("_", " ", $notifyArr[1])));
    }
    $_SESSION['ga4'] = $ga4;  
  }  
}