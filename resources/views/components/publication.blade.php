<div class="post-container">
    <div class="user-info">
        <img src="user-photo.jpg" alt="Photo de l'utilisateur" class="user-photo">
        <span class="user-name">{{$publication->user->name}}</span>
    </div>
    <div class="post-content">
        <img src="post-image.jpg" alt="Image de la publication" class="post-image">
        <p class="post-description">
            {{$publication->description}}
        </p>
    </div>
    <div class="post-footer">
        <span class="comments-count">12 commentaires</span>
    </div>
</div>
