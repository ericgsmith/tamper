<?php

namespace Drupal\tamper;

use Drupal\Core\Form\FormStateInterface;

/**
 * Provides a configurable base class to tamper data from.
 */
abstract class ConfigurableTamperBase extends TamperBase implements ConfigurableTamperInterface {

  /**
   * {@inheritdoc}
   */
  public function validateConfigurationForm(array &$form, FormStateInterface $form_state) {
  }

  /**
   * {@inheritdoc}
   */
  public function submitConfigurationForm(array &$form, FormStateInterface $form_state) {
  }

}
