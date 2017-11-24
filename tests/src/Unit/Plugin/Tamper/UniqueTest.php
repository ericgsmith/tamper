<?php

namespace Drupal\Tests\tamper\Unit\Plugin\Tamper;

use Drupal\tamper\Plugin\Tamper\Unique;
use Drupal\Tests\UnitTestCase;

/**
 * Test the unique plugin.
 */
class UniqueTest extends UnitTestCase {

  /**
   * Test unique.
   */
  public function testUnique() {
    $config = [];
    $plugin = new Unique($config, 'unique', []);
    $tampered = $plugin->tamper(['foo', 'foo', 'bar', 'baz', 'baz']);
    $this->assertArrayEquals(['foo', 'bar', 'baz'], $tampered);
  }

}
