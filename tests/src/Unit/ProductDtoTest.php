<?php

namespace Drupal\crud_module\tests\Unit;

use Drupal\crud_module\Dto\ProductDto;
use Drupal\crud_module\Plugin\WSDecoder\ProductDecoder;
use Drupal\Tests\UnitTestCase;

class ProductDtoTest extends UnitTestCase {

  protected ProductDto $dto;

  private array $exampleProduct = [
    'name' => 'Example Product',
    'price' => 100,
  ];

  protected function setUp(): void {
    parent::setUp();
    $this->dto = new ProductDto();
    $this->dto->setName($this->exampleProduct['name']);
    $this->dto->setPrice($this->exampleProduct['price']);
  }

  public function test_to_array_serialization() {
    $array = $this->dto->toArray();

    $this->assertIsArray($array);

    $this->assertArrayHasKey('name', $array);
    $this->assertEquals($this->exampleProduct['name'], $array ['name']);

    $this->assertArrayHasKey('price', $array);
    $this->assertEquals($this->exampleProduct['price'], $array ['price']);
  }

}
