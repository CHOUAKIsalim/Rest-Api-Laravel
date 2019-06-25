<?php

namespace App\Http\Requests;


class CreateThreadRequest extends CustomisedFormRequest
{


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'subject' => 'required|max:500',
            'recipient' => 'required|exists:users,email',
            'message' => 'required|max:500'
        ];
    }
}
