<?php

namespace App\Http\Controllers;

use App\Http\Requests\PokemonRequest;
use App\Models\Pokemon;
use Illuminate\Http\Request;

class PokemonController extends Controller
{

    public function index()
    {
        $pokemons = Pokemon::all();
        return view('pokemons.index', ['pokemons' => $pokemons]);
    }


    public function create()
    {
        return view('pokemons.create');
    }

    public function store(PokemonRequest $request)
    {
        $pictureName = time() . '.' . $request->picture->extension();
        $request->picture->move(public_path('pictures'), $pictureName);
        $created = Pokemon::create(array_merge($request->validated(), ['picture' => $pictureName]));
        return redirect()->back()->with('message', 'Pokemon Successfully Created.');
    }


    public function show(Pokemon $pokemon)
    {
        return view('pokemons.show', ['pokemon' => $pokemon]);
    }

    public function edit(Pokemon $pokemon)
    {
        return view('pokemons.edit', ['pokemon' => $pokemon]);
    }

    public function update(PokemonRequest $request, Pokemon $pokemon)
    {
        if ($request->hasFile('picture')) {
            $pictureName = time() . '.' . $request->picture->extension();
            $request->picture->move(public_path('pictures'), $pictureName);
        }
        $updated = $pokemon->update($request->validated());
        return redirect()->back()->with('message', 'Pokemon Successfully Updated.');
    }

    public function destroy(Pokemon $pokemon)
    {

        $deleted = $pokemon->delete();
        return redirect()->back()->with('message', 'Pokemon Successfully Deleted.');
    }
}
