@extends('movies_layouts',['title'  => 'List Movies'])

@section('content')
<main class="main-content">
    <div class="container">
        <div class="page">
            <div class="breadcrumbs">
                <a href="{{ url('') }}">{{ __("messages.home") }}</a>
                <span>{{ __("messages.fav_movie") }}</span>
            </div>
            @if($errors->any())
                <div class="alert alert-danger">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </div>
            @endif

            @if(session()->has('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <div class="movie-list">
                @if($favMovies->count() > 0)
                @foreach($favMovies->get() as $fav)
                    <div class="movie">
                        <figure class="movie-poster"><img src="{{ $fav->poster }}" alt="#"></figure>
                        <div class="movie-title"><a href="{{ url('movies/'.$fav->imdb_id) }}">{{ $fav->title }}</a></div>
                        <div class="movie-year">{{ $fav->year }}</div>
                        <form class="my-2" action="{{ url('movies/delete/'.$fav->imdb_id) }}" method="POST">
                            @csrf
                            <button name="delete" onclick="return confirm('Are you sure ?')">Delete</button>
                        </form>
                    </div>
                @endforeach
                @else 
                    <p style="text-align:center">{{ __("messages.fav_movie_notfound") }}</p>
                @endif
            </div> <!-- .movie-list -->
        </div>
    </div> <!-- .container -->
</main>
@endsection