<?php

namespace App\Repositories\Contracts;

use App\DTO\Schedules\CreatScheduleDTO;
use App\DTO\Schedules\UpdateScheduleDTO;
use stdClass;

interface ScheduleRepositoryInterface
{
    public function getAll(string $filter = null): array;
    public function getAllUser(): array;
    public function findOne(string $id): stdClass|null;
    public function delete(string $id): void;
    public function new(CreatScheduleDTO $dto): stdClass;
    public function update(UpdateScheduleDTO $dto): stdClass|null;
}