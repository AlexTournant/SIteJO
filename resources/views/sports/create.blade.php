<x-layout>
    <h1>{{$titre}}</h1>
    <form action="{{route('sports.store')}}" method="POST">
        {!! csrf_field() !!}
        <div class="form-create">
            {{-- la date d'expiration  --}}
            <div class="form-control">
                <label class="form-label" for="nom">Nom :</label>
                <input class="form-input" type="text" name="nom" id="nom"
                       value="{{ old('nom') }}">
            </div>
            {{-- la catégorie  --}}
            <div class="form-control">
                <label class="form-label" for="nationalite">Nationalite :</label>
                <input class="form-input" type="text" id="nationalite" name="nationalite"
                       value="{{ old('nationalite') }}">
            </div>
            {{-- Description --}}
            <div class="form-control">
                <label class="form-label" for="age">Age :</label>
                <input class="form-input" type="text" id="age" name="age"
                       value="{{ old('age') }}">
            </div>
            <div class="form-buttons">
                <button type="reset">Annule</button>
                <button type="submit">Valide</button>
            </div>
        </div>
    </form>
</x-layout>
