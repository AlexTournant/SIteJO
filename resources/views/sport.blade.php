<x-layout>
<h1>{{$titre}}</h1>
<ul>
    @foreach($sports as $sport)
        <li class="grid_container">
            {{$sport['id']}}
            {{$sport['nom']}}
            {{$sport['description']}}
            {{$sport['annee_ajout']}}
            {{$sport['nb_disciplines']}}
            {{$sport['nb_epreuves']}}
            {{$sport['date_debut']}}
            {{$sport['date_fin']}}
            <button><a href="{{route('sports.show',[$sport['id']])}}">Afficher</a></button>
            @can('update',$sport)
            <button class="update"><a href="{{route('sports.edit',[$sport->id])}}"> Update</a></button>
            @endcan
            @can('delete',$sport)
            <button><a href="{{route('sports.destroy',[$sport->id,'action'=>'delete'])}}"> Delete</a></button>
            @endcan
        </li>
    @endforeach
    @auth()
    <button><a href="{{route('sports.create')}}">Ajouter un sport</a></button>
        @endauth
</ul>
</x-layout>
