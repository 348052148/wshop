<?php
namespace Service\Application\services;


use Service\Domain\models\user\Address;

class UserService {

    private $userRepository;

    private $addressRepository;

    public function __construct($userRepository,$addressRepository)
    {
        $this->addressRepository =$addressRepository;
        $this->userRepository =$userRepository;
    }

    public function addAddress($addressDto){

        $address = new Address();
        $address->uid = $addressDto['uid'];
        $address->isDefault = $addressDto['isDefault'];
        $address->postalCode = $addressDto['postalCode'];
        $address->areaCode = $addressDto['areaCode'];
        $address->county = $addressDto['county'];
        $address->city = $addressDto['city'];
        $address->province = $addressDto['province'];
        $address->name = $addressDto['name'];
        $address->tel = $addressDto['tel'];
        $address->addressDetail = $addressDto['addressDetail'];

        $this->addressRepository->save($address);
    }

    public function addressList(){

        $addressList = $this->addressRepository->findAll();

        return $addressList;
    }

    public function deleteAddress($addressDto){

        return $this->addressRepository->delete($addressDto['id']);

    }

    public function getAddressByid($addressDto){

        return $this->addressRepository->findById($addressDto['id']);
    }

    public function setDefaultAddress($addressDto){
        $this->addressRepository->updateAddress(['isDefault'=>0],['isDefault'=>1]);
        $this->addressRepository->updateAddress(['isDefault'=>1],['id'=>$addressDto['id']]);
        return true;
    }
}