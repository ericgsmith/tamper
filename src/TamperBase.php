<?php

namespace Drupal\tamper;

use Drupal\Core\Plugin\PluginBase;

/**
 * Provides a base class to tamper data from.
 */
abstract class TamperBase extends PluginBase implements TamperInterface {

  /**
   * The tamper ID.
   *
   * @var string
   */
  protected $uuid;

  /**
   * The weight of tamper instance.
   *
   * @var int|string
   */
  protected $weight = '';

  /**
   * {@inheritdoc}
   */
  public function tamper($data) {
    return is_array($data) ? $this->tamperMultipleValues($data) : $this->tamperSingleValue($data);
  }

  /**
   * {@inheritdoc}
   */
  public function getUuid() {
    return $this->uuid;
  }

  /**
   * {@inheritdoc}
   */
  public function setWeight($weight) {
    $this->weight = $weight;
    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function getWeight() {
    return $this->weight;
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
  protected function tamperMultipleValues(array $data) {
    return array_map([$this, 'tamperSingleValue'], $data);
  }

}
