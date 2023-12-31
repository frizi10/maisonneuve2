
@extends('layouts.layout')
@section('title', 'Liste des articles')
@section('content')
<hr>
    <div class="row">
        <div class="col-12 pt-2">
            <a href="{{ route('blog.index')}}" class="btn btn-outline-primary btn-sm">@lang('lang.text_back')</a>
            <h4 class="display-4 mt-5">
                {{ $blogPost->title }}
            </h4>
            <hr>
            <p>
                {!! $blogPost->body !!}
            </p>
            <p>
                <strong>@lang('lang.text_author'): </strong> {{ $blogPost->blogHasUser->name }}
            </p>
        </div>
    </div>
    <hr>
    @if(auth()->user()->id === $blogPost->user_id)
    <div class="row">
        <div class="col-6">
            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal">
                @lang('lang.text_delete')
              </button>
            <a href="{{route('blog.edit', $blogPost->id)}}" class="btn btn-primary">@lang('lang.text_modifiy')</a>
        </div>
        <div class="col-6">
           
            
        </div>
    </div>
    @endif
    <!-- Button trigger modal -->
{{-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
    Launch demo modal
  </button> --}}
  
  <!-- Modal -->
  <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Effacer</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          @lang('lang.text_delete_message') {{$blogPost->title}} 
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <form action="{{route('blog.delete', $blogPost->id)}}" method="post">
            @csrf
            @method('delete')
            <input type="submit" value="effacer" class="btn btn-danger">
            
        </form>
        </div>
      </div>
    </div>
  </div>
@endsection