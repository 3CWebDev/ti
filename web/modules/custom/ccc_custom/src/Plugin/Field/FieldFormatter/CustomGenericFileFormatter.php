<?php

namespace Drupal\ccc_custom\Plugin\Field\FieldFormatter;

use Drupal\file\Plugin\Field\FieldFormatter\GenericFileFormatter;
use Drupal\Core\Field\FieldItemListInterface;
use Drupal\Core\Cache\Cache;

/**
 * Plugin implementation of the 'custom_generic_file' formatter.
 *
 * @FieldFormatter(
 *   id = "custom_generic_file",
 *   label = @Translation("Generic file Custom"),
 *   field_types = {
 *     "file"
 *   }
 * )
 */
class CustomGenericFileFormatter extends GenericFileFormatter   {

  /**
   * {@inheritdoc}
   */
  public function viewElements(FieldItemListInterface $items, $langcode) {
    $elements = [];

    foreach ($this->getEntitiesToView($items, $langcode) as $delta => $file) {
      $item = $file->_referringItem;

      $elements[$delta] = [
        '#theme' => 'file_link_custom',
        '#file' => $file,
        '#url' => file_create_url($file->uri->getString()),
        '#description' => $this->getSetting('use_description_as_link_text') ? $item->description : NULL,
        '#cache' => [
          'tags' => $file->getCacheTags(),
        ],
      ];

      // Pass field item attributes to the theme function.
      if (isset($item->_attributes)) {
        $elements[$delta] += ['#attributes' => []];
        $elements[$delta]['#attributes'] += $item->_attributes;
        // Unset field item attributes since they have been included in the
        // formatter output and should not be rendered in the field template.
        unset($item->_attributes);
      }
    }

    return $elements;
  }

}
