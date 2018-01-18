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
  public function testUpperCaseWithSingleValue() {
    $config = [
      ConvertCase::SETTING_OPERATION => 'strtoupper',
    ];
    $plugin = new ConvertCase($config, 'convert_case', []);
    $this->assertEquals('FOO BAR', $plugin->tamper('foo bar'));
  }

  /**
   * Test convert to upper case.
   */
  public function testUpperCaseWithMultipleValues() {
    $config = [
      ConvertCase::SETTING_OPERATION => 'strtoupper',
    ];
    $plugin = new ConvertCase($config, 'convert_case', []);
    $this->assertArrayEquals(['FOO', 'BAR'], $plugin->tamper(['foo', 'bar']));
  }

  /**
   * Test convert to lower case.
   */
  public function testLowerCaseWithSingleValue() {
    $config = [
      ConvertCase::SETTING_OPERATION => 'strtolower',
    ];
    $plugin = new ConvertCase($config, 'convert_case', []);
    $this->assertEquals('foo bar', $plugin->tamper('fOo BAR'));
  }

  /**
   * Test convert to lower case.
   */
  public function testLowerCaseWithMultipleValues() {
    $config = [
      ConvertCase::SETTING_OPERATION => 'strtolower',
    ];
    $plugin = new ConvertCase($config, 'convert_case', []);
    $this->assertArrayEquals(['foo', 'bar'], $plugin->tamper(['fOo', 'BAR']));
  }

  /**
   * Test convert to upper case first.
   */
  public function testUpperCaseFirstWithSingleValue() {
    $config = [
      ConvertCase::SETTING_OPERATION => 'ucfirst',
    ];
    $plugin = new ConvertCase($config, 'convert_case', []);
    $this->assertEquals('Foo bar', $plugin->tamper('foo bar'));
  }

  /**
   * Test convert to upper case first.
   */
  public function testUpperCaseFirstWithMultipleValues() {
    $config = [
      ConvertCase::SETTING_OPERATION => 'ucfirst',
    ];
    $plugin = new ConvertCase($config, 'convert_case', []);
    $this->assertArrayEquals(['Foo bar', 'Baz zip'], $plugin->tamper(['foo bar', 'baz zip']));
  }

  /**
   * Test convert to lower case first.
   */
  public function testLowerCaseFirstWithSingleValue() {
    $config = [
      ConvertCase::SETTING_OPERATION => 'lcfirst',
    ];
    $plugin = new ConvertCase($config, 'convert_case', []);
    $this->assertEquals('fOO BAR', $plugin->tamper('FOO BAR'));
  }

  /**
   * Test convert to lower case first.
   */
  public function testLowerCaseFirstWithMultipleValues() {
    $config = [
      ConvertCase::SETTING_OPERATION => 'lcfirst',
    ];
    $plugin = new ConvertCase($config, 'convert_case', []);
    $this->assertArrayEquals(['fOO', 'bAR'], $plugin->tamper(['FOO',  'BAR']));
  }

  /**
   * Test convert to upper case words.
   */
  public function testUpperCaseWordsWithSingleValue() {
    $config = [
      ConvertCase::SETTING_OPERATION => 'ucwords',
    ];
    $plugin = new ConvertCase($config, 'convert_case', []);
    $this->assertEquals('Foo Bar', $plugin->tamper('foo bar'));
  }

  /**
   * Test convert to upper case words.
   */
  public function testUpperCaseWordsWithMultipleValues() {
    $config = [
      ConvertCase::SETTING_OPERATION => 'ucwords',
    ];
    $plugin = new ConvertCase($config, 'convert_case', []);
    $this->assertArrayEquals(['Foo Bar', 'Bar Foo'], $plugin->tamper(['foo bar', 'bar foo']));
  }

}
