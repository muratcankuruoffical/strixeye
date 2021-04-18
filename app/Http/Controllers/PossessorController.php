<?php

namespace App\Http\Controllers;

use App\Http\Requests\PossessorRequest;
use App\Models\Pokemon;
use App\Models\Possessor;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class PossessorController extends Controller
{

    /**
     * @return Application|Factory|View
     */
    public function index()
    {
        return view('possessors.index', ['possessors' => Possessor::all()]);
    }

    /**
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('possessors.create');
    }


    public function store(PossessorRequest $request)
    {

        $pictureName = time() . '.' . $request->picture->extension();
        $request->picture->move(public_path('pictures'), $pictureName);
        $created = Possessor::create(array_merge($request->validated(), ['picture' => $pictureName]));
        return redirect()->route('possessors.index')->with('message', 'Possessor Successfully Created.');
    }

    /**
     * @param Possessor $possessor
     * @return Application|Factory|View
     */
    public function show(Possessor $possessor)
    {
        return view('possessors.show', ['possessor' => $possessor]);
    }

    /**
     * @param Possessor $possessor
     * @return Application|Factory|View
     */
    public function edit(Possessor $possessor)
    {
        return view('possessors.edit', ['possessor' => $possessor]);
    }

    /**
     * @param PossessorRequest $request
     * @param Possessor $possessor
     * @return RedirectResponse
     */
    public function update(PossessorRequest $request, Possessor $possessor): RedirectResponse
    {
        if ($request->hasFile('picture')) {
            $pictureName = time() . '.' . $request->picture->extension();
            $request->picture->move(public_path('pictures'), $pictureName);
            $possessor->update(array_merge($request->validated(), ['picture' => $pictureName]));
        } else {
            $possessor->update($request->validated());
        }
        return redirect()->route('possessors.index')->with('message', 'Possessor Successfully Updated.');
    }

    /**
     * @param Possessor $possessor
     * @return RedirectResponse
     */
    public function destroy(Possessor $possessor): RedirectResponse
    {
        $deleted = $possessor->delete();
        return redirect()->route('possessors.index')->with('message', 'Possessor Successfully Deleted.');
    }



    public function assignPokemonToPossessor()
    {
        $possessor = Possessor::findOrFail(Request()->possessor_id);
        $possessor->pokemons()->attach(Request()->pokemon_id);
        return redirect()->route('possessors.index');
    }


    /**
     * @param Possessor $possessor
     * @param Pokemon $pokemon
     * @return RedirectResponse
     */
    public function removePossessorFromPokemon(Possessor $possessor, Pokemon $pokemon): RedirectResponse
    {
        $possessor->pokemons()->detach($pokemon);
        return redirect()->route('possessors.index');
    }
}
