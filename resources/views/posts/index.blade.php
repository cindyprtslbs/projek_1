<!-- resources/views/postings.blade.php -->
@extends('myview.header')

@section('content')
<div class="container">
    <h2>Social Feed</h2>

    <!-- Form untuk membuat posting baru -->
    <div class="card mb-4">
        <div class="card-body">
            <h5 class="card-title">Create New Post</h5>
            <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <a href="#" class="mr-3">
                        <img src="{{ asset('dist/assets/images/faces/face23.jpg') }}" alt="profile" style="border-radius: 50%; width: 40px; height: 40px; margin-bottom: 20px;" />
                    </a>
                    <label for="message_text">What's on your mind?</label>
                    <div class="form-group">
                        <textarea name="message_text" id="message_text" class="form-control" rows="3"></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label for="message_gambar">Upload Image :</label>
                    <input type="file" name="message_gambar" class="form-control-file" id="message_gambar" multiple>
                </div>
                <button type="submit" class="btn btn-primary mt-3">Post</button>
            </form>
        </div>
    </div>

    <!-- Menampilkan daftar posting -->
    <div class="post-list">
        @foreach ($postings as $posting)
        <div class="card mb-3">
            <div class="card-body">

                <div class="d-flex justify-content-between">
                    <small>Posted on {{ \Carbon\Carbon::parse($posting->CREATE_DATE)->format('M d, Y') }}</small>
                </div>
                    <div class="d-flex justify-content-end mb-2">
                        <form action="{{ route('posts.destroy',  ['posting_id' => $posting->POSTING_ID]) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus postingan ini?');">
                            @csrf
                            @method('DELETE')
                            <button class=" btn btn-inverse-danger" type="submit"><i class="fas fa-trash"></i></button>
                        </form>
                    </div>


                <!-- Menampilkan komentar yang ada -->
                <div class="mt-4">
                        <div class="post">
                            <h4>{{ $posting->SENDER }}</h4>
                            <p>{{ $posting->MESSAGE_TEXT }}</p>
                            @if ($posting->MESSAGE_GAMBAR)
                                <div class="posting">
                                    <img src="{{ asset('assets/images/' . $posting->MESSAGE_GAMBAR) }}" class="efek" alt="Image">
                                </div>
                            @endif
                            <style>
                                .posting {
                                    display: flex;
                                    flex-direction: column;
                                    align-items: flex-start;
                                    gap: 10px; /* Jarak antara teks dan gambar */
                                    margin: 20px 0;
                                    max-width: 50px;
                                }

                                .efek {
                                    width: 150px; /* Ukuran gambar bisa disesuaikan */
                                    height: 150px;
                                    border-radius: 12px; /* Agar gambar melingkar */
                                    object-fit: cover;
                                }

                                .posting::after {
                                    content: '';
                                    display: block;
                                    padding-bottom: 100%;
                                }

                            </style>
                            <!-- Form untuk komentar -->
                            <form action="{{ route('posts.comment', ['posting_id' => $posting->POSTING_ID]) }}" method="POST">
                                @csrf
                                <input type="text" name="komentar_text" placeholder="Tulis komentar...">
                                <button class="btn btn-primary" type="submit">
                                    <i class="fas fa-paper-plane"></i>
                                </button>
                            </form>
                            <div>
                        <form action="{{ route('posts.like', ['posting_id' => $posting->POSTING_ID]) }}" method="POST" style="display: inline;" id="likeForm{{ $posting->POSTING_ID }}">
                            @csrf
                            <button type="button" class="like-button" data-posting-id="{{ $posting->POSTING_ID }}" style="background: none; border: none; cursor: pointer; display: flex; align-items: center;">
                                <i class="fas fa-heart" style="color: red; margin-right: 5px; margin-left: 5px margin-bottom: 5px;"></i>
                                <span class="like-count">
                                    {{ $posting->likes->count() }} {{ $posting->likes->count() == 1 ? 'like' : 'likes' }}
                                </span>
                            </button>
                        </form>




                        <!-- Button untuk membuka form komentar -->
                        {{-- <button class="btn btn-link" data-toggle="collapse" data-target="#commentForm{{ $posting->posting_id }}">Comment</button> --}}
                    </div>
                            <!-- Menampilkan komentar -->
                            {{-- @dd($posting->comments); --}}
                            @foreach($posting->comments as $comment)
                            <div class="form-group" style="display: flex; align-items: flex-start;">
                                <!-- Profile Picture -->
                                <a href="#" class="mr-3">
                                    <img src="{{ asset('dist/assets/images/faces/face23.jpg') }}" alt="profile" style="border-radius: 50%; width: 40px; height: 40px; object-fit: cover;" />
                                </a>

                                <!-- Comment Content -->
                                <div style="margin-left: 10px; ">
                                    <h6 style="margin: 0; font-size: 14px; font-weight: bold; line-height: 1;">
                                        {{ $comment->user->name }}
                                    </h6>
                                    <p style="margin: 0; font-size: 14px; color: #262626; line-height: 1.5;">
                                        {{ $comment->KOMENTAR_TEXT }}
                                    </p>
                                    <span style="font-size: 12px; color: #8e8e8e;">5d Reply</span>
                                </div>
                            </div>


                            @endforeach

                        </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>

     <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
$(document).ready(function() {
    $('.like-button').on('click', function() {
        var postingId = $(this).data('posting-id');
        var likeCount = $(this).find('.like-count');

        $.ajax({
            url: '{{ route("posts.like", ":posting_id") }}'.replace(':posting_id', postingId),
            type: 'POST',
            data: {
                _token: '{{ csrf_token() }}',
                posting_id: postingId
            },
            success: function(response) {
                console.log(response);
                if(response.likes_count !== undefined) {
                    likeCount.text(response.likes_count);
                }
            },
            error: function(xhr, status, error) {
                console.log(xhr.responseText);
            }
        });
    });
});
</script>


</div>
@endsection
