<?php
namespace Service\Domain\models\user;

use Service\Domain\models\EntityInterface;

class User implements EntityInterface {
    public $id;
    public $username;
    public $nickname;
    public $passwd;
    public $ctime;
    public $status;
    public $cart;

    public function __construct()
    {

    }

    public function exchangeArray(array $data)
    {
        // TODO: Implement exchangeArray() method.
    }

    public function exchangeData()
    {
        // TODO: Implement exchangeData() method.
    }

}