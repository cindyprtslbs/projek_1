@extends('myview.header')

@section('content')
<div class="container">
    <div class="card mb-3">
        <div class="card-body">
            <h5 class="card-title">{{ $post->user->name }}</h5>
            <p class="card-text">{{ $post->content }}</p>
            <p class="text-muted">Posted on: {{ $post->created_at->format('M d, Y H:i') }}</p>
            
            <div class="mt-3">
                <form action="{{ route('posts.like', $post) }}" method="POST" class="d-inline">
                    @csrf
                    <button type="submit" class="btn btn-primary btn-sm">
                        <i class="fas fa-thumbs-up"></i> Like ({{ $post->likes_count }})
                    </button>
                </form>
            </div>
        </div>
    </div>

    <h3>Comments</h3>
    @foreach($post->comments as $comment)
        <div class="card mb-2">
            <div class="card-body">
                <h6 class="card-subtitle mb-2 text-muted">{{ $comment->user->name }}</h6>
                <p class="card-text">{{ $comment->content }}</p>
                <small class="text-muted">{{ $comment->created_at->diffForHumans() }}</small>
            </div>
        </div>
    @endforeach

    <form action="{{ route('comments.store') }}" method="POST" class="mt-3">
        @csrf
        <input type="hidden" name="post_id" value="{{ $post->id }}">
        <div class="form-group">
            <label for="comment">Add a comment</label>
            <textarea class="form-control @error('content') is-invalid @enderror" id="comment" name="content" rows="2" required></textarea>
            @error('content')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Submit Comment</button>
    </form>
</div>
@endsection