<?php

namespace Drupal\tamper;

use Drupal\Component\Plugin\ConfigurablePluginInterface;
use Drupal\Component\Plugin\PluginInspectionInterface;
use Drupal\Core\Form\FormStateInterface;

/**
 * Interface definition for tamper plugins.
 */
interface TamperInterface extends PluginInspectionInterface, ConfigurablePluginInterface {

  /**
   * Returns a form to configure settings for the tamper.
   *
   * @todo: Invoked from *TBC*
   *
   * @param array $form
   *   The form where the settings form is being included in.
   * @param \Drupal\Core\Form\FormStateInterface $form_state
   *   The current state of the form.
   *
   * @return array
   *   The form elements for the tamper settings.
   */
  public function settingsForm(array $form, FormStateInterface $form_state);

  /**
   * Returns a short summary for the current tamper settings.
   *
   * If an empty result is returned, a UI can still be provided to display
   * a settings form in case the tamper has configurable settings.
   *
   * @return string[]
   *   A short summary of the tamper settings.
   */
  public function settingsSummary();

  /**
   * Tamper data.
   *
   * Performs the operations on the data to transform it.
   *
   * @param mixed $data
   *   The data to tamper.
   *
   * @return mixed
   *   The tampered data.
   */
  public function tamper($data);

}
