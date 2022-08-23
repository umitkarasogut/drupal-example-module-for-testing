<?php

namespace Drupal\crud_module\Service;

use Drupal\Core\DependencyInjection\ServiceProviderBase;
use Drupal\Core\Entity\{EntityTypeManager, EntityStorageBase};


class CrudService extends ServiceProviderBase {

    private EntityStorageBase $entityTypeManager;

    public function __construct(EntityTypeManager $entityTypeManager) {
        $this->entityTypeManager = $entityTypeManager->getStorage('product');
    }

    public function find($id) {
        return $this->entityTypeManager->load($id);
    }

    public function findAll() {
        return $this->entityTypeManager->loadMultiple();
    }

    public function create($data) {
        return $this->entityTypeManager->create($data)->save();
    }

    public function update($id, $data) {
        $product = $this->find($id);
        foreach ($data as $key => $value) {
            $product->set($key, $value);
        }
        $product->save();
    }

    public function delete($id) {
        $this->entityTypeManager->load($id)->delete();
    }

}
