<?php

namespace Drupal\tamper;

use Drupal\Component\Plugin\ConfigurablePluginInterface;
use Drupal\Core\Plugin\PluginFormInterface;

/**
 * Interface definition for tamper plugins.
 */
interface ConfigurableTamperInterface extends TamperInterface, PluginFormInterface, ConfigurablePluginInterface {
}
