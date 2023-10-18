@extends('layouts.layout')
@section('title', 'Pagination')
@section('content')
<hr>
<div class="card">
    <div class="card-body">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>@lang('lang.text_title')</th>
                </tr>
            </thead>
            <tbody>
                @foreach($blogPosts as $blogPost)
                    <tr>
                        <td>{{ $blogPost->id}}</td>
                        <td>{{ $blogPost->title}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{$blogPosts}}
    </div>
</div>
@endsection