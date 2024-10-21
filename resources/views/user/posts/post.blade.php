@extends('user')
@section('title', $post->user->name)
@section('css')
    <link rel="stylesheet" href="{{asset('css/partials/publications.css')}}">
@endsection
@section('containers')
    @include('components.publications', ['post' => $post])
@endsection
