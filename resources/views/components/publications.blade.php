<div class="post-wrapper">
    <div class="post-header">
        <img src="{{$post->user->imageUrl()}}" alt="User Photo" class="user-photo">
        <div class="user-info">
            <a href="{{route('admin.users.show', $post->user)}}"><h3>{{$post->user->name}}</h3></a>
            <span class="post-date"> {{ \Carbon\Carbon::parse($post->created_at)->translatedFormat('d F Y')}}</span>
        </div>
    </div>
    <div class="post-content">
        <img style="width:40%;height:150px;" src="{{$post->user->imageUrl()}}" alt="">
        <p>{{$post->description}}</p>
    </div>
    <div class="post-footer">
        <div class="tags">
            <span class="tag">#JavaScript</span>
            <span class="tag">#PHP</span>
        </div>
        <div class="post-actions">
            @if (Auth::user()->isAdmin() || Auth::user()->id == $post->user->id)
                <form action="{{route('admin.posts.destroy', $post)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="mx-1 btn btn-danger">Supprimer</button>
                </form>
            @endif
            <button class="share-btn">Contacter</button>
            @php
                $commentaires = $post->comments->count() > 1 ? 'commentaires' : 'commentaire';
            @endphp
            <span>{{$post->comments->count()}} {{$commentaires}}</span>
        </div>
    </div>

<div class="comments-section">
    @forelse ($post->comments as $comment)
        <div class="comment">
            <div class="comment-header">
                <img src="{{$comment->user->image ? $comment->user->imageUrl() : 'https://via.placeholder.com/40'}}" alt="Commenter Photo" class="comment-photo">
                <div class="comment-info">
                    <a href="{{route('admin.users.show', $comment->user)}}"><h4>{{$comment->user->name}}</h4></a>
                    <span class="comment-date">Commenté le : 20 Octobre 2024</span>
                </div>
            </div>
            <div class="comment-content">
                <p>{{$comment->content}}</p>
            </div>
        </div>
    @empty
        <div class="container">Pas de commentaire</div>
    @endforelse
</div>
</div>
