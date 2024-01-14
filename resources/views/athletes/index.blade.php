<x-layout>
    @if(!empty($athletes))
        <h4 class="text-center mt-3">Filtrage par jeu:</h4>
        <form class="text-center" action="{{ route('athletes.index') }}" method="get">
            <select name="cat" class="form-select">
                <option value="All" @if($cat == 'All') selected @endif>-- Jeu --</option>
                @foreach($jeux as $jeu)
                    <option value="{{ $jeu }}" @if($cat == $jeu) selected @endif>{{ $jeu }}</option>
                @endforeach
            </select>
            <input style="margin-top: 15px" type="submit" class="btn btn-primary" value="Filtrer">
        </form>
        <div class="container mt-3 text-center">
            <a href="{{ route('athletes.or',[$cat]) }}" class="btn btn-success">Les medaillé d'or de {{$cat}} !</a>
        </div>
        <ul>
        @foreach($athletes as $athlete)
            <li class="grid_container">
                {{$athlete['id']}}
                {{$athlete['nom']}}
                {{$athlete['nationalite']}}
                {{$athlete['age']}}
                <button><a href="{{route('athletes.show',[$athlete->id])}}">Afficher</a></button>
                <button class="update"><a href="{{route('athletes.edit',[$athlete->id])}}"> Update</a></button>
                <button><a href="{{route('athletes.destroy',[$athlete->id,'action'=>'delete'])}}"> Delete</a></button>

            </li>
        @endforeach
        @auth()
            <button><a href="{{route('athletes.create')}}">Ajouter un athletes</a></button>
            @endauth

        </ul>
    @endif
</x-layout>
