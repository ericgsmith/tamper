<?php

namespace Drupal\tamper;

use Drupal\Component\Utility\NestedArray;
use Drupal\Core\Plugin\PluginBase;

/**
 * Provides a base class to tamper data from.
 */
abstract class TamperBase extends PluginBase implements TamperInterface {

  /**
   * {@inheritdoc}
   */
  public function __construct(array $configuration, $plugin_id, $plugin_definition) {
    parent::__construct($configuration, $plugin_id, $plugin_definition);
    $this->setConfiguration($configuration);
  }

  /**
   * {@inheritdoc}
   */
  public function tamper($data) {
    return is_array($data) ? $this->tamperMultipleValues($data) : $this->tamperSingleValue($data);
  }

  /**
   * Tamper data.
   *
   * Performs the operations on a single value instance of data to transform it.
   *
   * @param mixed $data
   *   The data to tamper.
   *
   * @return mixed
   *   The tampered data.
   */
  abstract protected function tamperSingleValue($data);

  /**
   * Tamper data.
   *
   * Performs the operations on multiple value data to transform it.
   *
   * @param array $data
   *   The data to tamper.
   *
   * @return mixed
   *   The tampered data.
   */
  protected function tamperMultipleValues($data) {
    return array_map([$this, 'tamperSingleValue'], $data);
  }

  /**
   * {@inheritdoc}
   */
  public function getConfiguration() {
    return $this->configuration;
  }

  /**
   * Get a particular configuration value.
   *
   * @param string $key
   *   Key of the configuration.
   *
   * @return mixed
   */
  public function getSetting($key) {
    return $this->configuration[$key];
  }

  /**
   * {@inheritdoc}
   */
  public function setConfiguration(array $configuration) {
    $this->configuration = NestedArray::mergeDeep($this->defaultConfiguration(), $configuration);
  }

  /**
   * {@inheritdoc}
   */
  public function defaultConfiguration() {
    return [];
  }

  /**
   * {@inheritdoc}
   */
  public function calculateDependencies() {
    return [];
  }

}
