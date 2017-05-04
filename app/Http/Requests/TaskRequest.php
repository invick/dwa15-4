<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TaskRequest extends FormRequest
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
        switch($this->method())
        {
            case 'GET':
            case 'DELETE':
            {
                return [];
            }
            case 'POST':
            {
                return [
                    'title' => 'required|min:2|max:30',
                    'description' => 'nullable|max:10000',
                    'flags' => 'nullable|array',
                    'flags.*' => 'exists:flags,id'
                ];
            }
            case 'PUT':
            {
                return [
                    'title' => 'required|min:2|max:30',
                    'description' => 'nullable|max:10000',
                    'flags' => 'nullable|array',
                    'flags.*' => 'exists:flags,id'
                ];
            }
            case 'PATCH':
            default:break;
        }
    }
}
