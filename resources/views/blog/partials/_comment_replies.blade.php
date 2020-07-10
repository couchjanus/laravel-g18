 @foreach($comments as $comment)
    <div class="media">
        <a href="#" class="pull-left"><img src="/images/blog/avatar.png" alt="" class="img-circle" /></a>
        <div class="media-body">
            <div class="media-content">
                <h6><span>{{ $comment->created_at }}</span> {{ $comment->creator->name }}</h6>
                <p>
                    {{ $comment->body }}
                </p>
                
                @auth
                    <a href="#" id="reply" class="align-right">Reply</a>
                    <form method="post" action="{{ route('reply.add') }}">
                        @csrf
                        <div class="form-group">
                            <input type="text" name="body" class="form-control">
                            <input type="hidden" name="post_id" value="{{ $post_id }}">
                            <input type="hidden" name="comment_id" value="{{ $comment->id }}">
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-warning" value="Reply">
                        </div>
                    </form>
                @endauth
                <h4>{{ count($comment->replies) ?? 0 }} Replies</h4>
                @include('blog.partials._comment_replies', ['comments' => $comment->replies])
            </div>
        </div>
    </div>

@endforeach