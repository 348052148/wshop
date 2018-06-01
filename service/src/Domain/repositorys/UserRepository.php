<?php
namespace Service\Domain\repositorys;

use Service\Domain\user\User;

class UserRepository extends AbstractCURDRepository {

    public function getEntity()
    {
        return User::class;
    }

    public function getTable()
    {
        return 'user';
    }
}