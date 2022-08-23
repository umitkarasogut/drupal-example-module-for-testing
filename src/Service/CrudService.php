<?php

namespace Drupal\crud_module\Service;

use Drupal\Core\DependencyInjection\ServiceProviderBase;
use Drupal\Core\Entity\{EntityTypeManager, EntityStorageBase};


class CrudService extends ServiceProviderBase {

    private EntityStorageBase $entityStorage;

    public function __construct(EntityTypeManager $entityTypeManager) {
        $this->entityStorage = $entityTypeManager->getStorage('product');
    }

    public function find($id) {
        return $this->entityStorage->load($id);
    }

    public function findAll() {
        return $this->entityStorage->loadMultiple();
    }

    public function create($data) {
        return $this->entityStorage->create($data)->save();
    }

    public function update($id, $data) {
        $product = $this->find($id);
        foreach ($data as $key => $value) {
            $product->set($key, $value);
        }
        $product->save();
    }

    public function delete($id) {
        $this->entityStorage->load($id)->delete();
    }

}
