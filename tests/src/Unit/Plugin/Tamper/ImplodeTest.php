<?php

namespace Drupal\Tests\tamper\Unit\Plugin\Tamper;

use Drupal\tamper\Plugin\Tamper\Implode;
use Drupal\Tests\UnitTestCase;

/**
 * Test the implode plugin.
 */
class ImplodeTest extends UnitTestCase {

  /**
   * @var \Drupal\tamper\Plugin\Tamper\Implode
   */
  protected $plugin;

  /**
   * {@inheritdoc}
   */
  protected function setUp() {
    $config = [
      Implode::SETTING_GLUE => ',',
    ];
    $this->plugin = new Implode($config, 'implode', []);
    parent::setUp();
  }

  /**
   * Test imploding.
   */
  public function testImplodeWithSingleValue() {
    $original = 'foo';
    $expected = 'foo';
    $this->assertEquals($expected, $this->plugin->tamper($original));
  }

  /**
   * Test imploding.
   */
  public function testImplodeWithMultipleValues() {
    $original = ['foo', 'bar', 'baz'];
    $expected = 'foo,bar,baz';
    $this->assertEquals($expected, $this->plugin->tamper($original));
  }
}
