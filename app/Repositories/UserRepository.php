<?php

namespace App\Repositories;
use App\Models\User;
use App\Repositories\Interfaces\UserRepositoryInterface;
use App\Repositories\BaseRepository;

/**
 * Class UserService
 * @package App\Repositories
 */
class UserRepository extends BaseRepository implements UserRepositoryInterface
{

    protected $model;
    protected $query;

    public function __construct(User  $model)
    {
        $this->query = User::query();
        parent::__construct($model);
    }

    public function getAllPaginate() {
        return User::paginate(15);
    }
    
    public function with(array $relations)
    {
        $this->query = $this->query->with($relations);
        return $this;
    }

    public function findById($id) {
        return User::find($id);
    }
}
