<?php

namespace App\Http\Requests;


class CreateMessageRequest extends CustomisedFormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'message' => 'required|max:500',
            'creator' => 'required|exists:users,email',
        ];
    }
}
