<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;

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
            'picture' => 'required|mimes:jpg,webp,png',
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
            'name' => 'required|string',
            'picture' => 'required|mimes:jpg,webp,png',
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

    protected function failedValidation(Validator $validator)
    {
        return $this->redirector->to($this->getRedirectUrl())
            ->withErrors($validator)
            ->withInput();
    }
}
