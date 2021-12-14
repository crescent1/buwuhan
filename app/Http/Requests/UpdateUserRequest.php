<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
            'id' => 'required',
            'name' => 'required|string|min:3|max:100',
            'email' => 'required|email|unique:users,email,'. $this->getId(),
            'type' => 'nullable|numeric',
            'password' => 'nullable',
        ];
    }

    /**
     * get data id
     *
     * @return int
     */
    private function getId()
    {
        /**
         * @var array $data
         */
        $data = $this->request->all();

        /**
         * @var int $id
         */
        $id = $data['id'];

        return $id;
    }
}
