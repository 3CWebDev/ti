<?php

namespace Drupal\custom_blocks\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides a custom Block.
 *
 * @Block(
 *   id = "custom_blocks_checkout_complete",
 *   admin_label = @Translation("Custom Blocks Checkout Cmplete"),
 *   category = @Translation("Custom"),
 * )
 */
class CheckoutComplete extends BlockBase {

  public function getCacheMaxAge() {
    return 0;
  }

  /**
   * {@inheritdoc}
   */
  public function build() {

    $path = \Drupal::request()->getpathInfo();
    $arg  = explode('/',$path);

    if (isset($arg[2]) && is_numeric($arg[2])) {

      $order = \Drupal\commerce_order\Entity\Order::load($arg[2]);

      if ($order->getCustomerId() === \Drupal::currentUser()->id()){
        $renderable = array(
          '#theme' => 'commerce_order_receipt',
          '#order_entity' => $order,
        );
      }else{
        $renderable = NULL;
      }

    }else{

    }

    //$current_path = \Drupal::service('path.current')->getPath();

    return array(
      '#cache' => array(
        'contexts' => array('user.roles'),
      ),
      '#theme' => 'custom_blocks_checkout_complete',
      //'#destination' => $current_path,
      //'#order' => \Drupal::service('renderer')->render($renderable),
      '#order' =>  \Drupal::service('renderer')->render($renderable),
    );
  }
}