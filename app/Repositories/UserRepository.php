<?php

namespace App\Repositories;
use App\Repositories\Interfaces\UserRepositoryInterface;

use App\Models\User;

/**
 * Class UserService
 * @package App\Repositories
 */
class UserRepository implements UserRepositoryInterface
{
    public function getAllPaginate() {
        return User::paginate(15);
    }
}
