<!doctype html>
<html lang=fr>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css'])
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>{{$titre ?? "Application Laravel"}}</title>
</head>
<body>
<menu>
    <x-header></x-header>
</menu>
<main>
    {{$slot}}
</main>
<aside>
    Explications
    <br>
    Les Jeux Olympiques et Paralympiques sont le plus grand événement sportif mondial. Le tour est venu pour Paris d’accueillir le monde et de célébrer les valeurs olympiques et paralympiques.
</aside>
<footer>
    <x-footer></x-footer>
</footer>
</body>
</html>
