@extends('layouts.layout')
@section('title', 'Ajoutre un article')
@section('content')

        <div class="row">
            <div class="col-12 text-center pt-2">
                <h1 class="display-one">
                    @lang('lang.text_title_update')
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
                           @lang('lang.text_form_update')
                        </div>
                        <div class="card-body">   
                                <div class="control-grup col-12">
                                    <label for="title">@lang('lang.text_title')</label>
                                    <input type="text" id="title" name="title" class="form-control" value="{{$blogPost->title}}">
                                </div>
                                <div class="control-grup col-12">
                                    <label for="message">@lang('lang.text_content')</label>
                                    <textarea class="form-control" id="message" name="body" >{{$blogPost->body}}</textarea>
                                </div>


                                
                                <div class="control-grup col-12">
                                    <label for="title">@lang('lang.text_title')</label>
                                    <input type="text" id="title" name="title_fr" class="form-control" value="{{$blogPost->title_fr}}">
                                </div>
                                <div class="control-grup col-12">
                                    <label for="message">@lang('lang.text_content')</label>
                                    <textarea class="form-control" id="message" name="body_fr">{{$blogPost->body_fr}}</textarea>
                                </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-success">@lang('lang.text_submit') </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        @endsection