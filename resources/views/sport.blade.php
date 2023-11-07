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
            <br>
            {{$sport['nom']}}
            <br>
            {{$sport['description']}}
            <br>
            {{$sport['annee_ajout']}}
            <br>
            {{$sport['nb_disciplines']}}
            <br>
            {{$sport['nb_epreuves']}}
            <br>
            {{$sport['date_debut']}}
            <br>
            {{$sport['date_fin']}}
        </li>
    @endforeach
</ul>
</body>
