@extends('movies_layouts',['title'  => 'List Movies'])

@section('content')
<main class="main-content">
    <div class="container">
        <div class="page">
            <div class="breadcrumbs">
                <a href="{{ url('') }}">Home</a>
                <span>{{ __("messages.list_movie") }}</span>
            </div>

            <div class="filters">
                <form action="" class="search-form">
                    <input id="search_title" class="my-2" type="text" placeholder="Search...">
                    <select class="my-2" id="type" placeholder="Choose Category">
                        <option value="">{{ __("messages.choose_type") }}</option>
                        <option value="movie">{{ __("messages.movies") }}</option>
                        <option value="series">{{ __("messages.series") }}</option>
                        <option value="episode">{{ __("messages.episode") }}</option>
                    </select>
                    <select class="my-2" id="years">
                        <option value="">{{ __("messages.choose_year") }}</option>
                        @for($i=2022; $i >= 1998; $i--)
                            <option>{{ $i }}</option>
                        @endfor
                    </select>
                    <button class="my-2" id="search"><i class="fa fa-search"></i></button>
                </form>
            </div>
            <div class="movie-list">
                {{-- <div class="movie">
                    <figure class="movie-poster"><img src="{{ url('movies_themes') }}/dummy/thumb-3.jpg" alt="#"></figure>
                    <div class="movie-title"><a href="single.html">Maleficient</a></div>
                    <div class="movie-year">2022</div>
                </div> --}}
            </div> <!-- .movie-list -->
            <div class="row">
                <div class="col-md-12 loading" style="display:none">
                    <p style="text-align:center">Loading...</p>
                </div> 
            </div>
        </div>
    </div> <!-- .container -->
</main>
@endsection