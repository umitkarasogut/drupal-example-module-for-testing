<?php

namespace Drupal\crud_module\Dto;

class ProductDto {

  private string $name;

  private int $price;

  /**
   * @return string
   */
  public function getName(): string {
    return $this->name;
  }

  /**
   * @param string $name
   */
  public function setName(string $name): void {
    $this->name = $name;
  }

  /**
   * @return int
   */
  public function getPrice(): int {
    return $this->price;
  }

  /**
   * @param int $price
   */
  public function setPrice(int $price): void {
    $this->price = $price;
  }

  public function toArray(): array {
    return [
      'name' => $this->getName(),
      'price' => $this->getPrice(),
    ];
  }

}
