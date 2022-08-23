<?php

namespace Drupal\crud_module\Plugin\WSDecoder;

use Drupal\crud_module\Dto\ProductDto;
use Drupal\wsdata\Plugin\WSDecoderBase;
use Drupal\Component\Serialization\Json;

/**
 * JSON Decoder.
 *
 * @WSDecoder(
 *   id = "ProductDecoder",
 *   label = @Translation("Product Decoder", context = "WSDecoder"),
 * )
 */
class ProductDecoder extends WSDecoderBase {

  public function decode($data): array {
    return array_map(function ($article) {
      $dto = new ProductDto();
      $dto->setName($article['name']);
      $dto->setPrice($article['price']);
      return $dto;
    }, Json::decode($data));
  }

  public function accepts() {
    return ['text/json'];
  }

}
