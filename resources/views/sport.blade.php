<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>Liste des Sports</title>
</head>
<body>
<p>la liste des Sports</p>
<ul>
    @foreach($sports as $sport)
        <li>{{$sport['id']}}
            {{$sport['nom']}}
            {{$sport['description']}}
            {{$sport['annee_ajout']}}
            {{$sport['nb_discipline']}}
            {{$sport['nb_epreuves']}}
            {{$sport['daye_debut']}}
            {{$sport['date_fin']}}
        </li>
    @endforeach
</ul>
</body>
