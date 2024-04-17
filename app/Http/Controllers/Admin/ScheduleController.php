<?php

namespace App\Http\Controllers\Admin;

use App\DTO\Schedules\CreateScheduleDTO;
use App\DTO\Schedules\UpdateScheduleDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateScheduleRequest;
use App\Models\Schedule;
use App\Models\User;
use App\Services\ScheduleService;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public function __construct(
        protected ScheduleService $service
    ) {
    }
    public function index(Request $request)
    {
        $schedules = $this->service->getAll(
            data_start: $request->data_start,
            data_end: $request->data_end
        );
        return view('schedules.index', compact('schedules'));
    }
    public function create(User $user)
    {
        $users = $this->service->getAllUser();
        return view('schedules.create', compact('users'));
    }

    public function store(StoreUpdateScheduleRequest $request, Schedule $schedule)
    {
        $this->service->new(CreateScheduleDTO::makeFromRequest($request));
        return redirect()
            ->route('schedules.index')
            ->with('message', 'Cadastrado com sucesso!');
    }
    public function show(string $id)
    {
        if (!$this->service->findOne($id)) {
            return back();
        }
        $schedule = $this->service->findOne($id);
        return view('schedules.show', compact('schedule'));
    }
    public function edit(string $id, User $user)
    {
        if (!$this->service->findOne($id)) {
            return back();
        }
        $schedule = $this->service->findOne($id);

        $users = $this->service->getAllUser();
        return view('schedules.edit', compact('schedule', 'users'));
    }
    public function update(StoreUpdateScheduleRequest $request, Schedule $schedule, string $id)
    {
        $product = $this->service->update(UpdateScheduleDTO::makeFromRequest($request));
        if (!$product) {
            return back();
        }
        return redirect()
            ->route('schedules.index')
            ->with('message', 'Atualizado com sucesso!');
    }
    public function destroy(string $id)
    {
        $this->service->delete($id);
        return redirect()
            ->route('schedules.index')
            ->with('message', 'Deletado com sucesso!');
    }
}
