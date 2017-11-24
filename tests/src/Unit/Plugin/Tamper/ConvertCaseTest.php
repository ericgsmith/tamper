<?php

namespace Drupal\Tests\tamper\Unit\Plugin\Tamper;

use Drupal\tamper\Plugin\Tamper\ConvertCase;
use Drupal\Tests\UnitTestCase;

/**
 * Tests the convert case plugin.
 */
class ConvertCaseTest extends UnitTestCase {

  /**
   * Test convert to upper case.
   */
  public function testUpperCase() {
    $config = [
      ConvertCase::SETTING_OPERATION => 'strtoupper',
    ];
    $plugin = new ConvertCase($config, 'convert_case', []);
    $this->assertEquals('FOO BAR', $plugin->tamper('foo bar'));
  }

  /**
   * Test convert to lower case.
   */
  public function testLowerCase() {
    $config = [
      ConvertCase::SETTING_OPERATION => 'strtolower',
    ];
    $plugin = new ConvertCase($config, 'convert_case', []);
    $this->assertEquals('foo bar', $plugin->tamper('fOo BAR'));
  }

  /**
   * Test convert to upper case first.
   */
  public function testUpperCaseFirst() {
    $config = [
      ConvertCase::SETTING_OPERATION => 'ucfirst',
    ];
    $plugin = new ConvertCase($config, 'convert_case', []);
    $this->assertEquals('Foo bar', $plugin->tamper('foo bar'));
  }

  /**
   * Test convert to lower case first.
   */
  public function testLowerCaseFirst() {
    $config = [
      ConvertCase::SETTING_OPERATION => 'lcfirst',
    ];
    $plugin = new ConvertCase($config, 'convert_case', []);
    $this->assertEquals('fOO BAR', $plugin->tamper('FOO BAR'));
  }

  /**
   * Test convert to upper case words.
   */
  public function testUpperCaseWords() {
    $config = [
      ConvertCase::SETTING_OPERATION => 'ucwords',
    ];
    $plugin = new ConvertCase($config, 'convert_case', []);
    $this->assertEquals('Foo Bar', $plugin->tamper('foo bar'));
  }

}
