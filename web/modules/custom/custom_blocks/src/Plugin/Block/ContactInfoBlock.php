<?php

namespace Drupal\custom_blocks\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides a custom Block.
 *
 * @Block(
 *   id = "custom_blocks_contact_info",
 *   admin_label = @Translation("Contact Info Block"),
 *   category = @Translation("Custom"),
 * )
 */
class ContactInfoBlock extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {
    $current_path = \Drupal::service('path.current')->getPath();
    return array(
        '#theme' => 'custom_blocks_contact_info',
        '#destination' => $current_path,
    );
  }
}