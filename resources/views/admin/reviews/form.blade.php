<div class="admin-form">
    <form method="post" action="{{ $isNew ? route('admin.reviews.create') : route('admin.reviews.update', ['id' => $review->id]) }}">
        <div class="form-group">
            <label for="score">Score</label>
            <input type="text" name="score" id="score" class="form-control" value="{{ $review->score }}">
        </div>
        <div class="form-group">
            <label for="movie">Movie</label>
            {!! Form::select('movie[]', 
            $movies, 
            $review->movie->id, 
            ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            <label for="review">Review Body</label>
            <textarea name="review" id="review" cols="30" rows="10" class="form-control">{{ $review->review }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
        <input type="hidden" name="_token" value="{{ Session::token() }}">
    </form>

    @if(!$isNew)
        <form action="{{ route('admin.reviews.destroy', ['id' => $review->id]) }}" method="POST" class="admin-form__delete-form">
            {{ method_field('DELETE') }}
            {{ csrf_field() }}
            <button type="submit" class="admin-form__delete-btn btn btn-secondary"><i class="fa fa-trash"></i></button>
        </form>
    @endif
</div>
