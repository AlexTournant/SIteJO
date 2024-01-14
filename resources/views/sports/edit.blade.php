<x-layout>
    <form action="{{route('sports.update',$sport->id)}}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-create">
            {{-- la date d'expiration  --}}
            <div class="form-control">
                <label class="form-label" for="nom">Nom :</label>
                <input class="form-input" type="text" name="nom" id="nom"
                       value="{{ $sport->nom }}">
            </div>
            {{-- la catégorie  --}}
            <div class="form-control">
                <label class="form-label" for="description">Description :</label>
                <input class="form-input" type="text" id="description" name="description"
                       value="{{ $sport->description }}">
            </div>
            {{-- Description --}}
            <div class="form-control">
                <label class="form-label" for="nb_disciplines">Nombre discipline :</label>
                <input class="form-input" type="text" id="nb_disciplines" name="nb_disciplines"
                       value="{{ $sport->nb_disciplines }}">
            </div>
            <div class="form-control">
                <label class="form-label" for="nb_epreuves">Nombre Epreuves :</label>
                <input class="form-input" type="text" name="nb_epreuves" id="nb_epreuves"
                       value="{{ $sport->nb_epreuves }}">
            </div>
            {{-- la catégorie  --}}
            <div class="form-control">
                <label class="form-label" for="date_debut">Date Debut :</label>
                <input class="form-input" type="date" id="date_debut" name="date_debut"
                       value="{{ $sport->date_debut }}">
            </div>
            {{-- Description --}}
            <div class="form-control">
                <label class="form-label" for="date_fin">Date Fin :</label>
                <input class="form-input" type="date" id="date_fin" name="date_fin"
                       value="{{ $sport->date_fin }}">
            </div>
            <div class="form-buttons">
                <button type="reset">Annule</button>
                <button type="submit">Valide</button>
            </div>
        </div>
    </form>
</x-layout>
