@extends('layouts.frontend')

@section('content')

<!-- breadcrumb__start -->
<div class="breadcrumb">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="breadcrumb__title">
                    <h1>Login</h1>
                    <ul>
                        <li><a href="{{ url('/') }}">Home</a></li>
                        <li class="color__blue">Login</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- breadcrumb__end -->

<!-- login__section__start -->
<div class="loginarea sp_bottom_80 sp_top_80">
    <div class="container">
        <div class="row">
            <div class="col-xl-8 offset-md-2 loginarea__col">
                <ul class="nav tab__button__wrap text-center" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="single__tab__link active" data-bs-toggle="tab" data-bs-target="#projects__one" type="button">Login</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a href="{{ route('register') }}">
                            <button class="single__tab__link" data-bs-toggle="tab" data-bs-target="#projects__two" type="button">Sign up</button>
                        </a>
                    </li>
                </ul>
            </div>

            <div class="tab-content tab__content__wrapper" id="myTabContent">
                <div class="tab-pane fade active show" id="projects__one" role="tabpanel">
                    <div class="col-xl-8 offset-md-2 loginarea__col">
                        <div class="loginarea__wraper">
                            <div class="loginarea__heading">
                                <h5 class="login__title">Login</h5>
                                <p class="login__description">Don't have an account yet? 
                                    <a href="{{ route('register') }}">Sign up for free</a>
                                </p>
                            </div>

                            {{-- tampilkan error validasi atau auth --}}
                            @if ($errors->any())
                                <div class="alert alert-danger mt-3">
                                    {{ $errors->first() }}
                                </div>
                            @endif

                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="loginarea__form">
                                    <label class="form__label">Email</label>
                                    <input class="common__login__input @error('email') is-invalid @enderror" type="email" name="email" placeholder="Enter your email" value="{{ old('email') }}" required autofocus>
                                    @error('email')
                                        <span class="invalid-feedback d-block" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="loginarea__form">
                                    <label class="form__label">Password</label>
                                    <input class="common__login__input @error('password') is-invalid @enderror" type="password" name="password" placeholder="Password" required>
                                    @error('password')
                                        <span class="invalid-feedback d-block" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="loginarea__form d-flex justify-content-between flex-wrap gap-2">
                                    <div class="form__check">
                                        <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                        <label for="remember">Remember Me</label>
                                    </div>
                                </div>

                                <div class="loginarea__button text-center mt-3">
                                    <button type="submit" class="default__button"> Login </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                {{-- Tab Sign Up bisa kamu isi sendiri --}}
            </div>
        </div>
    </div>
</div>

@endsection
