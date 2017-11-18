<?php

namespace Drupal\tamper;

use Drupal\Component\Utility\NestedArray;
use Drupal\Core\Plugin\PluginBase;

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
