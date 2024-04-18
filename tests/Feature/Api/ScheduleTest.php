<?php

use App\Models\Schedule;

use function Pest\Laravel\getJson;

test('get schedules', function () {
    Schedule::factory()->count(10)->create();
    getJson(route('schedules.index'), [])
        ->assertJsonStructure([])
        ->assertStatus(401);
});
