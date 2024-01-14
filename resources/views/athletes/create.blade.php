<x-layout>
    <form action="{{route('athletes.store')}}" method="POST">
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
            <div class="form-control">
                <label class="form-label" for="sport">Sport :</label>
                <select class="form-label" name="sport" id="sport">
                    @foreach($sports as $sport)
                        <option value="{{$sport}}">{{$sport}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-control">
                <label class="form-label" for="nationalite">Nationalite :</label>
                <select class="form-label" name="nationalite" id="nationalite">
                    <option value="Francais">Francais</option>
                    <option value="Belge">Belge</option>
                    <option value="Anglais">Anglais</option>
                    <option value="Espagnol">Espagnol</option>
                    <option value="Allemand">Allemand</option>
                    <option value="Suisse">Suisse</option>

                </select>
            </div>
            {{-- Description --}}
            <div class="form-control">
                <label class="form-label" for="rang">Rang :</label>
                <input class="form-input" type="text" id="rang" name="rang"
                       value="{{ old('rang') }}">
            </div>{{-- Description --}}
            <div class="form-control">
                <label class="form-label" for="performance">Performance :</label>
                <input class="form-input" type="text" id="performance" name="performance"
                       value="{{ old('performance') }}">
            </div>
            <div class="form-buttons">
                <button type="reset">Annule</button>
                <button type="submit">Valide</button>
            </div>
        </div>
    </form>
</x-layout>
