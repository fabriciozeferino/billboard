<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProjectRequest extends FormRequest
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
            'title' => 'required',
            'description' => 'required',
            'owner_id' => 'required'
        ];
    }

    /**
     * Prepare the data for validation.
     *
     * @return array
     */
    protected function prepareForValidation()
    {
        return [
            'title' => $this->title,
            'description' => $this->description,
            'owner_id' => auth()->id()
        ];
    }


}
