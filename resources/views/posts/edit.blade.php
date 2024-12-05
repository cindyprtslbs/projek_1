@extends('myview.header')

@section('content')
<div class="container">
    <h1>Edit Post</h1>
    <form action="{{ route('posts.update', $post) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="content">Post Content</label>
            <textarea class="form-control @error('content') is-invalid @enderror" id="content" name="content" rows="3" required>{{ old('content', $post->content) }}</textarea>
            @error('content')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Update Post</button>
    </form>
</div>
@endsection

<div class="mt-4">
                        <div class="post">
                            <h3>{{ $posting->SENDER }}</h3>
                            <p>{{ $posting->MESSAGE_TEXT }}</p>

                            <!-- Form untuk komentar -->
                            <form action="{{ route('posts.comment', ['posting_id' => $posting->POSTING_ID]) }}" method="POST">
                                @csrf
                                <input type="text" name="comment_text" placeholder="Tulis komentar...">
                                <button class="btn btn-primary" type="submit">
                                    <i class="fas fa-paper-plane"></i> Kirim
                                </button>
                            </form>

                            <!-- Menampilkan komentar -->
                            <h4>Komentar:</h4>
                            @foreach($posting->comments as $comment)
                                <p>{{ $comment->text }}</p>
                            @endforeach
                        </div>
                </div>
   <!-- Pagination -->
    <div class="d-flex justify-content-center">
    {{ $postings->links() }}  