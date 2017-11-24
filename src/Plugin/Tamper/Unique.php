<?php

namespace Drupal\tamper\Plugin\Tamper;

use Drupal\tamper\TamperBase;

/**
 * Plugin implementation for unique tamper.
 *
 * @Tamper(
 *   id = "unique",
 *   label = @Translation("Unique"),
 *   description = @Translation("Makes the elements in a multivalued field unique."),
 *   category = "List"
 * )
 */
class Unique extends TamperBase {

  /**
   * {@inheritdoc}
   */
  public function tamperMultipleValues(array $data) {
    return array_values(array_unique($data));
  }

  /**
   * {@inheritdoc}
   */
  public function tamperSingleValue($data) {
    // Convert to an array so that the plugin can handle this.
    return $this->tamperMultipleValues([$data]);
  }

}
