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

    protected $query;

    public function __construct()
    {
        $this->query = User::query();
    }

    public function getAllPaginate() {
        return User::paginate(15);
    }
    public function with(array $relations)
    {
        $this->query = $this->query->with($relations);
        return $this;
    }
}
