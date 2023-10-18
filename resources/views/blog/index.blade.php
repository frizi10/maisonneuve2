@extends('layouts.layout')
@section('title', 'Liste des articles')
@section('content')
     
    <hr>
    <div class="row">
        <div class="col-md-8">
            <p>@lang('lang.text_enjoy_lecture')</p>
        </div>
        <div class="col-md-4">
            <a href="{{route('blog.create')}}" class='btn btn-primary'>@lang('lang.text_add_article')</a>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>@lang('lang.text_list_article')</h4>
                </div>
                <div class="card-body">
                    
                    <ul>
                        @forelse($posts as $post)
                            {{-- <li>{{ $post->title }} </li> --}}
                          <li>  <a href="{{route('blog.show', $post->id)}}">{{ $post->title }}</a></li>
                        @empty
                            <li class='text-danger'>@lang('lang.text_no_article')</li>
                        @endforelse
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
