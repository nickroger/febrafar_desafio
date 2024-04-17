<?php

namespace App\Services;

use App\DTO\Schedules\CreatScheduleDTO;
use App\DTO\Schedules\UpdateScheduleDTO;
use App\Repositories\Contracts\ScheduleRepositoryInterface;
use stdClass;

class ScheduleService
{
    public function __construct(
        protected ScheduleRepositoryInterface $repository,
    ) {
    }
    public function getAll(string $filter = null): array
    {
        return $this->repository->getAll($filter);
    }
    public function getAllUser(string $filter = null): array
    {
        return $this->repository->getAllUser($filter);
    }

    public function findOne(string $id): stdClass|null
    {
        return $this->repository->findOne($id);
    }

    public function new(CreatScheduleDTO $dto): stdClass
    {
        return $this->repository->new($dto);
    }

    public function update(UpdateScheduleDTO $dto): stdClass|null
    {
        return $this->repository->update($dto);
    }

    public function delete(string $id): void
    {
        $this->repository->delete($id);
    }
}
