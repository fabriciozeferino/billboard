<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class ProjectUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Gate::allows('update', $this->route('project'));
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
        $this->merge([
            'owner_id' => auth()->id(),
        ]);


        /*if (is_array($items = $this->get('items', []))) {
            $this->merge(['items' => array_filter($items)]);
        }*/
    }
}
