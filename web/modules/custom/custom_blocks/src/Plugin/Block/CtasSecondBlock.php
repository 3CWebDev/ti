<?php

namespace Drupal\custom_blocks\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides a custom Block.
 *
 * @Block(
 *   id = "custom_blocks_ctas_second",
 *   admin_label = @Translation("Call to Actions Block (second)"),
 *   category = @Translation("Custom"),
 * )
 */
class CtasSecondBlock extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {
    $current_path = \Drupal::service('path.current')->getPath();
    return array(
        '#theme' => 'custom_blocks_ctas_second',
        '#destination' => $current_path,
    );
  }
}