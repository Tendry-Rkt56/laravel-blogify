@extends('user')
@section('title', 'Création')
@section('css')
    <link rel="stylesheet" href="{{asset('css/partials/create.css')}}">
@endsection
@section('containers')
    <div class="create-post-wrapper">
        <form class="create-post-form" action="{{route('user.posts.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <h2>Créer une Nouvelle Publication</h2>

            <div class="form-group">
                <label for="post-title">Titre de la publication</label>
                <input type="text" id="title" name="title" placeholder="Entrez le titre ici..." required>
            </div>

            <div class="form-group">
                <label for="post-content">Contenu</label>
                <textarea id="post-content" name="description" rows="5" placeholder="Écrivez votre contenu ici..." required></textarea>
            </div>

            <div class="form-group">
                <label for="post-image">Ajouter une Image</label>
                <input type="file" id="post-image" name="image" accept="image/*">
            </div>

            <div class="form-actions">
                <button type="submit" class="submit-btn">Publier</button>
                <button type="reset" class="reset-btn">Annuler</button>
            </div>
        </form>
    </div>
@endsection
