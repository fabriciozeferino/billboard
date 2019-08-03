<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TaskCreateRequest extends FormRequest
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
            'body' => 'required',

        ];
    }

    /**
     * Prepare the data for validation.
     *
     * @return array
     */
    protected function prepareForValidation()
    {
        $this->merge([
            'project_id' => (int)$this->project->id,
            //'owner_id' => (int)auth()->id(),
            'body' => $this->get('body')
        ]);
    }
}
