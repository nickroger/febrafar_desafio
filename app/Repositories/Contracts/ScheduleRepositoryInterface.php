<?php

namespace App\Repositories\Contracts;

use App\DTO\Schedules\CreateScheduleDTO;
use App\DTO\Schedules\UpdateScheduleDTO;
use stdClass;

interface ScheduleRepositoryInterface
{
    public function paginate(int $page = 1, int $totalPerPage = 15, string $filter = null): PaginationInterface;
    public function getAll(string $filter = null, string $data_start = null, string $data_end = null): array;
    public function getAllUser(): array;
    public function findOne(string $id): stdClass|null;
    public function delete(string $id): void;
    public function new(CreateScheduleDTO $dto): stdClass;
    public function update(UpdateScheduleDTO $dto): stdClass|null;
}
