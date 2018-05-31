<?php
namespace Service\Domain\user;

use Service\Domain\repositorys\UserRepository;

class UserService {

    public function register($username,$passwd){

        $userReppsitory = new UserRepository();

        $user = new User();
        $user->username = $username;
        $user->passwd = $passwd;
        $user->ctime = time();

        $userReppsitory->store($user);

        return $user;
    }

}