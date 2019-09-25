<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TournamentCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'               => 'required',
            'description'        => 'sometimes',
            'rules'              => 'sometimes',
            'registration_start' => 'required|date|before:registration_end',
            'registration_end'   => 'required|date',
            'max_teams'          => 'required',
            'team_min_size'      => 'required',
            'team_max_size'      => 'required',
        ];
    }
}
