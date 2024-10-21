<div class="posts-wrapper">
    <div class="post-header">
        <img src="{{$post->user->imageUrl()}}" alt="User Photo" class="user-photo">
        <div class="user-info">
            @php
                $route = str_contains(request()->route()->getName(), 'admin.') ? 'admin.users.show' : 'user.show';
            @endphp
            <a href="{{route($route, $post->user)}}"><h3>{{$post->user->name}}</h3></a>
            <span class="post-date"> {{ \Carbon\Carbon::parse($post->created_at)->translatedFormat('d F Y')}}</span>
        </div>
    </div>
    <div class="post-content">
        @if ($post->image)
            <img style="width:40%;height:150px;" src="{{$post->imageUrl()}}" alt="">
        @endif
        <p>{{$post->description}}</p>
    </div>
    <div class="post-footer container-fluid">
        <div class="tags">
            <form action="{{route('user.comments.store')}}" class="d-flex align-items-center justify-content-center gap-1" method="POST" style="width:80%">
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
                $route = str_contains(request()->route()->getName(), 'admin.') ? 'admin.posts.show' : 'user.posts.show';
            @endphp
            <a href="{{route($route, $post)}}"><span>{{$post->comments->count()}} {{$commentaires}}</span></a>
        </div>
    </div>
</div>

