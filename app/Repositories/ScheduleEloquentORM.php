<?php

namespace App\Repositories;

use App\DTO\Schedules\CreateScheduleDTO;
use App\DTO\Schedules\UpdateScheduleDTO;
use App\Models\Schedule;
use App\Models\User;
use App\Repositories\Contracts\PaginationInterface;
use App\Repositories\Contracts\ScheduleRepositoryInterface;
use stdClass;

class ScheduleEloquentORM implements ScheduleRepositoryInterface
{
    public function __construct(
        protected Schedule $model,
        protected User $modeluser
    ) {
    }
    public function paginate(int $page = 1, int $totalPerPage = 15, string $filter = null): PaginationInterface
    {
        $result = $this->model
            ->paginate($totalPerPage, ['*'], 'page', $page);
        return new PaginationPresenter($result);
    }
    public function findOne(string $id): stdClass | null
    {
        $schedule = $this->model->find($id);
        if (!$schedule) {
            return null;
        }
        return (object) $schedule->toArray();
    }
    public function getAll(string $filter = null, string $data_start = null, string $data_end = null): array
    {
        return $this->model
            ->where(function ($query) use ($data_start, $data_end) {
                if ($data_start and $data_end) {
                    $query->whereBetween('start_date', [$data_start, $data_end]);
                    $query->orwhereBetween('deadline_date', [$data_start, $data_end]);
                    $query->orwhereBetween('conclusion_date', [$data_start, $data_end]);
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
    public function new(CreateScheduleDTO $dto): stdClass
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
