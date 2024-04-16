<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Schedule;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public function index(Schedule $schedule)
    {
        $schedules = $schedule->all();
        return view('schedules.index', compact('schedules'));
    }
    public function create()
    {
        return view('schedules.create');
    }

    public function store(Request $request)
    {
        $data = $request->all();
        Schedule::create($data);
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
    public function edit(string $id)
    {
        if (!Schedule::find($id)) {
            return back();
        }
        $schedule = Schedule::find($id);
        return view('schedules.edit', compact('schedule'));
    }
    public function update(Request $request, Schedule $schedule, string $id)
    {
        if (!Schedule::find($id)) {
            return back();
        }
        $schedule->update($request->all());
        return redirect()
            ->route('products.index')
            ->with('message', 'Atualizado com sucesso!');
    }
    public function destroy(string $id)
    {
        //
    }
}
