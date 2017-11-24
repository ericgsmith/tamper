<?php

namespace Drupal\tamper;

use Drupal\Component\Plugin\ConfigurablePluginInterface;
use Drupal\Component\Plugin\PluginInspectionInterface;

/**
 * Interface definition for tamper plugins.
 */
interface TamperInterface extends PluginInspectionInterface, ConfigurablePluginInterface {

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
