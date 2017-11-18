<?php

namespace Drupal\Tests\tamper\Unit\Plugin\Tamper;

use Drupal\tamper\Plugin\Tamper\Explode;
use Drupal\Tests\UnitTestCase;

class ExplodeTest extends UnitTestCase {

  public function testExplode() {
    $config = [];
    $plugin = new Explode($config, 'explode', []);
    $this->assertArrayEquals(['foo','bar','baz','zip'], $plugin->tamper('foo,bar,baz,zip'));
  }

  public function testExplodeLimit() {
    $config = [
      Explode::SETTING_LIMIT => 2,
      Explode::SETTING_SEPARATOR => '_'
    ];
    $plugin = new Explode($config, 'explode', []);
    $this->assertArrayEquals(['foo', 'bar_baz_zip'], $plugin->tamper('foo_bar_baz_zip'));
  }

}
