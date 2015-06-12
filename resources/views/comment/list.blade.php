<div>
    <h2>Comments:</h2>
    @foreach ($comments as $comment)
        <div class="panel panel-default">
            <div class="panel-heading">
                {{ $comment->created_at }}
            </div>

            <div class="panel-body">
                {{ $comment->comment }}
            </div>
        </div>
    @endforeach
</div>
