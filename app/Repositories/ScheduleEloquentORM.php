<?php

namespace App\Repositories;

use App\DTO\Schedules\CreatScheduleDTO;
use App\DTO\Schedules\UpdateScheduleDTO;
use App\Models\Schedule;
use App\Models\User;
use App\Repositories\Contracts\ScheduleRepositoryInterface;
use stdClass;

class ScheduleEloquentORM implements ScheduleRepositoryInterface
{
    public function __construct(
        protected Schedule $model,
        protected User $modeluser
    ) {
    }
    public function findOne(string $id): stdClass | null
    {
        $schedule = $this->model->find($id);
        if (!$schedule) {
            return null;
        }
        return (object) $schedule->toArray();
    }
    public function getAll(string $filter = null): array
    {
        return $this->model
            ->where(function ($query) use ($filter) {
                if ($filter) {
                    $query->whereBetween('start_date', [$filter, $filter]);
                }
            })
            ->get()
            ->toArray();
    }
    public function getAllUser(): array
    {
        return $this->modeluser
            ->get()
            ->toArray();
    }
    public function delete(string $id): void
    {
        $schedule = $this->model->findOrFail($id);

        $schedule->delete();
    }
    public function new(CreatScheduleDTO $dto): stdClass
    {
        $schedule =  $this->model->create((array) $dto);
        return (object) $schedule->toArray();
    }
    public function update(UpdateScheduleDTO $dto): stdClass|null
    {
        if (!$schedule = $this->model->find($dto->id)) {
            return null;
        }

        $schedule->update((array) $dto);
        return (object) $schedule->toArray();
    }
}
