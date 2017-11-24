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
   * @ingroup plugin_translatable
   *
   * @var \Drupal\Core\Annotation\Translation
   */
  public $label;

  /**
   * A short description of the tamper plugin.
   *
   * @ingroup plugin_translatable
   *
   * @var \Drupal\Core\Annotation\Translation
   */
  public $description;

  /**
   * The category under which the field type should be listed in the UI.
   *
   * @ingroup plugin_translatable
   *
   * @var \Drupal\Core\Annotation\Translation
   */
  public $category = '';

}
