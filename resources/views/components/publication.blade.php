<div class="post-wrapper">
    <div class="post-header">
        <img src="{{$post->user->imageUrl()}}" alt="User Photo" class="user-photo">
        <div class="user-info">
            <a href="{{route('admin.users.show', $post->user)}}"><h3>{{$post->user->name}}</h3></a>
            <span class="post-date"> {{ \Carbon\Carbon::parse($post->created_at)->translatedFormat('d F Y')}}</span>
        </div>
    </div>
    <div class="post-content">
        <p>{{$post->description}}</p>
    </div>
    <div class="post-footer">
        <div class="tags">
            <span class="tag">#JavaScript</span>
            <span class="tag">#PHP</span>
        </div>
        <div class="post-actions">
            <form action="{{route('admin.posts.destroy', $post)}}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="mx-1 btn btn-danger">Supprimer</button>
            </form>
            <button class="share-btn">Contacter</button>
            <span>123 Vues</span>
        </div>
    </div>
</div>
