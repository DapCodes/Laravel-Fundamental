@extends('layouts.frontend')

@section('content')
<!-- breadcrumb__start -->
<div class="breadcrumb">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="breadcrumb__title">
                    <h1>Register</h1>
                    <ul>
                        <li><a href="{{ url('/') }}">Home</a></li>
                        <li class="color__blue">Register</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- breadcrumb__end -->

<!-- register__section__start -->
<div class="loginarea sp_bottom_80 sp_top_80">
    <div class="container">
        <div class="row">
            <div class="col-xl-8 offset-md-2 loginarea__col">
                <ul class="nav tab__button__wrap text-center" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a href="{{ route('login') }}">
                            <button class="single__tab__link" type="button">Login</button>
                        </a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="single__tab__link active" type="button">Sign Up</button>
                    </li>
                </ul>
            </div>

            <div class="col-xl-8 offset-md-2 loginarea__col">
                <div class="loginarea__wraper">
                    <div class="loginarea__heading">
                        <h5 class="login__title">Sign Up</h5>
                        <p class="login__description">Already have an account? 
                            <a href="{{ route('login') }}">Log In</a>
                        </p>
                    </div>

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="row">
                            <div class="col-xl-6">
                                <div class="loginarea__form">
                                    <label class="form__label">First Name</label>
                                    <input class="common__login__input" type="text" name="first_name" placeholder="First Name" value="{{ old('first_name') }}" required>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="loginarea__form">
                                    <label class="form__label">Last Name</label>
                                    <input class="common__login__input" type="text" name="last_name" placeholder="Last Name" value="{{ old('last_name') }}" required>
                                </div>
                            </div>

                            <div class="col-xl-12">
                                <div class="loginarea__form">
                                    <label class="form__label">Email</label>
                                    <input class="common__login__input" type="email" name="email" placeholder="Your Email" value="{{ old('email') }}" required>
                                </div>
                            </div>

                            <div class="col-xl-6">
                                <div class="loginarea__form">
                                    <label class="form__label">Password</label>
                                    <input class="common__login__input" type="password" name="password" placeholder="Password" required>
                                </div>
                            </div>

                            <div class="col-xl-6">
                                <div class="loginarea__form">
                                    <label class="form__label">Re-Enter Password</label>
                                    <input class="common__login__input" type="password" name="password_confirmation" placeholder="Re-Enter Password" required>
                                </div>
                            </div>
                        </div>

                        <div class="loginarea__form d-flex justify-content-between flex-wrap gap-2 mt-2">
                            <div class="form__check">
                                <input type="checkbox" id="regi__privacy" required>
                                <label for="regi__privacy">Accept the Terms and Privacy Policy</label>
                            </div>
                        </div>

                        <div class="login__button mt-3">
                            <button type="submit" class="default__button text-center w-100">Sign Up</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
