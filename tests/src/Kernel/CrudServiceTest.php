<?php

namespace Drupal\crud_module\tests\Kernel;

use Drupal\KernelTests\KernelTestBase;
use Drupal\crud_module\{Entity\Product, Service\CrudService};

class CrudServiceTest extends KernelTestBase {

    protected static $modules = ['crud_module'];

    protected int $exampleProductId;

    protected array $exampleProduct = [
        'name' => 'iphone',
        'price' => 10,
    ];

    protected function setUp(): void {
        parent::setUp();
        $this->installEntitySchema('product');
        $entityTypeManager = $this->container->get('entity_type.manager');
        $this->service = new CrudService($entityTypeManager);
        $this->exampleProductId = $this->service->create($this->exampleProduct);
    }

    public function test_user_can_find_product() {
        $product = $this->service->find($this->exampleProductId);

        $this->assertInstanceOf(Product::class, $product);
        $this->assertEquals($this->exampleProduct['name'], $product->get('name')->value);
        $this->assertEquals($this->exampleProduct['price'], $product->get('price')->value);
        //$this->assertEquals($this->exampleProduct, $product->toArray());
    }

    public function test_user_can_list_product() {
        $products = $this->service->findAll();
        $this->assertIsArray($products);

        $product = reset($products);  # or $product = $products[0];
        $this->assertInstanceOf(Product::class, $product);
        $this->assertEquals($this->exampleProduct['name'], $product->get('name')->value);
        $this->assertEquals($this->exampleProduct['price'], $product->get('price')->value);
    }

    public function test_user_can_update_product() {
        $newProductData = ['name' => 'Updated Name !', 'price' => 10000];
        $this->service->update($this->exampleProductId, $newProductData);

        $product = $this->service->find($this->exampleProductId);
        $this->assertEquals($newProductData['name'], $product->get('name')->value);
        $this->assertEquals($newProductData['price'], $product->get('price')->value);
    }

    public function test_user_can_delete_product() {
        $this->service->delete($this->exampleProductId);
        $product = $this->service->find($this->exampleProductId);
        $this->assertEquals(NULL, $product);
    }

}
