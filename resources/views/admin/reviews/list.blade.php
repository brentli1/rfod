@if($reviews)
    <ul class="list-group">
        @foreach($reviews as $review)
            <a href="{{ route('admin.reviews.edit', ['id' => $review->id]) }}" 
               class="list-group-item list-group-item-action">
               {{ $review->movie->title }} ({{ $review->movie->release_date }}) - By: {{ $review->user->name }}
            </a>
        @endforeach
    </ul>
@endif
