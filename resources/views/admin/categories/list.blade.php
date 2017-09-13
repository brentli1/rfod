@if($categories)
    <ul class="list-group">
        @foreach($categories as $category)
            <a href="{{ route('admin.categories.edit', ['id' => $category->id]) }}" 
               class="list-group-item list-group-item-action">
               {{ $category->name }}
            </a>
        @endforeach
    </ul>
@endif
