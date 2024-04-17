<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateScheduleRequest;
use App\Models\Schedule;
use App\Models\User;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public function index(Schedule $schedule)
    {
        $schedules = $schedule->all();
        return view('schedules.index', compact('schedules'));
    }
    public function create(User $user)
    {
        $users = $user->all();
        return view('schedules.create', compact('users'));
    }

    public function store(StoreUpdateScheduleRequest $request, Schedule $schedule)
    {
        $data = $request->all();
        $schedule->create($data);
        return redirect()
            ->route('schedules.index')
            ->with('message', 'Cadastrado com sucesso!');
    }
    public function show(string $id)
    {
        if (!Schedule::find($id)) {
            return back();
        }
        $schedule = Schedule::find($id);
        return view('schedules.show', compact('schedule'));
    }
    public function edit(string $id, User $user)
    {
        if (!Schedule::find($id)) {
            return back();
        }
        $schedule = Schedule::find($id);

        $users = $user->all();
        return view('schedules.edit', compact('schedule', 'users'));
    }
    public function update(StoreUpdateScheduleRequest $request, Schedule $schedule, string $id)
    {
        if (!Schedule::find($id)) {
            return back();
        }
        $schedule->update($request->all());
        return redirect()
            ->route('schedules.index')
            ->with('message', 'Atualizado com sucesso!');
    }
    public function destroy(string $id)
    {
        if (!$schedule = Schedule::find($id)) {
            return back();
        }
        $schedule->delete();
        return redirect()
            ->route('schedules.index')
            ->with('message', 'Deletado com sucesso!');
    }
}
