@extends('layouts.main')

@section('title' , 'Cavite National high School Graduate Tracer System')

@section('content')
<main class="columns is-mobile is-centered">
    <form id="loginform"
        class="animated fadeIn column is-10-mobile is-6-tablet is-3-desktop is-3-widescreen is-2-fullhd"
        action="{{url('/')}}" autocomplete="off" method="POST">
        <section aria-label="brandname" class="field level">
            <h1 id="loginlogo" class="level-item">
                <img src="{{asset('img/logo.png')}}" alt="Cavite National high School Graduate Tracer System">
            </h1>
        </section>
        <section class="columns is-centered is-mobile">
            {{-- check if there are validations errors --}}
            @if(session('register_success'))
            <div class="column is-11 outside-notification-container animated fadeIn" id="outside-success-container">
                <p class="has-text-centered has-text-white">{{session('register_success')}}</p>
            </div>
            @endif
            {{-- check if password successfully change --}}
            @if(session('forgot_password_success'))
            <div class="column is-11 outside-notification-container animated fadeIn" id="outside-success-container">
                <p class="has-text-centered has-text-white">{{session('forgot_password_success')}}</p>
            </div>
            @endif

            {{-- errors in here --}}
            @if (session('login_errors'))
            <div class="column is-11 outside-notification-container animated fadeIn" id="outside-error-container">
                <p class="has-text-centered has-text-white">{{session('login_errors')}}</p>
            </div>
            @endif
            @if (count($errors) > 0 && $errors)
            <div class="column is-11 outside-notification-container animated fadeIn" id="outside-error-container">
                @foreach ($errors->all() as $item)
                <p class="has-text-centered has-text-white" id="outside-validation-errors">{{$item}}</p>
                @endforeach
            </div>
            @endif
        </section>
        <section class="field">
            <h2 class="is-small">Please Login:</h2>
        </section>
        @csrf
        <section class="field">
            <div class="control has-icons-left has-icons-right">
                <input class="input has-text-centered has-text-centered" maxlength="50" type="text" required
                    placeholder="Username" name="username">
                <span class="icon is-small is-left">
                    <i class="fas fa-user"></i>
                </span>
            </div>
        </section>
        <section aria-label="loginpassword" class="field">
            <div class="control has-icons-left has-icons-right">
                <input class="input has-text-centered" maxlength="150" type="password" required placeholder="Password"
                    name="password">
                <span class="icon is-small is-left">
                    <i class="fas fa-key"></i>
                </span>
            </div>
        </section>
        <section aria-label="forgotpasswordlink" class="field">
            <a class="is-small login-links" href="{{url('/forgotpassword')}}">Forgot Password?</a>
        </section>
        <section class="field level">
            <div class="control level-item">
                <button id="buttonoutside" type="submit" class="button is-normal is-link">Login</button>
            </div>
        </section>
        <section class="field level">
            <a class="is-small level-item login-links" href="{{url('/register')}}">Create an Account?</a>
        </section>
    </form>
</main>
@endsection