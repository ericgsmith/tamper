<?php

namespace Drupal\tamper\Plugin\Tamper;

use Drupal\Core\Form\FormStateInterface;
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
  public function settingsForm(array $form, FormStateInterface $form_state) {
    return $form;
  }

  /**
   * Returns a short summary for the current tamper settings.
   *
   * If an empty result is returned, a UI can still be provided to display
   * a settings form in case the tamper has configurable settings.
   *
   * @return string[]
   *   A short summary of the tamper settings.
   */
  public function settingsSummary() {
    return [];
  }

  /**
   * {@inheritdoc}
   */
  public function tamperMultipleValues($data) {
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
