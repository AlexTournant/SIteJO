<!-- fichier exemple.blade.php -->
@extends('layout.master')

@section('title', 'Page exemple')

@section('sidebar')
    @parent

    <p>This is appended to the master sidebar.</p>
@endsection

@section('content')
    <p>This is my body content.</p>
@endsection
<x-information titre="Météo du jour"/>
