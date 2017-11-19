<?php

namespace Drupal\Tests\tamper\Unit\Plugin\Tamper;

use Drupal\tamper\Plugin\Tamper\ArrayFilter;
use Drupal\Tests\UnitTestCase;

class ExplodeTest extends UnitTestCase {

  public function testArrayFilter() {
    $config = [];
    $plugin = new ArrayFilter($config, 'array_filter', []);
    $this->assertArrayEquals(['foo','bar','baz','zip'], $plugin->tamper(['foo','','bar',FALSE,'baz',[],'zip']));
  }

}
