<div class="post-wrapper">
    <div class="post-header">
        <img src="{{$post->user->imageUrl()}}" alt="User Photo" class="user-photo">
        <div class="user-info">
            @php
                $route = str_contains(request()->route()->getName(), 'admin.') ? 'admin.posts.show' : 'user.posts.show';
            @endphp
            <a href="{{route($route, $post->user)}}"><h3>{{$post->user->name}}</h3></a>
            <span class="post-date"> {{ \Carbon\Carbon::parse($post->created_at)->translatedFormat('d F Y')}}</span>
        </div>
    </div>
    <div class="post-content">
        @if ($post->image)
            <img style="width:40%;height:150px;" src="{{$post->imageUrl()}}" alt="">
        @endif
        <h3 class="fw-bolder">{{$post->title}}</h3>
        <p>{{$post->description}}</p>
    </div>
    <div class="post-footer">
        <div class="tags">
            <form method="POST" action="{{route('user.comments.store')}}" class="d-flex align-items-center justify-content-center gap-1" style="width:80%">
                @csrf
                <input type="hidden" value="{{$post->id}}" name="post_id">
                <textarea name="content" id="" class="form-control @error('content') is-invalid @enderror"></textarea>
                <input type="submit" class="btn btn-outline-primary" value="Répondre">
            </form>
        </div>
        <div class="post-actions">
            @if (str_contains(request()->route()->getName(), 'admin.') && Auth::user()->isAdmin() || Auth::user()->id == $post->user->id)
                <form action="{{route('user.posts.destroy', $post)}}" method="POST">
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
            @if ($comment->user_id == Auth::user()->id)
                <div class="d-flex align-items-center container-fluid justify-content-between">
                    <div></div>
                    <form method="POST" action="{{route('user.comments.delete', $comment)}}">
                        @csrf
                        @method("DELETE")
                        <input type="submit" class="btn btn-danger btn-sm" value="Supprimer">
                    </form>
                </div>
            @endif
        </div>
    @empty
        <div class="container">Pas de commentaire</div>
    @endforelse
</div>
</div>
