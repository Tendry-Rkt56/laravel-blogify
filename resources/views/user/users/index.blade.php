@extends('user')
@section('title', 'Les utilisateurs')
@section('containers')
<div class="container-fluid d-flex align-items-center justify-content-between gap-1 mb-5">
    <h2 class="title" class="my-4 fw-bolder">Les utilsateurs</h2>
</div>

<form class="gap-2 d-flex align-items-center justify-content-start flex-row" style="width:70%">
    <input type="text" value="{{$search}}" placeholder="Rechercher..." class="form-control" style="width:30%" name="search">
    <input type="submit" class="btn btn-outline-primary btn-sm">
</form>

<div class="my-4 container-fluid d-flex align-items-center justify-content-center flex-column">
    @if (session('success'))
        <div class="container-fluid my-1 alert alert-success d-flex align-items-center justify-content-center">
            {{session('success')}}
        </div>
    @endif
    @if (session('danger'))
        <div class="container-fluid my-1 alert alert-danger d-flex align-items-center justify-content-center">
            {{session('danger')}}
        </div>
    @endif
    <table class="my-4 table table-striped table-hover">
        <thead>
            <tr>
                <th></th>
                <th>Image</th>
                <th>Nom</th>
                <th>Email</th>
                <th>Adresse</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @forelse ($users as $user)
                <tr>
                    <td>{{$user->id}}</td>
                    <td>
                        @if ($user->image)
                        <img style="width:40px;height:40px;border-radius:50%" class="image" src="{{$user->imageUrl()}}" alt="">
                        @endif
                    </td>
                    <td style="color:#6c7af5" class="name">{{$user->name}}</td>
                    <td class="fw-bolder">{{$user->email}}</td>
                    <td>{{$user->adresse}}</td>
                    {{-- <td class="fw-bolder">{{$user->role == "admin" ? 'Administrateur' : 'Utilisateur'}}</td> --}}

                    <td>
                        <div class="d-flex gap-1">
                            <a href="{{route('user.show', $user)}}" class="btn btn-primary btn-sm">Voir le profil</a>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>Pas de correspondance</td>
                    <td></td>
                    <td></td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
{{$users->links()}}
@endsection
