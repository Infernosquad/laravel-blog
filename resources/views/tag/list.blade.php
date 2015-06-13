Tags:
@foreach ($tags as $tag)
    <span class="glyphicon glyphicon-tag"></span> {{ $tag->tag }}
@endforeach