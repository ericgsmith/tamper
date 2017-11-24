<?php

namespace Drupal\tamper\Plugin\Tamper;

use Drupal\Core\Form\FormStateInterface;
use Drupal\tamper\ConfigurableTamperBase;

/**
 * Plugin implementation of the explode plugin.
 *
 * @Tamper(
 *   id = "implode",
 *   label = @Translation("Implode"),
 *   description = @Translation("Converts an array to a string."),
 *   category = "List"
 * )
 */
class Implode extends ConfigurableTamperBase {

  const SETTING_GLUE = 'glue';

  /**
   * {@inheritdoc}
   */
  public function defaultConfiguration() {
    $config = parent::defaultConfiguration();
    $config[self::SETTING_GLUE] = ',';
    return $config;
  }

  /**
   * {@inheritdoc}
   */
  public function buildConfigurationForm(array $form, FormStateInterface $form_state) {
    $form[self::SETTING_GLUE] = [
      '#type' => 'textfield',
      '#title' => $this->t('String glue'),
      '#default_value' => $this->getSetting(self::SETTING_GLUE),
      '#description' => $this->t('Join array elements into a string. For example,
      array(\'a\', \'b\', \'c\') would become "a, b, c". A space can be
      represented by %s, tabs by %t, and newlines by %n.'),
    ];

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function submitConfigurationForm(array &$form, FormStateInterface $form_state) {
    parent::submitConfigurationForm($form, $form_state);
    $this->setConfiguration([self::SETTING_GLUE => $form_state->getValue(self::SETTING_GLUE)]);
  }

  /**
   * {@inheritdoc}
   */
  public function tamperMultipleValues(array $data) {
    $glue = str_replace(['%s', '%t', '%n'], [' ', "\t", "\n"], $this->getSetting(self::SETTING_GLUE));
    return implode($glue, $data);
  }

  /**
   * {@inheritdoc}
   */
  public function tamperSingleValue($data) {
    // Convert to an array so that the plugin can handle this.
    return $this->tamperMultipleValues([$data]);
  }

}
