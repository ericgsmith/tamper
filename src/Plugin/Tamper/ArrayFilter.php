<?php

namespace Drupal\tamper\Plugin\Tamper;

use Drupal\Core\Form\FormStateInterface;
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
