<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProjectCreateRequest extends FormRequest
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
        $this->merge([
            'title' => $this->get('title'),
            'description' => $this->get('description'),
            'owner_id' => auth()->id(),
        ]);

        /*if (is_array($items = $this->get('items', []))) {
            $this->merge(['items' => array_filter($items)]);
        }*/
    }

    /**
     * Custom message for validation
     *
     * @return array
     */
    public function messages()
    {
        return [
            'title.required' => 'Title is required!',
            'description.required' => 'Description is required!',
            'password.required' => 'Password is required!'
        ];
    }
}
