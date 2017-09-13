<div class="category-form">
    <form method="post" action="{{ $isNew ? route('admin.categories.create') : route('admin.categories.edit', ['id' => $category->id]) }}">
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $category->name }}">
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
        <input type="hidden" name="_token" value="{{ Session::token() }}">
    </form>

    @if(!$isNew)
        <form action="{{ route('admin.categories.destroy', ['id' => $category->id]) }}" method="POST" class="category-form__delete-form">
            {{ method_field('DELETE') }}
            {{ csrf_field() }}
            <button type="submit" class="category-form__delete-btn btn btn-secondary"><i class="fa fa-trash"></i></button>
        </form>
    @endif
</div>
