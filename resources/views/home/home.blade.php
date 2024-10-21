@extends('admin')
@section('title', 'Accueil')
@section('css')
    <link rel="stylesheet" href="{{asset('css/home/home.css')}}">
@endsection
@section('containers')
    <div class="dashboards">
        <div class="cards">
            <a style="text-decoration: none;" href="{{route('admin.users.index')}}" class="card blue">
                <h3>Utilisateurs</h3>
                <p>{{$users}}</p>
                <span>Gérer les utilisateurs</span>
            </a>
            <a style="text-decoration: none;" href="{{route('admin.posts.index')}}" class="card light-blue">
                <h3>Publications</h3>
                <p>{{$posts}}</p>
                <span>Gérer les publications</span>
            </a>
            <a style="text-decoration: none;" href="/user" class="card purple">
                <h3>Utilisateurs</h3>
                <p>12</p>
                <span>Gérer les utilisateurs</span>
            </a>
            <a style="text-decoration:none;" href="/ventes" class="card green">
                <h3>Ventes</h3>
                <i style="color:white">Les 5 dérnières ventes: </i>
                <p class="fw-bolder"><?=number_format(10000, thousands_separator: ' ')?> Ar</p>
                <span>Gérer les ventes</span>
            </a>
        </div>
    <div class="table-data">
        <div class="order">
            <div class="head">
                <h3>Publications récentes</h3>
                <i class='bx bx-search'></i>
                <i class='bx bx-filter'></i>
            </div>
            <table>
                <thead>
                    <tr>
                        <th></th>
                        <th>User</th>
                        <th>Date de publication</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($recentPost as $post)
                        <tr>
                            <td>
                                @if ($post->user->image)
                                <img src="{{$post->user->imageUrl()}}" style="height:40px;width:40px;border-radius:50%" alt="">
                                @endif
                            </td>
                            <td class="fw-bolder">{{$post->user->name}}</td>
                            <td>{{ \Carbon\Carbon::parse($post->created_at)->translatedFormat('d F Y')}}</td>
                            <td>
                                <a href="" class="btn btn-sm btn-primary">Details</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    </div>
@endsection
