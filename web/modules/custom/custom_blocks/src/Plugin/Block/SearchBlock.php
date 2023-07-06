<?php

namespace Drupal\custom_blocks\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides a custom Block.
 *
 * @Block(
 *   id = "custom_blocks_search",
 *   admin_label = @Translation("Custom Search Block"),
 *   category = @Translation("Custom"),
 * )
 */
class SearchBlock extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {
    $form = \Drupal::formBuilder()->getForm('Drupal\custom_blocks\Form\SearchForm');
    return $form;
  }
}