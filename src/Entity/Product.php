<?php

namespace Drupal\crud_module\Entity;

use Drupal\Core\Entity\ContentEntityBase;
use Drupal\Core\Entity\EntityInterface;
use Drupal\Core\Field\BaseFieldDefinition;
use Drupal\Core\Entity\EntityTypeInterface;

/**
 * Defines the product entity.
 *
 * @ingroup product
 *
 * @ContentEntityType(
 *   id = "product",
 *   label = @Translation("Product"),
 *   base_table = "products",
 *   entity_keys = {
 *     "id" = "id",
 *   },
 * )
 */
class Product extends ContentEntityBase implements EntityInterface
{
  public static function baseFieldDefinitions(EntityTypeInterface $entity_type): array
  {
    $fields['id'] = BaseFieldDefinition::create('integer')
      ->setLabel(t('ID'))
      ->setDescription(t('The ID of the product entity.'))
      ->setReadOnly(TRUE);

    $fields['name'] = BaseFieldDefinition::create('string')
      ->setLabel(t('name'))
      ->setDescription(t('The name field of the product entity.'));

    $fields['price'] = BaseFieldDefinition::create('integer')
      ->setLabel(t('price'))
      ->setDescription(t('The price field of the product entity.'));

    return $fields;
  }
}
