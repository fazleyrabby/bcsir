@extends('layouts.app')

@section('title', $page->title)

@section('content')
    <div class="page-title">
        <div class="container">
            <h1>{{ $page->title }}</h1>
        </div>
    </div>

    <div class="container">
        <article class="card">
            @if($page->content)
                <div>{!! $page->content !!}</div>
            @else
                <p>No content available.</p>
            @endif
        </article>
    </div>
@endsection
