<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\RedirectResponse;

class PokemonRequest extends FormRequest
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
            'height' => 'required|integer',
            'evolves_from' => 'required|string',
            'evolves_to' => 'required|string',
            'weakness' => 'required|string',
            'ability' => 'required|string'
        ];
    }

    public function updateRules()
    {
        return [
            'picture' => 'sometimes|image|mimes:jpg,webp,png',
            'name' => 'required|string',
            'age' => 'required|integer',
            'height' => 'required|integer',
            'evolves_from' => 'required|string',
            'evolves_to' => 'required|string',
            'weakness' => 'required|string',
            'ability' => 'required|string'
        ];

    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        if ($this->routeIs('pokemons.store')) {
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
