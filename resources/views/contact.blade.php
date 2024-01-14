<x-layout>
    <form action="{{route('contacts')}}" method="GET">
        @csrf
        <div class="form-create">
            {{-- la date d'expiration  --}}
            <div class="form-control">
                <label class="form-label" for="nom">Nom :</label>
                <input class="form-input" type="text" name="nom" id="nom"
                       >
            </div>
            {{-- la catégorie  --}}
            <div class="form-control">
                <label class="form-label" for="description">Email :</label>
                <input class="form-input" type="text" id="description" name="description">
            </div>
            {{-- Description --}}
            <div class="form-control">
                <label class="form-label" for="nb_disciplines">Message :</label>
                <input class="form-input" type="text" id="nb_disciplines" name="nb_disciplines"
                       >
            </div>
            <div class="form-buttons">
                <button type="reset">Annule</button>
                <button type="submit">Valide</button>
            </div>
        </div>
    </form>
</x-layout>
