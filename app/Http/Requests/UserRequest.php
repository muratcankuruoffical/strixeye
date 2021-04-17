<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\RedirectResponse;

class UserRequest extends FormRequest
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
        if ($this->routeIs('user.register')) {
            return [
                'email' => 'required|email|unique:users,email',
                'password' => 'required|min:6|max:12'
            ];
        } else {
            return [];
        }
    }

    /**
     * @param Validator $validator
     * @return RedirectResponse
     */
    protected function failedValidation(Validator $validator): RedirectResponse
    {
        return $this->redirector->to($this->getRedirectUrl())
            ->withErrors($validator)
            ->withInput();
    }
}
