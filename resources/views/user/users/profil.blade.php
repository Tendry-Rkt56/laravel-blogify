@extends('user')
@section('title', $user->name)
@section("css")
    <link rel="stylesheet" href="{{asset('css/partials/profil.css')}}">
@endsection
@section('containers')

    @include('components.profil', ['user' => $user])

@endsection
