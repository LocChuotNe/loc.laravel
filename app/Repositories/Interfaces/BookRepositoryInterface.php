<?php

namespace App\Repositories\Interfaces;

use Illuminate\Support\Collection;

interface BookRepositoryInterface
{
    public function importBooks(array $data): void;
    public function getAll(): Collection;
}
