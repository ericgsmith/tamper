<?php

namespace Drupal\tamper\Annotation;

use Drupal\Component\Annotation\Plugin;

/**
 * Defines a Tamper annotation object.
 *
 * Tamperers handle the tampering of data.
 *
 * @Annotation
 *
 * @see \Drupal\tamper\TamperPluginManager
 * @see \Drupal\tamper\TamperInterface
 */
class Tamper extends Plugin {

  /**
   * The plugin ID.
   *
   * @var string
   */
  public $id;

  /**
   * The human-readable name of the tamper plugin.
   *
   * @var \Drupal\Core\Annotation\Translation
   *
   * @ingroup plugin_translatable
   */
  public $label;

  /**
   * A short description of the tamper plugin.
   *
   * @var \Drupal\Core\Annotation\Translation
   *
   * @ingroup plugin_translatable
   */
  public $description;

  /**
   * The category under which the field type should be listed in the UI.
   *
   * @var \Drupal\Core\Annotation\Translation
   *
   * @ingroup plugin_translatable
   */
  public $category = '';

}
