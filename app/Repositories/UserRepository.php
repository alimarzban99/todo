<?php

namespace App\Repositories;

use App\Models\User;

class UserRepository extends BaseRepository
{
    /**
     * @return string
     */
    public function model(): string
    {
        return User::class;
    }

    /**
     * @param string $mobile
     * @return bool
     */
    public function checkExist(string $mobile): bool
    {
        return $this->model->query()
            ->where('email', '=', $mobile)->exists();
    }

    /**
     * @param string $mobile
     * @return object|null
     */
    public function findByEmail(string $mobile): ?object
    {
        return $this->model->query()
            ->where('email', '=', $mobile)->first();
    }
}
