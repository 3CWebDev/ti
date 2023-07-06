<?php

namespace Drupal\custom_blocks\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides a custom Block.
 *
 * @Block(
 *   id = "custom_blocks_account",
 *   admin_label = @Translation("Custom Blocks Account Links"),
 *   category = @Translation("Custom"),
 * )
 */
class CustomBlocksAccount extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {
    $uid = \Drupal::currentUser()->id();
    return array(
      '#theme' => 'custom_blocks_account',
      '#uid' => $uid,
    );
  }
}