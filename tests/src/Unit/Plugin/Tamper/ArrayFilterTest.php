<?php

namespace Drupal\Tests\tamper\Unit\Plugin\Tamper;

use Drupal\tamper\Plugin\Tamper\ArrayFilter;
use Drupal\Tests\UnitTestCase;

/**
 * Tests the array filter plugin.
 */
class ArrayFilterTest extends UnitTestCase {

  /**
   * Test the plugin.
   */
  public function testArrayFilter() {
    $config = [];
    $plugin = new ArrayFilter($config, 'array_filter', []);
    $tampered = $plugin->tamper(['foo', '', 'bar', FALSE, 'baz', [], 'zip']);
    $this->assertArrayEquals(['foo', 'bar', 'baz', 'zip'], $tampered);
  }

}
