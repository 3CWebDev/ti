<?php

namespace Drupal\custom_blocks\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides a custom Block.
 *
 * @Block(
 *   id = "custom_blocks_ctas_first",
 *   admin_label = @Translation("Call to Actions Block (first)"),
 *   category = @Translation("Custom"),
 * )
 */
class CtasFirstBlock extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {
    $current_path = \Drupal::service('path.current')->getPath();
    return array(
        '#theme' => 'custom_blocks_ctas_first',
        '#destination' => $current_path,
    );
  }
}