<?php

namespace Drupal\Tests\tamper\Unit\Plugin\Tamper;

use Drupal\tamper\Plugin\Tamper\Unique;
use Drupal\Tests\UnitTestCase;

/**
 * Test the unique plugin.
 */
class UniqueTest extends UnitTestCase {

  /**
   * @var \Drupal\tamper\Plugin\Tamper\Unique
   */
  protected $plugin;

  /**
   * {@inheritdoc}
   */
  protected function setUp() {
    $this->plugin = new Unique([], 'unique', []);
    parent::setUp();
  }

  /**
   * Test unique.
   */
  public function testUniqueWithSingleValue() {
    $original = 'foo';
    $expected = ['foo'];
    $this->assertArrayEquals($expected, $this->plugin->tamper($original));
  }

  /**
   * Test unique.
   */
  public function testUniqueWithMultipleValues() {
    $original = ['foo', 'foo', 'bar', 'baz', 'baz'];
    $expected = ['foo', 'bar', 'baz'];
    $this->assertArrayEquals($expected, $this->plugin->tamper($original));
  }

}
