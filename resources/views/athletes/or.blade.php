<x-layout>
    @if(!empty($athletes))
        <ul>
            @foreach($athletes as $athlete)
                <li class="grid_container">
                    {{$athlete['id']}}
                    {{$athlete['nom']}}
                    {{$athlete['nationalite']}}
                    {{$athlete['age']}}
                    @foreach($athlete->sports as $sport)
                        {{$sport->nom}}
                    @endforeach
                    <button><a href="{{route('athletes.show',[$athlete])}}">Afficher</a></button>
                    <button><a href="{{route('athletes.destroy',[$athlete->id,'action'=>'delete'])}}"> Delete</a></button>
                </li>
            @endforeach

        </ul>
    @endif
</x-layout>
