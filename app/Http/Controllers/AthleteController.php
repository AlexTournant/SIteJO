<?php

namespace App\Http\Controllers;

use App\Models\Athlete;
use App\Models\Sport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;

class AthleteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request){
        $cat = $request->input('cat', null);
        $value = $request->cookie('cat', null);

        if (!$cat) {
            if (!$value) {
                // No category provided and no cookie set, get all athletes
                $athletes = Athlete::all();
                $cat = 'All';
                Cookie::forget('cat');
            } else {
                // No category provided, but a cookie is set, filter athletes by the cookie value
                $athletes = Athlete::whereHas('sports', function ($query) use ($value) {
                    $query->where('nom', $value);
                })->get();

                $cat = $value;
                Cookie::queue('cat', $cat, 10);
            }
        } else {
            if ($cat == 'All') {
                // Category is "All", get all athletes
                $athletes = Athlete::all();
                Cookie::forget('cat');
            } else {
                // Category is provided, filter athletes by the category
                $athletes = Athlete::whereHas('sports', function ($query) use ($cat) {
                    $query->where('nom', $cat);
                })->get();

                Cookie::queue('cat', $cat, 10);
            }
        }

        $noms = Sport::distinct('nom')->pluck('nom');

        return view('athletes.index', ['athletes' => $athletes, 'jeux' => $noms, 'cat' => $cat]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $sports=Sport::distinct()->pluck("nom");
        return view ('athletes.create',['sports'=>$sports]);

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
                'nationalite' => 'required',
                'age'=>'required',

            ],
            [
                'required' => 'Le champ :attribute est obligatoire'
            ]
        );
        $athlete = new Athlete;
        $athlete->nom=$request->nom;
        $athlete->nationalite=$request->nationalite;
        $athlete->age=$request->age;
        $athlete->save();
        return redirect()->route('athletes.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request,$id)
    {
        $action=$request->query('action','show');
        $s=Athlete::all()->find($id);
        return view('athletes.show',['athlete'=>$s,'action'=>$action]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $sports=Sport::distinct()->pluck("nom");
        $s=Athlete::find($id);
        return view('athletes.edit',['athlete'=>$s,"sports"=>$sports]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $athlete = Athlete::all()->find($id);
        $this->validate(
            $request,
            [
                'nom' => 'required',
                'nationalite' => 'required',
                'age'=>'required',

            ],
            [
                'required' => 'Le champ :attribute est obligatoire'
            ]
        );
        $athlete->nom=$request->nom;
        $athlete->nationalite=$request->nationalite;
        $athlete->age=$request->age;
        $athlete->update();
        return redirect()->route('athletes.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $athlete = Athlete::find($id);

        $athlete->delete();

        return redirect()->route('athletes.index')
            ->with('type', 'primary')
            ->with('msg', 'Scène supprimée avec succès');
    }
    public function medailleOr($nomSport){
        $sport = Sport::all()->where('nom', $nomSport)->first();

        if ($sport) {
            $athletes = $sport->athletes->where('pivot.rang', 1);
        } else {
            $athletes = collect();
        }
        return view('athletes.or', ["athletes" => $athletes]);
    }
}
