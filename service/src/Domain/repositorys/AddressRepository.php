<?php
namespace Service\Domain\repositorys;

use Service\Domain\models\user\Address;

class AddressRepository extends AbstractCURDRepository{

    public function getEntity()
    {
        return Address::class;
    }

    public function getTable()
    {
        return 'address';
    }

    public function findByUid($uid){
        $rowset = $this->tableGateway->select(['uid'=>$uid]);

        return $rowset->current();
    }

    public function updateAddress($set,$where){
        return $this->tableGateway->update($set,$where);
    }
}