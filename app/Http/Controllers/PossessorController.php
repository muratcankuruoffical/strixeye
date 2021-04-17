<?php

namespace App\Http\Controllers;

use App\Http\Requests\PossessorRequest;
use App\Models\Possessor;
use Illuminate\Http\Request;

class PossessorController extends Controller
{

    public function index()
    {
        return view('possessors.index', ['possessors' => Possessor::all()]);
    }

    public function create()
    {
        return view('possessors.create');
    }

    public function store(PossessorRequest $request)
    {
        $pictureName = time() . '.' . $request->picture->extension();
        $request->picture->move(public_path('pictures'), $pictureName);
        $created = Possessor::create(array_merge($request->validated(), ['picture' => $pictureName]));
        return redirect()->back()->with('message', 'Possessor Successfully Created.');
    }

    public function show(Possessor $possessor)
    {
        return view('possessors.show', ['possessor' => $possessor]);
    }

    public function edit(Possessor $possessor)
    {
        return view('possessors.edit', ['possessor' => $possessor]);
    }

    public function update(PossessorRequest $request, Possessor $possessor)
    {
        if ($request->hasFile('picture')) {
            $pictureName = time() . '.' . $request->picture->extension();
            $request->picture->move(public_path('pictures'), $pictureName);
            $possessor->update(array_merge($request->validated(), ['picture' => $pictureName]));
        } else {
            $possessor->update($request->validated());
        }
        return redirect()->back()->with('message', 'Possessor Successfully Updated.');
    }

    public function destroy(Possessor $possessor)
    {
        $deleted = $possessor->delete();
        return redirect()->back()->with('message', 'Possessor Successfully Deleted.');
    }

    public function assignPokemonToPossessor()
    {

    }

    public function removePossessorFromPokemon()
    {

    }
}
