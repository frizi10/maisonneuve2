@extends('layouts.layout')
@section('title', " Liste des étudiants")
@section('content')
<div class="container">
    <h1>Liste des etudiants</h1>
    <div class="col-md-4">
        <a href="{{route('etudiant.create')}}" class='btn btn-primary'>Ajouter</a>
    </div>
    <ul class="list-group">
    @foreach ($etudiants as $etudiant)
<li class="list-group-item d-flex flex-row justify-content-between " ><strong>{{$etudiant->nom}} </strong> <a href="{{route('etudiant.show', $etudiant->id)}}" class='btn btn-primary '>Afficher</a> <a href="{{route('etudiant.edit', $etudiant->id)}}" class='btn btn-secondary'>Modifier</a> 
    {{-- <form action="{{route('etudiant.delete', $etudiant->id)}}" method="post">
    @csrf
    @method('delete')
    <input type="submit" value="effacer" class="btn btn-danger ">
    
</form> --}}
</li>
        
    @endforeach
    </ul>
</div>
@endsection

