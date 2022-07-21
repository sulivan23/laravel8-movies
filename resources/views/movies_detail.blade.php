@extends('movies_layouts', ['title' => 'Movies Detail']);

@section('content')
<main class="main-content">
    <div class="container">
        <div class="page">
            <div class="breadcrumbs">
                <a href="{{ url('') }}">{{ __("messages.home") }}</a>
                <a href="{{ url('movies') }}">{{ __("messages.list_movie") }}</a>
                <span>{{ $movieDetails->Title }}</span>
            </div>

            <div class="content">
                <div class="row">
                    <div class="col-md-4">
                        <figure class="movie-poster"><img src="{{ $movieDetails->Poster  }}" alt="#"></figure>
                    </div>
                    <div class="col-md-8">
                        <h2 class="movie-title">{{ $movieDetails->Title }}</h2>
                        <div class="movie-summary">
                            <p>{{ $movieDetails->Plot }}</p>
                        </div>
                        <ul class="movie-meta">
                            <li><strong>{{ __("messages.rating") }}:</strong> 
                                {{ $movieDetails->imdbRating }} <div class="star-rating"><span style="width:{{ $movieDetails->imdbRating*10 }}%"><strong class="rating">{{ $movieDetails->imdbRating }}</strong> out of 10</span></div>
                            </li>
                            <li><strong>{{ __("messages.length") }}:</strong> {{ $movieDetails->Runtime }}</li>
                            <li><strong>{{ __("messages.released") }}:</strong> {{ $movieDetails->Released }}</li>
                            <li><strong>{{ __("messages.genre") }}:</strong> {{ $movieDetails->Genre }}</li>
                        </ul>

                        <ul class="starring">
                            <li><strong>{{ __("messages.director") }}:</strong> {{ $movieDetails->Director }}</li>
                            <li><strong>{{ __("messages.writers") }}:</strong> {{ $movieDetails->Writer }}</li>
                            <li><strong>{{ __("messages.actors") }}:</strong> {{ $movieDetails->Actors }}</li>
                        </ul>
                    </div>
                    <form action="">
                        <button id="{{ $movieDetails->imdbID }}" name="addFav">+ {{ __("messages.button_fav") }}</button>
                    </form>
                </div> <!-- .row -->
            </div>
        </div>
    </div> <!-- .container -->
</main>
@endsection