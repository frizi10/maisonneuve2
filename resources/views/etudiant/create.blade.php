@extends('layouts.layout')
@section('title', 'Ajouter un etudiant')
@section('content')

        <div class="row">
            <div class="col-12 text-center pt-2">
                <h1 class="display-one">
                    @lang('lang.text_add_student')
                </h1>
            </div> <!--/col-12-->
        </div><!--/row-->
                <hr>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <form method='post'>
                        @csrf
                       
                        <div class="card-header">
                            @lang('lang.text_form_name')
                        </div>
                        <div class="card-body">   
                                <div class="control-grup col-12">
                                    <label for="nom">@lang('lang.text_name')</label>
                                    <input type="text" id="nom" name="nom" class="form-control" value="{{old('nom')}}">
                                    @if($errors->has('nom'))
                                    <div class="text-danger mt-2">
                                    {{$errors->first('nom')}}
                                    </div>       
                            @endif
                                </div>
                                <div class="control-grup col-12">
                                    <label for="adresse">@lang('lang.text_adress')</label>
                                    <textarea class="form-control" id="adresse" name="adresse">{{old('adresse')}}</textarea>
                                </div>
                               <label for="ville"></label>@lang('lang.text_city'):</label>
                                <select name="ville_id" id="ville" class="form-control">
                                    @foreach ($villes as $ville)
                                        <option value="{{ $ville->id }}">{{ $ville->nom }}</option>
                                    @endforeach
                                </select> 
                                <div class="control-grup col-12">
                                    <label for="phone">@lang('lang.text_phone')</label>
                                    <input type="tel" id="phone" name="phone" class="form-control" value="{{old('phone')}}" >
                                    @if($errors->has('phone'))
                                    <div class="text-danger mt-2">
                                    {{$errors->first('phone')}}
                                    </div>       
                            @endif
                                </div>
                                <div class="control-grup col-12">
                                    <label for="email">@lang('lang.text_email')</label>
                                    <input type="text" id="email" name="email" class="form-control" value="{{old('email')}}">
                                    @if($errors->has('email'))
                                    <div class="text-danger mt-2">
                                    {{$errors->first('email')}}
                                    </div>       
                            @endif
                                </div>
                                <div class="control-grup col-12">
                                    <label for="password">@lang('lang.text_password')</label>
                                    <input type="text" id="passwword" name="password" class="form-control" >
                                    @if($errors->has('password'))
                                    <div class="text-danger mt-2">
                                    {{$errors->first('password')}}
                                    </div>       
                            @endif
                                </div>
                                <div class="control-grup col-12">
                                    <label for="date_de_naissance">@lang('lang.text_date_of_birth')</label>
                                    <input type="date" id="date_de_naissance" name="date_de_naissance" class="form-control">
                                      @if($errors->has('date_de_naissance'))
                                        <div class="text-danger mt-2">
                                        {{$errors->first('date_de_naissance')}}
                                        </div>       
                                @endif
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