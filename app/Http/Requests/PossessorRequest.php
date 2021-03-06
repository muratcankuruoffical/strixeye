<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\RedirectResponse;

class PossessorRequest extends FormRequest
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

    public function storeRules()
    {
        return [
            'name' => 'required|string',
            'picture' => 'required|image|mimes:jpg,webp,png',
            'age' => 'required|integer',
            'score' => 'required|integer',

        ];
    }

    public function updateRules()
    {
        return [
            'picture' => 'sometimes|image|mimes:jpg,webp,png',
            'name' => 'required|string',
            'age' => 'required|integer',
            'score' => 'required|integer',
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        if ($this->routeIs('possessors.store')) {
            return $this->storeRules();
        } else {
            return $this->updateRules();
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
