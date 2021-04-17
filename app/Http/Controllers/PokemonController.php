<?php

namespace App\Http\Controllers;

use App\Http\Requests\PokemonRequest;
use App\Models\Pokemon;
use App\Models\Possessor;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class PokemonController extends Controller
{

    /**
     * @return Application|Factory|View
     */
    public function index()
    {
        return view('pokemons.index', ['pokemons' => Pokemon::all()]);
    }


    /**
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('pokemons.create');
    }

    /**
     * @param PokemonRequest $request
     * @return RedirectResponse
     */
    public function store(PokemonRequest $request): RedirectResponse
    {
        $pictureName = time() . '.' . $request->picture->extension();
        $request->picture->move(public_path('pictures'), $pictureName);
        $created = Pokemon::create(array_merge($request->validated(), ['picture' => $pictureName]));
        return redirect()->route('pokemons.index')->with('message', 'Pokemon Successfully Created.');
    }


    /**
     * @param Pokemon $pokemon
     * @return Application|Factory|View
     */
    public function show(Pokemon $pokemon)
    {
        return view('pokemons.show', ['pokemon' => $pokemon]);
    }

    /**
     * @param Pokemon $pokemon
     * @return Application|Factory|View
     */
    public function edit(Pokemon $pokemon)
    {
        return view('pokemons.edit', ['pokemon' => $pokemon]);
    }

    /**
     * @param PokemonRequest $request
     * @param Pokemon $pokemon
     * @return RedirectResponse
     */
    public function update(PokemonRequest $request, Pokemon $pokemon): RedirectResponse
    {

        if ($request->hasFile('picture')) {
            $pictureName = time() . '.' . $request->picture->extension();
            $request->picture->move(public_path('pictures'), $pictureName);
            $pokemon->update(array_merge($request->validated(), ['picture' => $pictureName]));
        } else {
            $pokemon->update($request->validated());
        }
        return redirect()->route('pokemons.index')->with('message', 'Pokemon Successfully Updated.');
    }

    /**
     * @param Pokemon $pokemon
     * @return RedirectResponse
     */
    public function destroy(Pokemon $pokemon): RedirectResponse
    {

        $deleted = $pokemon->delete();
        return redirect()->route('pokemons.index')->with('message', 'Pokemon Successfully Deleted.');
    }

    /**
     * @param Pokemon $pokemon
     * @param Possessor $possessor
     */
    public function givePokemonToPossessor(Pokemon $pokemon, Possessor $possessor)
    {
        $pokemon->possessors()->attach($possessor);
    }

    /**
     * @param Pokemon $pokemon
     * @param Possessor $possessor
     */
    public function removePokemonFromPossessor(Pokemon $pokemon, Possessor $possessor)
    {
        $pokemon->possessors()->detach($possessor);
    }
}
