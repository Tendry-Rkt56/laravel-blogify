@extends('admin')
@section('title', 'Posts')
@section('css')
    <link rel="stylesheet" href="{{asset('css/partials/publications.css')}}">
@endsection
@section('containers')
    <div class="container-fluid d-flex align-items-center justify-content-between gap-1 mb-5">
        <h2 class="title" class="my-4 fw-bolder">Les publications</h2>
    </div>

    <form class="gap-2 d-flex align-items-center justify-content-start flex-row" style="width:70%">
        <input type="text" value="{{$search}}" placeholder="Rechercher..." class="form-control" style="width:30%" name="search">
        <input type="submit" value="Rechercher" class="btn btn-outline-primary btn-sm">
    </form>

    <div class="my-4 container-fluid d-flex align-items-center justify-content-center flex-column">
        @if (session('success'))
            <div class="container my-1 alert alert-success d-flex align-items-center justify-content-center">
                {{session('success')}}
            </div>
        @endif
        @if (session('danger'))
            <div class="container my-1 alert alert-danger d-flex align-items-center justify-content-center">
                {{session('danger')}}
            </div>
        @endif

        <div class="container-fluid d-flex align-items-center justify-content-center flex-column gap-3">
            @forelse ($posts as $post)
                @include('components.publication', ['post' => $post])
            @empty
                <div class="container fw-bolder">Aucune publication correspondante</div>
            @endforelse ()
            {{$posts->links()}}
        </div>

    </div>
@endsection
