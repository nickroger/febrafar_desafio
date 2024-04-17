<?php

namespace App\Http\Requests;

use App\Rules\DateRequestRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreUpdateScheduleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {

        $rules = [
            'title'  => ['required', 'min:3', 'max:255', 'unique:schedules'],
            'description'   => ['required', 'min:3', 'max:5000'],
            'start_date' => ['required', 'min:1', 'max:10', 'unique:schedules', new DateRequestRule],
            'deadline_date' => ['required', 'min:1', 'max:10', new DateRequestRule],
            'conclusion_date' => ['required', 'min:1', 'max:10', new DateRequestRule],
            'status' => 'required'
        ];

        if ($this->method() === 'PUT') {
            $rules['title'] = [
                'required',
                'min:3',
                'max:255',
                Rule::unique('schedules')->ignore($this->schedules ?? $this->id),
            ];
            $rules['start_date'] = [
                'required',
                'min:1',
                'max:10',
                Rule::unique('schedules')->ignore($this->schedules ?? $this->id),
                new DateRequestRule,
            ];
        }
        return $rules;
    }
}
