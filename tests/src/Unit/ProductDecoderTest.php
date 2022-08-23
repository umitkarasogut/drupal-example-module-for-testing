<?php

namespace Drupal\crud_module\tests\Unit;

use Drupal\crud_module\Dto\ProductDto;
use Drupal\crud_module\Plugin\WSDecoder\ProductDecoder;
use Drupal\Tests\UnitTestCase;

class ProductDecoderTest extends UnitTestCase {

  protected ProductDecoder $decoder;

  private string $exampleJson;

  protected function setUp(): void {
    parent::setUp();
    $this->decoder = new ProductDecoder();
    $this->exampleJson = file_get_contents(getcwd() . '/modules/custom/crud_module/tests/data/example-product.json');
  }

  public function test_product_decoder() {
    $decoded = $this->decoder->decode($this->exampleJson);

    $this->assertIsArray($decoded);
    $this->assertInstanceOf(ProductDto::class, $decoded[0]);
  }

}
