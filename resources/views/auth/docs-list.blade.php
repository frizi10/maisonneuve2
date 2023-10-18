@extends('layouts.layout')
@section('title', 'User List')
@section('content')

<div class="card">
    <div class="card-body">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>@lang('lang.text_name')</th>
                    <th>@lang('lang.text_posts')</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{ $user->id}}</td>
                        <td>{{ $user->name}}</td>
                        <td>
                            <ul>
                            @forelse($user->userHasPosts as $post)
                                <li><a href="{{route('blog.show', $post->id)}}">{{ $post->title}}</a></li>
                            @empty
                                <li>@lang('lang.text_no_article')</li>
                            @endforelse
                            </ul>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $users }}
    </div>
@endsection