@if(count($errors) > 0)
    <section class="alert alert-danger alert-dismissible fade show">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <ul class="alert__items">
            @foreach($errors->all() as $error)
                <li class="alert__item"><i class="fa fa-exclamation"></i>{{ $error }}</li>
            @endforeach
        </ul>
    </section>
@endif
@if(Session::has('success'))
    <section class="alert alert-success alert-dismissible fade show">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <div class="alert__items">
            <div class="alert__item">{{ Session::get('success') }}</div>
        </div>
    </section>
@endif
@if(Session::has('failure'))
    <section class="alert alert-danger alert-dismissible fade show">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <div class="alert__items">
            <div class="alert__item">{{ Session::get('failure') }}</div>
        </div>
    </section>
@endif
