<?php

namespace Drupal\Tests\tamper\Unit\Plugin\Tamper;

use Drupal\tamper\Plugin\Tamper\Unique;
use Drupal\Tests\UnitTestCase;

/**
 *
 */
class UniqueTest extends UnitTestCase {

  /**
   *
   */
  public function testImplode() {
    $config = [];
    $plugin = new Unique($config, 'unique', []);

    $this->assertArrayEquals(['foo', 'bar', 'baz'], $plugin->tamper(['foo', 'foo', 'bar', 'baz', 'baz']));
  }

}
