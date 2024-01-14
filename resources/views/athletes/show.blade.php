<x-layout>
    @if($action=='delete')
        <h1>Supression de l'athlete :</h1>
    @else
        <h1>Affichage de l'athlete :</h1>
    @endif
    <ul>
        <h1>{{$athlete['nom']}}</h1>
        <li class="grid_container">
            {{$athlete['id']}}
            {{$athlete['nom']}}
            {{$athlete['nationalite']}}
            {{$athlete['age']}}
            @if($athlete->sports!==null)
            @foreach($athlete->sports as $sport)
                <hr>
                {{$sport->nom}}
                {{$sport->pivot->rang}}
                {{$sport->pivot->performance}}
            @endforeach
            @endif
        </li>
        @if($action=='delete')
            <form action='{{route('athletes.destroy',$athlete->id)}}' method="POST">
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
