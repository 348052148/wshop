<?php
namespace Service\Domain\repositorys;

use Service\Domain\models\shop\Shop;

class ShopRepository extends AbstractCURDRepository {

    public function getEntity()
    {
       return Shop::class;
    }
    public function getTable()
    {
        return 'shop';
    }


}