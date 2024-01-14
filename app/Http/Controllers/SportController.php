<?php

namespace App\Http\Controllers;

use App\Models\Sport;
use App\Models\User;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\ValidationException;

class SportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() {

        $sports = Sport::all();// stocke dans la variable $Taches, les objets Tache récupérés dans la table sports de la base de données.
        return view('sport', ['sports' => $sports,'titre'=>'liste des Sports']);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view ('sports.create', ["titre" => 'Création d\'un sport']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate(
            $request,
            [
                'nom' => 'required',
                'description' => 'required',
                'nb_disciplines'=>'required',
                'nb_epreuves'=>'required',
                'date_debut'=>'required',
                'date_fin'=>'required'

            ],
            [
                'required' => 'Le champ :attribute est obligatoire'
            ]
        );
        $sport = new Sport;
        $sport->nom=$request->nom;
        $sport->description=$request->description;
        $sport->annee_ajout=2023;
        $sport->nb_disciplines=$request->nb_disciplines;
        $sport->nb_epreuves=$request->nb_epreuves;
        $sport->date_debut=$request->date_debut;
        $sport->date_fin=$request->date_fin;
        $sport->save();
        return redirect()->route('sports.index');
    }

    /**
     * Display the specified resource.
     */
    function show(Request $request,$id) {
        $action=$request->query('action','show');
        $s=Sport::all()->find($id);
        return view('sports.sport',['sport'=>$s,'action'=>$action]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $s=Sport::all()->find($id);
        return view('sports.edit',['sport'=>$s]);
    }

    /**
     * Update the specified resource in storage.
     * @throws ValidationException
     */
    public function update(Request $request, string $id): \Illuminate\Http\RedirectResponse
    {
        $sport = Sport::all()->find($id);
        $user=Auth::user();
        if ($user->cant('update', $sport)) {
            return redirect()->route('sports.show', ['sport' => $sport->id, 'action' => 'show'])->with('status', 'Impossible de modifier la tâche');
        }
        if ($request->input('action', 'Valide') == "Annule") {
            return redirect()->route('sports.index')
                ->with('type', 'warning')
                ->with('msg', 'Modification annulée');
        }

        $this->validate(
            $request,
            [
                'nom' => 'required',
                'description' => 'required',
                'nb_disciplines'=>'required',
                'nb_epreuves'=>'required',
                'date_debut'=>'required',
                'date_fin'=>'required'
            ],
            [
                'required' => 'Le champ :attribute est obligatoire'
            ]
        );
        $sport->nom=$request->nom;
        $sport->description=$request->description;
        $sport->annee_ajout=2023;
        $sport->nb_disciplines=$request->nb_disciplines;
        $sport->nb_epreuves=$request->nb_epreuves;
        $sport->date_debut=$request->date_debut;
        $sport->date_fin=$request->date_fin;
        $sport->update();
        return redirect()->route('sports.index');
    }

    /**
     * @throws AuthorizationException
     */
    public function destroy(Request $request, int $id) {
        $sport = Sport::all()->find($id);
        $this->authorize('delete', $sport);
        if (Gate::denies('delete-sport', $sport)) {
            return redirect()->route('sports.show',['sport' => $sport->id, 'action' => 'show'])
                ->with('type', 'error')
                ->with('msg', 'Impossible de supprimer la tâche');
        }


        // vérifications autres

        $sport->delete();

        return redirect()->route('sports.index')->with('status', 'Tâche supprimée avec succès');    }
}
