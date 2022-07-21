@extends('movies_layouts', ['title' => 'Login'])

@section('content')
<main class="main-content">
    <div class="container login">
        <div class="page">
            <div class="breadcrumbs">
                <a href="{{ url('') }}">{{ __("messages.home") }}</a>
                <span>{{__("messages.login")}}</span>
            </div>

            <div class="content">
                @if($errors->any())
                    <div class="alert alert-danger">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </div>
                @endif
                <div class="row">
                    <div class="col-md-6">
                        <h2>{{__("messages.login")}}</h2>
                        <div class="contact-form">
                            <form action="{{ url('login') }}" method="POST">
                                @csrf
                                <input type="text" name="username" class="name" placeholder="{{ __("messages.username") }}">
                                <input type="password" name="password" class="email" placeholder="{{ __("messages.password") }}">
                                <button>{{__("messages.login")}}</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- .container -->
</main>
@endsection