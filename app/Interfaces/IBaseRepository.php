<?php

namespace App\Interfaces;

interface IBaseRepository
{
    public function makeModel();

    public function create(array $attributes): object;

    public function update($id, array $attributes): object;

    public function findOne(int $id): object;

    public function getMorphClass(): string;
}
