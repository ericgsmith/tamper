<?php

namespace Drupal\Tests\tamper\Unit\Plugin\Tamper;

use Drupal\tamper\Plugin\Tamper\Explode;
use Drupal\Tests\UnitTestCase;

/**
 * Tests the explode plugin.
 */
class ExplodeTest extends UnitTestCase {

  /**
   * Test explode.
   */
  public function testExplodeWithSingleValue() {
    $original = 'foo,bar,baz,zip';
    $expected = ['foo', 'bar', 'baz', 'zip'];
    $this->assertArrayEquals($expected, $this->getPluginDefaultConfig()->tamper($original));
  }

  /**
   * Test explode.
   */
  public function testExplodeWithMultipleValues() {
    $original = ['foo,bar', 'baz,zip'];
    $expected = [['foo', 'bar'], ['baz', 'zip']];
    $this->assertArrayEquals($expected, $this->getPluginDefaultConfig()->tamper($original));
  }

  /**
   * Text explode with limit.
   */
  public function testExplodeWithSingleValueAndLimit() {
    $original = 'foo,bar,baz,zip';
    $expected = ['foo', 'bar,baz,zip'];
    $this->assertArrayEquals($expected, $this->getPluginWithLimit()->tamper($original));
  }

  /**
   * Text explode with limit.
   */
  public function testExplodeWithMultipleValuesAndLimit() {
    $original = ['foo,bar,baz,zip', 'fizz,bang,boop'];
    $expected = [['foo', 'bar,baz,zip'], ['fizz', 'bang,boop']];
    $this->assertArrayEquals($expected, $this->getPluginWithLimit()->tamper($original));
  }

  /**
   * @return \Drupal\tamper\Plugin\Tamper\Explode
   */
  protected function getPluginDefaultConfig() {
    return new Explode([], 'explode', []);
  }

  /**
   * @return \Drupal\tamper\Plugin\Tamper\Explode
   */
  protected function getPluginWithLimit() {
    $config = [
      Explode::SETTING_LIMIT => 2,
    ];
    return new Explode($config, 'explode', []);
  }

}
