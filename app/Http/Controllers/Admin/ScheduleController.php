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
            ->route('schedule.index')
            ->with('message', 'Cadastrado com sucesso!');
    }
    public function show(string $id)
    {
        //
    }
    public function edit(string $id)
    {
        //
    }
    public function update()
    {
        //
    }
    public function delete(string $id)
    {
        //
    }
}
