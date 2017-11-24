<?php

namespace Drupal\tamper\Plugin\Tamper;

use Drupal\Core\Form\FormStateInterface;
use Drupal\tamper\ConfigurableTamperBase;
use Drupal\tamper\Exception\TamperException;

/**
 * Plugin implementation for converting case.
 *
 * @Tamper(
 *   id = "convert_case",
 *   label = @Translation("Convert case"),
 *   description = @Translation("Convert case."),
 *   category = "Text"
 * )
 */
class ConvertCase extends ConfigurableTamperBase {

  const SETTING_OPERATION = 'operation';

  /**
   * {@inheritdoc}
   */
  public function defaultConfiguration() {
    $config = parent::defaultConfiguration();
    $config[self::SETTING_OPERATION] = 'ucfirst';
    return $config;
  }

  /**
   * {@inheritdoc}
   */
  public function buildConfigurationForm(array $form, FormStateInterface $form_state) {
    $form[self::SETTING_OPERATION] = [
      '#type' => 'select',
      '#title' => $this->t('How to convert case'),
      '#options' => $this->getOptions(),
      '#default_value' => $this->getSetting(self::SETTING_OPERATION),
    ];

    return $form;
  }

  /**
   * Get the case conversion options.
   *
   * @return array
   *   List of options, keyed by method on Drupal's unicode class.
   */
  protected function getOptions() {
    return [
      'strtoupper' => $this->t('Convert to uppercase'),
      'strtolower' => $this->t('Convert to lowercase'),
      'ucfirst' => $this->t('Capitalize the first character'),
      'lcfirst' => $this->t('Convert the first character to lowercase'),
      'ucwords' => $this->t('Capitalize the first character of each word'),
    ];
  }

  /**
   * {@inheritdoc}
   */
  protected function tamperSingleValue($data) {
    $operation = $this->getSetting(self::SETTING_OPERATION);
    if (!is_callable(['\Drupal\Component\Utility\Unicode', $operation])) {
      throw new TamperException('Invalid operation ' . $operation);
    }

    return call_user_func(['\Drupal\Component\Utility\Unicode', $operation], $data);
  }

}
