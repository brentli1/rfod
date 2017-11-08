<div class="admin-form">
    <form method="post" files="true" enctype="multipart/form-data" action="{{ $isNew ? route('admin.movies.create') : route('admin.movies.update', ['id' => $movie->id]) }}">
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ $movie->title }}">
        </div>
        <div class="form-group">
            <label for="director">Director</label>
            <input type="text" name="director" id="director" class="form-control" value="{{ $movie->director }}">
        </div>
        <div class="form-group">
            <label for="release_date">Release Date</label>
            <input type="date" name="release_date" id="release_date" class="form-control" value="{{ $movie->release_date }}">
        </div>
        <div class="form-group">
            <label for="categories">Categories</label>
            {!! Form::select('categories[]', 
            $categories, 
            $movie->categories->pluck('id')->toArray(), 
            ['class' => 'form-control', 
            'multiple' => 'multiple']) !!}
        </div>
        <div class="form-group">
            <label for="name">Synopsis</label>
            <textarea name="synopsis" id="synopsis" cols="30" rows="10" class="form-control">{{ $movie->synopsis }}</textarea>
        </div>
        <div class="form-group">
            <label for="image">Image</label>
            <input class="form-control" type="file" name="image">

            @if($movie->image)
                <div>
                    <div>Current Image</div>
                    <img src="https://s3.us-east-2.amazonaws.com/codebrent-rfod/{{ $movie->image[0]->path }}" alt="{{ $movie->image[0]->name }}" class="admin-form__current-img">
                </div>
            @endif
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
        <input type="hidden" name="_token" value="{{ Session::token() }}">
    </form>

    @if(!$isNew)
        <form action="{{ route('admin.movies.destroy', ['id' => $movie->id]) }}" method="POST" class="admin-form__delete-form">
            {{ method_field('DELETE') }}
            {{ csrf_field() }}
            <button type="submit" class="admin-form__delete-btn btn btn-secondary"><i class="fa fa-trash"></i></button>
        </form>
    @endif
</div>
