<x-layout>
    <form action="{{route('athletes.update',$athlete->id)}}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-create">
            {{-- la date d'expiration  --}}
            <div class="form-control">
                <label class="form-label" for="nom">Nom :</label>
                <input class="form-input" type="text" name="nom" id="nom"
                       value="{{ $athlete->nom }}">
            </div>
            {{-- la catégorie  --}}
            <div class="form-control">
                <label class="form-label" for="nationalite">Nationalite :</label>
                <input class="form-input" type="text" id="nationalite" name="nationalite"
                       value="{{ $athlete->nationalite }}">
            </div>
            {{-- Description --}}
            <div class="form-control">
                <label class="form-label" for="age">Age :</label>
                <input class="form-input" type="text" id="age" name="age"
                       value="{{ $athlete->age }}">
            </div>
            @if($athlete->sports->count() > 0)
                @foreach($athlete->sports as $sport)
                    <div class="form-control">
                        <label class="form-label" for="sport">Sport :</label>
                        <select class="form-label" name="sport" id="sport">
                            @foreach($sports as $onesport)
                                <option value="{{$onesport}}">{{$onesport}}</option>
                            @endforeach
                        </select>
                    </div>
                    {{-- Description --}}
                    <div class="form-control">
                        <label class="form-label" for="rang">Rang :</label>
                        <input class="form-input" type="text" id="rang" name="rang"
                               value="{{ $sport->pivot->rang }}">
                    </div>{{-- Description --}}
                    {{-- Description --}}
                    <div class="form-control">
                        <label class="form-label" for="performance">Performance :</label>
                        <input class="form-input" type="text" id="performance" name="performance"
                               value="{{ $sport->pivot->performance }}">
                    </div>
                @endforeach
            @else
                <div class="form-control">
                    <label class="form-label" for="sport">Sport :</label>
                    <select class="form-label" name="sport" id="sport">
                        @foreach($sports as $sport)
                            <option value="{{$sport}}">{{$sport}}</option>
                        @endforeach
                    </select>
                </div>
                {{-- Description --}}
                <div class="form-control">
                    <label class="form-label" for="rang">Rang :</label>
                    <input class="form-input" type="text" id="rang" name="rang"
                           value="{{ old('rang') }}">
                </div>{{-- Description --}}
                {{-- Description --}}
                <div class="form-control">
                    <label class="form-label" for="performance">Performance :</label>
                    <input class="form-input" type="text" id="performance" name="performance"
                           value="{{ old('performance') }}">
                </div>
            @endif
            <div class="form-buttons">
                <button type="reset">Annule</button>
                <button type="submit">Valide</button>
            </div>
        </div>
    </form>
</x-layout>
