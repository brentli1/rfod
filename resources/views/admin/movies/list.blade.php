@if($movies)
    <ul class="list-group">
        @foreach($movies as $movie)
            <a href="{{ route('admin.movies.show', ['id' => $movie->id]) }}" 
               class="list-group-item list-group-item-action">
               {{ $movie->title }}
            </a>
        @endforeach
    </ul>
@endif
