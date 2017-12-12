<?php

namespace Drupal\Tests\tamper\Unit\Plugin\Tamper;

use Drupal\tamper\Plugin\Tamper\ArrayFilter;
use Drupal\Tests\UnitTestCase;

/**
 * Tests the array filter plugin.
 */
class ArrayFilterTest extends UnitTestCase {

  /**
   * @var \Drupal\tamper\Plugin\Tamper\ArrayFilter
   */
  protected $plugin;

  /**
   * {@inheritdoc}
   */
  protected function setUp() {
    $this->plugin = new ArrayFilter([], 'array_filter', []);
    parent::setUp();
  }

  /**
   * Test the array filter plugin with a single value.
   */
  public function testArrayFilterWithSingleValue() {
    $original = 'foo';
    $expected = ['foo'];
    $this->assertArrayEquals($expected, $this->plugin->tamper($original));
  }

  /**
   * Test the array filter plugin with a multiple values.
   */
  public function testArrayFilterWithMultipleValues() {
    $original = ['foo', '', 'bar', FALSE, 'baz', [], 'zip'];
    $expected = ['foo', 'bar', 'baz', 'zip'];
    $this->assertArrayEquals($expected, $this->plugin->tamper($original));
  }

}
