@extends('layouts.layout')
@section('title', 'Creer un article')
@section('content')

        <div class="row">
            <div class="col-12 text-center pt-2">
                <h1 class="display-one">
                    @lang('lang.text_add_article')
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
                            @lang('lang.text_form_add_article')
                        </div>
                        <div class="card-body">   
                                <div class="control-grup col-12">
                                    <label for="title">Title</label>
                                    <input type="text" id="title" name="title" class="form-control">
                                </div>
                                <div class="control-grup col-12">
                                    <label for="message">Content</label>
                                    <textarea class="form-control" id="message" name="body"></textarea>
                                </div>

                                <div class="control-grup col-12">
                                    <label for="title">Titre francais</label>
                                    <input type="text" id="title" name="title_fr" class="form-control">
                                </div>
                                <div class="control-grup col-12">
                                    <label for="message">Contenu francais</label>
                                    <textarea class="form-control" id="message" name="body_fr"></textarea>
                                </div>
                                {{-- <div class="control-grup col-12">
                                    <label for="category">Categories</label>
                                    <select name="category_id" id="category" class="form-control">
                                        @foreach($categories as $category)
                                            <option value="{{$category->id}}">{{$category->category}}</option>
                                        @endforeach
                                    </select>
                                </div> --}}
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-success"> @lang('lang.text_submit')</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        @endsection