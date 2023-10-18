@extends('layouts.layout')
@section('title', 'Afficher étudiant')
@section('content')

        <div class="row">
            <div class="col-8 text-center mx-auto pt- mb-3  ">
                <h2 class="display-one">
                  @lang('lang.text_contact') {{$etudiant->nom}}
                </h2>
           
         </div>
                <hr>
        <div class="row justify-content-center">
            <div class="col-md-8">
              <table class="table">
                  <thead>
                    <tr>
                      <th scope="col">@lang('lang.text_name')</th>
                      <th scope="col">@lang('lang.text_adress')</th>
                      <th scope="col">@lang('lang.text_city')</th>
                      <th scope="col">@lang('lang.text_phone')</th>
                      <th scope="col">@lang('lang.text_email')</th>
                      <th scope="col">@lang('lang.text_date_of_birth')</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                    
                      <td>{{$etudiant->nom}}</td>
                      <td>{{$etudiant->adresse}}</td>
                      <td> {{$etudiant->studentHasCity->nom}}</td>
                      <td>{{$etudiant->phone}}</td>
                      <td>{{$etudiant->email}}</td>
                      <td>{{$etudiant->date_de_naissance}}</td>
                    </tr> 
                  </tbody>
              </table>
             </div>
          </div>
        </div> 
        
        @endsection
       
        