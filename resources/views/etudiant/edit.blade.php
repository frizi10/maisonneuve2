@extends('layouts.layout')
@section('title', 'Modifier étudiant')
@section('content')

        <div class="row">
            <div class="col-12 text-center pt-2">
                <h1 class="display-one">
                    Mettre a jour
                </h1>
            </div> <!--/col-12-->
        </div><!--/row-->
                <hr>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <form method='post'>
                        @csrf
                        @method('put')
                        <div class="card-header">
                            Formulaire de mise à jour  
                        </div>
                        <div class="card-body">   
                                <div class="control-grup col-12">
                                    <label for="nom" class="mb-1" >Nom</label>
                                    <input type="text" id="nom" name="nom" class="form-control mb-3" value="{{$etudiant->nom}}">
                                </div>
                                <div class="control-grup col-12">
                                    <label for="adresse" class="mb-3">Adresse</label>
                                    <textarea class="form-control mb-4" id="adresse" name="adresse" >{{$etudiant->adresse}}</textarea>
                                </div>
                                <label for="ville" class="mb-3">La ville :</label>
                                <select name="ville_id" id="ville">
                                    @foreach ($villes as $ville)
                                        <option value="{{ $ville->id }}">{{ $ville->nom }}</option>
                                    @endforeach
                                </select> 
                                <div class="control-grup col-12">
                                    <label for="phone" class="mb-1">Phone</label>
                                    <input type="tel" id="phone" name="phone" class="form-control mb-3" value="{{$etudiant->phone}}">
                                </div>
                                <div class="control-grup col-12">
                                    <label for="email" class="mb-3">Email:</label>
                                    <input type="text" id="email" name="email" class="form-control mb-3" value="{{$etudiant->email}}">
                                </div>
                                <div class="control-grup col-12">
                                    <label for="date_de_naissance" class="mb-2">Date de naissance</label>
                                    <input type="date" id="date_de_naissance" name="date_de_naissance" class="form-control" value="{{$etudiant->date_de_naissance}}">
                                </div>
                                
                        </div>
                        <div class="card-footer">
                            <input type="submit" class="btn btn-success">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        @endsection