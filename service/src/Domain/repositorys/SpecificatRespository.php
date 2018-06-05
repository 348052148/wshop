<?php
namespace Service\Domain\repositorys;


use Service\Domain\models\goods\Specificat;

class SpecificatRespository extends AbstractCURDRepository{

    public function getTable()
    {
        return 'specif';
    }

    public function getEntity()
    {
        return Specificat::class;
    }

    public function findBySku($sku){
        return $this->tableGateway->select(['sku'=>$sku]);
    }

}