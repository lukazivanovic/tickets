<div class="comments">
    @foreach($ticket->comments as $comment)
    <div class="card mb-3">
        <div class="card-body">
            <h5 class="card-title">{{ $comment->user->name }}</h3>
            <h6 class="card-subtitle mb-2 text-muted"><span class="pull-right">{{ $comment->created_at->format('Y-m-d') }}</span></h6>
            <hr>
            <p class="card-text">{{ $comment->comment }}</p>
        </div>
    </div>
    @endforeach
</div>