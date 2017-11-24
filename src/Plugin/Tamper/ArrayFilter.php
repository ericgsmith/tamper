<?php

namespace Drupal\tamper\Plugin\Tamper;

use Drupal\tamper\TamperBase;

/**
 * Plugin implementation for filtering data.
 *
 * @Tamper(
 *   id = "array_filter",
 *   label = @Translation("Filter items"),
 *   description = @Translation("Filter empty items from a list."),
 *   category = "List"
 * )
 */
class ArrayFilter extends TamperBase {

  /**
   * {@inheritdoc}
   */
  public function tamperMultipleValues(array $data) {
    return array_values(array_filter($data));
  }

  /**
   * {@inheritdoc}
   */
  public function tamperSingleValue($data) {
    // Convert to an array so that the plugin can handle this.
    return $this->tamperMultipleValues([$data]);
  }

}
