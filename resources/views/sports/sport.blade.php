<x-layout>
    @if($action=='delete')
        <h1>Supression du sport :</h1>
    @else
        <h1>Affichage du sport :</h1>
   @endif
    <ul>
        <h1>{{$sport['nom']}}</h1>
        <li class="grid_container">
            {{$sport['id']}}
            {{$sport['nom']}}
            {{$sport['description']}}
            {{$sport['annee_ajout']}}
            {{$sport['nb_disciplines']}}
            {{$sport['nb_epreuves']}}
            {{$sport['date_debut']}}
            {{$sport['date_fin']}}
        </li>
        @if($action=='delete')
            <form action='{{route('sports.destroy',$sport->id)}}' method="POST">
                @csrf
                @method('DELETE')
                <div>
                    <button>delete</button>
                    <button>annuler</button>
                </div>
            </form>
        @endif
    </ul>
</x-layout>
