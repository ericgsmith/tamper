<?php

namespace Drupal\Tests\tamper\Unit\Plugin\Tamper;

use Drupal\tamper\Plugin\Tamper\Implode;
use Drupal\Tests\UnitTestCase;

/**
 * Test the implode plugin.
 */
class ImplodeTest extends UnitTestCase {

  /**
   * Test imploding.
   */
  public function testImplode() {
    $config = [
      Implode::SETTING_GLUE => ',',
    ];
    $plugin = new Implode($config, 'implode', []);
    $this->assertEquals('foo,bar,baz', $plugin->tamper(['foo', 'bar', 'baz']));
    $this->assertEquals('foo', $plugin->tamper('foo'));
  }

}
