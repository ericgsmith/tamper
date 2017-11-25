<?php

namespace Drupal\tamper;

use Drupal\Component\Plugin\PluginInspectionInterface;

/**
 * Interface definition for tamper plugins.
 */
interface TamperInterface extends PluginInspectionInterface {

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

  /**
   * Returns the unique ID representing the tamper.
   *
   * @return string
   *   The image effect ID.
   */
  public function getUuid();

  /**
   * Returns the weight of the tamper.
   *
   * @return int
   *   Weight of the tamper plugin.
   */
  public function getWeight();

  /**
   * Sets the weight for this tamper.
   *
   * @param int $weight
   *   Weight of the tamper plugin.
   */
  public function setWeight($weight);

}
